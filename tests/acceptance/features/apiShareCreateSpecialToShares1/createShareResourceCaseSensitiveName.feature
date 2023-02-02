@api @files_sharing-app-required
Feature: Sharing resources with different case names with the sharee and checking the coexistence of resources on sharee/receivers side

  Background:
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |


  Scenario: sharing files with different case names with an internal user
    Given user "Alice" has uploaded the following files with content "some data"
      | path             |
      | textfile.txt     |
      | text_file.txt    |
      | 123textfile.txt  |
      | textfile.XYZ.txt |
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
      | TEXTFILE.txt     |
      | TEXT_FILE.txt    |
      | 123TEXTFILE.txt  |
      | TEXTFILE.xyz.txt |
    And user "Brian" accepts the following shares offered by user "Alice" using the sharing API
      | path              |
      | /textfile.txt     |
      | /text_file.txt    |
      | /123textfile.txt  |
      | /textfile.XYZ.txt |
      | /TEXTFILE.txt     |
      | /TEXT_FILE.txt    |
      | /123TEXTFILE.txt  |
      | /TEXTFILE.xyz.txt |
    Then the OCS status code of responses on all endpoints should be "100"
    And the HTTP status code of responses on all endpoints should be "200"
    And as "Brian" the following files should exist
      | path                     |
      | /Shares/textfile.txt     |
      | /Shares/text_file.txt    |
      | /Shares/123textfile.txt  |
      | /Shares/textfile.XYZ.txt |
      | /Shares/TEXTFILE.txt     |
      | /Shares/TEXT_FILE.txt    |
      | /Shares/123TEXTFILE.txt  |
      | /Shares/TEXTFILE.xyz.txt |


  Scenario: sharing folders with different case names with an internal user
    Given user "Alice" has created the following folders
      | path    |
      | /FO     |
      | /F_O    |
      | /123FO  |
      | /FO.XYZ |
      | /fo     |
      | /f_o    |
      | /123fo  |
      | /fo.xyz |
    When user "Alice" shares the following folders with user "Brian" using the sharing API
      | path    |
      | /FO     |
      | /F_O    |
      | /123FO  |
      | /FO.XYZ |
      | /fo     |
      | /f_o    |
      | /123fo  |
      | /fo.xyz |
    And user "Brian" accepts the following shares offered by user "Alice" using the sharing API
      | path    |
      | /FO     |
      | /F_O    |
      | /123FO  |
      | /FO.XYZ |
      | /fo     |
      | /f_o    |
      | /123fo  |
      | /fo.xyz |
    Then the OCS status code of responses on all endpoints should be "100"
    And the HTTP status code of responses on all endpoints should be "200"
    And as "Brian" the following folders should exist
      | path           |
      | /Shares/FO     |
      | /Shares/F_O    |
      | /Shares/123FO  |
      | /Shares/FO.XYZ |
      | /Shares/fo     |
      | /Shares/f_o    |
      | /Shares/123fo  |
      | /Shares/fo.xyz |


  Scenario: sharing files and folders with different case names with an internal user
    Given user "Alice" has uploaded the following files with content "some data"
      | path                  |
      | casesensitive.txt     |
      | case_sensitive.txt    |
      | 123CASE_SENSITIVE.txt |
      | casesensitive.xyz.txt |
    And user "Alice" has created the following folders
      | path               |
      | /CASESENSITIVE     |
      | /CASE_SENSITIVE    |
      | /123case_sensitive |
      | /CASESENSITIVE.xyz |
    When user "Alice" shares the following files with user "Brian" using the sharing API
      | path                  |
      | casesensitive.txt     |
      | case_sensitive.txt    |
      | 123CASE_SENSITIVE.txt |
      | casesensitive.xyz.txt |
    And user "Alice" shares the following folders with user "Brian" using the sharing API
      | path               |
      | /CASESENSITIVE     |
      | /CASE_SENSITIVE    |
      | /123case_sensitive |
      | /CASESENSITIVE.xyz |
    And user "Brian" accepts the following shares offered by user "Alice" using the sharing API
      | path                   |
      | /casesensitive.txt     |
      | /case_sensitive.txt    |
      | /123CASE_SENSITIVE.txt |
      | /casesensitive.xyz.txt |
      | /CASESENSITIVE         |
      | /CASE_SENSITIVE        |
      | /123case_sensitive     |
      | /CASESENSITIVE.xyz     |
    Then the OCS status code of responses on all endpoints should be "100"
    And the HTTP status code of responses on all endpoints should be "200"
    And as "Brian" the following files should exist
      | path                          |
      | /Shares/casesensitive.txt     |
      | /Shares/case_sensitive.txt    |
      | /Shares/123CASE_SENSITIVE.txt |
      | /Shares/casesensitive.xyz.txt |
    And as "Brian" the following folders should exist
      | path                      |
      | /Shares/CASESENSITIVE     |
      | /Shares/CASE_SENSITIVE    |
      | /Shares/123case_sensitive |
      | /Shares/CASESENSITIVE.xyz |


  Scenario: sharing files with different case names with group members
    Given group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And user "Alice" has uploaded the following files with content "some data"
      | path             |
      | textfile.txt     |
      | text_file.txt    |
      | 123textfile.txt  |
      | textfile.XYZ.txt |
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
      | TEXTFILE.txt     |
      | TEXT_FILE.txt    |
      | 123TEXTFILE.txt  |
      | TEXTFILE.xyz.txt |
    And user "Brian" accepts the following shares offered by user "Alice" using the sharing API
      | path              |
      | /textfile.txt     |
      | /text_file.txt    |
      | /123textfile.txt  |
      | /textfile.XYZ.txt |
      | /TEXTFILE.txt     |
      | /TEXT_FILE.txt    |
      | /123TEXTFILE.txt  |
      | /TEXTFILE.xyz.txt |
    Then the OCS status code of responses on all endpoints should be "100"
    And the HTTP status code of responses on all endpoints should be "200"
    And as "Brian" the following files should exist
      | path                     |
      | /Shares/textfile.txt     |
      | /Shares/text_file.txt    |
      | /Shares/123textfile.txt  |
      | /Shares/textfile.XYZ.txt |
      | /Shares/TEXTFILE.txt     |
      | /Shares/TEXT_FILE.txt    |
      | /Shares/123TEXTFILE.txt  |
      | /Shares/TEXTFILE.xyz.txt |


  Scenario: sharing folders with different case names with group members
    Given group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And user "Alice" has created the following folders
      | path    |
      | /FO     |
      | /F_O    |
      | /123FO  |
      | /FO.XYZ |
      | /fo     |
      | /f_o    |
      | /123fo  |
      | /fo.xyz |
    When user "Alice" shares the following folders with group "grp1" using the sharing API
      | path    |
      | /FO     |
      | /F_O    |
      | /123FO  |
      | /FO.XYZ |
      | /fo     |
      | /f_o    |
      | /123fo  |
      | /fo.xyz |
    And user "Brian" accepts the following shares offered by user "Alice" using the sharing API
      | path    |
      | /FO     |
      | /F_O    |
      | /123FO  |
      | /FO.XYZ |
      | /fo     |
      | /f_o    |
      | /123fo  |
      | /fo.xyz |
    Then the OCS status code of responses on all endpoints should be "100"
    And the HTTP status code of responses on all endpoints should be "200"
    And as "Brian" the following folders should exist
      | path           |
      | /Shares/FO     |
      | /Shares/F_O    |
      | /Shares/123FO  |
      | /Shares/FO.XYZ |
      | /Shares/fo     |
      | /Shares/f_o    |
      | /Shares/123fo  |
      | /Shares/fo.xyz |


  Scenario: sharing files and folders with different case names with group members
    Given group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And user "Alice" has uploaded the following files with content "some data"
      | path                  |
      | casesensitive.txt     |
      | case_sensitive.txt    |
      | 123CASE_SENSITIVE.txt |
      | casesensitive.xyz.txt |
    And user "Alice" has created the following folders
      | path               |
      | /CASESENSITIVE     |
      | /CASE_SENSITIVE    |
      | /123case_sensitive |
      | /CASESENSITIVE.xyz |
    When user "Alice" shares the following files with group "grp1" using the sharing API
      | path                  |
      | casesensitive.txt     |
      | case_sensitive.txt    |
      | 123CASE_SENSITIVE.txt |
      | casesensitive.xyz.txt |
    And user "Alice" shares the following folders with group "grp1" using the sharing API
      | path               |
      | /CASESENSITIVE     |
      | /CASE_SENSITIVE    |
      | /123case_sensitive |
      | /CASESENSITIVE.xyz |
    And user "Brian" accepts the following shares offered by user "Alice" using the sharing API
      | path                   |
      | /casesensitive.txt     |
      | /case_sensitive.txt    |
      | /123CASE_SENSITIVE.txt |
      | /casesensitive.xyz.txt |
      | /CASESENSITIVE         |
      | /CASE_SENSITIVE        |
      | /123case_sensitive     |
      | /CASESENSITIVE.xyz     |
    Then the OCS status code of responses on all endpoints should be "100"
    And the HTTP status code of responses on all endpoints should be "200"
    And as "Brian" the following files should exist
      | path                          |
      | /Shares/casesensitive.txt     |
      | /Shares/case_sensitive.txt    |
      | /Shares/123CASE_SENSITIVE.txt |
      | /Shares/casesensitive.xyz.txt |
    And as "Brian" the following folders should exist
      | path                      |
      | /Shares/CASESENSITIVE     |
      | /Shares/CASE_SENSITIVE    |
      | /Shares/123case_sensitive |
      | /Shares/CASESENSITIVE.xyz |
