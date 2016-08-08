<?php
// Gigya PHP - audit.search example
// Written by Nadeem Rasool
// For this to work, you must be running in SSL mode and GSRequest must have useHTTPS = True
include_once "GSSDK.php";

// Define the API-Key and Secret key (the keys can be obtained from your site setup page on Gigya's website).
$apiKey = "xxxxxx";
$userkey = "xxxxxx";
$secretKey = "xxxxxx";;
$method = "audit.search";

// Request
$request = new GSRequest($apiKey,$secretKey,$method,null, true);
$request->setParam("userKey",$userkey); 
$request->setParam("query", "SELECT * FROM auditLog where endpoint like 'accounts.%'");  // Running SQL query
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
