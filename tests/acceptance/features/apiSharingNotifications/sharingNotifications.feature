@api @app-required @notifications-app-required @TestAlsoOnExternalUserBackend
Feature: Display notifications when receiving a share
  As a user
  I want to see notifications about shares that have been offered to me
  So that I can easily decide what I want to do with new received shares

  Background:
    Given app "notifications" has been enabled
    And using OCS API version "1"
    And using new DAV path
    And these users have been created:
      | username |
      | user0    |
      | user1    |
      | user2    |
    And these groups have been created:
      | groupname |
      | grp1      |
    And user "user1" has been added to group "grp1"
    And user "user2" has been added to group "grp1"

  @smokeTest
  Scenario: share to user sends notification
    Given parameter "shareapi_auto_accept_share" of app "core" has been set to "no"
    When user "user0" shares folder "/PARENT" with user "user1" using the sharing API
    And user "user0" shares file "/textfile0.txt" with user "user1" using the sharing API
    Then user "user1" should have 2 notifications
    And the last notification of user "user1" should match these regular expressions
      | app         | /^files_sharing$/                            |
      | subject     | /^"User Zero" shared "PARENT" with you$/     |
      | message     | /^"User Zero" invited you to view "PARENT"$/ |
      | link        | /^%base_url%(\/index\.php)?\/f\/(\d+)$/      |
      | object_type | /^local_share$/                              |

  Scenario: share to group sends notification to every member
    Given parameter "shareapi_auto_accept_share" of app "core" has been set to "no"
    When user "user0" shares folder "/PARENT" with group "grp1" using the sharing API
    And user "user0" shares file "/textfile0.txt" with group "grp1" using the sharing API
    Then user "user1" should have 2 notifications
    And the last notification of user "user1" should match these regular expressions
      | app         | /^files_sharing$/                            |
      | subject     | /^"User Zero" shared "PARENT" with you$/     |
      | message     | /^"User Zero" invited you to view "PARENT"$/ |
      | link        | /^%base_url%(\/index\.php)?\/f\/(\d+)$/      |
      | object_type | /^local_share$/                              |
    And user "user2" should have 2 notifications
    And the last notification of user "user2" should match these regular expressions
      | app         | /^files_sharing$/                            |
      | subject     | /^"User Zero" shared "PARENT" with you$/     |
      | message     | /^"User Zero" invited you to view "PARENT"$/ |
      | link        | /^%base_url%(\/index\.php)?\/f\/(\d+)$/      |
      | object_type | /^local_share$/                              |

	# This scenario documents behavior discussed in core issue 31870
	# An old share keeps its old auto-accept behavior, even after auto-accept has been disabled.
  @skipOnLDAP
  Scenario: share to group does not send notifications to either existing or new members for an old share created before auto-accept is disabled
    Given user "user0" has shared folder "/PARENT" with group "grp1"
    When the administrator sets parameter "shareapi_auto_accept_share" of app "core" to "no"
    And the administrator creates user "user3" using the provisioning API
    And the administrator adds user "user3" to group "grp1" using the provisioning API
    Then user "user1" should have 0 notifications
    And user "user2" should have 0 notifications
    And user "user3" should have 0 notifications

	# This scenario documents behavior discussed in core issue 31870
	# As users are added to an existing group, they are not sent notifications about group shares.
  @skipOnLDAP
  Scenario: share to group sends notifications to existing members, but not to new members, for a share created after auto-accept is disabled
    Given parameter "shareapi_auto_accept_share" of app "core" has been set to "no"
    When user "user0" shares folder "/PARENT" with group "grp1" using the sharing API
    And the administrator creates user "user3" using the provisioning API
    And the administrator adds user "user3" to group "grp1" using the provisioning API
    Then user "user1" should have 1 notification
    And the last notification of user "user1" should match these regular expressions
      | app         | /^files_sharing$/                            |
      | subject     | /^"User Zero" shared "PARENT" with you$/     |
      | message     | /^"User Zero" invited you to view "PARENT"$/ |
      | link        | /^%base_url%(\/index\.php)?\/f\/(\d+)$/      |
      | object_type | /^local_share$/                              |
    And user "user2" should have 1 notification
    And the last notification of user "user2" should match these regular expressions
      | app         | /^files_sharing$/                            |
      | subject     | /^"User Zero" shared "PARENT" with you$/     |
      | message     | /^"User Zero" invited you to view "PARENT"$/ |
      | link        | /^%base_url%(\/index\.php)?\/f\/(\d+)$/      |
      | object_type | /^local_share$/                              |
    And user "user3" should have 0 notifications

	# This scenario documents behavior discussed in core issue 31870
	# Similar to the previous scenario, a new user added to the group does not get a notification,
	# even though the group, when originally created, had notifications on.
  @skipOnLDAP
  Scenario: share to group sends notifications to existing members, but not to new members, for an old share created before auto-accept is enabled
    Given parameter "shareapi_auto_accept_share" of app "core" has been set to "no"
    And user "user0" has shared folder "/PARENT" with group "grp1"
    When the administrator sets parameter "shareapi_auto_accept_share" of app "core" to "yes"
    And the administrator creates user "user3" using the provisioning API
    And the administrator adds user "user3" to group "grp1" using the provisioning API
    Then user "user1" should have 1 notification
    And the last notification of user "user1" should match these regular expressions
      | app         | /^files_sharing$/                            |
      | subject     | /^"User Zero" shared "PARENT" with you$/     |
      | message     | /^"User Zero" invited you to view "PARENT"$/ |
      | link        | /^%base_url%(\/index\.php)?\/f\/(\d+)$/      |
      | object_type | /^local_share$/                              |
    And user "user2" should have 1 notification
    And the last notification of user "user2" should match these regular expressions
      | app         | /^files_sharing$/                            |
      | subject     | /^"User Zero" shared "PARENT" with you$/     |
      | message     | /^"User Zero" invited you to view "PARENT"$/ |
      | link        | /^%base_url%(\/index\.php)?\/f\/(\d+)$/      |
      | object_type | /^local_share$/                              |
    And user "user3" should have 0 notifications

  @skipOnLDAP
  Scenario: share to group does not send notifications to existing and new members for a share created after auto-accept is enabled
    Given parameter "shareapi_auto_accept_share" of app "core" has been set to "yes"
    When user "user0" shares folder "/PARENT" with group "grp1" using the sharing API
    And the administrator creates user "user3" using the provisioning API
    And the administrator adds user "user3" to group "grp1" using the provisioning API
    Then user "user1" should have 0 notifications
    And user "user2" should have 0 notifications
    And user "user3" should have 0 notifications

  Scenario: when auto-accepting is enabled no notifications are sent
    Given parameter "shareapi_auto_accept_share" of app "core" has been set to "yes"
    When user "user0" shares folder "/PARENT" with user "user1" using the sharing API
    And user "user0" shares file "/textfile0.txt" with user "user1" using the sharing API
    Then user "user1" should have 0 notifications

  @skipOnLDAP
  Scenario: discard notification if target user is not member of the group anymore
    Given parameter "shareapi_auto_accept_share" of app "core" has been set to "no"
    When user "user0" shares folder "/PARENT" with group "grp1" using the sharing API
    And the administrator removes user "user1" from group "grp1" using the provisioning API
    Then user "user1" should have 0 notifications
    Then user "user2" should have 1 notification

  @skipOnLDAP
  Scenario: discard notification if group is deleted
    Given parameter "shareapi_auto_accept_share" of app "core" has been set to "no"
    When user "user0" shares folder "/PARENT" with group "grp1" using the sharing API
    And the administrator deletes group "grp1" using the provisioning API
    Then user "user1" should have 0 notifications
    Then user "user2" should have 0 notifications
