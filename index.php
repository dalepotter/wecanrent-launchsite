<?php
// Serves as a redirect controller

// Import Twig
require_once 'vendor/autoload.php';
$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader);

if ( $_REQUEST['path'] == 'index.html' || !array_key_exists('path', $_REQUEST) ){
	// Render hompage
	$twig->render('index.html');

} elseif ( $_REQUEST['path'] == 'pricing.html' ){
	// Render pricing page
	$twig->render('pricing.html');
}

?>