<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\EmailReset;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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

        // アイコン画像変更
        if ($request->file('image')) {
            $dir = 'img/user';
            $file_name = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/' . $dir, $file_name);
            $user->image = 'storage/' . $dir . '/' . $file_name;

        } else {
            $user->image = null;
        }

        // ユーザー名変更
        if ($request->input('username')) {
            $user->user_name = $request->input('username');
        }
        
        $user->save();

        return view('Pages.User.Profile.show', compact('user'));
    }

    /**
     * メールアドレス変更
     *
     * @param Request $request
     * @return void
     */
    public function sendChangeEmailLink(Request $request)
    {
        $user = User::find($request->id);

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

                return redirect(view('Pages.User.Profile.show', compact('user'))->with('flash_message', '確認メールを送信しました。'));
            } catch (\Exception $e) {
                DB::rollBack();
                Log::error($e);
                return redirect(view('Pages.User.Profile.show', compact('user'))->with('flash_message', 'メール更新に失敗しました。'));
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

        // トークンが存在している、かつ、有効期限が切れていないかチェック
        if ($email_resets && !$this->tokenExpired($email_resets->created_at)) {

            // ユーザーのメールアドレスを更新
            $user = User::findOrFail($email_resets->user_id);
            $user->email = $email_resets->new_email;
            $user->save();

            // レコードを削除
            DB::table('email_resets')
                ->where('token', $token)
                ->delete();

            return redirect(view('Pages.User.Profile.show', compact('user'))->with('flash_message', 'メールアドレスを更新しました。'));
        } else {
            // レコードが存在していた場合削除
            if ($email_resets) {
                DB::table('email_resets')
                    ->where('token', $token)
                    ->delete();
            }
            return redirect(view('Pages.User.Profile.show', compact('user'))->with('flash_message', 'メールアドレスの更新に失敗しました。'));
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
}
