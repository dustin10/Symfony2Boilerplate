<?php

namespace Acme\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;

use Knp\Bundle\MenuBundle\MenuItem;

/**
 * UserAdmin.
 * 
 * @author Dustin Dobervich <ddobervich@gmail.com>
 */
class UserAdmin extends Admin
{
    protected $userManager;
    
    protected function configureShowField(ShowMapper $showMapper)
    {
        $showMapper
            ->add('username')
        ;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('General')
                ->add('username')
                ->add('email')
                ->add('plainPassword', 'text')
            ->end()
            ->with('Management')
                ->add('enabled')
                ->add('locked')
            ->end()
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('username')
            ->add('email')
            ->add('enabled')
            ->add('locked')
            ->add('lastLogin')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        
    }

    protected function configureSideMenu(MenuItem $menu, $action, Admin $childAdmin = null)
    {
        
    }
    
    public function preUpdate($user)
    {
        $this->getUserManager()->updateCanonicalFields($user);
        $this->getUserManager()->updatePassword($user);
    }

    public function setUserManager(UserManagerInterface $userManager)
    {
        $this->userManager = $userManager;
    }

    public function getUserManager()
    {
        return $this->userManager;
    }
}