<div class="container">
  <h1 style="text-align: center;">Bonjour Mr. <?= $_SESSION['pseudo'] ?></h1>
</div>
<div class="container">
  <form class="form-inline" action="update" method="POST">

    <div class="row offset-lg-2">
      <div class="center-block">
        <label for="pseudo">Changer de Username</label>
        <div class="input-group mb-2 mr-sm-2">
          <div class="input-group-prepend">
            <div class="input-group-text">@</div>
          </div>
          <input type="text" class="form-control"
          id="pseudo" name="pseudo" placeholder="Nv. Username">
        </div>
      </div>
    </div>

    <div class="row offset-lg-2">
      <div class="center-block">
        <label for="password">Changer de Password</label>
        <input type="password" class="form-control mb-2 mr-sm-2"
        id="password" name="pass" placeholder="Nv. Password">
        <button type="submit" class="btn btn-primary mb-2">Changer</button>
      </div>
    </div>

    <div class="row offset-sm-1">
      <div class="center-block">
      </div>
    </div>
  </form>
</div>

<div class="container col-lg-4 offset-lg-5">
  <form action="delete" method="post">
    <button class="btn btn-primary" type="submit" name="button">
      Supprimer mon compte !
    </button>
  </form>
</div>
