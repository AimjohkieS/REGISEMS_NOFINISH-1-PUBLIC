<?php
// $StudentID = $_POST['Student_id'];
// $StudentStatus = $_POST['StudentStatus'];
// $NameTitle = $_POST['NameTitle'];
// $Bechelor_Degrees = $_POST['Bechelor_Degrees'];
// $Faculty = $_POST['Faculty'];
// $FirstName = $_POST['FirstName'];
// $Program = $_POST['Program'];
// $Major = $_POST['Major'];
// $LastName = $_POST['LastName'];
// $Place = $_POST['Place'];
// $Student_type = $_POST['Student_type'];
// $Phone = $_POST['Phone'];
// $Study_Time = $_POST['Study_Time'];
// $Education_system = $_POST['Education_system'];
// $Document = $_POST['Document'];
// $EMS_no = $_POST['EMS_no'];
// $EMS_senddate = $_POST['EMS_senddate'];
// $ems_timesave = $_POST['EMS_timesave'];

// $conn = new mysqli("regis-ems.sci.dusit.ac.th","regisems","12345678","regisems_db");
// $sql = "INSERT into dataems values 
// ('$StudentID','$StudentStatus','$NameTitle','$FirstName','$LastName','$Phone','$Bechelor_Degrees','$Faculty','$Program','$Major','$Place',
// '$Student_type','$Study_Time','$Education_system','$Document','$EMS_no','$EMS_senddate','$ems_timesave')";
// $result = $conn -> query($sql);
// if ($result) {
//     print "<script>alert('เพิ่มข้อมูลเสร็จสิ้น');
//     window.location='insert.html';</script>";
    
// }
// else {
//     print "เกิดข้อผิดพลาด";
// }
// $Major = $_POST['Major'];
// $Program = $_POST['Program'];
// $Faculty = $_POST['Faculty'];
$Student_id= $_POST['Student_id'];
$Document = $_POST['Document'];
// $NameTitle= $_POST['NameTitle'];
// $FirstName = $_POST['FirstName'];
// $LastName = $_POST['LastName'];
// $Student_type = $_POST['Student_type'];
// $Bechelor_Degrees = $_POST['Bechelor_Degrees'];
$EMS_no = $_POST['EMS_no'];
$EMS_senddate = $_POST['EMS_senddate'];
$EMS_timesave = $_POST['EMS_timesave'];
print_r($Student_id);


$conn = new mysqli("localhost","root","","");
$sql = "INSERT INTO dataems (
							EMS_no,
							Document,
							EMS_senddate,
							EMS_timesave,
							Student_id
							)
							 VALUES 
							(
							'$EMS_no',
							'$Document',
							'$EMS_senddate',
							'$EMS_timesave',
							'$Student_id'
							)";
$result = $conn -> query($sql);
if ($result) {
    print "<script>alert('เพิ่มข้อมูลเสร็จสิ้น');
    window.location='insert.html';</script>";
    
}
else {
    print "เกิดข้อผิดพลาด";
}
?>