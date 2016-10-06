<?php
// Gigya PHP - audit.search example
// Written by Nadeem Rasool
// For this to work, you must be running in SSL mode and GSRequest must have useHTTPS = True
include_once "GSSDK.php";

// Define the API-Key and Secret key (the keys can be obtained from your site setup page on Gigya's website).
$apiKey = "xxxxx";
$userkey = "xxxx";
$secretKey = "xxx"; // This must be the secretkey for your userkey, NOT PARTNERID secret key
$method = "accounts.search";

// Request
$request = new GSRequest($apiKey,$secretKey,$method,null, true);
$request->setParam("userKey",$userkey); 
$request->setParam("query", "select UID from accounts where isVerified = False ");  // Running SQL query

// Set your domain name to which the API key is residing
$request->setAPIDomain("us1.gigya.com"); 

//Sending the request
$response = $request->send();

// Step 4 - handling the request's response.
if($response->getErrorCode()==0)

{    // SUCCESS! response status = OK
     echo $response;
     echo var_dump(json_decode($response, true));

}
else

{  // Error
     echo ("Got error: " . $response->getErrorMessage());
     error_log($response->getLog());
}

?>
