@cli @skipOnLDAP @local_storage
Feature: import exported local storage mounts from the command line
  As an admin
  I want to import exported local storage mounts from the command line
  So that I can create previously exported local storage mounts

  @issue-37054
  Scenario: export the created mounts to a file
    Given the administrator has created the local storage mount "local_storage2"
    And the administrator has uploaded file with content "this is a file in local storage" to "/local_storage2/file-in-local-storage.txt"
    And the administrator has exported the local storage mounts using the occ command
    And the administrator has created a file "data/exportedMounts.json" with the last exported content using the testing API
    And the administrator has deleted local storage "local_storage2" using the occ command
    When the administrator imports the local storage mount from file "data/exportedMounts.json" using the occ command
    # change the then step once the issue is fixed and the import works well
    Then the command output should contain the text "An unhandled exception has been thrown:"