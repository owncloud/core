@api @issue-ocis-reva-17
Feature: upload file using old chunking
  As a user
  I want to be able to upload "large" files in chunks
  So that the upload can be completed in less elapsed time

  @issue-36115
  Scenario: Upload chunked file asc
    Given using OCS API version "1"
    And using old DAV path
    And user "Alice" has been created with default attributes and without skeleton files
    When user "Alice" uploads the following "3" chunks to "/myChunkedFile.txt" with old chunking and using the WebDAV API
      | number | content |
      | 1      | AAAAA   |
      | 2      | BBBBB   |
      | 3      | CCCCC   |
    Then the HTTP status code should be "201"
    And the following headers should match these regular expressions for user "Alice"
      | ETag | /^[a-f0-9:\.]{1,32}$/ |
#      | ETag | /^"[a-f0-9:\.]{1,32}"$/ |
    And as "Alice" file "/myChunkedFile.txt" should exist
    And the content of file "/myChunkedFile.txt" for user "Alice" should be "AAAAABBBBBCCCCC"


  Scenario: Upload chunked file with old chunking with lengthy filenames
    Given using OCS API version "1"
    And using old DAV path
    And user "Alice" has been created with default attributes and without skeleton files
    And the owncloud log level has been set to debug
    And the owncloud log has been cleared
    When user "Alice" uploads the following chunks to "नेपालि-file-नाम-नेपालि-file-नाम-नेपालि-file-नाम-नेपालि-file-नाम-नेपालि-file-नाम-नेपालि-file-नाम-12345678910.txt" with old chunking and using the WebDAV API
      | number | content                   |
      | 1      | AAAAAAAAAAAAAAAAAAAAAAAAA |
      | 2      | BBBBBBBBBBBBBBBBBBBBBBBBB |
      | 3      | CCCCCCCCCCCCCCCCCCCCCCCCC |
    Then the HTTP status code should be "201"
    And the following headers should match these regular expressions for user "Alice"
      | ETag | /^[a-f0-9:\.]{1,32}$/ |
    And as "Alice" file "नेपालि-file-नाम-नेपालि-file-नाम-नेपालि-file-नाम-नेपालि-file-नाम-नेपालि-file-नाम-नेपालि-file-नाम-12345678910.txt" should exist
    And the content of file "नेपालि-file-नाम-नेपालि-file-नाम-नेपालि-file-नाम-नेपालि-file-नाम-नेपालि-file-नाम-नेपालि-file-नाम-12345678910.txt" for user "Alice" should be "AAAAAAAAAAAAAAAAAAAAAAAAABBBBBBBBBBBBBBBBBBBBBBBBBCCCCCCCCCCCCCCCCCCCCCCCCC"
    And the log file should not contain any log-entries containing these attributes:
      | app |
      | dav |