<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kontakt</title>
  <link rel="stylesheet" href="css/kontakt.css">
  <!--<script src="https://kit.fontawesome.com/a076d05399.js"></script>-->
</head>

<body>
  <?php include 'navBar.php'; ?>

  <div class="top">
    <h1 class="pageTitle">Kontakt</h1>
  </div>

  <div class="content">
    <div class="mapContainer">
      <h2 class="mapD">Ovde se nalazimo:</h2>
      <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1684.1651171196681!2d20.474939412991137!3d44.772307025887606!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a70576248bf79%3A0xadaf5cff042d3bd0!2z0KTQsNC60YPQu9GC0LXRgiDQvtGA0LPQsNC90LjQt9Cw0YbQuNC-0L3QuNGFINC90LDRg9C60LAg0KPQvdC40LLQtdGA0LfQuNGC0LXRgtCwINGDINCR0LXQvtCz0YDQsNC00YM!5e0!3m2!1ssr!2srs!4v1640216077411!5m2!1ssr!2srs" width="600" height="450" style="border: 0" allowfullscreen="" loading="lazy"></iframe>
      </div>
    </div>

    <div class="infoContainer">
      <div class="infoC">
        <div class="adress info">
          <img src="img/adress.png" alt="Adresa" />
          <p>Jove Ilića 154, Beograd</p>
        </div>
        <div class="phone info">
          <img src="img/phone.png" alt="Telefon" />
          <p>+381 11 3950 800</p>
        </div>
        <div class="mail info">
          <img src="img/mail.png" alt="Mail" />
          <p>domzdravljagrande@gmail.com</p>
        </div>
      </div>
    </div>

    <div class="workingHoursContainer">
      <div class="workingHours">
        <div class="openingTime">
          <div class="openingTime_Day">Radno vreme</div>
          <div class="openingTime_Time"></div>
        </div>
        <div class="openingTime">
          <div class="openingTime_Day">Ponedeljak</div>
          <div class="openingTime_Time">08:00 - 20:00</div>
        </div>
        <div class="openingTime">
          <div class="openingTime_Day">Utorak</div>
          <div class="openingTime_Time">08:00 - 20:00</div>
        </div>
        <div class="openingTime">
          <div class="openingTime_Day">Sreda</div>
          <div class="openingTime_Time">08:00 - 20:00</div>
        </div>
        <div class="openingTime">
          <div class="openingTime_Day">Četvrtak</div>
          <div class="openingTime_Time">08:00 - 20:00</div>
        </div>
        <div class="openingTime">
          <div class="openingTime_Day">Petak</div>
          <div class="openingTime_Time">08:00 - 20:00</div>
        </div>
        <div class="openingTime">
          <div class="openingTime_Day">Subota</div>
          <div class="openingTime_Time">10:00 - 16:00</div>
        </div>
        <div class="openingTime">
          <div class="openingTime_Day">Nedelja</div>
          <div class="openingTime_Time">10:00 - 16:00</div>
        </div>
      </div>
    </div>

    <?php include 'footer.php'; ?>
  </div>

</body>

</html>