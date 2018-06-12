@api
Feature: add groups
As an admin
I want to be able to add groups
So that I can more easily manage access to resources by groups rather than individual users

	Background:
		Given using API version "1"

	Scenario Outline: admin creates a group
		Given the administrator sends a group creation request for group "<group_id>" using the API
		Then the OCS status code should be "100"
		And the HTTP status code should be "200"
		And group "<group_id>" should exist
		Examples:
			| group_id            | comment                                 |
			| new-group           | dash                                    |
			| the.group           | dot                                     |
			| España              | special European characters             |
			| नेपाली                                   | Unicode group name                       |
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

	Scenario: admin tries to create a group that already exists
		Given group "new-group" has been created
		When the administrator sends a group creation request for group "new-group" using the API
		Then the OCS status code should be "102"
		And the HTTP status code should be "200"
		And group "new-group" should exist

	Scenario: normal user tries to create a group
		Given user "brand-new-user" has been created
		When user "brand-new-user" sends HTTP method "POST" to API endpoint "/cloud/groups" with body
			| groupid   | new-group   |
		Then the OCS status code should be "997"
		And the HTTP status code should be "401"
		And group "new-group" should not exist

	Scenario: subadmin tries to create a group
		Given user "subadmin" has been created
		And group "new-group" has been created
		And user "subadmin" has been made a subadmin of group "new-group"
		And user "subadmin" sends HTTP method "POST" to API endpoint "/cloud/groups" with body
			| groupid   | another-group   |
		Then the OCS status code should be "997"
		And the HTTP status code should be "401"
		And group "another-group" should not exist