﻿<?php
	session_start(); 
	require_once('baza.php');
	
?>
<html>
<head>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
  <meta http-equiv="content-type" content="text/html; charset=iso-8859-2" />
  <meta http-equiv="reply-to" content="Adres_e-mail" />
  <meta name="generator" content="WebSite PRO 4.3" />
  <meta name="author" content="Autor_dokumentu" />
  <meta name="description" content="Opis" />
  <title>Logowanie</title>
  <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
<div id="container">

<div id="topcontent">

<h1>AKADEMIKI</h1>

</div>
<?php

   // $connection = @mysql_connect('localhost', 'root', '')		or die('Brak połączenia z serwerem MySQL');
   // $db = @mysql_select_db('szkola', $connection)					or die('Nie mogę połączyć się z bazą danych');

	
	if(isset($_POST['wyslij']))
	{
	$l=@$_POST["Login"];
	$p=md5(@$_POST["Haslo"]);
		$q="SELECT * from user where LOGIN='".$l."' and PASSWORD='".$p."'";
		echo "SELECT * from user where LOGIN='".$l."' and PASSWORD='".$p."'";
		$w=mysql_query($q);
		
		$wiersz=@mysql_fetch_array($w);
		
		if(is_null($wiersz['LOGIN'])) echo 'zły login lub chasło';
		else 
		{
			//echo 'zalogowano poprawnie </br>';
			$_SESSION['Login']=$_POST['Login'];
			$_SESSION['Typ']=$wiersz['TYPE'];
			$_SESSION['ID']=$wiersz['ID'];    //nie działa 
			header('Location: index.php');
			//echo 'typ: '.$_SESSION['Typ'];
		}
		
		

		
		
	}
	else
	{
?>

<div id="logowanie">

		<?php
			@$i=$_GET['id'];
			if(isset($_SESSION['Login']))	require('wylogowywanie.php');
			else 							require('log.php');
		
		?>
		


</div>
<?php	}	?>
<div style="clear:both;"></div>

<div id="menu">
<a href="test.php">tset</a>
</div>





	<div id="content">
		<?php
		
			@$i=$_GET['id2'];
			if(!isset($_SESSION['Login']))	require('test.php');
			else 						require('akademiki.php');
		
		?>
	</div>





</div>
</body>
</html>