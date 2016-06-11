<?php

include('config.php');

session_start();
$message = '';

try {
    $db = new PDO("mysql:host=$hostname;dbname=$dbname", $user, $pass);
}catch (PDOException $e) {
    echo $e->getMessage();
}
?>
