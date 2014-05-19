<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizzesTakenTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('quizzes_taken', function(Blueprint $table)
		{
			$table -> increments('id');

			$table -> integer('quiz_id') -> unsigned();

			$table -> integer('user_id') -> unsigned();

			$table -> integer('score');

			$table -> integer('time');

			$table -> dateTime('date_taken');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('quizzes_taken', function(Blueprint $table)
		{
			Schema::drop('quizzes_taken');
		});
	}

}