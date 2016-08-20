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

namespace WellCommerce\Bundle\CoreBundle\Behaviours\Enableable;

/**
 * Interface EnableableInterface
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
interface EnableableInterface
{
    public function isEnabled() : bool;

    public function setEnabled(bool $enabled);
}
