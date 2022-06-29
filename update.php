<?php
 include 'connect.php';
 $id=$_GET['updateid'];
 $sql="select * from `crud` where id=$id";
 $result=mysqli_query($con,$sql);
  $row=mysqli_fetch_assoc($result);
  $profile=$row['image'];
  $name=$row['name'];
  $email=$row['email'];
  $mobile=$row['mobile'];
  $password=$row['password'];
  $resume=$row['resume'];

 if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $password=$_POST['password'];
    $resume=$_FILES['resume']["name"];
    $profile=$_FILES["profile"]["name"];
   
    $extension = substr($profile,strlen($profile)-4,strlen($profile));

    $allowed_extensions = array(".jpg","jpeg",".png",".gif",".pdf");
    if(!in_array($extension,$allowed_extensions))
    {
      echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif /pdf format allowed');</script>";
    }
    else
    {
      $imgfile=time().$extension;
      move_uploaded_file($_FILES["profile"]["tmp_name"],"profiles/".$imgfile);
    }
  
    $expdf = substr($resume,strlen($resume)-4,strlen($resume));
  
    $allowed = array(".pdf",".docx");
    if(!in_array($expdf,$allowed))
    {
      echo "<script>alert('Invalid format. Only pdf/docx format allowed');</script>";
    }
    else
    {
      $cv=time().$expdf;
      move_uploaded_file($_FILES["resume"]["tmp_name"],"resumes/".$cv);
   
      $sql="update `crud` set image='$imgfile',name='$name',email='$email',mobile='$mobile',password='$password',resume='$cv' where id=$id";
       $result=mysqli_query($con,$sql);
       if($result){
           // echo"Data inserted successfully";
           header('location:display.php');
       }else{
           die(mysqli_error($con));
       }
    }    
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" >

    <title>Crud operation</title>
  </head>
  <body style="background-color:powderblue;">
    <div class="container my-5">
    <form method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" placeholder="Enter your name" name="name" autocomplete="off" value=<?php echo $name; ?>>
</div>
<div class="form-group">
    <label>Email</label>
    <input type="email" class="form-control" placeholder="Enter your email" name="email" autocomplete="off"value=<?php echo $email; ?>>
</div>
<div class="form-group">
    <label>mobile</label>
    <input type="number" class="form-control" placeholder="Enter your Mobile number" name="mobile" autocomplete="off"value=<?php echo $mobile; ?>>
</div>
<div class="form-group">
    <label>passsword</label>
    <input type="password" class="form-control" placeholder="Enter your password" name="password" autocomplete="off"value=<?php echo $password; ?>>
</div>
<div class="form-group">
    <label>Profile </label>
    <input type="file" class="form-control" placeholder="Upload your Profile" name="profile" autocomplete="off" value=<?php echo $profile; ?>>
</div>
<div class="form-group"> 
    <label>Resume </label>
    <input type="file" class="form-control" placeholder="Upload your Resume" name="resume" autocomplete="off"value=<?php echo $resume; ?>>
</div>
  <button type="submit" name="submit" class="btn btn-primary">Update</button>
</form>

	 










    </div>
  </body>
</html>