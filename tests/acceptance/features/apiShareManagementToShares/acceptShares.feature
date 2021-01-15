@api @files_sharing-app-required @issue-ocis-reva-34 @issue-ocis-reva-41 @issue-ocis-reva-243
Feature: accept/decline shares coming from internal users
  As a user
  I want to have control of which received shares I accept
  So that I can keep my file system clean

  Background:
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And using OCS API version "1"
    And using new DAV path
    And these users have been created with default attributes and skeleton files:
      | username |
      | Alice    |
      | Brian    |
      | Carol    |
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"

  @smokeTest
  Scenario: share a file & folder with another internal group when auto accept is disabled
    When user "Alice" shares folder "/PARENT" with group "grp1" using the sharing API
    And user "Alice" shares file "/textfile0.txt" with group "grp1" using the sharing API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "Brian" should see the following elements
      | /FOLDER/       |
      | /PARENT/       |
      | /textfile0.txt |
    But user "Brian" should not see the following elements
      | /Shares/PARENT/           |
      | /Shares/PARENT/parent.txt |
      | /Shares/textfile0.txt     |
    And the sharing API should report to user "Brian" that these shares are in the pending state
      | path           |
      | /PARENT/       |
      | /textfile0.txt |
    And user "Carol" should see the following elements
      | /FOLDER/       |
      | /PARENT/       |
      | /textfile0.txt |
    But user "Carol" should not see the following elements
      | /Shares/PARENT/           |
      | /Shares/PARENT/parent.txt |
      | /Shares/textfile0.txt     |
    And the sharing API should report to user "Carol" that these shares are in the pending state
      | path           |
      | /PARENT/       |
      | /textfile0.txt |

  Scenario: share a file & folder with another internal user when auto accept is disabled
    When user "Alice" shares folder "/PARENT" with user "Brian" using the sharing API
    And user "Alice" shares file "/textfile0.txt" with user "Brian" using the sharing API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "Brian" should see the following elements
      | /FOLDER/       |
      | /PARENT/       |
      | /textfile0.txt |
    But user "Brian" should not see the following elements
      | /Shares/PARENT/           |
      | /Shares/PARENT/parent.txt |
      | /Shares/textfile0.txt     |
    And the sharing API should report to user "Brian" that these shares are in the pending state
      | path           |
      | /PARENT/       |
      | /textfile0.txt |

  @smokeTest
  Scenario: accept a pending share
    Given user "Alice" has shared folder "/PARENT" with user "Brian"
    And user "Alice" has shared file "/textfile0.txt" with user "Brian"
    When user "Brian" accepts share "/PARENT" offered by user "Alice" using the sharing API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "Brian" accepts share "/textfile0.txt" offered by user "Alice" using the sharing API
    And the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the fields of the last response to user "Alice" sharing with user "Brian" should include
      | id                     | A_STRING                      |
      | share_type             | user                          |
      | uid_owner              | %username%                    |
      | displayname_owner      | %displayname%                 |
      | permissions            | share,read,update             |
      | uid_file_owner         | %username%                    |
      | displayname_file_owner | %displayname%                 |
      | state                  | 0                             |
      | path                   | /Shares/textfile0.txt         |
      | item_type              | file                          |
      | mimetype               | text/plain                    |
      | storage_id             | shared::/Shares/textfile0.txt |
      | storage                | A_STRING                      |
      | item_source            | A_STRING                      |
      | file_source            | A_STRING                      |
      | file_target            | /Shares/textfile0.txt         |
      | share_with             | %username%                    |
      | share_with_displayname | %displayname%                 |
      | mail_send              | 0                             |
    And user "Brian" should see the following elements
      | /FOLDER/                  |
      | /PARENT/                  |
      | /textfile0.txt            |
      | /Shares/PARENT/           |
      | /Shares/PARENT/parent.txt |
      | /Shares/textfile0.txt     |
    And the sharing API should report to user "Brian" that these shares are in the accepted state
      | path                  |
      | /Shares/PARENT        |
      | /Shares/textfile0.txt |

  @notToImplementOnOCIS
  Scenario Outline: accept a pending share when there is a default folder for received shares
    Given the administrator has set the default folder for received shares to "<share_folder>"
    And user "Alice" has shared folder "/PARENT" with user "Brian"
    And user "Alice" has shared file "/textfile0.txt" with user "Brian"
    When user "Brian" accepts share "/PARENT" offered by user "Alice" using the sharing API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "Brian" accepts share "/textfile0.txt" offered by user "Alice" using the sharing API
    And the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the fields of the last response to user "Alice" sharing with user "Brian" should include
      | id                     | A_STRING                                      |
      | share_type             | user                                          |
      | uid_owner              | %username%                                    |
      | displayname_owner      | %displayname%                                 |
      | permissions            | share,read,update                             |
      | uid_file_owner         | %username%                                    |
      | displayname_file_owner | %displayname%                                 |
      | state                  | 0                                             |
      | path                   | <top_folder>/<received_textfile_name>         |
      | item_type              | file                                          |
      | mimetype               | text/plain                                    |
      | storage_id             | shared::<top_folder>/<received_textfile_name> |
      | storage                | A_STRING                                      |
      | item_source            | A_STRING                                      |
      | file_source            | A_STRING                                      |
      | file_target            | <top_folder>/<received_textfile_name>         |
      | share_with             | %username%                                    |
      | share_with_displayname | %displayname%                                 |
      | mail_send              | 0                                             |
    And user "Brian" should see the following elements
      | /FOLDER/                               |
      | /PARENT/                               |
      | <top_folder>/PARENT<suffix>/           |
      | <top_folder>/PARENT<suffix>/parent.txt |
      | /textfile0.txt                         |
      | <top_folder>/textfile0<suffix>.txt     |
    And the sharing API should report to user "Brian" that these shares are in the accepted state
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
    Given user "Alice" has created folder "/shared"
    And user "Alice" has shared folder "/shared" with user "Brian"
    When user "Brian" accepts share "/shared" offered by user "Alice" using the sharing API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "Brian" should see the following elements
      | /Shares/shared/ |
    And the sharing API should report to user "Brian" that these shares are in the accepted state
      | path            |
      | /Shares/shared/ |

  @smokeTest
  Scenario: declines a pending share
    Given user "Alice" has shared folder "/PARENT" with user "Brian"
    And user "Alice" has shared file "/textfile0.txt" with user "Brian"
    When user "Brian" declines share "/PARENT" offered by user "Alice" using the sharing API
    And user "Brian" declines share "/textfile0.txt" offered by user "Alice" using the sharing API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "Brian" should see the following elements
      | /FOLDER/       |
      | /PARENT/       |
      | /textfile0.txt |
    But user "Brian" should not see the following elements
      | /Shares/PARENT/           |
      | /Shares/PARENT/parent.txt |
      | /Shares/textfile0.txt     |
    And the sharing API should report to user "Brian" that these shares are in the declined state
      | path           |
      | /PARENT/       |
      | /textfile0.txt |

  @smokeTest
  Scenario: decline an accepted share
    Given user "Alice" has shared folder "/PARENT" with user "Brian"
    And user "Alice" has shared file "/textfile0.txt" with user "Brian"
    And user "Brian" has accepted share "/PARENT" offered by user "Alice"
    And user "Brian" has accepted share "/textfile0.txt" offered by user "Alice"
    When user "Brian" declines share "/Shares/PARENT" offered by user "Alice" using the sharing API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "Brian" declines share "/Shares/textfile0.txt" offered by user "Alice" using the sharing API
    And the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "Brian" should not see the following elements
      | /Shares/PARENT/           |
      | /Shares/PARENT/parent.txt |
      | /Shares/textfile0.txt     |
    And the sharing API should report to user "Brian" that these shares are in the declined state
      | path           |
      | /PARENT/       |
      | /textfile0.txt |

  Scenario: deleting shares in pending state
    Given user "Alice" has shared folder "/PARENT" with user "Brian"
    And user "Alice" has shared file "/textfile0.txt" with user "Brian"
    When user "Alice" deletes folder "/PARENT" using the WebDAV API
    And user "Alice" deletes file "/textfile0.txt" using the WebDAV API
    Then the sharing API should report that no shares are shared with user "Brian"

  Scenario: only one user in a group accepts a share
    Given user "Alice" has shared folder "/PARENT" with group "grp1"
    And user "Alice" has shared file "/textfile0.txt" with group "grp1"
    When user "Brian" accepts share "/PARENT" offered by user "Alice" using the sharing API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "Brian" accepts share "/textfile0.txt" offered by user "Alice" using the sharing API
    And the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "Carol" should not see the following elements
      | /Shares/PARENT/           |
      | /Shares/PARENT/parent.txt |
      | /Shares/textfile0.txt     |
    And the sharing API should report to user "Carol" that these shares are in the pending state
      | path           |
      | /PARENT/       |
      | /textfile0.txt |
    But user "Brian" should see the following elements
      | /Shares/PARENT/           |
      | /Shares/PARENT/parent.txt |
      | /Shares/textfile0.txt     |
    And the sharing API should report to user "Brian" that these shares are in the accepted state
      | path                  |
      | /Shares/PARENT/       |
      | /Shares/textfile0.txt |

  Scenario: receive two shares with identical names from different users, accept one by one
    Given user "Alice" has created folder "/shared"
    And user "Alice" has created folder "/shared/Alice"
    And user "Brian" has created folder "/shared"
    And user "Brian" has created folder "/shared/Brian"
    And user "Alice" has shared folder "/shared" with user "Carol"
    And user "Brian" has shared folder "/shared" with user "Carol"
    When user "Carol" accepts share "/shared" offered by user "Brian" using the sharing API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "Carol" accepts share "/shared" offered by user "Alice" using the sharing API
    And the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "Carol" should see the following elements
      | /Shares/shared/Brian/       |
      | /Shares/shared%20(2)/Alice/ |
    And the sharing API should report to user "Carol" that these shares are in the accepted state
      | path                |
      | /Shares/shared/     |
      | /Shares/shared (2)/ |

  Scenario: share with a group that you are part of yourself
    When user "Alice" shares folder "/PARENT" with group "grp1" using the sharing API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the sharing API should report to user "Brian" that these shares are in the pending state
      | path     |
      | /PARENT/ |
    And the sharing API should report that no shares are shared with user "Alice"

  Scenario: user accepts file that was initially accepted from another user and then declined
    Given user "Alice" has uploaded file with content "First file" to "/testfile.txt"
    And user "Brian" has uploaded file with content "Second file" to "/testfile.txt"
    And user "Carol" has created folder "Shares"
    And user "Carol" has uploaded file with content "Third file" to "/Shares/testfile.txt"
    And user "Alice" has shared file "/testfile.txt" with user "Carol"
    And user "Carol" has accepted share "/testfile.txt" offered by user "Alice"
    When user "Carol" declines share "/Shares/testfile (2).txt" offered by user "Alice" using the sharing API
    And user "Brian" shares file "/testfile.txt" with user "Carol" using the sharing API
    And user "Carol" accepts share "/testfile.txt" offered by user "Brian" using the sharing API
    And user "Carol" accepts share "/testfile.txt" offered by user "Alice" using the sharing API
    Then the sharing API should report to user "Carol" that these shares are in the accepted state
      | path                         |
      | /Shares/testfile (2).txt     |
      | /Shares/testfile (2) (2).txt |
    And the content of file "/Shares/testfile.txt" for user "Carol" should be "Third file"
    And the content of file "/Shares/testfile (2).txt" for user "Carol" should be "Second file"
    And the content of file "/Shares/testfile (2) (2).txt" for user "Carol" should be "First file"

  Scenario: user accepts shares received from multiple users with the same name when auto-accept share is disabled
    Given user "David" has been created with default attributes and skeleton files
    And user "Brian" has shared folder "/PARENT" with user "Alice"
    And user "Carol" has shared folder "/PARENT" with user "Alice"
    And user "Alice" has created folder "Shares"
    And user "Alice" has created folder "Shares/PARENT"
    When user "Alice" accepts share "/PARENT" offered by user "Brian" using the sharing API
    And user "Alice" declines share "/Shares/PARENT (2)" offered by user "Brian" using the sharing API
    And user "Alice" accepts share "/PARENT" offered by user "Carol" using the sharing API
    And user "Alice" accepts share "/PARENT" offered by user "Brian" using the sharing API
    And user "Alice" declines share "/Shares/PARENT (2)" offered by user "Carol" using the sharing API
    And user "Alice" declines share "/Shares/PARENT (2) (2)" offered by user "Brian" using the sharing API
    And user "David" shares folder "/PARENT" with user "Alice" using the sharing API
    And user "Alice" accepts share "/PARENT" offered by user "David" using the sharing API
    And user "Alice" accepts share "/PARENT" offered by user "Carol" using the sharing API
    And user "Alice" accepts share "/PARENT" offered by user "Brian" using the sharing API
    Then the sharing API should report to user "Alice" that these shares are in the accepted state
      | path                        | uid_owner |
      | /Shares/PARENT (2)/         | David     |
      | /Shares/PARENT (2) (2)/     | Carol     |
      | /Shares/PARENT (2) (2) (2)/ | Brian     |

  Scenario: user shares folder with matching folder-name for both user involved in sharing
    Given user "Alice" uploads file with content "uploaded content" to "/PARENT/abc.txt" using the WebDAV API
    And user "Alice" uploads file with content "uploaded content" to "/FOLDER/abc.txt" using the WebDAV API
    When user "Alice" shares folder "/PARENT" with user "Brian" using the sharing API
    And user "Alice" shares folder "/FOLDER" with user "Brian" using the sharing API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    When user "Brian" accepts share "/PARENT" offered by user "Alice" using the sharing API
    And user "Brian" accepts share "/FOLDER" offered by user "Alice" using the sharing API
    Then user "Brian" should see the following elements
      | /FOLDER/               |
      | /PARENT/               |
      | /Shares/PARENT/        |
      | /Shares/PARENT/abc.txt |
      | /Shares/FOLDER/        |
      | /Shares/FOLDER/abc.txt |
    And user "Brian" should not see the following elements
      | /FOLDER/abc.txt |
      | /PARENT/abc.txt |
    And the content of file "/Shares/PARENT/abc.txt" for user "Brian" should be "uploaded content"
    And the content of file "/Shares/FOLDER/abc.txt" for user "Brian" should be "uploaded content"

  Scenario: user shares folder in a group with matching folder-name for every users involved
    Given user "Alice" uploads file with content "uploaded content" to "/PARENT/abc.txt" using the WebDAV API
    And user "Alice" uploads file with content "uploaded content" to "/FOLDER/abc.txt" using the WebDAV API
    When user "Alice" shares folder "/PARENT" with group "grp1" using the sharing API
    And user "Alice" shares folder "/FOLDER" with group "grp1" using the sharing API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    When user "Brian" accepts share "/PARENT" offered by user "Alice" using the sharing API
    And user "Brian" accepts share "/FOLDER" offered by user "Alice" using the sharing API
    And user "Carol" accepts share "/PARENT" offered by user "Alice" using the sharing API
    And user "Carol" accepts share "/FOLDER" offered by user "Alice" using the sharing API
    Then user "Brian" should see the following elements
      | /FOLDER/               |
      | /PARENT/               |
      | /Shares/PARENT/        |
      | /Shares/FOLDER/        |
      | /Shares/PARENT/abc.txt |
      | /Shares/FOLDER/abc.txt |
    And user "Brian" should not see the following elements
      | /FOLDER/abc.txt |
      | /PARENT/abc.txt |
    And user "Carol" should see the following elements
      | /FOLDER/               |
      | /PARENT/               |
      | /Shares/PARENT/        |
      | /Shares/FOLDER/        |
      | /Shares/PARENT/abc.txt |
      | /Shares/FOLDER/abc.txt |
    And user "Carol" should not see the following elements
      | /FOLDER/abc.txt |
      | /PARENT/abc.txt |
    And the content of file "/Shares/PARENT/abc.txt" for user "Brian" should be "uploaded content"
    And the content of file "/Shares/FOLDER/abc.txt" for user "Brian" should be "uploaded content"
    And the content of file "/Shares/PARENT/abc.txt" for user "Carol" should be "uploaded content"
    And the content of file "/Shares/FOLDER/abc.txt" for user "Carol" should be "uploaded content"

  Scenario: user shares files in a group with matching file-names for every users involved in sharing
    When user "Alice" shares file "/textfile0.txt" with group "grp1" using the sharing API
    And user "Alice" shares file "/textfile1.txt" with group "grp1" using the sharing API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    When user "Brian" accepts share "/textfile0.txt" offered by user "Alice" using the sharing API
    And user "Brian" accepts share "/textfile1.txt" offered by user "Alice" using the sharing API
    And user "Carol" accepts share "/textfile0.txt" offered by user "Alice" using the sharing API
    And user "Carol" accepts share "/textfile1.txt" offered by user "Alice" using the sharing API
    Then user "Brian" should see the following elements
      | /textfile0.txt        |
      | /textfile1.txt        |
      | /Shares/textfile0.txt |
      | /Shares/textfile1.txt |
    And user "Carol" should see the following elements
      | /textfile0.txt        |
      | /textfile1.txt        |
      | /Shares/textfile0.txt |
      | /Shares/textfile1.txt |

  Scenario: user shares resource with matching resource-name with another user when auto accept is disabled
    Given user "Alice" shares folder "/PARENT" with user "Brian" using the sharing API
    And user "Alice" shares file "/textfile0.txt" with user "Brian" using the sharing API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "Brian" should see the following elements
      | /PARENT/       |
      | /textfile0.txt |
    But user "Brian" should not see the following elements
      | /Shares/textfile0.txt |
      | /Shares/PARENT/       |
    When user "Brian" accepts share "/textfile0.txt" offered by user "Alice" using the sharing API
    And user "Brian" accepts share "/PARENT" offered by user "Alice" using the sharing API
    Then user "Brian" should see the following elements
      | /PARENT/              |
      | /textfile0.txt        |
      | /Shares/PARENT/       |
      | /Shares/textfile0.txt |

  Scenario: user shares file in a group with matching filename when auto accept is disabled
    When user "Alice" shares file "/textfile0.txt" with group "grp1" using the sharing API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "Brian" should see the following elements
      | /textfile0.txt |
    But user "Brian" should not see the following elements
      | /Shares/textfile0.txt |
    And user "Carol" should see the following elements
      | /textfile0.txt |
    But user "Carol" should not see the following elements
      | /Shares/textfile0.txt |
    When user "Brian" accepts share "/textfile0.txt" offered by user "Alice" using the sharing API
    Then user "Brian" should see the following elements
      | /textfile0.txt        |
      | /Shares/textfile0.txt |
    When user "Carol" accepts share "/textfile0.txt" offered by user "Alice" using the sharing API
    Then user "Carol" should see the following elements
      | /textfile0.txt        |
      | /Shares/textfile0.txt |

  @skipOnLDAP
  Scenario: user shares folder with matching folder name a user before that user has logged in
    Given these users have been created with skeleton files but not initialized:
      | username |
      | David    |
    And user "Alice" uploads file with content "uploaded content" to "/PARENT/abc.txt" using the WebDAV API
    When user "Alice" shares folder "/PARENT" with user "David" using the sharing API
    And user "David" accepts share "/PARENT" offered by user "Alice" using the sharing API
    Then user "David" should see the following elements
      | /Shares/PARENT/        |
      | /Shares/PARENT/abc.txt |
      | /FOLDER/               |
      | /textfile0.txt         |
      | /textfile1.txt         |
      | /textfile2.txt         |
      | /textfile3.txt         |
    And user "David" should not see the following elements
      | /PARENT%20(2)/ |
    And the content of file "/Shares/PARENT/abc.txt" for user "David" should be "uploaded content"

  @issue-ocis-1123
  Scenario Outline: deleting a share accepted file and folder
    Given user "Alice" has shared folder "/PARENT" with user "Brian"
    And user "Brian" has accepted share "/PARENT" offered by user "Alice"
    When user "Brian" deletes file "/Shares/PARENT" using the WebDAV API
    Then the HTTP status code should be "204"
    And the sharing API should report to user "Brian" that these shares are in the declined state
      | path                 |
      | /PARENT              |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @issue-ocis-765
  Scenario: shares exist after restoring already shared file to a previous version
    And user "Alice" has uploaded file with content "Test Content." to "/toShareFile.txt"
    And user "Alice" has uploaded file with content "Content Test Updated." to "/toShareFile.txt"
    And user "Alice" has shared file "/toShareFile.txt" with user "Brian"
    And user "Brian" has accepted share "/toShareFile.txt" offered by user "Alice"
    When user "Alice" restores version index "1" of file "/toShareFile.txt" using the WebDAV API
    Then the content of file "/toShareFile.txt" for user "Alice" should be "Test Content."
    And the content of file "/Shares/toShareFile.txt" for user "Brian" should be "Test Content."