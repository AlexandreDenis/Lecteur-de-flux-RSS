<?php

require_once __DIR__ . '/../pdo/Connection.php';
require_once __DIR__ . '/../dao/FluxGateway.php';
require_once __DIR__ . '/../dao/ArticleGateway.php';
require_once __DIR__ . '/../model/Article.php';

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class GreetCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('workerFlux')
            ->setDescription('get articles for all flux in database')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        while(1) {
            $con = Connection::getConnection($output);

            $fluxGateway = new FluxGateway($con);

            $arrayFlux = $fluxGateway->findAll();

            foreach ($arrayFlux as &$value) {

                $id = $value->getId();
                $url = $value->getUrl();
                $date = $value->getDate();

                if (@file_get_contents($url, 0, NULL, 0, 1)) {
                    $xmlFile = simplexml_load_file($url);

                    $items = $xmlFile->channel->item;
                    foreach ($items as $item) {
                        $pubDate = date("Y-m-d H:i", strtotime($item->pubDate));
                        if ($date < $pubDate) {
                            $article = new Article($item->link, $item->title, $item->description, $pubDate);
                            $article->save($con, $id);
                        }
                    }
                }
                $fluxGateway->updateDate(date("Y-m-d H:i"), $id);
            }
            $output->writeln("the worker has ended one turn");
            sleep(10);
        }
    }
}