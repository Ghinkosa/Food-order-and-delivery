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
            margin-left:25%;
            border:solid 1px black;
            padding:5rem;
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
            height:2.5rem;
            border-radius:5px;
            background-color:blue;
            margin-left:1.5rem;
            color:white;
        }
        .create{
            height:2rem;
            width:55%;
            border-radius:5px;
            background-color:green;
            margin-left:.3rem;
        }
        .both{
            display: flex;
            flex-wrap:wrap;
            padding-top:3rem;
        }
        .photo{
            margin-left:1.5rem;
        }
        .error{
            margin-left:1.5rem;
            color:red;
        }
        .inp{
           display: flex;
           flex-flow:wrap;
        }
        select{
            margin-left:1.5rem;
            width: 20rem;
            height: 2.2rem;
            border-radius:10px;
        }
       .content{
       
        color:red; 
        margin-left:1.5rem;
        
       }
       a{
           text-decoration:none;
           text-align:center;
           color:white;
           padding-top:0.5rem
       }
    </style>
</head>
<body>
    <?php
    session_start();
    session_destroy();
    ?>
    <form action="check.php" method="post">
        <div class="both">
        <div class="form">
        <div class="title">login</div>
        <?php if(isset($_GET['content'])) { ?>
        <div class="content"><?php echo $_GET['content'];?></div> 
        <?php } 
                 ?>
        <input type="text" placeholder="email" class="email" name="email">
        <select name="log" class="opt">
        <option   value="manager">manager</option>  
        <option   value="user">user</option>  
        </select>
        <input type="password" name="password" class="name"  placeholder="password">
        <div class="inp">
        <input type="submit" name="submit" value="login" class="submit">
         <a href="signup.php" class="create">create new account</a>
        </div>
</div>
    </div>
    </form>
</body>
</html>
