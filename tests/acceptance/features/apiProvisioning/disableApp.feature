#@api
#Feature: disable app
#As an admin
#I want to be able to disable an app
#So that I can remove app features
#
#	Background:
#		Given using API version "1"
#
#	Scenario: disable an app
#		Given app "comments" is enabled
#		When user "admin" sends HTTP method "DELETE" to API endpoint "/cloud/apps/comments"
#		Then the OCS status code should be "100"
#		And the HTTP status code should be "200"
#		And app "comments" is disabled