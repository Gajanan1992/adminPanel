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
} else{
    echo "Connection successfull";
}  
if(isset($_POST['submit'])){
    
    $uname=$_POST['username'];
    $password=$_POST['password'];
    
    $sql="select * from loginform where username='$uname' AND password='$password'";
    
    $result=mysqli_query($conn,$sql) ;
    // if(!$result){
    //     echo "error";
    // }else{
    //     echo "success";
    // }
    $count = mysqli_num_rows($result);

    if($count==1){
        echo " Duplicate data";
        
    }
    else{
        $q = "insert into loginform(username,password) values ('$uname','$password')";
        mysqli_query($conn,$q);
        echo "success";
        header("location:index.php");
        
    }
}

?>
