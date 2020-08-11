@api
Feature: checksums

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files

  Scenario Outline: Uploading a file with checksum should work
    Given using <dav_version> DAV path
    When user "Alice" uploads file "filesForUpload/textfile.txt" to "/myChecksumFile.txt" with checksum "MD5:d70b40f177b14b470d1756a3c12b963a" using the WebDAV API
    Then the HTTP status code should be "201"
    Examples:
      | dav_version |
      | old         |
      | new         |

  @smokeTest @skipOnOcis @issue-ocis-reva-196
  Scenario Outline: Uploading a file with checksum should return the checksum in the propfind
    Given using <dav_version> DAV path
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/myChecksumFile.txt" with checksum "MD5:d70b40f177b14b470d1756a3c12b963a"
    When user "Alice" requests the checksum of "/myChecksumFile.txt" via propfind
    Then the webdav checksum should match "SHA1:3ee962b839762adb0ad8ba6023a4690be478de6f MD5:d70b40f177b14b470d1756a3c12b963a ADLER32:8ae90960"
    Examples:
      | dav_version |
      | old         |
      | new         |

  @smokeTest @skipOnOcis @issue-ocis-reva-98
  Scenario Outline: Uploading a file with checksum should return the checksum in the download header
    Given using <dav_version> DAV path
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/myChecksumFile.txt" with checksum "MD5:d70b40f177b14b470d1756a3c12b963a"
    When user "Alice" downloads file "/myChecksumFile.txt" using the WebDAV API
    Then the header checksum should match "SHA1:3ee962b839762adb0ad8ba6023a4690be478de6f"
    Examples:
      | dav_version |
      | old         |
      | new         |

  @skipOnOcis @issue-ocis-reva-196
  Scenario Outline: Moving a file with checksum should return the checksum in the propfind
    Given using <dav_version> DAV path
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/myChecksumFile.txt" with checksum "MD5:d70b40f177b14b470d1756a3c12b963a"
    When user "Alice" moves file "/myChecksumFile.txt" to "/myMovedChecksumFile.txt" using the WebDAV API
    Then as user "Alice" the webdav checksum of "/myMovedChecksumFile.txt" via propfind should match "SHA1:3ee962b839762adb0ad8ba6023a4690be478de6f MD5:d70b40f177b14b470d1756a3c12b963a ADLER32:8ae90960"
    Examples:
      | dav_version |
      | old         |
      | new         |

  @skipOnOcis @issue-ocis-reva-98
  Scenario: Downloading a file with checksum should return the checksum in the download header
    Given using old DAV path
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/myChecksumFile.txt" with checksum "MD5:d70b40f177b14b470d1756a3c12b963a"
    When user "Alice" moves file "/myChecksumFile.txt" to "/myMovedChecksumFile.txt" using the WebDAV API
    And user "Alice" downloads file "/myMovedChecksumFile.txt" using the WebDAV API
    Then the header checksum should match "SHA1:3ee962b839762adb0ad8ba6023a4690be478de6f"

  @skipOnOcis @issue-ocis-reva-196
  Scenario: Uploading a chunked file with checksum should return the checksum in the propfind
    Given using old DAV path
    And user "Alice" has uploaded chunk file "1" of "3" with "AAAAA" to "/myChecksumFile.txt" with checksum "MD5:45a72715acdd5019c5be30bdbb75233e"
    And user "Alice" has uploaded chunk file "2" of "3" with "BBBBB" to "/myChecksumFile.txt" with checksum "MD5:45a72715acdd5019c5be30bdbb75233e"
    And user "Alice" has uploaded chunk file "3" of "3" with "CCCCC" to "/myChecksumFile.txt" with checksum "MD5:45a72715acdd5019c5be30bdbb75233e"
    When user "Alice" requests the checksum of "/myChecksumFile.txt" via propfind
    Then the webdav checksum should match "SHA1:acfa6b1565f9710d4d497c6035d5c069bd35a8e8 MD5:45a72715acdd5019c5be30bdbb75233e ADLER32:1ecd03df"

  @skipOnOcis @issue-ocis-reva-17
  Scenario: Uploading a chunked file with checksum should return the checksum in the download header
    Given using old DAV path
    And user "Alice" has uploaded chunk file "1" of "3" with "AAAAA" to "/myChecksumFile.txt" with checksum "MD5:45a72715acdd5019c5be30bdbb75233e"
    And user "Alice" has uploaded chunk file "2" of "3" with "BBBBB" to "/myChecksumFile.txt" with checksum "MD5:45a72715acdd5019c5be30bdbb75233e"
    And user "Alice" has uploaded chunk file "3" of "3" with "CCCCC" to "/myChecksumFile.txt" with checksum "MD5:45a72715acdd5019c5be30bdbb75233e"
    When user "Alice" downloads file "/myChecksumFile.txt" using the WebDAV API
    Then the header checksum should match "SHA1:acfa6b1565f9710d4d497c6035d5c069bd35a8e8"

  @local_storage @skipOnOcis @notToImplementOnOCIS
  Scenario Outline: Downloading a file from local storage has correct checksum
    Given using <dav_version> DAV path
    # Create the file directly in local storage, bypassing ownCloud
    And file "prueba_cksum.txt" with text "Test file for checksums" has been created in local storage on the server
    # Do a first download, which will trigger ownCloud to calculate a checksum for the file
    When user "Alice" downloads file "/local_storage/prueba_cksum.txt" using the WebDAV API
    # Now do a download that is expected to have a checksum with it
    And user "Alice" downloads file "/local_storage/prueba_cksum.txt" using the WebDAV API
    Then the header checksum should match "SHA1:a35b7605c8f586d735435535c337adc066c2ccb6"
    Examples:
      | dav_version |
      | old         |
      | new         |

  @skipOnOcis @issue-ocis-reva-14
  Scenario Outline: Moving file with checksum should return the checksum in the download header
    Given using <dav_version> DAV path
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/myChecksumFile.txt" with checksum "MD5:d70b40f177b14b470d1756a3c12b963a"
    When user "Alice" moves file "/myChecksumFile.txt" to "/myMovedChecksumFile.txt" using the WebDAV API
    And user "Alice" downloads file "/myMovedChecksumFile.txt" using the WebDAV API
    Then the header checksum should match "SHA1:3ee962b839762adb0ad8ba6023a4690be478de6f"
    Examples:
      | dav_version |
      | old         |
      | new         |

  @skipOnOcis @issue-ocis-reva-196
  Scenario: Copying a file with checksum should return the checksum in the propfind using new DAV path
    Given using new DAV path
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/myChecksumFile.txt" with checksum "MD5:d70b40f177b14b470d1756a3c12b963a"
    When user "Alice" copies file "/myChecksumFile.txt" to "/myChecksumFileCopy.txt" using the WebDAV API
    Then as user "Alice" the webdav checksum of "/myChecksumFileCopy.txt" via propfind should match "SHA1:3ee962b839762adb0ad8ba6023a4690be478de6f MD5:d70b40f177b14b470d1756a3c12b963a ADLER32:8ae90960"

  @skipOnOcis @issue-ocis-reva-98
  Scenario: Copying file with checksum should return the checksum in the download header using new DAV path
    Given using new DAV path
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/myChecksumFile.txt" with checksum "MD5:d70b40f177b14b470d1756a3c12b963a"
    When user "Alice" copies file "/myChecksumFile.txt" to "/myChecksumFileCopy.txt" using the WebDAV API
    And user "Alice" downloads file "/myChecksumFileCopy.txt" using the WebDAV API
    Then the header checksum should match "SHA1:3ee962b839762adb0ad8ba6023a4690be478de6f"

  @files_sharing-app-required
  @skipOnOcis @issue-ocis-reva-196
  Scenario: Sharing a file with checksum should return the checksum in the propfind using new DAV path
    Given using new DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/myChecksumFile.txt" with checksum "MD5:d70b40f177b14b470d1756a3c12b963a"
    When user "Alice" shares file "/myChecksumFile.txt" with user "Brian" using the sharing API
    And user "Brian" requests the checksum of "/myChecksumFile.txt" via propfind
    Then the webdav checksum should match "SHA1:3ee962b839762adb0ad8ba6023a4690be478de6f MD5:d70b40f177b14b470d1756a3c12b963a ADLER32:8ae90960"

  @files_sharing-app-required
  @skipOnOcis @issue-ocis-reva-196
  Scenario: Sharing and modifying a file should return correct checksum in the propfind using new DAV path
    Given using new DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/myChecksumFile.txt" with checksum "MD5:d70b40f177b14b470d1756a3c12b963a"
    When user "Alice" shares file "/myChecksumFile.txt" with user "Brian" using the sharing API
    And user "Brian" uploads file with checksum "SHA1:ce5582148c6f0c1282335b87df5ed4be4b781399" and content "Some Text" to "/myChecksumFile.txt" using the WebDAV API
    Then as user "Alice" the webdav checksum of "/myChecksumFile.txt" via propfind should match "SHA1:ce5582148c6f0c1282335b87df5ed4be4b781399 MD5:56e57920c3c8c727bfe7a5288cdf61c4 ADLER32:1048035a"

  @skipOnOcis @issue-ocis-reva-56
  Scenario: Upload new dav chunked file where checksum matches
    Given using new DAV path
    When user "Alice" creates a new chunking upload with id "chunking-42" using the WebDAV API
    And user "Alice" uploads new chunk file "2" with "BBBBB" to id "chunking-42" using the WebDAV API
    And user "Alice" uploads new chunk file "3" with "CCCCC" to id "chunking-42" using the WebDAV API
    And user "Alice" moves new chunk file with id "chunking-42" to "/myChunkedFile.txt" with checksum "SHA1:5d84d61b03fdacf813640f5242d309721e0629b1" using the WebDAV API
    Then the HTTP status code should be "201"

  @skipOnOcis @issue-ocis-reva-56
  Scenario: Upload new dav chunked file where checksum does not match
    Given using new DAV path
    When user "Alice" creates a new chunking upload with id "chunking-42" using the WebDAV API
    And user "Alice" uploads new chunk file "2" with "BBBBB" to id "chunking-42" using the WebDAV API
    And user "Alice" uploads new chunk file "3" with "CCCCC" to id "chunking-42" using the WebDAV API
    And user "Alice" moves new chunk file with id "chunking-42" to "/myChunkedFile.txt" with checksum "SHA1:f005ba11" using the WebDAV API
    Then the HTTP status code should be "400"
    And user "Alice" should not see the following elements
      | /myChunkedFile.txt |

  @skipOnOcis @issue-ocis-reva-56
  Scenario: Upload new dav chunked file using async MOVE where checksum matches
    Given using new DAV path
    And the administrator has enabled async operations
    When user "Alice" creates a new chunking upload with id "chunking-42" using the WebDAV API
    And user "Alice" uploads new chunk file "2" with "BBBBB" to id "chunking-42" using the WebDAV API
    And user "Alice" uploads new chunk file "3" with "CCCCC" to id "chunking-42" using the WebDAV API
    And user "Alice" moves new chunk file with id "chunking-42" asynchronously to "/myChunkedFile.txt" with checksum "SHA1:5d84d61b03fdacf813640f5242d309721e0629b1" using the WebDAV API
    Then the HTTP status code should be "202"
    And the following headers should match these regular expressions for user "Alice"
      | OC-JobStatus-Location | /%base_path%\/remote\.php\/dav\/job-status\/%username%\/[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/ |
    And the oc job status values of last request for user "Alice" should match these regular expressions
      | status | /^finished$/      |
      | fileId | /^[0-9a-z]{20,}$/ |
    And the content of file "/myChunkedFile.txt" for user "Alice" should be "BBBBBCCCCC"

  @skipOnOcis @issue-ocis-reva-56
  Scenario: Upload new dav chunked file using async MOVE where checksum does not matches
    Given using new DAV path
    And the administrator has enabled async operations
    When user "Alice" creates a new chunking upload with id "chunking-42" using the WebDAV API
    And user "Alice" uploads new chunk file "2" with "BBBBB" to id "chunking-42" using the WebDAV API
    And user "Alice" uploads new chunk file "3" with "CCCCC" to id "chunking-42" using the WebDAV API
    And user "Alice" moves new chunk file with id "chunking-42" asynchronously to "/myChunkedFile.txt" with checksum "SHA1:f005ba11" using the WebDAV API
    Then the HTTP status code should be "202"
    And the following headers should match these regular expressions for user "Alice"
      | OC-JobStatus-Location | /%base_path%\/remote\.php\/dav\/job-status\/%username%\/[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/ |
    And the oc job status values of last request for user "Alice" should match these regular expressions
      | status       | /^error$/                                                                  |
      | errorCode    | /^400$/                                                                    |
      | errorMessage | /^The computed checksum does not match the one received from the client.$/ |
    And user "Alice" should not see the following elements
      | /myChunkedFile.txt |

  @skipOnOcis @issue-ocis-reva-56
  Scenario: Upload new dav chunked file using async MOVE where checksum does not matches - retry with correct checksum
    Given using new DAV path
    And the administrator has enabled async operations
    When user "Alice" creates a new chunking upload with id "chunking-42" using the WebDAV API
    And user "Alice" uploads new chunk file "2" with "BBBBB" to id "chunking-42" using the WebDAV API
    And user "Alice" uploads new chunk file "3" with "CCCCC" to id "chunking-42" using the WebDAV API
    And user "Alice" moves new chunk file with id "chunking-42" asynchronously to "/myChunkedFile.txt" with checksum "SHA1:f005ba11" using the WebDAV API
    And user "Alice" moves new chunk file with id "chunking-42" asynchronously to "/myChunkedFile.txt" with checksum "SHA1:5d84d61b03fdacf813640f5242d309721e0629b1" using the WebDAV API
    Then the HTTP status code should be "202"
    And the following headers should match these regular expressions for user "Alice"
      | OC-JobStatus-Location | /%base_path%\/remote\.php\/dav\/job-status\/%username%\/[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/ |
    And the oc job status values of last request for user "Alice" should match these regular expressions
      | status | /^finished$/      |
      | fileId | /^[0-9a-z]{20,}$/ |
    And the content of file "/myChunkedFile.txt" for user "Alice" should be "BBBBBCCCCC"

  @skipOnOcis @issue-ocis-reva-99
  Scenario Outline: Upload a file where checksum does not match
    Given using <dav_version> DAV path
    When user "Alice" uploads file with checksum "SHA1:f005ba11" and content "Some Text" to "/chksumtst.txt" using the WebDAV API
    Then the HTTP status code should be "400"
    And user "Alice" should not see the following elements
      | /chksumtst.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: Upload a file where checksum does match
    Given using <dav_version> DAV path
    When user "Alice" uploads file with checksum "SHA1:ce5582148c6f0c1282335b87df5ed4be4b781399" and content "Some Text" to "/chksumtst.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    Examples:
      | dav_version |
      | old         |
      | new         |

  @skipOnOcis @issue-ocis-reva-99
  Scenario Outline: Uploaded file should have the same checksum when downloaded
    Given using <dav_version> DAV path
    And user "Alice" has uploaded file with checksum "SHA1:ce5582148c6f0c1282335b87df5ed4be4b781399" and content "Some Text" to "/chksumtst.txt"
    When user "Alice" downloads file "/chksumtst.txt" using the WebDAV API
    Then the following headers should be set
      | header      | value                                         |
      | OC-Checksum | SHA1:ce5582148c6f0c1282335b87df5ed4be4b781399 |
    Examples:
      | dav_version |
      | old         |
      | new         |

  @local_storage @skipOnOcis @notToImplementOnOCIS @skipOnEncryptionType:user-keys @encryption-issue-42
  Scenario Outline: Uploaded file to external storage should have the same checksum when downloaded
    Given using <dav_version> DAV path
    And file "/local_storage/chksumtst.txt" has been deleted for user "Alice"
    And user "Alice" has uploaded file with checksum "SHA1:ce5582148c6f0c1282335b87df5ed4be4b781399" and content "Some Text" to "/local_storage/chksumtst.txt"
    When user "Alice" downloads file "/local_storage/chksumtst.txt" using the WebDAV API
    Then the following headers should be set
      | header      | value                                         |
      | OC-Checksum | SHA1:ce5582148c6f0c1282335b87df5ed4be4b781399 |
    Examples:
      | dav_version |
      | old         |
      | new         |

  ## Validation Plugin or Old Endpoint Specific
  @skipOnOcis @issue-ocis-reva-17
  Scenario: Uploading an old method chunked file with checksum should fail using new DAV path
    Given using new DAV path
    When user "Alice" uploads chunk file "1" of "3" with "AAAAA" to "/myChecksumFile.txt" with checksum "MD5:45a72715acdd5019c5be30bdbb75233e" using the WebDAV API
    Then the HTTP status code should be "503"
    And user "Alice" should not see the following elements
      | /myChecksumFile.txt |

  ## upload overwriting
  @skipOnOcis @issue-ocis-reva-196
  Scenario Outline: Uploading a file with MD5 checksum overwriting an existing file
    Given using <dav_version> DAV path
    When user "Alice" uploads file "filesForUpload/textfile.txt" to "/textfile0.txt" with checksum "MD5:d70b40f177b14b470d1756a3c12b963a" using the WebDAV API
    Then as user "Alice" the webdav checksum of "/textfile0.txt" via propfind should match "SHA1:3ee962b839762adb0ad8ba6023a4690be478de6f MD5:d70b40f177b14b470d1756a3c12b963a ADLER32:8ae90960"
    And the content of file "/textfile0.txt" for user "Alice" should be:
      """
      This is a testfile.

      Cheers.
      """
    Examples:
      | dav_version |
      | old         |
      | new         |

  @skipOnOcis @issue-ocis-reva-196
  Scenario Outline: Uploading a file with SHA1 checksum overwriting an existing file
    Given using <dav_version> DAV path
    When user "Alice" uploads file "filesForUpload/textfile.txt" to "/textfile0.txt" with checksum "SHA1:3ee962b839762adb0ad8ba6023a4690be478de6f" using the WebDAV API
    Then as user "Alice" the webdav checksum of "/textfile0.txt" via propfind should match "SHA1:3ee962b839762adb0ad8ba6023a4690be478de6f MD5:d70b40f177b14b470d1756a3c12b963a ADLER32:8ae90960"
    And the content of file "/textfile0.txt" for user "Alice" should be:
      """
      This is a testfile.

      Cheers.
      """
    Examples:
      | dav_version |
      | old         |
      | new         |

  @skipOnStorage:ceph @skipOnStorage:scality @files_primary_s3-issue-224
  @skipOnOcis @issue-ocis-reva-196
  Scenario Outline: Uploading a file with invalid SHA1 checksum overwriting an existing file
    Given using <dav_version> DAV path
    And user "Brian" has been created with default attributes and skeleton files
    When user "Brian" uploads file "filesForUpload/textfile.txt" to "/textfile0.txt" with checksum "SHA1:f005ba11f005ba11f005ba11f005ba11f005ba11" using the WebDAV API
    Then as user "Brian" the webdav checksum of "/textfile0.txt" via propfind should match "SHA1:0c1d334e686d1039c9ead0dbc047f02dbf696be8 MD5:d991cd854c53729d066c6ed5e34bcda3 ADLER32:8685092b"
    And the content of file "/textfile0.txt" for user "Brian" should be "ownCloud test text file 0" plus end-of-line
    Examples:
      | dav_version |
      | old         |
      | new         |

  @skipOnOcis @issue-ocis-reva-56
  Scenario: Upload overwriting a file with new chunking and correct checksum
    Given using new DAV path
    And user "Brian" has been created with default attributes and skeleton files
    When user "Brian" creates a new chunking upload with id "chunking-42" using the WebDAV API
    And user "Brian" uploads new chunk file "2" with "BBBBB" to id "chunking-42" using the WebDAV API
    And user "Brian" uploads new chunk file "3" with "CCCCC" to id "chunking-42" using the WebDAV API
    And user "Brian" moves new chunk file with id "chunking-42" to "/textfile0.txt" with checksum "SHA1:5d84d61b03fdacf813640f5242d309721e0629b1" using the WebDAV API
    Then the HTTP status code should be "204"
    And the content of file "/textfile0.txt" for user "Brian" should be "BBBBBCCCCC"

  @skipOnStorage:ceph @skipOnStorage:scality @files_primary_s3-issue-224
  @skipOnOcis @issue-ocis-reva-56
  Scenario: Upload overwriting a file with new chunking and invalid checksum
    Given using new DAV path
    And user "Brian" has been created with default attributes and skeleton files
    When user "Brian" creates a new chunking upload with id "chunking-42" using the WebDAV API
    And user "Brian" uploads new chunk file "2" with "BBBBB" to id "chunking-42" using the WebDAV API
    And user "Brian" uploads new chunk file "3" with "CCCCC" to id "chunking-42" using the WebDAV API
    And user "Brian" moves new chunk file with id "chunking-42" to "/textfile0.txt" with checksum "SHA1:f005ba11" using the WebDAV API
    Then the HTTP status code should be "400"
    And the content of file "/textfile0.txt" for user "Brian" should be "ownCloud test text file 0" plus end-of-line

  @issue-ocis-reva-214 @skipOnOcis-EOS-Storage
  Scenario Outline: Uploading a file with checksum should work for file with special characters
    When user "Alice" uploads file "filesForUpload/textfile.txt" to <renamed_file> with checksum "MD5:d70b40f177b14b470d1756a3c12b963a" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file <renamed_file> for user "Alice" should be:
      """
      This is a testfile.

      Cheers.
      """
    Examples:
      | renamed_file      |
      | " oc?test=ab&cd " |
      | "# %ab ab?=ed"    |
