<?php

class Quiz extends Eloquent {


	protected $table = 'quizzes';

	public function user()
    {
        return $this->belongsTo('User');
    }

    


}