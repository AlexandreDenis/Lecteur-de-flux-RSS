Feature: addFalseFeed
  In order to not see the new false feed
  As a normal user
  I enter a false feed

  Scenario: Add a false feed
    Given I am on the feed page
    When I put "bad feed" on feed input
    Then I do not see a new feed

