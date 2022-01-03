<?php

require_once ('..\vendor\autoload.php');

use \Entity\Board;
use \Entity\Vacancy;
use \Entity\JobSeeker;


function clientCode(Board $board)
{

    $vacancyPhp = new Vacancy('Junior PHP', 'php');
    $vacancyJavaScript = new Vacancy('Middle JS', 'js');

    $board->attach(new JobSeeker('php'));
    $board->attach(new JobSeeker('js'));

    $board->addVacancies($vacancyPhp);
    $board->addVacancies($vacancyJavaScript);
}

clientCode(new Board());
