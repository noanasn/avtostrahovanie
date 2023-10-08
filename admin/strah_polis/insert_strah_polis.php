<?
var_dump($_POST);
include $_SERVER["DOCUMENT_ROOT"] . "/connect.php";
if (isset($_POST['insert'])) {
    
    mysqli_query($db, "INSERT INTO `strah_polis` (`Series`, `Number`, `Srok_Strah_Ot`, `Srok_Strah_Do`, `Date_Zakluch`, `Date_Vidach`, `Strah_Premiya`, `idStrahovatel`, `idDrivers`, `idAvto`, `idSotrudnik`) VALUES (
        '$_POST[series]',
        '$_POST[number]',
        '$_POST[srok_strah_ot]',
        '$_POST[srok_strah_do]',
        '$_POST[date_zakluch]',
        '$_POST[date_vidach]',
        '$_POST[strah_premiya]',
        '$_POST[idStrahovatel]',
        '$_POST[idDrivers]',
        '$_POST[idAvto]',
        '$_POST[idSotrudnik]'
    );") or die(mysqli_error($db));
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
mysqli_free_result($row_data);
mysqli_close($db);
