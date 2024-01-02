<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ChangeEmail extends Notification
{
    use Queueable;
    public $token;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token)
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
    public function toMail($notifiable)
    {
        $mailMessage = (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url(route('user.email.reset', ['token' => $this->token])))
                    ->line('Thank you for using our application!');
                    // ->subject('メールアドレス変更') // 件名
                    // ->view('Pages.User.Profile.change_email') // メールテンプレートの指定
                    // ->action(
                    //     'メールアドレス変更', 
                    //     route('user.email.reset', ['token' => $this->token]) // アクセスするURL
                    // );
                    // ->action(
                    //     'メールアドレス変更', 
                    //     url('user/email/change', $this->token) // アクセスするURL
                    // );

        return $mailMessage;
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
