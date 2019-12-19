@api @TestAlsoOnExternalUserBackend @files_sharing-app-required
Feature: accept/decline shares coming from internal users
  As a user
  I want to have control of which received shares I accept
  So that I can keep my file system clean

  Background:
    Given using OCS API version "1"
    And using new DAV path
    And these users have been created with default attributes and skeleton files:
      | username |
      | user0    |
      | user1    |
      | user2    |
    And group "grp1" has been created
    # Note: in the user_ldap test environment user1 and user2 are in grp1
    And user "user1" has been added to group "grp1"
    And user "user2" has been added to group "grp1"

  @smokeTest
  Scenario Outline: share a file & folder with another internal user with different permissions when auto accept is enabled
    Given parameter "shareapi_auto_accept_share" of app "core" has been set to "yes"
    When user "user0" creates a share using the sharing API with settings
      | path        | PARENT        |
      | shareType   | user          |
      | shareWith   | user1         |
      | permissions | <permissions> |
    And user "user0" shares file "/textfile0.txt" with user "user1" using the sharing API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "user1" should see the following elements
      | /FOLDER/                 |
      | /PARENT/                 |
      | /PARENT%20(2)/           |
      | /PARENT%20(2)/parent.txt |
      | /textfile0.txt           |
      | /textfile0%20(2).txt     |
    And the sharing API should report to user "user1" that these shares are in the accepted state
      | path               |
      | /PARENT (2)/       |
      | /textfile0 (2).txt |
    And  the downloaded content when downloading file "/PARENT (2)/CHILD/child.txt" for user "user1" with range "bytes=19-28" should be "file child"
    And  the downloaded content when downloading file "/textfile0 (2).txt" for user "user1" with range "bytes=14-24" should be "text file 0"
    Examples:
      | permissions |
      | read        |
      | change      |
      | all         |

  Scenario Outline: share a file & folder with another internal user when auto accept is enabled and there is a default folder for received shares
    Given parameter "shareapi_auto_accept_share" of app "core" has been set to "yes"
    And the administrator has set the default folder for received shares to "<share_folder>"
    When user "user0" shares folder "/PARENT" with user "user1" using the sharing API
    And user "user0" shares file "/textfile0.txt" with user "user1" using the sharing API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "user1" should see the following elements
      | /FOLDER/                               |
      | /PARENT/                               |
      | <top_folder>/PARENT<suffix>/           |
      | <top_folder>/PARENT<suffix>/parent.txt |
      | /textfile0.txt                         |
      | <top_folder>/textfile0<suffix>.txt     |
    And the sharing API should report to user "user1" that these shares are in the accepted state
      | path                                  |
      | <top_folder>/<received_parent_name>/  |
      | <top_folder>/<received_textfile_name> |
    Examples:
      | share_folder        | top_folder          | suffix | received_parent_name | received_textfile_name |
      |                     |                     | %20(2) | PARENT (2)           | textfile0 (2).txt      |
      | /                   |                     | %20(2) | PARENT (2)           | textfile0 (2).txt      |
      | /ReceivedShares     | /ReceivedShares     |        | PARENT               | textfile0.txt          |
      | ReceivedShares      | /ReceivedShares     |        | PARENT               | textfile0.txt          |
      | /My/Received/Shares | /My/Received/Shares |        | PARENT               | textfile0.txt          |

  Scenario Outline: share a file & folder with internal group with different permissions when auto accept is enabled
    Given parameter "shareapi_auto_accept_share" of app "core" has been set to "yes"
    When user "user0" creates a share using the sharing API with settings
      | path        | PARENT        |
      | shareType   | group         |
      | shareWith   | grp1          |
      | permissions | <permissions> |
    And user "user0" shares file "/textfile0.txt" with group "grp1" using the sharing API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "user1" should see the following elements
      | /FOLDER/                 |
      | /PARENT/                 |
      | /PARENT%20(2)/           |
      | /PARENT%20(2)/parent.txt |
      | /textfile0.txt           |
      | /textfile0%20(2).txt     |
    And the sharing API should report to user "user1" that these shares are in the accepted state
      | path               |
      | /PARENT (2)/       |
      | /textfile0 (2).txt |
    And user "user2" should see the following elements
      | /FOLDER/                 |
      | /PARENT/                 |
      | /PARENT%20(2)/           |
      | /PARENT%20(2)/parent.txt |
      | /textfile0.txt           |
      | /textfile0%20(2).txt     |
    And the sharing API should report to user "user2" that these shares are in the accepted state
      | path               |
      | /PARENT (2)/       |
      | /textfile0 (2).txt |
    And  the downloaded content when downloading file "/PARENT (2)/CHILD/child.txt" for user "user2" with range "bytes=19-28" should be "file child"
    And  the downloaded content when downloading file "/textfile0 (2).txt" for user "user2" with range "bytes=14-24" should be "text file 0"
    Examples:
      | permissions |
      | read        |
      | change      |
      | all         |

  @smokeTest
  Scenario: decline a share that has been auto-accepted
    Given parameter "shareapi_auto_accept_share" of app "core" has been set to "yes"
    And user "user0" has shared folder "/PARENT" with user "user1"
    And user "user0" has shared file "/textfile0.txt" with user "user1"
    When user "user1" declines the share "/PARENT (2)" offered by user "user0" using the sharing API
    And user "user1" declines the share "/textfile0 (2).txt" offered by user "user0" using the sharing API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "user1" should not see the following elements
      | /PARENT%20(2)/           |
      | /PARENT%20(2)/parent.txt |
      | /textfile0%20(2).txt     |
    And the sharing API should report to user "user1" that these shares are in the declined state
      | path           |
      | /PARENT/       |
      | /textfile0.txt |

  Scenario: accept a share that has been declined before
    Given parameter "shareapi_auto_accept_share" of app "core" has been set to "yes"
    And user "user0" has shared folder "/PARENT" with user "user1"
    And user "user0" has shared file "/textfile0.txt" with user "user1"
    And user "user1" has declined the share "/PARENT (2)" offered by user "user0"
    And user "user1" has declined the share "/textfile0 (2).txt" offered by user "user0"
    When user "user1" accepts the share "/PARENT" offered by user "user0" using the sharing API
    And user "user1" accepts the share "/textfile0.txt" offered by user "user0" using the sharing API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "user1" should see the following elements
      | /PARENT%20(2)/           |
      | /PARENT%20(2)/parent.txt |
      | /textfile0%20(2).txt     |
    And the sharing API should report to user "user1" that these shares are in the accepted state
      | path               |
      | /PARENT (2)/       |
      | /textfile0 (2).txt |

  Scenario: unshare a share that has been auto-accepted
    Given parameter "shareapi_auto_accept_share" of app "core" has been set to "yes"
    And user "user0" has shared folder "/PARENT" with user "user1"
    And user "user0" has shared file "/textfile0.txt" with user "user1"
    When user "user1" unshares folder "/PARENT (2)" using the WebDAV API
    And user "user1" unshares file "/textfile0 (2).txt" using the WebDAV API
    Then user "user1" should not see the following elements
      | /PARENT%20(2)/           |
      | /PARENT%20(2)/parent.txt |
      | /textfile0%20(2).txt     |
    And the sharing API should report to user "user1" that these shares are in the declined state
      | path           |
      | /PARENT/       |
      | /textfile0.txt |

  Scenario: unshare a share that was shared with a group and auto-accepted
    Given parameter "shareapi_auto_accept_share" of app "core" has been set to "yes"
    And user "user0" has shared folder "/PARENT" with group "grp1"
    And user "user0" has shared file "/textfile0.txt" with group "grp1"
    When user "user1" unshares folder "/PARENT (2)" using the WebDAV API
    And user "user1" unshares file "/textfile0 (2).txt" using the WebDAV API
    Then user "user1" should not see the following elements
      | /PARENT%20(2)/           |
      | /PARENT%20(2)/parent.txt |
      | /textfile0%20(2).txt     |
    And the sharing API should report to user "user1" that these shares are in the declined state
      | path           |
      | /PARENT/       |
      | /textfile0.txt |
    But user "user2" should see the following elements
      | /PARENT%20(2)/           |
      | /PARENT%20(2)/parent.txt |
      | /textfile0%20(2).txt     |
    And the sharing API should report to user "user2" that these shares are in the accepted state
      | path               |
      | /PARENT (2)/       |
      | /textfile0 (2).txt |

  Scenario: rename accepted share, decline it
    Given parameter "shareapi_auto_accept_share" of app "core" has been set to "yes"
    And user "user0" has shared folder "/PARENT" with user "user1"
    When user "user1" moves folder "/PARENT (2)" to "/PARENT-renamed" using the WebDAV API
    And user "user1" declines the share "/PARENT-renamed" offered by user "user0" using the sharing API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "user1" should not see the following elements
      | /PARENT%20(2)/   |
      | /PARENT-renamed/ |
    And the sharing API should report to user "user1" that these shares are in the declined state
      | path     |
      | /PARENT/ |

  Scenario: rename accepted share, decline it then accept again, name stays
    Given parameter "shareapi_auto_accept_share" of app "core" has been set to "yes"
    And user "user0" has shared folder "/PARENT" with user "user1"
    And user "user1" has moved folder "/PARENT (2)" to "/PARENT-renamed"
    When user "user1" declines the share "/PARENT-renamed" offered by user "user0" using the sharing API
    And user "user1" accepts the share "/PARENT" offered by user "user0" using the sharing API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "user1" should see the following elements
      | /PARENT/         |
      | /PARENT-renamed/ |
    And the sharing API should report to user "user1" that these shares are in the accepted state
      | path             |
      | /PARENT-renamed/ |

  Scenario: move accepted share, decline it, accept again
    Given parameter "shareapi_auto_accept_share" of app "core" has been set to "yes"
    And user "user0" has created folder "/shared"
    And user "user0" has shared folder "/shared" with user "user1"
    And user "user1" has moved folder "/shared" to "/PARENT/shared"
    When user "user1" declines the share "/PARENT/shared" offered by user "user0" using the sharing API
    And user "user1" accepts the share "/shared" offered by user "user0" using the sharing API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "user1" should not see the following elements
      | /shared/ |
    But user "user1" should see the following elements
      | /PARENT/shared/ |
    And the sharing API should report to user "user1" that these shares are in the accepted state
      | path            |
      | /PARENT/shared/ |

  Scenario: move accepted share, decline it, delete parent folder, accept again
    Given parameter "shareapi_auto_accept_share" of app "core" has been set to "yes"
    And user "user0" has created folder "/shared"
    And user "user0" has shared folder "/shared" with user "user1"
    And user "user1" has moved folder "/shared" to "/PARENT/shared"
    When user "user1" declines the share "/PARENT/shared" offered by user "user0" using the sharing API
    And user "user1" deletes folder "/PARENT" using the WebDAV API
    And user "user1" accepts the share "/shared" offered by user "user0" using the sharing API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "user1" should not see the following elements
      | /PARENT/ |
    But user "user1" should see the following elements
      | /shared/ |
    And the sharing API should report to user "user1" that these shares are in the accepted state
      | path     |
      | /shared/ |

  Scenario: receive two shares with identical names from different users
    Given parameter "shareapi_auto_accept_share" of app "core" has been set to "yes"
    And user "user0" has created folder "/shared"
    And user "user0" has created folder "/shared/user0"
    And user "user1" has created folder "/shared"
    And user "user1" has created folder "/shared/user1"
    When user "user0" shares folder "/shared" with user "user2" using the sharing API
    And user "user1" shares folder "/shared" with user "user2" using the sharing API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "user2" should see the following elements
      | /shared/user0/       |
      | /shared%20(2)/user1/ |
    And the sharing API should report to user "user2" that these shares are in the accepted state
      | path         |
      | /shared/     |
      | /shared (2)/ |

  @smokeTest
  Scenario: share a file & folder with another internal group when auto accept is disabled
    Given parameter "shareapi_auto_accept_share" of app "core" has been set to "no"
    When user "user0" shares folder "/PARENT" with group "grp1" using the sharing API
    And user "user0" shares file "/textfile0.txt" with group "grp1" using the sharing API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "user1" should see the following elements
      | /FOLDER/       |
      | /PARENT/       |
      | /textfile0.txt |
    But user "user1" should not see the following elements
      | /PARENT%20(2)/           |
      | /PARENT%20(2)/parent.txt |
      | /textfile0%20(2).txt     |
    And the sharing API should report to user "user1" that these shares are in the pending state
      | path           |
      | /PARENT/       |
      | /textfile0.txt |
    And user "user2" should see the following elements
      | /FOLDER/       |
      | /PARENT/       |
      | /textfile0.txt |
    But user "user2" should not see the following elements
      | /PARENT%20(2)/           |
      | /PARENT%20(2)/parent.txt |
      | /textfile0%20(2).txt     |
    And the sharing API should report to user "user2" that these shares are in the pending state
      | path           |
      | /PARENT/       |
      | /textfile0.txt |

  Scenario: share a file & folder with another internal user when auto accept is disabled
    Given parameter "shareapi_auto_accept_share" of app "core" has been set to "no"
    When user "user0" shares folder "/PARENT" with user "user1" using the sharing API
    And user "user0" shares file "/textfile0.txt" with user "user1" using the sharing API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "user1" should see the following elements
      | /FOLDER/       |
      | /PARENT/       |
      | /textfile0.txt |
    But user "user1" should not see the following elements
      | /PARENT%20(2)/           |
      | /PARENT%20(2)/parent.txt |
      | /textfile0%20(2).txt     |
    And the sharing API should report to user "user1" that these shares are in the pending state
      | path           |
      | /PARENT/       |
      | /textfile0.txt |

  @smokeTest
  Scenario: accept a pending share
    Given parameter "shareapi_auto_accept_share" of app "core" has been set to "no"
    And user "user0" has shared folder "/PARENT" with user "user1"
    And user "user0" has shared file "/textfile0.txt" with user "user1"
    When user "user1" accepts the share "/PARENT" offered by user "user0" using the sharing API
    And user "user1" accepts the share "/textfile0.txt" offered by user "user0" using the sharing API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the fields of the last response should include
      | id                     | A_NUMBER                   |
      | share_type             | user                       |
      | uid_owner              | user0                      |
      | displayname_owner      | User Zero                  |
      | permissions            | share,read,update          |
      | uid_file_owner         | user0                      |
      | displayname_file_owner | User Zero                  |
      | state                  | 0                          |
      | path                   | /textfile0 (2).txt         |
      | item_type              | file                       |
      | mimetype               | text/plain                 |
      | storage_id             | shared::/textfile0 (2).txt |
      | storage                | A_NUMBER                   |
      | item_source            | A_NUMBER                   |
      | file_source            | A_NUMBER                   |
      | file_parent            | A_NUMBER                   |
      | file_target            | /textfile0 (2).txt         |
      | share_with             | user1                      |
      | share_with_displayname | User One                   |
      | mail_send              | 0                          |
    And user "user1" should see the following elements
      | /FOLDER/                 |
      | /PARENT/                 |
      | /textfile0.txt           |
      | /PARENT%20(2)/           |
      | /PARENT%20(2)/parent.txt |
      | /textfile0%20(2).txt     |
    And the sharing API should report to user "user1" that these shares are in the accepted state
      | path               |
      | /PARENT (2)/       |
      | /textfile0 (2).txt |

  Scenario Outline: accept a pending share when there is a default folder for received shares
    Given parameter "shareapi_auto_accept_share" of app "core" has been set to "no"
    And the administrator has set the default folder for received shares to "<share_folder>"
    And user "user0" has shared folder "/PARENT" with user "user1"
    And user "user0" has shared file "/textfile0.txt" with user "user1"
    When user "user1" accepts the share "/PARENT" offered by user "user0" using the sharing API
    And user "user1" accepts the share "/textfile0.txt" offered by user "user0" using the sharing API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the fields of the last response should include
      | id                     | A_NUMBER                                      |
      | share_type             | user                                          |
      | uid_owner              | user0                                         |
      | displayname_owner      | User Zero                                     |
      | permissions            | share,read,update                             |
      | uid_file_owner         | user0                                         |
      | displayname_file_owner | User Zero                                     |
      | state                  | 0                                             |
      | path                   | <top_folder>/<received_textfile_name>         |
      | item_type              | file                                          |
      | mimetype               | text/plain                                    |
      | storage_id             | shared::<top_folder>/<received_textfile_name> |
      | storage                | A_NUMBER                                      |
      | item_source            | A_NUMBER                                      |
      | file_source            | A_NUMBER                                      |
      | file_parent            | A_NUMBER                                      |
      | file_target            | <top_folder>/<received_textfile_name>         |
      | share_with             | user1                                         |
      | share_with_displayname | User One                                      |
      | mail_send              | 0                                             |
    And user "user1" should see the following elements
      | /FOLDER/                               |
      | /PARENT/                               |
      | <top_folder>/PARENT<suffix>/           |
      | <top_folder>/PARENT<suffix>/parent.txt |
      | /textfile0.txt                         |
      | <top_folder>/textfile0<suffix>.txt     |
    And the sharing API should report to user "user1" that these shares are in the accepted state
      | path                                  |
      | <top_folder>/<received_parent_name>/  |
      | <top_folder>/<received_textfile_name> |
    Examples:
      | share_folder        | top_folder          | suffix | received_parent_name | received_textfile_name |
      |                     |                     | %20(2) | PARENT (2)           | textfile0 (2).txt      |
      | /                   |                     | %20(2) | PARENT (2)           | textfile0 (2).txt      |
      | /ReceivedShares     | /ReceivedShares     |        | PARENT               | textfile0.txt          |
      | ReceivedShares      | /ReceivedShares     |        | PARENT               | textfile0.txt          |
      | /My/Received/Shares | /My/Received/Shares |        | PARENT               | textfile0.txt          |

  Scenario: accept an accepted share
    Given parameter "shareapi_auto_accept_share" of app "core" has been set to "no"
    And user "user0" has created folder "/shared"
    And user "user0" has shared folder "/shared" with user "user1"
    When user "user1" accepts the share "/shared" offered by user "user0" using the sharing API
    And user "user1" accepts the share "/shared" offered by user "user0" using the sharing API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "user1" should see the following elements
      | /shared/ |
    And the sharing API should report to user "user1" that these shares are in the accepted state
      | path     |
      | /shared/ |

  @smokeTest
  Scenario: declines a pending share
    Given parameter "shareapi_auto_accept_share" of app "core" has been set to "no"
    And user "user0" has shared folder "/PARENT" with user "user1"
    And user "user0" has shared file "/textfile0.txt" with user "user1"
    When user "user1" declines the share "/PARENT" offered by user "user0" using the sharing API
    And user "user1" declines the share "/textfile0.txt" offered by user "user0" using the sharing API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "user1" should see the following elements
      | /FOLDER/       |
      | /PARENT/       |
      | /textfile0.txt |
    But user "user1" should not see the following elements
      | /PARENT%20(2)/           |
      | /PARENT%20(2)/parent.txt |
      | /textfile0%20(2).txt     |
    And the sharing API should report to user "user1" that these shares are in the declined state
      | path           |
      | /PARENT/       |
      | /textfile0.txt |

  @smokeTest
  Scenario: decline an accepted share
    Given parameter "shareapi_auto_accept_share" of app "core" has been set to "no"
    And user "user0" has shared folder "/PARENT" with user "user1"
    And user "user0" has shared file "/textfile0.txt" with user "user1"
    And user "user1" has accepted the share "/PARENT" offered by user "user0"
    And user "user1" has accepted the share "/textfile0.txt" offered by user "user0"
    When user "user1" declines the share "/PARENT (2)" offered by user "user0" using the sharing API
    And user "user1" declines the share "/textfile0 (2).txt" offered by user "user0" using the sharing API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "user1" should not see the following elements
      | /PARENT%20(2)/           |
      | /PARENT%20(2)/parent.txt |
      | /textfile0%20(2).txt     |
    And the sharing API should report to user "user1" that these shares are in the declined state
      | path           |
      | /PARENT/       |
      | /textfile0.txt |

  Scenario: deleting shares in pending state
    Given parameter "shareapi_auto_accept_share" of app "core" has been set to "no"
    And user "user0" has shared folder "/PARENT" with user "user1"
    And user "user0" has shared file "/textfile0.txt" with user "user1"
    When user "user0" deletes folder "/PARENT" using the WebDAV API
    And user "user0" deletes file "/textfile0.txt" using the WebDAV API
    Then the sharing API should report that no shares are shared with user "user1"

  Scenario: only one user in a group accepts a share
    Given parameter "shareapi_auto_accept_share" of app "core" has been set to "no"
    And user "user0" has shared folder "/PARENT" with group "grp1"
    And user "user0" has shared file "/textfile0.txt" with group "grp1"
    When user "user1" accepts the share "/PARENT" offered by user "user0" using the sharing API
    And user "user1" accepts the share "/textfile0.txt" offered by user "user0" using the sharing API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "user2" should not see the following elements
      | /PARENT%20(2)/           |
      | /PARENT%20(2)/parent.txt |
      | /textfile0%20(2).txt     |
    And the sharing API should report to user "user2" that these shares are in the pending state
      | path           |
      | /PARENT/       |
      | /textfile0.txt |
    But user "user1" should see the following elements
      | /PARENT%20(2)/           |
      | /PARENT%20(2)/parent.txt |
      | /textfile0%20(2).txt     |
    And the sharing API should report to user "user1" that these shares are in the accepted state
      | path               |
      | /PARENT (2)/       |
      | /textfile0 (2).txt |

  Scenario: receive two shares with identical names from different users, accept one by one
    Given parameter "shareapi_auto_accept_share" of app "core" has been set to "no"
    And user "user0" has created folder "/shared"
    And user "user0" has created folder "/shared/user0"
    And user "user1" has created folder "/shared"
    And user "user1" has created folder "/shared/user1"
    And user "user0" has shared folder "/shared" with user "user2"
    And user "user1" has shared folder "/shared" with user "user2"
    When user "user2" accepts the share "/shared" offered by user "user1" using the sharing API
    And user "user2" accepts the share "/shared" offered by user "user0" using the sharing API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "user2" should see the following elements
      | /shared/user1/       |
      | /shared%20(2)/user0/ |
    And the sharing API should report to user "user2" that these shares are in the accepted state
      | path         |
      | /shared/     |
      | /shared (2)/ |

  Scenario: share with a group that you are part of yourself
    Given parameter "shareapi_auto_accept_share" of app "core" has been set to "no"
    When user "user0" shares folder "/PARENT" with group "grp1" using the sharing API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the sharing API should report to user "user1" that these shares are in the pending state
      | path     |
      | /PARENT/ |
    And the sharing API should report that no shares are shared with user "user0"

  Scenario: user accepts file that was initially accepted from another user and then declined
    Given parameter "shareapi_auto_accept_share" of app "core" has been set to "no"
    And user "user0" has uploaded file with content "file from user0" to "/testfile.txt"
    And user "user1" has uploaded file with content "file from user1" to "/testfile.txt"
    And user "user2" has uploaded file with content "file from user2" to "/testfile.txt"
    And user "user0" has shared file "/testfile.txt" with user "user2"
    And user "user2" has accepted the share "/testfile.txt" offered by user "user0"
    When user "user2" declines the share "/testfile (2).txt" offered by user "user0" using the sharing API
    And user "user1" shares file "/testfile.txt" with user "user2" using the sharing API
    And user "user2" accepts the share "/testfile.txt" offered by user "user1" using the sharing API
    And user "user2" accepts the share "/testfile.txt" offered by user "user0" using the sharing API
    Then the sharing API should report to user "user2" that these shares are in the accepted state
      | path                  |
      | /testfile (2).txt     |
      | /testfile (2) (2).txt |
    And the content of file "/testfile.txt" for user "user2" should be "file from user2"
    And the content of file "/testfile (2).txt" for user "user2" should be "file from user1"
    And the content of file "/testfile (2) (2).txt" for user "user2" should be "file from user0"

  Scenario: user accepts shares received from multiple users with the same name when auto-accept share is disabled
    Given parameter "shareapi_auto_accept_share" of app "core" has been set to "no"
    And user "user3" has been created with default attributes and skeleton files
    And user "user1" has shared folder "/PARENT" with user "user0"
    And user "user2" has shared folder "/PARENT" with user "user0"
    When user "user0" accepts the share "/PARENT" offered by user "user1" using the sharing API
    And user "user0" declines the share "/PARENT (2)" offered by user "user1" using the sharing API
    And user "user0" accepts the share "/PARENT" offered by user "user2" using the sharing API
    And user "user0" accepts the share "/PARENT" offered by user "user1" using the sharing API
    And user "user0" declines the share "/PARENT (2)" offered by user "user2" using the sharing API
    And user "user0" declines the share "/PARENT (2) (2)" offered by user "user1" using the sharing API
    And user "user3" shares folder "/PARENT" with user "user0" using the sharing API
    And user "user0" accepts the share "/PARENT" offered by user "user3" using the sharing API
    And user "user0" accepts the share "/PARENT" offered by user "user2" using the sharing API
    And user "user0" accepts the share "/PARENT" offered by user "user1" using the sharing API
    Then the sharing API should report to user "user0" that these shares are in the accepted state
      | path                 | uid_owner |
      | /PARENT (2)/         | user3     |
      | /PARENT (2) (2)/     | user2     |
      | /PARENT (2) (2) (2)/ | user1     |

  Scenario: user shares folder with matching folder-name for both user involved in sharing
    Given user "user0" uploads file with content "uploaded content" to "/PARENT/abc.txt" using the WebDAV API
    And user "user0" uploads file with content "uploaded content" to "/FOLDER/abc.txt" using the WebDAV API
    When user "user0" shares folder "/PARENT" with user "user1" using the sharing API
    And user "user0" shares folder "/FOLDER" with user "user1" using the sharing API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "user1" should see the following elements
      | /FOLDER/              |
      | /PARENT/              |
      | /PARENT%20(2)/        |
      | /PARENT%20(2)/abc.txt |
      | /FOLDER%20(2)/        |
      | /FOLDER%20(2)/abc.txt |
    And user "user1" should not see the following elements
      | /FOLDER/abc.txt |
      | /PARENT/abc.txt |
    And the content of file "/PARENT (2)/abc.txt" for user "user1" should be "uploaded content"
    And the content of file "/FOLDER (2)/abc.txt" for user "user1" should be "uploaded content"

  Scenario: user shares folder in a group with matching folder-name for every users involved
    Given user "user0" uploads file with content "uploaded content" to "/PARENT/abc.txt" using the WebDAV API
    And user "user0" uploads file with content "uploaded content" to "/FOLDER/abc.txt" using the WebDAV API
    When user "user0" shares folder "/PARENT" with group "grp1" using the sharing API
    And user "user0" shares folder "/FOLDER" with group "grp1" using the sharing API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "user1" should see the following elements
      | /FOLDER/              |
      | /PARENT/              |
      | /PARENT%20(2)/        |
      | /FOLDER%20(2)/        |
      | /PARENT%20(2)/abc.txt |
      | /FOLDER%20(2)/abc.txt |
    And user "user1" should not see the following elements
      | /FOLDER/abc.txt |
      | /PARENT/abc.txt |
    And user "user2" should see the following elements
      | /FOLDER/              |
      | /PARENT/              |
      | /PARENT%20(2)/        |
      | /FOLDER%20(2)/        |
      | /PARENT%20(2)/abc.txt |
      | /FOLDER%20(2)/abc.txt |
    And user "user2" should not see the following elements
      | /FOLDER/abc.txt |
      | /PARENT/abc.txt |
    And the content of file "/PARENT (2)/abc.txt" for user "user1" should be "uploaded content"
    And the content of file "/FOLDER (2)/abc.txt" for user "user1" should be "uploaded content"
    And the content of file "/PARENT (2)/abc.txt" for user "user2" should be "uploaded content"
    And the content of file "/FOLDER (2)/abc.txt" for user "user2" should be "uploaded content"

  Scenario: user shares files in a group with matching file-names for every users involved in sharing
    When user "user0" shares file "/textfile0.txt" with group "grp1" using the sharing API
    And user "user0" shares file "/textfile1.txt" with group "grp1" using the sharing API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "user1" should see the following elements
      | /textfile0.txt       |
      | /textfile1.txt       |
      | /textfile0%20(2).txt |
      | /textfile1%20(2).txt |
    And user "user2" should see the following elements
      | /textfile0.txt       |
      | /textfile1.txt       |
      | /textfile0%20(2).txt |
      | /textfile1%20(2).txt |

  Scenario: user shares resource with matching resource-name with another user when auto accept is disabled
    Given parameter "shareapi_auto_accept_share" of app "core" has been set to "no"
    When user "user0" shares folder "/PARENT" with user "user1" using the sharing API
    And user "user0" shares file "/textfile0.txt" with user "user1" using the sharing API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "user1" should see the following elements
      | /PARENT/       |
      | /textfile0.txt |
    But user "user1" should not see the following elements
      | /textfile0%20(2).txt |
      | /PARENT%20(2)/       |
    When user "user1" accepts the share "/textfile0.txt" offered by user "user0" using the sharing API
    And user "user1" accepts the share "/PARENT" offered by user "user0" using the sharing API
    Then user "user1" should see the following elements
      | /PARENT/             |
      | /textfile0.txt       |
      | /PARENT%20(2)/       |
      | /textfile0%20(2).txt |

  Scenario: user shares file in a group with matching filename when auto accept is disabled
    Given parameter "shareapi_auto_accept_share" of app "core" has been set to "no"
    When user "user0" shares file "/textfile0.txt" with group "grp1" using the sharing API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "user1" should see the following elements
      | /textfile0.txt |
    But user "user1" should not see the following elements
      | /textfile0%20(2).txt |
    And user "user2" should see the following elements
      | /textfile0.txt |
    But user "user2" should not see the following elements
      | /textfile0%20(2).txt |
    When user "user1" accepts the share "/textfile0.txt" offered by user "user0" using the sharing API
    Then user "user1" should see the following elements
      | /textfile0.txt       |
      | /textfile0%20(2).txt |
    When user "user2" accepts the share "/textfile0.txt" offered by user "user0" using the sharing API
    Then user "user2" should see the following elements
      | /textfile0.txt       |
      | /textfile0%20(2).txt |

  @skipOnLDAP
  Scenario: user shares folder with matching folder name a user before that user has logged in
    Given these users have been created with skeleton files but not initialized:
      | username |
      | user3    |
    And user "user0" uploads file with content "uploaded content" to "/PARENT/abc.txt" using the WebDAV API
    When user "user0" shares folder "/PARENT" with user "user3" using the sharing API
    Then user "user3" should see the following elements
      | /PARENT/        |
      | /PARENT/abc.txt |
      | /FOLDER/        |
      | /textfile0.txt  |
      | /textfile1.txt  |
      | /textfile2.txt  |
      | /textfile3.txt  |
    And user "user3" should not see the following elements
      | /PARENT%20(2)/ |
    And the content of file "/PARENT/abc.txt" for user "user3" should be "uploaded content"
