<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moj nalog</title>
    <link rel="stylesheet" href="css/prijava.css">
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

    <div class="container">
        <form name="form"  method="POST" action="#"  class="login-form" >
            <h1>Prijavite se</h1>
            <div class="input">
                <label for="" class="formLabel">Korisnicko ime:</label>
                <input type="text" class="formInput" size="30" minlength="5" placeholder="Korisnicko ime" name="korisnickoIme" required >
            </div>
            <div class="input">
                <label for=""class="formLabel">Lozinka:</label>
                <input type="password" class="formInput" size="30" minlength="8" placeholder="Lozinka" name="password" required >
            </div>

            <button id="submit" type="submit">Prijavi se</button>

        </form>
    </div>


   <script src="js/prijava.js"></script>  
          
</body>
</html>