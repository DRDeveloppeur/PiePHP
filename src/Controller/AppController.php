<?php

namespace Controller;

use \Core\Controller;

class AppController extends Controller
{

  public function indexAction()
  {
    header("Location: user/index");
  }
}
