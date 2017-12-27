@insulated
Feature: Upload a file

As a user
I would like to upload a file
So that I can store it in owncloud

	Background:
		Given these users exist:
		|username|password|displayname|email       |
		|user1   |1234    |User One   |u1@oc.com.np|
		And I am logged in as admin
		And I am on the users page

	Scenario: simple upload of a file with the size greater than the size of quota
		When quota of user "user1" is set to "10 MB"
		And I relogin with username "user1" and password "1234"
		And I am on the files page
		And a file with the size of "30000000" bytes and the name "big-video.mp4" exists
		When I upload the file "big-video.mp4"
		Then the file "big-video.mp4" should not be listed
		And notifications should be displayed with the text matching
		|/^Not enough free space, you are uploading (\d+(.\d+)?) MB but only (\d+(.\d+)?) MB is left$/|

