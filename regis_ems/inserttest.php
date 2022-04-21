<!DOCTYPE html>
<?php
date_default_timezone_set('Asia/Bangkok');
$mysqli = new mysqli("localhost","root","","regisems");
                                $sql = "SELECT * FROM s_data WHERE Student_id";
                                $result = $mysqli -> query($sql);
                                $rowcount=mysqli_num_rows($result);

                    print_r($_POST);
// $myDate = ('Y-m-d H:i:s');
// echo $myDate;
// $myYear = date('Y', strtotime($myDate));
// $myYearBudhist = $myYear +543;
// echo $myYearBudhist;
// echo date('d/m/',strtotime($myDate)).$myYearBudhist

?>

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
                        <a href="showsearchsd.php" class="nav-link">แสดงข้อมูลทั้งหมด</a>
                    </li>
                  <li class="nav-item">
                        <a href="insert.html" class="nav-link active">เพิ่มข้อมูลการจัดส่งเอกสาร</a>
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
                <form method="post" action="inserttest.php">
                    <div class="row">
                        <div class="col-4">
                            <label for="Student_id" class="form-label">รหัสนักศึกษา</label>

                        </div>
                        <div class="col-6 mt-3">
                             <button class="btn btn-primary btn-lg" name="submit" value="submit" style="font-family: 'Kanit', sans-serif;">SEARCH</button>
                          <!-- <input type="time" class="form-control" name="EMS_timesave"> -->
                        </div>
                    </div>
                    <div class="row mt-3 text-end">
                        <div class="col">
<!--                             <button type="reset" class="btn btn-danger btn-lg px-5">ยกเลิก</button>
                            <button type="submit" class="btn btn-primary btn-lg px-5">ตกลง</button>   -->  
                        </div>
                    </div>
                </form>
            </div>
        </div>

        
    </div>
</body>
</html>