@api
Feature: tags

  @smokeTest
  Scenario Outline: Creating a normal tag as regular user should work
    Given user "user0" has been created
    When user "user0" creates a "normal" tag with name "<tag_name>" using the WebDAV API
    Then the HTTP status code should be "201"
    And the following tags should exist for "admin"
      |<tag_name>|normal|
    And the following tags should exist for "user0"
      |<tag_name>|normal|
    Examples:
      | tag_name            |
      | JustARegularTagName |
      | 😀                  |
             |सिमप्ले                   |

  Scenario: Creating a not user-assignable tag as regular user should fail
    Given user "user0" has been created
    When user "user0" creates a "not user-assignable" tag with name "JustARegularTagName" using the WebDAV API
    Then the HTTP status code should be "400"
    And tag "JustARegularTagName" should not exist for "admin"

  Scenario: Creating a not user-visible tag as regular user should fail
    Given user "user0" has been created
    When user "user0" creates a "not user-visible" tag with name "JustARegularTagName" using the WebDAV API
    Then the HTTP status code should be "400"
    And tag "JustARegularTagName" should not exist for "admin"

  @smokeTest
  Scenario: Creating a not user-assignable tag with groups as admin should work
    Given user "user0" has been created
    When user "admin" creates a "not user-assignable" tag with name "TagWithGroups" and groups "group1|group2" using the WebDAV API
    Then the HTTP status code should be "201"
    And the "not user-assignable" tag with name "TagWithGroups" should have the groups "group1|group2"

  Scenario: Creating a normal tag with groups as regular user should fail
    Given user "user0" has been created
    When user "user0" creates a "normal" tag with name "JustARegularTagName" and groups "group1|group2" using the WebDAV API
    Then the HTTP status code should be "400"
    And tag "JustARegularTagName" should not exist for "user0"

  @smokeTest
  Scenario Outline: Renaming a normal tag as regular user should work
    Given user "user0" has been created
    And user "admin" has created a "normal" tag with name "<tag_name>"
    When user "user0" edits the tag with name "<tag_name>" and sets its name to "AnotherTagName" using the WebDAV API
    Then the following tags should exist for "admin"
      | AnotherTagName | normal |
    Examples:
      | tag_name            |
      | JustARegularTagName |
      | 😀                  |
             |सिमप्ले                   |

  Scenario: Renaming a not user-assignable tag as regular user should fail
    Given user "user0" has been created
    And user "admin" has created a "not user-assignable" tag with name "JustARegularTagName"
    When user "user0" edits the tag with name "JustARegularTagName" and sets its name to "AnotherTagName" using the WebDAV API
    Then the following tags should exist for "admin"
      | JustARegularTagName | not user-assignable |

  Scenario: Renaming a not user-visible tag as regular user should fail
    Given user "user0" has been created
    And user "admin" has created a "not user-visible" tag with name "JustARegularTagName"
    When user "user0" edits the tag with name "JustARegularTagName" and sets its name to "AnotherTagName" using the WebDAV API
    Then the following tags should exist for "admin"
      | JustARegularTagName | not user-visible |

  Scenario: Editing tag groups as admin should work
    Given user "user0" has been created
    And user "admin" has created a "not user-assignable" tag with name "TagWithGroups" and groups "group1|group2"
    When user "admin" edits the tag with name "TagWithGroups" and sets its groups to "group1|group3" using the WebDAV API
    Then the "not user-assignable" tag with name "TagWithGroups" should have the groups "group1|group3"

  Scenario: Editing tag groups as regular user should fail
    Given user "user0" has been created
    And user "admin" has created a "not user-assignable" tag with name "TagWithGroups" and groups "group1|group2"
    When user "user0" edits the tag with name "TagWithGroups" and sets its groups to "group1|group3" using the WebDAV API
    Then the "not user-assignable" tag with name "TagWithGroups" should have the groups "group1|group2"

  @smokeTest
  Scenario: Deleting a normal tag as regular user should work
    Given user "user0" has been created
    And user "admin" has created a "normal" tag with name "JustARegularTagName"
    When user "user0" deletes the tag with name "JustARegularTagName" using the WebDAV API
    Then the HTTP status code should be "204"
    And tag "JustARegularTagName" should not exist for "admin"

  Scenario: Deleting a not user-assignable tag as regular user should fail
    Given user "user0" has been created
    And user "admin" has created a "not user-assignable" tag with name "JustARegularTagName"
    When user "user0" deletes the tag with name "JustARegularTagName" using the WebDAV API
    Then the HTTP status code should be "403"
    And the following tags should exist for "admin"
      | JustARegularTagName | not user-assignable |

  Scenario: Deleting a not user-visible tag as regular user should fail
    Given user "user0" has been created
    And user "admin" has created a "not user-visible" tag with name "JustARegularTagName"
    When user "user0" deletes the tag with name "JustARegularTagName" using the WebDAV API
    Then the HTTP status code should be "404"
    And the following tags should exist for "admin"
      | JustARegularTagName | not user-visible |

  Scenario: Deleting a not user-assignable tag as admin should work
    Given user "admin" has created a "not user-assignable" tag with name "JustARegularTagName"
    When user "admin" deletes the tag with name "JustARegularTagName" using the WebDAV API
    Then the HTTP status code should be "204"
    And tag "JustARegularTagName" should not exist for "admin"

  Scenario: Deleting a not user-visible tag as admin should work
    Given user "admin" has created a "not user-visible" tag with name "JustARegularTagName"
    When user "admin" deletes the tag with name "JustARegularTagName" using the WebDAV API
    Then the HTTP status code should be "204"
    And tag "JustARegularTagName" should not exist for "admin"

  @smokeTest
  Scenario: Assigning a normal tag to a file shared by someone else as regular user should work
    Given user "user0" has been created
    And user "user1" has been created
    And user "admin" has created a "normal" tag with name "JustARegularTagName"
    And user "user0" has uploaded file "data/textfile.txt" to "/myFileToTag.txt"
    And user "user0" has shared file "/myFileToTag.txt" with user "user1"
    When user "user1" adds the tag "JustARegularTagName" to "/myFileToTag.txt" shared by "user0" using the WebDAV API
    Then the HTTP status code should be "201"
    And file "/myFileToTag.txt" shared by "user0" should have the following tags
      | JustARegularTagName | normal |

  Scenario: Assigning a normal tag to a file belonging to someone else as regular user should fail
    Given user "user0" has been created
    And user "user1" has been created
    And user "admin" has created a "normal" tag with name "MyFirstTag"
    And user "admin" has created a "normal" tag with name "MySecondTag"
    And user "user0" has uploaded file "data/textfile.txt" to "/myFileToTag.txt"
    When user "user0" adds the tag "MyFirstTag" to "/myFileToTag.txt" owned by "user0" using the WebDAV API
    And user "user1" adds the tag "MySecondTag" to "/myFileToTag.txt" owned by "user0" using the WebDAV API
    Then the HTTP status code should be "404"
    And file "/myFileToTag.txt" owned by "user0" should have the following tags
      | MyFirstTag | normal |

  Scenario: Assigning a not user-assignable tag to a file shared by someone else as regular user should fail
    Given user "user0" has been created
    And user "user1" has been created
    And user "admin" has created a "normal" tag with name "MyFirstTag"
    And user "admin" has created a "not user-assignable" tag with name "MySecondTag"
    And user "user0" has uploaded file "data/textfile.txt" to "/myFileToTag.txt"
    And user "user0" has shared file "/myFileToTag.txt" with user "user1"
    When user "user0" adds the tag "MyFirstTag" to "/myFileToTag.txt" owned by "user0" using the WebDAV API
    And user "user1" adds the tag "MySecondTag" to "/myFileToTag.txt" shared by "user0" using the WebDAV API
    Then the HTTP status code should be "403"
    And file "/myFileToTag.txt" shared by "user0" should have the following tags
      | MyFirstTag | normal |

  Scenario: Assigning a not user-assignable tag to a file shared by someone else as regular user belongs to tag's groups should work
    Given user "user0" has been created
    And user "user1" has been created
    And group "group1" has been created
    And user "user1" has been added to group "group1"
    And user "admin" has created a "not user-assignable" tag with name "JustARegularTagName" and groups "group1"
    And user "user0" has uploaded file "data/textfile.txt" to "/myFileToTag.txt"
    And user "user0" has shared file "/myFileToTag.txt" with user "user1"
    When user "user1" adds the tag "JustARegularTagName" to "/myFileToTag.txt" shared by "user0" using the WebDAV API
    Then the HTTP status code should be "201"
    And file "/myFileToTag.txt" shared by "user0" should have the following tags
      | JustARegularTagName | not user-assignable |

  Scenario: Assigning a not user-visible tag to a file shared by someone else as regular user should fail
    Given user "user0" has been created
    And user "user1" has been created
    And user "admin" has created a "normal" tag with name "MyFirstTag"
    And user "admin" has created a "not user-visible" tag with name "MySecondTag"
    And user "user0" has uploaded file "data/textfile.txt" to "/myFileToTag.txt"
    And user "user0" has shared file "/myFileToTag.txt" with user "user1"
    When user "user0" adds the tag "MyFirstTag" to "/myFileToTag.txt" owned by "user0" using the WebDAV API
    And user "user1" adds the tag "MySecondTag" to "/myFileToTag.txt" shared by "user0" using the WebDAV API
    Then the HTTP status code should be "412"
    And file "/myFileToTag.txt" shared by "user0" should have the following tags
      | MyFirstTag | normal |

  Scenario: Assigning a not user-visible tag to a file shared by someone else as admin user should work
    Given user "user0" has been created
    And user "another_admin" has been created
    And user "another_admin" has been added to group "admin"
    And user "another_admin" has created a "normal" tag with name "MyFirstTag"
    And user "another_admin" has created a "not user-visible" tag with name "MySecondTag"
    And user "user0" has uploaded file "data/textfile.txt" to "/myFileToTag.txt"
    And user "user0" has shared file "/myFileToTag.txt" with user "another_admin"
    When user "user0" adds the tag "MyFirstTag" to "/myFileToTag.txt" owned by "user0" using the WebDAV API
    And user "another_admin" adds the tag "MySecondTag" to "/myFileToTag.txt" shared by "user0" using the WebDAV API
    Then the HTTP status code should be "201"
    And file "/myFileToTag.txt" should have the following tags for user "another_admin"
      | MyFirstTag  | normal           |
      | MySecondTag | not user-visible |
    And file "/myFileToTag.txt" should have the following tags for user "user0"
      | MyFirstTag | normal |

  Scenario: Assigning a not user-assignable tag to a file shared by someone else as admin user should work
    Given user "user0" has been created
    And user "another_admin" has been created
    And user "another_admin" has been added to group "admin"
    And user "another_admin" has created a "normal" tag with name "MyFirstTag"
    And user "another_admin" has created a "not user-assignable" tag with name "MySecondTag"
    And user "user0" has uploaded file "data/textfile.txt" to "/myFileToTag.txt"
    And user "user0" has shared file "/myFileToTag.txt" with user "another_admin"
    When user "user0" adds the tag "MyFirstTag" to "/myFileToTag.txt" shared by "user0" using the WebDAV API
    And user "another_admin" adds the tag "MySecondTag" to "/myFileToTag.txt" shared by "user0" using the WebDAV API
    Then the HTTP status code should be "201"
    And file "/myFileToTag.txt" should have the following tags for user "another_admin"
      | MyFirstTag  | normal              |
      | MySecondTag | not user-assignable |
    And file "/myFileToTag.txt" should have the following tags for user "user0"
      | MyFirstTag  | normal              |
      | MySecondTag | not user-assignable |

  @smokeTest
  Scenario: Unassigning a normal tag from a file shared by someone else as regular user should work
    Given user "user0" has been created
    And user "user1" has been created
    And user "admin" has created a "normal" tag with name "MyFirstTag"
    And user "admin" has created a "normal" tag with name "MySecondTag"
    And user "user0" has uploaded file "data/textfile.txt" to "/myFileToTag.txt"
    And user "user0" has shared file "/myFileToTag.txt" with user "user1"
    And user "user0" has added the tag "MyFirstTag" to "/myFileToTag.txt" owned by "user0"
    And user "user0" has added the tag "MySecondTag" to "/myFileToTag.txt" owned by "user0"
    When user "user1" removes the tag "MyFirstTag" from "/myFileToTag.txt" shared by "user0" using the WebDAV API
    Then the HTTP status code should be "204"
    And file "/myFileToTag.txt" should have the following tags for user "user0"
      | MySecondTag | normal |

  Scenario: Unassigning a normal tag from a file unshared by someone else as regular user should fail
    Given user "user0" has been created
    And user "user1" has been created
    And user "admin" has created a "normal" tag with name "MyFirstTag"
    And user "admin" has created a "normal" tag with name "MySecondTag"
    And user "user0" has uploaded file "data/textfile.txt" to "/myFileToTag.txt"
    And user "user0" has added the tag "MyFirstTag" to "/myFileToTag.txt" shared by "user0"
    And user "user0" has added the tag "MySecondTag" to "/myFileToTag.txt" shared by "user0"
    When user "user1" removes the tag "MyFirstTag" from "/myFileToTag.txt" shared by "user0" using the WebDAV API
    Then the HTTP status code should be "404"
    And file "/myFileToTag.txt" should have the following tags for user "user0"
      | MyFirstTag  | normal |
      | MySecondTag | normal |

  Scenario: Unassigning a not user-visible tag from a file shared by someone else as regular user should fail
    Given user "user0" has been created
    And user "user1" has been created
    And user "another_admin" has been created
    And user "another_admin" has been added to group "admin"
    And user "another_admin" has created a "not user-visible" tag with name "MyFirstTag"
    And user "another_admin" has created a "normal" tag with name "MySecondTag"
    And user "user0" has uploaded file "data/textfile.txt" to "/myFileToTag.txt"
    And user "user0" has shared file "/myFileToTag.txt" with user "user1"
    And user "user0" has shared file "/myFileToTag.txt" with user "another_admin"
    And user "another_admin" has added the tag "MyFirstTag" to "/myFileToTag.txt" shared by "user0"
    And user "user0" has added the tag "MySecondTag" to "/myFileToTag.txt" shared by "user0"
    When user "user1" removes the tag "MyFirstTag" from "/myFileToTag.txt" shared by "user0" using the WebDAV API
    Then the HTTP status code should be "404"
    And file "/myFileToTag.txt" should have the following tags for user "user0"
      | MySecondTag | normal |
    And file "/myFileToTag.txt" should have the following tags for user "another_admin"
      | MyFirstTag  | not user-visible |
      | MySecondTag | normal           |

  Scenario: Unassigning a not user-visible tag from a file shared by someone else as admin should work
    Given user "user0" has been created
    And user "user1" has been created
    And user "another_admin" has been created
    And user "another_admin" has been added to group "admin"
    And user "another_admin" has created a "not user-visible" tag with name "MyFirstTag"
    And user "another_admin" has created a "normal" tag with name "MySecondTag"
    And user "user0" has uploaded file "data/textfile.txt" to "/myFileToTag.txt"
    And user "user0" has shared file "/myFileToTag.txt" with user "user1"
    And user "user0" has shared file "/myFileToTag.txt" with user "another_admin"
    And user "another_admin" has added the tag "MyFirstTag" to "/myFileToTag.txt" shared by "user0"
    And user "user0" has added the tag "MySecondTag" to "/myFileToTag.txt" shared by "user0"
    When user "another_admin" removes the tag "MyFirstTag" from "/myFileToTag.txt" shared by "user0" using the WebDAV API
    Then the HTTP status code should be "204"
    And file "/myFileToTag.txt" should have the following tags for user "user0"
      | MySecondTag | normal |
    And file "/myFileToTag.txt" should have the following tags for user "another_admin"
      | MySecondTag | normal |

  Scenario: Unassigning a not user-visible tag from a file unshared by someone else should fail
    Given user "user0" has been created
    And user "user1" has been created
    And user "another_admin" has been created
    And user "another_admin" has been added to group "admin"
    And user "another_admin" has created a "not user-visible" tag with name "MyFirstTag"
    And user "another_admin" has created a "normal" tag with name "MySecondTag"
    And user "user0" has uploaded file "data/textfile.txt" to "/myFileToTag.txt"
    And user "user0" has shared file "/myFileToTag.txt" with user "user1"
    And user "user0" has shared file "/myFileToTag.txt" with user "another_admin"
    And user "another_admin" has added the tag "MyFirstTag" to "/myFileToTag.txt" shared by "user0"
    And user "user0" has added the tag "MySecondTag" to "/myFileToTag.txt" shared by "user0"
    And user "user0" has removed all shares from the file named "/myFileToTag.txt"
    When user "another_admin" removes the tag "MyFirstTag" from "/myFileToTag.txt" shared by "user0" using the WebDAV API
    Then the HTTP status code should be "404"

  Scenario: Unassigning a not user-assignable tag from a file shared by someone else as regular user should fail
    Given user "user0" has been created
    And user "user1" has been created
    And user "another_admin" has been created
    And user "another_admin" has been added to group "admin"
    And user "another_admin" has created a "not user-assignable" tag with name "MyFirstTag"
    And user "another_admin" has created a "normal" tag with name "MySecondTag"
    And user "user0" has uploaded file "data/textfile.txt" to "/myFileToTag.txt"
    And user "user0" has shared file "/myFileToTag.txt" with user "user1"
    And user "user0" has shared file "/myFileToTag.txt" with user "another_admin"
    And user "another_admin" has added the tag "MyFirstTag" to "/myFileToTag.txt" shared by "user0"
    And user "user0" has added the tag "MySecondTag" to "/myFileToTag.txt" shared by "user0"
    When user "user1" removes the tag "MyFirstTag" from "/myFileToTag.txt" shared by "user0" using the WebDAV API
    Then the HTTP status code should be "403"
    And file "/myFileToTag.txt" should have the following tags for user "user0"
      | MyFirstTag  | not user-assignable |
      | MySecondTag | normal              |
    And file "/myFileToTag.txt" should have the following tags for user "another_admin"
      | MyFirstTag  | not user-assignable |
      | MySecondTag | normal              |

  Scenario: Unassigning a not user-assignable tag from a file shared by someone else as admin should work
    Given user "user0" has been created
    And user "user1" has been created
    And user "another_admin" has been created
    And user "another_admin" has been added to group "admin"
    And user "another_admin" has created a "not user-assignable" tag with name "MyFirstTag"
    And user "another_admin" has created a "normal" tag with name "MySecondTag"
    And user "user0" has uploaded file "data/textfile.txt" to "/myFileToTag.txt"
    And user "user0" has shared file "/myFileToTag.txt" with user "user1"
    And user "user0" has shared file "/myFileToTag.txt" with user "another_admin"
    And user "another_admin" has added the tag "MyFirstTag" to "/myFileToTag.txt" shared by "user0"
    And user "user0" has added the tag "MySecondTag" to "/myFileToTag.txt" shared by "user0"
    When user "another_admin" removes the tag "MyFirstTag" from "/myFileToTag.txt" shared by "user0" using the WebDAV API
    Then the HTTP status code should be "204"
    And file "/myFileToTag.txt" should have the following tags for user "user0"
      | MySecondTag | normal |
    And file "/myFileToTag.txt" should have the following tags for user "another_admin"
      | MySecondTag | normal |

  Scenario: Unassigning a not user-assignable tag from a file unshared by someone else should fail
    Given user "user0" has been created
    And user "user1" has been created
    And user "another_admin" has been created
    And user "another_admin" has been added to group "admin"
    And user "another_admin" has created a "not user-assignable" tag with name "MyFirstTag"
    And user "another_admin" has created a "normal" tag with name "MySecondTag"
    And user "user0" has uploaded file "data/textfile.txt" to "/myFileToTag.txt"
    And user "user0" has shared file "/myFileToTag.txt" with user "user1"
    And user "user0" has shared file "/myFileToTag.txt" with user "another_admin"
    And user "another_admin" has added the tag "MyFirstTag" to "/myFileToTag.txt" shared by "user0"
    And user "user0" has added the tag "MySecondTag" to "/myFileToTag.txt" shared by "user0"
    And user "user0" has removed all shares from the file named "/myFileToTag.txt"
    When user "admin" removes the tag "MyFirstTag" from "/myFileToTag.txt" shared by "user0" using the WebDAV API
    Then the HTTP status code should be "404"

  Scenario: Overwriting existing normal tags should fail
    Given user "user0" has been created
    And user "user0" has created a "normal" tag with name "MyFirstTag"
    When user "user0" creates a "normal" tag with name "MyFirstTag" using the WebDAV API
    Then the HTTP status code should be "409"

  Scenario: Overwriting existing not user-assignable tags should fail
    Given user "admin" has created a "not user-assignable" tag with name "MyFirstTag"
    When user "admin" creates a "not user-assignable" tag with name "MyFirstTag" using the WebDAV API
    Then the HTTP status code should be "409"

  Scenario: Overwriting existing not user-visible tags should fail
    Given user "admin" has created a "not user-visible" tag with name "MyFirstTag"
    When user "admin" creates a "not user-visible" tag with name "MyFirstTag" using the WebDAV API
    Then the HTTP status code should be "409"

  Scenario: Getting tags only works with access to the file
    Given user "user0" has been created
    And user "user1" has been created
    And user "admin" has created a "normal" tag with name "MyFirstTag"
    And user "user0" has uploaded file "data/textfile.txt" to "/myFileToTag.txt"
    When user "user0" adds the tag "MyFirstTag" to "/myFileToTag.txt" shared by "user0" using the WebDAV API
    Then file "/myFileToTag.txt" should have the following tags for user "user0"
      | MyFirstTag | normal |
    And file "/myFileToTag.txt" should have the following tags for user "user1"
      ||

  Scenario: User can assign tags when in the tag's groups
    Given user "user0" has been created
    And group "group1" has been created
    And user "user0" has been added to group "group1"
    When user "admin" creates a "not user-assignable" tag with name "TagWithGroups" and groups "group1|group2" using the WebDAV API
    Then the HTTP status code should be "201"
    And the user "user0" should be able to assign the "not user-assignable" tag with name "TagWithGroups"

  Scenario: User cannot assign tags when not in the tag's groups
    Given user "user0" has been created
    When user "admin" creates a "not user-assignable" tag with name "TagWithGroups" and groups "group1|group2" using the WebDAV API
    Then the HTTP status code should be "201"
    And the user "user0" should not be able to assign the "not user-assignable" tag with name "TagWithGroups"
