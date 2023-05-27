<?
include $_SERVER["DOCUMENT_ROOT"]."/connect.php";
if (isset($_POST['insert'])) {
    mysqli_query($db, "INSERT INTO `sobstvennic` (`Surname`,`Name`,`Patronymic`) VALUES ( '$_POST[insert_surname]', '$_POST[insert_name]','$_POST[insert_patronymic]');") or die(mysqli_error($db));
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
mysqli_free_result($row_data);
mysqli_close($db);
