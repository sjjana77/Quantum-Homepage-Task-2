var url = URL.createObjectURL(object);
var file = e.files[0];
      if (file) {
      filedata = new FormData();
      filedata.append('image', file);
      imagee = filedata;
//img upload
<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}
?>
//ajax
$.ajax({
                type: "POST",
                url: "",
                data: {username: username, password: password,address: address,phone_number:phone_number,gender:gender,photo_path:escape(photo_path)},
                success: function(result){
                }
            })

            session_start();
$conn = mysqli_connect('localhost', 'root', '', 'assignment');
$sql = "SELECT * FROM users_list where username='$username'";
//select 
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
      
}
$conn->close();
exit;
//insert,update
if ($result->num_rows > 0) {
    echo json_encode(array("message"=>"Username Already Exist"));
    $conn->close(); 
    exit;
}
