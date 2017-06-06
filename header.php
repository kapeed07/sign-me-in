<nav class="navbar navbar-default" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo "index.php"; ?>">XlOud</a>

    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="navbar">
      <ul class="nav navbar-nav">
        <!-- <li class="active"><a href="#">HOME</a></li> -->
        <!-- <li><a href="#"></a></li> -->

      </ul>


      <ul class="nav navbar-nav navbar-right">
        <form class="navbar-form" method="post">

            <?php
              if($_SERVER["REQUEST_METHOD"] == "POST"){
                $email = mysqli_real_escape_string($db, $_POST["email"]);
                $password = mysqli_real_escape_string($db, $_POST["password"]);

                $tableName = "student";

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

                   redirect("welcome");
                }else {
                   echo '<div class="alert alert-danger">
                            Your Login Name or Password is invalid
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          </div>';

                }
              }
             ?>

            <input class="form-control" type="text" name="email" value="" placeholder="Email" required>
            <input class="form-control" type="password" name="password" value="" placeholder="password" required>
            <button class="btn btn-danger pull-right" type="submit" name="button">Login</button>
          </form>

      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>