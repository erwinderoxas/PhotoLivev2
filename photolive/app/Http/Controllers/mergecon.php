<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class mergecon extends Controller
{
    function index(){
    	define('UPLOAD_DIR', 'merge/');
		$img = $_POST['base64image'];
		$fname = $_POST['fname'];
		$img = str_replace('data:image/png;base64,', '', $img);
		$img = str_replace(' ', '+', $img);
		
		$data = base64_decode($img);
		// $fname = "".date("Ymdhisa");
		// $fname = str_replace('am','',$fname);
		// $fname = str_replace('pm','',$fname);
		$file = UPLOAD_DIR . $fname;
		session_start();
		$_SESSION['picture'] = 'merge/'.$fname; 
		$success = file_put_contents($file, $data);
		print $success ? $file : 'Unable to save the file.';
    }
}
