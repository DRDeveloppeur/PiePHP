<?php

namespace Model;

use \Core\Entity;
use \Core\ORM;

class UserModel extends Entity
{

  public function freeMail($table)
  {
    $find = $this->orm->find($table, $params = array(
      'WHERE' => "email = '" . $_POST['email'] . "'"
    ));
    if (empty($find)) {
      return true;
    } else {
      return false;
    }
  }

  public function freePseudo($table)
  {
    $find = $this->orm->find($table, $params = array(
      'WHERE' => "pseudo = '" . $_POST['pseudo'] . "'"
    ));
    if (empty($find)) {
      return true;
    } else {
      return false;
    }
  }
  
  public function infoUser($table, $pseudo)
  {
    $infos = $this->orm->find($table, $params = array(
      'WHERE' => "pseudo = '" . $pseudo . "'"
    ));
    session_start();
    foreach ($infos as $key => $info) {
      foreach ($info as $key => $value) {
        $_SESSION[$key] = $value;
      }
    }
    foreach ($_SESSION as $key => $value) {
      $keys = str_replace("'", "", $key);
      if (is_numeric($keys)) {
        unset($_SESSION[$key]);
      }
    }
  }
}
