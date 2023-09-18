<?php
session_start();
include $_SERVER["DOCUMENT_ROOT"] . "/connect.php";

// echo $_REQUEST['pass'] . ", ".  $_REQUEST['log'];
if (!empty($_REQUEST['pass']) and !empty($_REQUEST['log'])) {
    $login = $_REQUEST['log'];
    $password = $_REQUEST['pass'];
}
$query = "SELECT * FROM avtostrah.user WHERE login = '$login' and password = '$password'";
$result = mysqli_query($db, $query);
$user = mysqli_fetch_row($result);
$role = $user[7];
$id_user = $user[0];

if (!empty($user)) {
    $_SESSION['role'] = $role;
    $_SESSION['id_user'] = $id_user;
    if ($role == 'Администратор') {
        echo '<script>document.location.href = "../admin/admin.html"</script>';
    } else if ($role == 'Оператор') {
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
} else {

    echo "<script>alert('Введен неверный логин или пароль!')</script>";
    echo '<script>document.location.href = "auto.php"</script>';
    // exit ("Введённые логин или пароль неверны");

}
