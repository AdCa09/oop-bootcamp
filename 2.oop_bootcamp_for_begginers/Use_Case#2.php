<?php

class basket{


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

    public function fruitsDiscount(){
        $discount = 0.5;
        $this->banana *= $discount;
        $this->apples *= $discount;
    }

}


$basket = new basket();

$basket->fruitsDiscount();