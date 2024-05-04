<?php
include $_SERVER["DOCUMENT_ROOT"]."/connect.php";

// Проверка соединения
if ($db->connect_error) {
    die("connection failed: " . $db->connect_error);
}

// Получение ID марки из запроса AJAX
$marka_id = $_GET['marka_id'];

// Подготовка SQL запроса для выборки моделей, связанных с выбранной маркой
$sql = "SELECT id, Nazvanie FROM model WHERE idMarka = $marka_id ORDER BY id";

$result = $db->query($sql);

// Создание массива для хранения данных о моделях
$models = array();

// Проверка наличия результатов запроса и добавление данных в массив
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $models[] = $row;
    }
}

// Закрытие соединения с базой данных
$db->close();

// Возвращение данных о моделях в формате JSON
echo json_encode($models);
?>