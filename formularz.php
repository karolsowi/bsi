<?php
session_start();
if($_SESSION['login']==1){
}
else{
	header("Location: index_logowanie.php");
}	
?>

<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<title>Formularz</title>
<link rel="icon" type="image/x-icon" href="favicon.png">
<link rel="stylesheet" href="mystyle.css">
</head>

<body>
<div class="homebutton"><a href="https://karolsow.azurewebsites.net"> Strona główna </a></div>

<h1>Formularz</h1>

<div class="form">

<form action="">
  <label for="imie">Imię:</label><br>
  <input type="text" id="imie" name="imie" pattern="[A-ZŻŹĆĄŚĘŁÓŃ]{1}[a-zżźćńółęąś]{1,30}" placeholder="Imię np. Jan" title="Tylko litery, pierwsza litera wielka" value="Kamil" autofocus required ><br><br>
  
  <label for="nazwisko">Nazwisko:</label><br>
  <input type="text" id="nazwisko" name="nazwisko" title="Tylko litery, pierwsza litera wielka" pattern="[A-ZŻŹĆĄŚĘŁÓŃ]{1}[a-zżźćńółęąś]{1,63}([-][A-ZŻŹĆĄŚĘŁÓŃ]{1}[a-zżźćńółęąś]{1,63})?" placeholder="Nazwisko np. Kowalski" value="Ślimak" autofocus required><br><br>
  
  <label for="pesel">PESEL:</label><br>
  <input type="text" id="pesel" name="pesel" pattern="[0-9]{11}" placeholder="np. 99845678910" title="Podaj 11 cyfr" value="12345678910"autofocus required><br><br>
  
  <label for="urodziny">Data urodzenia:</label>
  <input type="date" id="urodziny" name="urodziny" min='1900-01-01' value="1998-03-03"autofocus required><br><br>
  
  <label for="miasto">Miejscowość:</label><br>
  <input type="text" id="miejscowosc" name="miejscowosc" pattern="[A-ZŻŹĆĄŚĘŁÓŃ]{1}[a-zżźćńółęąś]{1,63}([- ][a-zżźćńółęąśA-ZŻŹĆĄŚĘŁÓŃ. -]{1,64})?"placeholder="Miejscowość" value="Radom" autofocus required><br><br> <!--Wólka Sokołowska k. Wólki Niedźwiedzkiej-->
  
  <label for="kod">Kod pocztowy:</label><br>
  <input type="kod" id="kod" name="kod" placeholder="00-000" pattern="[0-9]{2}[-][0-9]{3}" value="26-610" autofocus required><br><br>
  
  <label for="ulica">Ulica:</label><br>
  <input type="text" id="ulica" name="ulica" pattern="[A-ZŻŹĆĄŚĘŁÓŃ0-9]{1}[a-zżźćńółęąś0-9]{1,63}([- ][a-zżźćńółęąśA-ZŻŹĆĄŚĘŁÓŃ0-9. -]{1,64})?"placeholder="Ulica" value="25 Czerwca" autofocus required><br><br> <!--1905 roku ,Bitwy Warszawskiej 1920 r., Organizacji Młodzieży Towarzystwa Uniwersytetów Robotniczych-->
  
  <label for="numer">Numer budynku:</label><br>
  <input type="text" id="numer" name="numer" pattern="[0-9]{1,3}([A-Z]{1})?" placeholder="np. 1A" value="51" title="Niepoprawny numer budynku" autofocus required><br><br>
  
  <label for="numer">Numer mieszkania:</label><br>
  <input type="text" id="numer" name="numer" pattern="[0-9]{1,3}([A-Z]{1})?" placeholder="np. 1A" value="3" title="Niepoprawny numer mieszkania" autofocus><br><br>
  
  <label for="prawko">Prawo jazdy:</label>
  <input type="checkbox" id="prawko" name="prawko"><br><br>
  
  <label for="płeć">Płeć:</label><br>
  <input type="radio" id="K" name="płeć" value="Kobieta" required>
  <label for="K">Kobieta</label><br>
  <input type="radio" id="M" name="płeć" value="Mężczyzna" checked="checked" required>
  <label for="M">Mężczyzna</label><br>
  <input type="radio" id="I" name="płeć" value="Inna" required>
  <label for="I">Inna</label><br><br>
    
  <label for="telefon">Numer telefonu:</label><br>
  <text>+48</text>
  <input type="tel" id="telefon" name="telefon" placeholder="123456789" value="123456789" pattern="[0-9]{9}" title="Podaj 9 cyfr" autofocus required><br><br>
  
  <input type="submit" value="Wyślij" style="all:revert">
  <br><br>
  
  <script>
	today = new Date().toISOString().split("T")[0]; //aktualna data, konwertowana do ciągu znaków w formacie ISO. split() - sama data bez godziny
	document.getElementById("urodziny").setAttribute("max", today);
  </script>

</form>

  <form action="logout.php" method="get">
	<input type="submit" value="Wyloguj" style="all:revert">
  </form>

</div>

<div>
<a href="https://karolsow.azurewebsites.net/txt/index_logowanie.txt"> index_logowanie.txt</a><br>
<a href="https://karolsow.azurewebsites.net/txt/logowanie.txt"> logowanie.txt</a><br>
<a href="https://karolsow.azurewebsites.net/txt/logout.txt"> logout.php</a><br>
<a href="https://karolsow.azurewebsites.net/txt/formularz.txt"> formularz.txt</a><br>

</div>

</body>
</html>