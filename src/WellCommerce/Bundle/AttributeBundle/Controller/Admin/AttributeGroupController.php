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

namespace WellCommerce\Bundle\AttributeBundle\Controller\Admin;

use Doctrine\Common\Collections\Criteria;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use WellCommerce\Bundle\AttributeBundle\Entity\AttributeGroupInterface;
use WellCommerce\Bundle\AttributeBundle\Repository\AttributeGroupRepositoryInterface;
use WellCommerce\Bundle\CoreBundle\Controller\Admin\AbstractAdminController;

/**
 * Class AttributeGroupController
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class AttributeGroupController extends AbstractAdminController
{
    public function ajaxIndexAction(Request $request): JsonResponse
    {
        if (!$request->isXmlHttpRequest()) {
            return $this->redirectToAction('index');
        }
        
        $groups = $this->manager->getRepository()->matching(new Criteria());
        $sets   = [];
        
        $groups->map(function (AttributeGroupInterface $attributeGroup) use (&$sets) {
            $sets[] = [
                'id'               => $attributeGroup->getId(),
                'name'             => $attributeGroup->translate()->getName(),
                'current_category' => false,
            ];
        });
        
        return $this->jsonResponse([
            'sets' => $sets,
        ]);
    }
}
