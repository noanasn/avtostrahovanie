<?php
session_start();
include $_SERVER["DOCUMENT_ROOT"] . "/connect.php";

// echo $_REQUEST['pass'] . ", ".  $_REQUEST['log'];
if (!empty($_REQUEST['pass']) and !empty($_REQUEST['log'])) {
    $login = $_REQUEST['log'];
    $password = $_REQUEST['pass'];
}
$sql = "SELECT * FROM avtostrah.user WHERE login = '$login' and password = '$password'";
$result = mysqli_query($db, $sql);
$user = mysqli_fetch_row($result);
$role = $user[7];
$id_user = $user[0];

if (!empty($user)) {
    $_SESSION['role'] = $role;
    $_SESSION['id_user'] = $id_user;
    if ($role == 'Администратор') {
        echo '<script>document.location.href = "../index.php"</script>';
    } else if ($role == 'Пользователь') {
        $_SESSION['id_user'] = $user[0];
        $_SESSION['surname'] = $user[1];
        $_SESSION['name'] = $user[2];
        $_SESSION['patronymic'] = $user[3];
        $_SESSION['birthday'] = $user[4];
        $_SESSION['login'] = $user[5];
        $_SESSION['password'] = $user[6];
        $_SESSION['status'] = $user[7];
        $_SESSION['VIN'] = $user[8];
        $session_data = json_encode($_SESSION);
        echo "<script>console.log('$session_data');</script>";
        echo '<script>document.location.href="../index.php"</script>';
    }
    $session_data = json_encode($_SESSION);
    echo "<script>console.log('$session_data');</script>";
} else if (empty($user)) {
    $sql = "SELECT * FROM `strahovatel` WHERE login = '$login' and password = '$password'";
    $result = mysqli_query($db, $sql);
    $strahovatel = mysqli_fetch_row($result);
    $role = 'Страхователь';
    $id_strahovatel = $strahovatel[0];
    $_SESSION['role'] = $role;
    $_SESSION['id_strahovatel'] = $id_strahovatel;

    $_SESSION['id_strahovatel'] = $strahovatel[0];
    $_SESSION['surname'] = $strahovatel[1];
    $_SESSION['name'] = $strahovatel[2];
    $_SESSION['patronymic'] = $strahovatel[3];
    $_SESSION['login'] = $strahovatel[4];
    $_SESSION['password'] = $strahovatel[5];
    $session_data = json_encode($_SESSION);
    echo "<script>console.log('$session_data');</script>";
    echo '<script>document.location.href="../index.php"</script>';
} else {
    echo "<script>alert('Введен неверный логин или пароль!')</script>";
    echo '<script>document.location.href = "auto.php"</script>';
}
