@webUI @insulated @disablePreviews
Feature: File Upload

  As a QA engineer
  I would like to test uploads of all kind of funny filenames via the WebUI

  These tests are written in a way that multiple file names are tested in one scenario
  that is not academically correct but saves a lot of time

  Background:
    Given user "user1" has been created with default attributes
    And user "user1" has logged in using the webUI

  Scenario: simple upload of a file that does not exist before
    When the user uploads file "new-'single'quotes.txt" using the webUI
    Then file "new-'single'quotes.txt" should be listed on the webUI
    And the content of "new-'single'quotes.txt" should be the same as the local "new-'single'quotes.txt"

    When the user uploads file "new-strängé filename (duplicate #2 &).txt" using the webUI
    Then file "new-strängé filename (duplicate #2 &).txt" should be listed on the webUI
    And the content of "new-strängé filename (duplicate #2 &).txt" should be the same as the local "new-strängé filename (duplicate #2 &).txt"

    When the user uploads file "zzzz-zzzz-will-be-at-the-end-of-the-folder-when-uploaded.txt" using the webUI
    Then file "zzzz-zzzz-will-be-at-the-end-of-the-folder-when-uploaded.txt" should be listed on the webUI
    And the content of "zzzz-zzzz-will-be-at-the-end-of-the-folder-when-uploaded.txt" should be the same as the local "zzzz-zzzz-will-be-at-the-end-of-the-folder-when-uploaded.txt"

  @smokeTest
  Scenario Outline: upload a new file into a sub folder
    Given a file with the size of "3000" bytes and the name "0" has been created locally
    When the user opens folder <folder-to-upload-to> using the webUI
    And the user uploads file "0" using the webUI
    Then file "0" should be listed on the webUI
    And the content of "0" should be the same as the local "0"

    When the user uploads file "new-'single'quotes.txt" using the webUI
    Then file "new-'single'quotes.txt" should be listed on the webUI
    And the content of "new-'single'quotes.txt" should be the same as the local "new-'single'quotes.txt"

    When the user uploads file "new-strängé filename (duplicate #2 &).txt" using the webUI
    Then file "new-strängé filename (duplicate #2 &).txt" should be listed on the webUI
    And the content of "new-strängé filename (duplicate #2 &).txt" should be the same as the local "new-strängé filename (duplicate #2 &).txt"

    When the user uploads file "zzzz-zzzz-will-be-at-the-end-of-the-folder-when-uploaded.txt" using the webUI
    Then file "zzzz-zzzz-will-be-at-the-end-of-the-folder-when-uploaded.txt" should be listed on the webUI
    And the content of "zzzz-zzzz-will-be-at-the-end-of-the-folder-when-uploaded.txt" should be the same as the local "zzzz-zzzz-will-be-at-the-end-of-the-folder-when-uploaded.txt"
    Examples:
      | folder-to-upload-to     |
      | "0"                     |
      | "'single'quotes"        |
      | "strängé नेपाली folder" |

  Scenario: overwrite an existing file
    When the user uploads overwriting file "'single'quotes.txt" using the webUI and retries if the file is locked
    Then file "'single'quotes.txt" should be listed on the webUI
    And the content of "'single'quotes.txt" should be the same as the local "'single'quotes.txt"

    When the user uploads overwriting file "strängé filename (duplicate #2 &).txt" using the webUI and retries if the file is locked
    Then file "strängé filename (duplicate #2 &).txt" should be listed on the webUI
    And the content of "strängé filename (duplicate #2 &).txt" should be the same as the local "strängé filename (duplicate #2 &).txt"

    When the user uploads overwriting file "zzzz-must-be-last-file-in-folder.txt" using the webUI and retries if the file is locked
    Then file "zzzz-must-be-last-file-in-folder.txt" should be listed on the webUI
    And the content of "zzzz-must-be-last-file-in-folder.txt" should be the same as the local "zzzz-must-be-last-file-in-folder.txt"

  Scenario: keep new and existing file
    When the user uploads file "'single'quotes.txt" keeping both new and existing files using the webUI
    Then file "'single'quotes.txt" should be listed on the webUI
    And the content of "'single'quotes.txt" should not have changed
    And file "'single'quotes (2).txt" should be listed on the webUI
    And the content of "'single'quotes (2).txt" should be the same as the local "'single'quotes.txt"

    When the user uploads file "strängé filename (duplicate #2 &).txt" keeping both new and existing files using the webUI
    Then file "strängé filename (duplicate #2 &).txt" should be listed on the webUI
    And the content of "strängé filename (duplicate #2 &).txt" should not have changed
    And file "strängé filename (duplicate #2 &) (2).txt" should be listed on the webUI
    And the content of "strängé filename (duplicate #2 &) (2).txt" should be the same as the local "strängé filename (duplicate #2 &).txt"

    When the user uploads file "zzzz-must-be-last-file-in-folder.txt" keeping both new and existing files using the webUI
    Then file "zzzz-must-be-last-file-in-folder.txt" should be listed on the webUI
    And the content of "zzzz-must-be-last-file-in-folder.txt" should not have changed
    And file "zzzz-must-be-last-file-in-folder (2).txt" should be listed on the webUI
    And the content of "zzzz-must-be-last-file-in-folder (2).txt" should be the same as the local "zzzz-must-be-last-file-in-folder.txt"

  Scenario Outline: chunking upload using difficult names
    Given a file with the size of "30000000" bytes and the name <file-name> has been created locally
    When the user uploads file <file-name> using the webUI
    Then file <file-name> should be listed on the webUI
    And the content of <file-name> should be the same as the local <file-name>
    Examples:
      | file-name |
      | "&#"      |
      | "TIÄFÜ"   |
		
  # upload into "simple-folder" because there is already a folder called "0" in the root
  Scenario: Upload a file called "0" using chunking
    Given a file with the size of "30000000" bytes and the name "0" has been created locally
    When the user opens folder "simple-folder" using the webUI
    And the user uploads file "0" using the webUI
    Then file "0" should be listed on the webUI
    And the content of "0" should be the same as the local "0"
