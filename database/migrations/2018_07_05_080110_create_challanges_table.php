<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChallangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('challanges', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userId');
            $table->string('title');
            $table->mediumText('description');
            $table->date('deadline');
            $table->mediumText('reward');
            $table->mediumText('whoWins');
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
        Schema::dropIfExists('challanges');
    }
}
