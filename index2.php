<?php

	//require_once("XXTEA.php");

	/*$c = "B";

	$c[0] = chr(ord($c[0]) + 2);

	echo $c;*/


	//echo base64_encode(xxtea_encrypt("Ciao!", "chiave"));

	//echo xxtea_decrypt(, "chiave");

	//echo ord('A');


	require_once("XXTEA.php");

	$xxtea = new Crypt_XXTEA();

	$key = "01234567";

	$xxtea->setKey($key);


	echo $xxtea->decrypt($xxtea->encrypt("Ciao!"));

	/*

	$text = base64_decode("ZJIxXnI1jo5vB3Wx");

	$en_text = $xxtea->decrypt($text);

	echo "decrypt text: $en_text<br>";

*/
