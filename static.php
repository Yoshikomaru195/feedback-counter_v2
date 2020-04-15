<?php
function readjsonfile()
{
  $dir = 'data';
  $file = './data/' . date("j.n.Y") . ".json";
  if (!is_dir($dir)) {
    return "static not found";
  }
  $jsonfiledata = file_get_contents($file);
  $jsonarray = json_decode($jsonfiledata, true);
  return $jsonarray;
}
$data = readjsonfile(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Statistics</title>
</head>

<body>
  <h2>СТАТИСТИКА НА СЕГОДНЯШНИЙ ДЕНЬ:</h2>
  <br>
  <table>
    <thead>
      <tr>
        <th></th>
        <th>Качество обслуивания</th>
        <th>Качество пищи</th>
        <th>Ассортимент</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Отлично</td>
        <td><?php echo $data["servicequality"]["good"] ?></td>
        <td><?php echo $data["foodquality"]["good"] ?></td>
        <td><?php echo $data["assortment"]["good"] ?></td>
      </tr>
      <tr>
        <td>Удовлетворительно</td>
        <td><?php echo $data["servicequality"]["normal"] ?></td>
        <td><?php echo $data["foodquality"]["normal"] ?></td>
        <td><?php echo $data["assortment"]["normal"] ?></td>
      </tr>
      <tr>
        <td>Плохо</td>
        <td><?php echo $data["servicequality"]["bad"] ?></td>
        <td><?php echo $data["foodquality"]["bad"] ?></td>
        <td><?php echo $data["assortment"]["bad"] ?></td>
      </tr>
    </tbody>
  </table>
</body>

</html>