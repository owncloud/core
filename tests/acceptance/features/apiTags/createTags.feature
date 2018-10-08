@api @systemtags-app-required
Feature: Creation of tags
  As a user
  I should be able to create tags
  So that I could categorize my files

  Background:
    Given user "user0" has been created
    And as user "user0"

  @smokeTest
  Scenario Outline: Creating a normal tag as regular user should work
    When the user creates a "normal" tag with name "<tag_name>" using the WebDAV API
    Then the HTTP status code should be "201"
    And the following tags should exist for the administrator
      | <tag_name> | normal |
    And the following tags should exist for the user
      | <tag_name> | normal |
    Examples:
      | tag_name            |
      | JustARegularTagName |
      | 😀                  |
      |सिमप्ले                 |

  Scenario: Creating a not user-assignable tag as regular user should fail
    When the user creates a "not user-assignable" tag with name "JustARegularTagName" using the WebDAV API
    Then the HTTP status code should be "400"
    And tag "JustARegularTagName" should not exist for the administrator

  Scenario: Creating a not user-visible tag as regular user should fail
    When the user creates a "not user-visible" tag with name "JustARegularTagName" using the WebDAV API
    Then the HTTP status code should be "400"
    And tag "JustARegularTagName" should not exist for the administrator

  @smokeTest
  Scenario: Creating a not user-assignable tag with groups as admin should work
    When the administrator creates a "not user-assignable" tag with name "TagWithGroups" and groups "group1|group2" using the WebDAV API
    Then the HTTP status code should be "201"
    And the "not user-assignable" tag with name "TagWithGroups" should have the groups "group1|group2"

  Scenario: Creating a normal tag with groups as regular user should fail
    When the user creates a "normal" tag with name "JustARegularTagName" and groups "group1|group2" using the WebDAV API
    Then the HTTP status code should be "400"
    And tag "JustARegularTagName" should not exist for the user