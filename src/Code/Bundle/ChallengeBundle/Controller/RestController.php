<?php

namespace Code\Bundle\ChallengeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

class RestController extends Controller
{
    /**
     * Get information about builds
     *
     * **Response Format**
     * { "builds": {
     *          }
     * }
     *
     * @ApiDoc{
     *      section="Builds",
     *      resource=true,
     *      statusCodes={
     *          200="OK"
     *      }
     * }
     *
     * @return JsonResponse
     *
     * @Route("/api/builds")
     */
    public function buildsAction()
    {
        $apps = $this->getDoctrine()->getRepository('CodeChallengeBundle:Build')->getBuilds();
        $reponseArray = array();
        foreach ($apps as $app) {
            $reponseArray[] = array('version'=>$app->getVersion(),'current'=>$app->getCurrent());
        }
        $response = new JsonResponse();
        $response->setData(array('builds' => $reponseArray));
        return $response;
    }

    /**
     * Get information about apps
     *
     * **Response Format**
     * { "apps": {
     *          }
     * }
     *
     * @ApiDoc{
     *      section="Apps",
     *      resource=true,
     *      statusCodes={
     *          200="OK"
     *      }
     * }
     *
     * @return JsonResponse
     *
     * @Route("/api/apps")
     */
    public function appsAction()
    {
        $response = new JsonResponse();
        $response->setData(array());
        return $response;
    }
}
