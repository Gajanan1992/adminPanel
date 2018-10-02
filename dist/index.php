
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
	
    <title>Admin Panel Login</title>
	
</head>
<style>
body{
	margin: 0 auto;
	background-image: url("./img/img12.jpeg");
	background-repeat: no-repeat;
	background-size: 100% 720px;
	
}

#form {
	background-color: rgba(44, 62, 80,0.7);
	margin-top: 120px;
	padding: 40px;
}

.title{
	color: white;
	padding: 10px;
}
.main-title{
	color: orange;
	margin-top: 10px;
}

</style>
<body>
	<main id="main">
		<div class="container-fluid text-center main-title">
			<h1>Login To Admin Panel</h1>
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-offset-4 col-sm-4 col-sm-offset-4" id="form">
				<h2 class="title">Login</h2>
					<form role="form" name="loginform"  action="./login.php" method="POST">
									
						<div class="form-group">
							<label for="username" class="title"> User Name: </label>
								<input type="text" class="form-control " name="username" placeholder="Enter the User Name" autocomplete="off" autofocus required/>	
						</div>    
						<div class="form-group">
							<label for="pass " class="title"> Password: </label>
							<input type="password" class="form-control" name="password" placeholder="password" required/>
						</div>
										
							<button type="submit" name="submit" class="btn btn-success btn-md pull-left"><span class="glyphicon glyphicon-log-in"></span> LogIn</button>
							<a href="registration.php" class=" btn btn-primary btn-md pull-right">Register</a>		
					</form>
					
				</div>
			</div>
		</div>
	</main>
</body>
</html>
<!-- Database configuration -->
<?php 
    require './db_config.php';
    
?>