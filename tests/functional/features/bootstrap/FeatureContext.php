<?php

use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;

use Behat\MinkExtension\Context\MinkContext;

/**
 * Features context.
 */
class FeatureContext extends MinkContext
{
    /**
     * Initializes context.
     * Every scenario gets it's own context object.
     *
     * @param array $parameters context parameters (set them up through behat.yml)
     */
    public function __construct(array $parameters)
    {
        $clientOptions = array();
        $client = new \Behat\Mink\Driver\Goutte\Client();
        $client->setClient(new \Guzzle\Http\Client('', $clientOptions));
        $driver = new \Behat\Mink\Driver\GoutteDriver($client);
    }

    /**
     * @Given /^I am on the feed page$/
     */
    public function iAmOnTheFeedPage()
    {
        throw new PendingException();
    }

    /**
     * @When /^I put "([^"]*)" on feed input$/
     */
    public function iPutOnFeedInput($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then /^I do not see a new feed$/
     */
    public function iDoNotSeeANewFeed()
    {
        throw new PendingException();
    }

    /**
     * @Then /^I see a new feed$/
     */
    public function iSeeANewFeed()
    {
        throw new PendingException();
    }

    /**
     * @When /^I click on the delete all button$/
     */
    public function iClickOnTheDeleteAllButton()
    {
        throw new PendingException();
    }

    /**
     * @Then /^I see no feed$/
     */
    public function iSeeNoFeed()
    {
        throw new PendingException();
    }

    /**
     * @When /^I select the first feed$/
     */
    public function iSelectTheFirstFeed()
    {
        throw new PendingException();
    }

    /**
     * @Given /^I click on the delete button$/
     */
    public function iClickOnTheDeleteButton()
    {
        throw new PendingException();
    }

    /**
     * @Then /^I see one feed less$/
     */
    public function iSeeOneFeedLess()
    {
        throw new PendingException();
    }

    /**
     * @Given /^I am on the index page$/
     */
    public function iAmOnTheIndexPage()
    {
        throw new PendingException();
    }

    /**
     * @Then /^I see articles$/
     */
    public function iSeeArticles()
    {
        throw new PendingException();
    }

    /**
     * @Then /^I see feeds$/
     */
    public function iSeeFeeds()
    {
        throw new PendingException();
    }
}
