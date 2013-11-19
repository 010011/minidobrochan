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

  /* Also, add this to your host directives (NGinx example):

  port_in_redirect off;
  location / {
    index index.html index.php;
		rewrite ^([^.]*[^/])$ $1/ permanent;
		rewrite ^/(.*)/res/(\d*)/$ /thread.php?board=$1&thread=$2;
		rewrite ^/(.*)/(\d*)/$ /index.php?board=$1&page=$2;
		rewrite ^/(.*)/$ /index.php?board=$1;
  }
   */
?>
