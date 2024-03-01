<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | SALESTEAM</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
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
                            <img src="../images/Asset 38@300x.png" width="100%" alt="">
                        </div>
                        <div class="links px-2">
                            <a href="index.php">
                                <i class="bi bi-columns-gap"></i>
                                Home
                            </a>
                            <a href="referral.php" class="active">
                                <i class="bi bi-people"></i>
                                Referral
                            </a>
                            <a href="withdrawal.php">
                                <i class="bi bi-cash-stack"></i>
                                Withdrawal
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
                        <!-- <form action="">
                            <div class="d-flex align-items-center shadow">
                                <i class="bi bi-search"></i>
                                <input type="text" name="search" id="search" placeholder="Search">
                            </div>
                        </form> -->
                        <div class="ham">
                            <i class="bi bi-list"></i>
                        </div>
                        <div class="pro d-flex align-items-center gap-2">
                            <img src="../images/Asset 27@300x.png" width="100%" alt="">
                            <h4>Admin</h4>
                        </div>
                    </div>
                    <div class="body my-3 px-4">
                        <div class="transaction p-3 mt-4 shadow">
                            <center class="fs-1 fw-bolder">REFERRAL</center>
                            <!-- <div class="top">
                                <ul class="d-flex align-items-center text-center gap-2">
                                    <li class="shadow" id="transaction">Transaction</li>
                                    <li class="shadow" id="withdrawal">Withdrawal</li>
                                </ul>
                            </div> -->
                            <div class="table">
                                <table class="text-center">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Referral Name</th>
                                            <th>Amount</th>
                                            <th>Work/Training description</th>
                                            <th>Referral Email</th>
                                            <th>Phone number</th>
                                            <th>Status</th>
                                            <th>Confirmation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Owolabi Samuel</td>
                                            <td>Owolabi Samuel</td>
                                            <td>100,000</td>
                                            <td>Fullstack</td>
                                            <td>Taotundex001@gmail.com</td>
                                            <td>09012345678</td>
                                            <td>Pending</td>
                                            <td><a href=""><button></button></a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    
    <script src="../app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>