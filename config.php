<?php
	$servername = "localhost"; 
	$username = "root"; 
	$password = ""; 
	$dbname = "transaction"; 
	$conn = mysqli_connect($servername, $username, $password, $dbname); 
	if (!$conn) { 
		die("Koneksi Gagal: " . mysqli_connect_error()); 
	}