@api @systemtags-app-required @TestAlsoOnExternalUserBackend
Feature: Assign tags to file/folder
  I want to assign tags to the file/folder
  So that I can organize the files/folders easily

  Background:
    Given these users have been created with default attributes:
      | username |
      | user0    |
      | user1    |
    And as user "user0"

  @smokeTest
  Scenario: Assigning a normal tag to a file shared by someone else as regular user should work
    Given the administrator has created a "normal" tag with name "JustARegularTagName"
    And user "user0" has uploaded file "filesForUpload/textfile.txt" to "/myFileToTag.txt"
    And user "user0" has shared file "/myFileToTag.txt" with user "user1"
    When user "user1" adds tag "JustARegularTagName" to file "/myFileToTag.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And file "/myFileToTag.txt" shared by the user should have the following tags
      | JustARegularTagName | normal |

  Scenario: Assigning a normal tag to a file belonging to someone else as regular user should fail
    Given the administrator has created a "normal" tag with name "MyFirstTag"
    And the administrator has created a "normal" tag with name "MySecondTag"
    And user "user0" has uploaded file "filesForUpload/textfile.txt" to "/myFileToTag.txt"
    When the user adds tag "MyFirstTag" to file "/myFileToTag.txt" using the WebDAV API
    And user "user1" adds tag "MySecondTag" to file "/myFileToTag.txt" owned by "user0" using the WebDAV API
    Then the HTTP status code should be "404"
    And file "/myFileToTag.txt" owned by the user should have the following tags
      | MyFirstTag | normal |

  Scenario: Assigning a not user-assignable tag to a file shared by someone else as regular user should fail
    Given the administrator has created a "normal" tag with name "MyFirstTag"
    And the administrator has created a "not user-assignable" tag with name "MySecondTag"
    And user "user0" has uploaded file "filesForUpload/textfile.txt" to "/myFileToTag.txt"
    And user "user0" has shared file "/myFileToTag.txt" with user "user1"
    When the user adds tag "MyFirstTag" to file "/myFileToTag.txt" using the WebDAV API
    And user "user1" adds tag "MySecondTag" to file "/myFileToTag.txt" using the WebDAV API
    Then the HTTP status code should be "403"
    And file "/myFileToTag.txt" shared by the user should have the following tags
      | MyFirstTag | normal |

  Scenario: Assigning a not user-assignable tag to a file shared by someone else as regular user belongs to tag's groups should work
    Given group "grp1" has been created
    And user "user1" has been added to group "grp1"
    And the administrator has created a "not user-assignable" tag with name "JustARegularTagName" and groups "grp1"
    And user "user0" has uploaded file "filesForUpload/textfile.txt" to "/myFileToTag.txt"
    And user "user0" has shared file "/myFileToTag.txt" with user "user1"
    When user "user1" adds tag "JustARegularTagName" to file "/myFileToTag.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And file "/myFileToTag.txt" shared by the user should have the following tags
      | JustARegularTagName | not user-assignable |

  Scenario: Assigning a static tag to a file shared by someone else as regular user belongs to tag's groups should work
    Given group "grp1" has been created
    And user "user1" has been added to group "grp1"
    And the administrator has created a "static" tag with name "StaticTagName" and groups "grp1"
    And user "user0" has uploaded file "filesForUpload/textfile.txt" to "/myFileToTag.txt"
    And user "user0" has shared file "/myFileToTag.txt" with user "user1"
    When user "user1" adds tag "StaticTagName" to file "/myFileToTag.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And file "/myFileToTag.txt" shared by the user should have the following tags
      | StaticTagName | static |

  Scenario: Assigning a not user-visible tag to a file shared by someone else as regular user should fail
    Given the administrator has created a "normal" tag with name "MyFirstTag"
    And the administrator has created a "not user-visible" tag with name "MySecondTag"
    And user "user0" has uploaded file "filesForUpload/textfile.txt" to "/myFileToTag.txt"
    And user "user0" has shared file "/myFileToTag.txt" with user "user1"
    When the user adds tag "MyFirstTag" to file "/myFileToTag.txt" using the WebDAV API
    And user "user1" adds tag "MySecondTag" to file "/myFileToTag.txt" using the WebDAV API
    Then the HTTP status code should be "412"
    And file "/myFileToTag.txt" shared by the user should have the following tags
      | MyFirstTag | normal |

  Scenario: Assigning a static tag to a file shared by someone else as regular user does not belong to tag's group should fail
    Given group "hash#group" has been created
    And user "user0" has been added to group "hash#group"
    And the administrator has created a "normal" tag with name "NormalTag"
    And the administrator has created a "static" tag with name "StaticTag" and groups "hash#group"
    And user "user0" has uploaded file "filesForUpload/textfile.txt" to "/myFileToTag.txt"
    And user "user0" has shared file "/myFileToTag.txt" with user "user1"
    When the user adds tag "NormalTag" to file "/myFileToTag.txt" using the WebDAV API
    And user "user1" adds tag "StaticTag" to file "/myFileToTag.txt" using the WebDAV API
    Then the HTTP status code should be "403"
    And file "/myFileToTag.txt" shared by the user should have the following tags
      | NormalTag | normal |

  Scenario: Assigning a not user-visible tag to a file shared by someone else as admin user should work
    Given the administrator has created a "normal" tag with name "MyFirstTag"
    And the administrator has created a "not user-visible" tag with name "MySecondTag"
    And user "user0" has uploaded file "filesForUpload/textfile.txt" to "/myFileToTag.txt"
    And user "user0" has shared file "/myFileToTag.txt" with the administrator
    When the user adds tag "MyFirstTag" to file "/myFileToTag.txt" using the WebDAV API
    And the administrator adds tag "MySecondTag" to file "/myFileToTag.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And file "/myFileToTag.txt" should have the following tags for the administrator
      | MyFirstTag  | normal           |
      | MySecondTag | not user-visible |
    And file "/myFileToTag.txt" should have the following tags for the user
      | MyFirstTag | normal |

  Scenario: Assigning a not user-assignable tag to a file shared by someone else as admin user should work
    Given the administrator has created a "normal" tag with name "MyFirstTag"
    And the administrator has created a "not user-assignable" tag with name "MySecondTag"
    And user "user0" has uploaded file "filesForUpload/textfile.txt" to "/myFileToTag.txt"
    And user "user0" has shared file "/myFileToTag.txt" with the administrator
    When the user adds tag "MyFirstTag" to file "/myFileToTag.txt" using the WebDAV API
    And the administrator adds tag "MySecondTag" to file "/myFileToTag.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And file "/myFileToTag.txt" should have the following tags for the administrator
      | MyFirstTag  | normal              |
      | MySecondTag | not user-assignable |
    And file "/myFileToTag.txt" should have the following tags for the user
      | MyFirstTag  | normal              |
      | MySecondTag | not user-assignable |
