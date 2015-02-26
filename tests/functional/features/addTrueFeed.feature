Feature: addTrueFeed
  In order to see the new feed
  As a normal user
  I enter a true feed

  Scenario: Add a true feed
    Given I am on the feed page
    When I put "http://www.lepoint.fr/politique/rss.xml" on feed input
    Then I see a new feed

