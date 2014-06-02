<?php

class TakeQuizController extends BaseController {

	public function takeQuiz($id)
	{

		$quiz = Quiz::whereId($id)->with('question.answer')->first();


		
		

		return View::make('quizzes.show')->with('quiz', $quiz);




	}


















}