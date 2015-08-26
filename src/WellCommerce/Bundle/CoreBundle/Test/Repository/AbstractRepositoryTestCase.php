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

namespace WellCommerce\Bundle\CoreBundle\Test\Repository;

use WellCommerce\Bundle\CoreBundle\Test\AbstractTestCase;
use WellCommerce\Bundle\DataSetBundle\Request\DataSetRequest;

/**
 * Class AbstractRepositoryTestCase
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
abstract class AbstractRepositoryTestCase extends AbstractTestCase
{
    /**
     * @return null|\WellCommerce\Bundle\CoreBundle\Repository\RepositoryInterface
     */
    protected function getService()
    {
        return null;
    }

    public function testRepositoryServiceIsCreated()
    {
        $repository = $this->getService();

        if (null !== $repository) {
            $this->assertInstanceOf('WellCommerce\Bundle\CoreBundle\Repository\RepositoryInterface', $repository);
        }
    }
}
