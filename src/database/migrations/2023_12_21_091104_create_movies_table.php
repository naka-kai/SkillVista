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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('movie_title', 255)->comment('タイトル');
            $table->text('movie')->comment('動画');
            $table->foreignId('chapter_id')->comment('章ID');
            $table->integer('second')->comment('動画の長さ(秒)');
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
        Schema::dropIfExists('movies');
    }
};
