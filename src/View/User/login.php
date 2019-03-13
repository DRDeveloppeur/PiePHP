<link rel="stylesheet" href="../webroot/css/style_co.css">

<div class="container">
  <div class="col-sm-4 offset-sm-4">
    <img src="http://accion.com.ph/wp-content/uploads/2018/03/MYCINEMAEUROPE_LOGO.png" alt="Logo my cinema">
    <form action="login" method="POST">
      <div class="form-group">
        <label for="pseudo">Pseudo</label>
        <input type="text" class="form-control" name="pseudo" id="pseudo"
        placeholder="Entrer un pseudo">
      </div>
      <div class="form-group">
        <label for="pass">Mot de passe</label>
        <input type="password" class="form-control" name="pass" id="pass"
        placeholder="Entrer un mot de passe">
        <small class="form-text text-muted">
          <a href="register">Vous inscrire.</a>
        </small>
      </div>
      <button type="submit" class="btn btn-primary">Connexion</button>
    </form>
  </div>
</div>
