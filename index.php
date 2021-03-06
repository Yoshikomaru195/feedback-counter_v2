<?php
include_once("creatfile.php");
?>
<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Отзыв</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/normalize.css">
</head>

<body>

  <div class="container">

    <div class="logo"><img src="img/logo.png" alt="Логотип"></div>
    <h2 class="feedback__title">Компания "Симпл Фуд" просит Вас оставить отзыв о нашей работе</h2>

    <form method="POST" action="/saverating.php" onclick="checkRadio()">
      <div class="block__rows">
        <div class="row">
          <div class="row-buttons">
            <div class="row-buttons__item">
              <h4 class="row-buttons__title">Качество обслуживания</h4>
            </div>
            <div class="row-buttons__item">
              <input class="input-radio" id="sqgood" type="radio" name="servicequality" value="good">
              <label for="sqgood" id="sqbtn__good" class="button row-buttons__button button__good">Отлично</label>
            </div>
            <div class="row-buttons__item">
              <input class="input-radio" id="sqnormal" type="radio" name="servicequality" value="normal">
              <label for="sqnormal" id="sqbtn__medium" class="button row-buttons__button button__medium">Нормально</label>
            </div>
            <div class="row-buttons__item">
              <input class="input-radio" id="sqbad" type="radio" name="servicequality" value="bad">
              <label for="sqbad" id="sqbtn__bad" class="button row-buttons__button button__bad">Плохо</label>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="row-buttons">
            <div class="row-buttons__item">
              <h4 class="row-buttons__title">Качество блюд</h4>
            </div>
            <div class="row-buttons__item">
              <input class="input-radio" id="fqgood" type="radio" name="foodquality" value="good">
              <label for="fqgood" id="fqbtn__good" class="button row-buttons__button button__good">Очень вкусно</label>
            </div>
            <div class="row-buttons__item">
              <input class="input-radio" id="fqnormal" type="radio" name="foodquality" value="normal">
              <label for="fqnormal" id="fqbtn__medium" class="button row-buttons__button button__medium">Нормально</label>
            </div>
            <div class="row-buttons__item">
              <input class="input-radio" id="fqbad" type="radio" name="foodquality" value="bad">
              <label for="fqbad" id="fqbtn__bad" class="button row-buttons__button button__bad">Невозможно есть</label>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="row-buttons">
            <div class="row-buttons__item">
              <h4 class="row-buttons__title">Ассортимент блюд</h4>
            </div>
            <div class="row-buttons__item">
              <input class="input-radio" id="agood" type="radio" name="assortment" value="good">
              <label for="agood" id="abtn__good" class="button row-buttons__button button__good">Большой выбор!</label>
            </div>
            <div class="row-buttons__item">
              <input class="input-radio" id="anormal" type="radio" name="assortment" value="normal">
              <label for="anormal" id="abtn__medium" class="button row-buttons__button button__medium">Небольшой выбор</label>
            </div>
            <div class="row-buttons__item">
              <input class="input-radio" id="abad" type="radio" name="assortment" value="bad">
              <label for="abad" id="abtn__bad" class="button row-buttons__button button__bad">Выбор блюд отсутствует</label>
            </div>
          </div>
        </div>
      </div>
      <input id="submit_button" class="button button__submit" type="submit" value="Отправить" disabled>
    </form>

  </div>

  <script>
    function checkRadio() {
      let __sq = document.getElementsByName('servicequality'),
        __fq = document.getElementsByName('foodquality'),
        __as = document.getElementsByName('assortment'),
        __btn = document.getElementById('submit_button');
      if ((__sq[0].checked || __sq[1].checked || __sq[2].checked) &&
        (__fq[0].checked || __fq[1].checked || __fq[2].checked) &&
        (__as[0].checked || __as[1].checked || __as[2].checked)) {
        __btn.disabled = false;
        document.getElementById('submit_button').className = 'button button__submit-active'
      }
    }
  </script>

</body>

</html>