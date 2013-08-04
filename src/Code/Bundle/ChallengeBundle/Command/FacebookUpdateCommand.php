<?php
namespace Code\Bundle\ChallengeBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Code\Bundle\ChallengeBundle\Entity\Feed;

class FacebookUpdateCommand extends Command
{
    protected function configure()
    {
        $this->setName('facebook:update')
            ->setDescription('Pull facebook feeds and save in db');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        require 'vendor/facebook/php-sdk/src/facebook.php';

        $facebook = new \Facebook(array(
            'appId'  => '397258497042571',
            'secret' => '36c1173041aeb1a3529151f5a556b6f5',
        ));

        // Get Access Token
        $access_token = $facebook->getAccessToken();

        // Get Feeds
        $feeds = $facebook->api('183540721656189/?fields=feed.fields(message,type,status_type)&access_token='.$access_token);

        // Weird way to get EM
        $em = $this->getApplication()->getKernel()->getContainer()->get('doctrine')->getManager();

        $insertedCounter = 0;

        foreach ($feeds['feed']['data'] as $feedData) {
            $feed = $em->getRepository('CodeChallengeBundle:Feed')->findByFeedId($feedData['id']);
            if (empty($feed)) {
                $feed = new Feed();
                $feed->setFeedId($feedData['id']);
                $feed->setMessage($feedData['message']);
                $feed->setCreatedDate(new \DateTime($feedData['created_time']));
                $em->persist($feed);
                $insertedCounter++;
            }
            $em->flush();
        }

        $output->writeln("Inserted ".$insertedCounter." new feeds");
    }
}