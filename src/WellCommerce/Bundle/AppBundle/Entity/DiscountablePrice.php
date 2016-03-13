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

namespace WellCommerce\Bundle\AppBundle\Entity;

/**
 * Class DiscountablePrice
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class DiscountablePrice extends Price
{
    /**
     * @var float
     */
    protected $discountedNetAmount;

    /**
     * @var float
     */
    protected $discountedGrossAmount;

    /**
     * @var float
     */
    protected $discountedTaxAmount;

    /**
     * @var \DateTime|null
     */
    protected $validFrom;

    /**
     * @var \DateTime|null
     */
    protected $validTo;

    /**
     * @return \DateTime|null
     */
    public function getValidFrom()
    {
        return $this->validFrom;
    }

    /**
     * @param \DateTime|null $validFrom
     */
    public function setValidFrom(\DateTime $validFrom = null)
    {
        $this->validFrom = $validFrom;
    }

    /**
     * @return \DateTime|null
     */
    public function getValidTo()
    {
        return $this->validTo;
    }

    /**
     * @param \DateTime|null $validTo
     */
    public function setValidTo(\DateTime $validTo = null)
    {
        $this->validTo = $validTo;
    }

    /**
     * @return float
     */
    public function getFinalGrossAmount() : float
    {
        if ($this->isDiscountValid()) {
            return $this->getDiscountedGrossAmount();
        }

        return $this->getGrossAmount();
    }

    /**
     * @return bool
     */
    public function isDiscountValid() : bool
    {
        $now = new \DateTime();

        if ($this->validFrom instanceof \DateTime && $this->validTo instanceof \DateTime) {
            return ($this->validFrom <= $now) && ($this->validTo >= $now);
        }

        return false;
    }

    /**
     * @return float
     */
    public function getDiscountedGrossAmount() : float
    {
        return $this->discountedGrossAmount;
    }

    /**
     * @param float $discountedGrossAmount
     */
    public function setDiscountedGrossAmount(float $discountedGrossAmount)
    {
        $this->discountedGrossAmount = $discountedGrossAmount;
    }

    /**
     * @return float
     */
    public function getFinalNetAmount() : float
    {
        if ($this->isDiscountValid()) {
            return $this->getDiscountedNetAmount();
        }

        return $this->getNetAmount();
    }

    /**
     * @return float
     */
    public function getDiscountedNetAmount() : float
    {
        return (float)$this->discountedNetAmount;
    }

    /**
     * @param float $discountedNetAmount
     */
    public function setDiscountedNetAmount(float $discountedNetAmount)
    {
        $this->discountedNetAmount = $discountedNetAmount;
    }

    /**
     * @return float
     */
    public function getFinalTaxAmount() : float
    {
        if ($this->isDiscountValid()) {
            return $this->getDiscountedTaxAmount();
        }

        return $this->getTaxAmount();
    }

    /**
     * @return float|int
     */
    public function getDiscountedTaxAmount() : float
    {
        return $this->discountedTaxAmount;
    }

    /**
     * @param float $discountedTaxAmount
     */
    public function setDiscountedTaxAmount(float $discountedTaxAmount)
    {
        $this->discountedTaxAmount = $discountedTaxAmount;
    }
}
