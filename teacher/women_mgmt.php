<?php include('header.php'); ?>
<?php include('./../config/dbcon.php'); ?>

<?php
// ✅ DELETE LOGIC (run before HTML)
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $delete = "DELETE FROM beneficiaries WHERE beneficiary_id = '$id'";
    mysqli_query($connection, $delete) or die(mysqli_error($connection));

    echo "<script>
        alert('Beneficiary deleted successfully!');
        window.location='women_mgmt.php';
    </script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beneficiary List</title>
    <link rel="stylesheet" href="./../css/style.css">
</head>

<body>
<div class="container-fluid">

    <div class="mt-2">
        <div class="row">
            <div class="col-md-6">
                <p class="page-title mb-0 font-weight-bold">Beneficiary</p>
                <p class="page-subTitle mb-0">Beneficiary List</p>
            </div>

            <div class="col-md-6 text-right">
                <a class="btn btn-primary btn-sm" href="./beneficiary_add.php">
                    Create Beneficiary
                </a>
            </div>
        </div>
    </div>

    <!-- TABLE -->
    <table class="table table-bordered mt-2">
        <thead class="bg-secondary text-white">
            <tr>
                <th>#</th>
                <th>Mothercard ID</th>
                <th>Anganwadi Center</th>
                <th>Beneficiary Name</th>
                <th>Husband Name</th>
                <th>Contact Number</th>
                <th>Aadhar Number</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
        <?php
        // ✅ FINAL QUERY (SHOW ALL DATA)
        $sql = "SELECT b.*, a.anganwadi_name 
                FROM beneficiaries b
                LEFT JOIN anganwadi_centers a 
                ON b.anganwadi_center_id = a.id";

        $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));

        if (mysqli_num_rows($result) > 0) {
            $i = 1;

            while ($row = mysqli_fetch_assoc($result)) {
        ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $row['mother_card_id']; ?></td>

                    <!-- ✅ Handle null center -->
                    <td><?= $row['anganwadi_name'] ?? 'No Center'; ?></td>

                    <td><?= $row['name']; ?></td>
                    <td><?= $row['husband_name']; ?></td>
                    <td><?= $row['contact_number']; ?></td>
                    <td><?= $row['adhar_number']; ?></td>

                    <td>
                        <a href="beneficiary_update.php?id=<?= $row['beneficiary_id']; ?>" 
                           class="badge badge-secondary">Edit</a>

                        <a href="women_mgmt.php?id=<?= $row['beneficiary_id']; ?>" 
                           class="badge badge-danger"
                           onclick="return confirm('Are you sure?')">
                           Delete
                        </a>
                    </td>
                </tr>
        <?php
            }
        } else {
        ?>
            <tr>
                <td colspan="8" class="text-center">No Data Found!</td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

</div>
</body>
</html>