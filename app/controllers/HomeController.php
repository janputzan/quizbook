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

	public function search()
	{
		if (Auth::check())
		{
			$currentUser = Auth::user();

			return View::make('search') -> with('currentUser', $currentUser);
		}

		return View::make('search');
	}

	public function searchResult()
	{
		dd(Input::all());
	}

}