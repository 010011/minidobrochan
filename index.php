<?php
  error_reporting(E_ALL | E_STRICT);
  ini_set('display_errors', '1');

  require_once('env.php');
  require_once('fun.php');
  require_once('./smarty.php');

  $start_time = date('H:i:s');

  $board = (isset($_GET['board']))? $_GET['board'] : NULL;
  $page = (isset($_GET['page']))? $_GET['page'] : '0';
  $threads = array();

  if ($board) {
    $start_time = date('H:i:s');
    $json = json_decode(fetch_json(SERV . "$board/$page.json"));
    if (!$json) {
      $smarty->display('404.tpl');
      die();
    }
    $data = $json->boards->$board;
    $page_count = $data->pages - 1;
    $smarty->assign('page_count', $page_count);
    $threads = $data->threads;
  }
  $threads_time = date('H:i:s');

  foreach($threads as $t) {
    if ($t->posts[0]->files) {
      $t->posts[0]->files[0]->thumb = SERV . $t->posts[0]->files[0]->thumb;//cached_img($t->posts[0]->files[0]->thumb, THUMB_PATH, THUMB_DIR);
      $t->posts[0]->files[0]->src = SITE . 'img/' . $t->posts[0]->files[0]->src;
    }
    $t->posts[0]->message = str_replace("\n", '<br>', $t->posts[0]->message);
    if (!$t->title) {
      $t->title = 'Безымянный тред';
    }
  }
  $images_time = date('H:i:s');

  if (isset($_GET['d'])) {
    print_r($threads);
  }

  $smarty->assign('board', $board);
  $smarty->assign('page', $page);
  $smarty->assign('threads', $threads);

  $smarty->assign('start_time', $start_time);
  $smarty->assign('threads_time', $threads_time);
  $smarty->assign('images_time', $images_time);

  $smarty->display('index.tpl');
?>
