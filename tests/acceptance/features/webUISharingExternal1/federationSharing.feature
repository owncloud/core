@webUI @federation-app-required @insulated @disablePreviews @files_sharing-app-required
Feature: Federation Sharing - sharing with users on other cloud storages
  As a user
  I want to share files with any users on other cloud storages
  So that other users have access to these files

  Background:
    Given using server "REMOTE"
    And user "Alice" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "simple-folder"
    And user "Alice" has created folder "simple-empty-folder"
    And user "Alice" has uploaded file with content "I am lorem.txt inside simple-folder" to "/simple-folder/lorem.txt"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And using server "LOCAL"
    And user "Alice" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "simple-folder"
    And user "Alice" has created folder "simple-empty-folder"
    And user "Alice" has uploaded file with content "I am lorem.txt inside simple-folder" to "/simple-folder/lorem.txt"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And user "Alice" has logged in using the webUI
    And parameter "auto_accept_trusted" of app "federatedfilesharing" has been set to "no"

  @skipOnMICROSOFTEDGE
  Scenario: share a folder with a federated user and prohibit deleting - local server shares - remote server receives
    Given using server "REMOTE"
    And user "Alice" from server "REMOTE" has shared "simple-folder" with user "Alice" from server "LOCAL"
    When the user updates the last share using the sharing API with
      | permissions | read |
    And the user re-logs in as "Alice" using the webUI
    And the user accepts the offered federated shares using the webUI
    And the user opens folder "simple-folder (2)" using the webUI
    Then it should not be possible to delete file "lorem.txt" using the webUI

  @skipOnMICROSOFTEDGE
  Scenario: share a folder with a federated user and prohibit deleting - remote server shares - local server receives
    # permissions read+update+create = 7 (no delete, no (re)share permission)
    Given user "Alice" from server "REMOTE" has shared "simple-folder" with user "Alice" from server "LOCAL" with permissions "create,read,update"
    When the user browses to the files page
    And the user accepts the offered federated shares using the webUI
    And the user opens folder "simple-folder (2)" using the webUI
    Then it should not be possible to delete file "lorem.txt" using the webUI


  Scenario: overwrite a file in a received share - local server shares - remote server receives
    Given user "Alice" from server "LOCAL" has shared "simple-folder" with user "Alice" from server "REMOTE"
    And user "Alice" from server "REMOTE" has accepted the last pending share
    When user "Alice" on "REMOTE" uploads file "filesForUpload/lorem.txt" to "simple-folder (2)/lorem.txt" using the WebDAV API
    And the user opens folder "simple-folder" using the webUI
    Then file "lorem.txt" should be listed on the webUI
    And the content of "lorem.txt" on the local server should be the same as the local "lorem.txt"


  Scenario: overwrite a file in a received share - remote server shares - local server receives
    Given user "Alice" from server "REMOTE" has shared "simple-folder" with user "Alice" from server "LOCAL"
    And the user has reloaded the current page of the webUI
    When the user accepts the offered federated shares using the webUI
    And the user opens folder "simple-folder (2)" using the webUI
    And the user uploads overwriting file "lorem.txt" using the webUI and retries if the file is locked
    And using server "REMOTE"
    Then as "Alice" file "simple-folder/lorem.txt" should exist
    And the content of "simple-folder/lorem.txt" on the remote server for user "Alice" should be the same as the local "lorem.txt"


  Scenario: upload a new file in a received share - local server shares - remote server receives
    Given user "Alice" from server "LOCAL" has shared "simple-folder" with user "Alice" from server "REMOTE"
    And user "Alice" from server "REMOTE" has accepted the last pending share
    When user "Alice" on "REMOTE" uploads file "filesForUpload/new-lorem.txt" to "simple-folder (2)/new-lorem.txt" using the WebDAV API
    And the user opens folder "simple-folder" using the webUI
    Then file "new-lorem.txt" should be listed on the webUI
    And the content of "new-lorem.txt" on the local server should be the same as the local "new-lorem.txt"


  Scenario: upload a new file in a received share - remote server shares - local server receives
    Given user "Alice" from server "REMOTE" has shared "simple-folder" with user "Alice" from server "LOCAL"
    And the user has reloaded the current page of the webUI
    When the user accepts the offered federated shares using the webUI
    And the user opens folder "simple-folder (2)" using the webUI
    And the user uploads file "new-lorem.txt" using the webUI
    And using server "REMOTE"
    Then as "Alice" file "simple-folder/new-lorem.txt" should exist
    And the content of "simple-folder/new-lorem.txt" on the remote server for user "Alice" should be the same as the local "new-lorem.txt"


  Scenario: rename a file in a received share - local server shares - remote server receives
    Given user "Alice" from server "LOCAL" has shared "simple-folder" with user "Alice" from server "REMOTE"
    And user "Alice" from server "REMOTE" has accepted the last pending share
    When user "Alice" on "REMOTE" moves file "/simple-folder (2)/lorem.txt" to "/simple-folder (2)/renamed file.txt" using the WebDAV API
    And the user opens folder "simple-folder" using the webUI
    Then file "renamed file.txt" should be listed on the webUI
    But file "lorem.txt" should not be listed on the webUI
    And the content of file "simple-folder/renamed file.txt" for user "Alice" on server "LOCAL" should be "I am lorem.txt inside simple-folder"

  @skipOnFIREFOX
  Scenario: rename a file in a received share - remote server shares - local server receives
    Given user "Alice" from server "REMOTE" has shared "simple-folder" with user "Alice" from server "LOCAL"
    And the user has reloaded the current page of the webUI
    When the user accepts the offered federated shares using the webUI
    And the user opens folder "simple-folder (2)" using the webUI
    And the user renames file "lorem.txt" to "renamed file.txt" using the webUI
    And using server "REMOTE"
    Then as "Alice" file "simple-folder/renamed file.txt" should exist
    And the content of file "simple-folder/renamed file.txt" for user "Alice" on server "REMOTE" should be "I am lorem.txt inside simple-folder"
    But as "Alice" file "simple-folder/lorem.txt" should not exist


  Scenario: delete a file in a received share - local server shares - remote server receives
    Given user "Alice" has uploaded file "filesForUpload/data.zip" to "/simple-folder/data.zip"
    And user "Alice" from server "LOCAL" has shared "simple-folder" with user "Alice" from server "REMOTE"
    And user "Alice" from server "REMOTE" has accepted the last pending share
    When user "Alice" on "REMOTE" deletes file "simple-folder (2)/data.zip" using the WebDAV API
    And the user opens folder "simple-folder" using the webUI
    Then file "data.zip" should not be listed on the webUI


  Scenario: delete a file in a received share - remote server shares - local server receives
    Given user "Alice" on "REMOTE" has uploaded file "filesForUpload/data.zip" to "/simple-folder/data.zip"
    And user "Alice" from server "REMOTE" has shared "simple-folder" with user "Alice" from server "LOCAL"
    And the user has reloaded the current page of the webUI
    When the user accepts the offered federated shares using the webUI
    And the user opens folder "simple-folder (2)" using the webUI
    And the user deletes file "data.zip" using the webUI
    And using server "REMOTE"
    Then as "Alice" file "simple-folder/data.zip" should not exist


  Scenario: receive same name federation share from two users
    Given using server "REMOTE"
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And user "Alice" from server "REMOTE" has shared "/lorem.txt" with user "Alice" from server "LOCAL"
    And user "Brian" from server "REMOTE" has shared "/lorem.txt" with user "Alice" from server "LOCAL"
    And the user has reloaded the current page of the webUI
    When the user accepts the offered federated shares using the webUI
    Then file "lorem (2).txt" should be listed on the webUI
    And file "lorem (3).txt" should be listed on the webUI
    And file "lorem (2).txt" should be listed in the shared-with-you page on the webUI
    And file "lorem (3).txt" should be listed in the shared-with-you page on the webUI


  Scenario: unshare a federation share from files page and check in the files page as well as in "shared-with-you" page
    Given user "Alice" from server "REMOTE" has shared "/lorem.txt" with user "Alice" from server "LOCAL"
    And user "Alice" from server "LOCAL" has accepted the last pending share
    And the user has reloaded the current page of the webUI
    When the user unshares file "lorem (2).txt" using the webUI
    Then file "lorem (2).txt" should not be listed on the webUI
    When the user has reloaded the current page of the webUI
    Then file "lorem (2).txt" should not be listed on the webUI
    And file "lorem (2).txt" should not be listed in the shared-with-you page on the webUI


  Scenario: unshare a federation share from "shared-with-you" page
    Given user "Alice" from server "REMOTE" has shared "/lorem.txt" with user "Alice" from server "LOCAL"
    And user "Alice" from server "LOCAL" has accepted the last pending share
    And the user has browsed to the shared-with-you page
    When the user unshares file "lorem (2).txt" received as federated share using the webUI
    Then file "lorem (2).txt" should not be listed on the webUI
    And file "lorem (2).txt" should not be listed in the files page on the webUI


  Scenario: test sharing folder to a remote server and resharing it back to the local
    Given using server "LOCAL"
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created folder "simple-folder"
    When the user shares folder "simple-folder" with federated user "Alice" with displayname "%username%@%remote_server_without_scheme%" using the webUI
    And user "Alice" from server "REMOTE" accepts the last pending share using the sharing API
    And user "Alice" from server "REMOTE" shares "/simple-folder (2)" with user "Brian" from server "LOCAL" using the sharing API
    And the user re-logs in as "Brian" using the webUI
    And the user accepts the offered federated shares using the webUI
    Then as "Brian" folder "/simple-folder (2)" should exist
    And as "Brian" file "/simple-folder (2)/lorem.txt" should exist


  Scenario: test resharing folder as readonly and set it as readonly by resharer
    Given using server "LOCAL"
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created folder "simple-folder"
    When the user shares folder "simple-folder" with federated user "Alice" with displayname "%username%@%remote_server_without_scheme%" using the webUI
    And user "Alice" from server "REMOTE" accepts the last pending share using the sharing API
    And user "Alice" from server "REMOTE" shares "/simple-folder (2)" with user "Brian" from server "LOCAL" using the sharing API
    And the user updates the last share using the sharing API with
      | permissions | read |
    And the user re-logs in as "Brian" using the webUI
    And the user accepts the offered federated shares using the webUI
    Then as "Brian" folder "/simple-folder (2)" should exist
    And as "Brian" file "/simple-folder (2)/lorem.txt" should exist
    When the user opens folder "simple-folder (2)" using the webUI
    Then it should not be possible to delete file "lorem.txt" using the webUI

  
  Scenario: test resharing folder and set it as readonly by owner
    Given using server "LOCAL"
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created folder "simple-folder"
    When the user shares folder "simple-folder" with federated user "Alice" with displayname "%username%@%remote_server_without_scheme%" using the webUI
    And user "Alice" from server "REMOTE" accepts the last pending share using the sharing API
    And user "Alice" from server "REMOTE" shares "/simple-folder (2)" with user "Brian" from server "LOCAL" using the sharing API
    And the user re-logs in as "Alice" using the webUI
    And the user opens the share dialog for folder "simple-folder"
    And the user sets the sharing permissions of user "Brian@%local_server% (federated)" for "simple-folder" using the webUI to
      | edit | no |
    And the user re-logs in as "Brian" using the webUI
    And the user accepts the offered federated shares using the webUI
    Then as "Brian" folder "/simple-folder (2)" should exist
    And as "Brian" file "/simple-folder (2)/lorem.txt" should exist
    When the user opens folder "simple-folder (2)" using the webUI
    Then it should not be possible to delete file "lorem.txt" using the webUI

  
  Scenario: test sharing long file names with federation share
    When user "Alice" moves file "/lorem.txt" to "/averylongfilenamefortestingthatfileswithlongfilenamescannotbeshared.txt" using the WebDAV API
    And the user has reloaded the current page of the webUI
    And the user shares file "averylongfilenamefortestingthatfileswithlongfilenamescannotbeshared.txt" with federated user "Alice" with displayname "%username%@%remote_server_without_scheme%" using the webUI
    And user "Alice" from server "REMOTE" accepts the last pending share using the sharing API
    Then as "Alice" file "/averylongfilenamefortestingthatfileswithlongfilenamescannotbeshared.txt" should exist


  Scenario: sharee should be able to access the files/folders inside other folder
    Given user "Alice" has created folder "simple-folder/simple-empty-folder"
    And user "Alice" has created folder "simple-folder/simple-empty-folder/finalfolder"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/simple-folder/simple-empty-folder/textfile.txt"
    And user "Alice" from server "LOCAL" has shared "simple-folder" with user "Alice" from server "REMOTE"
    And user "Alice" from server "REMOTE" has accepted the last pending share
    And using server "REMOTE"
    Then as "Alice" file "simple-folder (2)/lorem.txt" should exist
    And as "Alice" file "simple-folder (2)/simple-empty-folder/textfile.txt" should exist
    And as "Alice" folder "simple-folder (2)/simple-empty-folder/finalfolder" should exist


  Scenario: sharee uploads a file inside a folder of a folder
    Given user "Alice" has created folder "simple-folder/simple-empty-folder"
    And user "Alice" from server "LOCAL" has shared "simple-folder" with user "Alice" from server "REMOTE"
    And user "Alice" from server "REMOTE" has accepted the last pending share
    And using server "REMOTE"
    When user "Alice" on "REMOTE" uploads file "filesForUpload/lorem.txt" to "simple-folder (2)/simple-empty-folder/lorem.txt" using the WebDAV API
    Then as "Alice" file "simple-folder (2)/simple-empty-folder/lorem.txt" should exist
    When using server "LOCAL"
    Then as "Alice" file "simple-folder/simple-empty-folder/lorem.txt" should exist

  @skipOnFIREFOX
  Scenario: rename a file in a folder inside a shared folder
    Given using server "REMOTE"
    And user "Alice" has created folder "simple-folder/simple-empty-folder"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/simple-folder/simple-empty-folder/textfile.txt"
    And user "Alice" from server "REMOTE" has shared "simple-folder" with user "Alice" from server "LOCAL"
    When the user re-logs in as "Alice" using the webUI
    And the user accepts the offered federated shares using the webUI
    And the user opens folder "simple-folder (2)/simple-empty-folder" using the webUI
    And the user renames file "textfile.txt" to "new-lorem.txt" using the webUI
    And using server "REMOTE"
    Then as "Alice" file "simple-folder/simple-empty-folder/new-lorem.txt" should exist
    But as "Alice" file "simple-folder/simple-empty-folder/textfile.txt" should not exist


  Scenario: delete a file in a folder inside a shared folder
    Given using server "REMOTE"
    And user "Alice" has created folder "simple-folder/simple-empty-folder"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/simple-folder/simple-empty-folder/textfile.txt"
    And user "Alice" from server "REMOTE" has shared "simple-folder" with user "Alice" from server "LOCAL"
    When the user re-logs in as "Alice" using the webUI
    And the user accepts the offered federated shares using the webUI
    And the user opens folder "/simple-folder (2)/simple-empty-folder" using the webUI
    And the user deletes file "textfile.txt" using the webUI
    And using server "REMOTE"
    Then as "Alice" file "/simple-folder/simple-empty-folder/textfile.txt" should not exist


  Scenario: delete shared folder and create a folder for federation sharing with same name
    Given user "Alice" from server "LOCAL" has shared "simple-folder" with user "Alice" from server "REMOTE"
    And user "Alice" from server "REMOTE" has accepted the last pending share
    And user "Alice" has deleted folder "simple-folder"
    And user "Alice" has created folder "simple-folder"
    And user "Alice" from server "LOCAL" has shared "simple-folder" with user "Alice" from server "REMOTE"
    When user "Alice" from server "REMOTE" accepts the last pending share using the sharing API
    And using server "REMOTE"
    Then as "Alice" folder "simple-folder" should exist
    And as "Alice" folder "simple-folder (3)" should exist
