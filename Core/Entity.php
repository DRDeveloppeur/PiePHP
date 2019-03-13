<?php
namespace Core;

use \Core\ORM;
//Extend tout les Model avec cette class
class Entity
{
  public $fields;
  public $orm;
  public $id;

  function __construct($params = [])
  {
    foreach ($params as $key => $value) {
      $this->key = $value;
    }
    $this->orm = new ORM;
    $this->fields = $params;
  }

  public function create($table, $params)
  {
    return $this->orm->create($table, $params);
  }

  public function read($table, $id)
  {
    return $this->orm->read($table, $id);
  }

  public function update($table, $id)
  {
    return $this->orm->update($table, $id, $this->fields);
  }

  public function delete($table, $id)
  {
    return $this->orm->delete($table, $id);
  }

  public function deleteFilm($table, $id)
  {
    return $this->orm->deleteFilm($table, $id);
  }

  public function find($table, $params = [])
  {
    return $this->orm->find($table, $params);
  }

  public function join($table, $j_table, $param, $params)
  {
    return $this->orm->join($table, $j_table, $param, $params);
  }
}
