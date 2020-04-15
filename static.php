<?php
include_once 'dataworker.php';

function statisticoneday()
{
  $dir = 'data';
  $file = './data/' . date("j-n-Y") . ".json";
  if (!is_dir($dir)) {
    echo "static not found";
    return;
  }
  $jsonfiledata = file_get_contents($file);
  $jsonarray = json_decode($jsonfiledata, true);
  return $jsonarray;
}
$data = statisticoneday();
$mmdays = get_html_min_max_date();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Statistics</title>
</head>

<body>

  <form action="/static.php" method="POST">
    <label for="dateone">От: </label>
    <input type="date" name="firstdate" id="dateone" value="<? echo date("Y-m-d"); ?>" min="<? echo $mmdays[0] ?>" max="<? echo $mmdays[1] ?>">
    <span></span>
    <?php ?>
  </form>



</body>

</html>