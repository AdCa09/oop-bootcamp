/* Use Case #1
A basket contains the following things:

Banana's (6 pieces, costing €1 each)
Apples (3 pieces, costing €1.5 each)
Bottles of wine (2 bottles, costing €10 each)
Without using classes, do the following in your code:

Calculate the total price
Calculate how much of the total price is tax (fruit goes at 6%, wine is 21%)
Next, do the same with classes. What style do you prefer? Do you notice any difference in time needed to code, structure or readability? From now on, if nothing is stated specifically, it's recommended to use classes. */

<?php

$banana = 6*1;
$apples = 3*1.5;
$bottle_wine = 2*10;

$total = $banana + $apples + $bottle_wine . " euros";

echo $total . "\n";

$tva_fruit= 0.06;
$tva_wine =0.21;

$taxes_fruits = ($banana+$apples) * $tva_fruit;
$taxes_wine = $bottle_wine * $tva_wine;

$total_taxes = $taxes_fruits + $taxes_wine;

echo $total_taxes . "euros" . "\n";






class Basket {
    public $banana;
    public $apples;
    public $bottle_wine;

    public function __construct() {
        $this->banana = 6 * 1;
        $this->apples = 3 * 1.5;
        $this->bottle_wine = 2 * 10;
    }

    public function getTotal() {
        $total = $this->banana + $this->apples + $this->bottle_wine;
        return $total . " euros";
    }

    public function calculateFruitTax() {
        $tva_fruits = 0.06;
        $taxes_fruits = ($this->banana + $this->apples) * $tva_fruits;
        return $taxes_fruits . " euros";
    }

    public function calculateWineTax() {
        $tva_wine = 0.21;
        $taxes_wine = $this->bottle_wine * $tva_wine;
        return $taxes_wine . " euros";
    }

    public function calculateTotalTax() {
        $total_taxes = $this->calculateFruitTax() + $this->calculateWineTax();
        return $total_taxes . " euros";
    }
}

$basket = new Basket();
echo "Total price: " . $basket->getTotal() . "\n";
echo "Total taxes on fruits: " . $basket->calculateFruitTax() . "\n";
echo "Total taxes on wine: " . $basket->calculateWineTax() . "\n";
echo "Total taxes: " . $basket->calculateTotalTax() . "\n";