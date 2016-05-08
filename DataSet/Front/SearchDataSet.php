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

namespace WellCommerce\Bundle\SearchBundle\DataSet\Front;

use Doctrine\ORM\QueryBuilder;
use WellCommerce\Bundle\CoreBundle\DataSet\AbstractDataSet;
use WellCommerce\Bundle\CoreBundle\Helper\Request\RequestHelperInterface;
use WellCommerce\Bundle\SearchBundle\Provider\SearchProviderInterface;
use WellCommerce\Bundle\SearchBundle\Query\SimpleQuery;
use WellCommerce\Component\DataSet\Configurator\DataSetConfiguratorInterface;
use WellCommerce\Component\DataSet\Request\DataSetRequestInterface;

/**
 * Class SearchDataSet
 *
 * @author Adam Piotrowski <adam@wellcommerce.org>
 */
final class SearchDataSet extends AbstractDataSet
{
    /**
     * @var SearchProviderInterface
     */
    private $provider;

    public function setSearchProvider(SearchProviderInterface $provider)
    {
        $this->provider = $provider;
    }

    public function configureOptions(DataSetConfiguratorInterface $configurator)
    {
        $configurator->setColumns([
            'id'               => 'product.id',
            'name'             => 'product_translation.name',
            'shortDescription' => 'product_translation.shortDescription',
            'description'      => 'product_translation.description',
            'route'            => 'IDENTITY(product_translation.route)',
            'weight'           => 'product.weight',
            'price'            => 'product.sellPrice.grossAmount',
            'discountedPrice'  => 'product.sellPrice.discountedGrossAmount',
            'isDiscountValid'  => 'IF_ELSE(:date BETWEEN product.sellPrice.validFrom AND product.sellPrice.validTo, 1, 0)',
            'finalPrice'       => 'IF_ELSE(:date BETWEEN product.sellPrice.validFrom AND product.sellPrice.validTo, product.sellPrice.discountedGrossAmount, product.sellPrice.grossAmount) * currency_rate.exchangeRate',
            'currency'         => 'product.sellPrice.currency',
            'tax'              => 'sell_tax.value',
            'stock'            => 'product.stock',
            'producerId'       => 'IDENTITY(product.producer)',
            'producerName'     => 'producers_translation.name',
            'category'         => 'categories.id',
            'shop'             => 'product_shops.id',
            'photo'            => 'photos.path',
            'status'           => 'statuses.id',
            'score'            => 'FIELD(product.id, :scores)',
        ]);
        
        $configurator->setColumnTransformers([
            'route' => $this->getDataSetTransformer('route')
        ]);
    }
    
    protected function getQueryBuilder(DataSetRequestInterface $request) : QueryBuilder
    {
        $queryBuilder = parent::getQueryBuilder($request);
        $queryBuilder->setParameter('scores', $this->provider->getResultIdentifiers());
        
        return $queryBuilder;
    }
}
