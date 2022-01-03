<?php

namespace Entity;

class TextRedactor
{


    /** я не смог придумать ни чего лучше, чем массив со снимками добавить в это клас
     * что бы они сохранялись автоматически после выполнения методов
     * @var Memento[]
     */
    private $mementos = [];

    public static $operation;

    /**
     * @var string
     */
    private $state;

    public function __construct()
    {
        TextRedactor::$operation = 0;
        $this->state = TextRedactor::$operation . '_blank_document';
    }

    public function copying()
    {

        echo 'some text copied';
        $this->state = ++TextRedactor::$operation . '_text_copied';

        $this->mementos[] = $this->saveLog();
    }

    public function insert()
    {

        echo 'some text inserted';
        $this->state = ++TextRedactor::$operation . '_text_inserted';

        $this->mementos[] = $this->saveLog();
    }

    public function cutting()
    {

        echo 'some text cut';
        $this->state = ++TextRedactor::$operation . '_text_cut';

        $this->mementos[] = $this->saveLog();
    }

    public function saveLog() : Memento
    {

        return new ConcreteMemento($this->state);
    }

    public function restore(Memento $memento) : void
    {

        $this->state = $memento->getState();
        echo "Originator: My state has changed to: {$this->state}\n";
    }

    /**
     * @return Memento[]
     */
    public function getMementos(): array
    {
        return $this->mementos;
    }

    /**
     * @param Memento[] $mementos
     */
    public function setMementos(array $mementos): void
    {
        $this->mementos = $mementos;
    }
}
