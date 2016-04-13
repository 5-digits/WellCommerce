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

namespace WellCommerce\Bundle\OrderBundle\Controller\Front\Order;

use Symfony\Component\HttpFoundation\Response;
use WellCommerce\Bundle\CoreBundle\Controller\Front\AbstractFrontController;
use WellCommerce\Bundle\CoreBundle\Service\Breadcrumb\BreadcrumbItem;
use WellCommerce\Bundle\OrderBundle\Manager\Front\OrderManager;
use WellCommerce\Bundle\PaymentBundle\Entity\PaymentMethodInterface;
use WellCommerce\Bundle\PaymentBundle\Processor\PaymentProcessorInterface;

/**
 * Class ConfirmationController
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class ConfirmationController extends AbstractFrontController
{
    public function indexAction() : Response
    {
        $cart = $this->manager->getCartContext()->getCurrentCart();
        
        if ($cart->isEmpty()) {
            return $this->redirectToRoute('front.cart.index');
        }
        
        $this->addBreadCrumbItem(new BreadcrumbItem([
            'name' => $this->trans('order.heading.confirmation'),
        ]));
        
        $orderManager = $this->getOrderManager();
        $order        = $orderManager->prepareOrderFromCart($cart);
        $processor    = $this->getPaymentProcessor($order->getPaymentMethod());
        $form         = $this->manager->getForm($order);

        if ($form->handleRequest()->isSubmitted()) {
            if ($form->isValid()) {
                $orderManager->saveOrder($order);
                
                return $this->redirectToRoute('front.payment.initialize');
            }
            
            if (count($form->getError())) {
                $this->manager->getFlashHelper()->addError('order.form.error.confirmation');
            }
        }
        
        return $this->displayTemplate('index', [
            'form'     => $form,
            'elements' => $form->getChildren(),
            'summary'  => $this->get('cart_summary.collector')->collect($cart),
            'order'    => $order
        ]);
    }
    
    protected function getOrderManager() : OrderManager
    {
        return $this->get('order.manager.front');
    }

    protected function getPaymentProcessor(PaymentMethodInterface $paymentMethod) : PaymentProcessorInterface
    {
        return $this->get('payment.processor.collection')->get($paymentMethod->getProcessor());
    }
}
