<?php
    
    //definizione costanti
    //define("DELTA", 0x9e3779b9);
    define("DELTA", 7);

    function MX($z, $y, $sum, $key, $p, $e) {
        return ($z>>5^$y<<2) + ($y>>3^$z<<4)^($sum^$y) + (ord($key[$p&3^$e])^$z);
    }

    function xxtea_encrypt($text, $key) { //funzione che cofifica una stringa in xxtea

        $length = strlen($text); //lunghezza stringa da decodificare
        $v = array();

        $z = ord($text[$length -1]);
        $y = ord($text[0]);
        $sum = 0;
        $e;

        $q;
        $p;

        //converto la stringa in array di interi
        for ($i = 0; $i < $length; $i++) {
            $v[] = ord($text[$i]);
        }

        //echo $text[0];

        /*echo "<br>z = " . $v[$length -1] . "<br>";
        echo "<br>y = " . $v[0] . "<br>";*/

        if ($length > 1) {
            $q = 6 + (int) (52 / $length);

            //echo "<br>q = $q<br>";

            while ($q-- > 0) {
                $sum += DELTA;
                //echo "<br>sum = $sum<br>";

                $e = ($sum >> 2) & 3;
                //echo "<br>e = $e<br>";

                for ($p = 0; $p < $length -1; $p++) {
                    $y = $v[$p +1];
                    echo "<br>y = $y<br>";

                    $mx = MX($z, $y, $sum, $key, $p, $e);
                    echo "<br>mx = $mx<br>";

                    echo "<br>v = " . $v[$p] . "<br>";
                    $v[$p] = $v[$p] + MX($z, $y, $sum, $key, $p, $e);

                    $z = $v[$p];
                    echo "<br>z = $z<br>";
                }

                $y = $v[0];
                $v[$length -1] = $v[$length -1] + MX($z, $y, $sum, $key, $p, $e);
                $z = $v[$length -1];

            }
        }

        return $text;

    }


    function xxtea_decrypt($text, $key) { //funzione che decodifica una stringa in xxtea

        $length = strlen($text); //lunghezza stringa da decodificare

        $z = ord($text[$length -1]);
        $y = ord($text[0]);
        $sum = 0;
        $e;

        $q;
        $p;

        if ($length > 1) {
            $q = 6 + (int) (52 / $length);
            $sum = $q * DELTA;

            while ($sum != 0) {
                $e = ($sum >> 2) & 3;

                for ($p = $length -1; $p > 0; $p--) {
                    $z = ord($text[$p -1]);                    
                    $text[$p] = chr(ord($text[$p]) - MX($z, $y, $sum, $key, $p, $e));
                    $y = $text[$p];
                }

                $z = $text[$length -1];
                $text[0] = chr(ord($text[0]) - MX($z, $y, $sum, $key, $p, $e));
                $y = $text[0];

                $sum -= DELTA;
            }
        }

        return $text;

    }


    