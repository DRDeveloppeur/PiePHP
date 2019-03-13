<?php
namespace Controller;

use \Core\Controller;

class FilmController extends Controller
{
  public function indexAction()
  {
    session_start();
    if (!empty($_SESSION['id'])) {
      $this->render('index');
    } else {
      header('Location: login');
    }
  }

  public function addAction()
  {
    session_start();
    if (!empty($_SESSION['id'])) {
      $error = "";
      $succes = "";
      $this->render('addFilm');
      $params = $this->request->getQueryParams();
      if (!empty($params)) {
        $mod = new \Model\FilmModel;
        $id = $mod->idAddFilm();
        $params['id_film'] = $id;
        if ($mod->freeTitre('film', $params['titre'])) {
          $mod->create('film', $params);
          $succes = "Film ajouté avec succes !";
          $this->render('index', ['succes' => $succes]);
        } else {
          $error = "Ce film à déjà était ajouté!";
          $this->render('index', ['error' => $error]);

        }
      }
    } else {
      header('Location: login');
    }
  }

  public function decAction()
  {
    session_start();
    if (!empty($_SESSION['id'])) {
      session_destroy();
      header('Location: login');
    } else {
      header('Location: login');
    }
  }

  public function updateAction()
  {
    $error = "";
    $succes = "";
    session_start();
    $params = $this->request->getQueryParams();
    if (!empty($params)) {
      $change = new \Model\UserModel($params);
      $change->update('film', "id_film = " . $params['id']);
      $succes = "Film modifier avec succes !";
      header('Location: film?id=' . $params['id'] . '');
    }
  }

  public function deleteFilmAction()
  {
    $error = "";
    $succes = "";
    session_start();
    $params = $this->request->getQueryParams();
    if (!empty($params['id_sup'])) {
      $my = new \Model\UserModel;
      $info = $my->deleteFilm('film', $params['id_sup']);
      $succes = "Le film à bien était supprimé !";
      $this->render('index', $scope = ['error' => $error, 'succes' => $succes]);
      die();
    } else {
      $error = "Impossible de supprimé le film !";
    }
    $this->render('index', $scope = ['error' => $error, 'succes' => $succes]);
  }

  public function joinAction()
  {
    session_start();
    $succes = "";
    $error = "";
    $params = $this->request->getQueryParams();
    if (isset($_GET['id']) && !empty($_SESSION['id'])) {
      $join = new \Model\UserModel;
      $genre = $join->find('film', ['WHERE' => 'id_film = ' . $params['id']]);
      if (isset($genre[0]['id_genre'])) {
        if (!is_null($genre[0]['id_genre'])) {
          $infos = $join->join('film', 'genre',
          "film.id_genre = genre.id_genre",
          ['WHERE' => 'film.id_film = ' . $params['id']]);
          $this->render('show', $infos);
        }
      } elseif($genre) {
        $infos = $join->read('film', "id_film = " . $params['id']);
        $this->render('show', $infos);
      } else {
        $error = "Erreur de connexion !";
        $this->render('index', $scope = ['error' => $error, 'succes' => $succes]);
      }
    } else {
      $error = "Erreur de connexion !";
      $this->render('login', $scope = ['error' => $error, 'succes' => $succes]);
    }
  }
}
