<?php

namespace Code\Bundle\ChallengeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $apps = $this->getDoctrine()->getRepository('CodeChallengeBundle:App')->getApps();
        $developers = $this->getDoctrine()->getRepository('CodeChallengeBundle:Developer')->getDevelopers();

        return $this->render('CodeChallengeBundle:Default:index.html.twig',
            array(
                'apps' => $apps,
                'developers' => $developers,
            )
        );
    }
}
