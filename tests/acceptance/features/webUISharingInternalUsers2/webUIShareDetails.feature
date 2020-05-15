@webUI @insulated @disablePreviews @files_sharing-app-required
Feature: WebUI share details for shares created using internal users
  As a user
  I want to share files and folders with other users
  So that those users can access the files and folders

  @skipOnOcV10.3
  Scenario: sharing indicator of items inside a shared folder
    Given these users have been created with default attributes and skeleton files:
      | username |
      | user0    |
      | user1    |
    And user "user0" has shared folder "simple-folder" with user "user1"
    And user "user0" has logged in using the webUI
    When the user opens folder "simple-folder" using the webUI
    Then the following resources should have share indicators on the webUI
      | simple-empty-folder |
      | lorem.txt           |

  @skipOnOcV10.3
  Scenario: sharing indicator of items inside a shared folder two levels down
    Given these users have been created with default attributes and skeleton files:
      | username |
      | user0    |
      | user1    |
    And user "user0" has created folder "/simple-folder/simple-empty-folder/new-folder"
    And user "user0" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/simple-empty-folder/lorem.txt"
    And user "user0" has shared folder "simple-folder" with user "user1"
    And user "user0" has logged in using the webUI
    When the user opens folder "simple-folder" using the webUI
    And the user opens folder "simple-empty-folder" using the webUI
    Then the following resources should have share indicators on the webUI
      | new-folder |
      | lorem.txt  |

  @skipOnOcV10.3
  Scenario: sharing indicator of items inside a re-shared folder
    Given these users have been created with default attributes and skeleton files:
      | username |
      | user0    |
    And these users have been created without skeleton files:
      | username |
      | user1    |
      | user2    |
    And user "user0" has shared folder "simple-folder" with user "user1"
    And user "user1" has shared folder "simple-folder" with user "user2"
    And user "user1" has logged in using the webUI
    When the user opens folder "simple-folder" using the webUI
    Then the following resources should have share indicators on the webUI
      | simple-empty-folder |
      | lorem.txt           |

  @skipOnOcV10.3
  Scenario: no sharing indicator of items inside a not shared folder
    Given these users have been created with default attributes and skeleton files:
      | username |
      | user0    |
    And user "user0" has logged in using the webUI
    When the user opens folder "simple-folder" using the webUI
    Then the following resources should not have share indicators on the webUI
      | simple-empty-folder |
      | lorem.txt           |

  @skipOnOcV10.3
  Scenario: sharing details of items inside a shared folder
    Given these users have been created without skeleton files:
      | username |
      | user0    |
      | user1    |
    And user "user0" has created folder "/simple-folder"
    And user "user0" has created folder "/simple-folder/simple-empty-folder"
    And user "user0" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/lorem.txt"
    And user "user0" has shared folder "simple-folder" with user "user1"
    And user "user0" has logged in using the webUI
    And the user has opened folder "simple-folder" using the webUI
    When the user opens the sharing tab from the file action menu of folder "simple-empty-folder" using the webUI
    Then user "user1" should be listed as share receiver via "simple-folder" on the webUI
    When the user opens the sharing tab from the file action menu of file "lorem.txt" using the webUI
    Then user "user1" should be listed as share receiver via "simple-folder" on the webUI

  @skipOnOcV10.3
  Scenario: sharing details of items inside a re-shared folder
    Given these users have been created without skeleton files:
      | username |
      | user0    |
      | user1    |
      | user2    |
    And user "user0" has created folder "/simple-folder"
    And user "user0" has created folder "/simple-folder/simple-empty-folder"
    And user "user0" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/lorem.txt"
    And user "user0" has shared folder "simple-folder" with user "user1"
    And user "user1" has shared folder "simple-folder" with user "user2"
    And user "user1" has logged in using the webUI
    And the user has opened folder "simple-folder" using the webUI
    When the user opens the sharing tab from the file action menu of folder "simple-empty-folder" using the webUI
    Then user "user2" should be listed as share receiver via "simple-folder" on the webUI
    When the user opens the sharing tab from the file action menu of file "lorem.txt" using the webUI
    Then user "user2" should be listed as share receiver via "simple-folder" on the webUI

  @skipOnOcV10.3
  Scenario: sharing indicator for file uploaded inside a shared folder
    Given these users have been created with default attributes and skeleton files:
      | username |
      | user0    |
      | user1    |
    And user "user0" has shared folder "/simple-empty-folder" with user "user1"
    And user "user0" has logged in using the webUI
    When the user opens folder "simple-empty-folder" using the webUI
    And the user uploads file "new-lorem.txt" using the webUI
    Then the following resources should have share indicators on the webUI
      | new-lorem.txt |

  @skipOnOcV10.3
  Scenario: sharing indicator for folder created inside a shared folder
    Given these users have been created with default attributes and skeleton files:
      | username |
      | user0    |
      | user1    |
    And user "user0" has shared folder "/simple-empty-folder" with user "user1"
    And user "user0" has logged in using the webUI
    When the user opens folder "simple-empty-folder" using the webUI
    And the user creates a folder with the name "sub-folder" using the webUI
    Then the following resources should have share indicators on the webUI
      | sub-folder |

  @skipOnOcV10.3
  Scenario: sharing details of items inside a shared folder shared with multiple users
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | user0    |
      | user1    |
      | user2    |
    And user "user0" has created folder "/simple-folder"
    And user "user0" has created folder "/simple-folder/sub-folder"
    And user "user0" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/sub-folder/lorem.txt"
    And user "user0" has shared folder "simple-folder" with user "user1"
    And user "user0" has shared folder "/simple-folder/sub-folder" with user "user2"
    And user "user0" has logged in using the webUI
    And the user has opened folder "simple-folder/sub-folder" using the webUI
    When the user opens the sharing tab from the file action menu of file "lorem.txt" using the webUI
    Then user "User One" should be listed as share receiver via "simple-folder" on the webUI
    And user "User Two" should be listed as share receiver via "sub-folder" on the webUI
