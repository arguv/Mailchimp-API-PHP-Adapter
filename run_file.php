<?php
/*
 * Template Name: MCAPI Page
 */
require_once 'MCAPI.class.php';

$apikey ='h456x5b456c5h8d6fh3cvh5b4c3v54df6-us1'; // Enter your API key
$api = new MCAPI($apikey);
$retval = $api->lists();
$listid ='94a6vgb14'; 	// Enter list Id here

$email = $_GET['email']; 	// Enter subscriber email address
$name = $_GET['name']; 		// Enter subscriber first name
$lname = $_GET['lname']; 	// Enter subscriber last name

// By default this sends a confirmation email - you will not see new members
// until the link contained in it is clicked!

$merge_vars = array('FNAME' => $name, 'LNAME' => $lname);

if($api->listSubscribe($listid, $email, $merge_vars) === true) {
    echo 'success';
}

?>