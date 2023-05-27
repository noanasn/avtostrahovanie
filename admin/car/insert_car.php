<?
var_dump($_POST);
include $_SERVER["DOCUMENT_ROOT"] . "/connect.php";
if (isset($_POST['insert'])) {
    if ($_POST['pricep'] == "on") {
        $_POST['pricep'] = 1;
    } else {
        $_POST['pricep'] = 0;
    }

    mysqli_query($db, "INSERT INTO `avto` (`Pricep`, `VIN`, `Gos_znak`, `Power`, Doc_type, Doc_series, Doc_number, idMarka, idModel, idSobstvennic) VALUES (
        $_POST[pricep],
        '$_POST[vin]',
       '$_POST[gos_znak]',
        $_POST[power],
        '$_POST[doc_type]',
        $_POST[doc_series],
        $_POST[doc_number],
        $_POST[idMarka],
        $_POST[idModel],
        $_POST[idSobstvennic]
    );") or die(mysqli_error($db));
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
mysqli_free_result($row_data);
mysqli_close($db);
