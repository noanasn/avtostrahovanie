<?
include $_SERVER["DOCUMENT_ROOT"]."/connect.php";
if (isset($_POST['update'])) {
    mysqli_query($db, "UPDATE `sotrudnik` SET  
    `Surname`='$_POST[Surname]', 
    `Name` = '$_POST[Name]', 
    `Patronymic`='$_POST[Patronymic]',
    `Birthday`='$_POST[Birthday]',
    `Login` ='$_POST[Login]' ,
    `Password` ='$_POST[Password]' ,
    `Status`='$_POST[Status]' 
    WHERE id = $_POST[sotrudnik_id]") or die(mysqli_error($db));
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
mysqli_free_result($row_data);
mysqli_close($db);