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
namespace WellCommerce\Bundle\AttributeBundle\Repository;

use WellCommerce\Bundle\AttributeBundle\Entity\Attribute;
use WellCommerce\Bundle\AttributeBundle\Entity\AttributeGroup;
use WellCommerce\Bundle\AttributeBundle\Entity\AttributeValue;
use WellCommerce\Bundle\DoctrineBundle\Repository\EntityRepository;

/**
 * Class AttributeRepository
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class AttributeRepository extends EntityRepository implements AttributeRepositoryInterface
{
    public function getAttributeSet(AttributeGroup $attributeGroup): array
    {
        $sets                 = [];
        $attributesCollection = $attributeGroup->getAttributes();
        
        $attributesCollection->map(function (Attribute $attribute) use (&$sets) {
            $sets[] = [
                'id'     => $attribute->getId(),
                'name'   => $attribute->translate()->getName(),
                'values' => $this->getAttributeValuesSet($attribute),
            ];
        });
        
        return $sets;
    }
    
    public function getAttributeValuesSet(Attribute $attribute): array
    {
        $values                    = [];
        $attributeValuesCollection = $attribute->getValues();
        
        $attributeValuesCollection->map(function (AttributeValue $attributeValue) use (&$values) {
            $values[] = [
                'id'   => $attributeValue->getId(),
                'name' => $attributeValue->translate()->getName(),
            ];
        });
        
        return $values;
    }
}
