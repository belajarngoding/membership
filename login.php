<?php

include('app/app.php');

if($_POST) {

    $query = $db->prepare("SELECT email, password, fullname FROM users WHERE email=:email AND password=:password");
    $params = array(
        ':email' => $_POST['email'],
        ':password' => md5($_POST['password']),
    );
    $query->execute($params);

    $results = $query->fetch();
    if($results) {

        $_SESSION['has_login'] = true;
        $_SESSION['fullname'] = $results['fullname'];
        header('Location: index.php');
        die();

    } else {
        $message = '<p style="color:red;">Email atau password salah!</p>';
    }


}
?>
<?php echo $message;?>
<form method="post">
    <p>
        <label for="email">Email</label>
        <input type="text" name="email" value="cahyo.wicaksono@gmail.com">
    </p>

    <p>
        <label for="password">Password</label>
        <input type="password" name="password" value="password">
    </p>

    <p>
        <input type="submit" name="Login">
    </p>
</form>
<p>
    Silahkan daftar <a href="register.php">disini</a>
</p>
