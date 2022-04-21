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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css"/>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

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
            <div class="card-body col-md-10 col-lg-8 col-xl-5 mx-auto" style="height: 800px;">
                <form method="post" action="showsdtest.php" class=" text-center mt-5 ">
                    <h5 for="Student_id" class="form-label"  style="font-family: 'Kanit', sans-serif;">รหัสนักศึกษา </h5>               
                    <div class="row d-flex">
                        <div class="input-group col-12 col-md-9 mb-2 mb-md-0">
                            <input type="text" class="form-control form-control-lg" name="txtsearch" placeholder="ปีการศึกษา2ตัวหน้ารหัสนักศึกษา"><button class="btn btn-primary btn-lg" style="font-family: 'Kanit', sans-serif;">ค้นหา</button>
                            <div class="input-group-prepend">

                                     <script>
                                       $(document).ready( function () {
                                           
                                           //คำสั่ง Javascript สำหรับเรียกใช้งาน Datatable
                                           $('#example').DataTable();
                                       } );
                                   </script>
                            <?php $mysqli = new mysqli("localhost","root","","regisems");
                                $sql = "SELECT * FROM dataems ORDER BY Student_id LIMIT 19";
                                $result = $mysqli -> query($sql);
                                $rowcount=mysqli_num_rows($result);

                                //$txtsearch = $_POST['txtsearch']; 
                                 ?>
                                <table width="600" height="500" boder="2" class="square">
                                  <tr>
                                    <td colspan="5" bgcolor="#CCCCCC">
                                  </tr>
                                  <tr>
                                    <th bgcolor="#EAEAEA">รหัสนักศึกษา</th>
                                    <th align="center" bgcolor="#EAEAEA">คำนำหน้า </th>
                                    <th align="center" bgcolor="#EAEAEA">ชื่อ</th>
                                    <th align="center" bgcolor="#EAEAEA">นามสกุล</th>
                                    <th align="center" bgcolor="#EAEAEA"> โทรศัพท์ </th>
                                    <th align="center" bgcolor="#EAEAEA">ดูรายละเอียด</th>
                                    <input type="hidden" name="m_id" value="<?php echo $row['NameTitle'];?>">
                                  </tr>
                                <?php                          
                                if ($result ){
                            while( $row = $result->fetch_assoc()){
                            $_SESSION["Student_id"] = $row["Student_id"] ;
                            print "<TR><TD> "  . $_SESSION["Student_id"] . "</TD>" ;
                              print "<TD> " . $row["NameTitle"] . "</TD>" ;
                              print "<TD> " . $row["FirstName"] . "</TD>" ;
                              print "<TD> " . $row["LastName"] . "</TD>" ;
                              print "<TD> " . $row["Phone"] . "</TD>" ;
                              $tid = $_SESSION['Student_id'] ;
                              print "<TD>  <a href='detail_s.php?id=$tid'>รายละเอียด</a>  </TD></TR>" ;
                            }
                           }
                        else{
                              print "<script>alert('ตรวจสอบข้อมูลอีกครั้ง')</script>";
                              print "<script>window.location='showsearchsd.php';</script>";

                            }?>
                            </div>
                        </div>
                    </div>
                </form>

            </div>


        </div>
    </div>
</body>
</html>
