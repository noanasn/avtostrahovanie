<?
include $_SERVER["DOCUMENT_ROOT"] . "/connect.php";
if (isset($_POST['insert'])) {
    mysqli_query($db, "INSERT INTO `user` 
    ( `Surname`,`Name`, `Patronymic`,`Birthday`,`Login`,`Password`,`Status`,`VIN`) VALUES ( 
        '$_POST[insert_surname]',
        '$_POST[insert_name]', 
        '$_POST[insert_patronymic]',
        '$_POST[insert_birthday]',
        '$_POST[insert_login]',
        '$_POST[insert_password]',
        '$_POST[insert_status]',
        '$_POST[insert_vin]');") or die(mysqli_error($db));
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
mysqli_free_result($row_data);
mysqli_close($db);
