<?php

namespace Acme\Product;

class ProductCatalogue
{
    /** @var Product[] */
    private array $products = [];

    public function __construct(array $products)
    {
        foreach ($products as $product) {
            $this->products[$product->code] = $product;
        }
    }

    public function get(string $code): Product
    {
        if (!isset($this->products[$code])) {
            throw new \InvalidArgumentException("Product with code {$code} not found.");
        }

        return $this->products[$code];
    }
}
