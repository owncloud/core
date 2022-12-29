@api @systemtags-app-required @issue-ocis-reva-51
Feature: Creation of tags
  As a user
  I should be able to create tags
  So that I could categorize my files

  Background:
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |

  @smokeTest
  Scenario Outline: Creating a normal tag as regular user should work
    When user "Alice" creates a "normal" tag with name "<tag_name>" using the WebDAV API
    Then the HTTP status code should be "201"
    And the following tags should exist for the administrator
      | name       | type   |
      | <tag_name> | normal |
    And the following tags should exist for user "Alice"
      | name       | type   |
      | <tag_name> | normal |
    Examples:
      | tag_name            |
      | JustARegularTagName |
      | 😀                  |
      | सिमप्ले             |


  Scenario: Creating a normal tag as a regular user should work (sending the string "1" to turn on the tag attributes)
    When user "Alice" creates a "normal" tag with name "RegularTag" sending numbers in the request using the WebDAV API
    Then the HTTP status code should be "201"
    And the following tags should exist for the administrator
      | name       | type   |
      | RegularTag | normal |
    And the following tags should exist for user "Alice"
      | name       | type   |
      | RegularTag | normal |


  Scenario: Creating a not user-assignable tag as regular user should fail
    When user "Alice" creates a "not user-assignable" tag with name "JustARegularTagName" using the WebDAV API
    Then the HTTP status code should be "400"
    And tag "JustARegularTagName" should not exist for the administrator


  Scenario: Creating a static tag as regular user should fail
    When user "Alice" creates a "static" tag with name "StaticTagName" using the WebDAV API
    Then the HTTP status code should be "400"
    And tag "StaticTagName" should not exist for the administrator


  Scenario: Creating a not user-visible tag as regular user should fail
    When user "Alice" creates a "not user-visible" tag with name "JustARegularTagName" using the WebDAV API
    Then the HTTP status code should be "400"
    And tag "JustARegularTagName" should not exist for the administrator


  Scenario Outline: Creating a tag as administrator should work
    When the administrator creates a "<tag_type>" tag with name "JustARegularTagName" sending <sending_style> in the request using the WebDAV API
    Then the HTTP status code should be "201"
    And the following tags should exist for the administrator
      | name                | type       |
      | JustARegularTagName | <tag_type> |
    Examples:
      | tag_type            | sending_style      |
      | normal              | true-false-strings |
      | normal              | numbers            |
      | not user-assignable | true-false-strings |
      | not user-assignable | numbers            |
      | not user-visible    | true-false-strings |
      | not user-visible    | numbers            |
      | static              | true-false-strings |
      | static              | numbers            |

  @smokeTest
  Scenario: Creating a not user-assignable tag with groups as admin should work
    When the administrator creates a "not user-assignable" tag with name "TagWithGroups" and groups "group1|group2" using the WebDAV API
    Then the HTTP status code should be "201"
    And the "not user-assignable" tag with name "TagWithGroups" should have the groups "group1|group2"


  Scenario: Creating a normal tag with groups as regular user should fail
    When user "Alice" creates a "normal" tag with name "JustARegularTagName" and groups "group1|group2" using the WebDAV API
    Then the HTTP status code should be "400"
    And tag "JustARegularTagName" should not exist for user "Alice"


  Scenario: Creating a normal tag that is already created by other user should fail
    Given user "Brian" has created a "normal" tag with name "JustARegularTagName"
    When user "Alice" creates a "normal" tag with name "JustARegularTagName" using the WebDAV API
    Then the HTTP status code should be "409"


  Scenario: Overwriting existing normal tags should fail
    Given user "Alice" has created a "normal" tag with name "MyFirstTag"
    When user "Alice" creates a "normal" tag with name "MyFirstTag" using the WebDAV API
    Then the HTTP status code should be "409"


  Scenario: Overwriting existing not user-assignable tags should fail
    Given the administrator has created a "not user-assignable" tag with name "MyFirstTag"
    When the administrator creates a "not user-assignable" tag with name "MyFirstTag" using the WebDAV API
    Then the HTTP status code should be "409"


  Scenario: Overwriting existing not user-visible tags should fail
    Given the administrator has created a "not user-visible" tag with name "MyFirstTag"
    When the administrator creates a "not user-visible" tag with name "MyFirstTag" using the WebDAV API
    Then the HTTP status code should be "409"


  Scenario: Overwriting existing static tags should fail
    Given the administrator has created a "static" tag with name "StaticTag"
    When the administrator creates a "static" tag with name "StaticTag" using the WebDAV API
    Then the HTTP status code should be "409"


  Scenario: Creating tags in lowercase and uppercase should work
    When the administrator creates the following tags using the WebDAV API
      | name         | type   |
      | UppercaseTag | normal |
      | lowercasetag | normal |
    Then the HTTP status code of responses on all endpoints should be "201"
    And the following tags should exist for the administrator
      | name         | type   |
      | UppercaseTag | normal |
      | lowercasetag | normal |


  Scenario: Creating tags with the same name in lowercase and uppercase should work
    When the administrator creates the following tags using the WebDAV API
      | name    | type   |
      | testtag | normal |
      | Testtag | normal |
      | TESTTAG | normal |
    Then the HTTP status code of responses on all endpoints should be "201"
    And the following tags should exist for the administrator
      | name    | type   |
      | testtag | normal |
      | Testtag | normal |
      | TESTTAG | normal |
