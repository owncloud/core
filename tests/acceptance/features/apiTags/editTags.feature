@api @systemtags-app-required @TestAlsoOnExternalUserBackend
Feature: Editing the tags
  As a user
  I want to be able to change the tags I have created

  Background:
    Given user "user0" has been created with default attributes
    And as user "user0"

  @smokeTest
  Scenario Outline: Renaming a normal tag as regular user should work
    Given the administrator has created a "normal" tag with name "<tag_name>"
    When the user edits the tag with name "<tag_name>" and sets its name to "AnotherTagName" using the WebDAV API
    Then the following tags should exist for the administrator
      | AnotherTagName | normal |
    Examples:
      | tag_name            |
      | JustARegularTagName |
      | 😀                  |
      | सिमप्ले             |

  Scenario: Renaming a not user-assignable tag as regular user should fail
    Given the administrator has created a "not user-assignable" tag with name "JustARegularTagName"
    When the user edits the tag with name "JustARegularTagName" and sets its name to "AnotherTagName" using the WebDAV API
    Then the following tags should exist for the administrator
      | JustARegularTagName | not user-assignable |

  Scenario: Renaming a static tag as regular user should fail
    Given the administrator has created a "static" tag with name "StaticTagName"
    When the user edits the tag with name "StaticTagName" and sets its name to "AnotherTagName" using the WebDAV API
    Then the following tags should exist for the administrator
      | StaticTagName | static |

  Scenario: Renaming a not user-visible tag as regular user should fail
    Given the administrator has created a "not user-visible" tag with name "JustARegularTagName"
    When the user edits the tag with name "JustARegularTagName" and sets its name to "AnotherTagName" using the WebDAV API
    Then the following tags should exist for the administrator
      | JustARegularTagName | not user-visible |

  Scenario: Renaming a not user-assignable tag as administrator should work
    Given the administrator has created a "not user-assignable" tag with name "JustARegularTagName"
    When the administrator edits the tag with name "JustARegularTagName" and sets its name to "AnotherTagName" using the WebDAV API
    Then the following tags should exist for the administrator
      | AnotherTagName | not user-assignable |
    And tag "JustARegularTagName" should not exist for the administrator

  Scenario: Renaming a not user-visible tag as administrator should work
    Given the administrator has created a "not user-visible" tag with name "JustARegularTagName"
    When the administrator edits the tag with name "JustARegularTagName" and sets its name to "AnotherTagName" using the WebDAV API
    Then the following tags should exist for the administrator
      | AnotherTagName | not user-visible |
    And tag "JustARegularTagName" should not exist for the administrator

  Scenario: Renaming a static tag as administrator should work
    Given the administrator has created a "static" tag with name "StaticTagName"
    When the administrator edits the tag with name "StaticTagName" and sets its name to "AnotherTagName" using the WebDAV API
    Then the following tags should exist for the administrator
      | AnotherTagName | static |
    And tag "StaticTagName" should not exist for the administrator

  Scenario: Editing tag groups as admin should work
    Given the administrator has created a "not user-assignable" tag with name "TagWithGroups" and groups "group1|group2"
    When the administrator edits the tag with name "TagWithGroups" and sets its groups to "group1|group3" using the WebDAV API
    Then the "not user-assignable" tag with name "TagWithGroups" should have the groups "group1|group3"

  Scenario: Editing static tag groups as admin should work
    Given the administrator has created a "static" tag with name "StaticTagWithGroups" and groups "group1|group2"
    When the administrator edits the tag with name "StaticTagWithGroups" and sets its groups to "group1|group3" using the WebDAV API
    Then the "static" tag with name "StaticTagWithGroups" should have the groups "group1|group3"

  Scenario: Editing tag groups as regular user should fail
    Given the administrator has created a "not user-assignable" tag with name "TagWithGroups" and groups "group1|group2"
    When the user edits the tag with name "TagWithGroups" and sets its groups to "group1|group3" using the WebDAV API
    Then the "not user-assignable" tag with name "TagWithGroups" should have the groups "group1|group2"
