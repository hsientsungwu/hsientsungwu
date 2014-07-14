<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('home');
});

Route::get('/blog', function() {
	// list top 10 blog posts
	$posts = DB::table('post')->orderBy('id', 'desc')->paginate(5);

	return View::make('blog')->with('posts', $posts);
});

Route::get('/blog/post/{alias}', function($alias) {
	$post = Post::where('alias', '=', $alias)->first();

	return View::make('post')->with('post', $post);
});

Route::get('/contact', function()
{
	return View::make('contact');
});
