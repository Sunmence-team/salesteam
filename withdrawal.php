<?php
    session_start();
    if(isset($_POST['save'])){
        
        $bank_name = $_POST['bank_name'];
        $bank_number = $_POST['bank_number'];
        $amount = $_POST['amount'];

    // API endpoint
    $api_url = 'https://server.sales.sunmence.com.ng/withdraw';

    // Data to be sent in the request
    $data = array(
        
        'bank_name' => $bank_name,
        'bank_number' => $bank_number,
        'amount' => $amount,
        'email'=> $_SESSION["user_data"]['email']
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
            $_SESSION["response"] = $decoded_response;
            
            
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
    <title>Withdrawal | SALESTEAM</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="sales">
        <div class="row g-0">
            <div class="col col-lg-2 col-md-3 col-12 shadow">
                <div class="sidebar">
                    <div class="px-3 py-4">
                        <div class="logo">
                            <img src="images/Asset 38@300x.png" width="100%" alt="">
                        </div>
                        <div class="links">
                            <a href="dashboard.php">
                                <i class="bi bi-columns-gap"></i>
                                Dashboard
                            </a>
                            <a href="referral.php">
                                <i class="bi bi-people"></i>
                                Referral
                            </a>
                            <a href="withdrawal.php" class="active">
                                <i class="bi bi-cash-stack"></i>
                                Withdrawal
                            </a>
                            <a href="service.php">
                                <i class="bi bi-person"></i>
                                Service
                            </a>
                            <a href="packages.php">
                                <i class="bi bi-person"></i>
                                Packages
                            </a>
                            <hr>
                            <a href="logout.php">
                                <i class="bi bi-box-arrow-left"></i>
                                Log Out
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col col-lg-10 col-md-9 col-12">
                <div class="mainbody">
                    <div class="head py-3 px-4 d-flex justify-content-between align-items-center shadow">
                        <form action="">
                            <div class="d-flex align-items-center shadow">
                                <i class="bi bi-search"></i>
                                <input type="text" name="search" id="search" placeholder="Search">
                            </div>
                        </form>
                        <div class="ham">
                            <i class="bi bi-list"></i>
                        </div>
                        <div class="pro d-flex align-items-center gap-2">
                            <img src="images/Asset 27@300x.png" width="100%" alt="">
                            <h4>Adebayo</h4>
                        </div>
                    </div>
                    <div class="body referral my-3 px-4">
                        <center>
                            <h2>WITHDRAWAL FORM</h2>
                        </center>
                        <form action="" method="post">
                           
                            <div class="amount">
                                <label for="amount">Amount:</label>
                                <div class="d-flex">
                                    <i class="">₦</i>
                                    <input class="bord" type="number" name="amount" id="amount" placeholder="123456" required>
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col col-lg-6 col-md-6 col-12">
                                    <div class="accountNumber">
                                        <label for="accountNumber">Account number:</label>
                                        <input type="number" name="bank_number" id="accountNumber" placeholder="123456" required>
                                    </div>
                                </div>
                                <div class="col col-lg-6 col-md-6 col-12">
                                    <div class="bankName">
                                        <label for="bankName">Bank name:</label>
                                        <input type="text" name="bank_name" id="bankName" placeholder="Access Bank" required>
                                    </div>
                                </div>
                            </div>
                            <center>
                                <?php
                                    if(isset($_SESSION["response"])){
                                        $message = $_SESSION["response"]["message"];
                                        ?>
                                        <p><?=$message?></p>
                                        <?php
                                        unset($_SESSION["response"]);
                                    }
                                ?>
                                <button type="submit" name="save">Save</button>
                            </center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>