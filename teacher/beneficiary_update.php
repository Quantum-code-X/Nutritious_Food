<?php include('header.php') ?>
<?php include('./../config/dbcon.php') ?>

<?php
$SQL = 'select * from anganwadi_centers';
$result = mysqli_query($connection, $SQL) or die(mysqli_error($connection));

$id = $_GET['id']; // or use $_POST['id'] depending on your form method
$id = mysqli_real_escape_string($connection, $id);

$query = mysqli_query($connection, "SELECT * FROM beneficiaries WHERE contact_number = $id LIMIT 1") or die(mysqli_error($connection));
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
                    <p class="page-title mb-0 font-weight-bold">Beneficiary</p>
                    <p class="page-subTitle mb-0">Add Beneficiary</p>
                </div>
            </div>
            <hr />
        </div>
        <form method="post" autocomplete="off">
            <div class="mt-2">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Anganwadi Name <span class="text-danger">*</span></label>
                            <select class="form-control" name="anganwadi_name">
                                <option value="">-- Select --</option>
                                <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $selected = ($row['id'] == $row1['anganwadi_center_id']) ? "selected" : "";
                                    echo "<option value='{$row['id']}' $selected>{$row['anganwadi_name']}</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
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
                            <label>Date Of Birth<span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="dob" placeholder="Enter Date Of Birth"
                                value="<?php echo $row1['DOB']; ?>" required>
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
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Prenatal Weight</label>
                            <input type="text" class="form-control" name="prenatal_weight"
                                value="<?php echo $row1['prenatal_weight']; ?>" placeholder="Enter Prenatal Weight">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Postnatal Weight</label>
                            <input type="text" class="form-control" name="postnatal_weight"
                                value="<?php echo $row1['postnatal_weight']; ?>" placeholder="Enter Postnatal Weight">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Baby Birth Date</label>
                            <input type="date" class="form-control" name="baby_birth_date"
                                value="<?php echo $row1['baby_birth_date']; ?>" placeholder="Enter Baby Birth Date">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Baby Birth Weight</label>
                            <input type="text" class="form-control" name="baby_birth_weight"
                                value="<?php echo $row1['baby_birth_weight']; ?>" placeholder="Enter Baby Birth Weight">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>0-3 Years Baby Weight</label>
                            <input type="text" class="form-control" name="_3Years"
                                value="<?php echo $row1['_3Years']; ?>" placeholder="Enter Baby Birth Weight">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>3-6 Years Child Weight</label>
                            <input type="text" class="form-control" name="_6Years"
                                value="<?php echo $row1['_6Years']; ?>" placeholder="Enter Baby Birth Weight">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Baby Name</label>
                            <input type="text" name="baby_name"
value="<?php echo $row1['baby_name'] ?? ''; ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Baby Father Name</label>
                            <input type="text" name="father_name"
value="<?php echo $row1['father_name'] ?? ''; ?>"> 

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Baby Mother Name</label>
                            <input type="text" name="mother_name"
value="<?php echo $row1['mother_name'] ?? ''; ?>">

                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <button class="btn btn-primary btn-sm" type="submit" name="submit">Submit</button>
                    <a class="btn btn-danger btn-sm" href="./women_mgmt.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>

<?php

if (isset($_POST['submit'])) {

    $anganwadi_name = $_POST['anganwadi_name'] ?? '';
    $mothercard_id = $_POST['mothercard_id'] ?? '';
    $adhaar_number = $_POST['adhaar_number'] ?? '';
    $beneficiary_name = $_POST['beneficiary_name'] ?? '';
    $husband_name = $_POST['husband_name'] ?? '';
    $contact_number = $_POST['contact_number'] ?? '';
    $dob = $_POST['dob'] ?? '';
    $prenatal_weight = $_POST['prenatal_weight'] ?? '';
    $postnatal_weight = $_POST['postnatal_weight'] ?? '';
    $baby_birth_date = $_POST['baby_birth_date'] ?? '';
    $baby_birth_weight = $_POST['baby_birth_weight'] ?? '';
    $_3Years = $_POST['_3Years'] ?? '';
    $_6Years = $_POST['_6Years'] ?? '';
    $baby_name = $_POST['baby_name'] ?? '';
    $baby_birth_id = $_POST['baby_birth_id'] ?? '';
    $father_name = $_POST['father_name'] ?? '';
    $mother_name = $_POST['mother_name'] ?? '';

    mysqli_query($connection, "
        UPDATE account_login 
        SET identifier = '$contact_number' 
        WHERE identifier = '".$row1['contact_number']."'
    ");

    $sql = "UPDATE beneficiaries SET 
        name = '$beneficiary_name',
        adhar_number = '$adhaar_number',
        contact_number = '$contact_number',
        anganwadi_center_id = '$anganwadi_name',
        husband_name = '$husband_name',
        mother_card_id = '$mothercard_id',
        DOB = '$dob',
        prenatal_weight = '$prenatal_weight',
        postnatal_weight = '$postnatal_weight',
        baby_birth_date = '$baby_birth_date',
        baby_birth_weight = '$baby_birth_weight',
        _3Years = '$_3Years',
        _6Years = '$_6Years',
        baby_name = '$baby_name',
        baby_birth_id = '$baby_birth_id',
        father_name = '$father_name',
        mother_name = '$mother_name'
        WHERE beneficiary_id = '".$row1['beneficiary_id']."'
    ";

    mysqli_query($connection, $sql) or die(mysqli_error($connection));

    echo "<script>alert('Updated successfully'); window.location='women_mgmt.php';</script>";
}

