<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToQuestionsAnswersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('questions_answers', function(Blueprint $table)
		{
			$table -> foreign('question_id') -> references('id') -> on('questions');

			$table -> foreign('answer_id') -> references('id') -> on('answers');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('questions_answers', function(Blueprint $table)
		{
			//
		});
	}

}