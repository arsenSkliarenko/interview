<?php

/*
 *
 * A class representing TransCompany and implementing CarrierInterface.
 *
 */

namespace App\Carrier;

use App\Carrier\CarrierInterface;

class TransCompany implements CarrierInterface {
    public function calculateShippingCost(float $weight):float {
        if ($weight <= 10) {
            return 20;
        } else {
            return 100;
        }
    }
}