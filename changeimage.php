<?php
 include 'connect.php';
 if(isset($_POST['submit'])){
    $uid=$_GET['userid'];
    $resume=$_FILES["resume"]["name"];
    $profile=$_FILES["profile"]["name"];
    $oldpic=$_POST['oldpic'];
    $oldprofile="profiles"."/".$oldpic;
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
    $query=mysqli_query($con,"update crud set profile='$imgfile' where id='$uid'");
    if ($query) 
    {
        unlink($oldprofile);
    echo "<script>alert('Profile pic updated successfully');</script>";
   echo "<script type='text/javascript'> document.location ='display.php'; </script>";
  }
  else
    {
      echo "<script>alert('Something Went Wrong. Please try again');</script>";
    } 
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
  <body>
    <div class="container my-5">
    <form method="post" enctype="multipart/form-data">
  
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
  </body>
</html>