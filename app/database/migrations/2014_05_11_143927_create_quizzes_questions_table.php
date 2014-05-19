<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizzesQuestionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('quizzes_questions', function(Blueprint $table)
		{
			$table -> increments('id');

			$table -> integer('quiz_id') -> unsigned();

			$table -> integer('question_id') -> unsigned();

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
			Schema::drop('quizzes_questions');
		});
	}

}