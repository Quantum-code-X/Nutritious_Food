<?php include('header.php') ?>
<?php include('./../config/dbcon.php') ?>

<?php
// Example: Get one Anganwadi teachers by ID
$id = $_GET['id']; // or use $_POST['id'] depending on your form method
$id = mysqli_real_escape_string($connection, $id);

$query = mysqli_query($connection, "SELECT * FROM items_data WHERE item_id = $id LIMIT 1") or die(mysqli_error($connection));
$row = mysqli_fetch_assoc($query);
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
                                value="<?php echo $row['item_name']; ?>" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Prenatal Quantity Target<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="prenatal_qty" step=".01"
                                value="<?php echo $row['prenatal_qty']; ?>" placeholder="Enter Prenatal Quantity Target"
                                required>
                            <small id="emailHelp" class="form-text text-muted">By default unit is KG.</small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Postnatal Quantity Target<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="postnatal_qty" step=".01"
                                value="<?php echo $row['postnatal_qty']; ?>"
                                placeholder="Enter Postnatal Quantity Target" required>
                            <small id="emailHelp" class="form-text text-muted">By default unit is KG.</small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>0-3 Years Baby Quantity Target<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="3Years_qty" step=".01"
                                value="<?php echo $row['3Years_qty']; ?>"
                                placeholder="Enter 0-3 Years Baby Quantity Target" required>
                            <small id="emailHelp" class="form-text text-muted">By default unit is KG.</small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>3-6 Years Child Quantity Target<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="6Years_qty" step=".01"
                                value="<?php echo $row['6Years_qty']; ?>"
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
    $item_name = strtoupper(trim($_POST['item_name']));
    $prenatal_qty = $_POST['prenatal_qty'];
    $postnatal_qty = $_POST['postnatal_qty'];
    $_3Years_qty = $_POST['3Years_qty'];
    $_6Years_qty = $_POST['6Years_qty'];

    // Insert query
    $sql = "UPDATE items_data SET item_name = '$item_name', prenatal_qty = '$prenatal_qty',
     postnatal_qty = '$postnatal_qty', 3Years_qty = '$_3Years_qty', 6Years_qty = '$_6Years_qty'
      WHERE item_id = $_GET[id]";
    mysqli_query($connection, $sql) or die(mysqli_error($connection));
    ?>
    <script>
        alert("Item has been updated successfully!")
        document.location = "./items.php";
    </script>
    <?php
}
