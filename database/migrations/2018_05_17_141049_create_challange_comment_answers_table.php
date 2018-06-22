<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChallangeCommentAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('challange_comment_answers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userId');
            $table->integer('CallangeCommentId');
            $table->mediumText('comment');
            $table->date('createdAt');
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
        Schema::dropIfExists('challange_comment_answers');
    }
}
