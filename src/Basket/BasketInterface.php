<?php

namespace Acme\Basket;

interface BasketInterface
{
    public function add(string $code): void;
    public function total(): float;
}
