<?php
// Connect MySQL database
$connection = mysqli_connect("localhost", "root", "", "nutritious_food");

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
?>