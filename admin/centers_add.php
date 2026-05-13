<?php include('header.php') ?>
<?php include('./../config/dbcon.php') ?>
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
                    <p class="page-title mb-0 font-weight-bold">Centers</p>
                    <p class="page-subTitle mb-0">Add Center</p>
                </div>
            </div>
            <hr />
        </div>
        <form method="post" autocomplete="off">
            <div class="mt-2">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Center Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="center_name" placeholder="Enter center name"
                                required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Village <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="village" placeholder="Enter Village" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>District <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="district" placeholder="Enter District"
                                required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Taluk <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="taluk" placeholder="Enter Taluk" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Address <span class="text-danger">*</span></label>
                            <textarea name="address" id="address" class="form-control" cols="4" rows="6"></textarea>
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
    $anganwadi_name = $_POST['center_name'];
    $location = $_POST['village'];
    $district = $_POST['district'];
    $taluk = $_POST['taluk'];
    $address = $_POST['address'];

    // Insert query
    $sql = "INSERT INTO anganwadi_centers VALUES ('', '$anganwadi_name', '$location', '$district', '$taluk', '$address')";
    mysqli_query($connection, $sql) or die(mysqli_error($connection));
    ?>
    <script>
        alert("Center has been added successfully!")
        document.location = "./centers.php";
    </script>
    <?php
}
