<?
require_once '../vendor/autoload.php';

use PhpOffice\PhpWord\TemplateProcessor;

$templateProcessor = new TemplateProcessor('C:\OSPanel\domains\avtostrahovanie\img\sp_template.docx');

$hahahah = 'Mirko';
$templateProcessor->setValue('first_name', $hahahah);

$peoples = [
    ['number' => '1', 'first_name' => 'Miroslav', 'second_name' => 'Dmitroevich', 'last_name' => 'Zherenkov', 'seria' => 1243, 'number_vu' => 4321, 'class' => 'A'],
    ['number' => '2', 'first_name' => 'vasf', 'second_name' => 'sfgeffb', 'last_name' => 'seavf', 'seria' => 1243, 'number_vu' => 4321, 'class' => 'b'],
    ['number' => '3', 'first_name' => 'vasf', 'second_name' => 'sfgeffb', 'last_name' => 'seavf', 'seria' => 1243, 'number_vu' => 4321, 'class' => 'c'],
    ['number' => '4', 'first_name' => 'vasf', 'second_name' => 'sfgeffb', 'last_name' => 'seavf', 'seria' => 1243, 'number_vu' => 4321, 'class' => 'd'],
];

$templateProcessor->cloneRowAndSetValues('number', $peoples);

$tempFile = tempnam(sys_get_temp_dir(), 'document');
$templateProcessor->saveAs($tempFile);

header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
header('Content-Disposition: attachment; filename="document.docx"');

readfile($tempFile);

unlink($tempFile);