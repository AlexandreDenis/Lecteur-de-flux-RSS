Feature: listArticles
  In order to see the list of articles
  As a normal user
  I need to be able to see the list of articles

  Scenario: Display all articles
    Given I am on "/index.php"
    Then I should see "Articles"

