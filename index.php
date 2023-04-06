<?php
session_start();
$root=$_SERVER["DOCUMENT_ROOT"];
include ($root."/user/get/index.php");
if($_GET["ref"]!=NULL)
{
$ref=$_GET["ref"];
$_SESSION["ref"]=$ref;
}
else
{
//Do nothing
}
if($_GET["pro"]!=NULL)
{
$ref=$_GET["pro"];
$_SESSION["ref"]=$ref;
}
else
{
//Do nothing
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
<meta property="og:url"           content="https://quantumhunts.com/job/<?php echo $_GET['jobid'];?>" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="<?php echo $jobs_title ?> at <?php echo $jobs_company_name;?>, <?php echo $jobs_location ?> " />
<meta property="og:description"   content="<?php echo substr($jobs_company_about,0,160);?>" />
<meta property="og:image"         content="https://quantumhunts.com/user/assets/images/header/job_openning_300px.png">
<meta property="fb:app_id"        content="525323715034631" /> 


        <title>QUANTUMHUNTS | Terms & Conditions</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Read the terms and conditions for using QUANTUMHUNTS, world's first video job platform" name="description" />
        <meta content="QUANTUMHUNTS" name="author" />
<?php
include ($root."/user/includes/header.php");
?>
<?php
if($current_employer=="Yes")
{
include ($root."/employer/tidio.php");
}
?>
</head>
<body data-layout="detached" class="loading">

  <?php
include ($root."/user/includes/topbar.php");
//<!-- vd msg-->    
$iddd = $_SESSION['user_id'];
$display_id=array();  
include ($root."/includes/connection.php");
$conn = mysqli_connect($db_servername, $db_username, $db_password, $db_dbname);
$sql4 = "SELECT interview_id, interview_path, interview_questions_playback FROM qh_interviews WHERE interview_user_id='$iddd' and interview_actual_end_date!=''";
$display_row=0; 
$result4 = $conn->query($sql4);
if ($result4->num_rows > 0) {
  // output data of each row
  $display_row=$result4->num_rows; 
  while($row = $result4->fetch_assoc()) {
    array_push($display_id, $row['interview_id'], $row['interview_path'], $row['interview_questions_playback']); 
    
  }
   
  }

//<!-- vd msg ending-->    
?>
  <!-- Start Content-->
  <div class="container-fluid">
    <!-- Begin page -->
    <div class="wrapper">
      <!-- ========== Left Sidebar Start ========== -->
      <?php
//include ($root."/user/includes/sidebar.php");
?>
  
      <!-- Left Sidebar End -->
      <div class="content-page">
        <div class="content">
          <div class="row">
            <div class="col-xl-8 col-lg-8 mt-0">
              <div class="card border mt-0 ribbon-box1 shadow1 mb-2 topnav-navbar-dark1" >
                <div class="card-body cta-box p-2 pl-3 pt-1">
                  <h4 class="mt-2 job-main-title font-weight-normal text-dark mb-2 pb-0">Record Resume </h4>
                  </div> 
                <!-- end card-body/ profile-user-box-->
              </div>                
            </div>
       <!-- vd msg-->      
       <script type="text/javascript">
      var no_of_display = '<?php echo $display_row; ?>';
      var display_id = new Array();
      var ques = new Array();
    <?php foreach($display_id as $key => $val){ 
      if (gettype($val)=="array"){
        foreach($val as $key1 => $val1){
      ?>
       
      ques.push('<?php echo $val1; } ?>');
      display_id.push(ques);
      <?php   } else { ?>
        display_id.push('<?php echo $val;  ?>');
       
    <?php } } 
    $path=0; ?>
      let kkl=0;
      document.write('<div class="col-xl-8 col-lg-8 mt-0"><div class="card border mt-0 ribbon-box1 shadow1 mb-2 topnav-navbar-dark1"><div class="card-body cta-box p-2 pl-3 pt-1">');
    for(let k=0;k<no_of_display;k++){
      
      if(k==0){
      <?php  $path=1;  ?>
      }
      if(k+1==no_of_display){
        if(k!=0){
   <?php       $path+=3;  ?>
        }
          document.write('<div class="row"><div class="col"><video src="<?php echo "https://".substr($display_id[$path],14); ?>" controls></div></div>');
        
      }
      else{
        if(k!=0){
      <?php $path+=3;  ?>
        }
        k+=1;
        document.write('<div class="row"><div class="col"><video src="<?php echo "https://".substr($display_id[$path],14); ?>" controls></div><div class="col"><video src="<?php echo "https://".substr($display_id[$path+3],14); ?>" controls></div></div>');
     <?php $path+=3;  ?>
      }


    }
    document.write('</div></div></div>');

      </script>
<!--
                  <div class="col-xl-8 col-lg-8 mt-0">
              <div class="card border mt-0 ribbon-box1 shadow1 mb-2 topnav-navbar-dark1">
                <div class="card-body cta-box p-2 pl-3 pt-1">
<div class="row">
  <div class="col">
  <video src="" controls>
</div>
<div class="col">
<video src="" controls>
</div>
     </div>         
                </div> 
              
              </div>                
            </div> 
            -->
              <!-- vd msg ending-->    
            <!-- end col -->
            <div class="col-xl-4 col-lg-4 mt-0">


      

<?php
include ($root."/dev/video-message/2/video_message.php");
?>


        
              <?php
if($current_admin=="1")
{
//include($root."/job/copyjoburl.php");
}
?> 
              <?php
//include($root."/jobs/jobs_promo.php");
?>
              <?php
$root=$_SERVER["DOCUMENT_ROOT"];
//include($root."/jobs/mandate_profile.php");
?>
            </div>
          </div>
          <!-- end row-->
          
            <div class="mt-3 mb-3">
          <P>&nbsp;
          </P>
          <P>&nbsp;
          </P>
          <P>&nbsp;
          </P>
          </div>

          
        </div> 
        <!-- end wrapper-->
      </div>
      <!-- END Container -->              
    </div>
    <!-- END Container -->


    
    
    
    <?php 
$root_stats=$_SERVER["DOCUMENT_ROOT"];
include ($root_stats."/user/includes/stats.php");
?>
    <?php
include ($root."/user/includes/footer.php");
?>
    </body>
  </html>
