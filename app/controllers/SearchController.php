<?php

class SearchController extends BaseController {

	public function search()
	{
		
		$users = array();

		$quizzes = array();

		$tags = array();




		if (Auth::check())
		{
			$currentUser = Auth::user();

			return View::make('search') -> with('currentUser', $currentUser)->with('users', $users)->with('quizzes', $quizzes)->with('tags', $tags);
		}

		return View::make('search')->with('users', $users)->with('quizzes', $quizzes)->with('tags', $tags);
	}

	public function searchResult()
	{
		$q = Input::get('search');

		$searchTerms = explode(' ', $q);

		$users = array();

		$quizzes = array();

		$tags = array();

		if (Input::get('users')==='yes')
		{
			
			$query = DB::table('users');
		
			foreach($searchTerms as $term)
			{
				
				$query->where('username', 'LIKE', '%'. $term .'%');
	
			}
	
			$users = $query->get();

		}

		if (Input::get('quizzes')==='yes')
		{
			
			$query = DB::table('quizzes');
		
			foreach($searchTerms as $term)
			{
				
				$query->where('title', 'LIKE', '%'. $term .'%');
	
			}
	
			$quizzes = $query->get();

		}

		if (Input::get('tags')==='yes')
		{
			
			$query = DB::table('tags');
		
			foreach($searchTerms as $term)
			{
				
				$query->where('name', 'LIKE', '%'. $term .'%');
	
			}
	
			$tags = $query->get();

		}

		if (Auth::check())
		{
			$currentUser = Auth::user();

			return View::make('search') -> with('currentUser', $currentUser)->with('users', $users)->with('quizzes', $quizzes)->with('tags', $tags);
		}

		return View::make('search')->with('users', $users)->with('quizzes', $quizzes)->with('tags', $tags);



	}



	public function searchUsers() 
	{

		$q = Input::get('search');

		$searchTerms = explode(' ', $q);

		$query = DB::table('users');

		foreach($searchTerms as $term)
		{
			
			$query->where('username', 'LIKE', '%'. $term .'%');

		}

		$users = $query->get();

		if(Auth::check())
		{
			
			$currentUser = Auth::user();

			return View::make('users.index') -> with('currentUser', $currentUser)->with('users', $users);

		}

		return View::make('users.index')->with('users', $users);

	}

	public function searchTags() 
	{

		$q = Input::get('search');

		$searchTerms = explode(' ', $q);

		$query = DB::table('tags');

		foreach($searchTerms as $term)
		{
			
			$query->where('name', 'LIKE', '%'. $term .'%');

		}

		$tags = $query->get();

		if(Auth::check())
		{
			
			$currentUser = Auth::user();

			return View::make('browse.tags') -> with('currentUser', $currentUser)->with('tags', $tags);

		}

		return View::make('browse.tags')->with('tags', $tags);

	}








}