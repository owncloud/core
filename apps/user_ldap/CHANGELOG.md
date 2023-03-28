# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/en/1.0.0/)

## [0.17.0] - 2022-02.24

### Changed

- [#762](https://github.com/owncloud/user_ldap/pull/762) - Include a notice for the recursive group membership algorithm
- [#748](https://github.com/owncloud/user_ldap/pull/748) - [full-ci] Expose group's displayname 
- [#734](https://github.com/owncloud/user_ldap/pull/734) - Rise default network timeout to 15 secs
- [#675](https://github.com/owncloud/user_ldap/pull/675) - [full-ci] Do not check for the username if if has been processed already

### Fixed

- [#771](https://github.com/owncloud/user_ldap/pull/771) - fix: fix config file for new transifex client
- [#770](https://github.com/owncloud/user_ldap/pull/770) - Don't trim binary attribute values as this might corrupt the value if it starts with a non-printable ASCII byte.


## [0.16.1] - 2022-11-07

### Changed

- [#678](https://github.com/owncloud/user_ldap/pull/678) - Change color of warning sign for expert settings 
- [#711](https://github.com/owncloud/user_ldap/pull/711) - Decode binary GUID where we normally expected string (eDirectory)
- [#760](https://github.com/owncloud/user_ldap/pull/760) - Binary converter

## [0.16.0] - 2021-11-25

### Changed
- Fix user group selection layout [#672](https://github.com/owncloud/user_ldap/pull/672)
- Add a command to invalidate the LDAP cache [#670](https://github.com/owncloud/user_ldap/pull/670)
- Adjust command description [#671](https://github.com/owncloud/user_ldap/pull/671)
- Drop PHP 7.2 in sonar-project.properties [#680](https://github.com/owncloud/user_ldap/pull/680)
- When checking memberof, apply the group filter after getting all groups [#683](https://github.com/owncloud/user_ldap/pull/683)
- Include "memberOf"-based algorithms to find users within groups [#697](https://github.com/owncloud/user_ldap/pull/697)

## [0.15.4] - 2021-07-13

### Fixed
- user_ldap 0.15.3 double quote in passwords does not work [#662](https://github.com/owncloud/user_ldap/issues/662)
- Fix display errors in combination with other apps [#660](https://github.com/owncloud/user_ldap/issues/660)
- [QA] Frontend breaks with other auser auth apps [#659](https://github.com/owncloud/user_ldap/issues/659)
- [QA] tab break into new line hides content [#656](https://github.com/owncloud/user_ldap/issues/656)
- [QA] Login Attributes: LDAP Filter misagligned output [#653](https://github.com/owncloud/user_ldap/issues/653)

## [0.15.3] - 2021-06-14

### Fixed
- Fix display errors in combination with other apps [#660](https://github.com/owncloud/user_ldap/issues/660)
- Fixed read LDAP attribute value 0 returned as null [#599](https://github.com/owncloud/user_ldap/issues/599)
- Security: filter special characters from password field [#636](https://github.com/owncloud/user_ldap/issues/636)
- LDAP multiple base dns break pagination [#307](https://github.com/owncloud/user_ldap/issues/307)

### Changed
- Add warning for disabling email login regarding strict login check [#581](https://github.com/owncloud/user_ldap/issues/581) (Requires 10.5.0)
- Facelift [#597](https://github.com/owncloud/user_ldap/issues/597)
- Bump libraries



## [0.15.2] - 2020-06-16

### Fixed
- Reissue search in case of missing cookie in continued paged search - [#551](https://github.com/owncloud/user_ldap/issues/551)

### Changed
- Bump libraries

## [0.15.1] - 2020-03-09

### Fixed

- Allow plus in LDAP usernames - [#490](https://github.com/owncloud/user_ldap/issues/490)
- Easier tls - [#512](https://github.com/owncloud/user_ldap/issues/512)

## [0.15.0] - 2019-12-20

### Fixed

- Don't delete / disable Users if they change their DN - [#470](https://github.com/owncloud/user_ldap/issues/470)

### Changed

- Drop PHP 7.0 - [#474](https://github.com/owncloud/user_ldap/issues/474)
- Requires ownCloud min-version 10.4

## [0.14.0] - 2019-11-11

### Added

- Add network timeout setting - [#324](https://github.com/owncloud/user_ldap/issues/324)
- Log bind errors [#436](https://github.com/owncloud/user_ldap/pull/436)
- Reuse existing LDAP accounts if available [#165](https://github.com/owncloud/user_ldap/pull/165)

### Changed

- Allow avatars to be changed by users if not provided by LDAP - [#188](https://github.com/owncloud/user_ldap/issues/188)
- Remove PHP 5.6 support - [#388](https://github.com/owncloud/user_ldap/issues/388)
- Clean up Application initialization code - [#396](https://github.com/owncloud/user_ldap/issues/396)
- Remove unused use statements - [#399](https://github.com/owncloud/user_ldap/issues/399) [#400](https://github.com/owncloud/user_ldap/issues/400)
- Simplify connection: Get rid of init method [#437](https://github.com/owncloud/user_ldap/pull/437)
- Replace magic numbers with constants [#435](https://github.com/owncloud/user_ldap/pull/435)

### Fixed

- Only return users valid for ownCloud when getting LDAP group members - [#12](https://github.com/owncloud/user_ldap/issues/12)
- Fix paging when limit is used - [#315](https://github.com/owncloud/user_ldap/issues/315)
- Extract housekeeping part from new LDAP wizard - [#396](https://github.com/owncloud/user_ldap/pull/396)
- loginName2UserName is already called for an object, not a class - [#398](https://github.com/owncloud/user_ldap/pull/398)
- Remove unused use statements - [#400](https://github.com/owncloud/user_ldap/pull/400) - [#399](https://github.com/owncloud/user_ldap/pull/399)
- Include port only if there is port [#425](https://github.com/owncloud/user_ldap/pull/425)
- Remove no longer existing job from appinfo [#430](https://github.com/owncloud/user_ldap/pull/430)


## [0.13.0] - 2018-12-11

### Changed

- Set max version to 10 because core is switching to Semver - [#319](https://github.com/owncloud/user_ldap/issues/319)
- Update Screenshot - [#306](https://github.com/owncloud/user_ldap/issues/306)

### Fixed

- Remove legacy table and resolve dn encoding issues - [#248](https://github.com/owncloud/user_ldap/issues/248)
- Suppress "invalid quota" message if quota isn't set for the user - [#237](https://github.com/owncloud/user_ldap/issues/237)


## [0.12.0] - 2018-11-05

### Added

- Store "samaccountname" in user preferences table - [#254](https://github.com/owncloud/user_ldap/issues/254)
- PHP 7.2 support - [#280](https://github.com/owncloud/user_ldap/issues/280)

### Fixed

- Display name and email will not be editable from the profile page - [#218](https://github.com/owncloud/user_ldap/issues/218)
- Do not throw exception when user not found on LDAP during login - [#269](https://github.com/owncloud/user_ldap/issues/269)
- Users with no avatar in LDAP are now able to add avatar again, like in ownCloud 9.1 - [#256](https://github.com/owncloud/user_ldap/pull/256)
- Replaced deprecated config API calls - [#258](https://github.com/owncloud/user_ldap/pull/258)

### Removed

- Removed obsolete comment reference to ldapUserCleanupInterval - [#213](https://github.com/owncloud/user_ldap/issues/213)

## [0.11.0] - 2018-04-19

### Added

- Ability to output ldap configurations (`ldap:show-config`) as json [#185](https://github.com/owncloud/user_ldap/pull/185)

### Changed

- Frontend routes converted to proper Controllers [#199](https://github.com/owncloud/user_ldap/pull/199)
- Fully leverage core account synchronisation [#156](https://github.com/owncloud/user_ldap/pull/156)
- Improved error log messages [#194](https://github.com/owncloud/user_ldap/pull/194)

### Fixed

- Error with encrypted storage when a unsynchronized user logs in for the first time [#178](https://github.com/owncloud/user_ldap/pull/178)
- Properly use filters when synchronizing mapped users by dn [#168](https://github.com/owncloud/user_ldap/pull/168)
- Fallback to ownClouds default quota, if the provided quota by ldap can not be parsed correctly [#153](https://github.com/owncloud/user_ldap/issues/153)

## [0.10.0] - 2017-12-20

### Fixed

- Rework LDAP app to match account table logic [#125](https://github.com/owncloud/user_ldap/issues/125)
- Use custom uuid attribute if configured - [#158](https://github.com/owncloud/user_ldap/issues/158)
- Sync displayname on login - [#157](https://github.com/owncloud/user_ldap/issues/157)
- Fix working with LDAP replica server - [#138](https://github.com/owncloud/user_ldap/issues/138)
- Allow specifying the prefix for occ ldap:create-empty-config - [#7](https://github.com/owncloud/user_ldap/issues/7)
- Remove fix for ldap installation - [#132](https://github.com/owncloud/user_ldap/issues/132)
- Make the time between needsRefresh configurable - [#120](https://github.com/owncloud/user_ldap/issues/120)
- Keep the current quota if no suitable quota is found - [#123](https://github.com/owncloud/user_ldap/issues/123)
- Only use IndexIgnore if mod_autoindex.c is enabled/loaded - [#112](https://github.com/owncloud/user_ldap/issues/112)
- Remove unneeded account updates during sync - [#109](https://github.com/owncloud/user_ldap/issues/109)
- Fix possible race condition - [#8](https://github.com/owncloud/user_ldap/issues/8)
- Remove automatic enable of a configuration - [#10](https://github.com/owncloud/user_ldap/issues/10)
- Add missing spaces to log message - [#110](https://github.com/owncloud/user_ldap/issues/110)
- Add hint for max search term length - [#105](https://github.com/owncloud/user_ldap/issues/105)
- Allow proxy to check next server - [#101](https://github.com/owncloud/user_ldap/issues/101)


[Unreleased]: https://github.com/owncloud/user_ldap/compare/v0.17.0...master
[0.17.0]: https://github.com/owncloud/user_ldap/compare/v0.16.1...v0.17.0
[0.16.1]: https://github.com/owncloud/user_ldap/compare/v0.16.0...v0.16.1
[0.16.0]: https://github.com/owncloud/user_ldap/compare/v0.15.4...v0.16.0
[0.15.4]: https://github.com/owncloud/user_ldap/compare/v0.15.3...v0.15.4
[0.15.3]: https://github.com/owncloud/user_ldap/compare/v0.15.2...v0.15.3
[0.15.2]: https://github.com/owncloud/user_ldap/compare/v0.15.1...v0.15.2
[0.15.1]: https://github.com/owncloud/user_ldap/compare/v0.15.0...v0.15.1
[0.15.0]: https://github.com/owncloud/user_ldap/compare/v0.14.0...v0.15.0
[0.14.0]: https://github.com/owncloud/user_ldap/compare/v0.13.0...v0.14.0
[0.13.0]: https://github.com/owncloud/user_ldap/compare/v0.12.0...v0.13.0
[0.12.0]: https://github.com/owncloud/user_ldap/compare/v0.11.0...v0.12.0
[0.11.0]: https://github.com/owncloud/user_ldap/compare/v0.10.0...v0.11.0
[0.10.0]: https://github.com/owncloud/user_ldap/compare/0.9.1...v0.10.0
