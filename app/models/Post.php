<?php

class Post extends Eloquent {
	protected $table = 'post';

	 protected $guarded = array();

	public static $rules = array(
		'title' => 'required',
		'content' => 'required'
	);
}