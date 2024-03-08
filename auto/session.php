<?php
session_start();
include $_SERVER["DOCUMENT_ROOT"] . "/connect.php";

// echo $_REQUEST['pass'] . ", ".  $_REQUEST['log'];
if (!empty($_REQUEST['pass']) and !empty($_REQUEST['log'])) {
    $login = $_REQUEST['log'];
    $password = $_REQUEST['pass'];
}

$data = mysqli_query($db, "SELECT id, Surname, Name, Patronymic, Login, Password, Status FROM `user` WHERE Login = '$login' AND Password = '$password' 
UNION SELECT id, Surname, Name, Patronymic, Login, Password, Status FROM `sotrudnik` WHERE Login = '$login' AND Password = '$password' 
UNION SELECT id, Surname, Name, Patronymic, Login, Password, Status FROM `strahovatel` WHERE Login = '$login' AND Password = '$password';");
$user_data = mysqli_fetch_array($data);

$_SESSION['id_user'] = $user_data['id'];
$_SESSION['surname_user'] = $user_data['Surname'];
$_SESSION['name_user'] = $user_data['Name'];
$_SESSION['patronymic_user'] = $user_data['Patronymic'];
$_SESSION['login_user'] = $user_data['Login'];
$_SESSION['password_user'] = $user_data['Password'];
$_SESSION['status_user'] = $user_data['Status'];

if (!empty($user_data)) {
        echo '<script>document.location.href = "../index.php"</script>';
    }
else if (empty($user_data)) {
    echo "<script>alert('Введен неверный логин или пароль!')</script>";
    echo '<script>document.location.href = "auto.php"</script>';
}