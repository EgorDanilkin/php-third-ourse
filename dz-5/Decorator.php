<?php

interface Component
{

    public function sendMessage();
}

class EmailMessage implements Component
{

    public function sendMessage(): string
    {
        return 'Sending a message by email <br>';
    }
}

class SmsMessage implements Component
{

    public function sendMessage(): string
    {
        return 'Sending a message by sms <br>';
    }
}

class ChromeNotificationMessage implements Component
{

    public function sendMessage(): string
    {
        return 'Sending a message by cn <br>';
    }
}

abstract class Decorator implements Component
{

    /**
     * @var array Component
     */
    protected $components = [];

    public function __construct(Component $components)
    {
        $this->components[] = $components;
    }

    public function sendMessage()
    {
        if (is_array($this->components)) {
            foreach ($this->components as $component) {
                echo $component->sendMessage();
            }
            return;
        }
        echo $this->components->sendMessage();
    }

    public function addComponent($component)
    {
        array_push($this->components, $component);
    }
}

class ConcreteDecoratorA extends Decorator
{

    public function sendMessage()
    {
        echo 'ConcreteDecoratorA <br>';
        return parent::sendMessage();
    }
}

function clientCode(Component $component){
    $component->addComponent(new ChromeNotificationMessage());
    $component->addComponent(new SmsMessage());
    $component->sendMessage();
}

clientCode(new ConcreteDecoratorA(new EmailMessage()));
