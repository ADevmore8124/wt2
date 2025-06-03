<?php 
require 'db_handling.php';
$conn=connect_db();
if($_SERVER["REQUEST_METHOD"]=="POST")
{
   $name= trim($_POST["name"]);
   $email=trim($_POST['email']);
   $dept=trim($_POST["dept"]);
   $year=trim($_POST["year"]);
   $prn=trim($_POST["prn"]);
    $errors=[];


    if(empty($name)||!preg_match("/^[A-Za-z]*$/", $name))
    {
        $errors[]="Invalid Name.";
    }

    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
       $errors[]="Invalid Email.";

    }
     if(empty($prn))
     {
        $errors[]="Invalid PRN.";

     }
    if(empty($dept)){
               $errors[]="Invalid Dept.";

    }

    if(empty($year)){
               $errors[]="Invalid year.";

    }
    if(empty($error)){
        echo "<p>Registration successful</p>";
       $stmt= $conn->prepare("INSERT INTO student(name,email,dept,year,prn) values(?,?,?,?,?)");
        $stmt->bind_param("sssss",$name,$email,$dept,$year,$prn);
        $stmt->execute();
        
    }
    else
    {
        foreach($errors as $error)
        echo "<p style='color:red'>$error</p>";
    }

}




?>