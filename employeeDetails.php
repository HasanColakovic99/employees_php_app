<?php 
    require './baza.class.php';
    $veza = new Baza();
    $veza->spojiDB();
    
    $id = $_GET['id'];
    $sql = "SELECT * FROM zaposlenik WHERE zaposlenik_id='".$id."'";
    $rezultat = $veza->selectDB($sql);

    $veza->zatvoriDB();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/0fdcc0623c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./style/zaposlenik.css" />
    <title>Zaposlenik</title>
</head>

<body>

    <a href="index.php">
        <i class="fa-solid fa-arrow-left"></i>
        Nazad
    </a>

    <div class="employee">
        <?php
        if (mysqli_num_rows($rezultat) > 0) {
            while($row = mysqli_fetch_assoc($rezultat)) {
        ?>
        <div class="employee__info">
            <figure>
                <img src="<?php echo $row['slika']?>"/>
            </figure>
            <h1><?php echo $row['ime'] . ' ' . $row['prezime']?><h1>
        </div>
    
        <div class="employee__data">
            <table cellspacing="20">
                <tr>
                    <th>Spol</th>
                    <th>Datum rođenja</th>
                    <th>Početak rada</th>
                    <th>Vrsta ugovora</th>
                    <th>Trajanje ugovora</th>
                    <th>Odjel</th>
                    <th>Godišnji</th>
                    <th>Slobodni dani</th>
                    <th>Plaćen dopust</th>
                </tr>

                <tr>
                    <td><?php echo $row['spol']; ?> </td>
                    <td><?php echo $row['godina_rodjenja']; ?> </td>
                    <td><?php echo $row['pocetak_rada']; ?> </td>
                    <td><?php echo $row['vrsta_ugovora']; ?> </td>
                    <td><?php echo $row['trajanje_ugovora']; ?> </td>
                    <td><?php echo $row['odjel']; ?> </td>

                    <?php
                        if($row['broj_dana_godisnjeg'] == 0){
                            echo '<td class="nepoznato">Nije definirano</td>';
                        }
                        else {
                    ?>
                        <td><?php echo $row['broj_dana_godisnjeg']; ?> </td>
                    <?php
                        }
                    ?>

                    <?php
                        if($row['broj_slobodnih_dana'] == 0){
                            echo '<td class="nepoznato">Nije definirano</td>';
                        }
                        else {
                    ?>
                        <td><?php echo $row['broj_slobodnih_dana']; ?> </td>
                    <?php
                        }
                    ?>

                    <?php
                        if($row['broj_dana_placenog_dopusta'] == 0){
                            echo '<td class="nepoznato">Nije definirano</td>';
                        }
                        else {
                    ?>
                        <td><?php echo $row['broj_dana_placenog_dopusta']; ?> </td>
                    <?php
                        }
                    ?>
                <tr>
                <?php
                }
            } 
            else { ?>
                <tr>
                <td colspan="8">Nismo pronašli nikakve podatke u bazi!</td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>

</body>
</html>