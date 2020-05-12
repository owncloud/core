@api @TestAlsoOnExternalUserBackend
Feature: previews of files downloaded through the webdav API

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files

  @skipOnOcis @issue-ocis-200
  Scenario Outline: download previews of different sizes
    Given user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/parent.txt"
    When user "Alice" downloads the preview of "/parent.txt" with width <width> and height <height> using the WebDAV API
    Then the HTTP status code should be "200"
    And the downloaded image should be <width> pixels wide and <height> pixels high
    Examples:
      | width | height |
      | 1     | 1      |
      | 32    | 32     |
      | 1024  | 1024   |
      | 1     | 1024   |
      | 1024  | 1      |

  @skipOnOcV10.3 @skipOnOcV10.4.0 @skipOnOcis @issue-ocis-188
  Scenario Outline: download previews with invalid width
    Given user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/parent.txt"
    When user "Alice" downloads the preview of "/parent.txt" with width "<width>" and height "32" using the WebDAV API
    Then the HTTP status code should be "400"
    And the value of the item "/d:error/s:message" in the response about user "user0" should be "Cannot set width of 0 or smaller!"
    And the value of the item "/d:error/s:exception" in the response about user "user0" should be "Sabre\DAV\Exception\BadRequest"
    Examples:
      | width |
      | 0     |
      | 0.5   |
      | -1    |
      | false |
      | true  |
      | A     |
      | %2F   |

  @skipOnOcV10 @issue-ocis-188
  #after fixing all issues delete this Scenario and use the one above
  Scenario Outline: download previews with invalid width
    Given user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/parent.txt"
    When user "Alice" downloads the preview of "/parent.txt" with width "<width>" and height "32" using the WebDAV API
    Then the HTTP status code should be "200"
    Examples:
      | width |
      | 0     |
      | 0.5   |
      | -1    |
      | false |
      | true  |
      | A     |
      | %2F   |

  @skipOnOcV10.3 @skipOnOcV10.4.0 @skipOnOcis @issue-ocis-188
  Scenario Outline: download previews with invalid height
    Given user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/parent.txt"
    When user "Alice" downloads the preview of "/parent.txt" with width "32" and height "<height>" using the WebDAV API
    Then the HTTP status code should be "400"
    And the value of the item "/d:error/s:message" in the response about user "user0" should be "Cannot set height of 0 or smaller!"
    And the value of the item "/d:error/s:exception" in the response about user "user0" should be "Sabre\DAV\Exception\BadRequest"
    Examples:
      | height |
      | 0      |
      | 0.5    |
      | -1     |
      | false  |
      | true   |
      | A      |
      | %2F    |

  @skipOnOcV10 @issue-ocis-188
  #after fixing all issues delete this Scenario and use the one above
  Scenario Outline: download previews with invalid height
    Given user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/parent.txt"
    When user "Alice" downloads the preview of "/parent.txt" with width "32" and height "<height>" using the WebDAV API
    Then the HTTP status code should be "200"
    Examples:
      | height |
      | 0      |
      | 0.5    |
      | -1     |
      | false  |
      | true   |
      | A      |
      | %2F    |

  @skipOnOcis @issue-ocis-200
  Scenario: download previews of files inside sub-folders
    Given user "Alice" has created folder "subfolder"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/subfolder/parent.txt"
    When user "Alice" downloads the preview of "/subfolder/parent.txt" with width "32" and height "32" using the WebDAV API
    Then the HTTP status code should be "200"
    And the downloaded image should be "32" pixels wide and "32" pixels high

  @skipOnOcis @issue-ocis-189
  Scenario Outline: download previews of file types that don't support preview
    Given user "Alice" has uploaded file "filesForUpload/<filename>" to "/<newfilename>"
    When user "Alice" downloads the preview of "/<newfilename>" with width "32" and height "32" using the WebDAV API
    Then the HTTP status code should be "404"
    And the value of the item "/d:error/s:exception" in the response about user "user0" should be "Sabre\DAV\Exception\NotFound"
    Examples:
      | filename     | newfilename |
      | simple.pdf   | test.pdf    |
      | simple.odt   | test.odt    |
      | new-data.zip | test.zip    |

  @skipOnOcV10 @issue-ocis-189
  #after fixing all issues delete this Scenario and use the one above
  Scenario Outline: download previews of file types that don't support preview
    Given user "Alice" has uploaded file "filesForUpload/<filename>" to "/<newfilename>"
    When user "Alice" downloads the preview of "/<newfilename>" with width "32" and height "32" using the WebDAV API
    Then the HTTP status code should be "200"
    Examples:
      | filename     | newfilename |
      | simple.pdf   | test.pdf    |
      | simple.odt   | test.odt    |
      | new-data.zip | test.zip    |

  @skipOnOcis @issue-ocis-187
  Scenario Outline: download previews of different image file types
    Given user "Alice" has uploaded file "filesForUpload/<imageName>" to "/<newImageName>"
    When user "Alice" downloads the preview of "/<newImageName>" with width "32" and height "32" using the WebDAV API
    Then the HTTP status code should be "200"
    And the downloaded image should be "32" pixels wide and "32" pixels high
    Examples:
      | imageName      | newImageName  |
      | testavatar.jpg | testimage.jpg |
      | testavatar.png | testimage.png |

  @skipOnOcV10 @issue-ocis-187
  #after fixing all issues delete this Scenario and use the one above
  Scenario Outline: download previews of different image file types
    Given user "Alice" has uploaded file "filesForUpload/<imageName>" to "/<newImageName>"
    When user "Alice" downloads the preview of "/<newImageName>" with width "32" and height "32" using the WebDAV API
    Then the HTTP status code should be "200"
    And the downloaded image should be "1240" pixels wide and "648" pixels high
    Examples:
      | imageName      | newImageName  |
      | testavatar.jpg | testimage.jpg |
      | testavatar.png | testimage.png |

  @skipOnOcis @issue-ocis-187
  Scenario: download previews of image after renaming it
    Given user "Alice" has uploaded file "filesForUpload/testavatar.jpg" to "/testimage.jpg"
    When user "Alice" moves file "/testimage.jpg" to "/testimage.txt" using the WebDAV API
    And user "Alice" downloads the preview of "/testimage.txt" with width "32" and height "32" using the WebDAV API
    Then the HTTP status code should be "200"
    And the downloaded image should be "32" pixels wide and "32" pixels high

  @skipOnOcV10 @issue-ocis-187
  #after fixing all issues delete this Scenario and use the one above
  Scenario: download previews of image after renaming it
    Given user "Alice" has uploaded file "filesForUpload/testavatar.jpg" to "/testimage.jpg"
    When user "Alice" moves file "/testimage.jpg" to "/testimage.txt" using the WebDAV API
    And user "Alice" downloads the preview of "/testimage.txt" with width "32" and height "32" using the WebDAV API
    Then the HTTP status code should be "200"
    And the downloaded image should be "1240" pixels wide and "648" pixels high

  @skipOnOcis @issue-ocis-68
  Scenario: download previews of shared files
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/parent.txt"
    And user "Alice" has shared file "/parent.txt" with user "Brian"
    When user "Brian" downloads the preview of "/parent.txt" with width "32" and height "32" using the WebDAV API
    Then the HTTP status code should be "200"
    And the downloaded image should be "32" pixels wide and "32" pixels high

  @skipOnOcis @issue-ocis-thumbnails-191
  Scenario: download previews of other users files
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/parent.txt"
    When user "Brian" downloads the preview of "/parent.txt" of "Alice" with width "32" and height "32" using the WebDAV API
    Then the HTTP status code should be "404"
    And the value of the item "/d:error/s:message" in the response about user "Alice" should be "File not found: parent.txt in '%username%'"
    And the value of the item "/d:error/s:exception" in the response about user "Alice" should be "Sabre\DAV\Exception\NotFound"

  @skipOnOcV10 @issue-ocis-thumbnails-191
  #after fixing all issues delete this Scenario and use the one above
  Scenario: download previews of other users files
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/parent.txt"
    When user "Brian" downloads the preview of "/parent.txt" of "Alice" with width "32" and height "32" using the WebDAV API
    Then the HTTP status code should be "200"

  @skipOnOcV10.3 @skipOnOcV10.4.0 @skipOnOcis @issue-ocis-190
  Scenario: download previews of folders
    Given user "Alice" has created folder "subfolder"
    When user "Alice" downloads the preview of "/subfolder/" with width "32" and height "32" using the WebDAV API
    Then the HTTP status code should be "400"
    And the value of the item "/d:error/s:message" in the response about user "user0" should be "Unsupported file type"
    And the value of the item "/d:error/s:exception" in the response about user "user0" should be "Sabre\DAV\Exception\BadRequest"

  @skipOnOcV10 @issue-ocis-190
  #after fixing all issues delete this Scenario and use the one above
  Scenario: download previews of folders
    Given user "Alice" has created folder "subfolder"
    When user "Alice" downloads the preview of "/subfolder/" with width "32" and height "32" using the WebDAV API
    Then the HTTP status code should be "501"

  @skipOnOcis
  Scenario: download previews of not-existing files
    When user "Alice" downloads the preview of "/parent.txt" with width "32" and height "32" using the WebDAV API
    Then the HTTP status code should be "404"
    And the value of the item "/d:error/s:message" in the response about user "user0" should be "File with name parent.txt could not be located"
    And the value of the item "/d:error/s:exception" in the response about user "user0" should be "Sabre\DAV\Exception\NotFound"

  @skipOnOcis @issue-ocis-192
  Scenario: Download file previews when it is disabled by the administrator
    Given the administrator has updated system config key "enable_previews" with value "false" and type "boolean"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/parent.txt"
    When user "Alice" downloads the preview of "/parent.txt" with width "32" and height "32" using the WebDAV API
    Then the HTTP status code should be "404"
    And the value of the item "/d:error/s:exception" in the response about user "user0" should be "Sabre\DAV\Exception\NotFound"

  @skipOnOcV10 @issue-ocis-192
  #after fixing all issues delete this Scenario and use the one above
  Scenario: Download file previews when it is disabled by the administrator
    Given the administrator has updated system config key "enable_previews" with value "false" and type "boolean"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/parent.txt"
    When user "Alice" downloads the preview of "/parent.txt" with width "32" and height "32" using the WebDAV API
    Then the HTTP status code should be "200"

  @skipOnOcis @issue-ocis-193
  Scenario: unset maximum size of previews
    Given user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/parent.txt"
    And the administrator has updated system config key "preview_max_x" with value "null"
    And the administrator has updated system config key "preview_max_y" with value "null"
    When user "Alice" downloads the preview of "/parent.txt" with width "32" and height "32" using the WebDAV API
    Then the HTTP status code should be "404"
    And the value of the item "/d:error/s:exception" in the response about user "user0" should be "Sabre\DAV\Exception\NotFound"

  @skipOnOcV10 @issue-ocis-193
  #after fixing all issues delete this Scenario and use the one above
  Scenario: unset maximum size of previews
    Given user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/parent.txt"
    And the administrator has updated system config key "preview_max_x" with value "null"
    And the administrator has updated system config key "preview_max_y" with value "null"
    When user "Alice" downloads the preview of "/parent.txt" with width "32" and height "32" using the WebDAV API
    Then the HTTP status code should be "200"

  @skipOnOcV10.3 @skipOnOcV10.4.0 @skipOnOcis @issue-ocis-193
  Scenario: set maximum size of previews
    Given user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/parent.txt"
    When the administrator updates system config key "preview_max_x" with value "null" using the occ command
    And the administrator updates system config key "preview_max_y" with value "null" using the occ command
    Then the HTTP status code should be "201"
    When user "Alice" downloads the preview of "/parent.txt" with width "null" and height "null" using the WebDAV API
    Then the HTTP status code should be "400"
    And the value of the item "/d:error/s:exception" in the response about user "user0" should be "Sabre\DAV\Exception\BadRequest"

  @skipOnOcV10 @issue-ocis-193
  #after fixing all issues delete this Scenario and use the one above
  Scenario: set maximum size of previews
    Given user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/parent.txt"
    When the administrator updates system config key "preview_max_x" with value "null" using the occ command
    And the administrator updates system config key "preview_max_y" with value "null" using the occ command
    Then the HTTP status code should be "201"
    When user "Alice" downloads the preview of "/parent.txt" with width "null" and height "null" using the WebDAV API
    Then the HTTP status code should be "200"

  @skipOnOcis @issue-ocis-200
  Scenario Outline: download previews of different size smaller than the maximum size set
    Given user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/parent.txt"
    And the administrator has updated system config key "preview_max_x" with value "32"
    And the administrator has updated system config key "preview_max_y" with value "32"
    When user "Alice" downloads the preview of "/parent.txt" with width "<width>" and height "<height>" using the WebDAV API
    Then the HTTP status code should be "<http-code>"
    And the downloaded image should be "<width>" pixels wide and "<height>" pixels high
    Examples:
      | width | height | http-code |
      | 32    | 32     | 200       |
      | 12    | 12     | 200       |
      | 32    | 12     | 200       |
      | 12    | 32     | 200       |

  @skipOnOcis @issue-ocis-200
  Scenario Outline: download previews of different size larger than the maximum size set
    Given user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/parent.txt"
    And the administrator has updated system config key "preview_max_x" with value "32"
    And the administrator has updated system config key "preview_max_y" with value "32"
    When user "Alice" downloads the preview of "/parent.txt" with width "<width>" and height "<height>" using the WebDAV API
    Then the HTTP status code should be "<http-code>"
    And the downloaded image should be "32" pixels wide and "32" pixels high
    Examples:
      | width | height | http-code |
      | 64    | 64     | 200       |
      | 2048  | 2048   | 200       |
