
<?php
include_once 'function.php';
include_once 'conn.php';


 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>

        #center{
          text-align: center;
        }
        #sub{
          background-color:green;
          size:25px;

          text-align: center;
          color:white;
          width: 150px;
          font-size:15px;


        }
        #inp{
          margin:10px;
          width: 300px;
          border-color:blue;

        }
        </style>
    </head>
    <body>



        <?php

      include_once 'header.php';
      //include_once 'function.php';


        $results = '';

        if (isPostRequest()) {
            $db = dbconnect();


            $stmt = $db->prepare("INSERT INTO main SET  title = :title,  type = :type, created = now()");

            $title = filter_input(INPUT_POST, 'title');
            $type = filter_input(INPUT_POST, 'type');


            $binds = array(
                ":title" => $title,
                ":type" => $type

            );


            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $results = 'Data Added';
            }
        }
        ?>


        <h1><?php echo $results; ?></h1>
<div id="center">
        <h1>Time Card Project </h1>
        <form method="post" action="#">
            Project Title <input id="inp" type="text" value="" name="title" />
            <br />
            Project Type <input id="inp" type="text" value="" name="type" />
            <br />
            <input id="sub" style="background-color:blue;" type="submit" value="Submit" />

        </form>
      </div>


    </body>
</html>
