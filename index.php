<?php

	function longToStrSize($v) {
  
		$length = (count($v) - 1) * 4;

	 	if ((int) ($v[count($v) - 1] / pow(256, 3)) > 0) {
	    	$length += 4; 

	  	} else if ((int) ($v[count($v) - 1] / pow(256, 2)) > 0) {
	    	$length += 3; 

	 	} else if ((int) ($v[count($v) - 1] / pow(256, 1)) > 0) {
	    	$length += 2; 

		} else {
			$length += 1;
		}
		  
	 	return $length;
	   
	}

	function longToStr2($v) {

		$s = "";

		for ($i = 0; $i < longToStrSize($v); $i++) {
			$index = (int) ($i / 4);
    		$pow = $i % 4;

			if ($pow + 1 == 4) {
	    		$char = $v[$index];
	    	} else {
	    		$char = $v[$index] - ((int) ($v[$index] / pow(256, $pow + 1)) * pow(256, $pow + 1));
	    	}

	    	if ($pow > 0) {
	    		$char = (int) ($char / pow(256, $pow));
	    	}

	    	$s .= chr($char);

		}

		return $s;
	}

    function longToStr($v) {

    	$s = "";

    	for ($i = 0; $i < count($v); $i++) {

    		$pow = 0;
    		while ($pow < 4 and $v[$i] > pow(256, $pow)) {	    		

	    		if ($pow + 1 == 4) {
	    			$char = $v[$i];
	    		} else {
	    			$char = $v[$i] - ((int) ($v[$i] / pow(256, $pow + 1)) * pow(256, $pow + 1));
	    		}

	    		if ($pow > 0) {
	    			$char = (int) ($char / pow(256, $pow));
	    		}

	    		$s .= chr($char);

    			$pow++;
    		}

    	}

    	return $s;
    }

    function strToLong($s) {

    	$v = array();

    	for ($i = 0; $i < strlen($s); $i++) {

    		$index = (int) ($i / 4);
    		$pow = $i % 4;

    		if ($pow == 0) {
    			$v[$index] = ord($s[$i]);
    		
    		} else {
    			$v[$index] = $v[$index] + pow(256, $pow) * ord($s[$i]);
    		}
    	}

    	return $v;
    }



    $s = "alessandro!!123456789";
/*
    $v = _str2long($s, false);

   	$v[0] = dechex($v[0]);
   	$v[1] = dechex($v[1]);

   	echo "<br>_str2long: <br>";
   	print_r($v);
*/

   	$v = strTolong($s);

   /*for ($i = 0; $i < count($v); $i++)
   		$v[$i] = dechex($v[$i]);
	*/
   //echo "<br>strTolong: ". count($v) . "<br>";
   	

   	echo longToStr2($v);



