<?php
session_start();
$txtUsername = $_POST['txtUsername'] ;
$txtPassword = $_POST['txtPassword'] ;

print "username :: " . $txtUsername . "<br>" ;
print "password :: " . $txtPassword . "<br>" ;

$mysqli = new mysqli("localhost","root","","regisems");
$sql = "SELECT * FROM `person` WHERE `Preson_username` like '$txtUsername' and Person_password like '$txtPassword' ";
print $sql;
$result = $mysqli -> query($sql);
$row = $result -> fetch_row() ;
$rowcount=mysqli_num_rows($result);

print "<br>Rows count = " . $rowcount ;
if ($rowcount) {
	print "<br>username = " . $row[2] ;
	print "<br>name = " . $row[1] ;
	$_SESSION["username"] = $row[2] ;
print "session = " . $_SESSION["username"] ;
    if ($row[2] == 'admin'){
        print "<script>window.location='import1.php';</script>";
    }
    else{
        print "<script>window.location='import1.php';</script>";
    }
}
else {
	print "<br>username /password incorrect";
}
$result -> free_result();
$mysqli -> close();
?>