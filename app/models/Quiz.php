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
    	return $this->belongsToMany('Question', 'quizzes_questions', 'quiz_id', 'question_id');
    }

    public function tag()
    {
    	return $this->belongsToMany('Tag', 'quizzes_tags', 'quiz_id', 'tag_id');
    }

    public function taken()
    {
        return $this->hasMany('Taken');
    }


}