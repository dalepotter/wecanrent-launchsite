<?php
// Serves as a redirect controller

// Import Twig
require_once 'vendor/autoload.php';
$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader);

if ( $_REQUEST['path'] == 'index.html' || !array_key_exists('path', $_REQUEST) ){
	// Render hompage
	echo $twig->render('index.html');

} elseif ( $_REQUEST['path'] == 'pricing.html' ){
	// Render pricing page
	echo $twig->render('pricing.html');

} elseif ( $_REQUEST['path'] == 'getstarted.html' ){
	// Render signup form
	echo $twig->render('getstarted.html');

} elseif ( $_REQUEST['path'] == 'oops.html' ){
	// Render 'not ready' page
	echo $twig->render('oops.html');

} else {
	// Page not found
	echo "Error 404 - you've reached the wrong page somehow.";
}

?>