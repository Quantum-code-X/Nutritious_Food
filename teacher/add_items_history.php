<?php include('header.php') ?>
<?php include('./../config/dbcon.php') ?>

<?php
$SQL = 'select * from items_data';
$result = mysqli_query($connection, $SQL) or die(mysqli_error($connection));

/** get the beneficiary details */
$beneficiary_sql = "SELECT * FROM beneficiaries WHERE contact_number = $_GET[id]";
$beneficiary_sql_exec = mysqli_query($connection, $beneficiary_sql) or die(mysqli_error($connection));
$beneficiary_result = mysqli_fetch_assoc($beneficiary_sql_exec);
/** End */

/*** get the item history details */
$items_history_sql = "SELECT * FROM items_history WHERE beneficiary_id = $beneficiary_result[beneficiary_id]";
$items_history_sql_exec = mysqli_query($connection, $items_history_sql) or die(mysqli_error($connection));
/** End */

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nutritious Food | Teacher</title>
    <link rel="stylesheet" href="./../css/style.css">
</head>

<body>
    <div class="container-fluid">
        <div class="mt-2">
            <div class="row">
                <div class="col-md-6">
                    <p class="page-title mb-0 font-weight-bold">Food Management</p>
                    <p class="page-subTitle mb-0">Beneficiary Items History</p>
                </div>
                <div class="col-md-6 d-flex align-items-center justify-content-end">
                    <a class="btn btn-danger btn-sm" href="./items_history.php" role="button">Back</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mt-3">
                    <div class="border p-2">
                        <p class="page-subTitle mb-0 font-weight-bold text-info">Add Items History</p>
                        <form method="post" class="mt-3">
                            <div class="container-fluid">
                                <div class="form-group">
                                    <label>Item Name <span class="text-danger">*</span></label>
                                    <select class="form-control" name="item_name" required>
                                        <option value="">-- Select --</option>
                                        <?php
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<option value='{$row['item_name']}'>{$row['item_name']}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Current Stage<span class="text-danger">*</span></label>
                                    <select class="form-control" name="current_stage" required>
                                        <option value="">-- Select --</option>
                                        <option value="Prenatal">Prenatal</option>
                                        <option value="Postnatal">Postnatal</option>
                                        <option value="0-3 Years">0-3 Years Baby</option>
                                        <option value="3-6 Years Child">3-6 Years Child</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="itemQty">Item Quantity</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">KG</div>
                                        </div>
                                        <input type="number" class="form-control" id="itemQty" name="itemQty"
                                            placeholder="Item Quantity" required>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button class="btn btn-primary btn-sm" type="submit" name="submit">Submit</button>
                                    <button class="btn btn-danger btn-sm" type="reset" name="reset">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 mt-3">
                    <div class="border p-2">
                        <p class="page-subTitle mb-0 font-weight-bold text-info">Items History</p>
                        <div class="row mt-2">
                            <div class="col-md-4">
                                <p><span class="font-weight-bold">Mother Card ID:
                                    </span><?php echo $beneficiary_result['mother_card_id']; ?></p>
                            </div>
                            <div class="col-md-4">
                                <p><span class="font-weight-bold">Name:
                                    </span><?php echo $beneficiary_result['name']; ?></p>
                            </div>
                            <div class="col-md-4">
                                <p><span class="font-weight-bold">Mo. No:
                                    </span><?php echo $beneficiary_result['contact_number']; ?></p>
                            </div>
                        </div>
                        <div class="timeline-container">
                            <?php
                            if (mysqli_num_rows($items_history_sql_exec) > 0) {
                                while ($row = mysqli_fetch_assoc($items_history_sql_exec)) {
                                    ?>
                                    <ul class="timeline">
                                        <li class="item_name text-info">Items : <?php echo $row['item_name'] ?> -
                                            <?php echo $row['item_quantity'] ?> KG
                                        </li>
                                        <li class="stage text-success">Stage : <?php echo $row['current_stage'] ?></li>
                                        <li class="date text-secondary">Provided Date : <?php echo $row['created_date_time'] ?></li>
                                    </ul>
                                    <?php
                                }
                            } else {
                                ?>
                                <div class="text-center mt-5 no-data-found">
                                    <p class="page-subTitle mb-0 font-weight-bold">No History Found</p>
                                    <p>Currently no history found! Please add items history.</p>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<?php

if (isset($_POST['submit'])) {
    // Escape special characters to prevent SQL injection
    $item_name = $_POST['item_name'];
    $itemQty = $_POST['itemQty'];
    $current_stage = $_POST['current_stage'];
    $beneficiary_id = $beneficiary_result['beneficiary_id'];

    // Insert query
    $sql = "INSERT INTO items_history VALUES ('', '$item_name', '$itemQty', '$beneficiary_id', '$current_stage', current_timestamp())";
    mysqli_query($connection, $sql) or die(mysqli_error($connection));
    ?>
    <script>
        alert("Item History has been added successfully!")
        document.location = "./items_history.php";
    </script>
    <?php
}