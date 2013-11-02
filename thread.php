<?php
  error_reporting(E_ALL | E_STRICT);
  ini_set('display_errors', '1');

  require_once('env.php');
  require_once('fun.php');
  require_once('./smarty.php');

  $start_time = date('H:i:s');

  $board = (isset($_GET['board']))? $_GET['board'] : NULL;
  $thread = (isset($_GET['thread']))? $_GET['thread'] : NULL;

  print_r($board, $thread);

  if (!($board && $thread)) {
    $smarty->display('404.tpl');
    die();
  }
  $data = json_decode(fetch_json(SERV . "api/thread/$board/$thread/all.json"));
  if (property_exists($data, 'code')) {
    $smarty->display('404.tpl');
    die();
  }
  $posts_time = date('H:i:s');

  $title = ($data->title === '')? 'Безымянный тред' : $data->title;
  $posts = $data->posts;
  if (isset($_GET['d'])) {
    print_r($posts);
  }
  foreach($posts as $p) {
    if ($p->files) {
      foreach($p->files as $f) {
        $f->thumb = SERV . $f->thumb;//cached_img($f->thumb, THUMB_PATH, THUMB_DIR);
        $f->src = SITE . 'img.php?url=' . urlencode($f->src);
      }
    }
    $p->message = markup($p->message);
  }
  $images_time = date('H:i:s');

  $smarty->assign('board',  $board);
  $smarty->assign('thread', $thread);
  $smarty->assign('title',  $title);
  $smarty->assign('posts',  $posts);

  $smarty->assign('start_time', $start_time);
  $smarty->assign('posts_time', $posts_time);
  $smarty->assign('images_time', $images_time);

  $smarty->display('thread.tpl');
?>
