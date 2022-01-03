@api @files_versions-app-required @issue-ocis-reva-275

Feature: file versions remember the author of each version

  Background:
    Given using OCS API version "2"
    And using new DAV path
    And user "Alice" has been created with default attributes and without skeleton files

  @skip_on_objectstore @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: enable file versioning and check the history of changes from multiple users
    Given the administrator has enabled the file version storage feature
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "David" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "/test"
    And user "Alice" has shared folder "/test" with user "Brian" with permissions "all"
    And user "Alice" has shared folder "/test" with user "Carol" with permissions "all"
    And user "Alice" has shared folder "/test" with user "David" with permissions "all"
    And user "Alice" has uploaded file with content "uploaded content alice" to "/test/textfile0.txt"
    And user "Brian" has uploaded file with content "uploaded content brian" to "/test/textfile0.txt"
    And user "Carol" has uploaded file with content "uploaded content carol" to "/test/textfile0.txt"
    And user "David" has uploaded file with content "uploaded content david" to "/test/textfile0.txt"
    When user "Alice" gets the number of versions of file "/test/textfile0.txt"
    Then the number of versions should be "3"
    When user "Alice" downloads the version of file "/test/textfile0.txt" with the index "1"
    Then the HTTP status code should be "200"
    And the following headers should be set
      | header              | value                                                                |
      | Content-Disposition | attachment; filename*=UTF-8''textfile0.txt; filename="textfile0.txt" |
    And the downloaded content should be "uploaded content carol"
    When user "Alice" downloads the version of file "test/textfile0.txt" with the index "2"
    Then the HTTP status code should be "200"
    And the following headers should be set
      | header              | value                                                                |
      | Content-Disposition | attachment; filename*=UTF-8''textfile0.txt; filename="textfile0.txt" |
    And the downloaded content should be "uploaded content brian"
    When user "Alice" downloads the version of file "test/textfile0.txt" with the index "3"
    Then the HTTP status code should be "200"
    And the following headers should be set
      | header              | value                                                                |
      | Content-Disposition | attachment; filename*=UTF-8''textfile0.txt; filename="textfile0.txt" |
    And the downloaded content should be "uploaded content alice"
    When user "Alice" gets the version metadata of file "/test/textfile0.txt"
    Then the author of the created version with index "1" should be "Carol"
    And the author of the created version with index "2" should be "Brian"
    And the author of the created version with index "3" should be "Alice"

  @skip_on_objectstore @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: enable file versioning and check the history of changes from multiple users for shared folder in the group
    Given the administrator has enabled the file version storage feature
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "/test"
    And group "grp1" has been created
    And user "Alice" has been added to group "grp1"
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has shared folder "/test" with group "grp1"
    And user "Alice" has uploaded file with content "uploaded content alice" to "/test/textfile0.txt"
    And user "Brian" has uploaded file with content "uploaded content brian" to "/test/textfile0.txt"
    And user "Carol" has uploaded file with content "uploaded content carol" to "/test/textfile0.txt"
    When user "Alice" gets the number of versions of file "/test/textfile0.txt"
    Then the number of versions should be "2"
    When user "Alice" downloads the version of file "test/textfile0.txt" with the index "1"
    Then the HTTP status code should be "200"
    And the following headers should be set
      | header              | value                                                                |
      | Content-Disposition | attachment; filename*=UTF-8''textfile0.txt; filename="textfile0.txt" |
    And the downloaded content should be "uploaded content brian"
    When user "Alice" downloads the version of file "test/textfile0.txt" with the index "2"
    Then the HTTP status code should be "200"
    And the following headers should be set
      | header              | value                                                                |
      | Content-Disposition | attachment; filename*=UTF-8''textfile0.txt; filename="textfile0.txt" |
    And the downloaded content should be "uploaded content alice"
    When user "Alice" gets the version metadata of file "/test/textfile0.txt"
    Then the author of the created version with index "1" should be "Brian"
    And the author of the created version with index "2" should be "Alice"

  @skip_on_objectstore @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: enable file versioning and check the history of changes from multiple users for shared file in the group
    Given the administrator has enabled the file version storage feature
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    And user "Alice" has been added to group "grp1"
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has uploaded file with content "uploaded content alice" to "/textfile0.txt"
    And user "Alice" has shared file "/textfile0.txt" with group "grp1"
    And user "Brian" has uploaded file with content "uploaded content brian" to "/textfile0.txt"
    And user "Carol" has uploaded file with content "uploaded content carol" to "/textfile0.txt"
    When user "Alice" gets the number of versions of file "textfile0.txt"
    Then the number of versions should be "2"
    When user "Alice" downloads the version of file "/textfile0.txt" with the index "1"
    Then the HTTP status code should be "200"
    And the following headers should be set
      | header              | value                                                                |
      | Content-Disposition | attachment; filename*=UTF-8''textfile0.txt; filename="textfile0.txt" |
    And the downloaded content should be "uploaded content brian"
    When user "Alice" downloads the version of file "/textfile0.txt" with the index "2"
    Then the HTTP status code should be "200"
    And the following headers should be set
      | header              | value                                                                |
      | Content-Disposition | attachment; filename*=UTF-8''textfile0.txt; filename="textfile0.txt" |
    And the downloaded content should be "uploaded content alice"
    When user "Alice" gets the version metadata of file "/textfile0.txt"
    Then the author of the created version with index "1" should be "Brian"
    And the author of the created version with index "2" should be "Alice"

  @skip_on_objectstore @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: enable file versioning and check the history of changes from multiple users while moving file in/out of a subfolder
    Given the administrator has enabled the file version storage feature
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "/test"
    And group "grp1" has been created
    And user "Alice" has been added to group "grp1"
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has shared folder "/test" with group "grp1"
    And user "Alice" has uploaded file with content "uploaded content alice" to "/test/textfile0.txt"
    And user "Brian" has uploaded file with content "uploaded content brian" to "/test/textfile0.txt"
    And user "Carol" has uploaded file with content "uploaded content carol" to "/test/textfile0.txt"
    When user "Brian" moves file "/test/textfile0.txt" to "/textfile0.txt" using the WebDAV API
    And user "Brian" uploads file with content "uploaded content brian after moving file outside subfolder" to "/textfile0.txt" using the WebDAV API
    And user "Brian" moves file "/textfile0.txt" to "/test/textfile0.txt" using the WebDAV API
    Then as "Alice" file "/test/textfile0.txt" should exist
    When user "Alice" gets the number of versions of file "/test/textfile0.txt"
    Then the number of versions should be "3"
    When user "Alice" downloads the version of file "/test/textfile0.txt" with the index "1"
    Then the HTTP status code should be "200"
    And the following headers should be set
      | header              | value                                                                |
      | Content-Disposition | attachment; filename*=UTF-8''textfile0.txt; filename="textfile0.txt" |
    And the downloaded content should be "uploaded content carol"
    When user "Alice" downloads the version of file "/test/textfile0.txt" with the index "2"
    Then the HTTP status code should be "200"
    And the following headers should be set
      | header              | value                                                                |
      | Content-Disposition | attachment; filename*=UTF-8''textfile0.txt; filename="textfile0.txt" |
    And the downloaded content should be "uploaded content brian"
    When user "Alice" downloads the version of file "/test/textfile0.txt" with the index "3"
    Then the HTTP status code should be "200"
    And the following headers should be set
      | header              | value                                                                |
      | Content-Disposition | attachment; filename*=UTF-8''textfile0.txt; filename="textfile0.txt" |
    And the downloaded content should be "uploaded content alice"
    When user "Alice" gets the version metadata of file "/test/textfile0.txt"
    Then the author of the created version with index "1" should be "Carol"
    And the author of the created version with index "2" should be "Brian"
    And the author of the created version with index "3" should be "Alice"

  @skip_on_objectstore @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: enable file versioning and check the history of changes from multiple users after renaming file by sharer
    Given the administrator has enabled the file version storage feature
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    And user "Alice" has been added to group "grp1"
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has uploaded file with content "uploaded content alice" to "/exist.txt"
    And user "Alice" has shared file "/exist.txt" with group "grp1"
    And user "Brian" has uploaded file with content "uploaded content brian" to "/exist.txt"
    And user "Carol" has uploaded file with content "uploaded content carol" to "/exist.txt"
    When user "Alice" moves file "/exist.txt" to "/textfile0.txt" using the WebDAV API
    Then as "Alice" file "/textfile0.txt" should exist
    And as "Brian" file "/textfile0.txt" should not exist
    And as "Carol" file "/textfile0.txt" should not exist
    When user "Alice" gets the number of versions of file "textfile0.txt"
    Then the number of versions should be "2"
    When user "Alice" downloads the version of file "/textfile0.txt" with the index "1"
    Then the HTTP status code should be "200"
    And the following headers should be set
      | header              | value                                                                |
      | Content-Disposition | attachment; filename*=UTF-8''textfile0.txt; filename="textfile0.txt" |
    And the downloaded content should be "uploaded content brian"
    When user "Alice" downloads the version of file "/textfile0.txt" with the index "2"
    Then the HTTP status code should be "200"
    And the following headers should be set
      | header              | value                                                                |
      | Content-Disposition | attachment; filename*=UTF-8''textfile0.txt; filename="textfile0.txt" |
    And the downloaded content should be "uploaded content alice"
    When user "Alice" gets the version metadata of file "/textfile0.txt"
    Then the author of the created version with index "1" should be "Brian"
    And the author of the created version with index "2" should be "Alice"

  @skip_on_objectstore @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: enable file versioning and check the history of changes in sharer after renaming file by sharee
    Given the administrator has enabled the file version storage feature
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    And user "Alice" has been added to group "grp1"
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has uploaded file with content "uploaded content alice" to "/exist.txt"
    And user "Alice" has shared file "/exist.txt" with group "grp1"
    And user "Brian" has uploaded file with content "uploaded content brian" to "/exist.txt"
    And user "Carol" has uploaded file with content "uploaded content carol" to "/exist.txt"
    When user "Brian" moves file "/exist.txt" to "/textfile0.txt" using the WebDAV API
    Then as "Brian" file "/textfile0.txt" should exist
    And as "Alice" file "/textfile0.txt" should not exist
    And as "Carol" file "/textfile0.txt" should not exist
    When user "Alice" gets the number of versions of file "exist.txt"
    Then the number of versions should be "2"
    When user "Alice" downloads the version of file "/exist.txt" with the index "1"
    Then the HTTP status code should be "200"
    And the following headers should be set
      | header              | value                                                                |
      | Content-Disposition | attachment; filename*=UTF-8''exist.txt; filename="exist.txt" |
    And the downloaded content should be "uploaded content brian"
    When user "Alice" downloads the version of file "/exist.txt" with the index "2"
    Then the HTTP status code should be "200"
    And the following headers should be set
      | header              | value                                                                |
      | Content-Disposition | attachment; filename*=UTF-8''exist.txt; filename="exist.txt" |
    And the downloaded content should be "uploaded content alice"
    When user "Alice" gets the version metadata of file "/exist.txt"
    Then the author of the created version with index "1" should be "Brian"
    And the author of the created version with index "2" should be "Alice"

  @skip_on_objectstore @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: enable file versioning and check the history of changes from multiple users when reshared after unshared by sharer
    Given the administrator has enabled the file version storage feature
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Alice" creates folder "/test" using the WebDAV API
    And group "grp1" has been created
    And user "Alice" has been added to group "grp1"
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has shared folder "/test" with group "grp1"
    And user "Alice" has uploaded file with content "uploaded content alice" to "/test/textfile0.txt"
    And user "Brian" has uploaded file with content "uploaded content brian" to "/test/textfile0.txt"
    And user "Carol" has uploaded file with content "uploaded content carol" to "/test/textfile0.txt"
    When user "Alice" deletes the last share using the sharing API
    And user "Alice" uploads file with content "uploaded content alice after unshared folder" to "/test/textfile0.txt" using the WebDAV API
    And user "Alice" shares folder "/test" with group "grp1" using the sharing API
    And user "Alice" gets the number of versions of file "/test/textfile0.txt"
    Then the number of versions should be "3"
    When user "Alice" downloads the version of file "/test/textfile0.txt" with the index "1"
    Then the HTTP status code should be "200"
    And the following headers should be set
      | header              | value                                                                |
      | Content-Disposition | attachment; filename*=UTF-8''textfile0.txt; filename="textfile0.txt" |
    And the downloaded content should be "uploaded content carol"
    When user "Alice" downloads the version of file "/test/textfile0.txt" with the index "2"
    Then the HTTP status code should be "200"
    And the following headers should be set
      | header              | value                                                                |
      | Content-Disposition | attachment; filename*=UTF-8''textfile0.txt; filename="textfile0.txt" |
    And the downloaded content should be "uploaded content brian"
    When user "Alice" downloads the version of file "/test/textfile0.txt" with the index "3"
    Then the HTTP status code should be "200"
    And the following headers should be set
      | header              | value                                                                |
      | Content-Disposition | attachment; filename*=UTF-8''textfile0.txt; filename="textfile0.txt" |
    And the downloaded content should be "uploaded content alice"
    When user "Alice" gets the version metadata of file "/test/textfile0.txt"
    Then the author of the created version with index "1" should be "Carol"
    And the author of the created version with index "2" should be "Brian"
    And the author of the created version with index "3" should be "Alice"
