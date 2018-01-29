Feature: tags
  Background:
    Given using new dav path

  Scenario Outline: Creating a normal tag as regular user should work
    Given user "user0" has been created
    When "user0" creates a "normal" tag with name "<tag_name>"
    Then the HTTP status code should be "201"
    And the following tags should exist for "admin"
      |<tag_name>|normal|
    And the following tags should exist for "user0"
      |<tag_name>|normal|

  Examples:
    |tag_name|
    |JustARegularTagName|
    |😀|

  Scenario: Creating a not user-assignable tag as regular user should fail
    Given user "user0" has been created
    When "user0" creates a "not user-assignable" tag with name "JustARegularTagName"
    Then the HTTP status code should be "400"
    And tag "JustARegularTagName" should not exist for "admin"

  Scenario: Creating a not user-visible tag as regular user should fail
    Given user "user0" has been created
    When "user0" creates a "not user-visible" tag with name "JustARegularTagName"
    Then the HTTP status code should be "400"
    And tag "JustARegularTagName" should not exist for "admin"

  Scenario: Creating a not user-assignable tag with groups as admin should work
    Given user "user0" has been created
    When "admin" creates a "not user-assignable" tag with name "TagWithGroups" and groups "group1|group2"
    Then the HTTP status code should be "201"
    And the "not user-assignable" tag with name "TagWithGroups" has the groups "group1|group2"

  Scenario: Creating a normal tag with groups as regular user should fail
    Given user "user0" has been created
    When "user0" creates a "normal" tag with name "JustARegularTagName" and groups "group1|group2"
    Then the HTTP status code should be "400"
    And tag "JustARegularTagName" should not exist for "user0"

  Scenario Outline: Renaming a normal tag as regular user should work
    Given user "user0" has been created
    And "admin" creates a "normal" tag with name "<tag_name>"
    When "user0" edits the tag with name "<tag_name>" and sets its name to "AnotherTagName"
    Then the following tags should exist for "admin"
      |AnotherTagName|normal|

  Examples:
    |tag_name|
    |JustARegularTagName|
    |😀|

  Scenario: Renaming a not user-assignable tag as regular user should fail
    Given user "user0" has been created
    And "admin" creates a "not user-assignable" tag with name "JustARegularTagName"
    When "user0" edits the tag with name "JustARegularTagName" and sets its name to "AnotherTagName"
    Then the following tags should exist for "admin"
      |JustARegularTagName|not user-assignable|

  Scenario: Renaming a not user-visible tag as regular user should fail
    Given user "user0" has been created
    And "admin" creates a "not user-visible" tag with name "JustARegularTagName"
    When "user0" edits the tag with name "JustARegularTagName" and sets its name to "AnotherTagName"
    Then the following tags should exist for "admin"
      |JustARegularTagName|not user-visible|

  Scenario: Editing tag groups as admin should work
    Given user "user0" has been created
    And "admin" creates a "not user-assignable" tag with name "TagWithGroups" and groups "group1|group2"
    When "admin" edits the tag with name "TagWithGroups" and sets its groups to "group1|group3"
    Then the "not user-assignable" tag with name "TagWithGroups" has the groups "group1|group3"

  Scenario: Editing tag groups as regular user should fail
    Given user "user0" has been created
    And "admin" creates a "not user-assignable" tag with name "TagWithGroups" and groups "group1|group2"
    When "user0" edits the tag with name "TagWithGroups" and sets its groups to "group1|group3"
    Then the "not user-assignable" tag with name "TagWithGroups" has the groups "group1|group2"

  Scenario: Deleting a normal tag as regular user should work
    Given user "user0" has been created
    And "admin" creates a "normal" tag with name "JustARegularTagName"
    When "user0" deletes the tag with name "JustARegularTagName"
    Then the HTTP status code should be "204"
    And tag "JustARegularTagName" should not exist for "admin"

  Scenario: Deleting a not user-assignable tag as regular user should fail
    Given user "user0" has been created
    And "admin" creates a "not user-assignable" tag with name "JustARegularTagName"
    When "user0" deletes the tag with name "JustARegularTagName"
    Then the HTTP status code should be "403"
    And the following tags should exist for "admin"
      |JustARegularTagName|not user-assignable|

  Scenario: Deleting a not user-visible tag as regular user should fail
    Given user "user0" has been created
    And "admin" creates a "not user-visible" tag with name "JustARegularTagName"
    When "user0" deletes the tag with name "JustARegularTagName"
    Then the HTTP status code should be "404"
    And the following tags should exist for "admin"
      |JustARegularTagName|not user-visible|

  Scenario: Deleting a not user-assignable tag as admin should work
    Given "admin" creates a "not user-assignable" tag with name "JustARegularTagName"
    When "admin" deletes the tag with name "JustARegularTagName"
    Then the HTTP status code should be "204"
    And tag "JustARegularTagName" should not exist for "admin"

  Scenario: Deleting a not user-visible tag as admin should work
    Given "admin" creates a "not user-visible" tag with name "JustARegularTagName"
    When "admin" deletes the tag with name "JustARegularTagName"
    Then the HTTP status code should be "204"
    And tag "JustARegularTagName" should not exist for "admin"

  Scenario: Assigning a normal tag to a file shared by someone else as regular user should work
    Given user "user0" has been created
    And user "user1" has been created
    And "admin" creates a "normal" tag with name "JustARegularTagName"
    And user "user0" has uploaded file "data/textfile.txt" to "/myFileToTag.txt"
    And file "/myFileToTag.txt" of user "user0" is shared with user "user1"
    When "user1" adds the tag "JustARegularTagName" to "/myFileToTag.txt" shared by "user0"
    Then the HTTP status code should be "201"
    And "/myFileToTag.txt" shared by "user0" has the following tags
      |JustARegularTagName|normal|

  Scenario: Assigning a normal tag to a file belonging to someone else as regular user should fail
    Given user "user0" has been created
    And user "user1" has been created
    And "admin" creates a "normal" tag with name "MyFirstTag"
    And "admin" creates a "normal" tag with name "MySecondTag"
    And user "user0" has uploaded file "data/textfile.txt" to "/myFileToTag.txt"
    When "user0" adds the tag "MyFirstTag" to "/myFileToTag.txt" owned by "user0"
    And "user1" adds the tag "MySecondTag" to "/myFileToTag.txt" owned by "user0"
    Then the HTTP status code should be "404"
    And "/myFileToTag.txt" owned by "user0" has the following tags
      |MyFirstTag|normal|

  Scenario: Assigning a not user-assignable tag to a file shared by someone else as regular user should fail
    Given user "user0" has been created
    And user "user1" has been created
    And "admin" creates a "normal" tag with name "MyFirstTag"
    And "admin" creates a "not user-assignable" tag with name "MySecondTag"
    And user "user0" has uploaded file "data/textfile.txt" to "/myFileToTag.txt"
    And file "/myFileToTag.txt" of user "user0" is shared with user "user1"
    And "user0" adds the tag "MyFirstTag" to "/myFileToTag.txt" owned by "user0"
    When "user1" adds the tag "MySecondTag" to "/myFileToTag.txt" shared by "user0"
    Then the HTTP status code should be "403"
    And "/myFileToTag.txt" shared by "user0" has the following tags
      |MyFirstTag|normal|

  Scenario: Assigning a not user-assignable tag to a file shared by someone else as regular user belongs to tag's groups should work
    Given user "user0" has been created
    And user "user1" has been created
    And group "group1" has been created
    And user "user1" has been added to group "group1"
    And "admin" creates a "not user-assignable" tag with name "JustARegularTagName" and groups "group1"
    And user "user0" has uploaded file "data/textfile.txt" to "/myFileToTag.txt"
    And file "/myFileToTag.txt" of user "user0" is shared with user "user1"
    When "user1" adds the tag "JustARegularTagName" to "/myFileToTag.txt" shared by "user0"
    Then the HTTP status code should be "201"
    And "/myFileToTag.txt" shared by "user0" has the following tags
      |JustARegularTagName|not user-assignable|

  Scenario: Assigning a not user-visible tag to a file shared by someone else as regular user should fail
    Given user "user0" has been created
    And user "user1" has been created
    And "admin" creates a "normal" tag with name "MyFirstTag"
    And "admin" creates a "not user-visible" tag with name "MySecondTag"
    And user "user0" has uploaded file "data/textfile.txt" to "/myFileToTag.txt"
    And file "/myFileToTag.txt" of user "user0" is shared with user "user1"
    And "user0" adds the tag "MyFirstTag" to "/myFileToTag.txt" owned by "user0"
    When "user1" adds the tag "MySecondTag" to "/myFileToTag.txt" shared by "user0"
    Then the HTTP status code should be "412"
    And "/myFileToTag.txt" shared by "user0" has the following tags
      |MyFirstTag|normal|

  Scenario: Assigning a not user-visible tag to a file shared by someone else as admin user should work
    Given user "user0" has been created
    And user "another_admin" has been created
    And user "another_admin" has been added to group "admin"
    And "another_admin" creates a "normal" tag with name "MyFirstTag"
    And "another_admin" creates a "not user-visible" tag with name "MySecondTag"
    And user "user0" has uploaded file "data/textfile.txt" to "/myFileToTag.txt"
    And file "/myFileToTag.txt" of user "user0" is shared with user "another_admin"
    And "user0" adds the tag "MyFirstTag" to "/myFileToTag.txt" owned by "user0"
    When "another_admin" adds the tag "MySecondTag" to "/myFileToTag.txt" shared by "user0"
    Then the HTTP status code should be "201"
    And "/myFileToTag.txt" shared by "user0" has the following tags for "another_admin"
      |MyFirstTag|normal|
      |MySecondTag|not user-visible|
    And "/myFileToTag.txt" shared by "user0" has the following tags for "user0"
      |MyFirstTag|normal|

  Scenario: Assigning a not user-assignable tag to a file shared by someone else as admin user should work
    Given user "user0" has been created
    And user "another_admin" has been created
    And user "another_admin" has been added to group "admin"
    And "another_admin" creates a "normal" tag with name "MyFirstTag"
    And "another_admin" creates a "not user-assignable" tag with name "MySecondTag"
    And user "user0" has uploaded file "data/textfile.txt" to "/myFileToTag.txt"
    And file "/myFileToTag.txt" of user "user0" is shared with user "another_admin"
    And "user0" adds the tag "MyFirstTag" to "/myFileToTag.txt" shared by "user0"
    When "another_admin" adds the tag "MySecondTag" to "/myFileToTag.txt" shared by "user0"
    Then the HTTP status code should be "201"
    And "/myFileToTag.txt" shared by "user0" has the following tags for "another_admin"
      |MyFirstTag|normal|
      |MySecondTag|not user-assignable|
    And "/myFileToTag.txt" shared by "user0" has the following tags for "user0"
      |MyFirstTag|normal|
      |MySecondTag|not user-assignable|

  Scenario: Unassigning a normal tag from a file shared by someone else as regular user should work
    Given user "user0" has been created
    And user "user1" has been created
    And "admin" creates a "normal" tag with name "MyFirstTag"
    And "admin" creates a "normal" tag with name "MySecondTag"
    And user "user0" has uploaded file "data/textfile.txt" to "/myFileToTag.txt"
    And file "/myFileToTag.txt" of user "user0" is shared with user "user1"
    And "user0" adds the tag "MyFirstTag" to "/myFileToTag.txt" owned by "user0"
    And "user0" adds the tag "MySecondTag" to "/myFileToTag.txt" owned by "user0"
    When "user1" removes the tag "MyFirstTag" from "/myFileToTag.txt" shared by "user0"
    Then the HTTP status code should be "204"
    And "/myFileToTag.txt" shared by "user0" has the following tags for "user0"
      |MySecondTag|normal|

  Scenario: Unassigning a normal tag from a file unshared by someone else as regular user should fail
    Given user "user0" has been created
    And user "user1" has been created
    And "admin" creates a "normal" tag with name "MyFirstTag"
    And "admin" creates a "normal" tag with name "MySecondTag"
    And user "user0" has uploaded file "data/textfile.txt" to "/myFileToTag.txt"
    And "user0" adds the tag "MyFirstTag" to "/myFileToTag.txt" shared by "user0"
    And "user0" adds the tag "MySecondTag" to "/myFileToTag.txt" shared by "user0"
    When "user1" removes the tag "MyFirstTag" from "/myFileToTag.txt" shared by "user0"
    Then the HTTP status code should be "404"
    And "/myFileToTag.txt" shared by "user0" has the following tags for "user0"
      |MyFirstTag|normal|
      |MySecondTag|normal|

  Scenario: Unassigning a not user-visible tag from a file shared by someone else as regular user should fail
    Given user "user0" has been created
    And user "user1" has been created
    And user "another_admin" has been created
    And user "another_admin" has been added to group "admin"
    And "another_admin" creates a "not user-visible" tag with name "MyFirstTag"
    And "another_admin" creates a "normal" tag with name "MySecondTag"
    And user "user0" has uploaded file "data/textfile.txt" to "/myFileToTag.txt"
    And file "/myFileToTag.txt" of user "user0" is shared with user "user1"
    And file "/myFileToTag.txt" of user "user0" is shared with user "another_admin"
    And "another_admin" adds the tag "MyFirstTag" to "/myFileToTag.txt" shared by "user0"
    And "user0" adds the tag "MySecondTag" to "/myFileToTag.txt" shared by "user0"
    When "user1" removes the tag "MyFirstTag" from "/myFileToTag.txt" shared by "user0"
    Then the HTTP status code should be "404"
    And "/myFileToTag.txt" shared by "user0" has the following tags for "user0"
      |MySecondTag|normal|
    And "/myFileToTag.txt" shared by "user0" has the following tags for "another_admin"
      |MyFirstTag|not user-visible|
      |MySecondTag|normal|

  Scenario: Unassigning a not user-visible tag from a file shared by someone else as admin should work
    Given user "user0" has been created
    And user "user1" has been created
    And user "another_admin" has been created
    And user "another_admin" has been added to group "admin"
    And "another_admin" creates a "not user-visible" tag with name "MyFirstTag"
    And "another_admin" creates a "normal" tag with name "MySecondTag"
    And user "user0" has uploaded file "data/textfile.txt" to "/myFileToTag.txt"
    And file "/myFileToTag.txt" of user "user0" is shared with user "user1"
    And file "/myFileToTag.txt" of user "user0" is shared with user "another_admin"
    And "another_admin" adds the tag "MyFirstTag" to "/myFileToTag.txt" shared by "user0"
    And "user0" adds the tag "MySecondTag" to "/myFileToTag.txt" shared by "user0"
    When "another_admin" removes the tag "MyFirstTag" from "/myFileToTag.txt" shared by "user0"
    Then the HTTP status code should be "204"
    And "/myFileToTag.txt" shared by "user0" has the following tags for "user0"
      |MySecondTag|normal|
    And "/myFileToTag.txt" shared by "user0" has the following tags for "another_admin"
      |MySecondTag|normal|

  Scenario: Unassigning a not user-visible tag from a file unshared by someone else should fail
    Given user "user0" has been created
    And user "user1" has been created
    And user "another_admin" has been created
    And user "another_admin" has been added to group "admin"
    And "another_admin" creates a "not user-visible" tag with name "MyFirstTag"
    And "another_admin" creates a "normal" tag with name "MySecondTag"
    And user "user0" has uploaded file "data/textfile.txt" to "/myFileToTag.txt"
    And file "/myFileToTag.txt" of user "user0" is shared with user "user1"
    And file "/myFileToTag.txt" of user "user0" is shared with user "another_admin"
    And "another_admin" adds the tag "MyFirstTag" to "/myFileToTag.txt" shared by "user0"
    And "user0" adds the tag "MySecondTag" to "/myFileToTag.txt" shared by "user0"
    And as "user0" remove all shares from the file named "/myFileToTag.txt"
    When "another_admin" removes the tag "MyFirstTag" from "/myFileToTag.txt" shared by "user0"
    Then the HTTP status code should be "404"

  Scenario: Unassigning a not user-assignable tag from a file shared by someone else as regular user should fail
    Given user "user0" has been created
    And user "user1" has been created
    And user "another_admin" has been created
    And user "another_admin" has been added to group "admin"
    And "another_admin" creates a "not user-assignable" tag with name "MyFirstTag"
    And "another_admin" creates a "normal" tag with name "MySecondTag"
    And user "user0" has uploaded file "data/textfile.txt" to "/myFileToTag.txt"
    And file "/myFileToTag.txt" of user "user0" is shared with user "user1"
    And file "/myFileToTag.txt" of user "user0" is shared with user "another_admin"
    And "another_admin" adds the tag "MyFirstTag" to "/myFileToTag.txt" shared by "user0"
    And "user0" adds the tag "MySecondTag" to "/myFileToTag.txt" shared by "user0"
    When "user1" removes the tag "MyFirstTag" from "/myFileToTag.txt" shared by "user0"
    Then the HTTP status code should be "403"
    And "/myFileToTag.txt" shared by "user0" has the following tags for "user0"
      |MyFirstTag|not user-assignable|
      |MySecondTag|normal|
    And "/myFileToTag.txt" shared by "user0" has the following tags for "another_admin"
      |MyFirstTag|not user-assignable|
      |MySecondTag|normal|

  Scenario: Unassigning a not user-assignable tag from a file shared by someone else as admin should work
    Given user "user0" has been created
    And user "user1" has been created
    And user "another_admin" has been created
    And user "another_admin" has been added to group "admin"
    And "another_admin" creates a "not user-assignable" tag with name "MyFirstTag"
    And "another_admin" creates a "normal" tag with name "MySecondTag"
    And user "user0" has uploaded file "data/textfile.txt" to "/myFileToTag.txt"
    And file "/myFileToTag.txt" of user "user0" is shared with user "user1"
    And file "/myFileToTag.txt" of user "user0" is shared with user "another_admin"
    And "another_admin" adds the tag "MyFirstTag" to "/myFileToTag.txt" shared by "user0"
    And "user0" adds the tag "MySecondTag" to "/myFileToTag.txt" shared by "user0"
    When "another_admin" removes the tag "MyFirstTag" from "/myFileToTag.txt" shared by "user0"
    Then the HTTP status code should be "204"
    And "/myFileToTag.txt" shared by "user0" has the following tags for "user0"
      |MySecondTag|normal|
    And "/myFileToTag.txt" shared by "user0" has the following tags for "another_admin"
      |MySecondTag|normal|

  Scenario: Unassigning a not user-assignable tag from a file unshared by someone else should fail
    Given user "user0" has been created
    And user "user1" has been created
    And user "another_admin" has been created
    And user "another_admin" has been added to group "admin"
    And "another_admin" creates a "not user-assignable" tag with name "MyFirstTag"
    And "another_admin" creates a "normal" tag with name "MySecondTag"
    And user "user0" has uploaded file "data/textfile.txt" to "/myFileToTag.txt"
    And file "/myFileToTag.txt" of user "user0" is shared with user "user1"
    And file "/myFileToTag.txt" of user "user0" is shared with user "another_admin"
    And "another_admin" adds the tag "MyFirstTag" to "/myFileToTag.txt" shared by "user0"
    And "user0" adds the tag "MySecondTag" to "/myFileToTag.txt" shared by "user0"
    And as "user0" remove all shares from the file named "/myFileToTag.txt"
    When "admin" removes the tag "MyFirstTag" from "/myFileToTag.txt" shared by "user0"
    Then the HTTP status code should be "404"

  Scenario: Overwriting existing normal tags should fail
    Given user "user0" has been created
    And "user0" creates a "normal" tag with name "MyFirstTag"
    When "user0" creates a "normal" tag with name "MyFirstTag"
    Then the HTTP status code should be "409"

  Scenario: Overwriting existing not user-assignable tags should fail
    Given "admin" creates a "not user-assignable" tag with name "MyFirstTag"
    When "admin" creates a "not user-assignable" tag with name "MyFirstTag"
    Then the HTTP status code should be "409"

  Scenario: Overwriting existing not user-visible tags should fail
    Given "admin" creates a "not user-visible" tag with name "MyFirstTag"
    When "admin" creates a "not user-visible" tag with name "MyFirstTag"
    Then the HTTP status code should be "409"

  Scenario: Getting tags only works with access to the file
    Given user "user0" has been created
    And user "user1" has been created
    And "admin" creates a "normal" tag with name "MyFirstTag"
    And user "user0" has uploaded file "data/textfile.txt" to "/myFileToTag.txt"
    When "user0" adds the tag "MyFirstTag" to "/myFileToTag.txt" shared by "user0"
    Then "/myFileToTag.txt" shared by "user0" has the following tags for "user0"
      |MyFirstTag|normal|
    And "/myFileToTag.txt" shared by "user0" has the following tags for "user1"
      ||

  Scenario: User can assign tags when in the tag's groups
    Given user "user0" has been created
    And group "group1" has been created
    And user "user0" has been added to group "group1"
    When "admin" creates a "not user-assignable" tag with name "TagWithGroups" and groups "group1|group2"
    Then the HTTP status code should be "201"
    And the user "user0" can assign the "not user-assignable" tag with name "TagWithGroups"

  Scenario: User cannot assign tags when not in the tag's groups
    Given user "user0" has been created
    When "admin" creates a "not user-assignable" tag with name "TagWithGroups" and groups "group1|group2"
    Then the HTTP status code should be "201"
    And the user "user0" cannot assign the "not user-assignable" tag with name "TagWithGroups"
