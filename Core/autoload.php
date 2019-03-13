<?php

spl_autoload_register(function($class) {
  $patch = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';

  if (file_exists($patch)) {
    include $patch;
  }elseif (file_exists('src/' . $patch)) {
    include 'src/' . $patch;
  }
});
