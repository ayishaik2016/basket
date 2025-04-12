<?php

namespace Acme\Basket;

use Acme\Product\ProductCatalogue;
use Acme\Pricing\PriceCalculator;
use Acme\Product\Product;

class Basket implements BasketInterface
{
    /** @var Product[] */
    private array $items = [];

    public function __construct(
        private ProductCatalogue $catalogue,
        private PriceCalculator $calculator
    ) {}

    public function add(string $code): void
    {
        $product = $this->catalogue->get($code);
        $this->items[] = $product;
    }

    public function total(): float
    {
        return $this->calculator->calculate($this->items);
    }
}
