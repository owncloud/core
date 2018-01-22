# FIXME: split to multiple feature files!	
Background:
	Given default share settings are set

Feature: As a regular user shares with another local user (DB/technical)
	Scenario: a regular user shares with another existing user (overview feature?)
		Given a folder "test" exists
		When the user shares the item "test" with another user "recipient"
		Then the item "test" is shared with user "recipient"
		# Move the below to separate features ? Or add link to actual activity feature ?
		And an activity for the share from "test" to "recipient" is generated for the original user
		And an activity for the share from "test" to "recipient" is generated for the receiviing user

Feature: A share recipient receives a notification after share creation
	Background:
		Given the share auto-accept setting is enabled

	Scenario:
		Given a folder "test" exists
		When the user shares the item "test" with another user "recipient"
		Then the user "recipient" sees a notification about the share from item "test" of user "user" with user "recipient"

Feature: A share recipient can accept a share over notifications
	Background:
		Given the share auto-accept setting is disabled

	Scenario:
		Given a share notification was sent to user "recipient"
		When the user chooses to accept the notification/share
		Then the share is visible in the incoming share list

Feature: A share recipient can reject a share over notifications
	Background:
		Given the share auto-accept setting is disabled

	Scenario:
		Given a share notification was sent to user "recipient"
		When the user chooses to reject the notification/share
		Then the share is not visible in the incoming share list

# TODO: accept/reject a share over the share overview list of pending shares

Feature: A share notification is dismissed by any action on the notification
	Scenario: a regular user can dismiss a share notification with any action
		Given a share notification is visible for user "recipient"
		When the user chooses the action <action>
		Then the share notification is discarded

	Examples: Share notification actions
		| action	|
		| dismiss	|
		| accept	|
		| reject	|

Feature: As a regular user I can see outgoing shares
	As a regular user
	I want to share with another local user
	So that we can work together on the same data

	Background:
		Given a user is logged in

	Scenario: a regular user shares with another existing user
		Given a folder "test" exists
		And there is an outgoing share XYZ
		When the user views the outgoing shares list
		Then the user sees the share XYZ in the outgoing shares list

Feature: As a regular user I can list received shares
	Background:
		Given a user is logged in

	Scenario: as a share recipient .....
		Given a folder "test" is shared with the current user
		When the user opens the incoming shares list
		Then the user sees the item "test" as received share

	Scenario: as a share recipient ..... (file list)
		Given a folder "test" is shared with the current user
		When the user opens the file list
		Then the user sees the item "test"
		And the item has an icon "shared"

Feature: As a regular user shares with another local user (read-only)
	As a regular user
	I want to share with another local user
	So that the other user can follow up with what we are doing

	Scenario: share with existing user with read-only user
		# TODO

