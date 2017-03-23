<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class regresultcoontroller extends Controller
{
    function index($pic){
    	session_start();
		$_SESSION['picture'] = $pic;
		return redirect('regular-result');
    }
}
