
<?php
$conn = new mysqli('localhost','root','','fod')or die(mysqli_error($conn));
if(isset($_POST['addfood'])){
$menuname=$_POST['foodname'];
$price=$_POST['price'];
$type=$_POST['type'];

$nam=$_FILES['frist']['name']; 
$loc='uploads/';
$temp=$_FILES['frist']['tmp_name'];
$target=$loc.basename($nam);
if(!empty($nam)){
    if(move_uploaded_file($temp,$target)){
         echo "upload well";
    }
    else{
        echo "not uploaded";
    }
}

$conn->query("INSERT INTO menu(menuname,amount,photo,foodtype) values('$menuname','$price','$target','$type')") or die($conn->error);
header("location:managerpage.php");
}

if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    $conn->query
("DELETE FROM menu where menuid='$id'");
header("location:managerpage.php");
}

if(isset($_POST['update'])){
    $name=$_POST['foodname'];
    $amount=$_POST['price'];
    $id=$_POST['id'];
    $type=$_POST['type'];
    $nam=$_FILES['frist']['name']; 
    $loc='uploads/';
    $temp=$_FILES['frist']['tmp_name'];
    $target=$loc.basename($nam);
    if(!empty($nam)){
        if(move_uploaded_file($temp,$target)){
             echo "upload well";
        }
        else{
            echo "not uploaded";
        }
    }
    $conn->query("UPDATE menu SET menuname='$name',amount='$amount',photo='$target',foodtype='$type' where menuid='$id'") or die($conn->error);
    header("location:managerpage.php");
}
?>