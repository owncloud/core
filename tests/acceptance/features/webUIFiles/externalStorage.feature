@webUI @insulated @local_storage @files_external-app-required @disablePreviews
Feature: external-storage

  Scenario: the external section shows a filtered view with just the external storage folders
    Given user "Alice" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "/local_storage/folder"
    And user "Alice" has created folder "new-folder"
    And user "Alice" has logged in using the webUI
    When the user browses to the external storage page
    Then folder "local_storage" should be listed on the webUI
    But folder "new-folder" should not be listed on the webUI
    When the user opens external-storage folder "local_storage" using the webUI
    Then folder "folder" should be listed on the webUI
