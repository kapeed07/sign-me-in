<?php
	include("config.php");
	session_start();
	include("functions.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

		<?php include("style.php"); ?>

  </head>
  <body>

		<nav class="navbar navbar-default" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo "index.php"; ?>">LOGO</a>

    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="navbar">
      <ul class="nav navbar-nav">
        <!-- <li class="active"><a href="#">HOME</a></li> -->
        <!-- <li><a href="#"></a></li> -->

      </ul>


      <ul class="nav navbar-nav navbar-right">

      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

		<div class="container" style="background: url('img/fax.jpg')">
			<div class="col-md-4 col-md-offset-4">

				<div class="panel panel-primary">
					<div class="panel-heading">
						<h4>LOGIN</h4>
					</div>
					<div class="panel-body">
						<form class="form-group" method="post">



							<?php
								if($_SERVER["REQUEST_METHOD"] == "POST"){
									$email = mysqli_real_escape_string($db, $_POST["email"]);
								  $password = mysqli_real_escape_string($db, $_POST["password"]);

									$tableName = "user";

									$query =  "SELECT id ";
								  $query .= "FROM ".$tableName." ";
								  $query .= "WHERE ";
								  $query .= "email = '$email' and password = '$password'";

								  $result = mysqli_query($db, $query);
								  $row = mysqli_fetch_assoc($result);

									$count = mysqli_num_rows($result);
									// If result matched $myusername and $mypassword, table row must be 1 row

						      if($count == 1) {
						         $_SESSION['login_email'] = $email;
						         $_SESSION['id'] = $row['id'];

						         redirect("welcome");
						      }else {
						         echo '<div class="alert alert-danger">
										 					Your Login Name or Password is invalid
															<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
														</div>';

						      }
								}
							 ?>



							<label for="email">Email</label><input class="form-control" type="text" name="email" value="" placeholder="Email" required><br>
							<label for="password">Password</label><input class="form-control" type="password" name="password" value="" placeholder="password" required><br>
							<button class="btn btn-danger pull-right" type="submit" name="button">Login</button>
						</form>
					</div>
				</div>
			</div>
		</div>

		<?php include('footer.php') ?>
  </body>
</html>
