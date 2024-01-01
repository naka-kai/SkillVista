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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255)->comment('タイトル');
            $table->text('comment')->comment('コメント');
            $table->text('image')->nullable()->comment('画像');
            $table->foreignId('movie_id')->constrained()->cascadeOnDelete();
            $table->bigInteger('who_id')->comment('教師orユーザーのID');
            $table->integer('who_flg')->comment('0: ユーザー, 1: 教師');
            $table->string('created_by', 255)->comment('作成者');
            $table->string('updated_by', 255)->comment('更新者');
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
        Schema::dropIfExists('comments');
    }
};
