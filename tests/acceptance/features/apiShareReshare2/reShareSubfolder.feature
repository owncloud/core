@api @TestAlsoOnExternalUserBackend @files_sharing-app-required
Feature: a subfolder of a received share can be reshared

  Background:
    Given user "user0" has been created with default attributes and skeleton files
    And user "user1" has been created with default attributes and without skeleton files

  Scenario Outline: User is allowed to reshare a sub-folder with the same permissions
    Given using OCS API version "<ocs_api_version>"
    And user "user2" has been created with default attributes and without skeleton files
    And user "user0" has created folder "/TMP"
    And user "user0" has created folder "/TMP/SUB"
    And user "user0" has shared folder "/TMP" with user "user1" with permissions "share,read"
    When user "user1" shares folder "/TMP/SUB" with user "user2" with permissions "share,read" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And as "user2" folder "/SUB" should exist
    And as "user1" file "/TMP/SUB" should exist
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario Outline: User is not allowed to reshare a sub-folder with more permissions
    Given using OCS API version "<ocs_api_version>"
    And user "user2" has been created with default attributes and without skeleton files
    And user "user0" has created folder "/TMP"
    And user "user0" has created folder "/TMP/SUB"
    And user "user0" has shared folder "/TMP" with user "user1" with permissions <received_permissions>
    When user "user1" shares folder "/TMP/SUB" with user "user2" with permissions <reshare_permissions> using the sharing API
    Then the OCS status code should be "404"
    And the HTTP status code should be "<http_status_code>"
    And as "user2" folder "/SUB" should not exist
    But as "user1" file "/TMP/SUB" should exist
    Examples:
      | ocs_api_version | http_status_code | received_permissions | reshare_permissions |
      # try to pass on more bits including reshare
      | 1               | 200              | 17                   | 19                  |
      | 2               | 404              | 17                   | 19                  |
      | 1               | 200              | 17                   | 21                  |
      | 2               | 404              | 17                   | 21                  |
      | 1               | 200              | 17                   | 23                  |
      | 2               | 404              | 17                   | 23                  |
      | 1               | 200              | 17                   | 31                  |
      | 2               | 404              | 17                   | 31                  |
      | 1               | 200              | 19                   | 23                  |
      | 2               | 404              | 19                   | 23                  |
      | 1               | 200              | 19                   | 31                  |
      | 2               | 404              | 19                   | 31                  |
      # try to pass on more bits but not reshare
      | 1               | 200              | 17                   | 3                   |
      | 2               | 404              | 17                   | 3                   |
      | 1               | 200              | 17                   | 5                   |
      | 2               | 404              | 17                   | 5                   |
      | 1               | 200              | 17                   | 7                   |
      | 2               | 404              | 17                   | 7                   |
      | 1               | 200              | 17                   | 15                  |
      | 2               | 404              | 17                   | 15                  |
      | 1               | 200              | 19                   | 7                   |
      | 2               | 404              | 19                   | 7                   |
      | 1               | 200              | 19                   | 15                  |
      | 2               | 404              | 19                   | 15                  |
      # try to pass on extra delete (including reshare)
      | 1               | 200              | 17                   | 25                  |
      | 2               | 404              | 17                   | 25                  |
      | 1               | 200              | 19                   | 27                  |
      | 2               | 404              | 19                   | 27                  |
      | 1               | 200              | 23                   | 31                  |
      | 2               | 404              | 23                   | 31                  |
      # try to pass on extra delete (but not reshare)
      | 1               | 200              | 17                   | 9                   |
      | 2               | 404              | 17                   | 9                   |
      | 1               | 200              | 19                   | 11                  |
      | 2               | 404              | 19                   | 11                  |
      | 1               | 200              | 23                   | 15                  |
      | 2               | 404              | 23                   | 15                  |

  Scenario Outline: User is allowed to update reshare of a sub-folder with less permissions
    Given using OCS API version "<ocs_api_version>"
    And user "user2" has been created with default attributes and without skeleton files
    And user "user0" has created folder "/TMP"
    And user "user0" has created folder "/TMP/SUB"
    And user "user0" has shared folder "/TMP" with user "user1" with permissions "share,create,update,read"
    And user "user1" has shared folder "/TMP/SUB" with user "user2" with permissions "share,create,update,read"
    When user "user1" updates the last share using the sharing API with
      | permissions | share,read |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And as "user2" folder "/SUB" should exist
    But user "user2" should not be able to upload file "filesForUpload/textfile.txt" to "/SUB/textfile.txt"
    And as "user1" file "/TMP/SUB" should exist
    And user "user1" should be able to upload file "filesForUpload/textfile.txt" to "/TMP/SUB/textfile.txt"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario Outline: User is allowed to update reshare of a sub-folder to the maximum allowed permissions
    Given using OCS API version "<ocs_api_version>"
    And user "user2" has been created with default attributes and without skeleton files
    And user "user0" has created folder "/TMP"
    And user "user0" has created folder "/TMP/SUB"
    And user "user0" has shared folder "/TMP" with user "user1" with permissions "share,create,update,read"
    And user "user1" has shared folder "/TMP/SUB" with user "user2" with permissions "share,read"
    When user "user1" updates the last share using the sharing API with
      | permissions | share,create,update,read |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And as "user2" folder "/SUB" should exist
    And user "user2" should be able to upload file "filesForUpload/textfile.txt" to "/SUB/textfile.txt"
    And as "user1" file "/TMP/SUB" should exist
    And user "user1" should be able to upload file "filesForUpload/textfile.txt" to "/TMP/SUB/textfile.txt"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario Outline: User is not allowed to update reshare of a sub-folder with more permissions
    Given using OCS API version "<ocs_api_version>"
    And user "user2" has been created with default attributes and without skeleton files
    And user "user0" has created folder "/TMP"
    And user "user0" has created folder "/TMP/SUB"
    And user "user0" has shared folder "/TMP" with user "user1" with permissions "share,read"
    And user "user1" has shared folder "/TMP/SUB" with user "user2" with permissions "share,read"
    When user "user1" updates the last share using the sharing API with
      | permissions | all |
    Then the OCS status code should be "404"
    And the HTTP status code should be "<http_status_code>"
    And as "user2" folder "/SUB" should exist
    But user "user2" should not be able to upload file "filesForUpload/textfile.txt" to "/SUB/textfile.txt"
    And as "user1" file "/TMP/SUB" should exist
    But user "user1" should not be able to upload file "filesForUpload/textfile.txt" to "/TMP/SUB/textfile.txt"
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 404              |
