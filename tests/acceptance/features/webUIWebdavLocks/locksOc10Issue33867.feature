@webUI @insulated @disablePreviews
Feature: Locks
  As a user
  I would like to be able to see what lock are on files and folders
  So that I can understand who has which resources locked

  Background:
    #do not set email, see bugs in https://github.com/owncloud/core/pull/32250#issuecomment-434615887
    Given user "brand-new-user" has been created with default attributes and without skeleton files
    And user "brand-new-user" has created the following folders
      | path                |
      | simple-folder       |
      | simple-empty-folder |
    And user "brand-new-user" has uploaded file "filesForUpload/data.zip" to "/data.zip"
    And user "brand-new-user" has uploaded file "filesForUpload/data.tar.gz" to "/data.tar.gz"

  @issue-33867 @files_sharing-app-required
  Scenario: setting a lock shows the lock symbols at the correct files/folders on the shared-with-you page
    Given user "receiver" has been created with default attributes and without skeleton files
    And user "brand-new-user" has locked folder "simple-folder" setting the following properties
      | lockscope | shared |
    And user "brand-new-user" has locked file "data.zip" setting the following properties
      | lockscope | exclusive |
    And user "brand-new-user" has shared file "data.zip" with user "receiver"
    And user "brand-new-user" has shared file "data.tar.gz" with user "receiver"
    And user "brand-new-user" has shared folder "simple-folder" with user "receiver"
    And user "brand-new-user" has shared folder "simple-empty-folder" with user "receiver"
    And user "receiver" has logged in using the webUI
    When the user browses to the shared-with-you page
    Then folder "simple-folder" should not be marked as locked on the webUI
    #Then folder "simple-folder" should be marked as locked on the webUI
    And folder "simple-folder" should not be marked as locked by user "receiver" in the locks tab of the details panel on the webUI
    #And folder "simple-folder" should be marked as locked by user "receiver" in the locks tab of the details panel on the webUI
    But folder "simple-empty-folder" should not be marked as locked on the webUI
    And file "data.zip" should not be marked as locked on the webUI
    #And file "data.zip" should be marked as locked on the webUI
    And file "data.zip" should not be marked as locked by user "receiver" in the locks tab of the details panel on the webUI
    #And file "data.zip" should be marked as locked by user "receiver" in the locks tab of the details panel on the webUI
    But file "data.tar.gz" should not be marked as locked on the webUI

  @issue-33867 @files_sharing-app-required
  Scenario: setting a lock shows the lock symbols at the correct files/folders on the shared-by-link page
    Given user "brand-new-user" has locked folder "simple-folder" setting the following properties
      | lockscope | shared |
    And user "brand-new-user" has locked file "data.zip" setting the following properties
      | lockscope | exclusive |
    And user "brand-new-user" has created a public link share with settings
      | path | data.zip |
    And user "brand-new-user" has created a public link share with settings
      | path | data.tar.gz |
    And user "brand-new-user" has created a public link share with settings
      | path | simple-folder |
    And user "brand-new-user" has created a public link share with settings
      | path | simple-empty-folder |
    And user "brand-new-user" has logged in using the webUI
    When the user browses to the shared-by-link page
    Then folder "simple-folder" should not be marked as locked on the webUI
    #Then folder "simple-folder" should be marked as locked on the webUI
    And folder "simple-folder" should not be marked as locked by user "brand-new-user" in the locks tab of the details panel on the webUI
    #And folder "simple-folder" should be marked as locked by user "brand-new-user" in the locks tab of the details panel on the webUI
    But folder "simple-empty-folder" should not be marked as locked on the webUI
    And file "data.zip" should not be marked as locked on the webUI
    #And file "data.zip" should be marked as locked on the webUI
    And file "data.zip" should not be marked as locked by user "brand-new-user" in the locks tab of the details panel on the webUI
    #And file "data.zip" should be marked as locked by user "brand-new-user" in the locks tab of the details panel on the webUI
    But file "data.tar.gz" should not be marked as locked on the webUI