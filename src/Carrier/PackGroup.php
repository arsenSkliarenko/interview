<?php

/*
 * A class representing a PackGroup and implementing CarrierInterface.
 */

namespace App\Carrier;

class PackGroup implements CarrierInterface {

    public function  calculateShippingCost(float $weight): float {
        return $weight;
    }
}