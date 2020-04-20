<?php
create_file_data();
function create_file_data()
{

  $template = array(
    "servicequality" => ["good" => 0, "normal" => 0, "bad" => 0],
    "foodquality" => ["good" => 0, "normal" => 0, "bad" => 0],
    "assortment" => ["good" => 0, "normal" => 0, "bad" => 0]
  );
  $jsondata = json_encode($template);
  $dir = 'data';
  $file = './data/' . date("j-n-Y") . ".json";
  if (!is_dir($dir)) {
    mkdir($_SERVER["DOCUMENT_ROOT"] . "/" . $dir . "/");
  }
  if (!file_exists($file)) {
    $jsonfile = fopen($file, "w+");
    fwrite($jsonfile, $jsondata);
    fclose($jsonfile);
  }
}
