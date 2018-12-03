@api @TestAlsoOnExternalUserBackend
Feature: sharing

  Background:
    Given using old DAV path
    And user "user0" has been created with default attributes
    And user "user1" has been created with default attributes

  @smokeTest
  Scenario Outline: getting all shares of a user using that user
    Given using OCS API version "<ocs_api_version>"
    And user "user0" has moved file "/textfile0.txt" to "/file_to_share.txt"
    And user "user0" has shared file "file_to_share.txt" with user "user1"
    When user "user0" gets all shares shared by him using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And file "file_to_share.txt" should be included in the response
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario Outline: getting all shares of a user using another user
    Given using OCS API version "<ocs_api_version>"
    And user "user0" has shared file "textfile0.txt" with user "user1"
    When the administrator gets all shares shared by him using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And file "textfile0.txt" should not be included in the response
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @smokeTest
  Scenario Outline: getting all shares of a file
    Given using OCS API version "<ocs_api_version>"
    And user "user2" has been created with default attributes
    And user "user3" has been created with default attributes
    And user "user0" has shared file "textfile0.txt" with user "user1"
    And user "user0" has shared file "textfile0.txt" with user "user2"
    When user "user0" gets all the shares from the file "textfile0.txt" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And user "user1" should be included in the response
    And user "user2" should be included in the response
    And user "user3" should not be included in the response
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @smokeTest
  Scenario Outline: getting all shares of a file with reshares
    Given using OCS API version "<ocs_api_version>"
    And user "user2" has been created with default attributes
    And user "user3" has been created with default attributes
    And user "user0" has shared file "textfile0.txt" with user "user1"
    And user "user1" has shared file "textfile0 (2).txt" with user "user2"
    When user "user0" gets all the shares with reshares from the file "textfile0.txt" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And user "user1" should be included in the response
    And user "user2" should be included in the response
    And user "user3" should not be included in the response
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @smokeTest
  Scenario Outline: User's own shares reshared to him don't appear when getting "shared with me" shares
    Given using OCS API version "<ocs_api_version>"
    And group "grp1" has been created
    And user "user2" has been created with default attributes
    And user "user2" has been added to group "grp1"
    And user "user2" has created a folder "/shared"
    And user "user2" has moved file "/textfile0.txt" to "/shared/shared_file.txt"
    And user "user2" has shared folder "/shared" with user "user1"
    And user "user1" has shared folder "/shared" with group "grp1"
    When user "user2" gets all the shares shared with him using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the last share_id should not be included in the response
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @smokeTest
  Scenario Outline: getting share info of a share
    Given using OCS API version "<ocs_api_version>"
    And user "user0" has moved file "/textfile0.txt" to "/file_to_share.txt"
    And user "user0" has shared file "file_to_share.txt" with user "user1"
    When user "user0" gets the info of the last share using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the share fields of the last share should include
      | id                     | A_NUMBER           |
      | item_type              | file               |
      | item_source            | A_NUMBER           |
      | share_type             | 0                  |
      | share_with             | user1              |
      | file_source            | A_NUMBER           |
      | file_target            | /file_to_share.txt |
      | path                   | /file_to_share.txt |
      | permissions            | 19                 |
      | stime                  | A_NUMBER           |
      | storage                | A_NUMBER           |
      | mail_send              | 0                  |
      | uid_owner              | user0              |
      | file_parent            | A_NUMBER           |
      | share_with_displayname | User One           |
      | displayname_owner      | User Zero          |
      | mimetype               | text/plain         |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario Outline: Get a share with a user that didn't receive the share
    Given using OCS API version "<ocs_api_version>"
    And user "user2" has been created with default attributes
    And user "user0" has shared file "textfile0.txt" with user "user1"
    When user "user2" gets the info of the last share using the sharing API
    Then the OCS status code should be "404"
    And the HTTP status code should be "<http_status_code>"
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 404              |

  @skipOnLDAP
  Scenario: Share of folder to a group, remove user from that group
    Given using OCS API version "1"
    And user "user2" has been created with default attributes
    And group "group0" has been created
    And user "user1" has been added to group "group0"
    And user "user2" has been added to group "group0"
    And user "user0" has shared folder "/PARENT" with group "group0"
    When the administrator removes user "user2" from group "group0" using the provisioning API
    Then user "user1" should see the following elements
      | /FOLDER/                 |
      | /PARENT/                 |
      | /PARENT/parent.txt       |
      | /PARENT%20(2)/           |
      | /PARENT%20(2)/parent.txt |
    And user "user2" should see the following elements
      | /FOLDER/           |
      | /PARENT/           |
      | /PARENT/parent.txt |
    But user "user2" should not see the following elements
      | /PARENT%20(2)/           |
      | /PARENT%20(2)/parent.txt |

  Scenario Outline: getting all the shares inside the folder
    Given using OCS API version "<ocs_api_version>"
    And user "user0" has shared file "PARENT/parent.txt" with user "user1"
    When user "user0" gets all the shares inside the folder "PARENT" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And file "parent.txt" should be included in the response
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |