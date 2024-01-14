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
        Schema::create('chapters', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255)->comment('タイトル');
            $table->foreignId('course_id')->constrained()->cascadeOnDelete();
            $table->integer('display_num')->comment('表示順序');
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
        Schema::dropIfExists('chapters');
    }
};
