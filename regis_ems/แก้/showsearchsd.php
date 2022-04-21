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
    <nav class="navbar navbar-expand-sm navbar-light bg-white">
        <!-- Content -->
        <div class="container-fluid">
            <!-- Brand -->
            <img src="sdu.png" style="height: 40px;">
            </button>
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
                        <a href="import1.php" class="nav-link">นำข้อมูลเข้า</a>
                    </li>
                     <li class="nav-item">
                        <a href="showsearchsd.php" class="nav-link  active">แสดงข้อมูลทั้งหมด</a>
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
            <div class="card-body col-md-10 col-lg-8 col-xl-5 mx-auto   " style="height: 515px;">
                <form method="post" action="showsd.php" class=" text-center mt-5 ">
                    <h5 for="Student_id" class="form-label"  style="font-family: 'Kanit', sans-serif;">รหัสนักศึกษา </h5>               
                    <div class="row d-flex">
                        <div class="input-group col-12 col-md-9 mb-2 mb-md-0">
                            <input type="text" class="form-control form-control-lg" name="txtsearch" placeholder="ปีการศึกษา2ตัวหน้ารหัสนักศึกษา">
                            <div class="input-group-prepend">
                                <button class="btn btn-primary btn-lg" style="font-family: 'Kanit', sans-serif;">ค้นหา</button>
                    
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            
        </div>
    </div>
</body>
</html>
