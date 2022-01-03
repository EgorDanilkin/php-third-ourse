<?php

namespace Entity;

class Board implements \SplSubject
{

    /**
     * @var string
     */
    public $state;

    /**
     * @var \SplObjectStorage
     */
    private $observers;

    /**
     * @var \SplObjectStorage
     */
    public $vacancies;

    public $newVacancy;

    public function __construct()
    {
        $this->state = 'noNewVacancies';

        $this->observers = new \SplObjectStorage();

        $this->vacancies = new \SplObjectStorage();
    }

    public function attach(\SplObserver $observer)
    {
        $this->observers->attach($observer);
    }

    public function detach(\SplObserver $observer)
    {
        $this->observers->detach($observer);
    }

    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    public function addVacancies(Vacancy $vacancy)
    {
        $this->newVacancy = $vacancy;

        $this->state = 'newVacancy';

        $this->notify();

        $this->vacancies->attach($vacancy);
        $this->newVacancy = null;

        $this->state = 'noNewVacancies';
    }
}