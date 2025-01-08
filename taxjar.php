<?php 
// API Key for authenticating with the TaxJar API
$apiKey = 'xxxxxxxxxx';

// The zip code for which tax rates are to be fetched
$zipCode = '90504';

// Sandbox environment URL for testing (comment out this line when using the live environment)
// $url = "https://api.sandbox.taxjar.com/v2/rates/$zipCode";

// Live environment URL for production
$url = "https://api.taxjar.com/v2/rates/$zipCode";

// Initialize a cURL session with the specified URL
$ch = curl_init($url);

// Set cURL options
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    // Authorization header with the API Key
    "Authorization: Bearer $apiKey",
    // Specify that the request content type is JSON
    "Content-Type: application/json"
));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return the response as a string instead of outputting it directly

// Execute the cURL request and store the response
$response = curl_exec($ch);

// Check if the cURL request was successful
if ($response === false) {
    // If there was an error, output the cURL error message
    echo 'Curl error: ' . curl_error($ch);
} else {
    // Decode the JSON response into an associative array
    $responseData = json_decode($response, true);
    // (Optional) Process $responseData here as needed
}

// Close the cURL session to free resources
curl_close($ch);

?>