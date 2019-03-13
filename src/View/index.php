<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="../webroot/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../webroot/js/search.js"></script>
    <meta charset="utf-8">
    <title>Pie PHP</title>
  </head>
  <body>
    <?php !empty($_SESSION['id']) ? include 'User/header.php' : '';?>

    <?= $view ?>

    <div class="row d-flex justify-content-center">
      <?php
      if (!empty($scope['error'])) {
        ?>
        <div class="alert alert-danger" role="alert">
          <?= $scope['error'] ?>
        </div>
        <?php
      } elseif (!empty($scope['succes'])) {
        ?>
        <div class="alert alert-success" role="alert">
          <?= $scope['succes'] ?>
        </div>
        <?php
      }
       ?>
    </div>
  </body>
</html>
