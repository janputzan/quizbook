<?php

class UserController extends \BaseController {

	

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::all();

		if(Auth::check())
		{
			$currentUser = Auth::user();

			return View::make('users.index') -> with('currentUser', $currentUser)->with('users', $users);
		}

		return View::make('users.index')->with('users', $users);



	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		
		if (Auth::check())

			return View::make('welcome')-> withErrors(array('notification' => 'You are already logged in..'));

		return View::make('users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		
		if ( ! User::isValid(Input::all()))
		{

			return Redirect::back() -> withInput() -> withErrors(User::$messages);

		}



			$user = new User;

			$user->username = Input::get('username');

			$user->email = Input::get('email');

			$user->password = Hash::make(Input::get('password'));

			$user->save();


		return Redirect::route('sessions.create')-> withErrors(array('notification' => 'You can now log in..'));


	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($username)
	{
		
		$user = User::where('username', '=', $username)->first();

		if (Auth::check())
		{
			$currentUser = Auth::user();
			
			

			return View::make('users.show')->with( 'user', $user)->with('currentUser', $currentUser)->with('class', '3');

		}

		return View::make('users.show')->with( 'user', $user)->with('class', '3');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response 	Removed $id as a parameter
	 */
	public function edit($username)
	{
		if (Auth::check())
		{

			

			$user = User::where('username', '=', $username)->first();

			$currentUser = Auth::user();

			if ($username != $currentUser->username)

				return View::make('users.show')->with( 'user', $user)->with('currentUser', $currentUser)-> withErrors(array('notification' => 'Not your account..'));

			



			return View::make('users.edit') -> with( 'user', $user)->with('currentUser', $currentUser)->with('class', '1');	

		}

		return Redirect::route('sessions.create')->withErrors(array('notification' => 'You need to be logged in..'));	
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response   
	 */
	public function update($username)
	{
		

		$validation = Validator::make( Input::all(), [

			'current-password' => 'required', 

			'new-password' => 'required | min:8', 

			'confirm-new-password' => ' required | same:new-password'] );

		// /dd($validation);

		if ($validation->fails())
		{
			
			

			return Redirect::back() -> withInput() -> withErrors($validation->messages())->with('class', '1');

		}



			$user = Auth::user();

		if (Hash::check(Input::get('current-password'), $user->password ))
		{
			//dd($user->password);

			$user->password = Hash::make(Input::get('new-password'));

			$user->save();

			return Redirect::back()-> withErrors(array('notification' => 'Your password has changed..'))->with('class', '1');

		}


			

		
		else
			return Redirect::back()-> withErrors(array('notification' => 'It is not your password..'));

		return Redirect::back() -> withErrors(array('notification' => 'You need to be logged in..'));


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