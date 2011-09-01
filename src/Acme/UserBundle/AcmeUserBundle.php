<?php

namespace Acme\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * AcmeUserBundle.
 * 
 * @author Dustin Dobervich <ddobervich@gmail.com>
 */
class AcmeUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    } 
}

