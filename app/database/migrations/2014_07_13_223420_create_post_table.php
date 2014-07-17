<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// create post table
		Schema::create('post', function($table) {
                $table->increments('id');
	            $table->string('title');
	            $table->string('alias');
	            $table->text('content');
	            $table->string('tag', 56);
	            $table->integer('featured_image')->default(0);
	            $table->unsignedInteger('view_count');
	            $table->timestamps();
	            $table->engine = 'MyISAM';
        });

        DB::statement('ALTER TABLE post ADD FULLTEXT search(title, content)');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		// delete post table
		Schema::table('post', function(Blueprint $table) {
            $table->dropIndex('search');
            $table->drop();
        });
	}

}
