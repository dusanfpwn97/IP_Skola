<?php 


$validan = true;
$BrojIndeksa = $Ime = $Prezime = $VrstaStudija = $StatusStudija = $NazivIspita= "";
$greska_BrojIndeksa = $greska_Ime= $greska_Prezime= $greska_VrstaStudija= $greska_StatusStudija= $greska_NazivIspita= "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["BrojIndeksa"])) {
		$greska_BrojIndeksa = "Indeks je obavezan podatak";
		$validan = false;
	} else {
		$BrojIndeksa = $_POST["Ime"];
    }
    

    if (empty($_POST["Ime"])) {
		$greska_Ime = "Ime je obavezan podatak";
		$validan = false;
	} else {
		$Ime = $_POST["Ime"];
    }
    

	if (empty($_POST["Prezime"])) {
		$greska_Prezime = "Prezime je obavezan podatak";
		$validan = false;
	} else {
		$Prezime = $_POST["Prezime"];
	}

	if (empty($_POST["VrstaStudija"])) {
		$greska_VrstaStudija = "Vrsta studija je obavezan podatak";
		$validan = false;
	} else {
		$VrstaStudija = $_POST["VrstaStudija"];
    }
    
    if (empty($_POST["StatusStudija"])) {
		$greska_StatusStudija = "Status je obavezan podatak";
		$validan = false;
	} else {
		$StatusStudija = $_POST["StatusStudija"];
    }

    if (empty($_POST["NazivIspita"])) {
		$greska_NazivIspita = "Naziv je obavezan podatak";
		$validan = false;
	} else {
		$NazivIspita = $_POST["NazivIspita"];
    }

    if($validan){
		$host = "localhost";
		$username = "root";
		$password = "";
		$db = "prijava_baza";
	
		$con = new mysqli($host,$username,$password,$db);
	
		if(!$con){
			die("Greska: " . mysqli_error($con));
        }
        

        $sql = "INSERT INTO prijava_ispita(BrojIndeksa, Ime, Prezime,VrstaStudija,StatusStudija,NazivIspita) VALUES('".  $BrojIndeksa . "','". $Ime . "', '" . $Prezime . "', '" . $VrstaStudija. "', '".$StatusStudija."','".$NazivIspita."')";
		
		if (mysqli_query($con, $sql)) {
			echo "Upisano";
			
		} else {
			echo "Greška pri upisu: " . mysqli_error($con);
		}	

    }

}


    ?>
        <html>
        <head>
            <title>Unos</title>
            <meta charset="UTF-8" />
        </head>
        <body >
    
            <form name="Forma" onSubmit="Validacija()" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            Broj indeksa: <br>
            <input type="text" name="BrojIndeksa">*<?php echo $greska_BrojIndeksa;?>
            <br/><br/>    
            Ime: <br>
            <input type="text" name="Ime"> * <?php echo $greska_Ime;?>
            <br/><br/>
            Prezime: <br>
            <input type="text" name="Prezime">* <?php echo $greska_Prezime;?>
            <br/><br/>
            Vrsta studija: <br>
            <input type="text" name="VrstaStudija">* <?php echo $greska_VrstaStudija;?>
            <br/><br/>
            Status: <br>
            <input type="text" name="StatusStudija">* <?php echo $greska_StatusStudija;?>
            <br/><br/>
            Naziv ispita: <br>
            <input type="text" name="NazivIspita">* <?php echo $greska_NazivIspita;?>
            <br/><br/>
            
            <input type="submit" name="obrada" value="Upis">
    
            </form> 
<script>
 
 function Validacija(){
    if(document.Forma.BrojIndeksa.value == ""){
        alert("Broj indeksa je obavezan podatak");
    }
    if(document.Forma.Ime.value == ""){
        alert("Ime je obavezan podatak");
    }
    if(document.Forma.Prezime.value == ""){
        alert("Prezime je obavezan podatak");
    }
    if(document.Forma.VrstaStudija.value == ""){
        alert(" Vrsta Studija  je obavezan podatak");
    }
    if(document.Forma.StatusStudija.value == ""){
        alert("Status studija je obavezan podatak");
    }
    if(document.Forma.NazivIspita.value == ""){
        alert("Naziv ispita je obavezan podatak");
    }
 }

</script>
            </body>
</html> 




