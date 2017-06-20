<?php

try {
	$db = new PDO("mysql:host=localhost;dbname=mlportaldb;port=3307","root","");
	$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch(Exception $e) {
	echo "Error: ";
	echo $e->getMessage();
	exit;
}

