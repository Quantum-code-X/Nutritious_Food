<?php include('header.php') ?>
<?php include('./../config/dbcon.php') ?>

<?php
session_start();
$beneficiaryId = $_SESSION['userData']['beneficiary_id'];

$query = mysqli_query($connection, "SELECT * FROM beneficiaries WHERE beneficiary_id = $beneficiaryId LIMIT 1") or die(mysqli_error($connection));
$row1 = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nutritious Food | Add Beneficiary</title>
    <link rel="stylesheet" href="./../css/style.css">
</head>

<body>
    <div class="container-fluid">
        <div class="mt-2">
            <div class="row">
                <div class="col-md-6">
                    <p class="page-title mb-0 font-weight-bold">Profile</p>
                    <p class="page-subTitle mb-0">Update Profile Details</p>
                </div>
            </div>
            <hr />
        </div>
        <form method="post" autocomplete="off">
            <div class="mt-2">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Mothercard ID <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="mothercard_id"
                                placeholder="Enter Mothercard ID" value="<?php echo $row1['mother_card_id']; ?>"
                                required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Adhaar Number<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="adhaar_number"
                                placeholder="Enter Adhaar Number" value="<?php echo $row1['adhar_number']; ?>" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Beneficiary Name<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="beneficiary_name"
                                placeholder="Enter Beneficiary Name" value="<?php echo $row1['name']; ?>" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Husband Name<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="husband_name" placeholder="Enter Husband Name"
                                value="<?php echo $row1['husband_name']; ?>" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Contact Number<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="contact_number"
                                value="<?php echo $row1['contact_number']; ?>" placeholder="Enter Contact Number"
                                required>
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <button class="btn btn-primary btn-sm" type="submit" name="submit">Submit</button>
                    <a class="btn btn-danger btn-sm" href="./profile.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>

<?php

if (isset($_POST['submit'])) {
    // Escape special characters to prevent SQL injection
    $mothercard_id = $_POST['mothercard_id'];
    $adhaar_number = $_POST['adhaar_number'];
    $beneficiary_name = $_POST['beneficiary_name'];
    $husband_name = $_POST['husband_name'];
    $contact_number = $_POST['contact_number'];

    $insert_query = mysqli_query($connection, "
             UPDATE `account_login` SET `identifier` = '$contact_number' WHERE `account_login`.`identifier` = $row1[contact_number]")
        or die(mysqli_error($connection));
    // Insert query
    $sql = "UPDATE `beneficiaries` SET `name` = '$beneficiary_name', `adhar_number` = '$adhaar_number', 
        `contact_number` = '$contact_number', `husband_name` = '$husband_name', 
        `mother_card_id` = '$mothercard_id' WHERE `beneficiaries`.`beneficiary_id` = $row1[beneficiary_id]";
    mysqli_query($connection, $sql) or die(mysqli_error($connection));
    ?>
    <script>
        alert("Personal details has been updated successfully!");
        document.location = "./profile.php";
    </script>
    <?php
}
