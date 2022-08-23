@api @preview-extension-required
Feature: previews of files downloaded through the webdav API

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files

    @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
    Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload one" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" has uploaded file with content "updated file one" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file one"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Alice" has uploaded file with content "updated file two" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file two"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload one" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" has uploaded file with content "updated file one" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file one"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Alice" has uploaded file with content "updated file two" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file two"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload one" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" has uploaded file with content "updated file one" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file one"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Alice" has uploaded file with content "updated file two" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file two"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload one" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" has uploaded file with content "updated file one" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file one"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Alice" has uploaded file with content "updated file two" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file two"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload one" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" has uploaded file with content "updated file one" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file one"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Alice" has uploaded file with content "updated file two" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file two"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload one" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" has uploaded file with content "updated file one" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file one"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Alice" has uploaded file with content "updated file two" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file two"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload one" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" has uploaded file with content "updated file one" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file one"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Alice" has uploaded file with content "updated file two" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file two"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload one" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" has uploaded file with content "updated file one" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file one"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Alice" has uploaded file with content "updated file two" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file two"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload one" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" has uploaded file with content "updated file one" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file one"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Alice" has uploaded file with content "updated file two" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file two"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload one" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" has uploaded file with content "updated file one" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file one"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Alice" has uploaded file with content "updated file two" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file two"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload one" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" has uploaded file with content "updated file one" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file one"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Alice" has uploaded file with content "updated file two" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file two"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload one" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" has uploaded file with content "updated file one" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file one"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Alice" has uploaded file with content "updated file two" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file two"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed


  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload one" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" has uploaded file with content "updated file one" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file one"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Alice" has uploaded file with content "updated file two" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file two"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed


  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload one" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" has uploaded file with content "updated file one" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file one"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Alice" has uploaded file with content "updated file two" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file two"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed


  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload one" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" has uploaded file with content "updated file one" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file one"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Alice" has uploaded file with content "updated file two" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file two"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload one" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" has uploaded file with content "updated file one" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file one"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Alice" has uploaded file with content "updated file two" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file two"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload one" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" has uploaded file with content "updated file one" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file one"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Alice" has uploaded file with content "updated file two" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file two"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload one" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" has uploaded file with content "updated file one" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file one"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Alice" has uploaded file with content "updated file two" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file two"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload one" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" has uploaded file with content "updated file one" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file one"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Alice" has uploaded file with content "updated file two" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file two"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload one" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" has uploaded file with content "updated file one" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file one"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Alice" has uploaded file with content "updated file two" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file two"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload one" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" has uploaded file with content "updated file one" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file one"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Alice" has uploaded file with content "updated file two" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file two"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload one" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" has uploaded file with content "updated file one" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file one"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Alice" has uploaded file with content "updated file two" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file two"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload one" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" has uploaded file with content "updated file one" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file one"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Alice" has uploaded file with content "updated file two" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file two"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload one" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" has uploaded file with content "updated file one" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file one"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Alice" has uploaded file with content "updated file two" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file two"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload one" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" has uploaded file with content "updated file one" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file one"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Alice" has uploaded file with content "updated file two" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file two"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload one" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" has uploaded file with content "updated file one" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file one"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Alice" has uploaded file with content "updated file two" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file two"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload one" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" has uploaded file with content "updated file one" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file one"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Alice" has uploaded file with content "updated file two" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file two"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload one" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" has uploaded file with content "updated file one" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file one"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Alice" has uploaded file with content "updated file two" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file two"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload one" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" has uploaded file with content "updated file one" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file one"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Alice" has uploaded file with content "updated file two" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file two"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload one" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" has uploaded file with content "updated file one" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file one"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Alice" has uploaded file with content "updated file two" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file two"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed


  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload one" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" has uploaded file with content "updated file one" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file one"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Alice" has uploaded file with content "updated file two" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file two"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed


  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload one" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" has uploaded file with content "updated file one" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file one"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Alice" has uploaded file with content "updated file two" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file two"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed


  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload one" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" has uploaded file with content "updated file one" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file one"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Alice" has uploaded file with content "updated file two" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file two"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload one" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" has uploaded file with content "updated file one" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file one"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Alice" has uploaded file with content "updated file two" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file two"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload one" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" has uploaded file with content "updated file one" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file one"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Alice" has uploaded file with content "updated file two" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file two"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload one" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" has uploaded file with content "updated file one" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file one"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Alice" has uploaded file with content "updated file two" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file two"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload one" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" has uploaded file with content "updated file one" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file one"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Alice" has uploaded file with content "updated file two" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file two"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload one" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" has uploaded file with content "updated file one" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file one"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Alice" has uploaded file with content "updated file two" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file two"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload one" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" has uploaded file with content "updated file one" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file one"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Alice" has uploaded file with content "updated file two" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file two"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload one" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" has uploaded file with content "updated file one" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file one"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Alice" has uploaded file with content "updated file two" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file two"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload one" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" has uploaded file with content "updated file one" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file one"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Alice" has uploaded file with content "updated file two" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file two"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload one" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" has uploaded file with content "updated file one" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file one"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Alice" has uploaded file with content "updated file two" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file two"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload one" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" has uploaded file with content "updated file one" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file one"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Alice" has uploaded file with content "updated file two" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file two"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload one" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" has uploaded file with content "updated file one" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file one"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Alice" has uploaded file with content "updated file two" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file two"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload one" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" has uploaded file with content "updated file one" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file one"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Alice" has uploaded file with content "updated file two" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file two"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload one" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" has uploaded file with content "updated file one" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file one"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Alice" has uploaded file with content "updated file two" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file two"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload one" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" has uploaded file with content "updated file one" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file one"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Alice" has uploaded file with content "updated file two" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file two"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload one" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" has uploaded file with content "updated file one" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file one"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Alice" has uploaded file with content "updated file two" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file two"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed


  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload one" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" has uploaded file with content "updated file one" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file one"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Alice" has uploaded file with content "updated file two" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file two"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed


  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload one" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" has uploaded file with content "updated file one" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file one"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Alice" has uploaded file with content "updated file two" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file two"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed


  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload one" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" has uploaded file with content "updated file one" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file one"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Alice" has uploaded file with content "updated file two" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file two"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload one" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" has uploaded file with content "updated file one" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file one"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Alice" has uploaded file with content "updated file two" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file two"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload one" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" has uploaded file with content "updated file one" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file one"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Alice" has uploaded file with content "updated file two" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file two"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload one" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" has uploaded file with content "updated file one" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file one"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Alice" has uploaded file with content "updated file two" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file two"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload one" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" has uploaded file with content "updated file one" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file one"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Alice" has uploaded file with content "updated file two" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file two"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload one" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" has uploaded file with content "updated file one" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file one"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Alice" has uploaded file with content "updated file two" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file two"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload one" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" has uploaded file with content "updated file one" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file one"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Alice" has uploaded file with content "updated file two" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file two"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload one" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" has uploaded file with content "updated file one" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file one"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Alice" has uploaded file with content "updated file two" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file two"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload one" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" has uploaded file with content "updated file one" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file one"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Alice" has uploaded file with content "updated file two" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file two"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload one" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" has uploaded file with content "updated file one" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file one"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Alice" has uploaded file with content "updated file two" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file two"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload one" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" has uploaded file with content "updated file one" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file one"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Alice" has uploaded file with content "updated file two" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file two"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload one" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" has uploaded file with content "updated file one" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file one"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Alice" has uploaded file with content "updated file two" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file two"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload one" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" has uploaded file with content "updated file one" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file one"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Alice" has uploaded file with content "updated file two" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file two"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload one" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" has uploaded file with content "updated file one" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file one"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Alice" has uploaded file with content "updated file two" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file two"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload one" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" has uploaded file with content "updated file one" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file one"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Alice" has uploaded file with content "updated file two" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file two"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload one" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" has uploaded file with content "updated file one" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file one"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Alice" has uploaded file with content "updated file two" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file two"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed


  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload one" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" has uploaded file with content "updated file one" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file one"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Alice" has uploaded file with content "updated file two" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file two"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed


  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload one" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" has uploaded file with content "updated file one" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file one"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Alice" has uploaded file with content "updated file two" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file two"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed


  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload one" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" has uploaded file with content "updated file one" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file one"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Alice" has uploaded file with content "updated file two" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file two"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload one" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" has uploaded file with content "updated file one" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file one"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Alice" has uploaded file with content "updated file two" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file two"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload one" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" has uploaded file with content "updated file one" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file one"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Alice" has uploaded file with content "updated file two" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file two"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: updates to a group shared file should change the preview for both sharees and sharers
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "file to upload one" to "/FOLDER/lorem.txt"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Carol" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has downloaded the preview of "/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    And user "Carol" has downloaded the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32"
    When user "Alice" has uploaded file with content "updated file one" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file one"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    When user "Alice" has uploaded file with content "updated file two" to "/FOLDER/lorem.txt"
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER/lorem.txt" for user "Alice" should be "updated file two"
    And as user "Alice" the preview of "/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Brian" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed
    And as user "Carol" the preview of "Shares/FOLDER/lorem.txt" with width "32" and height "32" should have been changed