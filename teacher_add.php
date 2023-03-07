<?php
include 'conn/conn.php';
if(isset($_POST['teacher_add'])){
  $regdate = date("y-m-d");
  $name = $_POST['trname'];
  $phone = $_POST['contact'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $ins = $_POST['ins'];
  $image = $_FILES["image"]["name"];
  move_uploaded_file($_FILES["image"]["tmp_name"],"uploads/teachers/" . $_FILES["image"]["name"]);
  $user = $_POST['username'];
  $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $level = 1;


  $query = "INSERT INTO
   teachers (tr_name, contact, email, address, initials, tr_image, regdate)
   VALUES(:tr_name, :contact, :email, :address, :initials, :tr_image, :regdate)";

  $stmt = $db->prepare($query);

  $stmt->bindparam(':tr_name', $name);
  $stmt->bindparam(':contact', $phone);
  $stmt->bindparam(':email', $email);
  $stmt->bindparam(':address', $address);
  $stmt->bindparam(':initials', $ins);
  $stmt->bindparam(':tr_image', $image);
  $stmt->bindparam(':regdate', $regdate);


  $insert = $stmt->execute();

  if($insert){

    $query = "INSERT INTO
     users (name, email, contact, username, password, level)
     VALUES(:name, :email, :contact, :username, :password, :level)";


     $stmt = $db->prepare($query);

     $stmt->bindparam(':name', $name);
     $stmt->bindparam(':contact', $phone);
     $stmt->bindparam(':email', $email);
     $stmt->bindparam(':username', $user);
     $stmt->bindparam(':password', $pass);
     $stmt->bindparam(':level', $level);


     $insertuser = $stmt->execute();

     if($insertuser){
       $_SESSION['msg'] = " Teacher Inserted Succesfully";
       $_SESSION['msg-type'] = "success";

     }else{

        $tr_id = $db->lastinsertId();

        $correctdb = "DELETE FROM teachers WHERE id = ?";
        $cor = $db->prepare($correctdb);

        $cor->bindparam(1 ,$tr_id);

        $sucss = $cor->execute();

         if($sucss){
           $_SESSION['msg'] = " Something went wrong with users table!";
           $_SESSION['msg-type'] = "warning";
         }else{
           $_SESSION['msg'] = " Something went wrong: Database needs to be fixed!";
           $_SESSION['msg-type'] = "danger";
         }

     }

  }else{

    $_SESSION['msg'] = " Something went wrong";
    $_SESSION['msg-type'] = "warning";

  }

}

 header("location:dashboard.php?page=teachers");
 ?>
