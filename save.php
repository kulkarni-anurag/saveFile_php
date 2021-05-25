<?php
  $code = $_POST['code'];
  $filename = $_POST['filename'];
  
  if(strlen($code) < 3){
    echo('s_code');
  }
  elseif(strlen($filename) < 1) {
    echo('s_filename');
  }
  else{
    $savefile = fopen("codes/$filename.txt", "w") or die("Unable to open file");
    fwrite($savefile, $code);
    fclose($savefile);
    echo('true');
  }
?>
