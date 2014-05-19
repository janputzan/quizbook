<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToQuizzesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('quizzes', function(Blueprint $table)
		{
			$table -> foreign('user_id') -> references('id') -> on('users');

			$table -> foreign('category_id') -> references('id') -> on('categories');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('quizzes', function(Blueprint $table)
		{
			//
		});
	}

}