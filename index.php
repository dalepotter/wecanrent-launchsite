<?php
// Serves as a redirect controller

// Import Twig
require_once 'vendor/autoload.php';
$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader);

var_dump($_POST);

if ( $_REQUEST['path'] == 'index.html' || !array_key_exists('path', $_REQUEST) ){
	// Render hompage
	echo $twig->render('index.html');

} elseif ( $_REQUEST['path'] == 'pricing.html' ){
	// Render pricing page
	echo $twig->render('pricing.html');

} elseif ( $_REQUEST['path'] == 'getstarted.html' ){
	// Render signup form

	// Check that the service options are OK
	if (in_array($_GET['service'], array('basic', 'premium', 'ultimate'))){
		$service = $_GET['service'];
	} else {
		$service = 'unknown';
	}

	echo $twig->render('getstarted.html', array('service' => $service));

} elseif ( $_REQUEST['path'] == 'go.html' ){
	// Check for form input
	require 'mail/form_check.php';
	if (is_form_data_valid($_POST)){
		// @todo Send form data
		echo 'send email now!';
	} else {
		echo "Something was wrong with the form data. Please try again.";
	}

	// Render 'not ready' page
	echo $twig->render('oops.html');

} else {
	// Page not found
	echo "Error 404 - you've reached the wrong page somehow.";
}

?>