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
        Schema::create('teacher_email_resets', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('teacher_id')->comment('メールアドレスを更新した教師ID');
            $table->string('new_email')->comment('教師が新規に設定したメールアドレス');
            $table->string('token');
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
        Schema::dropIfExists('teacher_email_resets');
    }
};
