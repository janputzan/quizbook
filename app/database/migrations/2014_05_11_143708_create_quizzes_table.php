<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizzesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('quizzes', function(Blueprint $table)
		{
			$table -> increments('id');

			$table -> string('title');

			$table -> float('dificulty');

			$table -> integer('user_id') -> unsigned();

			$table -> integer('category_id') -> unsigned();

			$table -> timestamps();
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
			Schema::drop('quizzes');
		});
	}

}