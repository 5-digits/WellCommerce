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

namespace WellCommerce\Bundle\CoreBundle\Helper\Router;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Routing\RequestContext;
use WellCommerce\Bundle\CoreBundle\Controller\ControllerInterface;

/**
 * Interface RouterHelperInterface
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
interface RouterHelperInterface
{
    /**
     * Checks whether controller action is callable
     *
     * @param ControllerInterface $controller
     * @param string              $action
     *
     * @return bool
     */
    public function hasControllerAction(ControllerInterface $controller, string $action) : bool;

    /**
     * @return string
     */
    public function getCurrentAction() : string;

    /**
     * Returns the current request context
     *
     * @return RequestContext
     */
    public function getRouterRequestContext() : RequestContext;

    /**
     * Redirects user to another resource
     *
     * @param string $route
     * @param array  $routeParams
     *
     * @return RedirectResponse
     */
    public function redirectTo(string $route, array $routeParams = []) : RedirectResponse;

    /**
     * Resolves current route and redirects user to given controller action
     *
     * @param string $action
     * @param array  $params
     *
     * @return RedirectResponse
     */
    public function redirectToAction(string $action, array $params = []) : RedirectResponse;

    /**
     * Resolves route for given action
     *
     * @param string $action
     *
     * @return string
     */
    public function getActionForCurrentController(string $action) : string;

    /**
     * Creates absolute url pointing to particular controller action
     *
     * @param string $action
     * @param array  $params
     *
     * @return string
     */
    public function getRedirectToActionUrl(string $action, array $params = []) : string;

    /**
     * Generates an url
     *
     * @param       $routeName
     * @param array $params
     * @param int   $referenceType
     *
     * @return mixed
     */
    public function generateUrl(string $routeName, array $params = [], int $referenceType = UrlGeneratorInterface::ABSOLUTE_URL) : string;

    /**
     * @return \Symfony\Component\Routing\Route
     */
    public function getCurrentRoute();
}
