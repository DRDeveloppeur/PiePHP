<div class="container">
  <input class="form-control" id="myInput" type="text" placeholder="Search..">

  <table class="table table-striped table-dark">
    <thead>
      <tr>
        <th scope="col">Titre</th>
        <th scope="col">Durée</th>
        <th scope="col">Année</th>
        <th scope="col">Info</th>
      </tr>
    </thead>
    <tbody id="myTable">
      <?php if (!empty($scope)) {
        foreach ($scope as $key => $values) {
          if ($values != $nbr) {
          ?>
          <tr>
            <td>
                <?= $values['titre'] ?>
            </td>
            <td><?= $values['duree_min'] ?> min</td>
            <td><?= $values['annee_prod'] ?></td>
            <td>
              <a href="film?id=<?= $values['id_film'] ?>">&#9432;</a>
            </td>
          </tr>
          <?php
          }
        }
      } ?>
    </tbody>
  </table>
  <div class="row d-flex justify-content-center">
    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <li class="page-item <?= $_GET['page']>0 ? "" : "disabled" ?>">
          <a class="page-link" href="films?page=<?= $_GET['page']-10 ?>">
            Previous
          </a>
        </li>
        <li class="page-item <?= $_GET['page']+10<$nbr ? "" : "disabled" ?>">
          <a class="page-link" href="films?page=<?= $_GET['page']+10 ?>">
            Next
          </a>
        </li>
      </ul>
    </nav>
  </div>
</div>
