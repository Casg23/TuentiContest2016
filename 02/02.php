<?php

$manuscrit = explode(" ", file_get_contents(__DIR__ . '/corpus.txt'));
$data = array_slice(explode("\n", file_get_contents(__DIR__ . '/submitInput.txt')), 0, -1);

$numCases = $data[0];
$file = fopen(__DIR__ . '/output.txt', 'w+');

for ($x = 0; $x < $numCases; $x++) {

    $startEnd = explode(' ', $data[$x+1]);
    
    $textToAnalyze = array_slice($manuscrit, $startEnd[0], ($startEnd[1] - $startEnd[0]));
    $result = array_count_values($textToAnalyze);
    asort($result);
    print_output(array_reverse($result), $file, $x);
    unset($result);
}

function print_output($result, $file, $x)
{
    $keys = array_keys($result);
        fwrite($file,  'Case #'. ($x + 1) . ": " . 
            $keys[0] . ' ' . $result[$keys[0]] .',' .
            $keys[1] . ' ' . $result[$keys[1]] .',' . 
            $keys[2] . ' ' . $result[$keys[2]] . 
            PHP_EOL);

}