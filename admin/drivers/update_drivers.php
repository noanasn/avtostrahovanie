<?
include $_SERVER["DOCUMENT_ROOT"]."/connect.php";
if (isset($_POST['update'])) {
    mysqli_query($db, "UPDATE `drivers` SET  `Surname`='$_POST[Surname]', `Name` = '$_POST[Name]', `Patronymic`='$_POST[Patronymic]',`Series_VU`='$_POST[Series_VU]',`Number_VU` ='$_POST[Number_VU]' ,`Date_Vidach_VU`='$_POST[Date_Vidach_VU]' WHERE id = $_POST[drivers_id]") or die(mysqli_error($db));
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
mysqli_free_result($row_data);
mysqli_close($db);