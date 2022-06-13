<?php
$validan = true;
$ime = $prezime = $NazivPredmeta
	= $IspitiRok = "";
$greska_ime = $greska_prezime = $greska_NazivPredmeta = "";
if ($_SERVER["REQUEST_METHOD"]=="POST"){
//Validacija podataka i preuzimanje vrednosti
	if (empty($_POST["ime"])) {
		$greska_ime = "Ime je obavezan podatak";
		$validan = false;
	} else {
		$ime = provera($_POST["ime"]);
	}
	if (empty($_POST["prezime"])) {
	 $greska_prezime="Prezime je obavezan podatak";
	 $validan = false;
	} else {
		$prezime = provera($_POST["prezime"]);
	}
	if (empty($_POST["NazivPredmeta"])) {
		$greska_NazivPredmeta="Telefon je obavezan podatak";
		$validan = false;
	} else {
		$NazivPredmeta = provera($_POST["NazivPredmeta"]);
	}
	$IspitniRok=provera($_POST["IspitniRok"]);
	//Ako je unos validiran upis u bazu
	if($validan){
		$naziv_hosta = "localhost";
		$username = "root";
		$password = "";
		$naziv_baze = "StudentskaSluzba";
		// kreiranje konekcije
			$kon = mysqli_connect($naziv_hosta, 
				$username, $password, $naziv_baze);
			// Provera konekcije			
			if (!$kon) {
			die("Neuspešno povezivanje: " 
			 . mysqli_connect_error());
		}
		$sql = "INSERT INTO Prijave(Ime, Prezime, "
			. "NazivPredmeta, IspitniRok) VALUES('"
			. $ime . "', '" . $prezime . "', '" . $NazivPredmeta
			. "', '" . $IspitniRok . "')";
		if (mysqli_query($kon, $sql)) {
			header("location: lista.php");
			exit();
		} else {
			echo "Greška pri upisu: " . mysqli_error($kon);
		}	
	}
}
//Funkcija koja uklanja nedozvoljene znakove iz teksta
function provera($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<html>
	<head>
		<title>PHP CRUD aplikacija</title>
		<meta charset="UTF-8" />
	</head>
	<body>
		<h1>Prijava ispita</h1>
		<a href="Lista.php">Početak</a>
		<h2>Unos nove prijave</h2>
		<!--Prikaz forme-->
		<form method="post" action="<?php 
		echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		Ime: <input type="text" name="ime">* 
		<?php echo $greska_ime;?><br/><br/>
		Prezime:<input type="text" name="prezime">* 
		<?php echo $greska_prezime;?><br/><br/>
		Naziv predmeta: <input type="text" name="NazivPredmeta">* 
		<?php echo $greska_NazivPredmeta;?><br/><br/>
		Ispitni rok: <input type="text" name="IspitniRok">
		<br/><br/>
		<input type="submit" name="obrada" value="Upis">
		</form> 
	</body>
</html>
