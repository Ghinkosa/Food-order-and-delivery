<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food OD</title>
    <style>
        .form{
            display: ;
            margin-left:25%;
            border:solid 1px black;
            padding:5rem;
        }
        input{
            display: block;
        }
        .name{
            
            margin:1.5rem;
            width: 20rem;
            height: 2.2rem;
            border-radius:10px;
        }
        .phone{
           
            margin:1.5rem;
            width: 20rem;
            height: 2.2rem;
            border-radius:10px;
        }
        .email{
            
            margin:1.5rem;
            width: 20rem;
            height: 2.2rem;
            border-radius:10px;
        }
        .foodname{
            margin:1.5rem;
            width: 20rem;
            height: 2.2rem;
            border-radius:10px;
        }
        textarea{
            margin:1.5rem;
            border-radius:10px;
        }
        .title{
            font-size:3rem;
            margin-left:25%;
            color:red;
        }
        .submit{
            width:5rem;
            height:2.5rem;
            border-radius:5px;
            background-color:blue;
            margin:0 1.5rem;
            color:white;
        }
        .both{
            display: flex;
            flex-wrap:wrap;
            padding-top:3rem;
        }
        .photo{
            margin-left:1.5rem;
        }
        .error{
            margin-left:1.5rem;
            color:red;
        }
        .inp{
           display: flex;
           flex-flow:wrap;
        }
        a{
           text-decoration:none;
           text-align:center;
           color:white;
           padding-top:0.5rem
       }
       .create{
            height:2rem;
            width:25%;
            border-radius:5px;
            background-color:green;
            margin-left:.3rem;
        }
      
    </style>
</head>
<body>

<?php
    $conn=new mysqli('localhost','root','','fod')or die("no server");
    $response="";
    $name = "";
    $email = "";
    $phone="";
    $password="";
    $name_error = "";
    $email_error = "";
    $phone_error = "";
    $password_error = "";
   if(isset($_POST['submit'])){
       $check=true;
       $name = $_POST['name'];
       $email =$_POST['email'];
       $phone=$_POST['phone'];
       $password=$_POST['password'];
       if(empty($name)){
          $name_error="*This field is required";
          $check=false;
       }
       if(empty($password)||strlen($password)<6){
        $password_error="*your password at least contian 6 character";
        $check=false;
     }
     if(empty($email)||(strpos($email,'@')==false) ||(strpos($email,'.com')==false)){
        $email_error="*incorrect email format";
        $check=false;
     }
     if(empty($phone)||is_numeric($phone)==false){
        $phone_error="*incorrect phone format";
        $check=false;
     }
     if($check){
         $sql="INSERT INTO userdb(uname,email,phone,upassword) values('$name','$email','$phone','$password')";
         $conn->query($sql);
         echo "account created successfully";
     }
   }
?>

    <form action="signup.php" method="post">
        
        <div class="both">
        <div class="form">
            
        <div class="title">signup form</div>
        <input type="text" placeholder="name" class="name" name="name">
        <div class="error"><?php echo $name_error?></div>

        <input type="text" placeholder="email" class="email" name="email">
        <div class="error"><?php echo $email_error?></div>
        
        <input type="text" placeholder="phone number" class="phone" name="phone">
        <div class="error"><?php echo $phone_error?></div>
        
               
        <input type="password" name="password" class="name"  placeholder="password">
        <div class="error"><?php echo $password_error?></div>
        <div class="inp">
        <input type="submit" name="submit" value="signup" class="submit">
        <a href="login.php" class="create">Back</a>
        </div>
        </div>
    </div>
    </form>
</body>
</html>
