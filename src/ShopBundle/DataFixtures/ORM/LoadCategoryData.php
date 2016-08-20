<?php

namespace ShopBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use ShopBundle\Entity\Category;

class LoadCategoryData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $em)
    {
        $food = new Category();
        $food->setName('food');

        $clothes = new Category();
        $clothes->setName('clothes');

        $underwear = new Category();
        $underwear->setName('underwear');

        $em->persist($food);
        $em->persist($clothes);
        $em->persist($underwear);
        $em->flush();

        $this->addReference('category-food', $food);
        $this->addReference('category-clothes', $clothes);
        $this->addReference('category-underwear', $underwear);
    }

    public function getOrder()
    {
        return 1;
    }
}
