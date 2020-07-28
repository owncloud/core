@api
Feature: Other tests related to api

  @skipOnOcis @issue-ocis-reva-100
  Scenario: robots.txt file should be accessible
    When a user requests "/robots.txt" with "GET" and no authentication
    Then the HTTP status code should be "200"
    And the content in the response should match with the content of file "robots.txt" in the server root

  @skipOnOcV10 @issue-ocis-reva-100
  #after fixing all issues delete this Scenario and use the one above
  Scenario: robots.txt file should be accessible
    When a user requests "/robots.txt" with "GET" and no authentication
    Then the HTTP status code should be "401" or "404"
