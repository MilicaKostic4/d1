<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moj nalog</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/sluzbe.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">

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
            <li><a href="mojNalog.php">Moj nalog</a></li>
            <li><a href="sluzbe.html">Službe</a></li>
            <li><a href="kontakt.html">Kontakt</a></li>
        </ul>
    </nav>
    <div>
        <?php
        if (isset($_COOKIE['Cookie'])) {
        ?>
            <h1 class="welcome">Zdravo <?php echo $_COOKIE['Cookie']; ?>!<h1>
                <?php
            } else {
                header('Location: prijava.php');
            }
                ?>
    </div>

    <nav class="navbar navbar-light justify-content-center">
        <span class="navbar-brand mb-0 h1" style="font-size: 30px;">Termini</span>
    </nav>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Datum</th>
                <th scope="col">Sluzba</th>
                <th scope="col">Lekar</th>
                <th scope="col">Opcije</th>
            </tr>
        </thead>
        <tbody id="termini">
        </tbody>
    </table>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalDodaj" data-whatever="@dodaj">
        Dodaj termin
    </button>


    <!-- Modal dodaj termin -->
    <div class="modal fade" id="modalDodaj" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="dodajTermin">Dodaj termin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="form-group">
                            <label for="datepicker">Datum</label>
                            <input type="text" class="form-control" id="datepicker" placeholder="Izaberite datum" required>
                        </div>
                        <div class="form-group">
                            <label for="sluzba">Sluzba</label>
                            <select type="text" class="form-control" id="sluzba" value='' required>
                                <?php
                                include "connect.php";
                                $vratiSluzbe = "SELECT * FROM sluzba";
                                $sluzbe = $connection->query($vratiSluzbe);
                                while ($sluzba = $sluzbe->fetch_array()) :
                                    echo '<option value="' . $sluzba['id'] . '">' . $sluzba['naziv'] . '</option>';
                                endwhile; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="lekar">Lekar</label>
                            <select type="text" class="form-control" id="lekar" value='' required>
                                <option value="none" class="dropdown-item disabled">Izaberite sluzbu prvo</option>
                            </select>

                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Zatvori</button>
                    <button type="button" class="btn btn-primary">Sacuvaj</button>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    
    <script>
        $(function() {
            $("#datepicker").datepicker();
        });

        $(document).ready(function() {
            $('#sluzba').on('change', function() {
                var sluzbaID = $(this).val;
                if (sluzbaID) {
                    $.ajax({
                        url: 'lekarFilter.php',
                        type: 'POST',
                        data: {
                            id: $('#sluzba').val()
                        },
                        success: function(html) {
                            $('#lekar').html(html);
                        }
                    });
                }
            });
        });
    </script>

</body>

</html>