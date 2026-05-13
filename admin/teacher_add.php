<?php include('header.php') ?>
<?php include('./../config/dbcon.php') ?>

<?php
$SQL = 'select * from anganwadi_centers';
$result = mysqli_query($connection, $SQL) or die(mysqli_error($connection));
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
                                    echo "<option value='{$row['id']}'>{$row['anganwadi_name']}</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Teacher Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="teacher_name" placeholder="Enter Teacher Name"
                                required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Contact Number <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="contact_number"
                                placeholder="Enter Contact Number" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Gender <span class="text-danger">*</span></label>
                            <select name="gender" class="form-control">
                                <option value="">--Select--</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Date Of Birth <span class="text-danger">*</span></label>
                            <input type="date" name="DOB" class="form-control" required />
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <button class="btn btn-primary btn-sm" type="submit" name="submit">Submit</button>
                    <a class="btn btn-danger btn-sm" href="./teachers.php" role="button">Cancel</a>
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
    $sql = "INSERT INTO `anganwadi_teachers` (`teacher_id`, `anganwadi_id`, `teacher_name`, `contact_number`, `gender`, `DOB`, `created_date`) 
    VALUES (NULL, '$anganwadi_name', '$teacher_name', '$contact_number', '$gender', '$DOB', current_timestamp())";
    mysqli_query($connection, $sql) or die(mysqli_error($connection));
    $insert_query = mysqli_query($connection, "
    INSERT INTO `account_login` (`id`, `identifier`, `password`, `role`) VALUES (NULL, '$contact_number', '12345', 'teacher')")
        or die(mysqli_error($connection));
    ?>
    <script>
        alert("Teacher has been added successfully!")
        document.location = "./teachers.php";
    </script>
    <?php
}
