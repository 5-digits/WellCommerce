<?php

namespace WellCommerce\Bundle\OrderBundle\Entity;

use WellCommerce\Bundle\AppBundle\Entity\DiscountablePrice;
use WellCommerce\Bundle\AppBundle\Entity\Price;
use WellCommerce\Bundle\CoreBundle\Behaviours\Timestampable\TimestampableTrait;
use WellCommerce\Bundle\CoreBundle\Entity\IdentifiableTrait;
use WellCommerce\Bundle\ProductBundle\Entity\ProductAwareTrait;
use WellCommerce\Bundle\ProductBundle\Entity\VariantAwareTrait;

/**
 * Class OrderProduct
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class OrderProduct implements OrderProductInterface
{
    use IdentifiableTrait;
    use TimestampableTrait;
    use ProductAwareTrait;
    use VariantAwareTrait;
    use OrderAwareTrait;
    
    protected $quantity = 1;
    protected $weight   = 0.00;
    protected $options  = [];
    protected $locked   = false;
    
    /**
     * @var Price
     */
    protected $buyPrice;
    
    /**
     * @var Price
     */
    protected $sellPrice;
    
    public function __construct()
    {
        $this->buyPrice  = new Price();
        $this->sellPrice = new Price();
    }
    
    public function getCurrentStock(): int
    {
        if ($this->hasVariant()) {
            return $this->getVariant()->getStock();
        }
        
        return $this->getProduct()->getStock();
    }
    
    public function getCurrentSellPrice(): DiscountablePrice
    {
        if ($this->hasVariant()) {
            return $this->getVariant()->getSellPrice();
        }
        
        return $this->getProduct()->getSellPrice();
    }
    
    public function getQuantity(): int
    {
        return $this->quantity;
    }
    
    public function setQuantity(int $quantity)
    {
        $this->quantity = $quantity;
    }
    
    public function increaseQuantity(int $increase)
    {
        $this->quantity += $increase;
    }
    
    public function decreaseQuantity(int $decrease)
    {
        $this->quantity -= $decrease;
    }
    
    public function getSellPrice(): Price
    {
        return $this->sellPrice;
    }
    
    public function setSellPrice(Price $sellPrice)
    {
        $this->sellPrice = $sellPrice;
    }
    
    public function getBuyPrice(): Price
    {
        return $this->buyPrice;
    }
    
    public function setBuyPrice(Price $buyPrice)
    {
        $this->buyPrice = $buyPrice;
    }
    
    public function getWeight(): float
    {
        return $this->weight;
    }
    
    public function setWeight(float $weight)
    {
        $this->weight = $weight;
    }
    
    public function getOptions(): array
    {
        return $this->options;
    }
    
    public function setOptions(array $options)
    {
        $this->options = $options;
    }
    
    public function isLocked(): bool
    {
        return $this->locked;
    }
    
    public function setLocked(bool $locked)
    {
        $this->locked = $locked;
    }
}
