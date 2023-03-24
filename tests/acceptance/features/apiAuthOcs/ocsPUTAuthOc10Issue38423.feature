@api @files_sharing-app-required
#When this issue is fixed, please delete this file and use the one from ocsPUTAuth.feature
Feature: current oC10 behavior for issue-38423

  Scenario: Request to edit nonexistent user by authorized admin gets unauthorized in http response
      Given user "another-admin" has been created with default attributes and without skeleton files
      And user "another-admin" has been added to group "admin"
      When user "another-admin" requests these endpoints with "PUT" including body "doesnotmatter" about user "nonexistent"
        | endpoint                                         |
        | /ocs/v1.php/cloud/users/%username%               |
        | /ocs/v2.php/cloud/users/%username%               |
      Then the HTTP status code of responses on all endpoints should be "401"
      And the OCS status code of responses on all endpoints should be "997"
