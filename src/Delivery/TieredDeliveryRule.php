<?php

namespace Acme\Delivery;

class TieredDeliveryRule implements DeliveryRuleInterface
{
    public function calculate(float $subtotal): float
    {
        return match (true) {
            $subtotal < 50 => 4.95,
            $subtotal < 90 => 2.95,
            default => 0.00,
        };
    }
}
