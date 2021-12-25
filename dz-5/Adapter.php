<?php

interface ICircle
{
    function circleArea(int $circumference);
}

interface ISquare
{
    function squareArea(int $sideSquare);
}

class AdapterCircleAreaLib implements ICircle
{

    /**
     * @var CircleAreaLib
     */
    private $circleAreaLib;

    public function __construct(CircleAreaLib $circleAreaLib)
    {
        $this->circleAreaLib = $circleAreaLib;
    }

    function circleArea(int $circumference)
    {
        return $this->circleAreaLib->getCircleArea($circumference/M_PI);
    }
}

class AdapterSquareAreaLib implements ISquare
{

    /**
     * @var SquareAreaLib
     */
    private $squareAreaLib;

    public function __construct(SquareAreaLib $squareAreaLib)
    {
        $this->squareAreaLib = $squareAreaLib;
    }

    function squareArea(int $sideSquare)
    {
        return $this->squareAreaLib->getSquareArea(sqrt(2) * $sideSquare);
    }
}

class CircleAreaLib
{
    public function getCircleArea(int $diagonal)
    {
        $area = (M_PI * $diagonal**2)/4;

       return $area;
   }
}

class SquareAreaLib
{
    public function getSquareArea(int $diagonal)
    {
        $area = ($diagonal**2)/2;

        return $area;
    }
}

function clientCode(ICircle $circle)
{
    $circle->circleArea(500);
}

function clientCode2(ISquare $square)
{
    $square->squareArea(31.82);
}

clientCode(new AdapterCircleAreaLib(new CircleAreaLib));
clientCode2(new AdapterSquareAreaLib(new SquareAreaLib));