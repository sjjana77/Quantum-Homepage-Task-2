<?php
 
 $root=$_SERVER["DOCUMENT_ROOT"];
 include ($root."/includes/connection-r.php");
 $con = mysqli_connect($db_servername, $db_username, $db_password, $db_dbname);
 
 $pname = $_POST['pname'];
 $pemail = $_POST['pemail'];
 $pphn = $_POST['pphn'];
 $pqualification1 = $_POST['pqualification1'];
 $pqualification = $_POST['pqualification'];
 $pinstitute = $_POST['pinstitute'];
 $pinstitute1 = $_POST['pinstitute1'];
 $pcompany = $_POST['pcompany'];
 $pjob = $_POST['pjob'];
 $othername = $_POST['othername'];
 $tokenfield = $_POST['tokenfield'];
$flag=0;
$checkbox2 = $_POST['com'];
$chkk="";  
$time=date("M d Y h:ia");
foreach($checkbox2 as $chk11)  
   {  
      $chkk .= $chk11.",";  
   }              
$chkk .=$othername;
$pqualification .=$pqualification1;
$pinstitute .= $pinstitute1;
 $sql = "insert into qh_mentorship (mentee_name, mentee_email, mentee_phone, mentee_qualification, mentee_institution, mentee_company, mentee_current_role, mentee_skillset, mentee_aspiring_company, mentee_create_ts) values ('$pname','$pemail','$pphn','$pqualification','$pinstitute','$pcompany','$pjob','$tokenfield','$chkk','$time')";
 
 if(mysqli_query($con, $sql)){
     
$to_email=$pemail;
$subject="Welcome to QuantumHunts";
$message=file_get_contents("templates.php");
$message = str_replace("%fname%", $pname, $message);

 $headers = "From: QUANTUMHUNTS <" . strip_tags('notifications@quantumhunts.com') . ">\r\n";

 $headers .= "Reply-To: ". strip_tags('notifications@quantumhunts.com') . "\r\n";

 $headers .= "MIME-Version: 1.0\r\n";

 //$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

 $headers .= "Content-Type: text/html; charset=UTF-8\r\n";   


 $today = date("F j, Y, g:i a");

 $sql_mail = "INSERT INTO qh_mails (

 mail_to_name,

 mail_header,

 mail_email,

 mail_subject,        

 mail_content,

 mail_create_ts,

 mail_status

 )

 VALUES

 (

     '".$pname."',

     '".$headers."',                       

     '".$to_email."',

     '".$subject."',       

     '".$message."',

     '".$today."',

     '0'

 )";                       



     if ($conn->query($sql_mail)==TRUE)

{
    if (mail($to_email, $subject, $message, $headers,'-fnoreply@quantumhunts.com')) {
        echo "<br>";
        
        
    }
     else 
    {
        echo "<br>";
    }
    
     }
}





 $conn->close();  
?>