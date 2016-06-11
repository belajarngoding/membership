<?php

include('app/app.php');

if($_POST) {

    $query = $db->prepare("SELECT email FROM users WHERE email=:email");
    $query->execute(array(':email' => $_POST['email']));
    $exists = $query->fetch();
    if($exists) {

        $message = '<p style="color:red;">Email '. $_POST['email'] . ' sudah terdaftar!</p>';

    } else {

        $query = $db->prepare("INSERT INTO users
            (email, password, fullname)
            VALUES (:email, :password, :fullname)");

        $params = array(
            ':email' => $_POST['email'],
            ':password' => md5($_POST['password']),
            ':fullname' => $_POST['fullname']
        );
        $query->execute($params);
        $message = '<p style="color:green;">Selamat anda telah terdaftar sebagai member.<a href="login.php">Login</a></p>';
        
    }

}
?>
<?php echo $message;?>
<form method="post">
    <p>
        <label for="email">Email</label>
        <input type="text" name="email">
    </p>

    <p>
        <label for="password">Password</label>
        <input type="password" name="password">
    </p>

    <p>
        <label for="fullname">Fullname</label>
        <input type="text" name="fullname">
    </p>

    <p>
        <input type="submit" name="Login">
    </p>
</form>
