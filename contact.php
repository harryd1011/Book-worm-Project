<?php
    $message_sent= false;
    if(isset($_POST['email']) && $_POST['email'] != ''){
        
        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){

            // submit the form
            $userName= $_POST['name'];
            $userEmail= $_POST['email'];
            $messageSubject= $_POST['subject'];
            $message= $_POST['message'];

            $to= "hd35065@gmail.com";
            $body= "";

            $body .= "From: ".$userName. "\r\n";
            $body .= "Email: ".$userEmail. "\r\n";
            $body .= "Message: ".$message. "\r\n";

            //mail($to,$messageSubject,$body);
            $message_sent= true;
        }
        else{
            $invalid_class_name= "form-invlid";
        }
    
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<style>
    :root{
    --font-color:#555;
    --font-hover-color:orange;
}
body{
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
    font-family:"Raleway", sans-serif;
    background-color:#627b8a;
}

.container{
    width:500px;
    box-shadow: 0 15px 35px rgba(50,50,93,.1),0 5px 15px rgba(0,0,0,.07);
    padding:2em;
    background-color:#fff;
}
.form-group{
    margin-bottom:1.5em;
    transition:all .3s;
}
.form-label{
    font-size:.75em;
    color:var(--font-color);
    display:block;
    opacity:0;
    transition: all .3s;
    transform:translateX(-50px);
}
.form-control{
    box-shadow:none;
    border-radius:0;
    border-color:#ccc;
    border-style:none none solid none;
    width:100%;
    font-size:1.25em;
    transition:all .6s;
}
.form-control::placeholder{
    color:#aaa;
}
.form-control:focus{
    box-shadow:none;
    border-color:var(--font-hover-color);
    outline:none;
}
.form-group:focus-within{
    transform:scale(1.1,1.1);
}

.form-control:invalid:focus{
    border-color:red;
}
.form-control:valid:focus{
    border-color:green;
}

.btn{
    background: 0 0 #fff;
    border:1px solid #aaa;
    border-radius:3px;
    color:var(--font-color);
    font-size:1em;
    padding:10 50px;
    text-transform:uppercase;
}
.btn:hover{
    border-color:var(--font-hover-color);
    color:var(--font-hover-color);
}
textarea{
    resize:none;
}

.focused > .form-label{
    opacity:1;
    transform:translateX(0px);

}
</style>
<body>

<?php
    if($message_sent):
?>
    <h3>Thanks. We have received your message. Our team will get back to you.</h3>
<?php
    else:
?>
    <div class="container">
        <form action="webform.php" method="POST" class="form">
            <div class="form-group">
                <label for="name" class="form-label">First Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="First Name" tabindex="1" required>
            </div>
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input <?= $invalid_class_name ?? "" ?>type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email" tabindex="2" required>
            </div>
            <div class="form-group">
                <label for="subject" class="form-label">Subject</label>
                <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" tabindex="3" required>
            </div>
            <div class="form-group">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" rows="5" cols="50" id="message" name="message" placeholder="Enter Message..." tabindex="4"></textarea>
            </div>
            <div>
                <button type="submit" class="btn">Send Message!</button>
            </div>
        </form>
    </div>
    <?php
    endif;
    ?>
</body>

</html>