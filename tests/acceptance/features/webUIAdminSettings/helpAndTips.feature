@webUI @admin_settings-feature-required @insulated
Feature: Help and tips page
  As an admin
  I want to be able to view a page with links to various help information
  So that I can manage the software better

  Background:
    Given the administrator has browsed to the help and tips page

  Scenario Outline: Admin can view links in help and tips page
    Then the link for "<linkName>" should be shown in the webUI
    And the link for "<linkName>" should be valid
    Examples:
      | linkName                          |
      | How to do backups                 |
      | Performance tuning                |
      | Improving the config.php          |
      | Theming                           |
      | Hardening and security guidance   |

  @skipOnOcV11 @issue-33634
  Scenario Outline: Admin can open links in help and tips page
    When the administrator opens the link for "<linkName>"
    Then the user should be redirected to a webUI page with the title "<pageTitle>"
    Examples:
      | linkName                          | pageTitle                       |
      | How to do backups                 | Backing up ownCloud             |
      | Performance tuning                | ownCloud Server Tuning          |
      | Improving the config.php          | Core Config.php Parameters      |
      | Theming                           | Theming ownCloud                |
      | Hardening and security guidance   | Hardening and Security Guidance |
