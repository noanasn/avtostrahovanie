<?
var_dump($_POST);
include $_SERVER["DOCUMENT_ROOT"] . "/connect.php";
if (isset($_POST['add_car'])) {
    if ($_POST['pricep'] == "on") {
        $_POST['pricep'] = 1;
    } else {
        $_POST['pricep'] = 0;
    }
    echo"$_POST[pricep]";
    mysqli_query($db, "INSERT INTO `sobstvennic` (`Surname`, `Name`, `Patronymic`) VALUES (
        '$_POST[sobstv_surname]',
        '$_POST[sobstv_name]',
       '$_POST[sobstv_patronymic]'
    );") or die(mysqli_error($db));

    $result = mysqli_query($db, "SELECT sobstvennic.id FROM `sobstvennic` WHERE 
    `Surname` = '$_POST[sobstv_surname]' AND
    `Name` = '$_POST[sobstv_name]' AND
    `Patronymic` = '$_POST[sobstv_patronymic]'
    ;") or die(mysqli_error($db));

    $id = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $idSobstvennic = $id['id'];

    // echo"$idSobstvennic";

    mysqli_query($db, "INSERT INTO `avto` (`Pricep`, `VIN`, `Gos_znak`, `Power`, Doc_type, Doc_series, Doc_number, idMarka, idModel, idSobstvennic) VALUES (
        '$_POST[pricep]',
        '$_POST[vin]',
        '$_POST[gos_znak]',
        '$_POST[power]',
        '$_POST[doc_type]',
        '$_POST[doc_series]',
        '$_POST[doc_number]',
        '$_POST[idMarka]',
        '$_POST[idModel]',
        '$idSobstvennic'
     );") or die(mysqli_error($db));
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
mysqli_close($db);
