<?
// echo(var_dump($_POST));
include('../connect.php');
$famu = $_POST['famu'];
$nameu = $_POST['nameu'];
$otch = $_POST['otchu'];
$status = $_POST['status'];
$login = $_POST['log'];
$pass = $_POST['pass'];
$birth = $_POST['birth'];
$VIN = $_POST['VIN'];
$queryuser = mysqli_query($db,"INSERT INTO avtostrahovanie.user (Surname,Name,Patronymic,Birthday,Login,Password,Status) VALUES ('$famu','$nameu','$otch','$birth','$login','$pass','$status','$VIN')");

if($queryuser){
    echo "<script>alert('Успешно')</script>";
    // echo '<meta http-equiv="refresh" content=0;url=auto.php>';
    echo '<script>document.location.href = "auto.php"</script>';
}
else
echo "<script>alert('Что-то пошло не так')</script>";
?>