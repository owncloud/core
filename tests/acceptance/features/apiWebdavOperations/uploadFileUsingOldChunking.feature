@api @TestAlsoOnExternalUserBackend
Feature: upload file using old chunking
  As a user
  I want to be able to upload "large" files in chunks
  So that the upload can be completed in less elapsed time

  Background:
    Given using OCS API version "1"
    And using old DAV path
    And user "user0" has been created

  Scenario: Upload chunked file asc
    When user "user0" uploads the following "3" chunks to "/myChunkedFile.txt" with old chunking and using the WebDAV API
      | 1 | AAAAA |
      | 2 | BBBBB |
      | 3 | CCCCC |
    Then as "user0" file "/myChunkedFile.txt" should exist
    And the content of file "/myChunkedFile.txt" for user "user0" should be "AAAAABBBBBCCCCC"

  Scenario: Upload chunked file desc
    When user "user0" uploads the following "3" chunks to "/myChunkedFile.txt" with old chunking and using the WebDAV API
      | 3 | CCCCC |
      | 2 | BBBBB |
      | 1 | AAAAA |
    Then as "user0" file "/myChunkedFile.txt" should exist
    And the content of file "/myChunkedFile.txt" for user "user0" should be "AAAAABBBBBCCCCC"

  Scenario: Upload chunked file random
    When user "user0" uploads the following "3" chunks to "/myChunkedFile.txt" with old chunking and using the WebDAV API
      | 2 | BBBBB |
      | 3 | CCCCC |
      | 1 | AAAAA |
    Then as "user0" file "/myChunkedFile.txt" should exist
    And the content of file "/myChunkedFile.txt" for user "user0" should be "AAAAABBBBBCCCCC"

  @smokeTest
  Scenario Outline: Chunked upload files with difficult name
    When user "user0" uploads the following "3" chunks to "/<file-name>" with old chunking and using the WebDAV API
      | 1 | AAAAA |
      | 2 | BBBBB |
      | 3 | CCCCC |
    Then as "user0" file "/<file-name>" should exist
    And the content of file "/<file-name>" for user "user0" should be "AAAAABBBBBCCCCC"
    Examples:
      | file-name |
      | 0         |
      | &#?       |
      | TIÄFÜ     |
