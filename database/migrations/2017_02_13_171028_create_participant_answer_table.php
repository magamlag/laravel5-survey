<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticipantAnswerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
			Schema::create('participant_answer', function (Blueprint $table) {
				$table->integer('participant_id')->unsigned()->index();
				$table->foreign('participant_id')->references('id')->on('users')->onDelete('cascade');

				$table->integer('answer_id')->unsigned()->index();
				$table->foreign('answer_id')->references('id')->on('answers')->onDelete('cascade');

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
        //
				Schema::drop('participant_answer');
    }
}
