function ProveraRadioDugmadi(RadioGroup)
{
for (i = 0; i <RadioGroup.length; i++)
{
if (RadioGroup[i].checked)
{
return (true);
}
}
return (false);
}
function ValidateForm(Forma)
{
if (Forma.Ime.value=="")
{
alert("Niste popunili polje Ime! Upisite Vase ime!");
return (false);
}
if (Forma.Prezime.value=="")
{
alert("Niste popunili polje Prezime! Upisite Vase prezime!");
return (false);
}
if (Forma.Adresa.value=="")
{
alert("Niste popunili polje Adresa! Upisite Vasu adresu!");
return (false);
}
if(Forma.Grad.value ==""){
alert("Molimo Vas selektujte grad!"+Forma.Grad.value);
return (false);
}
if (!ProveraRadioDugmadi(Forma.Pol))
{
alert("Molimo Vas unesite pol");
return (false);
}
if (Forma.Odsek.value == ""){
alert("Molimo Vas selektujte studjski smer!");
return (false);
}
if(Forma.ToMail.checked == false){
alert("Morate potvrditi da su uneti podaci tačni!");
return (false);
}
alert("Podaci su provereni.");
return(true);
}
