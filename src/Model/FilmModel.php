<?php
namespace Model;

use \Core\Entity;
use \Core\ORM;

class FilmModel extends Entity
{
  public function idAddFilm()
  {
    $genre = new \Model\UserModel;
    $genres = $genre->find('film', ['ORDER BY' => 'id_film DESC', 'LIMIT' => '1']);
    $maxId = $genres[0]['id_film'] + 1;
    return $maxId;
  }

  public function freeTitre($table, $titre)
  {
    $find = $this->orm->find($table, $params = array(
      'WHERE' => "titre = '" . $titre . "'"
    ));
    if (empty($find)) {
      return true;
    } else {
      return false;
    }
  }
}
