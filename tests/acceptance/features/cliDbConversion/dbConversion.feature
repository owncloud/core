@cli @dbConversion @skipOnEncryption
Feature: Change from one database to another
  As an admin
  I want to be able to convert database from one type to another
  So that I can change from one database type to another


  Scenario Outline: convert different database types
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/textfile0.txt"
    And user "Alice" has shared file "/textfile0.txt" with user "Brian"
    And user "Brian" has accepted share "/textfile0.txt" offered by user "Alice"
    When the administrator changes the database type to "<dbtype>"
    Then the command should have been successful
    And the system config should have dbtype set as "<dbtype>"
    And user "Alice" should exist
    And user "Brian" should exist
    And as "Alice" file "/textfile0.txt" should exist
    And as "Brian" file "/textfile0.txt" should exist
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/textfile1.txt"
    And user "Alice" has shared file "/textfile1.txt" with user "Brian"
    And user "Brian" has accepted share "/textfile1.txt" offered by user "Alice"
    And as "Alice" file "/textfile1.txt" should exist
    And as "Brian" file "/textfile1.txt" should exist
    Examples:
      | dbtype   |
      | mysql    |
