<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Queue\SerializesModels;

class UserPasswordResetNotification extends Notification
{
    use Queueable;

    private string $token;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(string $token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    // public function toMail($request)
    // {
    //     $url = urldecode(url('/user/password/reset', $this->token . '?email=' . $request->email));

    //     return (new BareMail)
    //         ->to($request->email)
    //         ->subject('パスワード再設定メール')
    //         ->route('user.password.reset')
    //         ->with(['token' => $this->token]);
    // }
    public function toMail($request)
    {
        $url = urldecode(url('/user/password/reset/' . $this->token . '?email=' . $request->email));

        return (new MailMessage)
            ->subject('SkillVistaパスワード再設定URLの送付')
            ->greeting('いつもSkillVistaをご利用いただき、誠にありがとうございます。')
            ->line('以下ボタンを押してパスワードの再設定を行なってください。')
            ->line('有効期限は本メールを受信してから1時間となります。')
            ->action('パスワードをリセット', $url)
            ->line('※※※※※本メールは送信専用のメールアドレスから送信しております。ご返信できませんのでご了承ください。※※※※※');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }

}

// class BareMail extends Mailable {
//     use Queueable, SerializesModels;

//     public function build() {}
// }