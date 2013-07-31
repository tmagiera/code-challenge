<?php

namespace Code\Bundle\ChallengeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('CodeChallengeBundle:Default:index.html.twig', array('name' => $name));
    }
}
