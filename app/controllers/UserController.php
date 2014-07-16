<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getLogin()
	{
		// user login
		return View::make('login');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function postLogin()
	{
		// process user login
		$user = array(
	        'username' => Input::get('username'),
	        'password' => Input::get('password')
	    );

	    if (Auth::attempt($user)) {
	        return Redirect::to('admin')->with('msg-success', 'You are successfully logged in.');
	    }
	    
	    // authentication failure! lets go back to the login page
	    return Redirect::to('user/login')->with('msg-danger', 'Your username/password combination was incorrect.')->withInput();
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function getLogout()
	{
		// user logout
		Auth::logout();

    	return Redirect::route('/');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
