<?php
session_start();
// var_dump($_SESSION["user_data"]);
if(isset($_SESSION["user_data"])){

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | SALESTEAM</title>
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
            <div class="col col-lg-2 col-md-3 col-12 shadow-lg">
                <div class="sidebar">
                    <div class="px-3 py-4">
                        <div class="logo">
                            <img src="images/Asset 38@300x.png" width="100%" alt="">
                        </div>
                        <div class="links px-2">
                            <a href="dashboard.php" class="active">
                                <i class="bi bi-columns-gap"></i>
                                Dashboard
                            </a>
                            <a href="referral.php">
                                <i class="bi bi-people"></i>
                                Referral
                            </a>
                            <a href="withdrawal.php">
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
                            <h4><?php echo $_SESSION["user_data"]['fullname'] ?></h4>
                        </div>
                    </div>
                    <div class="body my-3 px-4">
                        <div class="row g-4">
                            <div class="col col-lg-4 col-md-6 col-12">
                                <div class="bal p-3 shadow">
                                    <i class="bi bi-bar-chart shadow"></i>
                                    <h2>₦<span><?php echo $_SESSION["user_data"]['account_balance'] ?></span></h2>
                                    <p>Main Balance</p>
                                </div>
                            </div>
                            <div class="col col-lg-4 col-md-6 col-12">
                                <div class="bal p-3 shadow">
                                    <i class="bi bi-bar-chart shadow"></i>
                                    <h2>₦ <span><?php echo $_SESSION["user_data"]['withdraw_balance'] ?></span></h2>
                                    <p>Total Balance</p>
                                </div>
                            </div>
                            <div class="col col-lg-4 col-md-6 col-12">
                                <div class="bal p-3 shadow">
                                    <i class="bi bi-bar-chart shadow"></i>
                                    <h2><span><?php echo $_SESSION["user_data"]['no_referral'] ?></span></h2>
                                    <p>No. of Referral</p>
                                </div>
                            </div>
                        </div>
                        <div class="transaction p-3 mt-4 shadow">
                            <div class="top">
                                <ul class="d-flex align-items-center text-center gap-2">
                                    <li class="shadow" id="transaction">Transaction</li>
                                    <li class="shadow" id="withdrawal">Withdrawal</li>
                                </ul>
                            </div>
                            <!-- <div class="table"> -->
                            <?php
                                $email =$_SESSION["user_data"]['email'];
                                // API endpoint
                                $api_url = "https://server.sales.sunmence.com.ng/referals/$email";

                                // Initialize cURL session
                                $curl = curl_init();

                                // Set cURL options
                                curl_setopt($curl, CURLOPT_URL, $api_url);
                                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // Return response as a string

                                // Execute cURL request
                                $response = curl_exec($curl);

                                // Check for errors
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
                                    } else {
                                        // Error decoding JSON response
                                        echo "Error decoding JSON response.";
                                    }
                                }

                                // Close cURL session
                                curl_close($curl);
                            ?>

                                <table class="text-center" id="transTable">
                                    
                                    
                                    <?php
                                    if(isset($decoded_response["status"])){
                                        if($decoded_response["status"] == "success"){
                                            ?>
                                            <p id="response_transTable" class = "text-center fw-bold fs-3"><?=$decoded_response["message"]?></p>
                                            <?php
                                        }
                                    }else{ 
                                    ?>
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Service</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php
                                            foreach ($decoded_response as $key => $value) {
                                            # code...
                                            ?>
                                        <tr>
                                            <td><?= $value["fullname"] ?></td>
                                            <td><?=$value["type"]?></td>
                                            <td>₦100,000</td>
                                            <td>
                                                <?php
                                                    echo $value["status"] == "0" ? '<button class="bg-danger">Pending</button>' : '<button class="bg-success">Paid</button>';
                                                ?>
                                                
                                            </td>
                                        </tr>
                                        <?php
                                            }
                                        ?>
                                        
                                    </tbody>
                                    <?php
                                        

                                        }
                                    ?>
                                </table>


                                <?php
                                    $email =$_SESSION["user_data"]['email'];
                                    // API endpoint
                                    $api_url = "https://server.sales.sunmence.com.ng/withdraw_transaction/$email";

                                    // Initialize cURL session
                                    $curl = curl_init();

                                    // Set cURL options
                                    curl_setopt($curl, CURLOPT_URL, $api_url);
                                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // Return response as a string

                                    // Execute cURL request
                                    $response = curl_exec($curl);

                                    // Check for errors
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
                                        } else {
                                            // Error decoding JSON response
                                            echo "Error decoding JSON response.";
                                        }
                                    }

                                    // Close cURL session
                                    curl_close($curl);
                                ?>

                                <table class="text-center" id="withTable">
                                    <?php
                                        if(isset($decoded_response["status"])){
                                            if($decoded_response["status"] == "success"){
                                                ?>
                                                <p id="response_transTable" class = "text-center fw-bold fs-3"><?=$decoded_response["message"]?></p>
                                                <?php
                                            }
                                        }else{ 
                                    ?>
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Date</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach ($decoded_response as $key => $value) {
                                            # code...
                                           
                                            ?>
                                        <tr>
                                            <td><?= $value["bank_name"] ?></td>
                                            <td>12-12-2004 12:24</td>
                                            <td><?= $value["amount"] ?></td>
                                            <td>
                                                <?php
                                                    echo $value["status"] == "0" ? '<button class="bg-danger">Pending</button>' : '<button class="bg-success">Paid</button>';
                                                ?>
                                                
                                            </td>
                                        </tr>
                                        <?php
                                            }
                                        ?>
                                       
                                    </tbody>
                                    <?php
                                        

                                        }
                                    ?>
                                </table>
                            <!-- </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        let transactionEl = document.getElementById("transaction");
        let withdrawalEl = document.getElementById("withdrawal");
        let transTableEl = document.getElementById("transTable");
        let withTableEl = document.getElementById("withTable");
        let response_transTable = document.getElementById("response_transTable");


        transactionEl.style.background = "#54baac23";
        transTableEl.style.display = "block";
        withTableEl.style.display = "none";
        transactionEl.addEventListener("click", transactionBtn);
        withdrawalEl.addEventListener("click", withdrawalBtn);
        function transactionBtn() {
            transactionEl.style.background = "#54baac23";
            withdrawalEl.style.background = "transparent";
            transTableEl.style.display = "block";
            response_transTable.style.display = "block";
            withTableEl.style.display = "none";
        }
        function withdrawalBtn() {
            withdrawalEl.style.background = "#54baac23";
            transactionEl.style.background = "transparent";
            transTableEl.style.display = "none";
            response_transTable.style.display = "none";
            withTableEl.style.display = "block";
        }
    </script>
    <script src="app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
<?php

    }else{
        header("location: index.php");
    }
?>