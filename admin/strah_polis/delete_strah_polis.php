<?
include $_SERVER["DOCUMENT_ROOT"]."/connect.php";
if (isset($_POST['delete'])) {
    mysqli_query($db, "DELETE FROM `Strah_polis` WHERE id = $_POST[strah_polis_id];")or die(mysqli_error($db));
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
mysqli_free_result($row_data);
mysqli_close($db);
?>
