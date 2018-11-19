<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
/* Locking this down to my IP */
//if("130.18.61.45" != $_SERVER['REMOTE_ADDR'])  header('location: https://apaciterite.cep.msstate.edu');
//echo "Development Access " . $_SERVER['REMOTE_ADDR']. " </br>";

/* including the next line will automaticly call CAS and return if the Authetication works */
require_once('./inc/CAS/1.3.5/casAuth.php');
require_once('./inc/PHPExcel-1.8.0/Classes/PHPExcel.php');
//require_once('./inc/PHPExcel-1.8.0/Classes/PHPExcel/IOFactory.php');


// This holds the passwords stored outside of the out of the repo.
include_once("../env/init.php");
  $dblink = mysqli_connect("localhost","user_rw",$mysqlAccessPW['user_rw'],"webdb");

  $page_title ="CAS Login Records";
  $file_name = "CASLoginRec.xlsx";


  /* This example writes to a folder placed in the PHPExcel-1.8.0 and set to allow the server
   * to write to it.  This opens a security hole but allows the example to run without the expectation
   * of being allowed to write to the temp directory or directly to the output stream.  These can be
   * locked down in many enviroments.
   * Large exports run out of system memory.  Writing to disk however is a solution.
   */

    PHPExcel_Settings::setCacheStorageMethod(PHPExcel_CachedObjectStorageFactory::cache_to_phpTemp);

  // Create new PHPExcel object
  $objPHPExcel = new PHPExcel();

  $sheet = $objPHPExcel->getActiveSheet();
  $sheet->setTitle($page_title);
  $col_names = array();
  $column_letter = 'A';
  $row_number = 1;
  $rowTitles=array("Record Id", "Timestamp", "NetId","IP Address");
  foreach($rowTitles AS $title){
    $sheet->setCellValue($column_letter.'1', $title);
      $column_letter++;
  }
  $row_number++;




  $sql = "SELECT ";
  $sql.= " recid, ";
  $sql.= "timestamp, ";
  $sql.= "netId, ";
  $sql.= "ipAddress ";
  $sql.= "FROM cas_logins";
  $stmt = $dblink->prepare($sql);
  if(false == $stmt){
    echo "Bad SQL Statement: ".$sql."</br>" ;
    echo mysqli_stmt_error($stmt);
  }
  //$stmt->bind_param();
  $result=$stmt->execute();

  if(false == $result){
    echo "SQL Error: ".$sql."</br>" ;
    echo mysqli_stmt_error($stmt);
  }
  // You need to set up the varables for the result to place the entries into
  $recid="";
  $timestamp="";
  $netId="";
  $ipAddress="";

  $result = $stmt->bind_result($recid,$timestamp,$netId,$ipAddress);
  $rowCount=0;
 /*
  echo "<pre>";
  print_r( $stmt->result_metadata());
  echo "</pre>";

  */
  while ($row = $stmt->fetch()) {
    /*
    echo " recid: ".$recid;
    echo " timestamp: ".$timestamp;
    echo " NetId: ".$netId;
    echo " IPAddress: ".$ipAddress;
    //echo "</br>";

     */
    $rowCount++;
    //iterate from A2 to whatever
    $column_letter = 'A';
    $sheet->setCellValue($column_letter.$row_number,  html_entity_decode($recid, ENT_QUOTES));
    $column_letter++;
    $sheet->setCellValue($column_letter.$row_number,  html_entity_decode($timestamp, ENT_QUOTES));
    $column_letter++;
    $sheet->setCellValue($column_letter.$row_number,  html_entity_decode($netId, ENT_QUOTES));
    $column_letter++;
    $sheet->setCellValue($column_letter.$row_number,  html_entity_decode($ipAddress, ENT_QUOTES));
    $column_letter++;
    $row_number++;

  }
  if(0==$rowCount){
    $sheet->setCellValue('A2', 'No records found.');
    $sheet->mergeCells('A2:'.$column_letter.'2');
  }


////////////////////////////////////////////////////////////////////////////////////////////////
// End of part you should normally care about
////////////////////////////////////////////////////////////////////////////////////////////////

// set some defaults for each sheet in worksheet
foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
  $objPHPExcel->setActiveSheetIndex($objPHPExcel->getIndex($worksheet));

  $sheet = $objPHPExcel->getActiveSheet();
  $cellIterator = $sheet->getRowIterator()->current()->getCellIterator();
  $cellIterator->setIterateOnlyExistingCells(true);

  // set all columns to auto size the column width
  foreach ($cellIterator as $cell) {
    $sheet->getColumnDimension($cell->getColumn())->setAutoSize(true);
  }

  // set the first row to header style
  $sheet->getStyle('A1:'.$column_letter.'1')->applyFromArray(
    array(
      'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => array('rgb' => '333333')
      ),
      'font'  => array(
        'bold'  => true,
        'color' => array('rgb' => 'FFFFFF'),
      ),
      'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER
      )
    )
  );

  $sheet->freezePane('A2');
}


// This uses the temp file methiod **/
// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);
$filepath = '/tmp/'.rand(0, getrandmax()).rand(0, getrandmax()).'.xlsx';

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save($filepath);


header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $file_name . '"');
header('Cache-Control: max-age=0');


readfile($filepath);

unlink($filepath);


// This would be the direct stream methiod

//$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
//$objWriter->save('php://output');






?>
