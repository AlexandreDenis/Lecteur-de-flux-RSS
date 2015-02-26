Feature: deleteOneFeed
  In order to delete one feed
  As a normal user
  I choose a feed and click on the delete button

  Scenario: Delete all feeds
    Given I am on the feed page
    When I select the first feed
    And I click on the delete button
    Then I see one feed less