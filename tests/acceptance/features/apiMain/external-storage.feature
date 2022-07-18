@api @local_storage @files_external-app-required @notToImplementOnOCIS
Feature: external-storage

  Background:
    Given using OCS API version "1"
    And using old DAV path

  Scenario: Copy a file into storage
    Given these users have been created with default attributes and small skeleton files:
      | username |
      | Alice    |
    And user "Alice" has created folder "/local_storage/foo1"
    When user "Alice" copies file "/textfile0.txt" to "/local_storage/foo1/textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Alice" file "/local_storage/foo1/textfile0.txt" should exist
    And as "Alice" file "/textfile0.txt" should exist

  Scenario: Copy a file into storage
    Given these users have been created with default attributes and small skeleton files:
      | username |
      | Alice    |
    And user "Alice" has created folder "/local_storage/foo1"
    When user "Alice" copies file "/textfile0.txt" to "/local_storage/foo1/textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Alice" file "/local_storage/foo1/textfile0.txt" should exist
    And as "Alice" file "/textfile0.txt" should exist

  Scenario: Copy a file into storage
    Given these users have been created with default attributes and small skeleton files:
      | username |
      | Alice    |
    And user "Alice" has created folder "/local_storage/foo1"
    When user "Alice" copies file "/textfile0.txt" to "/local_storage/foo1/textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Alice" file "/local_storage/foo1/textfile0.txt" should exist
    And as "Alice" file "/textfile0.txt" should exist

  Scenario: Copy a file into storage
    Given these users have been created with default attributes and small skeleton files:
      | username |
      | Alice    |
    And user "Alice" has created folder "/local_storage/foo1"
    When user "Alice" copies file "/textfile0.txt" to "/local_storage/foo1/textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Alice" file "/local_storage/foo1/textfile0.txt" should exist
    And as "Alice" file "/textfile0.txt" should exist

  Scenario: Copy a file into storage
    Given these users have been created with default attributes and small skeleton files:
      | username |
      | Alice    |
    And user "Alice" has created folder "/local_storage/foo1"
    When user "Alice" copies file "/textfile0.txt" to "/local_storage/foo1/textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Alice" file "/local_storage/foo1/textfile0.txt" should exist
    And as "Alice" file "/textfile0.txt" should exist
