<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// create request table
		Schema::create('request', function($t) {
                $t->increments('id');
                $t->string('name', 56);
                $t->string('email', 128);
                $t->text('content');
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
		Schema::drop('request');
	}

}
