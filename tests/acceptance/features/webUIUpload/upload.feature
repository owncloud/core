@webUI @insulated @disablePreviews
Feature: File Upload

  As a user
  I would like to be able to upload files via the WebUI
  So that I can store files in ownCloud

  Background:
    Given user "user1" has been created with default attributes and without skeleton files

  @smokeTest
  Scenario: simple upload of a file that does not exist before
    Given user "user1" has logged in using the webUI
    When the user uploads file "new-lorem.txt" using the webUI
    Then no notification should be displayed on the webUI
    And file "new-lorem.txt" should be listed on the webUI
    And the content of "new-lorem.txt" should be the same as the local "new-lorem.txt"

  @smokeTest
  Scenario: chunking upload
    Given a file with the size of "30000000" bytes and the name "big-video.mp4" has been created locally
    And user "user1" has logged in using the webUI
    When the user uploads file "big-video.mp4" using the webUI
    Then no notification should be displayed on the webUI
    And file "big-video.mp4" should be listed on the webUI
    And the content of "big-video.mp4" should be the same as the local "big-video.mp4"

  @skipOnFIREFOX
  Scenario: conflict with a chunked file
    Given a file with the size of "30000000" bytes and the name "big-video.mp4" has been created locally
    And user "user1" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And user "user1" has logged in using the webUI
    When the user renames file "lorem.txt" to "big-video.mp4" using the webUI
    And the user uploads overwriting file "big-video.mp4" using the webUI and retries if the file is locked
    Then file "big-video.mp4" should be listed on the webUI
    And the content of "big-video.mp4" should be the same as the local "big-video.mp4"

  Scenario: upload a new file into a sub folder
    Given user "user1" has created folder "/simple-folder"
    And user "user1" has logged in using the webUI
    When the user opens folder "simple-folder" using the webUI
    And the user uploads file "new-lorem.txt" using the webUI
    Then no notification should be displayed on the webUI
    And file "new-lorem.txt" should be listed on the webUI
    And the content of "new-lorem.txt" should be the same as the local "new-lorem.txt"

  @smokeTest
  Scenario: overwrite an existing file
    Given user "user1" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And user "user1" has logged in using the webUI
    When the user uploads overwriting file "lorem.txt" using the webUI and retries if the file is locked
    Then no dialog should be displayed on the webUI
    And file "lorem.txt" should be listed on the webUI
    And the content of "lorem.txt" should be the same as the local "lorem.txt"
    But file "lorem (2).txt" should not be listed on the webUI

  @smokeTest
  Scenario: keep new and existing file
    Given user "user1" has uploaded file with content "original content" to "/lorem.txt"
    And user "user1" has logged in using the webUI
    When the user uploads file "lorem.txt" using the webUI
    And the user chooses to keep the new files in the upload dialog
    And the user chooses to keep the existing files in the upload dialog
    And the user chooses "Continue" in the upload dialog
    Then no dialog should be displayed on the webUI
    And no notification should be displayed on the webUI
    And file "lorem.txt" should be listed on the webUI
    And the content of file "lorem.txt" for user "user1" should be "original content"
    And file "lorem (2).txt" should be listed on the webUI
    And the content of "lorem (2).txt" should be the same as the local "lorem.txt"

  Scenario: cancel conflict dialog
    Given user "user1" has uploaded file with content "original content" to "/lorem.txt"
    And user "user1" has logged in using the webUI
    When the user uploads file "lorem.txt" using the webUI
    And the user chooses "Cancel" in the upload dialog
    Then no dialog should be displayed on the webUI
    And no notification should be displayed on the webUI
    And file "lorem.txt" should be listed on the webUI
    And the content of file "lorem.txt" for user "user1" should be "original content"
    And file "lorem (2).txt" should not be listed on the webUI

  Scenario: overwrite an existing file in a sub-folder
    Given user "user1" has created folder "/simple-folder"
    And user "user1" has uploaded file with content "original content" to "/simple-folder/lorem.txt"
    And user "user1" has logged in using the webUI
    When the user opens folder "simple-folder" using the webUI
    And the user uploads overwriting file "lorem.txt" using the webUI and retries if the file is locked
    Then file "lorem.txt" should be listed on the webUI
    And the content of "lorem.txt" should be the same as the local "lorem.txt"

  Scenario: keep new and existing file in a sub-folder
    Given user "user1" has created folder "/simple-folder"
    And user "user1" has uploaded file with content "original content" to "/simple-folder/lorem.txt"
    And user "user1" has uploaded file with content "original content" to "/lorem.txt"
    And user "user1" has logged in using the webUI
    When the user opens folder "simple-folder" using the webUI
    And the user uploads file "lorem.txt" using the webUI
    And the user chooses to keep the new files in the upload dialog
    And the user chooses to keep the existing files in the upload dialog
    And the user chooses "Continue" in the upload dialog
    Then no dialog should be displayed on the webUI
    And no notification should be displayed on the webUI
    And file "lorem.txt" should be listed on the webUI
    And the content of file "lorem.txt" for user "user1" should be "original content"
    And file "lorem (2).txt" should be listed on the webUI
    And the content of "lorem (2).txt" should be the same as the local "lorem.txt"

  Scenario: upload a file into a public share
    Given user "user1" has created folder "/simple-folder"
    And user "user1" has logged in using the webUI
    And the user has created a new public link for folder "simple-folder" using the webUI with
      | permission | read-write |
    And the public accesses the last created public link using the webUI
    And the user uploads file "new-lorem.txt" using the webUI
    Then file "new-lorem.txt" should be listed on the webUI
    And the content of "simple-folder/new-lorem.txt" should be the same as the local "new-lorem.txt"

  Scenario: upload overwriting a file into a public share
    Given user "user1" has created folder "/simple-folder"
    And user "user1" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/lorem.txt"
    And user "user1" has logged in using the webUI
    And the user has created a new public link for folder "simple-folder" using the webUI with
      | permission | read-write |
    And the public accesses the last created public link using the webUI
    And the user uploads overwriting file "lorem.txt" using the webUI and retries if the file is locked
    Then file "lorem.txt" should be listed on the webUI
    And the content of "simple-folder/lorem.txt" should be the same as the local "lorem.txt"

  Scenario: upload a file into files_drop share
    Given user "user1" has created folder "/simple-folder"
    And user "user1" has logged in using the webUI
    And the user has created a new public link for folder "simple-folder" using the webUI with
      | permission | upload |
    And the public accesses the last created public link using the webUI
    Then the user uploads file "lorem.txt" using the webUI
