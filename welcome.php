<?php
  include('session.php');
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Welcome</title>

    <?php include 'style.php'; ?>
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
        <a href="logout.php" class="btn btn-danger pull-right" style="margin-top:7px;">LogOut</a>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

    <div class="container">
      <div class="row">
        <div class="well">
          <h2 class="text text-info text-center">Successful Login!</h2>
          <h4 class="text text-info text-center">Welcome To The Home Page</h4>
        </div>
      </div>
      <div class="row">

      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="panel panel-primary">
            <div class="panel-heading">
              User Information
            </div>
            <div class="panel-body">
              <?php
                  $tableName = "user";

                      $id = $_SESSION['id'];

                  $query =  "SELECT * ";
                  $query .= "FROM ".$tableName." ";
                  $query .= "WHERE ";
                  $query .= "id = '$id'";

                  $result = mysqli_query($db, $query);
                  $row = mysqli_fetch_assoc($result);




              ?>
              Email Address - 
              <?php echo $row['email']; ?>
              <hr>
            </div>
          </div>
        </div>
      </div>
    </div>


    <?php include("footer.php"); ?>
  </body>
</html>
