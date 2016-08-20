<?php

namespace ShopBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use ShopBundle\Entity\Product;

class LoadProductData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $em)
    {
        $banana = new Product();
        $banana->setName('banana');

        $raincoat = new Product();
        $raincoat->setName('raincoat');

        $sleepwear = new Product();
        $sleepwear->setName('sleepwear');

        $em->persist($banana);
        $em->persist($raincoat);
        $em->persist($sleepwear);
        $em->flush();

        $this->addReference('product-banana', $banana);
        $this->addReference('product-raincoat', $raincoat);
        $this->addReference('product-sleepwear', $sleepwear);
    }

    public function getOrder()
    {
        return 2;
    }
}
