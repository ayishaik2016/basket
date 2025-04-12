<?php

namespace Acme\Offer;

use Acme\Product\Product;

class RedWidgetOffer implements OfferInterface
{
    public function apply(array $items): float
    {
        $redWidgets = array_filter($items, fn($p) => $p->code === 'R01');
        $count = count($redWidgets);

        return floor($count / 2) * (32.95 / 2);
    }
}
