<?php

include('app/app.php');

unset($_SESSION['has_login']);
unset($_SESSION['fullname']);

header('Location: login.php');
?>
