<?php include 'header.php' ?>
<div class="container">
  <div class="row d-flex justify-content-center">
    <h1>Bienvenue sur My Cinéma PiePHP</h1>
  </div>
</div>
<?= !empty($scope['succes']) ? $scope['succes'] : ""; ?>
<?= !empty($scope['error']) ? $scope['error'] : ""; ?>
