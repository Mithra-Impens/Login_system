<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];
$email = $_SESSION['email'];
$theme = $_SESSION['theme'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body.dark { background-color: #121212; color: white; }
        body.warm { background-color: #f4a261; color: white; }
        body.light { background-color: #f8f9fa; }
body.dark {
    background-color: #121212;
    color: white;
}

body.dark .card {
    background-color: #1e1e1e;
    color: white;
}

body.warm {
    background: linear-gradient(135deg, #f4a261, #e76f51);
    color: white;
}

body.warm .card {
    background-color: rgba(255, 255, 255, 0.2);
    color: white;
}

body.light {
    background-color: #f8f9fa;
}

    </style>
</head>

<body class="<?php echo $theme; ?> d-flex align-items-center" style="height:100vh;">

<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-5">
            <div class="card p-4 rounded-3 shadow text-center">

                <h2>Welcome, <?php echo $username; ?></h2>
                <hr>

                <p><strong>Email:</strong> <?php echo $email; ?></p>
                <p><strong>User ID:</strong> <?php echo $user_id; ?></p>
                <p><strong>Theme:</strong> <?php echo ucfirst($theme); ?></p>

                <a href="logout.php" class="btn btn-danger w-100 mt-3">Logout</a>

            </div>
        </div>

    </div>
</div>

</body>
</html>
