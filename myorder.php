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
    <header>
        <div>FOD</div>
        <ul>
            <li><a href="logout.php">sign out</a></li>
            <li><a href="myorder.php">my orders</a></li>
            <li><a href="popular.php#menu">Our menu</a></li>
            <li><a href="popular.php#special">Our spatial</a></li>
            <li class="popular"><a href="popular.php#popular">Popular</a></li>
            <li class="home"> <a href="popular.php#home">Home</a></li>
        </ul>
    </header>
    <section style="padding-top:3rem; padding-left:35%" class="orders">
        <?php
        $my=$_SESSION['uemail'];
       $conn = new mysqli('localhost','root','','fod')or die(mysqli_error($conn));
      $result=$conn->query("SELECT *from orders where email='$my'");
      ?>
      <table class="tab">
          <th style="padding:0 2rem;">name</th>
          <th style="padding:0 2rem;">phone</th>
          <th style="padding:0 2rem;">order</th>
          <th style="padding:0 2rem;">location</th>
          <th style="padding:0 2rem;">status</th>
          <th style="padding:0 2rem;">action</th>
    <?php 
            while ($row=$result->fetch_assoc()) {?>
            
              <tr>
                <div class="tab">
                <td style="padding:0 2rem;"><?php echo $row['customerName'];?></td>
                <td style="padding:0 2rem;"><?php echo $row['phone']; ?></td>
                <td style="padding:0 2rem;"><?php echo $row['foodname']; ?></td>
                <td style="padding:0 2rem;"><?php echo $row['locations']; ?></td>
                <td style="padding:0 2rem;"><?php echo $row['orderstatus']; ?></td>
                <td>
                <a style="background-color:green;width:1.5rem; height:1.5rem;" class="a" href="myorder.php?id=<?php echo $row['id'];?>">recieved</a>
            </td>
            </div>
              </tr>
           <?php   
          }
          ?>
          </table>
    </section>
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
        <div class="price"><?php echo $row['amount'];?></div>
        <div class="order"><a href="ordernow.php">order now</a></div>
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
        <div class="price"><?php echo $row['amount'];?></div>
        <div class="order"><a href="ordernow.php">order now</a></div>
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
        <div class="order"><a href="ordernow.php">order now</a></div>
            </div>
        <div class="pric"><?php echo $row['amount'];?></div>
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
<?php
   if(isset($_GET['id'])){
     $id=$_GET['id'];
     $conn->query("UPDATE orders SET orderstatus='recieved' where id='$id'") or die($conn->error);
     header("location:myorder.php");
   }
?>