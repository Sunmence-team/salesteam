<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup | SALESTEAM</title>
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
                    <h2 class="fw-bolder my-4">SIGNUP PAGE</h2>
                </div>
                <form action="register.php" method="post">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-people-fill"></i>
                        <input type="text" name="fullname" id="fullname" placeholder="Fullname" required>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="bi bi-person-fill"></i>
                        <input type="text" name="username" id="username" placeholder="Username" required>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="bi bi-person-fill"></i>
                        <input type="email" name="email" id="email" placeholder="Email Address" required>
                    </div>
                    <!-- <div class="d-flex align-items-center">
                        <i class="bi bi-telephone-fill"></i>
                        <input type="number" name="number" id="number" placeholder="Phone number" required>
                    </div> -->
                    <div class="d-flex align-items-center">
                        <i class="bi bi-lock-fill"></i>
                        <input type="password" name="password" id="password" placeholder="Password" required>
                    </div>
                    <p>Already have an account? <a href="index.php">Login here</a></p>
                    <button name="signup" class="shadow-lg">SIGNUP</button>
                    <?php
                        session_start();
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