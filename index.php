<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dom zdravlja Grande</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <label class="logo"><img src="img/logo-modified.png"></label>
        <ul>
            <li><a class="active" href="index.php">Početna</a></li>
            <li><a href="">Moj nalog</a></li>
            <li><a href="sluzbe.html">Službe</a></li>
            <li><a href="kontakt.html">Kontakt</a></li>
        </ul>
    </nav>

<div class="baner">
  <h1><b>Dom zdravlja Grande</b></h1>
  <p id="DatumVreme"></p>
 <br>
  <a href="">Registracija</a>
  <br><br>
  <button onclick="window.print()">Print</button>
</div>
<div class="wrapper">
    <h1>Aktuelne vesti</h1>
    <div class="img-area">
      <div class="single-img"><img src="img/mere.png" alt="">
        <h2>Mere zaštite protiv korona virusa</h2>
        <p>Kako biste se zaštitili od korona virusa, savetujemo nošenje <br> maski, često pranje ruku i održavanje distance.</p> 
      </div>
      <div class="single-img"><img src="img/vakcine.png">
        <h2>Vakcinacija</h2>
        <p>Vakcinacija građana bilo kojom od 5 dostupnih vakcina <br> obavlja se svakog radnog dana od 8-20h i subotom od 8-16h.</p> 
      </div>
      <div class="single-img"><img src="img/dz.png">
        <h2>Renoviranje zgrade</h2>
        <p>U periodu od 31.8.2021 do 17.5.2022. radiće se na obnovi <br> fasade zgrade doma zdravlja.</p> 
      </div>
    </div>
  </div>
    <script src="js/script.js"></script>
</body>
</html>