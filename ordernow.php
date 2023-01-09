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
            height:2rem;
            border-radius:5px;
            background-color:blue;
            margin:0 1.5rem;
            text-align:center;
            font-size:1rem;
        }
        .both{
            display: flex;
            flex-wrap:wrap;
            border-top:1px solid black;
            padding-top:3rem;
        }
        .photo{
            margin-left:1.5rem;
        }
        .error{
            margin-left:1.5rem;
            color:red;
        }
       .err{
        font-size:2rem;
        background-color:red;
        border-radius:12px;
       }
    </style>
</head>
<body>

<?php
    $conn=new mysqli('localhost','root','','fod')or die("no server");
    $name = "";
    $email = "";
    $phone="";
    $address="";
    $food="";
    $name_error = "";
    $email_error = "";
    $phone_error = "";
    $address_error = "";
    $food_error = "";
    $password_error = "";
   if(isset($_POST['submit'])){
       $check=true;
       $name = $_POST['name'];
       $email =$_POST['email'];
       $phone=$_POST['phone'];
       $food=$_POST['foodname'];
       $address=$_POST['address'];
       $password=$_POST['password'];
       $price=$_POST['price'];
       if(empty($name)){
          $name_error="*This field is required";
          $check=false;
       }
       if(empty($address)){
        $address_error="*This field is required";
        $check=false;
     }
     if(empty($password)){
        $password_error="*password may not be empty";
        $check=false;
     }
     if(empty($food)){
        $food_error="*This field is required";
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
         $sql="SELECT balance from cbe where phone='$phone' and upassword='$password'";
         $result=$conn->query($sql);
         if($result->num_rows >0){
             $row=$result->fetch_assoc();
            $balance=$row['balance'];
         }
         if($balance > $price){
         $sqli="INSERT INTO orders(customerName,email,phone,foodname,locations,orderstatus) values('$name','$email','$phone','$food','$address','not received')";
         $conn->query($sqli);
         $mines=$balance-$price;
         
         $conn->query("UPDATE cbe SET balance='$mines' where phone='$phone'") or die($conn->error);
         
         $sql="select balance from cbe where phone='0934030930'";
         $result=$conn->query($sql);
         if($result->num_rows >0){
            $row =$result->fetch_assoc();
            $hbalance=$_row['balance'];
         }
         $plus=$hbalance+$price;
         $conn->query("UPDATE cbe SET balance='$plus' where phone='0934030930'") or die($conn->error);
         
         header("location:myorder.php");
        }
        else{?>
            <div class="err">low balance</div>
            <?php
        }
     }
   }
?>


    <form action="ordernow.php" method="post">
        <div class="title">Order now</div>
        <div class="both">
        <div class="photo">
            <img src="image2.jpeg" alt="no iamge" class="image">
        </div>
        <div class="form">
        <input type="text" placeholder="name" class="name" name="name">
        <div class="error"><?php echo $name_error?></div>

        <input type="hidden" placeholder="email" class="email" name="email" value="<?php echo $_GET['emial']?>">
        <div class="error"><?php echo $email_error?></div>
        
        <input type="text" placeholder="phone number" class="phone" name="phone">
        <div class="error"><?php echo $phone_error?></div>

        <input type="hidden" placeholder="price" class="phone" name="price" value="<?php echo $_GET['price']?>"> 

        <input type="password" placeholder="password" class="phone" name="password">
        <div class="error"><?php echo $password_error?></div>
        
        <input type="hidden" placeholder="food name" class="foodname" name="foodname" value="<?php echo $_GET['fname']?>">
        <div class="error"><?php echo $food_error?></div>
        
        <textarea name="address" class="address" cols="40" rows="15" placeholder="address"></textarea>
        <div class="error"><?php echo $address_error?></div>
        <div style="display:flex;">
        <input type="submit" name="submit" value="order now" class="submit">
        <a class="submit" href="popular.php">back</a>
        </div>
        </div>
    </div>
    </form>
</body>
</html>
