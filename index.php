<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Digital food record  for anganwadi workers</title>
    <link rel="stylesheet" href="./css/style.css" />
</head>

<body>
    <div class="row m-3">
        <div class="col-md-6 p-0">
            <img src="./images/login_side.avif" alt="" class="side-login-image" />
        </div>
        <div class="col-md-6">
            <h1 class="mt-5 title text-center font-weight-bold primary-color">
               Digital food record  for anganwadi workers
            </h1>
            <h2 class="sub-title text-center text-danger font-weight-bold">Welcome Back!</h2>
            <!-- Form starts -->
            <form autocomplete="off" class="col-md-8 mx-auto mt-5" method="post" onsubmit="">
                <div class="form-group">
                    <label>User ID</label>
<input type="text" class="form-control" name="identifier" placeholder="Enter User ID" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter Password" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block" name="submit">Submit</button>
            </form>
        </div>
    </div>
</body>

</html>

<!-- Php connection for login -->
<?php

session_start();

include("./config/dbcon.php");

if (isset($_POST['submit'])) {
    $username = $_POST['identifier'];
    $password = $_POST['password'];

    $userQuery = mysqli_query($connection, "SELECT * FROM account_login WHERE identifier='$username' AND PASSWORD='$password'") or die(mysqli_error($connection));
    if (mysqli_num_rows($userQuery) == 0) {
        ?>
        <script>
            alert("User not exist!");
        </script>
        <?php
    } else {
        $user = mysqli_fetch_assoc($userQuery);
        switch ($user['role']) {
            case 'admin':
                header('Location: ./admin/centers.php');
                break;
            case 'teacher':
                $userDataSQL = "SELECT * FROM anganwadi_teachers WHERE contact_number='$username'";
                $userDataresSQL = mysqli_query($connection, $userDataSQL) or die(mysqli_error($connection));
                $userData = mysqli_fetch_assoc($userDataresSQL);
                $_SESSION['userData'] = $userData;
                header('Location: ./teacher/items.php');
                break;
            case 'beneficiary':
                $userDataSQL = "SELECT * FROM beneficiaries WHERE contact_number='$username'";
                $userDataresSQL = mysqli_query($connection, $userDataSQL) or die(mysqli_error($connection));
                $userData = mysqli_fetch_assoc($userDataresSQL);
                $_SESSION['userData'] = $userData;
                header('Location: ./beneficiaries/');
                break;
        }
    }
}