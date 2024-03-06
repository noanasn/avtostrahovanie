 <?
    include $_SERVER["DOCUMENT_ROOT"] . "/connect.php";
    session_start();
    $model_row_data = mysqli_query($db, "SELECT * FROM `model`");
    while(    $model_data = mysqli_fetch_array($model_row_data)){
        echo var_dump($model_data);
        echo "<br>";
    }

    // echo var_dump($model_data);
    ?>
 