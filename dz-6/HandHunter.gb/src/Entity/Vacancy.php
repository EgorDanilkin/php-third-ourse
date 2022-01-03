<?php

namespace Entity;

class Vacancy
{

    public $vacancyTitle;

    /**
     * @var string
     */
    public $language;

    public function __construct($vacancyTitle, $language)
    {
        $this->vacancyTitle = $vacancyTitle;
        $this->language = $language;
    }

    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param string $language
     */
    public function setLanguage($language)
    {
        $this->language = $language;
    }

    /**
     * @return mixed
     */
    public function getVacancyTitle()
    {
        return $this->vacancyTitle;
    }

    /**
     * @param mixed $vacancyTitle
     */
    public function setVacancyTitle($vacancyTitle)
    {
        $this->vacancyTitle = $vacancyTitle;
    }
}