<?php

/*
 * This interface defines the contract for all classes of carriers.
 */
namespace App\Carrier;

interface CarrierInterface {
    public function calculateShippingCost(float $weight): float;
}