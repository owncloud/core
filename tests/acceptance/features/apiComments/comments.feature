@api @TestAlsoOnExternalUserBackend @comments-app-required
Feature: Comments

  Background:
    Given using new DAV path

  @smokeTest
  Scenario: Getting info of comments using files endpoint
    Given user "user0" has been created
    And user "user0" has uploaded file "data/textfile.txt" to "/myFileToComment.txt"
    And user "user0" has commented with content "My first comment" on file "/myFileToComment.txt"
    And user "user0" should have the following comments on file "/myFileToComment.txt"
      | user0 | My first comment |
    When user "user0" gets the following properties of folder "/myFileToComment.txt" using the WebDAV API
      | {http://owncloud.org/ns}comments-href   |
      | {http://owncloud.org/ns}comments-count  |
      | {http://owncloud.org/ns}comments-unread |
    Then the single response should contain a property "{http://owncloud.org/ns}comments-count" with value "1"
    And the single response should contain a property "{http://owncloud.org/ns}comments-unread" with value "0"
    And the single response should contain a property "{http://owncloud.org/ns}comments-href" with value "a_comment_url"