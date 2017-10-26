<?php
/**
 * @param $number
 * @return string
 */
function is_prime($number) {
    if (is_numeric($number) && $number > 1) {
        for ($i = 2; $i <= $number / 2; $i++) {
            if ($number % $i == 0) return FALSE;
        }
        return TRUE;
    }
    return FALSE;
}

for ($i=0; $i<10; $i++) {
    $num = rand(6, 12);
    echo 'Is '.$num.' prime: '. json_encode(is_prime($num)).' <br>';
}