@webUI @insulated @disablePreviews @files_sharing-app-required
Feature: accept/decline shares coming from internal users
  As a user
  I want to have control of which received shares I accept
  So that I can keep my file system clean

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files
    Given user "Brian" has been created with default attributes and skeleton files
    And these groups have been created:
      | groupname |
      | grp1      |
    And user "Alice" has been added to group "grp1"
    And user "Brian" has been added to group "grp1"

  @smokeTest
  Scenario: Auto-accept disabled results in "Pending" shares
    Given the setting "Automatically accept new incoming local user shares" in the section "Sharing" has been disabled
    And user "Brian" has shared folder "/simple-folder" with group "grp1"
    And user "Brian" has shared file "/testimage.jpg" with user "Alice"
    When user "Alice" logs in using the webUI
    Then folder "simple-folder" should not be listed on the webUI
    And file "testimage.jpg" should not be listed on the webUI
    But folder "simple-folder" should be listed in the shared-with-you page on the webUI
    And file "testimage.jpg" should be listed in the shared-with-you page on the webUI
    And folder "simple-folder" should be in state "Pending" in the shared-with-you page on the webUI
    And file "testimage.jpg" should be in state "Pending" in the shared-with-you page on the webUI

  Scenario: receive shares with same name from different users, accept one by one
    Given the setting "Automatically accept new incoming local user shares" in the section "Sharing" has been disabled
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has created folder "/simple-folder/from_brian"
    And user "Brian" has shared folder "/simple-folder" with user "Carol"
    And user "Alice" has created folder "/simple-folder"
    And user "Alice" has created folder "/simple-folder/from_alice"
    And user "Alice" has shared folder "/simple-folder" with user "Carol"
    And user "Carol" has logged in using the webUI
    When the user accepts share "simple-folder" offered by user "Alice" using the webUI
    And the user accepts share "simple-folder" offered by user "Brian" using the webUI
    Then folder "simple-folder" shared by "Alice" should be in state "" in the shared-with-you page on the webUI
    And folder "simple-folder (2)" shared by "Brian" should be in state "" in the shared-with-you page on the webUI
    And user "Carol" should see the following elements
      | /simple-folder/from_alice/       |
      | /simple-folder%20(2)/from_brian/ |

  Scenario: receive shares with same name from different users
    Given the setting "Automatically accept new incoming local user shares" in the section "Sharing" has been disabled
    And user "Carol" has been created with default attributes and skeleton files
    And user "Brian" has shared folder "/simple-folder" with user "Alice"
    And user "Carol" has shared folder "/simple-folder" with user "Alice"
    When user "Alice" logs in using the webUI
    Then folder "simple-folder" shared by "Carol" should be in state "Pending" in the shared-with-you page on the webUI
    And folder "simple-folder" shared by "Brian" should be in state "Pending" in the shared-with-you page on the webUI

  @smokeTest
  Scenario: accept an offered share
    Given the setting "Automatically accept new incoming local user shares" in the section "Sharing" has been disabled
    And user "Brian" has shared folder "/simple-folder" with user "Alice"
    And user "Brian" has shared file "/testimage.jpg" with user "Alice"
    And user "Alice" has logged in using the webUI
    When the user accepts share "simple-folder" offered by user "Brian" using the webUI
    Then folder "simple-folder" should be in state "" in the shared-with-you page on the webUI
    And file "testimage.jpg" should be in state "Pending" in the shared-with-you page on the webUI
    And folder "simple-folder" should be in state "" in the shared-with-you page on the webUI after a page reload
    And file "testimage.jpg" should be in state "Pending" in the shared-with-you page on the webUI after a page reload
    And folder "simple-folder" should be listed in the files page on the webUI
    And file "testimage.jpg" should not be listed in the files page on the webUI

  Scenario Outline: accept an offered share when there is a default folder for received shares
    Given the setting "Automatically accept new incoming local user shares" in the section "Sharing" has been disabled
    And the administrator has set the default folder for received shares to "<share_folder>"
    And user "Brian" has shared folder "/simple-folder" with user "Alice"
    And user "Brian" has shared file "/testimage.jpg" with user "Alice"
    And user "Alice" has logged in using the webUI
    When the user accepts share "simple-folder" offered by user "Brian" using the webUI
    And the user accepts share "testimage.jpg" offered by user "Brian" using the webUI
    Then folder "simple-folder" should be listed in the files page folder "<share_folder>" on the webUI
    And file "testimage.jpg" should be listed in the files page folder "<share_folder>" on the webUI
    Examples:
      | share_folder        |
      | /ReceivedShares     |
      | /My/Received/Shares |

  @smokeTest
  Scenario: decline an offered (pending) share
    Given the setting "Automatically accept new incoming local user shares" in the section "Sharing" has been disabled
    And user "Brian" has shared folder "/simple-folder" with user "Alice"
    And user "Brian" has shared file "/testimage.jpg" with user "Alice"
    And user "Alice" has logged in using the webUI
    When the user declines share "simple-folder" offered by user "Brian" using the webUI
    Then folder "simple-folder" should be in state "Declined" in the shared-with-you page on the webUI
    And file "testimage.jpg" should be in state "Pending" in the shared-with-you page on the webUI
    And folder "simple-folder" should not be listed in the files page on the webUI
    And file "testimage.jpg" should not be listed in the files page on the webUI

  @smokeTest
  Scenario: decline an accepted share (with page-reload in between)
    Given the setting "Automatically accept new incoming local user shares" in the section "Sharing" has been disabled
    And user "Brian" has shared folder "/simple-folder" with user "Alice"
    And user "Brian" has shared file "/testimage.jpg" with user "Alice"
    And user "Alice" has logged in using the webUI
    When the user accepts share "simple-folder" offered by user "Brian" using the webUI
    And the user reloads the current page of the webUI
    And the user declines share "simple-folder" offered by user "Brian" using the webUI
    Then folder "simple-folder" should be in state "Declined" in the shared-with-you page on the webUI
    And file "testimage.jpg" should be in state "Pending" in the shared-with-you page on the webUI
    And folder "simple-folder" should not be listed in the files page on the webUI
    And file "testimage.jpg" should not be listed in the files page on the webUI

  Scenario: decline an accepted share (without any page-reload in between)
    Given the setting "Automatically accept new incoming local user shares" in the section "Sharing" has been disabled
    And user "Brian" has shared folder "/simple-folder" with user "Alice"
    And user "Brian" has shared file "/testimage.jpg" with user "Alice"
    And user "Alice" has logged in using the webUI
    When the user accepts share "simple-folder" offered by user "Brian" using the webUI
    And the user declines share "simple-folder" offered by user "Brian" using the webUI
    Then folder "simple-folder" should be in state "Declined" in the shared-with-you page on the webUI
    And file "testimage.jpg" should be in state "Pending" in the shared-with-you page on the webUI
    And folder "simple-folder" should not be listed in the files page on the webUI
    And file "testimage.jpg" should not be listed in the files page on the webUI

  Scenario: accept a previously declined share
    Given the setting "Automatically accept new incoming local user shares" in the section "Sharing" has been disabled
    And user "Brian" has shared folder "/simple-folder" with user "Alice"
    And user "Brian" has shared file "/testimage.jpg" with user "Alice"
    And user "Alice" has logged in using the webUI
    And the user declines share "simple-folder" offered by user "Brian" using the webUI
    When the user accepts share "simple-folder" offered by user "Brian" using the webUI
    Then folder "simple-folder" should be in state "" in the shared-with-you page on the webUI
    And file "testimage.jpg" should be in state "Pending" in the shared-with-you page on the webUI
    And folder "simple-folder" should be listed in the files page on the webUI
    And file "testimage.jpg" should not be listed in the files page on the webUI

  Scenario: accept a share that you received as user and as group member
    Given the setting "Automatically accept new incoming local user shares" in the section "Sharing" has been disabled
    And user "Brian" has shared folder "/simple-folder" with user "Alice"
    And user "Brian" has shared folder "/simple-folder" with group "grp1"
    And user "Alice" has logged in using the webUI
    When the user accepts share "simple-folder" offered by user "Brian" using the webUI
    And the user reloads the current page of the webUI
    Then folder "simple-folder" should be in state "" in the shared-with-you page on the webUI
    And folder "simple-folder" should be listed in the files page on the webUI

  Scenario: reject a share that you received as user and as group member
    Given the setting "Automatically accept new incoming local user shares" in the section "Sharing" has been disabled
    And user "Brian" has shared folder "/simple-folder" with user "Alice"
    And user "Brian" has shared folder "/simple-folder" with group "grp1"
    And user "Alice" has logged in using the webUI
    When the user declines share "simple-folder" offered by user "Brian" using the webUI
    And the user reloads the current page of the webUI
    Then folder "simple-folder" should be in state "Declined" in the shared-with-you page on the webUI
    And folder "simple-folder" should not be listed in the files page on the webUI

  Scenario: reshare a share that you received to a group that you are member of
    Given the setting "Automatically accept new incoming local user shares" in the section "Sharing" has been disabled
    And user "Brian" has shared folder "/simple-folder" with user "Alice"
    And user "Alice" has logged in using the webUI
    When the user accepts share "simple-folder" offered by user "Brian" using the webUI
    And the user has browsed to the files page
    And the user shares folder "simple-folder" with group "grp1" using the webUI
    And the user declines share "simple-folder" offered by user "Brian" using the webUI
    And the user reloads the current page of the webUI
    Then folder "simple-folder" should be in state "Declined" in the shared-with-you page on the webUI
    And folder "simple-folder" should not be listed in the files page on the webUI

  @smokeTest
  Scenario: unshare an accepted share on the "All files" page
    Given the setting "Automatically accept new incoming local user shares" in the section "Sharing" has been disabled
    And user "Brian" has shared folder "/simple-folder" with user "Alice"
    And user "Brian" has shared folder "/testimage.jpg" with group "grp1"
    And user "Alice" has accepted the share "/simple-folder" offered by user "Brian"
    And user "Alice" has accepted the share "/testimage.jpg" offered by user "Brian"
    And user "Alice" has logged in using the webUI
    When the user unshares folder "simple-folder" using the webUI
    And the user unshares file "testimage.jpg" using the webUI
    Then folder "simple-folder" should not be listed in the files page on the webUI
    And file "testimage.jpg" should not be listed in the files page on the webUI
    And folder "simple-folder" should be in state "Declined" in the shared-with-you page on the webUI
    And file "testimage.jpg" should be in state "Declined" in the shared-with-you page on the webUI

  @smokeTest
  Scenario: Auto-accept shares
    Given the setting "Automatically accept new incoming local user shares" in the section "Sharing" has been enabled
    And user "Brian" has shared folder "/simple-folder" with group "grp1"
    And user "Brian" has shared folder "/testimage.jpg" with user "Alice"
    When user "Alice" logs in using the webUI
    Then folder "simple-folder" should be listed on the webUI
    And file "testimage.jpg" should be listed on the webUI
    And folder "simple-folder" should be listed in the shared-with-you page on the webUI
    And file "testimage.jpg" should be listed in the shared-with-you page on the webUI
    And folder "simple-folder" should be in state "" in the shared-with-you page on the webUI
    And file "testimage.jpg" should be in state "" in the shared-with-you page on the webUI

  Scenario Outline: auto-accept a share when there is a default folder for received shares
    Given the setting "Automatically accept new incoming local user shares" in the section "Sharing" has been enabled
    And the administrator has set the default folder for received shares to "<share_folder>"
    And user "Brian" has shared folder "/simple-folder" with user "Alice"
    And user "Brian" has shared file "/testimage.jpg" with user "Alice"
    When user "Alice" logs in using the webUI
    Then folder "simple-folder" should be listed in the files page folder "<share_folder>" on the webUI
    And file "testimage.jpg" should be listed in the files page folder "<share_folder>" on the webUI
    Examples:
      | share_folder        |
      | /ReceivedShares     |
      | /My/Received/Shares |

  Scenario: decline auto-accepted shares
    Given the setting "Automatically accept new incoming local user shares" in the section "Sharing" has been enabled
    And user "Brian" has shared folder "/simple-folder" with group "grp1"
    And user "Brian" has shared folder "/testimage.jpg" with user "Alice"
    And user "Alice" has logged in using the webUI
    When the user declines share "simple-folder" offered by user "Brian" using the webUI
    And the user declines share "testimage.jpg" offered by user "Brian" using the webUI
    And the user has browsed to the files page
    Then folder "simple-folder" should not be listed on the webUI
    And file "testimage.jpg" should not be listed on the webUI
    And folder "simple-folder" should be in state "Declined" in the shared-with-you page on the webUI
    And file "testimage.jpg" should be in state "Declined" in the shared-with-you page on the webUI

  Scenario: unshare auto-accepted shares
    Given the setting "Automatically accept new incoming local user shares" in the section "Sharing" has been enabled
    And user "Brian" has shared folder "/simple-folder" with group "grp1"
    And user "Brian" has shared folder "/testimage.jpg" with user "Alice"
    And user "Alice" has logged in using the webUI
    When the user unshares folder "simple-folder" using the webUI
    And the user unshares file "testimage.jpg" using the webUI
    Then folder "simple-folder" should not be listed on the webUI
    And file "testimage.jpg" should not be listed on the webUI
    And folder "simple-folder" should be in state "Declined" in the shared-with-you page on the webUI
    And file "testimage.jpg" should be in state "Declined" in the shared-with-you page on the webUI

  Scenario: unshare renamed shares
    Given the setting "Automatically accept new incoming local user shares" in the section "Sharing" has been enabled
    And user "Brian" has shared folder "/simple-folder" with user "Alice"
    And user "Alice" has moved folder "/simple-folder" to "/simple-folder-renamed"
    And user "Alice" has logged in using the webUI
    When the user unshares folder "simple-folder-renamed" using the webUI
    Then folder "simple-folder-renamed" should not be listed on the webUI
    And folder "simple-folder-renamed" should be in state "Declined" in the shared-with-you page on the webUI

  Scenario: unshare moved shares
    Given the setting "Automatically accept new incoming local user shares" in the section "Sharing" has been enabled
    And user "Brian" has shared folder "/simple-folder" with user "Alice"
    And user "Alice" has created folder "/new-folder"
    And user "Alice" has moved folder "/simple-folder" to "/new-folder/shared"
    And user "Alice" has logged in using the webUI
    When the user opens folder "new-folder" using the webUI
    And the user unshares folder "shared" using the webUI
    Then folder "shared" should not be listed on the webUI
    And folder "shared" should be in state "Declined" in the shared-with-you page on the webUI

  Scenario: unshare renamed shares, accept it again
    Given the setting "Automatically accept new incoming local user shares" in the section "Sharing" has been enabled
    And user "Brian" has shared folder "/simple-folder" with user "Alice"
    And user "Alice" has moved folder "/simple-folder" to "/simple-folder-renamed"
    And user "Alice" has logged in using the webUI
    When the user unshares folder "simple-folder-renamed" using the webUI
    And the user accepts share "simple-folder-renamed" offered by user "Brian" using the webUI
    Then folder "simple-folder-renamed" should be in state "" in the shared-with-you page on the webUI
    And folder "simple-folder-renamed" should be listed in the files page on the webUI

  Scenario: User-based accepting is disabled while global is enabled
    Given the setting "Automatically accept new incoming local user shares" in the section "Sharing" has been enabled
    And user "Alice" has logged in using the webUI
    And the user has browsed to the personal sharing settings page
    When the user disables automatically accepting new incoming local shares
    And user "Brian" shares folder "/simple-folder" with group "grp1" using the sharing API
    And user "Brian" shares file "/testimage.jpg" with user "Alice" using the sharing API
    And the user browses to the files page
    Then folder "simple-folder" should not be listed on the webUI
    And file "testimage.jpg" should not be listed on the webUI
    But folder "simple-folder" should be listed in the shared-with-you page on the webUI
    And file "testimage.jpg" should be listed in the shared-with-you page on the webUI
    And folder "simple-folder" should be in state "Pending" in the shared-with-you page on the webUI
    And file "testimage.jpg" should be in state "Pending" in the shared-with-you page on the webUI

  Scenario: User-based accepting is enabled while global is enabled
    Given the setting "Automatically accept new incoming local user shares" in the section "Sharing" has been enabled
    And user "Alice" has logged in using the webUI
    And the user has browsed to the personal sharing settings page
    When the user enables automatically accepting new incoming local shares
    And user "Brian" shares folder "/simple-folder" with group "grp1" using the sharing API
    And user "Brian" shares file "/testimage.jpg" with user "Alice" using the sharing API
    And the user browses to the files page
    Then folder "simple-folder" should be listed on the webUI
    And file "testimage.jpg" should be listed on the webUI
    And folder "simple-folder" should be listed in the shared-with-you page on the webUI
    And file "testimage.jpg" should be listed in the shared-with-you page on the webUI
    And folder "simple-folder" should be in state "" in the shared-with-you page on the webUI
    And file "testimage.jpg" should be in state "" in the shared-with-you page on the webUI

  Scenario: User-based accepting checkbox is not visible while global is disabled
    Given the setting "Automatically accept new incoming local user shares" in the section "Sharing" has been disabled
    And user "Alice" has logged in using the webUI
    And the user has browsed to the personal sharing settings page
    Then User-based auto accepting checkbox should not be displayed on the personal sharing settings page on the webUI

  Scenario: Admin disables auto-accept setting again after user enabled personal auto-accept setting
    Given the setting "Automatically accept new incoming local user shares" in the section "Sharing" has been enabled
    And user "Alice" has logged in using the webUI
    And the user has browsed to the personal sharing settings page
    When the user disables automatically accepting new incoming local shares
    And the user enables automatically accepting new incoming local shares
    And the administrator disables the setting "Automatically accept new incoming local user shares" in the section "Sharing"
    And user "Brian" shares folder "/simple-folder" with group "grp1" using the sharing API
    And user "Brian" shares file "/testimage.jpg" with user "Alice" using the sharing API
    And the user browses to the files page
    Then folder "simple-folder" should not be listed on the webUI
    And file "testimage.jpg" should not be listed on the webUI
    And folder "simple-folder" should be listed in the shared-with-you page on the webUI
    And file "testimage.jpg" should be listed in the shared-with-you page on the webUI
    And folder "simple-folder" should be in state "Pending" in the shared-with-you page on the webUI
    And file "testimage.jpg" should be in state "Pending" in the shared-with-you page on the webUI
