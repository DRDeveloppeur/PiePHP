<div class="container">
  <div class="col-sm-4 offset-sm-4">
    <form class="form-horizontal" action='register' method="POST">
      <fieldset>
        <legend>Register</legend>
        <div class="control-group">
          <label class="control-label"  for="pseudo">Pseudo</label>
          <div class="controls">
            <input type="text" id="pseudo" name="pseudo" class="input-xlarge" required>
          </div>
        </div>

        <div class="control-group">
          <!-- Password-->
          <label class="control-label" for="pass">Password</label>
          <div class="controls">
            <input type="password" id="pass" name="pass" placeholder="" class="input-xlarge" required>
            <p class="help-block">Choisisez bien votre mot de passe !</p>
          </div>
        </div>

        <div class="control-group">
          <div class="controls">
            <button class="btn btn-success">Register</button>
          </div>
        </div>
      </fieldset>
    </form>
  </div>
</div>
