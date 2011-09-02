<?php

namespace Acme\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use FOS\UserBundle\Model\UserManagerInterface;
use Knp\Bundle\MenuBundle\MenuItem;

/**
 * UserAdmin.
 * 
 * @author Dustin Dobervich <ddobervich@gmail.com>
 */
class UserAdmin extends Admin
{
    /**
     * @var UserManager $userManager
     */
    protected $userManager;
    
    /**
     * Configures the show fields.
     * 
     * @param ShowMapper $showMapper The show mapper
     */
    protected function configureShowField(ShowMapper $showMapper)
    {
        $showMapper
            ->add('username')
            ->add('email')
            ->add('lastLogin')
        ;
    }

    /**
     * Configures the form fields.
     * 
     * @param FormMapper $formMapper The form mapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('General')
                ->add('username')
                ->add('email')
                ->add('plainPassword', 'text')
            ->end()
            ->with('Management')
                ->add('enabled', null, array('required' => false))
                ->add('locked', null, array('required' => false))
            ->end()
        ;
    }

    /**
     * Configures the list fields.
     * 
     * @param ListMapper $listMapper The list mapper
     */
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

    /**
     * Configures the datagrid mapper.
     * 
     * @param DatagridMapper $datagridMapper The datagrid mapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        
    }
    
    /**
     * Configures the side menu.
     * 
     * @param MenuItem $menu The menu
     * @param type $action The action type
     * @param Admin $childAdmin The child
     */
    protected function configureSideMenu(MenuItem $menu, $action, Admin $childAdmin = null)
    {
        
    }
    
    /**
     * Invoked before update.
     * 
     * @param User $user The user
     */
    public function preUpdate($user)
    {
        $this->userManager->updateCanonicalFields($user);
        $this->userManager->updatePassword($user);
    }

    /**
     * Sets the user manager.
     * 
     * @param UserManagerInterface $userManager The user manager
     */
    public function setUserManager(UserManagerInterface $userManager)
    {
        $this->userManager = $userManager;
    }
}
