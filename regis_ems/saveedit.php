<?php
$Student_id = $_POST['Student_id'];
$StudentStatus = $_POST['StudentStatus'];
$NameTitle = $_POST['NameTitle'];
$Bechelor_Degrees = $_POST['Bechelor_Degrees'];
$Faculty = $_POST['Faculty'];
$FirstName = $_POST['FirstName'];
$Program = $_POST['Program'];
$Major = $_POST['Major'];
$LastName = $_POST['LastName'];
$Place = $_POST['Place'];
$Student_type = $_POST['Student_type'];
$Phone = $_POST['Phone'];
$Study_Time = $_POST['Study_Time'];
$Education_system = $_POST['Education_system'];
$Document = $_POST['Document'];
$EMS_no = $_POST['EMS_no'];
$EMS_senddate = $_POST['EMS_senddate'];
$ems_timesave = $_POST['EMS_timesave'];

/*$Student_id;
print $StudentStatus ;
print $NameTitle ;
print $Bechelor_Degrees ;
print $Faculty ;
print $FirstName ;
print $Program ;
print $Major ;
print $LastName ;
print $Place ;
print $Student_type ;
print $Phone ;
print $Study_Time ;
print $Education_system ;
print $Document ;
print $EMS_no ;
print $EMS_senddate ;*/

$conn = new mysqli("regis-ems.sci.dusit.ac.th","regisems","12345678","regisems_db");
$sql = "UPDATE dataems set  StudentStatus = '$StudentStatus' , 
NameTitle = '$NameTitle' , Bechelor_Degrees = '$Bechelor_Degrees' , 
Faculty = '$Faculty' , FirstName = '$FirstName' , Program = '$Program' , Major = '$Major' , 
LastName = '$LastName' ,Place = '$Place' , Student_type = '$Student_type' , Phone = '$Phone' ,  Study_Time = '$Study_Time' ,Education_system = '$Education_system' ,Document = '$Document' ,EMS_no = '$EMS_no' ,EMS_senddate = '$EMS_senddate', EMS_timesave = '$ems_timesave' where Student_id like '$Student_id' " ;
print $sql ;
$result = $conn -> query($sql);
if ($result) {
    print "<script>alert('แก้ไขข้อมูลเสร็จสิ้น') ;
    window.location='editsearch.php';
    </script>";
    
    
}
else {
    print "เกิดข้อผิดพลาด";
}



?>