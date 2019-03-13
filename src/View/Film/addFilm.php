<?php
$genre = new \Model\UserModel;
$genres = $genre->find('genre');
?>
<div class="container col-lg-4">
  <div class="row justify-content-center">
    <h1>Ajouté un film.</h1>
  </div>
  <form action="gestion" method="POST">
    <div class="form-group row justify-content-center">
      <label for="titre">Titre</label>
      <input type="text" name="titre" class="form-control" id="titre" required>
    </div>
    <div class="form-group row justify-content-center">
      <label for="genre">Genre</label>
      <select class="form-control" id="genre" name="id_genre" required>
        <option value="">Selectioner genre</option>
          <?php foreach ($genres as $key => $value) {
          ?>
          <option value="<?= $value[0] ?>"><?= $value[1] ?></option>
          <?php
          } ?>
      </select>
    </div>
    <div class="form-group row justify-content-center">
      <label for="resum">Résumer</label>
      <textarea class="form-control" name="resum" id="resum" rows="3" required></textarea>
    </div>
    <div class="row d-flex justify-content-center">
      <label for="start">Debut d'affichage</label>
      <input class="form-control" type="date" id="start"
      name="date_debut_affiche" required>
    </div>

    <div class="row d-flex justify-content-center">
      <label for="end">Fin d'affichage</label>
      <input class="form-control" type="date" id="end"
      name="date_fin_affiche" required>
    </div>

    <div class="row d-flex justify-content-center">
      <label for="duree">Durée</label>
      <input class="form-control" type="number" id="duree"
      name="duree_min" placeholder="Nv. Durée film en min" required>
    </div>

    <div class="row d-flex justify-content-center">
      <label for="annee">Année</label>
      <input class="form-control" type="number" id="annee"
      name="annee_prod" placeholder="Nv. Année de production" required>
    </div>
    <div class="row d-flex justify-content-center">
      <button class="btn btn-sm btn-dark" type="submit">Ajouter</button>
    </div>
  </form>
</div>
