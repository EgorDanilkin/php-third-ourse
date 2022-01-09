<?php

function LinearSearch ($myArray, $num) {
    $count = count($myArray);
    $countIteration = 0;

    for ($i=0; $i < $count; $i++) {
        $countIteration++;
        if ($myArray[$i] == $num) return $countIteration;
        elseif ($myArray[$i] > $num) return $countIteration;
    }
    return $countIteration;
}

function binarySearch($array, $requiredValue)
{
    $firstIndex = 0;
    $lustIndex = count($array) - 1;
    $middleIndex = ($lustIndex + $firstIndex) / 2;
    $countIteration = 0;

    while ($firstIndex < $lustIndex) {

        $countIteration++;

        if ($array[$middleIndex] === $requiredValue) {
            return $countIteration;
        }
        elseif ($array[$middleIndex] > $requiredValue) {
            $lustIndex = $middleIndex - 1;
            $middleIndex = ($lustIndex + $firstIndex) / 2;
        }
        elseif ($array[$middleIndex] < $requiredValue) {
            $firstIndex = $middleIndex + 1;
            $middleIndex = ($lustIndex + $firstIndex) / 2;
        }
    }

    return $countIteration;
}

function interpolationSearch($myArray, $num)
{
    $start = 0;
    $last = count($myArray) - 1;
    $countIteration = 0;

    while (($start <= $last) && ($num >= $myArray[$start])
        && ($num <= $myArray[$last])) {

        $countIteration++;

        $pos = floor($start + (
                (($last - $start) / ($myArray[$last] - $myArray[$start]))
                * ($num - $myArray[$start])
            ));
        if ($myArray[$pos] == $num) {
            return $countIteration;
        }

        if ($myArray[$pos] < $num) {
            $start = $pos + 1;
        }

        else {
            $last = $pos - 1;
        }
    }
    return $countIteration;
}

$array1 = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 15, 16, 17, 18, 19, 20];
$array2 = [1, 2, 6, 7, 12, 16, 17, 28, 49, 51, 54, 55, 56, 60, 300, 1500, 1501, 1522, 1524];


echo  'в массиве с равномерным распределением' . PHP_EOL;

echo 'LinearSearch: ' . LinearSearch($array1, 17) . PHP_EOL;
echo 'interpolationSearch: ' . interpolationSearch($array1, 17) . PHP_EOL;
echo 'binarySearch: ' . binarySearch($array1, 17) . PHP_EOL;

echo 'LinearSearch без нужного элемента: ' . LinearSearch($array1, 14) . PHP_EOL;
echo 'interpolationSearch без нужного элемента: ' . interpolationSearch($array1, 14) . PHP_EOL;
echo 'binarySearch без нужного элемента: ' . binarySearch($array1, 14) . PHP_EOL;

echo PHP_EOL;

echo  'в массиве с неравномерным распределением' . PHP_EOL;

echo 'LinearSearch: ' . LinearSearch($array2, 300) . PHP_EOL;
echo 'interpolationSearch: ' . interpolationSearch($array2, 300) . PHP_EOL;
echo 'binarySearch: ' . binarySearch($array2, 300) . PHP_EOL;

echo 'LinearSearch без нужного элемента: ' . LinearSearch($array2, 200) . PHP_EOL;
echo 'interpolationSearch без нужного элемента: ' . interpolationSearch($array2, 200) . PHP_EOL;
echo 'binarySearch без нужного элемента: ' . binarySearch($array2, 200) . PHP_EOL;