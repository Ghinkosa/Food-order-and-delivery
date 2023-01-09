<?php
   session_start();
    $conn=new mysqli('localhost','root','','fod')or die("no server");
   if(isset($_POST['submit'])){

       $email =$_POST['email'];
       $password=$_POST['password'];
       $usertype=$_POST['log'];
        if($usertype=="user"){
        $sql="SELECT *FROM userdb where email='$email' and upassword='$password'";
        $result=$conn->query($sql);

        if($result->num_rows > 0){
           $_SESSION['uemail']=$email;
           header("location:popular.php"); 
        }
        else{
            header("location:login.php?content='*incorrect password or email'");
        }
    }
    if($usertype=="manager"){
        $sql="SELECT *FROM managerdb where email='$email' and managerpassword='$password'";
        $result=$conn->query($sql);

        if($result->num_rows > 0){
           $_SESSION['email']=$email;
           header("location:managerpage.php"); 
        }
        else{
            header("location:login.php?content='*incorrect password or email'");
                   }
    }
   }
?>