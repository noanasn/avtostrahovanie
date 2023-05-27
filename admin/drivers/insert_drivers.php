<?
include $_SERVER["DOCUMENT_ROOT"] . "/connect.php";
if (isset($_POST['insert'])) {
    mysqli_query($db, "INSERT INTO `drivers` ( `Surname`,`Name`, `Patronymic`,`Series_VU`,`Number_VU`,`Date_Vidach_VU`) VALUES ( '$_POST[insert_surname]','$_POST[insert_name]', '$_POST[insert_patronymic]','$_POST[insert_series_VU]','$_POST[insert_number_VU]','$_POST[insert_date_vidach_VU]');") or die(mysqli_error($db));
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
mysqli_free_result($row_data);
mysqli_close($db);
