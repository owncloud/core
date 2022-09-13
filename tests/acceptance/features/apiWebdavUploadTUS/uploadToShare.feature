@api @files_sharing-app-required @skipOnOcV10

Feature: upload file to shared folder

  Background:
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |


  Scenario Outline: Uploading file to a received share folder
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/FOLDER"
    And user "Alice" has shared folder "/FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    When user "Brian" uploads file with content "uploaded content" to "/Shares/FOLDER/textfile.txt" using the TUS protocol on the WebDAV API
    Then as "Alice" file "/FOLDER/textfile.txt" should exist
    And the content of file "/FOLDER/textfile.txt" for user "Alice" should be "uploaded content"
    Examples:
      | dav_version |
      | old         |
      | new         |


  Scenario Outline: Uploading file to a user read/write share folder works
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/FOLDER"
    And user "Alice" has shared folder "/FOLDER" with user "Brian" with permissions "change"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    When user "Brian" uploads file with content "uploaded content" to "/Shares/FOLDER/textfile.txt" using the TUS protocol on the WebDAV API
    Then as "Alice" file "/FOLDER/textfile.txt" should exist
    And the content of file "/FOLDER/textfile.txt" for user "Alice" should be "uploaded content"
    Examples:
      | dav_version |
      | old         |
      | new         |


  Scenario Outline: Uploading a file into a group share as share receiver
    Given using <dav_version> DAV path
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And user "Alice" has created folder "/FOLDER"
    And user "Alice" has shared folder "FOLDER" with group "grp1" with permissions "change"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    When user "Brian" uploads file with content "uploaded content" to "/Shares/FOLDER/textfile.txt" using the TUS protocol on the WebDAV API
    Then as "Alice" file "/FOLDER/textfile.txt" should exist
    And the content of file "/FOLDER/textfile.txt" for user "Alice" should be "uploaded content"
    Examples:
      | dav_version |
      | old         |
      | new         |


  Scenario Outline: Overwrite file to a received share folder
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/FOLDER"
    And user "Alice" has uploaded file with content "original content" to "/FOLDER/textfile.txt"
    And user "Alice" has shared folder "/FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    When user "Brian" uploads file with content "overwritten content" to "/Shares/FOLDER/textfile.txt" using the TUS protocol on the WebDAV API
    Then as "Alice" file "/FOLDER/textfile.txt" should exist
    And the content of file "/FOLDER/textfile.txt" for user "Alice" should be "overwritten content"
    Examples:
      | dav_version |
      | old         |
      | new         |


  Scenario Outline: attempt to upload a file into a folder within correctly received read only share
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/FOLDER"
    And user "Alice" has shared folder "/FOLDER" with user "Brian" with permissions "read"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    When user "Brian" uploads file with content "uploaded content" to "/Shares/FOLDER/textfile.txt" using the TUS protocol on the WebDAV API
    Then as "Brian" file "/Shares/FOLDER/textfile.txt" should not exist
    Examples:
      | dav_version |
      | old         |
      | new         |


  Scenario Outline: Upload a file to shared folder with checksum should return the checksum in the propfind for sharee
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/FOLDER"
    And user "Alice" has shared folder "/FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has created a new TUS resource on the WebDAV API with these headers:
      | Upload-Length   | 5                                     |
      #    L0ZPTERFUi90ZXh0RmlsZS50eHQ= is the base64 encode of /FOLDER/textFile.txt
      | Upload-Metadata | filename L0ZPTERFUi90ZXh0RmlsZS50eHQ= |
    And user "Alice" has uploaded file with checksum "SHA1 8cb2237d0679ca88db6464eac60da96345513964" to the last created TUS Location with offset "0" and content "12345" using the TUS protocol on the WebDAV API
    When user "Brian" requests the checksum of "/Shares/FOLDER/textFile.txt" via propfind
    Then the HTTP status code should be "207"
    And the webdav checksum should match "SHA1:8cb2237d0679ca88db6464eac60da96345513964 MD5:827ccb0eea8a706c4c34a16891f84e7b ADLER32:02f80100"
    Examples:
      | dav_version |
      | old         |
      | new         |


  Scenario Outline: Upload a file to shared folder with checksum should return the checksum in the download header for sharee
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/FOLDER"
    And user "Alice" has shared folder "/FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has created a new TUS resource on the WebDAV API with these headers:
      | Upload-Length   | 5                                     |
      #    L0ZPTERFUi90ZXh0RmlsZS50eHQ= is the base64 encode of /FOLDER/textFile.txt
      | Upload-Metadata | filename L0ZPTERFUi90ZXh0RmlsZS50eHQ= |
    And user "Alice" has uploaded file with checksum "SHA1 8cb2237d069ca88db6464eac60da96345513964" to the last created TUS Location with offset "0" and content "12345" using the TUS protocol on the WebDAV API
    When user "Brian" downloads file "/Shares/FOLDER/textFile.txt" using the WebDAV API
    Then the HTTP status code should be "200"
    And the header checksum should match "SHA1:8cb2237d0679ca88db6464eac60da96345513964"
    Examples:
      | dav_version |
      | old         |
      | new         |


  Scenario Outline: Sharer shares a file with correct checksum should return the checksum in the propfind for sharee
    Given using <dav_version> DAV path
    And user "Alice" has created a new TUS resource on the WebDAV API with these headers:
      | Upload-Length   | 5                         |
      #    dGV4dEZpbGUudHh0 is the base64 encode of textFile.txt
      | Upload-Metadata | filename dGV4dEZpbGUudHh0 |
    And user "Alice" has uploaded file with checksum "SHA1 8cb2237d0679ca88db6464eac60da96345513964" to the last created TUS Location with offset "0" and content "12345" using the TUS protocol on the WebDAV API
    And user "Alice" has shared file "/textFile.txt" with user "Brian"
    And user "Brian" has accepted share "/textFile.txt" offered by user "Alice"
    When user "Brian" requests the checksum of "/Shares/textFile.txt" via propfind
    Then the HTTP status code should be "207"
    And the webdav checksum should match "SHA1:8cb2237d0679ca88db6464eac60da96345513964 MD5:827ccb0eea8a706c4c34a16891f84e7b ADLER32:02f80100"
    Examples:
      | dav_version |
      | old         |
      | new         |


  Scenario Outline: Sharer shares a file with correct checksum should return the checksum in the download header for sharee
    Given using <dav_version> DAV path
    And user "Alice" has created a new TUS resource on the WebDAV API with these headers:
      | Upload-Length   | 5                         |
      #    dGV4dEZpbGUudHh0 is the base64 encode of textFile.txt
      | Upload-Metadata | filename dGV4dEZpbGUudHh0 |
    And user "Alice" has uploaded file with checksum "SHA1 8cb2237d0679ca88db6464eac60da96345513964" to the last created TUS Location with offset "0" and content "12345" using the TUS protocol on the WebDAV API
    And user "Alice" has shared file "/textFile.txt" with user "Brian"
    And user "Brian" has accepted share "/textFile.txt" offered by user "Alice"
    When user "Brian" downloads file "/Shares/textFile.txt" using the WebDAV API
    Then the HTTP status code should be "200"
    And the header checksum should match "SHA1:8cb2237d0679ca88db6464eac60da96345513964"
    Examples:
      | dav_version |
      | old         |
      | new         |


  Scenario Outline: Sharee uploads a file to a received share folder with correct checksum
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/FOLDER"
    And user "Alice" has shared folder "/FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    When user "Brian" creates a new TUS resource on the WebDAV API with these headers:
      | Tus-Resumable   | 1.0.0                                         |
      | Upload-Length   | 16                                            |
      #    L1NoYXJlcy9GT0xERVIvdGV4dGZpbGUudHh0 is the base64 encode of /Shares/FOLDER/textFile.txt
      | Upload-Metadata | filename L1NoYXJlcy9GT0xERVIvdGV4dGZpbGUudHh0 |
    And user "Brian" uploads file with checksum "MD5 827ccb0eea8a706c4c34a16891f84e7b" to the last created TUS Location with offset "0" and content "uploaded content" using the TUS protocol on the WebDAV API
    Then the HTTP status code should be "204"
    And as "Alice" file "/FOLDER/textFile.txt" should exist
    And the content of file "/FOLDER/textFile.txt" for user "Alice" should be "uploaded content"
    Examples:
      | dav_version |
      | old         |
      | new         |


  Scenario Outline: Sharee uploads a file to a received share folder with wrong checksum should not work
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/FOLDER"
    And user "Alice" has shared folder "/FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    When user "Brian" creates a new TUS resource on the WebDAV API with these headers:
      | Tus-Resumable   | 1.0.0                                         |
      | Upload-Length   | 16                                            |
      #    L1NoYXJlcy9GT0xERVIvdGV4dGZpbGUudHh0 is the base64 encode of /Shares/FOLDER/textFile.txt
      | Upload-Metadata | filename L1NoYXJlcy9GT0xERVIvdGV4dGZpbGUudHh0 |
    And user "Brian" uploads file with checksum "MD5 827ccb0eea8a706c4c34a16891f84e8c" to the last created TUS Location with offset "0" and content "uploaded content" using the TUS protocol on the WebDAV API
    Then the HTTP status code should be "406"
    And as "Alice" file "/FOLDER/textFile.txt" should not exist
    Examples:
      | dav_version |
      | old         |
      | new         |


  Scenario Outline: Sharer uploads a file to shared folder with wrong correct checksum should not work
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/FOLDER"
    And user "Alice" has shared folder "/FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Alice" has created a new TUS resource on the WebDAV API with these headers:
      | Upload-Length   | 5                                     |
      #    L0ZPTERFUi90ZXh0RmlsZS50eHQ= is the base64 encode of /FOLDER/textFile.txt
      | Upload-Metadata | filename L0ZPTERFUi90ZXh0RmlsZS50eHQ= |
    When user "Alice" uploads file with checksum "SHA1 8cb2237d0679ca88db6464eac60da96345513954" to the last created TUS Location with offset "0" and content "uploaded content" using the TUS protocol on the WebDAV API
    Then the HTTP status code should be "406"
    And as "Alice" file "/FOLDER/textFile.txt" should not exist
    And as "Brian" file "/Shares/FOLDER/textFile.txt" should not exist
    Examples:
      | dav_version |
      | old         |
      | new         |


  Scenario Outline: Sharer uploads a chunked file with correct checksum and share it with sharee should work
    Given using <dav_version> DAV path
    And user "Alice" has created a new TUS resource on the WebDAV API with these headers:
      | Upload-Length   | 10                        |
      #    dGV4dEZpbGUudHh0 is the base64 encode of textFile.txt
      | Upload-Metadata | filename dGV4dEZpbGUudHh0 |
    When user "Alice" sends a chunk to the last created TUS Location with offset "0" and data "01234" with checksum "MD5 4100c4d44da9177247e44a5fc1546778" using the TUS protocol on the WebDAV API
    And user "Alice" sends a chunk to the last created TUS Location with offset "5" and data "56789" with checksum "MD5 099ebea48ea9666a7da2177267983138" using the TUS protocol on the WebDAV API
    And user "Alice" shares file "textFile.txt" with user "Brian" using the sharing API
    And user "Brian" accepts share "/textFile.txt" offered by user "Alice" using the sharing API
    Then the HTTP status code should be "200"
    And the content of file "/Shares/textFile.txt" for user "Brian" should be "0123456789"
    Examples:
      | dav_version |
      | old         |
      | new         |


  Scenario Outline: Sharee uploads a chunked file with correct checksum to a received share folder should work
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/FOLDER"
    And user "Alice" has shared folder "/FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Brian" creates a new TUS resource on the WebDAV API with these headers:
      | Tus-Resumable   | 1.0.0                                         |
      | Upload-Length   | 10                                            |
      #    L1NoYXJlcy9GT0xERVIvdGV4dGZpbGUudHh0 is the base64 encode of /Shares/FOLDER/textFile.txt
      | Upload-Metadata | filename L1NoYXJlcy9GT0xERVIvdGV4dGZpbGUudHh0 |
    When user "Brian" sends a chunk to the last created TUS Location with offset "0" and data "01234" with checksum "MD5 4100c4d44da9177247e44a5fc1546778" using the TUS protocol on the WebDAV API
    And user "Brian" sends a chunk to the last created TUS Location with offset "5" and data "56789" with checksum "MD5 099ebea48ea9666a7da2177267983138" using the TUS protocol on the WebDAV API
    Then the HTTP status code should be "204"
    And as "Alice" file "/FOLDER/textFile.txt" should exist
    And the content of file "/FOLDER/textFile.txt" for user "Alice" should be "0123456789"
    Examples:
      | dav_version |
      | old         |
      | new         |


  Scenario Outline: Sharer uploads a file with checksum and as a sharee overwrites the shared file with new data and correct checksum
    Given using <dav_version> DAV path
    And user "Alice" has created a new TUS resource on the WebDAV API with these headers:
      | Upload-Length   | 16                        |
      #    dGV4dEZpbGUudHh0 is the base64 encode of textFile.txt
      | Upload-Metadata | filename dGV4dEZpbGUudHh0 |
    And user "Alice" has uploaded file with checksum "SHA1 c1dab0c0864b6ac9bdd3743a1408d679f1acd823" to the last created TUS Location with offset "0" and content "original content" using the TUS protocol on the WebDAV API
    And user "Alice" has shared file "/textFile.txt" with user "Brian"
    And user "Brian" has accepted share "/textFile.txt" offered by user "Alice"
    When user "Brian" overwrites recently shared file with offset "0" and data "overwritten content" with checksum "SHA1 fe990d2686a0fc86004efc31f5bf2475a45d4905" using the TUS protocol on the WebDAV API with these headers:
      | Upload-Length   | 19                                    |
        #    dGV4dEZpbGUudHh0 is the base64 encode of /Shares/textFile.txt
      | Upload-Metadata | filename L1NoYXJlcy90ZXh0RmlsZS50eHQ= |
    Then the HTTP status code should be "204"
    And the content of file "/textFile.txt" for user "Alice" should be "overwritten content"
    Examples:
      | dav_version |
      | old         |
      | new         |


  Scenario Outline: Sharer uploads a file with checksum and as a sharee overwrites the shared file with new data and invalid checksum
    Given using <dav_version> DAV path
    And user "Alice" has created a new TUS resource on the WebDAV API with these headers:
      | Upload-Length   | 16                        |
      #    dGV4dEZpbGUudHh0 is the base64 encode of textFile.txt
      | Upload-Metadata | filename dGV4dEZpbGUudHh0 |
    And user "Alice" has uploaded file with checksum "SHA1 c1dab0c0864b6ac9bdd3743a1408d679f1acd823" to the last created TUS Location with offset "0" and content "original content" using the TUS protocol on the WebDAV API
    And user "Alice" has shared file "/textFile.txt" with user "Brian"
    And user "Brian" has accepted share "/textFile.txt" offered by user "Alice"
    When user "Brian" overwrites recently shared file with offset "0" and data "overwritten content" with checksum "SHA1 fe990d2686a0fc86004efc31f5bf2475a45d4906" using the TUS protocol on the WebDAV API with these headers:
      | Upload-Length   | 19                                    |
      #    dGV4dEZpbGUudHh0 is the base64 encode of /Shares/textFile.txt
      | Upload-Metadata | filename L1NoYXJlcy90ZXh0RmlsZS50eHQ= |
    Then the HTTP status code should be "406"
    And the content of file "/textFile.txt" for user "Alice" should be "original content"
    Examples:
      | dav_version |
      | old         |
      | new         |
