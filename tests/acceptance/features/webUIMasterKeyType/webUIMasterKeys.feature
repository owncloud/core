@webUI @skipOnEncryptionType:user-keys @skipOnStorage:ceph
Feature: encrypt files using master keys
  As an admin
  I want to be able to encrypt user files using master keys
  So that I can use a common key to encrypt files of all user

  Scenario: user cannot access their file after recreating master key with re-login
    Given user "user0" has been created with default attributes
    And the administrator has set the encryption type to "masterkey"
    And user "user0" has uploaded file "filesForUpload/textfile.txt" to "/somefile.txt"
    And user "user0" has logged in using the webUI
    When the administrator successfully recreates the encryption masterkey using the occ command
    Then the command output should contain the text 'Note: All users are required to relogin.'
    When the user opens file "lorem.txt" expecting to fail using the webUI
    Then the user should be redirected to the general exception webUI page with the title "%productname%"
    And the title of the exception on general exception webUI page should be "Forbidden"
    And a message should be displayed on the general exception webUI page containing "Encryption not ready"

  Scenario: user can access their file after recreating master key with re-login
    Given user "user0" has been created with default attributes
    And the administrator has set the encryption type to "masterkey"
    And user "user0" has uploaded file "filesForUpload/textfile.txt" to "/somefile.txt"
    And user "user0" has logged in using the webUI
    When the administrator successfully recreates the encryption masterkey using the occ command
    And the user re-logs in as "user0" using the webUI
    And the user opens file "lorem.txt" using the webUI
    Then no dialog should be displayed on the webUI
    And the user should be redirected to a webUI page with the title "Files - %productname%"