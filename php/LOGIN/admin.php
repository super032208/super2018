<html>
    <head>
         <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Final Project</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <!-- call the main css file that has all the style -->
        <link rel="stylesheet" href="css/main.css">

        <style>
            #fileDiv, #dltButton, #detailsButton, #tweet {
                position: relative;
                left: 300px;
            }

        </style>
    </head>
    <body>

        <?php
        //call autoload class to load all classes for the page
    //    require_once './models/autoload.php';
        session_start();
        //$login = new login();


        if($_SESSION['logged-in'] != true){
            header("Location: index.php");
            die();
        }
        else{
            $SuccessMessage = "Welcome to the Admin Page!";

        }

        ?>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Project</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="iindex.php">Home<span class="sr-only">(current)</span></a></li>
        <li><a href="sign-in.php">Sign-in<span class="sr-only">(current)</span></a></li>
        <li><a href="signup.php">Sign-up<span class="sr-only">(current)</span></a></li>
        <!-- if the login session is set and equals to true then display the link for the administrator -->
        <?php if(isset($_SESSION["logged-in"]) && $_SESSION["logged-in"] == true): ?>
        <li class="active"><a href="admin.php">Administrator<span class="sr-only">(current)</span></a></li>

        <li role="presentation" id="logoutBtn"><a href="logout.php">Logout</a></li>
        <?php endif; ?>
        <li><span class="sr-only">(current)</span></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
        <br />
        <br />

        <h1 class="page-header">Administrator Page</h1>

        <!-- <input id="logoutBtn" class="btn btn-primary" type="submit" value="logout" name="logout" OnClick="logout.php"/> -->

        <ul class="nav nav-pills">
            <li role="presentation" id="logoutBtn"><a href="logout.php">Logout</a></li>
        </ul>

        <a href="view.php">View Project</a>&nbsp;&nbsp;&nbsp;
        <a style="margin:2%;" href="iindex.php">Add Project</a>
        <a style="margin:2%;" href="delete.php">Delete Project</a>
        <a style="margin:2%;" href="update.php">Update Project</a>
        <!--<link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/darkly/bootstrap.min.css">-->

        <?php

        include('./SuccessMessage.html.php');
        include('./ErrorMessage.html.php');




                   ?>

        <br/>



    </body>
</html>
