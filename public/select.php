<?php

include 'select.php';
include 'connect.php';
include 'select.php';
include 'function.php';
 ?>

<!DOCTYPE html>

    <head>
        <meta charset="UTF-8">
        <title> Connecting to data base </title>
    </head>
    <body>
        <?php

     
      $db = getDatabase();

        $stmt = $db->prepare("SELECT * FROM test");

        if ( $stmt->execute() && $stmt->rowCount() > 0 ) {
             $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
             print_r ($results);

        }
        ?>
    </body>

