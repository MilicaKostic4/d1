<?php

require "connect.php";
require "model/korisnik.php";


if (isset($_COOKIE['Cookie'])) {
    header('Location: mojNalog.php');
}

session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
    $uname = $_POST['username'];
    $upass = $_POST['password'];

    $korisnik = new Korisnik(1, $uname, $upass);
    $result = Korisnik::loginUser($korisnik, $connection);

    if ($result->num_rows == 1) {
        echo `
        <script>
            console.log("Uspesna prijava!");
        </script>        
        `;

        $_SESSION['user_id'] = $korisnik->id;
        setcookie("Cookie", $uname, time() + 3600);
        header('Location: mojNalog.php');
        exit();
    } else {
        echo `
        <script>
            console.log("Neuspesna prijava!");
        </script>        
        `;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moj nalog</title>
    <link rel="stylesheet" href="css/prijava.css">
</head>

<body>
    <?php include 'navBar.php'; ?>
    <div class="container">
        <form name="form" method="POST" action="#" class="login-form">
            <h1>Prijavite se</h1>
            <div class="input">
                <label for="username" class="formLabel">Korisnicko ime:</label>
                <input type="text" class="formInput" size="30" minlength="5" placeholder="Korisnicko ime" name="username" required>
            </div>
            <div class="input">
                <label for="password" class="formLabel">Lozinka:</label>
                <input type="password" class="formInput" size="30" minlength="5" placeholder="Lozinka" name="password" required>
            </div>

            <button id="submit" type="submit">Prijavi se</button>

        </form>

    </div>


</body>

</html>