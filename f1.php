<?php

require_once 'autoload.php';

$lines = [];
while ($line = fgets(STDIN)) {
    $lines[] = trim($line);
}

try {
    $triangle = new \Lencse\Triangle\Triangle($lines);
    try {
        printf("Lehetséges utak száma: %s\n", $triangle->getPossibleWays());
    }
    catch (OverflowException $e) {
        echo "Nem lehet meghatározni a lehetséges utak számát.\n";
    }
    printf("Legnagyobb összegű út összege: %d", $triangle->getMaxWaySum());
}
catch (InvalidArgumentException $e) {
    echo "Hibás input";
}

