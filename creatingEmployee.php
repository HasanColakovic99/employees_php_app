<?php 

    require './baza.class.php';

    $veza = new Baza();
    $veza->spojiDB();

    if(isset($_POST['submitBtn'])){
        $ime = $_POST['ime'];
        $prezime = $_POST['prezime'];
        $url = $_POST['url'];
        $spol = $_POST['spol'];
        $datum_rodjenja = $_POST['datum_rodjenja'];
        $pocetak_rada = $_POST['pocetak_rada'];
        $vrsta_ugovora = $_POST['vrsta_ugovora'];
        $trajanje_ugovora = $_POST['trajanje_ugovora'];
        $odjel = $_POST['odjel'];
        $broj_dana_godisnjeg = $_POST['broj_dana_godisnjeg'];
        $broj_slobodnih_dana = $_POST['broj_slobodnih_dana'];
        $broj_dana_placenog_dopusta = $_POST['broj_dana_placenog_dopusta'];
        
        $sql = "INSERT INTO zaposlenik (ime, prezime, slika, spol, godina_rodjenja, pocetak_rada, vrsta_ugovora, trajanje_ugovora, odjel, broj_dana_godisnjeg, broj_slobodnih_dana, broj_dana_placenog_dopusta) VALUES ('$ime', '$prezime', '$url', '$spol', '$datum_rodjenja', '$pocetak_rada', '$vrsta_ugovora', '$trajanje_ugovora', '$odjel', '$broj_dana_godisnjeg', '$broj_slobodnih_dana', '$broj_dana_placenog_dopusta')";
        
        $rezultat = $veza->selectDB($sql);
        
        
        if($rezultat){
            echo '<p class="message success">Uspješno ste dodali novog zaposlenika!</p>';
            header("Refresh:3");
        }
        else {
            echo '<p class="message error">Došlo je do pogreške, pokušajte ponovo!</p>';
            header("Refresh:3");
        }
    }
    
    $veza->zatvoriDB();
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/0fdcc0623c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./style/forma.css" />
    <title>Kreiranje zaposlenika</title>
</head>
<body>
    <form method="post" action="creatingEmployee.php">
        <div class="container">
            <label for="ime">Ime</label>
            <input type="text" id="ime" name="ime"/>
        </div>

        <div class="container">
            <label for="prezime">Prezime</label>
            <input type="text" id="prezime" name="prezime"/>
        </div>

        <div class="container">
            <label for="url">Url slike</label>
            <input type="url" id="url" name="url"/>
        </div>

        <div class="container">
            <label for="spol">Spol</label>
            <select id="spol" name="spol">
                <option value="Žensko">Žensko</option>
                <option value="Muško">Muško</option>
            </select>
        </div>

        <div class="container">
            <label for="datum_rodjenja">Datum rođenja</label>
            <input type="date" id="datum_rodjenja" name="datum_rodjenja"/>
        </div>

        <div class="container">
            <label for="pocetak_rada">Početak rada</label>
            <input type="date" id="pocetak_rada" name="pocetak_rada"/>
        </div>

        <div class="container">
            <label for="vrsta_ugovora">Vrsta ugovora</label>
            <select id="vrsta_ugovora" name="vrsta_ugovora">
                <option value="Određeno">Određeno</option>
                <option value="Neodređeno">Neodređeno</option>
            </select>
        </div>

        <div class="container">
            <label for="trajanje_ugovora">Trajanje ugovora</label>
            <input type="text" id="trajanje_ugovora" name="trajanje_ugovora" />
        </div>

        <div class="container">
            <label for="odjel">Odjel</label>
            <input type="text" id="odjel" name="odjel"/>
        </div>

        <div class="container">
            <label for="broj_dana_godisnjeg">Broj dana godišnjeg</label>
            <input type="number" id="broj_dana_godisnjeg" name="broj_dana_godisnjeg"/>
        </div>

        <div class="container">
            <label for="broj_slobodnih_dana">Broj slobodnih dana</label>
            <input type="number" id="broj_slobodnih_dana" name="broj_slobodnih_dana"/>
        </div>

        <div class="container">
            <label for="broj_dana_placenog_dopusta">Broj dana plaćenog dopusta</label>
            <input type="number" id="broj_dana_placenog_dopusta" name="broj_dana_placenog_dopusta"/>
        </div>

        <div class="container">
            <input type="submit" id="submit" name="submitBtn" value="+ Dodaj"/>
    
            <a href="index.php">
                <i class="fa-solid fa-arrow-left"></i>
                Nazad
            </a>
        </div>

    </form>


</body>
</html>