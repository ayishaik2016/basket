<?php

namespace Acme\Pricing;

use Acme\Product\Product;
use Acme\Offer\OfferInterface;
use Acme\Delivery\DeliveryRuleInterface;

class PriceCalculator
{
    /** @param OfferInterface[] $offers */
    public function __construct(
        private array $offers,
        private DeliveryRuleInterface $deliveryRule
    ) {}

    /** @param Product[] $items */
    public function calculate(array $items): float
    {
        $subtotal = array_reduce($items, fn($sum, $item) => $sum + $item->price, 0.0);

        $discounts = array_reduce($this->offers, fn($carry, $offer) => $carry + $offer->apply($items), 0.0);

        $total = $subtotal - $discounts;
        $delivery = $this->deliveryRule->calculate($total);

        return round($total + $delivery, 2);
    }
}
