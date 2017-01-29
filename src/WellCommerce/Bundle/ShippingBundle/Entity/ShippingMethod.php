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

namespace WellCommerce\Bundle\ShippingBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Knp\DoctrineBehaviors\Model\Blameable\Blameable;
use Knp\DoctrineBehaviors\Model\Timestampable\Timestampable;
use Knp\DoctrineBehaviors\Model\Translatable\Translatable;
use WellCommerce\Bundle\CurrencyBundle\Entity\Currency;
use WellCommerce\Bundle\DoctrineBundle\Behaviours\Enableable;
use WellCommerce\Bundle\DoctrineBundle\Behaviours\Identifiable;
use WellCommerce\Bundle\DoctrineBundle\Behaviours\Sortable;
use WellCommerce\Bundle\ShopBundle\Entity\ShopCollectionAwareTrait;
use WellCommerce\Bundle\TaxBundle\Entity\TaxAwareTrait;

/**
 * Class ShippingMethod
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class ShippingMethod implements ShippingMethodInterface
{
    use Identifiable;
    use Enableable;
    use Sortable;
    use Translatable;
    use Timestampable;
    use Blameable;
    use TaxAwareTrait;
    use ShopCollectionAwareTrait;
    
    protected $calculator      = '';
    protected $optionsProvider = '';
    protected $countries       = [];
    
    /**
     * @var Currency
     */
    protected $currency;
    
    /**
     * @var Collection
     */
    protected $costs;
    
    /**
     * @var Collection
     */
    protected $paymentMethods;
    
    public function __construct()
    {
        $this->costs          = new ArrayCollection();
        $this->paymentMethods = new ArrayCollection();
        $this->shops          = new ArrayCollection();
    }
    
    public function getCalculator(): string
    {
        return $this->calculator;
    }
    
    public function setCalculator(string $calculator)
    {
        $this->calculator = $calculator;
    }
    
    public function getOptionsProvider(): string
    {
        return $this->optionsProvider;
    }
    
    public function setOptionsProvider(string $optionsProvider)
    {
        $this->optionsProvider = $optionsProvider;
    }
    
    public function getCosts(): Collection
    {
        return $this->costs;
    }
    
    public function setCosts(Collection $costs)
    {
        $this->costs = $costs;
    }
    
    public function getPaymentMethods(): Collection
    {
        return $this->paymentMethods;
    }
    
    public function getCountries(): array
    {
        return $this->countries;
    }
    
    public function setCountries(array $countries)
    {
        $this->countries = $countries;
    }
    
    public function getCurrency()
    {
        return $this->currency;
    }
    
    public function setCurrency(Currency $currency = null)
    {
        $this->currency = $currency;
    }
    
    public function hasCurrency(): bool
    {
        return $this->currency instanceof Currency;
    }
}
