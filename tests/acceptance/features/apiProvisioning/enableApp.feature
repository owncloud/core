#@api
#Feature: enable app
#As an admin
#I want to be able to enable an app
#So that users can use the features of an app
#
#	Background:
#		Given using API version "1"
#
#	Scenario: enable an app
#		Given app "comments" is disabled
#		When user "admin" sends HTTP method "POST" to API endpoint "/cloud/apps/comments"
#		Then the OCS status code should be "100"
#		And the HTTP status code should be "200"
#		And app "comments" is enabled