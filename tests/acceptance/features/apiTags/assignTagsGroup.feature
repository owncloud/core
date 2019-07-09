@api @systemtags-app-required @TestAlsoOnExternalUserBackend
Feature: Title of your feature
  I want to use this template for my feature file

  Background:
    Given user "user1" has been created with default attributes and skeleton files
    And as user "user1"

  Scenario: User can assign tags when in the tag's groups
    Given group "grp1" has been created
    And user "user1" has been added to group "grp1"
    When the administrator creates a "not user-assignable" tag with name "TagWithGroups" and groups "grp1|group2" using the WebDAV API
    Then the HTTP status code should be "201"
    And the user should be able to assign the "not user-assignable" tag with name "TagWithGroups"

  Scenario: User can assign static tags when in the tag's groups
    Given group "grp1" has been created
    And user "user1" has been added to group "grp1"
    When the administrator creates a "static" tag with name "TagWithGroups" and groups "grp1|group2" using the WebDAV API
    Then the HTTP status code should be "201"
    And the user should be able to assign the "static" tag with name "TagWithGroups"

  Scenario: User cannot assign tags when not in the tag's groups
    When the administrator creates a "not user-assignable" tag with name "TagWithGroups" and groups "grp2|group2" using the WebDAV API
    Then the HTTP status code should be "201"
    And the user should not be able to assign the "not user-assignable" tag with name "TagWithGroups"
