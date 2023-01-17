@api @issue-ocis-reva-17
Feature: upload file using old chunking
  As a user
  I want to be able to upload "large" files in chunks
  So that the upload can be completed in less elapsed time

  Background:
    Given using OCS API version "1"
    And user "Alice" has been created with default attributes and without skeleton files

  @skipOnOcV10 @issue-36115
  Scenario Outline: Upload chunked file asc
    Given using <dav_version> DAV path
    When user "Alice" uploads the following "3" chunks to "/myChunkedFile.txt" with old chunking and using the WebDAV API
      | number | content |
      | 1      | AAAAA   |
      | 2      | BBBBB   |
      | 3      | CCCCC   |
    Then the HTTP status code should be "201"
    And the following headers should match these regular expressions for user "Alice"
      | ETag | /^"[a-f0-9:\.]{1,32}"$/ |
    And as "Alice" file "/myChunkedFile.txt" should exist
    And the content of file "/myChunkedFile.txt" for user "Alice" should be "AAAAABBBBBCCCCC"
    Examples:
      | dav_version |
      | old         |


  Scenario Outline: Upload chunked file desc
    Given using <dav_version> DAV path
    When user "Alice" uploads the following "3" chunks to "/myChunkedFile.txt" with old chunking and using the WebDAV API
      | number | content |
      | 3      | CCCCC   |
      | 2      | BBBBB   |
      | 1      | AAAAA   |
    Then the HTTP status code should be "201"
    And as "Alice" file "/myChunkedFile.txt" should exist
    And the content of file "/myChunkedFile.txt" for user "Alice" should be "AAAAABBBBBCCCCC"
    Examples:
      | dav_version |
      | old         |


  Scenario Outline: Upload chunked file random
    Given using <dav_version> DAV path
    When user "Alice" uploads the following "3" chunks to "/myChunkedFile.txt" with old chunking and using the WebDAV API
      | number | content |
      | 2      | BBBBB   |
      | 3      | CCCCC   |
      | 1      | AAAAA   |
    Then the HTTP status code should be "201"
    And as "Alice" file "/myChunkedFile.txt" should exist
    And the content of file "/myChunkedFile.txt" for user "Alice" should be "AAAAABBBBBCCCCC"
    Examples:
      | dav_version |
      | old         |


  Scenario Outline: Checking file id after a move overwrite using old chunking endpoint
    Given using <dav_version> DAV path
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "textfile0.txt"
    And the owncloud log level has been set to debug
    And the owncloud log has been cleared
    And user "Alice" has copied file "/textfile0.txt" to "/existingFile.txt"
    And user "Alice" has stored id of file "/existingFile.txt"
    When user "Alice" uploads file "filesForUpload/textfile.txt" to "/existingFile.txt" in 3 chunks with old chunking and using the WebDAV API
    Then the HTTP status code should be "201"
    And user "Alice" file "/existingFile.txt" should have the previously stored id
    And the content of file "/existingFile.txt" for user "Alice" should be:
      """
      This is a testfile.

      Cheers.
      """
    And the log file should not contain any log-entries containing these attributes:
      | app |
      | dav |
    Examples:
      | dav_version |
      | old         |

  @smokeTest
  # This smokeTest scenario does ordinary checks for chunked upload,
  # without adjusting the log level. This allows it to run in test environments
  # where the log level has been fixed and cannot be changed.
  Scenario Outline: Chunked upload files with difficult name
    Given using <dav_version> DAV path
    When user "Alice" uploads file "filesForUpload/textfile.txt" to "/<file-name>" in 3 chunks using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Alice" file "/<file-name>" should exist
    And the content of file "/<file-name>" for user "Alice" should be:
      """
      This is a testfile.

      Cheers.
      """
    Examples:
      | dav_version | file-name                       |
      | old         | &#? TIÄFÜ @a#8a=b?c=d ?abc=oc # |
      | old         | 0                               |

  # This scenario does extra checks with the log level set to debug.
  # It does not run in smoke test runs. (see comments in scenario above)
  Scenario Outline: Chunked upload files with difficult name and check the log
    Given using <dav_version> DAV path
    And the owncloud log level has been set to debug
    And the owncloud log has been cleared
    When user "Alice" uploads file "filesForUpload/textfile.txt" to "/<file-name>" in 3 chunks using the WebDAV API
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
      | dav_version | file-name   |
      | old         | file-name   |
      | old         | &#?         |
      | old         | TIÄFÜ       |
      | old         | 0           |
      | old         | @a#8a=b?c=d |
      | old         | ?abc=oc #   |

  @skipOnOcV10 @issue-36115
  Scenario Outline: Upload chunked file with old chunking with lengthy filenames
    Given using <dav_version> DAV path
    Given the owncloud log level has been set to debug
    And the owncloud log has been cleared
    When user "Alice" uploads the following chunks to "नेपालि-file-नाम-नेपालि-file-नाम-नेपालि-file-नाम-नेपालि-file-नाम-नेपालि-file-नाम-नेपालि-file-नाम-12345678910.txt" with old chunking and using the WebDAV API
      | number | content                   |
      | 1      | AAAAAAAAAAAAAAAAAAAAAAAAA |
      | 2      | BBBBBBBBBBBBBBBBBBBBBBBBB |
      | 3      | CCCCCCCCCCCCCCCCCCCCCCCCC |
    Then the HTTP status code should be "201"
    And the following headers should match these regular expressions for user "Alice"
      | ETag | /^"[a-f0-9:\.]{1,32}"$/ |
    And as "Alice" file "नेपालि-file-नाम-नेपालि-file-नाम-नेपालि-file-नाम-नेपालि-file-नाम-नेपालि-file-नाम-नेपालि-file-नाम-12345678910.txt" should exist
    And the content of file "नेपालि-file-नाम-नेपालि-file-नाम-नेपालि-file-नाम-नेपालि-file-नाम-नेपालि-file-नाम-नेपालि-file-नाम-12345678910.txt" for user "Alice" should be "AAAAAAAAAAAAAAAAAAAAAAAAABBBBBBBBBBBBBBBBBBBBBBBBBCCCCCCCCCCCCCCCCCCCCCCCCC"
    And the log file should not contain any log-entries containing these attributes:
      | app |
      | dav |
    Examples:
      | dav_version |
      | old         |
