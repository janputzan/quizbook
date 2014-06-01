<?php

class HomeController extends BaseController {


	public function showWelcome()
	{
		
		if (Auth::check())
		{

			$currentUser = Auth::user();

			return View::make('welcome') -> with('currentUser', $currentUser);

		}

		return View::make('welcome');
	}

	public function show404()
	{
		if (Auth::check())
		{
			$currentUser = Auth::user();

			return View::make('404') -> with('currentUser', $currentUser);
		}

		return View::make('404');
	}

	public function fbLogin()
	{
		return View::make('login-fb');
	}

	

}