<?php
    $connect=mysqli_connect("localhost","root","","store") or die("Connection failed");
    $username=$_POST['username'];
?>

<html>
    <head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <style>
        *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body{
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #4070f4;
}

.container{
        positon:relative;
        width:40%;
        padding:50px;
        margin: 100% auto;
        background:rgba(0,0,0,0.05);
        box-shadow:0px 5px 16px rgba(0,0,0,1);
        padding: 20px;
        margin-left: auto;
        margin-right: auto;
    }
        .container .forms{
    display: flex;
    align-items: center;
    height: 440px;
    width: 200%;
    transition: height 0.2s ease;
}
.container .form{
    width: 100%;
    padding: 30px;
    background-color: #fff;
    transition: margin-left 0.18s ease;
}
        .container.active .login{
    margin-left: -50%;
    opacity: 0;
    transition: margin-left 0.18s ease, opacity 0.15s ease;
}
.container.active .forms{
    height: 600px;
}
.container .form .title{
    position: relative;
    font-size: 27px;
    font-weight: 600;
}
.form .title::before{
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    height: 3px;
    width: 30px;
    background-color: #4070f4;
    border-radius: 50px;
}
.form .input-field{
    position: relative;
    height: 50px;
    width: 100%;
}

.input-field input{
    position: absolute;
    height: 100%;
    width: 100%;
    padding: 0 35px;
    border: none;
    outline: none;
    font-size: 16px;
    border-bottom: 2px solid #ccc;
    border-top: 2px solid transparent;
    transition: all 0.2s ease;
}
.input-field input:is(:focus, :valid){
    border-bottom-color: #4070f4;
}

.input-field i{
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    color: #999;
    font-size: 23px;
    transition: all 0.2s ease;
}

.input-field input:is(:focus, :valid) ~ i{
    color: #4070f4;
}

.input-field i.icon{
    left: 0;
}
 .input-field i.showHidePw{
    right: 0;
    cursor: pointer;
    padding: 10px;
}

.form .checkbox-text{
    display: flex;
    align-items: center;
    justify-content: space-between;
}       
checkbox-text .checkbox-content{
    display: flex;
    align-items: center;
}

.checkbox-content input{
    margin-right: 10px;
    accent-color: #4070f4;
}

.form .text{
    color: #333;
    font-size: 14px;
}

.form a.text{
    color: #4070f4;
    text-decoration: none;
}
.form a:hover{
    text-decoration: underline;
}

.form .button{
    margin-top: 35px;
}

.form .button input{
    border: none;
    color: #fff;
    font-size: 17px;
    font-weight: 500;
    letter-spacing: 1px;
    border-radius: 6px;
    background-color: #4070f4;
    cursor: pointer;
    transition: all 0.3s ease;
}

.button input:hover{
    background-color: #265df2;
}

.form .login-signup{
    text-align: center;
}        
    </style>
</head>

    <body>
    <div class="container">
    <div class="form signup">
       <form action="login.html" method="post">
        <?php
        $query = " select * from users where username='$username'";
        $result = mysqli_query($connect, $query);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
        
        
            <span class="title">Profile</span><br><br>
                <div class="input-field">
                    <input id="uname" type="text" name="username" placeholder="UserName" value="<?php echo $row['username'];?>">
                   
                </div><br>
                <div class="input-field">
                    <input id="em" type="text" name="email" placeholder="Enter your email" value="<?php echo $row['email'];?>">
                   
                </div><br>
                <div class="input-field">
                    <input id="num" type="number" name="mobnum" placeholder="Enter your Mobile number " value="<?php echo $row['mobnum'];?>">
                   </div><br>
                <div class="input-field">
                    <input id="psw" type="text" class="password" name="password1" placeholder="Create a password" value="<?php echo $row['password1'];?>">
                    
                </div><br>
                <div class="input-field">
                    <input id="cpsw" type="text" class="password" name="password2" placeholder="Confirm a password" value="<?php echo $row['password2'];?>">
                    
                </div>
                <br><br>
                <?php
        }
        ?>


    
            </form>
        </div>
    </div>
    </div>
</body>
</html>
        