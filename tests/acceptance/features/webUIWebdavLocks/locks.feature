@webUI @insulated @disablePreviews @skipOnOcV10.0
Feature: Locks
  As a user
  I would like to be able to see what lock are on files and folders
  So that I can understand who has which resources locked

  Background:
    #do not set email, see bugs in https://github.com/owncloud/core/pull/32250#issuecomment-434615887
    Given these users have been created:
      | username       |
      | brand-new-user |
    And user "brand-new-user" has logged in using the webUI

  Scenario: setting a lock shows the lock symbols at the correct files/folders
    Given user "brand-new-user" has locked folder "simple-folder" setting following properties
      | lockscope | shared |
    And user "brand-new-user" has locked file "data.zip" setting following properties
      | lockscope | exclusive |
    When the user browses to the files page
    Then folder "simple-folder" should be marked as locked on the webUI
    And folder "simple-folder" should be marked as locked by user "brand-new-user" in the locks tab of the details panel on the webUI
    But folder "simple-empty-folder" should not be marked as locked on the webUI
    And file "data.zip" should be marked as locked on the webUI
    And file "data.zip" should be marked as locked by user "brand-new-user" in the locks tab of the details panel on the webUI
    But file "data.tar.gz" should not be marked as locked on the webUI

  Scenario: setting a lock shows the display name of a user in the locking details
    Given these users have been created:
      | username               | displayname   |
      | user-with-display-name | My fancy name |
    Given user "user-with-display-name" has locked folder "simple-folder" setting following properties
      | lockscope | shared |
    And user "user-with-display-name" has locked file "data.zip" setting following properties
      | lockscope | exclusive |
    When the user re-logs in with username "user-with-display-name" and password "%regular%" using the webUI
    And folder "simple-folder" should be marked as locked by user "My fancy name" in the locks tab of the details panel on the webUI
    And file "data.zip" should be marked as locked by user "My fancy name" in the locks tab of the details panel on the webUI

  @issue-34315
  Scenario: setting a lock shows the current display name of a user in the locking details
    Given these users have been created:
      | username               | displayname   |
      | user-with-display-name | My fancy name |
    Given user "user-with-display-name" has locked folder "simple-folder" setting following properties
      | lockscope | shared |
    And user "user-with-display-name" has locked file "data.zip" setting following properties
      | lockscope | exclusive |
    And the administrator has changed the display name of user "user-with-display-name" to "An ordinary name"
    When the user re-logs in with username "user-with-display-name" and password "%regular%" using the webUI
    And folder "simple-folder" should be marked as locked by user "My fancy name" in the locks tab of the details panel on the webUI
    And file "data.zip" should be marked as locked by user "My fancy name" in the locks tab of the details panel on the webUI
    #And folder "simple-folder" should be marked as locked by user "An ordinary name" in the locks tab of the details panel on the webUI
    #And file "data.zip" should be marked as locked by user "An ordinary name" in the locks tab of the details panel on the webUI

  Scenario: setting a lock shows the display name of a user in the locking details (user has set email address)
    Given these users have been created:
      | username               | displayname   | email       |
      | user-with-display-name | My fancy name | mail@oc.org |
    Given user "user-with-display-name" has locked folder "simple-folder" setting following properties
      | lockscope | shared |
    And user "user-with-display-name" has locked file "data.zip" setting following properties
      | lockscope | exclusive |
    When the user re-logs in with username "user-with-display-name" and password "%regular%" using the webUI
    And folder "simple-folder" should be marked as locked by user "My fancy name (mail@oc.org)" in the locks tab of the details panel on the webUI
    And file "data.zip" should be marked as locked by user "My fancy name (mail@oc.org)" in the locks tab of the details panel on the webUI

  Scenario: setting a lock shows the user name of a user in the locking details (user has set email address)
    Given these users have been created:
      | username        | email       |
      | user-with-email | mail@oc.org |
    Given user "user-with-email" has locked folder "simple-folder" setting following properties
      | lockscope | shared |
    And user "user-with-email" has locked file "data.zip" setting following properties
      | lockscope | exclusive |
    When the user re-logs in with username "user-with-email" and password "%regular%" using the webUI
    And folder "simple-folder" should be marked as locked by user "user-with-email (mail@oc.org)" in the locks tab of the details panel on the webUI
    And file "data.zip" should be marked as locked by user "user-with-email (mail@oc.org)" in the locks tab of the details panel on the webUI

  Scenario: setting a lock shows the lock symbols at the correct files/folders on the favorites page
    Given user "brand-new-user" has locked folder "simple-folder" setting following properties
      | lockscope | shared |
    And user "brand-new-user" has locked file "data.zip" setting following properties
      | lockscope | exclusive |
    When the user marks folder "simple-folder" as favorite using the webUI
    And the user marks folder "simple-empty-folder" as favorite using the webUI
    And the user marks file "data.zip" as favorite using the webUI
    And the user marks file "data.tar.gz" as favorite using the webUI
    And the user browses to the favorites page
    Then folder "simple-folder" should be marked as locked on the webUI
    And folder "simple-folder" should be marked as locked by user "brand-new-user" in the locks tab of the details panel on the webUI
    But folder "simple-empty-folder" should not be marked as locked on the webUI
    And file "data.zip" should be marked as locked on the webUI
    And file "data.zip" should be marked as locked by user "brand-new-user" in the locks tab of the details panel on the webUI
    But file "data.tar.gz" should not be marked as locked on the webUI

  @issue-33867
  Scenario: setting a lock shows the lock symbols at the correct files/folders on the shared-with-others page
    Given these users have been created:
      | username |
      | receiver |
    And user "brand-new-user" has locked folder "simple-folder" setting following properties
      | lockscope | shared |
    And user "brand-new-user" has locked file "data.zip" setting following properties
      | lockscope | exclusive |
    And user "brand-new-user" has shared file "data.zip" with user "receiver"
    And user "brand-new-user" has shared file "data.tar.gz" with user "receiver"
    And user "brand-new-user" has shared folder "simple-folder" with user "receiver"
    And user "brand-new-user" has shared folder "simple-empty-folder" with user "receiver"
    When the user browses to the shared-with-others page
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

  @issue-33867
  Scenario: setting a lock shows the lock symbols at the correct files/folders on the shared-by-link page
    Given user "brand-new-user" has locked folder "simple-folder" setting following properties
      | lockscope | shared |
    And user "brand-new-user" has locked file "data.zip" setting following properties
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

  @issue-33867
  Scenario: setting a lock shows the lock symbols at the correct files/folders on the shared-with-you page
    Given these users have been created:
      | username |
      | sharer   |
    And user "sharer" has locked folder "simple-folder" setting following properties
      | lockscope | shared |
    And user "sharer" has locked file "data.zip" setting following properties
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

  Scenario: clicking other tabs does not change the lock symbol
    When the user opens the share dialog for folder "simple-folder"
    Then folder "simple-folder" should not be marked as locked on the webUI

  Scenario: lock set on a shared file shows the lock information for all involved users
    Given these users have been created:
      | username  |
      | sharer    |
      | receiver  |
      | receiver2 |
    And group "receiver-group" has been created
    And user "receiver2" has been added to group "receiver-group"
    And user "sharer" has shared file "data.zip" with user "receiver"
    And user "sharer" has shared file "data.tar.gz" with group "receiver-group"
    And user "receiver" has shared file "data (2).zip" with user "brand-new-user"
    And user "sharer" has locked file "data.zip" setting following properties
      | lockscope | shared |
    And user "receiver" has locked file "data (2).zip" setting following properties
      | lockscope | shared |
    And user "brand-new-user" has locked file "data (2).zip" setting following properties
      | lockscope | shared |
    And user "receiver2" has locked file "data.tar (2).gz" setting following properties
      | lockscope | shared |
    When the user browses to the files page
    Then file "data (2).zip" should be marked as locked on the webUI
    And file "data (2).zip" should be marked as locked by user "sharer" in the locks tab of the details panel on the webUI
    And file "data (2).zip" should be marked as locked by user "receiver" in the locks tab of the details panel on the webUI
    And file "data (2).zip" should be marked as locked by user "brand-new-user" in the locks tab of the details panel on the webUI
    But file "data.zip" should not be marked as locked on the webUI
    When the user re-logs in as "sharer" using the webUI
    Then file "data.zip" should be marked as locked on the webUI
    And file "data.zip" should be marked as locked by user "sharer" in the locks tab of the details panel on the webUI
    And file "data.zip" should be marked as locked by user "receiver" in the locks tab of the details panel on the webUI
    And file "data.zip" should be marked as locked by user "brand-new-user" in the locks tab of the details panel on the webUI
    And file "data.tar.gz" should be marked as locked on the webUI
    And file "data.tar.gz" should be marked as locked by user "receiver2" in the locks tab of the details panel on the webUI
    When the user re-logs in as "receiver2" using the webUI
    Then file "data.tar (2).gz" should be marked as locked on the webUI
    And file "data.tar (2).gz" should be marked as locked by user "receiver2" in the locks tab of the details panel on the webUI

  Scenario: setting a lock on a folder shows the symbols at the sub-elements
    Given user "brand-new-user" has locked folder "simple-folder" setting following properties
      | lockscope | shared |
    When the user opens folder "simple-folder" using the webUI
    Then folder "simple-empty-folder" should be marked as locked on the webUI
    And folder "simple-empty-folder" should be marked as locked by user "brand-new-user" in the locks tab of the details panel on the webUI
    And file "data.zip" should be marked as locked on the webUI
    And file "data.zip" should be marked as locked by user "brand-new-user" in the locks tab of the details panel on the webUI

  Scenario: setting a depth:0 lock on a folder does not shows the symbols at the sub-elements
    Given user "brand-new-user" has locked folder "simple-folder" setting following properties
      | depth | 0 |
    When the user browses to the files page
    Then folder "simple-folder" should be marked as locked on the webUI
    When the user opens folder "simple-folder" using the webUI
    Then folder "simple-empty-folder" should not be marked as locked on the webUI
    And file "data.zip" should not be marked as locked on the webUI

  Scenario Outline: decline locked folder
    Given these users have been created:
      | username |
      | sharer   |
    And user "sharer" has created folder "/to-share-folder"
    And user "sharer" has locked folder "to-share-folder" setting following properties
      | lockscope | <lockscope> |
    And user "sharer" has shared folder "to-share-folder" with user "brand-new-user"
    When the user declines share "to-share-folder" offered by user "sharer" using the webUI
    And the user has browsed to the files page
    Then folder "to-share-folder" should not be listed on the webUI
    And 1 locks should be reported for file "to-share-folder" of user "sharer" by the WebDAV API
    And 0 locks should be reported for file "to-share-folder" of user "brand-new-user" by the WebDAV API
    Examples:
      | lockscope |
      | exclusive |
      | shared    |

  Scenario Outline: accept previously declined locked folder
    Given these users have been created:
      | username |
      | sharer   |
    And user "sharer" has created folder "/to-share-folder"
    And user "sharer" has locked folder "to-share-folder" setting following properties
      | lockscope | <lockscope> |
    And user "sharer" has shared folder "to-share-folder" with user "brand-new-user"
    When the user declines share "to-share-folder" offered by user "sharer" using the webUI
    And the user accepts share "to-share-folder" offered by user "sharer" using the webUI
    And the user has browsed to the files page
    Then folder "to-share-folder" should be marked as locked on the webUI
    And folder "to-share-folder" should be marked as locked by user "sharer" in the locks tab of the details panel on the webUI
    And 1 locks should be reported for file "to-share-folder" of user "sharer" by the WebDAV API
    And 1 locks should be reported for file "to-share-folder" of user "brand-new-user" by the WebDAV API
    Examples:
      | lockscope |
      | exclusive |
      | shared    |

  Scenario Outline: accept previously declined locked folder but create a folder with same name in between
    Given these users have been created:
      | username |
      | sharer   |
    And user "sharer" has created folder "/to-share-folder"
    And user "sharer" has locked folder "to-share-folder" setting following properties
      | lockscope | <lockscope> |
    And user "sharer" has shared folder "to-share-folder" with user "brand-new-user"
    When the user declines share "to-share-folder" offered by user "sharer" using the webUI
    And user "brand-new-user" creates folder "to-share-folder" using the WebDAV API
    And the user accepts share "to-share-folder" offered by user "sharer" using the webUI
    And the user has browsed to the files page
    Then folder "to-share-folder (2)" should be marked as locked on the webUI
    And folder "to-share-folder (2)" should be marked as locked by user "sharer" in the locks tab of the details panel on the webUI
    But folder "to-share-folder" should not be marked as locked on the webUI
    And 1 locks should be reported for file "to-share-folder" of user "sharer" by the WebDAV API
    And 1 locks should be reported for file "to-share-folder (2)" of user "brand-new-user" by the WebDAV API
    Examples:
      | lockscope |
      | exclusive |
      | shared    |

  Scenario Outline: creating a subfolder structure that is the same as the structure of a declined & locked share
    Given these users have been created:
      | username |
      | sharer   |
    And user "sharer" has created folder "/parent"
    And user "sharer" has created folder "/parent/subfolder"
    And user "sharer" has locked folder "parent" setting following properties
      | lockscope | <lockscope> |
    And user "sharer" has shared folder "parent" with user "brand-new-user"
    When the user declines share "parent" offered by user "sharer" using the webUI
    And user "brand-new-user" creates folder "parent" using the WebDAV API
    And user "brand-new-user" creates folder "parent/subfolder" using the WebDAV API
    And the user has browsed to the files page
    Then folder "parent" should not be marked as locked on the webUI
    When the user opens folder "parent" using the webUI
    Then folder "subfolder" should not be marked as locked on the webUI
    And 0 locks should be reported for file "parent" of user "brand-new-user" by the WebDAV API
    And 0 locks should be reported for file "parent/subfolder" of user "brand-new-user" by the WebDAV API
    Examples:
      | lockscope |
      | exclusive |
      | shared    |

  Scenario Outline: unsharing a locked file/folder
    Given these users have been created:
      | username |
      | sharer   |
    And user "sharer" has locked file "lorem.txt" setting following properties
      | lockscope | <lockscope> |
    And user "sharer" has locked folder "simple-folder" setting following properties
      | lockscope | <lockscope> |
    And user "sharer" has shared file "lorem.txt" with user "brand-new-user"
    And user "sharer" has shared folder "simple-folder" with user "brand-new-user"
    And the user has browsed to the files page
    When the user unshares file "lorem (2).txt" using the webUI
    And the user unshares folder "simple-folder (2)" using the webUI
    Then notifications should be displayed on the webUI with the text
      | The file "lorem (2).txt" is locked and cannot be deleted.     |
      | The file "simple-folder (2)" is locked and cannot be deleted. |
    Then as "brand-new-user" file "lorem (2).txt" should exist
    And as "brand-new-user" folder "simple-folder (2)" should exist
    And file "lorem (2).txt" should be listed on the webUI
    And folder "simple-folder (2)" should be listed on the webUI
    And 1 locks should be reported for file "lorem.txt" of user "sharer" by the WebDAV API
    And 1 locks should be reported for file "simple-folder/lorem.txt" of user "sharer" by the WebDAV API
    Examples:
      | lockscope |
      | exclusive |
      | shared    |
