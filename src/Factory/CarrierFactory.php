<?php

/*
 * A factory class for creating carrier instances.
 */

namespace App\Factory;

use App\Carrier\CarrierInterface;
use App\Carrier\TransCompany;
use App\Carrier\PackGroup;

class CarrierFactory {
    public static function create(string $slug): CarrierInterface {
        switch ($slug) {
            case 'transcompany':
                return new TransCompany();
            case 'packgroup':
                return new PackGroup();
            default:
                throw new \InvalidArgumentException('Invalid carrier slug.');
        }
    }
}