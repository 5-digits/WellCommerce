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

namespace WellCommerce\Bundle\CoreBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * Class AbstractExtension
 *
 * @package WellCommerce\Bundle\CoreBundle\DependencyInjection
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
abstract class AbstractExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $reflection = new \ReflectionClass($this);
        $directory  = dirname($reflection->getFileName());
        $loader     = new Loader\XmlFileLoader($container, new FileLocator($directory . '/../Resources/config'));
        $loader->load('services.xml');
    }
} 