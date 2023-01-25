@api @issue-ocis-reva-56 @newChunking @issue-ocis-1321
Feature: upload file using new chunking
  As a user
  I want to be able to upload "large" files in chunks
  So that the upload can be completed in less elapsed time

  Background:
    Given using OCS API version "1"
    And using new DAV path
    And user "Alice" has been created with default attributes and without skeleton files


  Scenario: Upload chunked file asc with new chunking
    Given the owncloud log level has been set to debug
    And the owncloud log has been cleared
    When user "Alice" uploads the following chunks to "/myChunkedFile.txt" with new chunking and using the WebDAV API
      | number | content |
      | 1      | AAAAA   |
      | 2      | BBBBB   |
      | 3      | CCCCC   |
    Then the HTTP status code should be "201"
    And the following headers should match these regular expressions for user "Alice"
      | ETag | /^"[a-f0-9:\.]{1,32}"$/ |
    And as "Alice" file "/myChunkedFile.txt" should exist
    And the content of file "/myChunkedFile.txt" for user "Alice" should be "AAAAABBBBBCCCCC"
    And the log file should not contain any log-entries containing these attributes:
      | app |
      | dav |


  Scenario: Upload chunked file desc with new chunking
    Given the owncloud log level has been set to debug
    And the owncloud log has been cleared
    When user "Alice" uploads the following chunks to "/myChunkedFile.txt" with new chunking and using the WebDAV API
      | number | content |
      | 1      | AAAAA   |
      | 2      | BBBBB   |
      | 3      | CCCCC   |
    Then the HTTP status code should be "201"
    And as "Alice" file "/myChunkedFile.txt" should exist
    And the content of file "/myChunkedFile.txt" for user "Alice" should be "AAAAABBBBBCCCCC"
    And the log file should not contain any log-entries containing these attributes:
      | app |
      | dav |


  Scenario: Upload chunked file random with new chunking
    Given the owncloud log level has been set to debug
    And the owncloud log has been cleared
    When user "Alice" uploads the following chunks to "/myChunkedFile.txt" with new chunking and using the WebDAV API
      | number | content |
      | 1      | AAAAA   |
      | 2      | BBBBB   |
      | 3      | CCCCC   |
    Then the HTTP status code should be "201"
    And as "Alice" file "/myChunkedFile.txt" should exist
    And the content of file "/myChunkedFile.txt" for user "Alice" should be "AAAAABBBBBCCCCC"
    And the log file should not contain any log-entries containing these attributes:
      | app |
      | dav |


  Scenario: Checking file id after a move overwrite using new chunking endpoint
    Given user "Alice" has uploaded file "filesForUpload/textfile.txt" to "textfile0.txt"
    And the owncloud log level has been set to debug
    And the owncloud log has been cleared
    And user "Alice" has copied file "/textfile0.txt" to "/existingFile.txt"
    And user "Alice" has stored id of file "/existingFile.txt"
    When user "Alice" uploads file "filesForUpload/textfile.txt" to "/existingFile.txt" in 3 chunks with new chunking and using the WebDAV API
    Then the HTTP status code should be "204"
    And user "Alice" file "/existingFile.txt" should have the previously stored id
    And the content of file "/existingFile.txt" for user "Alice" should be:
      """
      This is a testfile.

      Cheers.
      """
    And the log file should not contain any log-entries containing these attributes:
      | app |
      | dav |


  Scenario: New chunked upload MKDIR using old DAV path should fail
    Given using old DAV path
    When user "Alice" creates a new chunking upload with id "chunking-42" using the WebDAV API
    Then the HTTP status code should be "409"


  Scenario: New chunked upload PUT using old DAV path should fail
    Given user "Alice" has created a new chunking upload with id "chunking-42"
    When using old DAV path
    And user "Alice" uploads new chunk file "1" with "AAAAA" to id "chunking-42" using the WebDAV API
    Then the HTTP status code should be "409"


  Scenario: New chunked upload MOVE using old DAV path should fail
    Given user "Alice" has created a new chunking upload with id "chunking-42"
    And user "Alice" has uploaded new chunk file "2" with "BBBBB" to id "chunking-42"
    And user "Alice" has uploaded new chunk file "3" with "CCCCC" to id "chunking-42"
    And user "Alice" has uploaded new chunk file "1" with "AAAAA" to id "chunking-42"
    When using old DAV path
    And user "Alice" moves new chunk file with id "chunking-42" to "/myChunkedFile.txt" using the WebDAV API
    Then the HTTP status code should be "404"


  Scenario: Upload to new DAV path using old way should fail
    When user "Alice" uploads chunk file "1" of "3" with "AAAAA" to "/myChunkedFile.txt" using the WebDAV API
    Then the HTTP status code should be "503"


  Scenario: Upload file via new chunking endpoint with wrong size header
    Given user "Alice" has created a new chunking upload with id "chunking-42"
    And user "Alice" has uploaded new chunk file "1" with "AAAAA" to id "chunking-42"
    And user "Alice" has uploaded new chunk file "2" with "BBBBB" to id "chunking-42"
    And user "Alice" has uploaded new chunk file "3" with "CCCCC" to id "chunking-42"
    When user "Alice" moves new chunk file with id "chunking-42" to "/myChunkedFile.txt" with size 5 using the WebDAV API
    Then the HTTP status code should be "400"


  Scenario: Upload file via new chunking endpoint with correct size header
    Given the owncloud log level has been set to debug
    And the owncloud log has been cleared
    And user "Alice" has created a new chunking upload with id "chunking-42"
    And user "Alice" has uploaded new chunk file "1" with "AAAAA" to id "chunking-42"
    And user "Alice" has uploaded new chunk file "2" with "BBBBB" to id "chunking-42"
    And user "Alice" has uploaded new chunk file "3" with "CCCCC" to id "chunking-42"
    When user "Alice" moves new chunk file with id "chunking-42" to "/myChunkedFile.txt" with size 15 using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Alice" file "/myChunkedFile.txt" should exist
    And the content of file "/myChunkedFile.txt" for user "Alice" should be "AAAAABBBBBCCCCC"
    And the log file should not contain any log-entries containing these attributes:
      | app |
      | dav |

  @smokeTest
  # This smokeTest scenario does ordinary checks for chunked upload,
  # without adjusting the log level. This allows it to run in test environments
  # where the log level has been fixed and cannot be changed.
  Scenario Outline: Upload files with difficult names using new chunking
    When user "Alice" creates a new chunking upload with id "chunking-42" using the WebDAV API
    And user "Alice" uploads new chunk file "1" with "AAAAA" to id "chunking-42" using the WebDAV API
    And user "Alice" uploads new chunk file "2" with "BBBBB" to id "chunking-42" using the WebDAV API
    And user "Alice" uploads new chunk file "3" with "CCCCC" to id "chunking-42" using the WebDAV API
    And user "Alice" moves new chunk file with id "chunking-42" to "/<file-name>" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Alice" file "/<file-name>" should exist
    And the content of file "/<file-name>" for user "Alice" should be "AAAAABBBBBCCCCC"
    Examples:
      | file-name |
      | 0         |
      | &#?       |
      | TIÄFÜ     |


  # This scenario does extra checks with the log level set to debug.
  # It does not run in smoke test runs. (see comments in scenario above)
  Scenario Outline: Upload files with difficult names using new chunking and check the log
    Given the owncloud log level has been set to debug
    And the owncloud log has been cleared
    When user "Alice" uploads file "filesForUpload/textfile.txt" to "/<file-name>" in 3 chunks with new chunking and using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Alice" file "/<file-name>" should exist
    And the content of file "/<file-name>" for user "Alice" should be:
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


  Scenario: Upload chunked file with new chunking with lengthy filenames
    Given the owncloud log level has been set to debug
    And the owncloud log has been cleared
    When user "Alice" uploads the following chunks to "हजार नेपालि-file-नाम-नेपालि-file-नाम-नेपालि-file-नाम-नेपालि-file-नाम-नेपालि-file-नाम-नेपालि-file-नाम-012345.txt" with new chunking and using the WebDAV API
      | number | content                   |
      | 1      | AAAAAAAAAAAAAAAAAAAAAAAAA |
      | 2      | BBBBBBBBBBBBBBBBBBBBBBBBB |
      | 3      | CCCCCCCCCCCCCCCCCCCCCCCCC |
    Then the HTTP status code should be "201"
    And the following headers should match these regular expressions for user "Alice"
      | ETag | /^"[a-f0-9:\.]{1,32}"$/ |
    And as "Alice" file "हजार नेपालि-file-नाम-नेपालि-file-नाम-नेपालि-file-नाम-नेपालि-file-नाम-नेपालि-file-नाम-नेपालि-file-नाम-012345.txt" should exist
    And the content of file "हजार नेपालि-file-नाम-नेपालि-file-नाम-नेपालि-file-नाम-नेपालि-file-नाम-नेपालि-file-नाम-नेपालि-file-नाम-012345.txt" for user "Alice" should be "AAAAAAAAAAAAAAAAAAAAAAAAABBBBBBBBBBBBBBBBBBBBBBBBBCCCCCCCCCCCCCCCCCCCCCCCCC"
    And the log file should not contain any log-entries containing these attributes:
      | app |
      | dav |
