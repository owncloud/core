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

  Scenario Outline: download previews with invalid width
    Given user "user0" has uploaded file "filesForUpload/lorem.txt" to "/parent.txt"
    When user "user0" downloads the preview of "/parent.txt" with width "<width>" and height "32" using the WebDAV API
    Then the HTTP status code should be "400"
    And the value of the item "/d:error/s:message" in the response should be "Cannot set width of 0 or smaller!"
    And the value of the item "/d:error/s:exception" in the response should be "Sabre\DAV\Exception\BadRequest"
    Examples:
      | width |
      | 0     |
      | 0.5   |
      | -1    |
      | false |
      | true  |
      | A     |
      | %2F   |

  Scenario Outline: download previews with invalid height
    Given user "user0" has uploaded file "filesForUpload/lorem.txt" to "/parent.txt"
    When user "user0" downloads the preview of "/parent.txt" with width "32" and height "<height>" using the WebDAV API
    Then the HTTP status code should be "400"
    And the value of the item "/d:error/s:message" in the response should be "Cannot set height of 0 or smaller!"
    And the value of the item "/d:error/s:exception" in the response should be "Sabre\DAV\Exception\BadRequest"
    Examples:
      | height |
      | 0      |
      | 0.5    |
      | -1     |
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

  Scenario Outline: download previews of different file types
    Given user "user0" has uploaded file "filesForUpload/<filename>" to "/<newfilename>"
    When user "user0" downloads the preview of "/<newfilename>" with width "32" and height "32" using the WebDAV API
    Then the HTTP status code should be "404"
    And the value of the item "/d:error/s:exception" in the response should be "Sabre\DAV\Exception\NotFound"
    Examples:
      | filename     | newfilename |
      | simple.pdf   | test.pdf    |
      | simple.odt   | test.odt    |
      | new-data.zip | test.zip    |

  Scenario Outline: download previews of different image file types
    Given user "user0" has uploaded file "filesForUpload/<imageName>" to "/<newImageName>"
    When user "user0" downloads the preview of "/<newImageName>" with width "32" and height "32" using the WebDAV API
    Then the HTTP status code should be "200"
    And the downloaded image should be "32" pixel wide and "32" pixel high
    Examples:
      | imageName      | newImageName  |
      | testavatar.jpg | testimage.jpg |
      | testavatar.png | testimage.png |

  Scenario: download previews of image after renaming it
    Given user "user0" has uploaded file "filesForUpload/testavatar.jpg" to "/testimage.jpg"
    When user "user0" moves file "/testimage.jpg" to "/testimage.txt" using the WebDAV API
    And user "user0" downloads the preview of "/testimage.txt" with width "32" and height "32" using the WebDAV API
    Then the HTTP status code should be "200"
    And the downloaded image should be "32" pixel wide and "32" pixel high

  Scenario: download previews of shared files
    Given user "user1" has been created with default attributes and without skeleton files
    And user "user0" has uploaded file "filesForUpload/lorem.txt" to "/parent.txt"
    And user "user0" has shared file "/parent.txt" with user "user1"
    When user "user1" downloads the preview of "/parent.txt" with width "32" and height "32" using the WebDAV API
    Then the HTTP status code should be "200"
    And the downloaded image should be "32" pixel wide and "32" pixel high

  Scenario: download previews of other users files
    Given user "user1" has been created with default attributes and without skeleton files
    And user "user0" has uploaded file "filesForUpload/lorem.txt" to "/parent.txt"
    When user "user1" downloads the preview of "/parent.txt" with width "32" and height "32" using the WebDAV API
    Then the HTTP status code should be "404"
    And the value of the item "/d:error/s:message" in the response should be "File with name parent.txt could not be located"
    And the value of the item "/d:error/s:exception" in the response should be "Sabre\DAV\Exception\NotFound"

  Scenario: download previews of folders
    Given user "user0" has created folder "subfolder"
    When user "user0" downloads the preview of "/subfolder/" with width "32" and height "32" using the WebDAV API
    Then the HTTP status code should be "400"
    And the value of the item "/d:error/s:message" in the response should be "Unsupported file type"
    And the value of the item "/d:error/s:exception" in the response should be "Sabre\DAV\Exception\BadRequest"

  Scenario: download previews of not-existing files
    When user "user0" downloads the preview of "/parent.txt" with width "32" and height "32" using the WebDAV API
    Then the HTTP status code should be "404"
    And the value of the item "/d:error/s:message" in the response should be "File with name parent.txt could not be located"
    And the value of the item "/d:error/s:exception" in the response should be "Sabre\DAV\Exception\NotFound"

  Scenario: disable previews
    Given the administrator has updated system config key "enable_previews" with value "false" and type "boolean"
    And user "user0" has uploaded file "filesForUpload/lorem.txt" to "/parent.txt"
    When user "user0" downloads the preview of "/parent.txt" with width "32" and height "32" using the WebDAV API
    Then the HTTP status code should be "404"
    And the value of the item "/d:error/s:exception" in the response should be "Sabre\DAV\Exception\NotFound"

  Scenario: set maximum size of previews
    Given user "user0" has uploaded file "filesForUpload/lorem.txt" to "/parent.txt"
    When user "user0" downloads the preview of "/parent.txt" with width "null" and height "null" using the WebDAV API
    Then the HTTP status code should be "400"
    And the value of the item "/d:error/s:message" in the response should be "Cannot set width of 0 or smaller!"
    And the value of the item "/d:error/s:exception" in the response should be "Sabre\DAV\Exception\BadRequest"
