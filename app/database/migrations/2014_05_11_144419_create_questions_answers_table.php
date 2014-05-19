<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsAnswersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('questions_answers', function(Blueprint $table)
		{
			$table -> increments('id');

			$table -> integer('question_id') -> unsigned();

			$table -> integer('answer_id') -> unsigned();

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
			Schema::drop('questions_answers');
		});
	}

}