<!DOCTYPE html>
<html>
<head>
    <title> Digital food record  for anganwadi workers

Select Role</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background:
        linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)),
        url('./images/login_side.avif') no-repeat center center/cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            text-align: center;
            color: #fff;
        }

        h1 {
            margin-bottom: 40px;
        }

        .card-container {
            display: flex;
            gap: 30px;
            justify-content: center;
        }

        .card {
            background: white;
            color: black;
            padding: 30px;
            width: 200px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            cursor: pointer;
            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.3);
        }

        .icon {
            font-size: 50px;
            margin-bottom: 15px;
        }

        a {
            text-decoration: none;
        }

        .admin { border-top: 5px solid #ff4b5c; }
        .teacher { border-top: 5px solid #00c9a7; }
        .beneficiary { border-top: 5px solid #845ec2; }

    </style>
</head>

<body>

<div class="container">
    <h1> Digital food record  for anganwadi workers</h1>

<h2>Select Login Type</h2>

    <div class="card-container">

        <a href="index.php?role=admin">
            <div class="card admin">
                <div class="icon">👨‍💼</div>
                <h3>Admin</h3>
                <p>Manage system</p>
            </div>
        </a>

        <a href="index.php?role=teacher">
            <div class="card teacher">
                <div class="icon">👩‍🏫</div>
                <h3>Teacher</h3>
                <p>Manage distribution</p>
            </div>
        </a>

        <a href="index.php?role=beneficiary">
            <div class="card beneficiary">
                <div class="icon">👨‍👩‍👧</div>
                <h3>Beneficiary</h3>
                <p>View services</p>
            </div>
        </a>

    </div>
</div>

</body>
</html>