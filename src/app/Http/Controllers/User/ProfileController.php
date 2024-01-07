<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\EmailReset;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    public function show()
    {
        $id = Auth::id();
        $user = User::findOrFail($id);

        return view('Pages.User.Profile.show', compact('user'));
    }

    public function update(Request $request)
    {
        $user = User::find($request->id);
        // dd($request);

        // アイコン画像変更
        if ($request->file('image')) {
            $dir = 'img/user' . $user->id;
            $file_name = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/' . $dir, $file_name);
            $user->image = 'storage/' . $dir . '/' . $file_name;

        } else {
            $user->image = $user->image;
        }

        // ユーザー名変更
        if ($request->has('user_name')) {
            // dd($request);
            $validated = $request->validate([
                'user_name' => ['required'],
            ]);
            $user->user_name = $request->input('user_name');
        }

        // パスワード変更
        if ($request->has('oldPassword') && $request->has('newPassword')) {

            // 現在のパスワードが正しいかチェック
            if(!(Hash::check($request->input('oldPassword'), Auth::user()->password))) {
                return redirect()->route('user.profile.show', ['userName' => $user->user_name])->with(['flash_message' => '現在のパスワードが間違っています']);
            }

            // 現在のパスワードと新しいパスワードが正しいかをチェック
            if(strcmp($request->input('oldPassword'), $request->input('newPassword')) == 0) {
                return redirect()->route('user.profile.show', ['userName' => $user->user_name])->with(['flash_message' => '新しいパスワードが現在のパスワードと同じです']);
            }

            // パスワードのバリデーション
            $validated = $request->validate([
                'oldPassword' => ['required'],
                'newPassword' => ['required', 'string', 'confirmed', Password::min(8)->mixedCase()->numbers()],
            ]);

            // パスワードを変更
            $change_user = Auth::user();
            $change_user->password = Hash::make($request->input('newPassword'));
            $change_user->save();

            return redirect()->route('user.profile.passwordComp');
        }
        
        $user->save();

        return redirect()->route('user.profile.show', ['userName' => $user->user_name])->with(['user' => $user]);
    }

    /**
     * メールアドレス変更
     *
     * @param Request $request
     * @return void
     */
    public function sendChangeEmailLink(Request $request)
    {
        $user = User::findOrFail($request->id);

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
                $param['user_id'] = Auth::id();
                $param['new_email'] = $new_email;
                $param['token'] = $token;
                $email_reset = EmailReset::create($param);

                DB::commit();

                $email_reset->sendEmailResetNotification($token);

                return redirect()->route('user.profile.show', ['userName' => $user->user_name])->with(['user' => $user, 'flash_message' => '確認メールを送信しました。']);
            } catch (\Exception $e) {
                DB::rollBack();
                Log::error($e);
                return redirect()->route('user.profile.show', ['userName' => $user->user_name])->with(['user' => $user, 'flash_message' => 'メール更新に失敗しました。']);
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
        $email_resets = DB::table('email_resets')
            ->where('token', $token)
            ->first();
        
        $user = User::findOrFail($email_resets->user_id);

        if (DB::table('users')->where('email', $email_resets->new_email)->exists()) {
            return redirect()->route('user.profile.show', ['userName' => $user->user_name])->with(['user' => $user, 'flash_message' => '同じメールアドレスの登録があります。違うメールアドレスを登録してください。']);
        }

        // トークンが存在している、かつ、有効期限が切れていないかチェック
        if ($email_resets && !$this->tokenExpired($email_resets->created_at)) {

            // ユーザーのメールアドレスを更新
            $user->email = $email_resets->new_email;
            $user->save();

            // レコードを削除
            DB::table('email_resets')
                ->where('token', $token)
                ->delete();

            return redirect()->route('user.profile.show', ['userName' => $user->user_name])->with(['user' => $user, 'flash_message' => 'メールアドレスを更新しました。']);
        } else {
            // レコードが存在していた場合削除
            if ($email_resets) {
                DB::table('email_resets')
                    ->where('token', $token)
                    ->delete();
            }
            return redirect()->route('user.profile.show', ['userName' => $user->user_name])->with(['user' => $user, 'flash_message' => 'メールアドレスの更新に失敗しました。']);
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
        return view('Pages.User.Profile.password_complete');
    }
}
