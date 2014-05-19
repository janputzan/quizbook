<?php

class Tag extends Eloquent {

	
//	public static $rules = ['username' => 'required | min:6 | unique:users', 
//			'password' => 'required | min:8', 
//			'email' => 'required | email | unique:users', 
//			'confirm-password' => 'required | same:password',
//			'terms-conditions' => 'required'];

	public static $messages;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'tags';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	//protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
//	public function getAuthIdentifier()
//	{
//		return $this->getKey();
//	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
//	public function getAuthPassword()
//	{
//		return $this->password;
//	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
//	public function getReminderEmail()
//	{
//		return $this->email;
//	}

	public static function isValid($data)
	{

		$validation = Validator::make( $data, static::$rules );

		if ( $validation->passes())
		{

			return true;

		}

		static::$messages = $validation->messages();

		return false;
	}

}