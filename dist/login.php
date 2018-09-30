<?php 
session_start();

$host="localhost";
$user="root";
$password="";
$db="cms";

$conn = mysqli_connect($host,$user,$password,$db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} 

if(isset($_POST['submit'])){
    
    $uname=$_POST['username'];
    $password=$_POST['password'];
    
    $sql="select * from loginform where username='$uname' AND password='$password'";
    
    $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
    $count = mysqli_num_rows($result);

    if($count==1){
        echo " You Have Successfully Logged in";
        $_SESSION['username'] = $uname;
        header("Location:admin.php");

    }
    else{
        echo " You Have Entered Incorrect Password";
        header("location:index.php");
    }
        
}

?>