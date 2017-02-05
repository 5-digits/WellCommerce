<?php
/**
 * WellCommerce Open-Source E-Commerce Platform
 *
 * This file is part of the WellCommerce package.
 *
 * (c) Adam Piotrowski <adam@wellcommerce.org>
 *
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 */

namespace WellCommerce\Bundle\CatalogBundle\Tests\Manager;

use WellCommerce\Bundle\AppBundle\Configurator\LayoutBoxConfiguratorInterface;
use WellCommerce\Bundle\CoreBundle\Test\Configurator\AbstractLayoutBoxConfiguratorTestCase;

/**
 * Class SearchBoxConfiguratorTest
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class SearchBoxConfiguratorTest extends AbstractLayoutBoxConfiguratorTestCase
{
    protected function getService(): LayoutBoxConfiguratorInterface
    {
        return $this->container->get('search.layout_box.configurator');
    }
    
    public function provideLayoutBoxConfiguration()
    {
        return [
            ['Search', 'search.layout_box.controller'],
        ];
    }
}
