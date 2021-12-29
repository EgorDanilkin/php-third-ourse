<?php

namespace Entity;

class Context
{

    /**
     * @var Strategy
     */
    private $strategy;

    public function __construct(Strategy $strategy)
    {
        $this->strategy = $strategy;
    }

    /**
     * @param Strategy $strategy
     */
    public function setStrategy($strategy)
    {
        $this->strategy = $strategy;
    }

    public function completePayment()
    {
        echo $this->strategy->getFormPayment() . '<br>';
    }
}