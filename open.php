<?php
  $filename = $_POST['filename'];
  
  if($filename == ''){
    echo('s_file');
  }
  else {
    $openfile = fopen("codes/$filename.txt", "r");
    $text = fread($openfile, filesize("codes/$filename.txt"));
    fclose($openfile);
    echo($text);
  }
?>
