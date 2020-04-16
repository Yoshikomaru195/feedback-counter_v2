<?php
function save_quality_rating($servicequality, $foodquality, $assortment)
{
  $data = array();
  if (isset($servicequality)) $data["servicequality"] = $servicequality;
  if (isset($foodquality)) $data["foodquality"] = $foodquality;
  if (isset($assortment)) $data["assortment"] = $assortment;

  if (count($data) == 0) return;

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
  if (file_exists($file)) {
    $jsonfiledata = file_get_contents($file);
    $jsonarray = json_decode($jsonfiledata, true);
    foreach ($data as $key => $value) {
      $jsonarray[$key][$value]++;
    }
    $jsondata = json_encode($jsonarray);
    $jsonfile = fopen($file, "w+");
    fwrite($jsonfile, $jsondata);
    fclose($jsonfile);
  }
}
function generate_json()
{
  $template = array(
    "servicequality" => ["good" => 0, "normal" => 0, "bad" => 0],
    "foodquality" => ["good" => 0, "normal" => 0, "bad" => 0],
    "assortment" => ["good" => 0, "normal" => 0, "bad" => 0]
  );

  $jsondata = json_encode($template);
  return $jsondata;
}

save_quality_rating($_POST["servicequality"],  $_POST["foodquality"],  $_POST["assortment"]);

echo '<script> location.href= "/thx.html";</script>';
