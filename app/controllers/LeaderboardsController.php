<?php

class LeaderboardsController extends BaseController {


	public function index()
	{

		
		$users = User::orderBy('total_score', 'DESC')->take(10)->get();


		if(Auth::check())
		{
			$currentUser = Auth::user();

			return View::make('leaderboards.index') -> with('currentUser', $currentUser) -> with('class','1')->with('title', 'This Week')->with('users', $users);
		}

		return View::make('leaderboards.index') -> with('class','1')->with('title', 'This Week')->with('users', $users);;

	}

	public function thisMonth()
	{

		$users = User::orderBy('total_score', 'DESC')->take(10)->get();

		if(Auth::check())
		{
			$currentUser = Auth::user();

			return View::make('leaderboards.index') -> with('currentUser', $currentUser) -> with('class','2')->with('title', 'This Month')->with('users', $users);;
		}

		return View::make('leaderboards.index') -> with('class','2')->with('title', 'This Month')->with('users', $users);;

	}

	public function thisYear()
	{

		$users = User::orderBy('total_score', 'ASC')->take(10)->get();

		if(Auth::check())
		{
			$currentUser = Auth::user();

			return View::make('leaderboards.index') -> with('currentUser', $currentUser) -> with('class','3')->with('title', 'This Year')->with('users', $users);;
		}

		return View::make('leaderboards.index') -> with('class','3')->with('title', 'This Year')->with('users', $users);;

	}

	public function allTimes()
	{

		$users = User::orderBy('total_score', 'DESC')->take(10)->get();

		if(Auth::check())
		{
			$currentUser = Auth::user();

			return View::make('leaderboards.index') -> with('currentUser', $currentUser) -> with('class','4')->with('title', 'All Times')->with('users', $users);;
		}

		return View::make('leaderboards.index') -> with('class','4')->with('title', 'All Times')->with('users', $users);;

	}





}