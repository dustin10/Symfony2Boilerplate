<?php 

namespace Acme\ApplicationBundle\Menu;

use Knp\Bundle\MenuBundle\Menu;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Router;

/**
 * MainMenu.
 * 
 * @author Dustin Dobervich <ddobervich@gmail.com>
 */
class MainMenu extends Menu
{
    /**
     * Constructs a new instance of MainMenu.
     * 
     * @param Request $request
     * @param Router $router
     */
    public function __construct(Request $request, Router $router)
    {
        parent::__construct();

        $this->setCurrentUri($request->getRequestUri());

        // ... add children
    }
}