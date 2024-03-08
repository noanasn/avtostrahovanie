<?
include $_SERVER["DOCUMENT_ROOT"] . "/connect.php";
session_start();
if (isset($_POST['accept'])) {
    $data = mysqli_query($db, "SELECT * FROM `request` WHERE `id` = '$_POST[request_id]'");
    $request = mysqli_fetch_array($data);

    mysqli_query($db, "INSERT INTO `sobstvennic` (`Surname`,`Name`,`Patronymic`) VALUES ( 
        '$request[sobstv_surname]', 
        '$request[sobstv_name]',
        '$request[sobstv_patronymic]');") or die(mysqli_error($db));

    mysqli_query($db, "INSERT INTO `strahovatel` ( `Surname`,`Name`,`Patronymic`) VALUES ( 
        '$request[strah_surname]',
        '$request[strah_name]',
        '$request[strah_patronymic]');") or die(mysqli_error($db));

    mysqli_query($db, "INSERT INTO `drivers` ( `Surname`,`Name`, `Patronymic`,`Series_VU`,`Number_VU`,`Date_Vidach_VU`) VALUES ( 
        '$request[driver_surname]',
        '$request[driver_name]', 
        '$request[driver_patronymic]',
        '$request[driver_series_vu]',
        '$request[driver_number_vu]',
        '$request[driver_date_vidach_vu]');") or die(mysqli_error($db));

    $data = mysqli_query($db, "SELECT (`id`) FROM `sobstvennic` WHERE 
        `Surname`='$request[sobstv_surname]'AND 
        `Name`='$request[sobstv_name]' AND
        `Patronymic`='$request[sobstv_patronymic]';");
    $row_data = mysqli_fetch_array($data);
    $idSobstvennic = $row_data['id']; //idSobstvennic

    mysqli_query($db, "INSERT INTO `avto` (`Pricep`, `VIN`, `Gos_znak`, `Power`, Doc_type, Doc_series, Doc_number, idMarka, idModel, idSobstvennic) VALUES (
        $request[pricep],
        '$request[VIN]',
        '$request[gos_znak]',
        $request[power],
        '$request[doc_type]',
        '$request[doc_series]',
        $request[doc_number],
        $request[marka],
        $request[model],
        $idSobstvennic);") or die(mysqli_error($db));

    $SP_Series = ["ААС", "ААВ", "ККК", "МММ", "ЕЕЕ", "ИИИ", "ХХХ"][array_rand(["ААС", "ААВ", "ККК", "МММ", "ЕЕЕ", "ИИИ", "ХХХ"])];

    $first_numb = mt_rand(1, 9);
    $next_numb = '';
    for ($i = 0; $i < 9; $i++) {
        $next_numb .= mt_rand(0, 9);
    }
    $SP_number_str = $first_numb . $next_numb;
    $SP_number = (int)$SP_number_str;

    $strah_ot = date('Y-m-d', strtotime('+1 day'));
    $strah_do = date('Y-m-d', strtotime('+1 day +' . $request['srok_strah'] . ' months'));
    $date_zakluch = date('Y-m-d');
    $date_vidach = date('Y-m-d', strtotime('+1 day'));

    $data = mysqli_query($db, "SELECT (`id`) FROM `strahovatel` WHERE 
        `Surname`='$request[strah_surname]'AND 
        `Name`='$request[strah_name]' AND
        `Patronymic`='$request[strah_patronymic]';");
    $row_data = mysqli_fetch_array($data);
    $idStrahovatel = $row_data['id']; //idStrahovatel

    $data = mysqli_query($db, "SELECT (`id`) FROM `drivers` WHERE 
        `Surname` = '$request[driver_surname]'AND 
        `Name` = '$request[driver_name]' AND
        `Patronymic` = '$request[driver_patronymic]' AND
        `Series_VU` = '$request[driver_series_vu]' AND
        `Number_VU` = '$request[driver_number_vu]' AND
        `Date_Vidach_VU` = '$request[driver_date_vidach_vu]';");
    $row_data = mysqli_fetch_array($data);
    $idDriver = $row_data['id']; //idDriver

    echo $idDriver;

    $data = mysqli_query($db, "SELECT (`id`) FROM `avto` WHERE 
        `VIN` = '$request[VIN]';");
    $row_data = mysqli_fetch_array($data);
    $idAvto = $row_data['id']; //idAvto

    $data = mysqli_query($db, "SELECT (`id`) FROM `sotrudnik` WHERE 
        `id` = '$_SESSION[id_user]';");
    $row_data = mysqli_fetch_array($data);
    $idSotrudnik = $row_data['id']; //idSotrudnik

    $query = "INSERT INTO `strah_polis` (`Series`, `Number`, `Srok_Strah_Ot`, `Srok_Strah_Do`, `Date_Zakluch`, `Date_Vidach`, `Strah_Premiya`, `idStrahovatel`, `idDrivers`, `idAvto`, `idSotrudnik`) VALUES (
        '$SP_Series',
        '$SP_number',
        '$strah_ot',
        '$strah_do',
        '$date_zakluch',
        '$date_vidach',
        '$request[strah_premiya]',
        '$idStrahovatel',
        '$idDriver',
        '$idAvto',
        '$idSotrudnik'
    );";

    if (mysqli_query($db, $query)) {
        echo '<script>alert("Страховой полис добавлен");';
        echo 'window.location.href = "' . $_SERVER['HTTP_REFERER'] . '";</script>';
    } else {
        echo "Ошибка: " . mysqli_error($db);
    }

    $query = "UPDATE `request` SET `status` = 'Одобрена' WHERE id = $request[id] ";
    if (mysqli_query($db, $query)) {
        echo '<script>alert("Заявка одобрена");';
        echo 'window.location.href = "' . $_SERVER['HTTP_REFERER'] . '";</script>';
    } else {
        echo "Ошибка: " . mysqli_error($db);
    }
    mysqli_close($db);
}