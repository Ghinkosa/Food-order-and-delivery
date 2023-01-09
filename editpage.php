<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FOD</title>
    <link rel="stylesheet" href="style.css">
    <style>
        
table{
margin-top: 7rem;
display: inline;
}
td{
padding-left: 10rem;
padding-top: 25px;
}
a{
    text-decoration:none;
    color:white;
}
.b{
border: black solid 1px;
background-color:green;
padding:5px 12px;
border-radius: 4px;
width: 6%;
color:white;
}
.a{
border: black solid 1px;
background-color:red;
padding:5px 12px;
border-radius: 4px;
width: 6%;
color:white;

}
form{
display: block;
margin-top: 5rem;
}
input{
display: block;
margin: 1rem;
width: 30%;
height: 35px;
border-radius: 5px;
width: 80%;
border: 0.2px solid rgb(226, 53, 53);
font-size: 1.2rem;
}
input:hover{
border:0.5px solid blue;
box-shadow: 3px 3px 2px blue;
}
.btn{
margin-left: 3.5%;
width: 6%;
height: 40px;
background-color: blue;
border: none;
border-radius: 4px;
font-size: 1.2rem;
color:white;
text-decoration:none:
}
body{
margin-left: 5%;
}
.title{
margin-left: 1.5%;
font-size: 1.3rem;
}
.head{
    font-size:3rem;
    padding-left: 20%;
    border-bottom: solid black 0.5px;
    color:cyan;
    
 filter: drop-shadow(-3px -3px 2px rgb(255,255, 255,0.3))
         drop-shadow(5px 5px 5px rgba(0,0,0,0.2))
         drop-shadow(15px 15px 15px rgba(0,0,0,0.2));   
       

}
.rad{
    display: flex;
}
.rad .type{
    margin:0;
    padding: 0;
    border:none;
    width:5rem;
}
    </style>

</head>
<body>

<?php
$conn = new mysqli('localhost','root','','fod')or die(mysqli_error($conn));
$id=$_GET['update'];
$sql="SELECT *from menu where menuid=$id";
$result=$conn->query($sql);
  if($result->num_rows>0){
      $row=$result->fetch_assoc();  
      $photo=$row['photo'];
      $po=strrev($photo);
       $rt=strstr($po,'/',true);
       $pho=strrev($rt);
?>

    <div class="head">Edit menu</div>
    <form action="manage.php" method="POST" enctype="multipart/form-data">
       <div class="title"> menu name</div>
       <input type="hidden" value="<?php echo $_GET['update'];?>" name="id">
        <input type="text" name="foodname" class="name" value="<?php echo $row['menuname'];?>" placeholder="enter menu name">
        <div class="title"> menu price</div>
        <input type="number" name="price"  class="name" value="<?php echo $row['amount'];?>" placeholder="enter menu price">
        
        <div class="title"> menu type</div>
        <div class="rad">
        <input type="radio" name="type" class="type" value="popular">popular
        <input type="radio" name="type" class="type" value="special">special
        <input type="radio" name="type" class="type" value="menu" checked>normal menu
        </div>

        <input type="file" name="frist" value="<?php echo $row['photo'];?>" >
        <button type="submit" name="update" class="btn">update</button>
        <button type="submit" name="back" class="btn"><a href="managerpage.php">back</a></button>
    </form>
    <?php }
     ?>
</body>
</html>