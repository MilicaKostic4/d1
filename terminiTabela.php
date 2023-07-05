<?php

include "connect.php";

if (!empty($_POST["query"])) {
    $search = mysqli_real_escape_string($connection, $_POST["query"]);
    $vratiTermine = "SELECT * FROM termin WHERE datum LIKE '%" . $search . "%' OR sluzba LIKE '%" . $search . "%' OR lekar LIKE '%" . $search . "%'";
} else {
    $vratiTermine = "SELECT * FROM termin";
}
$termini = $connection->query($vratiTermine);

if ($termini->num_rows <= 0) {
    echo 'Nema termina za zadati kriterijum';
} else {


?>

    <html>
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

    </html>
<?php } ?>