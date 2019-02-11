@webUI @mailhog @admin_settings-feature-required
Feature: admin general settings
  As an admin
  I want to be able to manage general settings on the ownCloud server
  So that I can configure general settings on the ownCloud server

  Background:
    Given the administrator has changed their own email address to "admin@owncloud.com"
    And the administrator has browsed to the admin general settings page

  @smokeTest
  Scenario: administrator sets email server settings
    When the administrator sets the following email server settings using the webUI
      | setting                 | value          |
      | send mode               | smtp           |
      | encryption              | None           |
      | from address            | owncloud       |
      | mail domain             | foobar.com     |
      | authentication method   | None           |
      | authentication required | false          |
      | server address          | %MAILHOG_HOST% |
      | port                    | 1025           |
    And the administrator clicks on send test email in the admin general settings page using the webUI
    Then the email address "admin@owncloud.com" should have received an email with the body containing
      """
      If you received this email, the settings seem to be correct.
      """

  @smokeTest
  Scenario: administrator sets legal URLs
    When the administrator sets the value of imprint url to "imprinturl.html" using the webUI
    And the administrator logs out of the webUI
    Then the imprint url on the login page should link to "imprinturl.html"

  @smokeTest
  Scenario: administrator sets legal URLs
    When the administrator sets the value of privacy policy url to "privacy_policy.html" using the webUI
    And the administrator logs out of the webUI
    Then the privacy policy url on the login page should link to "privacy_policy.html"

  @smokeTest
  Scenario: administrator sets update channel
    Given the administrator has invoked occ command "config:app:set core OC_Channel --value git"
    When the user reloads the current page of the webUI
    And the administrator sets the value of update channel to "daily" using the webUI
    Then the update channel should be "daily"

  @smokeTest
  Scenario: administrator changes the cron job
    Given the administrator has invoked occ command "config:app:set core backgroundjobs_mode --value ajax"
    When the user reloads the current page of the webUI
    And the administrator sets the value of cron job to "webcron" using the webUI
    Then the background jobs mode should be "webcron"

  @smokeTest
  Scenario: administrator changes the log level
    Given the administrator has invoked occ command "config:system:set loglevel --value 0"
    When the user reloads the current page of the webUI
    And the administrator sets the value of log level to 1 using the webUI
    Then the log level should be "1"

  Scenario: administrator should be able to see system status
    Then the version of the owncloud installation should be displayed on the admin general settings page
    And the version string of the owncloud installation should be displayed on the admin general settings page