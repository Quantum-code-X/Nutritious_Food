<?php include('header.php') ?>
<?php include('./../config/dbcon.php') ?>

<?php
$SQL = 'select * from anganwadi_centers';
$result = mysqli_query($connection, $SQL) or die(mysqli_error($connection));

// Example: Get one Anganwadi teachers by ID
$id = $_GET['id']; // or use $_POST['id'] depending on your form method
$id = mysqli_real_escape_string($connection, $id);

$sql1 = "SELECT * FROM anganwadi_teachers WHERE teacher_id = $id LIMIT 1";
$result1 = mysqli_query($connection, $sql1);

if ($result && mysqli_num_rows($result1) > 0) {
    $row1 = mysqli_fetch_assoc($result1);
} else {
    echo "No record found.";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nutritious Food | Centers</title>
    <link rel="stylesheet" href="./../css/style.css">
</head>

<body>
    <div class="container-fluid">
        <div class="mt-2">
            <div class="row">
                <div class="col-md-6">
                    <p class="page-title mb-0 font-weight-bold">Teachers</p>
                    <p class="page-subTitle mb-0">Add Teacher</p>
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
                                    $selected = ($row['id'] == $row1['anganwadi_id']) ? "selected" : "";
                                    echo "<option value='{$row['id']}' $selected>{$row['anganwadi_name']}</option>";
                                }
                                ?>
                            </select>
                            <?php
                            echo $selected; ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Teacher Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="teacher_name" placeholder="Enter Teacher Name"
                                value="<?php echo $row1['teacher_name']; ?>" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Contact Number <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="contact_number"
                                value="<?php echo $row1['contact_number']; ?>" placeholder="Enter Contact Number"
                                required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Gender <span class="text-danger">*</span></label>
                            <select name="gender" class="form-control">
                                <option value="">--Select--</option>
                                <option value="male" <?php echo ('male' == $row1['gender']) ? "selected" : "" ?>>Male
                                </option>
                                <option value="female" <?php echo ('female' == $row1['gender']) ? "selected" : "" ?>>
                                    Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Date Of Birth <span class="text-danger">*</span></label>
                            <input type="date" name="DOB" class="form-control" required
                                value="<?php echo $row1['DOB']; ?>" />
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <button class="btn btn-primary btn-sm" type="submit" name="submit">Submit</button>
                    <a class="btn btn-danger btn-sm" href="./centers.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>

<?php

if (isset($_POST['submit'])) {
    // Escape special characters to prevent SQL injection
    $anganwadi_name = $_POST['anganwadi_name'];
    $teacher_name = $_POST['teacher_name'];
    $contact_number = $_POST['contact_number'];
    $gender = $_POST['gender'];
    $DOB = $_POST['DOB'];

    // Insert query
    $sql = "UPDATE Anganwadi_Teachers SET anganwadi_id = $anganwadi_name, teacher_name = '$teacher_name',
     contact_number = '$contact_number', gender = '$gender', DOB = '$DOB'
     WHERE teacher_id = $_GET[id];";
    mysqli_query($connection, $sql) or die(mysqli_error($connection));
    ?>
    <script>
        alert("Teacher has been updated successfully!")
        document.location = "./teachers.php";
    </script>
    <?php
}
