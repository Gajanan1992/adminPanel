
<!-- database connection -->
<?php
$servername = "localhost";
$username = "root";
$password = "";


// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}else 
// check databse exist

$db=mysqli_select_db($conn,"cms");
if(empty($db)){
    // echo "database not found";
    // database create
    $dbcr = "create database cms";
    $check = mysqli_query($conn,$dbcr);
    if(!check){
        echo "database create error";
    }else {
        echo " database ok";
    }
}else {
    // echo "database exists";
}

// create products table
$table = "select * from products";
$checktable = mysqli_query($conn, $table);
if(!$checktable){
    echo "table not exists";
    $create2 = "CREATE TABLE products (
        product_id INT(6)  AUTO_INCREMENT PRIMARY KEY,
        product_name varchar(255) NOT NULL,
                category varchar(255) NOT NULL,
                sub_category varchar(255) NOT NULL,
                product_desc varchar(255) NOT NULL,
                price int(100) NOT NULL
        )";
    $ok = mysqli_query($conn, $create2);
    if(!$ok){
        echo "table create error";
    }else {
        echo "table successfully created";
    }
}

//create loginform table
$table1 = "select * from loginform";
$result = mysqli_query($conn,$table1);
if(!$result){
    echo "table not exists";
    $sql = "CREATE TABLE loginform (
        id INT(6)  AUTO_INCREMENT PRIMARY KEY,
        username varchar(255) NOT NULL,
        password varchar(255) NOT NULL
        );"; 
    $check = mysqli_query($conn,$sql);
    if(!$check){
        echo "table create error";

    }else{
        echo "table successfully created";
    }
}else{
    // echo "table exists";
}
$conn->close();
?>



