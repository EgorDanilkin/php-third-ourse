<?php

namespace Entity;

class JobSeeker implements \SplObserver
{

    /**
     * @var string
     */
    public $language;

    public function __construct($language)
    {
        $this->language = $language;
    }

    public function update(\SplSubject $subject)
    {
        if ($subject->newVacancy->language === $this->language) {
            echo 'the required vacancy was found';
        }
    }
}