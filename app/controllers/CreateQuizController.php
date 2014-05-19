<?php

class CreateQuizController extends BaseController {


	public function title()
	{

		if(Auth::check())
		{
			$currentUser = Auth::user();

			return View::make('create.title') -> with('currentUser', $currentUser) -> with('class','1');
		}

		return View::make('users.login') -> withErrors(array('notification' => 'You need to be logged in..'));

	}

	public function titleStore()
	{
		if(Auth::check())
		{
			$currentUser = Auth::user();

			
					
			$validation = Validator::make( Input::all(), ['quiz-title' => 'required | between:6,255']);

			if ($validation->fails())
			{
				return Redirect::back() -> withInput() -> withErrors($validation->messages());	
			}


					Session::put('quiz-title', Input::get('quiz-title'));
					
				

			//return View::make('create.category') -> with('currentUser', $currentUser) -> with('class','2');
			return Redirect::to('create/category');
		}

		return View::make('users.login') -> withErrors(array('notification' => 'You need to be logged in..'));


	}

	public function category()
	{

		if(Auth::check())
		{
			$currentUser = Auth::user();			

			return View::make('create.category') -> with('currentUser', $currentUser) -> with('class','2');
		}

		return View::make('users.login') -> withErrors(array('notification' => 'You need to be logged in..'));

	}

	public function categoryStore()
	{

		if(Auth::check())
		{
			$currentUser = Auth::user();

			
					
			$validation = Validator::make( Input::all(), ['category' => 'required']);

			if ($validation->fails())
			{
				return Redirect::back() -> withInput() -> withErrors($validation->messages());	
			}


					Session::put('category', Input::get('category'));
					
				

			//return View::make('create.addQuestions') -> with('currentUser', $currentUser) -> with('class','3');
			return Redirect::to('create/add-questions');
		}

		return View::make('users.login') -> withErrors(array('notification' => 'You need to be logged in..'));



	}

	public function addQuestions()
	{


		if(Auth::check())
		{
			$currentUser = Auth::user();

			return View::make('create.addQuestions') -> with('currentUser', $currentUser) -> with('class','3');
		}

		return View::make('users.login') -> withErrors(array('notification' => 'You need to be logged in..'));

	}

	public function questionsStore()
	{

		if(Auth::check())
		{
			$currentUser = Auth::user();

			
					
			$validation = Validator::make( Input::all(), ['question' => 'required']);

			if ($validation->fails())
			{
				return Redirect::back() -> withInput() -> withErrors($validation->messages());	
			}


					Session::put('question', Input::get('question'));
					
				

			//return View::make('create.addTags') -> with('currentUser', $currentUser) -> with('class','4');
			return Redirect::to('create/add-tags');
		}

		return View::make('users.login') -> withErrors(array('notification' => 'You need to be logged in..'));



	}

	public function addTags()
	{

		if(Auth::check())
		{
			$currentUser = Auth::user();

			return View::make('create.addTags') -> with('currentUser', $currentUser) -> with('class','4');
		}

		return View::make('users.login') -> withErrors(array('notification' => 'You need to be logged in..'));


	}

	public function tagsStore()
	{

		if(Auth::check())
		{
			$currentUser = Auth::user();

			
					
			$validation = Validator::make( Input::all(), ['tags' => 'required']);

			if ($validation->fails())
			{
				return Redirect::back() -> withInput() -> withErrors($validation->messages());	
			}


					Session::put('tags', Input::get('tags'));
					
				

			//return View::make('create.preview') -> with('currentUser', $currentUser) -> with('class','5');
			return Redirect::to('create/preview');
		}

		return View::make('users.login') -> withErrors(array('notification' => 'You need to be logged in..'));



	}

	public function preview()
	{

		if(Auth::check())
		{
			$currentUser = Auth::user();

			return View::make('create.preview') -> with('currentUser', $currentUser) -> with('class','5');
		}

		return View::make('users.login') -> withErrors(array('notification' => 'You need to be logged in..'));


	}

	public function share()
	{

		if(Auth::check())
		{
			$currentUser = Auth::user();

			return View::make('create.share') -> with('currentUser', $currentUser) -> with('class','6');
		}

		return View::make('users.login') -> withErrors(array('notification' => 'You need to be logged in..'));

	}

	




}