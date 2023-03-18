<?php

$username = $_POST['username'];
$email  = $_POST['email'];
$mobnum = $_POST['mobnum'];
$password1 = $_POST['password1'];
$password2 = $_POST['password2'];




if (!empty($username) || !empty($email) || !empty($mobnum) || !empty($password1) || !empty($password2) )
{

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "store";



// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
  $SELECT = "SELECT email From users Where email = ? Limit 1";
  $INSERT = "INSERT Into users (username , email ,mobnum, password1, password2)values(?,?,?,?,?)";

//Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $password2);
     $stmt->execute();
     $stmt->bind_result($password2);
     $stmt->store_result();
     $rnum = $stmt->num_rows;

     //checking username
      if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("sssss", $username,$email,$mobnum,$password1,$password2);
      $stmt->execute();
      echo '<script type="text/javascript"> window.onload = function () { alert("YOUR DATA HAS BEEN STORED "); } </script>';
      header("refresh:1;url=/guvi/login.html");
     } else {
      echo "Someone already register using this email";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All fields are required";
 die();
}
?>