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
		// create user table
		Schema::create('user', function($t) {
                $t->increments('id');
                $t->string('username', 56);
                $t->string('password', 128);
                $t->timestamps();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		// drop user table
		Schema::drop('user');
	}

}
