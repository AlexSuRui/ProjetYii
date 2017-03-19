<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact';
function col_name($string) {

  $translit = array(
    '/ä|æ|ǽ/' => 'ae',
    '/ö|œ/' => 'oe',
    '/ü/' => 'ue',
    '/Ä/' => 'Ae',
    '/Ü/' => 'Ue',
    '/Ö/' => 'Oe',
    '/À|Á|Â|Ã|Ä|Å|Ǻ|Ā|Ă|Ą|Ǎ|А/' => 'A',
    '/à|á|â|ã|å|ǻ|ā|ă|ą|ǎ|ª|а/' => 'a',
    '/б/' => 'Б',
    '/б/' => 'b',
    '/Ç|Ć|Ĉ|Ċ|Č|Ц|Ч/' => 'C',
    '/ç|ć|ĉ|ċ|č|ц|ч/' => 'c',
    '/Ð|Ď|Đ|Д/' => 'D',
    '/ð|ď|đ|д/' => 'd',
    '/È|É|Ê|Ë|Ē|Ĕ|Ė|Ę|Ě|Ё|Е|З|Э/' => 'E',
    '/è|é|ê|ë|ē|ĕ|ė|ę|ě|ё|е|з|э/' => 'e',
    '/Ф/' => 'F',
    '/ф/' => 'f',
    '/Ĝ|Ğ|Ġ|Ģ|Г/' => 'G',
    '/ĝ|ğ|ġ|ģ|г/' => 'g',
    '/Ĥ|Ħ|Х/' => 'H',
    '/ĥ|ħ|х/' => 'h',
    '/Ì|Í|Î|Ï|Ĩ|Ī|Ĭ|Ǐ|Į|İ|И|Й|Ы/' => 'I',
    '/ì|í|î|ï|ĩ|ī|ĭ|ǐ|į|ı|и|й|ы/' => 'i',
    '/Ĵ|Ъ/' => 'J',
    '/ĵ|ъ/' => 'j',
    '/Ķ|К/' => 'K',
    '/ķ|к/' => 'k',
    '/Ĺ|Ļ|Ľ|Ŀ|Ł|Л/' => 'L',
    '/ĺ|ļ|ľ|ŀ|ł|л/' => 'l',
    '/М/' => 'M',
    '/м/' => 'm',
    '/Ñ|Ń|Ņ|Ň|Н/' => 'N',
    '/ñ|ń|ņ|ň|ŉ|н/' => 'n',
    '/Ò|Ó|Ô|Õ|Ō|Ŏ|Ǒ|Ő|Ơ|Ø|Ǿ|О/' => 'O',
    '/ò|ó|ô|õ|ō|ŏ|ǒ|ő|ơ|ø|ǿ|º|о/' => 'o',
    '/П/' => 'P',
    '/п/' => 'p',
    '/Ŕ|Ŗ|Ř|Р/' => 'R',
    '/ŕ|ŗ|ř|р/' => 'r',
    '/Ś|Ŝ|Ş|Š|С|Ш|Щ/' => 'S',
    '/ś|ŝ|ş|š|ſ|с|ш|щ/' => 's',
    '/Ţ|Ť|Ŧ|Т/' => 'T',
    '/ţ|ť|ŧ|т/' => 't',
    '/Ù|Ú|Û|Ũ|Ū|Ŭ|Ů|Ű|Ų|Ư|Ǔ|Ǖ|Ǘ|Ǚ|Ǜ|У/' => 'U',
    '/ù|ú|û|ũ|ū|ŭ|ů|ű|ų|ư|ǔ|ǖ|ǘ|ǚ|ǜ|у/' => 'u',
    '/В/' => 'V',
    '/в/' => 'v',
    '/Ý|Ÿ|Ŷ/' => 'Y',
    '/ý|ÿ|ŷ/' => 'y',
    '/Ŵ/' => 'W',
    '/ŵ/' => 'w',
    '/Ź|Ż|Ž|Ж/' => 'Z',
    '/ź|ż|ž|ж/' => 'z',
    '/Æ|Ǽ/' => 'AE',
    '/ß/' => 'ss',
    '/Ĳ/' => 'IJ',
    '/ĳ/' => 'ij',
    '/Œ/' => 'OE',
    '/ƒ/' => 'f',
    '/Ю/' => 'Ju',
    '/ю/' => 'ju',
    '/Я/' => 'Ja',
    '/я/' => 'ja'
  );

  $string = preg_replace(array_keys($translit), array_values($translit), $string);
  $string = str_replace('&amp;', '-and-', $string);

  //replace some symbols with underscore
  $string = str_replace(array(' ', '.', ',', '"', '=', '`', ']', '[', '|', ':', '+', '&quot;', '!', '/', "\\", '-'), '_', $string);

  //drop everyhing thats not alpha-numeric or underscore
  $allowed = "/[^a-z0-9\\_\\\\]/i";
  $string = preg_replace($allowed, '', $string);

  //remove double unserscores
  $string = preg_replace('/_+/', '_', $string);

  //trim the lenght
  $string = substr($string, 0, 100);

  //remove underscores from the ends
  $string = trim($string, '_');
 
  //to lowercase
  $string = strtolower($string);

  //this ranames id field to imported id, you may want to skip this
  if($string === 'id') {
    $string = 'imported_id';
  }

  return $string;
}

require('Classes/PHPExcel/IOFactory.php');
//this line defines used reader, for different formats check PHPExcel/Reader/ folder
$objReader = PHPExcel_IOFactory::createReader('Excel5');

$objPHPExcel = $objReader->load("/Users/alexgreen/basic/web/10autofilter.xls");
$sheet = $objPHPExcel->getActiveSheet();

// echo '<pre>';
// foreach($sheet->getRowIterator() as $row) {
//   echo 'CREATE TABLE IF NOT EXISTS `my_table` (' . "\n";
//   echo ' `id` int(11) NOT NULL AUTO_INCREMENT,' . "\n";
//   foreach($row->getCellIterator() as $key => $cell){
//     if(1 == $row->getRowIndex ()) {
//       echo ' `'.col_name($cell->getCalculatedValue()).'` varchar(255) COLLATE utf8_unicode_ci NOT NULL,' . "\n";
//     }
//   }
//   echo ' PRIMARY KEY (`id`)' . "\n";
//   echo ")\nENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;\n";
//   exit;
// }
// echo '</pre>';
echo '<pre>';
foreach($sheet->getRowIterator() as $row) {
  $rowData = array();
  foreach($row->getCellIterator() as $key => $cell) {

    //first row, collect column names
    if(1 == $row->getRowIndex ()) {
      $col_titles[$key] = col_name($cell->getCalculatedValue());

      //format data for insertion
    } else {

      //if the column name contains "date",
      //format the excel date to mysql date,
      //you can do similar things to other special types of fields
      if(stristr($col_titles[$key], 'date')) {
        $rowData[$col_titles[$key]] = PHPExcel_Style_NumberFormat::toFormattedString($cell->getCalculatedValue(), 'YYYY-MM-DD');
      } else {
        $rowData[$col_titles[$key]] = $cell->getCalculatedValue();
      }

    }
  }

  //$rowData now contains all the data from this row as key-value array,
  //you may use it differently if using ORM, PDO or something else.
  //I will just create a raw MySQL query for now.
  if(!empty($rowData)) {

    //generate the query
    $keys = array();
    $values = array();

    foreach ($rowData as $key => $val) {
      $keys[] = '`' . $key . '`';

      //you should add you preferred way of escaping the data here
      $values[] = "'" . addslashes($val) . "'";
    }

    $keys = implode(',', $keys);
    $values = implode(',', $values);

    $sql = "INSERT INTO `my_table` ($keys) VALUES($values);";

    //print or execute the query here
    echo $sql . "\n";
  }
}

echo '</pre>';
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>


</div>