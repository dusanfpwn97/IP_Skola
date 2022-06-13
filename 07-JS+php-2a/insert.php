<?php 


$validan = true;
$BrojIndeksa = $Ime = $Prezime = $VrstaStudija = $StatusStudija = $NazivIspita= "";
$greska_BrojIndeksa = $greska_Ime= $greska_Prezime= $greska_VrstaStudija= $greska_StatusStudija= $greska_NazivIspita= "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["BrojIndeksa"])) {
		$greska_BrojIndeksa = "Indeks je obavezan podatak";
		$validan = false;
	} else {
		$BrojIndeksa = $_POST["BrojIndeksa"];
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
    <meta charset="utf-8">
    <Title>ВТШСС Пожаревац</Title>
    <Link rel="stylesheet" type="text/css" href="stil.css">
    <script>
    </script>
</head>

<body OnLoad="PokreniFunkcije()">
    <div class="zaglavlje" id="vrh">
        <div class="naslov">
            Висока техничка школа Пожаревац
        </div>
        <div class="meni">
            <a href="index.html">Добродошли</a>
            <a href="Oskoli.html">О школи</a>
            <a href="StudijskiProgrami.html">Студијски програми</a>
            <a href="insert.php">Пријава испита</a>

        </div>
        <div class="senkaispod"></div>
    </div>
    <div class="kontejner">
        <div class="levo">
            <img src="slike/logo.png" />
            <br><br> Висока техничка школа <br> струковних студија <br> Пожаревац
            <br> Немањина 2
        </div>
        <div class="sadrzaj">
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
        </div>
        <div class="desno">
            <p><b>Вести и обавештења:</b></p>
            <div class="vesti">
                <div id="vesti">
                    <a href="index.html">Микроконтролери - резултати испита одржаног 5.2.2018. године</a>
                    <a href="index.html">ХЕМИЈA - резултати испита - јануар 2018</a>
                    <a href="index.html">Аутоматско управљање и Аутоматизација - резултати испита - Јануар 2018.</a>
                    <a href="index.html">Електротехника и електроника - резултати другог колоквијума од 22.01.2018.</a>
                    <a href="index.html">Колоквијум из математике - јануар 2018</a>
                    <a href="index.html">Хемија - резултати колоквијума - јан. 2018</a>
                    <a href="index.html">Сушење, дорада и складиштење пољопривредних производа - резултати колоквијума - 25. јануар 2018</a>
                    <a href="index.html">Распоред испита Заштита биља - Пољопривреда - јан-феб - 2018</a>
                    <a href="index.html">Машинство - распоред испита - јан-феб. - 2018.</a>
                    <a href="index.html">Електротехника и рачунарство - распоред испита у јануарско/фебруарском року 2018. </a>
                    <a href="index.html">ЗЖС - Распоред испита - јан-феб - 2018 </a>
                    <a href="index.html">Распоред испита ПTиН - јан-феб - 2018 </a>
                    <a href="index.html">Распоред колоквијума - ЗБ - Пољоп. - Јан-Феб 2018 </a>
                    <a href="index.html">Консултације код Проф. др Јасминке Ђорђевић Милорадовић </a>
                    <a href="index.html">Аутоматско управљање - резултати колоквијума од 16.1.2018. године </a>
                    <a href="index.html">ПТиН - Испитна питања - Биологија 1 - јануар 2018 </a>
                    <a href="index.html">ЗЖС - Испитна питања - Биологија 1 - јануар 2018 </a>
                    <a href="index.html">Испити код др Горана Ђорђевића - јан-феб. 2018. </a>
                    <a href="index.html">Испитна питања из предмета Загађењe и заштитa земљишта - јануар 2018. </a>
                    <a href="index.html">Испитна питања из предмета Физика и хемија земљишта - јануар 2018. </a>
                </div>
            </div>
        </div>
        <div style="clear:both;"></div>
    </div>

    </div>
           
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




