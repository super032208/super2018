
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
            background-color:red;
            size:25px;

            text-align: center;
            color:white;
            width: 100px;
            font-size:15px;


          }
          #inp{
            margin:10px;
            width: 100px;
            border-color: red;

          }
        </style>
    </head>
    <body>
      <?php

      include_once './conn.php';

      $db = dbconnect();

      $stmt = $db->prepare("SELECT * FROM main");

      $results = array();
      if ($stmt->execute() && $stmt->rowCount() > 0) {
          $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
      }
      ?>

      <table style="width:100%; border:1px solid black;">
          <thead>
              <tr>
                  <th style="border:1px solid black;">  ID</th>
                  <th style="border:1px solid black;"> Project Title </th>
                  <th style="border:1px solid black;" > Project Type </th>
                  <th style="border:1px solid black;" > Created </th>


              </tr>
          </thead>
          <tbody>
          <?php

          ?>

          <?php foreach ($results as $row): ?>
              <tr>
                  <td style="border:1px solid black;"><?php echo $row['user_id'];?> </td>
                  <td style="border:1px solid black;"><?php echo $row['title']; ?></td>
                  <td style="border:1px solid black;"><?php echo $row['type']; ?></td>
                  <td style="border:1px solid black;"><?php echo $row['created']; ?></td>


              </tr>
          <?php endforeach; ?>
          </tbody>
      </table>


        <?php

      include_once 'header.php';



        $results = '';

        if (isPostRequest()) {
            $db = dbconnect();


            $stmt = $db->prepare("DELETE FROM main where user_id = :user_id");

            $user_id = filter_input(INPUT_POST, 'user_id');


            $binds = array(
                ":user_id" => $user_id


            );


            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $results = 'Project Delete';
            }
        }
        ?>


        <h1><?php echo $results; ?></h1>
<div id="center">
        <h1 style="color:red;">Delete Project </h1>
        <form method="post" action="#">
          Enter ID <input id="inp" type="text" value="" name="user_id" /> To Delete Project

            <input id="sub" type="submit" value="Delete" />

        </form>
</div>
    </body>
</html>
