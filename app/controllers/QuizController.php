<?php

class QuizController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
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

				



				$quiz = new Quiz;

				$quiz->title = Session::get('quiz-title');

				$quiz->dificulty = 5.0;

				$quiz->user_id = $currentUser->id;

				$quiz->category_id = Session::get('category');

				$quiz->save();

				
				$tags = Session::get('tags');

				foreach ($tags as $name)
				{
					
					//get tag with name
					$tag = Tag::whereName($name)->first();


					//check if exists in DB
					if (empty($tag)) {

						$tag = new Tag;

						$tag->name =$name;

						$tag->save();


					}
						
					$quiz->tag()->attach($tag->id);

				}

				//$question = new Question;

				$cont = Session::get('questions');

				for ($i = 0; $i < sizeof(Session::get('questions')); $i++)
				{

					$answer1 = new Answer;

					$answer1->answer = $cont[$i]['answer1'];

					$answer1->save();

					$answer2 = new Answer;

					$answer2->answer = $cont[$i]['answer2'];

					$answer2->save();

					$answer3 = new Answer;

					$answer3->answer = $cont[$i]['answer3'];

					$answer3->save();

					$answer4 = new Answer;

					$answer4->answer = $cont[$i]['answer4'];

					$answer4->save();



					$question = new Question;

					$question->question = $cont[$i]['question'];

					switch ($cont[$i]['rightAnswer'])
					{
						case '1':
							$question->right_answer = $answer1->id;
							break;
						case '2':
							$question->right_answer = $answer2->id;
							break;
						case '3':
							$question->right_answer = $answer3->id;
							break;
						case '4':
							$question->right_answer = $answer4->id;
							break;
					}

					$question->save();


					$question->answer()->attach($answer1->id);
					$question->answer()->attach($answer2->id);
					$question->answer()->attach($answer3->id);
					$question->answer()->attach($answer4->id);

					$quiz->question()->attach($question->id);


				}

				//adding 50 points for creating a quiz and 20 points for each question to the total score 

				$currentUser->total_score += 50 + sizeof(Session::get('questions')) * 20;
				$currentUser->save();

				Session::forget('quiz-title');
				Session::forget('category');
				Session::forget('tags');
				Session::forget('questions');


				return Redirect::to('/')-> withErrors(array('notification' => 'Quiz created..'));
				

				
			}
		}

		return Redirect::to('users.login') -> withErrors(array('notification' => 'You need to be logged in..'));
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