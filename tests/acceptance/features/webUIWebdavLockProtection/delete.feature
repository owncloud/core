@webUI @insulated @disablePreviews @skipOnOcV10.0
Feature: Locks
  As a user
  I would like to be able to use locks control deletion of files and folders
  So that I can prevent files and folders being deleted while they are being used by another user

  Background:
    #do not set email, see bugs in https://github.com/owncloud/core/pull/32250#issuecomment-434615887
    Given these users have been created without skeleton files:
      |username      |
      |brand-new-user|

  Scenario Outline: deleting a file in a public share of a locked folder
    Given user "brand-new-user" has created folder "/simple-folder"
    And user "brand-new-user" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/lorem.txt"
    And user "brand-new-user" has locked folder "simple-folder" setting following properties
      | lockscope | <lockscope> |
    And user "brand-new-user" has logged in using the webUI
    And the user has created a new public link for folder "simple-folder" using the webUI with
      | permission | read-write |
    When the public accesses the last created public link using the webUI
    And the user deletes folder "lorem.txt" using the webUI
    Then notifications should be displayed on the webUI with the text
      | The file "lorem.txt" is locked and cannot be deleted. |
    And as "brand-new-user" file "simple-folder/lorem.txt" should exist
    And 1 locks should be reported for file "simple-folder/lorem.txt" of user "brand-new-user" by the WebDAV API
    Examples:
      | lockscope |
      | exclusive |
      | shared    |
