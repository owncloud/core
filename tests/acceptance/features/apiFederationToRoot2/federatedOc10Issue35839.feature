@api @federation-app-required @files_sharing-app-required
Feature: current oC10 behavior for issue-35839

  Background:
    Given using server "REMOTE"
    And user "Alice" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "textfile0.txt"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "textfile1.txt"
    And using server "LOCAL"
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has uploaded file "filesForUpload/textfile.txt" to "textfile0.txt"
    And user "Brian" has uploaded file "filesForUpload/textfile.txt" to "textfile1.txt"

  @issue-35839
  Scenario: "Auto accept from trusted servers" enabled with remote server
    Given the trusted server list is cleared
    # Remove this line once the issue is resolved
    And parameter "autoAddServers" of app "federation" has been set to "0"
    And parameter "auto_accept_trusted" of app "federatedfilesharing" has been set to "yes"
    When the administrator adds url "%remote_server%" as trusted server using the testing API
    And user "Alice" from server "REMOTE" shares "/textfile1.txt" with user "Brian" from server "LOCAL" using the sharing API
    And using server "LOCAL"
    Then the OCS status code of responses on each endpoint should be "201, 100" respectively
    And the HTTP status code of responses on each endpoint should be "201, 200" respectively
    And as "Brian" file "textfile1 (2).txt" should exist
    And url "%remote_server%" should be a trusted server

  @issue-35839
  Scenario: "Auto accept from trusted servers" disabled with remote server
    Given the trusted server list is cleared
    # Remove this line once the issue is resolved
    And parameter "autoAddServers" of app "federation" has been set to "0"
    And parameter "auto_accept_trusted" of app "federatedfilesharing" has been set to "no"
    When the administrator adds url "%remote_server%" as trusted server using the testing API
    And user "Alice" from server "REMOTE" shares "/textfile1.txt" with user "Brian" from server "LOCAL" using the sharing API
    And using server "LOCAL"
    Then the OCS status code of responses on each endpoint should be "201, 100" respectively
    And the HTTP status code of responses on each endpoint should be "201, 200" respectively
    And as "Brian" file "textfile1 (2).txt" should not exist
    And url "%remote_server%" should be a trusted server

  @issue-35839
  Scenario: enable "Add server automatically" once a federated share was created successfully
    Given parameter "autoAddServers" of app "federation" has been set to "1"
    And parameter "auto_accept_trusted" of app "federatedfilesharing" has been set to "yes"
    When user "Alice" from server "REMOTE" shares "/textfile0.txt" with user "Brian" from server "LOCAL" using the sharing API
    And user "Brian" from server "LOCAL" accepts the last pending share using the sharing API
    And using server "LOCAL"
    Then the OCS status code of responses on all endpoints should be "100"
    And the HTTP status code of responses on all endpoints should be "200"
    And url "%remote_server%" should be a trusted server
    When user "Alice" from server "REMOTE" shares "/textfile1.txt" with user "Brian" from server "LOCAL" using the sharing API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    #Then as "Brian" file "textfile1 (2).txt" should exist
    And as "Brian" file "textfile1 (2).txt" should not exist

  @issue-35839
  Scenario: disable "Add server automatically" once a federated share was created successfully
    Given using server "LOCAL"
    And the trusted server list is cleared
    And parameter "autoAddServers" of app "federation" has been set to "0"
    And parameter "auto_accept_trusted" of app "federatedfilesharing" has been set to "yes"
    When user "Alice" from server "REMOTE" shares "/textfile0.txt" with user "Brian" from server "LOCAL" using the sharing API
    And user "Brian" from server "LOCAL" accepts the last pending share using the sharing API
    And using server "LOCAL"
    Then the OCS status code of responses on all endpoints should be "100"
    And the HTTP status code of responses on all endpoints should be "200"
    And url "%remote_server%" should not be a trusted server
    # Remove this line once the issue is resolved
    When the administrator sets parameter "autoAddServers" of app "federation" to "0"
    And user "Alice" from server "REMOTE" shares "/textfile1.txt" with user "Brian" from server "LOCAL" using the sharing API
    Then the OCS status code of responses on all endpoints should be "100"
    And the HTTP status code of responses on all endpoints should be "200"
    And as "Brian" file "textfile1 (2).txt" should not exist
