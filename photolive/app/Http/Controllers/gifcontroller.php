<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Pomirleanu\GifCreate\GifCreate;

use URL;
class gifcontroller extends Controller
{
    function index($img1,$img2,$img3){
    		// Use an array containing file paths, resource vars (initialized with imagecreatefromXXX), 
// image URLs or binary image data.
    	// $repImg2 = str_replace('@','\\',$img2);
    	// $repImg3 = str_replace('@','\\',$img3);

$frames = array(
	'uploads/'.$img1,
	'uploads/'.$img2,
	'uploads/'.$img3
);

// Or: load images from a dir (sorted, skipping .files):
//$frames = URL::to('/uploads');

// Optionally: set different durations (in 1/100s units) for each frame
// $durations = array(20, 30, 10, 10);
$durations = array(20);

// Or: you can leave off repeated values from the end:
//$durations = array(20, 30, 10); // use 10 for the rest
// Or: use 'null' anywhere to re-apply the previous delay:
//$durations = array(250, null, null, 500);

$gif = new GifCreate();
$gif->create($frames, $durations);

// Or: using the default 100ms even delay:
//$gif->create($frames);

// Or: loop 5 times, then stop:
//$gif->create($frames, $durations, 5); // default: infinite looping
//output
 $gif = $gif->get();

// header("Content-type: image/gif");
//  echo $gif;
$d=mktime(11, 14, 54, 8, 12, 2014);
//$fname = "".date("Ymdhisa", $d);
//$fname = str_replace('C:\\Users\\Erwin\\Desktop\\photolive\\public\\uploads','',$repImg1);
$fname = str_replace('.png','',$img1);
file_put_contents('gif/'.$fname.'.gif', $gif);
//$gif->save("animated.gif");

session_start();
$_SESSION['picture'] = 'gif/'.$fname.'.gif';  
 
// // return view("gifresult");
// return redirect()->route('gifresult');
return redirect('gif-result');
exit;

    }
}
