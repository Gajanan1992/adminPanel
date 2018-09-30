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
}else 

if(isset($_POST['submit'])){ // Fetching variables of the form which travels in URL
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
    $sql = "update products set product_name = '$name', 
    category='$category', 
    sub_category='$sub_category', 
    product_desc='$product_desc', 
    price=$price where product_id=$product_id";
    $result = mysqli_query($connection, $sql);
    if (!result) {
        echo "Error deleting record: " . mysqli_error($conn);
        
    } else {
        echo "Record Updated successfully";
        header("Location:admin.php");

    }
    
    mysqli_close($connection);
}        

?>