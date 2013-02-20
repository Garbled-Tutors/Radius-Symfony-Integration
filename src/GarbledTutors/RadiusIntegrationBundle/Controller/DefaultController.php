<?php

namespace GarbledTutors\RadiusIntegrationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('RadiusIntegrationBundle:Default:index.html.twig', array('name' => $name));
    }
}
