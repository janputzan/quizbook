<?php

class CreateQuizController extends BaseController {


	public function title()
	{

		if(Auth::check())
		{
			$currentUser = Auth::user();

			return View::make('create.title') -> with('currentUser', $currentUser) -> with('class','1');
		}

		return View::make('users.login') -> withErrors(array('notification' => 'you need to be logged in..'));

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

		return View::make('users.login') -> withErrors(array('notification' => 'you need to be logged in..'));


	}

	public function category()
	{

		if(Auth::check())
		{
			$currentUser = Auth::user();	

			$categories = Category::lists('name', 'id');		

			return View::make('create.category') -> with('currentUser', $currentUser) -> with('class','2') ->with('categories' , $categories);
		}

		return View::make('users.login') -> withErrors(array('notification' => 'you need to be logged in..'));

	}

	public function categoryStore()
	{

		if(Auth::check())
		{
			$currentUser = Auth::user();

			if (Input::get('back'))
				return Redirect::to('create/title');
					
			$validation = Validator::make( Input::all(), ['category' => 'required']);

			if ($validation->fails())
			{
				return Redirect::back() -> withInput() -> withErrors($validation->messages());	
			}


					Session::put('category', Input::get('category'));
					
					//dd(Session::get('category'));

			//return View::make('create.addQuestions') -> with('currentUser', $currentUser) -> with('class','3');
			return Redirect::to('create/add-questions');
		}

		return View::make('users.login') -> withErrors(array('notification' => 'you need to be logged in..'));



	}

	public function addQuestions()
	{


		if(Auth::check())
		{
			$currentUser = Auth::user();

			return View::make('create.addQuestions') -> with('currentUser', $currentUser) -> with('class','3');
		}

		return View::make('users.login') -> withErrors(array('notification' => 'you need to be logged in..'));

	}

	public function questionsStore()
	{

		if(Auth::check())
		{
			$currentUser = Auth::user();
			
			if (Input::get('back'))
				return Redirect::to('create/category');

			if (Input::get('next'))
			{
				
				
				if (sizeof(Session::get('questions'))<6)
				{

					return Redirect::to('create/add-questions') -> withErrors(array('notification' => 'at least 6 questions!'));
				}

				
			}
					
			

			if(Input::get('addQuestion'))
			{

				$validation = Validator::make( Input::all(), ['question' => 'required | max:250', 
															'answer-1' => 'required',
															'answer-2' => 'required',
															'answer-3' => 'required',
															'answer-4' => 'required',
															'rightAnswer' => 'required']);

				if ($validation->fails())
				{
					return Redirect::back() -> withInput() -> withErrors($validation->messages());	
				}
					

					Session::push('questions', array(
						'question' => Input::get('question'),
						'answer1' => Input::get('answer-1'),
						'answer2' => Input::get('answer-2'),
						'answer3' => Input::get('answer-3'),
						'answer4' => Input::get('answer-4'),
						'rightAnswer' => Input::get('rightAnswer')));

					
					//dd(sizeof(Session::get('questions')));
					return Redirect::to('create/add-questions');

			}

				

			//return View::make('create.addTags') -> with('currentUser', $currentUser) -> with('class','4');
			return Redirect::to('create/add-tags');
		}

		return View::make('users.login') -> withErrors(array('notification' => 'you need to be logged in..'));



	}

	public function addTags()
	{

		if(Auth::check())
		{
			$currentUser = Auth::user();

			return View::make('create.addTags') -> with('currentUser', $currentUser) -> with('class','4');
		}

		return View::make('users.login') -> withErrors(array('notification' => 'you need to be logged in..'));


	}

	public function tagsStore()
	{

		if(Auth::check())
		{
			$currentUser = Auth::user();

			if (Input::get('back'))
				return Redirect::to('create/add-questions');
					
			$validation = Validator::make( Input::all(), ['tags' => 'required']);

			if ($validation->fails())
			{
				return Redirect::back() -> withInput() -> withErrors($validation->messages());	
			}


					$tags = explode(" ", Input::get('tags'));


					Session::put('tags', $tags);
					
					//dd(Session::get('tags'));

			//return View::make('create.preview') -> with('currentUser', $currentUser) -> with('class','5');
			return Redirect::to('create/preview');
		}

		return View::make('users.login') -> withErrors(array('notification' => 'you need to be logged in..'));



	}

	public function preview()
	{

		if(Auth::check())
		{
			$currentUser = Auth::user();

			return View::make('create.preview') -> with('currentUser', $currentUser) -> with('class','5');
		}

		return View::make('users.login') -> withErrors(array('notification' => 'you need to be logged in..'));


	}

	public function share()
	{

		if(Auth::check())
		{
			$currentUser = Auth::user();

			$points = Session::get('score');

			$quiz = Quiz::whereId(Session::get('quiz_id'))->first();

			Session::forget('quiz_id');

			Session::forget('score');

			return View::make('create.share') -> with('currentUser', $currentUser) -> with('class','6')->with('points', $points)->with('quiz', $quiz);
		}

		return View::make('users.login') -> withErrors(array('notification' => 'you need to be logged in..'));

	}

	public function editQuestions($id)
	{
		if(Auth::check())
		{
			$currentUser = Auth::user();

			return View::make('create.editQuestions') -> with('currentUser', $currentUser) -> with('class','3') -> with('id',$id);
		}

		return View::make('users.login') -> withErrors(array('notification' => 'you need to be logged in..'));

	}

	public function storeEditQuestions($id)
	{
		if(Auth::check())
		{
			
			if (Input::get('cancel'))
				return Redirect::to('create/add-questions');

			$currentUser = Auth::user();
			
			
					
			$validation = Validator::make( Input::all(), ['question' => 'required', 
															'answer-1' => 'required',
															'answer-2' => 'required',
															'answer-3' => 'required',
															'answer-4' => 'required',
															'rightAnswer' => 'required']);

			if ($validation->fails())
			{
				return Redirect::back() -> withInput() -> withErrors($validation->messages());	
			}




			if (Input::get('save'))
			{
				
				$cont = Session::get('questions');

				$cont[$id] = array(
						'question' => Input::get('question'),
						'answer1' => Input::get('answer-1'),
						'answer2' => Input::get('answer-2'),
						'answer3' => Input::get('answer-3'),
						'answer4' => Input::get('answer-4'),
						'rightAnswer' => Input::get('rightAnswer'));

				Session::put('questions', $cont);

				return Redirect::to('create/add-questions');
				
			}	

			//return View::make('create.addTags') -> with('currentUser', $currentUser) -> with('class','4');
			//
		}

		return View::make('users.login') -> withErrors(array('notification' => 'you need to be logged in..'));


	}

	public function deleteQuestions($id)
	{


		if(Auth::check())
		{
			
			// dump Session to array

			$cont = Session::get('questions');

			// delete an item from array (key = $id)

			unset($cont[$id]);

			// normalize integer keys

			$cont = array_values($cont);

			//store array in Session

			Session::put('questions', $cont);

			return Redirect::to('create/add-questions');
		}
		
		return View::make('users.login') -> withErrors(array('notification' => 'you need to be logged in..'));

	}




}