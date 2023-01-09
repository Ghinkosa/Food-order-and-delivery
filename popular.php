<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>delivery</title>
    <link rel="stylesheet" href="pop.css">
</head>
<body>

<?php
session_start();
if( $_SESSION['uemail']==false){
    header("location:login.php");
}
$conn = new mysqli('localhost','root','','fod')or die(mysqli_error($conn));
?>
    <header style="top:0;left:0;">
        <div>FOD</div>
        <ul>
            <li><a href="logout.php">sign out</a></li>
            <li><a href="comments.php?email=<?php echo $_SESSION['uemail']; ?>">comment here</a></li>
            <li><a href="myorder.php">my orders</a></li>
            <li><a href="#menu">Our menu</a></li>
            <li><a href="#special">Our spatial</a></li>
            <li class="popular"><a href="#popular">Popular</a></li>
            <li class="home"> <a href="#home">Home</a></li>
        </ul>
    </header>
    <section class="body" id="popular">
        <div class="head"> Most popular foods</div>

 <div class="after">
    <div class="left"></div>
    <div class="center">
    <?php 
    $sql="SELECT *FROM menu";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
    while($row =$result->fetch_assoc()){
         if($row['foodtype']=="popular"){?>
           <div class="total">
        <img src="<?php echo $row['photo'];?>" alt="no img">
        <div class="name"><?php echo $row['menuname'];?></div>
        <div class="price">$<?php echo $row['amount'];?></div>
        <div class="order"><a href="ordernow.php?emial=<?php echo $_SESSION['uemail']; ?>&fname=<?php echo $row['menuname'];?>&price=<?php echo $row['amount'];?>">order now</a></div>
        </div>
         
        <?php }
        }
       }
      ?>
    </div>
    <div class="right"></div>
  </div>
</section>

<section class="special" id="special">
    <div class="head">our special</div>
    <div class="after">
    <div class="left"></div>
    <div class="center">
        <?php 
    $sql="SELECT *FROM menu";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
    while($row =$result->fetch_assoc()){
         if($row['foodtype']=="special"){?>
           <div class="total">
        <img src="<?php echo $row['photo'];?>" alt="no img">
        <div class="name"><?php echo $row['menuname'];?></div>
        <div class="price">$<?php echo $row['amount'];?></div>
        <div class="order"><a href="ordernow.php?emial=<?php echo $_SESSION['uemail']; ?>&fname=<?php echo $row['menuname'];?>&price=<?php echo $row['amount'];?>">order now</a></div>
        </div>
         
        <?php }
        }
       }
      ?>
    </div>
    <div class="right"></div>
    </div>
</section>
<section class="menu" id="menu">
    <div class="head">our menu</div>
    <div class="after">
    <div class="center">
        <?php 
    $sql="SELECT *FROM menu";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
    while($row =$result->fetch_assoc()){?>
           <div class="no">
           <div>
        <img src="<?php echo $row['photo'];?>" alt="no img">
        <div class="nam"><?php echo $row['menuname'];?></div>
        <div class="order"><a href="ordernow.php?emial=<?php echo $_SESSION['uemail']; ?>&fname=<?php echo $row['menuname'];?>&price=<?php echo $row['amount'];?>">order now</a></div>
            </div>
        <div class="pric">$<?php echo $row['amount'];?></div>
        </div>
        <?php }
       }
      ?>       
    </div>
    <div class="right"></div>
    </div>
</section>
</body>
</html>