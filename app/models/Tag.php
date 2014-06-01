<?php

class Tag extends Eloquent {


	protected $table = 'tags';

	public $timestamps = false;

	public function quiz()
	{

		return $this->belongsToMany('Quiz', 'quizzes_tags', 'tag_id', 'quiz_id');
	}

}