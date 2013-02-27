<?php

namespace GarbledTutors\RadiusIntegrationBundle\Features\Context;

use Symfony\Component\HttpKernel\KernelInterface;
use Behat\Symfony2Extension\Context\KernelAwareInterface;
use Behat\MinkExtension\Context\MinkContext;

use Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;

//
// Require 3rd-party libraries here:
//
//   require_once 'PHPUnit/Autoload.php';
//   require_once 'PHPUnit/Framework/Assert/Functions.php';
//

/**
 * Feature context.
 */
class FeatureContext extends MinkContext // BehatContext //MinkContext if you want to test web
                  implements KernelAwareInterface
{
    private $kernel;
    private $parameters;

    /**
     * Initializes context with parameters from behat.yml.
     *
     * @param array $parameters
     */
    public function __construct(array $parameters)
    {
        $this->parameters = $parameters;
    }

    /**
     * Sets HttpKernel instance.
     * This method will be automatically called by Symfony2Extension ContextInitializer.
     *
     * @param KernelInterface $kernel
     */
    public function setKernel(KernelInterface $kernel)
    {
        $this->kernel = $kernel;
    }

    /**
     * @Given /^I am not logged in$/
     */
    public function iAmNotLoggedIn()
    {
			$this->visit('/logout');
    }

    /**
     * @Then /^I should be able to login as "([^"]*)" with the password "([^"]*)"$/
     */
    public function iShouldBeAbleToLoginAsWithThePassword($arg1, $arg2)
    {
			$this->visit('/logout');
			$this->visit('/login');
			$this->getSession()->getPage()->fillField('Username',$arg1);
			$this->getSession()->getPage()->fillField('Password',$arg2);
			$this->getSession()->getPage()->findButton('login')->press();
    }

    /**
     * @Given /^I am logged in as an administrator$/
     */
    public function iAmLoggedInAsAnAdministrator()
    {
			$this->iShouldBeAbleToLoginAsWithThePassword('admin','securepass');
    }

    /**
     * @When /^I create a new user$/
     */
    public function iCreateANewUser()
    {
			$this->iCreateANewUserWithAndAsTheUsernameAndPassword('joe','randpass');
    }

    /**
     * @When /^I create a new user, with "([^"]*)" and "([^"]*)" as the username and password$/
     */
    public function iCreateANewUserWithAndAsTheUsernameAndPassword($arg1, $arg2)
    {
			$this->visit('/radcheck/new');
			$this->getSession()->getPage()->fillField('Username',$arg1);
			$this->getSession()->getPage()->fillField('Password',$arg2);
			$this->getSession()->getPage()->fillField('Password Repeat',$arg2);
			$this->getSession()->getPage()->findButton('Create')->press();
    }

    /**
     * @Given /^I logout$/
     */
    public function iLogout()
    {
			$this->visit('/logout');
    }

//
// Place your definition and hook methods here:
//
//    /**
//     * @Given /^I have done something with "([^"]*)"$/
//     */
//    public function iHaveDoneSomethingWith($argument)
//    {
//        $container = $this->kernel->getContainer();
//        $container->get('some_service')->doSomethingWith($argument);
//    }
//
}
