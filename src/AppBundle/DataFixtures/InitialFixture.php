<?php

namespace AppBundle\DataFixtures;

use AppBundle\Entity\Roles;
use AppBundle\Entity\User;
use Faker;
use AppBundle\Entity\Producto;
use AppBundle\Entity\Marca;
use Doctrine\Bundle\FixturesBundle\ORMFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class InitialFixture implements ORMFixtureInterface {

    public function load(ObjectManager $manager) {

        // Roles
        $role1 = new Roles();
        $role1->setRol("Cliente");
        $manager->persist($role1);

        $role2 = new Roles();
        $role2->setRol("Vendedor");
        $manager->persist($role2);


        $role3 = new Roles();
        $role3->setRol("Administrador");
        $manager->persist($role3);

        // user default
        $userDefaultFake = Faker\Factory::create();
        $userDefault = new User();
        $userDefault->setNombre("default");
        $userDefault->setMail($userDefaultFake->address);
        $userDefault->setPassword($userDefaultFake->password);
        $userDefault->setTelefono($userDefaultFake->phoneNumber);
        $userDefault->setRoles($role1);
        $manager->persist($userDefault);

        // users Clientes
        for ($i = 0; $i < 2; $i++) {
            $userFake = Faker\Factory::create();
            $user = new User();
            $user->setNombre($userFake->name);
            $user->setMail($userFake->address);
            $user->setPassword($userFake->password);
            $user->setTelefono($userFake->phoneNumber);
            $user->setRoles($role1);
            $manager->persist($user);
        }

        // users Clientes
        for ($i = 0; $i < 2; $i++) {
            $userFake = Faker\Factory::create();
            $user = new User();
            $user->setNombre($userFake->name);
            $user->setMail($userFake->address);
            $user->setPassword($userFake->password);
            $user->setTelefono($userFake->phoneNumber);
            $user->setRoles($role2);
            $manager->persist($user);
        }

        // users Admins
        $userFake = Faker\Factory::create();
        $user = new User();
        $user->setNombre($userFake->name);
        $user->setMail($userFake->address);
        $user->setPassword("admin");
        $user->setTelefono($userFake->phoneNumber);
        $user->setRoles($role3);
        $manager->persist($user);

        ////////////////////////////////////////////////////////////////
        //Marca
        $marcaFake = Faker\Factory::create();
        $marca1 = new Marca();
        $marca1->setNombre("IPhone");
        $marca1->setCover($marcaFake->url);
        $manager->persist($marca1);

        $marca2 = new Marca();
        $marca2->setNombre("Samsumg");
        $marca2->setCover($marcaFake->url);
        $manager->persist($marca2);


        //$manager->flush();
        // products Productos Iphone
        for ($i = 0; $i < 2; $i++) {
            $productFake = Faker\Factory::create();
            $product = new Producto();
            $product->setNombre($productFake->name);
            $product->setBateria($productFake->randomDigitNotNull);
            $product->setPulgadas(5,5);
            $product->setRam("4");
            $product->setResolucion("full hd");
            $product->setSistema("IOS");
            $product->setRom("64");
            // tengo que buscar el usuario a agregar al producto
            $product->setUser($userDefault);
            $product->setMarca($marca1);
            $manager->persist($product);
        }

        // products Clientes Samsumg
        for ($i = 0; $i < 2; $i++) {
            $productFake = Faker\Factory::create();
            $product = new Producto();
            $product->setNombre($productFake->name);
            $product->setBateria($productFake->randomDigitNotNull);
            $product->setPulgadas(5,5);
            $product->setRam("4");
            $product->setResolucion("full hd");
            $product->setSistema("Android");
            $product->setRom("64");
            // tengo que buscar el usuario a agregar al producto
            $product->setUser($userDefault);
            $product->setMarca($marca2);
            $manager->persist($product);
        }


        $manager->flush();
    }

}
