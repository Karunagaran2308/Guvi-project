<?php
$connect=mysqli_connect("localhost","root","","store") or die("Connection Failed");

$username=$_POST['username'];
$password2=$_POST['password'];
$query="select * from users where username='$username' and password2='$password2'";
$result=mysqli_query($connect,$query);
$count=mysqli_num_rows($result);
if($count>0)
{
header("refresh:1;url=/guvi/index.html");
}
else{
echo '<script type="text/javascript"> window.onload = function () { alert("Please Enter valid User name or Password"); } </script>';
header("refresh:1;url=/guvi/login.html");
}
?>