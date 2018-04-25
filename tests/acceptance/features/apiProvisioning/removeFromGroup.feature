@api
Feature: remove a user from a group
As an admin
I want to be able to remove a user from a group
So that I can manage user access to group resources

	Background:
		Given using API version "1"

	Scenario Outline: removing a user from a group
		Given user "brand-new-user" has been created
		And group "<group_id>" has been created
		And user "brand-new-user" has been added to group "<group_id>"
		When user "admin" sends HTTP method "DELETE" to API endpoint "/cloud/users/brand-new-user/groups" with body
			| groupid | <group_id> |
		Then the OCS status code should be "100"
		And user "brand-new-user" should not belong to group "<group_id>"
		Examples:
			| group_id  |
			| new-group |
			| 0         |

		Scenario: removing a user from a group which doesn't exist
		Given user "brand-new-user" has been created
		And group "not-group" has been deleted
		When user "admin" sends HTTP method "DELETE" to API endpoint "/cloud/users/brand-new-user/groups" with body
			| groupid | not-group |
		Then the OCS status code should be "102"

	Scenario: a subadmin can remove users from groups the subadmin is responsible for
		Given user "subadmin" has been created
		And user "brand-new-user" has been created
		And group "new-group" has been created
		And user "brand-new-user" has been added to group "new-group"
		And user "subadmin" has been made a subadmin of group "new-group"
		When user "subadmin" sends HTTP method "DELETE" to API endpoint "/cloud/users/brand-new-user/groups" with body
			| groupid | new-group |
		Then the OCS status code should be "100"
		And the HTTP status code should be "200"
		And user "brand-new-user" should not belong to group "new-group"

	Scenario: a subadmin cannot remove users from groups the subadmin is not responsible for
		Given user "other-subadmin" has been created
		And user "brand-new-user" has been created
		And group "new-group" has been created
		And group "other-group" has been created
		And user "brand-new-user" has been added to group "new-group"
		And user "other-subadmin" has been made a subadmin of group "other-group"
		When user "other-subadmin" sends HTTP method "DELETE" to API endpoint "/cloud/users/brand-new-user/groups" with body
			| groupid | new-group |
		Then the OCS status code should be "104"
		And the HTTP status code should be "200"
		And user "brand-new-user" should belong to group "new-group"