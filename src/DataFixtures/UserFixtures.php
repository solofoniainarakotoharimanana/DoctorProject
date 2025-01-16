<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Repository\AddressRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    const ROLES = [['ROLE_USER'], ['ROLE_DOCTOR']];
    public function __construct(private UserPasswordHasherInterface $hash, private AddressRepository $addressRepo)
    {
        
    }

    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $addresses = $this->addressRepo->findAll();
        $faker = Factory::create('fr_FR');
        $users = [];

        for ($i = 1; $i < 16; $i++){
            $user = new User;
            $user->setEmail($faker->email)
                ->setFirstname($faker->firstName)
                ->setLastname($faker->lastName)
                ->setPassword('password')
                ->setRoles(mt_rand(0, 1) === 0 ? self::ROLES[0] : self::ROLES[1] )
                ->setCreatedAt(new \DateTimeImmutable())
                ->setPassword($this->hash->hashPassword($user, 'password'))
                ->setProfileImage($faker->image(null, 360, 360, 'person', true))
                ->setAddress($faker->address)
                ->setCity($faker->city);
                
            $users[] = $user;
            $manager->persist($user);
        }

      

        

        $manager->flush();
    }
}
