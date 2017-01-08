<?php

namespace AppBundle\Menu;

use Admingenerator\GeneratorBundle\Menu\AdmingeneratorMenuBuilder;
use Knp\Menu\FactoryInterface;

class AdminMenuBuilder extends AdmingeneratorMenuBuilder {
    /**
     * AdminMenuBuilder constructor.
     */
    public function __construct()
    {
        $this->translation_domain = 'Admin';
    }

    public function navbarMenu(FactoryInterface $factory, array $options) {
		$menu = $factory->createItem('root');
		$menu->setChildrenAttributes(array('id' => 'main_navigation', 'class' => 'nav navbar-nav sidebar-menu'));

		$authorizationChecker = $this->container->get('security.authorization_checker');

		if ($authorizationChecker->isGranted('ROLE_ADMIN')) {
			$this->addLinkRoute(
				$menu,
				'Users',
				'CHC_LanguageTestingAdminBundle_User_list'
			)->setExtra('icon', 'fa fa-user');
		}

		$this->addLinkRoute(
			$menu,
			'Exit Administration',
			'homepage'
		)->setExtra('icon', 'fa fa-external-link');

		return $menu;
	}
}
