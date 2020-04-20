<?php
create_file_data();
function create_file_data()
{
  $dir = 'data';
  $file = './data/' . date("j-n-Y") . ".json";
  if (!is_dir($dir)) {
    mkdir($_SERVER["DOCUMENT_ROOT"] . "/" . $dir . "/");
  }
  if (!file_exists($file)) {
    $jsondata = generate_json();
    $jsonfile = fopen($file, "w+");
    fwrite($jsonfile, $jsondata);
    fclose($jsonfile);
  }
}
