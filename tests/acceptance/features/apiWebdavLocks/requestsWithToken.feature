@api
Feature: actions on a locked item are possible if the token is sent with the request

  Background:
    Given user "user0" has been created with default attributes

  Scenario Outline: rename a file in a locked folder
    Given using <dav-path> DAV path
    And user "user0" has locked folder "PARENT" setting following properties
      | lockscope | <lock-scope> |
    When user "user0" moves file "/PARENT/parent.txt" to "/PARENT/renamed-file.txt" sending the locktoken of folder "PARENT" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "user0" file "/PARENT/parent.txt" should not exist
    But as "user0" file "/PARENT/renamed-file.txt" should exist
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |

  Scenario Outline: move a file into a locked folder
    Given using <dav-path> DAV path
    And user "user0" has locked folder "FOLDER" setting following properties
      | lockscope | <lock-scope> |
    When user "user0" moves file "/PARENT/parent.txt" to "/FOLDER/moved-file.txt" sending the locktoken of folder "FOLDER" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "user0" file "/PARENT/parent.txt" should not exist
    But as "user0" file "/FOLDER/moved-file.txt" should exist
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |

  Scenario Outline: move a file into a locked folder is impossible when using the wrong token
    Given using <dav-path> DAV path
    And user "user0" has locked folder "FOLDER" setting following properties
      | lockscope | <lock-scope> |
    And user "user0" has locked folder "PARENT/CHILD" setting following properties
      | lockscope | <lock-scope> |
    When user "user0" moves file "/PARENT/parent.txt" to "/FOLDER/moved-file.txt" sending the locktoken of folder "PARENT/CHILD" using the WebDAV API
    Then the HTTP status code should be "423"
    And as "user0" file "/PARENT/parent.txt" should exist
    But as "user0" file "/FOLDER/moved-file.txt" should not exist
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |

  @issue-34338
  Scenario Outline: share receiver cannot rename a file in a folder locked by the owner even when sending the locktoken
    Given using <dav-path> DAV path
    And user "user1" has been created with default attributes
    And user "user0" has shared folder "PARENT" with user "user1"
    And user "user0" has locked folder "PARENT" setting following properties
      | lockscope | <lock-scope> |
    When user "user1" moves file "PARENT (2)/parent.txt" to "PARENT (2)/renamed-file.txt" sending the locktoken of file "PARENT" of user "user0" using the WebDAV API
    #When the issue is fixed, remove the following steps and replace with the commented-out steps
    Then the HTTP status code should be "403"
    And as "user0" file "/PARENT/parent.txt" should not exist
    But as "user0" file "/PARENT/renamed-file.txt" should exist
    #Then the HTTP status code should be "423"
    #And as "user0" file "/PARENT/parent.txt" should exist
    #But as "user0" file "/PARENT/renamed-file.txt" should not exist
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |

  Scenario Outline: public cannot overwrite a file in a folder locked by the owner even when sending the locktoken
    Given user "user0" has created a public link share of folder "PARENT" with change permission
    And user "user0" has locked folder "PARENT" setting following properties
      | lockscope | <lock-scope> |
    When the public uploads file "parent.txt" with content "test" sending the locktoken of file "PARENT" of user "user0" using the public WebDAV API
    Then the HTTP status code should be "423"
    And the content of file "/PARENT/parent.txt" for user "user0" should be "ownCloud test text file parent" plus end-of-line
    Examples:
      | lock-scope |
      | shared     |
      | exclusive  |
