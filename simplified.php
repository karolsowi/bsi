<?php
class Process {
	
	// funkcja do obsługi requestow
	function Login($username, $password){
		// sprawdzanie czy są errory
		$Try = $Check->TryLogin($username, $password);
		// jesli bez errorów
		if($Try == 0){
			$_SESSION['logged_in'] = 1;	
			$_SESSION['username'] = $username;
		}
		
		// powrot do logowania
		header("Location: login.php");
	}
};
}
class Check {
	// szukanie errorow w logowaniu
	function TryLogin($username, $password){
		global $Errors,
		// errour count
		$Error = 0;
		
		if(strlen($username) < 1 && $username == ""){
			$Errors->setError("Username", "Wypełnij to pole");
			$Error++;
		}

		if($username != "kamilslimak98"){
			$Errors->setError("Username", "Użytkownik nie istnieje");
			$Error++;
		}
		
		if(strlen($password) < 1 && $password == ""){
			$Errors->setError("Password", "Wypełnij to pole");
			$Error++;
		}

		if($password != "haslo123"){
			$Errors->setError("Password", "Hasło niepoprawne");
			$Error++;
		}
		
		// jeśli wystapi error to ustaw amount
		if($Error > 0){
			$Errors->ErrorAmount($Error);
		}
		
		return $Error;
	}
	
};

$Check = new Check;

$Process = new Process;

// variable dla action żeby wiedziec co robić
$Action = $_POST['Login'];

// jesli action login to zacznij proces
if(isset($Action)){
	$Process->Login($_POST['Username'], $_POST['Password']);
	
?>