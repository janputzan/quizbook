<?php

class TakeQuizController extends BaseController {

	public function takeQuiz($id)
	{

		$quiz = Quiz::whereId($id)->first();


		$questions = $quiz->question()->get();

		$count = 0;
		

		$content = array();

		$answers = array();

		foreach ($questions as $q)
		{

			$a = $q->answer()->get();
			$count2 = 0;

			foreach($a as $answer)
			{

				$answers = array_add($answers, $count2, array('answer' => $answer->id));
				$count2++;

			}

			$rightAnswer = $q->right_answer;

			$question = $q->question;

			$content = array_add($content, $count, array(array('answers' => $answers),
														'rightAnswer' => $rightAnswer,
														'question' => $question));
			$count++;
		}

		

		return $content;




	}


















}