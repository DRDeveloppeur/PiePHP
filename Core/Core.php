<?php

namespace Core;

class Core
{
  public function run()
  {

    $url = trim($_SERVER['REQUEST_URI'], DIRECTORY_SEPARATOR);
    $url = explode("?", $url)[0];
    include 'routes.php';

    if (!empty($routes[$url] = Router::get($url))) {

      $ctrl = "\Controller\\" . ucfirst($routes[$url]['controller']) .
        'Controller';
      $act = $routes[$url]['action'] . 'Action';

      if (class_exists($ctrl)) {
        $controller = new $ctrl();
        if (method_exists($controller, $act)) {
          $controller->$act();
        } else {
          $this->render('404');
        }
      } else {
        $this->render('404');
      }
    }
  }
}
