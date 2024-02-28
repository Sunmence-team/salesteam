<?php

    session_start();
    if(isset($_SESSION["user_data"])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service | SALESTEAM</title>
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
                            <a href="withdrawal.php">
                                <i class="bi bi-cash-stack"></i>
                                Withdrawal
                            </a>
                            <a href="service.php" class="active">
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
                                    <h2>₦ <span><?php echo $_SESSION["user_data"]['account_balance'] ?></span></h2>
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
                        <div class="transaction p-3 mt-4">
                            <div class="top">
                                <ul class="d-flex align-items-center text-center gap-2">
                                    <li id="transaction">Student</li>
                                    <li id="withdrawal">Client</li>
                                </ul>
                            </div>
                            <table class="text-center" id="transTable">
                                <thead>
                                    <tr>
                                        <th>Service</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Fullstack</td>
                                        <td>₦100,000</td>
                                    </tr>
                                    <tr>
                                        <td>Frontend</td>
                                        <td>₦100,000</td>
                                    </tr>
                                    <tr>
                                        <td>Backend</td>
                                        <td>₦100,000</td>
                                    </tr>
                                    <tr>
                                        <td>Fullstack</td>
                                        <td>₦100,000</td>
                                    </tr>
                                    <tr>
                                        <td>Fullstack</td>
                                        <td>₦100,000</td>
                                    </tr>
                                    <tr>
                                        <td>Fullstack</td>
                                        <td>₦100,000</td>
                                    </tr>
                                </tbody>
                            </table>




                            <table class="text-center" id="withTable">
                                <thead>
                                    <tr>
                                        <th>Service</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Broker</td>
                                        <td>₦100,000</td>
                                    </tr>
                                    <tr>
                                        <td>Application</td>
                                        <td>₦100,000</td>
                                    </tr>
                                    <tr>
                                        <td>Others</td>
                                        <td>₦100,000</td>
                                    </tr>
                                </tbody>
                            </table>
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


        transactionEl.style.background = "#54baac23";
        transTableEl.style.display = "block";
        withTableEl.style.display = "none";
        transactionEl.addEventListener("click", transactionBtn);
        withdrawalEl.addEventListener("click", withdrawalBtn);
        function transactionBtn() {
            transactionEl.style.background = "#54baac23";
            withdrawalEl.style.background = "transparent";
            transTableEl.style.display = "block";
            withTableEl.style.display = "none";
        }
        function withdrawalBtn() {
            withdrawalEl.style.background = "#54baac23";
            transactionEl.style.background = "transparent";
            transTableEl.style.display = "none";
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