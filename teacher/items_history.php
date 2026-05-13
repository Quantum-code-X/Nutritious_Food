<?php include('header.php') ?>
<?php include('./../config/dbcon.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nutritious Food | Items</title>
    <link rel="stylesheet" href="./../css/style.css">
</head>

<body>
    <div class="container-fluid">
        <div class="mt-2">
            <div class="row">
                <div class="col-md-6">
                    <p class="page-title mb-0 font-weight-bold">Food Management</p>
                    <p class="page-subTitle mb-0">Food Management List</p>
                </div>
            </div>
        </div>
        <table class="table table-bordered mt-2">
            <thead class="bg-secondary text-white">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Mothercard ID</th>
                    <th scope="col">Anganawadi Center ID</th>
                    <th scope="col">Beneficiary Name</th>
                    <th scope="col">Husband Name</th>
                    <th scope="col">Contact Number</th>
                    <th scope="col">Adhar Number</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM beneficiaries b, anganwadi_centers a WHERE b.anganwadi_center_id = a.id";
                $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
                if (mysqli_num_rows($result) > 0) {
                    $i = 0;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $i = $i + 1;
                        echo "<tr>
                    <td>$i</td>
                    <td>{$row['mother_card_id']}</td>
                    <td>{$row['anganwadi_name']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['husband_name']}</td>
                    <td>{$row['contact_number']}</td>
                    <td>{$row['adhar_number']}</td>
                    <td><a href='./add_items_history.php?id={$row['contact_number']}' class='badge badge-secondary'>Select</a></tr>";
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
    $sql = "DELETE FROM items_data WHERE item_id = '$_GET[id]'";

    mysqli_query($connection, $sql) or die(mysqli_error($connection));
    ?>
    <script>
        alert("Item has been deleted successfully!")
        document.location = "./items.php";
    </script>
    <?php
}