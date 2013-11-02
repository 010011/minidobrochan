<?php
  $headers = getallheaders();
  foreach ($headers as $header => $value) {
    echo($header . "\t" . $value . '<br>');
  }
?>
