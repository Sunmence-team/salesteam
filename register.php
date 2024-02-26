<?php

if(isset($_POST['signup'])){
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

// API endpoint
$api_url = 'https://server.sales.sunmence.com.ng/register';

// Data to be sent in the request
$data = array(
    'fullname' => $fullname,
    'username' => $username,
    'email' => $email,
    'password' => $password
);

// Initialize cURL session
$curl = curl_init();

// Set cURL options
curl_setopt($curl, CURLOPT_URL, $api_url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data)); // Convert data array to URL-encoded query string
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // Return response as a string

// Execute cURL request
$response = curl_exec($curl);

// Check for errors
// echo "wo";
if ($response === false) {
    $error_message = curl_error($curl);
    // Handle error
    echo "Error occurred: $error_message";
} else {
    // Decode JSON response
    $decoded_response = json_decode($response, true);
    
    // Process response
    if ($decoded_response) {
        // API call was successful
        // print_r($decoded_response);
        session_start();
        $_SESSION["response"] = $decoded_response;
        header("location: signup.php");
    } else {
        // Error decoding JSON response
        echo "Error decoding JSON response.";
    }
}

// Close cURL session
curl_close($curl);
}
?>
