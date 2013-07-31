RELEASE NOTES
-------------

### next version
* #106 - problem with urlencoded paths for TEMP_URL feature
* #111 - slowness in listing swift containers
* OMG ADDED HEAT (Orchestration) SUPPORT! (Thanks, Stephen!)
* OMG ADDED Cloud Monitoring support! (Thanks, Jamie!)

### 05/23/2013 Version 1.5.7
* #102 - Etag support on create
* #104 - function signature mismatch
* #105 - CDN object not associated with container

### 05/10/2013 Version 1.5.6
* Support for DNS\Domain::CloneDomain() feature

### 05/07/2013 Version 1.5.5
* PSR-2 implementation (code formatting)
* issue #95 - attempt to fix default timezone to satisfy folks

### 04/30/2013 Version 1.5.4
* Issue #38 - added support for Cloud Files TEMP_URL feature
* Revised structure around namespaces
* new entrypoint: php-opencloud.php (rackspace.php and openstack.php are still
  available for backwards compatibility)
* Fixed issue #94
* Added scripts/ver++.sh to increment version patch number

### 02/21/2013 Version 1.4
* Added __DIR__ to all internal `require()` calls. [Issue #40]
* Added support for Rackspace Cloud DNS (see the quick reference in docs/
  for the details)
* Other bug fixes that I can't remember, but which are really good. Really.

### 02/10/2013 Version 1.3
* **IMPORTANT**: The file extension for include files is not `.php` (instead of
  `.inc`). This came at the request of numerous individuals. However, it means
  that all of your scripts that use **php-opencloud** must be edited.
* `DataObject::Create()` now uses `content_type`; using the older
  `type` parameter is deprecated and will cause an UnknownParameterError
  exception.
* New global constant `RAXSDK_CACERTPEM`; if defined, this should be a path
  to a `cacert.pem` file that defines the root certificate servers. Defining
  this provides an extra degree of security in the HTTP transfer operations.
* Fixed a bug (issue #25) wherein the entire DataObject was retrieved in the
  constructor. This was incorrect; the constructor now does a `HEAD` request,
  and you need to use the `SaveToFilename()` or `SaveToString()` methods to
  actually fetch the data from Swift/Cloud Files. **If your code relies upon
  the previous behavior, this might cause it to break.**
* Support for Rackspace Cloud Load Balancers
* Fix to remove requirement for Tenant ID in authentication
* Added `ExportCredentials()` and `ImportCredentials()` methods to the
  `OpenStack` class to permit caching of tokens.

### 11/06/2012 Version 1.2
* Adds full support for OpenStack Cinder/Rackspace Cloud Block Storage
* Bug fixes
* Refactoring to reduce code size

### 10/25/2012 Version 1.1
* Fix for security issue #6
* Includes Quick Reference material on Cinder/Cloud Block Storage, but
  no additional docs yet (they're in progress)

### 10/12/2012 Version 1.0 final
* More refactoring to reduce the amount of duplicated code
* Fix for issue #3
* Added support for Cloud Block Storage (Nova Volumes) and
  Cloud Load Balancers, but this is only prelinary and has
  no docs yet.

### 10/05/2012 Version 1.0 RC3
* Some refactoring in classes that extend NovaInstance
* Fixed bug where servers without networks did not receive default networks
  https://github.com/rackspace/php-opencloud/issues/2

### 09/28/2012 Version 1.0 (Build 39)
Supported products:
* OpenStack Swift (Rackspace Cloud Files)
* OpenStack Nova (Rackspace Next Gen Cloud Servers)
* Rackspace Cloud Networks
* Rackspace Cloud Databases
