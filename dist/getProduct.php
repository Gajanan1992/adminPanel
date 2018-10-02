<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel</title>
 
</head>
<body>

<?php
// $q = intval($_GET['q']);
$q = $_REQUEST["q"];
    echo '<table class="table table-stripped table-hover">
     <tr class="success">
                                    <th>PRODUCT ID</th>
                                    <th>PRODUCT NAME</th>
                                    <th>CATEGORY</th>
                                    <th>SUB CATEGORY</th>
                                    <th>PRICE</th>
                                </tr>';
                                
                                $conn = mysqli_connect("localhost","root", "", "cms"); 
                                if($conn->connect_error){
                                    die("connection failed: ".connect_error);
                                }
                                if($q == 'All'){
                                    $sql = "select * from products limit 0,10";
                                $result = $conn->query($sql);
                                // if(!$result){
                                //     echo "error";
                                // }else{
                                //     echo "success";
                                // }
                                if($result-> num_rows > 0){
                                    while($row = $result->fetch_assoc()){
                                        echo "<tr><td>".$row["product_id"]. "</td><td>".$row["product_name"]."</td><td>".$row["category"]."</td><td>".$row["sub_category"]."</td><td>".$row["price"]."</td></tr>";
                                    }
                                    echo "</table>";
                                    
                                }    
                                }else{
                                    $sql = "select * from products where category='$q'";
                                $result = $conn->query($sql);
                                // if(!$result){
                                //     echo "error";
                                // }else{
                                //     echo "success";
                                // }
                                if($result-> num_rows > 0){
                                    while($row = $result->fetch_assoc()){
                                        echo "<tr><td>".$row["product_id"]. "</td><td>".$row["product_name"]."</td><td>".$row["category"]."</td><td>".$row["sub_category"]."</td><td>".$row["price"]."</td></tr>";
                                    }
                                    echo "</table>";
                                }else {
                                    echo "<h2>Result Not found</h2>";
                                }    
                                }
                                
                                
        echo "</table>";
mysqli_close($conn);
?>
</body>
</html>
