Feature: checksums

  Background:
    Given user "user0" has been created

  Scenario: Uploading a file with checksum should work
    Given using old dav path
    When user "user0" uploads file "data/textfile.txt" to "/myChecksumFile.txt" with checksum "MD5:d70b40f177b14b470d1756a3c12b963a" using the API
    Then the webdav response should have a status code "201"

  Scenario: Uploading a file with checksum should return the checksum in the propfind
    Given using old dav path
    And user "user0" has uploaded file "data/textfile.txt" to "/myChecksumFile.txt" with checksum "MD5:d70b40f177b14b470d1756a3c12b963a"
    When user "user0" requests the checksum of "/myChecksumFile.txt" via propfind
    Then the webdav checksum should match "SHA1:3ee962b839762adb0ad8ba6023a4690be478de6f MD5:d70b40f177b14b470d1756a3c12b963a ADLER32:8ae90960"

  Scenario: Uploading a file with checksum should return the checksum in the download header
    Given using old dav path
    And user "user0" has uploaded file "data/textfile.txt" to "/myChecksumFile.txt" with checksum "MD5:d70b40f177b14b470d1756a3c12b963a"
    When user "user0" downloads the file "/myChecksumFile.txt" using the API
    Then the header checksum should match "SHA1:3ee962b839762adb0ad8ba6023a4690be478de6f"

  Scenario: Moving a file with checksum should return the checksum in the propfind
    Given using old dav path
    And user "user0" has uploaded file "data/textfile.txt" to "/myChecksumFile.txt" with checksum "MD5:d70b40f177b14b470d1756a3c12b963a"
    When user "user0" moves file "/myChecksumFile.txt" to "/myMovedChecksumFile.txt" using the API
    And user "user0" requests the checksum of "/myMovedChecksumFile.txt" via propfind
    Then the webdav checksum should match "SHA1:3ee962b839762adb0ad8ba6023a4690be478de6f MD5:d70b40f177b14b470d1756a3c12b963a ADLER32:8ae90960"

  Scenario: Downloading a file with checksum should return the checksum in the download header
    Given using old dav path
    And user "user0" has uploaded file "data/textfile.txt" to "/myChecksumFile.txt" with checksum "MD5:d70b40f177b14b470d1756a3c12b963a"
    When user "user0" moves file "/myChecksumFile.txt" to "/myMovedChecksumFile.txt" using the API
    And user "user0" downloads the file "/myMovedChecksumFile.txt" using the API
    Then the header checksum should match "SHA1:3ee962b839762adb0ad8ba6023a4690be478de6f"

  Scenario: Uploading a chunked file with checksum should return the checksum in the propfind
    Given using old dav path
    And user "user0" has uploaded chunk file "1" of "3" with "AAAAA" to "/myChecksumFile.txt" with checksum "MD5:45a72715acdd5019c5be30bdbb75233e"
    And user "user0" has uploaded chunk file "2" of "3" with "BBBBB" to "/myChecksumFile.txt" with checksum "MD5:45a72715acdd5019c5be30bdbb75233e"
    And user "user0" has uploaded chunk file "3" of "3" with "CCCCC" to "/myChecksumFile.txt" with checksum "MD5:45a72715acdd5019c5be30bdbb75233e"
    When user "user0" requests the checksum of "/myChecksumFile.txt" via propfind
    Then the webdav checksum should match "SHA1:acfa6b1565f9710d4d497c6035d5c069bd35a8e8 MD5:45a72715acdd5019c5be30bdbb75233e ADLER32:1ecd03df"

  Scenario: Uploading a chunked file with checksum should return the checksum in the download header
    Given using old dav path
    And user "user0" has uploaded chunk file "1" of "3" with "AAAAA" to "/myChecksumFile.txt" with checksum "MD5:45a72715acdd5019c5be30bdbb75233e"
    And user "user0" has uploaded chunk file "2" of "3" with "BBBBB" to "/myChecksumFile.txt" with checksum "MD5:45a72715acdd5019c5be30bdbb75233e"
    And user "user0" has uploaded chunk file "3" of "3" with "CCCCC" to "/myChecksumFile.txt" with checksum "MD5:45a72715acdd5019c5be30bdbb75233e"
    When user "user0" downloads the file "/myChecksumFile.txt" using the API
    Then the header checksum should match "SHA1:acfa6b1565f9710d4d497c6035d5c069bd35a8e8"

  @local_storage
  Scenario: Downloading a file from local storage has correct checksum
    Given using old dav path
    And file "prueba_cksum.txt" with text "Test file for checksums" has been created in local storage
    When user "user0" downloads the file "/local_storage/prueba_cksum.txt" using the API
    Then the header checksum should match "SHA1:a35b7605c8f586d735435535c337adc066c2ccb6"

  Scenario: Uploading a file with checksum should work using new dav path
    Given using new dav path
    When user "user0" uploads file "data/textfile.txt" to "/myChecksumFile.txt" with checksum "MD5:d70b40f177b14b470d1756a3c12b963a" using the API
    Then the webdav response should have a status code "201"

  Scenario: Uploading a file with checksum should return the checksum in the propfind using new dav path
    Given using new dav path
    And user "user0" has uploaded file "data/textfile.txt" to "/myChecksumFile.txt" with checksum "MD5:d70b40f177b14b470d1756a3c12b963a"
    When user "user0" requests the checksum of "/myChecksumFile.txt" via propfind
    Then the webdav checksum should match "SHA1:3ee962b839762adb0ad8ba6023a4690be478de6f MD5:d70b40f177b14b470d1756a3c12b963a ADLER32:8ae90960"

  Scenario: Uploading a file with checksum should return the checksum in the download header using new dav path
    Given using new dav path
    And user "user0" has uploaded file "data/textfile.txt" to "/myChecksumFile.txt" with checksum "MD5:d70b40f177b14b470d1756a3c12b963a"
    When user "user0" downloads the file "/myChecksumFile.txt" using the API
    Then the header checksum should match "SHA1:3ee962b839762adb0ad8ba6023a4690be478de6f"

  Scenario: Moving a file with checksum should return the checksum in the propfind using new dav path
    Given using new dav path
    And user "user0" has uploaded file "data/textfile.txt" to "/myChecksumFile.txt" with checksum "MD5:d70b40f177b14b470d1756a3c12b963a"
    When user "user0" moves file "/myChecksumFile.txt" to "/myMovedChecksumFile.txt" using the API
    And user "user0" requests the checksum of "/myMovedChecksumFile.txt" via propfind
    Then the webdav checksum should match "SHA1:3ee962b839762adb0ad8ba6023a4690be478de6f MD5:d70b40f177b14b470d1756a3c12b963a ADLER32:8ae90960"

  Scenario: Moving file with checksum should return the checksum in the download header using new dav path
    Given using new dav path
    And user "user0" has uploaded file "data/textfile.txt" to "/myChecksumFile.txt" with checksum "MD5:d70b40f177b14b470d1756a3c12b963a"
    When user "user0" moves file "/myChecksumFile.txt" to "/myMovedChecksumFile.txt" using the API
    And user "user0" downloads the file "/myMovedChecksumFile.txt" using the API
    Then the header checksum should match "SHA1:3ee962b839762adb0ad8ba6023a4690be478de6f"

  Scenario: Copying a file with checksum should return the checksum in the propfind using new dav path
    Given using new dav path
    And user "user0" has uploaded file "data/textfile.txt" to "/myChecksumFile.txt" with checksum "MD5:d70b40f177b14b470d1756a3c12b963a"
    When user "user0" copies file "/myChecksumFile.txt" to "/myChecksumFileCopy.txt" using the API
    And user "user0" requests the checksum of "/myChecksumFileCopy.txt" via propfind
    Then the webdav checksum should match "SHA1:3ee962b839762adb0ad8ba6023a4690be478de6f MD5:d70b40f177b14b470d1756a3c12b963a ADLER32:8ae90960"

  Scenario: Copying file with checksum should return the checksum in the download header using new dav path
    Given using new dav path
    And user "user0" has uploaded file "data/textfile.txt" to "/myChecksumFile.txt" with checksum "MD5:d70b40f177b14b470d1756a3c12b963a"
    When user "user0" copies file "/myChecksumFile.txt" to "/myChecksumFileCopy.txt" using the API
    And user "user0" downloads the file "/myChecksumFileCopy.txt" using the API
    Then the header checksum should match "SHA1:3ee962b839762adb0ad8ba6023a4690be478de6f"

  @local_storage
  Scenario: Downloading a file from local storage has correct checksum using new dav path
    Given using new dav path
    And file "prueba_cksum.txt" with text "Test file for checksums" has been created in local storage
    When user "user0" downloads the file "/local_storage/prueba_cksum.txt" using the API
    Then the header checksum should match "SHA1:a35b7605c8f586d735435535c337adc066c2ccb6"

  Scenario: Upload new dav chunked file where checksum matches
    Given using new dav path
    When user "user0" creates a new chunking upload with id "chunking-42" using the API
    And user "user0" uploads new chunk file "2" with "BBBBB" to id "chunking-42" using the API
    And user "user0" uploads new chunk file "3" with "CCCCC" to id "chunking-42" using the API
    And user "user0" moves new chunk file with id "chunking-42" to "/myChunkedFile.txt" with checksum "SHA1:5d84d61b03fdacf813640f5242d309721e0629b1" using the API
    Then the HTTP status code should be "201"

  Scenario: Upload new dav chunked file where checksum does not match
    Given using new dav path
    When user "user0" creates a new chunking upload with id "chunking-42" using the API
    And user "user0" uploads new chunk file "2" with "BBBBB" to id "chunking-42" using the API
    And user "user0" uploads new chunk file "3" with "CCCCC" to id "chunking-42" using the API
    And user "user0" moves new chunk file with id "chunking-42" to "/myChunkedFile.txt" with checksum "SHA1:f005ba11" using the API
    Then the HTTP status code should be "400"

  Scenario: Upload a file where checksum does not match
    Given using old dav path
    And file "/chksumtst.txt" has been deleted for user "user0"
    When user "user0" uploads file with checksum "SHA1:f005ba11" and content "Some Text" to "/chksumtst.txt" using the API
    Then the HTTP status code should be "400"

  Scenario: Upload a file where checksum does match
    Given using old dav path
    And file "/chksumtst.txt" has been deleted for user "user0"
    When user "user0" uploads file with checksum "SHA1:ce5582148c6f0c1282335b87df5ed4be4b781399" and content "Some Text" to "/chksumtst.txt" using the API
    Then the HTTP status code should be "201"

  Scenario: Uploaded file should have the same checksum when downloaded
    Given using old dav path
    And file "/chksumtst.txt" has been deleted for user "user0"
    And user "user0" has uploaded file with checksum "SHA1:ce5582148c6f0c1282335b87df5ed4be4b781399" and content "Some Text" to "/chksumtst.txt"
    When downloading file "/chksumtst.txt" as "user0"
    Then the following headers should be set
            | OC-Checksum | SHA1:ce5582148c6f0c1282335b87df5ed4be4b781399 |

  @local_storage
  Scenario: Uploaded file to external storage should have the same checksum when downloaded
    Given using old dav path
    And file "/local_storage/chksumtst.txt" has been deleted for user "user0"
    And user "user0" has uploaded file with checksum "SHA1:ce5582148c6f0c1282335b87df5ed4be4b781399" and content "Some Text" to "/local_storage/chksumtst.txt"
    When downloading file "/local_storage/chksumtst.txt" as "user0"
    Then the following headers should be set
            | OC-Checksum | SHA1:ce5582148c6f0c1282335b87df5ed4be4b781399 |

  ## Validation Plugin or Old Endpoint Specific

  Scenario: Uploading an old method chunked file with checksum should fail using new dav path
    Given using new dav path
    When user "user0" uploads chunk file "1" of "3" with "AAAAA" to "/myChecksumFile.txt" with checksum "MD5:45a72715acdd5019c5be30bdbb75233e"
    Then the HTTP status code should be "503"
