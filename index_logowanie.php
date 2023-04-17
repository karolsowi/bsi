<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<title>Formularz</title>
<link rel="icon" type="image/x-icon" href="favicon.png">
<link rel="stylesheet" href="mystyle.css">

<style>
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
}
</style>
</head>
<body>

<div class="homebutton"><a href="https://karol.z28.web.core.windows.net"> Strona główna </a></div>

<h1>Logowanie</h1>

<div class="form">

<form action="logowanie.php" method="post">
  <input type="text" id="Username" name="Username" value="kamilslimak98" style="background-color:white" autofocus required ><br><br>
  <label for="password">Hasło</label>
  <input type="Password" id="Password" name="Password" value="haslo123" style="background-color:white" autofocus required><br><br>
  <input type="submit" value="Zaloguj" style="all:revert";> 
</form>
</div>

<?php
if(isset($_SESSION['MSG'])){
	echo $_SESSION['MSG'];
}
?>

</body>
</html>
