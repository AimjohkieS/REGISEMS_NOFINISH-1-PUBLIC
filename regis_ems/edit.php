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
            <a href="#" class="navbar-brand fw-bold text-primary" style="font-family: 'Kanit', sans-serif;">EMS SDU</a>
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
                        <a href="import1.php" class="nav-link">IMPORT</a>
                    </li>
                    <li class="nav-item">
                        <a href="insert.html" class="nav-link ">INSERT</a>
                    </li>
                    <li class="nav-item">
                        <a href="editsearch.php" class="nav-link active">EDIT</a>
                    </li>
                    <li class="nav-item">
                        <a href="report.html" class="nav-link">REPORT</a>
                    </li>
                </ul>
            </div>
<?php
    $conn = new mysqli("localhost","root","","regisems") ;
    //include "connect.php";
    if (isset ($_POST['search']))
    {
        $search = $_POST['search'] ;
    }   
    $sql = "select * from s_data where Student_id like '%$search%' " ;
    $result = $conn -> query($sql);
    $row = $result -> fetch_assoc() ;
    ?>
            <div class="card-body">
                <form method="post" action="saveedit.php">
                    <div class="row">
                        <div class="col-4">
                            <label for="Student_id" class="form-label">รหัสนักศึกษา</label>
                          <input type="text" class="form-control" placeholder="รหัสนักศึกษา" name="Student_id" value="<?php echo $row['Student_id']  ?>">
                        </div>
                        <div class="col-4">
                            <label for="StudentStatus " class="form-label">สถานภาพนักศึกษา</label>
                            <select name="StudentStatus" class="form-select">
                                <option><?php echo $row['StudentStatus']  ?></option>
                                <option>สำเร็จการศึกษา</option>  
                                <option>ปกติ</option>
                                <option>พ้นสภาพนักศึกษา</option>  
                                <option>เปลี่ยนรหัส</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label for="NameTitle" class="form-label">คำนำหน้า</label>
                          <input type="text" class="form-control" placeholder="คำนำหน้า" name="NameTitle" value="<?php echo $row['NameTitle']  ?>">
                        </div>
                        <div class="col-4">
                            <label for="Bechelor_Degrees" class="form-label">ระดับการศึกษา</label>
                            <select name="Bechelor_Degrees" class="form-select">
                                <option><?php echo $row['Bechelor_Degrees']  ?></option>
                                <option>ปริญญาตรี</option>  
                                <option>ปริญญาตรี 5 ปี</option>  
                                <option>ปริญญาโท</option>  
                                <option>ปริญญาเอก</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="Faculty" class="form-label">คณะ/โรงเรียน</label>
                            <select name="Faculty" class="form-select">
                                <option><?php echo $row['Faculty']  ?></option>
                                <option>คณะครุศาสตร์</option>
                                <option>คณะวิทยาศาสตร์และเทคโนโลยี</option>
                                <option>คณะวิทยาการจัดการ</option>
                                <option>คณะมนุษยศาสตร์และสังคมศาสตร์</option>
                                <option>คณะพยาบาลศาสตร์</option> 
                                <option>โรงเรียนการเรือน</option>
                                <option>โรงเรียนการท่องเที่ยวและการบริการ</option>
                                <option>โรงเรียนกฎหมายและการเมือง</option>
                                <option>บัณฑิตวิทยาลัย</option>   
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label for="FirstName" class="form-label">ชื่อ</label>
                          <input type="text" class="form-control" placeholder="ชื่อ" name="FirstName" value="<?php echo $row['FirstName']  ?>">
                        </div>
                        <div class="col-4">
                            <label for="Program" class="form-label">หลักสูตร</label>
                            <select name="Program" class="form-select">
                                <option><?php echo $row['Program']  ?></option>
                                <option>การบัญชีบัณฑิต</option>
                                <option>ครุศาสตรบัณฑิต</option>
                                <option>คหกรรมศาสตรบัณฑิต</option>
                                <option>นิติศาสตรบัณฑิต</option>
                                <option>นิเทศศาสตรบัณฑิต</option>
                                <option>บริหารธุรกิจบัณฑิต</option>
                                <option>การจัดการบัณฑิต</option>
                                <option>บัญชีบัณฑิต</option>
                                <option>รัฐศาสตรบัณฑิต</option>
                                <option>วิทยาศาสตรบัณฑิต</option>
                                <option>เทคโนโลยีบัณฑิต</option>
                                <option>ศิลปศาสตรบัณฑิต</option>
                                <option>เศรษฐศาสตรบัณฑิต</option>
                                <option>บัญชีมหาบัณฑิต</option>  
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="Major" class="form-label">สาขาวิชา</label>
                            <input type="text" class="form-control" placeholder="สาขาวิชา" name="Major" value="<?php echo $row['Major']  ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label for="LastName" class="form-label">นามสกุล</label>
                            <input type="text" class="form-control" placeholder="นามสกุล" name="LastName" value="<?php echo $row['LastName']  ?>" >
                        </div>
                        <div class="col-4">
                            <label for="Place" class="form-label">สถานที่จัดการเรียนการสอน</label>
                            <select name="Place" class="form-select">
                                <option><?php echo $row['Place']  ?></option>
                                <option>ในมหาวิทยาลัย</option>  
                                <option>ศูนย์วิทยาศาสตร์ ถ.สิรินธร</option>  
                                <option>วิทยาเขตสุพรรณบุรี</option>
                                <option>ศูนย์การศึกษานอกที่ตั้งลำปาง</option>  
                                <option>ศูนย์การศึกษานอกที่ตั้งนครนายก</option>  
                                <option>ศูนย์การศึกษานอกที่ตั้งหัวหิน</option>  
                                <option>ศูนย์การศึกษานอกที่ตั้งตรัง</option>   
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="Student_type" class="form-label">ประเภทนักศึกษา</label>
                            <select name="Student_type" class="form-select">
                                <option><?php echo $row['Student_type']  ?></option>
                                <option>ปกติ</option>
                                <option>สมทบเรียน</option>  
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label for="Phone" class="form-label">โทรศัพท์</label>
                            <input type="text" class="form-control" placeholder="โทรศัพท์" name="Phone" value="<?php echo $row['Phone']  ?>">
                        </div>
                        <div class="col-4">
                            <label for="Study_Time" class="form-label">เวลาจัดการเรียนการสอน</label>
                            <select name="Study_Time" class="form-select">
                                <option><?php echo $row['Study_Time']  ?></option>
                                <option>ในเวลาราชการ</option>
                                <option>นอกเวลาราชการ</option>  
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="Education_system" class="form-label">ระบบการศึกษา</label>
                            <select name="Education_system" class="form-select">
                                <option><?php echo $row['Education_system']  ?></option>
                                <option>ระบบการศึกษาปกติ</option>  
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label for="Document" class="form-label">เอกสารที่จัดส่ง</label>
                            <select name="Document" class="form-select" name="Document">
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
                            <input type="text" class="form-control" placeholder="เลขพัสดุ" name="EMS_no" value="<?php echo $row['EMS_no']  ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <label for="EMS_senddate" class="form-label">วันที่จัดส่งเอกสาร</label>
                          <input type="date" class="form-control" name="EMS_senddate" value="<?php echo $row['EMS_senddate']  ?>">
                        </div>
                        <div class="col-3">
                            <label for="EMS_timesave" class="form-label">เวลาที่บันทึก</label>
                          <input type="time" class="form-control" name="EMS_timesave" value="<?php echo $row['EMS_timesave']  ?> ">
                        </div>
                    </div>
                    <div class="row mt-3 text-end">
                        <div class="col">
                            <button type="reset" class="btn btn-danger btn-lg px-5">ยกเลิก</button>
                            <button type="submit" class="btn btn-primary btn-lg px-5">ตกลง</button>    
                        </div>
                    </div>
                </form>
            </div>
        </div>

        
    </div>
</body>
</html>