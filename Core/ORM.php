<?php
namespace Core;

use \Core\Database;

class ORM extends Database
{
  private $db;

  public function __construct()
  {
    $bdd = new Database;
    $this->db = $bdd->db();
  }

  public function create($table, $fields)
  {
    $val1 = implode(", ", array_flip($fields));
    $val2 = "'" . implode("', '", $fields) . "'";
    $create = $this->db->prepare("INSERT INTO
      $table($val1)
      VALUES($val2)");
    $create->execute();
  }

  public function read($table, $id)
  {
    $read = $this->db->prepare("SELECT * FROM $table WHERE $id");
    $read->execute();
    return $read->fetch();
  }

  public function update($table, $id, $fields)
  {
    $fields_all = '';
    foreach ($fields as $key => $value) {
      if (!empty($value) && $key != 'id') {
        $fields_all .= $key . " = \"" . $value . "\",";
      }
    }
    $fields_all = substr($fields_all, 0, -1);
    $update = $this->db->prepare("UPDATE $table SET $fields_all WHERE $id");
    return $update->execute();
  }

  public function delete($table, $id)
  {
    $delete = $this->db->prepare("DELETE FROM $table WHERE id = $id");
    return $delete->execute();
  }

  public function deleteFilm($table, $id)
  {
    $delete = $this->db->prepare("DELETE FROM $table WHERE id_film = $id");
    return $delete->execute();
  }

  public function find($table, $params = array(
    'WHERE' => '',
    'ORDER BY' => '',
    'LIMIT' => ''
  )){
    $params_all = '';
    if (!empty($params) && is_array($params))
    {
      foreach ($params as $key => $value)
      {
        if (!empty($value))
        {
          $params_all .= $key . ' ' . $value . ' ';
        }
      }
    }
    $find = $this->db->prepare("SELECT * FROM $table $params_all");
    $find->execute();
    return $find->fetchAll();
  }

  public function join($table, $j_table, $param, $params = array(
    'WHERE' => '',
    'ORDER BY' => '',
    'LIMIT' => ''
  )){
    if (isset($params))
    {
      $params_all = '';
      foreach ($params as $key => $value)
      {
        if (!empty($value))
        {
          $params_all .= $key . ' ' . $value . ' ';
        }
      }
    }
    $join = $this->db->prepare("SELECT * FROM $table
      INNER JOIN $j_table ON $param
      $params_all");
    $join->execute();
    return $join->fetchAll()[0];
  }
}
