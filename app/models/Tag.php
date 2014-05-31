<?php

class Tag extends Eloquent {


	protected $table = 'tags';

	public function quiz()
	{

		return $this->belongsToMany('Quiz', 'quizzes_tags', 'quiz_id', 'tag_id');
	}

}