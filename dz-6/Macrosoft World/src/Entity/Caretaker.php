<?php

namespace Entity;

class Caretaker
{
    /**
     * @var TextRedactor
     */
    private $textRedactor;

    public function __construct(TextRedactor $textRedactor)
    {

        $this->textRedactor = $textRedactor;
    }

    public function undo() : void
    {

        if (! count($this->textRedactor->getMementos())) {
            return;
        }

        $mementos = $this->textRedactor->getMementos();
        $memento = array_pop($mementos);
        $this->textRedactor->setMementos($mementos);

        echo "Caretaker: Restoring state to: " . $memento->getName() . "\n";
        try {
            $this->textRedactor->saveLog($memento);
        }
        catch ( \Exception $e ) {
            $this->undo();
        }
    }

    public function showHistory() : void
    {

        echo "Caretaker: Here's the list of mementos:\n";
        foreach ($this->textRedactor->getMementos() as $memento) {
            echo $memento->getName() . "\n";
        }
    }
}