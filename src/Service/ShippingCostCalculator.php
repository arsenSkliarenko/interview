<?php

/*
 * The class responsible for calculating the shipping cost.
 */

namespace App\Service;

use App\Carrier\CarrierInterface;

class ShippingCostCalculator {

    public function calculate(CarrierInterface $carrier, float $weight): float {
        return $carrier->calculateShippingCost($weight);
    }
}