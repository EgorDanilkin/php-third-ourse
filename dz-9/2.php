<?php

function binarySearch($array, $requiredValue)
{
    $firstIndex = 0;
    $lustIndex = count($array) - 1;
    $middleIndex = ($lustIndex + $firstIndex) / 2;

    while ($firstIndex < $lustIndex) {

        if ($array[$middleIndex] === $requiredValue) {
            return floor($middleIndex);
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

    return null;
}

function removeForValue(&$array, $valueToRemove)
{

    $i = binarySearch($array, $valueToRemove);

    while ($i != null) {

        $newArray = [];

        for ($j = 0; $j < count($array); $j++) {

            if ($j != $i) {
                $newArray[] = $array[$j];
            }
        }

        $array = $newArray;
        $i = binarySearch($array, $valueToRemove);
    }

    echo 'все элементы с нужным значением удалены';
}

$array = [1, 2, 3, 4, 5, 6, 7, 7, 7, 8, 9];

removeForValue($array, 7);

var_dump($array);