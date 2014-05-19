<?php

class SessionsController extends BaseController {


	public function create()
	{
		
		if (Auth::check())

			return View::make('welcome')-> withErrors(array('notification' => 'You are already logged in..'));

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

			return Redirect::to('/')-> withErrors(array('notification' => 'You are logged in..'));

		}
		else

		return Redirect::back() -> withErrors(array('password' => 'Invalid Password'))->withInput(Input::except('password'));

	}

	public function destroy()
	{

		Auth::logout();

		Session::flush();

		return Redirect::route('sessions.create') -> withErrors(array('notification' => 'You have logged out..'));

	}

}