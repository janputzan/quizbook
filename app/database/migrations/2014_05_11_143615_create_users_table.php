<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table -> increments('id');

			$table -> string('username', 60) -> unique();

			$table -> string('password', 60);

			$table -> string('email') -> unique();

			//$table -> string('facebook_id') -> nullable();

			//$table -> string('google_id') -> nullable();

			$table -> string('profile_photo')-> nullable();

			$table -> integer('total_score')->default(0);

			$table -> string('remember_token')-> nullable();

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
		Schema::table('users', function(Blueprint $table)
		{
			Schema::drop('users');
		});
	}

}