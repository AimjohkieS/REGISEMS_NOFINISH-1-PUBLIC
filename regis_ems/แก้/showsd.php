<?php
session_start();
$txtsearch = $_POST['txtsearch'];
$mysqli = new mysqli("localhost","root","","regisems");
$sql = "SELECT * FROM dataems where Student_id like '%$txtsearch%' ";
$result = $mysqli -> query($sql);
$row = $result -> fetch_row() ;
$rowcount=mysqli_num_rows($result);
  print  "<center>" ;
  print "ผลการค้นหา::" .$txtsearch. "<BR>" ;
  print  "</center>" ;
  print  "<BR>" ;
  echo "<table border='1' align='center' width='1800' >";
 echo "<tr align='center' bgcolor='#CCCCCC'><TH> รหัสนักศึกษา</TH><TH> สถานภาพนักศึกษา </TH> <TH> คำนำหน้า </TH> <TH> ชื่อ </TH><TH> นามสกุล </TH><TH> โทรศัพท์ </TH><TH> ระดับการศึกษา </TH><TH> คณะ/โรงเรียน </TH><TH> หลักสูตร </TH><TH> สาขาวิชา </TH><TH> สถานที่จัดการเรียนการสอน </TH>
	 <TH> ประเภทนักศึกษา </TH><TH> เวลาจัดการเรียนการสอน </TH><TH> ระบบการศึกษา </TH><TH> เอกสารที่จัดส่ง </TH><TH> เลขพัสดุ </TH>
	 <TH> วันที่จัดส่งเอกสาร </TH><TH> เวลาที่บันทึก </TH></TR>" ;
 if (count($txtsearch) < 0){
while( $row = $result->fetch_assoc()){
     $_SESSION["Student_id"] = $row["Student_id"] ;
     print "<TR><TD> "  . $_SESSION["Student_id"] . "</TD>" ;
     print "<TD> " . $row["StudentStatus" ] . "</TD>" ;
     print "<TD> " . $row["NameTitle"] . "</TD>" ;
     print "<TD> " . $row["FirstName"] . "</TD>" ;
     print "<TD> " . $row["LastName"] . "</TD>" ;
     print "<TD> " . $row["Phone"] . "</TD>" ;
     print "<TD> " . $row["Bechelor_Degrees"] . "</TD>" ;
     print "<TD> " . $row["Faculty"] . "</TD>" ;
     print "<TD> " . $row["Program"] . "</TD>" ;
     print "<TD> " . $row["Major"] . "</TD>" ;
     print "<TD> " . $row["Place"] . "</TD>" ;
     print "<TD> " . $row["Student_type"] . "</TD>" ;
     print "<TD> " . $row["Study_Time"] . "</TD>" ;
     print "<TD> " . $row["Education_system"] . "</TD>" ;
     print "<TD> " . $row["Document"] . "</TD>" ;
     print "<TD> " . $row["EMS_no"] . "</TD>" ;
     print "<TD> " . $row["EMS_senddate"] . "</TD>" ;
     print "<TD> " . $row["EMS_timesave"] . "</TD></TR>" ;
 }
}
 else{
  print "<script>alert('ตรวจสอบข้อมูลอีกครั้ง')</script>";
  print "<script>window.location='showsearchsd.php';</script>";
 }
$result -> free_result();
$mysqli -> close();
?>