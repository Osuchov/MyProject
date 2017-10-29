<?php

/**
 * Function gets historical results of prepared txt file in the same directory.
 * It returns and arra of strings.
 * @return mixed
 */
function getResults() {
    $fileArr = explode("\n", file_get_contents('dl.txt'));
    
    $i = 0;
    while (!empty($fileArr[$i])) {
        $results[$i] = explode(' ', $fileArr[$i]);
        $results[$i] = trim($results[$i][2]);
        ++$i;
    }
    return $results;
}

/**
 * Function generates 6 numbers in range from 1 to 46 with no repetition.
 * It returns an array of strings to match the format of the 'results' array.
 * @return mixed
 */
function generateCombinations() {
    $numbers = range(1,46);
    for ($i = 0; $i < 10000; $i++) {
        shuffle($numbers);
        $combinatons[$i] = array_slice($numbers, 0, 6);
        sort($combinatons[$i]);
        $combinatons[$i] = implode(',', $combinatons[$i]);
    }
    return $combinatons;
}

/**
 * Function checks the number of occurrences of sixes from combination table in results table.
 * It returns int and echoes the winning combinations.
 * @param array $combinations
 * @param array $results
 * @return int
 */
function checkWins(array $combinations, array $results) {
    $combinations = array_flip($combinations);
    $results = array_flip($results);    //change keys with values
    
    $counter = 0;
    
    foreach ($combinations as $combination => $value) {
        if (isset($results[$combination])) {    //if there is a key that matches our combination
            ++$counter;                         //increase the counter and echo the combination
            echo $counter . ' Win! Combination: '. $combination .'<br>';
        }
    }
    return $counter;
}

$combs = generateCombinations();
$res = getResults();

echo 'Found combinations: ' . checkWins($combs, $res) . '<br>';