# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/en/1.0.0/).

## [Unreleased]
### Added
- It is now possible to upgrade from 8.2.11 directly to 10 - [#28655](https://github.com/owncloud/core/issues/28655) [#28673](https://github.com/owncloud/core/pull/28673)
- Added extra check in case of missing home storage - [#28504](https://github.com/owncloud/core/issues/28504)
- Added Shield and Workflow icons - [#28588](https://github.com/owncloud/core/issues/28588)
- Enable chunking for big files in web UI when logged in - [#28547](https://github.com/owncloud/core/issues/28547)
- Added emitting of hook "post_unshareFromSelf" to Share 2.0 - [#28413](https://github.com/owncloud/core/issues/28413)
- Added occ user:inactive command to list inactive users - [#28294](https://github.com/owncloud/core/issues/28294)
- Added internal setting for the periodic credentials validity check - [#28298](https://github.com/owncloud/core/issues/28298)
- Added jquery events for external storage settings UI when using OAuth - [#28210](https://github.com/owncloud/core/issues/28210)
- Added public IThemeService which allows apps like the template editor to interact with the current theme - [#28647](https://github.com/owncloud/core/issues/28647)

### Changed
- Transfer ownership now works with master key encryption - [#28537](https://github.com/owncloud/core/issues/28537)
- Reenable medial search by default - [#28064](https://github.com/owncloud/core/issues/28064)
- The LoginController now emits "failedLogin" hook signal after a failed login - [#28631](https://github.com/owncloud/core/issues/28631)
- All columns that use the fileid have been changed to bigint (64-bits) - [#28581](https://github.com/owncloud/core/issues/28581)
- Added search pattern for the occ app:list command - [#28653](https://github.com/owncloud/core/issues/28653)

### Deprecated
### Removed
- Removed "themes" folder - [#28617](https://github.com/owncloud/core/issues/28617)
- Removed unused Windows checks - [#28612](https://github.com/owncloud/core/issues/28612)
- Slash in filename when renaming is not allowed any more in the frontend (unintended "feature") - [#28490](https://github.com/owncloud/core/issues/28490)
- Using old chunking protocol on new DAV endpoint is now disallowed - [#28637](https://github.com/owncloud/core/issues/28637)

### Fixed
- Theme is now properly loaded when displaying full page error messages - [#28622](https://github.com/owncloud/core/pull/28622)
- Fix issue with folder sizes on 32-bit systems - [#28654](https://github.com/owncloud/core/issues/28654)
- Prevent certificate manager to access FS too early, fixes 8.2 to 10 migration issue - [#28668](https://github.com/owncloud/core/pull/28668)
- Return 404 instead of 500 when accessing a file that existed in filecache but not on disk - [#28618](https://github.com/owncloud/core/issues/28618)
- Added cache for new card uri-id mapping to fix db cluster execution - [#28308](https://github.com/owncloud/core/issues/28308)
- Detect PROPPATCH failure by parsing multistatus in Backbone Webdav adapter - [#28628](https://github.com/owncloud/core/issues/28628)
- Add check for empty result in storage memcache - [#28548](https://github.com/owncloud/core/issues/28548)
- Optimized upload - do not fetch metadata for part file during checksuming - [#28633](https://github.com/owncloud/core/issues/28633)
- Error messages from the server on upload are now displayed in the web UI instead of generic messages - [#28635](https://github.com/owncloud/core/issues/28635)
- Remove initial scanning overhead to speed up federated shares with lots of entries - [#28604](https://github.com/owncloud/core/issues/28604)
- Fix error message when accessing of non-existing file on external storage - [#28613](https://github.com/owncloud/core/issues/28613)
- Don't set email if invalid in user:add command - [#28577](https://github.com/owncloud/core/issues/28577)
- Proper message shown when accessing unreachable private links - [#28600](https://github.com/owncloud/core/issues/28600)
- Fix length of account search term column which broke installs on some DB setups - [#28576](https://github.com/owncloud/core/issues/28576)
- Fix column lengths on migrations table to fix index - [#28254](https://github.com/owncloud/core/issues/28254)
- Properly set the status text in OCS API v2 calls - [#28595](https://github.com/owncloud/core/issues/28595)
- Data was not properly set in case of OCS Result object - [#28198](https://github.com/owncloud/core/issues/28198)
- Only use IndexIgnore in htaccess if mod_autoindex.c is enabled/loaded - [#28591](https://github.com/owncloud/core/issues/28591)
- Better support of read only config file and apps folder - [#28594](https://github.com/owncloud/core/issues/28594) [#28601](https://github.com/owncloud/core/issues/28601)
- Optimize shares retrieval logic with complex scenarios - [#28524](https://github.com/owncloud/core/issues/28524)
- Keep redirect information when logging in with wrong password - [#28511](https://github.com/owncloud/core/issues/28511)
- Group admins can now properly edit members' email addresses - [#28366](https://github.com/owncloud/core/issues/28366)
- Fixed OAuth frontend logic when connecting to external storage - [#28496](https://github.com/owncloud/core/issues/28496) [#28400](https://github.com/owncloud/core/issues/28400)
- Fixed some repeated duplicate key errors relate to oc_preferences table - [#28486](https://github.com/owncloud/core/issues/28486)
- Allow user "0" as in comments - [#28422](https://github.com/owncloud/core/issues/28422)
- Fix null error in ActivityManager on some setups - [#28420](https://github.com/owncloud/core/issues/28420)
- Load app code before running app specific migrations - [#28391](https://github.com/owncloud/core/issues/28391)
- Add migration step to fix birthday calendars - [#28338](https://github.com/owncloud/core/issues/28338)
- Fix rare error that happens when mounting invalid shares - [#28342](https://github.com/owncloud/core/issues/28342)
- Fix app enable of not existing app - [#28317](https://github.com/owncloud/core/issues/28317)
- Fix quota handling on new Webdav endpoint (affects desktop client 2.2+) - [#28261](https://github.com/owncloud/core/issues/28261)
- Optimize query logger - [#28220](https://github.com/owncloud/core/issues/28220)
- Fix mounting Webdav as drive in Windows 10 - [#28243](https://github.com/owncloud/core/issues/28243)
- Improved search performance for federated instance users - [#28209](https://github.com/owncloud/core/issues/28209)
- Fix "notify user" checkbox in share panel - [#28237](https://github.com/owncloud/core/issues/28237)
- Make sure passed upload mtime is always an int - [#28186](https://github.com/owncloud/core/issues/28186)
- Prevent file cache inconsistencies when moving a subtree in or out of a share - [#28219](https://github.com/owncloud/core/issues/28219)
- Use SwiftMailer antiflood plugin to reconnect after multiple emails sent - [#28180](https://github.com/owncloud/core/issues/28180)
- Improve contact search performance - [#28042](https://github.com/owncloud/core/issues/28042)
- Make new text file tooltip messages update properly - [#28151](https://github.com/owncloud/core/issues/28151)
- Fix trashbin preview icons - [#28158](https://github.com/owncloud/core/issues/28158)
- Creating link shares now doesn't forget "Allow editing" permission any more - [#28065](https://github.com/owncloud/core/issues/28065)

## [10.0.2] - 2017-06-30

- [major] Fix issue with database.xml migration being triggered twice on market app install - [#27982](https://github.com/owncloud/core/issues/27982)
- [major] Apps formerly marked as shipped can now be uninstalled - [#27985](https://github.com/owncloud/core/issues/27985)
- [major] Market now properly updates app version when using multiple apps paths - [#28002](https://github.com/owncloud/core/issues/28002)

## [10.0.1] - 2017-06-23

- [major] Clear cached app info before installing app - [#27953](https://github.com/owncloud/core/issues/27953)
- [major] Fix to allow admin login when using home object store mode - [#27963](https://github.com/owncloud/core/issues/27963)
- [major] Skeleton files correct copied for shibboleth - [#27935](https://github.com/owncloud/core/issues/27935)
- [major] Automatically enable market app when upgrading from OC < 10 - [#27930](https://github.com/owncloud/core/issues/27930)
- [major] Fix issue where market would run app migrations twice in some scenarios - market/#76
- [major] Fetch search terms from user backend (ex: LDAP) for more extended user search ability - [#27906](https://github.com/owncloud/core/issues/27906)
- [major] Added support for upload-only link shares - [#27548](https://github.com/owncloud/core/issues/27548)
- [major] When enabling default encryption module the admin must now explicitly choose encryption type (master key vs user key) - [#27512](https://github.com/owncloud/core/issues/27512)
- [major] Fix missing "publicuri" field when upgrading from 9.1.5 - [#27754](https://github.com/owncloud/core/issues/27754)
- [major] Add options to the user:sync command to handle missing accounts - [#27798](https://github.com/owncloud/core/issues/27798)
- [major] Maintenance mode now properly blocks syncing on new DAV endpoint - [#27821](https://github.com/owncloud/core/issues/27821)
- [major] Copy button for multiple link share now copies the correct link - [#27863](https://github.com/owncloud/core/issues/27863)
- [major] Fix upload issues with IE11 - [#27875](https://github.com/owncloud/core/issues/27875)
- [major] Allow apps to register multiple settings panels - [#27885](https://github.com/owncloud/core/issues/27885)
- [major] Account table doesn't sync from user backends that have no listing support - [#27862](https://github.com/owncloud/core/issues/27862)
- [major] Add events for password validation - [#27883](https://github.com/owncloud/core/issues/27883)
- [major] Add JS event after external storage mount config is loaded, for UI extensions - [#27740](https://github.com/owncloud/core/issues/27740)
- [major] Fix theming of setup page by autoloading default_enable theme apps - [#27819](https://github.com/owncloud/core/issues/27819)
- [major] Allow apps to register custom settings page sections in info.xml - [#27634](https://github.com/owncloud/core/issues/27634)
- [major] Add admin sharing option to restrict autocomplete to membership groups but still allow typing full name if known - [#27869](https://github.com/owncloud/core/issues/27869)
- [minor] Market app update now doesn't overwrite local git checkouts - [#27973](https://github.com/owncloud/core/issues/27973)
- [minor] Delete "appstoreenabled" config value when enabling market - [#27956](https://github.com/owncloud/core/issues/27956)
- [minor] Do not verify email address when entered by an admin on their personal page - [#27921](https://github.com/owncloud/core/issues/27921)
- [minor] Fix default share permission issue in public API [#27927](https://github.com/owncloud/core/issues/27927)
- [minor] Properly rethrow exception when error occurred when enabling an app - [#27970](https://github.com/owncloud/core/issues/27970)
- [minor] Remove own shares from "Shared with you" section - [#27972](https://github.com/owncloud/core/issues/27972)
- [minor] Fix updating to daily from 10.0.0 with web updater - updater/#422
- [minor] Fix updating to 10.0.1 with web updater - [#27965](https://github.com/owncloud/core/issues/27965)
- [minor] Removed unused and non-working auto-login after setup - [#27971](https://github.com/owncloud/core/issues/27971)
- [minor] Fix SMB storage to return false if stat failed - [#27859](https://github.com/owncloud/core/issues/27859)
- [minor] Update swiftmailer - [#27897](https://github.com/owncloud/core/issues/27897)
- [minor] Escape filter in search - [#27900](https://github.com/owncloud/core/issues/27900)
- [minor] Fix file name output in error pages - [#27808](https://github.com/owncloud/core/issues/27808)
- [minor] Support for alternative login buttons through config.php - [#27607](https://github.com/owncloud/core/issues/27607)
- [minor] Example theme app renamed to "theme-example" by convention - [#27632](https://github.com/owncloud/core/issues/27632)
- [minor] Fix missing translation of built-in section names - [#27645](https://github.com/owncloud/core/issues/27645)
- [minor] Add ability to disable password reset form in config - [#27676](https://github.com/owncloud/core/issues/27676)
- [minor] Add support for themed radio buttons - [#27681](https://github.com/owncloud/core/issues/27681)
- [minor] Fix customjs extension handling for external storage apps - [#27683](https://github.com/owncloud/core/issues/27683)
- [minor] Fix upgrade error with mod_fcgid and PHP 7 - [#27553](https://github.com/owncloud/core/issues/27553)
- [minor] Remove sharing subtab when link sharing is disallowed - [#27708](https://github.com/owncloud/core/issues/27708)
- [minor] Add privacy warning in link shares panel - [#27844](https://github.com/owncloud/core/issues/27844)
- [minor] Fix files app name in navigation menu - [#27843](https://github.com/owncloud/core/issues/27843)
- [minor] Fix mimetype table code to ignore folder extensions - [#27668](https://github.com/owncloud/core/issues/27668)
- [minor] Automatically focus the password field in password reset page - [#27889](https://github.com/owncloud/core/issues/27889)
- [minor] Trashbin restore warnings due to missing entries now logged as debug - [#27826](https://github.com/owncloud/core/issues/27826)
- [minor] Remove obsolete repair step RemoveOldShares - [#27737](https://github.com/owncloud/core/issues/27737)
- [minor] "local link" was renamed to "private link" - [#27594](https://github.com/owncloud/core/issues/27594)
- [minor] Fix column sorting in public file list page - [#27308](https://github.com/owncloud/core/issues/27308)

## 10.0.0 - 2017-04-26

### Added
#### General

- Allows users to add the app to the Android homescreen: [#25438](https://github.com/owncloud/core/pull/25438)
- Compatible with PHP 7.1: [#25436](https://github.com/owncloud/core/pull/25346)
- MySQL 4-byte UTF8 support: (utf8mb4 for e.g. Emoticons) [#17978](https://github.com/owncloud/core/pull/17978)
- Admin, personal pages and app management are now merged together into a single "Settings" entry: [#26449](https://github.com/owncloud/core/pull/26449)
- Admin page displays the output of the server's status.php: [#27238](https://github.com/owncloud/core/pull/27238)
- Also allow using email address for password recovery: [#27168](https://github.com/owncloud/core/pull/27168)
- Ability to disable password reset: [#27440](https://github.com/owncloud/core/issues/27440)
- Support Redis Cluster: [#26407](https://github.com/owncloud/core/pull/26407)
- ownCloud log entry reorder: [#27562](https://github.com/owncloud/core/pull/27562)
- ownCloud log file rules to split into separate files: [#27443](https://github.com/owncloud/core/pull/27443)
- occ scanner optimized memory usage for large scans by using autocommits: [owncloud/core/27527](https://github.com/owncloud/core/pull/27527)
- Third party apps are not disabled anymore when upgrading

#### Filesystem

- Ability to exclude folders from being processed, like snapshot folders: [#19235](https://github.com/owncloud/core/pull/19235)
- Checksum is computed on the fly and verified (File integrity checking): [#26655](https://github.com/owncloud/core/issues/26655) / [Technical Documentation](https://github.com/owncloud/documentation/issues/2964)

#### Files App

- Share Link can be copied to the clipboard [#25418](https://github.com/owncloud/core/pull/25418)
- Display version sizes in versions panel [#26511](https://github.com/owncloud/core/pull/26511)
- Transfer ownership now works for individual folders [#27343](https://github.com/owncloud/core/pull/27343)
- Favorite star indicator now visible in the file lists related to sharing (ex: "Shared with you") [#19753](https://github.com/owncloud/core/issues/19753)

#### User management

- Ability to disable users in the users page (enable column first under cog icon) [#27333](https://github.com/owncloud/core/pull/27333)
- When changing personal email, an email confirmation is now sent [#7326](https://github.com/owncloud/core/issues/7326)
- When password is changed through any means, the user will now receive an email [#27498](https://github.com/owncloud/core/pull/27498)
- Change user preferences through OCC [#24770](https://github.com/owncloud/core/issues/24770)

#### External storage

- "Local" storage type can now be disabled by sysadmin in config.php [#26653](https://github.com/owncloud/core/issues/26653)
- External storage backends must use [core external storage API](https://doc.owncloud.org/server/10.0/developer_manual/app/extstorage.html) to work without "files_external" [#18160](https://github.com/owncloud/core/issues/18160)
- FTP external storage moved to a separate app [files_external_ftp](https://github.com/owncloud/files_external_ftp)

#### Dav App

- CalDAV calendar public sharing [#25351](https://github.com/owncloud/core/pull/25351)

#### Sharing

- Support for multiple link shares: [#27337](https://github.com/owncloud/core/pull/27337)
- When a recipient moves a file or folder out of a received share, the owner now receives a backup in their trashbin: [#27042](https://github.com/owncloud/core/pull/27042)
- User avatars now visible in sharing autocomplete dropdown: [#25976](https://github.com/owncloud/core/pull/25976)

#### For developers

- Users from all user backends are now stored in a central account table, improves performance by reducing recurring backend traffic: [#23558](https://github.com/owncloud/core/issues/23558)
- Added event whenever a user is enabled or disabled: [#23970](https://github.com/owncloud/core/issues/23970)
- Added first login event: [#26206](https://github.com/owncloud/core/pull/26206)
- Added postLogout hook: [#27048](https://github.com/owncloud/core/pull/27048)
- New column in oc_jobs table to store last duration: [#27144](https://github.com/owncloud/core/pull/27144)
- Ability to specify offset and limit when doing a REPORT query on a files endpoint: [#26507](https://github.com/owncloud/core/pull/26507)
- Avatar API via WebDAV https://github.com/owncloud/core/pull/26872
- Improve return value support for two factor auth providers API - [#26593](https://github.com/owncloud/core/issues/26593)
- Apps can now register Sabre plugins in info.xml: [#26195](https://github.com/owncloud/core/issues/26195)
- REPORT method for files endpoint now allows searching for favorites: [#26099](https://github.com/owncloud/core/pull/26099)
- Group backends can now return group display names (partial support, only used by sharing autocomplete): [#26750](https://github.com/owncloud/core/pull/26750)

### Changed

- status.php now returns whether an instance requires a DB update: [#26209](https://github.com/owncloud/core/pull/26209)
- config option to hide server version in status.php [#27473](https://github.com/owncloud/core/pull/27473)
- provisioning API now also returns the user's home path: [#26850](https://github.com/owncloud/core/issues/26850)
- web updater shows link to changelog in admin page: [#26796](https://github.com/owncloud/core/issues/26796)

[Unreleased]: https://github.com/owncloud/core/compare/v10.0.2...stable10
[10.0.2]: https://github.com/owncloud/core/compare/v10.0.1...v10.0.2
[10.0.1]: https://github.com/owncloud/core/compare/v10.0.0...v10.0.1

