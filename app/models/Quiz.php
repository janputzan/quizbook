<?php

class Quiz extends Eloquent {


	protected $table = 'quizzes';

	public function user()
    {
        return $this->belongsTo('User');
    }

    public function category()
    {
    	return $this->belongsTo('Category');
    }

    public function question()
    {
    	return $this->hasMany('Question');
    }

    public function tag()
    {
    	return $this->hasMany('Tags');
    }


}