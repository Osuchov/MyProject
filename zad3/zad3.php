<?php

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

function checkWins(array $combinations, array $results) {
    $combinations = array_flip($combinations);
    $results = array_flip($results);
    
    $counter = 0;
    
    foreach ($combinations as $combination => $value) {
        if (isset($results[$combination])) {
            ++$counter;
            echo $counter . ' Win! Combination: '. $combination .'<br>';
        }
    }
    return $counter;
}

$combs = generateCombinations();
$res = getResults();

echo 'Found combinations: ' . checkWins($combs, $res) . '<br>';