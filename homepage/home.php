<?php
// index.php - Landing page
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Nutritious Food Management System</title>
    <style>
        @font-face {
            font-family: "Ubuntu";
            src: url(./../Fonts/Ubuntu-Regular.ttf);
        }

        * {
            font-family: "Ubuntu";
            font-size: 14px;
        }

        body {
            margin: 0;
        }

        header {
            background-color: #d24d87;
            color: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h1 {
            font-size: 22px;
        }

        nav a {
            color: white;
            margin-left: 20px;
            text-decoration: none;
            font-weight: bold;
        }

        .login-button {
            background-color: white;
            color: #d24d87;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 4px;
            border: none;
        }

        .container {
            display: flex;
            justify-content: space-between;
            padding: 40px;
        }

        .left-section {
            width: 50%;
        }

        .left-section h2 {
            color: #d24d87;
            font-size: 28px;
            margin-bottom: 15px;
        }

        .left-section p {
            font-size: 16px;
            line-height: 1.5;
            color: #444;
        }

        .right-section img {
            width: 100%;
            max-width: 500px;
        }
    </style>
</head>

<body>

    <header>
        <h1>Nutritious food Management System</h1>
        <nav>
            <a href="home.php">Home</a>
            <a href="about.php">About</a>
            <a href="contact.php">Contact</a>
            <a class="login-button" href="./../index.php">Login</a>
        </nav>
    </header>

    <div class="container">
        <div class="left-section">
            <h2>Welcome to Nutritious<br>Management System in Anganwadi</h2>
            <p>
                Ensuring the health and well-being of children and pregnant women is crucial for a
                strong foundation of a healthy society. Anganwadis play a vital role in providing
                essential nutrition and healthcare services to these vulnerable groups. Our website
                aims to support Anganwadi workers and supervisors in managing nutrition services
                effectively.
            </p>
        </div>
        <div class="right-section">
            <img src="poshan_universe.svg" alt="Anganwadi Circle Diagram">
        </div>
    </div>

</body>

</html>