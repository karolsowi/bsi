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
body {font-family: Arial, Helvetica, sans-serif;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
}
</style>
</head>
<body>

<?php
// jesli zalogowano:
if($_SESSION['logged_in']){
	echo "<h2>Jesteś zalogowany</h2>";
	echo "Witaj: ".$_SESSION['username']."<br /><br />";
	echo "<a href=\"Logout.php\">Wyloguj</a>";
}
// jeśli nie to logowanie:
else {
?>

<div class="homebutton"><a href="https://karol.z28.web.core.windows.net"> Strona główna </a></div>

<h1>Logowanie</h1>

<div class="form">

<form action="/simplified.php" method="post">
  <label for="Username">Login</label>
  <input type="text" id="Username" name="Username" value="kamilslimak98" autofocus required ><br><br>
  <?php echo $_SESSION['Username']; ?>
  <label for="password">Hasło</label>
  <input type="Password" id="Password" name="Password" value="haslo123" autofocus required><br><br>
  <?php echo $_SESSION['Password']; ?>
  <input type="submit" value="Zaloguj" style="all:revert";> 

</form>
</div>

</body>
</html>

<?php
unset($_SESSION['Username']);
unset($_SESSION['Password']);
unset($_SESSION['ErrNum']);
?>