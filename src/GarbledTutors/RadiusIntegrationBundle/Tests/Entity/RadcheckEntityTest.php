<?php

namespace GarbledTutors\RadiusIntegrationBundle\Tests\Entity;

use GarbledTutors\RadiusIntegrationBundle\Entity\Radcheck;
use Doctrine\ORM\Tools\SchemaTool;

class RadcheckEntityTest extends TestCase
{
	public function testCreateNewUser()
	{
		$user = new Radcheck();
		$user->setUsername('tom');
		$user->setPassword('abc123');
		$user->setPasswordRepeat('abc123');
		$this->entityManager->persist($user);
		$this->entityManager->flush();

		$all_users = $this->entityManager->getRepository('RadiusIntegrationBundle:Radcheck')->findAll();
		$this->assertTrue(count($all_users) == 1);
		$record = $all_users[0];
		$this->assertTrue($record->getUsername() == 'tom');
		$this->assertTrue($record->getAttribute() == 'MD5-Password');
		$this->assertTrue($record->getOp() == ':=');
		$this->assertTrue($record->authenticate('abc123'));
	}
}

