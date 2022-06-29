<?php
 include 'connect.php';
 if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $password=$_POST['password'];
    $resume=$_FILES["resume"]["name"];
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
    move_uploaded_file($_FILES["resume"]["name"],"resumes/".$cv);
 
    $sql="insert into `crud` (image,name,email,mobile,password,resume)
     values('$imgfile','$name','$email','$mobile','$password','$cv')";
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
  <body style="background-color:Test white;">
    <div class="container my-5">
      
    
    <div class="card">
<div class="row">
<div class="col-1"></div>
<div class="col-10">
<div class="card card-header">
      Add Candidate
</div>
    <form method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" placeholder="Enter your name" name="name" autocomplete="off" >
</div>
<div class="form-group">
    <label>Email</label>
    <input type="email" class="form-control" placeholder="Enter your email" name="email" autocomplete="off">
</div>
<div class="form-group">
    <label>mobile</label>
    <input type="number" class="form-control" placeholder="Enter your Mobile number" name="mobile" autocomplete="off">
</div>
<div class="form-group">
    <label>passsword</label>
    <input type="password" class="form-control" placeholder="Enter your password" name="password" autocomplete="off">
</div>
<div class="form-group">
    <label>Profile</label>
    <input type="file" class="form-control" placeholder="Upload your Profile" name="profile" autocomplete="off">
    <span style="color:red; font-size:16px;"  >Only jpg / jpeg/ png /gif format allowed.</span>
  </div>
<div class="form-group">
    <label>Resume</label>
    <input type="file" class="form-control" placeholder="Upload your Resume" name="resume" autocomplete="off">
    <span style="color:red; font-size:16px;"  >Only pdf/docx format allowed.</span>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form> 
</div>
<div class="col-1"></div>
</div>
    
</div>
    </div>
  </body>
</html>