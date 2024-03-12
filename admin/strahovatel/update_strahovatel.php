<?
include $_SERVER["DOCUMENT_ROOT"] . "/connect.php";
if (isset($_POST['update'])) {
    mysqli_query($db, "UPDATE `strahovatel` SET 
    `Name` = '$_POST[Name]',
    `Surname`='$_POST[Surname]', 
    `Patronymic`='$_POST[Patronymic]', 
    `login`='$_POST[Login]', 
    `password`='$_POST[Password]', 
    `status`='Страхователь' 
    WHERE id = $_POST[avtostrah_id]") or die(mysqli_error($db));
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
mysqli_free_result($strahov_of_data);
mysqli_close($db);
