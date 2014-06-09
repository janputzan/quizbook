<?php

class HybridAuthController extends BaseController {


	public function login($action){


		// check URL segment
		if ($action == "auth") {
			// process authentication
			try {
					
					Hybrid_Endpoint::process();

			}
			catch (Exception $e) {

				// redirect back to http://URL/social/
				return Redirect::to('social/fff');
			}

			return;
		}
	
		try {
			// create a HybridAuth object
			$socialAuth = new Hybrid_Auth(app_path() . '/config/hybridauth.php');

			// authenticate with Facebook
			$provider = $socialAuth->authenticate("Facebook");

			// fetch user profile
			$userProfile = $provider->getUserProfile();
			
		}
	
		catch(Exception $e) {
			// exception codes can be found on HybBridAuth's web site
			return $e->getMessage();
		}
	
		$hybridauth_session_data = $socialAuth->getSessionData();

		$uid = $userProfile->identifier;
		$displayName = $userProfile->displayName;
		$lastName = $userProfile->lastName;
		$photo = $userProfile->photoURL;
		$email = $userProfile->email;

		//get profile uid
		$profile = Profile::whereUid($uid)->first();


		//check if exists in DB
		if (empty($profile)) {

			//get user with email
			$user = User::whereEmail($email)->first();

			
			//if doesn't exist - create a new user
			if (empty($user)) {
	 
		        $user = new User;
		        $user->username = $displayName;
		        $user->password = Hash::make('changeme');
		        $user->email = $email;
			}

	    //add profile photo to user
	    $user->profile_photo = $photo;
	 
	    $user->save();

	    //create a new profile
        $profile = new Profile();
        $profile->uid = $uid;
        

        //associate it with user
        $profile = $user->profiles()->save($profile);

		}

	    $profile->session = $hybridauth_session_data;
	    $profile->save();

	    $user = $profile->user;


	    //log in the user
	    Auth::login($user);

	    return Redirect::to('/')-> withErrors(array('notification' => 'You are logged in..'));


	
	}

	public function share()
	{


		$user = User::whereId(Auth::user()->id)->with('profiles')->first();

		$profile = $user->profiles;

		if (empty($profile))
		{
			return  Redirect::to('/')-> withErrors(array('notification' => 'option unavailable..'));
		}

		$session = $profile->session;
		
		$hybridauth = new Hybrid_Auth(app_path() . '/config/hybridauth.php');
		$hybridauth->restoreSessionData($session);
 
		// try to authenticate with facebook
		//$adapter = $hybridauth->authenticate( "Facebook" );
		$facebook = $hybridauth->authenticate( "Facebook" );
   
		$facebook->api()->api("/me/feed", "post", array(
		  "message" => "Challenge your friends on Facebook. Create and share a quiz.",
		  "picture" => "http://quizbook.eu/images/logo_mini_bg_150.png",
		  "link"    => "http://quizbook.eu",
		  "name"    => "quizbook.eu",
		  "caption" => "Quiz your friends!"
		));

		// dd($adapter->getPermissions());
		//   // update the user status
		// $adapter->setUserStatus(
		// array(
		// "message" => "Welcome to quizbook!", // status or message content
		// "link"    => "http://quizbook.eu", // webpage link
		// // "picture" => "/public/images/logo_mini_150.png", // a picture link
		// )
		 

   		return Redirect::to('/')-> withErrors(array('notification' => 'thank you for sharing!'));

	}

	public function shareQuiz($id)
	{

		$quiz = Quiz::whereId($id)->first();

		$user = User::whereId(Auth::user()->id)->with('profiles')->first();

		$profile = $user->profiles;
		
		if (empty($profile))
		{
			return  Redirect::to('/')-> withErrors(array('notification' => 'option unavailable..'));
		}

		$session = $profile->session;
		
		$hybridauth = new Hybrid_Auth(app_path() . '/config/hybridauth.php');
		$hybridauth->restoreSessionData($session);
 
		// try to authenticate with facebook
		//$adapter = $hybridauth->authenticate( "Facebook" );
		$facebook = $hybridauth->authenticate( "Facebook" );
   
		$facebook->api()->api("/me/feed", "post", array(
		  "message" => "I challenge you to taking this quiz!",
		  "picture" => "http://quizbook.eu/images/logo_mini_bg_150.png",
		  "link"    => "http://quizbook.eu/browse/quizzes/".$quiz->id,
		  "name"    => "quizbook.eu",
		  "caption" => "Quiz your friends!"
		));

		// dd($adapter->getPermissions());
		//   // update the user status
		// $adapter->setUserStatus(
		// array(
		// "message" => "Welcome to quizbook!", // status or message content
		// "link"    => "http://quizbook.eu", // webpage link
		// // "picture" => "/public/images/logo_mini_150.png", // a picture link
		// )
		 

   		return Redirect::to('/')-> withErrors(array('notification' => 'thank you for sharing!'));
	}
}