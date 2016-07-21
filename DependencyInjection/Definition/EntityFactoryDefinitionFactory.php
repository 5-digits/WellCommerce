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

namespace WellCommerce\Bundle\CoreBundle\DependencyInjection\Definition;

use Symfony\Component\DependencyInjection\Definition;

/**
 * Class RepositoryDefinitionFactory
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
final class EntityFactoryDefinitionFactory
{
    public function create(string $class) : Definition
    {
        $definition = new Definition($class);
        $definition->setAutowired(true);
        
        return $definition;
    }
}
