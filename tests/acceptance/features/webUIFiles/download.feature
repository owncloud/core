@webUI @insulated @disablePreviews @javascript @skipOnFIREFOX @skipOnINTERNETEXPLORER @skipOnMICROSOFTEDGE @webUIDownload
Feature: Download resource

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files


  Scenario: download a file
    Given user "Alice" has uploaded file with content "ownCloud test text file 0" to "textfile0.txt"
    And user "Alice" has logged in using the webUI
    When the user selects file "textfile0.txt" using the webUI
    And the user clicks the download button on the webUI
    Then file "textfile0.txt" should be downloaded


  Scenario: download a folder
    Given user "Alice" has created folder "simple-folder"
    And user "Alice" has logged in using the webUI
    When the user selects folder "simple-folder" using the webUI
    And the user clicks the download button on the webUI
    Then file "simple-folder.zip" should be downloaded


  Scenario: download multiple folders
    Given user "Alice" has created folder "simple-folder"
    And user "Alice" has created folder "simple-folder1"
    And user "Alice" has created folder "simple-folder2"
    And user "Alice" has logged in using the webUI
    When the user selects folder "simple-folder" using the webUI
    And the user selects folder "simple-folder1" using the webUI
    And the user selects folder "simple-folder2" using the webUI
    And the user clicks the download button on the webUI
    Then file "download.zip" should be downloaded
    When the user unzips the file "download.zip"
    Then the following folders should exist in the downloads folder
      | folders        |
      | simple-folder  |
      | simple-folder1 |
      | simple-folder2 |


  Scenario: download all files and folder
    Given user "Alice" has uploaded file with content "ownCloud test text file 0" to "textfile0.txt"
    And user "Alice" has created folder "simple-folder"
    And user "Alice" has created folder "simple-folder1"
    And user "Alice" has created folder "simple-folder2"
    And user "Alice" has logged in using the webUI
    When the user selects folder "simple-folder" using the webUI
    And the user selects folder "simple-folder1" using the webUI
    And the user selects folder "simple-folder2" using the webUI
    And the user selects file "textfile0.txt" using the webUI
    And the user clicks the download button on the webUI
    Then file "download.zip" should be downloaded
    When the user unzips the file "download.zip"
    Then the following folders should exist in the downloads folder
      | folders        |
      | simple-folder  |
      | simple-folder1 |
      | simple-folder2 |
      | textfile0.txt  |


  Scenario: download a sub-file
    Given user "Alice" has created folder "parent"
    And user "Alice" has uploaded file with content "ownCloud test text file 0" to "parent/textfile0.txt"
    And user "Alice" has logged in using the webUI
    When the user opens folder "parent" using the webUI
    And the user selects file "textfile0.txt" using the webUI
    And the user clicks the download button on the webUI
    Then file "textfile0.txt" should be downloaded


  Scenario: download a sub-folder
    Given user "Alice" has created folder "parent"
    And user "Alice" has created folder "parent/sub-folder"
    And user "Alice" has logged in using the webUI
    When the user opens folder "parent" using the webUI
    And the user selects folder "sub-folder" using the webUI
    And the user clicks the download button on the webUI
    Then file "sub-folder.zip" should be downloaded


  Scenario: download multiple sub-folders
    Given user "Alice" has created folder "parent"
    And user "Alice" has created folder "parent/sub-folder"
    And user "Alice" has created folder "parent/sub-folder1"
    And user "Alice" has created folder "parent/sub-folder2"
    And user "Alice" has logged in using the webUI
    When the user opens folder "parent" using the webUI
    And the user selects folder "sub-folder" using the webUI
    And the user selects folder "sub-folder1" using the webUI
    And the user selects folder "sub-folder2" using the webUI
    And the user clicks the download button on the webUI
    Then file "parent.zip" should be downloaded
    When the user unzips the file "parent.zip"
    Then the following folders should exist in the downloads folder
      | folders |
      | parent  |
    And the following sub-folders should exist inside the downloaded folder "parent"
      | folders       |
      | sub-folder    |
      | sub-folder1   |
      | sub-folder2   |


  Scenario: download all sub-files and sub-folders
    Given user "Alice" has created folder "parent"
    And user "Alice" has created folder "parent/sub-folder"
    And user "Alice" has created folder "parent/sub-folder1"
    And user "Alice" has created folder "parent/sub-folder2"
    And user "Alice" has uploaded file with content "ownCloud test text file 0" to "parent/textfile0.txt"
    And user "Alice" has logged in using the webUI
    When the user opens folder "parent" using the webUI
    And the user selects folder "sub-folder" using the webUI
    And the user selects folder "sub-folder1" using the webUI
    And the user selects folder "sub-folder2" using the webUI
    And the user selects file "textfile0.txt" using the webUI
    And the user clicks the download button on the webUI
    Then file "parent.zip" should be downloaded
    When the user unzips the file "parent.zip"
    Then the following folders should exist in the downloads folder
      | folders |
      | parent  |
    And the following sub-folders should exist inside the downloaded folder "parent"
      | folders       |
      | sub-folder    |
      | sub-folder1   |
      | sub-folder2   |
      | textfile0.txt |
