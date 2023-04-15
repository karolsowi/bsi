<?php
// Page for processing all request such as add comment, login and so on.
// Including the Check.php file for error checking
include("Error.php");
// The Process class
class Process {
	
	// Function that handle comment add requests
	function Login($username, $password){
		global $Check;
	
		// Testing if login contain errors
		$Try = $Check->TryLogin($username, $password);
	
		// If no errors perform login
		if($Try == 0){
			$_SESSION['logged_in'] = 1;	
			$_SESSION['username'] = $username;
		}
		
		// Return to the right page
		header("Location: index.php");
	}
};
}

class Check {
	// Function that find any errors in login perform
	function TryLogin($username, $password){
		global $Errors, $Database;
		
		// Set the varibel that counts the errors
		$Error = 0;
		
		// Test if username is empty
		if(strlen($username) < 1 && $username == ""){
			$Errors->setError("Username", "The field is empty");
			$Error++;
		}

		// Test if username exist
		if($Database->CheckUsername($username) == 0 && strlen($username) > 0){
			$Errors->setError("Username", "The username don't exist");
			$Error++;
		}
		
		// Test if password is empty
		if(strlen($password) < 1 && $password == ""){
			$Errors->setError("Password", "The field is empty");
			$Error++;
		}

		// Test if password is right
		if(strlen($username) > 0 && strlen($password) > 0 && $Database->WrongPass($username, $password) == 0){
			$Errors->setError("Password", "Wrong password!");
			$Error++;
		}
		
		// If there are errors, set the amount
		if($Error > 0){
			$Errors->ErrorAmount($Error);
		}
		
		return $Error;
	}
	
};

class Database{
	
	// Function that handle the connection for the database
	function Connect(){
		$Connect = mysql_connect("localhost", "root", "");
		mysql_select_db("Blog", $Connect);
	}
	
	// Check if requested name is taken
	function CheckUsername($name){
		// Connect to database
		$this->Connect();
		
		// Request for any users with that name
		$Query = mysql_query("SELECT * FROM user WHERE username='$name'");
		
		// Return the result
		return mysql_num_rows($Query);
	}
	
	// Test if username and password fits together
	function WrongPass($username, $password){
		// Connect to database
		$this->Connect();
		
		// Request for any users with that name and pass
		$Query = mysql_query("SELECT * FROM user WHERE username='$username' AND password='$password'");
		
		// Return the result
		return mysql_num_rows($Query);
	}
	
	
}

$Database = new Database;

$Check = new Check;

$Process = new Process;

// Action variabel for know what to do
$Action = $_POST['Login'];

// If action is login start the process
if(isset($Action)){
	$Process->Login($_POST['Username'], $_POST['Password']);
	
?>