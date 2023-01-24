@api @files_sharing-app-required
Feature: Sharing resources with different case names with the sharee and checking the coexistence of resources on sharee/receivers side

  Background:
    Given using OCS API version "1"
    And these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |


  Scenario: sharing file with an internal user that has existing files with different case names
    Given user "Alice" has uploaded the following files with content "some data"
      | path             |
      | textfile.txt     |
      | text_file.txt    |
      | 123textfile.txt  |
      | textfile.XYZ.txt |
    And user "Brian" has uploaded the following files with content "some data"
      | path             |
      | TEXTFILE.txt     |
      | TEXT_FILE.txt    |
      | 123TEXTFILE.txt  |
      | TEXTFILE.xyz.txt |
    When user "Alice" shares the following files with user "Brian" using the sharing API
      | path             |
      | textfile.txt     |
      | text_file.txt    |
      | 123textfile.txt  |
      | textfile.XYZ.txt |
    Then the OCS status code of responses on all endpoints should be "100"
    And the HTTP status code of responses on all endpoints should be "200"
    And as "Brian" the following files should exist
      | path             |
      | TEXTFILE.txt     |
      | TEXT_FILE.txt    |
      | 123TEXTFILE.txt  |
      | TEXTFILE.xyz.txt |
      | textfile.txt     |
      | text_file.txt    |
      | 123textfile.txt  |
      | textfile.XYZ.txt |


  Scenario: sharing folder with an internal user that has existing folders with different case names
    Given user "Alice" has created the following folders
      | path     |
      | /FO/     |
      | /F_O/    |
      | /123FO/  |
      | /FO.XYZ/ |
    And user "Brian" has created the following folders
      | path     |
      | /fo/     |
      | /f_o/    |
      | /123fo/  |
      | /fo.xyz/ |
    When user "Alice" shares the following folders with user "Brian" using the sharing API
      | path     |
      | /FO/     |
      | /F_O/    |
      | /123FO/  |
      | /FO.XYZ/ |
    Then the OCS status code of responses on all endpoints should be "100"
    And the HTTP status code of responses on all endpoints should be "200"
    And as "Brian" the following folders should exist
      | path     |
      | /FO/     |
      | /F_O/    |
      | /123FO/  |
      | /FO.XYZ/ |
      | /fo/     |
      | /f_o/    |
      | /123fo/  |
      | /fo.xyz/ |


  Scenario: sharing file with an internal user that has existing folders with different case names
    Given user "Alice" has uploaded the following files with content "some data"
      | path                  |
      | casesensitive.txt     |
      | case_sensitive.txt    |
      | 123CASE_SENSITIVE.txt |
      | casesensitive.xyz.txt |
    And user "Brian" has created the following folders
      | path                |
      | /CASESENSITIVE/     |
      | /CASE_SENSITIVE/    |
      | /123case_sensitive/ |
      | /CASESENSITIVE.xyz/ |
    When user "Alice" shares the following files with user "Brian" using the sharing API
      | path                  |
      | casesensitive.txt     |
      | case_sensitive.txt    |
      | 123CASE_SENSITIVE.txt |
      | casesensitive.xyz.txt |
    Then the OCS status code of responses on all endpoints should be "100"
    And the HTTP status code of responses on all endpoints should be "200"
    And as "Brian" the following folders should exist
      | path                |
      | /CASESENSITIVE/     |
      | /CASE_SENSITIVE/    |
      | /123case_sensitive/ |
      | /CASESENSITIVE.xyz/ |
    And as "Brian" the following files should exist
      | path                  |
      | casesensitive.txt     |
      | case_sensitive.txt    |
      | 123CASE_SENSITIVE.txt |
      | casesensitive.xyz.txt |


  Scenario: sharing folder with an internal user that has existing files with different case names
    Given user "Alice" has created the following folders
      | path                |
      | /CASESENSITIVE/     |
      | /CASE_SENSITIVE/    |
      | /123case_sensitive/ |
      | /CASESENSITIVE.xyz/ |
    And user "Brian" has uploaded the following files with content "some data"
      | path                  |
      | casesensitive.txt     |
      | case_sensitive.txt    |
      | 123CASE_SENSITIVE.txt |
      | casesensitive.xyz.txt |
    When user "Alice" shares the following folders with user "Brian" using the sharing API
      | path                |
      | /CASESENSITIVE/     |
      | /CASE_SENSITIVE/    |
      | /123case_sensitive/ |
      | /CASESENSITIVE.xyz/ |
    Then the OCS status code of responses on all endpoints should be "100"
    And the HTTP status code of responses on all endpoints should be "200"
    And as "Brian" the following files should exist
      | path                  |
      | casesensitive.txt     |
      | case_sensitive.txt    |
      | 123CASE_SENSITIVE.txt |
      | casesensitive.xyz.txt |
    And as "Brian" the following folders should exist
      | path                |
      | /CASESENSITIVE/     |
      | /CASE_SENSITIVE/    |
      | /123case_sensitive/ |
      | /CASESENSITIVE.xyz/ |


  Scenario: sharing file with group members that has existing files with different case names
    Given group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And user "Alice" has uploaded the following files with content "some data"
      | path             |
      | textfile.txt     |
      | text_file.txt    |
      | 123textfile.txt  |
      | textfile.XYZ.txt |
    And user "Brian" has uploaded the following files with content "some data"
      | path             |
      | TEXTFILE.txt     |
      | TEXT_FILE.txt    |
      | 123TEXTFILE.txt  |
      | TEXTFILE.xyz.txt |
    When user "Alice" shares the following files with group "grp1" using the sharing API
      | path             |
      | textfile.txt     |
      | text_file.txt    |
      | 123textfile.txt  |
      | textfile.XYZ.txt |
    Then the OCS status code of responses on all endpoints should be "100"
    And the HTTP status code of responses on all endpoints should be "200"
    And as "Brian" the following files should exist
      | path             |
      | TEXTFILE.txt     |
      | TEXT_FILE.txt    |
      | 123TEXTFILE.txt  |
      | TEXTFILE.xyz.txt |
      | textfile.txt     |
      | text_file.txt    |
      | 123textfile.txt  |
      | textfile.XYZ.txt |


  Scenario: sharing folder with group members that has existing folders with different case names
    Given group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And user "Alice" has created the following folders
      | path     |
      | /FO/     |
      | /F_O/    |
      | /123FO/  |
      | /FO.XYZ/ |
    And user "Brian" has created the following folders
      | path     |
      | /fo/     |
      | /f_o/    |
      | /123fo/  |
      | /fo.xyz/ |
    When user "Alice" shares the following folders with group "grp1" using the sharing API
      | path     |
      | /FO/     |
      | /F_O/    |
      | /123FO/  |
      | /FO.XYZ/ |
    Then the OCS status code of responses on all endpoints should be "100"
    And the HTTP status code of responses on all endpoints should be "200"
    And as "Brian" the following folders should exist
      | path     |
      | /fo/     |
      | /f_o/    |
      | /123fo/  |
      | /fo.xyz/ |
      | /FO/     |
      | /F_O/    |
      | /123FO/  |
      | /FO.XYZ/ |


  Scenario: sharing file with group members that has existing folders with different case names
    Given group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And user "Alice" has uploaded the following files with content "some data"
      | path                  |
      | casesensitive.txt     |
      | case_sensitive.txt    |
      | 123CASE_SENSITIVE.txt |
      | casesensitive.xyz.txt |
    And user "Brian" has created the following folders
      | path                |
      | /CASESENSITIVE/     |
      | /CASE_SENSITIVE/    |
      | /123case_sensitive/ |
      | /CASESENSITIVE.xyz/ |
    When user "Alice" shares the following files with group "grp1" using the sharing API
      | path                  |
      | casesensitive.txt     |
      | case_sensitive.txt    |
      | 123CASE_SENSITIVE.txt |
      | casesensitive.xyz.txt |
    Then the OCS status code of responses on all endpoints should be "100"
    And the HTTP status code of responses on all endpoints should be "200"
    And as "Brian" the following folders should exist
      | path                |
      | /CASESENSITIVE/     |
      | /CASE_SENSITIVE/    |
      | /123case_sensitive/ |
      | /CASESENSITIVE.xyz/ |
    And as "Brian" the following files should exist
      | path                  |
      | casesensitive.txt     |
      | case_sensitive.txt    |
      | 123CASE_SENSITIVE.txt |
      | casesensitive.xyz.txt |


  Scenario: sharing folder with group members that has existing files with different case names
    Given group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And user "Alice" has created the following folders
      | path                |
      | /CASESENSITIVE/     |
      | /CASE_SENSITIVE/    |
      | /123case_sensitive/ |
      | /CASESENSITIVE.xyz/ |
    And user "Brian" has uploaded the following files with content "some data"
      | path                  |
      | casesensitive.txt     |
      | case_sensitive.txt    |
      | 123CASE_SENSITIVE.txt |
      | casesensitive.xyz.txt |
    When user "Alice" shares the following folders with group "grp1" using the sharing API
      | path                |
      | /CASESENSITIVE/     |
      | /CASE_SENSITIVE/    |
      | /123case_sensitive/ |
      | /CASESENSITIVE.xyz/ |
    Then the OCS status code of responses on all endpoints should be "100"
    And the HTTP status code of responses on all endpoints should be "200"
    And as "Brian" the following files should exist
      | path                  |
      | casesensitive.txt     |
      | case_sensitive.txt    |
      | 123CASE_SENSITIVE.txt |
      | casesensitive.xyz.txt |
    And as "Brian" the following folders should exist
      | path                |
      | /CASESENSITIVE/     |
      | /CASE_SENSITIVE/    |
      | /123case_sensitive/ |
      | /CASESENSITIVE.xyz/ |
