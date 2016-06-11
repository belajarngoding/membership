<?php

include('app/app.php');

if(!$_SESSION['has_login']) {

    header('Location: login.php');
    die();
}
?>
<h1>Selamat datang <?php echo $_SESSION['fullname'];?></h1>
<p><a href="logout.php">Logout</a></p>
