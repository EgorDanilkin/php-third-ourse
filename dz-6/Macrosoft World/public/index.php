<?php

require_once (__DIR__ . '\..\vendor\autoload.php');

use Entity\TextRedactor;
use Entity\Caretaker;

$textRedactor = new TextRedactor();
$caretaker = new Caretaker($textRedactor);

$textRedactor->copying();
$textRedactor->insert();
$textRedactor->cutting();
$textRedactor->insert();

echo "<br>";
$caretaker->showHistory();

echo "<br>Client: Now, let's rollback!<br>";
$caretaker->undo();

echo "<br>Client: Once more!<br>";
$caretaker->undo();
$caretaker->undo();
$caretaker->undo();
