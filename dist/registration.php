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
	
    <title>Admin LogIn</title>
	<!-- <script>
	function validateForm() {
	var x = document.forms["loginform"]["username"].value;
	var y = document.forms["loginform"]["password"].value;
	
    if (x != "admin" || y != "admin") {
        alert("Enter correct username and Password");
        return false;
    }
	}
	</script> -->

</head>
<style>
body{
	margin: 0 auto;
	background-image: url("./img/img 13.jpg");
	background-repeat: no-repeat;
	background-size: 100% 720px;
}

#form {
	background-color: rgba(44, 62, 80,0.7);
	margin-top: 160px;
	padding: 40px;
}

.title{
	color: white;
	padding: 10px;
}
a{
    text-decoration: none;
    color: white;
    font-size: 1.2em;
}

</style>
<body>
	<main id="main">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-offset-4 col-sm-4 col-sm-offset-4" id="form">
				<h2 class="title">Registration form</h2>
					<form role="form" name="loginform" onsubmit="return validateForm()" action="./register.php" method="POST">
									
						<div class="form-group">
							<label for="username" class="title"> User Name: </label>
								<input type="text" class="form-control " name="username" placeholder="Enter the User Name" autocomplete="off" required/>	
						</div>    
						<div class="form-group">
							<label for="pass " class="title"> Password: </label>
							<input type="password" class="form-control" name="password" placeholder="password" required/>
						</div>
										
							<button type="submit" name="submit" class="btn btn-success btn-md pull-left"><span class="glyphicon glyphicon-log-in"></span> Register</button>
							<a href="./index.php" class="pull-right">Already Registered</a>		
					</form>
					
				</div>
			</div>
		</div>
	</main>
</body>
</html>
