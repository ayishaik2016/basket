<?php

namespace Acme\Offer;

use Acme\Product\Product;

interface OfferInterface
{
    /** @param Product[] $items */
    public function apply(array $items): float;
}
