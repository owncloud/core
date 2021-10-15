@api @preview-extension-required
Feature: previews of files downloaded through the webdav API

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files

  Scenario Outline: download previews with invalid width
    Given user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/parent.txt"
    When user "Alice" downloads the preview of "/parent.txt" with width "<width>" and height "32" using the WebDAV API
    Then the HTTP status code should be "400"
    And the value of the item "/d:error/s:message" in the response about user "Alice" should be "Cannot set width of 0 or smaller!"
    And the value of the item "/d:error/s:exception" in the response about user "Alice" should be "Sabre\DAV\Exception\BadRequest"
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
    Given user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/parent.txt"
    When user "Alice" downloads the preview of "/parent.txt" with width "32" and height "<height>" using the WebDAV API
    Then the HTTP status code should be "400"
    And the value of the item "/d:error/s:message" in the response about user "Alice" should be "Cannot set height of 0 or smaller!"
    And the value of the item "/d:error/s:exception" in the response about user "Alice" should be "Sabre\DAV\Exception\BadRequest"
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
    Given user "Alice" has created folder "subfolder"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/subfolder/parent.txt"
    When user "Alice" downloads the preview of "/subfolder/parent.txt" with width "32" and height "32" using the WebDAV API
    Then the HTTP status code should be "200"
    And the downloaded image should be "32" pixels wide and "32" pixels high


  Scenario Outline: download previews of file types that don't support preview
    Given user "Alice" has uploaded file "filesForUpload/<filename>" to "/<newfilename>"
    When user "Alice" downloads the preview of "/<newfilename>" with width "32" and height "32" using the WebDAV API
    Then the HTTP status code should be "404"
    And the value of the item "/d:error/s:exception" in the response about user "Alice" should be "Sabre\DAV\Exception\NotFound"
    Examples:
      | filename     | newfilename |
      | simple.pdf   | test.pdf    |
      | simple.odt   | test.odt    |
      | new-data.zip | test.zip    |


  Scenario Outline: download previews of different image file types
    Given user "Alice" has uploaded file "filesForUpload/<imageName>" to "/<newImageName>"
    When user "Alice" downloads the preview of "/<newImageName>" with width "32" and height "32" using the WebDAV API
    Then the HTTP status code should be "200"
    And the downloaded image should be "32" pixels wide and "32" pixels high
    Examples:
      | imageName      | newImageName  |
      | testavatar.jpg | testimage.jpg |
      | testavatar.png | testimage.png |


  Scenario: download previews of image after renaming it
    Given user "Alice" has uploaded file "filesForUpload/testavatar.jpg" to "/testimage.jpg"
    When user "Alice" moves file "/testimage.jpg" to "/testimage.txt" using the WebDAV API
    And user "Alice" downloads the preview of "/testimage.txt" with width "32" and height "32" using the WebDAV API
    Then the HTTP status code should be "200"
    And the downloaded image should be "32" pixels wide and "32" pixels high

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: download previews of shared files (to shares folder)
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/parent.txt"
    And user "Alice" has shared file "/parent.txt" with user "Brian"
    And user "Brian" has accepted share "/parent.txt" offered by user "Alice"
    When user "Brian" downloads the preview of "/Shares/parent.txt" with width "32" and height "32" using the WebDAV API
    Then the HTTP status code should be "200"
    And the downloaded image should be "32" pixels wide and "32" pixels high

  @notToImplementOnOCIS
  Scenario: download previews of shared files (to root)
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/parent.txt"
    And user "Alice" has shared file "/parent.txt" with user "Brian"
    When user "Brian" downloads the preview of "/parent.txt" with width "32" and height "32" using the WebDAV API
    Then the HTTP status code should be "200"
    And the downloaded image should be "32" pixels wide and "32" pixels high


  Scenario: download previews of other users files
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/parent.txt"
    When user "Brian" downloads the preview of "/parent.txt" of "Alice" with width "32" and height "32" using the WebDAV API
    Then the HTTP status code should be "404"
    And the value of the item "/d:error/s:message" in the response about user "Alice" should be "File not found: parent.txt in '%username%'"
    And the value of the item "/d:error/s:exception" in the response about user "Alice" should be "Sabre\DAV\Exception\NotFound"


  Scenario: download previews of folders
    Given user "Alice" has created folder "subfolder"
    When user "Alice" downloads the preview of "/subfolder/" with width "32" and height "32" using the WebDAV API
    Then the HTTP status code should be "400"
    And the value of the item "/d:error/s:message" in the response about user "Alice" should be "Unsupported file type"
    And the value of the item "/d:error/s:exception" in the response about user "Alice" should be "Sabre\DAV\Exception\BadRequest"


  Scenario: download previews of not-existing files
    When user "Alice" downloads the preview of "/parent.txt" with width "32" and height "32" using the WebDAV API
    Then the HTTP status code should be "404"
    And the value of the item "/d:error/s:message" in the response about user "Alice" should be "File with name parent.txt could not be located"
    And the value of the item "/d:error/s:exception" in the response about user "Alice" should be "Sabre\DAV\Exception\NotFound"


  Scenario: Download file previews when it is disabled by the administrator
    Given the administrator has updated system config key "enable_previews" with value "false" and type "boolean"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/parent.txt"
    When user "Alice" downloads the preview of "/parent.txt" with width "32" and height "32" using the WebDAV API
    Then the HTTP status code should be "404"
    And the value of the item "/d:error/s:exception" in the response about user "Alice" should be "Sabre\DAV\Exception\NotFound"


  Scenario: unset maximum size of previews
    Given user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/parent.txt"
    And the administrator has updated system config key "preview_max_x" with value "null"
    And the administrator has updated system config key "preview_max_y" with value "null"
    When user "Alice" downloads the preview of "/parent.txt" with width "32" and height "32" using the WebDAV API
    Then the HTTP status code should be "404"
    And the value of the item "/d:error/s:exception" in the response about user "Alice" should be "Sabre\DAV\Exception\NotFound"


  Scenario: set maximum size of previews
    Given user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/parent.txt"
    When the administrator updates system config key "preview_max_x" with value "null" using the occ command
    And the administrator updates system config key "preview_max_y" with value "null" using the occ command
    Then the HTTP status code should be "201"
    When user "Alice" downloads the preview of "/parent.txt" with width "null" and height "null" using the WebDAV API
    Then the HTTP status code should be "400"
    And the value of the item "/d:error/s:exception" in the response about user "Alice" should be "Sabre\DAV\Exception\BadRequest"


  Scenario Outline: download previews of different size smaller than the maximum size set
    Given user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/parent.txt"
    And the administrator has updated system config key "preview_max_x" with value "32"
    And the administrator has updated system config key "preview_max_y" with value "32"
    When user "Alice" downloads the preview of "/parent.txt" with width "<width>" and height "<height>" using the WebDAV API
    Then the HTTP status code should be "200"
    And the downloaded image should be "<width>" pixels wide and "<height>" pixels high
    Examples:
      | width | height |
      | 32    | 32     |
      | 12    | 12     |
      | 32    | 12     |
      | 12    | 32     |


  Scenario Outline: download previews of different size larger than the maximum size set
    Given user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/parent.txt"
    And the administrator has updated system config key "preview_max_x" with value "32"
    And the administrator has updated system config key "preview_max_y" with value "32"
    When user "Alice" downloads the preview of "/parent.txt" with width "<width>" and height "<height>" using the WebDAV API
    Then the HTTP status code should be "200"
    And the downloaded image should be "32" pixels wide and "32" pixels high
    Examples:
      | width | height |
      | 64    | 64     |
      | 2048  | 2048   |


  Scenario: preview content changes with the change in file content
    Given user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/parent.txt"
    And user "Alice" has downloaded the preview of "/parent.txt" with width "32" and height "32"
    When user "Alice" uploads file with content "this is a file to upload" to "/parent.txt" using the WebDAV API
    Then as user "Alice" the preview of "/parent.txt" with width "32" and height "32" should have been changed

  @notToImplementOnOCIS @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: when owner updates a shared file, previews for sharee are also updated
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/parent.txt"
    And user "Alice" has shared file "/parent.txt" with user "Brian"
    And user "Brian" has downloaded the preview of "/parent.txt" with width "32" and height "32"
    When user "Alice" uploads file with content "this is a file to upload" to "/parent.txt" using the WebDAV API
    Then as user "Brian" the preview of "/parent.txt" with width "32" and height "32" should have been changed

  @issue-ocis-2538 @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: when owner updates a shared file, previews for sharee are also updated (to shared folder)
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/parent.txt"
    And user "Alice" has shared file "/parent.txt" with user "Brian"
    And user "Brian" has accepted share "/parent.txt" offered by user "Alice"
    And user "Brian" has downloaded the preview of "/Shares/parent.txt" with width "32" and height "32"
    When user "Alice" uploads file with content "this is a file to upload" to "/parent.txt" using the WebDAV API
    Then as user "Brian" the preview of "/Shares/parent.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: it should update the preview content if the file content is updated (content with UTF chars)
    Given user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    When user "Alice" uploads file with content "सिमसिमे पानी" to "/lorem.txt" using the WebDAV API
    And user "Alice" downloads the preview of "/lorem.txt" with width "32" and height "32" using the WebDAV API
    Then the HTTP status code should be "200"
    And the downloaded image should be "32" pixels wide and "32" pixels high
    And the downloaded preview content should match with "सिमसिमे-पानी.png" fixtures preview content

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "/FOLDER/lorem.txt" using the WebDAV API
    Then as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "/FOLDER/lorem.txt" using the WebDAV API
    Then as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: JPEG preview quality can be determined by config
    Given user "Alice" has uploaded file "filesForUpload/testavatar.jpg" to "/testavatar_low.jpg"
    And the administrator has updated system config key "previewJPEGImageDisplayQuality" with value "1"
    And user "Alice" downloads the preview of "/testavatar_low.jpg" with width "32" and height "32" using the WebDAV API
    Then the HTTP status code should be "200"
    And the requested JPEG image should have a quality value of "1"
    Then user "Alice" has uploaded file "filesForUpload/testavatar.jpg" to "/testavatar_high.jpg"
    And the administrator has updated system config key "previewJPEGImageDisplayQuality" with value "100"
    And user "Alice" downloads the preview of "/testavatar_high.jpg" with width "32" and height "32" using the WebDAV API
    Then the HTTP status code should be "200"
    And the requested JPEG image should have a quality value of "100"
