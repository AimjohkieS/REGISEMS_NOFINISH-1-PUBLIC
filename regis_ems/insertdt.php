<!DOCTYPE html>
<?php
date_default_timezone_set('Asia/Bangkok');
  $conn = new mysqli("localhost","root","","regisems");
    //include "connect.php";
    if (isset ($_POST['search']))
    {
        $search = $_POST['search'] ;
    }
    $sql = "select * from s_data where Student_id like '%$search%' " ;
    $result = $conn -> query($sql);   
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
            <div class="card-body"  style="font-family: 'Kanit', sans-serif;">
            <form method="post" action="insertdata.php">
                <?php     $row = $result -> fetch_assoc() ;   ?>
                        <div class="row">
                            <div class="col-4">
                                <label for="Student_id" class="form-label">รหัสนักศึกษา</label>
                             <h5 class="m-3" style="font-family: 'Kanit', sans-serif;">
                                        <?php echo "$row[Student_id]" ;  ?>
                                    </h5>
                                    <input type="hidden"  value="<?php echo "$row[Student_id]" ;  ?>" name="Student_id">
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label for="NameTitle" class="form-label">คำนำหน้า</label>
                              <input type="text" class="form-control" value="<?php echo "$row[NameTitle]" ;  ?>" name="NameTitle" readonly/>
                            </div>
                            <div class="col-4">
                                <label for="FirstName" class="form-label">ชื่อ</label>
                              <input type="text" class="form-control" value="<?php echo "$row[FirstName]" ;  ?>" name="FirstName" readonly/>
                            </div>
                            <div class="col-4">
                                <label for="LastName" class="form-label">นามสกุล</label>
                                <input type="text" class="form-control"  value="<?php echo "$row[LastName]" ;  ?>" name="LastName" readonly/>
                            </div>
                        </div>

              <div class="row">
                        <div class="col-4">
                            <label for="Bechelor_Degrees" class="form-label">ระดับการศึกษา</label>
                             <input type="text" class="form-control"  value="<?php echo "$row[Bechelor_Degrees]" ;  ?>" name="Bechelor_Degrees" readonly/>
                        </div>
                        <div class="col-4">
                            <label for="Program" class="form-label">หลักสูตร</label>
                            <input type="text" class="form-control"  value="<?php echo "$row[Program]" ;  ?>" name="Program" readonly/>
                        </div>
                        <div class="col-4">
                            <label for="Faculty" class="form-label">คณะ/โรงเรียน</label>
                            <input type="text" class="form-control"  value="<?php echo "$row[Faculty]" ;  ?>" name="Faculty" readonly/>
                        </div>
                        <div class="col-4">
                            <label for="Major" class="form-label">สาขาวิชา</label>
                            <input type="text" class="form-control"  value="<?php echo "$row[Major]" ;  ?>" name="Major" readonly/>
                        </div>
                       <div class="col-4">
                            <label for="Student_type" class="form-label">ประเภทนักศึกษา</label>
                             <input type="text" class="form-control"  value="<?php echo "$row[StudentStatus]" ;  ?>" name="Student_type" readonly/>
                        </div>
                        <div class="col-4">
                            <label for="Phone" class="form-label">โทรศัพท์</label>
                            <input type="text" class="form-control"  value="<?php echo "$row[Phone]" ;  ?>" name="Phone" readonly/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label for="Document" class="form-label">เอกสารที่จัดส่ง</label>
                            <select name="Document" class="form-control" required>
                                <option>ตรวจสอบวุฒิการศึกษาเดิม</option>
                            <option>ตรวจสอบการสำเร็จการศึกษา</option>
                            <option>เอกสารทางการศึกษา</option>
                            <option>เอกสารหน่วยงานภายนอก</option>  
                            <option>พัสดุ</option>
                            <option>อื่นๆ</option> 
                            </select>
                            </div>
                        <div class="col-4">
                            <label for="EMS_no" class="form-label">เลขพัสดุ</label>
                            <input type="text" class="form-control" placeholder="เลขพัสดุ" name="EMS_no">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <label for="EMS_senddate" class="form-label">วันที่จัดส่งเอกสาร</label>
                          <input type="date" class="form-control" value="2021-01-01" name="EMS_senddate">
                        </div>
                        <div class="col-3">
                            <label for="EMS_timesave" class="form-label">เวลาที่บันทึก</label>
                        <div class="input-group date" id="datetimepicker1">
                           <input type="date" class="form-control input-sm"  type="text" name="EMS_timesave" required />
                            </span>
                        </div>
                    <div class="row mt-3 text-end">
                        <div class="col">
                            <button type="submit" class="btn btn-primary btn-lg px-5">เพิ่มข้อมูล</button>    
                        </div>
                    </div>
</body>
</html>