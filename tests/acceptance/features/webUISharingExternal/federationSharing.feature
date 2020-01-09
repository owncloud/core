@webUI @federation-app-required @insulated @disablePreviews @TestAlsoOnExternalUserBackend @files_sharing-app-required
Feature: Federation Sharing - sharing with users on other cloud storages
  As a user
  I want to share files with any users on other cloud storages
  So that other users have access to these files

  Background:
    Given using server "REMOTE"
    And user "user1" has been created with default attributes and without skeleton files
    And user "user1" has created folder "simple-folder"
    And user "user1" has created folder "simple-empty-folder"
    And user "user1" has uploaded file with content "I am lorem.txt inside simple-folder" to "/simple-folder/lorem.txt"
    And user "user1" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And using server "LOCAL"
    And user "user1" has been created with default attributes and without skeleton files
    And user "user1" has created folder "simple-folder"
    And user "user1" has created folder "simple-empty-folder"
    And user "user1" has uploaded file with content "I am lorem.txt inside simple-folder" to "/simple-folder/lorem.txt"
    And user "user1" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And user "user1" has logged in using the webUI
    And parameter "auto_accept_trusted" of app "federatedfilesharing" has been set to "no"

  Scenario: test the single steps of sharing a folder to a remote server
    When the user shares folder "simple-folder" with remote user "user1@%remote_server_without_scheme%" using the webUI
    And user "user1" from server "REMOTE" accepts the last pending share using the sharing API
    And the user shares folder "simple-empty-folder" with remote user "user1@%remote_server_without_scheme%" using the webUI
    And user "user1" from server "REMOTE" accepts the last pending share using the sharing API
    And using server "REMOTE"
    Then as "user1" folder "/simple-folder (2)" should exist
    And as "user1" file "/simple-folder (2)/lorem.txt" should exist
    And as "user1" folder "/simple-empty-folder (2)" should exist

  Scenario: test the single steps of receiving a federation share
    Given using server "REMOTE"
    And these users have been created with default attributes and without skeleton files:
      | username |
      | user2    |
      | user3    |
    And user "user2" has created folder "simple-empty-folder"
    And user "user3" has uploaded file with content "I am lorem.txt" to "/lorem.txt"
    And user "user1" from server "REMOTE" has shared "simple-folder" with user "user1" from server "LOCAL"
    And user "user2" from server "REMOTE" has shared "simple-empty-folder" with user "user1" from server "LOCAL"
    And user "user3" from server "REMOTE" has shared "lorem.txt" with user "user1" from server "LOCAL"
    And the user has reloaded the current page of the webUI
    Then dialogs should be displayed on the webUI
      | title        | content                                                                                             |
      | Remote share | Do you want to add the remote share /simple-folder from user1@%remote_server_without_scheme%?       |
      | Remote share | Do you want to add the remote share /simple-empty-folder from user2@%remote_server_without_scheme%? |
      | Remote share | Do you want to add the remote share /lorem.txt from user3@%remote_server_without_scheme%?           |
    When the user accepts the offered remote shares using the webUI
    Then file "lorem (2).txt" should be listed on the webUI
    And the content of file "lorem (2).txt" for user "user1" on server "LOCAL" should be "I am lorem.txt"
    And folder "simple-folder (2)" should be listed on the webUI
    And file "lorem.txt" should be listed in folder "simple-folder (2)" on the webUI
    And the content of file "simple-folder (2)/lorem.txt" for user "user1" on server "LOCAL" should be "I am lorem.txt inside simple-folder"
    And file "lorem (2).txt" should be listed in the shared-with-you page on the webUI
    And folder "simple-folder (2)" should be listed in the shared-with-you page on the webUI
    And folder "simple-empty-folder (2)" should be listed in the shared-with-you page on the webUI

  Scenario: declining a federation share on the webUI
    Given user "user1" from server "REMOTE" has shared "/lorem.txt" with user "user1" from server "LOCAL"
    And the user has reloaded the current page of the webUI
    When the user declines the offered remote shares using the webUI
    Then file "lorem (2).txt" should not be listed on the webUI
    And file "lorem (2).txt" should not be listed in the shared-with-you page on the webUI

  Scenario: automatically accept a federation share when it is allowed by the config
    Given parameter "autoAddServers" of app "federation" has been set to "1"
    And user "user1" from server "REMOTE" has shared "simple-folder" with user "user1" from server "LOCAL"
    And user "user1" from server "LOCAL" has accepted the last pending share
    And the user has reloaded the current page of the webUI
    And parameter "auto_accept_trusted" of app "federatedfilesharing" has been set to "yes"
    And parameter "autoAddServers" of app "federation" has been set to "0"
    When user "user1" from server "REMOTE" shares "/lorem.txt" with user "user1" from server "LOCAL" using the sharing API
    And the user has reloaded the current page of the webUI
    Then file "lorem (2).txt" should be listed on the webUI

  Scenario: User-based auto accepting is disabled while global is enabled
    Given parameter "autoAddServers" of app "federation" has been set to "1"
    And user "user1" from server "REMOTE" has shared "simple-folder" with user "user1" from server "LOCAL"
    And user "user1" from server "LOCAL" has accepted the last pending share
    And the user has reloaded the current page of the webUI
    And parameter "auto_accept_trusted" of app "federatedfilesharing" has been set to "yes"
    And parameter "autoAddServers" of app "federation" has been set to "0"
    And the user has browsed to the personal sharing settings page
    When the user disables automatically accepting remote shares from trusted servers
    And user "user1" from server "REMOTE" shares "/lorem.txt" with user "user1" from server "LOCAL" using the sharing API
    Then user "user1" should not see the following elements
      | /lorem%20(2).txt |

  Scenario: one user disabling user-based auto accepting while global is enabled has no effect on other users
    Given user "user2" has been created with default attributes and without skeleton files
    And user "user2" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And parameter "autoAddServers" of app "federation" has been set to "1"
    And user "user1" from server "REMOTE" has shared "simple-folder" with user "user1" from server "LOCAL"
    And user "user1" from server "LOCAL" has accepted the last pending share
    And the user has reloaded the current page of the webUI
    And parameter "auto_accept_trusted" of app "federatedfilesharing" has been set to "yes"
    And parameter "autoAddServers" of app "federation" has been set to "0"
    And the user has browsed to the personal sharing settings page
    When the user disables automatically accepting remote shares from trusted servers
    And user "user1" from server "REMOTE" shares "/lorem.txt" with user "user2" from server "LOCAL" using the sharing API
    Then user "user2" should see the following elements
      | /lorem%20(2).txt |

  Scenario: User-based accepting from trusted server checkbox is not visible while global is disabled
    Given parameter "autoAddServers" of app "federation" has been set to "1"
    And user "user1" from server "REMOTE" has shared "simple-folder" with user "user1" from server "LOCAL"
    And user "user1" from server "LOCAL" has accepted the last pending share
    And the user has reloaded the current page of the webUI
    And parameter "auto_accept_trusted" of app "federatedfilesharing" has been set to "no"
    And parameter "autoAddServers" of app "federation" has been set to "0"
    And the user has browsed to the personal sharing settings page
    Then User-based auto accepting from trusted servers checkbox should not be displayed on the personal sharing settings page on the webUI

  @skip @issue-34742
  Scenario: User-based & global auto accepting is enabled but remote server is not trusted
    Given parameter "auto_accept_trusted" of app "federatedfilesharing" has been set to "yes"
    And parameter "autoAddServers" of app "federation" has been set to "0"
    And the user has browsed to the personal sharing settings page
    When the user disables automatically accepting remote shares from trusted servers
    And the user enables automatically accepting remote shares from trusted servers
    And user "user1" from server "REMOTE" shares "/lorem.txt" with user "user1" from server "LOCAL" using the sharing API
    Then user "user1" should not see the following elements
      | /lorem%20(2).txt |

  @skipOnMICROSOFTEDGE @skipOnOcV10.3
  Scenario: share a folder with an remote user and prohibit deleting - local server shares - remote server receives
    Given using server "REMOTE"
    And user "user1" from server "REMOTE" has shared "simple-folder" with user "user1" from server "LOCAL"
    When the user updates the last share using the sharing API with
      | permissions | read |
    And the user re-logs in as "user1" using the webUI
    And the user accepts the offered remote shares using the webUI
    And the user opens folder "simple-folder (2)" using the webUI
    Then it should not be possible to delete file "lorem.txt" using the webUI

  @skipOnMICROSOFTEDGE
  Scenario: share a folder with an remote user and prohibit deleting - remote server shares - local server receives
    # permissions read+update+create = 7 (no delete, no (re)share permission)
    Given user "user1" from server "REMOTE" has shared "simple-folder" with user "user1" from server "LOCAL" with permissions "create,read,update"
    When the user browses to the files page
    And the user accepts the offered remote shares using the webUI
    And the user opens folder "simple-folder (2)" using the webUI
    Then it should not be possible to delete file "lorem.txt" using the webUI

  Scenario: overwrite a file in a received share - local server shares - remote server receives
    Given user "user1" from server "LOCAL" has shared "simple-folder" with user "user1" from server "REMOTE"
    And user "user1" from server "REMOTE" has accepted the last pending share
    When user "user1" on "REMOTE" uploads file "filesForUpload/lorem.txt" to "simple-folder (2)/lorem.txt" using the WebDAV API
    And the user opens folder "simple-folder" using the webUI
    Then file "lorem.txt" should be listed on the webUI
    And the content of "lorem.txt" on the local server should be the same as the local "lorem.txt"

  Scenario: overwrite a file in a received share - remote server shares - local server receives
    Given user "user1" from server "REMOTE" has shared "simple-folder" with user "user1" from server "LOCAL"
    And the user has reloaded the current page of the webUI
    When the user accepts the offered remote shares using the webUI
    And the user opens folder "simple-folder (2)" using the webUI
    And the user uploads overwriting file "lorem.txt" using the webUI and retries if the file is locked
    And using server "REMOTE"
    Then as "user1" file "simple-folder/lorem.txt" should exist
    And the content of "simple-folder/lorem.txt" on the remote server for user "user1" should be the same as the local "lorem.txt"

  Scenario: upload a new file in a received share - local server shares - remote server receives
    Given user "user1" from server "LOCAL" has shared "simple-folder" with user "user1" from server "REMOTE"
    And user "user1" from server "REMOTE" has accepted the last pending share
    When user "user1" on "REMOTE" uploads file "filesForUpload/new-lorem.txt" to "simple-folder (2)/new-lorem.txt" using the WebDAV API
    And the user opens folder "simple-folder" using the webUI
    Then file "new-lorem.txt" should be listed on the webUI
    And the content of "new-lorem.txt" on the local server should be the same as the local "new-lorem.txt"

  Scenario: upload a new file in a received share - remote server shares - local server receives
    Given user "user1" from server "REMOTE" has shared "simple-folder" with user "user1" from server "LOCAL"
    And the user has reloaded the current page of the webUI
    When the user accepts the offered remote shares using the webUI
    And the user opens folder "simple-folder (2)" using the webUI
    And the user uploads file "new-lorem.txt" using the webUI
    And using server "REMOTE"
    Then as "user1" file "simple-folder/new-lorem.txt" should exist
    And the content of "simple-folder/new-lorem.txt" on the remote server for user "user1" should be the same as the local "new-lorem.txt"

  Scenario: rename a file in a received share - local server shares - remote server receives
    Given user "user1" from server "LOCAL" has shared "simple-folder" with user "user1" from server "REMOTE"
    And user "user1" from server "REMOTE" has accepted the last pending share
    When user "user1" on "REMOTE" moves file "/simple-folder (2)/lorem.txt" to "/simple-folder (2)/renamed file.txt" using the WebDAV API
    And the user opens folder "simple-folder" using the webUI
    Then file "renamed file.txt" should be listed on the webUI
    But file "lorem.txt" should not be listed on the webUI
    And the content of file "simple-folder/renamed file.txt" for user "user1" on server "LOCAL" should be "I am lorem.txt inside simple-folder"

  @skipOnFIREFOX
  Scenario: rename a file in a received share - remote server shares - local server receives
    Given user "user1" from server "REMOTE" has shared "simple-folder" with user "user1" from server "LOCAL"
    And the user has reloaded the current page of the webUI
    When the user accepts the offered remote shares using the webUI
    And the user opens folder "simple-folder (2)" using the webUI
    And the user renames file "lorem.txt" to "renamed file.txt" using the webUI
    And using server "REMOTE"
    Then as "user1" file "simple-folder/renamed file.txt" should exist
    And the content of file "simple-folder/renamed file.txt" for user "user1" on server "REMOTE" should be "I am lorem.txt inside simple-folder"
    But as "user1" file "simple-folder/lorem.txt" should not exist

  Scenario: delete a file in a received share - local server shares - remote server receives
    Given user "user1" has uploaded file "filesForUpload/data.zip" to "/simple-folder/data.zip"
    And user "user1" from server "LOCAL" has shared "simple-folder" with user "user1" from server "REMOTE"
    And user "user1" from server "REMOTE" has accepted the last pending share
    When user "user1" on "REMOTE" deletes file "simple-folder (2)/data.zip" using the WebDAV API
    And the user opens folder "simple-folder" using the webUI
    Then file "data.zip" should not be listed on the webUI

  Scenario: delete a file in a received share - remote server shares - local server receives
    Given user "user1" on "REMOTE" has uploaded file "filesForUpload/data.zip" to "/simple-folder/data.zip"
    And user "user1" from server "REMOTE" has shared "simple-folder" with user "user1" from server "LOCAL"
    And the user has reloaded the current page of the webUI
    When the user accepts the offered remote shares using the webUI
    And the user opens folder "simple-folder (2)" using the webUI
    And the user deletes file "data.zip" using the webUI
    And using server "REMOTE"
    Then as "user1" file "simple-folder/data.zip" should not exist

  Scenario: receive same name federation share from two users
    Given using server "REMOTE"
    And user "user2" has been created with default attributes and without skeleton files
    And user "user2" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And user "user1" from server "REMOTE" has shared "/lorem.txt" with user "user1" from server "LOCAL"
    And user "user2" from server "REMOTE" has shared "/lorem.txt" with user "user1" from server "LOCAL"
    And the user has reloaded the current page of the webUI
    When the user accepts the offered remote shares using the webUI
    Then file "lorem (2).txt" should be listed on the webUI
    And file "lorem (3).txt" should be listed on the webUI
    And file "lorem (2).txt" should be listed in the shared-with-you page on the webUI
    And file "lorem (3).txt" should be listed in the shared-with-you page on the webUI

  Scenario: unshare a federation share
    Given user "user1" from server "REMOTE" has shared "/lorem.txt" with user "user1" from server "LOCAL"
    And user "user1" from server "LOCAL" has accepted the last pending share
    And the user has reloaded the current page of the webUI
    When the user unshares file "lorem (2).txt" using the webUI
    Then file "lorem (2).txt" should not be listed on the webUI
    When the user has reloaded the current page of the webUI
    Then file "lorem (2).txt" should not be listed on the webUI
    And file "lorem (2).txt" should not be listed in the shared-with-you page on the webUI

  Scenario: unshare a federation share from "share-with-you" page
    Given user "user1" from server "REMOTE" has shared "/lorem.txt" with user "user1" from server "LOCAL"
    And user "user1" from server "LOCAL" has accepted the last pending share
    And the user has reloaded the current page of the webUI
    When the user unshares file "lorem (2).txt" using the webUI
    Then file "lorem (2).txt" should not be listed on the webUI
    And file "lorem (2).txt" should not be listed in the files page on the webUI

  Scenario: test sharing folder to a remote server and resharing it back to the local
    Given using server "LOCAL"
    And user "user2" has been created with default attributes and without skeleton files
    And user "user2" has created folder "simple-folder"
    When the user shares folder "simple-folder" with remote user "user1@%remote_server_without_scheme%" using the webUI
    And user "user1" from server "REMOTE" accepts the last pending share using the sharing API
    And user "user1" from server "REMOTE" shares "/simple-folder (2)" with user "user2" from server "LOCAL" using the sharing API
    And the user re-logs in as "user2" using the webUI
    And the user accepts the offered remote shares using the webUI
    Then as "user2" folder "/simple-folder (2)" should exist
    And as "user2" file "/simple-folder (2)/lorem.txt" should exist

  Scenario: test resharing folder as readonly and set it as readonly by resharer
    Given using server "LOCAL"
    And user "user2" has been created with default attributes and without skeleton files
    And user "user2" has created folder "simple-folder"
    When the user shares folder "simple-folder" with remote user "user1@%remote_server_without_scheme%" using the webUI
    And user "user1" from server "REMOTE" accepts the last pending share using the sharing API
    And user "user1" from server "REMOTE" shares "/simple-folder (2)" with user "user2" from server "LOCAL" using the sharing API
    And the user updates the last share using the sharing API with
      | permissions | read |
    And the user re-logs in as "user2" using the webUI
    And the user accepts the offered remote shares using the webUI
    Then as "user2" folder "/simple-folder (2)" should exist
    And as "user2" file "/simple-folder (2)/lorem.txt" should exist
    When the user opens folder "simple-folder (2)" using the webUI
    Then it should not be possible to delete file "lorem.txt" using the webUI

  @skipOnOcV10.3
  Scenario: test resharing folder and set it as readonly by owner
    Given using server "LOCAL"
    And user "user2" has been created with default attributes and without skeleton files
    And user "user2" has created folder "simple-folder"
    When the user shares folder "simple-folder" with remote user "user1@%remote_server_without_scheme%" using the webUI
    And user "user1" from server "REMOTE" accepts the last pending share using the sharing API
    And user "user1" from server "REMOTE" shares "/simple-folder (2)" with user "user2" from server "LOCAL" using the sharing API
    And the user re-logs in as "user1" using the webUI
    And the user opens the share dialog for folder "simple-folder"
    And the user sets the sharing permissions of user "user2@%local_server% (federated)" for "simple-folder" using the webUI to
      | edit | no |
    And the user re-logs in as "user2" using the webUI
    And the user accepts the offered remote shares using the webUI
    Then as "user2" folder "/simple-folder (2)" should exist
    And as "user2" file "/simple-folder (2)/lorem.txt" should exist
    When the user opens folder "simple-folder (2)" using the webUI
    Then it should not be possible to delete file "lorem.txt" using the webUI

  @issue-36730
  Scenario: test sharing long file names with federation share
    When user "user1" moves file "/lorem.txt" to "/averylongfilenamefortestingthatfileswithlongfilenamescannotbeshared.txt" using the WebDAV API
    And the user has reloaded the current page of the webUI
    And the user shares file "averylongfilenamefortestingthatfileswithlongfilenamescannotbeshared.txt" with remote user "user1@%remote_server_without_scheme%" using the webUI
    #  And user "user1" from server "REMOTE" accepts the last pending share using the sharing API
    And using server "REMOTE"
    Then user "user1" should not have any received shares
    # Then as "user1" file "/averylongfilenamefortestingthatfileswithlongfilenamescannotbeshared.txt" should exist
    Then as "user1" file "/averylongfilenamefortestingthatfileswithlongfilenamescannotbeshared.txt" should not exist

  Scenario: sharee should be able to access the files/folders inside other folder
    Given user "user1" has created folder "simple-folder/simple-empty-folder"
    And user "user1" has created folder "simple-folder/simple-empty-folder/finalfolder"
    And user "user1" has uploaded file "filesForUpload/textfile.txt" to "/simple-folder/simple-empty-folder/textfile.txt"
    And user "user1" from server "LOCAL" has shared "simple-folder" with user "user1" from server "REMOTE"
    And user "user1" from server "REMOTE" has accepted the last pending share
    And using server "REMOTE"
    Then as "user1" file "simple-folder (2)/lorem.txt" should exist
    And as "user1" file "simple-folder (2)/simple-empty-folder/textfile.txt" should exist
    And as "user1" folder "simple-folder (2)/simple-empty-folder/finalfolder" should exist

  Scenario: sharee uploads a file inside a folder of a folder
    Given user "user1" has created folder "simple-folder/simple-empty-folder"
    And user "user1" from server "LOCAL" has shared "simple-folder" with user "user1" from server "REMOTE"
    And user "user1" from server "REMOTE" has accepted the last pending share
    And using server "REMOTE"
    When user "user1" on "REMOTE" uploads file "filesForUpload/lorem.txt" to "simple-folder (2)/simple-empty-folder/lorem.txt" using the WebDAV API
    Then as "user1" file "simple-folder (2)/simple-empty-folder/lorem.txt" should exist
    When using server "LOCAL"
    Then as "user1" file "simple-folder/simple-empty-folder/lorem.txt" should exist

  @skipOnFIREFOX
  Scenario: rename a file in a folder inside a shared folder
    Given using server "REMOTE"
    And user "user1" has created folder "simple-folder/simple-empty-folder"
    And user "user1" has uploaded file "filesForUpload/textfile.txt" to "/simple-folder/simple-empty-folder/textfile.txt"
    And user "user1" from server "REMOTE" has shared "simple-folder" with user "user1" from server "LOCAL"
    When the user re-logs in as "user1" using the webUI
    And the user accepts the offered remote shares using the webUI
    And the user opens folder "simple-folder (2)/simple-empty-folder" using the webUI
    And the user renames file "textfile.txt" to "new-lorem.txt" using the webUI
    And using server "REMOTE"
    Then as "user1" file "simple-folder/simple-empty-folder/new-lorem.txt" should exist
    But as "user1" file "simple-folder/simple-empty-folder/textfile.txt" should not exist

  Scenario: delete a file in a folder inside a shared folder
    Given using server "REMOTE"
    And user "user1" has created folder "simple-folder/simple-empty-folder"
    And user "user1" has uploaded file "filesForUpload/textfile.txt" to "/simple-folder/simple-empty-folder/textfile.txt"
    And user "user1" from server "REMOTE" has shared "simple-folder" with user "user1" from server "LOCAL"
    When the user re-logs in as "user1" using the webUI
    And the user accepts the offered remote shares using the webUI
    And the user opens folder "/simple-folder (2)/simple-empty-folder" using the webUI
    And the user deletes file "textfile.txt" using the webUI
    And using server "REMOTE"
    Then as "user1" file "/simple-folder/simple-empty-folder/textfile.txt" should not exist

  Scenario: delete shared folder and create a folder for federation sharing with same name
    Given user "user1" from server "LOCAL" has shared "simple-folder" with user "user1" from server "REMOTE"
    And user "user1" from server "REMOTE" has accepted the last pending share
    And user "user1" has deleted folder "simple-folder"
    And user "user1" has created folder "simple-folder"
    And user "user1" from server "LOCAL" has shared "simple-folder" with user "user1" from server "REMOTE"
    When user "user1" from server "REMOTE" accepts the last pending share using the sharing API
    And using server "REMOTE"
    Then as "user1" folder "simple-folder" should exist
    And as "user1" folder "simple-folder (3)" should exist

  @skipOnOcV10.3
  Scenario: sharing indicator inside folder shared using federated sharing
    Given user "user1" has created folder "/simple-folder/sub-folder"
    And user "user1" from server "LOCAL" has shared "/simple-folder" with user "user1" from server "REMOTE"
    When the user opens folder "simple-folder" using the webUI
    Then the following resources should have share indicators on the webUI
      | lorem.txt  |
      | sub-folder |

  @skipOnOcV10.3
  Scenario: sharing indicator for file uploaded inside folder shared using federated sharing
    Given user "user1" from server "LOCAL" has shared "/simple-folder" with user "user1" from server "REMOTE"
    When the user opens folder "simple-folder" using the webUI
    And the user uploads file "new-lorem.txt" using the webUI
    Then the following resources should have share indicators on the webUI
      | new-lorem.txt |

  @skipOnOcV10.3
  Scenario: sharing indicator for folder created inside folder shared using federated sharing
    Given user "user1" from server "LOCAL" has shared "/simple-folder" with user "user1" from server "REMOTE"
    When the user opens folder "simple-folder" using the webUI
    And the user creates a folder with the name "sub-folder" using the webUI
    Then the following resources should have share indicators on the webUI
      | sub-folder |

  @skipOnOcV10.3
  Scenario: sharing details inside folder shared using federated sharing
    Given user "user1" has created folder "/simple-folder/sub-folder"
    And user "user1" has uploaded file "filesForUpload/textfile.txt" to "/simple-folder/textfile.txt"
    And user "user1" from server "LOCAL" has shared "/simple-folder" with user "user1" from server "REMOTE"
    When the user opens folder "simple-folder" using the webUI
    And the user opens the share dialog for folder "sub-folder"
    Then federated user "user1@%remote_server% (Remote share)" should be listed as share receiver via "simple-folder" on the webUI
    When the user opens the share dialog for file "textfile.txt"
    Then federated user "user1@%remote_server% (Remote share)" should be listed as share receiver via "simple-folder" on the webUI

  @skipOnOcV10.3
  Scenario: sharing details of items inside a shared folder shared with local user and federated user
    Given user "user2" has been created with default attributes and without skeleton files
    And user "user1" has created folder "/simple-folder/sub-folder"
    And user "user1" has uploaded file "filesForUpload/textfile.txt" to "/simple-folder/sub-folder/textfile.txt"
    And user "user1" from server "LOCAL" has shared "/simple-folder" with user "user1" from server "REMOTE"
    And user "user1" has shared folder "simple-folder/sub-folder" with user "user2"
    When the user opens folder "simple-folder/sub-folder" using the webUI
    And the user opens the share dialog for file "textfile.txt"
    Then federated user "user1@%remote_server% (Remote share)" should be listed as share receiver via "simple-folder" on the webUI
    And user "User Two" should be listed as share receiver via "sub-folder" on the webUI
