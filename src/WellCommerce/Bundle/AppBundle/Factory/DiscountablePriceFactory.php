<?php
/*
 * WellCommerce Open-Source E-Commerce Platform
 * 
 * This file is part of the WellCommerce package.
 *
 * (c) Adam Piotrowski <adam@wellcommerce.org>
 * 
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 */

namespace WellCommerce\Bundle\AppBundle\Factory;

use WellCommerce\Bundle\AppBundle\Entity\DiscountablePriceInterface;
use WellCommerce\Bundle\DoctrineBundle\Factory\AbstractEntityFactory;

/**
 * Class DiscountablePriceFactory
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class DiscountablePriceFactory extends AbstractEntityFactory
{
    /**
     * @var string
     */
    protected $supportsInterface = DiscountablePriceInterface::class;

    /**
     * @return DiscountablePriceInterface
     */
    public function create() : DiscountablePriceInterface
    {
        /** @var $price DiscountablePriceInterface */
        $price = $this->init();
        $price->setGrossAmount(0);
        $price->setNetAmount(0);
        $price->setTaxAmount(0);
        $price->setTaxRate($this->getDefaultTax()->getValue());
        $price->setCurrency($this->getDefaultShop()->getDefaultCurrency());

        return $price;
    }
}
