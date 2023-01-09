<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>food delivery</title>
   <link rel="stylesheet"  href="style.css">
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
form{
    display: block;
    margin-top: 2rem;
    width:25rem;
}
#all{
    display: block;
    margin: 1rem;
    width: 30%;
    height: 35px;
    border-radius: 5px;
    width: 80%;
    font-size: 1.2rem;
    border:0.5px black solid;
}
#all:hover{
    border:0.5px solid blue;
    box-shadow: 3px 3px 2px blue;
}
.btn{
    margin-left: 3.5%;
    width: 20%;
    height: 40px;
    background-color: blue;
    border: none;
    border-radius: 4px;
    
}
.title{
  margin-left: 1.5%;
  font-size: 1.3rem;
}
.head{
    font-size:3rem;
    margin-top:50px;
    border:none;
    margin-left:30px;
}
.head1{
    font-size:3rem;
    margin-top:50px;
    border:none;
    margin-left:27%;
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
.img{
    width:4rem;
    height:3rem;
}
.center{
    position: absolute;
    display: flex;
    flex-flow: row wrap;
    margin-left:10px;
}
.ta{
    width:40rem;
    margin-left:20px;
}
.headers{
    display: flex;
    flex-flow:wrap;
}
.new{
    margin-left:10px;
    background-color:green;
    width: 40px;
}

    </style>
</head>
<body>
       <?php
       session_start();
       if( $_SESSION['email']==false){
        header("location:login.php");
       }
       ?>
<header>
        <div>FOD</div>
        <ul>
            <li><a href="logout.php">sign out</a></li>
            <li><a href="currentOrders.php">
                <?php
            require_once 'manage.php';
            $i=0;
            $result=$conn->query("SELECT *from orders");
                while ($row=$result->fetch_assoc()) {
                      if($row['new']==0){
                          $i++;
                      }
            } 
            if($i>0){?>
                <div class="new">
               <?php echo "$i new <br>";?>
                </div>
                <?php
            }
            ?>
             current order</a></li>
             <li><a href="viewcomment.php">comments</li>
            <li><a href="managerpage.php">manage menu</a></li>
        </ul>
    </header>
   <!-- <div class="headers"><div class="head">Add menu</div> <div class="head1">view menu</div></div>-->
<div class="center">

      <div class="former">
      <div class="head">Add menu</div>
        <form action="manage.php" method="POST" enctype="multipart/form-data">
        <div class="title"> menu name</div>
        <input type="text" name="foodname" class="name" id="all" placeholder="enter menu name">
        <div class="title"> menu price</div>
        <input type="number" name="price"  class="name" id="all" placeholder="enter menu price">
        
        <div class="title"> menu type</div>
        <div class="rad">
          <input type="radio" name="type" class="type" value="popular">popular
           <input type="radio" name="type" class="type" value="special">special
           <input type="radio" name="type" class="type" value="menu" checked>normal menu
        </div>
      
       <input type="file" name="frist" id="all">
        <button type="submit" name="addfood" class="btn">save</button>
    </form>
    </div>
    <div class="ta">
       <?php 
       $result=$conn->query("SELECT *from menu");
       ?>
       <div class="head1">view menu</div>
       <table>
<?php 
             while ($row=$result->fetch_assoc()) {?>
             
               <tr>
                 <div class="tab">
                 <td ><?php echo $row['menuid']; ?></td>
                 <td ><?php echo $row['menuname']; ?></td>
                 <td ><?php echo $row['amount']; ?></td>
                 <td ><?php echo $row['foodtype']; ?></td>
                 <td><img src="<?php echo $row['photo'];?>" alt="no img"class="img"></d>
           <td >
              <a class="b" href="editpage.php?update=<?php echo $row['menuid'];?>">Edit</a>
              <a class="a" href="manage.php?delete=<?php echo $row['menuid'];?>">Delete</a>
          </td>
             </div>
               </tr>
            <?php } ?>
             </table>
     </div>
     
</div>
</body>
</html>