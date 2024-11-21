<?php

namespace Hexlet\App\IntroductionToOOP\encapsulation;

class Rational
{
    private int $numerator;
    private int $denominator;

    public function __construct(int $numerator, int $denominator)
    {
        if ($denominator === 0) {
            throw new \InvalidArgumentException('Denominator cannot be zero');
        }

        $this->numerator = $numerator;
        $this->denominator = $denominator;
    }

    public function getNumerator(): int
    {
        return $this->numerator;
    }

    public function getDenominator(): int
    {
        return $this->denominator;
    }

    public function add(Rational $num): Rational
    {
        $n = $this->calcLeftNumerator($num) + $this->calcRightNumerator($num);
        $d = $this->calcCommonDenominator($num);

        return new Rational($n, $d);
    }

    public function sub(Rational $num): Rational
    {
        $n = $this->calcLeftNumerator($num) - $this->calcRightNumerator($num);
        $d = $this->calcCommonDenominator($num);

        return new Rational($n, $d);
    }

    protected function calcLeftNumerator(Rational $number): int
    {
        return $this->getNumerator() * $number->getDenominator();
    }

    protected function calcRightNumerator(Rational $number): int
    {
        return $this->getDenominator() * $number->getNumerator();
    }

    protected function calcCommonDenominator(Rational $number): int
    {
        return $this->denominator * $number->getDenominator();
    }
}

$rat1 = new Rational(3, 9);
echo $rat1->getNumerator() . PHP_EOL; // 3
echo $rat1->getDenominator() . PHP_EOL; // 9

$rat2 = new Rational(10, 3);
$rat3 = $rat1->add($rat2); // Абстракция для рационального числа 99/27
echo $rat3->getNumerator() . PHP_EOL; // 99
echo $rat3->getDenominator() . PHP_EOL; // 27

$rat4 = $rat1->sub($rat2); // Абстракция для рационального числа -81/27
echo $rat4->getNumerator() . PHP_EOL; // -81
echo $rat4->getDenominator() . PHP_EOL; // 27
