<?php
  
// Open the file in write mode
$file = fopen("data.json", 'w');

if ($file) {
    $text = '{"numbers":[]}';
    fwrite($file, $text);
  	fclose($file);
}
header("Location: http://mkostek.wuaze.com/admin.html");

?>
