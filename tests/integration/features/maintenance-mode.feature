Feature: maintenance-mode
	Background:
		Given using api version "1"
		And maintenance mode is enabled

	@maintenance_mode
	Scenario: Maintenance mode new dav path
		Given using new dav path
		When Connecting to dav endpoint as user "admin"
 		Then the HTTP status code should be "503"

 	@maintenance_mode
	Scenario: Maintenance mode old dav path
		Given using old dav path
		When Connecting to dav endpoint as user "admin"
 		Then the HTTP status code should be "503"
