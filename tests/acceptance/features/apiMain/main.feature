@api
Feature: Other tests related to api

  @issue-ocis-reva-100
  Scenario: robots.txt file should be accessible
    When a user requests "/robots.txt" with "GET" and no authentication
    Then the HTTP status code should be "200"
    And the content of the requested file in the response should be
      """
      User-agent: *
      Disallow: /
      """
