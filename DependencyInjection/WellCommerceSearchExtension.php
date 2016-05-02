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

namespace WellCommerce\Bundle\SearchBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use WellCommerce\Bundle\CoreBundle\DependencyInjection\AbstractExtension;

/**
 * Class WellCommerceSearchExtension
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class WellCommerceSearchExtension extends AbstractExtension
{
    protected function processExtensionConfiguration(array $configuration, ContainerBuilder $container)
    {
        parent::processExtensionConfiguration($configuration, $container);

        $type = $configuration['engine']['type'];

        $container->setParameter('search_term_min_length', $configuration['engine']['search_term_min_length']);
        $container->setAlias('search.indexer', sprintf('search.indexer.%s', $type));
        $container->setAlias('search_index.manager', sprintf('search_index.manager.lucene', $type));
        $container->setAlias('search.provider', sprintf('search.provider.lucene', $type));
    }
}
