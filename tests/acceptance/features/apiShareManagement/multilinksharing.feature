@api @TestAlsoOnExternalUserBackend @public_link_share-feature-required
Feature: multilinksharing

  Background:
    Given using old DAV path
    And user "user0" has been created with default attributes and skeleton files
    And as user "user0"

  @smokeTest
  Scenario Outline: Creating three public shares of a folder
    Given using OCS API version "<ocs_api_version>"
    And the user has created a public link share with settings
      | path         | FOLDER      |
      | password     | %public%    |
      | expireDate   | +3 days     |
      | publicUpload | true        |
      | permissions  | 15          |
      | name         | sharedlink1 |
    And the user has created a public link share with settings
      | path         | FOLDER      |
      | password     | %public%    |
      | expireDate   | +3 days     |
      | publicUpload | true        |
      | permissions  | 15          |
      | name         | sharedlink2 |
    And the user has created a public link share with settings
      | path         | FOLDER      |
      | password     | %public%    |
      | expireDate   | +3 days     |
      | publicUpload | true        |
      | permissions  | 15          |
      | name         | sharedlink3 |
    When the user updates the last share using the sharing API with
      | permissions | 1 |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And as user "user0" the public shares of folder "/FOLDER" should be
      | /FOLDER | 15 | sharedlink2 |
      | /FOLDER | 15 | sharedlink1 |
      | /FOLDER | 1  | sharedlink3 |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario Outline: Creating three public shares of a file
    Given using OCS API version "<ocs_api_version>"
    And the user has created a public link share with settings
      | path        | textfile0.txt |
      | password    | %public%      |
      | expireDate  | +3 days       |
      | permissions | 1             |
      | name        | sharedlink1   |
    And the user has created a public link share with settings
      | path        | textfile0.txt |
      | password    | %public%      |
      | expireDate  | +3 days       |
      | permissions | 1             |
      | name        | sharedlink2   |
    And the user has created a public link share with settings
      | path        | textfile0.txt |
      | password    | %public%      |
      | expireDate  | +3 days       |
      | permissions | 1             |
      | name        | sharedlink3   |
    When the user updates the last share using the sharing API with
      | permissions | 1 |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And as user "user0" the public shares of file "/textfile0.txt" should be
      | /textfile0.txt | 1 | sharedlink2 |
      | /textfile0.txt | 1 | sharedlink1 |
      | /textfile0.txt | 1 | sharedlink3 |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario Outline: Check that updating password doesn't remove name of links
    Given using OCS API version "<ocs_api_version>"
    And the user has created a public link share with settings
      | path         | FOLDER      |
      | password     | %public%    |
      | expireDate   | +3 days     |
      | publicUpload | true        |
      | permissions  | 15          |
      | name         | sharedlink1 |
    And the user has created a public link share with settings
      | path         | FOLDER      |
      | password     | %public%    |
      | expireDate   | +3 days     |
      | publicUpload | true        |
      | permissions  | 15          |
      | name         | sharedlink2 |
    When the user updates the last share using the sharing API with
      | password | %alt1% |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And as user "user0" the public shares of folder "/FOLDER" should be
      | /FOLDER | 15 | sharedlink2 |
      | /FOLDER | 15 | sharedlink1 |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario: Deleting a file deletes also its public links
    Given using OCS API version "1"
    And the user has created a public link share with settings
      | path        | textfile0.txt |
      | password    | %public%      |
      | expireDate  | +3 days       |
      | permissions | 1             |
      | name        | sharedlink1   |
    And the user has created a public link share with settings
      | path        | textfile0.txt |
      | password    | %public%      |
      | expireDate  | +3 days       |
      | permissions | 1             |
      | name        | sharedlink2   |
    And user "user0" has deleted file "/textfile0.txt"
    And the HTTP status code should be "204"
    When user "user0" uploads file "filesForUpload/textfile.txt" to "/textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And as user "user0" the public shares of file "/textfile0.txt" should be
      |  |  |  |

  Scenario Outline: Deleting one public link share of a file doesn't affect the rest
    Given using OCS API version "<ocs_api_version>"
    And the user has created a public link share with settings
      | path        | textfile0.txt |
      | password    | %public%      |
      | expireDate  | +3 days       |
      | permissions | 1             |
      | name        | sharedlink1   |
    And the user has created a public link share with settings
      | path        | textfile0.txt |
      | password    | %public%      |
      | expireDate  | +3 days       |
      | permissions | 1             |
      | name        | sharedlink2   |
    And the user has created a public link share with settings
      | path        | textfile0.txt |
      | password    | %public%      |
      | expireDate  | +3 days       |
      | permissions | 1             |
      | name        | sharedlink3   |
    When user "user0" deletes public link share named "sharedlink2" in file "/textfile0.txt" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And as user "user0" the public shares of file "/textfile0.txt" should be
      | /textfile0.txt | 1 | sharedlink1 |
      | /textfile0.txt | 1 | sharedlink3 |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario: Overwriting a file doesn't remove its public shares
    Given using OCS API version "1"
    And the user has created a public link share with settings
      | path        | textfile0.txt |
      | password    | %public%      |
      | expireDate  | +3 days       |
      | permissions | 1             |
      | name        | sharedlink1   |
    And the user has created a public link share with settings
      | path        | textfile0.txt |
      | password    | %public%      |
      | expireDate  | +3 days       |
      | permissions | 1             |
      | name        | sharedlink2   |
    When user "user0" uploads file "filesForUpload/textfile.txt" to "/textfile0.txt" using the WebDAV API
    Then as user "user0" the public shares of file "/textfile0.txt" should be
      | /textfile0.txt | 1 | sharedlink1 |
      | /textfile0.txt | 1 | sharedlink2 |

  Scenario: Renaming a folder doesn't remove its public shares
    Given using OCS API version "1"
    And the user has created a public link share with settings
      | path         | FOLDER      |
      | password     | %public%    |
      | expireDate   | +3 days     |
      | publicUpload | true        |
      | permissions  | 15          |
      | name         | sharedlink1 |
    And the user has created a public link share with settings
      | path         | FOLDER      |
      | password     | %public%    |
      | expireDate   | +3 days     |
      | publicUpload | true        |
      | permissions  | 15          |
      | name         | sharedlink2 |
    When user "user0" moves folder "/FOLDER" to "/FOLDER_RENAMED" using the WebDAV API
    Then as user "user0" the public shares of file "/FOLDER_RENAMED" should be
      | /FOLDER_RENAMED | 15 | sharedlink1 |
      | /FOLDER_RENAMED | 15 | sharedlink2 |
