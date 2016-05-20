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

namespace WellCommerce\Component\SearchEngine\Document\Field;

/**
 * Interface DocumentFieldInterface
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
interface DocumentFieldInterface
{
    public function getName() : string;

    public function getValue() : string;

    public function getType() : string;
}
