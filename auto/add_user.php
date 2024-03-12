<?
// echo(var_dump($_POST));
// include('../connect.php');
require "../connect.php";
$famu = $_POST['famu'];
$nameu = $_POST['nameu'];
$otch = $_POST['otchu'];
$status = 'Пользователь';
$login = $_POST['log'];
$pass = $_POST['pass'];
$queryuser = mysqli_query($db,"INSERT INTO avtostrah.user (Surname,Name,Patronymic,Login,Password,Status) VALUES ('$famu','$nameu','$otch','$login','$pass','$status')");

if($queryuser){
    echo "<script>alert('Регистрация прошла успешно')</script>";
    echo '<script>document.location.href = "auto.php"</script>';
}
else{
    echo "<script>alert('Что-то пошло не так')</script>";
}
?>