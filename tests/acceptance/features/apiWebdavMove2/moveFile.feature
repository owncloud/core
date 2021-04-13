@api @issue-ocis-reva-14
Feature: move (rename) file
  As a user
  I want to be able to move and rename files
  So that I can manage my file system

  Background:
    Given using OCS API version "1"
    And user "Alice" has been created with default attributes and without skeleton files

  Scenario Outline: Moving a hidden file
    Given using <dav_version> DAV path
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded the following files with content "hidden file"
      | path                    |
      | .hidden_file101         |
      | /FOLDER/.hidden_file102 |
    When user "Alice" moves the following files using the WebDAV API
      | from                    | to                      |
      | .hidden_file101         | /FOLDER/.hidden_file101 |
      | /FOLDER/.hidden_file102 | .hidden_file102         |
    Then the HTTP status code of responses on all endpoints should be "201"
    And as "Alice" the following files should exist
      | path                    |
      | .gitignore              |
      | .hidden_file102         |
      | /FOLDER/.hidden_file101 |
    Examples:
      | dav_version |
      | old         |
      | new         |
