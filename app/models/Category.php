<?php

class Category extends Eloquent {

	


	
	protected $table = 'categories';

	public function quiz()
    {
    	return $this->hasMany('Quiz');
    }

}