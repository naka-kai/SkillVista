<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules\Password;
use App\Models\TeacherEmailReset;

class ProfileController extends Controller
{
    public function show()
    {
        $id = Auth::guard('teacher')->user()->id;
        $teacher = Teacher::findOrFail($id);

        return view('Pages.Teacher.Profile.show', compact('teacher'));
    }

    public function update(Request $request)
    {
        $teacher = Teacher::find($request->id);
        // dd($request);

        // アイコン画像変更
        if ($request->file('image')) {
            $dir = 'img/teacher' . $teacher->id;
            $file_name = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/' . $dir, $file_name);
            $teacher->image = 'storage/' . $dir . '/' . $file_name;

        } else {
            $teacher->image = null;
        }

        // ユーザー名変更
        // if ($request->input('username')) {
        //     $teacher->user_name = $request->input('username');
        // }

        // パスワード変更
        if ($request->input('oldPassword') && $request->input('newPassword')) {

            // 現在のパスワードが正しいかチェック
            if(!(Hash::check($request->input('oldPassword'), Auth::guard('teacher')->user()->password))) {
                return redirect()->route('teacher.profile.show', ['teacherName' => $teacher->last_name . $teacher->first_name])->with(['flash_message' => '現在のパスワードが間違っています']);
            }

            // 現在のパスワードと新しいパスワードが正しいかをチェック
            if(strcmp($request->input('oldPassword'), $request->input('newPassword')) == 0) {
                return redirect()->route('teacher.profile.show', ['teacherName' => $teacher->last_name . $teacher->first_name])->with(['flash_message' => '新しいパスワードが現在のパスワードと同じです']);
            }

            // パスワードのバリデーション
            $validated_date = $request->validate([
                'oldPassword' => ['required'],
                'newPassword' => ['required', 'string', 'confirmed', Password::min(8)->mixedCase()->numbers()],
            ]);

            // パスワードを変更
            $change_teacher_id = Auth::guard('teacher')->user()->id;
            $change_teacher = Teacher::findOrFail($change_teacher_id);
            $change_teacher->password = Hash::make($request->input('newPassword'));
            $change_teacher->save();

            return redirect()->route('teacher.profile.passwordComp');
        }
        
        $teacher->save();

        return view('Pages.Teacher.Profile.show', compact('teacher'));
    }

    /**
     * メールアドレス変更
     *
     * @param Request $request
     * @return void
     */
    public function sendChangeEmailLink(Request $request)
    {
        $teacher = Teacher::findOrFail($request->id);

        // メールアドレス変更
        if ($request->input('email')) {
            $new_email = $request->input('email');

            // トークン生成
            $token = hash_hmac(
                'sha256',
                Str::random(40).$new_email,
                config('app.key')
            );

            // トークンをDBに保存
            DB::beginTransaction();
            try {
                $param = [];
                $param['teacher_id'] = Auth::guard('teacher')->user()->id;
                $param['new_email'] = $new_email;
                $param['token'] = $token;
                $email_reset = TeacherEmailReset::create($param);

                DB::commit();

                $email_reset->sendEmailResetNotification($token);

                return redirect()->route('teacher.profile.show', ['teacherName' => $teacher->last_name . $teacher->first_name])->with(['teacher' => $teacher, 'flash_message' => '確認メールを送信しました。']);
            } catch (\Exception $e) {
                DB::rollBack();
                Log::error($e);
                return redirect()->route('teacher.profile.show', ['teacherName' => $teacher->last_name . $teacher->first_name])->with(['teacher' => $teacher, 'flash_message' => 'メール更新に失敗しました。']);
            }
        }
    }

    /**
     * メールアドレスの再設定処理
     * 
     * @param Request $request
     * @param [type] $token
     */
    public function reset(Request $request, $token)
    {
        $email_resets = DB::table('teacher_email_resets')
            ->where('token', $token)
            ->first();
        
        $teacher = Teacher::findOrFail($email_resets->teacher_id);

        if (DB::table('teachers')->where('email', $email_resets->new_email)->exists()) {
            return redirect()->route('teacher.profile.show', ['teacherName' => $teacher->last_name . $teacher->first_name])->with(['teacher' => $teacher, 'flash_message' => '同じメールアドレスの登録があります。違うメールアドレスを登録してください。']);
        }

        // トークンが存在している、かつ、有効期限が切れていないかチェック
        if ($email_resets && !$this->tokenExpired($email_resets->created_at)) {

            // ユーザーのメールアドレスを更新
            $teacher->email = $email_resets->new_email;
            $teacher->save();

            // レコードを削除
            DB::table('email_resets')
                ->where('token', $token)
                ->delete();

            return redirect()->route('teacher.profile.show', ['teacherName' => $teacher->last_name . $teacher->first_name])->with(['teacher' => $teacher, 'flash_message' => 'メールアドレスを更新しました。']);
        } else {
            // レコードが存在していた場合削除
            if ($email_resets) {
                DB::table('email_resets')
                    ->where('token', $token)
                    ->delete();
            }
            return redirect()->route('teacher.profile.show', ['teacherName' => $teacher->last_name . $teacher->first_name])->with(['teacher' => $teacher, 'flash_message' => 'メールアドレスの更新に失敗しました。']);
        }
    }

    /**
     * トークンが有効期限切れかどうかチェック
     * 
     * @param string $createdAt
     * @return bool
     */
    protected function tokenExpired($createdAt)
    {
        // トークンの有効期限は60分に設定
        $expires = 60 * 60;
        return Carbon::parse($createdAt)->addSeconds($expires)->isPast();
    }

    /**
     * パスワード完了画面
     */
    public function passwordComp()
    {
        return view('Pages.Teacher.Profile.password_complete');
    }
}
