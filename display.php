<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud operation</title>
    
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <script src="https://kit.fontawesome.com/f13d6475be.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
      table,tr,td{
        border :2px solid black;
        color:blue;
        font-family:'times new roman';
        font-size:17px;
        font-weight:bold;
      }
      th{
        color:black;
      }

    </style>
</head>
<body style="background-image:url('back4.webp');background-size:cover; " >
<h1 style="text-align:center; font-family:'times new roman';border:5px solid gray;color:red">CANDIDATES DETAILS</h1>
    <div class="container">
        <button class="btn btn-success my-5"><a href="user.php" class="text-light"title="Insert"><i class="fa fa-user-plus" style="font-size:30px"></i> </a>
        </button>
        <table class="table">
  <thead>
    <tr >
      <th style="border:2px solid black" scope="col">S.No</th>
      <th style="border:2px solid black" scope="col">Profile</th>
      <th style="border:2px solid black" scope="col">Name</th>
      <th style="border:2px solid black" scope="col">Email</th>
      <th style="border:2px solid black" scope="col">Mobile</th>
      <th style="border:2px solid black" scope="col">Password</th>
      <th style="border:2px solid black" scope="col">Resume</th>
      <th style="border:2px solid black" scope="col">Operation</th>
    </tr>
  </thead>
  <tbody>
      <?php
    $sql="select * from `crud`";
    $result=mysqli_query($con,$sql);
    if($result){
        while($row=mysqli_fetch_assoc($result)){
             $id=$row['id'];
             $profile=$row['image'];
             $name=$row['name'];
             $email=$row['email'];
             $mobile=$row['mobile'];
             $password=$row['password'];
             $resume=$row['resume']; 
             
             echo'<tr>
             <th scope="row">'.$id.'</th>
             <td><img src="profiles/'.$profile.'" height="70" width="70" style="border:2px solid green"></td>
             <td>'.$name.'</td>
             <td>'.$email.'</td>
             <td>'.$mobile.'</td>
             <td>'.$password.'</td>
             <td><i class="fa fa-file-pdf-o" style="color:red;font-size:40px"></i><br></td>
             <td>
                 <button class="btn btn-primary"><a href="update.php? updateid='.$id.'" class="text-light" title="Update"><i class="fa fa-edit" style="font-size:30px"></i></a></button>
                 &nbsp;
                 <button class="btn btn-danger"><a href="delete.php? deleteid='.$id.'" class="text-light"title="Delete"><i class="fa fa-trash-o" style="font-size:30px"></i></a></button>
             </td>
          </tr>';
        }
    }    
      ?>
  
  </tbody>
</table>
           
    </div>
</body>
</html>