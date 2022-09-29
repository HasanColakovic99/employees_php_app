<?php
    require './baza.class.php';
    $veza = new Baza();
    $veza->spojiDB();
    $sql = "SELECT zaposlenik_id, ime, prezime, spol, godina_rodjenja, pocetak_rada, vrsta_ugovora, trajanje_ugovora, odjel FROM zaposlenik";
    $rezultat = $veza->selectDB($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/0fdcc0623c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./style/style.css" />
    <title>Zaposlenici</title>
</head>

<body>

    <div class="employees">
        <div class="employees__header">
            <h1>Popis zaposlenika</h1>
            <a href="dodavanjeZaposlenika.php" class="new__employee">+ Dodaj zaposlenika</a>
        </div>

        <div class="employees__content">
            <ul>
                <?php
                if (mysqli_num_rows($rezultat) > 0) {
                    while($row = mysqli_fetch_assoc($rezultat)) {
                ?>
                <a href="zaposlenik.php?id=<?php echo $row['zaposlenik_id'] ?>"> 
                    <li>
                        <?php echo $row['ime'] . ' ' . $row['prezime'] ?>
                        <a>
                            <i class="fa-solid fa-pencil"></i>
                        </a> 
                    </li>
                </a>
                <?php
                    }
                }
                ?> 
            </ul>
        </div>
    </div>

</body>
</html>