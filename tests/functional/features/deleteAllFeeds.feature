Feature: deleteAllFeeds
  In order to delete all feeds
  As a normal user
  I click on the delete all button

  Scenario: Delete all feeds
    Given I am on the feed page
    When I click on the delete all button
    Then I see no feed