<?php
session_start();

$username = $_COOKIE['remember_username'] ?? "";
$theme = $_COOKIE['user_theme'] ?? "light";

$error = $_SESSION['error'] ?? "";
unset($_SESSION['error']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body.dark { background-color: #121212; color: white; }
        body.warm { background-color: #f4a261; color: white; }
        body.light { background-color: #f8f9fa; }
    </style>
</head>

<body class="<?php echo $theme; ?> d-flex align-items-center" style="height:100vh;">

<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-4">
            <div class="card p-4 rounded-3 shadow">

                <h3 class="text-center mb-3">Login</h3>

                <?php if($error): ?>
                    <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php endif; ?>

                <form action="auth.php" method="POST">

                    <input type="text" name="username" class="form-control mb-3"
                        placeholder="Username" value="<?php echo $username; ?>">

                    <input type="email" name="email" class="form-control mb-3"
                        placeholder="Email">

                    <input type="password" name="password" class="form-control mb-3"
                        placeholder="Password">

                    <div class="form-check mb-3">
                        <input type="checkbox" name="remember" class="form-check-input">
                        <label class="form-check-label">Remember Me</label>
                    </div>

                    <button class="btn btn-primary w-100">Login</button>

                </form>

            </div>
        </div>

    </div>
</div>

</body>
</html>