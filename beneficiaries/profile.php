<?php include('header.php') ?>
<?php include('./../config/dbcon.php') ?>
<?php
session_start();
$beneficiaryId = $_SESSION['userData']['beneficiary_id'];

$beneficiarySQL = "SELECT * FROM `beneficiaries` b, `anganwadi_centers` a 
WHERE b.anganwadi_center_id = a.id and b.beneficiary_id = $beneficiaryId";
$beneficiary_result = mysqli_query($connection, $beneficiarySQL) or die(mysqli_error($connection));
$beneficiary = mysqli_fetch_assoc($beneficiary_result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nutritious Food | Admin</title>
    <link rel="stylesheet" href="./../css/style.css">
</head>

<body>
    <div class="container-fluid">
        <div class="mt-2">
            <div class="row">
                <div class="col-md-6">
                    <p class="page-title mb-0 font-weight-bold">Profile</p>
                    <p class="page-subTitle mb-0">Profile Details and Update</p>
                </div>
            </div>
        </div>
        <div class="mt-3">
            <div class="row">
                <div class="col-md-6">
                    <div class="p-2">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="text-info font-weight-bold">Profile Details</h6>
                            </div>
                            <div class="col-md-6 d-flex align-items-center justify-content-end">
                                <a href="./edit_profile.php" class="badge badge-danger">Click Here to Edit Personal
                                    Details</a>
                            </div>
                        </div>
                        <table class="table">
                            <tr>
                                <th>Anganwadi Name</th>
                                <th>:</th>
                                <td><?php echo $beneficiary['anganwadi_name'] ?></td>
                            </tr>
                            <tr>
                                <th>Mother Card ID</th>
                                <th>:</th>
                                <td><?php echo $beneficiary['mother_card_id'] ?></td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <th>:</th>
                                <td><?php echo $beneficiary['name'] ?></td>
                            </tr>
                            <tr>
                                <th>Date Of Birth</th>
                                <th>:</th>
                                <td><?php echo $beneficiary['DOB'] ?></td>
                            </tr>
                            <tr>
                                <th>Husband Name</th>
                                <th>:</th>
                                <td><?php echo $beneficiary['husband_name'] ?></td>
                            </tr>
                            <tr>
                                <th>Adhaar Card Number</th>
                                <th>:</th>
                                <td><?php echo $beneficiary['adhar_number'] ?></td>
                            </tr>
                            <tr>
                                <th>Contact Number</th>
                                <th>:</th>
                                <td><?php echo $beneficiary['contact_number'] ?></td>
                            </tr>
                            <tr>
                                <th>Registered Date</th>
                                <th>:</th>
                                <td><?php echo $beneficiary['registered_date'] ?></td>
                            </tr>
                            <tr>
                                <th>Prenatal Weight</th>
                                <th>:</th>
                                <td><?php echo $beneficiary['prenatal_weight'] ? $beneficiary['prenatal_weight'] . ' KG' : '-' ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Postnatal Weight</th>
                                <th>:</th>
                                <td><?php echo $beneficiary['postnatal_weight'] ? $beneficiary['postnatal_weight'] . ' KG' : '-' ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Baby Birth Date</th>
                                <th>:</th>
                                <td><?php echo $beneficiary['baby_birth_date'] ? $beneficiary['baby_birth_date'] : '-' ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Baby Birth Weight</th>
                                <th>:</th>
                                <td><?php echo $beneficiary['baby_birth_weight'] ? $beneficiary['baby_birth_weight'] . ' KG' : '-' ?>
                                </td>
                            </tr>
                            <tr>
                                <th>0-3 Years Weight</th>
                                <th>:</th>
                                <td><?php echo $beneficiary['_3Years'] ? $beneficiary['_3Years'] . ' KG' : '-' ?></td>
                            </tr>
                            <tr>
                                <th>3-6 Years Weight</th>
                                <th>:</th>
                                <td><?php echo $beneficiary['_6Years'] ? $beneficiary['_6Years'] . ' KG' : '-' ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-2">
                        <h6 class="text-info font-weight-bold">Password Change</h6>
                        <form class="mt-3" action="" method="post">
                            <div class="form-group">
                                <label>Password <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" name="password" placeholder="Enter Password"
                                    id="password" onblur="checkPassword()" required>
                            </div>
                            <div class="form-group">
                                <label>Confirm Password <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" name="confirm_pass" id="confPassword"
                                    onblur="checkPassword()" placeholder="Enter Confirm Password" required>
                                <div class="error" id="passwordError"></div>
                            </div>
                            <div class="text-right">
                                <button class="btn btn-primary btn-sm" type="submit" name="update"
                                    id="submit">Submit</button>
                                <button class="btn btn-danger btn-sm" type="reset" name="reset">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<script>
    // Disable the submit button by default
    document.getElementById('submit').disabled = true;

    function checkPassword() {
        let password = document.getElementById('password').value;
        let confirmPassword = document.getElementById('confPassword').value;

        if (password && confirmPassword) {
            if (password === confirmPassword) {
                document.getElementById('passwordError').innerHTML = '';
                document.getElementById('submit').disabled = false;
                return true;
            } else {
                document.getElementById('submit').disabled = true;
                document.getElementById('passwordError').innerHTML = '<small class="form-text text-danger font-weight-bold">Both the passwords are not matching.</small>';
                return false;
            }
        }
    }
</script>

<?php
if (isset($_POST['update'])) {
    // Escape special characters to prevent SQL injection
    $password = $_POST['password'];

    // Insert query
    $insert_query = mysqli_query($connection, "
             UPDATE `account_login` SET `password` = '$password' WHERE `account_login`.`identifier` = $beneficiary[contact_number]")
        or die(mysqli_error($connection));
    ?>
    <script>
        alert("Password has been updated successfully!");
        window.location = "./profile.php";
    </script>
    <?php
}
