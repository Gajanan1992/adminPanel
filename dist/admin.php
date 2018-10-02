<?php
session_start();
if(!isset($_SESSION['username'])){
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel Home</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">


    <!-- custom stylesheet -->
    <link rel="stylesheet" href="./css/style.css">
    <style>
    body{
        font-family: 'PT Sans', sans-serif;
        
    }
    li{
        font-size: 1.2em;
    }
    .navbar-brand{
        font-size: 1.5em;
    }
    </style>
<script>
    function showUser(str) {
        if (str == "") {
            document.getElementById("txtHint").innerHTML = "";
            return;
        } else { 
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("txtHint").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","getProduct.php?q="+str,true);
            xmlhttp.send();
        }
    }
</script>
</head>

<body>
    <!--top navigation bar-->
    <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">MyWebSite</a>
            </div>
            <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">Products</a></li>
                <li><a href="#">Categories</a></li>
                <li><a href="#">Services</a></li>

            </ul>
            
            <ul class="nav navbar-nav navbar-right">
                <li>
                   <a href="#" class="disabled"> Welcome <?php echo $_SESSION['username'];?></a>
                </li>
                <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Log-Out</a></li>

            </ul> 
            </div> 
        </div> 
    </nav> 
    <header id="header">
        <div class="container-fluid " id="dashboard">
            <h1 class=""><span class="glyphicon glyphicon-cog"></span> Dashboard <small class="text-danger">Manage Your Site</small> </h1>
                                      
        </div>
        <div class="container">
            <div class="row" id="buttons">
                <div class="col-sm-4 ">
                    <button class="btn btn-success btn-block btn-lg" id="myBtn" ><span class="glyphicon glyphicon-plus"></span> Add Product</button>

                </div>
                <div class="col-sm-4">
             <button class="btn btn-danger btn-block btn-lg" id="myBtn1" ><span class="glyphicon glyphicon-trash"></span> Delete Product</button>
             </div>
             <div class="col-sm-4">
             <button class="btn btn-primary btn-block btn-lg" id="myBtn2" ><span class="glyphicon glyphicon-refresh"></span> Update Product</button>
             </div> 
            </div>
        </div>            
    </header>
    <main id="main">
        <div class="container">
            <form action="">
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="sel1">Category:</label>
                            <select class="form-control" name="category" id="sel1" onchange="showUser(this.value)">
                            <option val="select">All</option>   
                            <option >Electronics</option>
                                <option>Clothes</option>
                                <option >Toys</option>
                                <option >Furniture</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label for="sel1">Sub Category:</label>
                            <select class="form-control" name="sub_category" id="sel1" onchange="">
                            <option >Select Category</option>   
                            <option selected>Mobile</option>
                            <option >Home Appliances</option>
                            <option >Pc and laptops</option>
                            <option >Others</option>
                            </select>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- <div class="container" id="txtHint">
        </div> -->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <!-- Latest Users -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Product List</h3>
                        </div>
                        <div class="panel-body" id="txtHint">
                            <table class="table table-stripped table-hover">
                                <tr class="success">
                                    <th>PRODUCT ID</th>
                                    <th>PRODUCT NAME</th>
                                    <th>CATEGORY</th>
                                    <th>SUB CATEGORY</th>
                                    <th>PRICE</th>
                                </tr>
                                <?php
                                $conn = mysqli_connect("localhost","root", "", "cms"); 
                                if($conn->connect_error){
                                    die("connection failed: ".connect_error);
                                }
                                
                                $sql = "select product_id, product_name, category,sub_category,price from products";
                                $result = $conn->query($sql);

                                if($result-> num_rows > 0){
                                    while($row = $result->fetch_assoc()){
                                        echo "<tr><td>".$row["product_id"]. "</td><td>".$row["product_name"]."</td><td>".$row["category"]."</td><td>".$row["sub_category"]."</td><td>".$row["price"]."</td></tr>";
                                    }
                                    echo "</table>";
                                }else {
                                    echo "0 result";
                                }
                                $conn-> close();
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 text-center">
                    <div class="well dash-box">
                        <h2 ><span class="glyphicon glyphicon-stats" aria-hidden="true"></span>
                        Total<?php
                        $conn = mysqli_connect("localhost","root", "", "cms"); 
                        if($conn->connect_error){
                            die("connection failed: ".connect_error);
                        } 
                        
                        $sql = "SELECT COUNT(*) as total FROM products";
                         $result = $conn->query($sql);
                        //  $result_count = mysqli_num_rows($result);
                         $info = $result->fetch_assoc();


                         echo "</br>".$info['total'];
                         $conn->close();
                       ?>
                    
                        </h2>
                        <h4>Products</h4>
                    </div>
                    <div class="well dash-box1">
                        <h2><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> 20</h2>
                        <h4>Categories</h4>
                    </div>
                    <div class="well dash-box2">
                            <h2><span class="glyphicon glyphicon-user" aria-hidden="true"></span> 203</h2>
                            <h4>Visitors</h4>
                    </div>
                </div>
            </div>
        </div>
        <!--add products-->
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header" style="padding:35px 50px;">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4><span class="glyphicon glyphicon-lock"></span> Add Product</h4>
                    </div>
                    <div class="modal-body" style="padding:40px 50px;">
                        <form role="form" name="addform" onsubmit="return formValidate()" action="./add.php" method="POST">
                        
                            <!-- <div class="form-group">
                                    <label for="prid"> Product ID: </label>
                                    <input type="number" class="form-control" name="product_id" id="prid" placeholder="Product ID" autocomplete="off" required>
                                </div>     -->
                        <div class="form-group">
                                <label for="prname"> Product Name: </label>
                                <input type="text" class="form-control" name="product_name" id="prname" placeholder="Product Name" required>
                            </div>
                            <div class="form-group">
                                <label for="sel1">Category:</label>
                                <select class="form-control" name="category" id="sel1">
                                    <option selected>Electronics</option>
                                    <option>Clothes</option>
                                    <option >Toys</option>
                                    <option >Furniture</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sel1">Sub Category:</label>
                                <select class="form-control" name="sub_category" id="sel1">
                                    <option selected>Mobile</option>
                                    <option >Home Appliances</option>
                                    <option >Pc and laptops</option>
                                    <option >Others</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="desc">Product Description:</label>
                                <textarea class="form-control" name="product_desc" rows="3" id="desc"></textarea>
                            </div>
                            <div class="form-group">
                                    <label for="price"> Product price: </label>
                                    <input type="number" class="form-control" name="price" id="price" placeholder="Product Price" autocomplete="off" required>
                                </div>

                            <button type="submit" name="submit" class="btn btn-success btn-block"> ADD</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span
                                class="glyphicon glyphicon-remove"></span> Cancel</button>

                    </div>
                </div>

            </div>
        </div>

        <!-- modal for delete -->

        <div class="modal fade" id="myModal1" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header" style="padding:35px 50px;">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4><span class="glyphicon glyphicon-trash"></span> Delete Product</h4>
                    </div>
                    <div class="modal-body" style="padding:40px 50px;">
                        <form role="form" action="./delete.php" method="POST">
                        
                            <div class="form-group">
                                    <label for="prid"> Product ID: </label>
                                    <input type="number" class="form-control" name="product_id" id="prid" placeholder="Product ID" autocomplete="off" required>
                                </div>    
                        <div class="form-group">
                                <label for="prname"> Product Name: </label>
                                <input type="text" class="form-control" name="product_name" id="prname" placeholder="Product Name" required>
                            </div>
                            
                            <button type="submit" name="submit" class="btn btn-danger btn-block"> Submit</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span
                                class="glyphicon glyphicon-remove"></span> Cancel</button>

                    </div>
                </div>

            </div>
        </div>

        <!-- modal for update -->
        <div class="modal fade" id="myModal2" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header" style="padding:35px 50px;">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4><span class="glyphicon glyphicon-refresh"></span> Update Product</h4>
                    </div>
                    <div class="modal-body" style="padding:40px 50px;">
                        <form role="form" action="./update.php" method="POST">
                        
                            <div class="form-group">
                                    <label for="prid"> Product ID: </label>
                                    <input type="number" class="form-control" name="product_id" id="prid" placeholder="Product ID" autocomplete="off" required>
                                </div>    
                        <div class="form-group">
                                <label for="prname"> Product Name: </label>
                                <input type="text" class="form-control" name="product_name" id="prname" placeholder="Product Name" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="sel1">Category:</label>
                                <select class="form-control" name="category" id="sel1">
                                    <option selected>Electronics</option>
                                    <option>Clothes</option>
                                    <option >Toys</option>
                                    <option >Furniture</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sel1">Sub Category:</label>
                                <select class="form-control" name="sub_category" id="sel1">
                                    <option selected>Mobile</option>
                                    <option >Home Appliances</option>
                                    <option >Pc and laptops</option>
                                    <option >Others</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="desc">Product Description:</label>
                                <textarea class="form-control" name="product_desc" rows="3" id="desc"></textarea>
                            </div>
                            <div class="form-group">
                                    <label for="price"> Product price: </label>
                                    <input type="number" class="form-control" name="price" id="price" placeholder="Product Price" autocomplete="off" required>
                                </div>
                            
                            <button type="submit" name="submit" class="btn btn-primary btn-block"> Update</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span
                                class="glyphicon glyphicon-remove"></span> Cancel</button>

                    </div>
                </div>

            </div>
        </div>
        
    </div>

        <script>
            $(document).ready(function () {
                $("#myBtn").click(function () {
                    $("#myModal").modal();
                });
                $("#myBtn1").click(function () {
                    $("#myModal1").modal();
                });
                $("#myBtn2").click(function () {
                    $("#myModal2").modal();
                });
            });
        </script>

    </main>
    <footer id="footer">
        <p>&copy; Copyright 2018</p>
    </footer>
</body>

</html>

