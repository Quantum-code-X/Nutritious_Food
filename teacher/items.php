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
                    <p class="page-title mb-0 font-weight-bold">Items</p>
                    <p class="page-subTitle mb-0">Ration Items List</p>
                </div>
                <div class="col-md-6 d-flex align-items-center justify-content-end">
                    <a class="btn btn-primary btn-sm" href="./items_add.php" role="button">Create Item</a>
                </div>
            </div>
        </div>
        <table class="table table-bordered mt-2">
            <thead class="bg-secondary text-white">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Item Name</th>
                    <th scope="col">Prenatal Qty</th>
                    <th scope="col">Postnatal Qty</th>
                    <th scope="col">0-3 Years Baby Qty</th>
                    <th scope="col">3-6 Years Child Qty</th>
                    <th scope="col">Item Created Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM items_data";
                $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
                if (mysqli_num_rows($result) > 0) {
                    $i = 0;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $i = $i + 1;
                        echo "<tr>
                    <td>$i</td>
                    <td>{$row['item_name']}</td>
                    <td>{$row['prenatal_qty']} KG</td>
                    <td>{$row['postnatal_qty']} KG</td>
                    <td>{$row['3Years_qty']} KG</td>
                    <td>{$row['6Years_qty']} KG</td>
                    <td>{$row['created_date_time']}</td>
                    <td><a href='./items_edit.php?id={$row['item_id']}' class='badge badge-secondary'>Edit</a>
                    <a href='./items.php?id={$row['item_id']}' class='badge badge-danger'>Delete</a></td>
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
    $sql = "DELETE FROM items_data WHERE item_id = '$_GET[id]'";

    mysqli_query($connection, $sql) or die(mysqli_error($connection));
    ?>
    <script>
        alert("Item has been deleted successfully!")
        document.location = "./items.php";
    </script>
    <?php
}