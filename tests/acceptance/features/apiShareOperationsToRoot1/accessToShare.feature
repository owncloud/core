@api @files_sharing-app-required
Feature: sharing

  Background:
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
    And user "Alice" has uploaded file with content "some data" to "/textfile0.txt"
    And user "Brian" has uploaded file with content "some data" to "/textfile0.txt"

  @smokeTest
  Scenario Outline: Sharee can see the share
    Given using OCS API version "<ocs_api_version>"
    And user "Alice" has shared file "textfile0.txt" with user "Brian"
    When user "Brian" gets all the shares shared with him using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the last share_id should be included in the response
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @smokeTest
  Scenario Outline: Sharee can see the filtered share
    Given using OCS API version "<ocs_api_version>"
    And user "Alice" has uploaded file with content "some data" to "/textfile1.txt"
    And user "Brian" has uploaded file with content "some data" to "/textfile1.txt"
    And user "Alice" has shared file "textfile0.txt" with user "Brian"
    And user "Alice" has shared file "textfile1.txt" with user "Brian"
    When user "Brian" gets all the shares shared with him that are received as file "textfile1 (2).txt" using the provisioning API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the last share_id should be included in the response
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @smokeTest
  Scenario Outline: Sharee can't see the share that is filtered out
    Given using OCS API version "<ocs_api_version>"
    And user "Alice" has uploaded file with content "some data" to "/textfile1.txt"
    And user "Brian" has uploaded file with content "some data" to "/textfile1.txt"
    And user "Alice" has shared file "textfile0.txt" with user "Brian"
    And user "Alice" has shared file "textfile1.txt" with user "Brian"
    When user "Brian" gets all the shares shared with him that are received as file "textfile0 (2).txt" using the provisioning API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the last share id should not be included in the response
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @smokeTest
  Scenario Outline: Sharee can see the group share
    Given using OCS API version "<ocs_api_version>"
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And user "Alice" has shared file "textfile0.txt" with group "grp1"
    When user "Brian" gets all the shares shared with him using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the last share_id should be included in the response
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |


  Scenario Outline: user should not be able to access a pending share (file)
    Given using OCS API version "<ocs_api_version>"
    And auto-accept shares has been disabled
    And user "Alice" has uploaded file with content "test data" to "/textfile1.txt"
    When user "Alice" shares file "/textfile1.txt" with user "Brian" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And as "Brian" file "textfile1.txt" should not exist
    And the sharing API should report to user "Brian" that these shares are in the pending state
      | path           |
      | /textfile1.txt |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |


  Scenario Outline: user should not be able to access a pending share (folder)
    Given using OCS API version "<ocs_api_version>"
    And auto-accept shares has been disabled
    And user "Alice" has created folder "simple-folder"
    And user "Alice" has created folder "simple-folder/sub"
    And user "Alice" has uploaded file with content "test data" to "/simple-folder/textfile1.txt"
    When user "Alice" shares file "/simple-folder" with user "Brian" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And as "Brian" folder "simple-folder/" should not exist
    And as "Brian" folder "simple-folder/sub" should not exist
    And as "Brian" file "simple-folder/textfile1.txt" should not exist
    And the sharing API should report to user "Brian" that these shares are in the pending state
      | path           |
      | /simple-folder |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |
