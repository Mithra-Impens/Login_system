<?php
session_start();

session_unset();
session_destroy();
setcookie("remember_username", "", time() - 3600);
setcookie("user_theme", "", time() - 3600);
header("Location: login.php");
exit();
