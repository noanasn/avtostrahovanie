<?
var_dump($_POST);
include $_SERVER["DOCUMENT_ROOT"] . "/connect.php";
if (isset($_POST['update'])) {
    if ($_POST['pricep'] == "on") {
        $_POST['pricep'] = 1;
    } else {
        $_POST['pricep'] = 0;
    }

    mysqli_query($db, "UPDATE `avto` SET
    `Pricep` = $_POST[pricep],
    `VIN` = '$_POST[vin]',
    `Gos_znak` = '$_POST[gos_znak]',
    `Power` = $_POST[power],
    Doc_type = '$_POST[doc_type]',
    Doc_series = $_POST[doc_series],
    Doc_number = $_POST[doc_number],
    idMarka = $_POST[idMarka],
    idModel = $_POST[idModel],
    idSobstvennic = $_POST[idSobstvennic] WHERE id = $_POST[car_id];") or die(mysqli_error($db));
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
mysqli_free_result($row_data);
mysqli_close($db);
