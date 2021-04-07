<?php

namespace Numbers;
class Complex
{
    public $real;
    public $image;

    function __construct(float $real = 0, float $image = 0)
    {
        $this->real = $real;
        $this->image = $image;
    }

    /**
     * @param Complex $value
     * @return $this
     */
    function multiplication(Complex $value)
    {
        //формула z=z1⋅z2 = (a1a2−b1b2)+(a1b2+b1a2)i
        $real = $this->real * $value->real - $this->image * $value->image;
        $image = $this->real * $value->image + $this->image * $value->real;
        return new Complex($real, $image);
    }

    /**
     * @param Complex $value
     * @return $this
     */
    function sub(Complex $value)
    {
        $real = $this->real - $value->real;
        $image = $this->image - $value->image;
        return new Complex($real, $image);
    }

    /**
     * @param Complex $value
     * @return $this
     */
    function add(Complex $value)
    {
        $real = $this->real + $value->real;
        $image = $this->image + $value->image;
        return new Complex($real, $image);
    }

    /**
     * @param Complex $value
     * @return $this
     */
    function division(Complex $value)
    {
        //формула https://www.webmath.ru/poleznoe/formules_16_10.php, знаю есть расчет через формулу Эйлекра, но мне больше нравится в таком виде
        $real = ($this->real * $value->real + $this->image * $value->image) /
            (pow($value->real, 2) + pow($value->image, 2));

        $image = ($value->real * $this->image - $this->real * $value->image) /
            (pow($value->real, 2) + pow($value->image, 2));
        return new Complex($real, $image);
    }

    function __toString()
    {
        return $this->real . ' + j' . $this->image;
    }
}

$z1 = new Complex(12.0, 40.0);
$z2 = new Complex(88.0, 33.0);

echo '(' . $z1 . ')*(' . $z2 . ')=' . $z1->multiplication($z2) . "\n";
echo '(' . $z1 . ')+(' . $z2 . ')=' . $z1->add($z2) . "\n";
echo '(' . $z1 . ')-(' . $z2 . ')=' . $z1->sub($z2) . "\n";
echo '(' . $z1 . ')/(' . $z2 . ')=' . $z1->division($z2) . "\n";
