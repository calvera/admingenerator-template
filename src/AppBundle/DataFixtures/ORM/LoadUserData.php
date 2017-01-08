<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\User;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $userAdmin = new User();
        $userAdmin->setUsername('admin');
        $userAdmin->setPlainPassword('test');
        $userAdmin->setEmail('admin@example.com');
        $userAdmin->addRole('ROLE_SUPER_ADMIN');
        $userAdmin->setEnabled(true);

        $manager->persist($userAdmin);
        $this->addReference('admin-user', $userAdmin);

        $manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }    
}