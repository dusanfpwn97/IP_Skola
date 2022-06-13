<html>
  <head>
	<title>PHP CRUD aplikacija</title>
	<meta charset="UTF-8" />
  </head>
  <body>
	<h1>Telefonski imenik</h1>
	<a href="NovaPrijava.php">Nova prijava</a>
	<h2>Lista postojećih kontakata</h2>
  <?php 
	//require_once "51-config.php";
	$naziv_hosta = "localhost";
	$username = "root";
	$password = "";
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
	//Prikaz kontakata
	$sql = "SELECT idPrijave, Ime, Prezime, NazivPredmeta, IspitniRok 
		FROM Prijave";
	$rezultat = mysqli_query($kon, $sql);	//u promenljivoj $rezultat je tabela sa podacima iz baze
	if (mysqli_num_rows($rezultat) > 0) {
		//Prikaz HTML tabele sa 2 kolone bez ivica
		echo "<table>";
		while($red = mysqli_fetch_assoc($rezultat)) {
			//$red je niz sa podacima o jednom kontaktu
			//Započinje se red, u prvom polju ime ...
			echo "<tr><td width=300px>" . $red["idPrijave"]. ". " 
				. $red["Ime"]. " " . $red["Prezime"]
				. " - " . $red["NazivPredmeta"]
				. " - " . $red["IspitniRok"];
			echo "</td><td>";
			//Druga ćelija sadrži linkove za izmenu ...
			echo "<a href='53-prikaz.php?id="
				. $red['idPrijave'] ."'>Prikaz</a> ";
			//link iza adrese sadrži ?Id=..
			//što predstavlja prosleđivanje vrednosti id
			echo "<a href='54-izmena.php?id="
				. $red['idPrijave'] ."'>Izmena</a> ";
			echo "<a href='55-brisanje.php?id="
				. $red['idPrijave'] ."'>Brisanje</a> ";
			echo "</td></tr>";
		}	
		echo "</table>";
	} else {
		echo "<p>U tabeli nema kontakata</p>";
	}
	mysqli_close($kon);
	?>
  </body>
</html>
