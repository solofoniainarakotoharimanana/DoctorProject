<?php

namespace App\DataFixtures;

use App\Entity\Speciality;
use App\Repository\UserRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class SpecialityFixtures extends Fixture implements DependentFixtureInterface
{

  public function __construct(private UserRepository $userRepository)
  {}

  public function load(ObjectManager $manager): void
  {
    $faker = Factory::create('fr_FR');
    $users = $this->userRepository->findAll();
    $specialities = [];   
    for ($i=1; $i < 16 ; $i++) {
      $specialty = new Speciality();
      $specialty->setName($faker->word())
      ->setCreatedAt(new \DateTimeImmutable());
      $specialities[] = $specialty;
      $manager->persist($specialty);
    }
    foreach ($users as $user) {
      for ($i=1; $i < 16 ; $i++) {
        if (in_array('ROLE_DOCTOR', $user->getRoles())) {
          $user->addSpecility($specialities[mt_rand(1, count($specialities) - 1)]);  
        }
      }
    }

    $manager->flush();
  }

  public function getDependencies(): array
  {
    return [UserFixtures::class];
  }
}