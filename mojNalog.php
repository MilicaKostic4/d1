<?php
require "connect.php";
?>

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
                <th scope="col">Datum</th>
                <th scope="col">Sluzba</th>
                <th scope="col">Lekar</th>
                <th scope="col">Opcije</th>
            </tr>
        </thead>
        <tbody id="termini">
            <?php
            $termini = $connection->query("SELECT * FROM termin");
            while ($termin = $termini->fetch_array()) :
            ?>
                <tr>
                    <td data-target="datum"><?php echo $termin["datum"] ?></td>
                    <td data-target="sluzba"><?php echo $termin["sluzba"] ?></td>
                    <td data-target="lekar"><?php echo $termin["lekar"] ?></td>
                    <td>
                        <button id="dugmeObrisi" name="dugmeObrisi" class="btn btn-danger" onclick="obrisiTermin(<?php echo $termin["id"] ?>)" data-id1="<?php echo $termin["id"] ?>">Obrisi</button>
                        <button id="izmena" type="button" class="btn btn-success" data-toggle="modal" data-target="#modal1" data-id2="<?php echo $termin["id"] ?>">Izmeni</button>
                    </td>
                </tr>
            <?php
            endwhile;
            ?>
        </tbody>
    </table>


    <!-- Modal izmeni termin -->
    <div class="modal hide fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabelIzmeni">Izmeni termin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form method="post" id="formaIzmeni">
                    <div class="modal-body">
                        <div style="display: none;" class="form-group">
                            <label for="idTermina">IdTermina</label>
                            <input id="idTermina" type="text" name="idTermina" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="datepicker2">Datum</label>
                            <input type="text" name="datum" class="form-control datepicker" id="datepicker2" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label for="sluzbaIzmena">Sluzba</label>
                            <select type="text" name="sluzba" class="form-control sluzba" id="sluzbaIzmena" value='' required>
                                <?php
                                $sluzbe = $connection->query("SELECT * FROM sluzba");
                                while ($sluzba = $sluzbe->fetch_array()) :
                                    echo '<option value="' . $sluzba['id'] . '" name="' . $sluzba['naziv'] . '">' . $sluzba['naziv'] . '</option>';
                                endwhile;
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="lekarIzmena">Lekar</label>
                            <select type="text" name="lekar" class="form-control lekar" id="lekarIzmena" value='' required>
                                <option value="none" class="dropdown-item disabled">Izaberite sluzbu prvo</option>
                            </select>
                        </div>
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Zatvori</button>
                    <button id="sacuvajIzmenu" type="submit" id="dugmeIzmeni" name="dugmeIzmeni" class="btn btn-info">Sacuvaj</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Button trigger modal dodaj termin -->
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalDodaj" data-whatever="@dodaj">
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

                <form method="post" id="formaDodaj">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="datepicker">Datum</label>
                            <input type="text" name="datum" class="form-control datepicker" id="datepicker" placeholder="Izaberite datum" required>
                        </div>
                        <div class="form-group">
                            <label for="sluzba">Sluzba</label>
                            <select type="text" name="sluzba" class="form-control sluzba" id="sluzba" value='' required>
                                <?php
                                $vratiSluzbe = "SELECT * FROM sluzba";
                                $sluzbe = $connection->query($vratiSluzbe);
                                while ($sluzba = $sluzbe->fetch_array()) :
                                    echo '<option value="' . $sluzba['id'] . '">' . $sluzba['naziv'] . '</option>';
                                endwhile;
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="lekar">Lekar</label>
                            <select type="text" name="lekar" class="form-control lekar" id="lekar" value='' required>
                                <option value="none" class="dropdown-item disabled">Izaberite sluzbu prvo</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Zatvori</button>
                            <button type="submit" id="dugmeDodaj" name="dugmeDodaj" class="btn btn-info">Sacuvaj</button>
                        </div>
                </form>



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
            $(".datepicker").datepicker({
                dateFormat: 'dd-mm-yy'
            });
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

            $('#sluzbaIzmena').on("click", function() {
                var sluzbaID = $(this).val;
                if (sluzbaID) {
                    $.ajax({
                        url: 'lekarFilter.php',
                        type: 'POST',
                        data: {
                            id: $('#sluzbaIzmena').val(),
                        },
                        success: function(html) {
                            $('#lekarIzmena').html(html);
                        }
                    });
                }
            });


            $('.btn-success').click(function() {
                const idTerm = $(this).attr('data-id2');
                var datum = $(this).closest('tr').children('td[data-target=datum]').text();
                var sluzbaNaziv = $(this).closest('tr').children('td[data-target=sluzba]').text();
                var lekar = $(this).closest('tr').children('td[data-target=lekar]').text();
                req = $.ajax({
                    url: 'model/termin.php',
                    type: 'POST',
                    data: {
                        name: sluzbaNaziv
                    },
                });
                req.done(function(response, textStatus, jqXHR) {
                    sluzba = response;

                    console.log(idTerm);
                    console.log(datum);
                    console.log(sluzba);
                    console.log(lekar);

                    $('#idTermina').val(idTerm);
                    $('#datepicker2').val(datum);
                    document.getElementById('sluzbaIzmena').value = sluzba;
                    document.getElementById('lekarIzmena').value = lekar;


                });
            });

            //izmena
            $('#sacuvajIzmenu').click(function() {
                request = $.ajax({
                    url: 'handler/update.php',
                    type: 'POST',
                    data: {
                        idT: $('#idTermina').val(),
                        datum: $('#datepicker2').val(),
                        sluzba: $('#sluzbaIzmena').val(),
                        lekar: $('#lekarIzmena').val()
                    }
                });

                request.done(function(response, textStatus, jqXHR) {
                    alert(response);
                    if (response == "Uspesno") {
                        alert("Uspesno ste izmenili termin");
                        location.reload(true);
                        console.log('Izmenjen termin');
                    } else {
                        console.log("Termin nije izmenjen " + response);
                        alert("Neuspesna izmena termina");
                    }
                });

                request.fail(function(jqXHR, textStatus, errorThrown) {
                    console.error('Desila se greska: ' + textStatus, errorThrown);
                });
            });


            //dodavanje
            $('#formaDodaj').submit(function() {
                event.preventDefault();
                console.log("Dodavanje");
                const $form = $(this);
                const $input = $form.find('input, select, button, textarea');
                const serijalizacija = $form.serialize();

                console.log(serijalizacija);
                $input.prop('disabled', true);

                request = $.ajax({
                    url: 'handler/add.php',
                    type: 'POST',
                    data: serijalizacija
                });

                request.done(function(response, textStatus, jqXHR) {
                    if (response == "Uspesno") {
                        alert("Uspesno ste dodali termin");
                        location.reload(true);
                        console.log('Dodat termin');
                    } else {
                        console.log("Termin nije dodat " + response);
                        alert("Neuspesno dodavanje termina");
                    }
                });

                request.fail(function(jqXHR, textStatus, errorThrown) {
                    console.error('Desila se greska: ' + textStatus, errorThrown);
                });
            });

        });
    </script>

    <script>
        //brisanje
        function obrisiTermin(deleteid) {
            console.log('ID je: ' + deleteid);
            request = $.ajax({
                url: 'handler/delete.php',
                type: 'POST',
                data: {
                    id: deleteid
                }
            });

            request.done(function(response, textStatus, jqXHR) {
                if (response == "Uspesno") {
                    $(this).closest('tr').remove();
                    alert('Uspesno ste obrisali termin');
                    location.reload(true);
                    console.log('Obrisan termin');
                } else {
                    console.log("Termin nije izbrisan " + response);
                    alert("Neuspesno brisanje termina");
                }
            });
            request.fail(function(jqXHR, textStatus, errorThrown) {
                console.error('Desila se greska: ' + textStatus, errorThrown);
            });

        };
    </script>

</body>

</html>