<?php 

    require './baza.class.php';

    $id = $_GET['id'];

    $veza = new Baza();
    $veza->spojiDB();
    $sql = "SELECT * FROM zaposlenik WHERE zaposlenik_id='".$id."'";
    $rezultat = $veza->selectDB($sql);
    $row = mysqli_fetch_assoc($rezultat);

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
        
        $upit = "UPDATE zaposlenik SET ime='$ime', prezime='$prezime', slika='$url', spol='$spol', godina_rodjenja='$datum_rodjenja', pocetak_rada='$pocetak_rada', vrsta_ugovora='$vrsta_ugovora', trajanje_ugovora='$trajanje_ugovora', odjel='$odjel', broj_dana_godisnjeg='$broj_dana_godisnjeg', broj_slobodnih_dana='$broj_slobodnih_dana', broj_dana_placenog_dopusta='$broj_dana_placenog_dopusta' WHERE zaposlenik_id='$id'";
        
        $result = $veza->selectDB($upit);
         
        if($result){
            echo '<p class="message success">Uspješno ste ažurirali zaposlenika!</p>';
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
    <title>Ažuriranje zaposlenika</title>
</head>
<body>
    <form method="post" action="updatingEmployee.php?id=<?php echo $row['zaposlenik_id']?>">
        <div class="container">
            <label for="ime">Ime</label>
            <input type="text" id="ime" name="ime" value="<?php echo $row['ime']?>"/>
        </div>

        <div class="container">
            <label for="prezime">Prezime</label>
            <input type="text" id="prezime" name="prezime" value="<?php echo $row['prezime']?>"/>
        </div>

        <div class="container">
            <label for="url">Url slike</label>
            <input type="url" id="url" name="url" value="<?php echo $row['slika']?>"/>
        </div>

        <div class="container">
            <label for="spol">Spol</label>
            <select id="spol" name="spol">
                <?php 
                    if($row['spol'] == "Muško"){
                        echo '<option value="Muško" selected>Muško</option>';
                        echo '<option value="Žensko">Žensko</option>';
                    }
                    else {
                        echo '<option value="Muško">Muško</option>';
                        echo '<option value="Žensko" selected>Žensko</option>';
                    }
                ?>
            </select>
        </div>

        <div class="container">
            <label for="datum_rodjenja">Datum rođenja</label>
            <input type="date" id="datum_rodjenja" name="datum_rodjenja" value="<?php echo $row['godina_rodjenja']?>"/>
        </div>

        <div class="container">
            <label for="pocetak_rada">Početak rada</label>
            <input type="date" id="pocetak_rada" name="pocetak_rada" value="<?php echo $row['pocetak_rada']?>"/>
        </div>

        <div class="container">
            <label for="vrsta_ugovora">Vrsta ugovora</label>
            <select id="vrsta_ugovora" name="vrsta_ugovora">
                <?php 
                    if($row['vrsta_ugovora'] == "Određeno"){
                        echo '<option value="Određeno" selected>Određeno</option>';
                        echo '<option value="Neodređeno">Neodređeno</option>';
                    }
                    else {
                        echo '<option value="Određeno">Određeno</option>';
                        echo '<option value="Neodređeno" selected>Neodređeno</option>';
                    }
                ?>
            </select>
        </div>

        <div class="container">
            <label for="trajanje_ugovora">Trajanje ugovora</label>
            <input type="text" id="trajanje_ugovora" name="trajanje_ugovora" value="<?php echo $row['trajanje_ugovora']?>"/>
        </div>

        <div class="container">
            <label for="odjel">Odjel</label>
            <input type="text" id="odjel" name="odjel" value="<?php echo $row['odjel']?>"/>
        </div>

        <div class="container">
            <label for="broj_dana_godisnjeg">Broj dana godišnjeg</label>
            <input type="number" id="broj_dana_godisnjeg" name="broj_dana_godisnjeg" value="<?php echo $row['broj_dana_godisnjeg']?>"/>
        </div>

        <div class="container">
            <label for="broj_slobodnih_dana">Broj slobodnih dana</label>
            <input type="number" id="broj_slobodnih_dana" name="broj_slobodnih_dana" value="<?php echo $row['broj_slobodnih_dana']?>"/>
        </div>

        <div class="container">
            <label for="broj_dana_placenog_dopusta">Broj dana plaćenog dopusta</label>
            <input type="number" id="broj_dana_placenog_dopusta" name="broj_dana_placenog_dopusta" value="<?php echo $row['broj_dana_placenog_dopusta']?>"/>
        </div>

        <div class="container">
            <input type="submit" id="submit" name="submitBtn" value="Ažuriraj"/>
    
            <a href="index.php">
                <i class="fa-solid fa-arrow-left"></i>
                Nazad
            </a>
        </div>

    </form>
</body>
</html>