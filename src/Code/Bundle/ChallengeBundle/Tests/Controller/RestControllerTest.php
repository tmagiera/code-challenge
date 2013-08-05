<?php

namespace Code\Bundle\ChallengeBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RestControllerTest extends WebTestCase
{
    public function testBuilds()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/api/builds');
    }

    public function testApps()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/api/apps');
    }

}
