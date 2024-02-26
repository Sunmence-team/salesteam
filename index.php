<?php

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

// API endpoint
$api_url = 'https://server.sales.sunmence.com.ng/login';

// Data to be sent in the request
$data = array(
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
        if($_SESSION["response"]["status"] == "failed"){
            
            // header("location: index.php");
            
            // var_dump($_SESSION["response"]);
        }else{
            $_SESSION["user_data"] = $decoded_response;
            header("location: dashboard.php");
            // var_dump($_SESSION["user_data"]);
        }
       
    } else {
        // Error decoding JSON response
        echo "Error decoding JSON response.";
    }
}

// Close cURL session
curl_close($curl);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | SALESTEAM</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="sales">
        <div class="login">
            <div class="form shadow-lg">
                <div class="icon text-center">
                    <i class="bi bi-person shadow-lg"></i>
                    <h2 class="fw-bolder my-4">LOGIN PAGE</h2>
                </div>
                <form action="" method="post">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-person-fill"></i>
                        <input type="email" name="email" id="email" placeholder="Email Address" required>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="bi bi-lock-fill"></i>
                        <input type="password" name="password" id="password" placeholder="Password" required>
                    </div>
                    <button name="login" class="shadow-lg">LOGIN</button>
                    <?php
                       
                        if(isset($_SESSION["response"])){
                            $message = $_SESSION["response"]["message"];
                            $status = $_SESSION["response"]["status"];
                            if($status == "failed"){
                                ?>
                                    <p class="text-danger"><?=$message?></p>
                                <?php
                            }elseif($status == "success"){
                                ?>
                                    <p class="text-success"><?=$message?></p>
                                <?php
                            }
                            unset($_SESSION["response"]);
                        }
                    
                    ?>
                </form>
            </div>
        </div>
    </div>
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>