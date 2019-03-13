<?php
namespace Controller;

use \Core\Controller;

class UserController extends Controller
{

  public function registerAction()
  {
    $error = '';
    $this->render('register', $scope = ['error' => $error]);
    $params = $this->request->getQueryParams();
    if (!empty($params['pseudo']) && !empty($params['pass'])) {
      $params['pass'] = password_hash($params['pass'], PASSWORD_DEFAULT);
      $user = new \Model\UserModel;
      if ($user->freePseudo('gerent')) {
        $user->id = $user->create('gerent', $params);
        $this->render('login');
        die();
      } else {
        $error = "Pseudo déjà utilisée !";
      }
      $this->render('register', $scope = ['error' => $error]);
      exit();
    } else {
      $error = "Veuillez remplir tous les champs !";
    }
  }

  public function loginAction()
  {
    $error = '';
    $succes = '';
    $params = $this->request->getQueryParams();
    $this->render('login', $scope = ['error' => $error, 'succes' => $succes]);
    if (!empty($params['pseudo']) && !empty($params['pass'])) {
      $user = new \Model\UserModel($params);
      if (!$user->freePseudo('gerent')) {
        $user->infoUser('gerent', $params['pseudo']);
        if (password_verify($params['pass'], $_SESSION['pass'])) {
          header('Location: index');
          die();
        } else {
          $_SESSION = NULL;
          $error = "Le pseudo ou mot de passe est incorrecte !"; //Mot de passe
        }
      } else {
        $error = "Le pseudo ou mot de passe est incorrecte !"; // Email
      }
      $this->render('login', $scope = ['error' => $error]);
    } else {
      $error = "Veuillez remplir tous les champs !";
    }
  }

  public function decAction() //Deconnexion
  {
    session_start();
    if (!empty($_SESSION['id'])) {
      session_destroy();
      $this->render('login');
    } else {
      $this->render('login');
    }
  }

  public function membreAction()
  {
    session_start();
    if (!empty($_SESSION['id'])) {
      $my = new \Model\UserModel;
      $info = $my->read('gerent', "id = " . $_SESSION['id']);
      $this->render('membre', $info);
    } else {
      $error = "Erreur de connexion !";
      $this->render('login', $scope = ['error' => $error]);
    }
  }

  public function readAction()
  {
    session_start();
    if (!empty($_SESSION['id'])) {
      $my = new \Model\UserModel;
      $info = $my->read('gerent', "id = " . $_SESSION['id']);
      $this->render('index', $info);
    } else {
      $error = "Erreur de connexion !";
      $this->render('login', $scope = ['error' => $error]);
    }
  }

  public function updateAction()
  {
    $error = "";
    $succes = "";
    $this->render('membre', $scope = ['error' => $error, 'succes' => $succes]);
    session_start();
    $params = $this->request->getQueryParams();
    if (!empty($params)) {
      if (!empty($params['pseudo'])) {
        $change = new \Model\UserModel(['pseudo' => $params['pseudo']]);
        if ($change->freePseudo('gerent')) {
          $change->update('gerent', 'id = ' . $_SESSION['id']);
          $succes = "Profil changer avec succes !";
          $_SESSION['pseudo'] = $params['pseudo'];
        } else {
          $error = "Ce pseudo existe déjà !";
        }
      } elseif (!empty($params['pass'])) {
        $pass = password_hash($params['pass'], PASSWORD_DEFAULT);
        $change = new \Model\UserModel(['pass' => $pass]);
        $change->update('gerent', $_SESSION['id']);
        $succes = "Profil changer avec succes !";
      }
    } else {
      $error = "Veuillez replir le champ !";
    }
    $this->render('membre', $scope = ['error' => $error, 'succes' => $succes]);
  }

  public function deleteAction()
  {
    $error = "";
    $succes = "";
    $this->render('membre', $scope = ['error' => $error, 'succes' => $succes]);
    session_start();
    if (!empty($_SESSION['id'])) {
      $my = new \Model\UserModel;
      $info = $my->delete('gerent', $_SESSION['id']);
      $succes = "Le profil à bien était supprimé !";
      $this->render('login', $scope = ['error' => $error, 'succes' => $succes]);
      die();
    } else {
      $error = "Impossible de supprimer le profile !";
    }
    $this->render('membre', $scope = ['error' => $error, 'succes' => $succes]);
  }


  public function read_allAction()
  {
    session_start();
    $params = $this->request->getQueryParams();
    if (!empty($_SESSION['id'])) {
      if (isset($_GET['page'])) {
        $my = new \Model\UserModel;
        $nb = $my->find('film');
        $nbr = ceil(count($nb));
        if ($params['page'] >= $nbr) {
          $_GET['page'] = $nbr-10;
        } elseif ($params['page'] < 0 || !is_numeric($params['page'])) {
          $_GET['page'] = 0;
        }
        $info = $my->find('film', ['ORDER BY' => 'id_film',
        'LIMIT' => $_GET['page'] . ", 10"]);
        $info['nbr'] = $nbr;
        $this->render('films', $info);
      } else {
        header('Location: index');
      }
    } else {
      $error = "Erreur de connexion !";
      $this->render('login', $scope = ['error' => $error]);
    }
  }
}
