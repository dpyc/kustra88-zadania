Feature: Justify by kustra88

  Scenario: Justify by kustra88
    Given I am on homepage
    When I follow "justify"
    And I fill in "Text" with "piotrek piotrek kustra piotrek lorem ipsum lorem ipsum kustra piotrek lorem"
    And I fill in "Length" with "25"
    And I press "Justify"
    Then I should see "Wynik: "
    Then I should see "piotrek  piotrek kustra" in the "pre" element
    Then I should see "piotrek lorem ipsum lorem" in the "pre" element
    Then I should see "ipsum kustra piotrek" in the "pre" element
    Then I should see "lorem" in the "pre" element
