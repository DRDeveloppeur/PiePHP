<?php

namespace Core;

use \PDO;

class Database
{

  public static $database;

  public static function db()
  {
    try
    {
      self::$database = new PDO ('mysql:host=localhost;dbname=epitech_tp;
      charser=utf8', 'root', '',
      array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

      return self::$database;
    }
    catch (\Exception $e)
    {
      throw $e;
    }
  }
}
