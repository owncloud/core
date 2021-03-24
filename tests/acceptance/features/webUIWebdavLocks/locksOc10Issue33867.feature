@webUI @notToImplementOnOCIS @insulated @disablePreviews
Feature: Locks
  As a user
  I would like to be able to see what lock are on files and folders
  So that I can understand who has which resources locked

  Background:
    #do not set email, see bugs in https://github.com/owncloud/core/pull/32250#issuecomment-434615887
    Given these users have been created with large skeleton files:
      | username       |
      | brand-new-user |
    And user "brand-new-user" has logged in using the webUI

  @issue-33867 @files_sharing-app-required
  Scenario: setting a lock shows the lock symbols at the correct files/folders on the shared-with-you page
    Given these users have been created with large skeleton files:
      | username |
      | sharer   |
    And user "sharer" has locked folder "simple-folder" setting the following properties
      | lockscope | shared |
    And user "sharer" has locked file "data.zip" setting the following properties
      | lockscope | exclusive |
    And user "sharer" has shared file "data.zip" with user "brand-new-user"
    And user "sharer" has shared file "data.tar.gz" with user "brand-new-user"
    And user "sharer" has shared folder "simple-folder" with user "brand-new-user"
    And user "sharer" has shared folder "simple-empty-folder" with user "brand-new-user"
    When the user browses to the shared-with-you page
    Then folder "simple-folder (2)" should not be marked as locked on the webUI
    #Then folder "simple-folder (2)" should be marked as locked on the webUI
    And folder "simple-folder (2)" should not be marked as locked by user "brand-new-user" in the locks tab of the details panel on the webUI
    #And folder "simple-folder (2)" should be marked as locked by user "brand-new-user" in the locks tab of the details panel on the webUI
    But folder "simple-empty-folder (2)" should not be marked as locked on the webUI
    And file "data (2).zip" should not be marked as locked on the webUI
    #And file "data (2).zip" should be marked as locked on the webUI
    And file "data (2).zip" should not be marked as locked by user "brand-new-user" in the locks tab of the details panel on the webUI
    #And file "data (2).zip" should be marked as locked by user "brand-new-user" in the locks tab of the details panel on the webUI
    But file "data.tar (2).gz" should not be marked as locked on the webUI

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