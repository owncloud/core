@api @files_sharing-app-required @issue-ocis-reva-11 @issue-ocis-reva-243
Feature: sharing

  Background:
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
      | Carol    |
