@api
Feature: add users to group
As a admin
I want to be able to add users to a group
So that I can give a user access to the resources of the group

	Background:
		Given using API version "1"
		
	Scenario Outline: adding a user to a group
		Given user "brand-new-user" has been created
		And group "<group_id>" has been created
		When user "admin" sends HTTP method "POST" to API endpoint "/cloud/users/brand-new-user/groups" with body
			| groupid | <group_id> |
		Then the OCS status code should be "100"
		And the HTTP status code should be "200"
		Examples:
			| group_id  |
			| new-group |
			| 0         |

	Scenario: adding user to a group without privileges
		Given user "brand-new-user" has been created
		When user "brand-new-user" sends HTTP method "POST" to API endpoint "/cloud/users/brand-new-user/groups" with body
			| groupid | new-group |
		Then the OCS status code should be "997"
		And the HTTP status code should be "401"

	Scenario: adding user to a group which doesn't exist
		Given user "brand-new-user" has been created
		And group "not-group" has been deleted
		When user "admin" sends HTTP method "POST" to API endpoint "/cloud/users/brand-new-user/groups" with body
			| groupid | not-group |
		Then the OCS status code should be "102"
		And the HTTP status code should be "200"

	Scenario: adding user to a group without sending the group
		Given user "brand-new-user" has been created
		When user "admin" sends HTTP method "POST" to API endpoint "/cloud/users/brand-new-user/groups" with body
			| groupid |  |
		Then the OCS status code should be "101"
		And the HTTP status code should be "200"

	Scenario: adding a user which doesn't exist to a group
		Given user "not-user" has been deleted
		And group "new-group" has been created
		When user "admin" sends HTTP method "POST" to API endpoint "/cloud/users/not-user/groups" with body
			| groupid | new-group |
		Then the OCS status code should be "103"
		And the HTTP status code should be "200"

	Scenario: a subadmin can add users to groups the subadmin is responsible for
		Given user "subadmin" has been created
		And user "brand-new-user" has been created
		And group "new-group" has been created
		And user "subadmin" has been made a subadmin of group "new-group"
		When user "subadmin" sends HTTP method "POST" to API endpoint "/cloud/users/brand-new-user/groups" with body
			| groupid | new-group |
		Then the OCS status code should be "100"
		And the HTTP status code should be "200"
		And user "brand-new-user" should belong to group "new-group"

	Scenario: a subadmin cannot add users to groups the subadmin is not responsible for
		Given user "other-subadmin" has been created
		And user "brand-new-user" has been created
		And group "new-group" has been created
		And group "other-group" has been created
		And user "other-subadmin" has been made a subadmin of group "other-group"
		When user "other-subadmin" sends HTTP method "POST" to API endpoint "/cloud/users/brand-new-user/groups" with body
			| groupid | new-group |
		Then the OCS status code should be "104"
		And the HTTP status code should be "200"
		And user "brand-new-user" should not belong to group "new-group"
