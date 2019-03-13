<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index">
      <?php echo "Bienvenue M. ".$_SESSION['pseudo']; ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse"
    data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent"
    aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">

        <li class="nav-item">
          <a class="nav-link" href="films?page=0">Films</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="membre">Membre</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="gestion">Gestion</a>
        </li>
      </ul>
    </div>
    <form action="dec" method="post">
      <button type="submit" class="btn btn-dark">Deconnexion</button>
    </form>
</nav>
