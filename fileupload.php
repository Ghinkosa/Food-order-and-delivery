<?php
    $conn=new mysqli('localhost','root','','practice')or die("no server");
    if(isset($_POST['sub'])){
        $name=$_FILES['frist']['name']; 
        $loc='uploads/';
        $temp=$_FILES['frist']['tmp_name'];
        $target=$loc.basename($name);
        if(!empty($name)){
            if(move_uploaded_file($temp,$target)){
                 echo "upload well";
            }
            else{
                echo "not uploaded";
            }
        }
        echo $target;
        $sql="INSERT INTO `photo`(`imag`) VALUES ('$target')";



        //$sql = "INSERT INTO `news`(`title`, `content`) 
        //VALUES ('$title','$content')";

  

        if($conn->query($sql)==true){
               echo "done";
        }
        else{
            echo "error";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="fileupload.php" method="post" enctype="multipart/form-data">
   <input type="file" name="frist">
   <input type="submit" name="sub">
</form>
<?php 
    $sql="SELECT *FROM photo";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
    while($row =$result->fetch_assoc()){?>
           <img src="<?php echo $row['imag'];?>" alt="no image">
    <?php }
}
?>
</body>
</html>
