<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['korisnicko_ime']) && isset($_POST['lozinka'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['korisnicko_ime']);
	$pass = validate($_POST['lozinka']);
	$role = validate($_POST['tip_naloga']);

	if (empty($uname)) {
		header("Location: index.php?error= Unesite korisničko ime!");
	    exit();
	}else if(empty($pass)){
        header("Location: index.php?error= Unesite lozinku !");
	    exit();
	}
	// za radnika
	if($role === 'radnik'){
	
		$sql = "SELECT * FROM radnik WHERE korisnicko_ime='$uname' AND lozinka='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['korisnicko_ime'] === $uname && $row['lozinka'] === $pass) {
            	$_SESSION['korisnicko_ime'] = $row['korisnicko_ime'];
            	$_SESSION['radnik_id'] = $row['radnik_id'];
            	header("Location: radnik.php");
		        exit();
            }else{
				header("Location: index.php?error= Pogrešno korisničko ime ili lozinka");
		        exit();
			}
		}else{
			header("Location: index.php?error= Pogrešno korisničko ime ili lozinka");
	        exit();
		}
	}

	// za menadžera

	if($role === 'menadžer'){
		
		$sql = "SELECT * FROM menadžer WHERE korisnicko_ime='$uname' AND lozinka='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['korisnicko_ime'] === $uname && $row['lozinka'] === $pass) {
            	$_SESSION['korisnicko_ime'] = $row['korisnicko_ime'];
            	$_SESSION['menadžer_id'] = $row['menadžer_id'];
            	header("Location: menadžer.php");
				exit("tuspmo");
		        exit();
            }else{
				header("Location: index.php?error= Pogrešno korisničko ime ili lozinka");
		        exit();
			}
		}else{
			header("Location: index.php?error= Pogrešno korisničko ime ili lozinka");
	        exit();
		}
	}
	
}else{
	header("Location: index.php");
	exit();
}