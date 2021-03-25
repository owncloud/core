@notToImplementOnOCIS @api @issue-ocis-reva-17
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
    Then as "Alice" file "/myChunkedFile.txt" should exist
    And the content of file "/myChunkedFile.txt" for user "Alice" should be "AAAAABBBBBCCCCC"
