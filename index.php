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

	$key = "0123456789012345";

	$xxtea->setKey($key);


	//echo $xxtea->decrypt($xxtea->encrypt("Ciao!"));
/*
	$s = "F33Ebw==";

	echo "test base64 decoded: '" . base64_decode($s) . "'<br>";
	echo "testo decrittato:<br>";
	echo $xxtea->decrypt(base64_decode($s));

*/

	$s = "alessandroPasqualini1105";
	$s = $xxtea->encrypt($s);

	echo base64_encode($s) . "<br>";
	echo $s . "<br>";
	echo strlen($s) ."<br>";

	echo $xxtea->decrypt($s);



	/*

	$text = base64_decode("ZJIxXnI1jo5vB3Wx");

	$en_text = $xxtea->decrypt($text);

	echo "decrypt text: $en_text<br>";

*/
