@api @TestAlsoOnExternalUserBackend
Feature: CORS headers
  Background:
    Given user "user0" has been created with default attributes
    And a new client token for "user0" has been generated

  Scenario Outline: CORS headers should be returned when setting CORS domain sending Origin header
    Given using OCS API version "<ocs_api_version>"
    And user "user0" has added "https://aphno.badal" to the list of personal CORS domains
    When user "user0" sends HTTP method "GET" to OCS API endpoint "<endpoint>" with headers
      | header | value |
      | Origin | https://aphno.badal |
    Then the OCS status code should be "<ocs-code>"
    And the HTTP status code should be "<http-code>"
    Then the following headers should be set
      | Access-Control-Allow-Headers  | OC-Checksum,OC-Total-Length,OCS-APIREQUEST,X-OC-Mtime,Accept,Authorization,Brief,Content-Length,Content-Range,Content-Type,Date,Depth,Destination,Host,If,If-Match,If-Modified-Since,If-None-Match,If-Range,If-Unmodified-Since,Location,Lock-Token,Overwrite,Prefer,Range,Schedule-Reply,Timeout,User-Agent,X-Expected-Entity-Length,Accept-Language,Access-Control-Request-Method,Access-Control-Allow-Origin,ETag,OC-Autorename,OC-CalDav-Import,OC-Chunked,OC-Etag,OC-FileId,OC-LazyOps,OC-Total-File-Length,Origin,X-Request-ID,X-Requested-With |
      | Access-Control-Expose-Headers | Content-Location,DAV,ETag,Link,Lock-Token,OC-ETag,OC-Checksum,OC-FileId,OC-JobStatus-Location,Vary,Webdav-Location,X-Sabre-Status |
      | Access-Control-Allow-Origin   | https://aphno.badal |
      | Access-Control-Allow-Methods  | GET,OPTIONS,POST,PUT,DELETE,MKCOL,PROPFIND,PATCH,PROPPATCH,REPORT |
    Examples:
      | ocs_api_version |endpoint                                         | ocs-code | http-code |
      | 1               |/apps/files_external/api/v1/mounts               | 100      | 200       |
      | 2               |/apps/files_external/api/v1/mounts               | 200      | 200       |
      | 1               |/apps/files_sharing/api/v1/remote_shares         | 100      | 200       |
      | 2               |/apps/files_sharing/api/v1/remote_shares         | 200      | 200       |
      | 1               |/apps/files_sharing/api/v1/remote_shares/pending | 100      | 200       |
      | 2               |/apps/files_sharing/api/v1/remote_shares/pending | 200      | 200       |
      | 1               |/apps/files_sharing/api/v1/shares                | 100      | 200       |
      | 2               |/apps/files_sharing/api/v1/shares                | 200      | 200       |
      | 1               |/privatedata/getattribute                        | 100      | 200       |
      | 2               |/privatedata/getattribute                        | 200      | 200       |
      | 1               |/cloud/apps                                      | 997      | 401       |
      | 2               |/cloud/apps                                      | 997      | 401       |
      | 1               |/cloud/groups                                    | 997      | 401       |
      | 2               |/cloud/groups                                    | 997      | 401       |
      | 1               |/cloud/users                                     | 997      | 401       |
      | 2               |/cloud/users                                     | 997      | 401       |

  #merge into previous scenario when fixed
  @issue-34664
  Scenario Outline: CORS headers should be returned when setting CORS domain sending Origin header
    Given using OCS API version "<ocs_api_version>"
    And user "user0" has added "https://aphno.badal" to the list of personal CORS domains
    When user "user0" sends HTTP method "GET" to OCS API endpoint "<endpoint>" with headers
      | header | value |
      | Origin | https://aphno.badal |
    Then the OCS status code should be "<ocs-code>"
    And the HTTP status code should be "<http-code>"
    Then the following headers should not be set
      | Access-Control-Allow-Headers  |
      | Access-Control-Expose-Headers |
      | Access-Control-Allow-Origin   |
      | Access-Control-Allow-Methods  |
    Examples:
      | ocs_api_version |endpoint                                         | ocs-code | http-code |
      | 1               |/config                                          | 100      | 200       |
      | 2               |/config                                          | 200      | 200       |

  Scenario Outline: CORS headers should be returned when setting CORS domain sending Origin header (admin only endpoints)
    Given using OCS API version "<ocs_api_version>"
    And the administrator has added "https://aphno.badal" to the list of personal CORS domains
    When the administrator sends HTTP method "GET" to OCS API endpoint "<endpoint>" with headers
      | header | value               |
      | Origin | https://aphno.badal |
    Then the OCS status code should be "<ocs-code>"
    And the HTTP status code should be "<http-code>"
    Then the following headers should be set
      | Access-Control-Allow-Headers  | OC-Checksum,OC-Total-Length,OCS-APIREQUEST,X-OC-Mtime,Accept,Authorization,Brief,Content-Length,Content-Range,Content-Type,Date,Depth,Destination,Host,If,If-Match,If-Modified-Since,If-None-Match,If-Range,If-Unmodified-Since,Location,Lock-Token,Overwrite,Prefer,Range,Schedule-Reply,Timeout,User-Agent,X-Expected-Entity-Length,Accept-Language,Access-Control-Request-Method,Access-Control-Allow-Origin,ETag,OC-Autorename,OC-CalDav-Import,OC-Chunked,OC-Etag,OC-FileId,OC-LazyOps,OC-Total-File-Length,Origin,X-Request-ID,X-Requested-With |
      | Access-Control-Expose-Headers | Content-Location,DAV,ETag,Link,Lock-Token,OC-ETag,OC-Checksum,OC-FileId,OC-JobStatus-Location,Vary,Webdav-Location,X-Sabre-Status |
      | Access-Control-Allow-Origin   | https://aphno.badal |
      | Access-Control-Allow-Methods  | GET,OPTIONS,POST,PUT,DELETE,MKCOL,PROPFIND,PATCH,PROPPATCH,REPORT |
    Examples:
      | ocs_api_version |endpoint      | ocs-code | http-code |
      | 1               |/cloud/apps   | 100      | 200       |
      | 2               |/cloud/apps   | 200      | 200       |
      | 1               |/cloud/groups | 100      | 200       |
      | 2               |/cloud/groups | 200      | 200       |
      | 1               |/cloud/users  | 100      | 200       |
      | 2               |/cloud/users  | 200      | 200       |

  Scenario Outline: no CORS headers should be returned when CORS domain does not match Origin header
    Given using OCS API version "<ocs_api_version>"
    And user "user0" has added "https://mero.badal" to the list of personal CORS domains
    When user "user0" sends HTTP method "GET" to OCS API endpoint "<endpoint>" with headers
      | header | value               |
      | Origin | https://aphno.badal |
    Then the OCS status code should be "<ocs-code>"
    And the HTTP status code should be "<http-code>"
    Then the following headers should not be set
      | Access-Control-Allow-Headers  |
      | Access-Control-Expose-Headers |
      | Access-Control-Allow-Origin   |
      | Access-Control-Allow-Methods  |
    Examples:
      | ocs_api_version |endpoint                                         | ocs-code | http-code |
      | 1               |/apps/files_external/api/v1/mounts               | 100      | 200       |
      | 2               |/apps/files_external/api/v1/mounts               | 200      | 200       |
      | 1               |/apps/files_sharing/api/v1/remote_shares         | 100      | 200       |
      | 2               |/apps/files_sharing/api/v1/remote_shares         | 200      | 200       |
      | 1               |/apps/files_sharing/api/v1/remote_shares/pending | 100      | 200       |
      | 2               |/apps/files_sharing/api/v1/remote_shares/pending | 200      | 200       |
      | 1               |/apps/files_sharing/api/v1/shares                | 100      | 200       |
      | 2               |/apps/files_sharing/api/v1/shares                | 200      | 200       |
      | 1               |/config                                          | 100      | 200       |
      | 2               |/config                                          | 200      | 200       |
      | 1               |/privatedata/getattribute                        | 100      | 200       |
      | 2               |/privatedata/getattribute                        | 200      | 200       |
      | 1               |/cloud/apps                                      | 997      | 401       |
      | 2               |/cloud/apps                                      | 997      | 401       |
      | 1               |/cloud/groups                                    | 997      | 401       |
      | 2               |/cloud/groups                                    | 997      | 401       |
      | 1               |/cloud/users                                     | 997      | 401       |
      | 2               |/cloud/users                                     | 997      | 401       |

  Scenario Outline: no CORS headers should be returned when CORS domain does not match Origin header (admin only endpoints)
    Given using OCS API version "<ocs_api_version>"
    And the administrator has added "https://mero.badal" to the list of personal CORS domains
    When the administrator sends HTTP method "GET" to OCS API endpoint "<endpoint>" with headers
      | header | value               |
      | Origin | https://aphno.badal |
    Then the OCS status code should be "<ocs-code>"
    And the HTTP status code should be "<http-code>"
    Then the following headers should not be set
      | Access-Control-Allow-Headers  |
      | Access-Control-Expose-Headers |
      | Access-Control-Allow-Origin   |
      | Access-Control-Allow-Methods  |
    Examples:
      | ocs_api_version |endpoint      | ocs-code | http-code |
      | 1               |/cloud/apps   | 100      | 200       |
      | 2               |/cloud/apps   | 200      | 200       |
      | 1               |/cloud/groups | 100      | 200       |
      | 2               |/cloud/groups | 200      | 200       |
      | 1               |/cloud/users  | 100      | 200       |
      | 2               |/cloud/users  | 200      | 200       |
