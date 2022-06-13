<html>
  <head>
	<title> PHP i MySQL</title>
	<meta charset="UTF-8" />
  </head>
  <body>
  <?php 
	$naziv_hosta = "localhost";
	$username = "root";
	$password = "";

// kreiranje konekcije
	$kon = mysqli_connect($naziv_hosta
		, $username, $password);
	// Provera konekcije 
	if (!$kon) {
		die("Neuspešno povezivanje: " 
			 . mysqli_connect_error());
	}
	echo "Uspešno povezan. ";
	//kreiranje baze podataka
	$sql = "CREATE DATABASE IF NOT EXISTS StudentskaSluzba";
	if (mysqli_query($kon, $sql)) {
		echo " Baza podataka kreirana ";
	} else {
		echo "Greška: " . mysqli_error($kon);
	}
	mysqli_close($kon);
	
	$naziv_baze = "StudentskaSluzba";
	// kreiranje konekcije
	$kon = mysqli_connect($naziv_hosta
		, $username
		, $password
		, $naziv_baze);
	// Provera konekcije
	if (!$kon) {
		die("Neuspešno povezivanje: " 
			 . mysqli_connect_error());
	}
	echo "Uspešno povezan ";
	//kreiranje tabele Prijave
	$sql = "CREATE TABLE 
		IF NOT EXISTS Prijave(
		IdPrijave INT(6) UNSIGNED 
			AUTO_INCREMENT PRIMARY KEY, 
		Ime VARCHAR(30) NOT NULL,
		Prezime VARCHAR(30) NOT NULL,
		NazivPredmeta VARCHAR(30) NOT NULL,
		IspitniRok VARCHAR(15)
	)";
	//izvrsenje sql izraza 
	if (mysqli_query($kon, $sql)) {
		echo " Tabela Prijava kreirana ";
	} else {
		echo "Greška: " . mysqli_error($kon);
	}
	
	mysqli_close($kon);

	?>
  </body>
</html>
