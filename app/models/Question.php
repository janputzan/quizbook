<?php

class Question extends Eloquent {

	

	protected $table = 'questions';

	 public function answer()
    {
    	return $this->hasMany('Answer');
    }

    public function quiz()
    {
    	//return $this->belongsToMany('Quiz');

    	return $this->belongsToMany('Quiz', 'quizzes_questions', 'quiz_id', 'question_id');
    }

}