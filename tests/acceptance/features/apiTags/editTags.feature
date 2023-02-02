@api @systemtags-app-required @issue-ocis-reva-51
Feature: Editing the tags
  As a user
  I want to be able to change the tags I have created

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files

  @smokeTest
  Scenario Outline: Renaming a normal tag as regular user should work
    Given the administrator has created a "normal" tag with name "<tag_name>"
    When user "Alice" edits the tag with name "<tag_name>" and sets its name to "AnotherTagName" using the WebDAV API
    Then the HTTP status code should be "207"
    And the following tags should exist for the administrator
      | name           | type   |
      | AnotherTagName | normal |
    Examples:
      | tag_name            |
      | JustARegularTagName |
      | 😀                  |
      | सिमप्ले             |


  Scenario: Renaming a not user-assignable tag as regular user should fail
    Given the administrator has created a "not user-assignable" tag with name "JustARegularTagName"
    When user "Alice" edits the tag with name "JustARegularTagName" and sets its name to "AnotherTagName" using the WebDAV API
    Then the HTTP status code should be "403"
    And the following tags should exist for the administrator
      | name                | type                |
      | JustARegularTagName | not user-assignable |


  Scenario: Renaming a static tag as regular user should fail
    Given the administrator has created a "static" tag with name "StaticTagName"
    When user "Alice" edits the tag with name "StaticTagName" and sets its name to "AnotherTagName" using the WebDAV API
    Then the HTTP status code should be "403"
    And the following tags should exist for the administrator
      | name          | type   |
      | StaticTagName | static |


  Scenario: Renaming a not user-visible tag as regular user should fail
    Given the administrator has created a "not user-visible" tag with name "JustARegularTagName"
    When user "Alice" edits the tag with name "JustARegularTagName" and sets its name to "AnotherTagName" using the WebDAV API
    Then the HTTP status code should be "404"
    And the following tags should exist for the administrator
      | name                | type             |
      | JustARegularTagName | not user-visible |


  Scenario: Renaming a not user-assignable tag as administrator should work
    Given the administrator has created a "not user-assignable" tag with name "JustARegularTagName"
    When the administrator edits the tag with name "JustARegularTagName" and sets its name to "AnotherTagName" using the WebDAV API
    Then the HTTP status code should be "207"
    And the following tags should exist for the administrator
      | name           | type                |
      | AnotherTagName | not user-assignable |
    And tag "JustARegularTagName" should not exist for the administrator


  Scenario: Renaming a not user-visible tag as administrator should work
    Given the administrator has created a "not user-visible" tag with name "JustARegularTagName"
    When the administrator edits the tag with name "JustARegularTagName" and sets its name to "AnotherTagName" using the WebDAV API
    Then the HTTP status code should be "207"
    And the following tags should exist for the administrator
      | name           | type             |
      | AnotherTagName | not user-visible |
    And tag "JustARegularTagName" should not exist for the administrator


  Scenario: Renaming a static tag as administrator should work
    Given the administrator has created a "static" tag with name "StaticTagName"
    When the administrator edits the tag with name "StaticTagName" and sets its name to "AnotherTagName" using the WebDAV API
    Then the HTTP status code should be "207"
    And the following tags should exist for the administrator
      | name           | type   |
      | AnotherTagName | static |
    And tag "StaticTagName" should not exist for the administrator


  Scenario: Editing tag groups as admin should work
    Given the administrator has created a "not user-assignable" tag with name "TagWithGroups" and groups "group1|group2"
    When the administrator edits the tag with name "TagWithGroups" and sets its groups to "group1|group3" using the WebDAV API
    Then the HTTP status code should be "207"
    And the "not user-assignable" tag with name "TagWithGroups" should have the groups "group1|group3"


  Scenario: Editing static tag groups as admin should work
    Given the administrator has created a "static" tag with name "StaticTagWithGroups" and groups "group1|group2"
    When the administrator edits the tag with name "StaticTagWithGroups" and sets its groups to "group1|group3" using the WebDAV API
    Then the HTTP status code should be "207"
    And the "static" tag with name "StaticTagWithGroups" should have the groups "group1|group3"


  Scenario: Editing tag groups as regular user should fail
    Given the administrator has created a "not user-assignable" tag with name "TagWithGroups" and groups "group1|group2"
    When user "Alice" edits the tag with name "TagWithGroups" and sets its groups to "group1|group3" using the WebDAV API
    Then the HTTP status code should be "403"
    And the "not user-assignable" tag with name "TagWithGroups" should have the groups "group1|group2"
