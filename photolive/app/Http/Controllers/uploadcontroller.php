<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class uploadcontroller extends Controller
{
	function index(){
		define('UPLOAD_DIR', 'uploads/');
		$img = $_POST['base64image'];
		$fname = $_POST['fname'];
		$img = str_replace('data:image/jpeg;base64,', '', $img);
		$img = str_replace(' ', '+', $img);
		$data = base64_decode($img);
		// $fname = "".date("Ymdhisa");
		// $fname = str_replace('am','',$fname);
		// $fname = str_replace('pm','',$fname);
		$file = UPLOAD_DIR . $fname . '.png';
		$success = file_put_contents($file, $data);
		print $success ? $file : 'Unable to save the file.';
		//localStorage.gif-picture += "."+$fname;
	}
	
	// public function update(Request $request)
 //    {
 //        $path = $request->file('base64image')->store('uploads');

 //        return $path;
 //    }

    
}

	

