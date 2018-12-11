<link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/darkly/bootstrap.min.css">
<h1>View Project<h1>
  <!DOCTYPE html>
  <html>
      <head>
          <meta charset="UTF-8">
          <title></title>
      </head>
      <body>

          <?php

          include './conn.php';

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
                      <th style="border:1px solid black;">  ID </th>
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
<p> <a href="index.php"> Back Home </a></p>



      </body>
  </html>

    
