<?php
    
    $n = 4582;
    $t = $n;
    $largest = 0;
    $smallest = 9;

    while ($n) {
        
        $r = $n % 10;
    
        $largest = max($r, $largest);
 
        $smallest = min($r, $smallest);
 
        $n = intval($n / 10);
    }
    
    echo $t."+".$smallest."+".$largest."=".($t+$largest+$smallest);
    
?>