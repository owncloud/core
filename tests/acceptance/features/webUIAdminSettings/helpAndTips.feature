@webUI @insulated @disablePreviews @admin_settings-feature-required
Feature: Help and tips page
  As an admin
  I want to be able to view a page with links to various help information
  So that I can manage the software better

  Background:
    Given the administrator has browsed to the help and tips page

  Scenario Outline: Admin can view links in help and tips page
    Then the link for "<linkName>" should be shown on the webUI
    And the link for "<linkName>" should be valid
    Examples:
      | linkName                        |
      | How to do backups               |
      | Performance tuning              |
      | Improving the config.php        |
      | Theming                         |
      | Hardening and security guidance |
