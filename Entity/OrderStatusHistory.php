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

use Knp\DoctrineBehaviors\Model\Blameable\Blameable;
use Knp\DoctrineBehaviors\Model\Timestampable\Timestampable;
use WellCommerce\Bundle\DoctrineBundle\Entity\IdentifiableEntityTrait;

/**
 * Class OrderStatus
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class OrderStatusHistory implements OrderStatusHistoryInterface
{
    use IdentifiableEntityTrait;
    use Timestampable;
    use Blameable;
    use OrderAwareTrait;
    
    /**
     * @var OrderStatusInterface
     */
    protected $orderStatus;
    
    /**
     * @var string
     */
    protected $comment;
    
    /**
     * @var bool
     */
    protected $notify;
    
    /**
     * {@inheritdoc}
     */
    public function getOrderStatus() : OrderStatusInterface
    {
        return $this->orderStatus;
    }
    
    /**
     * {@inheritdoc}
     */
    public function setOrderStatus(OrderStatusInterface $orderStatus)
    {
        $this->orderStatus = $orderStatus;
        $this->order->setCurrentStatus($orderStatus);
    }
    
    /**
     * {@inheritdoc}
     */
    public function getComment() : string
    {
        return $this->comment;
    }
    
    /**
     * {@inheritdoc}
     */
    public function setComment(string $comment)
    {
        $this->comment = $comment;
    }
    
    /**
     * {@inheritdoc}
     */
    public function isNotify() : bool
    {
        return $this->notify;
    }
    
    /**
     * {@inheritdoc}
     */
    public function setNotify(bool $notify)
    {
        $this->notify = $notify;
    }
}
