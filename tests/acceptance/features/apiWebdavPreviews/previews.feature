@api @TestAlsoOnExternalUserBackend
Feature: previews of files downloaded thought the webdav API

  Background:
    Given user "user0" has been created with default attributes and without skeleton files

  Scenario Outline: download previews of different sizes
    Given user "user0" has uploaded file "filesForUpload/lorem.txt" to "/parent.txt"
    When user "user0" downloads the preview of "/parent.txt" with width <width> and height <height> using the WebDAV API
    Then the HTTP status code should be "200"
    And the downloaded image should be <width> pixel wide and <height> pixel high
    Examples:
      | width | height |
      | 1     | 1      |
      | 32    | 32     |
      | 1024  | 1024   |
      | 1     | 1024   |
      | 1024  | 1      |

  @issue-37165
  Scenario Outline: download previews with invalid width
    Given user "user0" has uploaded file "filesForUpload/lorem.txt" to "/parent.txt"
    When user "user0" downloads the preview of "/parent.txt" with width "<width>" and height "32" using the WebDAV API
    Then the HTTP status code should be "500"
    #Then the HTTP status code should be "400"
    And the value of the item "/d:error/s:message" in the response should be "Cannot set width of 0 or smaller!"
    And the value of the item "/d:error/s:exception" in the response should be "Exception"
    Examples:
      | width |
      | 0     |
      | -1    |
      | false |
      | true  |
      | A     |
      | %2F   |

  @issue-37165
  Scenario Outline: download previews with invalid height
    Given user "user0" has uploaded file "filesForUpload/lorem.txt" to "/parent.txt"
    When user "user0" downloads the preview of "/parent.txt" with width "32" and height "<height>" using the WebDAV API
    Then the HTTP status code should be "500"
    #Then the HTTP status code should be "400"
    And the value of the item "/d:error/s:message" in the response should be "Cannot set height of 0 or smaller!"
    And the value of the item "/d:error/s:exception" in the response should be "Exception"
    Examples:
      | height |
      | 0      |
      | 0.5    |
      | -1     |
      | 1.5    |
      | false  |
      | true   |
      | A      |
      | %2F    |

  Scenario: download previews of files inside sub-folders
    Given user "user0" has created folder "subfolder"
    And user "user0" has uploaded file "filesForUpload/lorem.txt" to "/subfolder/parent.txt"
    When user "user0" downloads the preview of "/subfolder/parent.txt" with width "32" and height "32" using the WebDAV API
    Then the HTTP status code should be "200"
    And the downloaded image should be "32" pixel wide and "32" pixel high

  Scenario: download previews of different file types

  Scenario: download previews of shared files

  Scenario: download previews of other users files

  Scenario: download previews of folders
    Given user "user0" has created folder "subfolder"
    When user "user0" downloads the preview of "/subfolder/" with width "32" and height "32" using the WebDAV API
    Then the HTTP status code should be "500"
    And the body of the response should be empty

  Scenario: download previews of not-existing files

  Scenario: disable previews

  Scenario: set maximum size of previews
