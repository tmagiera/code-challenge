<?php

namespace Code\Bundle\ChallengeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class IndexController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        $apps = $this->getDoctrine()->getRepository('CodeChallengeBundle:App')->getApps();
        $developers = $this->getDoctrine()->getRepository('CodeChallengeBundle:Developer')->getDevelopers();
        $feeds = $this->getDoctrine()->getRepository('CodeChallengeBundle:Feed')->getLatestFeeds();

        return $this->render('CodeChallengeBundle:Index:index.html.twig',
            array(
                'apps' => $apps,
                'developers' => $developers,
                'feeds' => $feeds,
            )
        );
    }
}
