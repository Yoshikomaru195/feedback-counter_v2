<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Статистика</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/normalize.css">
</head>
<?php
include_once 'dataworker.php';

$mmdays = get_html_min_max_date();
$date = initdate();
$stats = valid_post();
include_once("creatfile.php");
?>

<body>

  <div class="stats-block">
    <div class="block-calendar">
      <form class="stats__calendar" action="/stats.php" method="POST">
        <label for="oneday" onclick="disableseconddate()">
          <input type="checkbox" id="oneday">За день
        </label>
        <br>
        <br>
        <label for="dateone">От: </label>
        <input class="stats__input" onchange="valid_date()" type="date" name="firstdate" id="dateone" value="<? echo $mmdays[1] ?>" min="<? echo $mmdays[0] ?>" max="<? echo $mmdays[1] ?>">
        <span></span>
        <br>
        <br>
        <label for="datetwo">До: </label>
        <input class="stats__input" type="date" name="seconddate" id="datetwo" value="<? echo $mmdays[1] ?>" min="<? echo $mmdays[0] ?>" max="<? echo $mmdays[1] ?>">
        <span></span>
        <br>
        <br>
        <input class="stats__submit" type="submit">
      </form>
    </div>
    <?php

    if (gettype($stats) == "string") {
      echo "<h3>" . $stats . "</h3>";
    } elseif (gettype($stats) == "array") {
      if (gettype($date) == "string") echo "<h3 class='stats__title'>Статистика за $date</h3>";
      if (gettype($date) == "array") echo "<h3>Статистика от $date[0] до $date[1]</h3>";
      include_once("tabletemplate.php");
    } else {
      echo "error";
    }
    ?>
  </div>

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