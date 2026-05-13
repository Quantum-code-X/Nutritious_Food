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
                    <p class="page-subTitle mb-0">Centers list</p>
                </div>
                <div class="col-md-6 text-right">
                    <a class="btn btn-primary" href="./centers_add.php" role="button">Create Center</a>
                </div>
            </div>
        </div>
        <table class="table table-bordered mt-2">
            <thead class="bg-secondary text-white">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Anganwadi Name</th>
                    <th scope="col">Location</th>
                    <th scope="col">District</th>
                    <th scope="col">Taluk</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM anganwadi_centers";
                $result = mysqli_query($connection, $sql) or die(mysqli_error($conn));
                if (mysqli_num_rows($result) > 0) {
                    $i = 0;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $i = $i + 1;
                        echo "<tr>
                    <td>$i</td>
                    <td>{$row['anganwadi_name']}</td>
                    <td>{$row['location']}</td>
                    <td>{$row['district']}</td>
                    <td>{$row['taluk']}</td>
                    <td><a href='./center_edit.php?id={$row['id']}' class='badge badge-secondary'>Edit</a>
                    <a href='./centers.php?id={$row['id']}' class='badge badge-danger'>Delete</a></td>
                        </tr>";
                    }
                } else {
                    echo "<tr class='text-center'><td colspan='6'>Data not Found!</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>

<?php

if (isset($_GET['id'])) {
    // Escape special characters to prevent SQL injection
    $anganwadi_name = $_POST['center_name'];
    $location = $_POST['village'];
    $district = $_POST['district'];
    $taluk = $_POST['taluk'];
    $address = $_POST['address'];

    // Delete query
    $sql = "DELETE FROM anganwadi_centers WHERE id = '$_GET[id]'";

    mysqli_query($connection, $sql) or die(mysqli_error($connection));
    ?>
    <script>
        alert("Center has been deleted successfully!")
        document.location = "./centers.php";
    </script>
    <?php
}