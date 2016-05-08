<?php

require_once 'autoload.php';

function e_index($tomb)
{
    $calculator = new \Lencse\BalanceIndex\BalanceIndexCalculator($tomb);

    return $calculator->getBalanceIndex();
}

$arr = [-7, 1, 5, 2, -4, 3, 0];
printf("[%s] tömb egyensúlyi indexe: %d", implode(', ', $arr), e_index($arr));
