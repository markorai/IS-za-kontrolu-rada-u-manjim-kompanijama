<?php 
include "db_conn.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ime = test_input($_POST["ime"]);
    $prezime = test_input($_POST["prezime"]);
    $datum_rođenja = test_input($_POST["datum_rođenja"]);
    $datum_zaposlenja = test_input($_POST["datum_zaposlenja"]);
    $jmbg = test_input($_POST["jmbg"]);
    $telefon = test_input($_POST["telefon"]);
    $email = test_input($_POST["email"]);
  }else{
    header("Location: menadžer.php?error= Greška!");
  }
  
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $sql = "INSERT INTO zaposleni (ime, prezime, datum_rodjenja,datum_zaposlenja,jmbg,telefon,email)
VALUES ('$ime','$prezime','$datum_rođenja','$datum_zaposlenja','$jmbg','$telefon','$email')";

if (mysqli_query($conn, $sql)) {
 
  header("Location: success_menadžer.php");
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
  ?>