<?
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment;Filename=Страхователь.xls");
header("Contente-Transfer-Encoding: binary");
echo "<meta charset='UTF-8'>";
include $_SERVER["DOCUMENT_ROOT"]."/connect.php";
$strahov_of_data = mysqli_query($db, "SELECT * FROM `strahovatel`");
?>
<table border="1">
    <tr>
        <th>#</th>
        <th>Фамилия</th>
        <th>Имя</th>
        <th>Отчество</th>
    </tr>
    <? while ($avtostrahovatel = mysqli_fetch_array($strahov_of_data)) { ?>
        <tr>
            <td><? echo $avtostrahovatel['id'] ?></td>
            <td><? echo $avtostrahovatel['Surname'] ?></td>
            <td><? echo $avtostrahovatel['Name'] ?></td>
            <td><? echo $avtostrahovatel['Patronymic'] ?></td>
        </tr>
    <? } ?>
</table>