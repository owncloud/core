@api @skipOnOcV10
Feature: tests of the creation extension see https://tus.io/protocols/resumable-upload.html#creation-with-upload

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files

  Scenario Outline: creating a new upload resource using creation with upload extension
    Given using <dav_version> DAV path
    When user "Alice" creates a new TUS resource with content "uploaded content" on the WebDAV API with these headers:
      | Upload-Length   | 100                             |
      | Tus-Resumable   | 1.0.0                           |
      | Content-Type    | application/offset+octet-stream |
      | Upload-Metadata | filename dGVzdC50eHQ=           |
    Then the HTTP status code should be "201"
    And the following headers should match these regular expressions
      | Tus-Resumable | /1\.0\.0/                       |
      | Location      | /http[s]?:\/\/.*:\d+\/data\/.*/ |
      | Upload-Offset | /\d+/                           |
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: creating a new resource and upload data in multiple bytes using creation with upload extension
    Given using <dav_version> DAV path
    When user "Alice" creates file "textFile.txt" and uploads content "12345" in the same request using the TUS protocol on the WebDAV API
    Then the content of file "/textFile.txt" for user "Alice" should be "12345"
    Examples:
      | dav_version |
      | old         |
      | new         |
