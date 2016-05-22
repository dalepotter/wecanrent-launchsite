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

	// Check that the service options are OK
	if (in_array($_GET['service'], array('basic', 'premium', 'ultimate'))){
		$service = $_GET['service'];
	} else {
		$service = 'unknown';
	}

	echo $twig->render('getstarted.html', array('service' => $service));

} elseif ( $_REQUEST['path'] == 'go.html' ){
	
	if ($_POST){
	// If there is form data, validate and send

		// Check for form input
		require 'mail/form_check.php';

		// Import settings
		require_once 'config.php';

		// Import gmail email sending
		require_once 'mail/emailfromgmail.php';

		if (is_form_data_valid($_POST)){
			// Store form data in csv

			// Send form data
			$email = new emailFromGmail();
			$email->to = $email_settings['full_address'];
			$email->subject = "New wecanrent signup";
			$email->body = "New sign-up received. Here's the details: \n\n
			     Name: " . filter_var($_POST['name'], FILTER_SANITIZE_STRING) . "\n
			     Email: " . filter_var($_POST['email'], FILTER_SANITIZE_STRING) . "\n
			     Phone: " . filter_var($_POST['phone'], FILTER_SANITIZE_STRING) . "\n

			     Service: " . filter_var($_POST['service'], FILTER_SANITIZE_STRING) . "\n
			     Property postcode: " . filter_var($_POST['property_postcode'], FILTER_SANITIZE_STRING) . "\n

			     Number of properties: " . filter_var($_POST['num_properties'], FILTER_SANITIZE_STRING) . "\n
			     How did you hear about wecanrent: " . filter_var($_POST['how_heard'], FILTER_SANITIZE_STRING) . "
			";
			$email->sendEmail();

		} else {
			echo "Something was wrong with the form data. Please try again.";
		}
	}

	// Render 'not ready' page
	echo $twig->render('oops.html');

} else {
	// Page not found
	echo "Error 404 - you've reached the wrong page somehow.";
}

?>