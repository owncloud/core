@api @files_sharing-app-required @notToImplementOnOCIS
Feature: resharing can be done on a reshared resource

  Background:
    Given user "Alice" has been created with default attributes and small skeleton files
    And user "Brian" has been created with default attributes and without skeleton files

  Scenario: Reshared files can be still accessed if a user in the middle removes it.
    Given user "Carol" has been created with default attributes and without skeleton files
    And user "David" has been created with default attributes and without skeleton files
    And user "Alice" has shared file "textfile0.txt" with user "Brian"
    And user "Brian" has moved file "/textfile0.txt" to "/textfile0_shared.txt"
    And user "Brian" has shared file "textfile0_shared.txt" with user "Carol"
    And user "Carol" has shared file "textfile0_shared.txt" with user "David"
    When user "Brian" deletes file "/textfile0_shared.txt" using the WebDAV API
    Then the content of file "/textfile0_shared.txt" for user "Carol" should be "ownCloud test text file 0" plus end-of-line
    And the content of file "/textfile0_shared.txt" for user "David" should be "ownCloud test text file 0" plus end-of-line
