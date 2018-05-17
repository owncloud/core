@api
Feature: delete groups
As an admin
I want to be able to delete groups
So that I can remove unnecessary groups

	Background:
		Given using API version "2"

	Scenario Outline: admin deletes a group
		Given group "<group_id>" has been created
		When the administrator deletes group "<group_id>" using the API
		Then the OCS status code should be "200"
		And the HTTP status code should be "200"
		And group "<group_id>" should not exist
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
			| Mgmt/Sydney         | Slash (special escaping happens)        |
			| Mgmt//NSW/Sydney    | Multiple slash                          |
			| priv/subadmins/1    | Subadmins mentioned not at the end      |
			| 50%pass             | Percent sign (special escaping happens) |
			| 50%25=0             | %25 literal looks like an escaped "%"   |
			| 50%2Eagle           | %2E literal looks like an escaped "."   |
			| 50%2Fix             | %2F literal looks like an escaped slash |
			| staff?group         | Question mark                           |

	@skip @issue-31276
	Scenario: normal user tries to delete the group
		Given user "brand-new-user" has been created
		And group "new-group" has been created
		And user "brand-new-user" has been added to group "new-group"
		When user "brand-new-user" sends HTTP method "DELETE" to API endpoint "/cloud/groups/new-group"
		Then the OCS status code should be "401"
		And the HTTP status code should be "401"
		And group "new-group" should exist

	@skip @issue-31276
	Scenario: subadmin of the group tries to delete the group
		Given user "subadmin" has been created
		And group "new-group" has been created
		And user "subadmin" has been made a subadmin of group "new-group"
		When user "subamin" sends HTTP method "DELETE" to API endpoint "/cloud/groups/new-group"
		Then the OCS status code should be "401"
		And the HTTP status code should be "401"
		And group "new-group" should exist