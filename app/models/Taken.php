<?php

class Taken extends Eloquent {


	protected $table = 'quizzes_taken';

	

	

	public function quiz()
    {
    	return $this->belongsTo('Quiz');
    }

    public function user()
    {
    	return $this->belongsTo('User');
    }

}