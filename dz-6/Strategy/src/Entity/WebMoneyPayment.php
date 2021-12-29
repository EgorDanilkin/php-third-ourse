<?php

namespace Entity;

class WebMoneyPayment implements Strategy
{

    public function getFormPayment()
    {
        return 'WebMoneyFormPayment';
    }
}
