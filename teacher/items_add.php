<?php include('header.php') ?>
<?php include('./../config/dbcon.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nutritious Food | Add Items</title>
    <link rel="stylesheet" href="./../css/style.css">
</head>

<body>
    <div class="container-fluid">
        <div class="mt-2">
            <div class="row">
                <div class="col-md-6">
                    <p class="page-title mb-0 font-weight-bold">Items</p>
                    <p class="page-subTitle mb-0">Add Items</p>
                </div>
            </div>
            <hr />
        </div>
        <form method="post" autocomplete="off">
            <div class="mt-2">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Items Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="item_name" placeholder="Enter Items Name"
                                required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Prenatal Quantity Target<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="prenatal_qty" step=".01"
                                placeholder="Enter Prenatal Quantity Target" required>
                            <small id="emailHelp" class="form-text text-muted">By default unit is KG.</small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Postnatal Quantity Target<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="postnatal_qty" step=".01"
                                placeholder="Enter Postnatal Quantity Target" required>
                            <small id="emailHelp" class="form-text text-muted">By default unit is KG.</small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>0-3 Years Baby Quantity Target<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="3Years_qty" step=".01"
                                placeholder="Enter 0-3 Years Baby Quantity Target" required>
                            <small id="emailHelp" class="form-text text-muted">By default unit is KG.</small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>3-6 Years Child Quantity Target<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="6Years_qty" step=".01"
                                placeholder="Enter 3-6 Years Child Quantity Target" required>
                            <small id="emailHelp" class="form-text text-muted">By default unit is KG.</small>
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <button class="btn btn-primary btn-sm" type="submit" name="submit">Submit</button>
                    <a class="btn btn-danger btn-sm" href="./items.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>

<?php

if (isset($_POST['submit'])) {
    // Escape special characters to prevent SQL injection
    $item_name = ucwords(trim($_POST['item_name']));
    $prenatal_qty = $_POST['prenatal_qty'];
    $postnatal_qty = $_POST['postnatal_qty'];
    $_3Years_qty = $_POST['3Years_qty'];
    $_6Years_qty = $_POST['6Years_qty'];

    $items_sql = mysqli_query($connection, "SELECT * FROM items_data WHERE item_name = '$item_name'") or die(mysqli_error($conn));
    $total_data = mysqli_num_rows($items_sql);
    if ($total_data > 0) {
        ?>
        <script>
            alert("Item is already exist! Please update the quantity.");
        </script>
        <?php
    } else {
        // Insert query
        $sql = "INSERT INTO items_data VALUES ('', '$item_name', $prenatal_qty, $postnatal_qty, $_3Years_qty, $_6Years_qty, current_timestamp())";
        mysqli_query($connection, $sql) or die(mysqli_error($connection));
        ?>
        <script>
            alert("Item has been added successfully!")
            document.location = "./items.php";
        </script>
        <?php
    }
}
