<?php

class QuizController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		
		if(Auth::check())
		{
			if (Input::get('back'))
				return Redirect::to('create/add-questions');

			if (Input::get('finish'))
			{
				$currentUser = Auth::user();

				/*working



				$quiz = new Quiz;

				$quiz->title = Session::get('quiz-title');

				$quiz->dificulty = 5.0;

				$quiz->user_id = $currentUser->id;

	*!*			$category = Category::where('name', '=', Session::get('category'))->first();

				$quiz->category_id = $category->id;

				$quiz->save();


				*/

				
			}
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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