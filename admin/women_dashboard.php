<?php include('header.php') ?>
<?php include('./../config/dbcon.php') ?>
<?php
$centersSQL = "SELECT * FROM anganwadi_centers";
$centerSQLExec = mysqli_query($connection, $centersSQL) or die(mysqli_error($connection));

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nutritious Food | Pregnant Women Dashboard</title>
    <link rel="stylesheet" href="./../css/style.css">
</head>

<body>
    <div class="container-fluid">
        <div class="mt-2">
            <div class="row">
                <div class="col-md-6">
                    <p class="page-title mb-0 font-weight-bold">Beneficiary</p>
                    <p class="page-subTitle mb-0">Beneficiaries Dashboard</p>
                </div>
                <div class="col-md-4 d-flex align-items-center justify-content-end">
                    <select class="form-control" onchange="filterByAnganwadi(event.target.value)">
                        <option value="">-- Filter By Anganwadi --</option>
                        <?php
                        while ($row = mysqli_fetch_assoc($centerSQLExec)) {
                            $selected = ($row['id'] == $_GET['search']) ? "selected" : "";
                            echo "<option value='{$row['id']}' $selected>{$row['anganwadi_name']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-2 d-flex align-items-center">
                    <button class="btn btn-outline-danger btn-block" id="export"
                        onclick="exportToExcel('angTable')">Export to
                        Excel</button>
                </div>
            </div>
        </div>
        <table class="table table-bordered mt-2" id="angTable">
            <thead class="bg-secondary text-white">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Mother Card ID</th>
                    <th scope="col">Anganwadi Name</th>
                    <th scope="col">Beneficiary Name</th>
                    <th scope="col">Husband Name</th>
                    <th scope="col">Date of Birth</th>
                    <th scope="col">Adhar Number</th>
                    <th scope="col">Village</th>
                    <th scope="col">Contact Number</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_GET['search']) && !empty($_GET['search'])) {
                    $sql = "SELECT * FROM beneficiaries a, anganwadi_centers c 
                    where a.anganwadi_center_id = c.id and a.anganwadi_center_id = $_GET[search]";
                } else {
                    $sql = "SELECT * FROM beneficiaries a, anganwadi_centers c where a.anganwadi_center_id = c.id";
                }

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
                    <td>{$row['DOB']}</td>
                    <td>{$row['adhar_number']}</td>
                    <td>{$row['location']}</td>
                    <td>{$row['contact_number']}</td>
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

?>

<script>
    function filterByAnganwadi(value) {
        document.location = './women_dashboard.php?search=' + value;
    }

    function exportToExcel(tableID) {
        var table = document.getElementById(tableID);
        var rows = Array.from(table.rows);
        var csvContent = rows.map(function (row) {
            var cols = Array.from(row.cells);
            return cols.map(function (cell) {
                return cell.innerText;
            }).join(",");
        }).join("\n");
        var blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
        var link = document.createElement("a");
        var url = URL.createObjectURL(blob);
        link.setAttribute("href", url);
        link.setAttribute("download", "users_data.csv");
        link.style.visibility = 'hidden';
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }
</script>