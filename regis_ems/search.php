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
            <!-- Menu -->
            <div class=" justify-content-end" >
                <ul class="navbar-nav">
                    <li class="nav-item mx-2">
                        <button class="btn btn-primary" type="submit" data-bs-target="#showForm" data-bs-toggle="modal" style="font-family: 'Kanit', sans-serif;">แอดมิน</button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Modal -->
    <div class="modal fade" id="showForm">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">เข้าสู่ระบบ</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form METHOD="POST" ACTION="logon.php">
                        <div class="form-group">
                            <label>ชื่อผู้ใช้งาน</label>
                            <input type="text" NAME="txtUsername" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>รหัสผ่าน</label>
                            <input type="password" NAME="txtPassword" class="form-control">
                        </div>
                    
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger"  data-bs-dismiss="modal">ยกเลิก</button>
                    <button class="btn btn-primary" data-bs-dismiss="Submit">ยืนยัน</button>
          </form>
                </div>
            </div>
        </div>
    </div>
    <!-- PHP -->
    <?php
  $conn = new mysqli("localhost","root","","regisems");
    //include "connect.php";
    if (isset ($_POST['search']))
    {
        $search = $_POST['search'] ;
    }   
    $sql = "select * from s_data where Student_id like '%$search%' " ;
    $result = $conn -> query($sql);
    $row = $result -> fetch_assoc() ;
    ?>

   <!-- Content -->
    <div class="container content">
        <div class="d-flex flex-column col-md-9 col-lg-8 col-xl-7 mx-auto">
            <div class=" bg-white" style="border-radius: 20px 20px 20px 20px;">
                <div class="col-md-8 col-lg-7 col-xl-8 mx-auto">
                    <form method="post" action="search.php">
                        <div class="row d-flex">   
                            <div class="d-flex">
                                <h5 class="m-3" style="font-family: 'Kanit', sans-serif;">
                                    รหัสนักศึกษา
                                </h5>
                                <h5 class="m-3" style="font-family: 'Kanit', sans-serif;">
                                    <?php echo "$row[StudentID]" ;  ?>
                                </h5>
                            </div>
                            <div class="d-flex">
                                <h5 class="m-3" style="font-family: 'Kanit', sans-serif;">
                                    ชื่อ
                                </h5>
                                <h5 class="m-3" style="font-family: 'Kanit', sans-serif;">
                                    <?php echo "$row[FirstName]" ;  ?>
                                </h5>
                                <h5 class="m-3" style="font-family: 'Kanit', sans-serif;">
                                    <?php echo "$row[LastName]" ;  ?>
                                </h5>
                            </div>
                            <div class="d-flex">
                                <h5 class="m-3" style="font-family: 'Kanit', sans-serif;">
                                    เอกสาร     
                                </h5>
                                <h5 class="m-3" style="font-family: 'Kanit', sans-serif;">
                                    <?php echo "$row[Document]" ;  ?>
                                </h5>
                            </div>
                            <div class="d-flex">
                                <h5 class="m-3" style="font-family: 'Kanit', sans-serif;">
                                    เลขพัสดุ   
                                </h5>
                                <h5 class="m-3" style="font-family: 'Kanit', sans-serif;">
                                    <?php echo "$row[EMS_no]" ;  ?>
                                </h5>
                            </div>
                            <div class="d-flex">
                                <h5 class="m-3" style="font-family: 'Kanit', sans-serif;">
                                    <a href="https://track.thailandpost.co.th/">ตรวจสอบการส่งพัสดุ</a> 
                                </h5>
                                <h5 class="m-3" style="font-family: 'Kanit', sans-serif;">
                                    
                                </h5>
                            </div>
                            <div class="d-flex">
                                <h5 class="m-3" style="font-family: 'Kanit', sans-serif;">
                                    วันที่บันทึก 
                                </h5>
                                <h5 class="m-3" style="font-family: 'Kanit', sans-serif;">
                                    <?php echo "$row[EMS_senddate]" ;  ?>
                                </h5>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="text-center ">
                <a href="index.html"><button class="btn btn-primary mt-3 btn-lg px-5">เสร็จสิ้น</button></a>
            </div>
        </div>
</body>
</html>
<?php
  $conn = new mysqli("localhost","root","","regisems");
$date = new DateTime("now", new DateTimeZone('UTC') );
$LoginTime= $date->format('Y-m-d H:i:s');
  $ip = $_SERVER['REMOTE_ADDR'];
  $sql_log = "Insert into log_user values ('','$LoginTime','$ip','user','search') " ;
  $result = $conn -> query($sql_log);
?>