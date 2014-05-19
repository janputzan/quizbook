<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToQuizzesQuestionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('quizzes_questions', function(Blueprint $table)
		{
			$table -> foreign('quiz_id') -> references('id') -> on('quizzes');

			$table -> foreign('question_id') -> references('id') -> on('questions');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('quizzes_questions', function(Blueprint $table)
		{
			//
		});
	}

}