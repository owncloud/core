## 1.9.0 (5/14/2020)

* [feat] Add quotaProject param for extensible client options support (#277)
* [feat] Add signingKeyId param for jwt signing (#270)
* [docs] Misc documentation improvements (#268, #278, #273)
* [chore] Switch from Travis to Github Actions (#273)

## 1.8.0 (3/26/2020)

* [feat] Add option to throw exception in AccessToken::verify(). (#265)
* [feat] Add support for x-goog-user-project. (#254)
* [feat] Add option to specify issuer in AccessToken::verify(). (#267)
* [feat] Add getProjectId to credentials types where project IDs can be determined. (#230)

## 1.7.1 (02/12/2020)

* [fix] Invalid character in iap cert cache key (#263)
* [fix] Typo in exception for package name (#262)

## 1.7.0 (02/11/2020)

* [feat] Add ID token to auth token methods. (#248)
* [feat] Add support for ES256 in `AccessToken::verify`. (#255)
* [fix] Let namespace match the file structure. (#258)
* [fix] Construct RuntimeException. (#257)
* [tests] Update tests for PHP 7.4 compatibility. (#253)
* [chore] Add a couple more things to `.gitattributes`. (#252)

## 1.6.1 (10/29/2019)

* [fix] Handle DST correctly for cache item expirations. (#246)

## 1.6.0 (10/01/2019)

* [feat] Add utility for verifying and revoking access tokens. (#243)
* [docs] Fix README console terminology. (#242)
* [feat] Support custom scopes with GCECredentials. (#239)
* [fix] Fix phpseclib existence check. (#237)

## 1.5.2 (07/22/2019)

* [fix] Move loadItems call out of `SysVCacheItemPool` constructor. (#229)
* [fix] Add `Metadata-Flavor` header to initial GCE metadata call. (#232)

## 1.5.1 (04/16/2019)

* [fix] Moved `getClientName()` from `Google\Auth\FetchAuthTokenInterface`
  to `Google\Auth\SignBlobInterface`, and removed `getClientName()` from
  `InsecureCredentials` and `UserRefreshCredentials`. (#223)

## 1.5.0 (04/15/2019)

### Changes

 * Add support for signing strings with a Credentials instance. (#221)
 * [Docs] Describe the arrays returned by fetchAuthToken. (#216)
 * [Testing] Fix failing tests (#217)
 * Update GitHub issue templates (#214, #213)

## 1.4.0 (09/17/2018)

### Changes

 * Add support for insecure credentials (#208)

## 1.3.3 (08/27/2018)

### Changes

 * Add retry and increase timeout for GCE credentials (#195)
 * [Docs] Fix spelling (#204)
 * Update token url (#206)

## 1.3.2 (07/23/2018)

### Changes

 * Only emits a warning for gcloud credentials (#202)

## 1.3.1 (07/19/2018)

### Changes

 * Added a warning for 3 legged OAuth credentials (#199)
 * [Code cleanup] Removed useless else after return (#193)

## 1.3.0 (06/04/2018)

### Changes

 * Fixes usage of deprecated env var for GAE Flex (#189)
 * fix - guzzlehttp/psr7 dependency version definition (#190)
 * Added SystemV shared memory based CacheItemPool (#191)

## 1.2.1 (24/01/2018)

### Changes

 * Fixes array merging bug in Guzzle5HttpHandler (#186)
 * Fixes constructor argument bug in Subscriber & Middleware (#184)

## 1.2.0 (6/12/2017)

### Changes

 * Adds async method to HTTP handlers (#176)
 * Misc bug fixes and improvements (#177, #175, #178)

## 1.1.0 (10/10/2017)

### Changes

 * Supports additional claims in JWT tokens (#171)
 * Adds makeHttpClient for creating authorized Guzzle clients (#162)
 * Misc bug fixes/improvements (#168, #161, #167, #170, #143)

## 1.0.1 (31/07/2017)

### Changes

* Adds support for Firebase 5.0 (#159)

## 1.0.0 (12/06/2017)

### Changes

* Adds hashing and shortening to enforce max key length ([@bshaffer])
* Fix for better PSR-6 compliance - verifies a hit before getting the cache item ([@bshaffer])
* README fixes ([@bshaffer])
* Change authorization header key to lowercase ([@stanley-cheung])

## 0.4.0 (23/04/2015)

### Changes

* Export callback function to update auth metadata ([@stanley-cheung][])
* Adds an implementation of User Refresh Token auth ([@stanley-cheung][])

[@bshaffer]: https://github.com/bshaffer
[@stanley-cheung]: https://github.com/stanley-cheung
