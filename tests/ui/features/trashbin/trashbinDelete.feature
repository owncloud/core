@insulated
Feature: files and folders can be deleted from the trashbin
  As a user
  I want to delete files and folders from the trashbin
  So that I can control my trashbin space and which files are kept in that space

  Background:
    Given a regular user exists
    And I am logged in as a regular user
    And the following files are deleted
      | name          |
      | lorem.txt     |
      | lorem-big.txt |
      | simple-folder |
    And I am on the trashbin page

  Scenario: Delete files and check that they are gone
    When I delete the file "lorem.txt"
    And I open the folder "simple-folder"
    And I delete the file "lorem-big.txt"
    Then the file "lorem.txt" should not be listed in the trashbin
    But the file "lorem.txt" should be listed in the trashbin folder "simple-folder"
    And the file "lorem-big.txt" should not be listed in the trashbin folder "simple-folder"
    But the file "lorem-big.txt" should be listed in the trashbin

  Scenario: Delete folders and check that they are gone
    When I delete the folder "simple-folder"
    Then the folder "simple-folder" should not be listed in the trashbin
