<?php 

    $host = "localhost";
    $username = "root";
    $password = "";

    $con = new mysqli($host,$username,$password);

    if(!$con){
        die("Greska: " . mysqli_error($con));
    }

    $sql = "CREATE DATABASE IF NOT EXISTS prijava_baza";
    if(mysqli_query($con,$sql)){
        echo "prijava_baza kreirana! <br>";
    }
    else{
        echo "Greska: " . mysqli_error($con);
    }

    $db = "prijava_baza";
    mysqli_select_db($con,$db);

    $sql = "CREATE TABLE IF NOT EXISTS prijava_ispita(
        ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        BrojIndeksa VARCHAR (30) NOT NULL,
        Ime VARCHAR (30) NOT NULL,
        Prezime VARCHAR (30) NOT NULL,
        VrstaStudija VARCHAR (30) NOT NULL,
        StatusStudija VARCHAR (30) NOT NULL,
        NazivIspita VARCHAR (30) NOT NULL
    )";

    if(mysqli_query($con,$sql)){
        echo "prijava_baza kreirana! <br>";
    }
    else{
        echo "Greska: " . mysqli_error($con);
    }

    $sql = "INSERT INTO prijava_tabela(BrojIndeksa,Ime,Prezime,VrstaStudija,StatusStudija,NazivIspita) VALUES('123123/18','Petar','Petrovic','Osnovne strukovne','Budzet','Internet programiranje')";
    mysqli_query($con,$sql);

    $sql = "INSERT INTO prijava_tabela(BrojIndeksa,Ime,Prezime,VrstaStudija,StatusStudija,NazivIspita) VALUES('1246343/18','Jovan','Jovanovic','Osnovne strukovne','Budzet','Internet tehnologije')";
    mysqli_query($con,$sql);

    $sql = "INSERT INTO prijava_tabela(BrojIndeksa,Ime,Prezime,VrstaStudija,StatusStudija,NazivIspita) VALUES('1255223/18','Stevan','Stevic','Osnovne strukovne','Samofinansiranje','Internet programiranje')";
    mysqli_query($con,$sql);

    $sql = "INSERT INTO prijava_tabela(BrojIndeksa,Ime,Prezime,VrstaStudija,StatusStudija,NazivIspita) VALUES('18867123/18', 'Nikola','Nikolic','Osnovne strukovne','Budzet','Matematika')";
    mysqli_query($con,$sql);



 mysqli_close($con);
?>