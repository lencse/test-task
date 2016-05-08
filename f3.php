<?php

require_once 'autoload.php';

$counter = new \Lencse\RoundPrime\RoundPrimeCounter(1e6);

printf("%d kerek prím egymillió alatt", $counter->getCount());
