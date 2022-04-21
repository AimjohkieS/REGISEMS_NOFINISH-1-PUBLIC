<?php
session_start();
if (empty($_SESSION["username"])) {
print "<script>alert('Pleaes login')</script>" ;
print "<script>window.location='index.html';</script>" ;
}
$mysqli = new mysqli("localhost","root","","regisems");
                                $sql = "SELECT * FROM s_data ORDER BY Student_id ";
                                $result = $mysqli -> query($sql);
                                $rowcount=mysqli_num_rows($result);
                                //$txtsearch = $_POST['txtsearch']; 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">


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
                      <a href="insert.php" class="nav-link" >เพิ่มข้อมูลการจัดส่งเอกสาร</a>
                    </li>
                    <li class="nav-item">
                        <a href="editsearch.php" class="nav-link">แก้ไขข้อมูล</a>
                    </li>
                    <li class="nav-item">
                        <a href="report.html" class="nav-link">นำข้อมูลออก</a>
                    </li>
                </ul>
            </div>
            <!-- body -->
<!--         <div class="card-body col-12 col-md-9 mb-2 mb-md-0 mx-auto">
                                 <h5 for="Student_id" class="form-label" align="center" style="font-family: 'Kanit', sans-serif; ">ข้อมูลทั้งหมด</h5>     
          <div class="form-group row">
            <input type="text" class="form-control" name="txtsearch" placeholder="ปีการศึกษา2ตัวหน้ารหัสนักศึกษา"><button class="btn btn-primary btn-lg" style="font-family: 'Kanit', sans-serif;">ค้นหา</button>
           </div>
        </div>        -->   
           <form method="post" action="showsdtest.php" class="text">
                            <div class="card-body" >
                                                      <h5 for="Student_id" class="form-label" align="center" style="font-family: 'Kanit', sans-serif; ">ข้อมูลทั้งหมด</h5>
                                                        <label class="form-label" style=" margin-right: 130px; float: right;" for="inlineFormCheck">
                            ค้นหา
                          </label>
                            </div>

                               <table class="table table-info table-striped table-hover" id="table">
                                <thead>
                                  <tr>
                                    <th style="text-align: center; color:black">รหัสนักศึกษา</th>
                                    <th style="text-align: center; color:black">คำนำหน้า </th>
                                    <th style="text-align: center; color:black">ชื่อ</th>
                                    <th style="text-align: center; color:black">นามสกุล</th>
                                    <th style="text-align: center; color:black"> โทรศัพท์ </th>
                                    <th style="text-align: center; color:black"></th>
                                    <th style="text-align: center; color:black"></th>
                                  </tr>
                                </thead>
                                <?php                          
                                if ($result ){
                            while( $row = $result->fetch_assoc()){
                            $_SESSION["Student_id"] = $row["Student_id"] ;
                              print "<tr>" ;
                              print "<td> "  . $_SESSION["Student_id"] . "</td>" ;
                              print "<td> " . $row["NameTitle"] . "</td>" ;
                              print "<td> " . $row["FirstName"] . "</td>" ;
                              print "<td> " . $row["LastName"] . "</td>" ;
                              print "<td> " . $row["Bechelor_Degrees"] . "</td>" ;
                              $tid = $_SESSION['Student_id'] ;
                              print "<td>  <a href='detail_s.php?id=$tid'>รายละเอียด</a>  </td>" ;
                               print "<td>  <a href='detail_s.php?id=$tid'>เพิ่มเอกสาร</a>  </td>" ;
                              print "</tr>" ;
                            }
                           }
                        else{
                              print "<script>alert('ตรวจสอบข้อมูลอีกครั้ง')</script>";
                              print "<script>window.location='showsearchsd.php';</script>";

                            }?>
                              <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
                              <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
                              <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
                              <script>
                                 $(document).ready(function() {
                                   $('.table').DataTable();
                                   } );
                              </script>
                            </div>
                        </div>
                    </div>
                </form>

            </div>


        </div>
    </div>
</body>
</html>
