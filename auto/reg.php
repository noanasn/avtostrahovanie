<?
echo "somw data";
include('../connect.php');
$famu = $_POST['famu'];
$nameu = $_POST['nameu'];
$otch = $_POST['otchu'];
$status = $_POST['status'];
$login = $_POST['Login'];
$pass = $_POST['Password'];
$queryuser = mysqli_query($db,"INSERT INTO sotrudnik(Surname,Name,Patronymic,Birthday,Login,Password,Status) VALUES ('$famu','$nameu','$otch','2023-04-24','$login','$pass','$status')");

if($queryuser){
    echo "<script>alert('Успешно')</script>";
    echo '<meta http-equiv="refresh" content=0;url=auto.php>';
}
else
echo "<script>alert('Что-то пошло не так')</script>";
?>