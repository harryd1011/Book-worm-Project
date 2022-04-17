<?php
    require_once("config.php");
    if(!isset($_SESSION["login_sess"]))
    {
        header("location:login.php");
    }
    $user=$_SESSION["login_user"];
    $findresult= mysqli_query($dbc, "SELECT * FROM users WHERE userName='$user'");
    
    if($res=mysqli_fetch_array($findresult)){
        $userName= $res['userName'];
        $firstName= $res['firstName'];
        $lastName= $res['lastName'];
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="logo1.png">
    <link rel="stylesheet" href="home.css">

    <title>Book-worm</title>
</head>

<body>
    <!--Navbar-->
    <nav class="navbar">
        <div class="logo">
            <img src="logo.png" alt="">
        </div>
        <ul class="nav-links">
            <li class="active item "><a href="home.html">Home</a></li>
            <li class="item"><a href="#about">About</a></li>
            <li class="item"><a href="contact.php">Contact</a></li>
            <li class="item"><a href="Books.html">Books</a></li>
            <li class="lgn"><?php echo $user; ?></li>
        </ul>
        <img src="menu-btn.png" alt="" class="menu-btn">
    </nav>
    <header>
        <div class="header-content">
            <h1>BOOK-WORM</h1>
            <div class="line">
                <h2>"The willingness to learn new skill is very high"</h2>
            </div>
        </div>
    </header>
    <div id="about"><br><br><br>
        <h1>About Us</h1><br><br>
        <div class="text">Our members have created website for educational purposes that will deal with different subjects of different standards. We will provide soft copy and study materials to students through the medium of our website. All they need to do is just sign-up and create an account on our website and then they can have benefits that our website has to offer to them. Users will also be able to purchase top novels through the medium of our website before logging in or signing up.</div>
        <div class="img">
            <img src="123.png" alt="">
        </div>
    </div>
    
    <footer>
        <div class="footer">
            <p> copyright &copy; www.Book-Worm.com. All right reserved!</p>
        </div>
    </footer>
    <script>
        const menuBtn = document.querySelector('.menu-btn')
        const navlinks = document.querySelector('.nav-links')

        menuBtn.addEventListener('click', () => {
            navlinks.classList.toggle('mobile-menu')
        })
    </script>
</body>

</html>