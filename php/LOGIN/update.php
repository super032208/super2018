
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
            width: 100px;
            font-size:15px;


          }
          #inp{
            margin:10px;
            width: 300px;
            border-color: green;

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
      //include_once 'function.php';


        $results = '';

        if (isPostRequest()) {
            $db = dbconnect();


            $stmt = $db->prepare("UPDATE main set title = :title, type = :type where user_id = :user_id");

            $user_id = filter_input(INPUT_POST, 'user_id');
              $title = filter_input(INPUT_POST, 'title');
                $type = filter_input(INPUT_POST, 'type');


            $binds = array(
                ":user_id" => $user_id,
                ":title" => $title,
                ":type" => $type


            );


            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $results = 'Project Update';
            }
        }
        ?>


        <h1><?php echo $results; ?></h1>
<div id="center">
        <h1 style="color:green;">Update Project </h1>
        <form method="post" action="#">

           ID <input id="inp" type="text" value="" name="user_id" />
          Title <input id="inp" type="text" value="" name="title" />
            Type <input id="inp" type="text" value="" name="type" />





            <input id="sub" type="submit" value="Update" />

        </form>
</div>
    </body>
</html>
