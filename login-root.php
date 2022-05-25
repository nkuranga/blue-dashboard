<?php
	session_start();
	include("connection_pdo.php");
	if(isset($_POST['email']) and isset($_POST['password'])){
		if($_POST['email'] == "" or $_POST['password'] == ""){
			die("Fill all this form to log in.");
		}
		else{
			$selectUser = $db->prepare("SELECT * FROM users WHERE email = '".$_POST['email']."' OR username = '".$_POST['email']."'");

			$selectUser->execute();
			if($userFound = $selectUser->fetch()){
				$salt1 = "!!!6544653_$$=-=-!";
				$salt2 = "ADFNJVD ++sdf/*-&";
				$passLock = $salt1 . $_POST['password'] . $salt2;

				if(password_verify($passLock, $userFound['password'])){
					
					$_SESSION['user'] = $userFound['user_id'];
					
					die("1");
				}
				else{
					die("Incorrect email or password. Try again please.");
				}
			}
			else{
				die("Incorrect email or password. Try again please.");
			}
			
		}



	}
	else{
		die("Fill this form to log in.");
	}
?>