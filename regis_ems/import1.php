<?php
session_start();
if (empty($_SESSION["username"])) {
print "<script>alert('Pleaes login')</script>" ;
print "<script>window.location='index.html';</script>" ;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300;400;500;600;700&display=swap" rel="stylesheet"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>EMS SDU</title>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-sm navbar-light bg-info">
        <!-- Content -->
        <div class="container-fluid">
            <!-- Brand -->
            <img src="sdu.png" style="height: 40px;">
            <!-- Menu -->
            <form method="post" action="index.html">
            <div class=" justify-content-end" >
               <a href="Adminmanual.pdf" style="text-decoration: none; font-family: 'Kanit', sans-serif; color: gray; ">คู่มือการใช้งาน</a>
              <button class="btn btn-danger mx-1" type="#" style="font-family: 'Kanit', sans-serif;">ออกจากระบบ</button>

            </div>
            </form>
            </div>
    </nav>

    <!-- Content -->
    <div class="container">
        <div class="card mt-3">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a href="import1.php" class="nav-link  active">นำข้อมูลเข้า</a>
                    </li>
                     <li class="nav-item">
                        <a href="showsearchsd.php" class="nav-link">แสดงข้อมูลทั้งหมด</a>
                    </li>
                  <li class="nav-item">
                        <a href="insert.html" class="nav-link">เพิ่มข้อมูลการจัดส่งเอกสาร</a>
                    </li>
                    <li class="nav-item">
                        <a href="editsearch.php" class="nav-link">แก้ไขข้อมูล</a>
                    </li>
                    <li class="nav-item">
                        <a href="report.html" class="nav-link">นำข้อมูลออก</a>
                    </li>
                </ul>
            </div>
            <div class="card-body col-md-10 col-lg-8 col-xl-7 mx-auto   " style="height: 515px;">
            <meta charset="UTF-8">
                <form enctype="multipart/form-data" method="post" class=" text-center mt-4 ">
                   <img src="x1.png"width="50"height="50">   <a href="eg.emsdata.csv" class="center" class="form-label"  style="font-family: 'Kanit', sans-serif;">ตัวอย่างไฟล์</a>
                
                    <center><div class="col-12 col-md-9 mb-md-0 mt-3 ">
                        <input type="file" class="form-control form-control-lg" name="file" id="file" >
                      <p style="margin-top: 15px;"class="form-label"  style="font-family: 'Kanit', sans-serif;"><h6>Only CSV UTF-8 format.</h6></p>
                    </div></center>
                    <div class="mt-3">
                        <button class="btn btn-primary btn-lg" name="submit" value="submit" style="font-family: 'Kanit', sans-serif;">IMPORT</button><br>
                      <?php
if(isset($_POST["submit"]))
{
     $file = $_FILES['file']['tmp_name'];
     $handle = fopen($file, "r");
     $c = 0;
     $conn = new mysqli("localhost","root","","regisems");
     while(($filesop = fgetcsv($handle, 1500, ",")) !== false) {
         $c = $c + 1;
         $ems_id = $filesop[0];
         $ems_status = $filesop[1];
         $ems_ntitle = $filesop[2];
         $ems_first = $filesop[3];
         $ems_last = $filesop[4];
         $ems_Tel = $filesop[5];
         $ems_BacDegree = $filesop[6];
         $ems_faculty = $filesop[7];
         $ems_program = $filesop[8];
         $ems_major = $filesop[9];


         $sql = "insert into s_data (Student_id,StudentStatus,NameTitle,FirstName,LastName,Bechelor_Degrees,Phone,Faculty,Program,Major) values ('$ems_id','$ems_status','$ems_ntitle','$ems_first','$ems_last','$ems_Tel','$ems_BacDegree','$ems_faculty',' $ems_program',' $ems_major')";
         if ($c > 1 ) {
        $result = $conn -> query($sql) ;
            if ($result) {
            }
             else {
                print "$ems_id ข้อมูลซ้ำในฐานข้อมูล ไม่สามารถเพิ่มได้ กรุณาตรวจสอบ<BR>";
          }
        }
    } 
      print "บันทึกข้อมูลเรียบร้อยแล้ว";
 }
?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>