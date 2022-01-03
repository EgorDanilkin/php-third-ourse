<?php

namespace Entity;

class YandexPayment implements Strategy
{

    public function getFormPayment()
    {
        return 'YandexFormPayment';
    }
}