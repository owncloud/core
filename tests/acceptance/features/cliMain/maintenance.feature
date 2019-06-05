@cli @local_storage @TestAlsoOnExternalUserBackend
Feature: Maintenance command

  As an admin
  I want to be able to maintain and repair my ownCloud installation
  So that I can run ownCloud smoothly

  Scenario: Repair steps should be listed correctly
    When the administrator list the repair steps using the occ command
    Then the command should have been successful
    And the command output should contain the text "Found 17 repair steps"
    And the command output table should contain the following text:
      | table_column                          |
      | OC\Repair\RepairMimeTypes             |
      | OC\Repair\RepairMismatchFileCachePath |
      | OC\Repair\FillETags                   |
      | OC\Repair\CleanTags                   |
      | OC\Repair\DropOldTables               |
      | OC\Repair\DropOldJobs                 |
      | OC\Repair\RemoveGetETagEntries        |
      | OC\Repair\RepairInvalidShares         |
      | OC\Repair\RepairSubShares             |
      | OC\Repair\SharePropagation            |
      | OC\Repair\MoveAvatarOutsideHome       |
      | OC\Repair\MoveAvatarIntoSubFolder     |
      | OC\Repair\RemoveRootShares            |
      | OC\Repair\RepairUnmergedShares        |
      | OC\Repair\DisableExtraThemes          |
      | OC\Repair\OldGroupMembershipShares    |
      | OCA\DAV\Repair\RemoveInvalidShares    |

  Scenario: Running single repair step without providing value should fail
    When the administrator invokes occ command "maintenance:repair --single"
    Then the command should have failed with exit code 1
    And the command error output should contain the text 'The "--single" option requires a value'
