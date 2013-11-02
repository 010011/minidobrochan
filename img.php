<?php
  require_once('env.php');
  require_once('fun.php');

  $src = urldecode($_GET['url']);
  //$src = cached_img($src, SRC_PATH, SRC_DIR);
  //header('Location: ' . $src);
  $src = SERV . $src;
  header("Content-type: image/jpeg");
  readfile($src);
  die();
?>
