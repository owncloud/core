@api @files_sharing-app-required @skipOnOcV10
Feature: move (rename) file
  As a user
  I want to be able to move and rename files
  So that I can manage my file system

  Background:
    Given using OCS API version "1"
    And user "Alice" has been created with default attributes and without skeleton files


  Scenario: Moving a folder out of a shared folder as the sharee and as the sharer
    Given using new DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created the following folders
      | path                     |
      | /testshare               |
      | /testshare/testsubfolder |
    And user "Brian" has uploaded file with content "test data" to "/testshare/testsubfolder/testfile.txt"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | change    |
      | shareWith   | Alice     |
    And user "Alice" has accepted share "/testshare" offered by user "Brian"
    When user "Brian" moves folder "/testshare/testsubfolder" to "/testsubfolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/testsubfolder/testfile.txt" for user "Brian" should be "test data"
    And as "Alice" folder "/testshare/testsubfolder" should not exist
    And as "Brian" folder "/testshare/testsubfolder" should not exist

  Scenario: Moving a folder out of a shared folder as the sharee and as the sharer
    Given using new DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created the following folders
      | path                     |
      | /testshare               |
      | /testshare/testsubfolder |
    And user "Brian" has uploaded file with content "test data" to "/testshare/testsubfolder/testfile.txt"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | change    |
      | shareWith   | Alice     |
    And user "Alice" has accepted share "/testshare" offered by user "Brian"
    When user "Brian" moves folder "/testshare/testsubfolder" to "/testsubfolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/testsubfolder/testfile.txt" for user "Brian" should be "test data"
    And as "Alice" folder "/testshare/testsubfolder" should not exist
    And as "Brian" folder "/testshare/testsubfolder" should not exist

  Scenario: Moving a folder out of a shared folder as the sharee and as the sharer
    Given using new DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created the following folders
      | path                     |
      | /testshare               |
      | /testshare/testsubfolder |
    And user "Brian" has uploaded file with content "test data" to "/testshare/testsubfolder/testfile.txt"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | change    |
      | shareWith   | Alice     |
    And user "Alice" has accepted share "/testshare" offered by user "Brian"
    When user "Brian" moves folder "/testshare/testsubfolder" to "/testsubfolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/testsubfolder/testfile.txt" for user "Brian" should be "test data"
    And as "Alice" folder "/testshare/testsubfolder" should not exist
    And as "Brian" folder "/testshare/testsubfolder" should not exist

  Scenario: Moving a folder out of a shared folder as the sharee and as the sharer
    Given using new DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created the following folders
      | path                     |
      | /testshare               |
      | /testshare/testsubfolder |
    And user "Brian" has uploaded file with content "test data" to "/testshare/testsubfolder/testfile.txt"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | change    |
      | shareWith   | Alice     |
    And user "Alice" has accepted share "/testshare" offered by user "Brian"
    When user "Brian" moves folder "/testshare/testsubfolder" to "/testsubfolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/testsubfolder/testfile.txt" for user "Brian" should be "test data"
    And as "Alice" folder "/testshare/testsubfolder" should not exist
    And as "Brian" folder "/testshare/testsubfolder" should not exist

  Scenario: Moving a folder out of a shared folder as the sharee and as the sharer
    Given using new DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created the following folders
      | path                     |
      | /testshare               |
      | /testshare/testsubfolder |
    And user "Brian" has uploaded file with content "test data" to "/testshare/testsubfolder/testfile.txt"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | change    |
      | shareWith   | Alice     |
    And user "Alice" has accepted share "/testshare" offered by user "Brian"
    When user "Brian" moves folder "/testshare/testsubfolder" to "/testsubfolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/testsubfolder/testfile.txt" for user "Brian" should be "test data"
    And as "Alice" folder "/testshare/testsubfolder" should not exist
    And as "Brian" folder "/testshare/testsubfolder" should not exist

  Scenario: Moving a folder out of a shared folder as the sharee and as the sharer
    Given using new DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created the following folders
      | path                     |
      | /testshare               |
      | /testshare/testsubfolder |
    And user "Brian" has uploaded file with content "test data" to "/testshare/testsubfolder/testfile.txt"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | change    |
      | shareWith   | Alice     |
    And user "Alice" has accepted share "/testshare" offered by user "Brian"
    When user "Brian" moves folder "/testshare/testsubfolder" to "/testsubfolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/testsubfolder/testfile.txt" for user "Brian" should be "test data"
    And as "Alice" folder "/testshare/testsubfolder" should not exist
    And as "Brian" folder "/testshare/testsubfolder" should not exist

  Scenario: Moving a folder out of a shared folder as the sharee and as the sharer
    Given using new DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created the following folders
      | path                     |
      | /testshare               |
      | /testshare/testsubfolder |
    And user "Brian" has uploaded file with content "test data" to "/testshare/testsubfolder/testfile.txt"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | change    |
      | shareWith   | Alice     |
    And user "Alice" has accepted share "/testshare" offered by user "Brian"
    When user "Brian" moves folder "/testshare/testsubfolder" to "/testsubfolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/testsubfolder/testfile.txt" for user "Brian" should be "test data"
    And as "Alice" folder "/testshare/testsubfolder" should not exist
    And as "Brian" folder "/testshare/testsubfolder" should not exist

  Scenario: Moving a folder out of a shared folder as the sharee and as the sharer
    Given using new DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created the following folders
      | path                     |
      | /testshare               |
      | /testshare/testsubfolder |
    And user "Brian" has uploaded file with content "test data" to "/testshare/testsubfolder/testfile.txt"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | change    |
      | shareWith   | Alice     |
    And user "Alice" has accepted share "/testshare" offered by user "Brian"
    When user "Brian" moves folder "/testshare/testsubfolder" to "/testsubfolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/testsubfolder/testfile.txt" for user "Brian" should be "test data"
    And as "Alice" folder "/testshare/testsubfolder" should not exist
    And as "Brian" folder "/testshare/testsubfolder" should not exist

  Scenario: Moving a folder out of a shared folder as the sharee and as the sharer
    Given using new DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created the following folders
      | path                     |
      | /testshare               |
      | /testshare/testsubfolder |
    And user "Brian" has uploaded file with content "test data" to "/testshare/testsubfolder/testfile.txt"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | change    |
      | shareWith   | Alice     |
    And user "Alice" has accepted share "/testshare" offered by user "Brian"
    When user "Brian" moves folder "/testshare/testsubfolder" to "/testsubfolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/testsubfolder/testfile.txt" for user "Brian" should be "test data"
    And as "Alice" folder "/testshare/testsubfolder" should not exist
    And as "Brian" folder "/testshare/testsubfolder" should not exist

  Scenario: Moving a folder out of a shared folder as the sharee and as the sharer
    Given using new DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created the following folders
      | path                     |
      | /testshare               |
      | /testshare/testsubfolder |
    And user "Brian" has uploaded file with content "test data" to "/testshare/testsubfolder/testfile.txt"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | change    |
      | shareWith   | Alice     |
    And user "Alice" has accepted share "/testshare" offered by user "Brian"
    When user "Brian" moves folder "/testshare/testsubfolder" to "/testsubfolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/testsubfolder/testfile.txt" for user "Brian" should be "test data"
    And as "Alice" folder "/testshare/testsubfolder" should not exist
    And as "Brian" folder "/testshare/testsubfolder" should not exist

  Scenario: Moving a folder out of a shared folder as the sharee and as the sharer
    Given using new DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created the following folders
      | path                     |
      | /testshare               |
      | /testshare/testsubfolder |
    And user "Brian" has uploaded file with content "test data" to "/testshare/testsubfolder/testfile.txt"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | change    |
      | shareWith   | Alice     |
    And user "Alice" has accepted share "/testshare" offered by user "Brian"
    When user "Brian" moves folder "/testshare/testsubfolder" to "/testsubfolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/testsubfolder/testfile.txt" for user "Brian" should be "test data"
    And as "Alice" folder "/testshare/testsubfolder" should not exist
    And as "Brian" folder "/testshare/testsubfolder" should not exist

  Scenario: Moving a folder out of a shared folder as the sharee and as the sharer
    Given using new DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created the following folders
      | path                     |
      | /testshare               |
      | /testshare/testsubfolder |
    And user "Brian" has uploaded file with content "test data" to "/testshare/testsubfolder/testfile.txt"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | change    |
      | shareWith   | Alice     |
    And user "Alice" has accepted share "/testshare" offered by user "Brian"
    When user "Brian" moves folder "/testshare/testsubfolder" to "/testsubfolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/testsubfolder/testfile.txt" for user "Brian" should be "test data"
    And as "Alice" folder "/testshare/testsubfolder" should not exist
    And as "Brian" folder "/testshare/testsubfolder" should not exist

  Scenario: Moving a folder out of a shared folder as the sharee and as the sharer
    Given using new DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created the following folders
      | path                     |
      | /testshare               |
      | /testshare/testsubfolder |
    And user "Brian" has uploaded file with content "test data" to "/testshare/testsubfolder/testfile.txt"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | change    |
      | shareWith   | Alice     |
    And user "Alice" has accepted share "/testshare" offered by user "Brian"
    When user "Brian" moves folder "/testshare/testsubfolder" to "/testsubfolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/testsubfolder/testfile.txt" for user "Brian" should be "test data"
    And as "Alice" folder "/testshare/testsubfolder" should not exist
    And as "Brian" folder "/testshare/testsubfolder" should not exist

  Scenario: Moving a folder out of a shared folder as the sharee and as the sharer
    Given using new DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created the following folders
      | path                     |
      | /testshare               |
      | /testshare/testsubfolder |
    And user "Brian" has uploaded file with content "test data" to "/testshare/testsubfolder/testfile.txt"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | change    |
      | shareWith   | Alice     |
    And user "Alice" has accepted share "/testshare" offered by user "Brian"
    When user "Brian" moves folder "/testshare/testsubfolder" to "/testsubfolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/testsubfolder/testfile.txt" for user "Brian" should be "test data"
    And as "Alice" folder "/testshare/testsubfolder" should not exist
    And as "Brian" folder "/testshare/testsubfolder" should not exist

  Scenario: Moving a folder out of a shared folder as the sharee and as the sharer
    Given using new DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created the following folders
      | path                     |
      | /testshare               |
      | /testshare/testsubfolder |
    And user "Brian" has uploaded file with content "test data" to "/testshare/testsubfolder/testfile.txt"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | change    |
      | shareWith   | Alice     |
    And user "Alice" has accepted share "/testshare" offered by user "Brian"
    When user "Brian" moves folder "/testshare/testsubfolder" to "/testsubfolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/testsubfolder/testfile.txt" for user "Brian" should be "test data"
    And as "Alice" folder "/testshare/testsubfolder" should not exist
    And as "Brian" folder "/testshare/testsubfolder" should not exist

  Scenario: Moving a folder out of a shared folder as the sharee and as the sharer
    Given using new DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created the following folders
      | path                     |
      | /testshare               |
      | /testshare/testsubfolder |
    And user "Brian" has uploaded file with content "test data" to "/testshare/testsubfolder/testfile.txt"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | change    |
      | shareWith   | Alice     |
    And user "Alice" has accepted share "/testshare" offered by user "Brian"
    When user "Brian" moves folder "/testshare/testsubfolder" to "/testsubfolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/testsubfolder/testfile.txt" for user "Brian" should be "test data"
    And as "Alice" folder "/testshare/testsubfolder" should not exist
    And as "Brian" folder "/testshare/testsubfolder" should not exist

  Scenario: Moving a folder out of a shared folder as the sharee and as the sharer
    Given using new DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created the following folders
      | path                     |
      | /testshare               |
      | /testshare/testsubfolder |
    And user "Brian" has uploaded file with content "test data" to "/testshare/testsubfolder/testfile.txt"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | change    |
      | shareWith   | Alice     |
    And user "Alice" has accepted share "/testshare" offered by user "Brian"
    When user "Brian" moves folder "/testshare/testsubfolder" to "/testsubfolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/testsubfolder/testfile.txt" for user "Brian" should be "test data"
    And as "Alice" folder "/testshare/testsubfolder" should not exist
    And as "Brian" folder "/testshare/testsubfolder" should not exist

  Scenario: Moving a folder out of a shared folder as the sharee and as the sharer
    Given using new DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created the following folders
      | path                     |
      | /testshare               |
      | /testshare/testsubfolder |
    And user "Brian" has uploaded file with content "test data" to "/testshare/testsubfolder/testfile.txt"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | change    |
      | shareWith   | Alice     |
    And user "Alice" has accepted share "/testshare" offered by user "Brian"
    When user "Brian" moves folder "/testshare/testsubfolder" to "/testsubfolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/testsubfolder/testfile.txt" for user "Brian" should be "test data"
    And as "Alice" folder "/testshare/testsubfolder" should not exist
    And as "Brian" folder "/testshare/testsubfolder" should not exist

  Scenario: Moving a folder out of a shared folder as the sharee and as the sharer
    Given using new DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created the following folders
      | path                     |
      | /testshare               |
      | /testshare/testsubfolder |
    And user "Brian" has uploaded file with content "test data" to "/testshare/testsubfolder/testfile.txt"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | change    |
      | shareWith   | Alice     |
    And user "Alice" has accepted share "/testshare" offered by user "Brian"
    When user "Brian" moves folder "/testshare/testsubfolder" to "/testsubfolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/testsubfolder/testfile.txt" for user "Brian" should be "test data"
    And as "Alice" folder "/testshare/testsubfolder" should not exist
    And as "Brian" folder "/testshare/testsubfolder" should not exist

  Scenario: Moving a folder out of a shared folder as the sharee and as the sharer
    Given using new DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created the following folders
      | path                     |
      | /testshare               |
      | /testshare/testsubfolder |
    And user "Brian" has uploaded file with content "test data" to "/testshare/testsubfolder/testfile.txt"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | change    |
      | shareWith   | Alice     |
    And user "Alice" has accepted share "/testshare" offered by user "Brian"
    When user "Brian" moves folder "/testshare/testsubfolder" to "/testsubfolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/testsubfolder/testfile.txt" for user "Brian" should be "test data"
    And as "Alice" folder "/testshare/testsubfolder" should not exist
    And as "Brian" folder "/testshare/testsubfolder" should not exist

  Scenario: Moving a folder out of a shared folder as the sharee and as the sharer
    Given using new DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created the following folders
      | path                     |
      | /testshare               |
      | /testshare/testsubfolder |
    And user "Brian" has uploaded file with content "test data" to "/testshare/testsubfolder/testfile.txt"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | change    |
      | shareWith   | Alice     |
    And user "Alice" has accepted share "/testshare" offered by user "Brian"
    When user "Brian" moves folder "/testshare/testsubfolder" to "/testsubfolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/testsubfolder/testfile.txt" for user "Brian" should be "test data"
    And as "Alice" folder "/testshare/testsubfolder" should not exist
    And as "Brian" folder "/testshare/testsubfolder" should not exist

  Scenario: Moving a folder out of a shared folder as the sharee and as the sharer
    Given using new DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created the following folders
      | path                     |
      | /testshare               |
      | /testshare/testsubfolder |
    And user "Brian" has uploaded file with content "test data" to "/testshare/testsubfolder/testfile.txt"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | change    |
      | shareWith   | Alice     |
    And user "Alice" has accepted share "/testshare" offered by user "Brian"
    When user "Brian" moves folder "/testshare/testsubfolder" to "/testsubfolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/testsubfolder/testfile.txt" for user "Brian" should be "test data"
    And as "Alice" folder "/testshare/testsubfolder" should not exist
    And as "Brian" folder "/testshare/testsubfolder" should not exist

  Scenario: Moving a folder out of a shared folder as the sharee and as the sharer
    Given using new DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created the following folders
      | path                     |
      | /testshare               |
      | /testshare/testsubfolder |
    And user "Brian" has uploaded file with content "test data" to "/testshare/testsubfolder/testfile.txt"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | change    |
      | shareWith   | Alice     |
    And user "Alice" has accepted share "/testshare" offered by user "Brian"
    When user "Brian" moves folder "/testshare/testsubfolder" to "/testsubfolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/testsubfolder/testfile.txt" for user "Brian" should be "test data"
    And as "Alice" folder "/testshare/testsubfolder" should not exist
    And as "Brian" folder "/testshare/testsubfolder" should not exist

  Scenario: Moving a folder out of a shared folder as the sharee and as the sharer
    Given using new DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created the following folders
      | path                     |
      | /testshare               |
      | /testshare/testsubfolder |
    And user "Brian" has uploaded file with content "test data" to "/testshare/testsubfolder/testfile.txt"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | change    |
      | shareWith   | Alice     |
    And user "Alice" has accepted share "/testshare" offered by user "Brian"
    When user "Brian" moves folder "/testshare/testsubfolder" to "/testsubfolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/testsubfolder/testfile.txt" for user "Brian" should be "test data"
    And as "Alice" folder "/testshare/testsubfolder" should not exist
    And as "Brian" folder "/testshare/testsubfolder" should not exist

  Scenario: Moving a folder out of a shared folder as the sharee and as the sharer
    Given using new DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created the following folders
      | path                     |
      | /testshare               |
      | /testshare/testsubfolder |
    And user "Brian" has uploaded file with content "test data" to "/testshare/testsubfolder/testfile.txt"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | change    |
      | shareWith   | Alice     |
    And user "Alice" has accepted share "/testshare" offered by user "Brian"
    When user "Brian" moves folder "/testshare/testsubfolder" to "/testsubfolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/testsubfolder/testfile.txt" for user "Brian" should be "test data"
    And as "Alice" folder "/testshare/testsubfolder" should not exist
    And as "Brian" folder "/testshare/testsubfolder" should not exist

  Scenario: Moving a folder out of a shared folder as the sharee and as the sharer
    Given using new DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created the following folders
      | path                     |
      | /testshare               |
      | /testshare/testsubfolder |
    And user "Brian" has uploaded file with content "test data" to "/testshare/testsubfolder/testfile.txt"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | change    |
      | shareWith   | Alice     |
    And user "Alice" has accepted share "/testshare" offered by user "Brian"
    When user "Brian" moves folder "/testshare/testsubfolder" to "/testsubfolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/testsubfolder/testfile.txt" for user "Brian" should be "test data"
    And as "Alice" folder "/testshare/testsubfolder" should not exist
    And as "Brian" folder "/testshare/testsubfolder" should not exist

  Scenario: Moving a folder out of a shared folder as the sharee and as the sharer
    Given using new DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created the following folders
      | path                     |
      | /testshare               |
      | /testshare/testsubfolder |
    And user "Brian" has uploaded file with content "test data" to "/testshare/testsubfolder/testfile.txt"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | change    |
      | shareWith   | Alice     |
    And user "Alice" has accepted share "/testshare" offered by user "Brian"
    When user "Brian" moves folder "/testshare/testsubfolder" to "/testsubfolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/testsubfolder/testfile.txt" for user "Brian" should be "test data"
    And as "Alice" folder "/testshare/testsubfolder" should not exist
    And as "Brian" folder "/testshare/testsubfolder" should not exist

  Scenario: Moving a folder out of a shared folder as the sharee and as the sharer
    Given using new DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created the following folders
      | path                     |
      | /testshare               |
      | /testshare/testsubfolder |
    And user "Brian" has uploaded file with content "test data" to "/testshare/testsubfolder/testfile.txt"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | change    |
      | shareWith   | Alice     |
    And user "Alice" has accepted share "/testshare" offered by user "Brian"
    When user "Brian" moves folder "/testshare/testsubfolder" to "/testsubfolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/testsubfolder/testfile.txt" for user "Brian" should be "test data"
    And as "Alice" folder "/testshare/testsubfolder" should not exist
    And as "Brian" folder "/testshare/testsubfolder" should not exist

  Scenario: Moving a folder out of a shared folder as the sharee and as the sharer
    Given using new DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created the following folders
      | path                     |
      | /testshare               |
      | /testshare/testsubfolder |
    And user "Brian" has uploaded file with content "test data" to "/testshare/testsubfolder/testfile.txt"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | change    |
      | shareWith   | Alice     |
    And user "Alice" has accepted share "/testshare" offered by user "Brian"
    When user "Brian" moves folder "/testshare/testsubfolder" to "/testsubfolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/testsubfolder/testfile.txt" for user "Brian" should be "test data"
    And as "Alice" folder "/testshare/testsubfolder" should not exist
    And as "Brian" folder "/testshare/testsubfolder" should not exist

  Scenario: Moving a folder out of a shared folder as the sharee and as the sharer
    Given using new DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created the following folders
      | path                     |
      | /testshare               |
      | /testshare/testsubfolder |
    And user "Brian" has uploaded file with content "test data" to "/testshare/testsubfolder/testfile.txt"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | change    |
      | shareWith   | Alice     |
    And user "Alice" has accepted share "/testshare" offered by user "Brian"
    When user "Brian" moves folder "/testshare/testsubfolder" to "/testsubfolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/testsubfolder/testfile.txt" for user "Brian" should be "test data"
    And as "Alice" folder "/testshare/testsubfolder" should not exist
    And as "Brian" folder "/testshare/testsubfolder" should not exist

  Scenario: Moving a folder out of a shared folder as the sharee and as the sharer
    Given using new DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created the following folders
      | path                     |
      | /testshare               |
      | /testshare/testsubfolder |
    And user "Brian" has uploaded file with content "test data" to "/testshare/testsubfolder/testfile.txt"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | change    |
      | shareWith   | Alice     |
    And user "Alice" has accepted share "/testshare" offered by user "Brian"
    When user "Brian" moves folder "/testshare/testsubfolder" to "/testsubfolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/testsubfolder/testfile.txt" for user "Brian" should be "test data"
    And as "Alice" folder "/testshare/testsubfolder" should not exist
    And as "Brian" folder "/testshare/testsubfolder" should not exist

  Scenario: Moving a folder out of a shared folder as the sharee and as the sharer
    Given using new DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created the following folders
      | path                     |
      | /testshare               |
      | /testshare/testsubfolder |
    And user "Brian" has uploaded file with content "test data" to "/testshare/testsubfolder/testfile.txt"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | change    |
      | shareWith   | Alice     |
    And user "Alice" has accepted share "/testshare" offered by user "Brian"
    When user "Brian" moves folder "/testshare/testsubfolder" to "/testsubfolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/testsubfolder/testfile.txt" for user "Brian" should be "test data"
    And as "Alice" folder "/testshare/testsubfolder" should not exist
    And as "Brian" folder "/testshare/testsubfolder" should not exist

  Scenario: Moving a folder out of a shared folder as the sharee and as the sharer
    Given using new DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created the following folders
      | path                     |
      | /testshare               |
      | /testshare/testsubfolder |
    And user "Brian" has uploaded file with content "test data" to "/testshare/testsubfolder/testfile.txt"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | change    |
      | shareWith   | Alice     |
    And user "Alice" has accepted share "/testshare" offered by user "Brian"
    When user "Brian" moves folder "/testshare/testsubfolder" to "/testsubfolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/testsubfolder/testfile.txt" for user "Brian" should be "test data"
    And as "Alice" folder "/testshare/testsubfolder" should not exist
    And as "Brian" folder "/testshare/testsubfolder" should not exist

  Scenario: Moving a folder out of a shared folder as the sharee and as the sharer
    Given using new DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created the following folders
      | path                     |
      | /testshare               |
      | /testshare/testsubfolder |
    And user "Brian" has uploaded file with content "test data" to "/testshare/testsubfolder/testfile.txt"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | change    |
      | shareWith   | Alice     |
    And user "Alice" has accepted share "/testshare" offered by user "Brian"
    When user "Brian" moves folder "/testshare/testsubfolder" to "/testsubfolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/testsubfolder/testfile.txt" for user "Brian" should be "test data"
    And as "Alice" folder "/testshare/testsubfolder" should not exist
    And as "Brian" folder "/testshare/testsubfolder" should not exist

  Scenario: Moving a folder out of a shared folder as the sharee and as the sharer
    Given using new DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created the following folders
      | path                     |
      | /testshare               |
      | /testshare/testsubfolder |
    And user "Brian" has uploaded file with content "test data" to "/testshare/testsubfolder/testfile.txt"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | change    |
      | shareWith   | Alice     |
    And user "Alice" has accepted share "/testshare" offered by user "Brian"
    When user "Brian" moves folder "/testshare/testsubfolder" to "/testsubfolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/testsubfolder/testfile.txt" for user "Brian" should be "test data"
    And as "Alice" folder "/testshare/testsubfolder" should not exist
    And as "Brian" folder "/testshare/testsubfolder" should not exist

  Scenario: Moving a folder out of a shared folder as the sharee and as the sharer
    Given using new DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created the following folders
      | path                     |
      | /testshare               |
      | /testshare/testsubfolder |
    And user "Brian" has uploaded file with content "test data" to "/testshare/testsubfolder/testfile.txt"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | change    |
      | shareWith   | Alice     |
    And user "Alice" has accepted share "/testshare" offered by user "Brian"
    When user "Brian" moves folder "/testshare/testsubfolder" to "/testsubfolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/testsubfolder/testfile.txt" for user "Brian" should be "test data"
    And as "Alice" folder "/testshare/testsubfolder" should not exist
    And as "Brian" folder "/testshare/testsubfolder" should not exist

  Scenario: Moving a folder out of a shared folder as the sharee and as the sharer
    Given using new DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created the following folders
      | path                     |
      | /testshare               |
      | /testshare/testsubfolder |
    And user "Brian" has uploaded file with content "test data" to "/testshare/testsubfolder/testfile.txt"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | change    |
      | shareWith   | Alice     |
    And user "Alice" has accepted share "/testshare" offered by user "Brian"
    When user "Brian" moves folder "/testshare/testsubfolder" to "/testsubfolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/testsubfolder/testfile.txt" for user "Brian" should be "test data"
    And as "Alice" folder "/testshare/testsubfolder" should not exist
    And as "Brian" folder "/testshare/testsubfolder" should not exist

  Scenario: Moving a folder out of a shared folder as the sharee and as the sharer
    Given using new DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created the following folders
      | path                     |
      | /testshare               |
      | /testshare/testsubfolder |
    And user "Brian" has uploaded file with content "test data" to "/testshare/testsubfolder/testfile.txt"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | change    |
      | shareWith   | Alice     |
    And user "Alice" has accepted share "/testshare" offered by user "Brian"
    When user "Brian" moves folder "/testshare/testsubfolder" to "/testsubfolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/testsubfolder/testfile.txt" for user "Brian" should be "test data"
    And as "Alice" folder "/testshare/testsubfolder" should not exist
    And as "Brian" folder "/testshare/testsubfolder" should not exist

  Scenario: Moving a folder out of a shared folder as the sharee and as the sharer
    Given using new DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created the following folders
      | path                     |
      | /testshare               |
      | /testshare/testsubfolder |
    And user "Brian" has uploaded file with content "test data" to "/testshare/testsubfolder/testfile.txt"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | change    |
      | shareWith   | Alice     |
    And user "Alice" has accepted share "/testshare" offered by user "Brian"
    When user "Brian" moves folder "/testshare/testsubfolder" to "/testsubfolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/testsubfolder/testfile.txt" for user "Brian" should be "test data"
    And as "Alice" folder "/testshare/testsubfolder" should not exist
    And as "Brian" folder "/testshare/testsubfolder" should not exist

  Scenario: Moving a folder out of a shared folder as the sharee and as the sharer
    Given using new DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created the following folders
      | path                     |
      | /testshare               |
      | /testshare/testsubfolder |
    And user "Brian" has uploaded file with content "test data" to "/testshare/testsubfolder/testfile.txt"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | change    |
      | shareWith   | Alice     |
    And user "Alice" has accepted share "/testshare" offered by user "Brian"
    When user "Brian" moves folder "/testshare/testsubfolder" to "/testsubfolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/testsubfolder/testfile.txt" for user "Brian" should be "test data"
    And as "Alice" folder "/testshare/testsubfolder" should not exist
    And as "Brian" folder "/testshare/testsubfolder" should not exist

  Scenario: Moving a folder out of a shared folder as the sharee and as the sharer
    Given using new DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created the following folders
      | path                     |
      | /testshare               |
      | /testshare/testsubfolder |
    And user "Brian" has uploaded file with content "test data" to "/testshare/testsubfolder/testfile.txt"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | change    |
      | shareWith   | Alice     |
    And user "Alice" has accepted share "/testshare" offered by user "Brian"
    When user "Brian" moves folder "/testshare/testsubfolder" to "/testsubfolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/testsubfolder/testfile.txt" for user "Brian" should be "test data"
    And as "Alice" folder "/testshare/testsubfolder" should not exist
    And as "Brian" folder "/testshare/testsubfolder" should not exist

  Scenario: Moving a folder out of a shared folder as the sharee and as the sharer
    Given using new DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created the following folders
      | path                     |
      | /testshare               |
      | /testshare/testsubfolder |
    And user "Brian" has uploaded file with content "test data" to "/testshare/testsubfolder/testfile.txt"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | change    |
      | shareWith   | Alice     |
    And user "Alice" has accepted share "/testshare" offered by user "Brian"
    When user "Brian" moves folder "/testshare/testsubfolder" to "/testsubfolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/testsubfolder/testfile.txt" for user "Brian" should be "test data"
    And as "Alice" folder "/testshare/testsubfolder" should not exist
    And as "Brian" folder "/testshare/testsubfolder" should not exist

  Scenario: Moving a folder out of a shared folder as the sharee and as the sharer
    Given using new DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created the following folders
      | path                     |
      | /testshare               |
      | /testshare/testsubfolder |
    And user "Brian" has uploaded file with content "test data" to "/testshare/testsubfolder/testfile.txt"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | change    |
      | shareWith   | Alice     |
    And user "Alice" has accepted share "/testshare" offered by user "Brian"
    When user "Brian" moves folder "/testshare/testsubfolder" to "/testsubfolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/testsubfolder/testfile.txt" for user "Brian" should be "test data"
    And as "Alice" folder "/testshare/testsubfolder" should not exist
    And as "Brian" folder "/testshare/testsubfolder" should not exist
  Scenario: Moving a folder out of a shared folder as the sharee and as the sharer
    Given using new DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created the following folders
      | path                     |
      | /testshare               |
      | /testshare/testsubfolder |
    And user "Brian" has uploaded file with content "test data" to "/testshare/testsubfolder/testfile.txt"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | change    |
      | shareWith   | Alice     |
    And user "Alice" has accepted share "/testshare" offered by user "Brian"
    When user "Brian" moves folder "/testshare/testsubfolder" to "/testsubfolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/testsubfolder/testfile.txt" for user "Brian" should be "test data"
    And as "Alice" folder "/testshare/testsubfolder" should not exist
    And as "Brian" folder "/testshare/testsubfolder" should not exist

  Scenario: Moving a folder out of a shared folder as the sharee and as the sharer
    Given using new DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created the following folders
      | path                     |
      | /testshare               |
      | /testshare/testsubfolder |
    And user "Brian" has uploaded file with content "test data" to "/testshare/testsubfolder/testfile.txt"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | change    |
      | shareWith   | Alice     |
    And user "Alice" has accepted share "/testshare" offered by user "Brian"
    When user "Brian" moves folder "/testshare/testsubfolder" to "/testsubfolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/testsubfolder/testfile.txt" for user "Brian" should be "test data"
    And as "Alice" folder "/testshare/testsubfolder" should not exist
    And as "Brian" folder "/testshare/testsubfolder" should not exist

  Scenario: Moving a folder out of a shared folder as the sharee and as the sharer
    Given using new DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created the following folders
      | path                     |
      | /testshare               |
      | /testshare/testsubfolder |
    And user "Brian" has uploaded file with content "test data" to "/testshare/testsubfolder/testfile.txt"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | change    |
      | shareWith   | Alice     |
    And user "Alice" has accepted share "/testshare" offered by user "Brian"
    When user "Brian" moves folder "/testshare/testsubfolder" to "/testsubfolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/testsubfolder/testfile.txt" for user "Brian" should be "test data"
    And as "Alice" folder "/testshare/testsubfolder" should not exist
    And as "Brian" folder "/testshare/testsubfolder" should not exist

  Scenario: Moving a folder out of a shared folder as the sharee and as the sharer
    Given using new DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created the following folders
      | path                     |
      | /testshare               |
      | /testshare/testsubfolder |
    And user "Brian" has uploaded file with content "test data" to "/testshare/testsubfolder/testfile.txt"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | change    |
      | shareWith   | Alice     |
    And user "Alice" has accepted share "/testshare" offered by user "Brian"
    When user "Brian" moves folder "/testshare/testsubfolder" to "/testsubfolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/testsubfolder/testfile.txt" for user "Brian" should be "test data"
    And as "Alice" folder "/testshare/testsubfolder" should not exist
    And as "Brian" folder "/testshare/testsubfolder" should not exist

  Scenario: Moving a folder out of a shared folder as the sharee and as the sharer
    Given using new DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created the following folders
      | path                     |
      | /testshare               |
      | /testshare/testsubfolder |
    And user "Brian" has uploaded file with content "test data" to "/testshare/testsubfolder/testfile.txt"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | change    |
      | shareWith   | Alice     |
    And user "Alice" has accepted share "/testshare" offered by user "Brian"
    When user "Brian" moves folder "/testshare/testsubfolder" to "/testsubfolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/testsubfolder/testfile.txt" for user "Brian" should be "test data"
    And as "Alice" folder "/testshare/testsubfolder" should not exist
    And as "Brian" folder "/testshare/testsubfolder" should not exist

  Scenario: Moving a folder out of a shared folder as the sharee and as the sharer
    Given using new DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created the following folders
      | path                     |
      | /testshare               |
      | /testshare/testsubfolder |
    And user "Brian" has uploaded file with content "test data" to "/testshare/testsubfolder/testfile.txt"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | change    |
      | shareWith   | Alice     |
    And user "Alice" has accepted share "/testshare" offered by user "Brian"
    When user "Brian" moves folder "/testshare/testsubfolder" to "/testsubfolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/testsubfolder/testfile.txt" for user "Brian" should be "test data"
    And as "Alice" folder "/testshare/testsubfolder" should not exist
    And as "Brian" folder "/testshare/testsubfolder" should not exist

  Scenario: Moving a folder out of a shared folder as the sharee and as the sharer
    Given using new DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created the following folders
      | path                     |
      | /testshare               |
      | /testshare/testsubfolder |
    And user "Brian" has uploaded file with content "test data" to "/testshare/testsubfolder/testfile.txt"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | change    |
      | shareWith   | Alice     |
    And user "Alice" has accepted share "/testshare" offered by user "Brian"
    When user "Brian" moves folder "/testshare/testsubfolder" to "/testsubfolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/testsubfolder/testfile.txt" for user "Brian" should be "test data"
    And as "Alice" folder "/testshare/testsubfolder" should not exist
    And as "Brian" folder "/testshare/testsubfolder" should not exist

  Scenario: Moving a folder out of a shared folder as the sharee and as the sharer
    Given using new DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created the following folders
      | path                     |
      | /testshare               |
      | /testshare/testsubfolder |
    And user "Brian" has uploaded file with content "test data" to "/testshare/testsubfolder/testfile.txt"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | change    |
      | shareWith   | Alice     |
    And user "Alice" has accepted share "/testshare" offered by user "Brian"
    When user "Brian" moves folder "/testshare/testsubfolder" to "/testsubfolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/testsubfolder/testfile.txt" for user "Brian" should be "test data"
    And as "Alice" folder "/testshare/testsubfolder" should not exist
    And as "Brian" folder "/testshare/testsubfolder" should not exist

  Scenario: Moving a folder out of a shared folder as the sharee and as the sharer
    Given using new DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created the following folders
      | path                     |
      | /testshare               |
      | /testshare/testsubfolder |
    And user "Brian" has uploaded file with content "test data" to "/testshare/testsubfolder/testfile.txt"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | change    |
      | shareWith   | Alice     |
    And user "Alice" has accepted share "/testshare" offered by user "Brian"
    When user "Brian" moves folder "/testshare/testsubfolder" to "/testsubfolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/testsubfolder/testfile.txt" for user "Brian" should be "test data"
    And as "Alice" folder "/testshare/testsubfolder" should not exist
    And as "Brian" folder "/testshare/testsubfolder" should not exist

  Scenario: Moving a folder out of a shared folder as the sharee and as the sharer
    Given using new DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created the following folders
      | path                     |
      | /testshare               |
      | /testshare/testsubfolder |
    And user "Brian" has uploaded file with content "test data" to "/testshare/testsubfolder/testfile.txt"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | change    |
      | shareWith   | Alice     |
    And user "Alice" has accepted share "/testshare" offered by user "Brian"
    When user "Brian" moves folder "/testshare/testsubfolder" to "/testsubfolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/testsubfolder/testfile.txt" for user "Brian" should be "test data"
    And as "Alice" folder "/testshare/testsubfolder" should not exist
    And as "Brian" folder "/testshare/testsubfolder" should not exist

  Scenario: Moving a folder out of a shared folder as the sharee and as the sharer
    Given using new DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created the following folders
      | path                     |
      | /testshare               |
      | /testshare/testsubfolder |
    And user "Brian" has uploaded file with content "test data" to "/testshare/testsubfolder/testfile.txt"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | change    |
      | shareWith   | Alice     |
    And user "Alice" has accepted share "/testshare" offered by user "Brian"
    When user "Brian" moves folder "/testshare/testsubfolder" to "/testsubfolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/testsubfolder/testfile.txt" for user "Brian" should be "test data"
    And as "Alice" folder "/testshare/testsubfolder" should not exist
    And as "Brian" folder "/testshare/testsubfolder" should not exist

  Scenario: Moving a folder out of a shared folder as the sharee and as the sharer
    Given using new DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created the following folders
      | path                     |
      | /testshare               |
      | /testshare/testsubfolder |
    And user "Brian" has uploaded file with content "test data" to "/testshare/testsubfolder/testfile.txt"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | change    |
      | shareWith   | Alice     |
    And user "Alice" has accepted share "/testshare" offered by user "Brian"
    When user "Brian" moves folder "/testshare/testsubfolder" to "/testsubfolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/testsubfolder/testfile.txt" for user "Brian" should be "test data"
    And as "Alice" folder "/testshare/testsubfolder" should not exist
    And as "Brian" folder "/testshare/testsubfolder" should not exist
