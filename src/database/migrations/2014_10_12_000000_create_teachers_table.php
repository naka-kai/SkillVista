<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('last_name', 255)->comment('姓');
            $table->string('first_name', 255)->comment('名');
            $table->string('last_name_en', 255)->comment('姓ローマ字');
            $table->string('first_name_en', 255)->comment('名ローマ字');
            $table->string('email', 255)->unique()->comment('メールアドレス');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 255)->comment('パスワード');
            $table->text('image')->nullable()->comment('アイコン画像');
            $table->text('profile')->comment('プロフィール');
            $table->text('hp')->nullable()->comment('HPのURL');
            $table->text('x')->nullable()->comment('XのアカウントURL');
            $table->text('youtube')->nullable()->comment('YouTubeのアカウントURL');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teachers');
    }
};
