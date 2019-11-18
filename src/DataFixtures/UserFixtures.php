<?php

namespace App\DataFixtures;

use App\Entity\Adminsecure;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        // User
        $user = new Adminsecure();
        $user->setEmail('adrian@slamquiz.com');
        $user->setPassword('$argon2id$v=19$m=65536,t=4,p=1$MzBMRzhrOTFhWWpBZkNhdQ$VytYUoeCcf7XrumkZeCyETdMUKYhhUPK0jIN0tK0JqY');
        $manager->persist($user);

        // Admin
        $user = new Adminsecure();
        $user->setEmail('admin@slamquiz.com');
        $user->setRoles(['ROLE_ADMIN']);
        $user->setPassword('$argon2id$v=19$m=65536,t=4,p=1$MzBMRzhrOTFhWWpBZkNhdQ$VytYUoeCcf7XrumkZeCyETdMUKYhhUPK0jIN0tK0JqY');
        $manager->persist($user);

        // Superadmin
        $user = new Adminsecure();
        $user->setEmail('superadmin@slamquiz.com');
        $user->setPassword('$argon2id$v=19$m=65536,t=4,p=1$MzBMRzhrOTFhWWpBZkNhdQ$VytYUoeCcf7XrumkZeCyETdMUKYhhUPK0jIN0tK0JqY');
        $manager->persist($user);


        $manager->flush();
    

        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            'the_new_password'
        ));

    }
        
}
