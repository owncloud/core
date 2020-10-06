@api @federation-app-required @files_sharing-app-required @notToImplementOnOCIS
Feature: current oC10 behavior for issue-35839

  Background:
    Given using server "REMOTE"
    And user "Alice" has been created with default attributes and skeleton files
    And using server "LOCAL"
    And user "Brian" has been created with default attributes and skeleton files

  @issue-35839
  Scenario: "Auto accept from trusted servers" enabled with remote server
    Given the trusted server list is cleared
    # Remove this line once the issue is resolved
    And parameter "autoAddServers" of app "federation" has been set to "0"
    And parameter "auto_accept_trusted" of app "federatedfilesharing" has been set to "yes"
    When the administrator adds url "%remote_server%" as trusted server using the testing API
    And user "Alice" from server "REMOTE" shares "/textfile1.txt" with user "Brian" from server "LOCAL" using the sharing API
    And using server "LOCAL"
    Then as "Brian" file "textfile1 (2).txt" should exist
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
    Then as "Brian" file "textfile1 (2).txt" should not exist
    And url "%remote_server%" should be a trusted server

  @issue-35839
  Scenario: enable "Add server automatically" once a federated share was created successfully
    Given parameter "autoAddServers" of app "federation" has been set to "1"
    And parameter "auto_accept_trusted" of app "federatedfilesharing" has been set to "yes"
    When user "Alice" from server "REMOTE" shares "/textfile0.txt" with user "Brian" from server "LOCAL" using the sharing API
    And user "Brian" from server "LOCAL" has accepted the last pending share
    And using server "LOCAL"
    Then url "%remote_server%" should be a trusted server
    When user "Alice" from server "REMOTE" shares "/textfile1.txt" with user "Brian" from server "LOCAL" using the sharing API
    #Then as "Brian" file "textfile1 (2).txt" should exist
    Then as "Brian" file "textfile1 (2).txt" should not exist

  @issue-35839
  Scenario: disable "Add server automatically" once a federated share was created successfully
    Given using server "LOCAL"
    And the trusted server list is cleared
    And parameter "autoAddServers" of app "federation" has been set to "0"
    And parameter "auto_accept_trusted" of app "federatedfilesharing" has been set to "yes"
    When user "Alice" from server "REMOTE" shares "/textfile0.txt" with user "Brian" from server "LOCAL" using the sharing API
    And user "Brian" from server "LOCAL" has accepted the last pending share
    And using server "LOCAL"
    Then url "%remote_server%" should not be a trusted server
    # Remove this line once the issue is resolved
    When the administrator sets parameter "autoAddServers" of app "federation" to "0"
    And user "Alice" from server "REMOTE" shares "/textfile1.txt" with user "Brian" from server "LOCAL" using the sharing API
    And as "Brian" file "textfile1 (2).txt" should not exist
