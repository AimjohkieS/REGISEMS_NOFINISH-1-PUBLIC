<!--export.php-->
<?php

$txtStudent = $_POST['txtStudent'];
$Student_checked = "" ;
for ($i=0; $i<count($txtStudent); $i++) {
  if ($i == 0)
     $Student_checked =  $txtStudent[$i] ;
  else 
     $Student_checked = $Student_checked . " , " .  $txtStudent[$i] . " ";
}

?>
<script>
  function exportTableToExcel(tableID, filename = ''){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'excel_data.xls';
    
    // Create download link element
    downloadLink = document.createElement("a");
    
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
    
        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
    }
}
</script><br>
<center><button style="font-size:1em ;background: #072a40 color:white ; border-radius: 20px ; width: 150px; height: 35px;" onclick="exportTableToExcel('tableData')">Export to Excel</button></center>
<?php
$conn = new mysqli("regis-ems.sci.dusit.ac.th","regisems","12345678","regisems_db");
$sql = "SELECT $Student_checked FROM dataems";
if (count($txtStudent)==1)
  $sql = "SELECT * FROM dataems";
  
$result = $conn->query($sql);
 
 if(isset($_GET['act'])){
  if($_GET['act']== 'excel'){
    header("Content-Type: application/vnd.ms-excel");
    header('Content-Disposition: attachment; filename="myexcel.xls"');
    header("Content-Type: application/force-download"); 
    header("Content-Type: application/octet-stream");
    header("Content-Type: application/download"); 
    header("Content-Transfer-Encoding: binary");
    header("Content-Length: ".filesize("myexcel.xls"));   

    @readfile($filename);
  }
}

?>
<body>
<body style="background-color:#e0e0e0e0 ;">
<center>
<table border='1' id="tableData" class="table-main"> 
<tr>
   <?php
  if (count($txtStudent)==1)
   { ?> 
       <tH> Student_id  </tH> 
       <tH> StudentStatus  </tH>
       <tH> NameTitle </tH>
       <tH> FirstName </tH>
       <tH> LastName </tH>
       <tH> Phone</tH>
       <tH>Bechelor_Degrees</tH>
       <tH>Faculty </tH>
        <tH> Program </tH>
       <tH> Major </tH>
       <tH> Place</tH>
       <tH> Student_type</tH>
       <tH> Study_Time</tH>
       <tH> Education_system </tH>
       <tH>   Document    </tH>
       <tH>   EMS_no   </tH>  
       <tH>  EMS_senddate </tH>    
       <tH>EMS_timesave </tH>
    <?php }
 else { ?> 
  <?php  for ($i=0; $i<count($txtStudent); $i++) { ?>
    <tH><?php echo $txtStudent[$i];  ?>      </tH>
  <?php } ?>
   <?php 
}
  ?>
</TR>
  
<?php
$i=1 ;
if (count($txtStudent)==1)
  $n= 18;
  else 
    $n = count($txtStudent);
?>
<?php while($row = $result -> fetch_row()) {  ?>
  <tr align='center'>
  <?php  for ($i=0; $i<$n; $i++) { ?>
    <td><?php echo $row[$i];  ?>      </td>
  <?php } ?>
  </tr>
<?php } ?>
 </body>
</center>
</table>
