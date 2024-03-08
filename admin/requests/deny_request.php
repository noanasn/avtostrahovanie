<?
include $_SERVER["DOCUMENT_ROOT"] . "/connect.php";
if (isset($_POST['deny'])) {
    $query = "UPDATE `request` SET `status` = 'Отказана' WHERE id = $_POST[request_id] ";
    if (mysqli_query($db, $query)) {
        echo '<script>alert("Заявка отклонена");';
        echo 'window.location.href = "' . $_SERVER['HTTP_REFERER'] . '";</script>';
    } else {
        echo "Ошибка: " . mysqli_error($db);
    }
}
mysqli_close($db);
?>