<?php

namespace Core;

use \Core\Request;
use \Core\Core;

class Controller
{
  private static $_render;
  public function __construct()
  {
    $this->request = new Request;
  }

  protected function render($view, $scope = [])
  {
    extract($scope);
    $file = implode(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', 'View',
    str_replace('Controller', '', basename(get_class($this))), $view]) . '.php';

    if (file_exists($file)) {
      ob_start();
      include ($file);
      $view = ob_get_clean();

      ob_start();
      include(implode(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', 'View',
      'index']) . '.php');
      self::$_render = ob_get_clean();
    }
  }

  public function __destruct()
  {
    echo self::$_render;
  }
}
