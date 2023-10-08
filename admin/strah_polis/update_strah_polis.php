<?
var_dump($_POST);
include $_SERVER["DOCUMENT_ROOT"] . "/connect.php";
if (isset($_POST['update'])) {
    if ($_POST['pricep'] == "on") {
        $_POST['pricep'] = 1;
    } else {
        $_POST['pricep'] = 0;
    }

    mysqli_query($db, "UPDATE `strah_polis` SET
    `Series` = '$_POST[series]',
    `Number` = '$_POST[number]',
    `Srok_Strah_Ot` = '$_POST[srok_strah_ot]',
    `Srok_Strah_Do` = '$_POST[srok_strah_do]',
    `Date_Zakluch` = '$_POST[date_zakluch]',
    `Date_Vidach` = '$_POST[date_vidach]',
    `Strah_Premiya` = '$_POST[strah_premiya]',
    `idStrahovatel` = '$_POST[idStrahovatel]',
    `idDrivers` = '$_POST[idDrivers]',
    `idAvto` = '$_POST[idAvto]',
    `idSotrudnik` = '$_POST[idSotrudnik]'
    WHERE id = $_POST[strah_polis_id];") or die(mysqli_error($db));
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
mysqli_free_result($row_data);
mysqli_close($db);
