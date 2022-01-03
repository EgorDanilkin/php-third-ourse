<?php

require_once (__DIR__ . '\..\vendor\autoload.php');

use Entity\Context;
use Entity\QiwiPayment;
use Entity\YandexPayment;
use Entity\WebMoneyPayment;

function clientCode(Context $context)
{
    $context->completePayment();

    $context->setStrategy(new YandexPayment());
    $context->completePayment();

    $context->setStrategy(new WebMoneyPayment());
    $context->completePayment();
}

clientCode(new Context(new QiwiPayment()));
