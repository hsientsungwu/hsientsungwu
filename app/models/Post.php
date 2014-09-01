<?php

class Post extends Eloquent {
	protected $table = 'post';

	public static $rules = array(
		'title' => 'required',
		'content' => 'required'
	);
}