<?
// echo var_dump($_POST);
//array(2) { ["export"]=> string(0) "" ["strah_polis_id_for_export"]=> string(1) "6" }

require_once '../../vendor/autoload.php';
use PhpOffice\PhpWord\TemplateProcessor;
$templateProcessor = new TemplateProcessor('C:\OSPanel\domains\avtostrahovanie\export\sp_for_export.docx');

include $_SERVER["DOCUMENT_ROOT"] . "/connect.php";

$sp_id = $_POST['strah_polis_id_for_export'];

$sql1 = "SET lc_time_names = 'ru_RU';";

$sql = "SELECT  
sp.Series, 
sp.Number,
DATE_FORMAT(sp.Srok_Strah_Ot, '%d %M %Y г.') AS 'strah_ot',
DATE_FORMAT(sp.Srok_Strah_Do, '%d %M %Y г.') AS 'strah_do',
DATE_FORMAT(sp.Date_Zakluch, '%d %M %Y г.') AS 'date_zakluch',
DATE_FORMAT(sp.Date_Vidach, '%d %M %Y г.') AS 'date_vidach',
sp.Strah_Premiya,
a.VIN,
concat(sotr.surname, ' ', SUBSTRING(sotr.name, 1, 1), '. ', SUBSTRING(sotr.patronymic, 1, 1), '.') as 'Sotrudnik',
concat(str.surname, ' ',str.name , ' ',str.patronymic) as 'Strahovatel',
concat(sob.surname, ' ',sob.name ,' ',sob.patronymic) as 'Sobstvennic',
concat(ma.Nazvanie, ' ',mo.Nazvanie) as 'Avto',
a.Gos_Znak,
concat(a.Doc_type, ' ',a.Doc_series,' ',a.Doc_number) as 'Document',
concat(d.Surname, ' ',d.Name, ' ',d.Patronymic) as 'Driver',
concat(d.Series_VU, ' ',d.Number_VU) as 'VU'
from strah_polis as sp join avto as a on sp.idAvto = a.id join marka as ma on a.idMarka = ma.id join model as mo on a.idModel = mo.id 
join sotrudnik as sotr on sp.idSotrudnik = sotr.id
join strahovatel as str on sp.idstrahovatel = str.id join drivers as d on sp.iddrivers = d.id join sobstvennic as sob on a.idsobstvennic = sob.id
WHERE sp.id = '$sp_id';";

$result1 = mysqli_query($db,$sql1) or die(mysqli_error($db));
$result = mysqli_query($db,$sql) or die(mysqli_error($db));
$data = mysqli_fetch_row($result);
echo var_dump($data);

$sp_series = $data[0];
$sp_number = $data[1];
$sp_Srok_Strah_Ot = $data[2];
$sp_Srok_Strah_Do = $data[3];
$sp_Date_Zakluch = $data[4];
$sp_Date_Vidach = $data[5];
$sp_Strah_Premiya = $data[6];
$VIN = $data[7];
$sotrudnik = $data[8];
$strahovatel = $data[9];
$sobstvennic = $data[10];
$marka_model = $data[11];
$gos_znak = $data[12];
$document = $data[13];
$driver = $data[14];
$vu = $data[15];
// header('Location: ' . $_SERVER['HTTP_REFERER']);
// mysqli_free_result($row_data);

$templateProcessor->setValue('sp_series', $sp_series);
$templateProcessor->setValue('sp_number', $sp_number);
$templateProcessor->setValue('strah_ot', $sp_Srok_Strah_Ot);
$templateProcessor->setValue('strah_do', $sp_Srok_Strah_Do);
$templateProcessor->setValue('date_zakluch', $sp_Date_Zakluch);
$templateProcessor->setValue('date_vidach', $sp_Date_Vidach);
$templateProcessor->setValue('strah_premiya', $sp_Strah_Premiya);
$templateProcessor->setValue('VIN', $VIN);
$templateProcessor->setValue('sotrudnik', $sotrudnik);
$templateProcessor->setValue('strahovatel', $strahovatel);
$templateProcessor->setValue('sobstvennic', $sobstvennic);
$templateProcessor->setValue('marka_model', $marka_model);
$templateProcessor->setValue('gos_znak', $gos_znak);
$templateProcessor->setValue('document', $document);
$templateProcessor->setValue('driver', $driver);
$templateProcessor->setValue('vu', $vu);


$tempFile = tempnam(sys_get_temp_dir(), 'document');
$templateProcessor->saveAs($tempFile);

header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
header('Content-Disposition: attachment; filename="Strah_polis.docx"');

readfile($tempFile);

unlink($tempFile);

mysqli_close($db);




// $hahahah = 'Mirko';
// $templateProcessor->setValue('first_name', $hahahah);

// $peoples = [
//     ['number' => '1', 'first_name' => 'Miroslav', 'second_name' => 'Dmitroevich', 'last_name' => 'Zherenkov', 'seria' => 1243, 'number_vu' => 4321, 'class' => 'A'],
//     ['number' => '2', 'first_name' => 'vasf', 'second_name' => 'sfgeffb', 'last_name' => 'seavf', 'seria' => 1243, 'number_vu' => 4321, 'class' => 'b'],
//     ['number' => '3', 'first_name' => 'vasf', 'second_name' => 'sfgeffb', 'last_name' => 'seavf', 'seria' => 1243, 'number_vu' => 4321, 'class' => 'c'],
//     ['number' => '4', 'first_name' => 'vasf', 'second_name' => 'sfgeffb', 'last_name' => 'seavf', 'seria' => 1243, 'number_vu' => 4321, 'class' => 'd'],
// ];

// $templateProcessor->cloneRowAndSetValues('number', $peoples);

// $tempFile = tempnam(sys_get_temp_dir(), 'document');
// $templateProcessor->saveAs($tempFile);

// header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
// header('Content-Disposition: attachment; filename="document.docx"');

// readfile($tempFile);

// unlink($tempFile);
?>