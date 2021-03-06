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

<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title></title>
	<link rel="icon" href="logo.png">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<!-- <link href="https://fonts.googleapis.com/css2?family=Abel&family=Anton&family=Josefin+Sans:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Lato:ital,wght@1,300&family=Lexend+Deca:wght@300;400&family=Livvic:ital,wght@1,400;1,500&family=Poppins&display=swap" rel="stylesheet"> -->
	<link rel="stylesheet" type="text/css" href="std.css">

	<link rel="stylesheet" href="home.css">
	<style>
		body {
			padding-top: 170px;
			margin: 10px;
		}

		.btn {
			background-color: #04AA6D;
			border: none;
			color: white;
			padding: 79px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
			margin: 35px 165px;
			height: 250px;
			/* border-radius: 100px; */
			width: 183px;
		}

		.download {
			background-color: #080808;
			border: none;
			color: white;
			padding: 21px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
			margin: -1px 165px;
			height: 10px;
			/* border-radius: 100px; */
			width: 183px;
		}

		.dropbtn {
			border: none;
			font-size: 25px;
		}

		.dropdown {
			position: relative;
			display: inline-block;
		}

		.dropdown-content {
			display: none;
			position: absolute;
			background-color: black;
			min-width: 160px;

		}

		.dropdown-content a {
			text-decoration: none;
			display: block;
			color: black;
			padding: 12px 16px;
		}

		/* .dropdown:hover .dropbtn {background-color: #3e8e41;} */
		.dropdown-content a:hover {
			background-color: rgb(24, 23, 23);
		}

		.dropdown:hover .dropdown-content {
			display: block;
		}
	</style>

</head>

<body>
	<nav class="navbar">
		<div class="logo">
			<img src="logo.png" alt="">
		</div>
		<ul class="nav-links">
			<li class="active item ">Welcome!<?php echo $user; ?></li>
			<li class="item"><a href="#about">Home</a></li>
			<li class="item"><a href="contact.php">Contact</a></li>
			<li class="item dropdown">
				<div class="dropbtn">Books</div>
				<div class="dropdown-content">
					<a href="std.php">Education</a>
					<a href="Books.html">Novel</a>
				</div>
			</li>
			<li class="lgn"><a href="logout.php">Log-Out</a></li>
		</ul>
		<img src="menu-btn.png" alt="" class="menu-btn">
	</nav>
	<div class="menu">
		<a href="std 1 e.html">
			<div class="food-items">
				<p>Standard - 1</p>
			</div>
		</a>

		<a href="std 2 g.html">
			<div class="food-items">
				<p>Standard - 2</p>
			</div>
		</a>

		<a href="std 3 e.html">
			<div class="food-items">
				<p>Standard - 3</p>
			</div>
		</a>


		<a href="std 4/std 4 e.html">
			<div class="food-items">
				<p>Standard - 4</p>
			</div>
		</a>

		<a href="std 5/std 5 e.html">
			<div class="food-items">
				<p>Standard - 5</p>
			</div>
		</a>

		<a href="std 6/std 6 e.html">
			<div class="food-items">
				<p>Standard - 6</p>
			</div>
		</a>

		<a href="std 7/std 7 e.html">
			<div class="food-items">
				<p>Standard - 7</p>
			</div>
		</a>

		<a href="std 8/std 8 e.html">
			<div class="food-items">
				<p>Standard - 8</p>
			</div>
		</a>

		<a href="std 9/std 9 e.html">
			<div class="food-items">
				<p>Standard - 9</p>
			</div>
		</a>

		<a href="std 10/std 10 e.html">
			<div class="food-items">
				<p>Standard - 10</p>
			</div>
		</a>

		<a href="std 11 science/std 11 e.html">
			<div class="food-items">
				<p>Standard - 11</p>
			</div>
		</a>

		<a href="std 12 e.html">
			<div class="food-items">
				<p>Standard - 12</p>
			</div>
		</a>
	</div>

</body>

</html>