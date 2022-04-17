<?php require_once("config.php"); ?>

<?php
    if(isset($_POST['signup'])){
        extract($_POST);
        //validation for first name.
        if(strlen($firstName)<3){
            $error[]='First Name field should contain atleast 3 characters';
        }
        if(strlen($firstName)>20){
            $error[]= 'First Name Field can only contain 20 characters atmost';
        }
        if(!preg_match("/^[A-Za-z _]*[A-Za-z ]+[A-Za-z _]*$/", $firstName)){
            $error[]= 'Invalid Entry in First Name. Please enter letters without any digit or special symbols.';
        }
        //validation for last name.
        if(strlen($lastName)<3){
            $error[]='Last Name field should contain atleast 3 characters';
        }
        if(strlen($lastName)>20){
            $error[]= 'Last Name Field can only contain 20 characters atmost';
        }
        if(!preg_match("/^[A-Za-z _]*[A-Za-z ]+[A-Za-z _]*$/", $lastName)){
            $error[]= 'Invalid Entry in Last Name. Please enter letters without any digit or special symbols.';
        }
        //validation for user name.
        if(strlen($userName)<3){
            $error[]='User Name field should contain atleast 3 characters';
        }
        if(strlen($userName)>50){
            $error[]= 'User Name Field can only contain 50 characters atmost';
        }
        if(!preg_match("/^^[^0-9][a-z0-9]+([_-]?[a-z0-9])*$/", $userName)){
            $error[]= 'Invalid Entry in User Name. Enter lowercase letters without any space and No numbers at start.';
        }
        //validation for password and confirm password.
        if($confirm_password ==''){
            $error[]= 'Please confirm the password.';
        }
        if($password != $confirm_password){
            $error[]= 'Passwords do not match';
        }
        if(strlen($password)<5){
            $error[]= 'Password should atleast be 5 characters long.';
        }
        if(strlen($password)>20){
            $error[]= 'Password cannot be long then 20 characters.';
        }

        //adding details into the database
        $sql="select * from users where (userName='$userName');";
        $res= mysqli_query($dbc,$sql);
        if(mysqli_num_rows($res)>0){
            $row= mysqli_fetch_assoc($res);

            if($userName==$row['userName']){
                $error[]= 'Username already exists.';
            }
            
        }
        if(!isset($error)){
            $date= date('Y-m-d');
            $options= array("cost"=>4);
            $password= password_hash($password,PASSWORD_BCRYPT,$options);
            $result= mysqli_query($dbc, "INSERT INTO users 
    VALUES ('', '$firstName', '$lastName', '$userName', '$password', '$date')"); 
            //

            if($result){
                $done=2;
            }
            else{
                $error[]= 'Failed: Something went wrong.';
            }
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Abel&family=Anton&family=Josefin+Sans:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Lato:ital,wght@1,300&family=Lexend+Deca:wght@300;400&family=Livvic:ital,wght@1,400;1,500&family=Montserrat+Alternates:wght@500&family=Poppins&display=swap');
    *{
        margin: 0;
        padding: 0;
        font-family: sans-serif;
        box-sizing: border-box; 
    }
    li, a{
        font-family: "Montserrat", sans-serif;
        font-weight: 500;
        font-size: 16px;
        color: #edf0f1;
        text-decoration: none;
    }
    header{
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 30px 10%;
    }
    .nav_links{
        list-style: none;
    }
    .nav_links li{
        display: inline-block;
        padding: 0px 20px;
    }
    .nav_links li a{
        transition: all 0.3s ease 0s;
    }
    .nav_links li a:hover{
        color: #0088a9;
    }
    button{
        padding: 9px 25px;
        background-color: rgba(0,136,169,1);
        border: none;
        border-radius: 50px;
        cursor: pointer;
        transition: all 0.3s ease 0s;
    }
    button:hover{
        background-color: rgba(0,136,169,0.8);
    }
    body{
        display: flex;
        align-items: center;
        flex-direction: column;
        height: 100vh;
        background: url('https://wallpapercave.com/wp/wp6293134.jpg');
        background-size: cover;
        background-repeat: no-repeat; 
    }
    .center{
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 400px;
      background: white;
      opacity: 1.2;
      border-radius: 10px;
        
    }
    .center h1{
      text-align: center;
      padding: 20px 0;
      border-bottom: 1px solid silver;
    }
    .center form{
        padding: 0 40px;
        box-sizing: border-box;
    }
    form .txt_field{
      position: relative;
      border-bottom: 2px solid #adadad;
      margin: 30px 0;
    }
    .txt_field input{
      width: 100%;
      padding: 0 5px;
      height: 40px;
      font-size: 16px;
      border: none;
      background: none;
      outline: none;
    }
    .txt_field label{
      position: absolute;
      top: 50%;
      left: 5px;
      color: #adadad;
      transform: translateY(-50%);
      font-size: 16px;
      pointer-events: none;
      transition: .5s;
    }
    .txt_field span::before{
      content: '';
      position: absolute;
      top: 40px;
      left: 0;
      width: 0%;
      height: 2px;
      background: #2691d9;
      transition: .5s;
    }
    .txt_field input:focus ~ label,
    .txt_field input:valid ~ label{
      top: -5px;
      color: #2691d9;
    }
    .txt_field input:focus ~ span::before,
    .txt_field input:valid ~ span::before{
      width: 100%;
    }
    form{
        margin-top: 50px;
        text-align: center;
    }
    input{
        display: block;
        width: 350px;
        height: 40px;
        margin: 20px;
        border: none;
        outline: none;
        font-size: 20px;
        border-bottom: 1px solid white;
        background: transparent;
        color: white;
    }
    button{
        width: 350px;
        height: 40px;
        font-size: 20px;
        background-color: blue;
        border: none;
        color: white;
        margin-top: 20px;
    }
    form h1{
        margin-bottom: 30px;
        color: white;
    }
    ::placeholder{

        color: white;
    }
    .errmsg{
        margin: 2px auto;
        border-radius: 5px;
        border: 1px solid red;
        background: pink;
        text-align: left;
        color: brown;
        padding: 1px;
    }
    .successmsg{
        margin:5px auto;
        border-radius: 5px;
        border: 1px solid green;
        background: #33CC00;
        text-align: left;
        color: white;
        padding: 10px;
    }
</style>
<body>
   
    <header>
        <!-- <img class="logo" src="logo.png" alt=""> -->
        <nav>
            <ul class="nav_links">
                <li><a href="home.html">Home</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="contact.php">Contacts</a></li>
                <li><a href="Books.html">Books</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </nav>
    </header>
    <form action="" method="post">
    
        <h1>SignUp</h1>

        <?php
            if(isset($error)){
                foreach($error as $error){
                    echo '<p class="errmsg">&#x26A0;'.$error.'</p>';
                }
            }
        ?>
        <?php 
        if(isset($done))
        {
            ?>
            <div class="successmsg"><span style="font-size:100px;">&#9989;</span><br>
            You have registered successfully.<br> <a href="login.php" style="color:#fff;">
            Login here...</a>
        </div>
        <?php
    }
   else {?>

        <input type="text" name="firstName" placeholder="Enter First Name" value= "<?php
            if(isset($error)){
                echo $firstName;
            }
        ?>" required="">
        
        <input type="text" name="lastName" placeholder="Enter Last Name" value= "<?php
            if(isset($error)){
                echo $lastName;
            }
        ?>" required="">
        <input type="text" name="userName" placeholder="Enter User Name" value= "<?php
            if(isset($error)){
                echo $userName;
            }
        ?>" required="">
        
        <input type="password" name="password" placeholder="Enter a Password" required="">
        <input type="password" name="confirm_password" placeholder="Enter Confirm Password" required="">
        <button type="submit" name="signup">Sign Up</button>
    <?php } ?>
    </form>
</body>
</html>