<?php
    require_once("config.php");
    if(isset($_POST['login'])){
        $login=$_POST['userName'];
        $password=$_POST['password'];
        $query="select * from users where (userName='$login')";
        $res=mysqli_query($dbc,$query);
        $numRows=mysqli_num_rows($res);
        if($numRows == 1){
            $row= mysqli_fetch_assoc($res);
            if(password_verify($password,$row['password'])){
                $_SESSION["login_sess"]="1";
                $_SESSION["login_user"]=$row['userName'];
            header("location:std.php");
            }
            else{
                header("location:login.php?loginerror=".$login);
            }
        }
        else{
            header("location:login.php?loginerror=".$login);
        }
    }
?>