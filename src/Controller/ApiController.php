<?php

/*
 * Controller to handle requests from the customer.
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Factory\CarrierFactory;
use App\Service\ShippingCostCalculator;

class ApiController extends AbstractController {
    /**
     * @Route("/api/shipping-cost", methods={"POST"})
     */
    public function calculateShippingCost(Request $request, ShippingCostCalculator $calculator): Response
    {
        $data = json_decode($request->getContent(), true);

        $weight = $data['weight'] ?? null;
        $carrierSlug = $data['carrier_slug'] ?? null;

        if ($weight === null || $carrierSlug === null) {
            return $this->json(['error' => 'Invalid payload'], Response::HTTP_BAD_REQUEST);
        }

        $carrier = CarrierFactory::create($carrierSlug);

        $cost = $calculator->calculate($carrier, $weight);

        return $this->json(['cost' => $cost], Response::HTTP_OK);
    }
}