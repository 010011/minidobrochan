<?php
  require_once('env.php');

  // download image and return local url
  function cached_img($url, $path, $dir) {
    $file = str_replace('/', '_', $url);
    if (!file_exists($path . $file)) {
      file_put_contents($path . $file,
        file_get_contents(SERV . $url)
      );
    }
    return $dir . $file;
  }

  function markup($message) {
    $patterns = array(
    '/(>{2})(\d{1,})/',
    '/(>{1,})(.*?)(\n|$)/',
    '/(\%{2})(.*?)(\%{2})/',
    '/(\*{2})(.*?)(\*{2})/',
    '/(\*{1})(.*?)(\*{1})/',
    '/\n/');
    $replacemetns = array(
    '<a href="#\2" class="reply">&gt;\2</a>',
    '<span class="quote">\1\2\3</span>',
    '<span class="spoiler">\2</span>',
    '<span class="bold">\2</span>',
    '<span class="italic">\2</span>',
    '<br>');
    $message = preg_replace($patterns, $replacemetns, $message);
    $message = preg_replace(
      "#((http|https|ftp)://(\S*?\.\S*?))(\s|\;|\)|\]|\[|\{|\}|,|\"|'|:|\<|$|\.\s)#i",
      "<a href=\"$1\" target=\"_blank\">$3</a>$4",
      $message
    );
    return $message;
  }

  function fetch_json($json_url) {
    $ch = curl_init($json_url);
    $options = array(
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_USERAGENT      => 'minidobrochan grabber',
      CURLOPT_HTTPHEADER     => array('Content-type: application/json'),
      CURLOPT_COOKIESESSION  => true,
      CURLOPT_COOKIEFILE     => COOKIE_FILE,
      CURLOPT_COOKIEJAR      => COOKIE_FILE,
    );
    curl_setopt_array($ch, $options);
    return curl_exec($ch);
  }

  function d($data) {
    print_r($data);
    die();
  }

?>
