<?php

namespace Entity;

class QiwiPayment implements Strategy
{

    public function getFormPayment()
    {
        return 'QiwiFormPayment';
    }
}
