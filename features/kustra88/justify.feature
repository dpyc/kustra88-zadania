Feature: Justify by kustra88

  Scenario: Justify by kustra88
    Given I am on homepage
    When I follow "kustra88 - justify"
    And I fill in "Text" with "piotrek piotrek kustra piotrek lorem ipsum lorem ipsum kustra piotrek lorem"
    And I fill in "Lenght" with "25"
    And I press "Justify"
    Then I should see "piotrek   piotrek  kustra"
    Then I should see "piotrek lorem ipsum lorem"
    Then I should see "ipsum    kustra   piotrek"
    Then I should see "lorem                    "