# When the issue is resolved, delete this file
# and adjust the tests scenarios in savePublicLinkShare.feature
# tagged with this issue

@webUI @insulated @disablePreviews @files_sharing-app-required
Feature: Save public shares created by oC users
  As a user
  I want to mount public link shares to my owncloud account
  So that I can easily access them from my account

  Background:
    Given using server "LOCAL"
    And user "Alice" has been created with default attributes and without skeleton files

  @issue-38763
  Scenario: mount public link share of a folder and the sharer deletes the folder
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "/PARENT"
    And user "Alice" has uploaded file with content "original content" to "/PARENT/lorem.txt"
    And user "Alice" has created a public link share with settings
      | path        | /PARENT |
      | permissions | read    |
    And the public has accessed the last created public link using the webUI
    When the public adds the public link to "%local_server%" as user "Brian" using the webUI
    And the user accepts the offered federated shares using the webUI
    Then folder "PARENT" should be listed on the webUI
    When the user opens folder "PARENT" using the webUI
    Then file "lorem.txt" should be listed on the webUI
    When user "Alice" deletes folder "/PARENT" using the WebDAV API
    And the user browses to the files page
    Then folder "PARENT" should be listed on the webUI
    When the user opens folder "PARENT" using the webUI
    Then file "lorem.txt" should not be listed on the webUI
    When the user browses to the files page
    Then folder "PARENT" should not be listed on the webUI

  @issue-38763
  Scenario: mount public link share of a folder in remote server and the sharer deletes the folder
    Given using server "REMOTE"
    And user "Brian" has been created with default attributes and without skeleton files
    And using server "LOCAL"
    And user "Alice" has created folder "/PARENT"
    And user "Alice" has uploaded file with content "original content" to "/PARENT/lorem.txt"
    And user "Alice" has created a public link share with settings
      | path        | /PARENT |
      | permissions | read    |
    And the public has accessed the last created public link using the webUI
    When the public adds the public link to "%remote_server%" as user "Brian" using the webUI
    And the user accepts the offered federated shares using the webUI
    Then folder "PARENT" should be listed on the webUI
    When the user opens folder "PARENT" using the webUI
    Then file "lorem.txt" should be listed on the webUI
    When user "Alice" deletes folder "/PARENT" using the WebDAV API
    And the user selects the breadcrumb for folder "/"
    And the user reloads the current page of the webUI
    Then folder "PARENT" should be listed on the webUI
    When the user opens folder "PARENT" using the webUI
    Then file "lorem.txt" should not be listed on the webUI
    When the user selects the breadcrumb for folder "/"
    Then folder "PARENT" should not be listed on the webUI
