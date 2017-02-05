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

namespace WellCommerce\Bundle\AppBundle\Resolver;

use WellCommerce\Bundle\AppBundle\Entity\LayoutBox;
use WellCommerce\Bundle\CoreBundle\Controller\Box\BoxControllerInterface;

/**
 * Interface ServiceResolverInterface
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
interface ServiceResolverInterface
{
    public function resolveControllerService(LayoutBox $layoutBox): BoxControllerInterface;
}
