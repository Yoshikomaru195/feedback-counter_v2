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
    <label for="oneday" onclick="disableseconddate()">
      <input type="checkbox" id="oneday"> За один день?
    </label>
    <br>
    <br>
    <label for="dateone">От: </label>
    <input onchange="valid_date()" type="date" name="firstdate" id="dateone" value="<? echo date("Y-m-d"); ?>" min="<? echo $mmdays[0] ?>" max="<? echo $mmdays[1] ?>">
    <span></span>
    <br>
    <br>
    <label for="datetwo">До: </label>
    <input type="date" name="seconddate" id="datetwo" value="<? echo date("Y-m-d"); ?>" min="<? echo $mmdays[0] ?>" max="<? echo $mmdays[1] ?>">
    <span></span>
    <br>
    <br>
    <input type="submit">
  </form>

  <script>
    let time = Date.now(),
      year = time.getFullYear();


    time

    function valid_date() {
      let done = document.getElementById("dateone"),
        dtwo = document.getElementById("datetwo");

      dtwo.value = done.value;
      dtwo.min = done.value;
    }

    function disableseconddate() {
      let cbox = document.getElementById("oneday"),
        done = document.getElementById("dateone"),
        dtwo = document.getElementById("datetwo");
      if (cbox.checked) {
        dtwo.disabled = true;
        dtwo.value = "";
      }
      if (!cbox.checked) {
        dtwo.disabled = false;
        dtwo.value = done.value;
      }
    }
  </script>

</body>

</html>