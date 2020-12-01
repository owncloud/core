@api @skipOnOcV10
Feature: low level tests of the creation extension see https://tus.io/protocols/resumable-upload.html#creation

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files

  Scenario Outline: creating a new upload resource
    Given using <dav_version> DAV path
    When user "Alice" creates a new TUS resource on the WebDAV API with these headers:
      | Upload-Length   | 100                                           |
      | Upload-Metadata | filename d29ybGRfZG9taW5hdGlvbl9wbGFuLnBkZg== |
      | Tus-Resumable   | 1.0.0                                         |
    Then the HTTP status code should be "201"
    And the following headers should match these regular expressions
      | Tus-Resumable | /1\.0\.0/                             |
      | Location      | /%base_url%\/[a-zA-Z0-9_\-\.]{1,300}/ |
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: creating a new upload resource without upload length
    Given using <dav_version> DAV path
    When user "Alice" creates a new TUS resource on the WebDAV API with these headers:
      | Tus-Resumable   | 1.0.0                                         |
      | Upload-Metadata | filename d29ybGRfZG9taW5hdGlvbl9wbGFuLnBkZg== |
    Then the HTTP status code should be "412"
    And the following headers should not be set
      | header   |
      | Location |
    Examples:
      | dav_version |
      | old         |
      | new         |
