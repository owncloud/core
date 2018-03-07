@insulated @disablePreviews
Feature: Upload a file

As a user
I would like to upload a file
So that I can store it in owncloud

	Background:
		Given these users exist:
		|username|password|displayname|email       |
		|user1   |1234    |User One   |u1@oc.com.np|

	Scenario: simple upload of a file with the size greater than the size of quota
		Given the quota of user "user1" has been set to "10 MB"
		And I am on the login page
		And I login with username "user1" and password "1234"
		And I am on the files page
		And a file with the size of "30000000" bytes and the name "big-video.mp4" exists
		When I upload the file "big-video.mp4"
		Then the file "big-video.mp4" should not be listed
		And notifications should be displayed with the text matching
		|/^Not enough free space, you are uploading (\d+(.\d+)?) MB but only (\d+(.\d+)?) MB is left$/|

