<?php
function statisticoneday()
{
  $dir = 'data';
  $file = './data/' . date("j-n-Y") . ".json";
  if (!is_dir($dir)) {
    return "static not found";
  }
  $jsonfiledata = file_get_contents($file);
  $jsonarray = json_decode($jsonfiledata, true);
  return $jsonarray;
}
$data = statisticoneday();


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Statistics</title>
</head>

<body>


  <?php
  ?>
</body>

</html>