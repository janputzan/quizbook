<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToQuizzesTakenTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('quizzes_taken', function(Blueprint $table)
		{
			$table -> foreign('quiz_id') -> references('id') -> on('quizzes');

			$table -> foreign('user_id') -> references('id') -> on('users');

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
			//
		});
	}

}