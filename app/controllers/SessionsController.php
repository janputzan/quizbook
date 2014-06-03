<?php

class SessionsController extends BaseController {


	public function create()
	{
		
		if (Auth::check())

			return View::make('welcome')-> withErrors(array('notification' => 'you are already logged in..'));

		return View::make('users.login');
	}

	public function store()
	{

		$validation = Validator::make( Input::all(), ['username' => 'required', 'password' => 'required'] );

		if ($validation->fails())
		{
			
			return Redirect::back() -> withInput() -> withErrors($validation->messages());

		}

		if (Auth::attempt(Input::only('username', 'password')))
		{

			return Redirect::to('/')-> withErrors(array('notification' => 'you are logged in..'));

		}
		else

		return Redirect::back() -> withErrors(array('password' => 'invalid password'))->withInput(Input::except('password'));

	}

	public function destroy()
	{

		Auth::logout();

		Session::flush();

		$socialAuth = new Hybrid_Auth(app_path() . '/config/hybridauth.php');

		$socialAuth->logoutAllProviders();

		return Redirect::route('sessions.create') -> withErrors(array('notification' => 'you have logged out..'));

	}

}