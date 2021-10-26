<?php 

   include_once('../config/configuration.php');
   include_once('../config/init.php');


function filterData($str){
    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str). '"';
}


    $fileName = "students"  . ".xls";

    $fields = array('SN','Surname','Firstname','Middle Name','Date of Birth','Address','Phone Number', 'Email','Gender','Nationality', 'Title', 'Company Name', 'Bio', 'Position','Role', 'Company Address', 'Town','Department','Country');

    $excelData = implode("\t", array_values($fields))."\n";



    $get_student = $getFromStudent->get_students();
    //var_dump($get_student);
    $a = 0;
    foreach($get_student as $student){
        $a +=1;
        $rowData = array($a, $student->surname, $student->firstname, $student->middle_name, $student->dob, $student->address, $student->tel, $student->email, $student->gender, $student->nationality, $student->title, $student->company_name, $student->bio, $student->position, $student->role, $student->company_address, $student->town, $student->dept, $student->country);
        array_walk($rowData,'filterData');
        $excelData .= implode("\t", array_values($rowData)). "\n";
    }

      //  header("Content-Disposition: attachment; filename=\"$fileName\"");
       // header("Content-Type: application/vnd.ms-excel");

        header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
        //header("Content-Disposition: attachment; filename=abc.xls");
        header("Content-Disposition: attachment; filename=\"$fileName\"");  //File name extension was wrong


       echo $excelData;
        exit();
     
?>