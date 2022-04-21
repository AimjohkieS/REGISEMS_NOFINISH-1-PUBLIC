<!DOCTYPE html>
<?php 
session_start();
$id = $_GET['id'] ;
//print_r($_GET); 
$mysqli = new mysqli("localhost","root","","regisems");
    $sql = "SELECT * FROM dataems where Student_id = '$id'";
    $result = $mysqli -> query($sql);
    $row = mysqli_fetch_array($result);
    $Nametitle = $row['NameTitle'];
    $Name= $row['FirstName'];
    $LastName= $row['LastName'];
    $Phone= $row['Phone'];
    $Bechelor= $row['Bechelor_Degrees'];
    $Faculty= $row['Faculty'];
    $Program= $row['Program'];
    $Major= $row['Major'];
    $Place= $row['Place'];
    $Student_type= $row['Student_type'];
    $Study_Time= $row['Study_Time'];
    $Education= $row['Education_system'];
    $Status = $row['StudentStatus'];
    $DOC = $row['Document'];
    $NO = $row['EMS_no'];
    // $s = $row['NameTitle'];
    // print_r($sql);
    // print_r($s);
    //echo $query_order; ?>
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
           
    </nav>

    <!-- Content -->
    <div class="container">
        <div class="card mt-3">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a href="import1.php" class="nav-link">นำข้อมูลเข้า</a>
                    </li>
                     <li class="nav-item">
                        <a href="showsearchsd.php" class="nav-link active">แสดงข้อมูลทั้งหมด</a>
                    </li>
                  <li class="nav-item">
                        <a href="insert.html" class="nav-link">เพิ่มข้อมูลนักศึกษา</a>
                    </li>
                    <li class="nav-item">
                        <a href="editsearch.php" class="nav-link">แก้ไขข้อมูล</a>
                    </li>
                    <li class="nav-item">
                        <a href="report.html" class="nav-link">นำข้อมูลออก</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <form method="post" action="import1.php">
                    <div class="row">
                        <div class="col-4">
                            <label for="Student_id" class="form-label">รหัสนักศึกษา</label>
                          <input type="text" class="form-control" value="<?php echo $id ?>" name="Student_id">
                        </div>
                        <div class="col-4">
                            <label for="StudentStatus" class="form-label">สถานภาพนักศึกษา</label>
                            <input type="text" class="form-control"  value="<?php echo $Status ?>" name="Student_type">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label for="NameTitle" class="form-label">คำนำหน้า</label>
                          <input type="text" class="form-control" value="<?php echo $Nametitle ?>" name="NameTitle">
                        </div>
                        <div class="col-4">
                            <label for="Bechelor_Degrees" class="form-label">ระดับการศึกษา</label>
                             <input type="text" class="form-control"  value="<?php echo $Bechelor ?>" name="Student_type">
                        </div>
                        <div class="col-4">
                            <label for="Faculty" class="form-label">คณะ/โรงเรียน</label>
                            <input type="text" class="form-control"  value="<?php echo $Faculty ?>" name="Student_type">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label for="FirstName" class="form-label">ชื่อ</label>
                          <input type="text" class="form-control" value="<?php echo $Name ?>" name="FirstName">
                        </div>
                        <div class="col-4">
                            <label for="Program" class="form-label">หลักสูตร</label>
                            <input type="text" class="form-control"  value="<?php echo $Program ?>" name="Student_type">
                        </div>
                        <div class="col-4">
                            <label for="Major" class="form-label">สาขาวิชา</label>
                            <input type="text" class="form-control"  value="<?php echo $Major ?>" name="Student_type">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label for="LastName" class="form-label">นามสกุล</label>
                            <input type="text" class="form-control"  value="<?php echo $LastName ?>" name="LastName">
                        </div>
                        <div class="col-4">
                            <label for="Place" class="form-label">สถานที่จัดการเรียนการสอน</label>
                            <input type="text" class="form-control"  value="<?php echo $Place ?>" name="Place">
                        </div>
                        <div class="col-4">
                            <label for="Student_type" class="form-label">ประเภทนักศึกษา</label>
                             <input type="text" class="form-control"  value="<?php echo $Student_type ?>" name="Student_type">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label for="Phone" class="form-label">โทรศัพท์</label>
                            <input type="text" class="form-control"  value="<?php echo $Phone ?>" name="Phone">
                        </div>
                        <div class="col-4">
                            <label for="Study_Time" class="form-label">เวลาจัดการเรียนการสอน</label>
                            <input type="text" class="form-control"  value="<?php echo $Study_Time ?>" name="Student_type">
    
                        </div>
                        <div class="col-4">
                            <label for="Education_system" class="form-label">ระบบการศึกษา</label>
                            <input type="text" class="form-control"  value="<?php echo $Education ?>" name="Student_type">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label for="Document" class="form-label">เอกสารที่จัดส่ง</label>
                            <input type="text" class="form-control"  value="<?php echo $DOC ?>" name="Document">
                        <div class="col-4">
                            <label for="EMS_no" class="form-label">เลขพัสดุ</label>
                            <input type="text" class="form-control" value="<?php echo $NO ?>" name="EMS_no">
                        </div>
                    <div class="row mt-3 text-end">
                        <div class="col">
                            <button type="submit" class="btn btn-primary btn-lg px-5">ย้อนกลับ</button>    
                        </div>
                    </div>
                </form>
            </div>
        </div>

        
    </div>
</body>
</html>