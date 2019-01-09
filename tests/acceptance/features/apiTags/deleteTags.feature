@api @systemtags-app-required
Feature: Deletion of tags
  As a user
  I want to delete the tags that are already created

  Background:
    Given user "user0" has been created with default attributes
    And as user "user0"

  @smokeTest
  Scenario: Deleting a normal tag as regular user should work
    Given the administrator has created a "normal" tag with name "JustARegularTagName"
    When the user deletes the tag with name "JustARegularTagName" using the WebDAV API
    Then the HTTP status code should be "204"
    And tag "JustARegularTagName" should not exist for the administrator

  Scenario: Deleting a normal tag that has already been assigned to a file should work
    Given the user has created a "normal" tag with name "JustARegularTagName"
    And user "user0" has uploaded file "filesForUpload/textfile.txt" to "/myFileToTag.txt"
    And the user has added tag "JustARegularTagName" to file "/myFileToTag.txt"
    When the user deletes the tag with name "JustARegularTagName" using the WebDAV API
    Then the HTTP status code should be "204"
    And tag "JustARegularTagName" should not exist for the administrator
    And file "/myFileToTag.txt" should have no tags for the user

  Scenario: Deleting a not user-assignable tag as regular user should fail
    Given the administrator has created a "not user-assignable" tag with name "JustARegularTagName"
    When the user deletes the tag with name "JustARegularTagName" using the WebDAV API
    Then the HTTP status code should be "403"
    And the following tags should exist for the administrator
      | JustARegularTagName | not user-assignable |

  Scenario: Deleting a not user-visible tag as regular user should fail
    Given the administrator has created a "not user-visible" tag with name "JustARegularTagName"
    When the user deletes the tag with name "JustARegularTagName" using the WebDAV API
    Then the HTTP status code should be "404"
    And the following tags should exist for the administrator
      | JustARegularTagName | not user-visible |

  Scenario: Deleting a static tag as regular user should fail
    Given the administrator has created a "static" tag with name "StaticTagName"
    When the user deletes the tag with name "StaticTagName" using the WebDAV API
    Then the HTTP status code should be "403"
    And the following tags should exist for the administrator
      | StaticTagName | static |

  Scenario: Deleting a not user-assignable tag as admin should work
    Given the administrator has created a "not user-assignable" tag with name "JustARegularTagName"
    When the administrator deletes the tag with name "JustARegularTagName" using the WebDAV API
    Then the HTTP status code should be "204"
    And tag "JustARegularTagName" should not exist for the administrator

  Scenario: Deleting a not user-visible tag as admin should work
    Given the administrator has created a "not user-visible" tag with name "JustARegularTagName"
    When the administrator deletes the tag with name "JustARegularTagName" using the WebDAV API
    Then the HTTP status code should be "204"
    And tag "JustARegularTagName" should not exist for the administrator

  Scenario: Deleting a static tag as admin should work
    Given the administrator has created a "static" tag with name "StaticTagName"
    When the administrator deletes the tag with name "StaticTagName" using the WebDAV API
    Then the HTTP status code should be "204"
    And tag "StaticTagName" should not exist for the administrator
