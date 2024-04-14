<?
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
concat(d.Series_VU, ' ',d.Number_VU) as 'VU',
a.Pricep
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
$pricep = $data[16];

if ($pricep == '0') {
    $pricep ='Нет';
}
elseif ($pricep == '1') {
    $pricep ='Да';
}

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
$templateProcessor->setValue('pricep', $pricep);


$tempFile = tempnam(sys_get_temp_dir(), 'document');
$templateProcessor->saveAs($tempFile);

header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
header('Content-Disposition: attachment; filename="Strah_polis.docx"');

readfile($tempFile);

unlink($tempFile);

mysqli_close($db);

?>