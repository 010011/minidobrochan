<?php
  /** environment variables, pathes and directories **/
  define('ROOT', getcwd() . '/');
  define('SERV', 'http://dobrochan.com/');
  define('SITE', '/');
  define('THUMB_PATH',  ROOT . 'img/thumb/');  // physical dir
  define('SRC_PATH',    ROOT . 'img/src/');    // physical dir
  define('THUMB_DIR',   SITE . 'img/thumb/');  // site dir
  define('SRC_DIR',     SITE . 'img/src/');    // site dir
  define('COOKIE_FILE', ROOT . 'cookies.txt'); // cookie file

  date_default_timezone_set('UTC');
?>
