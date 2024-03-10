<?php

session_start();

$session_data = json_encode($_SESSION);
echo "<script>console.log('$session_data');</script>";

unset($_SESSION);

$session_data = json_encode($_SESSION);
echo "<script>console.log('$session_data');</script>";

header("Location: ../index.php");

session_destroy();