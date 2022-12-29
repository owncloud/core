@cli @skipOnOcV10.10.0
Feature: Migration status of apps
  As an admin I want to be able to see the migration status of an app
  So that I can know the current and previous version


  Scenario: Check migration status of an app
    When the administrator lists migration status of app "core"
    Then the command should have been successful
    And the following migration status should have been listed
      | App                             | core          |
      | Version Table Name              | oc_migrations |
      | Migrations Namespace            | OC\Migrations |
      | Migrations Directory            | /\S/          |
      | Previous Version                | /\d+/         |
      | Current Version                 | /\d+/         |
      | Next Version                    | /\S+/         |
      | Latest Version                  | /\d+/         |
      | Executed Migrations             | /\d+/         |
      | Executed Unavailable Migrations | 0             |
      | Available Migrations            | /\d+/         |
      | New Migrations                  | 0             |
    And the Executed Migrations should equal the Available Migrations
