@api @systemtags-app-required
Feature: tags

  @smokeTest
  Scenario: Assigning a normal tag to a file shared by someone else as regular user should work
    Given user "user0" has been created
    And user "user1" has been created
    And user "%admin%" has created a "normal" tag with name "JustARegularTagName"
    And user "user0" has uploaded file "data/textfile.txt" to "/myFileToTag.txt"
    And user "user0" has shared file "/myFileToTag.txt" with user "user1"
    When user "user1" adds the tag "JustARegularTagName" to "/myFileToTag.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And file "/myFileToTag.txt" shared by "user0" should have the following tags
      | JustARegularTagName | normal |

  Scenario: Assigning a normal tag to a file belonging to someone else as regular user should fail
    Given user "user0" has been created
    And user "user1" has been created
    And user "%admin%" has created a "normal" tag with name "MyFirstTag"
    And user "%admin%" has created a "normal" tag with name "MySecondTag"
    And user "user0" has uploaded file "data/textfile.txt" to "/myFileToTag.txt"
    When user "user0" adds the tag "MyFirstTag" to "/myFileToTag.txt" using the WebDAV API
    And user "user1" adds the tag "MySecondTag" to "/myFileToTag.txt" owned by "user0" using the WebDAV API
    Then the HTTP status code should be "404"
    And file "/myFileToTag.txt" owned by "user0" should have the following tags
      | MyFirstTag | normal |

  Scenario: Assigning a not user-assignable tag to a file shared by someone else as regular user should fail
    Given user "user0" has been created
    And user "user1" has been created
    And user "%admin%" has created a "normal" tag with name "MyFirstTag"
    And user "%admin%" has created a "not user-assignable" tag with name "MySecondTag"
    And user "user0" has uploaded file "data/textfile.txt" to "/myFileToTag.txt"
    And user "user0" has shared file "/myFileToTag.txt" with user "user1"
    When user "user0" adds the tag "MyFirstTag" to "/myFileToTag.txt" using the WebDAV API
    And user "user1" adds the tag "MySecondTag" to "/myFileToTag.txt" using the WebDAV API
    Then the HTTP status code should be "403"
    And file "/myFileToTag.txt" shared by "user0" should have the following tags
      | MyFirstTag | normal |

  Scenario: Assigning a not user-assignable tag to a file shared by someone else as regular user belongs to tag's groups should work
    Given user "user0" has been created
    And user "user1" has been created
    And group "group1" has been created
    And user "user1" has been added to group "group1"
    And user "%admin%" has created a "not user-assignable" tag with name "JustARegularTagName" and groups "group1"
    And user "user0" has uploaded file "data/textfile.txt" to "/myFileToTag.txt"
    And user "user0" has shared file "/myFileToTag.txt" with user "user1"
    When user "user1" adds the tag "JustARegularTagName" to "/myFileToTag.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And file "/myFileToTag.txt" shared by "user0" should have the following tags
      | JustARegularTagName | not user-assignable |

  Scenario: Assigning a not user-visible tag to a file shared by someone else as regular user should fail
    Given user "user0" has been created
    And user "user1" has been created
    And user "%admin%" has created a "normal" tag with name "MyFirstTag"
    And user "%admin%" has created a "not user-visible" tag with name "MySecondTag"
    And user "user0" has uploaded file "data/textfile.txt" to "/myFileToTag.txt"
    And user "user0" has shared file "/myFileToTag.txt" with user "user1"
    When user "user0" adds the tag "MyFirstTag" to "/myFileToTag.txt" using the WebDAV API
    And user "user1" adds the tag "MySecondTag" to "/myFileToTag.txt" using the WebDAV API
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
    When user "user0" adds the tag "MyFirstTag" to "/myFileToTag.txt" using the WebDAV API
    And user "another_admin" adds the tag "MySecondTag" to "/myFileToTag.txt" using the WebDAV API
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
    When user "user0" adds the tag "MyFirstTag" to "/myFileToTag.txt" using the WebDAV API
    And user "another_admin" adds the tag "MySecondTag" to "/myFileToTag.txt" using the WebDAV API
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
    And user "%admin%" has created a "normal" tag with name "MyFirstTag"
    And user "%admin%" has created a "normal" tag with name "MySecondTag"
    And user "user0" has uploaded file "data/textfile.txt" to "/myFileToTag.txt"
    And user "user0" has shared file "/myFileToTag.txt" with user "user1"
    And user "user0" has added the tag "MyFirstTag" to "/myFileToTag.txt"
    And user "user0" has added the tag "MySecondTag" to "/myFileToTag.txt"
    When user "user1" removes the tag "MyFirstTag" from "/myFileToTag.txt" shared by "user0" using the WebDAV API
    Then the HTTP status code should be "204"
    And file "/myFileToTag.txt" should have the following tags for user "user0"
      | MySecondTag | normal |

  Scenario: Unassigning a normal tag from a file unshared by someone else as regular user should fail
    Given user "user0" has been created
    And user "user1" has been created
    And user "%admin%" has created a "normal" tag with name "MyFirstTag"
    And user "%admin%" has created a "normal" tag with name "MySecondTag"
    And user "user0" has uploaded file "data/textfile.txt" to "/myFileToTag.txt"
    And user "user0" has added the tag "MyFirstTag" to "/myFileToTag.txt"
    And user "user0" has added the tag "MySecondTag" to "/myFileToTag.txt"
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
    And user "another_admin" has added the tag "MyFirstTag" to "/myFileToTag.txt"
    And user "user0" has added the tag "MySecondTag" to "/myFileToTag.txt"
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
    And user "another_admin" has added the tag "MyFirstTag" to "/myFileToTag.txt"
    And user "user0" has added the tag "MySecondTag" to "/myFileToTag.txt"
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
    And user "another_admin" has added the tag "MyFirstTag" to "/myFileToTag.txt"
    And user "user0" has added the tag "MySecondTag" to "/myFileToTag.txt"
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
    And user "another_admin" has added the tag "MyFirstTag" to "/myFileToTag.txt"
    And user "user0" has added the tag "MySecondTag" to "/myFileToTag.txt"
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
    And user "another_admin" has added the tag "MyFirstTag" to "/myFileToTag.txt"
    And user "user0" has added the tag "MySecondTag" to "/myFileToTag.txt"
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
    And user "another_admin" has added the tag "MyFirstTag" to "/myFileToTag.txt"
    And user "user0" has added the tag "MySecondTag" to "/myFileToTag.txt"
    And user "user0" has removed all shares from the file named "/myFileToTag.txt"
    When user "%admin%" removes the tag "MyFirstTag" from "/myFileToTag.txt" shared by "user0" using the WebDAV API
    Then the HTTP status code should be "404"

  Scenario: Overwriting existing normal tags should fail
    Given user "user0" has been created
    And user "user0" has created a "normal" tag with name "MyFirstTag"
    When user "user0" creates a "normal" tag with name "MyFirstTag" using the WebDAV API
    Then the HTTP status code should be "409"

  Scenario: Overwriting existing not user-assignable tags should fail
    Given user "%admin%" has created a "not user-assignable" tag with name "MyFirstTag"
    When user "%admin%" creates a "not user-assignable" tag with name "MyFirstTag" using the WebDAV API
    Then the HTTP status code should be "409"

  Scenario: Overwriting existing not user-visible tags should fail
    Given user "%admin%" has created a "not user-visible" tag with name "MyFirstTag"
    When user "%admin%" creates a "not user-visible" tag with name "MyFirstTag" using the WebDAV API
    Then the HTTP status code should be "409"

  Scenario: Getting tags only works with access to the file
    Given user "user0" has been created
    And user "user1" has been created
    And user "%admin%" has created a "normal" tag with name "MyFirstTag"
    And user "user0" has uploaded file "data/textfile.txt" to "/myFileToTag.txt"
    When user "user0" adds the tag "MyFirstTag" to "/myFileToTag.txt" using the WebDAV API
    Then file "/myFileToTag.txt" should have the following tags for user "user0"
      | MyFirstTag | normal |
    And the HTTP status when user "user1" requests tags for file "/myFileToTag.txt" owned by "user0" should be "404"

  Scenario: User can assign tags when in the tag's groups
    Given user "user0" has been created
    And group "group1" has been created
    And user "user0" has been added to group "group1"
    When user "%admin%" creates a "not user-assignable" tag with name "TagWithGroups" and groups "group1|group2" using the WebDAV API
    Then the HTTP status code should be "201"
    And the user "user0" should be able to assign the "not user-assignable" tag with name "TagWithGroups"

  Scenario: User cannot assign tags when not in the tag's groups
    Given user "user0" has been created
    When user "%admin%" creates a "not user-assignable" tag with name "TagWithGroups" and groups "group1|group2" using the WebDAV API
    Then the HTTP status code should be "201"
    And the user "user0" should not be able to assign the "not user-assignable" tag with name "TagWithGroups"
