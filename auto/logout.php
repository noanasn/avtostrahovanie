<?php

// Инициализируем сессию 
session_start();

// Удаляем данные сессии
$_SESSION = [];

// Удаляем идентификатор сессии 
session_destroy();

// Перенаправляем на страницу входа
// header("Location: ./index.php"); 
echo '<script>document.location.href = "../index.php"</script>';
exit();