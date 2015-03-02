<?php

require_once __DIR__.'/../pdo/Connection.php';
require_once __DIR__.'/../dao/FeedGateway.php';
require_once __DIR__.'/../dao/ArticleGateway.php';
require_once __DIR__.'/../model/Article.php';

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class WorkerCommand.
 */
class WorkerCommand extends Command
{
    /**
     * configure the worker.
     */
    protected function configure()
    {
        $this
            ->setName('workerFeed')
            ->setDescription('get articles for all feed in database')
        ;
    }

    /**
     * execute the worker.
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        while (1) {
            $con = Connection::getConnection($output);

            $feedGateway = new FeedGateway($con);

            $arrayFeed = $feedGateway->findAll();

            foreach ($arrayFeed as &$value) {
                $id = $value->getId();
                $url = $value->getUrl();
                $date = $value->getDate();

                if (@file_get_contents($url, 0, null, 0, 1)) {
                    $xmlFile = simplexml_load_file($url);

                    //atom file
                    if ($xmlFile->channel->item) {
                        $items = $xmlFile->channel->item;
                        foreach ($items as $item) {
                            $pubDate = date("Y-m-d H:i", strtotime($item->pubDate));
                            if ($date < $pubDate) {
                                $article = new Article($item->link, $item->title, explode(".", $item->description)[0], $pubDate);
                                $article->save($con, $id);
                            }
                        }
                    }
                    //rss file
                    elseif ($xmlFile->entry) {
                        $items = $xmlFile->entry;
                        foreach ($items as $item) {
                            $pubDate = date("Y-m-d H:i", strtotime($item->updated));
                            if ($date < $pubDate) {
                                $article = new Article($item->link[0]['href'], $item->title, $item->summary, $pubDate);
                                $article->save($con, $id);
                            }
                        }
                    }
                }
                $feedGateway->updateDate(date("Y-m-d H:i"), $id);
            }
            $output->writeln("the worker has ended one turn");
            sleep(10);
        }
    }
}
