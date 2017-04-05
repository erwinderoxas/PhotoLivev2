<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use vendor\autoload;
use Abraham\TwitterOAuth\TwitterOAuth;

class twittershareController extends Controller
{
    function index($status){
    	session_start();
 		$_SESSION['status'] = $status;
		$config = [
		    //
		    'consumer_key'      => 'zV6QBOcWpgmuuuTIvvYPxtzFv',
		    'consumer_secret'   => 'uro9NKfaE3LQEVxasU92CN7iJZXCekU1SiEVPMOBZzYRGTuGN2',
		 
		    //
		    'url_login'         => 'http://localhost:8000/twitter-share',
		    'url_callback'      => 'http://localhost:8000/callback',
		];

		// create TwitterOAuth object
		$twitteroauth = new TwitterOAuth($config['consumer_key'], $config['consumer_secret']);
		 
		// request token of application
		$request_token = $twitteroauth->oauth(
		    'oauth/request_token', [
		        'oauth_callback' => $config['url_callback']
		    ]
		);
		 
		// throw exception if something gone wrong
		if($twitteroauth->getLastHttpCode() != 200) {
		    throw new \Exception('There was a problem performing this request');
		}
		 
		// save token of application to session
		$_SESSION['oauth_token'] = $request_token['oauth_token'];
		$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];
		 
		// generate the URL to make request to authorize our application
		$url = $twitteroauth->url(
		    'oauth/authorize', [
		        'oauth_token' => $request_token['oauth_token']
		    ]
		);
		// and redirect
		//echo ""header('Location: '. echo "");
		 return redirect($url);
    }
}
