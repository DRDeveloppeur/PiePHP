<?php

namespace Controller;

use Core\Core;
use Core\Controller;

class ErrorController extends Controller
{

  public function errAction()
  {
    $this->render('404');
  }
}
