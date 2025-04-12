<?php

use PHPUnit\Framework\TestCase;
use Acme\Product\Product;
use Acme\Product\ProductCatalogue;
use Acme\Offer\RedWidgetOffer;
use Acme\Delivery\TieredDeliveryRule;
use Acme\Pricing\PriceCalculator;
use Acme\Basket\Basket;

class BasketTest extends TestCase
{
    private function createBasket(): Basket
    {
        $catalogue = new ProductCatalogue([
            new Product('R01', 'Red Widget', 32.95),
            new Product('G01', 'Green Widget', 24.95),
            new Product('B01', 'Blue Widget', 7.95),
        ]);

        $offer = new RedWidgetOffer();
        $delivery = new TieredDeliveryRule();
        $calculator = new PriceCalculator([$offer], $delivery);

        return new Basket($catalogue, $calculator);
    }

    public function testBasket1(): void
    {
        $basket = $this->createBasket();
        $basket->add('B01');
        $basket->add('G01');

        $this->assertEquals(37.85, $basket->total());
    }

    public function testBasket2(): void
    {
        $basket = $this->createBasket();
        $basket->add('R01');
        $basket->add('R01');

        $this->assertEquals(54.37, $basket->total());
    }

    public function testBasket3(): void
    {
        $basket = $this->createBasket();
        $basket->add('R01');
        $basket->add('G01');

        $this->assertEquals(60.85, $basket->total());
    }

    public function testBasket4(): void
    {
        $basket = $this->createBasket();
        $basket->add('B01');
        $basket->add('B01');
        $basket->add('R01');
        $basket->add('R01');
        $basket->add('R01');

        $this->assertEquals(98.27, $basket->total());
    }
}
