@cli @files_trashbin-app-required
Feature: get status, delete and execute jobs in background queue
  As an admin
  I want to be able to see, delete and execute the jobs in background queue
  So that I have control over background job queue

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

  Scenario: delete one of the job in background queue
    Given user "user0" has been created with default attributes and skeleton files
    And user "user0" has deleted file "/textfile0.txt"
    When the administrator deletes last background job "OC\Command\CommandJob" using the occ command
    Then the command should have been successful
    And the last deleted background job "OC\Command\CommandJob" should not be listed in the background jobs queue
