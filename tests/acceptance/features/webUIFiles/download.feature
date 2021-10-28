@webUI @insulated @disablePreviews @javascript @skipOnFIREFOX @skipOnINTERNETEXPLORER @skipOnMICROSOFTEDGE
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
    Then folder "simple-folder.zip" should be downloaded

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: download multiple folders
    Given user "Alice" has created folder "simple-folder"
    And user "Alice" has created folder "simple-folder1"
    And user "Alice" has created folder "simple-folder2"
    And user "Alice" has logged in using the webUI
    When the user selects folder "simple-folder" using the webUI
    And the user selects folder "simple-folder1" using the webUI
    And the user selects folder "simple-folder2" using the webUI
    And the user clicks the download button on the webUI
    Then folder "download.zip" should be downloaded

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
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
    Then folder "download.zip" should be downloaded


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
    Then folder "sub-folder.zip" should be downloaded


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
    Then folder "parent.zip" should be downloaded


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
    Then folder "parent.zip" should be downloaded
