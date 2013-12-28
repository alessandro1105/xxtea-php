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


	//$s = base64_decode("EmGcceTHX0");

	//echo "<br><br>";
	//echo base64_encode($xxtea->encrypt("0123456789"));

	//echo $xxtea->decrypt(base64_decode("LWns9z/ZJr24ak4D100hQA=="));

	//echo 