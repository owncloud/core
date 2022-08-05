@api @preview-extension-required
Feature: previews of files downloaded through the webdav API

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "Shares/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "Shares/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "Shares/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "Shares/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "Shares/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "Shares/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "Shares/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "Shares/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "Shares/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "Shares/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "Shares/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "Shares/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "Shares/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "Shares/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "Shares/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "Shares/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "Shares/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "Shares/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "Shares/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "Shares/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "Shares/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "Shares/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "Shares/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "Shares/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "Shares/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "Shares/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "Shares/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "Shares/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "Shares/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "Shares/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "Shares/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "Shares/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "Shares/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "Shares/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "Shares/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "Shares/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "Shares/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "Shares/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "Shares/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "Shares/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "Shares/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "Shares/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "Shares/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "Shares/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "Shares/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "Shares/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "Shares/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "Shares/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "Shares/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "Shares/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "Shares/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "Shares/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "Shares/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "Shares/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "Shares/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "Shares/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "Shares/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "Shares/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "Shares/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "Shares/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "Shares/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "Shares/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "Shares/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "Shares/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "Shares/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "Shares/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "Shares/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "Shares/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "Shares/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "Shares/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "Shares/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Brian" uploads file with content "new uploaded content" to "Shares/FOLDER/lorem.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed