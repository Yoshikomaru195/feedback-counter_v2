<?php
include_once 'dataworker.php';

$mmdays = get_html_min_max_date();

if ($_POST["seconddate"] == "") {
  $x = test($_POST["firstdate"]);
} else {
  $x = test2($_POST["firstdate"], $_POST["seconddate"]);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Statistics</title>
</head>

<body>
  <form action="/stats.php" method="POST">
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
  <?php echo $x ?>
  <script>
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