<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Notifications\TeacherChangeEmail;
use Illuminate\Database\Eloquent\SoftDeletes;

class TeacherEmailReset extends Model
{
    use HasFactory;
    use Notifiable;

    use SoftDeletes;

    protected $fillable = [
        'teacher_id',
        'new_email',
        'token',
    ];

    /**
     * メールアドレス確定メールを送信
     * 
     * @param [type] $token
     */
    public function sendEmailResetNotification($token)
    {
        $this->notify(new TeacherChangeEmail($token));
    }

    /**
     * 新しいメールアドレス宛にメールを送信する
     * 
     * @param \Illuminate\Notifications\Notification $notification
     * @return string
     */
    public function routeNotificationForMail($notification)
    {
        return $this->new_email;
    }
}
