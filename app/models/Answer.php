<?php

class Answer extends Eloquent {

	

	protected $table = 'answers';

	public $timestamps = false;


	 public function question()
    {
    	//return $this->belongsToMany('Question');

    	return $this->belongsToMany('Question', 'questions_answers', 'question_id', 'answer_id');
    }

}