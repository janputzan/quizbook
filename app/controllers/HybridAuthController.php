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

		// authenticate with Google
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








}