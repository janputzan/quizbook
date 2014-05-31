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


	$profile = Profile::whereUid($uid)->first();

	if (empty($profile)) {

		$user = User::whereEmail($email)->first();

		if (empty($user)) {
 
	        $user = new User;
	        $user->username = $displayName;
	        $user->password = Hash::make('changeme');
	        $user->email = $email;
	    }
	    $user->profile_photo = $photo;
	 
	    $user->save();

        $profile = new Profile();
        $profile->uid = $uid;
        
        $profile = $user->profiles()->save($profile);
    }

    $profile->session = $hybridauth_session_data;
    $profile->save();

    $user = $profile->user;

    Auth::login($user);

    return Redirect::to('/')-> withErrors(array('notification' => 'You are logged in..'));


	// access user profile data
	//echo "Connected with: <b>{$provider->id}</b><br />";
	//echo "As: <b>{$userProfile->displayName}</b><br />";
	//echo "<pre>" . print_r( $userProfile, true ) . "</pre><br />";

	// logout
	//$provider->logout();
}








}