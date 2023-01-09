<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="comments.php" method="post">
        <h1>comment here</h1>
        <input type="hidden" value="<?php echo $_GET['email'];?>" name="email">
        <textarea name="comment" id="comment" cols="30" rows="10"></textarea>
        <div>
           <button> <input type="submit" value="send" name="send"></button>
            <button><a href="popular.php">cancel</a></button>
        </div>
    </form>
    <?php
    $conn=new mysqli('localhost','root','','fod') or die("not connected");
    if(isset($_POST['send'])){
    $email=$_POST['email'];
    $comment=$_POST['comment'];
    $conn->query("INSERT INTO comment(email,comments) value('$email','$comment')");
    echo "comment sent succesfully";
}
?>
</body>
</html>

