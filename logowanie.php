<?php
session_start();
	$_SESSION['MSG']='';
        if ($_POST['Username'] == 'kamilslimak98' && $_POST['Password'] == 'haslo123') {
			$_SESSION['login']=1;
		    header("Location: formularz.php");
            }
			else {
				$_SESSION['MSG']='<h2 style="text-align: center;"> Złe dane logowania </h2>';
				header("Location: index_logowanie.php");
            }  
?>