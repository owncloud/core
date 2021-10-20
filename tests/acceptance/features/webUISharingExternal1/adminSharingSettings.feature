@webUI @insulated @federation-app-required @disablePreviews @files_sharing-app-required
Feature: Manage Trusted servers from the webUI
  As an administrator
  I want to add, view, delete and edit trusted servers from the webUI
  So that I can easily manage trusted servers

  Background:
    Given the administrator has browsed to the admin sharing settings page

  Scenario: Add a new trusted server from the webUI
    When the administrator adds "%remote_server%" as a trusted server using the webUI
    Then url "%remote_server%" should be a trusted server

  Scenario: delete trusted server from the webUI
    Given the administrator has added url "%remote_server%" as trusted server
    And the administrator has reloaded the current page of the webUI
    When the administrator deletes url "%remote_server%" from the trusted server list using the webUI
    Then url "%remote_server%" should not be a trusted server

  Scenario: Add invalid url as trusted server from the webUI
    When the administrator adds "invalid_url" as a trusted server using the webUI
    Then url "invalid_url" should not be a trusted server
    And a trusted server error message should be displayed on the webUI with the text "Could not resolve host"

  Scenario: Add  url as trusted server which is not oc server from the webUI
    When the administrator adds "http://google.com" as a trusted server using the webUI
    Then url "http://google.com" should not be a trusted server
    And a trusted server error message should be displayed on the webUI with the text "Client error"
