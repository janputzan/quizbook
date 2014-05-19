<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToQuizzesTagsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('quizzes_tags', function(Blueprint $table)
		{
			$table -> foreign('quiz_id') -> references('id') -> on('quizzes');

			$table -> foreign('tag_id') -> references('id') -> on('tags');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('quizzes_tags', function(Blueprint $table)
		{
			//
		});
	}

}