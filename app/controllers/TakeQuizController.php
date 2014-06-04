<?php

class TakeQuizController extends BaseController {

	public function takeQuiz($id)
	{

		Session::forget('quizQuestions');
		Session::forget('numberQuestions');




		$quiz = Quiz::whereId($id)->with('question.answer')->first();


		//$count = 0;

		foreach($quiz->question as $q)
		{
			
			$answers = array();
			//array_push($questions, $q->question);

			foreach ($q->answer as $a)
			{
				
				array_push($answers, array('answer' => $a->answer,'id' => $a->id));

			}

			Session::push('quizQuestions', array(
						'question' => $q->question,
						'answer1' => $answers[0],
						'answer2' => $answers[1],
						'answer3' => $answers[2],
						'answer4' => $answers[3],
						'rightAnswer' => $q->right_answer));

			//$count++;

		}		

		//dd($answers);

		Session::put('numberQuestions', sizeof(Session::get('quizQuestions')));

		Session::put('quiz', array('quizTitle' => $quiz->title, 'id' => $quiz->id));

		Session::put('score', 0);

		$time = new DateTime();

			Session::put('startTime', $time);


		return Redirect::to('take/quiz');




	}

		public function take()
		{


			if(Auth::check())
			{
				$currentUser = Auth::user();

				return View::make('take.show')-> with('currentUser', $currentUser);
			}

			return View::make('take.show');


		}


		public function play()

		{

			



			
			if (!(Session::get('quizQuestions')))

			{
				return 'no session';
			}
			
			$number = Session::get('numberQuestions');

			$count = sizeof(Session::get('quizQuestions')) - $number;


			if (Input::get('answer') == Session::get('quizQuestions')[$count]['rightAnswer'])
				{

					Session::put('score', Session::get('score') + 20);
				}

			if (Input::get('next'))
			{

				Session::put('numberQuestions', --$number );

				

				$count++;

			}

			if (Input::get('skip'))
			{
				Session::put('numberQuestions', --$number );

				

				$count++;
			}

			if (Input::get('finish'))
			{
				return Redirect::to('take/score');
			}

			



			$question = Session::get('quizQuestions')[$count];

			
				




			return View::make('take.play')->with('question', $question)->with('count', $count);


		}


		public function score()
		{

			//dd(Session::get('quiz')['id']);

			$time = new DateTime();

			$date = date_create_from_format('d/m/Y H:i:s', $time->getTimestamp());

			Session::put('endTime', $time);

			$timeTaken = Session::get('endTime')->getTimestamp() -  Session::get('startTime')->getTimestamp();

			$score = Session::get('score');

			if(Auth::check())
			{
				$currentUser = Auth::user();

				$isTaken = Taken::where('user_id', '=', $currentUser->id)->where('quiz_id', '=', Session::get('quiz')['id'], 'AND')->first();

				$isUsers = Quiz::whereId(Session::get('quiz')['id'])->where('user_id', '=', $currentUser->id, 'AND')->first();

				

				if (!$isTaken && !$isUsers)
				{

					$taken = new Taken;

					$taken->score = $score;

					$taken->time = $timeTaken;

					$taken->user_id = $currentUser->id;

					$taken->quiz_id = Session::get('quiz')['id'];

					$taken->save();

					$currentUser->total_score += $score;

					$currentUser->save();
				}

				Session::forget('quiz');
				Session::forget('score');
				Session::forget('endTime');
				Session::forget('startTime');
				Session::forget('quizQuestions');
				Session::forget('numberQuestions');




				return View::make('take.score')-> with('currentUser', $currentUser)->with('timeTaken', $timeTaken)->with('score', $score);
			}

			return View::make('take.score')->with('timeTaken', $timeTaken)->with('score', $score);



			
		}

















}