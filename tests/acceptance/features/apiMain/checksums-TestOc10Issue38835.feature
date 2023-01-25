@api
Feature: checksums

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files

  # this is a bug demo scenario for https://github.com/owncloud/core/issues/38835
  # Once this scenario is fixed Delete this file and remove @skipOnOcV10 tag from tests/acceptance/features/apiMain/checksums.feature:132
  @files_sharing-app-required @skipOnStorage:ceph @skipOnStorage:scality
  Scenario: Sharing and modifying a file should return correct checksum in the propfind using new DAV path
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And using new DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/myChecksumFile.txt" with checksum "MD5:d70b40f177b14b470d1756a3c12b963a"
    And user "Alice" has shared file "/myChecksumFile.txt" with user "Brian"
    And user "Brian" has accepted share "/myChecksumFile.txt" offered by user "Alice"
    And user "Brian" has uploaded file with checksum "SHA1:ce5582148c6f0c1282335b87df5ed4be4b781399" and content "Some Text" to "/Shares/myChecksumFile.txt"
    When user "Brian" requests the checksum of "/Shares/myChecksumFile.txt" via propfind
    Then the HTTP status code should be "207"
    And the webdav checksum should be empty
