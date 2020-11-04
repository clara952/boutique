<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
private $passwordEncoder;
    public function __construct(UserPasswordEncoderInterface $pp)
    {
        $this->passwordEncoder =$pp;
    }


    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $user=new User();
        $user->setEmail("clar@gmail.com");
        $user->setPassword($this->passwordEncoder->encodePassword($user,"toto"));
        $user->setRoles(array("ROLE_User"));

        $manager->persist($user);
        $manager->flush();
    }
}
