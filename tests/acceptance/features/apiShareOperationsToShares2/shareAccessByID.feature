@api @files_sharing-app-required
Feature: share access by ID

  Background:
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |


  Scenario Outline: Get a share with a valid share ID
    Given using OCS API version "<ocs_api_version>"
    And user "Alice" has uploaded file with content "ownCloud test text file 0" to "/textfile0.txt"
    When user "Alice" shares file "textfile0.txt" with user "Brian" using the sharing API
    And user "Brian" accepts share "/textfile0.txt" offered by user "Alice" using the sharing API
    And user "Alice" gets share with id "%last_share_id%" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the fields of the last response to user "Alice" sharing with user "Brian" should include
      | share_with             | %username%            |
      | share_with_displayname | %displayname%         |
      | file_target            | /Shares/textfile0.txt |
      | path                   | /textfile0.txt        |
      | permissions            | share,read,update     |
      | uid_owner              | %username%            |
      | displayname_owner      | %displayname%         |
      | item_type              | file                  |
      | mimetype               | text/plain            |
      | storage_id             | ANY_VALUE             |
      | share_type             | user                  |
    And the content of file "/Shares/textfile0.txt" for user "Brian" should be "ownCloud test text file 0"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |


  Scenario Outline: Get a share with an invalid share id
    Given using OCS API version "<ocs_api_version>"
    When user "Alice" gets share with id "<share_id>" using the sharing API
    Then the OCS status code should be "404"
    And the HTTP status code should be "<http_status_code>"
    And the API should not return any data
    Examples:
      | ocs_api_version | share_id   | http_status_code |
      | 1               | 2333311    | 200              |
      | 2               | 2333311    | 404              |
      | 1               | helloshare | 200              |
      | 2               | helloshare | 404              |
      | 1               | $#@r3      | 200              |
      | 2               | $#@r3      | 404              |
      | 1               | 0          | 200              |
      | 2               | 0          | 404              |


  Scenario Outline: accept a share using the share Id
    Given using OCS API version "<ocs_api_version>"
    And user "Alice" has uploaded file with content "ownCloud test text file 0" to "/textfile0.txt"
    When user "Alice" shares file "textfile0.txt" with user "Brian" using the sharing API
    And user "Brian" accepts share with ID "%last_share_id%" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And user "Brian" should see the following elements
      | /Shares/textfile0.txt |
    And the sharing API should report to user "Brian" that these shares are in the accepted state
      | path                  |
      | /Shares/textfile0.txt |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |


  Scenario Outline: accept a share using the invalid share Id
    Given parameter "shareapi_auto_accept_share" of app "core" has been set to "yes"
    And using OCS API version "<ocs_api_version>"
    When user "Brian" accepts share with ID "<share_id>" using the sharing API
    Then the OCS status code should be "404"
    And the HTTP status code should be "<http_status_code>"
    And the API should not return any data
    Examples:
      | ocs_api_version | share_id   | http_status_code |
      | 1               | 2333311    | 200              |
      | 2               | 2333311    | 404              |
      | 1               | helloshare | 200              |
      | 2               | helloshare | 404              |
      | 1               | $#@r3      | 200              |
      | 2               | $#@r3      | 404              |
      | 1               | 0          | 200              |
      | 2               | 0          | 404              |


  Scenario Outline: accept a share using empty share Id
    Given parameter "shareapi_auto_accept_share" of app "core" has been set to "yes"
    And using OCS API version "<ocs_api_version>"
    When user "Brian" accepts share with ID "" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "<http_status_code>"
    And the API should not return any data
    Examples:
      | ocs_api_version | http_status_code | ocs_status_code |
      | 1               | 200              | 999             |
      | 2               | 500              | 500             |


  Scenario Outline: decline a share using the share Id
    Given using OCS API version "<ocs_api_version>"
    And user "Alice" has uploaded file with content "ownCloud test text file 0" to "/textfile0.txt"
    And user "Alice" has shared file "textfile0.txt" with user "Brian"
    And user "Brian" has accepted share "/textfile0.txt" offered by user "Alice"
    When user "Brian" declines share with ID "%last_share_id%" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And user "Brian" should not see the following elements
      | /Shares/textfile0.txt |
    And the sharing API should report to user "Brian" that these shares are in the declined state
      | path                  |
      | <declined_share_path> |
    Examples:
      | ocs_api_version | ocs_status_code | declined_share_path   |
      | 1               | 100             | /Shares/textfile0.txt |
      | 2               | 200             | /Shares/textfile0.txt |


  Scenario Outline: decline a share using a invalid share Id
    Given parameter "shareapi_auto_accept_share" of app "core" has been set to "yes"
    And using OCS API version "<ocs_api_version>"
    When user "Brian" declines share with ID "<share_id>" using the sharing API
    Then the OCS status code should be "404"
    And the HTTP status code should be "<http_status_code>"
    And the API should not return any data
    Examples:
      | ocs_api_version | share_id   | http_status_code |
      | 1               | 2333311    | 200              |
      | 2               | 2333311    | 404              |
      | 1               | helloshare | 200              |
      | 2               | helloshare | 404              |
      | 1               | $#@r3      | 200              |
      | 2               | $#@r3      | 404              |
      | 1               | 0          | 200              |
      | 2               | 0          | 404              |


  Scenario Outline: decline a share using empty share Id
    Given parameter "shareapi_auto_accept_share" of app "core" has been set to "yes"
    And using OCS API version "<ocs_api_version>"
    When user "Brian" declines share with ID "" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "<http_status_code>"
    And the API should not return any data
    Examples:
      | ocs_api_version | http_status_code | ocs_status_code |
      | 1               | 200              | 999             |
      | 2               | 500              | 500             |
