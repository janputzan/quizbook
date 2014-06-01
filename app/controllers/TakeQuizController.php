<?php

class TakeQuizController extends BaseController {

	public function takeQuiz($id)
	{

		$quiz = Quiz::whereId($id)->first();


		return $quiz->title;




	}


















}