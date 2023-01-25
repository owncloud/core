@api
Feature: current oC10 behavior for issue-33840

  Background:
    Given using OCS API version "1"
    And user "Alice" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file with content "some data" to "/textfile0.txt"
    And user "Alice" has uploaded file with content "some data" to "/textfile1.txt"
    And user "Alice" has uploaded file with content "some data" to "/textfile2.txt"
    And user "Alice" has uploaded file with content "some data" to "/textfile3.txt"
    And user "Alice" has uploaded file with content "some data" to "/textfile4.txt"
    And user "Alice" has created folder "/FOLDER"
    And user "Alice" has created folder "/PARENT"
    And user "Alice" has uploaded file with content "some data" to "/PARENT/parent.txt"

  @issue-33840 @issue-ocis-reva-39
  Scenario Outline: Get favorited elements and limit count of entries
    Given using <dav_version> DAV path
    And user "Alice" has favorited element "/textfile0.txt"
    And user "Alice" has favorited element "/textfile1.txt"
    And user "Alice" has favorited element "/textfile2.txt"
    And user "Alice" has favorited element "/textfile3.txt"
    And user "Alice" has favorited element "/textfile4.txt"
    When user "Alice" lists the favorites and limits the result to 3 elements using the WebDAV API
    #Then the search result should contain any "3" of these entries:
    Then the HTTP status code should be "207"
    And the search result should contain any "0" of these entries:
      | /textfile0.txt |
      | /textfile1.txt |
      | /textfile2.txt |
      | /textfile3.txt |
      | /textfile4.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

  @issue-33840 @issue-ocis-reva-39
  Scenario Outline: Get favorited elements paginated in subfolder
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/subfolder"
    And user "Alice" has copied file "/textfile0.txt" to "/subfolder/textfile0.txt"
    And user "Alice" has copied file "/textfile0.txt" to "/subfolder/textfile1.txt"
    And user "Alice" has copied file "/textfile0.txt" to "/subfolder/textfile2.txt"
    And user "Alice" has copied file "/textfile0.txt" to "/subfolder/textfile3.txt"
    And user "Alice" has copied file "/textfile0.txt" to "/subfolder/textfile4.txt"
    And user "Alice" has copied file "/textfile0.txt" to "/subfolder/textfile5.txt"
    And user "Alice" has favorited element "/subfolder/textfile0.txt"
    And user "Alice" has favorited element "/subfolder/textfile1.txt"
    And user "Alice" has favorited element "/subfolder/textfile2.txt"
    And user "Alice" has favorited element "/subfolder/textfile3.txt"
    And user "Alice" has favorited element "/subfolder/textfile4.txt"
    And user "Alice" has favorited element "/subfolder/textfile5.txt"
    When user "Alice" lists the favorites and limits the result to 3 elements using the WebDAV API
    #Then the search result should contain any "3" of these entries:
    Then the HTTP status code should be "207"
    And the search result should contain any "0" of these entries:
      | /subfolder/textfile0.txt |
      | /subfolder/textfile1.txt |
      | /subfolder/textfile2.txt |
      | /subfolder/textfile3.txt |
      | /subfolder/textfile4.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |
