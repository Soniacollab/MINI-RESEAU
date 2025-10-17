<?php

namespace App\DataFixtures;

use App\Entity\Message;
use App\Entity\Comment;
use App\Entity\User;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Faker\Factory;

class AppFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();
        $users = [];

        // Création admin
        $admin = new User();
        $admin->setEmail('admin@books.com')
            ->setFirstName('Admin')
            ->setLastName('User')
            ->setPassword($this->passwordHasher->hashPassword($admin, 'admin'))
            ->setRoles(['ROLE_ADMIN']);
        $manager->persist($admin);
        $users[] = $admin;

        // Utilisateurs classiques
        for ($i = 1; $i <= 2; $i++) {
            $user = new User();
            $user->setEmail("user$i@example.com")
                ->setFirstName($faker->firstName)
                ->setLastName($faker->lastName)
                ->setPassword($this->passwordHasher->hashPassword($user, 'user'))
                ->setRoles(['ROLE_USER']);
            $manager->persist($user);
            $users[] = $user;
        }

        // Messages et commentaires
        foreach ($users as $user) {
            for ($j = 1; $j <= 2; $j++) {
                $createdAt = new \DateTimeImmutable('-' . rand(1, 30) . ' days');
                $updatedAt = rand(0, 1) ? new \DateTimeImmutable('-' . rand(0, 10) . ' days') : null;

                $message = new Message();
                $message->setTitle($faker->sentence(3))
                    ->setContent($faker->paragraph)
                    ->setAuthor($user)
                    ->setImage('https://placehold.co/600x400')
                    ->setCreatedAt($createdAt);
                if ($updatedAt) {
                    $message->setUpdatedAt($updatedAt);
                }
                $manager->persist($message);

                // Commentaire lié au message
                $comment = new Comment();
                $comment->setContent($faker->sentence)
                    ->setAuthor($users[array_rand($users)])
                    ->setMessage($message)
                    ->setCreatedAt(new \DateTimeImmutable());
                $manager->persist($comment);
            }
        }

        $manager->flush();
    }

}
