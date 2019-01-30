@api @TestAlsoOnExternalUserBackend
Feature: upload file using old chunking
  As a user
  I want to be able to upload "large" files in chunks
  So that the upload can be completed in less elapsed time

  Background:
    Given using OCS API version "1"
    And using old DAV path
    And user "user0" has been created with default attributes
    And the owncloud log level has been set to debug
    And the owncloud log has been cleared

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

  Scenario: Checking file id after a move overwrite using old chunking endpoint
    Given user "user0" has copied file "/textfile0.txt" to "/existingFile.txt"
    And user "user0" has stored id of file "/existingFile.txt"
    When user "user0" uploads file "filesForUpload/textfile.txt" to "/existingFile.txt" in 3 chunks with old chunking and using the WebDAV API
    Then user "user0" file "/existingFile.txt" should have the previously stored id
    And the content of file "/existingFile.txt" for user "user0" should be:
      """
      This is a testfile.
      
      Cheers.
      """
    And the log file should not contain any log-entries containing these attributes:
      | app |
      | dav |

  @smokeTest
  Scenario Outline: Chunked upload files with difficult name
    When user "user0" uploads file "filesForUpload/textfile.txt" to "/<file-name>" in 3 chunks using the WebDAV API
    Then as "user0" file "/<file-name>" should exist
    And the content of file "/<file-name>" for user "user0" should be:
      """
      This is a testfile.
      
      Cheers.
      """
    And the log file should not contain any log-entries containing these attributes:
      | app |
      | dav |
    Examples:
      | file-name |
      | &#?       |
      | TIÄFÜ     |
      | 0         |
