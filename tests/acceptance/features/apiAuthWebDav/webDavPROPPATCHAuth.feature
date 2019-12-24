@api @TestAlsoOnExternalUserBackend
Feature: PROPPATCH file/folder

  Background:
    Given user "user0" has been created with default attributes and skeleton files
    And user "user1" has been created with default attributes and without skeleton files

  Scenario: send PROPPATCH requests to webDav endpoints as normal user with wrong password
    When user "user0" requests these endpoints with "PROPPATCH" including body using password "invalid" then the status codes should be as listed
      | endpoint                                      | http-code | body          |
      | /remote.php/webdav/textfile0.txt              | 401       | doesnotmatter |
      | /remote.php/dav/files/user0/textfile0.txt     | 401       | doesnotmatter |
      | /remote.php/webdav/PARENT                     | 401       | doesnotmatter |
      | /remote.php/dav/files/user0/PARENT            | 401       | doesnotmatter |
      | /remote.php/dav/files/user0/PARENT/parent.txt | 401       | doesnotmatter |

  Scenario: send PROPPATCH requests to webDav endpoints as normal user with no password
    When user "user0" requests these endpoints with "PROPPATCH" including body using password "" then the status codes should be as listed
      | endpoint                                      | http-code | body          |
      | /remote.php/webdav/textfile0.txt              | 401       | doesnotmatter |
      | /remote.php/dav/files/user0/textfile0.txt     | 401       | doesnotmatter |
      | /remote.php/webdav/PARENT                     | 401       | doesnotmatter |
      | /remote.php/dav/files/user0/PARENT            | 401       | doesnotmatter |
      | /remote.php/dav/files/user0/PARENT/parent.txt | 401       | doesnotmatter |

  Scenario: send PROPPATCH requests to another user's webDav endpoints as normal user
    When user "user1" requests these endpoints with "PROPPATCH" including body then the status codes should be as listed
      | endpoint                                      | http-code | body                                                                                                                                                                                                      |
      | /remote.php/dav/files/user0/textfile0.txt     | 404       | <?xml version="1.0"?><d:propertyupdate xmlns:d="DAV:" xmlns:oc="http://owncloud.org/ns"><d:set><d:prop><oc:favorite xmlns:oc="http://owncloud.org/ns">1</oc:favorite></d:prop></d:set></d:propertyupdate> |
      | /remote.php/dav/files/user0/PARENT            | 404       | <?xml version="1.0"?><d:propertyupdate xmlns:d="DAV:" xmlns:oc="http://owncloud.org/ns"><d:set><d:prop><oc:favorite xmlns:oc="http://owncloud.org/ns">1</oc:favorite></d:prop></d:set></d:propertyupdate> |
      | /remote.php/dav/files/user0/PARENT/parent.txt | 404       | <?xml version="1.0"?><d:propertyupdate xmlns:d="DAV:" xmlns:oc="http://owncloud.org/ns"><d:set><d:prop><oc:favorite xmlns:oc="http://owncloud.org/ns">1</oc:favorite></d:prop></d:set></d:propertyupdate> |

  Scenario: send PROPPATCH requests to webDav endpoints using invalid username but correct password
    When user "usero" requests these endpoints with "PROPPATCH" including body using the password of user "user0" then the status codes should be as listed
      | endpoint                                      | http-code | body          |
      | /remote.php/webdav/textfile0.txt              | 401       | doesnotmatter |
      | /remote.php/dav/files/user0/textfile0.txt     | 401       | doesnotmatter |
      | /remote.php/webdav/PARENT                     | 401       | doesnotmatter |
      | /remote.php/dav/files/user0/PARENT            | 401       | doesnotmatter |
      | /remote.php/dav/files/user0/PARENT/parent.txt | 401       | doesnotmatter |

  Scenario: send PROPPATCH requests to webDav endpoints using valid password and username of different user
    When user "user1" requests these endpoints with "PROPPATCH" including body using the password of user "user0" then the status codes should be as listed
      | endpoint                                      | http-code | body          |
      | /remote.php/webdav/textfile0.txt              | 401       | doesnotmatter |
      | /remote.php/dav/files/user0/textfile0.txt     | 401       | doesnotmatter |
      | /remote.php/webdav/PARENT                     | 401       | doesnotmatter |
      | /remote.php/dav/files/user0/PARENT            | 401       | doesnotmatter |
      | /remote.php/dav/files/user0/PARENT/parent.txt | 401       | doesnotmatter |

  Scenario: send PROPPATCH requests to webDav endpoints without any authentication
    When a user requests these endpoints with "PROPPATCH" and no authentication then the status codes should be as listed
      | endpoint                                      | http-code | body          |
      | /remote.php/webdav/textfile0.txt              | 401       | doesnotmatter |
      | /remote.php/dav/files/user0/textfile0.txt     | 401       | doesnotmatter |
      | /remote.php/webdav/PARENT                     | 401       | doesnotmatter |
      | /remote.php/dav/files/user0/PARENT            | 401       | doesnotmatter |
      | /remote.php/dav/files/user0/PARENT/parent.txt | 401       | doesnotmatter |

  Scenario: send PROPPATCH requests to webDav endpoints using token authentication should not work
    Given token auth has been enforced
    And a new browser session for "user0" has been started
    And the user has generated a new app password named "my-client"
    When the user requests these endpoints with "PROPPATCH" using the generated app password then the status codes should be as listed
      | endpoint                                      | http-code |
      | /remote.php/webdav/textfile0.txt              | 401       |
      | /remote.php/dav/files/user0/textfile0.txt     | 401       |
      | /remote.php/webdav/PARENT                     | 401       |
      | /remote.php/dav/files/user0/PARENT            | 401       |
      | /remote.php/dav/files/user0/PARENT/parent.txt | 401       |

  Scenario: send PROPPATCH requests to webDav endpoints using app password token as password
    Given token auth has been enforced
    And a new browser session for "user0" has been started
    And the user has generated a new app password named "my-client"
    When the user "user0" requests these endpoints with "PROPPATCH" using the basic auth and generated app password then the status codes should be as listed
      | endpoint                                      | http-code | body                                                                                                                                                                                                      |
      | /remote.php/webdav/textfile0.txt              | 207       | <?xml version="1.0"?><d:propertyupdate xmlns:d="DAV:" xmlns:oc="http://owncloud.org/ns"><d:set><d:prop><oc:favorite xmlns:oc="http://owncloud.org/ns">1</oc:favorite></d:prop></d:set></d:propertyupdate> |
      | /remote.php/dav/files/user0/textfile1.txt     | 207       | <?xml version="1.0"?><d:propertyupdate xmlns:d="DAV:" xmlns:oc="http://owncloud.org/ns"><d:set><d:prop><oc:favorite xmlns:oc="http://owncloud.org/ns">1</oc:favorite></d:prop></d:set></d:propertyupdate> |
      | /remote.php/dav/files/user0/PARENT/parent.txt | 207       | <?xml version="1.0"?><d:propertyupdate xmlns:d="DAV:" xmlns:oc="http://owncloud.org/ns"><d:set><d:prop><oc:favorite xmlns:oc="http://owncloud.org/ns">1</oc:favorite></d:prop></d:set></d:propertyupdate> |
      | /remote.php/webdav/PARENT                     | 207       | <?xml version="1.0"?><d:propertyupdate xmlns:d="DAV:" xmlns:oc="http://owncloud.org/ns"><d:set><d:prop><oc:favorite xmlns:oc="http://owncloud.org/ns">1</oc:favorite></d:prop></d:set></d:propertyupdate> |
      | /remote.php/dav/files/user0/FOLDER            | 207       | <?xml version="1.0"?><d:propertyupdate xmlns:d="DAV:" xmlns:oc="http://owncloud.org/ns"><d:set><d:prop><oc:favorite xmlns:oc="http://owncloud.org/ns">1</oc:favorite></d:prop></d:set></d:propertyupdate> |
