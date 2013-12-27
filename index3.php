<?php

	function _str2long($s, $w) {
        $v = array_values(unpack('V*', $s.str_repeat("\0", (4-strlen($s)%4)&3)));
        if ($w) {
            $v[] = strlen($s);
        }
        return $v;
    }
/*
	function _str2long($s, $w) { //originale riscritto

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

        if ($w) {
            $v[] = strlen($s);
        }

        return $v;
    }
    */
/*
    function _long2str($v, $w) {
        $len = count($v);
        $s = '';
        for ($i = 0; $i < $len; $i++) {
            $s .= pack('V', $v[$i]);
        }
        if ($w) {
            return substr($s, 0, $v[$len - 1]);
        } else {
            return $s;
        }
    }
    */

   function _long2str($v, $w) { //originale riscritto

        $s = "";

        for ($i = 0; $i < count($v); $i++) {

            $pow = 0;

            if ($v[$i] < 0) {
            	$v[$i] = 0xFFFFFFFF - abs($v[$i]) + 1;
            }

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

        if ($w) {
            return substr($s, 0, $v[count($v) - 1]);
        } else {
            return $s;
        }

        return $s;
    }

    function _byte8($n) {

    	echo "<br>n = $n";

        while ($n >= 128) $n -= 256;
        while ($n <= -129) $n += 256;
        return floor($n);
    }

	//$s = "a";

	$v = array();
	$v[] = -776471994;

	echo "<br>hex: " . dechex($v[0]);
	echo "<br>-hex: " . dechex(abs($v[0])) . "<br>";

	echo _long2str($v, false);

	echo "<br>";

	echo chr(0xd1);

	//echo _long2str(_str2long($s, true), true);