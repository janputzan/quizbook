<?php

class BrowseController extends BaseController {


	public function categories()
	{
		$categories = Category::all();

		if(Auth::check())
		{
			$currentUser = Auth::user();

			return View::make('browse.categories') -> with('currentUser', $currentUser)->with('categories', $categories);
		}

		return View::make('browse.categories')->with('categories', $categories);
	}


	public function showCategory($name)
	{

		//$posts = Post::has('comments')->get();

		$category = Category::where('name', '=', $name )->first();

		$categories = Category::all();


		

		//get all quizzes in the category

		$quizzes = Category::find($category->id)->quiz()->where('category_id', $category->id)->get();






		//$quizzes = Quiz::has('category')->get();

		//dd($quizzes);

		if(Auth::check())
		{
			$currentUser = Auth::user();

			return View::make('browse.category') -> with('currentUser', $currentUser)->with('quizzes', $quizzes)->with('name', $name)->with('categories', $categories);
		}

		return View::make('browse.category')->with('quizzes', $quizzes)->with('name', $name)->with('categories', $categories);

	}

	public function showQuiz($id)
	{

		$quiz = Quiz::find($id)->first();

		$categories = Category::all();

		//get the name of category that the quiz belongs to

		$name = $quiz->category()->first()->name;

		

		//get the owner of the quiz

		$owner = User::find($quiz->user_id)->username;


		//get the number of questions in the quiz

		$numberQuestions = $quiz->question()->count();


		//get number of time the quiz has been taken

		$numberTaken = $quiz->taken()->count();

		
		//get the highest score for the quiz

		$bestScore = $quiz->taken()->orderBy('score', 'DESC')->first();


		//if quiz hasn't been taken yet set bestScore to 0

		if (is_null($bestScore))

			$bestScore = 0;



		if(Auth::check())
		{
			$currentUser = Auth::user();

			return View::make('browse.quiz') -> with('currentUser', $currentUser)->with('quiz', $quiz)->with('name', $name)->with('owner', $owner)->with('count', $numberQuestions)->with('taken', $numberTaken)->with('bestScore', $bestScore);
		}

		return View::make('browse.quiz')->with('quiz', $quiz)->with('name', $name)->with('owner', $owner)->with('count', $numberQuestions)->with('taken', $numberTaken)->with('bestScore', $bestScore);





	}


	public function allQuizzes()
	{

		$quizzes = Quiz::orderBy('title', 'ASC')->get();

		if(Auth::check())
		{
			$currentUser = Auth::user();

			return View::make('browse.quizzes') -> with('currentUser', $currentUser)->with('quizzes', $quizzes)->with('title', 'all');
		}

		return View::make('browse.quizzes')->with('quizzes', $quizzes)->with('title', 'all');



	}

	public function newest()
	{

		$quizzes = Quiz::orderBy('created_at', 'DESC')->get();

		if(Auth::check())
		{
			$currentUser = Auth::user();

			return View::make('browse.quizzes') -> with('currentUser', $currentUser)->with('quizzes', $quizzes)->with('title', 'newest');
		}

		return View::make('browse.quizzes')->with('quizzes', $quizzes)->with('title', 'newest');

	}

	public function dificult()
	{

		$quizzes = Quiz::orderBy('dificulty', 'DESC')->get();

		if(Auth::check())
		{
			$currentUser = Auth::user();

			return View::make('browse.quizzes') -> with('currentUser', $currentUser)->with('quizzes', $quizzes)->with('title', 'most dificult');
		}

		return View::make('browse.quizzes')->with('quizzes', $quizzes)->with('title', 'most dificult');



	}

	public function easiest()
	{

		$quizzes = Quiz::orderBy('dificulty', 'ASC')->get();

		if(Auth::check())
		{
			$currentUser = Auth::user();

			return View::make('browse.quizzes') -> with('currentUser', $currentUser)->with('quizzes', $quizzes)->with('title', 'easiest');
		}

		return View::make('browse.quizzes')->with('quizzes', $quizzes)->with('title', 'easiest');



	}

	public function showTags()
	{

		$tags = Tag::orderBy('name', 'ASC')->get();


		if(Auth::check())
		{
			$currentUser = Auth::user();

			return View::make('browse.tags') -> with('currentUser', $currentUser)->with('tags', $tags);
		}

		return View::make('browse.tags')->with('tags', $tags);


	}

	public function byTags($name)
	{

		$tag = Tag::where('name', $name)->first();

		//$posts = Post::has('comments')->get();

		$quizzes = Quiz::has('tag')->get();

		

		if(Auth::check())
		{
			$currentUser = Auth::user();

			return View::make('browse.quizzes')-> with('currentUser', $currentUser)->with('quizzes', $quizzes)->with('title', $tag->name);
		}

		return View::make('browse.quizzes')->with('quizzes', $quizzes)->with('title', $tag->name);



	}












}