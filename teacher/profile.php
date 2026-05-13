<?php include('header.php') ?>
<?php include('./../config/dbcon.php') ?>
<?php
session_start();
$teacherId = $_SESSION['userData']['teacher_id'];

$teacherSQL = "SELECT * FROM `anganwadi_teachers` a, `anganwadi_centers` ac 
WHERE a.anganwadi_id = ac.id and a.teacher_id = $teacherId";
$teacher_result = mysqli_query($connection, $teacherSQL) or die(mysqli_error($connection));
$teacher = mysqli_fetch_assoc($teacher_result);
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
                                <td><?php echo ucwords($teacher['anganwadi_name']) ?></td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <th>:</th>
                                <td><?php echo ucwords($teacher['teacher_name']) ?></td>
                            </tr>
                            <tr>
                                <th>Contact Number</th>
                                <th>:</th>
                                <td><?php echo $teacher['contact_number'] ?></td>
                            </tr>
                            <tr>
                                <th>Gender</th>
                                <th>:</th>
                                <td><?php echo ucwords($teacher['gender']) ?></td>
                            </tr>
                            <tr>
                                <th>Date Of Birth</th>
                                <th>:</th>
                                <td><?php echo $teacher['DOB'] ?></td>
                            </tr>
                            <tr>
                                <th>Registered Date</th>
                                <th>:</th>
                                <td><?php echo $teacher['created_date'] ?></td>
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
             UPDATE `account_login` SET `password` = '$password' WHERE `account_login`.`identifier` = $teacher[contact_number]")
        or die(mysqli_error($connection));
    ?>
    <script>
        alert("Password has been updated successfully!");
        window.location = "./profile.php";
    </script>
    <?php
}
