<?php

namespace Entity;

class ConcreteMemento implements Memento
{

    private $state;

    private $date;

    public function __construct(string $state)
    {

        $this->state = $state;
        $this->date = date('Y-m-d H:i:s');
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    public function getName()
    {

        return $this->state;
    }

    public function getDate()
    {
        return $this->date;
    }
}
