<?php

function heapify(&$arr, $countArr, $i)
{

    $largest = $i;
    $left = $i * 2 + 1;
    $right = $i * 2 + 2;

    if ($left < $countArr && $arr[$largest] < $arr[$left]) {
        $largest = $left;
    }

    if ($right < $countArr && $arr[$largest] < $arr[$right]) {
        $largest = $right;
    }

    if ($i != $largest) {
        $temp = $arr[$i];
        $arr[$i] = $arr[$largest];
        $arr[$largest] = $temp;

        heapify($arr, $countArr, $largest);
    }
}

function heapSort(&$arr)
{
    $countArr = count($arr);
    for ($i = $countArr / 2 - 1; $i >= 0; $i--) {
        heapify($arr, $countArr, $i);
    }

    for ($i = $countArr - 1; $i >= 0; $i--) {
        $temp = $arr[0];
        $arr[0] = $arr[$i];
        $arr[$i] = $temp;

        heapify($arr, $i, 0);
    }
}

function quickSort(&$arr, $low, $high)
{

    $i = $low;
    $j = $high;
    $middle = $arr[($high + $low) / 2];

    do {

        while ($arr[$i] < $middle) {
            $i++;
        }

        while ($arr[$j] > $middle) {
            $j--;
        }

        if ($i <= $j) {
            $temp = $arr[$i];
            $arr[$i] = $arr[$j];
            $arr[$j] = $temp;

            $i++;
            $j--;
        }
    } while ($i < $j);

    if ($low < $j) {
        quickSort($arr, $low, $j);
    }

    if ($high > $i) {
        quickSort($arr, $i, $high);
    }
}

// Тестирование

$arrHeapSort = [];
for ($i = 0; $i < 1000000; $i++) {
    $arrHeapSort[] = random_int(1, 30000);
}

$arrQuickSort = $arrHeapSort;


$start_time = microtime(true);
heapSort($arrHeapSort);
$end_time = microtime(true);

echo 'Отсортированный массив пирамидой: ' . $end_time - $start_time;

$start_time = microtime(true);
quickSort($arrQuickSort, 0, count($arrQuickSort) - 1);
$end_time = microtime(true);

echo ' <br>Отсортированный массив быстрой сортировкой: ' . $end_time - $start_time;