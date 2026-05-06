<?php

require_once __DIR__ . '/vendor/autoload.php';

use NumberFilterLib\NumberFilter;
echo "=== NumberFilter Test ===\n\n";

$filter = new NumberFilter();
$filter->addNumber(1);
$filter->addNumber(2);
$filter->addNumber(3);
$filter->addNumber(4);
$filter->addNumber(5);
$filter->addNumber(6);
$filter->addNumber(7);
$filter->addNumber(8);
$filter->addNumber(9);
$filter->addNumber(10);

echo "Все числа: 1, 2, 3, 4, 5, 6, 7, 8, 9, 10\n\n";

echo "Четные числа: ";
print_r($filter->getEven());

echo "\nНечетные числа: ";
print_r($filter->getOdd());

echo "\nЧисла больше 5: ";
print_r($filter->getGreaterThan(5));