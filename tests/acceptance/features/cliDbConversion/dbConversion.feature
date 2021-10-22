@cli @dbConversion
Feature: Change from one database to another
  As an admin
  I want to be able to convert database from one type to another
  So that I can change from one database type to another


   Scenario Outline: convert different database types
     When the administrator changes the database type to "<dbtype>"
     Then the command should have been successful
     And the system config should have dbtype set as "<dbtype>"
     Examples:
       | dbtype   |
       | mysql    |
