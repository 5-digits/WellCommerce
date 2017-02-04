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

use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\HttpKernel\Kernel;

/**
 * Class AppKernel
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = [
            new \Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new \Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new \Symfony\Bundle\TwigBundle\TwigBundle(),
            new \Symfony\Bundle\MonologBundle\MonologBundle(),
            new \Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new \Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new \Doctrine\Bundle\DoctrineCacheBundle\DoctrineCacheBundle(),
            new \Doctrine\Bundle\MigrationsBundle\DoctrineMigrationsBundle(),
            new \Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle(),
            new \Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new \FOS\JsRoutingBundle\FOSJsRoutingBundle(),
            new \Bazinga\Bundle\JsTranslationBundle\BazingaJsTranslationBundle(),
            new \Liip\ImagineBundle\LiipImagineBundle(),
            new \Knp\DoctrineBehaviors\Bundle\DoctrineBehaviorsBundle(),
            new \Cache\AdapterBundle\CacheAdapterBundle(),
            new \EmanueleMinotto\TwigCacheBundle\TwigCacheBundle(),
            new \WellCommerce\Bundle\CoreBundle\WellCommerceCoreBundle(),
            new \WellCommerce\Bundle\ReportBundle\WellCommerceReportBundle(),
            new \WellCommerce\Bundle\OrderBundle\WellCommerceOrderBundle(),
            new \WellCommerce\Bundle\PaymentBundle\WellCommercePaymentBundle(),
            new \WellCommerce\Bundle\NewsBundle\WellCommerceNewsBundle(),
            new \WellCommerce\Bundle\CompanyBundle\WellCommerceCompanyBundle(),
            new \WellCommerce\Bundle\ShopBundle\WellCommerceShopBundle(),
            new \WellCommerce\Bundle\CatalogBundle\WellCommerceCatalogBundle(),
            new \WellCommerce\Bundle\ProductBundle\WellCommerceProductBundle(),
            new \WellCommerce\Bundle\ClientBundle\WellCommerceClientBundle(),
            new \WellCommerce\Bundle\ApiBundle\WellCommerceApiBundle(),
            new \WellCommerce\Bundle\RoutingBundle\WellCommerceRoutingBundle(),
            new \WellCommerce\Bundle\ContactBundle\WellCommerceContactBundle(),
            new \WellCommerce\Bundle\ShipmentBundle\WellCommerceShipmentBundle(),
            new \WellCommerce\Bundle\TaxBundle\WellCommerceTaxBundle(),
            new \WellCommerce\Bundle\CountryBundle\WellCommerceCountryBundle(),
            new \WellCommerce\Bundle\AdminBundle\WellCommerceAdminBundle(),
            new \WellCommerce\Bundle\CouponBundle\WellCommerceCouponBundle(),
            new \WellCommerce\Bundle\OAuthBundle\WellCommerceOAuthBundle(),
            new \WellCommerce\Bundle\CurrencyBundle\WellCommerceCurrencyBundle(),
            new \WellCommerce\Bundle\PageBundle\WellCommercePageBundle(),
            new \WellCommerce\Bundle\DictionaryBundle\WellCommerceDictionaryBundle(),
            new \WellCommerce\Bundle\ProductStatusBundle\WellCommerceProductStatusBundle(),
            new \WellCommerce\Bundle\DistributionBundle\WellCommerceDistributionBundle(),
            new \WellCommerce\Bundle\ReviewBundle\WellCommerceReviewBundle(),
            new \WellCommerce\Bundle\DoctrineBundle\WellCommerceDoctrineBundle(),
            new \WellCommerce\Bundle\SearchBundle\WellCommerceSearchBundle(),
            new \WellCommerce\Bundle\LayeredNavigationBundle\WellCommerceLayeredNavigationBundle(),
            new \WellCommerce\Bundle\ShippingBundle\WellCommerceShippingBundle(),
            new \WellCommerce\Bundle\LayoutBundle\WellCommerceLayoutBundle(),
            new \WellCommerce\Bundle\ShowcaseBundle\WellCommerceShowcaseBundle(),
            new \WellCommerce\Bundle\LocaleBundle\WellCommerceLocaleBundle(),
            new \WellCommerce\Bundle\ThemeBundle\WellCommerceThemeBundle(),
            new \WellCommerce\Bundle\MediaBundle\WellCommerceMediaBundle(),
            new \WellCommerce\Bundle\WishlistBundle\WellCommerceWishlistBundle(),
            new \WellCommerce\Bundle\AppBundle\WellCommerceAppBundle(),
        ];
        
        if (in_array($this->getEnvironment(), ['dev', 'test'])) {
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }
        
        return $bundles;
    }
    
    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load($this->getRootDir() . '/config/config_' . $this->getEnvironment() . '.yml');
    }
}
