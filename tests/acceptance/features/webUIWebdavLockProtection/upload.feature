@webUI @insulated @disablePreviews @skipOnOcV10.0
Feature: Locks
  As a user
  I would like to be able to use locks control upload of files and folders
  So that I can prevent files and folders being added to and changed while they are being used by another user

  Background:
    #do not set email, see bugs in https://github.com/owncloud/core/pull/32250#issuecomment-434615887
    Given these users have been created with skeleton files:
      | username       |
      | brand-new-user |
    And user "brand-new-user" has logged in using the webUI

  Scenario Outline: uploading a file, trying to overwrite a locked file
    Given user "brand-new-user" has locked file "lorem.txt" setting following properties
      | lockscope | <lockscope> |
    And the user has browsed to the files page
    When the user uploads overwriting file "lorem.txt" using the webUI
    Then notifications should be displayed on the webUI with the text
      | The file lorem.txt is currently locked, please try again later |
    And the content of "lorem.txt" should not have changed
    And file "lorem.txt" should be marked as locked on the webUI
    And file "lorem.txt" should be marked as locked by user "brand-new-user" in the locks tab of the details panel on the webUI
    And 1 locks should be reported for file "lorem.txt" of user "brand-new-user" by the WebDAV API
    Examples:
      | lockscope |
      | exclusive |
      | shared    |

  Scenario Outline: uploading a file, trying to overwrite a file in a locked folder
    Given user "brand-new-user" has locked folder "simple-folder" setting following properties
      | lockscope | <lockscope> |
    And the user has opened folder "simple-folder" using the webUI
    When the user uploads overwriting file "lorem.txt" using the webUI
    Then notifications should be displayed on the webUI with the text
      | The file lorem.txt is currently locked, please try again later |
    And the content of "lorem.txt" should not have changed
    And file "lorem.txt" should be marked as locked on the webUI
    And file "lorem.txt" should be marked as locked by user "brand-new-user" in the locks tab of the details panel on the webUI
    And 1 locks should be reported for file "simple-folder/lorem.txt" of user "brand-new-user" by the WebDAV API
    Examples:
      | lockscope |
      | exclusive |
      | shared    |

  Scenario Outline: uploading a new file into a locked folder
    Given user "brand-new-user" has locked folder "simple-folder" setting following properties
      | lockscope | <lockscope> |
    And the user has opened folder "simple-folder" using the webUI
    When the user uploads file "new-lorem.txt" using the webUI
    Then notifications should be displayed on the webUI with the text
      | The file new-lorem.txt is currently locked, please try again later |
    And file "new-lorem.txt" should not be listed on the webUI
    And 0 locks should be reported for file "simple-folder/new-lorem.txt" of user "brand-new-user" by the WebDAV API
    Examples:
      | lockscope |
      | exclusive |
      | shared    |

  Scenario Outline: uploading a file, trying to overwrite a file in a locked folder in a public share
    Given user "brand-new-user" has locked folder "simple-folder" setting following properties
      | lockscope | <lockscope> |
    And the user has browsed to the files page
    And the user has created a new public link for folder "simple-folder" using the webUI with
      | permission | read-write |
    When the public accesses the last created public link using the webUI
    And the user uploads overwriting file "lorem.txt" using the webUI
    Then notifications should be displayed on the webUI with the text
      | The file lorem.txt is currently locked, please try again later |
    And the content of "simple-folder/lorem.txt" should not have changed
    And 1 locks should be reported for file "simple-folder/lorem.txt" of user "brand-new-user" by the WebDAV API
    Examples:
      | lockscope |
      | exclusive |
      | shared    |

