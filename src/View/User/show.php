<link rel="stylesheet" href="../webroot/css/film.css">
<script src="../webroot/js/film.js"></script>
<?php include 'header.php' ?>
<?php if (!empty($scope)) {
?>
<div class="container">
  <div class="row d-flex justify-content-center">
    <h1><?= $titre ?></h1>
  </div>
     <hr>
     <div class="row d-flex justify-content-center">
       <h3>Resumée</h3>
     </div>
     <div class="row d-flex justify-content-center">
       <p><?= $resum ?></p>
     </div>
     <div class="row d-flex justify-content-center">
       <p>
         <strong>Genre : </strong><?= !empty($nom) ? $nom : '';?>
       </p>
       <p><strong>Du : </strong><?= $date_debut_affiche ?></p>
       <p><strong>Au : </strong><?= $date_fin_affiche ?></p>
       <p><strong>Durée : </strong><?= $duree_min ?> min</p>
       <p><strong>Année de production : </strong><?= $annee_prod ?></p>
     </div>
     <div class="row d-flex justify-content-center">
       <form action="deleteFilm" method="post">
         <button class="btn btn-sm btn-dark sup" type="submit" name="id_sup"
         value="<?= $id_film ?>">
         Supprimer film
        </button>

       </form>
       <button class="btn btn-sm btn-dark update" type="submit">
       Modifier film
     </button>
     </div>
</div>

<div class=" form_update container hidden">
  <div class="row d-flex justify-content-center">
    <form class="form-group"
    action="update?id=<?= $_GET['id'] ?>" method="post">
      <div class="row d-flex justify-content-center">
        <label for="titre">Titre</label>
        <input class="form-control" type="text" id="titre"
        name="titre" placeholder="Nv. Titre">
      </div>

      <div class="row d-flex justify-content-center">
        <label for="resum">Resumée</label>
        <textarea class="form-control" name="resum" id="resum"
        rows="4" cols="40" placeholder="Nv. Resumée"></textarea>
      </div>

      <div class="row d-flex justify-content-center">
        <label for="genre">Genre</label>
        <?php $genre = new \Model\UserModel;
        $genres = $genre->find('genre');?>
        <select class="form-control" id="genre" name="genre">
          <option value="">Selectioner genre</option>
            <?php foreach ($genres as $key => $value) {
            ?>
            <option value="<?= $value[0] ?>"><?= $value[1] ?></option>
            <?php
            } ?>
        </select>
      </div>

      <div class="row d-flex justify-content-center">
        <label for="start">Debut d'affichage</label>
        <input class="form-control" type="date" id="start" name="start">
      </div>

      <div class="row d-flex justify-content-center">
        <label for="end">Fin d'affichage</label>
        <input class="form-control" type="date" id="end" name="end">
      </div>

      <div class="row d-flex justify-content-center">
        <label for="duree">Durée</label>
        <input class="form-control" type="number" id="duree"
        name="duree" placeholder="Nv. Durée film en min">
      </div>

      <div class="row d-flex justify-content-center">
        <label for="annee">Année</label>
        <input class="form-control" type="number" id="annee"
        name="annee" placeholder="Nv. Année de production">
      </div>
      <div class="row d-flex justify-content-center">
        <button class="btn btn-sm btn-dark" type="submit">Modifier</button>
      </div>
    </form>
  </div>
</div>
<?php
} ?>
