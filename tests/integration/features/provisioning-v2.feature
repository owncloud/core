Feature: provisioning
  Background:
    Given using api version "2"

  Scenario: Getting a not existing user
    Given as an "admin"
    When sending "GET" to "/cloud/users/test"
    Then the HTTP status code should be "404"

