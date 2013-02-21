<?php

namespace GarbledTutors\RadiusIntegrationBundle\Tests\Entity;

use GarbledTutors\RadiusIntegrationBundle\Entity\Radcheck;
use Doctrine\ORM\Tools\SchemaTool;

class RadcheckEntityTest extends TestCase
{
	public function testTest()
	{
		$blah = new Radcheck();
		$blah->setUsername('hhh');
		$blah->setAttribute('hhh');
		$blah->setOp('hhh');
		$blah->setValue('hhh');
		$this->entityManager->persist($blah);
		$this->entityManager->flush();
	}
}

