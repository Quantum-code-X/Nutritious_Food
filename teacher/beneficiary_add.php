<?php include('header.php'); ?>
<?php include('./../config/dbcon.php'); ?>

<?php
$SQL = "SELECT * FROM anganwadi_centers";
$result = mysqli_query($connection, $SQL) or die(mysqli_error($connection));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Beneficiary</title>
    <link rel="stylesheet" href="./../css/style.css">
</head>

<body>
<div class="container-fluid">

<form method="post">

<div class="row">

<!-- Center -->
<div class="col-md-4">
    <label>Anganwadi Name *</label>
    <select class="form-control" name="anganwadi_center_id" required>
        <option value="">-- Select --</option>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <option value="<?= $row['id'] ?>"><?= $row['anganwadi_name'] ?></option>
        <?php } ?>
    </select>
</div>

<!-- Basic Info -->
<div class="col-md-4">
    <label>Mothercard ID *</label>
    <input type="number" name="mother_card_id" class="form-control" required>
</div>

<div class="col-md-4">
    <label>Aadhar Number *</label>
    <input type="number" name="adhaar_number" class="form-control" required>
</div>

<div class="col-md-4">
    <label>Beneficiary Name *</label>
    <input type="text" name="beneficiary_name" class="form-control" required>
</div>

<div class="col-md-4">
    <label>Date Of Birth *</label>
    <input type="date" name="dob" class="form-control" required>
</div>

<div class="col-md-4">
    <label>Husband Name *</label>
    <input type="text" name="husband_name" class="form-control" required>
</div>

<div class="col-md-4">
    <label>Contact Number *</label>
    <input type="number" name="contact_number" class="form-control" required>
</div>

<!-- All fields now mandatory -->
<div class="col-md-4">
    <label>Prenatal Weight *</label>
    <input type="number" name="prenatal_weight" class="form-control" required>
</div>

<div class="col-md-4">
    <label>Postnatal Weight *</label>
    <input type="number" name="postnatal_weight" class="form-control" required>
</div>

<div class="col-md-4">
    <label>Baby Birth Date *</label>
    <input type="date" name="baby_birth_date" class="form-control" required>
</div>

<div class="col-md-4">
    <label>Baby Birth Weight *</label>
    <input type="number" name="baby_birth_weight" class="form-control" required>
</div>

<div class="col-md-4">
    <label>0-3 Years Weight *</label>
    <input type="number" name="_3Years" class="form-control" required>
</div>

<div class="col-md-4">
    <label>3-6 Years Weight *</label>
    <input type="number" name="_6Years" class="form-control" required>
</div>

<div class="col-md-4">
    <label>Baby Name *</label>
    <input type="text" name="baby_name" class="form-control" required>
</div>

<div class="col-md-4">
    <label>Baby Birth ID *</label>
    <input type="text" name="baby_birth_id" class="form-control" required>
</div>

<div class="col-md-4">
    <label>Father Name *</label>
    <input type="text" name="father_name" class="form-control" required>
</div>

<div class="col-md-4">
    <label>Mother Name *</label>
    <input type="text" name="mother_name" class="form-control" required>
</div>

</div>

<div class="text-right mt-3">
    <button class="btn btn-primary btn-sm" name="submit">Submit</button>
    <a href="./women_mgmt.php" class="btn btn-danger btn-sm">Cancel</a>
</div>

</form>
</div>
</body>
</html>

<?php

if (isset($_POST['submit'])) {

    // Collect values
    $beneficiary_name = $_POST['beneficiary_name'];
    $adhaar_number = $_POST['adhaar_number'];
    $contact_number = $_POST['contact_number'];
    $anganwadi_center_id = $_POST['anganwadi_center_id'];
    $husband_name = $_POST['husband_name'];
    $mother_card_id = $_POST['mother_card_id'];
    $dob = $_POST['dob'];

    $prenatal_weight = $_POST['prenatal_weight'];
    $postnatal_weight = $_POST['postnatal_weight'];
    $baby_birth_date = $_POST['baby_birth_date'];
    $baby_birth_weight = $_POST['baby_birth_weight'];

    $_3Years = $_POST['_3Years'];
    $_6Years = $_POST['_6Years'];

    $baby_name = $_POST['baby_name'];
    $baby_birth_id = $_POST['baby_birth_id'];
    $father_name = $_POST['father_name'];
    $mother_name = $_POST['mother_name'];

    // INSERT QUERY
    $sql = "INSERT INTO beneficiaries 
    (name, DOB, adhar_number, contact_number, anganwadi_center_id, husband_name, mother_card_id, 
    registered_date, prenatal_weight, postnatal_weight, baby_birth_date, baby_birth_weight, 
    _3Years, _6Years, baby_name, baby_birth_id, father_name, mother_name)

    VALUES 
    ('$beneficiary_name','$dob','$adhaar_number','$contact_number','$anganwadi_center_id',
    '$husband_name','$mother_card_id',NOW(),
    '$prenatal_weight','$postnatal_weight','$baby_birth_date','$baby_birth_weight',
    '$_3Years','$_6Years','$baby_name','$baby_birth_id','$father_name','$mother_name')";

    mysqli_query($connection, $sql) or die(mysqli_error($connection));

    // login table
    mysqli_query($connection, "INSERT INTO account_login(identifier,password,role) 
    VALUES('$contact_number','12345','beneficiary')");

    echo "<script>alert('Beneficiary added successfully'); window.location='women_mgmt.php';</script>";
}
?>