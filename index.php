<!DOCTYPE html>
<html>
<head>
	<title>Prijava na sistem</title>
	<link rel="stylesheet" type="text/css" href="style.css?<?php echo time(); ?>" />
</head>
<body>
     <form action="login.php" method="post">
     	<h2>Prijava na sistem</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>Korisničko ime</label>
     	<input type="text" name="korisnicko_ime" placeholder="User Name"><br>

     	<label>Lozinka</label>
     	<input type="password" name="lozinka" placeholder="Password"><br>

		 <label>Tip naloga:</label>
		
		 <select name="tip_naloga" id="tip_naloga">
			<option value="radnik">Radnik</option>
			<option value="menadžer">Menadžer</option>
</select>

     	<button type="submit">Prijava</button>
     </form>
</body>
</html>