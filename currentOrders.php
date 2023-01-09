<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FOD</title>
    <style>
    table{
    display: inline;
    padding: 3rem;
    
}
td{
    padding-left: 5rem;
    padding-top: 12.5px;
    
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
input{
    display: block;
    margin: 1rem;
    width: 30%;
    height: 35px;
    border-radius: 5px;
    width: 80%;
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
    
}
.cur{
    color:black;
    border-bottom:solid blue 0.5px;
    font-size:3rem;
    padding-left:25%;
    margin-top:4rem;
    margin-bottom:3rem;
}
header ul{
    list-style: none;
}
header ul li{
    float: right;
    margin: 0 2%;
    background-color: white;
    border-radius: 3px;
    margin-top: -1.1rem;
    text-decoration: none;
    color: black;
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
    </style>
</head>
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
     $conn->query("UPDATE `orders` SET `new`='$up' WHERE new='$ch'") or die($conn->error);
    $result=$conn->query("SELECT *from orders");
      ?>
      <table>
      <div>
          <th>id</th>
          <th>Name</th>
          <th>email</th>
          <th>phone</th>
          <th>order</th>
          <th>location</th>
          <th>status</th>
          <th>action</th>
      </div>
    <?php 
            while ($row=$result->fetch_assoc()) {?>
            
              <tr>
                <div class="tab">
                <td ><?php echo $row['id']; ?></td>
                <td ><?php echo $row['customerName']; ?></td>
                <td ><?php echo $row['email']; ?></td>
                <td ><?php echo $row['phone']; ?></td>
                <td ><?php echo $row['foodname']; ?></td>
                <td ><?php echo $row['locations']; ?></td>
                <td ><?php echo $row['orderstatus']; ?></td>
                <td>
                    <?php if($row['orderstatus'] != "recieved"){ ?>
                        <a class="a" href="currentOrders.php">delete</a>
                   <?php }
                   else{?>
                <a class="a" href="currentOrders.php?delete=<?php echo $row['id'];?>">delete</a>
            <?php } ?>
            </td>
            </div>
              </tr>
           <?php } ?>
            </table>
            <?php
    if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    $conn->query
     ("DELETE FROM orders where id='$id'");
     header("location:currentOrders.php");
}?>
</body>
</html>