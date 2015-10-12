<?php
/*
 * Example connect to mailchimp
 */
 //==============================================
require_once 'MCAPI.class.php';

$apikey ='xzxzxzxzxzxzxzxzxzxzxzxzxzxzxzxzx-us1';	// Enter your API key here
$api = new MCAPI($apikey);

//==============================================

$retval = $api->lists();	// get all info from lists

//============ details for sending =============

$listid ='xxxxxxxxx';	// Enter your list Id here that you want to use

$req_email = $_GET['email'];
$first_name = $_GET['fname'];
$last_name = $_GET['lname'];
$person_id = $_GET['id'];

//==============================================
// By default this sends a confirmation email - you will not see new members
// until the link contained in it is clicked!
// But if you put 'false' option it will not send a confirmation email.

$merge_vars = array('FNAME' => $first_name, 'LNAME' => $last_name, 'PERSONID' => $person_id, 'optin-confirm' => 'on');

// FNAME , LNAME , PERSONID	->	these fields in mailchimp

$api->listSubscribe($listid, $req_email, $merge_vars, 'html', false);
