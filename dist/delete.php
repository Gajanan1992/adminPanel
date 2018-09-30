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
    mysqli_select_db($connection,"cms");

    if(!$connection){
        die('could not connect:'.mysqli_error());
    }
    $sql = "delete from products where product_id = $product_id and product_name='$name'";
    $result = mysqli_query($connection, $sql);
    if (!result) {
        echo "Error deleting record: " . mysqli_error($conn);
        
    } else {
        echo "Record deleted successfully";
        header("Location:admin.php");

    }
    
    mysqli_close($connection);
}        

?>