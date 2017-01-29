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

namespace WellCommerce\Bundle\OrderBundle\Entity;

use WellCommerce\Bundle\DoctrineBundle\Behaviours\Enableable\EnableableInterface;
use WellCommerce\Bundle\DoctrineBundle\Entity\BlameableInterface;
use WellCommerce\Bundle\DoctrineBundle\Entity\EntityInterface;
use WellCommerce\Bundle\DoctrineBundle\Entity\TimestampableInterface;
use WellCommerce\Bundle\DoctrineBundle\Entity\TranslatableInterface;

/**
 * Interface OrderStatusInterface
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
interface OrderStatusInterface extends
    EntityInterface,
    TimestampableInterface,
    TranslatableInterface,
    BlameableInterface
{
    public function getOrderStatusGroup(): OrderStatusGroupInterface;
    
    public function setOrderStatusGroup(OrderStatusGroupInterface $orderStatusGroup);
    
    public function getColour(): string;
    
    public function setColour(string $colour);
}
