<?php include('header.php') ?>
<?php include('./../config/dbcon.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nutritious Food | Teachers</title>
    <link rel="stylesheet" href="./../css/style.css">
</head>

<body>
    <div class="container-fluid">
        <div class="mt-2">
            <div class="row">
                <div class="col-md-6">
                    <p class="page-title mb-0 font-weight-bold">Teachers</p>
                    <p class="page-subTitle mb-0">Teachers list</p>
                </div>
                <div class="col-md-6 text-right">
                    <a class="btn btn-primary" href="./teacher_add.php" role="button">Create Teacher</a>
                </div>
            </div>
        </div>
        <table class="table table-bordered mt-2">
            <thead class="bg-secondary text-white">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Anganwadi Name</th>
                    <th scope="col">Teacher Name</th>
                    <th scope="col">Contact Number</th>
                    <th scope="col">Date Of Birth</th>
                    <th scope="col">Village</th>
                    <th scope="col">District</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM anganwadi_teachers a, anganwadi_centers c where a.anganwadi_id = c.id";
                $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
                if (mysqli_num_rows($result) > 0) {
                    $i = 0;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $i = $i + 1;
                        echo "<tr>
                    <td>$i</td>
                    <td>{$row['anganwadi_name']}</td>
                    <td>{$row['teacher_name']}</td>
                    <td>{$row['contact_number']}</td>
                    <td>{$row['DOB']}</td>
                    <td>{$row['location']}</td>
                    <td>{$row['district']}</td>
                    <td><a href='./teachers_edit.php?id={$row['teacher_id']}' class='badge badge-secondary'>Edit</a>
                    <a href='./teachers.php?id={$row['teacher_id']}' class='badge badge-danger'>Delete</a></td>
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
    // Delete query
    $sql = "DELETE FROM anganwadi_teachers WHERE teacher_id = '$_GET[id]'";

    mysqli_query($connection, $sql) or die(mysqli_error($connection));
    ?>
    <script>
        alert("Teacher has been deleted successfully!")
        document.location = "./teachers.php";
    </script>
    <?php
}