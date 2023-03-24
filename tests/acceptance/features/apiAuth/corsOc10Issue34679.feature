@api
Feature: CORS headers current oC10 behavior for issue-34679

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files

  @issue-34679
  Scenario Outline: CORS headers should be returned when invalid password is used
    Given using OCS API version "<ocs_api_version>"
    And user "Alice" has added "https://aphno.badal" to the list of personal CORS domains
    When user "Alice" sends HTTP method "GET" to OCS API endpoint "<endpoint>" with headers using password "invalid"
      | header | value               |
      | Origin | https://aphno.badal |
    Then the OCS status code should be "<ocs-code>"
    And the HTTP status code should be "<http-code>"
    And the following headers should not be set
      | header                        |
      | Access-Control-Allow-Headers  |
      | Access-Control-Expose-Headers |
      | Access-Control-Allow-Origin   |
      | Access-Control-Allow-Methods  |
    #Then the following headers should be set
    #  | header                        | value                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 |
    #  | Access-Control-Allow-Headers  | OC-Checksum,OC-Total-Length,OCS-APIREQUEST,X-OC-Mtime,Accept,Authorization,Brief,Content-Length,Content-Range,Content-Type,Date,Depth,Destination,Host,If,If-Match,If-Modified-Since,If-None-Match,If-Range,If-Unmodified-Since,Location,Lock-Token,Overwrite,Prefer,Range,Schedule-Reply,Timeout,User-Agent,X-Expected-Entity-Length,Accept-Language,Access-Control-Request-Method,Access-Control-Allow-Origin,ETag,OC-Autorename,OC-CalDav-Import,OC-Chunked,OC-Etag,OC-FileId,OC-LazyOps,OC-Total-File-Length,Origin,X-Request-ID,X-Requested-With |
    #  | Access-Control-Expose-Headers | Content-Location,DAV,ETag,Link,Lock-Token,OC-ETag,OC-Checksum,OC-FileId,OC-JobStatus-Location,Vary,Webdav-Location,X-Sabre-Status |
    #  | Access-Control-Allow-Origin   | https://aphno.badal |
    #  | Access-Control-Allow-Methods  | GET,OPTIONS,POST,PUT,DELETE,MKCOL,PROPFIND,PATCH,PROPPATCH,REPORT |
    Examples:
      | ocs_api_version | endpoint                                         | ocs-code | http-code |
      | 1               | /privatedata/getattribute                        | 997      | 401       |
      | 2               | /privatedata/getattribute                        | 997      | 401       |
      | 1               | /cloud/apps                                      | 997      | 401       |
      | 2               | /cloud/apps                                      | 997      | 401       |
      | 1               | /cloud/groups                                    | 997      | 401       |
      | 2               | /cloud/groups                                    | 997      | 401       |
      | 1               | /cloud/users                                     | 997      | 401       |
      | 2               | /cloud/users                                     | 997      | 401       |

    @files_external-app-required
    Examples:
      | ocs_api_version | endpoint                                         | ocs-code | http-code |
      | 1               | /apps/files_external/api/v1/mounts               | 997      | 401       |
      | 2               | /apps/files_external/api/v1/mounts               | 997      | 401       |

    @files_sharing-app-required
    Examples:
      | ocs_api_version | endpoint                                         | ocs-code | http-code |
      | 1               | /apps/files_sharing/api/v1/remote_shares         | 997      | 401       |
      | 2               | /apps/files_sharing/api/v1/remote_shares         | 997      | 401       |
      | 1               | /apps/files_sharing/api/v1/remote_shares/pending | 997      | 401       |
      | 2               | /apps/files_sharing/api/v1/remote_shares/pending | 997      | 401       |
      | 1               | /apps/files_sharing/api/v1/shares                | 997      | 401       |
      | 2               | /apps/files_sharing/api/v1/shares                | 997      | 401       |

  @issue-34679
  Scenario Outline: CORS headers should be returned when invalid password is used (admin only endpoints)
    Given using OCS API version "<ocs_api_version>"
    And the administrator has added "https://aphno.badal" to the list of personal CORS domains
    And user "another-admin" has been created with default attributes and without skeleton files
    And user "another-admin" has been added to group "admin"
    When user "another-admin" sends HTTP method "GET" to OCS API endpoint "<endpoint>" with headers using password "invalid"
      | header | value               |
      | Origin | https://aphno.badal |
    Then the OCS status code should be "<ocs-code>"
    And the HTTP status code should be "<http-code>"
    And the following headers should not be set
      | header                        |
      | Access-Control-Allow-Headers  |
      | Access-Control-Expose-Headers |
      | Access-Control-Allow-Origin   |
      | Access-Control-Allow-Methods  |
    #Then the following headers should be set
    #  | header                        | value                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 |
    #  | Access-Control-Allow-Headers  | OC-Checksum,OC-Total-Length,OCS-APIREQUEST,X-OC-Mtime,Accept,Authorization,Brief,Content-Length,Content-Range,Content-Type,Date,Depth,Destination,Host,If,If-Match,If-Modified-Since,If-None-Match,If-Range,If-Unmodified-Since,Location,Lock-Token,Overwrite,Prefer,Range,Schedule-Reply,Timeout,User-Agent,X-Expected-Entity-Length,Accept-Language,Access-Control-Request-Method,Access-Control-Allow-Origin,ETag,OC-Autorename,OC-CalDav-Import,OC-Chunked,OC-Etag,OC-FileId,OC-LazyOps,OC-Total-File-Length,Origin,X-Request-ID,X-Requested-With |
    #  | Access-Control-Expose-Headers | Content-Location,DAV,ETag,Link,Lock-Token,OC-ETag,OC-Checksum,OC-FileId,OC-JobStatus-Location,Vary,Webdav-Location,X-Sabre-Status |
    #  | Access-Control-Allow-Origin   | https://aphno.badal |
    #  | Access-Control-Allow-Methods  | GET,OPTIONS,POST,PUT,DELETE,MKCOL,PROPFIND,PATCH,PROPPATCH,REPORT |
    Examples:
      | ocs_api_version | endpoint      | ocs-code | http-code |
      | 1               | /cloud/apps   | 997      | 401       |
      | 2               | /cloud/apps   | 997      | 401       |
      | 1               | /cloud/groups | 997      | 401       |
      | 2               | /cloud/groups | 997      | 401       |
      | 1               | /cloud/users  | 997      | 401       |
      | 2               | /cloud/users  | 997      | 401       |
