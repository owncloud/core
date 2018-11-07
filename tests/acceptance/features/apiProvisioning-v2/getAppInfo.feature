@api @provisioning_api-app-required
Feature: get app info
  As an admin
  I want to be able to get app info
  So that I can get the information of a specific application

  Background:
    Given using OCS API version "2"

  @smokeTest
  Scenario: admin gets app info
    When the administrator sends HTTP method "GET" to OCS API endpoint "/cloud/apps/files"
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the XML "data" "id" value should be "files"
    And the XML "data" "name" value should be "Files"
    And the XML "data" "types" "element" value should be "filesystem"
    And the XML "data" "dependencies" "owncloud" "min-version" attribute value should be a valid version string
    And the XML "data" "dependencies" "owncloud" "max-version" attribute value should be a valid version string