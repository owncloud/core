@cli @files_trashbin-app-required @files_sharing-app-required @skipOnLDAP
Feature: get status, delete and execute jobs in background queue
  As an admin
  I want to be able to see, delete and execute jobs in the background queue
  So that I have control over the background job queue


  Scenario: get the list of jobs in background queue
    When the administrator gets all the jobs in the background queue using the occ command
    Then the command should have been successful
    And the command output table should contain the following text:
      | table_column                                       |
      | OCA\Files\BackgroundJob\ScanFiles                  |
      | OCA\Files\BackgroundJob\DeleteOrphanedItems        |
      | OCA\Files\BackgroundJob\CleanupFileLocks           |
      | OCA\Files\BackgroundJob\CleanupPersistentFileLocks |
      | OCA\DAV\CardDAV\SyncJob                            |
      | OCA\DAV\BackgroundJob\CleanProperties              |
      | OCA\Files_Sharing\DeleteOrphanedSharesJob          |
      | OCA\Files_Sharing\ExpireSharesJob                  |
      | OCA\Files_Trashbin\BackgroundJob\ExpireTrash       |
      | OCA\Files_Versions\BackgroundJob\ExpireVersions    |
      | OCA\UpdateNotification\Notification\BackgroundJob  |
      | OC\Authentication\Token\DefaultTokenCleanupJob     |


  Scenario: delete one of the jobs in the background queue
    Given user "Alice" has been created with default attributes and small skeleton files
    And user "Alice" has deleted file "/textfile0.txt"
    When the administrator deletes the last background job "OC\Command\CommandJob" using the occ command
    Then the command should have been successful
    And the last deleted background job "OC\Command\CommandJob" should not be listed in the background jobs queue


  Scenario: execute one of the jobs in the background queue
    Given user "Alice" has been created with default attributes and small skeleton files
    And user "Alice" has deleted file "/textfile0.txt"
    And the owncloud log level has been set to debug
    When the administrator executes the last background job "OCA\Files\BackgroundJob\ScanFiles" using the occ command
    Then the command should have been successful
    And the command output should contain the text "Found job: OCA\Files\BackgroundJob\ScanFiles with ID"
    And the command output should contain the text "Forcing run, resetting last run value to 0"
    And the command output should contain the text "Running job..."
    And the command output should contain the text "Started background job of class : OCA\Files\BackgroundJob\ScanFiles with arguments :"
    And the command output should contain the text "Finished background job"
    And the command output should contain the text "this job is an instance of class : OCA\Files\BackgroundJob\ScanFiles with arguments :"
