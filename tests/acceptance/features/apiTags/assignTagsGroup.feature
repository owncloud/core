@api @systemtags-app-required
Feature: Title of your feature
  I want to use this template for my feature file

  Background:
    Given user "user0" has been created with default attributes
    And as user "user0"

  Scenario: User can assign tags when in the tag's groups
    Given group "group1" has been created
    And user "user0" has been added to group "group1"
    When the administrator creates a "not user-assignable" tag with name "TagWithGroups" and groups "group1|group2" using the WebDAV API
    Then the HTTP status code should be "201"
    And the user should be able to assign the "not user-assignable" tag with name "TagWithGroups"

  Scenario: User can assign static tags when in the tag's groups
    Given group "group1" has been created
    And user "user0" has been added to group "group1"
    When the administrator creates a "static" tag with name "TagWithGroups" and groups "group1|group2" using the WebDAV API
    Then the HTTP status code should be "201"
    And the user should be able to assign the "static" tag with name "TagWithGroups"

  Scenario: User cannot assign tags when not in the tag's groups
    When the administrator creates a "not user-assignable" tag with name "TagWithGroups" and groups "group1|group2" using the WebDAV API
    Then the HTTP status code should be "201"
    And the user should not be able to assign the "not user-assignable" tag with name "TagWithGroups"
