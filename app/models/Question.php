<?php

class Question extends Eloquent {

	

	protected $table = 'questions';

	public $timestamps = false;

	 public function answer()
    {
    	return $this->belongsToMany('Answer', 'questions_answers', 'question_id', 'answer_id');
    }

    public function quiz()
    {
    	//return $this->belongsToMany('Quiz');

    	return $this->belongsToMany('Quiz', 'quizzes_questions', 'quiz_id', 'question_id');
    }

}