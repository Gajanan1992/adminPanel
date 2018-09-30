<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";


// Create connection
$connection = mysqli_connect($servername, $username, $password);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
} 


if(isset($_POST['submit'])){ // Fetching variables of the form
$product_id = $_POST['product_id'];
$name = $_POST['product_name'];
$category = $_POST['category'];
$sub_category = $_POST['sub_category'];
$product_desc = $_POST['product_desc'];
$price = $_POST['price'];

mysqli_select_db($connection,"cms");

if(!$connection){
    die('could not connect:'.mysqli_error());
}

$sql = "insert into products(product_id, product_name, category, sub_category, product_desc, price) values ('$product_id', '$name', '$category', '$sub_category','$product_desc','$price')";

$result= mysqli_query($connection, $sql);
if(!$result){
    echo "error".mysqli_error($connection);
}else {
    echo "data inserted successfully! ";
    header("Location:http:admin.php");

}

}
mysqli_close($connection); // Closing Connection with Server
?>