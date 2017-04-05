<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use vendor\autoload;
use Abraham\TwitterOAuth\TwitterOAuth;
class twittercallback extends Controller
{
    function index(){
    	session_start();
 
		$config = [
		    //
		    'consumer_key'      => 'zV6QBOcWpgmuuuTIvvYPxtzFv',
		    'consumer_secret'   => 'uro9NKfaE3LQEVxasU92CN7iJZXCekU1SiEVPMOBZzYRGTuGN2',
		 
		    //
		    'url_login'         => 'http://localhost:8000/twitter-share',
		    'url_callback'      => 'http://localhost:8000/callback',
		];

		$oauth_verifier = filter_input(INPUT_GET, 'oauth_verifier'); 
		 
		if (empty($oauth_verifier) ||
		    empty($_SESSION['oauth_token']) ||
		    empty($_SESSION['oauth_token_secret'])
		) {
		    // something's missing, go and login again
		    header('Location: ' . $config['url_login']);
		}

		// connect with application token
		$connection = new TwitterOAuth(
		    $config['consumer_key'],
		    $config['consumer_secret'],
		    $_SESSION['oauth_token'],
		    $_SESSION['oauth_token_secret']
		);
		 

		// request user token
		$token = $connection->oauth(
		    'oauth/access_token', [
		        'oauth_verifier' => $oauth_verifier
		    ]
		);



		$twitter = new TwitterOAuth(
		    $config['consumer_key'],
		    $config['consumer_secret'],
		    $token['oauth_token'],
		    $token['oauth_token_secret']
		);
		// $repImg = str_replace("@","",$_SESSION['picture']);
		// $rep1Img = str_replace(".jpg",".png",$repImg);
		// $list = explode(".png", $rep1Img);
		// $image = $list[0].".png";
		$image = $_SESSION['picture'];
		
		$connection = new TwitterOAuth($config['consumer_key'], $config['consumer_secret'], $token['oauth_token'], $token['oauth_token_secret']);
		$media1 = $connection->upload('media/upload', ['media' => $image]);
		$parameters = [
		    'status' => $_SESSION['status'],
		    'media_ids' => implode(',', [$media1->media_id_string]),
		];
		$result = $connection->post('statuses/update', $parameters);

		// $this->api = new TwitterOAuth($config['consumer_key'], $config['consumer_secret'],$token['oauth_token'], $token['oauth_token_secret']);  

		// $attachment = "./images/post.png";
		// $image = "@{$attachment};type=image/png";
		// $status = "Text";                                                                                                                                                                                                                                                                                                                                                         
		// $result = $this->api->upload('statuses/update_with_media',array('status'=>$message,'media[]'=>$image));



		// $status = $twitter->post(
		//     "statuses/update", [
		//         "status" => "TEST".$image,
		//        // "image_path" => "images/post.png"
		//     ]
		// );
		if (empty($oauth_verifier) ||
		    empty($_SESSION['oauth_token']) ||
		    empty($_SESSION['oauth_token_secret'])
		) {
		}else{
			unset($_SESSION['oauth_token']);
			return redirect('/');
		}
		//echo ('Created new status');
    }
}
