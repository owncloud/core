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
			| group_id            | comment                                 |
			| new-group           | dash                                    |
			| the.group           | dot                                     |
			| España              | special European characters             |
			| नेपाली              | Unicode group name                      |
			| 0                   | The "false" group                       |
			| Finance (NP)        | Space and brackets                      |
			| Admin&Finance       | Ampersand                               |
			| admin:Pokhara@Nepal | Colon and @                             |
			| maintenance#123     | Hash sign                               |
			| maint+eng           | Plus sign                               |
			| $x<=>[y*z^2]!       | Maths symbols                           |
			| Mgmt\Middle         | Backslash                               |
			| 50%pass             | Percent sign (special escaping happens) |
			| 50%25=0             | %25 literal looks like an escaped "%"   |
			| 50%2Eagle           | %2E literal looks like an escaped "."   |
			| 50%2Fix             | %2F literal looks like an escaped slash |
			| staff?group         | Question mark                           |

	Scenario: normal user tries to add himself to a group
		Given user "brand-new-user" has been created
		When user "brand-new-user" sends HTTP method "POST" to API endpoint "/cloud/users/brand-new-user/groups" with body
			| groupid | new-group |
		Then the OCS status code should be "997"
		And the HTTP status code should be "401"
		And the API should not return any data

	Scenario: admin tries to add user to a group which does not exist
		Given user "brand-new-user" has been created
		And group "not-group" has been deleted
		When user "admin" sends HTTP method "POST" to API endpoint "/cloud/users/brand-new-user/groups" with body
			| groupid | not-group |
		Then the OCS status code should be "102"
		And the HTTP status code should be "200"
		And the API should not return any data

	Scenario: admin tries to add user to a group without sending the group
		Given user "brand-new-user" has been created
		When user "admin" sends HTTP method "POST" to API endpoint "/cloud/users/brand-new-user/groups" with body
			| groupid |  |
		Then the OCS status code should be "101"
		And the HTTP status code should be "200"
		And the API should not return any data

	Scenario: admin tries to add a user which does not exist to a group
		Given user "not-user" has been deleted
		And group "new-group" has been created
		When user "admin" sends HTTP method "POST" to API endpoint "/cloud/users/not-user/groups" with body
			| groupid | new-group |
		Then the OCS status code should be "103"
		And the HTTP status code should be "200"
		And the API should not return any data

	Scenario: a subadmin can not add users to groups the subadmin is responsible for
		Given user "subadmin" has been created
		And user "brand-new-user" has been created
		And group "new-group" has been created
		And user "subadmin" has been made a subadmin of group "new-group"
		When user "subadmin" sends HTTP method "POST" to API endpoint "/cloud/users/brand-new-user/groups" with body
			| groupid | new-group |
		Then the OCS status code should be "104"
		And the HTTP status code should be "200"
		And user "brand-new-user" should not belong to group "new-group"

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
