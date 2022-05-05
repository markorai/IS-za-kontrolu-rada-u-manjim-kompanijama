<?php 
session_start();

if (isset($_SESSION['menadžer_id']) && isset($_SESSION['korisnicko_ime'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="menadžer.css?<?php echo time(); ?>" />
</head>
<body>


<div class="top">
<h3>Dodaj zaposlenog</h3>
<input type="button" value="Odjava" class="homebutton" id="btnHome" 
onClick="document.location.href='http://localhost/IS%20za%20kontrolu%20rada/index.php'" />
</div>





<form action="dodaj_zaposlenog.php" method="post">
  <div class="container">

    <label for="ime">Ime</label>
    <input type="text" id="ime" name="ime" placeholder="Ime"  required>

    <label for="prezime">Prezime</label>
    <input type="text" id="prezime" name="prezime" placeholder="Prezime" required>

    <label for="datum_rodjenja">Datum rođenja</label>
    <input type="date" id="datum_rođenja" name="datum_rođenja" placeholder="Datum rođenja" required>

    <label for="datum_zaposlenja">Datum zaposlenja</label>
    <input type="date" id="datum_zaposlenja" name="datum_zaposlenja" placeholder="Datum zaposlenja" required>

   <label for="jmbg">Matični broj</label>
    <input type="text" id="jmbg" name="jmbg" placeholder="Matični broj" required>
 
   <label for="telefon">Broj telefona</label>
    <input type="text" id="telefon" name="telefon" placeholder="Broj telefona" required>

    <label for="email">Email</label>
    <input type="text" id="email" name="email" placeholder="Email" required>

    <input type="submit" value="Dodaj">
    </div>
  </form>


</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>