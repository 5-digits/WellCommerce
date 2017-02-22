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

namespace WellCommerce\Bundle\CoreBundle\Test\Configurator;

use WellCommerce\Bundle\CoreBundle\Controller\ControllerInterface;
use WellCommerce\Component\Layout\Configurator\LayoutBoxConfiguratorInterface;
use WellCommerce\Bundle\CoreBundle\Test\AbstractTestCase;

/**
 * Class AbstractLayoutBoxConfiguratorTestCase
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
abstract class AbstractLayoutBoxConfiguratorTestCase extends AbstractTestCase
{
    /**
     * @dataProvider provideLayoutBoxConfiguration
     */
    public function testConfiguration(string $type, string $controllerService)
    {
        $configurator = $this->getService();
        $this->assertEquals($type, $configurator->getType());
        $this->assertEquals($controllerService, $configurator->getControllerService());
        $this->assertInstanceOf(ControllerInterface::class, $this->container->get($controllerService));
    }
    
    abstract protected function getService(): LayoutBoxConfiguratorInterface;
}
