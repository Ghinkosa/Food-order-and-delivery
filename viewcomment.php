<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fod</title>
</head>
<style>
   body{
       margin-top:15px;
       padding:0px;
   }
   body{
       margin-top:15px;
       padding:0px;
   }
 header{
    height: 3.5rem;
    background-color:rgb(219, 205, 205);
    width: 100%;
    opacity: 0.8;
    border-radius:12px;
    margin:0;
}
header ul{
    list-style: none;
}
header ul li{
    float: right;
    margin: 0 3%;
    background-color: white;
    border-radius: 3px;
    margin-top: -1.1rem;
    text-decoration: none;
    color: black;
    height:35px;
    float: center;
}
a{
    text-decoration: none;
    color: black;
    
}
.de{
    width:100px;
    height:20px;
    background:green;
}
    table{
    display: inline;
    padding: 3rem;
}
td{
    padding-left: 2rem;
    padding-top: 25px;
    
}
.b{
    background-color:green;
    padding:5px 12px;
    border-radius: 4px;
    width: 6%;
    color:white;
}
.a{
    background-color:red;
    padding:5px 12px;
    border-radius: 4px;
    width: 6%;
    color:white;
    
}
</style>
<body>
    
<header>
        <div>FOD</div>
        <ul>
            <li><a href="login.php">sign out</a></li>
            <li><a href="currentOrders.php">current order</a></li>
            <li><a href="managerpage.php">manage menu</a></li>
        </ul>
    </header>
    <div class="cur">current orders</div>
    <?php
    $conn = new mysqli('localhost','root','','fod')or die(mysqli_error($conn));
    $up=1;
    $ch=0;
     $conn->query("UPDATE `comment` SET `new`='$up' WHERE new='$ch'") or die($conn->error);
    $result=$conn->query("SELECT *from comment");
      ?>
      <table>
      <div>
          <th>email</th>
          <th>comments</th>       
          <th>action</th>
      </div>
    <?php 
            while ($row=$result->fetch_assoc()) {?>
            
              <tr>
                <div class="tab">
                <td ><?php echo $row['email']; ?></td>
                <td ><?php echo $row['comments']; ?></td>
                <td>
                <a class="a" href="viewcomment.php?delete=<?php echo $row['id'];?>">delete</a>
            </td>
            </div>
              </tr>
           <?php } ?>
            </table>
            <?php
    if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    $conn->query
     ("DELETE FROM comment where id='$id'");
     header("location:viewcomment.php");
}?>
</body>
</html>