<?php
require_once("db.php");
require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlxs;

    $upload_file=$_FILES['upload_file']['name'];
    $extension=pathinfo($upload_file, PATHINFO_EXTENSION);
    if($extension=='xlsx'){
        $targetpath=$_FILES['upload_file']['tmp_name'];
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($targetpath);
        $data=$spreadsheet->getActiveSheet()->toArray();
        $sheetcount=count($data);
        if($sheetcount>1){
            unset($data[0]);
            foreach($data as $row){
                $surname=$row['0'];
                $name=$row['1'];
                $mid_name=$row['2'];
                $email=$row['3'];
                $phone=$row['4'];
                $position=$row['5'];
            $checkHuman = "SELECT phone FROM human Where phone='$phone' ";
            $checkHuman_result = mysqli_query($con, $checkHuman);
            if(mysqli_num_rows($checkHuman_result)==0)
            {
                $in_query="INSERT INTO `human` (surname, name, mid_name, email, phone, position) VALUES ('$surname', '$name', '$mid_name', '$email', '$phone', '$position')";
                $in_result =mysqli_query($con, $in_query);
            }
        }
        }
    }
    header('location: ../html/index.html')
?>
