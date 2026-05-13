<?php include('header.php') ?>
<?php include('./../config/dbcon.php') ?>
<?php
session_start();
$beneficiaryId = $_SESSION['userData']['beneficiary_id'];

$preNatalSQL = "SELECT * FROM `items_history` I, `beneficiaries` B 
        WHERE I.beneficiary_id = B.beneficiary_id 
        and B.beneficiary_id = $beneficiaryId and current_stage='Prenatal'";
$preNatalSQLExec = mysqli_query($connection, $preNatalSQL) or die(mysqli_error($connection));

$postnatalSQL = "SELECT * FROM `items_history` I, `beneficiaries` B 
        WHERE I.beneficiary_id = B.beneficiary_id 
        and B.beneficiary_id = $beneficiaryId and current_stage='Postnatal'";
$postnatalSQLExec = mysqli_query($connection, $postnatalSQL) or die(mysqli_error($connection));

$_3Years = "SELECT * FROM `items_history` I, `beneficiaries` B 
        WHERE I.beneficiary_id = B.beneficiary_id 
        and B.beneficiary_id = $beneficiaryId and current_stage='0-3 Years'";
$_3YearsExec = mysqli_query($connection, $_3Years) or die(mysqli_error($connection));

$_6Years = "SELECT * FROM `items_history` I, `beneficiaries` B 
        WHERE I.beneficiary_id = B.beneficiary_id 
        and B.beneficiary_id = $beneficiaryId and current_stage='3-6 Years Child'";
$_6YearsExec = mysqli_query($connection, $_6Years) or die(mysqli_error($connection));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nutritious Food | Admin</title>
    <link rel="stylesheet" href="./../css/style.css">
</head>

<body>
    <div class="container-fluid">
        <div class="mt-2">
            <div class="row">
                <div class="col-md-6">
                    <p class="page-title mb-0 font-weight-bold">Dashboard</p>
                    <p class="page-subTitle mb-0">My Dashboard</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <!-- Prenatal Data -->
                    <table class="table table-bordered mt-2">
                        <thead class="bg-secondary text-white">
                            <tr class="bg-info">
                                <th scope="col" colspan="4">Prenatal Ration History</th>
                            </tr>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Item Name</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Provided Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (mysqli_num_rows($preNatalSQLExec) > 0) {
                                $i = 0;
                                while ($row = mysqli_fetch_assoc($preNatalSQLExec)) {
                                    $i = $i + 1;
                                    echo "<tr>
                    <td>$i</td>
                    <td>{$row['item_name']}</td>
                    <td>{$row['item_quantity']}KG</td>
                    <td>{$row['created_date_time']}</td>";
                                }
                            } else {
                                echo "<tr class='text-center'><td colspan='6'>Data not Found!</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">
                    <!-- Postnatal Data -->
                    <table class="table table-bordered mt-2">
                        <thead class="bg-secondary text-white">
                            <tr class="bg-info">
                                <th scope="col" colspan="4">Postnatal Ration History</th>
                            </tr>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Item Name</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Provided Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (mysqli_num_rows($postnatalSQLExec) > 0) {
                                $i = 0;
                                while ($row = mysqli_fetch_assoc($postnatalSQLExec)) {
                                    $i = $i + 1;
                                    echo "<tr>
                    <td>$i</td>
                    <td>{$row['item_name']}</td>
                    <td>{$row['item_quantity']}KG</td>
                    <td>{$row['created_date_time']}</td>";
                                }
                            } else {
                                echo "<tr class='text-center'><td colspan='6'>Data not Found!</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">
                    <!-- 0-3 Years Data -->
                    <table class="table table-bordered mt-2">
                        <thead class="bg-secondary text-white">
                            <tr class="bg-info">
                                <th scope="col" colspan="4">0-3 Years Baby Ration History</th>
                            </tr>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Item Name</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Provided Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (mysqli_num_rows($_3YearsExec) > 0) {
                                $i = 0;
                                while ($row = mysqli_fetch_assoc($_3YearsExec)) {
                                    $i = $i + 1;
                                    echo "<tr>
                    <td>$i</td>
                    <td>{$row['item_name']}</td>
                    <td>{$row['item_quantity']}KG</td>
                    <td>{$row['created_date_time']}</td>";
                                }
                            } else {
                                echo "<tr class='text-center'><td colspan='6'>Data not Found!</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">
                    <!-- 3-6 Years Data -->
                    <table class="table table-bordered mt-2">
                        <thead class="bg-secondary text-white">
                            <tr class="bg-info">
                                <th scope="col" colspan="4">3-6 Years Child Ration History</th>
                            </tr>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Item Name</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Provided Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (mysqli_num_rows($_6YearsExec) > 0) {
                                $i = 0;
                                while ($row = mysqli_fetch_assoc($_6YearsExec)) {
                                    $i = $i + 1;
                                    echo "<tr>
                    <td>$i</td>
                    <td>{$row['item_name']}</td>
                    <td>{$row['item_quantity']}KG</td>
                    <td>{$row['created_date_time']}</td>";
                                }
                            } else {
                                echo "<tr class='text-center'><td colspan='6'>Data not Found!</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>