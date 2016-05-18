<?php

$data = array_slice(explode("\n", file_get_contents(__DIR__ . '/testInput.txt')), 0, -1);


$numCases = $data[0];
$file = fopen(__DIR__ . '/output.txt', 'w+');

for ($x = 0; $x < $numCases; $x++)
{
    
    fwrite($file,  'Case #'. ($x + 1) . ": " . calcNumTables($data[$x+1]) . PHP_EOL);
}

function calcNumTables(int $pax): int
{
    if ($pax === 0) {
        return 0;
    }
    
    if ($pax < 5) {
        return 1;
    }
    
    $borderTables = 2;
    $pax -= 6;
    
    if ($pax < 1) {
        return 2;
    }
    
    $tablesBetween = round($pax / 2);
    return $tablesBetween + $borderTables;
}