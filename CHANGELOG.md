Changelog for ownCloud Core [10.9.1] (2022-01-12)
=======================================
The following sections list the changes in ownCloud core 10.9.1 relevant to
ownCloud admins and users.

[10.9.1]: https://github.com/owncloud/core/compare/v10.9.0...v10.9.1

Summary
-------

* Bugfix - Prevent encrypted files from being corrupted when overwriting them: [#39623](https://github.com/owncloud/core/pull/39623)
* Bugfix - Getting the file owner for share recipients: [#39670](https://github.com/owncloud/core/pull/39670)
* Bugfix - Prevent version author from being overwritten with wrong uid: [#39673](https://github.com/owncloud/core/pull/39673)

Details
-------

* Bugfix - Prevent encrypted files from being corrupted when overwriting them: [#39623](https://github.com/owncloud/core/pull/39623)

   Fixed an issue where overwriting an encrypted file by a share recipient would corrupt it. This
   is a regression which was introduced by #39516.

   https://github.com/owncloud/encryption/issues/315
   https://github.com/owncloud/core/pull/39623

* Bugfix - Getting the file owner for share recipients: [#39670](https://github.com/owncloud/core/pull/39670)

   Fixed a bug where a wrong file owner was retrieved when saving version authors. This scenario
   happened for share recipients if they had a file with the same name as the shared file.

   https://github.com/owncloud/core/issues/39662
   https://github.com/owncloud/core/pull/39670

* Bugfix - Prevent version author from being overwritten with wrong uid: [#39673](https://github.com/owncloud/core/pull/39673)

   Fixed an issue where restoring a previous version could lead to a wrong version author being
   saved, basically overwriting the correct author.

   https://github.com/owncloud/core/issues/39672
   https://github.com/owncloud/core/pull/39673

Changelog for ownCloud Core [10.9.0] (2021-12-09)
=======================================
The following sections list the changes in ownCloud core 10.9.0 relevant to
ownCloud admins and users.

[10.9.0]: https://github.com/owncloud/core/compare/v10.8.0...v10.9.0

Summary
-------

* Security - Patch jquery ui: [#39451](https://github.com/owncloud/core/pull/39451)
* Security - Patch jquery ui CVE-2016-7103: [#39545](https://github.com/owncloud/core/pull/39545)
* Bugfix - Do not try to login via auth module if the user is disabled: [#36257](https://github.com/owncloud/core/pull/36257)
* Bugfix - Do not allow empty system or app config keys: [#38996](https://github.com/owncloud/core/pull/38996)
* Bugfix - Allow subadministrators to add users to groups they manage: [#39013](https://github.com/owncloud/core/pull/39013)
* Bugfix - Update and upgrade words are inconsistent on the web UI: [#39028](https://github.com/owncloud/core/issues/39028)
* Bugfix - Avoid potential open_basedir errors after upgrade to PHP 7.4.21: [#39034](https://github.com/owncloud/core/issues/39034)
* Bugfix - Allow copying file keys when storage has multiple mount points: [#39058](https://github.com/owncloud/core/pull/39058)
* Bugfix - Show previews in profile picture setting, select from files: [#39067](https://github.com/owncloud/core/pull/39067)
* Bugfix - Do not try to delete the folder twice: [#39070](https://github.com/owncloud/core/pull/39070)
* Bugfix - Close open menus if click is on an iFrame: [#39093](https://github.com/owncloud/core/issues/39093)
* Bugfix - Prevent unneeded call to LDAP during login with local users: [#39105](https://github.com/owncloud/core/pull/39105)
* Bugfix - Clarify the description of the manual file locking option: [#39106](https://github.com/owncloud/core/pull/39106)
* Bugfix - Update appinfo cache only if the app version is newer: [#39108](https://github.com/owncloud/core/pull/39108)
* Bugfix - Fix logo size on login screen: [#39129](https://github.com/owncloud/core/pull/39129)
* Bugfix - Image orientation: [#39140](https://github.com/owncloud/core/pull/39140)
* Bugfix - Fix display of tag selection in sidebar: [#39146](https://github.com/owncloud/core/pull/39146)
* Bugfix - Keep pagination active with empty search queries: [#39155](https://github.com/owncloud/core/pull/39155)
* Bugfix - File conflict dialog when dragging a file into a folder: [#39162](https://github.com/owncloud/core/pull/39162)
* Bugfix - Return proper error if part file name is too long: [#39168](https://github.com/owncloud/core/pull/39168)
* Bugfix - Don't show exact search results with empty sharee search query: [#38501](https://github.com/owncloud/core/issues/38501)
* Bugfix - Set file name to download.zip while downloading the whole user directory: [#39198](https://github.com/owncloud/core/pull/39198)
* Bugfix - Preview rendering for sharees: [#39202](https://github.com/owncloud/core/pull/39202)
* Bugfix - Add permission check when restoring from trashbin: [#39210](https://github.com/owncloud/core/pull/39210)
* Bugfix - Don't count non-user folder in occ user:report command: [#39223](https://github.com/owncloud/core/pull/39223)
* Bugfix - Show missing delete button in file list on mobile view: [#39221](https://github.com/owncloud/core/issues/39221)
* Bugfix - Return proper error when destination header is missing: [#39235](https://github.com/owncloud/core/pull/39235)
* Bugfix - Show the correct expiring date in 'Shared by link' files list: [#39238](https://github.com/owncloud/core/pull/39238)
* Bugfix - Hide share owner file path for share receiver: [#39241](https://github.com/owncloud/core/pull/39241)
* Bugfix - Spelling errors: [#39252](https://github.com/owncloud/core/pull/39252)
* Bugfix - Command occ 'user:report' might not count 'user directories' correctly: [#39254](https://github.com/owncloud/core/pull/39254)
* Bugfix - Simplify set password text for new passwords: [#39257](https://github.com/owncloud/core/pull/39257)
* Bugfix - Allow user:list and group:list to filter on short strings: [#39258](https://github.com/owncloud/core/pull/39258)
* Bugfix - Fix doc placeholder URL in "general"-settings: [#39267](https://github.com/owncloud/core/pull/39267)
* Bugfix - Setting 0 as user display name: [#39272](https://github.com/owncloud/core/pull/39272)
* Bugfix - Fix malformed error message while accepting a share is not possible: [#39287](https://github.com/owncloud/core/pull/39287)
* Bugfix - Decouple change email from 'allow_user_to_change_display_name' setting: [#39288](https://github.com/owncloud/core/pull/39288)
* Bugfix - Don't show empty brackets in lock owner information if mail not set: [#39292](https://github.com/owncloud/core/pull/39292)
* Bugfix - Use original UID when setting the share receiver: [#39293](https://github.com/owncloud/core/pull/39293)
* Bugfix - Versions for files named "0": [#39300](https://github.com/owncloud/core/pull/39300)
* Bugfix - Sanitize data send to the server while creating users via webUI: [#39306](https://github.com/owncloud/core/pull/39306)
* Bugfix - File version names for share recipients: [#39314](https://github.com/owncloud/core/pull/39314)
* Bugfix - Allow renaming two files with the same name but different paths: [#39315](https://github.com/owncloud/core/pull/39315)
* Bugfix - No sensitive data on exception page: [#39334](https://github.com/owncloud/core/pull/39334)
* Bugfix - Hide legacy login button animation: [#39352](https://github.com/owncloud/core/pull/39352)
* Bugfix - Prohibit email/displayname change via API when not allowed: [#39353](https://github.com/owncloud/core/pull/39353)
* Bugfix - Clicking in the middle of the row in the file list downloads the file: [#39361](https://github.com/owncloud/core/pull/39361)
* Bugfix - Adjust text of occ encryption command messages: [#39395](https://github.com/owncloud/core/pull/39395)
* Bugfix - Faulty file list entry after accepting a federated share: [#39411](https://github.com/owncloud/core/pull/39411)
* Bugfix - Add missing `remoteshare.accepted` event parameters: [#39449](https://github.com/owncloud/core/pull/39449)
* Bugfix - Group administrator permissions: [#39477](https://github.com/owncloud/core/pull/39477)
* Bugfix - Load l10n js files from the correct app folder: [#39482](https://github.com/owncloud/core/pull/39482)
* Bugfix - Fix issue searching inside a shared external storage: [#39500](https://github.com/owncloud/core/pull/39500)
* Bugfix - Fix favicon, cloud symbol on Safari not visible: [#39506](https://github.com/owncloud/core/pull/39506)
* Bugfix - Clicking the eye icon in password input field does not show the password: [#39528](https://github.com/owncloud/core/pull/39528)
* Bugfix - Group select in user create panel allows empty and pre-existing groups: [#39532](https://github.com/owncloud/core/pull/39532)
* Bugfix - An app config value of null could be entered but not updated: [#39554](https://github.com/owncloud/core/pull/39554)
* Bugfix - Directory name in error message when file name already exists: [#39569](https://github.com/owncloud/core/pull/39569)
* Bugfix - Prohibit username htaccesstest.txt: [#39572](https://github.com/owncloud/core/pull/39572)
* Bugfix - Use ViewOnlyPlugin when requesting a meta endpoint using WebDAV v2: [#39575](https://github.com/owncloud/core/pull/39575)
* Bugfix - Provisioning API quota is incomplete when username casing is not exact: [#39586](https://github.com/owncloud/core/pull/39586)
* Change - Enable streaming for propfind requests: [#38583](https://github.com/owncloud/core/pull/38583)
* Change - Drop PHP 7.2 support across the platform: [#39134](https://github.com/owncloud/core/issues/39134)
* Change - Use "federated" rather than "remote" for shares: [#39578](https://github.com/owncloud/core/pull/39578)
* Change - Update url for sync client button and docs: [#38962](https://github.com/owncloud/core/pull/38962)
* Change - Clarify days parameter of the occ dav:cleanup-chunks command: [#39090](https://github.com/owncloud/core/pull/39090)
* Change - Add index.html to invalid username list: [#39206](https://github.com/owncloud/core/pull/39206)
* Change - Allow setting multiple default file actions: [#39541](https://github.com/owncloud/core/pull/39541)
* Change - Update JavaScript dependencies: [#39385](https://github.com/owncloud/core/pull/39385)
* Change - Update PHP dependencies: [#38907](https://github.com/owncloud/core/pull/38907)
* Change - Update Symfony components: [#39061](https://github.com/owncloud/core/pull/39061)
* Enhancement - Special user groups can break persistent locks: [#38222](https://github.com/owncloud/core/pull/38222)
* Enhancement - Add setting to limit public link share creation to certain groups: [#3632](https://github.com/owncloud/enterprise/issues/3632)
* Enhancement - Allow oc_sessionPassphrase cookie to expire with session_lifetime: [#38991](https://github.com/owncloud/core/issues/38991)
* Enhancement - Log number of mounts when moving encryption keys fails: [#39015](https://github.com/owncloud/core/pull/39015)
* Enhancement - Include new DB index to speed up addressbook searches: [#39017](https://github.com/owncloud/core/pull/39017)
* Enhancement - Add command to verify all available doc links: [#39026](https://github.com/owncloud/core/pull/39026)
* Enhancement - Show create and cancel buttons in the 'New file menu': [#39056](https://github.com/owncloud/core/pull/39056)
* Enhancement - Extend transfer ownership cmd with option to transfer entire user: [#39118](https://github.com/owncloud/core/pull/39118)
* Enhancement - Save and display the author of a file version: [#4518](https://github.com/owncloud/enterprise/issues/4518)
* Enhancement - Quick action for creating public links: [#4718](https://github.com/owncloud/enterprise/issues/4718)
* Enhancement - Add console command to move a user's home folder: [#39136](https://github.com/owncloud/core/pull/39136)
* Enhancement - Confirmation dialog for deleting tags: [#39157](https://github.com/owncloud/core/issues/39157)
* Enhancement - Add tooltips for group names in user settings and sharing overview: [#4695](https://github.com/owncloud/enterprise/issues/4695)
* Enhancement - Display clickable links during web UI upgrade process: [#39184](https://github.com/owncloud/core/pull/39184)
* Enhancement - Don't show updater if setting 'upgrade.disable-web' is set to true: [#39185](https://github.com/owncloud/core/pull/39185)
* Enhancement - Hide accept and decline share text on mobile view: [#39224](https://github.com/owncloud/core/pull/39224)
* Enhancement - Add option to hide the upload estimation in WebUI: [#39228](https://github.com/owncloud/core/pull/39228)
* Enhancement - Allow skeletondirectory to be an empty string: [#39230](https://github.com/owncloud/core/pull/39230)
* Enhancement - Improve mobile view for "Shared by link" file list: [#39232](https://github.com/owncloud/core/pull/39232)
* Enhancement - Use icons + buttons instead of text for file actions in mobile view: [#39233](https://github.com/owncloud/core/pull/39233)
* Enhancement - Hide restore text in deleted files list on mobile device: [#39236](https://github.com/owncloud/core/pull/39236)
* Enhancement - Redesign group list in the user settings view: [#39262](https://github.com/owncloud/core/pull/39262)
* Enhancement - Previews for text files including non-latin characters: [#39271](https://github.com/owncloud/core/pull/39271)
* Enhancement - Allow empty folder uploads via webUI: [#39285](https://github.com/owncloud/core/pull/39285)
* Enhancement - Add support for MariaDB 10.6: [#39286](https://github.com/owncloud/core/pull/39286)
* Enhancement - Optimized preview for text files: [#39296](https://github.com/owncloud/core/pull/39296)
* Enhancement - Add test receiver mail in Email Settings Admin Panel: [#39297](https://github.com/owncloud/core/pull/39297)
* Enhancement - Change user casing log level to "debug": [#39299](https://github.com/owncloud/core/pull/39299)
* Enhancement - Hide the "Remove Password" button on public links: [#39302](https://github.com/owncloud/core/pull/39302)
* Enhancement - Trim spaces while creating, uploading or renaming entities in webUI: [#39310](https://github.com/owncloud/core/pull/39310)
* Enhancement - Bring back minimalistic view to occ app:list with '-m' option: [#39326](https://github.com/owncloud/core/pull/39326)
* Enhancement - Add quality setting for JP(E)G preview images: [#39349](https://github.com/owncloud/core/pull/39349)
* Enhancement - Add last_login to Provisioning API get user response: [#39351](https://github.com/owncloud/core/pull/39351)
* Enhancement - Add priority for JavaScript plugins: [#39359](https://github.com/owncloud/core/pull/39359)
* Enhancement - Added needed code for webp thumbnail generation to occur: [#39358](https://github.com/owncloud/core/issues/39358)
* Enhancement - Add show-all-attributes option to occ user:list command: [#39366](https://github.com/owncloud/core/pull/39366)
* Enhancement - Add text to root element of breadcrumb: [#39367](https://github.com/owncloud/core/pull/39367)
* Enhancement - Extend occ dav:cleanup-chunks command with local option: [#39394](https://github.com/owncloud/core/pull/39394)
* Enhancement - Add activity translations for rename and move actions: [#39430](https://github.com/owncloud/core/pull/39430)
* Enhancement - Add capability for blacklisted files regex: [#39493](https://github.com/owncloud/core/pull/39493)
* Enhancement - Change the size of the ownCloud logo in the mail header image: [#39501](https://github.com/owncloud/core/pull/39501)
* Enhancement - Add user:home:list-dirs and user:home:list-users commands: [#39579](https://github.com/owncloud/core/pull/39579)
* Enhancement - Expand file name area to click: [#39592](https://github.com/owncloud/core/pull/39592)
* Enhancement - Add support for the x-office/drawing mimetype: [#39594](https://github.com/owncloud/core/pull/39594)

Details
-------

* Security - Patch jquery ui: [#39451](https://github.com/owncloud/core/pull/39451)

   Patched jquery ui issues:

   * CVE-2021-41182 * CVE-2021-41183 * CVE-2021-41184

   https://github.com/owncloud/core/pull/39451

* Security - Patch jquery ui CVE-2016-7103: [#39545](https://github.com/owncloud/core/pull/39545)

   Patched a CVE regarding the jquery dialog widget. This widget is currently not being used so
   this is a preventive patch.

   https://github.com/owncloud/core/pull/39545

* Bugfix - Do not try to login via auth module if the user is disabled: [#36257](https://github.com/owncloud/core/pull/36257)

   Trying to login via an auth module (such as OAuth2) created a new session token even if the user
   was disabled. This was causing errors to appear in the logs because the new session token
   created after enabling the user was in use. Now, a disabled user won't create that session
   token.

   https://github.com/owncloud/core/pull/36257

* Bugfix - Do not allow empty system or app config keys: [#38996](https://github.com/owncloud/core/pull/38996)

   It was possible to add empty config keys with the occ config:app:set or config:system:set
   commands. That is no longer allowed.

   https://github.com/owncloud/core/pull/38996

* Bugfix - Allow subadministrators to add users to groups they manage: [#39013](https://github.com/owncloud/core/pull/39013)

   https://github.com/owncloud/core/pull/39013

* Bugfix - Update and upgrade words are inconsistent on the web UI: [#39028](https://github.com/owncloud/core/issues/39028)

   The words about "upgrade needed" on the web UI sometimes used "update". The upgrade messages
   now consistently use the word "upgrade", which matches with the occ upgrade command.

   https://github.com/owncloud/core/issues/39028
   https://github.com/owncloud/core/pull/39032

* Bugfix - Avoid potential open_basedir errors after upgrade to PHP 7.4.21: [#39034](https://github.com/owncloud/core/issues/39034)

   PHP 7.4.21 checks open_basedir settings more exactly. Calls to file_exists can emit log
   messages like "file_exists(): open_basedir restriction in effect" that were not emitted by
   PHP 7.4.20.

   This change fixes an incorrect file_exists check. The open_basedir message will no longer be
   emitted in this case.

   https://github.com/owncloud/core/issues/39034
   https://github.com/owncloud/core/pull/39035

* Bugfix - Allow copying file keys when storage has multiple mount points: [#39058](https://github.com/owncloud/core/pull/39058)

   https://github.com/owncloud/core/pull/39058

* Bugfix - Show previews in profile picture setting, select from files: [#39067](https://github.com/owncloud/core/pull/39067)

   Before this PR, image previews was not shown anymore in Settings->Personal->Profile
   picture->Select from Files, as well the UI was cropped. This has been fixed with this PR.

   https://github.com/owncloud/enterprise/issues/4689
   https://github.com/owncloud/core/pull/39067

* Bugfix - Do not try to delete the folder twice: [#39070](https://github.com/owncloud/core/pull/39070)

   Previously, when a folder was moved to the trashbin from an external storage, the usual action
   was to copy the contents to the trashbin and then remove them from the source, and additionally
   another remove operation on the source was triggered. This second delete request was
   performed but the result was ignored, and the storages didn't log anything.

   With this change, this second delete request won't happen. The behaviour is still the same:
   copy to the trashbin and then remove from the source.

   https://github.com/owncloud/core/pull/39070

* Bugfix - Close open menus if click is on an iFrame: [#39093](https://github.com/owncloud/core/issues/39093)

   Before this PR click events was caught by iFrames due to this circumstances for example the
   settings menu was never closed while clicking inside the files_pdfviewer viewer. With this PR
   a new event has been added and closes the menu.

   https://github.com/owncloud/core/issues/39093
   https://github.com/owncloud/core/pull/39094

* Bugfix - Prevent unneeded call to LDAP during login with local users: [#39105](https://github.com/owncloud/core/pull/39105)

   Previously, when the user_ldap app was enabled, any login with a local user would check the LDAP
   server for that user even though it shouldn't be needed.

   Now, such call won't happen if it has been handled by a different component. In particular,
   login with a local user won't trigger that request to LDAP.

   https://github.com/owncloud/core/pull/39105
   https://github.com/owncloud/user_ldap/pull/675

* Bugfix - Clarify the description of the manual file locking option: [#39106](https://github.com/owncloud/core/pull/39106)

   The administrator can enable manual file locking in the admin settings. That enables manual
   file locking on the web interface, not on all clients. The text has been changed to describe this
   correctly.

   https://github.com/owncloud/core/pull/39106

* Bugfix - Update appinfo cache only if the app version is newer: [#39108](https://github.com/owncloud/core/pull/39108)

   Previously, in case there were multiple copies of the same app with different versions, the
   information being cached was the latest one found based on the locations defined in the
   config.php file, which might not be the one from the latest app version. This might be a problem
   in some scenarios specially checking the version of the app. Note that the code used was the one
   from the latest app version found.

   Now, the information cached is always from the latest version found. In the weird case that both
   versions are the same, the information from the first one will be kept. This shouldn't be a
   problem because the information is expected to be the same.

   https://github.com/owncloud/core/pull/39108

* Bugfix - Fix logo size on login screen: [#39129](https://github.com/owncloud/core/pull/39129)

   The previous fixed logo size resulted in a cut off logo in some cases. This was fixed by using a
   dynamically logo resize css rule.

   https://github.com/owncloud/core/pull/39129

* Bugfix - Image orientation: [#39140](https://github.com/owncloud/core/pull/39140)

   Fix the retrieval an image's exif information to ensure it's rotated correctly in thumbnails
   and preview.

   https://github.com/owncloud/core/issues/39114
   https://github.com/owncloud/enterprise/issues/4666
   https://github.com/owncloud/core/pull/39140

* Bugfix - Fix display of tag selection in sidebar: [#39146](https://github.com/owncloud/core/pull/39146)

   This PR add small CSS fixes to the Tags selection dialogue: - Fixed grey tag space if clear icon
   (x) is not displayed - Align checkmark in selection list vertically - Use correct HTML elements
   (div instead of span)

   https://github.com/owncloud/core/pull/39146
   https://github.com/owncloud/core/pull/39517
   https://github.com/owncloud/core/pull/39563

* Bugfix - Keep pagination active with empty search queries: [#39155](https://github.com/owncloud/core/pull/39155)

   Before this fix, an empty search string would pre-render all rows in the file list, ignoring the
   pagination. This fix ensures that the file list is paginated correctly in combination with an
   empty search query.

   https://github.com/owncloud/enterprise/issues/4615
   https://github.com/owncloud/core/pull/39155

* Bugfix - File conflict dialog when dragging a file into a folder: [#39162](https://github.com/owncloud/core/pull/39162)

   When dragging a file into a folder, while another file with an identical name exists in the
   parent directory, the UI falsely showed a conflict dialog alert. This has been fixed.

   https://github.com/owncloud/core/issues/39133
   https://github.com/owncloud/core/pull/39162
   https://github.com/owncloud/core/pull/39170

* Bugfix - Return proper error if part file name is too long: [#39168](https://github.com/owncloud/core/pull/39168)

   https://github.com/owncloud/enterprise/issues/4692
   https://github.com/owncloud/core/pull/39168

* Bugfix - Don't show exact search results with empty sharee search query: [#38501](https://github.com/owncloud/core/issues/38501)

   When setting user.search_min_length to 0 and using an empty query to search for sharees, there
   won't be any exact search results.

   https://github.com/owncloud/core/issues/38501
   https://github.com/owncloud/core/pull/39186

* Bugfix - Set file name to download.zip while downloading the whole user directory: [#39198](https://github.com/owncloud/core/pull/39198)

   Before this PR, selecting all files and folders in the webUI and clicking the download button,
   resulted in a file downloaded with the name ".zip". With this PR the file name is now
   "download.zip".

   https://github.com/owncloud/core/issues/39187
   https://github.com/owncloud/core/pull/39198
   https://github.com/owncloud/core/pull/39239

* Bugfix - Preview rendering for sharees: [#39202](https://github.com/owncloud/core/pull/39202)

   Previous to this fix, the previews of updated shared files did not change for sharees. Those
   previews now get re-generated if the content of the files changed.

   https://github.com/owncloud/core/issues/39202
   https://github.com/owncloud/core/issues/31855
   https://github.com/owncloud/core/pull/39202

* Bugfix - Add permission check when restoring from trashbin: [#39210](https://github.com/owncloud/core/pull/39210)

   This fixes an issue where a user was able to restore a file or folder into a read-only shared
   folder.

   https://github.com/owncloud/core/issues/35900
   https://github.com/owncloud/core/pull/39210

* Bugfix - Don't count non-user folder in occ user:report command: [#39223](https://github.com/owncloud/core/pull/39223)

   Before this PR several folders, for example 'avatars', have been counted as user folders via
   the occ user:report command. With this PR a list of folders has been added which should not be
   counted as user folders. The user directory count is now correct.

   https://github.com/owncloud/core/pull/39223

* Bugfix - Show missing delete button in file list on mobile view: [#39221](https://github.com/owncloud/core/issues/39221)

   https://github.com/owncloud/core/issues/39221
   https://github.com/owncloud/core/pull/39227

* Bugfix - Return proper error when destination header is missing: [#39235](https://github.com/owncloud/core/pull/39235)

   Move- and copy-requests without destination header now give a proper error response: "The
   destination header was not supplied"

   https://github.com/owncloud/core/issues/38898
   https://github.com/owncloud/core/pull/39235

* Bugfix - Show the correct expiring date in 'Shared by link' files list: [#39238](https://github.com/owncloud/core/pull/39238)

   Before this PR the "Expiration date" column did not respect that shares expiration is set to the
   end of date and showing wrong values. This has been fixed with this PR

   https://github.com/owncloud/core/issues/39234
   https://github.com/owncloud/core/pull/39238
   https://github.com/owncloud/core/pull/39246

* Bugfix - Hide share owner file path for share receiver: [#39241](https://github.com/owncloud/core/pull/39241)

   This fixes an issue where a share receiver could see the share owner's full file path before
   accepting the share.

   https://github.com/owncloud/core/issues/38027
   https://github.com/owncloud/core/pull/39241

* Bugfix - Spelling errors: [#39252](https://github.com/owncloud/core/pull/39252)

   Various spelling errors have been corrected in messages.

   https://github.com/owncloud/core/pull/39252

* Bugfix - Command occ 'user:report' might not count 'user directories' correctly: [#39254](https://github.com/owncloud/core/pull/39254)

   Before this PR the underlying function of 'user:report' just looked up in the 'datadirectory'
   set in 'config.php'. This implies that user directories which are symlinks or even not in the
   'datadirectory', have not been taken into account. With this PR we check if the user's home path
   exists and increase the 'user directories' count.

   https://github.com/owncloud/enterprise/issues/4742
   https://github.com/owncloud/core/pull/39254

* Bugfix - Simplify set password text for new passwords: [#39257](https://github.com/owncloud/core/pull/39257)

   https://github.com/owncloud/core/pull/39257

* Bugfix - Allow user:list and group:list to filter on short strings: [#39258](https://github.com/owncloud/core/pull/39258)

   The occ user:list and group:list commands can now be used to list users and groups that match a
   short string, regardless of the setting of user.search_min_length

   https://github.com/owncloud/core/issues/31117
   https://github.com/owncloud/core/pull/39258

* Bugfix - Fix doc placeholder URL in "general"-settings: [#39267](https://github.com/owncloud/core/pull/39267)

   https://github.com/owncloud/core/issues/27666
   https://github.com/owncloud/core/pull/39267

* Bugfix - Setting 0 as user display name: [#39272](https://github.com/owncloud/core/pull/39272)

   Setting the display name of a user to 0 was allowed before, but the UI showed the UID instead. This
   has been fixed.

   https://github.com/owncloud/core/issues/30657
   https://github.com/owncloud/core/pull/39272

* Bugfix - Fix malformed error message while accepting a share is not possible: [#39287](https://github.com/owncloud/core/pull/39287)

   https://github.com/owncloud/core/issues/36181
   https://github.com/owncloud/core/pull/39287

* Bugfix - Decouple change email from 'allow_user_to_change_display_name' setting: [#39288](https://github.com/owncloud/core/pull/39288)

   Before this change, with setting 'allow_user_to_change_display_name' false, the user was
   not able to change the mail address in Settings->Personal->General via the webUI.

   With this change, the setting 'allow_user_to_change_mail_address' has been introduced and
   change mail address has been decoupled from setting `allow_user_to_change_display_name`.

   'allow_user_to_change_mail_address' must be set explicitly to false, to take effect.

   https://github.com/owncloud/core/issues/35103
   https://github.com/owncloud/core/pull/39288

* Bugfix - Don't show empty brackets in lock owner information if mail not set: [#39292](https://github.com/owncloud/core/pull/39292)

   https://github.com/owncloud/core/issues/37878
   https://github.com/owncloud/core/pull/39292

* Bugfix - Use original UID when setting the share receiver: [#39293](https://github.com/owncloud/core/pull/39293)

   This fixes an issue where a share reciever was not set properly when passing the username with an
   incorrect casing. As usernames are case insensitive in general, this is more consistent now.

   https://github.com/owncloud/core/issues/26273
   https://github.com/owncloud/core/pull/39293

* Bugfix - Versions for files named "0": [#39300](https://github.com/owncloud/core/pull/39300)

   This fixes an issue where files named "0" were missing their versions in the WebUI.

   https://github.com/owncloud/core/issues/36000
   https://github.com/owncloud/core/pull/39300

* Bugfix - Sanitize data send to the server while creating users via webUI: [#39306](https://github.com/owncloud/core/pull/39306)

   Before this change toggle between 'Set password for new users' option, may preserve and send
   unwanted password or email information. This has been fixed, the webUI will not send email data
   to the server if the option 'Set password for new users' is active, vice versa password won't be
   sent if the option is disabled.

   https://github.com/owncloud/core/issues/32619
   https://github.com/owncloud/core/pull/39306

* Bugfix - File version names for share recipients: [#39314](https://github.com/owncloud/core/pull/39314)

   With this fix, file version names now match with the actual file name for share recipients.
   Before, the name has been the timestamp of the version file.

   https://github.com/owncloud/core/issues/36228
   https://github.com/owncloud/core/pull/39314
   https://github.com/owncloud/core/pull/39415

* Bugfix - Allow renaming two files with the same name but different paths: [#39315](https://github.com/owncloud/core/pull/39315)

   With this change, we allow renaming a file to an existing file name, when the path differs. This
   happens for example when the user creates the file '/mydirname/text.txt' and '/mytext.txt'
   then marks both as favorite, and then navigates to the Favorites and renames 'mytext.txt' to
   'text.txt'

   https://github.com/owncloud/core/issues/20722
   https://github.com/owncloud/core/issues/35174
   https://github.com/owncloud/core/pull/39315

* Bugfix - No sensitive data on exception page: [#39334](https://github.com/owncloud/core/pull/39334)

   In debug mode any exception stack trace is rendered to the browser which can hold sensitive data
   like passwords as method arguments. They are now filtered and no longer exposed to the user.

   https://github.com/owncloud/core/pull/39334

* Bugfix - Hide legacy login button animation: [#39352](https://github.com/owncloud/core/pull/39352)

   In some cases the old animation was still displayed on login buttons. This PR hides it in favour
   of the newly introduced animation.

   https://github.com/owncloud/core/pull/39352

* Bugfix - Prohibit email/displayname change via API when not allowed: [#39353](https://github.com/owncloud/core/pull/39353)

   When the configs `allow_user_to_change_mail_address` or
   `allow_user_to_change_display_name` are set to `false`, changing the corresponding
   values via the provisioning API is no longer possible.

   https://github.com/owncloud/core/issues/39332
   https://github.com/owncloud/core/pull/39353

* Bugfix - Clicking in the middle of the row in the file list downloads the file: [#39361](https://github.com/owncloud/core/pull/39361)

   This change addresses the issue if the user clicks in on a row in the file list, the file gets
   downloaded or open with the default viewer. This was not intended, the download or default
   opening should only happen if the user clicks directly on the file name. Problems with mobile
   devices, where the file name was too long to display, has been also solved.

   https://github.com/owncloud/core/issues/39329
   https://github.com/owncloud/core/pull/39361

* Bugfix - Adjust text of occ encryption command messages: [#39395](https://github.com/owncloud/core/pull/39395)

   The text of some encryption command messages has been improved.

   https://github.com/owncloud/core/pull/39395

* Bugfix - Faulty file list entry after accepting a federated share: [#39411](https://github.com/owncloud/core/pull/39411)

   With this change, we reload the shared with you file list if the user accepts or declines a share.
   This solves the issue after accepting a federated share the table record was not pointing to the
   correct location.

   https://github.com/owncloud/enterprise/issues/4823
   https://github.com/owncloud/core/pull/39411

* Bugfix - Add missing `remoteshare.accepted` event parameters: [#39449](https://github.com/owncloud/core/pull/39449)

   This fix adds missing parameters to the `remoteshare.accepted` event when triggered via
   controller: `shareId`, `fileId`, `shareRecipient`. The bugfix is a complement to
   https://github.com/owncloud/core/pull/38880.

   https://github.com/owncloud/core/pull/39449

* Bugfix - Group administrator permissions: [#39477](https://github.com/owncloud/core/pull/39477)

   This fixes an issue where group administrators were unable to change email addresses and
   resend invitation emails for users in their groups.

   https://github.com/owncloud/core/issues/39475
   https://github.com/owncloud/core/issues/39476
   https://github.com/owncloud/core/pull/39477

* Bugfix - Load l10n js files from the correct app folder: [#39482](https://github.com/owncloud/core/pull/39482)

   With this PR, we ensure that the translations will be loaded from the correct app folder path.
   For example, if you have two versions of an app, where one version is in the apps folder and the
   other one in the apps-external folder. The change also ensures that theme translations will be
   loaded additionally instead of replacing the whole app translations. This has the advantage
   that the user can cherry-pick single words to translate.

   https://github.com/owncloud/core/pull/39482

* Bugfix - Fix issue searching inside a shared external storage: [#39500](https://github.com/owncloud/core/pull/39500)

   Previously, if an external storage was shared with a user, that user wasn't able to search files
   inside that share. Now, such user can search inside that share

   https://github.com/owncloud/core/pull/39500

* Bugfix - Fix favicon, cloud symbol on Safari not visible: [#39506](https://github.com/owncloud/core/pull/39506)

   https://github.com/owncloud/core/pull/39506

* Bugfix - Clicking the eye icon in password input field does not show the password: [#39528](https://github.com/owncloud/core/pull/39528)

   During the installation, the user should be able to click the eye icon in the admin user and
   database password field to see the password, this recently stopped to work and has been fixed
   with this change.

   https://github.com/owncloud/core/issues/39527
   https://github.com/owncloud/core/pull/39528

* Bugfix - Group select in user create panel allows empty and pre-existing groups: [#39532](https://github.com/owncloud/core/pull/39532)

   Before this change, the admin could create groups with empty name or multiple times with the
   same name. This has been fixed with this change.

   https://github.com/owncloud/enterprise/issues/4890
   https://github.com/owncloud/core/pull/39532

* Bugfix - An app config value of null could be entered but not updated: [#39554](https://github.com/owncloud/core/pull/39554)

   An app config value now cannot be set to null. Any existing null values are now treated as the
   empty string.

   https://github.com/owncloud/core/pull/39554

* Bugfix - Directory name in error message when file name already exists: [#39569](https://github.com/owncloud/core/pull/39569)

   This fixes an issue where the wrong directory name was shown when trying to rename a file to a name
   that already exists in the same directory.

   https://github.com/owncloud/core/issues/39552
   https://github.com/owncloud/core/pull/39569

* Bugfix - Prohibit username htaccesstest.txt: [#39572](https://github.com/owncloud/core/pull/39572)

   Htaccesstest.txt is a special file that can be in the data directory. That is not allowed as a
   username.

   https://github.com/owncloud/core/issues/39570
   https://github.com/owncloud/core/pull/39572

* Bugfix - Use ViewOnlyPlugin when requesting a meta endpoint using WebDAV v2: [#39575](https://github.com/owncloud/core/pull/39575)

   This fixes an issue where versions of shared files were downloadable using the new WebDAV API
   despite missing permissions, e.g. when shared via secure view.

   https://github.com/owncloud/enterprise/issues/4916
   https://github.com/owncloud/core/pull/39575

* Bugfix - Provisioning API quota is incomplete when username casing is not exact: [#39586](https://github.com/owncloud/core/pull/39586)

   The Provisioning API now returns all the quota information for a user even when the username
   casing is different in the API request.

   https://github.com/owncloud/core/issues/39577
   https://github.com/owncloud/core/pull/39586

* Change - Enable streaming for propfind requests: [#38583](https://github.com/owncloud/core/pull/38583)

   Propfind requests will now be streamed to reduce memory usage with large responses.
   Additionally, the new config `dav.propfind.depth_infinity` has been added to tell clients
   whether `depth=infinity` is allowed for propfind requests. It defaults to true.

   https://github.com/owncloud/core/pull/38583

* Change - Drop PHP 7.2 support across the platform: [#39134](https://github.com/owncloud/core/issues/39134)

   Support for security fixes for PHP 7.2 ended in Dec 2020 ownCloud core no longer supports PHP
   7.2. Ensure that you are using PHP 7.3 or 7.4. PHP 7.4 is recommended.

   https://github.com/owncloud/core/issues/39134
   https://github.com/owncloud/core/pull/38697
   https://www.php.net/supported-versions.php

* Change - Use "federated" rather than "remote" for shares: [#39578](https://github.com/owncloud/core/pull/39578)

   Shares from one ownCloud to another ownCloud were referred to in some places as remote shares
   and in other places as federated shares. References to remote shares in error messages and on
   the user interface have been changed to references to federated shares. All user-facing text
   now calls these federated shares.

   https://github.com/owncloud/core/issues/38871
   https://github.com/owncloud/core/pull/39578
   https://github.com/owncloud/core/pull/38877

* Change - Update url for sync client button and docs: [#38962](https://github.com/owncloud/core/pull/38962)

   https://github.com/owncloud/core/issues/38957
   https://github.com/owncloud/core/pull/38962

* Change - Clarify days parameter of the occ dav:cleanup-chunks command: [#39090](https://github.com/owncloud/core/pull/39090)

   The days parameter is the minimum age of uploads to cleanup. This has been clarified in the
   command help.

   https://github.com/owncloud/core/pull/39090

* Change - Add index.html to invalid username list: [#39206](https://github.com/owncloud/core/pull/39206)

   With this PR the invalid username list gets expanded with "index.html". As well the error
   message has been updated in favor of the known translation scheme.

   https://github.com/owncloud/core/issues/39205
   https://github.com/owncloud/core/pull/39206

* Change - Allow setting multiple default file actions: [#39541](https://github.com/owncloud/core/pull/39541)

   This change allows a mime type to have multiple default file actions. In the past, registering
   an action as default would overwrite existing defaults.

   In case multiple file actions apply to a mime type, clicking on a file will show the app drawer
   context menu.

   https://github.com/owncloud/enterprise/issues/4634
   https://github.com/owncloud/core/pull/39541

* Change - Update JavaScript dependencies: [#39385](https://github.com/owncloud/core/pull/39385)

   The following have been updated: - karma (4.4.1 to 6.3.8) - minimist (1.2.3 to 1.2.5) - sinon
   (7.5.0 to 12.0.1) - bower_components/base64 (1.0.2 to 1.1.0) - bower_components/clipboard
   (2.0.4 to 2.0.6) - bower_components/handlebars (4.5.3 to 4.7.7) - bower_components/moment
   (2.24.0 to 2.29.1) - bower_components/underscore (1.9.1 to 1.13.1)

   https://github.com/owncloud/core/pull/39385
   https://github.com/owncloud/core/pull/39145
   https://github.com/owncloud/core/pull/38670
   https://github.com/owncloud/core/pull/38671
   https://github.com/owncloud/core/pull/39407
   https://github.com/owncloud/core/pull/36633
   https://github.com/owncloud/core/pull/39421
   https://github.com/owncloud/core/pull/39417
   https://github.com/owncloud/core/pull/39447
   https://github.com/owncloud/core/pull/39464
   https://github.com/owncloud/core/pull/39468

* Change - Update PHP dependencies: [#38907](https://github.com/owncloud/core/pull/38907)

   The following have been updated: - christophwurst/id3parser (0.1.2 to 0.1.3) -
   doctrine/cache (2.0.3 to 2.1.1) - doctrine/dbal (2.13.2 to 2.13.5) -
   egulias/email-validator (3.1.1 to 3.1.2) - laminas/laminas-filter (2.11.1 to 2.12.0) -
   laminas/laminas-stdlib (3.5.0 to 3.6.1) - laminas/laminas-validator (2.14.5 to 2.15.0) -
   laminas/laminas-zendframework-bridge (1.3.0 to 1.4.0) - league/flysystem (1.1.4 to
   1.1.5) - mikey179/vfsstream (v1.6.8 to v1.6.9) - nikic/php-parser (v4.11.0 to v4.13.0) -
   pear/archive_tar (1.4.13 to 1.4.14) - phpseclib/phpseclib (3.0.9 to 3.0.11) -
   pimple/pimple (3.2.3 to 3.5.0) - punic/punic (3.6.0 to 3.7.0) - sabre/dav (4.1.5 to 4.2.0) -
   sabre/event (5.1.2 to 5.1.4) - sabre/http (5.1.1 to 5.1.3) - sabre/vobject (4.3.5 to 4.4.0) -
   sabre/uri (2.2.1 to 2.2.2) - sabre/xml (2.2.3 to 2.2.5) - swiftmailer/swiftmailer (v6.2.7 to
   v6.3.0)

   The following have been updated in files_external/3rdparty: - firebase/php-jwt (v5.4.0 to
   v5.5.1) - google/apiclient (v2.9.2 to v2.11.0) - google/apiclient-services (v0.213.0 to
   v0.221.0) - guzzlehttp/psr7 (1.8.2 to 1.8.3) - icewind/smb (v3.4.1 to v3.5.1) -
   monolog/monolog (2.3.4 to 2.3.5) - phpseclib/phpseclib (3.0.10 to 3.0.11)

   https://github.com/owncloud/core/pull/38907
   https://github.com/owncloud/core/pull/39030
   https://github.com/owncloud/core/pull/39047
   https://github.com/owncloud/core/pull/39065
   https://github.com/owncloud/core/pull/39116
   https://github.com/owncloud/core/pull/39124
   https://github.com/owncloud/core/pull/39201
   https://github.com/owncloud/core/pull/39214
   https://github.com/owncloud/core/pull/39259
   https://github.com/owncloud/core/pull/39317
   https://github.com/owncloud/core/pull/39369
   https://github.com/owncloud/core/pull/39422
   https://github.com/owncloud/core/pull/39427
   https://github.com/owncloud/core/pull/39433
   https://github.com/owncloud/core/pull/39434
   https://github.com/owncloud/core/pull/39453
   https://github.com/owncloud/core/pull/39456
   https://github.com/owncloud/core/pull/39466
   https://github.com/owncloud/core/pull/39479
   https://github.com/owncloud/core/pull/39485
   https://github.com/owncloud/core/pull/39487
   https://github.com/owncloud/core/pull/39492
   https://github.com/owncloud/core/pull/39495
   https://github.com/owncloud/core/pull/39496

* Change - Update Symfony components: [#39061](https://github.com/owncloud/core/pull/39061)

   The following Symfony components have been updated to: - console 4.4.33 - event-dispatcher
   4.4.30 - process 4.4.30 - routing 4.4.30 - translation 4.4.32

   The following Symfony polyfill components have been updated to: -
   symfony/polyfill-mbstring v1.23.1 - symfony/polyfill-php80 v1.23.1

   https://github.com/owncloud/core/pull/39061
   https://github.com/owncloud/core/pull/39079
   https://github.com/owncloud/core/pull/39153
   https://github.com/owncloud/core/pull/39298
   https://github.com/owncloud/core/pull/39440
   https://symfony.com/blog/symfony-4-4-27-released
   https://symfony.com/blog/symfony-4-4-29-released
   https://symfony.com/blog/symfony-4-4-30-released
   https://symfony.com/blog/symfony-4-4-31-released
   https://symfony.com/blog/symfony-4-4-32-released
   https://symfony.com/blog/symfony-4-4-33-released

* Enhancement - Special user groups can break persistent locks: [#38222](https://github.com/owncloud/core/pull/38222)

   Not only the owner of a lock can unlock a resource but the lock breaker groups are allowed to break
   locks as well.

   https://github.com/owncloud/core/pull/38222

* Enhancement - Add setting to limit public link share creation to certain groups: [#3632](https://github.com/owncloud/enterprise/issues/3632)

   With this PR a new setting in settings->admin-sharing has been introduced which allows the
   admin to limit public link share creation to certain groups.

   https://github.com/owncloud/enterprise/issues/3632
   https://github.com/owncloud/core/pull/38980

* Enhancement - Allow oc_sessionPassphrase cookie to expire with session_lifetime: [#38991](https://github.com/owncloud/core/issues/38991)

   Before this PR the session cookie oc_sessionPassphrase has expiration time 0 regardless of
   the value of `session_lifetime` in config.php

   Now the behavior will be that after setting `session_lifetime` in config.php will make
   oc_sessionPassphrase cookie to expire in that period of time invalidating the current
   session and forcing a log out. In the other hand, if session_lifetime is not defined or 0,
   oc_sessionPassphrase will assume its original value before this PR of 0.

   https://github.com/owncloud/core/issues/38991
   https://github.com/owncloud/core/pull/38992

* Enhancement - Log number of mounts when moving encryption keys fails: [#39015](https://github.com/owncloud/core/pull/39015)

   Due to wrong configuration or bugs it is possible that more than one mount is returned. In this
   case we should log the mount-count for easier debugging.

   https://github.com/owncloud/core/pull/39015

* Enhancement - Include new DB index to speed up addressbook searches: [#39017](https://github.com/owncloud/core/pull/39017)

   https://github.com/owncloud/core/pull/39017

* Enhancement - Add command to verify all available doc links: [#39026](https://github.com/owncloud/core/pull/39026)

   All available doc links can now be tested and verified via `make test-doc-links`. It is also
   possible to specify the ownCloud version to look for in the docs via `make test-doc-links
   DOC_LINK_VERSION=10.7`. It defaults to the ownCloud version of the current installation.

   https://github.com/owncloud/enterprise/issues/4671
   https://github.com/owncloud/core/pull/39026

* Enhancement - Show create and cancel buttons in the 'New file menu': [#39056](https://github.com/owncloud/core/pull/39056)

   If the user hits the '+' button in the UI, a context menu will be shown, where the user is able to
   choose for example 'Folder'. A form will show up to set the new folder name, the user needs to
   confirm by hitting the enter key. This might not been understood by every user at the first
   glance. Therefore, with this PR a create and cancel button has been added.

   https://github.com/owncloud/enterprise/issues/4684
   https://github.com/owncloud/core/pull/39056

* Enhancement - Extend transfer ownership cmd with option to transfer entire user: [#39118](https://github.com/owncloud/core/pull/39118)

   Command occ files:transfer-ownership now includes flag --destination-use-user-folder
   <user-id> that allows to transfer all user files and shares to destination user that has never
   logged in. This is helpful in situation when users need to be migrated to new accounts.

   https://github.com/owncloud/enterprise/issues/4686
   https://github.com/owncloud/core/pull/39118

* Enhancement - Save and display the author of a file version: [#4518](https://github.com/owncloud/enterprise/issues/4518)

   The author attribute will be saved and shown in the version list grid for each new file version.
   This will allow the users to see who performed the changes on a specific file and when. Also, the
   author attribute will retain on renaming, copying, and deletion/restoration of the file.

   https://github.com/owncloud/enterprise/issues/4518
   https://github.com/owncloud/core/pull/39126
   https://github.com/owncloud/core/pull/39516

* Enhancement - Quick action for creating public links: [#4718](https://github.com/owncloud/enterprise/issues/4718)

   This feature introduces a quick action in the filelist for creating read-only public links. It
   can be enabled via 'sharing.showPublicLinkQuickAction' in the config.php.

   https://github.com/owncloud/enterprise/issues/4718
   https://github.com/owncloud/core/pull/39130
   https://github.com/owncloud/core/pull/39163
   https://github.com/owncloud/core/pull/39167

* Enhancement - Add console command to move a user's home folder: [#39136](https://github.com/owncloud/core/pull/39136)

   Occ user:move-home <user_id> <new_location>

   https://github.com/owncloud/core/pull/39136

* Enhancement - Confirmation dialog for deleting tags: [#39157](https://github.com/owncloud/core/issues/39157)

   This feature introduces confirmation dialog while deleting a tag to prevent unwanted
   data-loss

   https://github.com/owncloud/core/issues/39157
   https://github.com/owncloud/core/pull/39158

* Enhancement - Add tooltips for group names in user settings and sharing overview: [#4695](https://github.com/owncloud/enterprise/issues/4695)

   https://github.com/owncloud/enterprise/issues/4695
   https://github.com/owncloud/core/pull/39160

* Enhancement - Display clickable links during web UI upgrade process: [#39184](https://github.com/owncloud/core/pull/39184)

   Before this PR, error messages can contain links that have not been clickable. With this PR,
   links are clickable and open them in a new tab.

   https://github.com/owncloud/core/issues/39178
   https://github.com/owncloud/core/pull/39184

* Enhancement - Don't show updater if setting 'upgrade.disable-web' is set to true: [#39185](https://github.com/owncloud/core/pull/39185)

   With this PR the update section in Settings->Admin->General will be not shown if setting
   'upgrade.disable-web' is set to true.

   https://github.com/owncloud/core/issues/39183
   https://github.com/owncloud/core/pull/39185

* Enhancement - Hide accept and decline share text on mobile view: [#39224](https://github.com/owncloud/core/pull/39224)

   Before this PR within the "Shared with you" files list, a text for accept and decline was shown
   next to the associated icon. These texts were using excessive space in the mobile view and might
   leave the "State" column not completely visible. This has been fixed with this PR through
   hiding those unnecessary texts.

   https://github.com/owncloud/core/pull/39224

* Enhancement - Add option to hide the upload estimation in WebUI: [#39228](https://github.com/owncloud/core/pull/39228)

   The upload estimation can now be hidden when setting `hide_upload_estimation` to "yes" via
   occ command: occ config:app:set files hide_upload_estimation --value="yes"

   https://github.com/owncloud/enterprise/issues/4743
   https://github.com/owncloud/core/pull/39228

* Enhancement - Allow skeletondirectory to be an empty string: [#39230](https://github.com/owncloud/core/pull/39230)

   Skeletondirectory can now be set to an empty string in config.php to indicate that no skeleton
   is required.

   https://github.com/owncloud/core/pull/39230

* Enhancement - Improve mobile view for "Shared by link" file list: [#39232](https://github.com/owncloud/core/pull/39232)

   With this PR, the "Expiration date" column won't be displayed in mobile view anymore to gather
   space.

   https://github.com/owncloud/core/pull/39232

* Enhancement - Use icons + buttons instead of text for file actions in mobile view: [#39233](https://github.com/owncloud/core/pull/39233)

   Before this PR, as files were selected in the files list, actions was shown with icon and text,
   for example: 'Download' and 'Delete'. This uses much space and UI glitches are possible due to
   limited screen size. With this PR we now show buttons with the associated icons without any
   text.

   https://github.com/owncloud/core/pull/39233

* Enhancement - Hide restore text in deleted files list on mobile device: [#39236](https://github.com/owncloud/core/pull/39236)

   With this PR restore text next to the associated icon will be hidden to grant space for the file
   and folder names.

   https://github.com/owncloud/core/pull/39236

* Enhancement - Redesign group list in the user settings view: [#39262](https://github.com/owncloud/core/pull/39262)

   Before this PR, the group list settings were confusing as the user needs to click on a group first
   before the trash bin icon appears to delete a group. As well the user count was nondescript. With
   this PR, a redesign takes care of those issues and also fixes the problem that while deleting a
   group in the group list, it was still available in the user group list. Furthermore, after
   deleting a group, the user will be redirected to the 'Everyone' group summary view. Also fixes
   an issue where the 'active'-class on a newly created group was duplicated.

   https://github.com/owncloud/core/issues/36273
   https://github.com/owncloud/core/issues/29057
   https://github.com/owncloud/core/pull/39262
   https://github.com/owncloud/core/pull/39307

* Enhancement - Previews for text files including non-latin characters: [#39271](https://github.com/owncloud/core/pull/39271)

   Generate and display previews for text files that include non-latin characters like Chinese,
   Japanese, Korean and Arabic.

   https://github.com/owncloud/core/issues/16229
   https://github.com/owncloud/core/pull/39271

* Enhancement - Allow empty folder uploads via webUI: [#39285](https://github.com/owncloud/core/pull/39285)

   Before this change, drag and drop of an empty folder did not work, there was no response in the
   webUI. While uploading a folder with a text file and an empty folder, the folder with the text
   file was created but the empty folder wasn't.

   These empty folder upload scenarios work now.

   https://github.com/owncloud/core/issues/32235
   https://github.com/owncloud/enterprise/issues/3117
   https://github.com/owncloud/core/pull/39285

* Enhancement - Add support for MariaDB 10.6: [#39286](https://github.com/owncloud/core/pull/39286)

   With this change support for MariaDB 10.6 has been added. If it is a fresh ownCloud
   installation, MariaDB 10.6 can be used right away. For upgrading from an older version the
   command 'occ db:restore-default-row-format' has been introduced to remove the deprecated
   row_format 'compressed' from the ownCloud database tables and set it to the default value.

   https://github.com/owncloud/core/issues/39283
   https://github.com/owncloud/core/pull/39286

* Enhancement - Optimized preview for text files: [#39296](https://github.com/owncloud/core/pull/39296)

   Previews for text files are generated a bit faster. The preview will be generated based on the
   first 2 KB of content. In addition to common Latin script, texts using Han, Hiragana, Katakana,
   Hangul, Devanagari and Arabic scripts will also be shown. Note that a text with mixed scripts
   won't be previewed properly.

   https://github.com/owncloud/core/pull/39296

* Enhancement - Add test receiver mail in Email Settings Admin Panel: [#39297](https://github.com/owncloud/core/pull/39297)

   With this change the admin needs to provide a test receiver mail address while sending test
   mails in the Email Settings Admin Panel. This has the advantage that the admin does not need to go
   back to user settings and set the own mail address. The user's own email will be set as
   preselected value if set.

   https://github.com/owncloud/core/issues/33018
   https://github.com/owncloud/core/pull/39297

* Enhancement - Change user casing log level to "debug": [#39299](https://github.com/owncloud/core/pull/39299)

   https://github.com/owncloud/core/issues/36139
   https://github.com/owncloud/core/pull/39299

* Enhancement - Hide the "Remove Password" button on public links: [#39302](https://github.com/owncloud/core/pull/39302)

   This change hides the "Remove Password" button when editing a public link if a password in
   mandatory.

   https://github.com/owncloud/core/issues/35684
   https://github.com/owncloud/core/pull/39302

* Enhancement - Trim spaces while creating, uploading or renaming entities in webUI: [#39310](https://github.com/owncloud/core/pull/39310)

   With this change starting or trailing spaces will be removed while: * Creating files and
   folders in the webUI * Uploading files using the 'Upload' button in the webUI * Uploading files
   and folders using drag & drop in the webUI * Renaming files and folders in the webUI

   This also solves problems when the sync client can't sync files and folders with trailing
   spaces based on the underlying file system.

   https://github.com/owncloud/enterprise/issues/4772
   https://github.com/owncloud/core/issues/35017
   https://github.com/owncloud/core/pull/39310

* Enhancement - Bring back minimalistic view to occ app:list with '-m' option: [#39326](https://github.com/owncloud/core/pull/39326)

   https://github.com/owncloud/core/pull/39326

* Enhancement - Add quality setting for JP(E)G preview images: [#39349](https://github.com/owncloud/core/pull/39349)

   A new config setting `previewJPEGImageDisplayQuality` has been introduced with which the
   quality of generated JP(E)G previews can be determined.

   https://github.com/owncloud/enterprise/issues/4702
   https://github.com/owncloud/core/pull/39349

* Enhancement - Add last_login to Provisioning API get user response: [#39351](https://github.com/owncloud/core/pull/39351)

   The response to a Provisioning API GET request to the cloud/users/username endpoint now
   includes the last_login time in the response. The value is a Unix timestamp in seconds.

   https://github.com/owncloud/core/pull/39351

* Enhancement - Add priority for JavaScript plugins: [#39359](https://github.com/owncloud/core/pull/39359)

   JavaScript plugins can now be registered with a specific priority. A higher priority means the
   plugin will be attached/detached before others.

   https://github.com/owncloud/core/pull/39359

* Enhancement - Added needed code for webp thumbnail generation to occur: [#39358](https://github.com/owncloud/core/issues/39358)

   Previously thumbnail previews for image files of the webp format with the .webp extension were
   not generated. Instead a generic placeholder icon was shown. This enhancement/fix caused the
   generation of preview thumbnails, just as was standard with other image formats.

   https://github.com/owncloud/core/issues/39358
   https://github.com/owncloud/core/pull/39360

* Enhancement - Add show-all-attributes option to occ user:list command: [#39366](https://github.com/owncloud/core/pull/39366)

   https://github.com/owncloud/enterprise/issues/4794
   https://github.com/owncloud/core/pull/39366

* Enhancement - Add text to root element of breadcrumb: [#39367](https://github.com/owncloud/core/pull/39367)

   https://github.com/owncloud/enterprise/issues/4807
   https://github.com/owncloud/core/pull/39367

* Enhancement - Extend occ dav:cleanup-chunks command with local option: [#39394](https://github.com/owncloud/core/pull/39394)

   If an admin runs a setup with multiple servers, connected to the same database and sets the
   configuration for the chunking directory 'dav.chunk_base_dir' to a unique place on the
   server, the command occ dav:cleanup-chunks might fail. This happens as the oc_filecache
   table doesn't give us the information on which server the directory is. Therefore the local
   option has been added to the command, with this precondition only files that are on the local
   filesystem will be removed.

   https://github.com/owncloud/enterprise/issues/4824
   https://github.com/owncloud/core/pull/39394

* Enhancement - Add activity translations for rename and move actions: [#39430](https://github.com/owncloud/core/pull/39430)

   https://github.com/owncloud/enterprise/issues/4806
   https://github.com/owncloud/activity/issues/375
   https://github.com/owncloud/core/pull/39430
   https://github.com/owncloud/core/pull/39438
   https://github.com/owncloud/core/pull/39450

* Enhancement - Add capability for blacklisted files regex: [#39493](https://github.com/owncloud/core/pull/39493)

   https://github.com/owncloud/core/pull/39493

* Enhancement - Change the size of the ownCloud logo in the mail header image: [#39501](https://github.com/owncloud/core/pull/39501)

   https://github.com/owncloud/core/pull/39501

* Enhancement - Add user:home:list-dirs and user:home:list-users commands: [#39579](https://github.com/owncloud/core/pull/39579)

   Added two new users commands:

   * `occ user:home:list-dirs` List all homes which are currently used by users * `occ
   user:home:list-users <path>` List all users who have their home in a given path * `occ
   user:home:list-users --all` List all users for every home path

   https://github.com/owncloud/core/issues/39502
   https://github.com/owncloud/core/pull/39579
   https://github.com/owncloud/core/pull/39583

* Enhancement - Expand file name area to click: [#39592](https://github.com/owncloud/core/pull/39592)

   With this change, the file name area to click will expand, this is helpful with very small file or
   folder names (e.g. single digit).

   https://github.com/owncloud/core/issues/39591
   https://github.com/owncloud/core/pull/39592

* Enhancement - Add support for the x-office/drawing mimetype: [#39594](https://github.com/owncloud/core/pull/39594)

   https://github.com/owncloud/core/issues/39593
   https://github.com/owncloud/core/pull/39594

Changelog for ownCloud Core [10.8.0] (2021-07-15)
=======================================
The following sections list the changes in ownCloud core 10.8.0 relevant to
ownCloud admins and users.

[10.8.0]: https://github.com/owncloud/core/compare/v10.7.0...v10.8.0

Summary
-------

* Bugfix - Use trusted domains to compute the signature of signed urls: [#38465](https://github.com/owncloud/core/pull/38465)
* Bugfix - Handle exceptions with inaccesible federated share: [#38474](https://github.com/owncloud/core/pull/38474)
* Bugfix - Fix mispositioned ui elements after leaving viewerMode: [#38547](https://github.com/owncloud/core/issues/38547)
* Bugfix - Fix move operation from encrypted storage to unencrypted storage: [#38567](https://github.com/owncloud/core/pull/38567)
* Bugfix - Creating self group-reshare should not not share to self: [#38581](https://github.com/owncloud/core/pull/38581)
* Bugfix - Check quota on the necessary move operations: [#38591](https://github.com/owncloud/core/pull/38591)
* Bugfix - Normalize web.baseUrl before using it: [#38600](https://github.com/owncloud/core/issues/38600)
* Bugfix - Don't rewrite private/public links when web app disabled: [#38602](https://github.com/owncloud/core/issues/38602)
* Bugfix - When validating rereshare permission make sure to check parent mountpoint: [#4497](https://github.com/owncloud/enterprise/issues/4497)
* Bugfix - Objectids for comments and tags are strings: [#38682](https://github.com/owncloud/core/pull/38682)
* Bugfix - Hide sensible information on share download: [#38689](https://github.com/owncloud/core/pull/38689)
* Bugfix - Hide file drop content: [#38691](https://github.com/owncloud/core/pull/38691)
* Bugfix - Regenerate session after authenticate a password protected public share: [#38693](https://github.com/owncloud/core/pull/38693)
* Bugfix - Add check when updating the permissions of a federated share: [#38698](https://github.com/owncloud/core/pull/38698)
* Bugfix - Prevent renaming or deleting a SMB mount point: [#38709](https://github.com/owncloud/core/pull/38709)
* Bugfix - String to bool conversion in systemtags API: [#38719](https://github.com/owncloud/core/pull/38719)
* Bugfix - Database query filter when getting a tag: [#38725](https://github.com/owncloud/core/pull/38725)
* Bugfix - Fix federated share download bug happens on some providers: [#38738](https://github.com/owncloud/core/pull/38738)
* Bugfix - Correctly parse different ocm-provider api responses: [#38751](https://github.com/owncloud/core/pull/38751)
* Bugfix - Move files_antivirus executable mode config options into config.php: [#38753](https://github.com/owncloud/core/pull/38753)
* Bugfix - Delay getting the file info until it's going to be used: [#38767](https://github.com/owncloud/core/pull/38767)
* Bugfix - Expire shares at end of day: [#4324](https://github.com/owncloud/enterprise/issues/4324)
* Bugfix - Image preview for file versions: [#38778](https://github.com/owncloud/core/pull/38778)
* Bugfix - Prevent files:checksum:verify from crashing on exception: [#38785](https://github.com/owncloud/core/pull/38785)
* Bugfix - Include incoming and parent permissions in Share UI subfolder reshares: [#38788](https://github.com/owncloud/core/pull/38788)
* Bugfix - Always allow renaming shared mounts: [#38794](https://github.com/owncloud/core/pull/38794)
* Bugfix - Adjust position of the share autocomplete element: [#38831](https://github.com/owncloud/core/pull/38831)
* Bugfix - Fix docs link to federated sharing docs: [#38859](https://github.com/owncloud/core/issues/38859)
* Bugfix - Fix file locks for public shares: [#38922](https://github.com/owncloud/core/pull/38922)
* Change - Update Symfony components: [#38924](https://github.com/owncloud/core/pull/38924)
* Change - Update PHP dependencies: [#38524](https://github.com/owncloud/core/pull/38524)
* Change - Bump doctrine/dbal from 2.10.4 to 2.13.1: [#38647](https://github.com/owncloud/core/pull/38647)
* Change - Improve performance for the MOVE operation: [#38649](https://github.com/owncloud/core/pull/38649)
* Change - Optimize share rename: [#38656](https://github.com/owncloud/core/pull/38656)
* Change - All mount configuration items marked as passwords will be encrypted: [#38728](https://github.com/owncloud/core/pull/38728)
* Change - Change favicon and color references to match the new CI: [#38750](https://github.com/owncloud/core/pull/38750)
* Change - Update PHP minimum version to 7.2.5: [#38934](https://github.com/owncloud/core/pull/38934)
* Change - Update url for sync client button and docs: [#38962](https://github.com/owncloud/core/pull/38962)
* Change - Update PHP dependencies: [#38891](https://github.com/owncloud/core/pull/38891)
* Enhancement - Improve public share federation user interface: [#4393](https://github.com/owncloud/enterprise/issues/4393)
* Enhancement - Improve login form: [#38506](https://github.com/owncloud/core/pull/38506)
* Enhancement - Automations in activity stream: [#38605](https://github.com/owncloud/core/pull/38605)
* Enhancement - Add html template for calens: [#38616](https://github.com/owncloud/core/pull/38616)
* Enhancement - Expired shares in activity stream: [#38631](https://github.com/owncloud/core/pull/38631)
* Enhancement - Use relative notification URLs: [#38639](https://github.com/owncloud/core/pull/38639)
* Enhancement - Add excludeActions parameter to registerDefaultActions function: [#38643](https://github.com/owncloud/core/pull/38643)
* Enhancement - Improve tab headers UI: [#38653](https://github.com/owncloud/core/pull/38653)
* Enhancement - Add trashbin skip list to config: [#38704](https://github.com/owncloud/core/pull/38704)
* Enhancement - Remove google+ share button from personal settings: [#38705](https://github.com/owncloud/core/pull/38705)
* Enhancement - Adjust the return type of the querybuilder's execute method: [#38714](https://github.com/owncloud/core/pull/38714)
* Enhancement - Communicate user profile picture capability: [#38722](https://github.com/owncloud/core/pull/38722)
* Enhancement - Allow apps to implement their own license: [#38737](https://github.com/owncloud/core/pull/38737)
* Enhancement - Command occ user:report shows additional row for guests: [#3467](https://github.com/owncloud/enterprise/issues/3467)
* Enhancement - Improve mobile user interface on files list: [#38748](https://github.com/owncloud/core/pull/38748)
* Enhancement - Resend invitation email: [#38774](https://github.com/owncloud/core/pull/38774)
* Enhancement - Add more properties to the REPORT result: [#38787](https://github.com/owncloud/core/pull/38787)
* Enhancement - Improve admin external storage settings UI: [#38795](https://github.com/owncloud/core/pull/38795)
* Enhancement - Introduce new state to prevent scanning of shallow scanned folders: [#38804](https://github.com/owncloud/core/pull/38804)
* Enhancement - Improve performance of the SMB log when it is inactive: [#38819](https://github.com/owncloud/core/pull/38819)
* Enhancement - Introduce the patch for CVE-2019-11358: [#38841](https://github.com/owncloud/core/pull/38841)
* Enhancement - Introduce a remove license button in WebUI: [#38843](https://github.com/owncloud/core/issues/38843)
* Enhancement - Show notification if video playback is not possible on public share: [#4632](https://github.com/owncloud/enterprise/issues/4632)
* Enhancement - Trigger file scan after accepting a federated share: [#38880](https://github.com/owncloud/core/pull/38880)
* Enhancement - Allow to pass password on redis cluster connection: [#38917](https://github.com/owncloud/core/pull/38917)

Details
-------

* Bugfix - Use trusted domains to compute the signature of signed urls: [#38465](https://github.com/owncloud/core/pull/38465)

   All configured trusted domains are used when computing the signature of a signed url. The
   server has no real true understanding for which domain the request is sent. Especially in proxy
   scenarios this is a must have.

   https://github.com/owncloud/core/pull/38465

* Bugfix - Handle exceptions with inaccesible federated share: [#38474](https://github.com/owncloud/core/pull/38474)

   In a scenario federation share storage is inaccessible and returns connection timeouts,
   federated share storage now does not return not found but storage not available. Additionaly
   logging and notifications handling has been improved.

   https://github.com/owncloud/enterprise/issues/4311
   https://github.com/owncloud/core/pull/38474

* Bugfix - Fix mispositioned ui elements after leaving viewerMode: [#38547](https://github.com/owncloud/core/issues/38547)

   Until today, after leaving the viewer mode (e.G Pdf viewer) the action header table in the files
   list was mispositioned while checking an item. The download action and following items went
   out of sight.

   https://github.com/owncloud/core/issues/38547
   https://github.com/owncloud/core/pull/38552

* Bugfix - Fix move operation from encrypted storage to unencrypted storage: [#38567](https://github.com/owncloud/core/pull/38567)

   On a move operation from encrypted storage to unencrypted storage, the moved file was
   remaining encrypted. This problem has been fixed.

   https://github.com/owncloud/encryption/issues/256
   https://github.com/owncloud/encryption/issues/257
   https://github.com/owncloud/core/pull/38567

* Bugfix - Creating self group-reshare should not not share to self: [#38581](https://github.com/owncloud/core/pull/38581)

   In a scenario where resharing with group that user belongs to, permissions and attributes were
   incorrectly handled in share mount logic when permissions for that share got adjusted, or that
   share got again reshared to another user that again reshared with prior user. This bugfix
   prevents creation of self share mount in root folder of the user

   https://github.com/owncloud/enterprise/issues/4382
   https://github.com/owncloud/core/pull/38581

* Bugfix - Check quota on the necessary move operations: [#38591](https://github.com/owncloud/core/pull/38591)

   When encryption is active, a move operation between two different storages was leading to a
   broken copy on target storage if the target has not enough quota. This data loss problem has been
   resolved.

   https://github.com/owncloud/core/pull/38591

* Bugfix - Normalize web.baseUrl before using it: [#38600](https://github.com/owncloud/core/issues/38600)

   `web.baseUrl` was used for rewriting private and public links to the new web UI without
   normalizing it. This leads to broken authentication if the `web.baseUrl` was configured with
   a trailing slash.

   https://github.com/owncloud/core/issues/38600

* Bugfix - Don't rewrite private/public links when web app disabled: [#38602](https://github.com/owncloud/core/issues/38602)

   When oc10 app is installed but disabled, we still showed the nav item and rewrote the URLs for
   private and public links.

   https://github.com/owncloud/core/issues/38602
   https://github.com/owncloud/core/pull/38603

* Bugfix - When validating rereshare permission make sure to check parent mountpoint: [#4497](https://github.com/owncloud/enterprise/issues/4497)

   When receiving reshare for a group from parent folder and subfolder of that folder with lower
   permission, further reshares were subject to subfolder reshare permissions due to issue with
   resolving parent mountpoint. With this change we now ensure to take parent mountpoint out of
   received mountpoints

   https://github.com/owncloud/enterprise/issues/4497
   https://github.com/owncloud/enterprise/issues/4382
   https://github.com/owncloud/core/pull/38625
   https://github.com/owncloud/core/pull/38651
   https://github.com/owncloud/core/pull/38862

* Bugfix - Objectids for comments and tags are strings: [#38682](https://github.com/owncloud/core/pull/38682)

   We were using integers when asking for some information related to comments and tag. This was
   working fine, but PHP 7.4.18 made some changes in the postgresql driver making things more
   strict. As result, some queries were failing because that information was stored as string,
   not integer.

   This problem is now fixed, and the queries can run without problems.

   https://github.com/owncloud/core/pull/38682

* Bugfix - Hide sensible information on share download: [#38689](https://github.com/owncloud/core/pull/38689)

   Sensible information could be exposed when downloading a share via public link. We now throw a
   generic exception that overwrites the original exception message. Also fixed an error which
   caused such behavior when appending a null byte to the download URL.

   https://github.com/owncloud/enterprise/issues/4536
   https://github.com/owncloud/core/pull/38689

* Bugfix - Hide file drop content: [#38691](https://github.com/owncloud/core/pull/38691)

   Requesting file drop share with the deprecated shareinfo API, exposed information about the
   content of the file drop share. We will now deliver empty content on the children entry.

   https://github.com/owncloud/enterprise/issues/4540
   https://github.com/owncloud/core/pull/38691

* Bugfix - Regenerate session after authenticate a password protected public share: [#38693](https://github.com/owncloud/core/pull/38693)

   Session has been has not been regenerated after authenticate a password protected public
   share. Now we regenerate the session and delete the old one for anonymous users.

   https://github.com/owncloud/enterprise/issues/4535
   https://github.com/owncloud/core/pull/38693

* Bugfix - Add check when updating the permissions of a federated share: [#38698](https://github.com/owncloud/core/pull/38698)

   This fixes a security issue where a federated share recipient could increase permissions on
   his share. We now limit the permission updates to federated re-shares only.

   https://github.com/owncloud/enterprise/issues/4537
   https://github.com/owncloud/core/pull/38698

* Bugfix - Prevent renaming or deleting a SMB mount point: [#38709](https://github.com/owncloud/core/pull/38709)

   Renaming or deleting a SMB mount point will throw a 403 error code

   https://github.com/owncloud/core/pull/38709

* Bugfix - String to bool conversion in systemtags API: [#38719](https://github.com/owncloud/core/pull/38719)

   String values like "true" and "false" were always converted to true when creating a tag via API.
   We now use filter_var() to fix this behavior.

   https://github.com/owncloud/core/pull/38719

* Bugfix - Database query filter when getting a tag: [#38725](https://github.com/owncloud/core/pull/38725)

   The filter values for userAssignable and userEditable were swapped, causing a wrong result in
   certain cases.

   https://github.com/owncloud/core/pull/38725

* Bugfix - Fix federated share download bug happens on some providers: [#38738](https://github.com/owncloud/core/pull/38738)

   Some WebDAV service providers are not able to respond properly when the HTTP client
   request_fulluri option set without proxy. Now, the HTTP client request_fulluri option set
   only if a proxy configured.

   https://github.com/owncloud/core/pull/38738

* Bugfix - Correctly parse different ocm-provider api responses: [#38751](https://github.com/owncloud/core/pull/38751)

   Some WebDAV service providers returns different responses for ocm-provider API and we were
   not able to parse these responses. This problem has been fixed.

   https://github.com/owncloud/core/pull/38751

* Bugfix - Move files_antivirus executable mode config options into config.php: [#38753](https://github.com/owncloud/core/pull/38753)

   Executable mode of the files_antivirus app is now configured in the core config.php file.

   https://github.com/owncloud/core/pull/38753
   https://github.com/owncloud/files_antivirus/pull/442

* Bugfix - Delay getting the file info until it's going to be used: [#38767](https://github.com/owncloud/core/pull/38767)

   Some operations require getting the file info to perform the action. Previously, this file
   info was fetched and stored before any operation. In some cases fetching the file info
   triggered a file scan that could delay the whole request considerably.

   Now, we fetch the file info only in those operations that require it. There are some node
   operations such as getting the file path that don't require fetching the file info, so those
   operation won't fetch it, and so a potential file scan is prevented (for those operations)

   https://github.com/owncloud/core/pull/38767

* Bugfix - Expire shares at end of day: [#4324](https://github.com/owncloud/enterprise/issues/4324)

   The Expire Share background job was immediately expiring shares that had an expiration date of
   today. But those shares should continue to work for the rest of the day. The behaviour has been
   corrected. All shares will now work until the end of the day that they expire.

   https://github.com/owncloud/enterprise/issues/4324
   https://github.com/owncloud/core/pull/38775

* Bugfix - Image preview for file versions: [#38778](https://github.com/owncloud/core/pull/38778)

   Changed the way how preview thumbnails are being rendered so they will be rendered properly for
   file versions.

   https://github.com/owncloud/core/issues/38766
   https://github.com/owncloud/core/pull/38778

* Bugfix - Prevent files:checksum:verify from crashing on exception: [#38785](https://github.com/owncloud/core/pull/38785)

   The command now skips files with exceptions instead of crashing. A proper message will be
   displayed to the user who fires the command.

   https://github.com/owncloud/core/issues/38782
   https://github.com/owncloud/core/pull/38785
   https://github.com/owncloud/core/pull/39005

* Bugfix - Include incoming and parent permissions in Share UI subfolder reshares: [#38788](https://github.com/owncloud/core/pull/38788)

   Before this fix SharePanel in Share UI did not include permissions of both incoming and parent
   shares for subfolder reshares. It caused lack of possibility of resharing such files/folder
   even though server-side permissions allowed it.

   https://github.com/owncloud/enterprise/issues/4497
   https://github.com/owncloud/core/pull/38788

* Bugfix - Always allow renaming shared mounts: [#38794](https://github.com/owncloud/core/pull/38794)

   We now skip the initial permission check when renaming a shared mount as this should always be
   possible.

   https://github.com/owncloud/enterprise/issues/4582
   https://github.com/owncloud/core/issues/30325
   https://github.com/owncloud/core/pull/38794

* Bugfix - Adjust position of the share autocomplete element: [#38831](https://github.com/owncloud/core/pull/38831)

   We now append the share autocomplete element to #shareTabView to prevent the autocomplete
   dialog from being hidden in certain scenarios. This happened with Safari for example as soon as
   the filelist was long enough to have a vertical scrollbar.

   https://github.com/owncloud/enterprise/issues/4603
   https://github.com/owncloud/core/pull/38831

* Bugfix - Fix docs link to federated sharing docs: [#38859](https://github.com/owncloud/core/issues/38859)

   The link in the share dialogue on the info icon was broken. Was fixed by pointing to the correct
   config value.

   https://github.com/owncloud/core/issues/38859
   https://github.com/owncloud/core/pull/38860

* Bugfix - Fix file locks for public shares: [#38922](https://github.com/owncloud/core/pull/38922)

   When using the new WebDAV API, the node which is used to retrieve file locks is either of type
   SharedFile or SharedFolder. Both these types do not implement our own node class, so we need to
   handle them separately. This is needed to properly handle file locks on public shares when
   using the new WebDAV API.

   https://github.com/owncloud/core/issues/38912
   https://github.com/owncloud/core/issues/36064
   https://github.com/owncloud/core/pull/38922

* Change - Update Symfony components: [#38924](https://github.com/owncloud/core/pull/38924)

   The following Symfony components have been updated from 4.4.20 to: - console 4.4.26 -
   event-dispatcher 4.4.25 - process 4.4.26 - routing 4.4.25 - translation 4.4.25

   The following Symfony polyfill components have been updated : - symfony/polyfill-ctype
   (v1.22.1 to v1.23.0) - symfony/polyfill-iconv (v1.22.1 to v1.23.0) -
   symfony/polyfill-intl-idn (v1.22.1 to v1.23.0) - symfony/polyfill-intl-normalizer
   (v1.22.1 to v1.23.0) - symfony/polyfill-mbstring (v1.22.1 to v1.23.0) -
   symfony/polyfill-php72 (v1.22.1 to v1.23.0) - symfony/polyfill-php73 (v1.22.1 to
   v1.23.0) - symfony/polyfill-php80 (v1.22.1 to v1.23.0)

   https://github.com/owncloud/core/pull/38924
   https://github.com/owncloud/core/pull/38797
   https://github.com/owncloud/core/pull/38755
   https://github.com/owncloud/core/pull/38730
   https://github.com/owncloud/core/pull/38680
   https://github.com/owncloud/core/pull/38598
   https://github.com/owncloud/core/pull/38786
   https://symfony.com/blog/symfony-4-4-26-released
   https://symfony.com/blog/symfony-4-4-25-released
   https://symfony.com/blog/symfony-4-4-24-released
   https://symfony.com/blog/symfony-4-4-23-released
   https://symfony.com/blog/symfony-4-4-22-released
   https://symfony.com/blog/symfony-4-4-21-released

* Change - Update PHP dependencies: [#38524](https://github.com/owncloud/core/pull/38524)

   The following have been updated: - doctrine/cache (1.10.2 to 2.0.3) - doctrine/dbal (2.13.1
   to 2.13.2) - egulias/email-validator (3.1.0 to 3.1.1) - icewind/streams (0.7.3 to 0.7.5) -
   opis/closure (3.6.1 to 3.6.2) - pear/pear_exception (v1.0.1 to v1.0.2) -
   phpseclib/phpseclib (3.0.6 to 3.0.9) - psr/log (1.1.3 to 1.1.4)

   The following have been updated in files_external/3rdparty: - firebase/php-jwt (v5.2.1 to
   v5.3.0) - google/apiclient (v2.9.1 to v2.9.2) - google/apiclient-services (v0.164.0 to
   v0.181.0) - google/auth (v1.15.0 to v1.15.1) - guzzlehttp/psr7 (1.7.0 to 1.8.2) -
   icewind/smb (3.3.1 to 3.4.1) - icewind/streams (0.7.3 to 0.7.5) - phpseclib/phpseclib
   (3.0.6 to 3.0.9) - psr/log (1.1.3 to 1.1.4)

   https://github.com/owncloud/core/pull/38524
   https://github.com/owncloud/core/pull/38598
   https://github.com/owncloud/core/pull/38620
   https://github.com/owncloud/core/pull/38646
   https://github.com/owncloud/core/pull/38648
   https://github.com/owncloud/core/pull/38659
   https://github.com/owncloud/core/pull/38688
   https://github.com/owncloud/core/pull/38749
   https://github.com/owncloud/core/pull/38786
   https://github.com/owncloud/core/pull/38839
   https://github.com/owncloud/core/pull/38845
   https://github.com/owncloud/core/pull/38878

* Change - Bump doctrine/dbal from 2.10.4 to 2.13.1: [#38647](https://github.com/owncloud/core/pull/38647)

   Implemented the new method executeStatement in our DB Connection class as Doctrine calls this
   method now instead of the deprecated executeUpdate.

   https://github.com/owncloud/core/issues/38681
   https://github.com/owncloud/core/pull/38647

* Change - Improve performance for the MOVE operation: [#38649](https://github.com/owncloud/core/pull/38649)

   Previously, in order to move a folder, we needed to get all the content and replace the path of
   each one one by one. Now we replace the path of all the content in one DB query, which reduces the
   network traffic and allows better optimization in the DB. This change affects MySQL, MariaDB,
   Postgresql, and Oracle. Sqlite is excluded from this optimization and will use the previous
   behaviour.

   https://github.com/owncloud/core/pull/38649

* Change - Optimize share rename: [#38656](https://github.com/owncloud/core/pull/38656)

   Renaming a received share could cause a file scan to be triggered. This could potentially be a
   performance problem if the file scan took a while.

   Now, renaming a received share won't trigger that file scan, so the performance will be faster.

   https://github.com/owncloud/core/pull/38656

* Change - All mount configuration items marked as passwords will be encrypted: [#38728](https://github.com/owncloud/core/pull/38728)

   Previously, only some known configuration items were encrypted. This was a problem for new
   items that required protection because this required changes in the core product.

   Now, all the items marked as passwords will be encrypted. This will be done automatically
   without 3rd party apps needing to do anything. A migration is also provided to update the items
   if needed.

   https://github.com/owncloud/core/pull/38728

* Change - Change favicon and color references to match the new CI: [#38750](https://github.com/owncloud/core/pull/38750)

   We changed some color references to match the new CI-color of ownCloud. Also a new header image
   for the mail templates and the ownCloud logo without the "X" reference was added.

   https://github.com/owncloud/core/pull/38750

* Change - Update PHP minimum version to 7.2.5: [#38934](https://github.com/owncloud/core/pull/38934)

   The minimum supported PHP version is now 7.2.5. This supports some dependencies that require
   at least 7.2.5.

   PHP 7.2 security patches finished in December 2020. PHP 7.3 security patches finish on 6
   December 2021. It is recommended that you plan an upgrade to PHP 7.4 now.

   https://github.com/owncloud/core/pull/38934
   https://www.php.net/supported-versions.php

* Change - Update url for sync client button and docs: [#38962](https://github.com/owncloud/core/pull/38962)

   https://github.com/owncloud/core/issues/38957
   https://github.com/owncloud/core/pull/38962

* Change - Update PHP dependencies: [#38891](https://github.com/owncloud/core/pull/38891)

   The following have been updated: - league/flysystem (1.0.70 => 1.1.4) - punic/punic (3.5.1 =>
   3.6.0) - symfony/service-contracts (v1.1.9 => v2.4.0) - symfony/translation-contracts
   (v1.1.10 => v2.4.0)

   https://github.com/owncloud/core/pull/38891

* Enhancement - Improve public share federation user interface: [#4393](https://github.com/owncloud/enterprise/issues/4393)

   This adjustment provides a new way to add a public share to ownCloud. A new button will be
   displayed where you can easily add the share to the current server without entering the string,
   this requires less user input. Next to this button, a dropdown menu will be displayed, where you
   can see the current server or change the server. Hitting change a server will now display a
   prompt with a detailed explanation and more space to enter another server address.

   https://github.com/owncloud/enterprise/issues/4393
   https://github.com/owncloud/core/pull/38712
   https://github.com/owncloud/core/pull/38928
   https://github.com/owncloud/core/pull/38942
   https://github.com/owncloud/core/pull/38948

* Enhancement - Improve login form: [#38506](https://github.com/owncloud/core/pull/38506)

   This adjustment improves the overall look and feel of the login form. Furthermore, the
   placeholders have been replaced in favor of labels, the confirm button has been expunged from
   the password field and placed under the input fields.

   https://github.com/owncloud/core/pull/38506
   https://github.com/owncloud/core/pull/38853
   https://github.com/owncloud/core/pull/38894

* Enhancement - Automations in activity stream: [#38605](https://github.com/owncloud/core/pull/38605)

   This adjustment provides a way to handle the activity stream for actions that were triggered by
   an automation (like the workflow app e.g.).

   https://github.com/owncloud/enterprise/issues/4222
   https://github.com/owncloud/core/pull/38605
   https://github.com/owncloud/core/pull/38630
   https://github.com/owncloud/core/pull/38970

* Enhancement - Add html template for calens: [#38616](https://github.com/owncloud/core/pull/38616)

   Added an html template to render the changelog also in html format. This will give us better
   control over the rendering on the website.

   https://github.com/owncloud/core/pull/38616

* Enhancement - Expired shares in activity stream: [#38631](https://github.com/owncloud/core/pull/38631)

   Add a proper message in the activity stream for shares which expired automatically. Previous
   to this, the expiry was authored by a user, which is technically not true.

   https://github.com/owncloud/enterprise/issues/4455
   https://github.com/owncloud/core/pull/38631

* Enhancement - Use relative notification URLs: [#38639](https://github.com/owncloud/core/pull/38639)

   Previous to this fix, absolute URLs were passed to the notification app. This could cause some
   CORS issues, hence we now use relative ones.

   https://github.com/owncloud/enterprise/issues/4250
   https://github.com/owncloud/core/pull/38639

* Enhancement - Add excludeActions parameter to registerDefaultActions function: [#38643](https://github.com/owncloud/core/pull/38643)

   With this change we can pass now excludeActions to the registerDefaultActions function in
   fileactions.js, this allows us technically to omit specific file actions.

   https://github.com/owncloud/core/pull/38643

* Enhancement - Improve tab headers UI: [#38653](https://github.com/owncloud/core/pull/38653)

   With this change, tab headers will have a similar style to other nav elements, like the side nav.
   Also improved the UI on small display ratio, where elements in the second row were not properly
   left-aligned.

   https://github.com/owncloud/core/pull/38653

* Enhancement - Add trashbin skip list to config: [#38704](https://github.com/owncloud/core/pull/38704)

   With this change new config parameters has been introduced. Admins can now decide, based on
   file extensions, directory names and size, if a resource should not be observed by the trashbin
   and deleted immediately.

   https://github.com/owncloud/core/pull/38704
   https://github.com/owncloud/core/pull/38960

* Enhancement - Remove google+ share button from personal settings: [#38705](https://github.com/owncloud/core/pull/38705)

   Due to the google+ service has been declined, we won't show the google+ share button anymore.

   https://github.com/owncloud/core/pull/38705

* Enhancement - Adjust the return type of the querybuilder's execute method: [#38714](https://github.com/owncloud/core/pull/38714)

   The return type changed with the recent update of doctrine/dbal to version 2.13.

   https://github.com/owncloud/core/pull/38714

* Enhancement - Communicate user profile picture capability: [#38722](https://github.com/owncloud/core/pull/38722)

   A new capability "profile_picture" has been added so that clients can know whether to fetch and
   render avatar images of users.

   https://github.com/owncloud/core/pull/38722

* Enhancement - Allow apps to implement their own license: [#38737](https://github.com/owncloud/core/pull/38737)

   Apps can implement their own license parser by extending the \OCP\License\AbstractLicense
   class. Note that storing the license will still be performed by ownCloud. This custom license
   can provide additional information that can be queried through the ILicenseManager.

   https://github.com/owncloud/core/pull/38737

* Enhancement - Command occ user:report shows additional row for guests: [#3467](https://github.com/owncloud/enterprise/issues/3467)

   With this improvement, a new row will be rendered for guest user count on the occ user:report
   command.

   https://github.com/owncloud/enterprise/issues/3467
   https://github.com/owncloud/core/pull/38742

* Enhancement - Improve mobile user interface on files list: [#38748](https://github.com/owncloud/core/pull/38748)

   This improvement solves the problem that files and folders with a longer name than 10 chars will
   cut off to 7 chars by hiding non-essential meta data. As well the uploading indicator text on a
   folders table row will now be displayed at the beginning to avoid UI glitches.

   https://github.com/owncloud/core/pull/38748

* Enhancement - Resend invitation email: [#38774](https://github.com/owncloud/core/pull/38774)

   Implemented an action to resend the invitation email for a user that has never been logged in
   yet.

   https://github.com/owncloud/enterprise/issues/4577
   https://github.com/owncloud/core/pull/38774
   https://github.com/owncloud/core/pull/38963

* Enhancement - Add more properties to the REPORT result: [#38787](https://github.com/owncloud/core/pull/38787)

   File Search should be done in the future via WebDAV REPORT requests. ownCloud web is using it. In
   some cases with other search backends we have more properties to return.
   `<oc:search-highlights />` => returns am html formatted excerpt of the file content which is
   highlighting the matching words. `<oc:search-score />` returns a float number score value.

   https://github.com/owncloud/core/pull/38787

* Enhancement - Improve admin external storage settings UI: [#38795](https://github.com/owncloud/core/pull/38795)

   Before this PR no error notification was shown while an external mount point configuration was
   not able to load. This was only indicated with a red square with a long list of external mount
   points, this was not handy. Therefore an error notification will be shown with the dedicated
   external mount point which fails to load.

   As well improved the add external mount point functionality with opening the available for
   select while adding an external mount point. The select will have now a 'select all' item. These
   changes prevents the admin to expose the mount point unwanted to all users immediately.

   https://github.com/owncloud/enterprise/issues/4585
   https://github.com/owncloud/core/pull/38795

* Enhancement - Introduce new state to prevent scanning of shallow scanned folders: [#38804](https://github.com/owncloud/core/pull/38804)

   Folders can be partially scanned, this means that a folder could have its closest contents
   scanned (the first level), but not deeper contents. Folder "/A" could be scanned but not
   "/A/B/C".

   Previously, we couldn't detect that a folder had been partially scanned, so we triggered
   another scan on that folder even though we already had data in the DB.

   Now, we can detect that the folder has been partially scanned to avoid another scan if it isn't
   needed. This leads to notable performance improvements in cases where a FS hasn't been scanned
   fully. Note that an initial scan is still required, and the performance will remain the same in
   this case.

   https://github.com/owncloud/core/pull/38804

* Enhancement - Improve performance of the SMB log when it is inactive: [#38819](https://github.com/owncloud/core/pull/38819)

   The SMB connector includes very verbose logs to trace what could have gone wrong. These logs are
   disabled by default, but although they're disabled we still need to check the state to decide
   whether we want to log or not.

   Now, the state check is faster and it takes less time to decide, so the overall performance of the
   connector is improved.

   https://github.com/owncloud/core/pull/38819

* Enhancement - Introduce the patch for CVE-2019-11358: [#38841](https://github.com/owncloud/core/pull/38841)

   Patched jQuery's `$.extend` method. The code in core doesn't contain any vulnerable
   invocations of `$.extend` this is just a preventive patch.

   https://github.com/owncloud/core/pull/38841
   https://nvd.nist.gov/vuln/detail/CVE-2019-11358
   https://blog.jquery.com/2019/04/10/jquery-3-4-0-released/
   https://github.com/DanielRuf/snyk-js-jquery-174006?files=1

* Enhancement - Introduce a remove license button in WebUI: [#38843](https://github.com/owncloud/core/issues/38843)

   Before this PR, it was not possible, to remove any ownCloud license. This lead to an issue if
   someone enters an invalid license, a permanent message indicator was shown in the WebUI. With
   this PR it is possible to remove the license.

   https://github.com/owncloud/core/issues/38843
   https://github.com/owncloud/core/pull/38844

* Enhancement - Show notification if video playback is not possible on public share: [#4632](https://github.com/owncloud/enterprise/issues/4632)

   Before this PR no error notification was shown if a video can't be played due to browser
   incompatibility, for example, mov files on chrome.
   (https://stackoverflow.com/questions/28746645)

   Now we will show a dedicated notification.

   https://github.com/owncloud/enterprise/issues/4632
   https://github.com/owncloud/core/pull/38858

* Enhancement - Trigger file scan after accepting a federated share: [#38880](https://github.com/owncloud/core/pull/38880)

   This is necessary as we need the fileId to pass it to the `remoteshare.accepted` event. The
   activity app can then hook onto this event and update the activity by setting the correct
   fileId.

   Also added a short translation for the SUBJECT_REMOTE_SHARE_RECEIVED activity.

   https://github.com/owncloud/activity/issues/970
   https://github.com/owncloud/core/pull/38880
   https://github.com/owncloud/core/pull/38889

* Enhancement - Allow to pass password on redis cluster connection: [#38917](https://github.com/owncloud/core/pull/38917)

   https://github.com/owncloud/enterprise/issues/4658
   https://github.com/owncloud/core/pull/38917

Changelog for ownCloud Core [10.7.0] (2021-03-26)
=======================================
The following sections list the changes in ownCloud core 10.7.0 relevant to
ownCloud admins and users.

[10.7.0]: https://github.com/owncloud/core/compare/v10.6.0...v10.7.0

Summary
-------

* Bugfix - Fix some code smells reported by SonarCloud: [#38147](https://github.com/owncloud/core/pull/38147)
* Bugfix - Don't redirect if the browser ask for a .properties file: [#38181](https://github.com/owncloud/core/pull/38181)
* Bugfix - Show the share list even if some shares point to unavailable storages: [#38190](https://github.com/owncloud/core/pull/38190)
* Bugfix - Fix a regression with theming of settings menu icons: [#38246](https://github.com/owncloud/core/pull/38246)
* Bugfix - Determine unencrypted block size after begin operation: [#38249](https://github.com/owncloud/core/pull/38249)
* Bugfix - Allow all users to see which groups they manage: [#38281](https://github.com/owncloud/core/pull/38281)
* Bugfix - Fix the position of the user afterLogin-event: [#38289](https://github.com/owncloud/core/pull/38289)
* Bugfix - Fix file_target in response when creating a public link share: [#38291](https://github.com/owncloud/core/issues/38291)
* Bugfix - Fix rendering of leading/trailing spaces in the file name: [#38316](https://github.com/owncloud/core/issues/38316)
* Bugfix - Prevent getting a version expiry list when no versions available: [#38390](https://github.com/owncloud/core/pull/38390)
* Bugfix - Fix broken signature when a backup copy is generated: [#38375](https://github.com/owncloud/core/pull/38375)
* Bugfix - Prevent multiple calls by not registering the same listener twice: [#38385](https://github.com/owncloud/core/pull/38385)
* Bugfix - Add the owner to public link shares: [#38396](https://github.com/owncloud/core/pull/38396)
* Bugfix - Fix issues with duplicated file names in the same directory: [#38415](https://github.com/owncloud/core/pull/38415)
* Bugfix - Show non-generic messages for 403 HTTP status to end user: [#395](https://github.com/owncloud/files_antivirus/issues/395)
* Bugfix - Fix command maintenance:mimetype:update-db --repair-filecache: [#38425](https://github.com/owncloud/core/issues/38425)
* Bugfix - Fix storage lookup in versions when storing a new version: [#38430](https://github.com/owncloud/core/pull/38430)
* Bugfix - Fix behavior for user search at the API level: [#38489](https://github.com/owncloud/core/pull/38489)
* Bugfix - Fix mispositioned ui elements after leaving viewerMode: [#38547](https://github.com/owncloud/core/issues/38547)
* Bugfix - Fix problems moving files inside Gdrive storages: [#38553](https://github.com/owncloud/core/pull/38553)
* Change - Use OcsController and routes instead of API::register: [#37272](https://github.com/owncloud/core/pull/37272)
* Change - API changes to remove shares pointing to missing files: [#38152](https://github.com/owncloud/core/pull/38152)
* Change - Rename phoenix to web: [#38199](https://github.com/owncloud/core/pull/38199)
* Change - Update symfony/polyfill (1.20.0 => 1.22.1): [#38275](https://github.com/owncloud/core/pull/38275)
* Change - Remove package patchwork/utf8: [#38286](https://github.com/owncloud/core/pull/38286)
* Change - Change X-XSS-Protection "1; block" -> "0": [#38236](https://github.com/owncloud/core/issues/38236)
* Change - Update Symfony components to 4.4.20: [#38462](https://github.com/owncloud/core/pull/38462)
* Change - Update icewind/smb from 3.2.7 to 3.3.1 in files_external: [#38462](https://github.com/owncloud/core/pull/38462)
* Change - Update PHP dependencies: [#38188](https://github.com/owncloud/core/pull/38188)
* Enhancement - Context menu for files in case multiple actions apply: [#38132](https://github.com/owncloud/core/pull/38132)
* Enhancement - New external storage: SMB Collaborative (shared file IDs)): [#38151](https://github.com/owncloud/core/pull/38151)
* Enhancement - Allow mounting a subfolder from Google Drive: [#38161](https://github.com/owncloud/core/pull/38161)
* Enhancement - Make the right scrollbar more visible on the UI: [#38183](https://github.com/owncloud/core/pull/38183)
* Enhancement - Improve file list tag management: [#38197](https://github.com/owncloud/core/pull/38197)
* Enhancement - Improve the UX in the external storage settings page: [#38288](https://github.com/owncloud/core/pull/38288)
* Enhancement - Prevent group assignment in Web UI if not supported: [#38298](https://github.com/owncloud/core/pull/38298)
* Enhancement - Display path in the occ app:list command: [#38309](https://github.com/owncloud/core/pull/38309)
* Enhancement - New config parameter to define the encrypted file format: [#38337](https://github.com/owncloud/core/pull/38337)
* Enhancement - Display error/success message while changing the log level: [#38340](https://github.com/owncloud/core/pull/38340)
* Enhancement - Implement pre-signed download urls for public links: [#38376](https://github.com/owncloud/core/pull/38376)
* Enhancement - Allow force set DB patforms: [#38379](https://github.com/owncloud/core/pull/38379)
* Enhancement - Added additional connection parameters to redis config: [#38386](https://github.com/owncloud/core/pull/38386)
* Enhancement - Hide federated user suggestions if system users are found: [#38389](https://github.com/owncloud/core/pull/38389)
* Enhancement - Indicate existing guest-user as a guest in the share tab: [#38440](https://github.com/owncloud/core/pull/38440)
* Enhancement - Add config parameter 'http.cookie.samesite': [#38458](https://github.com/owncloud/core/pull/38458)
* Enhancement - Add exception messages whenever a node cannot be moved: [#38481](https://github.com/owncloud/core/pull/38481)
* Enhancement - UI improvement external storage: [#38483](https://github.com/owncloud/core/pull/38483)
* Enhancement - Improve systemtags UI for delete and fix case sensitivity problem: [#38498](https://github.com/owncloud/core/pull/38498)

Details
-------

* Bugfix - Fix some code smells reported by SonarCloud: [#38147](https://github.com/owncloud/core/pull/38147)

   https://github.com/owncloud/core/pull/38147

* Bugfix - Don't redirect if the browser ask for a .properties file: [#38181](https://github.com/owncloud/core/pull/38181)

   In order to provide translations, the files_pdfviewer app requested a .properties file. This
   request failed because the server redirected it to the default page (the files view), so the app
   couldn't get the translations

   This redirection doesn't happen any longer, and the app can translate the UI elements now.

   https://github.com/owncloud/core/pull/38181

* Bugfix - Show the share list even if some shares point to unavailable storages: [#38190](https://github.com/owncloud/core/pull/38190)

   Previously, if some shares pointed to file nodes that belonged to unavailable storages, the
   share list wouldn't show any share due to the exception not being handled correctly.

   Now, the exception is handled. The affected shares will be ignored (an error message will
   appear in the log with the exception), and the rest of the shares will show in the web UI.

   Note that the steps to reproduce the problem are still unclear, and it might be impossible to
   reproduce the issue using recent ownCloud versions. So far, not only it seems required to have a
   share pointing to an unavailable storage, but also there has to be a pending modification for
   ownCloud to scan the file. Such conditions shouldn't be possible at the same time.

   https://github.com/owncloud/core/pull/38190

* Bugfix - Fix a regression with theming of settings menu icons: [#38246](https://github.com/owncloud/core/pull/38246)

   Default icons were loaded instead of the overrides from the enabled app-theme in the settings
   menu.

   https://github.com/owncloud/core/pull/38246

* Bugfix - Determine unencrypted block size after begin operation: [#38249](https://github.com/owncloud/core/pull/38249)

   Unencrypted block size of encrypted file can change with different encoding types.
   Unencrypted block size determination has been moved after begin operation in stream opening.
   In this way, EncryptionModule can decide block size after reading the header of the file.

   https://github.com/owncloud/core/pull/38249

* Bugfix - Allow all users to see which groups they manage: [#38281](https://github.com/owncloud/core/pull/38281)

   https://github.com/owncloud/core/pull/38281

* Bugfix - Fix the position of the user afterLogin-event: [#38289](https://github.com/owncloud/core/pull/38289)

   Move the emitting event "user.afterlogin" in the method loginWithPassword. Previously it
   was placed after the prepareUserLogin-call which caused some issues with the encryption app
   using Symfony event listeners.

   https://github.com/owncloud/core/pull/38289

* Bugfix - Fix file_target in response when creating a public link share: [#38291](https://github.com/owncloud/core/issues/38291)

   The value of share_folder (if set in config.php) was being prepended to the file_target field
   in the response to a request to create a public link share. share_folder is not relevant to
   public link shares. It is no longer prepended.

   https://github.com/owncloud/core/issues/38291
   https://github.com/owncloud/core/pull/38295

* Bugfix - Fix rendering of leading/trailing spaces in the file name: [#38316](https://github.com/owncloud/core/issues/38316)

   Leading and trailing spaces in the file name were stripped in the Web UI

   https://github.com/owncloud/core/issues/38316
   https://github.com/owncloud/core/pull/38319

* Bugfix - Prevent getting a version expiry list when no versions available: [#38390](https://github.com/owncloud/core/pull/38390)

   Previous to this fix, when getting a version expiry list with an empty version array, ownCloud
   ran into an error. Not a critical one, but still not nice and spams the owncloud.log file.

   https://github.com/owncloud/core/issues/38373
   https://github.com/owncloud/core/pull/38390

* Bugfix - Fix broken signature when a backup copy is generated: [#38375](https://github.com/owncloud/core/pull/38375)

   Previously, when a user uploaded a file and then moved it to a shared folder in order for a second
   user to get the file, a copy of the file was generated inside the share owner's trashbin. This
   allowed the share owner to restore the file into the share again if needed. Using encryption,
   that backup copy was wrongly generated and couldn't be decrypted due to a wrong signature.

   This issue is now fixed, and the backup copy can be restored normally.

   https://github.com/owncloud/encryption/issues/244
   https://github.com/owncloud/core/pull/38375
   https://github.com/owncloud/core/pull/38452

* Bugfix - Prevent multiple calls by not registering the same listener twice: [#38385](https://github.com/owncloud/core/pull/38385)

   Going back and forth among the file sections ("all files", "shared with you", etc) was making
   some event listeners to be registered twice or more times. This was causing the same ajax
   request to be called several times causing unnecessary load in the server.

   Now, these additional requests won't happen

   https://github.com/owncloud/core/pull/38385

* Bugfix - Add the owner to public link shares: [#38396](https://github.com/owncloud/core/pull/38396)

   Add the owner to public link shares because we cannot retrieve this information otherwise.

   https://github.com/owncloud/files_spaces/issues/51
   https://github.com/owncloud/core/pull/38396

* Bugfix - Fix issues with duplicated file names in the same directory: [#38415](https://github.com/owncloud/core/pull/38415)

   In some views like the "Shared by link"-list it is possible to have one or more files with the same
   name in one directory. This fix corrects plenty of wrong behaviors that such a scenario caused
   in the UI.

   https://github.com/owncloud/enterprise/issues/4412
   https://github.com/owncloud/core/pull/38415

* Bugfix - Show non-generic messages for 403 HTTP status to end user: [#395](https://github.com/owncloud/files_antivirus/issues/395)

   The real reason why 3rd party app canceled upload was ignored by Web UI and a generic 'You are not
   allowed to upload here' message was shown instead. Now 'You are not allowed to upload here' is
   shown only if a real reason is empty.

   https://github.com/owncloud/files_antivirus/issues/395
   https://github.com/owncloud/core/pull/38416

* Bugfix - Fix command maintenance:mimetype:update-db --repair-filecache: [#38425](https://github.com/owncloud/core/issues/38425)

   While running the command maintenance:mimetype:update-db --repair-filecache, existing
   records in the filecache table were not updated due to a faulty sql statement.

   https://github.com/owncloud/core/issues/38425
   https://github.com/owncloud/core/pull/38426

* Bugfix - Fix storage lookup in versions when storing a new version: [#38430](https://github.com/owncloud/core/pull/38430)

   Versioning has been integrated with the new storage based versioning IVersionedStorage.
   Until today this was only tested with objectstore versioning which is hooked up as primary
   storage. When trying to access a versioned storage which is mounted as non-root this logic did
   not work out.

   https://github.com/owncloud/core/pull/38430

* Bugfix - Fix behavior for user search at the API level: [#38489](https://github.com/owncloud/core/pull/38489)

   The 'user.search_min_length' restriction could be circumvented when accessing the API
   directly.

   https://github.com/owncloud/core/pull/38489

* Bugfix - Fix mispositioned ui elements after leaving viewerMode: [#38547](https://github.com/owncloud/core/issues/38547)

   Until today, after leaving the viewer mode (e.G Pdf viewer) the action header table in the files
   list was mispositioned while checking an item. The download action and following items went
   out of sight.

   https://github.com/owncloud/core/issues/38547
   https://github.com/owncloud/core/pull/38552

* Bugfix - Fix problems moving files inside Gdrive storages: [#38553](https://github.com/owncloud/core/pull/38553)

   Moving files inside a Gdrive storage broke, likely due to changes in the Gdrive server. This PR
   ensures it works again Moving files from local storage into the Gdrive storage is also fixed.

   https://github.com/owncloud/core/pull/38553

* Change - Use OcsController and routes instead of API::register: [#37272](https://github.com/owncloud/core/pull/37272)

   Implemented OcsController and removed a separate file to register ocs routes. Also some
   deprecated and legacy OC_OCS classes removed. OcsController now checks CSRF token instead of
   OCS_API_REQUEST header.

   https://github.com/owncloud/core/issues/12454
   https://github.com/owncloud/core/pull/37272

* Change - API changes to remove shares pointing to missing files: [#38152](https://github.com/owncloud/core/pull/38152)

   If a file was completely deleted without unsharing first, the share would still exist in the DB
   even though it wouldn't be shown to the users. This change prepares a way to remove those shares.

   https://github.com/owncloud/core/pull/38152

* Change - Rename phoenix to web: [#38199](https://github.com/owncloud/core/pull/38199)

   Phoenix has been renamed to Web. You can now set these keys in config.php to control Web:

   - web.baseUrl - web.icon - web.label

   https://github.com/owncloud/core/pull/38199
   https://github.com/owncloud/core/pull/38201
   https://github.com/owncloud/core/pull/38212

* Change - Update symfony/polyfill (1.20.0 => 1.22.1): [#38275](https://github.com/owncloud/core/pull/38275)

   The following symfony/polyfill components have been updated to version 1.22.1:

   Symfony/polyfill-ctype symfony/polyfill-iconv symfony/polyfill-intl-idn
   symfony/polyfill-intl-normalizer symfony/polyfill-mbstring symfony/polyfill-php72
   symfony/polyfill-php73 symfony/polyfill-php80

   https://github.com/owncloud/core/pull/38275
   https://github.com/owncloud/core/pull/38419

* Change - Remove package patchwork/utf8: [#38286](https://github.com/owncloud/core/pull/38286)

   https://github.com/owncloud/core/pull/38286
   https://github.com/owncloud/core/pull/38315

* Change - Change X-XSS-Protection "1; block" -> "0": [#38236](https://github.com/owncloud/core/issues/38236)

   OWASP/CheatSheetSeries#376 (comment)
   https://github.com/OWASP/CheatSheetSeries/issues/376#issuecomment-602663932
   Suggest remove vs. "0"
   https://github.com/helmetjs/helmet/issues/230#issuecomment-614106165
   X-XSS-Protection header has been deprecated
   https://owasp.org/www-project-secure-headers/#x-xss-protection

   https://github.com/owncloud/core/issues/38236
   https://github.com/owncloud/core/pull/38305

* Change - Update Symfony components to 4.4.20: [#38462](https://github.com/owncloud/core/pull/38462)

   The following Symfony components have been updated from 4.4.16 to 4.4.20 - console -
   event-dispatcher - process - routing - translation

   https://github.com/owncloud/core/pull/38462
   https://github.com/owncloud/core/pull/38355
   https://github.com/owncloud/core/pull/38234
   https://github.com/owncloud/core/pull/38163
   https://symfony.com/blog/symfony-4-4-20-released
   https://symfony.com/blog/symfony-4-4-19-released
   https://symfony.com/blog/symfony-4-4-18-released
   https://symfony.com/blog/symfony-4-4-17-released

* Change - Update icewind/smb from 3.2.7 to 3.3.1 in files_external: [#38462](https://github.com/owncloud/core/pull/38462)

   https://github.com/owncloud/core/pull/38462

* Change - Update PHP dependencies: [#38188](https://github.com/owncloud/core/pull/38188)

   The following have been updated: - christophwurst/id3parser (v0.1.1 to v0.1.2) -
   egulias/email-validator (2.1.24 to 3.1.0) - icewind/streams from (0.7.2 to 0.7.3) -
   laminas/laminas-validator (2.13.4 to 2.13.5) - laminas/laminas-servicemanager (3.4.1 to
   3.5.2) - nikic/php-parser (4.10.2 to 4.10.4) - pear/archive_tar (1.4.11 to 1.4.13) -
   phpseclib/phpseclib (2.0.29 to 3.0.6) - psr/container (1.0.0 to 1.1.1) - sabre/dav (4.1.3 to
   4.1.5) - sabre/vobject (4.3.3 to 4.3.5) - swiftmailer/swiftmailer (v6.2.3 to v6.2.7) -
   webmozart/assert (1.9.1 to 1.10.0)

   The following have been updated in files_external/3rdparty: - google/apiclient (v2.8.3 to
   v2.9.1) - firebase/php-jwt (v5.2.0 to v5.2.1) - google/apiclient-services (v0.153 to
   v0.163.0) - google/auth (v1.14.3 to v1.15.0) - icewind/smb (3.2.7 to 3.3.1) -
   icewind/streams (0.7.2 to 0.7.3) - monolog/monolog (2.1.1 to 2.2.0) - phpseclib/phpseclib
   (2.0.29 to 3.0.6)

   https://github.com/owncloud/core/pull/38188
   https://github.com/owncloud/core/pull/38191
   https://github.com/owncloud/core/pull/38198
   https://github.com/owncloud/core/pull/38238
   https://github.com/owncloud/core/pull/38244
   https://github.com/owncloud/core/pull/38255
   https://github.com/owncloud/core/pull/38275
   https://github.com/owncloud/core/pull/38285
   https://github.com/owncloud/core/pull/38306
   https://github.com/owncloud/core/pull/38312
   https://github.com/owncloud/core/pull/38344
   https://github.com/owncloud/core/pull/38380
   https://github.com/owncloud/core/pull/38387
   https://github.com/owncloud/core/pull/38399
   https://github.com/owncloud/core/pull/38434
   https://github.com/owncloud/core/pull/38453
   https://github.com/owncloud/core/pull/38462
   https://github.com/owncloud/core/pull/38487
   https://github.com/owncloud/core/pull/38508

* Enhancement - Context menu for files in case multiple actions apply: [#38132](https://github.com/owncloud/core/pull/38132)

   When triggering the default action for a file which can be opened or edited with more than one
   app, a new context menu is displayed. This menu will ask the user with which app the
   corresponding file should be opened.

   This also solves the problem with some apps which set themselves as default without asking or
   even informing the user.

   https://github.com/owncloud/enterprise/issues/4261
   https://github.com/owncloud/core/pull/38132

* Enhancement - New external storage: SMB Collaborative (shared file IDs)): [#38151](https://github.com/owncloud/core/pull/38151)

   This new external storage allows the shared use of SMB/CIFS shares among users. Independent of
   the use all files and folders will have the same file id. This allows better collaboration
   especially in the area of tagging, comments, private links and any document collaboration
   like Office Online Server, Collabora and OnlyOffice.

   https://github.com/owncloud/core/pull/38151

* Enhancement - Allow mounting a subfolder from Google Drive: [#38161](https://github.com/owncloud/core/pull/38161)

   You can now define a subfolder from your Google Drive when mounting. This gives the ability to:
   subfolder = empty (like you have it without this enhancment) subfolder = name subfolder =
   name/$user When using encryption, only the subfolder when used gets encrypted.

   https://github.com/owncloud/core/pull/38161
   https://github.com/owncloud/core/pull/38192

* Enhancement - Make the right scrollbar more visible on the UI: [#38183](https://github.com/owncloud/core/pull/38183)

   https://github.com/owncloud/core/pull/38183
   The
   scrollbar
   has
   been
   made
   wider
   and
   darker.

* Enhancement - Improve file list tag management: [#38197](https://github.com/owncloud/core/pull/38197)

   1. Introduce a new tab, where the tag input field will be displayed 1.1 Keyboard navigation in
   the input field's dropdown works now proper, in the past the user needed to hover over on item in
   the dropdown before the arrow keys could be used

   2. Replace the tag input field in the file list by a read only tag list 2.1 Improving tag
   appearance to clarify that these are tags and no shares 2.2 Clicking on a tag opens the tag tab 2.3
   Tag tab and tag list are in sync, means that editing (select, unselect, rename, remove) tags
   will appear in the tag list immediately

   https://github.com/owncloud/core/pull/38197

* Enhancement - Improve the UX in the external storage settings page: [#38288](https://github.com/owncloud/core/pull/38288)

   When a user adds or edits an external storage, the user will see a notification if the storage has
   been added or an error occured. When a user hovers over the status indicator, the user will see a
   pointer cursor, this clarifies that a click will result in a config (re-)check.

   https://github.com/owncloud/core/pull/38288

* Enhancement - Prevent group assignment in Web UI if not supported: [#38298](https://github.com/owncloud/core/pull/38298)

   This enhancement checks if users can be assigned to (or removed from) groups via Web UI. All
   group backends which do not support this functionality will be disabled in corresponding
   menus.

   https://github.com/owncloud/guests/issues/431
   https://github.com/owncloud/core/issues/38580
   https://github.com/owncloud/core/pull/38298

* Enhancement - Display path in the occ app:list command: [#38309](https://github.com/owncloud/core/pull/38309)

   Occ app:list Additionally displays the located app path

   https://github.com/owncloud/core/pull/38309

* Enhancement - New config parameter to define the encrypted file format: [#38337](https://github.com/owncloud/core/pull/38337)

   A new config parameter has been introduced to define if encrypted files are written in the old or
   new format. The new format has a significant reduced filesize and is set to default. Files in the
   old format are still readable, only new encrypted files are written in the new format.

   https://github.com/owncloud/core/pull/38337
   https://github.com/owncloud/encryption/pull/224

* Enhancement - Display error/success message while changing the log level: [#38340](https://github.com/owncloud/core/pull/38340)

   In order to provide instant user feedback, changing the log level in
   settings->administration->general will display an error/success message next to the
   select box.

   https://github.com/owncloud/core/pull/38340

* Enhancement - Implement pre-signed download urls for public links: [#38376](https://github.com/owncloud/core/pull/38376)

   Added pre-signed download urls for password protected public links to support clients which
   don't use cookies.

   https://github.com/owncloud/core/pull/38376
   https://github.com/owncloud/core/pull/38532

* Enhancement - Allow force set DB patforms: [#38379](https://github.com/owncloud/core/pull/38379)

   A new 'db.platform' option added to config.php. It allows using a specific database platform
   and do not rely on autodetection.

   https://github.com/owncloud/core/pull/38379

* Enhancement - Added additional connection parameters to redis config: [#38386](https://github.com/owncloud/core/pull/38386)

   In order to provide redis SLL/TLS support a new section connection_parameters added to redis
   and redis.cluster configuration in config.php. Requirements for connection_parameters:
   php-redis extension >= 5.3.0 Requirements for redis ssl/tls: redis server >= 6.0

   https://github.com/owncloud/core/pull/38386

* Enhancement - Hide federated user suggestions if system users are found: [#38389](https://github.com/owncloud/core/pull/38389)

   Hide federated user suggestions when sharing if system users are found. This improves the
   usability of sharing resources with existing users via email address.

   https://github.com/owncloud/enterprise/issues/4392
   https://github.com/owncloud/core/pull/38389

* Enhancement - Indicate existing guest-user as a guest in the share tab: [#38440](https://github.com/owncloud/core/pull/38440)

   Previously, after sharing a file via email with a guest, enter the same email in the tab view on
   another file, indicates the guest as a user. With this fix, we will see guest instead of user.

   https://github.com/owncloud/core/issues/38422
   https://github.com/owncloud/core/pull/38440

* Enhancement - Add config parameter 'http.cookie.samesite': [#38458](https://github.com/owncloud/core/pull/38458)

   Allows to relax ownClouds same site cookie settings. Possible values: Strict, Lax or None
   Setting the same site cookie to none is necessary in case of OpenID Connect.

   https://github.com/owncloud/core/pull/38458
   https://github.com/owncloud/core/pull/38477

* Enhancement - Add exception messages whenever a node cannot be moved: [#38481](https://github.com/owncloud/core/pull/38481)

   https://github.com/owncloud/enterprise/issues/4427
   https://github.com/owncloud/core/pull/38481

* Enhancement - UI improvement external storage: [#38483](https://github.com/owncloud/core/pull/38483)

   When selecting external storage and set the auth mechanism to 'Log-in credentials, save in
   session', the 'Enable sharing' option in the mount options dropdown will be disabled and a
   tooltip will show up due to incompatibility.

   https://github.com/owncloud/enterprise/issues/4444
   https://github.com/owncloud/core/pull/38483

* Enhancement - Improve systemtags UI for delete and fix case sensitivity problem: [#38498](https://github.com/owncloud/core/pull/38498)

   Previously, a system tag could be deleted within the rename step. Now, users can delete tags
   directly from the system tags tab view dropdown menu. Also, inconsistency on tag name casing
   has been fixed.

   https://github.com/owncloud/core/issues/38494
   https://github.com/owncloud/core/issues/38495
   https://github.com/owncloud/core/issues/38496
   https://github.com/owncloud/core/pull/38498

Changelog for ownCloud Core [10.6.0] (2020-11-25)
=======================================
The following sections list the changes in ownCloud core 10.6.0 relevant to
ownCloud admins and users.

[10.6.0]: https://github.com/owncloud/core/compare/v10.5.0...v10.6.0

Summary
-------

* Bugfix - Cleaning up `autocapitalize="off"` in files: [#15399](https://github.com/owncloud/core/issues/15399)
* Bugfix - Google Drive file modifications should not create duplicate files: [#25826](https://github.com/owncloud/core/issues/25826)
* Bugfix - Fix exit codes of security:certificates commands: [#35364](https://github.com/owncloud/core/issues/35364)
* Bugfix - Translate public link sharing email subject: [#37321](https://github.com/owncloud/core/issues/37321)
* Bugfix - Only allow http/https protocol on CORS: [#38101](https://github.com/owncloud/core/pull/38101)
* Bugfix - Fix problem with the market app installing an app using OpenIDConnect: [#37715](https://github.com/owncloud/core/pull/37715)
* Bugfix - Fix expiring a wrong share entry problem: [#37729](https://github.com/owncloud/core/pull/37729)
* Bugfix - Fix decoding of calendars uri: [#37750](https://github.com/owncloud/core/pull/37750)
* Bugfix - Add openid client secret to the sensitive values list: [#37782](https://github.com/owncloud/core/pull/37782)
* Bugfix - Show all shares in the "shared with you" section: [#37786](https://github.com/owncloud/core/pull/37786)
* Bugfix - Reshares using files:transfer-ownership cannot be transferred: [#4121](https://github.com/owncloud/enterprise/issues/4121)
* Bugfix - "Passwords do not match" message was not being translated: [#37826](https://github.com/owncloud/core/pull/37826)
* Bugfix - Fix federated share accepting problem which occurs with some apps enabled: [#37719](https://github.com/owncloud/core/issues/37719)
* Bugfix - Allow federated share name up to 255 character: [#36730](https://github.com/owncloud/core/issues/36730)
* Bugfix - Fix application id used for sharing settings translation: [#37846](https://github.com/owncloud/core/pull/37846)
* Bugfix - Add metrics shared secret to the sensitive values list: [#37848](https://github.com/owncloud/core/pull/37848)
* Bugfix - Fix list of apps returned by OCS Provisioning API apps endpoint: [#37884](https://github.com/owncloud/core/issues/37884)
* Bugfix - Add very minimal empty ODF files: [#37896](https://github.com/owncloud/core/pull/37896)
* Bugfix - Checksums will be kept when a file is uploaded or a version is created: [#37934](https://github.com/owncloud/core/pull/37934)
* Bugfix - Fix invisible notification container blocking mouse events: [#37941](https://github.com/owncloud/core/pull/37941)
* Bugfix - Fix display of public link shares in case avatars are disabled: [#37945](https://github.com/owncloud/core/pull/37945)
* Bugfix - Clean the user's preferences only if they exist during user sync: [#37947](https://github.com/owncloud/core/pull/37947)
* Bugfix - OCS and Public WebDAV Apis should handle LoginException: [#112](https://github.com/owncloud/brute_force_protection/issues/112)
* Bugfix - Properly exit and log during error in user sync command: [#37951](https://github.com/owncloud/core/pull/37951)
* Bugfix - Add a configurable number of retries on unsuccessful mountpoint move: [#37956](https://github.com/owncloud/core/pull/37956)
* Bugfix - Fix icon alignment when avatars are disabled: [#37964](https://github.com/owncloud/core/pull/37964)
* Bugfix - Fix file target in the accept share API call: [#37973](https://github.com/owncloud/core/pull/37973)
* Bugfix - Fix for Google Docs not syncing with error "server reported no size": [#37997](https://github.com/owncloud/core/issues/37997)
* Bugfix - Do not emit "share.failedpasswordcheck" events for authenticated links: [#138](https://github.com/owncloud/brute_force_protection/issues/138)
* Bugfix - Fix request token check for ocs requests: [#38019](https://github.com/owncloud/core/pull/38019)
* Bugfix - Fix logging when loading an apps fails: [#38037](https://github.com/owncloud/core/pull/38037)
* Bugfix - Properly handle StorageNotAvailableException in share external: [#38042](https://github.com/owncloud/core/pull/38042)
* Bugfix - Avoid retrieving user root iteratively in share controller: [#4107](https://github.com/owncloud/enterprise/issues/4107)
* Bugfix - Pick the translations from templates included from other apps: [#38072](https://github.com/owncloud/core/pull/38072)
* Bugfix - Override browser Accept-Language header in ajax requests: [#38073](https://github.com/owncloud/core/pull/38073)
* Bugfix - Prevent server error when loading invalid/corrupt translations: [#37799](https://github.com/owncloud/core/issues/37799)
* Bugfix - SSL check when adding a public link to your ownCloud: [#4241](https://github.com/owncloud/enterprise/issues/4241)
* Bugfix - Fix translations of some strings in settings: [#38119](https://github.com/owncloud/core/pull/38119)
* Change - Update deepdiver/zipstreamer (1.1.1 => 2.0.0): [#37159](https://github.com/owncloud/core/issues/37159)
* Change - Update sabre dependencies: [#37684](https://github.com/owncloud/core/pull/37684)
* Change - Update google/apiclient from 2.5.0 to 2.6.0 and related dependencies: [#37687](https://github.com/owncloud/core/pull/37687)
* Change - Update symfony/polyfill (1.17.0 => 1.18.0): [#37694](https://github.com/owncloud/core/pull/37694)
* Change - Update icewind/smb from 3.2.5 to 3.2.6 in files_external: [#37712](https://github.com/owncloud/core/pull/37712)
* Change - Add settings checkbox to enable manual file locking: [#37720](https://github.com/owncloud/core/pull/37720)
* Change - Update Symfony components to 4.4.11: [#37727](https://github.com/owncloud/core/pull/37727)
* Change - Update league/flysystem (1.0.69 => 1.0.70): [#37730](https://github.com/owncloud/core/pull/37730)
* Change - Make core/signature.json and core/skeleton/ inaccessible: [#37734](https://github.com/owncloud/core/issues/37734)
* Change - Update google/apiclient from 2.6.0 to 2.7.0 and related dependencies: [#37739](https://github.com/owncloud/core/pull/37739)
* Change - Add values to the invalid uid list: [#37765](https://github.com/owncloud/core/issues/37765)
* Change - Update doctrine/event-manager (1.1.0 => 1.1.1): [#37768](https://github.com/owncloud/core/pull/37768)
* Change - Update symfony/polyfill (1.18.0 => 1.18.1): [#37772](https://github.com/owncloud/core/pull/37772)
* Change - Update egulias/email-validator (2.1.18 => 2.1.19): [#37790](https://github.com/owncloud/core/pull/37790)
* Change - Update opis/closure (3.5.5 => 3.5.6): [#37804](https://github.com/owncloud/core/pull/37804)
* Change - Add system config to load a different license implementation: [#37827](https://github.com/owncloud/core/pull/37827)
* Change - Update laminas/laminas-zendframework-bridge (1.0.4 => 1.1.0): [#37843](https://github.com/owncloud/core/pull/37843)
* Change - Use a debug log level if a share download is aborted: [#37856](https://github.com/owncloud/core/pull/37856)
* Change - Add command to troubleshoot transfer ownership runs for issues: [#37950](https://github.com/owncloud/core/pull/37950)
* Change - Update Symfony components to 4.4.12: [#37862](https://github.com/owncloud/core/pull/37862)
* Change - Update doctrine/dbal (2.10.2 => 2.10.3): [#37870](https://github.com/owncloud/core/pull/37870)
* Change - Update Symfony components to 4.4.13: [#37876](https://github.com/owncloud/core/pull/37876)
* Change - Update opis/closure (3.5.6 => 3.5.7): [#37892](https://github.com/owncloud/core/pull/37892)
* Change - Update egulias/email-validator (2.1.19 => 2.1.20): [#37892](https://github.com/owncloud/core/pull/37892)
* Change - Update phpseclib/phpseclib (2.0.28 => 2.0.29): [#37893](https://github.com/owncloud/core/pull/37893)
* Change - Update icewind/smb from 3.2.6 to 3.2.7 in files_external: [#37894](https://github.com/owncloud/core/pull/37894)
* Change - Update doctrine/dbal (2.10.3 => 2.10.4): [#37904](https://github.com/owncloud/core/pull/37904)
* Change - Update symfony/translation-contracts (v1.1.9 => v1.1.10): [#37904](https://github.com/owncloud/core/pull/37904)
* Change - Reduce the log level of locked exceptions: [#37907](https://github.com/owncloud/core/pull/37907)
* Change - Update google/apiclient from 2.7.0 to 2.7.1 and related dependencies: [#37912](https://github.com/owncloud/core/pull/37912)
* Change - Update sabre/event (5.1.0 => 5.1.1): [#37921](https://github.com/owncloud/core/pull/37921)
* Change - Update laminas/laminas-zendframework-bridge (1.1.0 => 1.1.1): [#37921](https://github.com/owncloud/core/pull/37921)
* Change - New defaults for phoenix app switcher icon and label: [#37923](https://github.com/owncloud/core/pull/37923)
* Change - Update pear/archive_tar (1.4.9 => 1.4.10): [#37926](https://github.com/owncloud/core/pull/37926)
* Change - Update egulias/email-validator (2.1.20 => 2.1.21): [#37926](https://github.com/owncloud/core/pull/37926)
* Change - Update egulias/email-validator (2.1.21 => 2.1.22): [#37949](https://github.com/owncloud/core/pull/37949)
* Change - Update Symfony components to 4.4.14: [#37949](https://github.com/owncloud/core/pull/37949)
* Change - DropOldTables repair job won't show a progress bar: [#37953](https://github.com/owncloud/core/pull/37953)
* Change - Update sabre dependencies: [#37975](https://github.com/owncloud/core/pull/37975)
* Change - Update Symfony components to 4.4.15: [#37975](https://github.com/owncloud/core/pull/37975)
* Change - Update opis/closure (3.5.7 => 3.6.0): [#38004](https://github.com/owncloud/core/pull/38004)
* Change - Update symfony/polyfill (1.18.1 => 1.19.0): [#38032](https://github.com/owncloud/core/pull/38032)
* Change - Update symfony/polyfill (1.19.0 => 1.20.0): [#38033](https://github.com/owncloud/core/pull/38033)
* Change - Update google/apiclient from 2.7.1 to 2.8.0 and related dependencies: [#38043](https://github.com/owncloud/core/pull/38043)
* Change - Update dg/composer-cleaner (v2.1 => v2.2): [#38044](https://github.com/owncloud/core/pull/38044)
* Change - Update Symfony components to 4.4.16: [#38046](https://github.com/owncloud/core/pull/38046)
* Change - Update egulias/email-validator (2.1.22 => 2.1.23): [#38061](https://github.com/owncloud/core/pull/38061)
* Change - Update sabre/vobject (4.3.2 => 4.3.3): [#38091](https://github.com/owncloud/core/pull/38091)
* Change - Update opis/closure (3.6.0 => 3.6.1): [#38091](https://github.com/owncloud/core/pull/38091)
* Change - Update sabre/dav (4.1.2 => 4.1.3): [#38092](https://github.com/owncloud/core/pull/38092)
* Change - Update egulias/email-validator (2.1.23 => 2.1.24): [#38116](https://github.com/owncloud/core/pull/38116)
* Change - Update pear/archive_tar (1.4.10 => 1.4.11): [#38137](https://github.com/owncloud/core/pull/38137)
* Change - Rename phoenix to web: [#38199](https://github.com/owncloud/core/pull/38199)
* Enhancement - Cleanup encryption config values on disabling encryption: [#35980](https://github.com/owncloud/core/pull/35980)
* Enhancement - Add support for date expiration on remote shares: [#37548](https://github.com/owncloud/core/pull/37548)
* Enhancement - Support pre-signed urls: [#37634](https://github.com/owncloud/core/pull/37634)
* Enhancement - Add capability for the favorite files feature: [#37673](https://github.com/owncloud/core/pull/37673)
* Enhancement - Add Support for SGI Image Previews: [#37758](https://github.com/owncloud/core/pull/37758)
* Enhancement - Allow getting the share list filtered by share type via API: [#38000](https://github.com/owncloud/core/pull/38000)
* Enhancement - GetShare API request's "subfiles" parameter allows new interactions: [#38053](https://github.com/owncloud/core/pull/38053)
* Enhancement - Add new method in the PHP API interface: [#38054](https://github.com/owncloud/core/pull/38054)

Details
-------

* Bugfix - Cleaning up `autocapitalize="off"` in files: [#15399](https://github.com/owncloud/core/issues/15399)

   All instances of deprecated `autocapitalize="off"` HTML attributes were replaced with
   `autocapitalize="none"` in the parent <form> tag.

   https://github.com/owncloud/core/issues/15399
   https://github.com/owncloud/core/pull/37965

* Bugfix - Google Drive file modifications should not create duplicate files: [#25826](https://github.com/owncloud/core/issues/25826)

   Change: Allow Storage backends to explicitly opt-in/opt-out of marking file as partial while
   uploading

   Existing files in Google Drive that were modified and saved (uploaded) would result in
   duplicate files of the same name. The root cause was appending .part to filenames for upload.
   This update first allows Storage to opt-out of .part filenames during upload and second opts
   out of .part filenames for Google Storage backend specifically.

   https://github.com/owncloud/core/issues/25826
   https://github.com/owncloud/core/pull/37062

* Bugfix - Fix exit codes of security:certificates commands: [#35364](https://github.com/owncloud/core/issues/35364)

   If there is an error when doing occ security:certificates:import or occ
   security:certificates:remove then the command will exit with status 1. This allows the
   caller to reliably detect if there was a problem.

   https://github.com/owncloud/core/issues/35364
   https://github.com/owncloud/core/pull/37783

* Bugfix - Translate public link sharing email subject: [#37321](https://github.com/owncloud/core/issues/37321)

   https://github.com/owncloud/core/issues/37321
   https://github.com/owncloud/core/pull/37322

* Bugfix - Only allow http/https protocol on CORS: [#38101](https://github.com/owncloud/core/pull/38101)

   Adding a white-listed domain allowed strange protocols like ftp://owncloud.com,
   restricted to http/https

   https://github.com/owncloud/core/pull/38101

* Bugfix - Fix problem with the market app installing an app using OpenIDConnect: [#37715](https://github.com/owncloud/core/pull/37715)

   The OpenIDConnect app uses an in-memory cache to store an OpenID session in order to avoid
   hitting the OpenID provider too much. After an app was installed, the prefix used to store
   information in the cache was changing. This was causing problems because the OpenIDConnect
   app thought the OpenID session was no longer valid and, as a consequence, it was logging out the
   user. In practice, installing an new app with the market app having logged in via OpenIDConnect
   would cause the user to logout.

   Now, the cache prefix only changes after an ownCloud upgrade. Installing an app won't cause the
   cache prefix to change, so this will fix the problem. The OpenIDConnect app will still find the
   stored session information after the new apps are installed.

   https://github.com/owncloud/core/pull/37715

* Bugfix - Fix expiring a wrong share entry problem: [#37729](https://github.com/owncloud/core/pull/37729)

   If multiple links exist for the same node and, non-expired share created before expired share,
   expiredSharesJob was deleting non-expired share. This problem has been resolved. Also,
   ExpireSharesJob now handles user and group shares.

   https://github.com/owncloud/core/pull/37729

* Bugfix - Fix decoding of calendars uri: [#37750](https://github.com/owncloud/core/pull/37750)

   In case an user had calendars uri containing special characters, for instance "persönlich",
   and this user was then invited to a calendar event, the event could not be created and a 404 was
   shown in the stack trace. Reason for this was the uri not being properly decoded. The behavior
   has now been fixed.

   https://github.com/owncloud/core/pull/37750

* Bugfix - Add openid client secret to the sensitive values list: [#37782](https://github.com/owncloud/core/pull/37782)

   Openid client secret was printed as is in the config report. Now it is masked.

   https://github.com/owncloud/core/pull/37782

* Bugfix - Show all shares in the "shared with you" section: [#37786](https://github.com/owncloud/core/pull/37786)

   Previously, when a user received some shares from multiple remote servers and one of them was
   removed, the "shared with you" section didn't show any share even though the user still had
   other shares that were accessible in other remote servers.

   This is now fixed by ignoring those non-accessible remote shares. The rest of the shares will be
   shown.

   https://github.com/owncloud/core/pull/37786

* Bugfix - Reshares using files:transfer-ownership cannot be transferred: [#4121](https://github.com/owncloud/enterprise/issues/4121)

   Received shares that have been reshared further now will not be transferred using
   files:transfer-ownership. Fixes issue with mismatching ownership after executing
   transfer.

   https://github.com/owncloud/enterprise/issues/4121
   https://github.com/owncloud/core/pull/37791

* Bugfix - "Passwords do not match" message was not being translated: [#37826](https://github.com/owncloud/core/pull/37826)

   This message is now able to be translated.

   https://github.com/owncloud/core/pull/37826

* Bugfix - Fix federated share accepting problem which occurs with some apps enabled: [#37719](https://github.com/owncloud/core/issues/37719)

   Filesystem may not set already for shared user in some cases when accepting a federated share.
   This situation broke accept federated share api. This problem has been resolved.

   https://github.com/owncloud/core/issues/37719
   https://github.com/owncloud/music/issues/778
   https://github.com/owncloud/core/pull/37834

* Bugfix - Allow federated share name up to 255 character: [#36730](https://github.com/owncloud/core/issues/36730)

   Receiving a federated share of a file with name greater than 63 characters was not possible.
   This problem has been resolved by extending related column length of database to 255.

   https://github.com/owncloud/core/issues/36730
   https://github.com/owncloud/core/pull/37835

* Bugfix - Fix application id used for sharing settings translation: [#37846](https://github.com/owncloud/core/pull/37846)

   "Owner language" and permission titles "Create", "Change", "Delete", "Share" were not being
   translated. Now it is translated.

   https://github.com/owncloud/core/pull/37846

* Bugfix - Add metrics shared secret to the sensitive values list: [#37848](https://github.com/owncloud/core/pull/37848)

   The metrics api shared secret was printed as is in the config report. Now it is masked.

   https://github.com/owncloud/core/pull/37848

* Bugfix - Fix list of apps returned by OCS Provisioning API apps endpoint: [#37884](https://github.com/owncloud/core/issues/37884)

   Requests to ocs/v1.php/cloud/apps without any filter now return all apps, including the
   always-enabled apps.

   https://github.com/owncloud/core/issues/37884
   https://github.com/owncloud/core/pull/37901

* Bugfix - Add very minimal empty ODF files: [#37896](https://github.com/owncloud/core/pull/37896)

   These files contain no data at all. This guarantees that when the user opens a new document in the
   richdocuments app, the language of paragraph, page size, cell date format, currency, etc.
   will be according to the current locale.

   Previous files were in German. E.g. document language (spellcheck language) was set to
   German, spreadsheet tab name was "Tabelle", etc. It was incorrect for non-German users.

   https://github.com/owncloud/core/pull/37896

* Bugfix - Checksums will be kept when a file is uploaded or a version is created: [#37934](https://github.com/owncloud/core/pull/37934)

   Previously, reuploading the same file caused the checksum of the file to be reset. In addition,
   the checksum weren't being carried away when a new version of the file was created. This means
   that the versions didn't have a checksum.

   Both problems are now solved.

   https://github.com/owncloud/core/pull/37934

* Bugfix - Fix invisible notification container blocking mouse events: [#37941](https://github.com/owncloud/core/pull/37941)

   https://github.com/owncloud/core/pull/37941

* Bugfix - Fix display of public link shares in case avatars are disabled: [#37945](https://github.com/owncloud/core/pull/37945)

   In case avatars were disabled through config.php and a public link was created for some file, a
   "sharing is not allowed" message was displayed when leaving the sharing panel and trying to
   access it again for that specific file. The behavior has now been fixed.

   https://github.com/owncloud/core/pull/37945

* Bugfix - Clean the user's preferences only if they exist during user sync: [#37947](https://github.com/owncloud/core/pull/37947)

   Previously, the user's preferences were cleaned during the user:sync command. This was done
   regardless of the preferences existance, which was causing the
   "userpreference.afterDeleteValue" event to be triggered always, and then, as consequence,
   the admin_audit app was logging those events. Basically, this bug was causing a log flood by the
   admin_audit app even if those preferences weren't there in the first place.

   Now we check first if those preferences exist before attempting to delete them. If they exist,
   the admin_audit app will still log that deletion, but if not nothing happens because the
   deletion won't be attempted.

   https://github.com/owncloud/core/pull/37947

* Bugfix - OCS and Public WebDAV Apis should handle LoginException: [#112](https://github.com/owncloud/brute_force_protection/issues/112)

   OCS api and new public webdav api was not handle LoginException. This situation was causing
   HTTP 500 error in response. This bug has been resolved.

   https://github.com/owncloud/brute_force_protection/issues/112
   https://github.com/owncloud/core/pull/37948

* Bugfix - Properly exit and log during error in user sync command: [#37951](https://github.com/owncloud/core/pull/37951)

   If there is an error when doing occ user:sync then the command will exit with return 1 and
   properly log the error.

   https://github.com/owncloud/enterprise/issues/4218
   https://github.com/owncloud/core/pull/37951

* Bugfix - Add a configurable number of retries on unsuccessful mountpoint move: [#37956](https://github.com/owncloud/core/pull/37956)

   Handling of conflicting mountpoints across different share backends was improved by adding a
   configurable number of the mountpoint rename attempts. Now when the mountpoint rename has
   been failed on the user filesystem initialization due to internal backend-specific reasons
   the used mountpoint name is considered to be taken, a new name is generated and the rename
   operation could be repeated several times until it either succeeds or rename attempts limit is
   reached.

   https://github.com/owncloud/core/pull/37956

* Bugfix - Fix icon alignment when avatars are disabled: [#37964](https://github.com/owncloud/core/pull/37964)

   Action icons for the sharee list view, when you want to know who are you sharing to, where being
   pushed to the left when the avatars were disabled, breaking part of the layout.

   Those icons are now aligned.

   https://github.com/owncloud/core/pull/37964

* Bugfix - Fix file target in the accept share API call: [#37973](https://github.com/owncloud/core/pull/37973)

   If you had a custom share_folder set in the config.php file and the auto-accept feature for the
   internal user sharing was disabled, when a user accepted the user share, the file target in the
   API response contained the share_folder duplicated. This was limited to the API response.

   Now the API responds correctly, and the file target doesn't have the share_folder duplicated

   https://github.com/owncloud/core/pull/37973

* Bugfix - Fix for Google Docs not syncing with error "server reported no size": [#37997](https://github.com/owncloud/core/issues/37997)

   Users with Google Drive connected external storage were previously subjected to a "server
   reported no size" error in desktop sync client for every Google Doc that attempted to sync.
   Additionally, the Google Doc would not be downloaded.

   https://github.com/owncloud/core/issues/37997
   https://github.com/owncloud/core/pull/37993

* Bugfix - Do not emit "share.failedpasswordcheck" events for authenticated links: [#138](https://github.com/owncloud/brute_force_protection/issues/138)

   ShareManager was checking password of already authenticated public links. This situation
   led to wrong "share.failedpasswordcheck" events emitting in already authenticated links.
   This problem has been resolved by first checking link already authenticated.

   https://github.com/owncloud/brute_force_protection/issues/138
   https://github.com/owncloud/core/pull/38016

* Bugfix - Fix request token check for ocs requests: [#38019](https://github.com/owncloud/core/pull/38019)

   Since the OCS_APIREQUEST header was removed we needed to either implement the header again or
   implement another way to properly check cookie authenticated ocs requests.

   https://github.com/owncloud/core/pull/38019

* Bugfix - Fix logging when loading an apps fails: [#38037](https://github.com/owncloud/core/pull/38037)

   Some apps use the variable $app in app.php - this overwrites the variable in requireAppFile and
   causes the error

   https://github.com/owncloud/core/pull/38037

* Bugfix - Properly handle StorageNotAvailableException in share external: [#38042](https://github.com/owncloud/core/pull/38042)

   Users with Federated Shares of which storage was unavailable, were encountering issues when
   working with the shares (e.g. unsharing or listing). It was caused by unhandled exception.

   https://github.com/owncloud/enterprise/issues/4217
   https://github.com/owncloud/enterprise/issues/4117
   https://github.com/owncloud/enterprise/issues/2721
   https://github.com/owncloud/core/pull/38042

* Bugfix - Avoid retrieving user root iteratively in share controller: [#4107](https://github.com/owncloud/enterprise/issues/4107)

   There was a performance problem that with many shares, the "share tab" was slow to display
   entries. Now the performance of displaying that tab should be better as we avoid retrieving the
   same information for all the shares

   https://github.com/owncloud/enterprise/issues/4107
   https://github.com/owncloud/core/pull/38055

* Bugfix - Pick the translations from templates included from other apps: [#38072](https://github.com/owncloud/core/pull/38072)

   Some apps can include template parts from a different app, normally from core. From example,
   the activity app can include content from the core templates to be used in the activity email.

   The translated strings were picked from the original app even though the template was within
   core space. As a result, some string weren't translated because of the missing translation for
   those strings in the original app. Note that core had the strings correctly translated.

   Now the translations are picked from the requested app template as intended, instead of
   looking for them in the original app.

   https://github.com/owncloud/core/pull/38072

* Bugfix - Override browser Accept-Language header in ajax requests: [#38073](https://github.com/owncloud/core/pull/38073)

   A default Accept-Language header sent by browser in Ajax requests made OCS API to respond in a
   wrong language sometimes. Now this header is set globally to match the current user language.

   https://github.com/owncloud/core/pull/38073

* Bugfix - Prevent server error when loading invalid/corrupt translations: [#37799](https://github.com/owncloud/core/issues/37799)

   This fix prevents server errors when loading invalid or corrupt translations from Transifex.
   This is critical as every user is able to contribute to the ownCloud translations.

   https://github.com/owncloud/core/issues/37799
   https://github.com/owncloud/core/pull/38103

* Bugfix - SSL check when adding a public link to your ownCloud: [#4241](https://github.com/owncloud/enterprise/issues/4241)

   Prior to this fix, a SSL certificate check was performed when adding a public link to your
   ownCloud. As this check was done on the base URL of the server, it could cause some issues, for
   example endless redirect loops. This fix gets rid of the SSL check because the storage-check
   afterwards also checks the validity of the server's SSL certificate. This check is being made
   on /status.php, thus it likely wont end up in a redirect loop.

   https://github.com/owncloud/enterprise/issues/4241
   https://github.com/owncloud/core/pull/38107

* Bugfix - Fix translations of some strings in settings: [#38119](https://github.com/owncloud/core/pull/38119)

   https://github.com/owncloud/core/pull/38119

* Change - Update deepdiver/zipstreamer (1.1.1 => 2.0.0): [#37159](https://github.com/owncloud/core/issues/37159)

   https://github.com/owncloud/core/issues/37159
   https://github.com/owncloud/core/pull/37718

* Change - Update sabre dependencies: [#37684](https://github.com/owncloud/core/pull/37684)

   This change updates: - sabre/dav (4.1.0 => 4.1.1) - sabre/vobject (4.3.0 => 4.3.1)

   https://github.com/owncloud/core/pull/37684

* Change - Update google/apiclient from 2.5.0 to 2.6.0 and related dependencies: [#37687](https://github.com/owncloud/core/pull/37687)

   This change updates the 3rd-party dependencies of files_external: - google/apiclient
   (v2.5.0 => v2.6.0) - google/auth (v1.9.0 => v1.10.0) - phpseclib/phpseclib (2.0.27 =>
   2.0.28)

   https://github.com/owncloud/core/pull/37687

* Change - Update symfony/polyfill (1.17.0 => 1.18.0): [#37694](https://github.com/owncloud/core/pull/37694)

   The following symfony/polyfill components have been updated to version 1.18.0:

   Symfony/polyfill-ctype symfony/polyfill-iconv symfony/polyfill-intl-idn
   symfony/polyfill-intl-normalizer symfony/polyfill-mbstring symfony/polyfill-php70
   symfony/polyfill-php72 symfony/polyfill-php73 symfony/polyfill-php80

   https://github.com/owncloud/core/pull/37694

* Change - Update icewind/smb from 3.2.5 to 3.2.6 in files_external: [#37712](https://github.com/owncloud/core/pull/37712)

   https://github.com/owncloud/core/pull/37712

* Change - Add settings checkbox to enable manual file locking: [#37720](https://github.com/owncloud/core/pull/37720)

   A checkbox to enable manual file locking on clients has been added to admin settings,
   additional, manual file locking. This checkbox is an alternative way to enable manual file
   locking on clients that support it. The occ command can also still be used - occ config:app:set
   files enable_lock_file_action --value yes

   https://github.com/owncloud/core/pull/37720

* Change - Update Symfony components to 4.4.11: [#37727](https://github.com/owncloud/core/pull/37727)

   The following Symfony components have been updated to version 4.4.11 - console -
   event-dispatcher - process - routing - translation

   https://github.com/owncloud/core/pull/37727
   https://symfony.com/blog/symfony-4-4-11-released

* Change - Update league/flysystem (1.0.69 => 1.0.70): [#37730](https://github.com/owncloud/core/pull/37730)

   https://github.com/owncloud/core/pull/37730

* Change - Make core/signature.json and core/skeleton/ inaccessible: [#37734](https://github.com/owncloud/core/issues/37734)

   https://github.com/owncloud/core/issues/37734

* Change - Update google/apiclient from 2.6.0 to 2.7.0 and related dependencies: [#37739](https://github.com/owncloud/core/pull/37739)

   This change updates the 3rd-party dependencies of files_external: - google/apiclient
   (v2.6.0 => v2.7.0) - google/apiclient-services (v0.139 => v0.141) - google/auth (v1.10.0 =>
   v1.11.1) - monolog/monolog (2.1.0 => 2.1.1)

   https://github.com/owncloud/core/pull/37739

* Change - Add values to the invalid uid list: [#37765](https://github.com/owncloud/core/issues/37765)

   Enhancement of the invalid uid list added by
   https://github.com/owncloud/core/pull/37268.

   https://github.com/owncloud/core/issues/37765

* Change - Update doctrine/event-manager (1.1.0 => 1.1.1): [#37768](https://github.com/owncloud/core/pull/37768)

   https://github.com/owncloud/core/pull/37768

* Change - Update symfony/polyfill (1.18.0 => 1.18.1): [#37772](https://github.com/owncloud/core/pull/37772)

   The following symfony/polyfill components have been updated to version 1.18.1:

   Symfony/polyfill-ctype symfony/polyfill-iconv symfony/polyfill-intl-idn
   symfony/polyfill-intl-normalizer symfony/polyfill-mbstring symfony/polyfill-php70
   symfony/polyfill-php72 symfony/polyfill-php73 symfony/polyfill-php80

   https://github.com/owncloud/core/pull/37772

* Change - Update egulias/email-validator (2.1.18 => 2.1.19): [#37790](https://github.com/owncloud/core/pull/37790)

   https://github.com/owncloud/core/pull/37790

* Change - Update opis/closure (3.5.5 => 3.5.6): [#37804](https://github.com/owncloud/core/pull/37804)

   https://github.com/owncloud/core/pull/37804

* Change - Add system config to load a different license implementation: [#37827](https://github.com/owncloud/core/pull/37827)

   The default license implementation can now be replaced.

   https://github.com/owncloud/core/pull/37827

* Change - Update laminas/laminas-zendframework-bridge (1.0.4 => 1.1.0): [#37843](https://github.com/owncloud/core/pull/37843)

   https://github.com/owncloud/core/pull/37843

* Change - Use a debug log level if a share download is aborted: [#37856](https://github.com/owncloud/core/pull/37856)

   If a client was downloading a file through a public link share and he decided to disconnect and
   abort the download, ownCloud was logging that exception. Now ownCloud will log a message with a
   debug level instead of logging the exception in order to reduce the noise.

   https://github.com/owncloud/core/pull/37856

* Change - Add command to troubleshoot transfer ownership runs for issues: [#37950](https://github.com/owncloud/core/pull/37950)

   https://github.com/owncloud/enterprise/issues/4121
   https://github.com/owncloud/core/pull/37950
   https://github.com/owncloud/core/pull/37860

* Change - Update Symfony components to 4.4.12: [#37862](https://github.com/owncloud/core/pull/37862)

   The following Symfony components have been updated to version 4.4.12 - console -
   event-dispatcher - process - routing - translation

   https://github.com/owncloud/core/pull/37862
   https://symfony.com/blog/symfony-4-4-12-released

* Change - Update doctrine/dbal (2.10.2 => 2.10.3): [#37870](https://github.com/owncloud/core/pull/37870)

   https://github.com/owncloud/core/pull/37870

* Change - Update Symfony components to 4.4.13: [#37876](https://github.com/owncloud/core/pull/37876)

   The following Symfony components have been updated to version 4.4.13 - console -
   event-dispatcher - process - routing - translation

   https://github.com/owncloud/core/pull/37876
   https://symfony.com/blog/symfony-4-4-13-released

* Change - Update opis/closure (3.5.6 => 3.5.7): [#37892](https://github.com/owncloud/core/pull/37892)

   https://github.com/owncloud/core/pull/37892

* Change - Update egulias/email-validator (2.1.19 => 2.1.20): [#37892](https://github.com/owncloud/core/pull/37892)

   https://github.com/owncloud/core/pull/37892

* Change - Update phpseclib/phpseclib (2.0.28 => 2.0.29): [#37893](https://github.com/owncloud/core/pull/37893)

   https://github.com/owncloud/core/pull/37893

* Change - Update icewind/smb from 3.2.6 to 3.2.7 in files_external: [#37894](https://github.com/owncloud/core/pull/37894)

   https://github.com/owncloud/core/pull/37894

* Change - Update doctrine/dbal (2.10.3 => 2.10.4): [#37904](https://github.com/owncloud/core/pull/37904)

   https://github.com/owncloud/core/pull/37904

* Change - Update symfony/translation-contracts (v1.1.9 => v1.1.10): [#37904](https://github.com/owncloud/core/pull/37904)

   https://github.com/owncloud/core/pull/37904

* Change - Reduce the log level of locked exceptions: [#37907](https://github.com/owncloud/core/pull/37907)

   Log level of locked exceptions will be "debug" by default instead of "fatal"

   https://github.com/owncloud/core/pull/37907

* Change - Update google/apiclient from 2.7.0 to 2.7.1 and related dependencies: [#37912](https://github.com/owncloud/core/pull/37912)

   This change updates the 3rd-party dependencies of files_external: - google/apiclient
   (v2.7.0 => v2.7.1) - google/apiclient-services (v0.141 => v0.146) - google/auth (v1.11.1 =>
   v1.12.0)

   https://github.com/owncloud/core/pull/37912

* Change - Update sabre/event (5.1.0 => 5.1.1): [#37921](https://github.com/owncloud/core/pull/37921)

   https://github.com/owncloud/core/pull/37921

* Change - Update laminas/laminas-zendframework-bridge (1.1.0 => 1.1.1): [#37921](https://github.com/owncloud/core/pull/37921)

   https://github.com/owncloud/core/pull/37921

* Change - New defaults for phoenix app switcher icon and label: [#37923](https://github.com/owncloud/core/pull/37923)

   When phoenix is configured (phoenix.baseUrl in config.php), the app switcher has a menu item
   for Phoenix. This now has a new and configurable default icon and default label.

   https://github.com/owncloud/product/issues/227
   https://github.com/owncloud/core/pull/37923

* Change - Update pear/archive_tar (1.4.9 => 1.4.10): [#37926](https://github.com/owncloud/core/pull/37926)

   https://github.com/owncloud/core/pull/37926

* Change - Update egulias/email-validator (2.1.20 => 2.1.21): [#37926](https://github.com/owncloud/core/pull/37926)

   https://github.com/owncloud/core/pull/37926

* Change - Update egulias/email-validator (2.1.21 => 2.1.22): [#37949](https://github.com/owncloud/core/pull/37949)

   https://github.com/owncloud/core/pull/37949

* Change - Update Symfony components to 4.4.14: [#37949](https://github.com/owncloud/core/pull/37949)

   The following Symfony components have been updated to version 4.4.14 - console -
   event-dispatcher - process - routing - translation

   https://github.com/owncloud/core/pull/37949
   https://symfony.com/blog/symfony-4-4-14-released

* Change - DropOldTables repair job won't show a progress bar: [#37953](https://github.com/owncloud/core/pull/37953)

   The "DropOldTables" repair job that happens during upgrade won't show a progress bar any
   longer.

   https://github.com/owncloud/core/pull/37953

* Change - Update sabre dependencies: [#37975](https://github.com/owncloud/core/pull/37975)

   This change updates: - sabre/dav (4.1.1 => 4.1.2) - sabre/event (5.1.1 => 5.1.2) - sabre/http
   (5.1.0 => 5.1.1) - sabre/uri (2.2.0 => 2.2.1) - sabre/vobject (4.3.1 => 4.3.2) - sabre/xml
   (2.2.1 => 2.2.3)

   https://github.com/owncloud/core/pull/37975

* Change - Update Symfony components to 4.4.15: [#37975](https://github.com/owncloud/core/pull/37975)

   The following Symfony components have been updated to version 4.4.15 - console -
   event-dispatcher - process - routing - translation

   https://github.com/owncloud/core/pull/37975
   https://symfony.com/blog/symfony-4-4-15-released

* Change - Update opis/closure (3.5.7 => 3.6.0): [#38004](https://github.com/owncloud/core/pull/38004)

   https://github.com/owncloud/core/pull/38004

* Change - Update symfony/polyfill (1.18.1 => 1.19.0): [#38032](https://github.com/owncloud/core/pull/38032)

   The following symfony/polyfill components have been updated to version 1.19.0:

   Symfony/polyfill-ctype symfony/polyfill-iconv symfony/polyfill-intl-idn
   symfony/polyfill-intl-normalizer symfony/polyfill-mbstring symfony/polyfill-php70
   symfony/polyfill-php72 symfony/polyfill-php73 symfony/polyfill-php80

   https://github.com/owncloud/core/pull/38032

* Change - Update symfony/polyfill (1.19.0 => 1.20.0): [#38033](https://github.com/owncloud/core/pull/38033)

   The following symfony/polyfill components have been updated to version 1.20.0:

   Symfony/polyfill-ctype symfony/polyfill-iconv symfony/polyfill-intl-idn
   symfony/polyfill-intl-normalizer symfony/polyfill-mbstring symfony/polyfill-php72
   symfony/polyfill-php73 symfony/polyfill-php80

   https://github.com/owncloud/core/pull/38033

* Change - Update google/apiclient from 2.7.1 to 2.8.0 and related dependencies: [#38043](https://github.com/owncloud/core/pull/38043)

   This change updates the 3rd-party dependencies of files_external: - google/apiclient
   (v2.7.1 => v2.8.0) - google/apiclient-services (v0.146 => v0.152) - google/auth (v1.12.0 =>
   v1.14.3) - guzzlehttp/psr7 (1.6.1 => 1.7.0)

   https://github.com/owncloud/core/pull/38043

* Change - Update dg/composer-cleaner (v2.1 => v2.2): [#38044](https://github.com/owncloud/core/pull/38044)

   https://github.com/owncloud/core/pull/38044

* Change - Update Symfony components to 4.4.16: [#38046](https://github.com/owncloud/core/pull/38046)

   The following Symfony components have been updated to version 4.4.16 - console -
   event-dispatcher - process - routing - translation

   https://github.com/owncloud/core/pull/38046
   https://symfony.com/blog/symfony-4-4-16-released

* Change - Update egulias/email-validator (2.1.22 => 2.1.23): [#38061](https://github.com/owncloud/core/pull/38061)

   https://github.com/owncloud/core/pull/38061

* Change - Update sabre/vobject (4.3.2 => 4.3.3): [#38091](https://github.com/owncloud/core/pull/38091)

   https://github.com/owncloud/core/pull/38091

* Change - Update opis/closure (3.6.0 => 3.6.1): [#38091](https://github.com/owncloud/core/pull/38091)

   https://github.com/owncloud/core/pull/38091

* Change - Update sabre/dav (4.1.2 => 4.1.3): [#38092](https://github.com/owncloud/core/pull/38092)

   https://github.com/owncloud/core/pull/38092

* Change - Update egulias/email-validator (2.1.23 => 2.1.24): [#38116](https://github.com/owncloud/core/pull/38116)

   https://github.com/owncloud/core/pull/38116

* Change - Update pear/archive_tar (1.4.10 => 1.4.11): [#38137](https://github.com/owncloud/core/pull/38137)

   https://github.com/owncloud/core/pull/38137

* Change - Rename phoenix to web: [#38199](https://github.com/owncloud/core/pull/38199)

   Phoenix has been renamed to Web. You can now set these keys in config.php to control Web:

   - web.baseUrl - web.icon - web.label

   https://github.com/owncloud/core/pull/38199
   https://github.com/owncloud/core/pull/38201
   https://github.com/owncloud/core/pull/38212

* Enhancement - Cleanup encryption config values on disabling encryption: [#35980](https://github.com/owncloud/core/pull/35980)

   Occ encryption:disable command was changed to delete some encryption-specific config
   key-value pairs that made reenabling encryption not possible. A safety check was added to
   prevent disabling encryption until all files are decrypted. The occ encryption:disable
   command exits with an error code and message if the system still has any encrypted files.

   https://github.com/owncloud/core/pull/35980

* Enhancement - Add support for date expiration on remote shares: [#37548](https://github.com/owncloud/core/pull/37548)

   An expiration date can be set now for shares originating in your server. This feature behaves
   the same as the expiration for user, group and link shares.

   The expiration is controlled in the source server (server A). The target server (server B)
   won't know about the expiration. Once the share expires, the target server (server B) won't be
   able to access to those shares and it will remove them automatically

   This feature won't work for shares that are grabbed from a public link: if source server (server
   A) shares a file / folder via link, and an user from the target server (server B) adds that link to
   his ownCloud; in this case, this "remote share expiration" won't apply.

   In addition, the same as happens with user, group and link shares, the share recipient won't
   have control over the expiration date.

   https://github.com/owncloud/core/pull/37548

* Enhancement - Support pre-signed urls: [#37634](https://github.com/owncloud/core/pull/37634)

   Ocis-web (Phoenix) doesn't use cookies for authentication but the "Bearer" header.

   This means that we can only fetch data using XHR or the fetch API but cannot use URLs directly in
   image tags, also cannot download files directly.

   To solve this, we now support pre-signed URLs. This means that before creating an image tag or
   starting a download, we send an authenticated request to the server (OC 10 or OCIS) to ask for a
   pre-signed URL pointing at a specific resource. Then said URL can be forwarded either to an
   image tag (for thumbnails) or to another browser window to trigger a download.

   https://github.com/owncloud/core/pull/37634
   https://github.com/owncloud/core/pull/38029
   https://github.com/owncloud/phoenix/pull/3797
   https://github.com/owncloud/owncloud-sdk/pull/504
   https://github.com/owncloud/owncloud-sdk/pull/616
   https://github.com/owncloud/ocis-proxy/pull/75

* Enhancement - Add capability for the favorite files feature: [#37673](https://github.com/owncloud/core/pull/37673)

   The server is now exposing a new capability to advertise that the server supports the favorite
   files feature.

   https://github.com/owncloud/ocis-reva/issues/354
   https://github.com/owncloud/core/pull/37673

* Enhancement - Add Support for SGI Image Previews: [#37758](https://github.com/owncloud/core/pull/37758)

   We added support for Silicone Graphics images previews. The following file extensions will be
   supported: .sgi, .rgb, .rgba, .bw, .int, .inta. These files will be associated with the
   mimetype image/sgi. This mimetype is not officially registered. This needs the imagick php
   extension to be installed.

   https://github.com/owncloud/core/pull/37758
   https://en.wikipedia.org/wiki/Silicon_Graphics_Image
   https://www.iana.org/assignments/media-types/media-types.xhtml
   https://www.php.net/manual/en/book.imagick.php

* Enhancement - Allow getting the share list filtered by share type via API: [#38000](https://github.com/owncloud/core/pull/38000)

   Previously, the share API returned all the shares. There were some filters, but you weren't
   able to filter by share type. You couldn't get only your link shares.

   Now the API allows filtering by share type, along with the filters previously available. The
   web UI is using this filtering now.

   https://github.com/owncloud/core/pull/38000

* Enhancement - GetShare API request's "subfiles" parameter allows new interactions: [#38053](https://github.com/owncloud/core/pull/38053)

   Previously, the "subfiles" parameter required only the "path" parameter, and the rest of the
   parameters were ignored.

   Now, the "subfiles" parameter still requires the "path" parameter, but it also interacts with
   the "reshares" parameter as well as the "share_types" parameter to provide additional
   filtering capabilities

   https://github.com/owncloud/core/pull/38053

* Enhancement - Add new method in the PHP API interface: [#38054](https://github.com/owncloud/core/pull/38054)

   The share manager interface in the PHP API has a new "getSharesByPath" method available

   https://github.com/owncloud/core/pull/38054

Changelog for ownCloud Core [10.5.0] (2020-07-31)
=======================================
The following sections list the changes in ownCloud core 10.5.0 relevant to
ownCloud admins and users.

[10.5.0]: https://github.com/owncloud/core/compare/v10.4.1...v10.5.0

Summary
-------

* Security - Add new system config to enforce strict login check with user backend: [#37569](https://github.com/owncloud/core/pull/37569)
* Security - Patch htmlPrefilter: [#37598](https://github.com/owncloud/core/issues/37598)
* Bugfix - Correct files_external:export output so it can be imported: [#37054](https://github.com/owncloud/core/issues/37054)
* Bugfix - Add force option to delete user even if the user doesn't exist: [#37103](https://github.com/owncloud/core/pull/37103)
* Bugfix - List data for pending federated share via OCS API correctly: [#34636](https://github.com/owncloud/core/issues/34636)
* Bugfix - Ensure ETag changes if a change is detected in a folder: [#37218](https://github.com/owncloud/core/pull/37218)
* Bugfix - Stop writing data to the output buffer when the connection is not alive: [#37219](https://github.com/owncloud/core/pull/37219)
* Bugfix - Remove unused files and config opt for settings help: [#37225](https://github.com/owncloud/core/pull/37225)
* Bugfix - Hide add to your OC at the public page when it's not allowed: [#37232](https://github.com/owncloud/core/pull/37232)
* Bugfix - Send max number of steps as integer in RepairUnmergedShares: [#37241](https://github.com/owncloud/core/issues/37241)
* Bugfix - Remove console logging of un-escaped data: [#37256](https://github.com/owncloud/core/pull/37256)
* Bugfix - Earlier detection of connection status: [#37291](https://github.com/owncloud/core/pull/37291)
* Bugfix - Rewrite code to fix some notices under PHP 7.4: [#37311](https://github.com/owncloud/core/pull/37311)
* Bugfix - Properly store complex Webdav properties: [#37314](https://github.com/owncloud/core/pull/37314)
* Bugfix - Cannot share with user name that has only numbers in the UI: [#37324](https://github.com/owncloud/core/issues/37324)
* Bugfix - Fix error messages: [#37338](https://github.com/owncloud/core/issues/37338)
* Bugfix - Allow unlimited access to PUT body if content length is 0: [#37394](https://github.com/owncloud/core/pull/37394)
* Bugfix - Adjust user:sync --uid to use user backend iterator: [#37398](https://github.com/owncloud/core/pull/37398)
* Bugfix - Log failed twofactor authentication: [#37401](https://github.com/owncloud/core/pull/37401)
* Bugfix - Allow clearing a user email address or display name: [#37424](https://github.com/owncloud/core/issues/37424)
* Bugfix - Allow clearing a user email address with the Provisioning API: [#37424](https://github.com/owncloud/core/issues/37424)
* Bugfix - Logging of extra fields when logger does not have a writeExtra method: [#37453](https://github.com/owncloud/core/issues/37453)
* Bugfix - Align the cancel button on public uploads: [#37504](https://github.com/owncloud/core/pull/37504)
* Bugfix - Do not notify remote if both owner and sharer are local users: [#37534](https://github.com/owncloud/core/pull/37534)
* Bugfix - Use relative path in shared_with_email activity: [#37555](https://github.com/owncloud/core/pull/37555)
* Bugfix - Show error message at Settings Personal CORS: [#37560](https://github.com/owncloud/core/pull/37560)
* Bugfix - Handle exceptions for deleted share nodes while transfering ownership: [#4023](https://github.com/owncloud/enterprise/issues/4023)
* Bugfix - Return HTTP 404 for upload attempt to nonexistent public folders: [#37625](https://github.com/owncloud/core/pull/37625)
* Bugfix - Fix for centering the credential fields on IE11: [#37693](https://github.com/owncloud/core/pull/37693)
* Change - Disallow various special usernames: [#32547](https://github.com/owncloud/core/issues/32547)
* Change - Support PHP 7.4: [#36509](https://github.com/owncloud/core/issues/36509)
* Change - Drop PHP 7.1 support across the platform: [#36510](https://github.com/owncloud/core/issues/36510)
* Change - Adjust wording displayed for empty additional settings panel: [#36775](https://github.com/owncloud/core/pull/36775)
* Change - Add index on addressbookid: [#3625](https://github.com/owncloud/enterprise/issues/3625)
* Change - Keep the mtime of files and folders inside the tarball: [#37222](https://github.com/owncloud/core/pull/37222)
* Change - Replace jeremeamia/superclosure with opis/closure: [#37238](https://github.com/owncloud/core/pull/37238)
* Change - Update icewind/streams from 0.7.1 to 0.7.2 in files_external/3rdparty: [#37249](https://github.com/owncloud/core/pull/37249)
* Change - Update icewind/streams from 0.7.1 to 0.7.2: [#37253](https://github.com/owncloud/core/pull/37253)
* Change - Update league/flysystem (1.0.66 => 1.0.67): [#37271](https://github.com/owncloud/core/pull/37271)
* Change - Update doctrine/dbal (2.10.1 => 2.10.2): [#37283](https://github.com/owncloud/core/pull/37283)
* Change - Update Symfony components to 4.4.8: [#37319](https://github.com/owncloud/core/pull/37319)
* Change - Update symfony/polyfill (1.15.0 => 1.16.0): [#37367](https://github.com/owncloud/core/pull/37367)
* Change - Update sabre/xml (2.2.0 => 2.2.1): [#37369](https://github.com/owncloud/core/pull/37369)
* Change - Update icewind/smb from 3.1.2 to 3.2.3 in files_external/3rdparty: [#37370](https://github.com/owncloud/core/pull/37370)
* Change - Update react/promise (v2.7.1 => v2.8.0): [#37383](https://github.com/owncloud/core/pull/37383)
* Change - Update league/flysystem (1.0.67 => 1.0.68): [#37385](https://github.com/owncloud/core/pull/37385)
* Change - Update symfony/polyfill (1.16.0 => 1.17.0): [#37385](https://github.com/owncloud/core/pull/37385)
* Change - Added federated shares scan cronjob depreciating incoming-shares:poll: [#37391](https://github.com/owncloud/core/pull/37391)
* Change - Update icewind/smb from 3.2.3 to 3.2.4 and files_external dependencies: [#37415](https://github.com/owncloud/core/pull/37415)
* Change - Update laminas/laminas-zendframework-bridge (1.0.3 => 1.0.4): [#37421](https://github.com/owncloud/core/pull/37421)
* Change - Update opis/closure (3.5.1 => 3.5.2): [#37431](https://github.com/owncloud/core/pull/37431)
* Change - Use strict samesite cookie: [#37442](https://github.com/owncloud/core/pull/37442)
* Change - Update opis/closure (3.5.2 => 3.5.3): [#37443](https://github.com/owncloud/core/pull/37443)
* Change - Update doctrine/lexer (1.2.0 => 1.2.1): [#37448](https://github.com/owncloud/core/pull/37448)
* Change - Update doctrine/cache (1.10.0 => 1.10.1): [#37458](https://github.com/owncloud/core/pull/37458)
* Change - Add file action to lock a file: [#37460](https://github.com/owncloud/core/pull/37460)
* Change - Update doctrine/instantiator (1.3.0 => 1.3.1): [#37464](https://github.com/owncloud/core/pull/37464)
* Change - Update Symfony components to 4.4.9: [#37465](https://github.com/owncloud/core/pull/37465)
* Change - Update nikic/php-parser (4.4.0 => 4.5.0): [#37480](https://github.com/owncloud/core/pull/37480)
* Change - Share sheet improvements (internal sharing): [#3979](https://github.com/owncloud/enterprise/issues/3979)
* Change - Update opis/closure (3.5.3 => 3.5.4): [#37492](https://github.com/owncloud/core/pull/37492)
* Change - Update Symfony components to 4.4.10: [#37522](https://github.com/owncloud/core/pull/37522)
* Change - Update egulias/email-validator (2.1.17 => 2.1.18): [#37544](https://github.com/owncloud/core/pull/37544)
* Change - Update opis/closure (3.5.4 => 3.5.5): [#37547](https://github.com/owncloud/core/pull/37547)
* Change - Share sheet improvements (external sharing): [#37558](https://github.com/owncloud/core/pull/37558)
* Change - Update symfony/polyfill (1.17.0 => 1.17.1): [#37385](https://github.com/owncloud/core/pull/37385)
* Change - Adjust wording on login page: [#37603](https://github.com/owncloud/core/issues/37603)
* Change - Add capabilities for file locking: [#37620](https://github.com/owncloud/core/issues/37620)
* Change - New CI color and background image: [#37650](https://github.com/owncloud/core/pull/37650)
* Change - Update nikic/php-parser (4.5.0 => 4.6.0): [#37651](https://github.com/owncloud/core/pull/37651)
* Change - Update Symfony contracts components to 1.1.9: [#37658](https://github.com/owncloud/core/pull/37658)
* Change - Update doctrine/cache (1.10.1 => 1.10.2): [#37665](https://github.com/owncloud/core/pull/37665)
* Change - Update phpseclib/phpseclib (2.0.27 => 2.0.28): [#37670](https://github.com/owncloud/core/pull/37670)
* Enhancement - Add new grace period and license management into core: [#36814](https://github.com/owncloud/core/pull/36814)
* Enhancement - Add 3 new events (before-fail-after) for share password validations: [#37438](https://github.com/owncloud/core/pull/37438)
* Enhancement - Boost performance of external storages: [#37451](https://github.com/owncloud/core/pull/37451)
* Enhancement - Change the behavior of the header menus: [#37490](https://github.com/owncloud/core/pull/37490)

Details
-------

* Security - Add new system config to enforce strict login check with user backend: [#37569](https://github.com/owncloud/core/pull/37569)

   Adds new system config to enforce strict login check for password in user backend, meaning only
   login name typed by user would be validated. With this configuration enabled, e.g. additional
   check for email will not be performed.

   https://github.com/owncloud/core/pull/37569
   https://github.com/owncloud/user_ldap/pull/581

* Security - Patch htmlPrefilter: [#37598](https://github.com/owncloud/core/issues/37598)

   We implemented the recommended workaround for htmlPrefilter. See
   https://github.com/advisories/GHSA-gxr4-xjj5-5px2

   https://github.com/owncloud/core/issues/37598
   https://github.com/owncloud/core/pull/37596

* Bugfix - Correct files_external:export output so it can be imported: [#37054](https://github.com/owncloud/core/issues/37054)

   The output of files_external:export was not suitable to be used as input to
   files_external:import. This has been corrected.

   https://github.com/owncloud/core/issues/37054
   https://github.com/owncloud/core/pull/37513

* Bugfix - Add force option to delete user even if the user doesn't exist: [#37103](https://github.com/owncloud/core/pull/37103)

   When the command: ./occ user:delete -f foo

   If the user foo doesn't exist, the "force" option will try to delete any remnant that such user
   could have in the system. This includes data, shares, preferences, etc. This situation has
   been detected with some setups after the upgrade of ownCloud 9 to 10 with user_ldap active. Note
   that normal user deletion behaviour will still be used if the user exists even if the "force"
   option is used.

   https://github.com/owncloud/core/pull/37103

* Bugfix - List data for pending federated share via OCS API correctly: [#34636](https://github.com/owncloud/core/issues/34636)

   Share info requested by id via OCS was empty for pending federated shares.

   https://github.com/owncloud/core/issues/34636
   https://github.com/owncloud/core/pull/37216

* Bugfix - Ensure ETag changes if a change is detected in a folder: [#37218](https://github.com/owncloud/core/pull/37218)

   Previously, if a change was detected in a folder, the ETag of the folder only changed if the
   folder's mtime changed. The ETag propagation to the root folder was working fine. If the
   folder's mtime didn't change, the ETag of the folder didn't change neither. This behaviour was
   causing problems in the desktop client because it was looking for a change, but it lost track
   once the client reached the modified folder because the ETag was the same. This was detected in
   the GDrive storage integration. Other storage works without problems. Basically, the
   desktop client wasn't able to download newly-added files in GDrive because it was unable to
   find where those files were.

   The changes fix the problem mentioned above, so the GDrive storage integration keeps the same
   behaviour as other external storages

   https://github.com/owncloud/core/pull/37218

* Bugfix - Stop writing data to the output buffer when the connection is not alive: [#37219](https://github.com/owncloud/core/pull/37219)

   Publicly shared video playback is sending a range http request to get the video content. In
   cases where the user is seeking to different positions of the video will result in a pretty high
   server load because all the video content is sent to the browser. Without detecting the
   connection state on server side all data is put to the output buffer. With this change the server
   processes will stop sending data as soon as the connection is detected as non-active.

   https://github.com/owncloud/core/pull/37219

* Bugfix - Remove unused files and config opt for settings help: [#37225](https://github.com/owncloud/core/pull/37225)

   Removed files and config options for the settings help section that are not used since 10.2.0

   https://github.com/owncloud/core/issues/36381
   https://github.com/owncloud/core/pull/37225

* Bugfix - Hide add to your OC at the public page when it's not allowed: [#37232](https://github.com/owncloud/core/pull/37232)

   'Add to your ownCloud' button was removed from the public link page if outgoing federated
   sharing is disabled.

   https://github.com/owncloud/core/pull/37232

* Bugfix - Send max number of steps as integer in RepairUnmergedShares: [#37241](https://github.com/owncloud/core/issues/37241)

   RepairUnmergedShares repair step dispatched an array as a number of steps. It is fixed to be
   integer.

   https://github.com/owncloud/core/issues/37241
   https://github.com/owncloud/core/pull/37246

* Bugfix - Remove console logging of un-escaped data: [#37256](https://github.com/owncloud/core/pull/37256)

   https://github.com/owncloud/core/pull/37256

* Bugfix - Earlier detection of connection status: [#37291](https://github.com/owncloud/core/pull/37291)

   On public video streaming the connection is detected to reduce server load #37219 To optimize
   this the connection status is queried after flush()

   https://github.com/owncloud/core/pull/37291

* Bugfix - Rewrite code to fix some notices under PHP 7.4: [#37311](https://github.com/owncloud/core/pull/37311)

   Fixed "Trying to access array offset on value of type" notices in OC\Files\Storage\DAV and
   OCA\FederatedFileSharing\FederatedShareProvider under PHP 7.4.

   https://github.com/owncloud/core/issues/37303
   https://github.com/owncloud/core/pull/37311

* Bugfix - Properly store complex Webdav properties: [#37314](https://github.com/owncloud/core/pull/37314)

   Fixed: setting custom complex DAV property and reading it returned just an 'Object' string
   instead of the original property value.

   https://github.com/owncloud/core/issues/32670
   https://github.com/owncloud/core/issues/37027
   https://github.com/owncloud/core/pull/37314

* Bugfix - Cannot share with user name that has only numbers in the UI: [#37324](https://github.com/owncloud/core/issues/37324)

   A regression in 10.4.0 meant that new shares with user names that were numbers could not be
   created in the UI. This regression has been fixed.

   https://github.com/owncloud/core/issues/37324
   https://github.com/owncloud/core/pull/37336

* Bugfix - Fix error messages: [#37338](https://github.com/owncloud/core/issues/37338)

   Fixed printing of unescaped messages.

   https://github.com/owncloud/core/issues/37338

* Bugfix - Allow unlimited access to PUT body if content length is 0: [#37394](https://github.com/owncloud/core/pull/37394)

   It was not possible to read more than one URL param of the PUT request with the empty body. This
   change checks Content-Length and do not throw the exception on empty request body if
   Content-Length states that the empty body had been sent.

   https://github.com/owncloud/core/pull/37394

* Bugfix - Adjust user:sync --uid to use user backend iterator: [#37398](https://github.com/owncloud/core/pull/37398)

   It fixes the behavior for user:sync --uid that attempts to retrieve all user backend users
   without limit at offset, that is not supported by LDAP backend. Instead, proper iterator and
   search query has been used

   https://github.com/owncloud/enterprise/issues/3981
   https://github.com/owncloud/core/pull/37398

* Bugfix - Log failed twofactor authentication: [#37401](https://github.com/owncloud/core/pull/37401)

   When user entered bad twofactor authentication (i.e. code) there was no message in
   application log. This change will log this failed authentication.

   https://github.com/owncloud/core/pull/37401

* Bugfix - Allow clearing a user email address or display name: [#37424](https://github.com/owncloud/core/issues/37424)

   The occ user:modify command would not allow the email or display name of a user to be cleared.
   This problem has been fixed.

   The email of a user can be cleared with: occ user:modify <username> email ''

   The display name of a user can be cleared with: occ user:modify <username> displayname ''

   And the effective display name reverts to the username.

   https://github.com/owncloud/core/issues/37424
   https://github.com/owncloud/core/pull/37425

* Bugfix - Allow clearing a user email address with the Provisioning API: [#37424](https://github.com/owncloud/core/issues/37424)

   Specifying the empty string as the email address is now valid when editing a user with the
   Provisioning API. This allows the email address of a user to be cleared.

   https://github.com/owncloud/core/issues/37424
   https://github.com/owncloud/core/pull/37427

* Bugfix - Logging of extra fields when logger does not have a writeExtra method: [#37453](https://github.com/owncloud/core/issues/37453)

   If a logger in use does not have a writeExtra method then an error message would be generated when
   a log entry with extra data happens.

   This problem has been corrected. In this case the basic log information will be written without
   the extra data.

   https://github.com/owncloud/core/issues/37453
   https://github.com/owncloud/core/pull/37454

* Bugfix - Align the cancel button on public uploads: [#37504](https://github.com/owncloud/core/pull/37504)

   The cancel button on the public upload progress bar was not aligned. The alignment has been
   corrected.

   https://github.com/owncloud/core/pull/37504

* Bugfix - Do not notify remote if both owner and sharer are local users: [#37534](https://github.com/owncloud/core/pull/37534)

   We tried notify remote for all federated shares. When a local share was reshared as a federated
   share it caused attempts to notify a local user via federated API. Under these conditions
   permission update caused 'Invalid Federated Cloud ID' error in Web UI. And the sharer was not
   able to delete the share at his end.

   https://github.com/owncloud/core/pull/37534

* Bugfix - Use relative path in shared_with_email activity: [#37555](https://github.com/owncloud/core/pull/37555)

   "shared_with_email" activity email was including the complete path of the shared node. This
   path has changed with the relative path of the sender user folder.

   https://github.com/owncloud/core/pull/37555

* Bugfix - Show error message at Settings Personal CORS: [#37560](https://github.com/owncloud/core/pull/37560)

   Skipping a protocol at Settings Personal CORS silently refused to add the domain. Proper error
   message added.

   https://github.com/owncloud/core/pull/37560

* Bugfix - Handle exceptions for deleted share nodes while transfering ownership: [#4023](https://github.com/owncloud/enterprise/issues/4023)

   Adds exception handling while collecting shares in files:transfer-ownership.
   Additionally, new option "accept-skipped-shares" has been added to automatically confirm
   to skip shares that cannot be transferred.

   https://github.com/owncloud/enterprise/issues/4023
   https://github.com/owncloud/core/pull/37568

* Bugfix - Return HTTP 404 for upload attempt to nonexistent public folders: [#37625](https://github.com/owncloud/core/pull/37625)

   Public files WebDAV API has been fixed to return HTTP status code 404 for upload attempt to
   nonexistent public folders.

   https://github.com/owncloud/core/issues/36055
   https://github.com/owncloud/core/pull/37625

* Bugfix - Fix for centering the credential fields on IE11: [#37693](https://github.com/owncloud/core/pull/37693)

   In IE11 the input fields for user and password were not always centered.

   https://github.com/owncloud/core/pull/37693

* Change - Disallow various special usernames: [#32547](https://github.com/owncloud/core/issues/32547)

   Special names "avatars", "files_encryption", "files_external" and "meta" are used for
   other purposes in ownCloud and are not valid usernames (UIDs). Creating a user with any of these
   names is now disallowed.

   https://github.com/owncloud/core/issues/32547
   https://github.com/owncloud/core/pull/37268

* Change - Support PHP 7.4: [#36509](https://github.com/owncloud/core/issues/36509)

   PHP 7.4 was released in Dec 2019. ownCloud server now supports PHP 7.4.

   https://github.com/owncloud/core/issues/36509
   https://github.com/owncloud/core/issues/37467
   https://github.com/owncloud/core/issues/37564
   https://github.com/owncloud/core/pull/37302
   https://github.com/owncloud/core/pull/37559
   https://github.com/owncloud/core/pull/37565
   https://github.com/owncloud/core/pull/37570
   https://www.php.net/supported-versions.php

* Change - Drop PHP 7.1 support across the platform: [#36510](https://github.com/owncloud/core/issues/36510)

   Support for security fixes for PHP 7.1 ended in Dec 2019 ownCloud core no longer supports PHP
   7.1. Ensure that you are using PHP 7.2 or later.

   https://github.com/owncloud/core/issues/36510
   https://github.com/owncloud/core/pull/37100
   https://www.php.net/supported-versions.php

* Change - Adjust wording displayed for empty additional settings panel: [#36775](https://github.com/owncloud/core/pull/36775)

   The wording displayed when the admin personal settings panel is empty has been improved.

   https://github.com/owncloud/core/pull/36775

* Change - Add index on addressbookid: [#3625](https://github.com/owncloud/enterprise/issues/3625)

   Added index for addressbookid_name_value that allows to improve scan performance of search
   addressbook query when medial search is off

   https://github.com/owncloud/enterprise/issues/3625
   https://github.com/owncloud/core/pull/37152

* Change - Keep the mtime of files and folders inside the tarball: [#37222](https://github.com/owncloud/core/pull/37222)

   Previously, when a folder or several files were downloaded, a tarball (.tar for mac, .zip for
   windows and linux) was created. Such tarball had the mtime of the files and folders inside with
   the time they were added into the tarball, not the one shown in ownCloud.

   This change makes the mtime of the files and folders inside the tarball to be maintained as
   they're shown in the ownCloud's FS.

   https://github.com/owncloud/core/pull/37222

* Change - Replace jeremeamia/superclosure with opis/closure: [#37238](https://github.com/owncloud/core/pull/37238)

   Jeremeamia/superclosure library is no longer maintained. Replace it with the recommended
   opis/closure library.

   https://github.com/owncloud/core/pull/37238

* Change - Update icewind/streams from 0.7.1 to 0.7.2 in files_external/3rdparty: [#37249](https://github.com/owncloud/core/pull/37249)

   https://github.com/owncloud/core/pull/37249

* Change - Update icewind/streams from 0.7.1 to 0.7.2: [#37253](https://github.com/owncloud/core/pull/37253)

   https://github.com/owncloud/core/pull/37253

* Change - Update league/flysystem (1.0.66 => 1.0.67): [#37271](https://github.com/owncloud/core/pull/37271)

   https://github.com/owncloud/core/pull/37271

* Change - Update doctrine/dbal (2.10.1 => 2.10.2): [#37283](https://github.com/owncloud/core/pull/37283)

   https://github.com/owncloud/core/pull/37283

* Change - Update Symfony components to 4.4.8: [#37319](https://github.com/owncloud/core/pull/37319)

   The following Symfony components have been updated to version 4.4.8: - console -
   event-dispatcher - process - routing - translation

   https://github.com/owncloud/core/pull/37319
   https://symfony.com/blog/symfony-4-4-8-released

* Change - Update symfony/polyfill (1.15.0 => 1.16.0): [#37367](https://github.com/owncloud/core/pull/37367)

   The following symfony/polyfill components have been updated to version 1.16.0:

   Symfony/polyfill-ctype symfony/polyfill-iconv symfony/polyfill-intl-idn
   symfony/polyfill-mbstring symfony/polyfill-php72 symfony/polyfill-php73

   https://github.com/owncloud/core/pull/37367

* Change - Update sabre/xml (2.2.0 => 2.2.1): [#37369](https://github.com/owncloud/core/pull/37369)

   https://github.com/owncloud/core/pull/37369

* Change - Update icewind/smb from 3.1.2 to 3.2.3 in files_external/3rdparty: [#37370](https://github.com/owncloud/core/pull/37370)

   https://github.com/owncloud/core/pull/37370

* Change - Update react/promise (v2.7.1 => v2.8.0): [#37383](https://github.com/owncloud/core/pull/37383)

   https://github.com/owncloud/core/pull/37383

* Change - Update league/flysystem (1.0.67 => 1.0.68): [#37385](https://github.com/owncloud/core/pull/37385)

   https://github.com/owncloud/core/pull/37385

* Change - Update symfony/polyfill (1.16.0 => 1.17.0): [#37385](https://github.com/owncloud/core/pull/37385)

   The following symfony/polyfill components have been updated to version 1.17.0:

   Symfony/polyfill-ctype symfony/polyfill-iconv symfony/polyfill-intl-idn
   symfony/polyfill-mbstring symfony/polyfill-php72 symfony/polyfill-php73

   https://github.com/owncloud/core/pull/37385

* Change - Added federated shares scan cronjob depreciating incoming-shares:poll: [#37391](https://github.com/owncloud/core/pull/37391)

   We've fixed the behavior for federated shares poll command that in certain conditions was
   producing stale filecache entries, and replaced it by fed shares scan cronjob.

   ScanExternalShares that was added is a background job used to scan external shares (federated
   shares) that are eligible for scanning to ensure integrity of the file cache - i.e. satisfy
   preconditions as last user login, last scan and whether root storage updated.

   https://github.com/owncloud/enterprise/issues/3902
   https://github.com/owncloud/core/pull/37391
   https://doc.owncloud.com/server/admin_manual/configuration/files/federated_cloud_sharing_configuration.html

* Change - Update icewind/smb from 3.2.3 to 3.2.4 and files_external dependencies: [#37415](https://github.com/owncloud/core/pull/37415)

   This change updates the 3rd-party dependencies of files_external: - Remove
   guzzlehttp/promises (v1.3.1) - Update icewind/smb (v3.2.3 => v3.2.4) - Update
   google/apiclient-services (v0.130 => v0.136) - Update react/promise (v2.7.1 => v2.8.0) -
   Update google/auth (v1.8.0 => v1.9.0) - Update monolog/monolog (1.25.3 => 2.0.2)

   https://github.com/owncloud/core/pull/37415

* Change - Update laminas/laminas-zendframework-bridge (1.0.3 => 1.0.4): [#37421](https://github.com/owncloud/core/pull/37421)

   https://github.com/owncloud/core/pull/37421

* Change - Update opis/closure (3.5.1 => 3.5.2): [#37431](https://github.com/owncloud/core/pull/37431)

   https://github.com/owncloud/core/pull/37431

* Change - Use strict samesite cookie: [#37442](https://github.com/owncloud/core/pull/37442)

   https://github.com/owncloud/core/pull/37442

* Change - Update opis/closure (3.5.2 => 3.5.3): [#37443](https://github.com/owncloud/core/pull/37443)

   https://github.com/owncloud/core/pull/37443

* Change - Update doctrine/lexer (1.2.0 => 1.2.1): [#37448](https://github.com/owncloud/core/pull/37448)

   https://github.com/owncloud/core/pull/37448

* Change - Update doctrine/cache (1.10.0 => 1.10.1): [#37458](https://github.com/owncloud/core/pull/37458)

   https://github.com/owncloud/core/pull/37458

* Change - Add file action to lock a file: [#37460](https://github.com/owncloud/core/pull/37460)

   https://github.com/owncloud/core/pull/37460
   https://github.com/owncloud/core/pull/37647
   https://github.com/owncloud/core/pull/37700

* Change - Update doctrine/instantiator (1.3.0 => 1.3.1): [#37464](https://github.com/owncloud/core/pull/37464)

   https://github.com/owncloud/core/pull/37464

* Change - Update Symfony components to 4.4.9: [#37465](https://github.com/owncloud/core/pull/37465)

   The following Symfony components have been updated to version 4.4.9 - console -
   event-dispatcher - process - routing - translation

   Symfony/polyfill-php80 (v1.17.0) has been added.

   https://github.com/owncloud/core/pull/37465
   https://symfony.com/blog/symfony-4-4-9-released

* Change - Update nikic/php-parser (4.4.0 => 4.5.0): [#37480](https://github.com/owncloud/core/pull/37480)

   https://github.com/owncloud/core/pull/37480

* Change - Share sheet improvements (internal sharing): [#3979](https://github.com/owncloud/enterprise/issues/3979)

   Share Sheet for internal shares was cleaned up a bit.

   - Alignment of the icons has changed - Spacing between the icons has been increased - Background
   color and dividing line for the individual shares

   https://github.com/owncloud/enterprise/issues/3979
   https://github.com/owncloud/core/pull/37491

* Change - Update opis/closure (3.5.3 => 3.5.4): [#37492](https://github.com/owncloud/core/pull/37492)

   https://github.com/owncloud/core/pull/37492

* Change - Update Symfony components to 4.4.10: [#37522](https://github.com/owncloud/core/pull/37522)

   The following Symfony components have been updated to version 4.4.10 - console -
   event-dispatcher - process - routing - translation

   https://github.com/owncloud/core/pull/37522
   https://symfony.com/blog/symfony-4-4-10-released

* Change - Update egulias/email-validator (2.1.17 => 2.1.18): [#37544](https://github.com/owncloud/core/pull/37544)

   https://github.com/owncloud/core/pull/37544

* Change - Update opis/closure (3.5.4 => 3.5.5): [#37547](https://github.com/owncloud/core/pull/37547)

   https://github.com/owncloud/core/pull/37547

* Change - Share sheet improvements (external sharing): [#37558](https://github.com/owncloud/core/pull/37558)

   Share Sheet for external shares was cleaned up a bit.

   - Color of the separator line has the same color - The padding of the icons has been enlarged - A
   background color was inserted - The padding of the content was increased on the left and right

   https://github.com/owncloud/core/pull/37558

* Change - Update symfony/polyfill (1.17.0 => 1.17.1): [#37385](https://github.com/owncloud/core/pull/37385)

   The following symfony/polyfill components have been updated to version 1.17.1:

   Symfony/polyfill-ctype symfony/polyfill-iconv symfony/polyfill-intl-idn
   symfony/polyfill-mbstring symfony/polyfill-php73 symfony/polyfill-php80

   https://github.com/owncloud/core/pull/37385

* Change - Adjust wording on login page: [#37603](https://github.com/owncloud/core/issues/37603)

   The use of "login" vs "log in" has been adjusted.

   https://github.com/owncloud/core/issues/37603
   https://github.com/owncloud/core/pull/37604

* Change - Add capabilities for file locking: [#37620](https://github.com/owncloud/core/issues/37620)

   - file_locking_support -> general capability - file_locking_enable_file_action - >
   depending on the setting

   https://github.com/owncloud/core/issues/37620
   https://github.com/owncloud/core/pull/37747

* Change - New CI color and background image: [#37650](https://github.com/owncloud/core/pull/37650)

   CI color was changed system wide and a new background image for the login screen was added. This
   will adapt ownCloud to the new style guide.

   https://github.com/owncloud/core/pull/37650

* Change - Update nikic/php-parser (4.5.0 => 4.6.0): [#37651](https://github.com/owncloud/core/pull/37651)

   https://github.com/owncloud/core/pull/37651

* Change - Update Symfony contracts components to 1.1.9: [#37658](https://github.com/owncloud/core/pull/37658)

   The following Symfony components have been updated to version 1.1.9: -
   event-dispatcher-contracts - service-contracts - event-dispatcher-contracts

   https://github.com/owncloud/core/pull/37658

* Change - Update doctrine/cache (1.10.1 => 1.10.2): [#37665](https://github.com/owncloud/core/pull/37665)

   https://github.com/owncloud/core/pull/37665

* Change - Update phpseclib/phpseclib (2.0.27 => 2.0.28): [#37670](https://github.com/owncloud/core/pull/37670)

   https://github.com/owncloud/core/pull/37670

* Enhancement - Add new grace period and license management into core: [#36814](https://github.com/owncloud/core/pull/36814)

   The new grace period allows you to try enterprise apps for 24 hours without having a valid
   license key. This grace period will be available only once, and it will start just right after
   enabling the first enterprise app. Once the grace period ends, the enterprise apps will be
   disabled (unless you have a valid license).

   License management has been moved into core and it will replace the enterprise_key app. There
   is no big change in the functionality other than a couple of improvements: The settings page
   (admin's general section) now has a field to enter your license key from there, and it will take
   into account whether the config.php is read-only. You can also enter a license key from the
   grace period popup.

   https://github.com/owncloud/core/pull/36814
   https://github.com/owncloud/core/pull/37711
   https://github.com/owncloud/core/pull/37731

* Enhancement - Add 3 new events (before-fail-after) for share password validations: [#37438](https://github.com/owncloud/core/pull/37438)

   'share.beforepasswordcheck', 'share.afterpasswordcheck' and
   'share.failedpasswordcheck' events have been added for share password validations. Needs
   an update of brute_force_protection app to at least 1.1.0

   https://github.com/owncloud/core/pull/37438

* Enhancement - Boost performance of external storages: [#37451](https://github.com/owncloud/core/pull/37451)

   We've cached some additional information that will boost the performance of external
   storages. This boost will be particularly noticeable for SMB connections

   https://github.com/owncloud/core/pull/37451

* Enhancement - Change the behavior of the header menus: [#37490](https://github.com/owncloud/core/pull/37490)

   - Dynamically adjusting the width of the left menu - Changed the centering of the icons -
   Automatic wrap to a second line after the third entry - Hover effect in the left and right menu

   https://github.com/owncloud/core/pull/37490

Changelog for ownCloud Core [10.4.1] (2020-03-30)
=======================================
The following sections list the changes in ownCloud core 10.4.1 relevant to
ownCloud admins and users.

[10.4.1]: https://github.com/owncloud/core/compare/v10.4.0...v10.4.1

Summary
-------

* Bugfix - Show re-share public links to share-owner: [#36865](https://github.com/owncloud/core/pull/36865)
* Bugfix - It's not possible to download externally encrypted files: [#36921](https://github.com/owncloud/core/pull/36921)
* Bugfix - User:resetpassword with --send-email --password-from-env: [#36925](https://github.com/owncloud/core/issues/36925)
* Bugfix - Avoid unneeded DB connections after a long download: [#36978](https://github.com/owncloud/core/pull/36978)
* Bugfix - Remove full-stop from end of reset password message: [#36984](https://github.com/owncloud/core/pull/36984)
* Bugfix - Show pending remote shares at the Shared with you tab: [#37022](https://github.com/owncloud/core/pull/37022)
* Bugfix - Initialize the user before the transfer command: [#37038](https://github.com/owncloud/core/pull/37038)
* Bugfix - Google drive files without extension 404: [#37044](https://github.com/owncloud/core/issues/37044)
* Bugfix - Fix public link upload remaining time estimation: [#37053](https://github.com/owncloud/core/pull/37053)
* Bugfix - Fix OCS Share API response for requests contain "include_tags" parameter: [#37084](https://github.com/owncloud/core/issues/37084)
* Bugfix - Add share type to the verifyExpirationDate hook: [#37135](https://github.com/owncloud/core/pull/37135)
* Bugfix - Fix CLI zero exit code on startup errors: [#37098](https://github.com/owncloud/core/issues/37098)
* Bugfix - Respect sharing.federation.allowHttpFallback config option: [#37153](https://github.com/owncloud/core/pull/37153)
* Change - Write crash log in case of parse error in config.php: [#36570](https://github.com/owncloud/core/issues/36570)
* Change - Fix ini_set error spamming the log: [#36749](https://github.com/owncloud/core/pull/36749)
* Change - Update egulias/email-validator (2.1.15 => 2.1.17): [#36955](https://github.com/owncloud/core/pull/36955)
* Change - Update webmozart/assert (1.6.0 => 1.7.0): [#36955](https://github.com/owncloud/core/pull/36955)
* Change - Update symfony/polyfill (1.13.1 => 1.14.0): [#36955](https://github.com/owncloud/core/pull/36955)
* Change - Don't write potential sensitive data to the log file: [#36961](https://github.com/owncloud/core/pull/36961)
* Change - Update Graffino/Browser-Update from 2.0.2 to 2.0.5: [#36976](https://github.com/owncloud/core/issues/36976)
* Change - Update phpseclib/phpseclib (2.0.23 => 2.0.24): [#37010](https://github.com/owncloud/core/pull/37010)
* Change - Update phpseclib/phpseclib (2.0.24 => 2.0.25): [#37014](https://github.com/owncloud/core/pull/37014)
* Change - Allow dot in database name: [#20381](https://github.com/owncloud/core/issues/20381)
* Change - Respect default_language when sending email notifications: [#37039](https://github.com/owncloud/core/issues/37039)
* Change - Lookup email subject in correct translation context: [#37040](https://github.com/owncloud/core/issues/37040)
* Change - Update Symfony components to 4.4.5: [#37052](https://github.com/owncloud/core/pull/37052)
* Change - Return correct custom dav properties for folder contents: [#37058](https://github.com/owncloud/core/pull/37058)
* Change - Hardening Cache-Control headers for some responses: [#37082](https://github.com/owncloud/core/pull/37082)
* Change - Add menu entry to phoenix if phoenix is configured: [#37083](https://github.com/owncloud/core/pull/37083)
* Change - Update league/flysystem (1.0.64 => 1.0.65): [#37096](https://github.com/owncloud/core/pull/37096)
* Change - Include reshares in the webdav response when asking for share types: [#37107](https://github.com/owncloud/core/pull/37107)
* Change - Fix UX in files app: [#37116](https://github.com/owncloud/core/pull/37116)
* Change - Update laminas/laminas-validator (2.13.1 => 2.13.2): [#37131](https://github.com/owncloud/core/pull/37131)
* Change - Update league/flysystem (1.0.65 => 1.0.66): [#37136](https://github.com/owncloud/core/pull/37136)
* Change - Update minimist (1.2.2 => 1.2.3): [#37138](https://github.com/owncloud/core/pull/37138)
* Change - Update sabre/dav from version 4.0.3 to 4.1.0: [#37151](https://github.com/owncloud/core/pull/37151)
* Change - Update phpseclib/phpseclib (2.0.25 => 2.0.26): [#37155](https://github.com/owncloud/core/pull/37155)
* Change - Update psr/log (1.1.2 => 1.1.3): [#37161](https://github.com/owncloud/core/pull/37161)
* Change - Query on oc_properties is now always chunked: [#37172](https://github.com/owncloud/core/pull/37172)
* Change - Proper error handling on preview endpoint: [#37173](https://github.com/owncloud/core/pull/37173)
* Change - Update symfony/polyfill (1.14.1 => 1.15.0): [#37174](https://github.com/owncloud/core/pull/37174)
* Change - Update laminas/laminas-zendframework-bridge (1.0.1 => 1.0.2): [#37174](https://github.com/owncloud/core/pull/37174)
* Change - Update Symfony components to 4.4.6: [#37176](https://github.com/owncloud/core/pull/37176)
* Change - Update Laminas dependecies: [#37188](https://github.com/owncloud/core/pull/37188)
* Change - Update Symfony components to 4.4.7: [#37193](https://github.com/owncloud/core/pull/37193)
* Change - Update laminas/laminas-validator from 2.13.3 to 2.13.4: [#37199](https://github.com/owncloud/core/pull/37199)
* Change - Update laminas/laminas-zendframework-bridge (1.0.2 => 1.0.3): [#37214](https://github.com/owncloud/core/pull/37214)
* Change - Update phpseclib/phpseclib (2.0.26 => 2.0.27): [#37214](https://github.com/owncloud/core/pull/37214)
* Change - Update nikic/php-parser (4.3.0 => 4.4.0): [#37237](https://github.com/owncloud/core/pull/37237)
* Enhancement - Add new occ command to check the cache for primary storages: [#37067](https://github.com/owncloud/core/pull/37067)

Details
-------

* Bugfix - Show re-share public links to share-owner: [#36865](https://github.com/owncloud/core/pull/36865)

   Public links created by share-recipient were not visible to share-owner. This problem has
   been resolved.

   https://github.com/owncloud/core/pull/36865

* Bugfix - It's not possible to download externally encrypted files: [#36921](https://github.com/owncloud/core/pull/36921)

   Downloading was failing with the message "Encryption not ready: Module with id:
   OC_DEFAULT_MODULE does not exist." if the file was encrypted with another ownCloud instance.

   https://github.com/owncloud/core/pull/36921

* Bugfix - User:resetpassword with --send-email --password-from-env: [#36925](https://github.com/owncloud/core/issues/36925)

   When trying to do command: occ user:resetpassword Anne --send-email --password-from-env

   If Anne does not have an email address setup then an error was logged in the ownCloud log.

   This has been corrected. Now the administrator is shown the correct error "Email address is not
   set for the user Anne"

   https://github.com/owncloud/core/issues/36925
   https://github.com/owncloud/core/pull/36926

* Bugfix - Avoid unneeded DB connections after a long download: [#36978](https://github.com/owncloud/core/pull/36978)

   After a long download, we needed to return the filesize, which needed a connection to the DB. The
   DB could have ended the connection due to an inactivity timeout. Now, the filesize is fetched
   before starting the download, so this timeout shouldn't happen any longer. We still need to
   update the checksum after the download is finished. In this case, we just log an error message
   and keep going.

   https://github.com/owncloud/core/pull/36978

* Bugfix - Remove full-stop from end of reset password message: [#36984](https://github.com/owncloud/core/pull/36984)

   When doing occ user:resetpassword username --password-from-env --send-email the message
   "Successfully reset password for username" had a full-stop at the end. Without --send-email
   there was no full-stop. The full-stop has been removed to make the messages consistent.

   https://github.com/owncloud/core/pull/36984

* Bugfix - Show pending remote shares at the Shared with you tab: [#37022](https://github.com/owncloud/core/pull/37022)

   Fixed missing pending remote shares in the file list at the Shared with you tab.

   https://github.com/owncloud/core/pull/37022

* Bugfix - Initialize the user before the transfer command: [#37038](https://github.com/owncloud/core/pull/37038)

   Trying to transfer the ownership of files to a user who hadn't logged in was causing problems
   because the FS of such user wasn't initialized and it wasn't possible to move the files there.
   The command appeared to work, but the files weren't moved.

   Now such user has the FS initialized so the transfer can be completed normally.

   https://github.com/owncloud/core/pull/37038

* Bugfix - Google drive files without extension 404: [#37044](https://github.com/owncloud/core/issues/37044)

   Google Drive files without a file extension (".git/HEAD" for example) would result in a 404
   response from the Web UI or desktop client. The problem has been fixed.

   https://github.com/owncloud/core/issues/37044
   https://github.com/owncloud/core/pull/37045

* Bugfix - Fix public link upload remaining time estimation: [#37053](https://github.com/owncloud/core/pull/37053)

   Public link upload wrong remaining time estimation problem has been resolved. Also, the
   remaining time calculation logic has been changed for smoother performance.

   https://github.com/owncloud/core/issues/25053
   https://github.com/owncloud/core/pull/37053

* Bugfix - Fix OCS Share API response for requests contain "include_tags" parameter: [#37084](https://github.com/owncloud/core/issues/37084)

   Sending "include_tags" request parameter for OCS Share API was led to duplicated share
   entries in API response. This bug has been fixed by using share_id instead of file_id when
   populating tags. Also, the tag generation helper method simplified by customizing it for only
   shares.

   https://github.com/owncloud/core/issues/37084
   https://github.com/owncloud/core/pull/37088

* Bugfix - Add share type to the verifyExpirationDate hook: [#37135](https://github.com/owncloud/core/pull/37135)

   The verifyExpirationDate hook notifies the password_policy app about proposed expiration
   dates of shares. The share type was not being passed in the hook. This meant that the
   password_policy app incorrectly processed user and group share expiration dates. See the
   linked issue for details. The problem has been corrected.

   https://github.com/owncloud/password_policy/issues/287
   https://github.com/owncloud/core/pull/37135

* Bugfix - Fix CLI zero exit code on startup errors: [#37098](https://github.com/owncloud/core/issues/37098)

   Zero exit code was returned on startup with a missing app directory or a non-writable config
   directory. Now exit code is 1.

   https://github.com/owncloud/core/issues/37098
   https://github.com/owncloud/core/pull/37148

* Bugfix - Respect sharing.federation.allowHttpFallback config option: [#37153](https://github.com/owncloud/core/pull/37153)

   Federated share can be created for server without SSL, by setting config option
   sharing.federation.allowHttpFallback=true.

   https://github.com/owncloud/core/pull/37153

* Change - Write crash log in case of parse error in config.php: [#36570](https://github.com/owncloud/core/issues/36570)

   https://github.com/owncloud/core/issues/36570

* Change - Fix ini_set error spamming the log: [#36749](https://github.com/owncloud/core/pull/36749)

   https://github.com/owncloud/core/pull/36749

* Change - Update egulias/email-validator (2.1.15 => 2.1.17): [#36955](https://github.com/owncloud/core/pull/36955)

   https://github.com/owncloud/core/pull/36955

* Change - Update webmozart/assert (1.6.0 => 1.7.0): [#36955](https://github.com/owncloud/core/pull/36955)

   https://github.com/owncloud/core/pull/36955

* Change - Update symfony/polyfill (1.13.1 => 1.14.0): [#36955](https://github.com/owncloud/core/pull/36955)

   The following symfony/polyfill components have been updated to version 1.14.0:

   Symfony/polyfill-ctype symfony/polyfill-iconv symfony/polyfill-intl-idn
   symfony/polyfill-mbstring symfony/polyfill-php56 symfony/polyfill-php72
   symfony/polyfill-php73 symfony/polyfill-util

   https://github.com/owncloud/core/pull/36955

* Change - Don't write potential sensitive data to the log file: [#36961](https://github.com/owncloud/core/pull/36961)

   Sensitive data like passwords are not written to the log when the exception is thrown from
   within a closure.

   https://github.com/owncloud/core/pull/36961

* Change - Update Graffino/Browser-Update from 2.0.2 to 2.0.5: [#36976](https://github.com/owncloud/core/issues/36976)

   https://github.com/owncloud/core/issues/36976
   https://github.com/owncloud/core/pull/36981

* Change - Update phpseclib/phpseclib (2.0.23 => 2.0.24): [#37010](https://github.com/owncloud/core/pull/37010)

   https://github.com/owncloud/core/pull/37010

* Change - Update phpseclib/phpseclib (2.0.24 => 2.0.25): [#37014](https://github.com/owncloud/core/pull/37014)

   https://github.com/owncloud/core/pull/37014

* Change - Allow dot in database name: [#20381](https://github.com/owncloud/core/issues/20381)

   When installing ownCloud the database name is now allowed to contain a dot.

   https://github.com/owncloud/core/issues/20381
   https://github.com/owncloud/core/pull/37020

* Change - Respect default_language when sending email notifications: [#37039](https://github.com/owncloud/core/issues/37039)

   https://github.com/owncloud/core/issues/37039

* Change - Lookup email subject in correct translation context: [#37040](https://github.com/owncloud/core/issues/37040)

   Use 'lib' instead of 'core' to get the translations.

   https://github.com/owncloud/core/issues/37040

* Change - Update Symfony components to 4.4.5: [#37052](https://github.com/owncloud/core/pull/37052)

   The following Symfony components have been updated to version 4.4.5: - console -
   event-dispatcher - process - routing - translation

   https://github.com/owncloud/core/pull/37052
   https://symfony.com/blog/symfony-4-4-5-released

* Change - Return correct custom dav properties for folder contents: [#37058](https://github.com/owncloud/core/pull/37058)

   https://github.com/owncloud/core/issues/36920
   https://github.com/owncloud/core/pull/37058

* Change - Hardening Cache-Control headers for some responses: [#37082](https://github.com/owncloud/core/pull/37082)

   https://github.com/owncloud/core/pull/37082

* Change - Add menu entry to phoenix if phoenix is configured: [#37083](https://github.com/owncloud/core/pull/37083)

   https://github.com/owncloud/core/pull/37083

* Change - Update league/flysystem (1.0.64 => 1.0.65): [#37096](https://github.com/owncloud/core/pull/37096)

   https://github.com/owncloud/core/pull/37096

* Change - Include reshares in the webdav response when asking for share types: [#37107](https://github.com/owncloud/core/pull/37107)

   Previously, only shares initiated by the user were being returned when asked for the shares.
   Now, reshares are also included in the response

   https://github.com/owncloud/core/pull/37107

* Change - Fix UX in files app: [#37116](https://github.com/owncloud/core/pull/37116)

   Some translations are now properly displayed and in an empty readonly folder a message is
   displayed that no files can be uploaded.

   https://github.com/owncloud/core/pull/37116

* Change - Update laminas/laminas-validator (2.13.1 => 2.13.2): [#37131](https://github.com/owncloud/core/pull/37131)

   https://github.com/owncloud/core/pull/37131

* Change - Update league/flysystem (1.0.65 => 1.0.66): [#37136](https://github.com/owncloud/core/pull/37136)

   https://github.com/owncloud/core/pull/37136

* Change - Update minimist (1.2.2 => 1.2.3): [#37138](https://github.com/owncloud/core/pull/37138)

   https://github.com/owncloud/core/pull/37138

* Change - Update sabre/dav from version 4.0.3 to 4.1.0: [#37151](https://github.com/owncloud/core/pull/37151)

   https://github.com/owncloud/core/pull/37151
   https://github.com/sabre-io/dav/releases/tag/4.1.0

* Change - Update phpseclib/phpseclib (2.0.25 => 2.0.26): [#37155](https://github.com/owncloud/core/pull/37155)

   https://github.com/owncloud/core/pull/37155

* Change - Update psr/log (1.1.2 => 1.1.3): [#37161](https://github.com/owncloud/core/pull/37161)

   https://github.com/owncloud/core/pull/37161

* Change - Query on oc_properties is now always chunked: [#37172](https://github.com/owncloud/core/pull/37172)

   https://github.com/owncloud/core/pull/37172

* Change - Proper error handling on preview endpoint: [#37173](https://github.com/owncloud/core/pull/37173)

   Preview requests for folders now return 400/Bad Request and any false parameters of the
   preview generation now return 400/Bad Request as well.

   https://github.com/owncloud/core/issues/37164
   https://github.com/owncloud/core/issues/37165
   https://github.com/owncloud/core/pull/37173

* Change - Update symfony/polyfill (1.14.1 => 1.15.0): [#37174](https://github.com/owncloud/core/pull/37174)

   The following symfony/polyfill components have been updated to version 1.15.0:

   Symfony/polyfill-ctype symfony/polyfill-iconv symfony/polyfill-intl-idn
   symfony/polyfill-mbstring symfony/polyfill-php56 symfony/polyfill-php72
   symfony/polyfill-php73 symfony/polyfill-util

   https://github.com/owncloud/core/pull/37174

* Change - Update laminas/laminas-zendframework-bridge (1.0.1 => 1.0.2): [#37174](https://github.com/owncloud/core/pull/37174)

   https://github.com/owncloud/core/pull/37174

* Change - Update Symfony components to 4.4.6: [#37176](https://github.com/owncloud/core/pull/37176)

   The following Symfony components have been updated to version 4.4.6: - console -
   event-dispatcher - process - routing - translation

   https://github.com/owncloud/core/pull/37176
   https://symfony.com/blog/symfony-4-4-6-released

* Change - Update Laminas dependecies: [#37188](https://github.com/owncloud/core/pull/37188)

   Bump laminas/laminas-validator from 2.13.2 to 2.13.3 Bump laminas/laminas-filter from
   2.9.3 to 2.9.4

   https://github.com/owncloud/core/pull/37188

* Change - Update Symfony components to 4.4.7: [#37193](https://github.com/owncloud/core/pull/37193)

   The following Symfony components have been updated to version 4.4.7: - console -
   event-dispatcher - process - routing - translation

   https://github.com/owncloud/core/pull/37193
   https://symfony.com/blog/symfony-4-4-7-released

* Change - Update laminas/laminas-validator from 2.13.3 to 2.13.4: [#37199](https://github.com/owncloud/core/pull/37199)

   https://github.com/owncloud/core/pull/37199

* Change - Update laminas/laminas-zendframework-bridge (1.0.2 => 1.0.3): [#37214](https://github.com/owncloud/core/pull/37214)

   https://github.com/owncloud/core/pull/37214

* Change - Update phpseclib/phpseclib (2.0.26 => 2.0.27): [#37214](https://github.com/owncloud/core/pull/37214)

   https://github.com/owncloud/core/pull/37214

* Change - Update nikic/php-parser (4.3.0 => 4.4.0): [#37237](https://github.com/owncloud/core/pull/37237)

   https://github.com/owncloud/core/pull/37237

* Enhancement - Add new occ command to check the cache for primary storages: [#37067](https://github.com/owncloud/core/pull/37067)

   This is a new occ command mainly for objectstores (objectstore and files_primary_s3 apps) as
   primary storages, but it can be used also for local primary storage.

   The use case is when a file is deleted directly from the primary storage without going through
   ownCloud. This is a scenario that shouldn't happen (modifying the primary storage outside of
   ownCloud isn't supported).

   The command will check if the target file can be accessed, and if not you can delete the
   information that ownCloud has (the command provides an option for this).

   The command will only work for the primary storage. It will ignore files that are accessible
   through a share (they need to be accessed directly), or files that are in an external storage.

   https://github.com/owncloud/core/pull/37067

Changelog for ownCloud Core [10.4.0] (2020-02-10)
=======================================
The following sections list the changes in ownCloud core 10.4.0 relevant to
ownCloud admins and users.

[10.4.0]: https://github.com/owncloud/core/compare/v10.3.2...v10.4.0

Summary
-------

* Bugfix - Fix links in setupchecks.js: [#36315](https://github.com/owncloud/core/pull/36315)
* Bugfix - Set 599 HTTP code on error: [#36413](https://github.com/owncloud/core/pull/36413)
* Bugfix - Fix "files:transfer-ownership" in S3 multi-bucket setups: [#36464](https://github.com/owncloud/core/pull/36464)
* Bugfix - Fix Trash-bin api access: [#36378](https://github.com/owncloud/core/issues/36378)
* Bugfix - Files shared with user cause purge of the trashbin content: [#36494](https://github.com/owncloud/core/pull/36494)
* Bugfix - Enhance validation for sender e-mail address for e-mail notifications: [#36505](https://github.com/owncloud/core/pull/36505)
* Bugfix - Suppress warning when resetting user password with masterkey encryption: [#36523](https://github.com/owncloud/core/pull/36523)
* Bugfix - Stream_read not returning requested length for encrypted remote storage: [#34599](https://github.com/owncloud/core/issues/34599)
* Bugfix - Receive multiple users for user sync command: [#36576](https://github.com/owncloud/core/pull/36576)
* Bugfix - Fix null for empty path on Oracle: [#36610](https://github.com/owncloud/core/pull/36610)
* Bugfix - Do not dispatch DeclineShare event for nonexistent shares: [#36759](https://github.com/owncloud/core/pull/36759)
* Bugfix - Remove part files when upload is cancelled for all public links: [#36761](https://github.com/owncloud/core/pull/36761)
* Bugfix - Return correct file size in the public files webdav API: [#36741](https://github.com/owncloud/core/issues/36741)
* Bugfix - Fix one-time password (OTP) verify button width: [#36807](https://github.com/owncloud/core/pull/36807)
* Bugfix - Sharing with a user and group of the same name on the webUI: [#36813](https://github.com/owncloud/core/issues/36813)
* Bugfix - Fix provisioning API request for user information in mixed case: [#36822](https://github.com/owncloud/core/issues/36822)
* Bugfix - Fix output of files_external:list command: [#36839](https://github.com/owncloud/core/issues/36839)
* Bugfix - Add translation code for the Personal->Sharing section: [#36875](https://github.com/owncloud/core/pull/36875)
* Change - Validate reshare permissions and attributes based on supershare: [#36265](https://github.com/owncloud/core/pull/36265)
* Change - Drop PHP 7.0 support across the platform: [#36290](https://github.com/owncloud/core/pull/36290)
* Change - Don't report locking support in public.php and public-files endpoints: [#36402](https://github.com/owncloud/core/pull/36402)
* Change - Update handlebars library to 4.5.3: [#36439](https://github.com/owncloud/core/pull/36439)
* Change - Update Symfony polyfill components to 1.13.0: [#36485](https://github.com/owncloud/core/pull/36485)
* Change - Update sabre/http (5.0.2 => 5.0.5): [#36490](https://github.com/owncloud/core/pull/36490)
* Change - Update doctrine/cache (1.9.1 => 1.10.0): [#36503](https://github.com/owncloud/core/pull/36503)
* Change - Update Symfony components to 3.4.36: [#36503](https://github.com/owncloud/core/pull/36503)
* Change - Update punic/punic (3.4.0 => 3.5.0): [#36508](https://github.com/owncloud/core/pull/36508)
* Change - Update patchwork/utf8 (1.3.1 => 1.3.2): [#36552](https://github.com/owncloud/core/pull/36552)
* Change - Update league/flysystem (1.0.57 => 1.0.61): [#36553](https://github.com/owncloud/core/pull/36553)
* Change - Update pear/archive_tar (1.4.8 => 1.4.9): [#36554](https://github.com/owncloud/core/pull/36554)
* Change - Protect public preview with password: [#36571](https://github.com/owncloud/core/pull/36571)
* Change - Consolidate user/group share actions into single dropdown: [#36587](https://github.com/owncloud/core/pull/36587)
* Change - Update pear/pear_exception (v1.0.0 => v1.0.1): [#36599](https://github.com/owncloud/core/pull/36599)
* Change - Update myclabs/deep-copy (1.9.3 => 1.9.4): [#36599](https://github.com/owncloud/core/pull/36599)
* Change - Update phpspec/prophecy (1.9.0 => 1.10.0): [#36603](https://github.com/owncloud/core/pull/36603)
* Change - Update sabre/vobject (4.2.0 => 4.2.1): [#36614](https://github.com/owncloud/core/pull/36614)
* Change - Update league/flysystem (1.0.61 => 1.0.62): [#36659](https://github.com/owncloud/core/pull/36659)
* Change - Update zendframework/zend-validator (2.12.2 => 2.13.0): [#36660](https://github.com/owncloud/core/pull/36660)
* Change - Update egulias/email-validator (2.1.11 => 2.1.13): [#36661](https://github.com/owncloud/core/pull/36661)
* Change - Update phpdocumentor/reflection-docblock (4.3.2 => 4.3.4): [#36661](https://github.com/owncloud/core/pull/36661)
* Change - Update phpspec/prophecy (1.10.0 => 1.10.1): [#36661](https://github.com/owncloud/core/pull/36661)
* Change - Zendframework dependency to laminas: [#36677](https://github.com/owncloud/core/pull/36677)
* Change - Update league/flysystem (1.0.62 => 1.0.63): [#36709](https://github.com/owncloud/core/pull/36709)
* Change - Switch to new id3parser: [#36717](https://github.com/owncloud/core/issues/36717)
* Change - Update deepdiver1975/tarstreamer (0.1.1 => 2.0.0): [#36722](https://github.com/owncloud/core/pull/36722)
* Change - Update egulias/email-validator (2.1.13 => 2.1.14): [#36726](https://github.com/owncloud/core/issues/36726)
* Change - Update laminas dependencies: [#36726](https://github.com/owncloud/core/issues/36726)
* Change - Update sabre/dav (4.0.2 => 4.0.3): [#36742](https://github.com/owncloud/core/issues/36742)
* Change - Update showdown library to 1.9.1: [#36752](https://github.com/owncloud/core/pull/36752)
* Change - Update composer/semver (1.5.0 => 1.5.1): [#36753](https://github.com/owncloud/core/pull/36753)
* Change - Update sabre/vobject (4.2.1 => 4.2.2): [#36757](https://github.com/owncloud/core/pull/36757)
* Change - Adjust wording displayed for empty additional settings panel: [#36776](https://github.com/owncloud/core/pull/36776)
* Change - Update laminas/laminas-validator (2.13.0 => 2.13.1): [#36780](https://github.com/owncloud/core/pull/36780)
* Change - Update myclabs/deep-copy (1.9.4 => 1.9.5): [#36780](https://github.com/owncloud/core/pull/36780)
* Change - Update egulias/email-validator (2.1.14 => 2.1.15): [#36789](https://github.com/owncloud/core/pull/36789)
* Change - Update phpspec/prophecy (1.10.1 => v1.10.2): [#36789](https://github.com/owncloud/core/pull/36789)
* Change - Update symfony (3.4.36 => 3.4.37): [#36796](https://github.com/owncloud/core/pull/36796)
* Change - Update punic/punic (3.5.0 => 3.5.1): [#36826](https://github.com/owncloud/core/pull/36826)
* Change - Update sabre dependencies: [#36866](https://github.com/owncloud/core/pull/36866)
* Change - Update symfony (3.4.37 => 4.4.4): [#36881](https://github.com/owncloud/core/pull/36881)
* Change - Update league/flysystem (1.0.63 => 1.0.64): [#36895](https://github.com/owncloud/core/pull/36895)
* Enhancement - MariaDB 10.3 support: [#29483](https://github.com/owncloud/core/issues/29483)
* Enhancement - PostgreSQL 10 support: [#33187](https://github.com/owncloud/core/issues/33187)
* Enhancement - Regex version for blacklisted_files and excluded_directories: [#36360](https://github.com/owncloud/core/pull/36360)
* Enhancement - Add an option to provide a mount in read only mode: [#36397](https://github.com/owncloud/core/pull/36397)
* Enhancement - Add user-sync OCS API: [#36428](https://github.com/owncloud/core/pull/36428)
* Enhancement - Support Oracle connection strings: [#36489](https://github.com/owncloud/core/pull/36489)
* Enhancement - Add enabled and disabled filter options to occ app:list command: [#36520](https://github.com/owncloud/core/pull/36520)
* Enhancement - Optimize memory usage in Expire Trashbin Background job: [#36565](https://github.com/owncloud/core/pull/36565)
* Enhancement - Share indicator on webUI: [#36572](https://github.com/owncloud/core/pull/36572)
* Enhancement - Expiration date for user and group shares: [#36573](https://github.com/owncloud/core/pull/36573)
* Enhancement - Reduce memory footprint of trash expiry jobs: [#36602](https://github.com/owncloud/core/pull/36602)
* Enhancement - Allow plus sign in username: [#36613](https://github.com/owncloud/core/pull/36613)
* Enhancement - Optimize memory consumption of occ files:checksums:verify command: [#31133](https://github.com/owncloud/core/issues/31133)
* Enhancement - MariaDB 10.4 support: [#36799](https://github.com/owncloud/core/issues/36799)
* Enhancement - Enable DAV endpoints for trashbin and for public shares: [#36815](https://github.com/owncloud/core/pull/36815)
* Enhancement - Additional share owner and initiator info in shares API response: [#36823](https://github.com/owncloud/core/issues/36823)
* Enhancement - Add very verbose mode to remote shares polling: [#36832](https://github.com/owncloud/core/pull/36832)

Details
-------

* Bugfix - Fix links in setupchecks.js: [#36315](https://github.com/owncloud/core/pull/36315)

   Security tips at Settings -> Admin -> General had two broken links to the owncloud docs in the
   messages performing HTTPS and HSTS checks

   https://github.com/owncloud/core/issues/36238
   https://github.com/owncloud/core/pull/36315

* Bugfix - Set 599 HTTP code on error: [#36413](https://github.com/owncloud/core/pull/36413)

   Previously, a hard crash, such as DB being down, was being reported with a stacktrace and a 200
   HTTP code. In order to homogenize the behaviour with all the endpoints, we've changed the
   behaviour to return a 599 HTTP code and an empty content.

   In addition, we've included a new option in the config.php, "crashdirectory", which defaults
   to the "datadirectory" set, where the crash logs will be created. Note that normal errors will
   still be reported normally and will log into the owncloud.log file.

   https://github.com/owncloud/core/pull/36413

* Bugfix - Fix "files:transfer-ownership" in S3 multi-bucket setups: [#36464](https://github.com/owncloud/core/pull/36464)

   There were problems using the files:transfer-ownership in setups using files_primary_s3
   against S3 storage with multibucket configuration, when some of the transferred files were
   shared with other people. This PR fixes that problem with the shares while transferring the
   files, allowing the files:transfer-ownership to finish correctly

   https://github.com/owncloud/core/pull/36464

* Bugfix - Fix Trash-bin api access: [#36378](https://github.com/owncloud/core/issues/36378)

   Trash-bin API had allowed users to see the trash-bin content of other users.

   https://github.com/owncloud/core/issues/36378
   https://github.com/owncloud/core/pull/36488

* Bugfix - Files shared with user cause purge of the trashbin content: [#36494](https://github.com/owncloud/core/pull/36494)

   Files_trashbin app counted incoming shares on calculation of the occupied space. It caused
   purge of the trashbin content when trashbin_retention_obligation is auto, user has quota set
   and incoming shares exceed 50% of this quota.

   https://github.com/owncloud/core/pull/36494

* Bugfix - Enhance validation for sender e-mail address for e-mail notifications: [#36505](https://github.com/owncloud/core/pull/36505)

   If a user wanted to use the e-mail notification mechanism in order to notify other users when
   creating public links as well as internal shares, an error was triggered if the e-mail address
   for this user was not set. The behavior has now been fixed.

   https://github.com/owncloud/core/pull/36505

* Bugfix - Suppress warning when resetting user password with masterkey encryption: [#36523](https://github.com/owncloud/core/pull/36523)

   When an admin wanted to reset a user's password on the User management page with masterkey
   encryption in place, a warning was displayed about data recovery not being available. The
   behavior has now been fixed.

   https://github.com/owncloud/core/pull/36523

* Bugfix - Stream_read not returning requested length for encrypted remote storage: [#34599](https://github.com/owncloud/core/issues/34599)

   Stream_read was not always returning the requested length for encrypted remote storage. This
   could result in errors when downloading files. The issue has been corrected.

   https://github.com/owncloud/core/issues/34599
   https://github.com/owncloud/core/pull/36546

* Bugfix - Receive multiple users for user sync command: [#36576](https://github.com/owncloud/core/pull/36576)

   Receive multiple users for user sync command. Previously when multiple users were returned,
   an exception was thrown and the command was aborted. In this fix we allow multiple users to be
   returned, and we check that the uid provided by the admin matches with the returned users. And if
   we find matches of more than one users with same uid, then we throw the exception that was thrown
   previously. The messages are kept intact.

   https://github.com/owncloud/core/pull/36576

* Bugfix - Fix null for empty path on Oracle: [#36610](https://github.com/owncloud/core/pull/36610)

   An empty path was fetched as null and not as an empty string. Due to the strict comparison it
   caused the list of mounts for the existing fileId to be empty. So the higher level code relaying
   on the mounts list got an empty list and did nothing.

   https://github.com/owncloud/core/pull/36610

* Bugfix - Do not dispatch DeclineShare event for nonexistent shares: [#36759](https://github.com/owncloud/core/pull/36759)

   DeclineShare event was dispatched even when the share had been not found in oc_share_external
   table. It caused sending unshare notification to the empty hostname.

   https://github.com/owncloud/core/pull/36759

* Bugfix - Remove part files when upload is cancelled for all public links: [#36761](https://github.com/owncloud/core/pull/36761)

   Remove part files when the upload is cancelled for public links. Prior to this change, it was
   noticed that for `Upload Only` and `Download / View / Upload` the part files were not cleaned up.
   With this change it does clean up.

   https://github.com/owncloud/core/pull/36761

* Bugfix - Return correct file size in the public files webdav API: [#36741](https://github.com/owncloud/core/issues/36741)

   https://github.com/owncloud/core/issues/36741
   https://github.com/owncloud/core/pull/36778

* Bugfix - Fix one-time password (OTP) verify button width: [#36807](https://github.com/owncloud/core/pull/36807)

   The one-time password (OTP) verify button width has been extended.

   https://github.com/owncloud/core/pull/36807
   https://github.com/owncloud/core/pull/36892

* Bugfix - Sharing with a user and group of the same name on the webUI: [#36813](https://github.com/owncloud/core/issues/36813)

   When sharing with both a user and a group that have the same name it was not possible to adjust the
   sharing permissions of the 2nd share on the webUI. This problem has been corrected.

   https://github.com/owncloud/core/issues/36813
   https://github.com/owncloud/core/pull/36766

* Bugfix - Fix provisioning API request for user information in mixed case: [#36822](https://github.com/owncloud/core/issues/36822)

   When a user requested their own user information using the provisioning API, the request URL
   had to contain the UID in exactly the same case as was used when the user was created.

   The issue has been fixed so that the UID in the request URL is no longer case-sensitive.

   https://github.com/owncloud/core/issues/36822
   https://github.com/owncloud/core/pull/36878

* Bugfix - Fix output of files_external:list command: [#36839](https://github.com/owncloud/core/issues/36839)

   The files_external:list command was not displaying the correct information in the Options
   column. The Options column output has been corrected.

   https://github.com/owncloud/core/issues/36839
   https://github.com/owncloud/core/pull/36841

* Bugfix - Add translation code for the Personal->Sharing section: [#36875](https://github.com/owncloud/core/pull/36875)

   Translation of the text in the Personal->Sharing section was not possible. This has been
   corrected. Translations of this text will become available after translators have provided
   the language-specific translations.

   https://github.com/owncloud/core/pull/36875

* Change - Validate reshare permissions and attributes based on supershare: [#36265](https://github.com/owncloud/core/pull/36265)

   This change provides a uniform way that reshare permissions and attributes are internally
   checked and enforced. There is no change to external behaviour.

   https://github.com/owncloud/core/pull/36265

* Change - Drop PHP 7.0 support across the platform: [#36290](https://github.com/owncloud/core/pull/36290)

   Support for security fixes for PHP 7.0 ended 1 Jan 2019 ownCloud core no longer supports PHP 7.0.
   Ensure that you are using PHP 7.1 or later.

   https://github.com/owncloud/core/pull/36290
   https://www.php.net/supported-versions.php

* Change - Don't report locking support in public.php and public-files endpoints: [#36402](https://github.com/owncloud/core/pull/36402)

   Public endpoints were reporting locking support even though the backend was rejecting those
   requests. This was causing a problem accessing a publicly shared document using LibreOffice
   opening the file through webdav (LibreOffice was complaining about a Forbidden error trying
   to lock the file)

   With these changes, LibreOffice will show a warning while opening the remote file (from a
   public link) if the file is already locked, letting the user choose what to do. If there is no
   lock, the file will be opened normally, but it won't be locked.

   The following changes are expected: * LOCK and UNLOCK methods won't be reported as allowed *
   Lock information (d:lockdiscovery) and support (d:supportedlock) will be shown in the
   propfind if requested (lock support is needed for LibreOffice to try to lock the file) * Trying
   to lock the file through the public link will either throw a Locked exception if there is a lock in
   place, or MethodNotAllowed if there are no locks (the Locked exception is needed for
   LibreOffice to show a popup warning the user that the file is locked)

   https://github.com/owncloud/core/pull/36402

* Change - Update handlebars library to 4.5.3: [#36439](https://github.com/owncloud/core/pull/36439)

   The @bower_components/handlebars library has been updated from 4.1.2 to 4.5.3.

   https://github.com/owncloud/core/pull/36439
   https://github.com/owncloud/core/pull/36438

* Change - Update Symfony polyfill components to 1.13.0: [#36485](https://github.com/owncloud/core/pull/36485)

   The following Symfony polyfill components have been updated to version 1.13.0: -
   polyfill-iconv - polyfill-php72 - polyfill-mbstring - polyfill-intl-idn - polyfill-util -
   polyfill-php56 - polyfill-ctype

   https://github.com/owncloud/core/pull/36485
   https://github.com/symfony/polyfill/releases/tag/v1.13.0

* Change - Update sabre/http (5.0.2 => 5.0.5): [#36490](https://github.com/owncloud/core/pull/36490)

   Includes functionality to significantly improve file download speed by enabling mmap based
   stream_copy_to_stream.

   https://github.com/owncloud/core/pull/36490

* Change - Update doctrine/cache (1.9.1 => 1.10.0): [#36503](https://github.com/owncloud/core/pull/36503)

   https://github.com/owncloud/core/pull/36503

* Change - Update Symfony components to 3.4.36: [#36503](https://github.com/owncloud/core/pull/36503)

   The following Symfony components have been updated to version 3.4.36: - console - debug -
   event-dispatcher - polyfill-mbstring - process - translation - routing

   The following Symfony polyfill components have been updated to 1.31.1: - polyfill-util -
   polyfill-php56 - polyfill-iconv - polyfill-php72 - polyfill-intl-idn - polyfill-ctype

   https://github.com/owncloud/core/pull/36503
   https://symfony.com/blog/symfony-3-4-36-released

* Change - Update punic/punic (3.4.0 => 3.5.0): [#36508](https://github.com/owncloud/core/pull/36508)

   https://github.com/owncloud/core/pull/36508

* Change - Update patchwork/utf8 (1.3.1 => 1.3.2): [#36552](https://github.com/owncloud/core/pull/36552)

   https://github.com/owncloud/core/pull/36552

* Change - Update league/flysystem (1.0.57 => 1.0.61): [#36553](https://github.com/owncloud/core/pull/36553)

   https://github.com/owncloud/core/pull/36553

* Change - Update pear/archive_tar (1.4.8 => 1.4.9): [#36554](https://github.com/owncloud/core/pull/36554)

   https://github.com/owncloud/core/pull/36554

* Change - Protect public preview with password: [#36571](https://github.com/owncloud/core/pull/36571)

   The preview route for password protected shares was accessible without the password.

   https://github.com/owncloud/core/pull/36571

* Change - Consolidate user/group share actions into single dropdown: [#36587](https://github.com/owncloud/core/pull/36587)

   User and group share actions are grouped inside a dropdown which can be toggled via the
   cogwheel. This dropdown holds all related additional info and actions such as permissions,
   expiration, etc.

   https://github.com/owncloud/core/pull/36587

* Change - Update pear/pear_exception (v1.0.0 => v1.0.1): [#36599](https://github.com/owncloud/core/pull/36599)

   https://github.com/owncloud/core/pull/36599

* Change - Update myclabs/deep-copy (1.9.3 => 1.9.4): [#36599](https://github.com/owncloud/core/pull/36599)

   https://github.com/owncloud/core/pull/36599

* Change - Update phpspec/prophecy (1.9.0 => 1.10.0): [#36603](https://github.com/owncloud/core/pull/36603)

   https://github.com/owncloud/core/pull/36603

* Change - Update sabre/vobject (4.2.0 => 4.2.1): [#36614](https://github.com/owncloud/core/pull/36614)

   https://github.com/owncloud/core/pull/36614

* Change - Update league/flysystem (1.0.61 => 1.0.62): [#36659](https://github.com/owncloud/core/pull/36659)

   https://github.com/owncloud/core/pull/36659

* Change - Update zendframework/zend-validator (2.12.2 => 2.13.0): [#36660](https://github.com/owncloud/core/pull/36660)

   https://github.com/owncloud/core/pull/36660

* Change - Update egulias/email-validator (2.1.11 => 2.1.13): [#36661](https://github.com/owncloud/core/pull/36661)

   https://github.com/owncloud/core/pull/36661

* Change - Update phpdocumentor/reflection-docblock (4.3.2 => 4.3.4): [#36661](https://github.com/owncloud/core/pull/36661)

   https://github.com/owncloud/core/pull/36661

* Change - Update phpspec/prophecy (1.10.0 => 1.10.1): [#36661](https://github.com/owncloud/core/pull/36661)

   https://github.com/owncloud/core/pull/36661

* Change - Zendframework dependency to laminas: [#36677](https://github.com/owncloud/core/pull/36677)

   Zend framework changed to be known as laminas. The dependencies have been updated.

   https://github.com/owncloud/core/pull/36677

* Change - Update league/flysystem (1.0.62 => 1.0.63): [#36709](https://github.com/owncloud/core/pull/36709)

   https://github.com/owncloud/core/pull/36709

* Change - Switch to new id3parser: [#36717](https://github.com/owncloud/core/issues/36717)

   The previous lukasreschke/id3parser library was archived. Use the new one published as
   christophwurst/id3parser

   https://github.com/owncloud/core/issues/36717
   https://github.com/owncloud/core/pull/36718

* Change - Update deepdiver1975/tarstreamer (0.1.1 => 2.0.0): [#36722](https://github.com/owncloud/core/pull/36722)

   https://github.com/owncloud/core/pull/36722

* Change - Update egulias/email-validator (2.1.13 => 2.1.14): [#36726](https://github.com/owncloud/core/issues/36726)

   https://github.com/owncloud/core/issues/36726
   https://github.com/owncloud/core/pull/36727

* Change - Update laminas dependencies: [#36726](https://github.com/owncloud/core/issues/36726)

   Update laminas/laminas-zendframework-bridge (1.0.0 => 1.0.1) Update
   laminas/laminas-filter (2.9.2 => 2.9.3)

   https://github.com/owncloud/core/issues/36726
   https://github.com/owncloud/core/pull/36727

* Change - Update sabre/dav (4.0.2 => 4.0.3): [#36742](https://github.com/owncloud/core/issues/36742)

   https://github.com/owncloud/core/issues/36742
   https://github.com/owncloud/core/pull/36743

* Change - Update showdown library to 1.9.1: [#36752](https://github.com/owncloud/core/pull/36752)

   The @bower_components/showdown library has been updated from 1.9.0 to 1.9.1.

   https://github.com/owncloud/core/pull/36752

* Change - Update composer/semver (1.5.0 => 1.5.1): [#36753](https://github.com/owncloud/core/pull/36753)

   https://github.com/owncloud/core/pull/36753

* Change - Update sabre/vobject (4.2.1 => 4.2.2): [#36757](https://github.com/owncloud/core/pull/36757)

   https://github.com/owncloud/core/pull/36757

* Change - Adjust wording displayed for empty additional settings panel: [#36776](https://github.com/owncloud/core/pull/36776)

   The wording displayed when the admin personal settings panel is empty has been adjusted so that
   it no longer looks like there is an error.

   https://github.com/owncloud/core/pull/36776

* Change - Update laminas/laminas-validator (2.13.0 => 2.13.1): [#36780](https://github.com/owncloud/core/pull/36780)

   https://github.com/owncloud/core/pull/36780

* Change - Update myclabs/deep-copy (1.9.4 => 1.9.5): [#36780](https://github.com/owncloud/core/pull/36780)

   https://github.com/owncloud/core/pull/36780

* Change - Update egulias/email-validator (2.1.14 => 2.1.15): [#36789](https://github.com/owncloud/core/pull/36789)

   https://github.com/owncloud/core/pull/36789

* Change - Update phpspec/prophecy (1.10.1 => v1.10.2): [#36789](https://github.com/owncloud/core/pull/36789)

   https://github.com/owncloud/core/pull/36789

* Change - Update symfony (3.4.36 => 3.4.37): [#36796](https://github.com/owncloud/core/pull/36796)

   The following symfony components have been updated to version 3.4.37:

   Symfony/debug symfony/console symfony/event-dispatcher symfony/routing
   symfony/process symfony/translation

   https://github.com/owncloud/core/pull/36796

* Change - Update punic/punic (3.5.0 => 3.5.1): [#36826](https://github.com/owncloud/core/pull/36826)

   https://github.com/owncloud/core/pull/36826

* Change - Update sabre dependencies: [#36866](https://github.com/owncloud/core/pull/36866)

   The following sabre dependencies have been updated: - sabre/uri (2.1.3 => 2.2.0) -
   sabre/event (5.0.3 => 5.1.0) - sabre/http (5.0.5 => 5.1.0) - sabre/xml (2.1.3 => 2.2.0) -
   sabre/vobject (4.2.2 => 4.3.0)

   https://github.com/owncloud/core/pull/36866

* Change - Update symfony (3.4.37 => 4.4.4): [#36881](https://github.com/owncloud/core/pull/36881)

   The following symfony components have been updated to version 4.4.4:

   Symfony/console symfony/event-dispatcher symfony/process symfony/routing
   symfony/translation

   Symfony EventDispatcher->dispatch() events have been adjusted to conform to the Symfony4
   standard.

   https://github.com/owncloud/core/pull/36881
   https://github.com/owncloud/core/pull/36897

* Change - Update league/flysystem (1.0.63 => 1.0.64): [#36895](https://github.com/owncloud/core/pull/36895)

   https://github.com/owncloud/core/pull/36895

* Enhancement - MariaDB 10.3 support: [#29483](https://github.com/owncloud/core/issues/29483)

   MariaDB 10.3 is now supported

   https://github.com/owncloud/core/issues/29483
   https://github.com/owncloud/core/pull/36290

* Enhancement - PostgreSQL 10 support: [#33187](https://github.com/owncloud/core/issues/33187)

   PostgreSQL 10 is now supported

   https://github.com/owncloud/core/issues/33187
   https://github.com/owncloud/core/pull/36290

* Enhancement - Regex version for blacklisted_files and excluded_directories: [#36360](https://github.com/owncloud/core/pull/36360)

   Adds two config options blacklisted_files_regex and excluded_directories_regex to enable
   more flexible pattern matches. With this you can, for example, disable the upload of Microsoft
   Outlook .pst files or the creation of directories containing <yourdate>_backup.

   https://github.com/owncloud/core/pull/36360

* Enhancement - Add an option to provide a mount in read only mode: [#36397](https://github.com/owncloud/core/pull/36397)

   Adds a new option in the mount settings to provide a mount in read only mode. This enables users or
   admins to provide a write protected mount independent of any backend settings. The sync client
   automatically respects this mount setting without any additional intervention.

   https://github.com/owncloud/core/pull/36397

* Enhancement - Add user-sync OCS API: [#36428](https://github.com/owncloud/core/pull/36428)

   We added a new user sync ocs api to provide an http api for external user provisioning systems to
   trigger a user-sync for a specific user.

   Authorization: The http API can only be executed by a user with admin privileges. Suggestion is
   to create a technical user who is in the admin group.

   Route: `curl -X POST http://your.domain/ocs/v2.php/cloud/user-sync/admin -v -u admin`

   Response: 200 - if sync was executed, 404 - given userId is unknown, 409 - multiple users have
   been found for the given user id - not unique user criteria

   https://github.com/owncloud/core/pull/36428

* Enhancement - Support Oracle connection strings: [#36489](https://github.com/owncloud/core/pull/36489)

   To be able to use Oracle specific configuration settings like fail over support for Oracle
   connection strings has been added.
   https://docs.oracle.com/database/121/HABPT/config_fcf.htm#HABPT4967

   https://github.com/owncloud/core/pull/36489

* Enhancement - Add enabled and disabled filter options to occ app:list command: [#36520](https://github.com/owncloud/core/pull/36520)

   The occ app:list command now supports the --enabled and --disabled options

   Occ app:list --enabled Displays just the enabled apps.

   Occ app:list --disabled Displays just the disabled apps.

   If a disabled app was enabled in the past, then the previously-enabled version of the app is now
   displayed in the disabled apps list.

   https://github.com/owncloud/core/pull/36520

* Enhancement - Optimize memory usage in Expire Trashbin Background job: [#36565](https://github.com/owncloud/core/pull/36565)

   The expire trashbin background job was consuming a lot of memory. The SQL query has been
   optimized by filtering out unnecessary records and not processing all users at once.

   https://github.com/owncloud/core/pull/36565
   https://github.com/owncloud/core/pull/36602

* Enhancement - Share indicator on webUI: [#36572](https://github.com/owncloud/core/pull/36572)

   The file list in the webUI now shows a share indicator on files and folders that reside inside a
   shared folder. The sidebar sharing tab reveals a detailed view of the share-tree including
   share-recipients and the parent folder that has been shared.

   https://github.com/owncloud/core/pull/36572

* Enhancement - Expiration date for user and group shares: [#36573](https://github.com/owncloud/core/pull/36573)

   Shares with users and/or groups can now be given an expiration date. If the default expiration
   date is enabled then the default expiration is 7 days in the future. The default expiration date
   can be modified by the administrator. The default expiration date can be enforced as the
   maximum expiration date of a share. In that case the user can select a shorter expiration, but
   not longer.

   The settings are disabled by default, preserving the existing behavior. They can be enabled on
   the admin sharing settings page. They can be set independently for user and group shares.

   https://github.com/owncloud/core/pull/36573
   https://github.com/owncloud/core/pull/36766
   https://github.com/owncloud/core/pull/36847

* Enhancement - Reduce memory footprint of trash expiry jobs: [#36602](https://github.com/owncloud/core/pull/36602)

   The trash expiry job now expires the files in batches of users per script execution, instead of
   all users at once. This prevents growing memory related to how PHP PDO handles memory for many
   consecutive large queries. The trash expiry has been also moved to a dedicated trash expiry
   manager class that is optimized for background job access, while trash manager is used for
   online queries. Also some other minor memory optimizations have been applied.

   https://github.com/owncloud/core/pull/36602
   https://github.com/owncloud/core/pull/36565

* Enhancement - Allow plus sign in username: [#36613](https://github.com/owncloud/core/pull/36613)

   The plus sign is now allowed in a username, e.g. John+Smith

   https://github.com/owncloud/core/pull/36613

* Enhancement - Optimize memory consumption of occ files:checksums:verify command: [#31133](https://github.com/owncloud/core/issues/31133)

   Memory consumption has been reduced by clearing memory usages of processed files and folders.
   Also, information messages of the command have been improved by showing the current processed
   user and the command run result.

   https://github.com/owncloud/core/issues/31133
   https://github.com/owncloud/core/pull/36787

* Enhancement - MariaDB 10.4 support: [#36799](https://github.com/owncloud/core/issues/36799)

   MariaDB 10.4 is now supported

   https://github.com/owncloud/core/issues/36799
   https://github.com/owncloud/core/pull/36800

* Enhancement - Enable DAV endpoints for trashbin and for public shares: [#36815](https://github.com/owncloud/core/pull/36815)

   DAV endpoint for trashbin and DAV endpoint for public shares were released in ownCloud 10.3.0.
   The endpoints were disabled by default and had to be enabled by setting
   dav.enable.tech_preview in config.php.

   These endpoints are now always enabled. There is no longer any need to set
   dav.enable.tech_preview in config.php.

   https://github.com/owncloud/core/pull/36815

* Enhancement - Additional share owner and initiator info in shares API response: [#36823](https://github.com/owncloud/core/issues/36823)

   We've extended the OCS Share API response for share recipients to also include additional
   fields for the share owner and initiator. Additional fields are configured in the admin
   settings and can be set to email or user id and are useful to distinguish users who have the same
   display name.

   https://github.com/owncloud/core/issues/36823

* Enhancement - Add very verbose mode to remote shares polling: [#36832](https://github.com/owncloud/core/pull/36832)

   Additional output to the incoming-shares:poll command has been added when it is run with -vv

   https://github.com/owncloud/core/pull/36832

Changelog for ownCloud Core [10.3.2] (2019-12-04)
=======================================
The following sections list the changes in ownCloud core 10.3.2 relevant to
ownCloud admins and users.

[10.3.2]: https://github.com/owncloud/core/compare/v10.3.1...v10.3.2

Summary
-------

* Bugfix - Fix share transfer in files:transfer-ownership command: [#36222](https://github.com/owncloud/core/pull/36222)
* Bugfix - Respect accounts.enable_medial_search setting for remote search: [#36225](https://github.com/owncloud/core/pull/36225)
* Bugfix - Fix SMB access denied error while listing the contents of the folder: [#36242](https://github.com/owncloud/core/pull/36242)
* Bugfix - Avoid unnecessary "Avatar not found" logs: [#36281](https://github.com/owncloud/core/pull/36281)
* Bugfix - Prevent Forbidden errors in the logs during file scan: [#36288](https://github.com/owncloud/core/pull/36288)
* Bugfix - LargeFileHelper::getFileSizeViaCurl is broken with newer libcurl: [#36319](https://github.com/owncloud/core/pull/36319)
* Bugfix - Do not try to set null parent Id in the file cache: [#36305](https://github.com/owncloud/core/issues/36305)
* Bugfix - Follow single-bucket initialization for multi-bucket setup: [#36329](https://github.com/owncloud/core/pull/36329)
* Bugfix - Disallow sharing share_folder or it's parents: [#36241](https://github.com/owncloud/core/issues/36241)
* Bugfix - Fix sharing behavior to distinguish user and group having the same name: [#35488](https://github.com/owncloud/core/issues/35488)
* Bugfix - Do not create error log about user home in user creation: [#30853](https://github.com/owncloud/core/issues/30853)
* Bugfix - Allow sharing with guests when group restriction is active: [#36384](https://github.com/owncloud/core/pull/36384)
* Bugfix - Allow re-sharer to send an e-mail for public link: [#36386](https://github.com/owncloud/core/issues/36386)
* Bugfix - Handling null properly in dav files endpoint: [#36401](https://github.com/owncloud/core/pull/36401)
* Bugfix - Fix a php error for occ command files_external:list --output: [#36420](https://github.com/owncloud/core/pull/36420)
* Bugfix - Fix user search problem happening after user deletion: [#36431](https://github.com/owncloud/core/pull/36431)
* Bugfix - The authentication header can also hold an empty string: [#36465](https://github.com/owncloud/core/pull/36465)
* Bugfix - Remove query and/or anchor part in remote url: [#36487](https://github.com/owncloud/core/pull/36487)
* Bugfix - Occ system:cron only shows progess bar if option is set: [#36298](https://github.com/owncloud/core/issues/36298)
* Change - Update Symfony components to 3.4.32: [#36244](https://github.com/owncloud/core/pull/36244)
* Change - Update phpspec/prophecy (1.8.1 => 1.9.0): [#36253](https://github.com/owncloud/core/pull/36253)
* Change - Update zendframework/zend-validator (2.12.0 => 2.12.1): [#36274](https://github.com/owncloud/core/pull/36274)
* Change - Update league/flysystem (1.0.55 => 1.0.57): [#36285](https://github.com/owncloud/core/pull/36285)
* Change - Update sabre/dav from version 4.0.1 to 4.0.2: [#36299](https://github.com/owncloud/core/issues/36299)
* Change - Update pear/archive_tar (1.4.7 => 1.4.8): [#36310](https://github.com/owncloud/core/pull/36310)
* Change - Update jQuery-File-Upload from 9.18 to 9.34: [#3508](https://github.com/blueimp/jQuery-File-Upload/pull/3508)
* Change - Update twbs/bootstrap (3.3.7 => 3.4.1): [#36344](https://github.com/owncloud/core/pull/36344)
* Change - Update nikic/php-parser (4.2.4 => 4.2.5): [#36345](https://github.com/owncloud/core/pull/36345)
* Change - Update psr/log (1.1.0 => 1.1.1): [#36348](https://github.com/owncloud/core/pull/36348)
* Change - Update Symfony components to 3.4.33 and other dependencies: [#36358](https://github.com/owncloud/core/pull/36358)
* Change - Update Symfony components to 3.4.34: [#36405](https://github.com/owncloud/core/pull/36405)
* Change - Update nikic/php-parser (4.2.5 => 4.3.0): [#36410](https://github.com/owncloud/core/pull/36410)
* Change - Update swiftmailer/swiftmailer (v6.2.1 => v6.2.3): [#36417](https://github.com/owncloud/core/pull/36417)
* Change - Update Symfony components to 3.4.35: [#36426](https://github.com/owncloud/core/pull/36426)
* Change - Update pear/pear-core-minimal (v1.10.9 => v1.10.10): [#36448](https://github.com/owncloud/core/pull/36448)
* Change - Update pear/console_getopt (v1.4.2 => v1.4.3): [#36454](https://github.com/owncloud/core/pull/36454)
* Change - Update webmozart/assert (1.5.0 => 1.6.0): [#36465](https://github.com/owncloud/core/pull/36465)
* Enhancement - New option in occ command files_external:list --mount-options: [#36420](https://github.com/owncloud/core/pull/36420)

Details
-------

* Bugfix - Fix share transfer in files:transfer-ownership command: [#36222](https://github.com/owncloud/core/pull/36222)

   Even when the path argument was given, files:transfer-ownership command was trying to
   transfer all shares of sourceUser. This situation caused random errors. We fixed this
   unintended behavior.

   https://github.com/owncloud/core/pull/36222

* Bugfix - Respect accounts.enable_medial_search setting for remote search: [#36225](https://github.com/owncloud/core/pull/36225)

   Users taken from a federated instance were always searched with medial search in the share
   autocomplete box. Config option accounts.enable_medial_search was not taken into account.

   https://github.com/owncloud/core/pull/36225

* Bugfix - Fix SMB access denied error while listing the contents of the folder: [#36242](https://github.com/owncloud/core/pull/36242)

   This happened in a DFS Replication (DFSr) folder, where such folder was visible even though the
   user didn't have permissions to read the folder. Using SMB2, windows threw an access denied
   error when a normal user was accessing that file.

   https://github.com/owncloud/core/pull/36242

* Bugfix - Avoid unnecessary "Avatar not found" logs: [#36281](https://github.com/owncloud/core/pull/36281)

   ViewOnlyPlugin was producing too many warning logs for users who do not have an avatar. This
   problem has been resolved by registering ViewOnlyPlugin only for files.

   https://github.com/owncloud/core/pull/36281

* Bugfix - Prevent Forbidden errors in the logs during file scan: [#36288](https://github.com/owncloud/core/pull/36288)

   When running files:scan exceptions were logged for guest users. This has been corrected.

   https://github.com/owncloud/core/pull/36288

* Bugfix - LargeFileHelper::getFileSizeViaCurl is broken with newer libcurl: [#36319](https://github.com/owncloud/core/pull/36319)

   GetFileSizeViaCurl is a workaround for 32 bit platforms. Path separator was encoded when
   encoding the path but newer libcurl doesn't support that.

   https://github.com/owncloud/core/pull/36319

* Bugfix - Do not try to set null parent Id in the file cache: [#36305](https://github.com/owncloud/core/issues/36305)

   In some cases when the parent Id of a resource was null, it was still being stored. That was
   causing database constraint errors. The issue has been fixed.

   https://github.com/owncloud/core/issues/36305
   https://github.com/owncloud/core/pull/36320

* Bugfix - Follow single-bucket initialization for multi-bucket setup: [#36329](https://github.com/owncloud/core/pull/36329)

   In multi-bucket object store configurations, store version information in the object
   storage the same as for single-bucket configurations.

   https://github.com/owncloud/core/pull/36329

* Bugfix - Disallow sharing share_folder or it's parents: [#36241](https://github.com/owncloud/core/issues/36241)

   Share_folder had share permission so it was possible for the user to share it along with some
   received shares. It caused weird behavior. So sharing share_folder (or any of it's parent
   folders) was prohibited. Deleting share_folder was already prohibited, but, the server did
   not return the correct node permissions. This situation led to dysfunctionality in client
   sides. This problem has been fixed.

   https://github.com/owncloud/core/issues/36241
   https://github.com/owncloud/core/issues/36252
   https://github.com/owncloud/core/pull/36337
   https://github.com/owncloud/core/pull/36297

* Bugfix - Fix sharing behavior to distinguish user and group having the same name: [#35488](https://github.com/owncloud/core/issues/35488)

   Sharing a node with user and group having the same name was impossible. This bug was resolved by
   adding a share type check for share creation controls.

   https://github.com/owncloud/core/issues/35488
   https://github.com/owncloud/core/pull/36359

* Bugfix - Do not create error log about user home in user creation: [#30853](https://github.com/owncloud/core/issues/30853)

   The server was producing an error log in every user creation and every first sync of a user
   account. This problem has been fixed.

   https://github.com/owncloud/core/issues/30853
   https://github.com/owncloud/core/issues/32438
   https://github.com/owncloud/core/pull/36365

* Bugfix - Allow sharing with guests when group restriction is active: [#36384](https://github.com/owncloud/core/pull/36384)

   It was not possible to share with guest users when 'Restrict users to only share with users in
   their groups' is enabled.

   https://github.com/owncloud/core/pull/36384

* Bugfix - Allow re-sharer to send an e-mail for public link: [#36386](https://github.com/owncloud/core/issues/36386)

   Sending an e-mail when creating public links from received shares was impossible. This
   problem fixed.

   https://github.com/owncloud/core/issues/36386
   https://github.com/owncloud/core/pull/36393

* Bugfix - Handling null properly in dav files endpoint: [#36401](https://github.com/owncloud/core/pull/36401)

   Only if the files system is properly setup FileHome can properly be initialized

   https://github.com/owncloud/core/pull/36401

* Bugfix - Fix a php error for occ command files_external:list --output: [#36420](https://github.com/owncloud/core/pull/36420)

   Fix a php error of occ command files_external:list --output=json respectively
   --output=json_pretty, when using in conjunction with option --all

   https://github.com/owncloud/core/pull/36420

* Bugfix - Fix user search problem happening after user deletion: [#36431](https://github.com/owncloud/core/pull/36431)

   After a user search in user management web-UI, if the search result has a single user entry and
   afterward the user was deleted from the interface, the search was no longer work until
   refreshing the page. This bug has been fixed.

   https://github.com/owncloud/core/pull/36431

* Bugfix - The authentication header can also hold an empty string: [#36465](https://github.com/owncloud/core/pull/36465)

   In some setups a not set authentication header can not only hold null but also an empty string

   https://github.com/owncloud/core/pull/36465

* Bugfix - Remove query and/or anchor part in remote url: [#36487](https://github.com/owncloud/core/pull/36487)

   Remote server URL may potentially contain query or anchor part. This pull request strips these
   parts for proper server name detection.

   https://github.com/owncloud/core/pull/36487

* Bugfix - Occ system:cron only shows progess bar if option is set: [#36298](https://github.com/owncloud/core/issues/36298)

   Occ system:cron will only output the progess bar if the newly introduced option --progress is
   set. When being executed from crontab occ system::cron shall only print out in case of error.

   https://github.com/owncloud/core/issues/36298
   https://github.com/owncloud/core/pull/36304

* Change - Update Symfony components to 3.4.32: [#36244](https://github.com/owncloud/core/pull/36244)

   The following Symfony components have been updated to version 3.4.32: - console -
   event-dispatcher - process - translation - routing

   https://github.com/owncloud/core/pull/36244
   https://github.com/owncloud/core/pull/36245
   https://github.com/owncloud/core/pull/36246
   https://github.com/owncloud/core/pull/36247
   https://github.com/owncloud/core/pull/36248
   https://symfony.com/blog/symfony-3-4-32-released

* Change - Update phpspec/prophecy (1.8.1 => 1.9.0): [#36253](https://github.com/owncloud/core/pull/36253)

   https://github.com/owncloud/core/pull/36253

* Change - Update zendframework/zend-validator (2.12.0 => 2.12.1): [#36274](https://github.com/owncloud/core/pull/36274)

   https://github.com/owncloud/core/pull/36274

* Change - Update league/flysystem (1.0.55 => 1.0.57): [#36285](https://github.com/owncloud/core/pull/36285)

   https://github.com/owncloud/core/pull/36285

* Change - Update sabre/dav from version 4.0.1 to 4.0.2: [#36299](https://github.com/owncloud/core/issues/36299)

   Sabre/http 4.0.2 was released. It fixes a server error when syncing carddav/caldav.

   https://github.com/owncloud/core/issues/36299
   https://github.com/owncloud/core/pull/36300
   https://github.com/sabre-io/dav/releases/tag/4.0.2

* Change - Update pear/archive_tar (1.4.7 => 1.4.8): [#36310](https://github.com/owncloud/core/pull/36310)

   https://github.com/owncloud/core/pull/36310

* Change - Update jQuery-File-Upload from 9.18 to 9.34: [#3508](https://github.com/blueimp/jQuery-File-Upload/pull/3508)

   Updated jQuery-File-Upload component to the v9.34 which fixed Edge garbage collection for
   huge files

   https://github.com/blueimp/jQuery-File-Upload/pull/3508
   https://github.com/owncloud/core/pull/36343

* Change - Update twbs/bootstrap (3.3.7 => 3.4.1): [#36344](https://github.com/owncloud/core/pull/36344)

   https://github.com/owncloud/core/pull/36344

* Change - Update nikic/php-parser (4.2.4 => 4.2.5): [#36345](https://github.com/owncloud/core/pull/36345)

   https://github.com/owncloud/core/pull/36345

* Change - Update psr/log (1.1.0 => 1.1.1): [#36348](https://github.com/owncloud/core/pull/36348)

   https://github.com/owncloud/core/pull/36348

* Change - Update Symfony components to 3.4.33 and other dependencies: [#36358](https://github.com/owncloud/core/pull/36358)

   The following Symfony components have been updated to version 3.4.33: - debug - console -
   event-dispatcher - process - routing - translation

   The following other dependencies have been updated: - psr/log (1.1.1 => 1.1.2) -
   guzzlehttp/guzzle (5.3.3 => 5.3.4) - zendframework/zend-validator (2.12.1 => 2.12.2) -
   mikey179/vfsstream (v1.6.7 => v1.6.8)

   https://github.com/owncloud/core/pull/36358
   https://symfony.com/blog/symfony-3-4-33-released

* Change - Update Symfony components to 3.4.34: [#36405](https://github.com/owncloud/core/pull/36405)

   The following Symfony components have been updated to version 3.4.34: - console -
   event-dispatcher - process - translation - routing

   https://github.com/owncloud/core/pull/36405
   https://github.com/owncloud/core/pull/36406
   https://github.com/owncloud/core/pull/36407
   https://github.com/owncloud/core/pull/36408
   https://github.com/owncloud/core/pull/36409
   https://symfony.com/blog/symfony-3-4-34-released

* Change - Update nikic/php-parser (4.2.5 => 4.3.0): [#36410](https://github.com/owncloud/core/pull/36410)

   https://github.com/owncloud/core/pull/36410

* Change - Update swiftmailer/swiftmailer (v6.2.1 => v6.2.3): [#36417](https://github.com/owncloud/core/pull/36417)

   Swiftmailer/swiftmailer v6.2.3 was released. It provides changes for PHP 7.4
   compatibility.

   https://github.com/owncloud/core/pull/36417
   https://github.com/swiftmailer/swiftmailer/releases/tag/v6.2.3

* Change - Update Symfony components to 3.4.35: [#36426](https://github.com/owncloud/core/pull/36426)

   The following Symfony components have been updated to version 3.4.35: - console - debug -
   event-dispatcher - process - routing - translation

   https://github.com/owncloud/core/pull/36426
   https://symfony.com/blog/symfony-3-4-35-released

* Change - Update pear/pear-core-minimal (v1.10.9 => v1.10.10): [#36448](https://github.com/owncloud/core/pull/36448)

   https://github.com/owncloud/core/pull/36448

* Change - Update pear/console_getopt (v1.4.2 => v1.4.3): [#36454](https://github.com/owncloud/core/pull/36454)

   https://github.com/owncloud/core/pull/36454

* Change - Update webmozart/assert (1.5.0 => 1.6.0): [#36465](https://github.com/owncloud/core/pull/36465)

   https://github.com/owncloud/core/pull/36465

* Enhancement - New option in occ command files_external:list --mount-options: [#36420](https://github.com/owncloud/core/pull/36420)

   Using --mount-options shows all mount options independent if they are set to their default
   value or not.

   https://github.com/owncloud/core/pull/36420


## [10.3.1] - 2019-11-05

### Changed

- Use userFolder instead of rootFolder - [#36368](https://github.com/owncloud/core/issues/36368)

## [10.3.0] - 2019-10-15

### Added

- Support for php 7.3 [#34559](https://github.com/owncloud/core/pull/34559) [#35775](https://github.com/owncloud/core/pull/35775) [#35752](https://github.com/owncloud/core/pull/35752)
- Support for redirecting private links to ownCloud phoenix frontend [#35819](https://github.com/owncloud/core/pull/35819)
- `encryption:fixencryptedversion` command to address issues related to encrypted versions  [#115](https://github.com/owncloud/encryption/pull/115)
- Tech preview DAV endpoint for public shares [#35932](https://github.com/owncloud/core/pull/35932) [#36057](https://github.com/owncloud/core/issues/36057) [#36021](https://github.com/owncloud/core/issues/36021) [#36059](https://github.com/owncloud/core/issues/36059) [#36066](https://github.com/owncloud/core/issues/36066) [#36080](https://github.com/owncloud/core/issues/36080) [#36061](https://github.com/owncloud/core/issues/36061) [#36119](https://github.com/owncloud/core/issues/36119) [#36049](https://github.com/owncloud/core/issues/36049) [#36068](https://github.com/owncloud/core/issues/36068)
- Tech preview DAV endpoint for trashbin [#35716](https://github.com/owncloud/core/pull/35716) [#35879](https://github.com/owncloud/core/pull/35879) [#36053](https://github.com/owncloud/core/issues/36053) [#36073](https://github.com/owncloud/core/issues/36073)
- Disable Tech preview trashbin and public DAV APIs by default - [#36124](https://github.com/owncloud/core/issues/36124)
- OCS Roles API and ability to set permissions via share attributes - [#36024](https://github.com/owncloud/core/issues/36024) [#36086](https://github.com/owncloud/core/issues/36086)
- OCS API for public link share email notification - [#36063](https://github.com/owncloud/core/issues/36063)
- JS API v2 for share attributes - [#35836](https://github.com/owncloud/core/issues/35836)
- Url `/cron` in addition to `/cron.php` to execute cronjobs via webcron [#34932](https://github.com/owncloud/core/pull/34932)
- `system:cron` occ command for executing background tasks via system cron [#34932](https://github.com/owncloud/core/pull/34932)
- `previews_path` config option to configure thumbnail storage path [#35131](https://github.com/owncloud/core/pull/35131)
- Show activity when share receiver unshares a received share [#35193](https://github.com/owncloud/core/pull/35193)
- Document phoenix.baseUrl in config.sample.php - [#36007](https://github.com/owncloud/core/issues/36007)
- Add getReshareAttributes method to shareitemmodel with fix for parsing - [#36186](https://github.com/owncloud/core/issues/36186)
- Add new migrations to dav app to prevent invalid dav properties - [#36084](https://github.com/owncloud/core/issues/36084)

### Changed

- Allow two-factor providers to display custom challenge message [#34848](https://github.com/owncloud/core/issues/34848)
- Handling of unauthenticated ajax requests to prevent browser issues [#36003](https://github.com/owncloud/core/pull/36003)
- Improved share permission handling [#35884](https://github.com/owncloud/core/pull/35884)
- Improve the JS attributes handling during reshare [#36214](https://github.com/owncloud/core/pull/36214)
- Refined user administration setting button [#35877](https://github.com/owncloud/core/pull/35877)
- Improved mobile device experience [#35919](https://github.com/owncloud/core/pull/35919) [#35813](https://github.com/owncloud/core/pull/35813) [#35347](https://github.com/owncloud/core/pull/35347)
- Reference the new iOS app in the list of available applications [#35918](https://github.com/owncloud/core/pull/35918)
- Improved sharing autocomplete dropdown layout [#35397](https://github.com/owncloud/core/pull/35397)
- Improved theming capabilities by allowing html for Name and LogoClaim [#35273](https://github.com/owncloud/core/pull/35273)
- Improved private link UX for large resolutions [#34998](https://github.com/owncloud/core/pull/34998)
- Improved wording for several user/administrator encryption related interactions [#21](https://github.com/owncloud/encryption/pull/21) [#117](https://github.com/owncloud/encryption/pull/117)
- Handling of composer autoloader for `apps/files_external` [#35755](https://github.com/owncloud/core/pull/35755)
- Renamed share icon to be adblock friendly [#35199](https://github.com/owncloud/core/pull/35199)
- Bump @bower_components/handlebars from v4.1.1 to v4.1.2 [#35025](https://github.com/owncloud/core/pull/35025)
- Bump @bower_components/jsTimezoneDetect from 1.0.5 to v1.0.6  [#33776](https://github.com/owncloud/core/pull/33776)
- Bump doctrine/lexer from v1.0.1 to 1.0.2 [#35625](https://github.com/owncloud/core/pull/35625)
- Bump egulias/email-validator from 2.1.7 to 2.1.11 [#35341](https://github.com/owncloud/core/pull/35341) [#35625](https://github.com/owncloud/core/pull/35625) [#35934](https://github.com/owncloud/core/pull/35934) [#36026](https://github.com/owncloud/core/pull/36026) [#36026](https://github.com/owncloud/core/issues/36026)
- Bump icewind/smb from 3.1.1 to 3.1.2 [#36017](https://github.com/owncloud/core/pull/36017)
- Bump icewind/smb from 3.1.1 to 3.1.2 in /apps/files_external/3rdparty - [#36017](https://github.com/owncloud/core/issues/36017)
- Bump league/flysystem from 1.0.51 to 1.0.55 [#35275](https://github.com/owncloud/core/pull/35275) [#35644](https://github.com/owncloud/core/pull/35644) [#36099](https://github.com/owncloud/core/issues/36099)
- Bump nikic/php-parser from 4.2.1 to 4.2.4 [#35337](https://github.com/owncloud/core/pull/35337) [#36015](https://github.com/owncloud/core/pull/36015) [#36015](https://github.com/owncloud/core/issues/36015) [#36132](https://github.com/owncloud/core/issues/36132)
- Bump phan to 1.3.5 and enable on PHP 7.2 7.3 - [#35818](https://github.com/owncloud/core/issues/35818)
- Bump phpseclib/phpseclib from 2.0.15 to 2.0.23 [#35336](https://github.com/owncloud/core/pull/35336) [#35565](https://github.com/owncloud/core/pull/35565) [#35643](https://github.com/owncloud/core/pull/35643) [#35827](https://github.com/owncloud/core/pull/35827) [#36196](https://github.com/owncloud/core/pull/36196) [#36200](https://github.com/owncloud/core/pull/36200)
- Bump sabre/dav from 3.2 to 4.0.1 [#34559](https://github.com/owncloud/core/pull/34559) [#36094](https://github.com/owncloud/core/issues/36094)
- Bump sabre/xml 2.1.2 from to 2.1.3 [#36036](https://github.com/owncloud/core/pull/36036) [#36036](https://github.com/owncloud/core/issues/36036)
- Bump sabre/uri from 2.1.2 to 2.1.3 [#36189](https://github.com/owncloud/core/issues/36189)
- Bump sabre/http from 5.0.0 to 5.0.2 [#36192](https://github.com/owncloud/core/issues/36192)
- Bump swiftmailer/swiftmailer from 6.2.0 to 6.2.1 [#35075](https://github.com/owncloud/core/pull/35075)
- Bump symfony from v3.4.26 to v3.4.31 [#35146](https://github.com/owncloud/core/pull/35146) [#35348](https://github.com/owncloud/core/pull/35348) [#35625](https://github.com/owncloud/core/pull/35625) [#35934](https://github.com/owncloud/core/pull/35934) [#36098](https://github.com/owncloud/core/issues/36098) [#36097](https://github.com/owncloud/core/issues/36097) [#35989](https://github.com/owncloud/core/pull/35989) - Bump symfony/process from 3.4.30 to 3.4.31 - [#36095](https://github.com/owncloud/core/issues/36095) [#36096](https://github.com/owncloud/core/issues/36096) [#36093](https://github.com/owncloud/core/issues/36093)
- Bump theseer/tokenizer from 1.1.2 to 1.1.3 [#35625](https://github.com/owncloud/core/pull/35625)
- Updating webmozart/assert (1.4.0 => 1.5.0) - [#36103](https://github.com/owncloud/core/issues/36103)
- Updating zendframework/zend-filter (2.9.1 => 2.9.2) - [#36102](https://github.com/owncloud/core/issues/36102)
- Updating zendframework/zend-inputfilter (2.10.0 => 2.10.1) - [#36112](https://github.com/owncloud/core/issues/36112)
- Update the minimum required Node engine version to 8.15.0 - [#36033](https://github.com/owncloud/core/issues/36033)

### Removed

- Deprecated `update` script from `files` app [#35781](https://github.com/owncloud/core/pull/35781)
- Dropped `APC` and `XCache` support [#35782](https://github.com/owncloud/core/pull/35782)
- Old table repair step will drop deprecated `contacts_cards_properties` table [#35721](https://github.com/owncloud/core/pull/35721)
- Removed support for swift as primary / external storage [#35951](https://github.com/owncloud/core/pull/35951)
- Moved S3 external integration into separate app ([files_external_s3](https://github.com/owncloud/files_external_s3)) [#34986](https://github.com/owncloud/core/pull/34986)
- Moved ownCloud default encryption app into separate repository [#35949](https://github.com/owncloud/core/pull/35949)

### Fixed

- Fix potential issue when a user tries to delete the share_folder entry - [#36170](https://github.com/owncloud/core/issues/36170)
- Clean up code of sharing blacklist feature - [#36038](https://github.com/owncloud/core/issues/36038)
- Obey to config in share mail notifications APIs - [#36161](https://github.com/owncloud/core/issues/36161)
- Don't invalidate the auth token if there isn't a user session active - [#36153](https://github.com/owncloud/core/issues/36153)
- Fix typos in 'phoenix.baseUrl' documentation - [#36152](https://github.com/owncloud/core/issues/36152)
- Don't check the CSRF token on public link email API - [#36158](https://github.com/owncloud/core/issues/36158)
- Remove hardcoded http response codes - [#36127](https://github.com/owncloud/core/issues/36127)
- Fix permission handling for share owner of a reshare - [#36193](https://github.com/owncloud/core/issues/36193)
- Improve logging when a remote host went down suddenly - [#36180](https://github.com/owncloud/core/issues/36180)
- Use bit operators when checking share file permission - [#36111](https://github.com/owncloud/core/issues/36111)
- Only share owner should be able to update or delete share - [#36120](https://github.com/owncloud/core/issues/36120)
- Fix various issues with session handling in relation to redis - [#35888](https://github.com/owncloud/core/issues/35888)
- Fix issue where IE did not redirect to login page when user is not logged in - [#36079](https://github.com/owncloud/core/issues/36079)
- Check that all user mount points has unique names - [#36029](https://github.com/owncloud/core/issues/36029)
- Fix loading of app.php when using a separate apps folder - [#36054](https://github.com/owncloud/core/issues/36054)
- Respect default app config within the TwoFactorChallengeController - [#36031](https://github.com/owncloud/core/issues/36031)
- Don't send WWW-Authenticate headers with schema Basic for ajax requests - [#36003](https://github.com/owncloud/core/issues/36003)
- Fix issue when share folder and shares go missing when storage becomes unavailable - [#35998](https://github.com/owncloud/core/issues/35998)
- Handling of OCM sharing when receiving server did not include a protocol (i.e. `https`) [#35711](https://github.com/owncloud/core/pull/35711)
- Performance improvements when loading groups of users [#35822](https://github.com/owncloud/core/pull/35822)
- Relative path handling for `files:checksums:verify` occ command [#35694](https://github.com/owncloud/core/pull/35694)
- Failed rename operation leading to unavailable external storage [#35598](https://github.com/owncloud/core/pull/35598)
- Comment creation event missing ID field [#35799](https://github.com/owncloud/core/pull/35799)
- Improved handling of share expire input fields to avoid user error [#35779](https://github.com/owncloud/core/pull/35779)
- Maintain dav properties when files are moved to trashbin [#35954](https://github.com/owncloud/core/pull/35954)
- Usage of domain when authenticate with SMB/WND shares [#35892](https://github.com/owncloud/core/pull/35892)
- Triggering dav events on the public webdav endpoint [#35820](https://github.com/owncloud/core/pull/35820)
- Prevent deletion of configured `share_folder` [#35998](https://github.com/owncloud/core/pull/35998)
- Issues with improper displayed languages [#35973](https://github.com/owncloud/core/pull/35973)
- Respect `user.min_search_length` with federated sharing [#35977](https://github.com/owncloud/core/pull/35977)
- Avoid password manager autocomplete on user administration [#35931](https://github.com/owncloud/core/pull/35931)
- Changing config settings produced duplicate emitted events [#35875](https://github.com/owncloud/core/pull/35875)
- Properly return StorageNotAvailable on network failures with external storages [#35707](https://github.com/owncloud/core/pull/35707)
- Improved error message when trying to share with a nonexistent federated user [#35542](https://github.com/owncloud/core/pull/35542)
- Allow selection of UI errors during web-installation [#35681](https://github.com/owncloud/core/pull/35681)
- Added missing events for webdav copy operations on new endpoint [#35604](https://github.com/owncloud/core/pull/35604)
- Double-appearing address book entries when shared with groups [#35603](https://github.com/owncloud/core/pull/35603)
- Issues with federation when proxy requires credentials [#35868](https://github.com/owncloud/core/pull/35868)
- Respect `share_folder` with federated shares [#35396](https://github.com/owncloud/core/pull/35396)
- Issues with sqlite to mysql migration with `db:convert-type` [#35390](https://github.com/owncloud/core/pull/35390)
- Upload issues with mismatching checksums [#35294](https://github.com/owncloud/core/pull/35294)
- Improved memory handling for trashbin expiry background job [#35708](https://github.com/owncloud/core/pull/35708)
- Proper handling of objectstorage S3 issues on object upload for `files_primary_s3` [core#35389](https://github.com/owncloud/core/pull/35389) [files_primary_s3#212](https://github.com/owncloud/files_primary_s3/pull/212)
- Respect default application configuration when using TwoFactor Authentication [#36031](https://github.com/owncloud/core/pull/36031)
- Improved mobile view for file drop links [#34803](https://github.com/owncloud/core/pull/34803)
- Ignore case of userid in occ `files:scan` command [#35324](https://github.com/owncloud/core/pull/35324)
- Properly handle errors from remote server when declining a nonexistent federated share [#35321](https://github.com/owncloud/core/pull/35321)
- UI issues on setup page when mobile devices where used [#35347](https://github.com/owncloud/core/pull/35347)
- Direct access to sharing tab for long file listings [#35306](https://github.com/owncloud/core/pull/35306)
- Improved OCM compliance on providerId and remoteId fields [#35122](https://github.com/owncloud/core/pull/35122)
- Issue with adding multiple Google Drive external storages [#34987](https://github.com/owncloud/core/pull/34987)
- Issues with recreating masterkeys when HSM is used [#128](https://github.com/owncloud/encryption/pull/128)

## [10.2.1]- 2019-07-03

### Fixed

- Error when user was removed from a group - [#35289](https://github.com/owncloud/core/issues/35289) [#35570](https://github.com/owncloud/core/issues/35570)
- Incorrect avatar storage location - [#35311](https://github.com/owncloud/core/issues/35311) [#35531](https://github.com/owncloud/core/issues/35531)
- Incorrect rendering of password changed notification email - [#35255](https://github.com/owncloud/core/issues/35255) [#35491](https://github.com/owncloud/core/issues/35491)
- Performance issue with sharing on masterkey encryption - [#35492](https://github.com/owncloud/core/issues/35492)
- Permission change handling for share receivers on internal shares - [#35510](https://github.com/owncloud/core/issues/35510) [#35633](https://github.com/owncloud/core/pull/35633)
- Permission handling of public link shares based upon internal shares [#35600](https://github.com/owncloud/core/pull/35600)
- Automatically set expiration date on newly created shares [#35550](https://github.com/owncloud/core/issues/35550) [#35593](https://github.com/owncloud/core/pull/35593)
- Incorrectly sent password reset tokens [#32889](https://github.com/owncloud/core/issues/32889) [#35607](https://github.com/owncloud/core/pull/35607)
- Issue with loading javascript files from additional app folders [#35640](https://github.com/owncloud/core/issues/35640) [#35709](https://github.com/owncloud/core/pull/35709)

### Changed

- Added `-y` option to `encryption:encrypt-all` occ command [encryption#33](https://github.com/owncloud/encryption/issues/33) [#35606](https://github.com/owncloud/core/pull/35606)
- Updated application revocation list  - [#35506](https://github.com/owncloud/core/issues/35506)


## [10.2.0] - 2019-05-16

### Added

- Add new capability to advertise the availability of the detail parameter for private links - [#35104](https://github.com/owncloud/core/issues/35104)
- Add background:queue:execute occ command for running cron jobs manually - [#34995](https://github.com/owncloud/core/issues/34995)
- Adding background:queue commands: status and delete - [#34783](https://github.com/owncloud/core/issues/34783) [#35228](https://github.com/owncloud/core/pull/35228)
- Added new permissions option for public link - [#34983](https://github.com/owncloud/core/issues/34983) [#35082](https://github.com/owncloud/core/issues/35082)[#35159](https://github.com/owncloud/core/pull/35159)[#35197](https://github.com/owncloud/core/pull/35197)[#35238](https://github.com/owncloud/core/pull/35238)
- Support for extra share key-value attributes - [#34951](https://github.com/owncloud/core/issues/34951)
- Internal permission to prevent file download when set in share attribute, for "secure view" feature  - [#34951](https://github.com/owncloud/core/issues/34951) [#35095](https://github.com/owncloud/core/issues/35095)
- Support for automatically accepting incoming federated shares from trusted servers - [#34206](https://github.com/owncloud/core/issues/34206) [#35135](https://github.com/owncloud/core/issues/35135)
- User option for automatically accepting incoming shares - [#34647](https://github.com/owncloud/core/pull/34647) [#34842](https://github.com/owncloud/core/pull/34842) [#34934](https://github.com/owncloud/core/issues/34934)
- User option for automatically accepting incoming federated shares - [#34706](https://github.com/owncloud/core/issues/34706)
- User option to opt-out autocomplete in share dialog - [#34942](https://github.com/owncloud/core/issues/34942)
- Add before-after share link auth events - [#34399](https://github.com/owncloud/core/issues/34399)
- Log broken smb config params for easier debugging - [#34056](https://github.com/owncloud/core/issues/34056)
- Add support for detecting library mime types - [#34082](https://github.com/owncloud/core/issues/34082)
- Extend repair command to be able to list repair steps and run them individually - [#34499](https://github.com/owncloud/core/issues/34499)
- Added CORS headers for many existing API calls, required for Phoenix  - [#34476](https://github.com/owncloud/core/issues/34476)
- Encryption now supports working with a Hardware Security Module - [#34527](https://github.com/owncloud/core/issues/34527)
- Command for first run wizard to reset for all users - [firstrunwizard/#83](https://github.com/owncloud/firstrunwizard/pull/83)
- Inform admin about the need to login again after changing the master encryption key - [#34596](https://github.com/owncloud/core/issues/34596)
- Added checkboxes to hide quota and password - [#34479](https://github.com/owncloud/core/issues/34479)
- By default the "apps-external" directory is included in config.php during installation - [#34656](https://github.com/owncloud/core/issues/34656) [#34902](https://github.com/owncloud/core/issues/34902)
- Added files:scan --group and --groups options - [#34754](https://github.com/owncloud/core/issues/34754)
- Allow admins to enable medial search on group and user - [#34779](https://github.com/owncloud/core/issues/34779)
- Add composer cleaner - [#34784](https://github.com/owncloud/core/issues/34784)
- Add events for user preference changes - [#34820](https://github.com/owncloud/core/issues/34820)
- Add occ command to poll incoming federated shares for updates - [#34933](https://github.com/owncloud/core/issues/34933) [#34959](https://github.com/owncloud/core/issues/34959) [#34993](https://github.com/owncloud/core/issues/34993) [#35073](https://github.com/owncloud/core/issues/35073)

### Changed

- Bump @bower_components/bowser from 1.6.0 to 1.9.4 in /build - [#34844](https://github.com/owncloud/core/issues/34844)
- Bump @bower_components/backbone from 1.2.3 to 1.4.0 in /build - [#34288](https://github.com/owncloud/core/issues/34288) [#34621](https://github.com/owncloud/core/issues/34621)
- Bump @bower_components/base64 from 0.3.0 to 1.0.2 in /build - [#34542](https://github.com/owncloud/core/issues/34542)
- Bump @bower_components/clipboard from 1.5.12 to v2.0.4 in /build - [#34620](https://github.com/owncloud/core/issues/34620)
- Bump @bower_components/bootstrap from 3.3.6 to 3.3.7 in /build - [#34843](https://github.com/owncloud/core/issues/34843)
- Bump @bower_components/handlebars from v4.0.12 to v4.1.1 in /build - [#34454](https://github.com/owncloud/core/issues/34454) [#34802](https://github.com/owncloud/core/issues/34802)
- Bump @bower_components/moment from 2.22.0 to 2.24.0 in /build - [#34459](https://github.com/owncloud/core/issues/34459)
- Bump @bower_components/strengthify from 0.5.2 to 0.5.6 in /build - [#34451](https://github.com/owncloud/core/issues/34451)
- Bump @bower_components/underscore from 1.8.3 to 1.9.1 in /build - [#34457](https://github.com/owncloud/core/issues/34457)
- Bump composer/semver from 1.4.2 to 1.5.0 - [#34882](https://github.com/owncloud/core/pull/34882)
- Bump extend from 3.0.1 to 3.0.2 in /build - [#34411](https://github.com/owncloud/core/issues/34411)
- Bump handlebars from 4.0.12 to 4.1.1 in /build - [#34456](https://github.com/owncloud/core/issues/34456)[#34801](https://github.com/owncloud/core/issues/34801)
- Bump karma from 3.1.3 to 4.0.1 in /build - [#34458](https://github.com/owncloud/core/issues/34458) [#34675](https://github.com/owncloud/core/issues/34675)
- Bump icewind/smb from 3.0.0 to 3.1.1 in /apps/files_external/3rdparty - [#34670](https://github.com/owncloud/core/issues/34670)
- Bump icewind/streams from 0.5.2 to 0.7.1 in /apps/files_external/3rdparty - [#34537](https://github.com/owncloud/core/issues/34537)
- Bump icewind/streams from 0.5.2 to 0.7.1 - [#34617](https://github.com/owncloud/core/issues/34617)
- Bump league flysystem 1.0.51 - [#34417](https://github.com/owncloud/core/issues/34417) [#34946](https://github.com/owncloud/core/issues/34946)
- Bump react promise v2.7.1 - [#34416](https://github.com/owncloud/core/issues/34416)
- Zendframework bumps 20190208 - [#34413](https://github.com/owncloud/core/issues/34413)
- Bump paragonie/random_compat v2.0.17 => v2.0.18 - [#34043](https://github.com/owncloud/core/issues/34043)
- Bump pear/archive_tar from 1.4.6 to 1.4.7 - [#34990](https://github.com/owncloud/core/issues/34990)
- Bump phpseclib/phpseclib from 2.0.13 to 2.0.15 - [#34285](https://github.com/owncloud/core/issues/34285) [#34741](https://github.com/owncloud/core/issues/34741)
- Bump pimple/pimple from 3.0.2 to 3.2.3 - [#31753](https://github.com/owncloud/core/issues/31753)
- Bump sinon from 7.1.1 to 7.3.1 in /build - [#34881](https://github.com/owncloud/core/issues/34881) [#34943](https://github.com/owncloud/core/issues/34943)
- Bump symfony and modules to 3.4.26 - [#35062](https://github.com/owncloud/core/issues/35062)
- Bump symfony/polyfill components from v1.10.0 to v1.11.0 - [#34882](https://github.com/owncloud/core/pull/34882)
- Bump deepdiver1975/tarstreamer from 0.1.0 to 0.1.1 - [#34615](https://github.com/owncloud/core/issues/34615)
- Bump zendframework/zend-servicemanager from 3.3.2 to 3.4.0 - [#33971](https://github.com/owncloud/core/issues/33971)
- Bump zendframework/zend-inputfilter from 2.9.0 to 2.9.1 - [#34145](https://github.com/owncloud/core/issues/34145)
- Bump dependencies after PHP 5.6 deprecation, swiftmailer 6.2 - [#34755](https://github.com/owncloud/core/issues/34755)
- Bump README.md doc links to 10.1 - [#34403](https://github.com/owncloud/core/issues/34403)
- Updating phpunit/phpunit (5.7.27 => 6.5.14) - [#34866](https://github.com/owncloud/core/issues/34866)
- Updating bamarni/composer-bin-plugin (v1.2.0 => v1.3.0) - [#34920](https://github.com/owncloud/core/issues/34920)
- Increase size of login_name from 64 to 255 - [#34280](https://github.com/owncloud/core/issues/34280)
- Warn when .htaccess file is not writable - [#34486](https://github.com/owncloud/core/issues/34486) [#34461](https://github.com/owncloud/core/issues/34461)
- Add password confirmation field when resetting password - [#34492](https://github.com/owncloud/core/issues/34492) [#34834](https://github.com/owncloud/core/issues/34834)
- Add email footer with motto in email for changing password - [#34498](https://github.com/owncloud/core/issues/34498)
- Change the styling of the active settings navigation menu item - [#34561](https://github.com/owncloud/core/issues/34561)
- Added delay in search field - [#34613](https://github.com/owncloud/core/issues/34613)
- Tidy up code for notification by email - [#34786](https://github.com/owncloud/core/issues/34786) [#35137](https://github.com/owncloud/core/issues/35137)
- Some code now made PHP 7 specific - [#34925](https://github.com/owncloud/core/issues/34925)
- cron.php calls the new occ system:cron command as a fallback - [#36221](https://github.com/owncloud/core/issues/36221)
- Update the CA bundle - [#36219](https://github.com/owncloud/core/issues/36219)

### Removed

- Drop PHP 5.6 support across the platform - [#34698](https://github.com/owncloud/core/issues/34698)
- Removed bundled documentation, help links now point to the online documentation - [#34612](https://github.com/owncloud/core/issues/34612) [#34649](https://github.com/owncloud/core/issues/34649)
- Remove incompatible script for generating DB changeset - [#34722](https://github.com/owncloud/core/issues/34722)
- Remove classes that were deprecated since OC 8.0.0: OCP\Config, OCP\PERMISSION_XXX, OCP\Template - [#34927](https://github.com/owncloud/core/issues/34927)

### Fixed

- Wrong translation file referenced for accept & decline share - [#35063](https://github.com/owncloud/core/issues/35063)
- Respect 'writable' appdir flag on update - [#35097](https://github.com/owncloud/core/issues/35097)
- Aborted uploads in web UI are now properly cleared - [#35134](https://github.com/owncloud/core/issues/35134)
- Fix regression with missing progress bar in files drop view - [#35059](https://github.com/owncloud/core/issues/35059)
- Log exception when background job class not found - [#34723](https://github.com/owncloud/core/issues/34723)
- Prevent concurrent updates in group shares to avoid duplicate entries - [#34769](https://github.com/owncloud/core/issues/34769)
- Calender invitation now uses actual sender name - [#34901](https://github.com/owncloud/core/issues/34901)
- Fix public link share default expiration behavior - [#34971](https://github.com/owncloud/core/issues/34971)
- Improve files error handling on download - [#34886](https://github.com/owncloud/core/issues/34886)
- Directly honour robots.txt if htaccess.RewriteBase is set - [#34949](https://github.com/owncloud/core/issues/34949)
- Reduce sharing query size by properly reusing the query builder - [#34915](https://github.com/owncloud/core/issues/34915)
- Tar download support for file names longer than 99 chars - [#34615](https://github.com/owncloud/core/issues/34615)
- Fix Webdav error page, include CSP and message - [#34817](https://github.com/owncloud/core/issues/34817)
- Handle accept decline with invalid share id - [#34786](https://github.com/owncloud/core/issues/34786) [#35221](https://github.com/owncloud/core/pull/35221)
- Normalize path when moving chunks to final destination - [#34777](https://github.com/owncloud/core/issues/34777)
- Better support for international email addresses after swiftmailer update - [#34759](https://github.com/owncloud/core/issues/34759)
- Fix first time login handling - [#34758](https://github.com/owncloud/core/issues/34758)
- Server container interface should inherit from icontainer,… - [#34756](https://github.com/owncloud/core/issues/34756)
- Don't expose hashed password in OCS api - [#34691](https://github.com/owncloud/core/issues/34691)
- Fixes UID issue with birthday calendar events - [#34701](https://github.com/owncloud/core/issues/34701)
- Improve avatar performance by having many avatar related calls bypass the file cache - [#34592](https://github.com/owncloud/core/issues/34592)
- Improve speed of apps list settings page by caching integrity check results - [#34584](https://github.com/owncloud/core/issues/34584)
- Fix chunking infinite loop in some environment related issues - [#34558](https://github.com/owncloud/core/issues/34558)
- Fixes issue file picker choose button disabled for directory selection - [#34426](https://github.com/owncloud/core/issues/34426)
- Use sabre/vobject ^4.2 to fix issues in ITip messages - [#34553](https://github.com/owncloud/core/issues/34553)
- Filter static tags when searching files by tag - [#34557](https://github.com/owncloud/core/issues/34557)
- Fix collaborative tags PHP API for get and create operations - [#34610](https://github.com/owncloud/core/issues/34610)
- Improve performance of account sync service - [#34546](https://github.com/owncloud/core/issues/34546)
- Improve code occ files_external:list --short - [#34549](https://github.com/owncloud/core/issues/34549)
- Fix preview expiration issues with trashbin/versions - [#34533](https://github.com/owncloud/core/issues/34533)
- Use the displayname in lost password emails where possible - [#34512](https://github.com/owncloud/core/issues/34512)
- Store quota overrides in preferences table - [#34467](https://github.com/owncloud/core/issues/34467)
- Prevent password removal in share dialog if enforced - [#34497](https://github.com/owncloud/core/issues/34497)
- Encryption now skips shared files when adding recovery key - [#34506](https://github.com/owncloud/core/issues/34506)
- Fix encryption to use API instead of config access - [#34504](https://github.com/owncloud/core/issues/34504)
- Properly handle StorageNotAvailableException in Webdav endpoint - [#34485](https://github.com/owncloud/core/issues/34485)
- Properly hide share fields in "Shared with You" section when permissions are restricted - [#34473](https://github.com/owncloud/core/issues/34473)
- Repair subshares earlier to avoid errors - [#34462](https://github.com/owncloud/core/issues/34462)
- Only parse info.xml once to improve performance for every request - [#34482](https://github.com/owncloud/core/issues/34482)
- Catch errors when info.xml is malformed - [#34427](https://github.com/owncloud/core/issues/34427)
- Send OCM requests as JSON - [#34424](https://github.com/owncloud/core/issues/34424)
- Remove composer that is now in vendor bin - [#34418](https://github.com/owncloud/core/issues/34418)
- Use recipient language when sending notification email - [#34255](https://github.com/owncloud/core/issues/34255)
- Fix shares not accessible for guest users when using "share_folder" config option - [#34395](https://github.com/owncloud/core/issues/34395)
- Fix reset confirmation mail from occ - [#34154](https://github.com/owncloud/core/issues/34154)
- Correctly write Login failed entry in log when 2FA is enforced - [#34055](https://github.com/owncloud/core/issues/34055)
- Center the logo and login fields - [#34057](https://github.com/owncloud/core/issues/34057)
- Fix Apache warnings by setting headers to "always" in htaccess - [#34089](https://github.com/owncloud/core/issues/34089) [#35118](https://github.com/owncloud/core/issues/35118)
- Fix external storage advanced checkbox state issue - [#34168](https://github.com/owncloud/core/issues/34168)
- Set permissions on log file creation instead of every write - [#34061](https://github.com/owncloud/core/issues/34061)
- Images are again properly rotated now based on EXIF rotation - [#34356](https://github.com/owncloud/core/issues/34356)
- Fix query parts for federated shares to be less expensive - [#34401](https://github.com/owncloud/core/issues/34401)
- Fix cancel upload and hide 'uploading' message for files_drop shared folders - [#34097](https://github.com/owncloud/core/issues/34097)

## [10.1.1]

### Fixed

- Set the correct value when upgrading app patch version in DB - [#34878](https://github.com/owncloud/core/pull/34878)

## [10.1.0] - 2019-02-06

### Added

- Added Symfony event for federation to provide apps with federated share receiver id - [#34152](https://github.com/owncloud/core/issues/34152)
- Added mime types for sharedlib and executable - [#33893](https://github.com/owncloud/core/issues/33893)
- Allow loading JSON files in setups with pretty URLs - [#32835](https://github.com/owncloud/core/issues/32835)
- Support global CORS domains for public pages - [#33139](https://github.com/owncloud/core/issues/33139)
- New tag scope "static tags", editable but not assignable - [#33420](https://github.com/owncloud/core/issues/33420) [#33864](https://github.com/owncloud/core/issues/33864) [#34098](https://github.com/owncloud/core/issues/34098)
- Added "getBucket" method to HomeObjectStore to fix S3 issue - [#33513](https://github.com/owncloud/core/issues/33513)
- Pass an additional parameter on the core update - [#33641](https://github.com/owncloud/core/issues/33641)
- Added short list argument to occ files_external:list - [#33684](https://github.com/owncloud/core/issues/33684)
- Public JS utility function for email validation - [#33699](https://github.com/owncloud/core/issues/33699)
- Introduce persistent and explicit locking of file and folders (Webdav locks) - [#33266](https://github.com/owncloud/core/issues/33266) [#33785](https://github.com/owncloud/core/issues/33785) [#33843](https://github.com/owncloud/core/issues/33843) [#33957](https://github.com/owncloud/core/pull/33957) [#33957](https://github.com/owncloud/core/issues/33957) [#34270](https://github.com/owncloud/core/issues/34270) [#34267](https://github.com/owncloud/core/issues/34267) [#34227](https://github.com/owncloud/core/issues/34227) [#34208](https://github.com/owncloud/core/issues/34208) [#34203](https://github.com/owncloud/core/issues/34203) [#34355](https://github.com/owncloud/core/issues/34355) [#34350](https://github.com/owncloud/core/issues/34350)
- Add minimal frontend in files app for persistent locks (Webdav locks) - [#33951](https://github.com/owncloud/core/issues/33951)
- Federated sharing new spec OCM 1.0-proposal1 - [#33027](https://github.com/owncloud/core/issues/33027) [#34113](https://github.com/owncloud/core/issues/34113) [#34252](https://github.com/owncloud/core/issues/34252)
- Add sharing scope to enable addressbook sharing with custom groups - [#33849](https://github.com/owncloud/core/issues/33849)
- Add X-Request-ID to header Access-Control-Allow-Headers - [#33926](https://github.com/owncloud/core/issues/33926)
- Now also logging wrapped exceptions - [#34475](https://github.com/owncloud/core/issues/34475)
- Switch to shorten hostname in status.php - [#34469](https://github.com/owncloud/core/issues/34469)

### Changed

- Use new DAV endpoint in web UI file list and upload - [#33544](https://github.com/owncloud/core/issues/33544)
- Bypass apps max-version check for daily/git release channels - [#33861](https://github.com/owncloud/core/issues/33861)
- Changed default link share name to be "Public link" - [#33879](https://github.com/owncloud/core/issues/33879) [#33955](https://github.com/owncloud/core/issues/33955)
- Set shipped apps max version to 10 in preparation for Semver switch - [#33496](https://github.com/owncloud/core/issues/33496)
- If only the patch level of an app's version changes no migrations will run - [#33218](https://github.com/owncloud/core/issues/33218) [#34138](https://github.com/owncloud/core/issues/34138)
- User/group deletion in users page now has a confirmation dialog - [#33626](https://github.com/owncloud/core/issues/33626)
- Disable browser autocomplete for password fields - [#32590](https://github.com/owncloud/core/issues/32590)
- Minor and patch updates of dependencies as at 20181126 - [#33683](https://github.com/owncloud/core/issues/33683)
- Bump @bower_components/browser-update from 2.0.1 to v2.0.2 in /build - [#34290](https://github.com/owncloud/core/issues/34290)
- Bump composer/xdebug-handler to 1.3.0 - [#32977](https://github.com/owncloud/core/issues/32977)
- Bump cryptiles from 3.1.2 to 3.1.4 in /build - [#33935](https://github.com/owncloud/core/issues/33935)
- Bump friendsofphp/php-cs-fixer (v2.13.0 => v2.14.0) - [#33290](https://github.com/owncloud/core/issues/33290) [#34012](https://github.com/owncloud/core/issues/34012) [#34040](https://github.com/owncloud/core/issues/34040)
- Bump handlebars from 4.0.11 to 4.0.12 in /build - [#32661](https://github.com/owncloud/core/issues/32661) [#34071](https://github.com/owncloud/core/issues/34071)
- Bump hoek from 4.2.0 to 4.2.1 in /build - [#33574](https://github.com/owncloud/core/issues/33574)
- Bump jakub-onderka/php-console-highlighter from 0.3.2 to 0.4 - [#32944](https://github.com/owncloud/core/issues/32944)
- Bump karma from 3.0.0 to 3.1.3 in /build - [#33256](https://github.com/owncloud/core/issues/33256) [#33343](https://github.com/owncloud/core/issues/33343) [#33737](https://github.com/owncloud/core/issues/33737)
- Bump league/flysystem from 1.0.46 to 1.0.48 - [#33199](https://github.com/owncloud/core/issues/33199)
- Bump lodash from 4.17.4 to 4.17.11 in /build - [#33754](https://github.com/owncloud/core/issues/33754)
- Bump pear/archive_tar from 1.4.3 to 1.4.6 - [#34080](https://github.com/owncloud/core/issues/34080) [#34448](https://github.com/owncloud/core/issues/34448)
- Bump phan 0.12.11 - [#34022](https://github.com/owncloud/core/issues/34022)
- Bump phpseclib/phpseclib from 2.0.11 to 2.0.13 - [#33433](https://github.com/owncloud/core/issues/33433) [#33922](https://github.com/owncloud/core/issues/33922)
- Bump punic 3.1.0 => 3.2.0 - [#33462](https://github.com/owncloud/core/issues/33462)
- Bump sabre/dav from 3.2.2 to 3.2.3 - [#33276](https://github.com/owncloud/core/issues/33276)
- Bump sinon from 6.2.0 to 7.1.1 - [#32825](https://github.com/owncloud/core/issues/32825) [#33073](https://github.com/owncloud/core/issues/33073) [#33306](https://github.com/owncloud/core/issues/33306) [#33373](https://github.com/owncloud/core/issues/33373)
- Bump marked from 0.3.7 to 0.3.19 in /build - [#33576](https://github.com/owncloud/core/issues/33576)
- Bump sabre xml 1.5.1 - [#34102](https://github.com/owncloud/core/issues/34102)
- Bump squizlabs/php_codesniffer 3.3.2=>3.4.0 - [#33940](https://github.com/owncloud/core/issues/33940)
- Bump sshpk from 1.13.1 to 1.16.0 in /build - [#33966](https://github.com/owncloud/core/issues/33966)
- Bump stringstream from 0.0.5 to 0.0.6 in /build - [#33755](https://github.com/owncloud/core/issues/33755)
- Bump symfony 3.4.15 to 3.4.20 - [#33001](https://github.com/owncloud/core/issues/33001) [#33460](https://github.com/owncloud/core/issues/33460) [#33667](https://github.com/owncloud/core/issues/33667) [#33821](https://github.com/owncloud/core/issues/33821)
- Bump symfony/polyfill components v1.9.0 => v1.10.0 - [#33377](https://github.com/owncloud/core/issues/33377)
- Bump symfony/translation from 3.4.17 to 3.4.18 - [#33429](https://github.com/owncloud/core/issues/33429)
- Bump webmozart/assert (1.3.0 => 1.4.0) - [#34015](https://github.com/owncloud/core/issues/34015)
- Bump zendframework/zend-inputfilter from 2.8.2 to 2.9.0 - [#33920](https://github.com/owncloud/core/issues/33920)
- Patch bumps punic pear-core-minimal xdebug-handler - [#33830](https://github.com/owncloud/core/issues/33830)
- Update moment JS to 2.22.2 - [#33650](https://github.com/owncloud/core/issues/33650)

### Removed

- Deprecate Sharing 1.0 APIs which will be removed in ownCloud 11 - [#33220](https://github.com/owncloud/core/issues/33220)
- Remove core/l10n from release build - [#33960](https://github.com/owncloud/core/issues/33960)

### Fixed

- Fix missing translations in the user settings module - [#34234](https://github.com/owncloud/core/issues/34234) [#34261](https://github.com/owncloud/core/issues/34261)
- Skip preview expiry when owner cannot be determined - [#34207](https://github.com/owncloud/core/issues/34207)
- Allow the testing app to not be in the default apps folder - [#34196](https://github.com/owncloud/core/issues/34196)
- Integrity check now detects renamed files properly - [#34085](https://github.com/owncloud/core/issues/34085)
- Fix up grammar mistake in console output - [#33947](https://github.com/owncloud/core/issues/33947)
- Expand occ user reset password email validation - [#33945](https://github.com/owncloud/core/issues/33945)
- Return 403 instead of 500 status when uploading into share without write permissions - [#33640](https://github.com/owncloud/core/issues/33640)
- Fix performance issue when fetching versions: do not iterate over all storages when only first is needed - [#33859](https://github.com/owncloud/core/issues/33859)
- Config sample fixes - [#33870](https://github.com/owncloud/core/issues/33870) [#33954](https://github.com/owncloud/core/issues/33954) [#34020](https://github.com/owncloud/core/issues/34020)
- Correction to default apps folder in config.sample.php - [#33912](https://github.com/owncloud/core/issues/33912)
- Fix system tags object mapper for Oracle - [#33772](https://github.com/owncloud/core/issues/33772)
- Adjust last login time when using auth modules - [#33752](https://github.com/owncloud/core/issues/33752)
- Disable share autocomplete endpoint for members of groups excluded from sharing - [#33736](https://github.com/owncloud/core/issues/33736)
- Fix issues with expiration date validation in public link dialog - [#33735](https://github.com/owncloud/core/issues/33735)
- List compatible apps instead of missing ones in occ upgrade process - [#33730](https://github.com/owncloud/core/issues/33730)
- Add background job to clean up orphaned DAV properties - [#33722](https://github.com/owncloud/core/issues/33722)
- Fix paginated iteration when syncing users - [#33698](https://github.com/owncloud/core/issues/33698)
- Cannot set 0 as value for config through OCC command - [#33643](https://github.com/owncloud/core/issues/33643)
- Fix for some upgrade path that led to DAV tables missing bigint conversion - [#33603](https://github.com/owncloud/core/issues/33603)
- Fix checksum verify command verbose mode and path argument handling - [#33610](https://github.com/owncloud/core/issues/33610)
- Fix form to enter initial password to properly display error message - [#33453](https://github.com/owncloud/core/issues/33453)
- File cache corruption check now only reports storage id once - [#33539](https://github.com/owncloud/core/issues/33539)
- Fix escaping of public share names - [#33419](https://github.com/owncloud/core/issues/33419)
- Update config.sample.php to fix a broken link - [#33518](https://github.com/owncloud/core/issues/33518)
- Add "uid" argument to Symfony login events for consistency - [#33470](https://github.com/owncloud/core/issues/33470)
- Prevent deletion of calendar group shares during cleanup - [#33394](https://github.com/owncloud/core/issues/33394)
- Fix upload avatar for LDAP users - [#33369](https://github.com/owncloud/core/issues/33369)
- Fix double escaping in email subject - [#33342](https://github.com/owncloud/core/issues/33342)
- Add missing type hints in code - [#33314](https://github.com/owncloud/core/issues/33314)
- Increase versions list performance by ignoring shared storages - [#33291](https://github.com/owncloud/core/issues/33291)
- Fix PROPFIND with Depth infinity requests through Sabre update - [#28341](https://github.com/owncloud/core/issues/28341)
- Adjust "has never logged in" text in occ command - [#33275](https://github.com/owncloud/core/issues/33275)
- Don't remove temporary file on failure when creating office file preview - [#33234](https://github.com/owncloud/core/issues/33234)
- Warning log about oc_readonly storage wrapper is now logged in debug level - [#33212](https://github.com/owncloud/core/issues/33212)
- Fix occ encrypt-all command to not attempt re-encrypting already encrypted files - [#33206](https://github.com/owncloud/core/issues/33206)
- Register areCredentialsValid as a sensitive logging method - [#32713](https://github.com/owncloud/core/issues/32713)
- Deletion of user now also updates storages applicable fields - [#32906](https://github.com/owncloud/core/issues/32906)
- Blacklist the method "setPassword" in stack traces - [#33176](https://github.com/owncloud/core/issues/33176)
- Fix wording in occ command help - [#33179](https://github.com/owncloud/core/issues/33179)
- Fix preLogin hook parameter inconsistencies - [#33185](https://github.com/owncloud/core/issues/33185)

## 10.0.10 - 2018-09-18
### Added
- Store user name in oc_preferences when provided by backend, use in external storage save in session mode [#32587](https://github.com/owncloud/core/pull/32587)
- Support JSON format for settings passed to occ system:config:set - [#32524](https://github.com/owncloud/core/issues/32524)
- occ decrypt-all command can now read password from an environment variable - [#32252](https://github.com/owncloud/core/issues/32252) [#32677](https://github.com/owncloud/core/issues/32677)
- Roave Security Advisories as a development dependency - [#31818](https://github.com/owncloud/core/issues/31818)
- Store timestamp when ownCloud was first installed - [#32000](https://github.com/owncloud/core/issues/32000)
- Symfony events for login action with token or Apache - [#31985](https://github.com/owncloud/core/issues/31985)
- Search API for files using Webdav REPORT and underlying search provider - [#31946](https://github.com/owncloud/core/issues/31946) [#32328](https://github.com/owncloud/core/issues/32328) [#32603](https://github.com/owncloud/core/issues/32603)
- Add information whether user can share to capabilities API - [#31824](https://github.com/owncloud/core/issues/31824)
- Reload the filelist view when accepting or rejecting a share - [#31798](https://github.com/owncloud/core/issues/31798)
- Allow different language in public link share email - [#31767](https://github.com/owncloud/core/issues/31767)
- Command files:scan now outputs items per second - [#32093](https://github.com/owncloud/core/issues/32093)
- New option to prevent users to share with specific system groups - [#31740](https://github.com/owncloud/core/issues/31740) [#32533](https://github.com/owncloud/core/issues/32533) [#32501](https://github.com/owncloud/core/issues/32501) [#32707](https://github.com/owncloud/core/issues/32707)
- Hook "loadAdditionalScripts" now also available for public link page - [#31944](https://github.com/owncloud/core/issues/31944)
- Add url parameter to files app which opens a specific sidebar tab - [#32202](https://github.com/owncloud/core/issues/32202)
- Retry chunks in web UI on stalled or timed out uploads - [#32170](https://github.com/owncloud/core/issues/32170) [#32335](https://github.com/owncloud/core/issues/32335)
- Add log entry for each migration that is run - [#32461](https://github.com/owncloud/core/issues/32461)
- Ability to create users and send them an email for password creation - [#32466](https://github.com/owncloud/core/issues/32466)
- Command for resetting password now supports sending reset email and outputting link - [#32500](https://github.com/owncloud/core/issues/32500)
- Added Phan static code analyzer to improve code quality - [#32492](https://github.com/owncloud/core/issues/32492)
- Added method in PHP share API to set password hashes directly - [#32572](https://github.com/owncloud/core/issues/32572)
- Experimental support for asynchronous MOVE operations - [#32414](https://github.com/owncloud/core/issues/32414)
- Config report now contains list of all migrations that have run, for easier debugging of update issues - [configreport/#68](https://github.com/owncloud/configreport/pull/68)

### Changed
- Update CA bundle - 2018-06-20 - [#32688](https://github.com/owncloud/core/issues/32688)
- Minimum desktop client version is 2.3.3 - [#32657](https://github.com/owncloud/core/issues/32657)
- Handle SSL certificate verifications for others than Let's Encrypt - [#31858](https://github.com/owncloud/core/issues/31858)
- Insufficient storage exception now logged with "debug" log level - [#31978](https://github.com/owncloud/core/issues/31978)
- Skip filecache repair step for version greater than 10.0.4 - [#31803](https://github.com/owncloud/core/issues/31803)
- Bump sinon from 2.4.1 to 6.2.0 in /build - [#32319](https://github.com/owncloud/core/issues/32319) [#32662](https://github.com/owncloud/core/issues/32662)
- Bump karma from 2.0.2 to 3.0.0 in /build - [#31892](https://github.com/owncloud/core/issues/31892) [#32197](https://github.com/owncloud/core/issues/32197) [#32317](https://github.com/owncloud/core/issues/32317)
- Bump behat/behat from 3.4.3 to 3.5.0 - [#32318](https://github.com/owncloud/core/issues/32318)
- Bump paragonie/random_compat v2.0.15 to v2.0.17 - [#32107](https://github.com/owncloud/core/issues/32107)
- Bump symfony/event-dispatcher from 3.4.12 to 3.4.13 - [#32199](https://github.com/owncloud/core/issues/32199)
- Bump symfony/console from 3.4.12 to 3.4.13 - [#32140](https://github.com/owncloud/core/issues/32140)
- Bump symfony/routing from 3.4.12 to 3.4.13 - [#32137](https://github.com/owncloud/core/issues/32137)
- Bump symfony/process from 3.4.12 to 3.4.13 - [#32135](https://github.com/owncloud/core/issues/32135)
- Bump symfony/translation from 3.4.12 to 3.4.13 - [#32198](https://github.com/owncloud/core/issues/32198)
- Bump symfony polyfill 1.8.0 to 1.9.0 - [#32255](https://github.com/owncloud/core/issues/32255)
- Bump swiftmailer/swiftmailer from 5.4.9 to 5.4.10 - [#32200](https://github.com/owncloud/core/issues/32200)
- Minor dependency bumps 2018-08-26 - [#32439](https://github.com/owncloud/core/issues/32439)
- Bump symfony 3.4.11 to 3.4.12 - [#31912](https://github.com/owncloud/core/issues/31912)
- Bump symfony 3.4.15 and zend-stdlib 3.2.1 - [#32499](https://github.com/owncloud/core/issues/32499)
- Allow slashes in generated resource routes in app framework - [#31939](https://github.com/owncloud/core/issues/31939)
- Email field is now default in user management page, users receive an email with token to set initial password - [#32466](https://github.com/owncloud/core/issues/32466) [#32648](https://github.com/owncloud/core/issues/32648) [#32636](https://github.com/owncloud/core/issues/32636) [#32672](https://github.com/owncloud/core/pull/32672) [#32672](https://github.com/owncloud/core/issues/32672) [#32685](https://github.com/owncloud/core/issues/32685) [#32690](https://github.com/owncloud/core/issues/32690)
- Split of config.sample.php into two files for core and apps - [#32554](https://github.com/owncloud/core/issues/32554) [#32634](https://github.com/owncloud/core/issues/32634)

### Removed
### Fixed
- Fix PHP 7.2 issue with ini_set - [#32538](https://github.com/owncloud/core/issues/32538)
- Prevent logging LDAP password in case of failure - [#32592](https://github.com/owncloud/core/pull/32592)
- Prevent passwords to be set to empty strings - [#32581](https://github.com/owncloud/core/pull/32581)
- Fix update issue related to oc_jobs when automatically enabling market app to assist for update in OC 10 - [#32573](https://github.com/owncloud/core/pull/32573)
- Trigger missing migrations in files_sharing app, adds indices and can speed up some instances - [#32562](https://github.com/owncloud/core/issues/32562)
- Fix issue with spam filters when sending public link emails - [#32542](https://github.com/owncloud/core/issues/32542)
- Fix version previews to fall back to icon when no preview provider is available - [#32474](https://github.com/owncloud/core/issues/32474)
- Fix master key recreation - [#32504](https://github.com/owncloud/core/issues/32504)
- Return correct status when IMip email delivery fails - [#32489](https://github.com/owncloud/core/issues/32489)
- Fix typos in config.sample.php - [#32496](https://github.com/owncloud/core/issues/32496)
- Don't check for avatar folder if not enabled - [#32490](https://github.com/owncloud/core/issues/32490)
- Add missing ILogger declaration in MigrationService - [#32473](https://github.com/owncloud/core/issues/32473) [#32475](https://github.com/owncloud/core/issues/32475)
- Fix JS tests for future Sinon JS update - [#32488](https://github.com/owncloud/core/issues/32488)
- Command to verify checksums is now more robust - [#32360](https://github.com/owncloud/core/issues/32360)
- Fix not allowed to share message - [#32429](https://github.com/owncloud/core/issues/32429)
- Update php doc to reflect proper return type - [#32427](https://github.com/owncloud/core/issues/32427)
- Catch more errors in SMB storage - [#32416](https://github.com/owncloud/core/issues/32416)
- Don't crash on filescan where folder has symlink - [#32408](https://github.com/owncloud/core/issues/32408)
- Fix issue with some special characters in queries - [#32412](https://github.com/owncloud/core/issues/32412)
- Use the core exception logger functionality in cron.php - [#32404](https://github.com/owncloud/core/issues/32404)
- Compare UIDs instead of objects when changing displayname - [#32409](https://github.com/owncloud/core/issues/32409)
- Compare UIDs instead of objects when changing email address - [#32391](https://github.com/owncloud/core/issues/32391)
- Improve performance when propagating size updates in file cache - [#32304](https://github.com/owncloud/core/issues/32304)
- Prevent current chunk assembly failing by setting the exclusive file lock earlier - [#32334](https://github.com/owncloud/core/issues/32334)
- Don't strip linebreaks in personal note of public link share - [#32331](https://github.com/owncloud/core/issues/32331)
- Let files be overwritten by rename operations on local storage instead of pre-deleting - [#32273](https://github.com/owncloud/core/issues/32273)
- Continue with upgrade even if the market app cannot be disabled - [#32324](https://github.com/owncloud/core/issues/32324)
- Versions app now works also when comments app is disabled - [#32208](https://github.com/owncloud/core/issues/32208)
- Fix two factor challenge page for when password has expired - [#32058](https://github.com/owncloud/core/issues/32058)
- Scanner now properly resets checksum whenever a file has changed remotely - [#32284](https://github.com/owncloud/core/issues/32284)
- Fix checksums not being updated on modifying shared file for objectstore - [#32364](https://github.com/owncloud/core/issues/32364)
- Accept email addresses with subdomains with hyphens for public link emails - [#32281](https://github.com/owncloud/core/issues/32281)
- Properly set installed_version flag when enabling app via provisioning api - [#32214](https://github.com/owncloud/core/issues/32214)
- Fix API response of pending shares when the state did not change - [#32156](https://github.com/owncloud/core/issues/32156)
- Read mtime from both JS properties in web UI upload for browser compatibility - [#32013](https://github.com/owncloud/core/issues/32013)
- Fix warning in logs while moving FutureFile after chunk assembly - [#32166](https://github.com/owncloud/core/issues/32166)
- Allow null in "Origin" header for third party clients that send it with WebDAV - [#32189](https://github.com/owncloud/core/issues/32189)
- Fix calendar or reminder insertion error via CalDAV on MacOS - [#32024](https://github.com/owncloud/core/issues/32024)
- Properly log failed message when token based authentication is enforced - [#31948](https://github.com/owncloud/core/issues/31948)
- Prevent share access to birthday calendar - [#31882](https://github.com/owncloud/core/issues/31882)
- Added space in display names of shared calendar/contact - [#31877](https://github.com/owncloud/core/issues/31877)
- Deleting a user now also properly deletes their external storages and storage assignations - [#32069](https://github.com/owncloud/core/issues/32069)
- Improve text about logging in config.sample.php - [#32049](https://github.com/owncloud/core/issues/32049)
- Use OC_DEFAULT_MODULE constant for encryption in core - [#31838](https://github.com/owncloud/core/issues/31838)
- Unset encrypted flag in file cache when running decrypt-all command - [#32027](https://github.com/owncloud/core/issues/32027)
- Fix decrypt of single user in decrypt-all command - [#32168](https://github.com/owncloud/core/issues/32168)
- Fix login exception in decrypt-all command - [#31986](https://github.com/owncloud/core/issues/31986)
- Properly clean up encryption keys after file deletion - [#31959](https://github.com/owncloud/core/issues/31959)
- Remove sensitive shared_secret data from occ config:list output - [#31997](https://github.com/owncloud/core/issues/31997)
- Fix file cache update function to properly handle empty string and nulls with Oracle - [#31996](https://github.com/owncloud/core/issues/31996)
- Fix bogus etag update when propagating etag for federated shares - [#31992](https://github.com/owncloud/core/issues/31992)
- Display all failed recipients when sending link share email - [#31935](https://github.com/owncloud/core/issues/31935) [#32633](https://github.com/owncloud/core/issues/32633)
- Lock public link share dialog while processing - [#31928](https://github.com/owncloud/core/issues/31928)
- AppManager text typo and PHPdoc return tags - [#31918](https://github.com/owncloud/core/issues/31918)
- Optimize file uploads with PUT method, with custom mtime, use storage instead of view - [#31891](https://github.com/owncloud/core/issues/31891)
- Optimize file uploads with PUT, don't fetch and update checksum again, reuse the one from part file - [#31768](https://github.com/owncloud/core/issues/31768)
- Do not throw an error when the same theme is enabled twice - [#31783](https://github.com/owncloud/core/issues/31783)
- Fix repair step that removes duplicate sub shares - [#31146](https://github.com/owncloud/core/issues/31146)
- Adjust code to follow coding standard - [#32116](https://github.com/owncloud/core/issues/32116)
- Fix overriding for gif images in themes for CLI scripts - [#32131](https://github.com/owncloud/core/issues/32131)
- Fix wording on password change page - [#32146](https://github.com/owncloud/core/issues/32146)
- Fixed mount config in frontend to only load once to avoid side effects - [#32095](https://github.com/owncloud/core/issues/32095)
- Don't urlencode group id to make it work with "/" and "%" - [#31109](https://github.com/owncloud/core/issues/31109)

## 10.0.9 - 2018-07-17
### Added
- Added account module middleware to be able to plug in logic after authentication - [#31883](https://github.com/owncloud/core/issues/31883) [#31933](https://github.com/owncloud/core/issues/31933)
- occ user:list now takes a list of attributes to display - [#31115](https://github.com/owncloud/core/issues/31115)
- Added Symfony events for user preference changes - [#31266](https://github.com/owncloud/core/issues/31266)
- Added Symfony events for public links shared by email - [#31632](https://github.com/owncloud/core/issues/31632)
- Added Symfony events for accept and reject for local shares - [#31702](https://github.com/owncloud/core/issues/31702)
- Added support for Imprint and Privacy Policy URLs in web UI and email footers - [#31666](https://github.com/owncloud/core/issues/31666) [#31699](https://github.com/owncloud/core/issues/31699) [#31730](https://github.com/owncloud/core/issues/31730) [#31766](https://github.com/owncloud/core/pull/31766)
- Added HTML template for lost password email - [#31144](https://github.com/owncloud/core/issues/31144)
- Received local shares can now trigger a notification to accept or reject them, also visible in "Shared with you" section - [#31613](https://github.com/owncloud/core/issues/31613) [#31886](https://github.com/owncloud/core/issues/31886)
- Rejected shares can now be accepted again in the "Shared with you" section - [#31613](https://github.com/owncloud/core/issues/31613)
- Provide original exception via logging events - [#31623](https://github.com/owncloud/core/issues/31623)
- Share autocomplete now displays useful tooltip when typing less characters - [#31729](https://github.com/owncloud/core/issues/31729)
- Added public Webdav API for versions using a new "meta" DAV endpoint - [#31729](https://github.com/owncloud/core/pull/29207) [#29637](https://github.com/owncloud/core/pull/29637) [#31805](https://github.com/owncloud/core/issues/31805) [#31801](https://github.com/owncloud/core/issues/31801)
- Added support for retrieving file previews using Webdav endpoint - [#29319](https://github.com/owncloud/core/pull/29319) [#30192](https://github.com/owncloud/core/pull/30192) [#31748](https://github.com/owncloud/core/issues/31748) [#31788](https://github.com/owncloud/core/issues/31788) [#31862](https://github.com/owncloud/core/issues/31862) [#31865](https://github.com/owncloud/core/issues/31865)
- Added versioning support for primary object store - [#29607](https://github.com/owncloud/core/pull/29607) [#31285](https://github.com/owncloud/core/pull/31285) [#31595](https://github.com/owncloud/core/pull/31595)

### Changed
- Updated ca-bundle.crt - [#31734](https://github.com/owncloud/core/issues/31734)
- Bump symfony to 3.4.8 and other pending minor bumps - [#31221](https://github.com/owncloud/core/issues/31221)
- Bump karma from 2.0.0 to 2.0.2 in /build - [#31253](https://github.com/owncloud/core/issues/31253)
- Bump karma-jasmine from 1.1.1 to 1.1.2 in /build - [#31378](https://github.com/owncloud/core/issues/31378)
- Bump karma-coverage from 1.1.1 to 1.1.2 in /build - [#31380](https://github.com/owncloud/core/issues/31380)
- Bump zendframework/zend-inputfilter from 2.8.1 to 2.8.2 - [#31431](https://github.com/owncloud/core/issues/31431)
- Bump icewind/smb from 1.1.0 to 3.0.0 in /apps/files_external/3rdparty - [#31521](https://github.com/owncloud/core/issues/31521)
- Bump symfony 3.4.9 to 3.4.11 - [#31571](https://github.com/owncloud/core/issues/31571)
- Update jsdoc requirement to ~3.5.5 - [#30036](https://github.com/owncloud/core/issues/30036)
- Removed example theme which now lives in the [theme-example repository](https://github.com/owncloud/theme-example) - [#31447](https://github.com/owncloud/core/issues/31447)
- A user who is a member of multiple groups is now excluded from sharing if at least one of their group is configured for exclusion - [#31737](https://github.com/owncloud/core/issues/31737) [#31822](https://github.com/owncloud/core/issues/31822)
- Changed back default minimum search characters to 2 for share autocomplete due to confusion - [#31729](https://github.com/owncloud/core/issues/31729)
- Files app UI now uses new versions API through the "meta" DAV endpoint - [#29607](https://github.com/owncloud/core/pull/29607)

### Removed
- Removed old private ajax API for previews, deprecated by DAV endpoint support - [#30254](https://github.com/owncloud/core/pull/30254)
- Bookmarks certificate was removed - [#31878](https://github.com/owncloud/core/issues/31878)

### Fixed
- Adjustments for the notifications messages of the sharing apps - [#31947](https://github.com/owncloud/core/issues/31947)
- Disable jquery globalEval - [#31972](https://github.com/owncloud/core/issues/31972)
- Work around Edge browser memory leak in web UI chunked upload - [#31884](https://github.com/owncloud/core/issues/31884)
- Don't fail if ISqlMigration doesn't return anything - [#31779](https://github.com/owncloud/core/issues/31779)
- Fixed restoring of versions for single file shares - [#31681](https://github.com/owncloud/core/issues/31681)
- Group admins are not able to create groups any more using provisioning API - [#31738](https://github.com/owncloud/core/issues/31738)
- Fix Oracle for queries using ILIKE operator - [#31466](https://github.com/owncloud/core/issues/31466)
- Improve user-sync command help description - [#31691](https://github.com/owncloud/core/issues/31691)
- Fix deletion and restoration of files in trashbin in some partial selection scenarios - [#31700](https://github.com/owncloud/core/issues/31700)
- Do not load the code of disabled theme apps - [#31478](https://github.com/owncloud/core/issues/31478)
- Fix encrypt-all and decrypt-all commands to keep shares when encrypting - [#31600](https://github.com/owncloud/core/issues/31600) [#31590](https://github.com/owncloud/core/issues/31590)
- Proceed with encrypt-all command by enabling user-keys if no mode is selected by user - [#31612](https://github.com/owncloud/core/issues/31612)
- Validate maximum length of a username - [#31664](https://github.com/owncloud/core/issues/31664)
- Save timezone as given during login - [#31493](https://github.com/owncloud/core/issues/31493)
- Fix checksum computation to not apply on read-write streams to avoid potential mismatch results - [#31619](https://github.com/owncloud/core/issues/31619)
- Exclude uploads directory from read-only cache mask, fixes guest app chunked uploads - [#31596](https://github.com/owncloud/core/issues/31596)
- Properly normalize paths for event, no &$magic needed - [#31689](https://github.com/owncloud/core/issues/31689)
- Use the correct user id in login related Symfony events - [#31605](https://github.com/owncloud/core/issues/31605)
- Fix public link dialog issue when collaborative tags app is disabled - [#31581](https://github.com/owncloud/core/issues/31581)
- Fix updating public link share in transfer ownership command - [#31176](https://github.com/owncloud/core/issues/31176) [#31953](https://github.com/owncloud/core/issues/31953)
- Do not set the password again if it hasn't changed - [#31370](https://github.com/owncloud/core/issues/31370)
- Use correct l10n to translate 'password was changed' email - [#31553](https://github.com/owncloud/core/issues/31553)
- Improve text in settings/personal App Password - [#31539](https://github.com/owncloud/core/issues/31539)
- Fix default language code example - [#31448](https://github.com/owncloud/core/issues/31448)
- Fix double slash in versioning file copy events - [#31452](https://github.com/owncloud/core/issues/31452)
- Split public password enforced capabilities based on a config - [#31499](https://github.com/owncloud/core/issues/31499)
- Fix bogus exceptions related to missing DAV nodes after deletion - [#31479](https://github.com/owncloud/core/issues/31479)
- Fix enabling of users by group admins in the web UI - [#31489](https://github.com/owncloud/core/issues/31489)
- Fix AccountMapper to return an object or throw an exception - [#31445](https://github.com/owncloud/core/issues/31445)
- Proper handling of exceptions in UserManager - [#31446](https://github.com/owncloud/core/issues/31446)
- Properly cache nonexistent user in UserManager - [#31446](https://github.com/owncloud/core/issues/31446)
- Update verify checksums console output to flow more naturally - [#31449](https://github.com/owncloud/core/issues/31449)
- Subadmin shouldn't be able to add users to their groups via API - [#31337](https://github.com/owncloud/core/issues/31337)
- Catch duplicate inserts in token table - [#31460](https://github.com/owncloud/core/pull/31460) [#31794](https://github.com/owncloud/core/issues/31794) [#32041](https://github.com/owncloud/core/pull/32041)
- Fix overflowing public share names in the share panel - [#31369](https://github.com/owncloud/core/issues/31369)
- Fix occ user:sync to sync quota from preferences after upgrade if backend provided no quota - [#31360](https://github.com/owncloud/core/issues/31360)
- Fix for Redis dev editions - [#31282](https://github.com/owncloud/core/issues/31282)
- Fix mail debug message recipient field - [#31227](https://github.com/owncloud/core/issues/31227)
- Prevent infinite loop in case of error in "log" event handler - [#31247](https://github.com/owncloud/core/issues/31247)
- Fix HTTP status code when uploading virus-infected files - [#31260](https://github.com/owncloud/core/issues/31260)
- Add back robots.txt in the release - [#31248](https://github.com/owncloud/core/issues/31248)

## 10.0.8 - 2018-04-27
### Added
- Added option for user:sync to reenable formerly disabled users - [#31124](https://github.com/owncloud/core/pull/31124)
- Ability to log extra JSON fields - [#31121](https://github.com/owncloud/core/issues/31121)
- Trigger event when logging - [#31121](https://github.com/owncloud/core/issues/31121)
- Added command to verify and fix checksums - [#31008](https://github.com/owncloud/core/pull/31008)
- Introduce seen and single user sync command line features - [#31025](https://github.com/owncloud/core/issues/31025) [#31032](https://github.com/owncloud/core/issues/31032)
- Added config setting to specify minimum characters for sharing autocomplete - [#30994](https://github.com/owncloud/core/issues/30994) [#31067](https://github.com/owncloud/core/issues/31067) [#31160](https://github.com/owncloud/core/pull/31160)
- Added personal note field for link share email - [#30486](https://github.com/owncloud/core/issues/30486) [#30571](https://github.com/owncloud/core/issues/30571) [#30813](https://github.com/owncloud/core/issues/30813) [#31057](https://github.com/owncloud/core/issues/31057) [#31201](https://github.com/owncloud/core/pull/31201) [#31212](https://github.com/owncloud/core/pull/31212)
- Add conditional Logging target logfile for shared_secret and users - [#30443](https://github.com/owncloud/core/issues/30443)
- Add option to disable link share password enforcement for write-only shares - [#30408](https://github.com/owncloud/core/issues/30408) [#30774](https://github.com/owncloud/core/issues/30774) [#30787](https://github.com/owncloud/core/issues/30787)
- Add Webdav-Location header in private link redirect - [#30387](https://github.com/owncloud/core/issues/30387) [#30595](https://github.com/owncloud/core/issues/30595)
- Make syslog output configurable, introduce new default that includes the request id - [#30346](https://github.com/owncloud/core/issues/30346)
- Added "uid" parameter to "validatePassword" events - [#30334](https://github.com/owncloud/core/issues/30334)
- Added new API event for zip file download - [#30067](https://github.com/owncloud/core/issues/30067)
- Added new API event for public link creation - [#30067](https://github.com/owncloud/core/issues/30067)
- Added log entry when the "data-fingerprint" command was run - [#30281](https://github.com/owncloud/core/issues/30281)
- Added "heic" and "heif" as image mime types for thumbnails - [#30108](https://github.com/owncloud/core/issues/30108)
- Added new API events for commenting actions - [#30142](https://github.com/owncloud/core/issues/30142)
- Added "register notifier" event for use with the notification emails feature - [#30613](https://github.com/owncloud/core/issues/30613)
- Added group option to files:scan command - [#30615](https://github.com/owncloud/core/issues/30615)
- Added warning if no files to process in occ files:transfer-ownership command - [#30612](https://github.com/owncloud/core/issues/30612)
- Added user:modify command to core - [#30652](https://github.com/owncloud/core/issues/30652)
- Added config switch to enable fallback to http scheme when creating fed shares - [#30646](https://github.com/owncloud/core/issues/30646) [#31196](https://github.com/owncloud/core/issues/31196)
- Added repair step for orphaned sub-shares - [#30695](https://github.com/owncloud/core/issues/30695)
- Added repair step to fix orphaned reshares - [#31004](https://github.com/owncloud/core/issues/31004)
- Added Symfony events for configuration changes (config.php and appconfig) - [#30788](https://github.com/owncloud/core/issues/30788) [#30937](https://github.com/owncloud/core/issues/30937) [#31107](https://github.com/owncloud/core/issues/31107)
- Added Symfony event to let apps resolve private links - [#30911](https://github.com/owncloud/core/issues/30911)
- Added Symfony events for delete and create share - [#31026](https://github.com/owncloud/core/issues/31026)
- Added Symfony events for updating share attributes (expiration, password, name) - [#31120](https://github.com/owncloud/core/issues/31120)
- Added Symfony events for group membership events - [#31003](https://github.com/owncloud/core/issues/31003)
- Added Symfony events for feature change in group admin - [#31132](https://github.com/owncloud/core/issues/31132)
- Added config.php option to select apps to ignore missing signature file (mostly for themes) - [#30891](https://github.com/owncloud/core/issues/30891) [#31066](https://github.com/owncloud/core/issues/31066)
- Added ability for full-page frontend-only apps in info.xml - [#30918](https://github.com/owncloud/core/issues/30918)
- More user-friendly email address input and handling in link share dialog - [#30945](https://github.com/owncloud/core/issues/30945) [#31142](https://github.com/owncloud/core/issues/31142)

### Changed
- Set minimum php version to 5.6 in composer.json - [#31100](https://github.com/owncloud/core/issues/31100)
- Bump PHP to 5.6.33 in composer - [#30403](https://github.com/owncloud/core/issues/30403)
- Bump phpseclib/phpseclib from 2.0.3 to 2.0.10 - [#30052](https://github.com/owncloud/core/issues/30052) [#30537](https://github.com/owncloud/core/issues/30537)
- Bump phpunit and symfony/translation to match master - [#30410](https://github.com/owncloud/core/issues/30410)
- Bump guzzlehttp/guzzle from 5.3.1 to 5.3.2 - [#30217](https://github.com/owncloud/core/issues/30217)
- Bump lukasreschke/id3parser from 0.0.1 to 0.0.3 - [#30085](https://github.com/owncloud/core/issues/30085)
- Bump symfony to 3.4.5 - [#30689](https://github.com/owncloud/core/issues/30689)
- Bump symfony/translation from 3.2.4 to 3.3.16 - [#30380](https://github.com/owncloud/core/issues/30380)
- Bump latest symfony and sabre/vobject point versions - [#30266](https://github.com/owncloud/core/issues/30266)
- Bump karma from 1.5.0 to 2.0.0 in /build - [#30050](https://github.com/owncloud/core/issues/30050)
- Bump punic/punic from 1.6.5 to 3.1.0 - [#30550](https://github.com/owncloud/core/issues/30550)
- Bump symfony to 3.4.6 and Sabre vobject to 4.1.5 - [#30768](https://github.com/owncloud/core/issues/30768)
- Bump sabre/http from 4.2.3 to v4.2.4 - [#30599](https://github.com/owncloud/core/issues/30599)
- Bump jakub-onderka/php-parallel-lint from 0.9.2 to 1.0.0 - [#30626](https://github.com/owncloud/core/issues/30626)
- Bump behat/mink-extension from 2.3.0 to 2.3.1 - [#30706](https://github.com/owncloud/core/issues/30706)
- Bump league/flysystem from 1.0.42 to 1.0.43 - [#30704](https://github.com/owncloud/core/issues/30704)
- Update composer in stable10 with versions as at 2018-02-07 - [#30390](https://github.com/owncloud/core/issues/30390)
- Renamed SMB logging config.php settings from "wnd" to "smb" - [#30244](https://github.com/owncloud/core/issues/30244)
- Improved error messages in user:delete command - [#30164](https://github.com/owncloud/core/issues/30164)
- Validate email address in mail settings section - [#30315](https://github.com/owncloud/core/issues/30315)
- Only decrypt users who have already logged in with decrypt-all occ command - [#30640](https://github.com/owncloud/core/issues/30640)
- Replace usage of "create_function" in PHP - [#30714](https://github.com/owncloud/core/issues/30714)
- Provisioning API can now properly set default or zero quota - [#30755](https://github.com/owncloud/core/issues/30755)
- User quota setting can be queried through provisioning API - [#30850](https://github.com/owncloud/core/issues/30850)

### Removed
- Removed private oc_current_user Javascript variable - [#30486](https://github.com/owncloud/core/issues/30486) [#30556](https://github.com/owncloud/core/issues/30556)
- Remove app store config values from config.sample.php - [#30422](https://github.com/owncloud/core/issues/30422)
- Remove documentation of the theme option in config.sample.php - [#30350](https://github.com/owncloud/core/issues/30350)
- Remove unused config.sample.php parameters - [#30933](https://github.com/owncloud/core/issues/30933) [#30812](https://github.com/owncloud/core/issues/30812)
- Remove "Unlimited" word from quota report in personal page - [#31041](https://github.com/owncloud/core/issues/31041)

### Fixes
- Prevent background scan to scan homes of users who never logged in - [#31189](https://github.com/owncloud/core/issues/31189)
- Properly align three button dialogs - [#31147](https://github.com/owncloud/core/issues/31147)
- Many documentation improvements in config.sample.php - [#31114](https://github.com/owncloud/core/issues/31114) [#31127](https://github.com/owncloud/core/issues/31127) [#31128](https://github.com/owncloud/core/issues/31128) [#31068](https://github.com/owncloud/core/issues/31068) [#31173](https://github.com/owncloud/core/issues/31173) [#31182](https://github.com/owncloud/core/pull/31182)
- Fix some documentation paths in config.sample.php - [#30431](https://github.com/owncloud/core/issues/30431)
- Fix App Framework ApiController initialization to fix thumbnail access - [#31104](https://github.com/owncloud/core/issues/31104) [#31183](https://github.com/owncloud/core/pull/31183)
- Check apache auth on login form - [#31074](https://github.com/owncloud/core/issues/31074)
- Check basic auth credentials periodically after a timeout instead of … - [#31076](https://github.com/owncloud/core/issues/31076)
- Email autocomplete in link share dialog will not return local/federated users any more, only contacts - [#30998](https://github.com/owncloud/core/issues/30998)
- Fix settings page where elements are inline when they shouldn't - [#30988](https://github.com/owncloud/core/issues/30988)
- Do not log errors when uploading forbidden file format - [#30991](https://github.com/owncloud/core/issues/30991)
- Fix upload issue by replacing emittingCall with separate before and after events - [#30986](https://github.com/owncloud/core/issues/30986)
- Fix Symfony event emittingCall by adding return - [#31045](https://github.com/owncloud/core/issues/31045)
- Properly trigger file-related Symfony events when chunking - [#31087](https://github.com/owncloud/core/issues/31087)
- Remove unsupported "enable for groups" field for theme apps - [#30948](https://github.com/owncloud/core/issues/30948)
- Added OneNote 2016 user agent string to make it work with Webdav - [#30965](https://github.com/owncloud/core/issues/30965)
- Refactored metadata sync code to unify behavior across all login methods - [#30638](https://github.com/owncloud/core/issues/30638)
- Mask "marketplace.key" in config list as it is sensitive - [#30917](https://github.com/owncloud/core/issues/30917)
- Polish totp middleware a little - [#30849](https://github.com/owncloud/core/issues/30849)
- Set empty authtoken names to 'none' as empty is not allowed any more - [#30908](https://github.com/owncloud/core/issues/30908)
- Fix CORS OPTIONS request for unauthenticated requests - [#30912](https://github.com/owncloud/core/issues/30912)
- Treat any unknown app version as 0.0.1 - [#30890](https://github.com/owncloud/core/issues/30890)
- Ignore multiple slashes in http path - [#30854](https://github.com/owncloud/core/issues/30854)
- Initialize root folder service later to fix user backend registration order issue - [#30810](https://github.com/owncloud/core/issues/30810)
- Remove implicit login in base.php to remove bogus "Login failed" logs - [#30814](https://github.com/owncloud/core/issues/30814)
- Use storage specific move operation for object store - [#30817](https://github.com/owncloud/core/issues/30817)
- Fix webUI display of group containing numeric username - [#30811](https://github.com/owncloud/core/issues/30811)
- Fix calendar changes limit - [#30816](https://github.com/owncloud/core/issues/30816)
- Properly use error exit code for unsupported PHP version - [#30780](https://github.com/owncloud/core/issues/30780)
- Unbrand Personal security sessions message - [#30754](https://github.com/owncloud/core/issues/30754)
- Propagate move exception messages to the frontend - [#30791](https://github.com/owncloud/core/issues/30791)
- Fix chunk size comparison for big values on 32-bit systems - [#30772](https://github.com/owncloud/core/issues/30772)
- Make error origin more distinguishable in some filesystem code paths - [#30682](https://github.com/owncloud/core/issues/30682)
- Don't send emails when importing calendar/events - [#30666](https://github.com/owncloud/core/issues/30666)
- Adding a system configuration for global CORS domains - [#30906](https://github.com/owncloud/core/issues/30906)
- Better label for CORS in settings section - [#30663](https://github.com/owncloud/core/issues/30663)
- Allow regular users to change their CORS domains - [#30649](https://github.com/owncloud/core/issues/30649)
- Catch session unavailable exception - [#30347](https://github.com/owncloud/core/issues/30347) [#30623](https://github.com/owncloud/core/issues/30623)
- Proper HTTP status code on login exception - [#30639](https://github.com/owncloud/core/issues/30639)
- Fix file mtime issue on 32-bit systems - [#30546](https://github.com/owncloud/core/issues/30546)
- Fixing logout for app password scenario - [#30591](https://github.com/owncloud/core/issues/30591)
- Fix wording if you are not a member of any groups - [#30558](https://github.com/owncloud/core/issues/30558)
- Fix for error when querying non present log_secret - [#30470](https://github.com/owncloud/core/issues/30470)
- Properly create a session for a pure token based request, fixed oauth2 issues - [#30542](https://github.com/owncloud/core/issues/30542)
- Free resources in preview providers - [#30533](https://github.com/owncloud/core/issues/30533)
- Continue in case of rare error in files:scan repair command - [#30494](https://github.com/owncloud/core/issues/30494) [#30618](https://github.com/owncloud/core/issues/30618) [#30959](https://github.com/owncloud/core/issues/30959)
- Make theming work when theme app is outside the ownCloud root - [#30477](https://github.com/owncloud/core/issues/30477)
- Don't try decrypting federated shares in decrypt-all command - [#30155](https://github.com/owncloud/core/issues/30155)
- Keep null in getMetaData in Checksum storage wrapper, fixes some files:scan scenarios - [#30302](https://github.com/owncloud/core/issues/30302)
- Modals dialogs can now scroll, improves link share dialog UX - [#30424](https://github.com/owncloud/core/issues/30424)
- Adjust link share wording and fix translations - [#31036](https://github.com/owncloud/core/issues/31036)
- Fix failure of shares which are already moved with transfer ownership - [#30161](https://github.com/owncloud/core/issues/30161)
- Return 403 instead of 503 to resume syncing of desktop client - [#30353](https://github.com/owncloud/core/issues/30353)
- Guide users to also check spelling for typos in federated share id - [#30355](https://github.com/owncloud/core/issues/30355)
- Fixed issue with number of hidden files not updating on renaming a file - [#30359](https://github.com/owncloud/core/issues/30359)
- Fix deleted items auto expiration for users with no quota - [#30163](https://github.com/owncloud/core/issues/30163)
- Fix validation for new encryption storage key location - [#30357](https://github.com/owncloud/core/issues/30357)
- Fix some CSRF issues on Webdav endpoint by only checking for POST method - [#30358](https://github.com/owncloud/core/issues/30358)
- Prevent share icon from shrinking with long texts - [#31163](https://github.com/owncloud/core/pull/31163)
- Fixed regression where a user could not set own email address in the settings page - [#30319](https://github.com/owncloud/core/issues/30319)
- Fix caldav and carddav syncing when dealing with lots of data - [#30252](https://github.com/owncloud/core/issues/30252)
- Don't restrain width of icon-logo - [#30282](https://github.com/owncloud/core/issues/30282)
- Check trashbin permissions before moving to trash, fixes deletion as guest user - [#30240](https://github.com/owncloud/core/issues/30240)
- Handle no read access to skeleton - [#30241](https://github.com/owncloud/core/issues/30241)
- Fix file name escaping in error messages in web UI related to file operations - [#30193](https://github.com/owncloud/core/issues/30193)
- Proper error message when trying to add user to a group they are already member of in web UI - [#30194](https://github.com/owncloud/core/issues/30194)
- Show new basename and extension while waiting for rename operation to finish in web UI - [#30040](https://github.com/owncloud/core/issues/30040)
- Fix app author parsing in apps page - [#30043](https://github.com/owncloud/core/issues/30043)
- Validate system path data used in findBinaryPath - [#30061](https://github.com/owncloud/core/issues/30061)
- Fix deletion of group with special characters in web UI - [#30111](https://github.com/owncloud/core/issues/30111)
- Fix missing preview in file upload conflict window - [#30125](https://github.com/owncloud/core/issues/30125)
- Fix files endpoint bug when downloading vCard - [#30149](https://github.com/owncloud/core/issues/30149)
- Properly filter link share email parameters - [#30165](https://github.com/owncloud/core/issues/30165)
- Filter sender display name in mail notification handler - [#31056](https://github.com/owncloud/core/issues/31056)
- Filter file name when sending internal mail - [#31046](https://github.com/owncloud/core/issues/31046)
- Convert null to empty string for Oracle in file cache accessor - [#30224](https://github.com/owncloud/core/issues/30224)
- Use LargeFileHelper to calculate log file size - fixes #30227 - [#30234](https://github.com/owncloud/core/issues/30234)

## 10.0.7 - 2018-01-19
### Fixed
- Fix various issues about null user errors - [#30450](https://github.com/owncloud/core/issues/30450)
- Solve OAuth token expiry issue - [#30481](https://github.com/owncloud/core/issues/30481)
- Fixed issues related to app passwords and account lock-outs - [#30363](https://github.com/owncloud/core/issues/30363)

## 10.0.6 - 2018-01-29
### Fixed
- Fix missing build dependency for L18N - [#30265](https://github.com/owncloud/core/pull/30265)

## 10.0.5 - 2018-01-23
### Added
- Add php-intl as hard requirement - [#29539](https://github.com/owncloud/core/issues/29539)
- Optionally show server hostname in status.php - [#29471](https://github.com/owncloud/core/issues/29471)
- Add link for logfiles docs in exception page and simplify text - [#29674](https://github.com/owncloud/core/issues/29674)
- Link to trusted domains docs in error message - [#29730](https://github.com/owncloud/core/issues/29730)
- Add indices on share table - [#29883](https://github.com/owncloud/core/issues/29883) [#29592](https://github.com/owncloud/core/issues/29592)
- Add dispatcher event for "unshare from self" action - [#29851](https://github.com/owncloud/core/issues/29851)
- Technology preview for PHP 7.2 support - [#29878](https://github.com/owncloud/core/issues/29878)
- Added public hooks for file operations using Symfony Event Dispatcher - [#29939](https://github.com/owncloud/core/issues/29939)
- Expose getAppPath() and getAppWebPath() on the AppManager service [#30041](https://github.com/owncloud/core/pull/30041) [#30150](https://github.com/owncloud/core/pull/30150)
- Add warning in settings page when running in debug mode - [#29936](https://github.com/owncloud/core/issues/29936)

### Changed
- Switch Webdav URL in field in navigation panel to the new endpoint - [#29766](https://github.com/owncloud/core/issues/29766)
- Require a minimum of 1 character for the application password name - [#29831](https://github.com/owncloud/core/issues/29831)
- Only allow a single active theme app with no magic fallbacks to inactive app themes  - [#29854](https://github.com/owncloud/core/issues/29854)
- Config report now hides email address from email config - [#29949](https://github.com/owncloud/core/issues/29949)
- Change "remote" to "federated" suffix in sharing autocomplete dialog. - [#30046](https://github.com/owncloud/core/issues/30046) [#30171](https://github.com/owncloud/core/issues/30171)

### Removed
- Removed old Dropbox storage backend, people should use the [files_external_dropbox app](https://github.com/owncloud/files_external_dropbox/) instead - [#29135](https://github.com/owncloud/core/issues/29135)
- Revoke tasks.crt - [#29882](https://github.com/owncloud/core/issues/29882)
- Remove unused composer dependency on natxet/CssMin - [#29930](https://github.com/owncloud/core/issues/29930)

### Fixed
- Fix Dropbox / GDrive oauth handshake handling - [#30071](https://github.com/owncloud/core/pull/30071)
- Redisplay login page on CSRF error - [#30035](https://github.com/owncloud/core/issues/30035)
- Do not reset display name to uid on sso login - [#30038](https://github.com/owncloud/core/issues/30038)
- Do not automatically disable apps of certain types - [#29870](https://github.com/owncloud/core/issues/29870)
- Fix provisioning API when dealing with group name "0" - [#30004](https://github.com/owncloud/core/issues/30004)
- Tweak occ command help output - [#29959](https://github.com/owncloud/core/issues/29959)
- Now using upsert instead of insertIfNotExists for file cache updates, fixes concurrency issues - [#29934](https://github.com/owncloud/core/issues/29934)
- Only set CORS headers on Webdav endpoint when Origin header is specified - [#29874](https://github.com/owncloud/core/issues/29874)
- Ignore broken/dead symlinks on filescan - [#28959](https://github.com/owncloud/core/issues/28959)
- Improve performance by caching nonexistent accounts - [#29866](https://github.com/owncloud/core/issues/29866)
- Fix template location order by searching the enabled theme app first - [#29867](https://github.com/owncloud/core/issues/29867)
- Actually log message instead of {$message} - [#29844](https://github.com/owncloud/core/issues/29844)
- Improved performance on new DAV endpoint by skipping querying parent nodes - [#29834](https://github.com/owncloud/core/issues/29834)
- Adjust error message about PHP compatibility to say PHP X.X like previous line. - [#29828](https://github.com/owncloud/core/issues/29828)
- Raise more useful message when constructor are not resolvable - [#29760](https://github.com/owncloud/core/issues/29760)
- Fix wording for versions expiration occ command - [#29671](https://github.com/owncloud/core/issues/29671)
- Handle invalid or missing external storage backend to keep mount point visible - [#29562](https://github.com/owncloud/core/issues/29562)
- Fix integrity check when owncloud is not installed - [#29692](https://github.com/owncloud/core/issues/29692)
- Fix issues about unsharing with some scenarios after moving the share - [#29716](https://github.com/owncloud/core/issues/29716)
- Allow group 0 to be created by provisioning API - [#29734](https://github.com/owncloud/core/issues/29734)
- Do not reset quota if it was not provided - [#29673](https://github.com/owncloud/core/issues/29673)
- Improve quota value validation - check size only if size key is set - [#29743](https://github.com/owncloud/core/issues/29743)
- Code cleanup - [#29799](https://github.com/owncloud/core/issues/29799)

## 10.0.4 - 2017-12-06
### Added
- Added support for eml mimetype - [#29204](https://github.com/owncloud/core/issues/29204)
- Added "occ dav:cleanup-chunks" command to clean up expired uploads - [#29180](https://github.com/owncloud/core/issues/29180)
- Added "occ files:scan" repair mode to repair mismatch filecache paths - [#29074](https://github.com/owncloud/core/issues/29074) [#29232](https://github.com/owncloud/core/issues/29232)
- Added occ command to change/recreate master-key - [#29260](https://github.com/owncloud/core/issues/29260) [#29735](https://github.com/owncloud/core/issues/29735)
- Detailed mode for "occ security:routes" - [#29095](https://github.com/owncloud/core/issues/29095)
- Webdav property to retrieve a private link to files or folders - [#29041](https://github.com/owncloud/core/issues/29041)
- CORS support for public API routes - [#28852](https://github.com/owncloud/core/issues/28852) [#29741](https://github.com/owncloud/core/issues/29741) [#29749](https://github.com/owncloud/core/issues/29749)
- More "files_sharing" capabilities entries - [#29040](https://github.com/owncloud/core/issues/29040)
- Display server name in admin page, don't show in status.php - [#28938](https://github.com/owncloud/core/issues/28938)
- Validate public link mail on the client side - [#29042](https://github.com/owncloud/core/issues/29042)
- Expose XHR response in share dialog autocomplete callback for extensions - [#29231](https://github.com/owncloud/core/issues/29231)
- Let apps provide icons for settings sections - [#29358](https://github.com/owncloud/core/issues/29358)
- Added cancellable prehooks for logout operation - [#29352](https://github.com/owncloud/core/issues/29352)
- Markdown support for app descriptions in apps settings panel - [#29333](https://github.com/owncloud/core/issues/29333)
- Add option to allow user to share only with the groups they belong to - [#29391](https://github.com/owncloud/core/issues/29391)
- Cacheable storage adapter for use by Flysystem based external storage backends - [#29414](https://github.com/owncloud/core/issues/29414)
- Add user additional info field for share autocomplete  - [#29457](https://github.com/owncloud/core/issues/29457)
- Add dispatcher event for remote fed shares - [#29482](https://github.com/owncloud/core/issues/29482)
- Adding mode of operations - either single-instance or clus… - [#29492](https://github.com/owncloud/core/issues/29492)
- Added support for MariaDB 10.2.7+ - [#29240](https://github.com/owncloud/core/issues/29240)
- Admins can now exclude files from integrity check in config.php - [#29460](https://github.com/owncloud/core/issues/29460)
- Use X-Request-ID header as request id if provided by client, useful for logging - [#29434](https://github.com/owncloud/core/issues/29434)
- Added authentication headers verification to validate the session - [#29525](https://github.com/owncloud/core/issues/29525)
- Added IServiceLoader on server container to load app service classes from XML tags in info.xml - [#29525](https://github.com/owncloud/core/issues/29525)
- Trigger events for federated shares - [#29566](https://github.com/owncloud/core/issues/29566)

### Changed
- Exclude mimetypelist.js from integrity check - [#29048](https://github.com/owncloud/core/issues/29048) [#29316](https://github.com/owncloud/core/issues/29316)
- Refactor set and reset of capabilities - [#29200](https://github.com/owncloud/core/issues/29200)
- All amazon locations support v4 now - v3 deprecated - [#29153](https://github.com/owncloud/core/issues/29153)
- Modified time value of files is now 64 bits long - [#28961](https://github.com/owncloud/core/issues/28961)
- User names must now be at least 3 characters long - [#29237](https://github.com/owncloud/core/issues/29237)
- AccountMapper get by email is now case insensitive - [#29341](https://github.com/owncloud/core/issues/29341)
- Remove deprecated federated share API warning as it needlessly pollutes logs - [#29364](https://github.com/owncloud/core/issues/29364)
- Improve UI for public link sharing permissions for folders - [#29413](https://github.com/owncloud/core/issues/29413)
- Replace notify user for local shares with button - [#29463](https://github.com/owncloud/core/issues/29463)
- Log out current user after submitting form in password reset page - [#29464](https://github.com/owncloud/core/issues/29464)
- Update minimum supported browser versions - [#29507](https://github.com/owncloud/core/issues/29507)
- Admins can now change display name even when its modification is disallowed for regular users - [#29442](https://github.com/owncloud/core/issues/29442)

### Removed
- Remove AvatarPermissions repair step - [#29202](https://github.com/owncloud/core/issues/29202)
- Remove unused FTP code - [#29186](https://github.com/owncloud/core/issues/29186)
- Remove app store related code obsoleted by market app - [#29249](https://github.com/owncloud/core/issues/29249)
- Remove a route to removed script - [#29553](https://github.com/owncloud/core/issues/29553)

### Fixed
- Corrected namespace for OC\Memcache\ArrayCache which caused errors on some environments - [#29219](https://github.com/owncloud/core/issues/29219)
- External storage Javascript code from apps is now loaded correctly (fixes Dropbox app and others) - [#29225](https://github.com/owncloud/core/issues/29225)
- Use product name from theme - [#29251](https://github.com/owncloud/core/issues/29251)
- Make sure the external storage folder name is editable when returning from OAuth authorization - [#29253](https://github.com/owncloud/core/issues/29253)
- Fix duplicate external storage config that appear sometimes when returning from OAuth authorization - [#29254](https://github.com/owncloud/core/issues/29254)
- Log exceptions in decrypt-all command - [#29248](https://github.com/owncloud/core/issues/29248)
- SFTP key pair mode now works again - [#29156](https://github.com/owncloud/core/issues/29156)
- Use correct class namespace for ownCloud ext storage - [#28935](https://github.com/owncloud/core/issues/28935)
- Fix generated zip file to avoid errors with some zip tools - [#29149](https://github.com/owncloud/core/issues/29149)
- Fix position of dialog boxes - [#29133](https://github.com/owncloud/core/issues/29133) [#29467](https://github.com/owncloud/core/issues/29467)
- Move 64bit mtime migration from dav to core - [#29121](https://github.com/owncloud/core/issues/29121)
- Allow 0 byte quota to be entered on UI - [#29113](https://github.com/owncloud/core/issues/29113)
- Don't display warning about limited commands when running maintenance:install - [#28968](https://github.com/owncloud/core/issues/28968)
- Handle no user session in isSharingDisabledForUser() - [#28915](https://github.com/owncloud/core/issues/28915)
- Fix icon format for federated cloud sharing - [#28972](https://github.com/owncloud/core/issues/28972)
- Fix for decrypting user specific keys - [#29189](https://github.com/owncloud/core/issues/29189)
- Remove alternate keys storage during user delete - [#29155](https://github.com/owncloud/core/issues/29155)
- Fix error logs due to deletion of keys - [#28934](https://github.com/owncloud/core/issues/28934)
- Fix encryption panel to properly detect current mode after upgrade to ownCloud 10 - [#29049](https://github.com/owncloud/core/issues/29049)
- Fix quota check when uploading to federated shares - [#29325](https://github.com/owncloud/core/issues/29325) [#29424](https://github.com/owncloud/core/issues/29424)
- Fix issue when mounting another encrypted ownCloud - [#29360](https://github.com/owncloud/core/issues/29360)
- AccountMapper get by email is now case insensitive - [#29341](https://github.com/owncloud/core/issues/29341)
- Fix order of apps to be deterministic during install process - [#29267](https://github.com/owncloud/core/issues/29267)
- Only initiate connection to federated share when necessary - [#29314](https://github.com/owncloud/core/issues/29314)
- Allow group named "0" to be deleted - [#29323](https://github.com/owncloud/core/issues/29323)
- Do not translate CORS header in settings page - [#29313](https://github.com/owncloud/core/issues/29313)
- Disable background scan for home storage/cache - [#29306](https://github.com/owncloud/core/issues/29306)
- Fixed double escaping in full page error messages - [#29304](https://github.com/owncloud/core/issues/29304)
- Updated davclient.js which fixes issue whenever an app extends Array prototype - [#29305](https://github.com/owncloud/core/issues/29305)
- Fix OCS apps API to correctly include attributes into generated XML - [#29303](https://github.com/owncloud/core/issues/29303)
- Make enum type mapping work with migrations - [#29268](https://github.com/owncloud/core/issues/29268)
- Handle invalid storage when getting storage root id - [#29278](https://github.com/owncloud/core/issues/29278)
- Fix storing/retrieval for dav properties of non files - [#29273](https://github.com/owncloud/core/issues/29273)
- Remove double quotes from boolean values in status.php output - [#29271](https://github.com/owncloud/core/issues/29271)
- Tidy code in DAV related classes - [#29272](https://github.com/owncloud/core/issues/29272)
- Fix the missing argument to DecryptAll - [#29371](https://github.com/owncloud/core/issues/29371)
- Skip copying skeleton files if skeleton dir is not accessible - [#29379](https://github.com/owncloud/core/issues/29379)
- Use chunked DB query when preloading directory content for DAV properties - [#29416](https://github.com/owncloud/core/issues/29416)
- Fix failure when checking integrity signature for nonexistent files - [#29433](https://github.com/owncloud/core/issues/29433)
- Prevent uploading of part files through WebDav - [#29432](https://github.com/owncloud/core/issues/29432)
- Only trigger "changeUser" event if account object really changed - [#29429](https://github.com/owncloud/core/issues/29429)
- Only load app type once in app manager classes - [#29428](https://github.com/owncloud/core/issues/29428)
- Use efficient startsWith implementation in server container - [#29427](https://github.com/owncloud/core/issues/29427)
- Fix race condition in browser when uploading folder tree - [#29435](https://github.com/owncloud/core/issues/29435)
- Disable nginx buffering for file downloads to avoid huge memory usage in some scenarios - [#29403](https://github.com/owncloud/core/issues/29403)
- Fix many issues related to session removal - [#28879](https://github.com/owncloud/core/issues/28879)
- Fix SMB to better detect when overwriting through rename - [#29564](https://github.com/owncloud/core/issues/29564)
- Fix files scan repair in bulk warning - [#29631](https://github.com/owncloud/core/issues/29631)
- Fix federated share import from public link - [#29677](https://github.com/owncloud/core/issues/29677)
- Fix status.php to properly display product name - [#29728](https://github.com/owncloud/core/issues/29728)
- Sort allowed storages checkbox list - [#29746](https://github.com/owncloud/core/issues/29746)

## [10.0.3] - 2017-09-15
### Added
- It is now possible to upgrade from 8.2.11 directly to 10 - [#28655](https://github.com/owncloud/core/issues/28655) [#28673](https://github.com/owncloud/core/pull/28673)
- Added extra check in case of missing home storage - [#28504](https://github.com/owncloud/core/issues/28504)
- Added Shield and Workflow icons - [#28588](https://github.com/owncloud/core/issues/28588)
- Enable chunking for big files in web UI when logged in - [#28547](https://github.com/owncloud/core/issues/28547)
- Added emitting of hook "post_unshareFromSelf" to Share 2.0 - [#28413](https://github.com/owncloud/core/issues/28413)
- Added occ user:inactive command to list inactive users - [#28294](https://github.com/owncloud/core/issues/28294)
- Added internal setting for the periodic credentials validity check - [#28298](https://github.com/owncloud/core/issues/28298)
- Added jquery events for external storage settings UI when using OAuth - [#28210](https://github.com/owncloud/core/issues/28210)
- Added public IThemeService which allows apps like the template editor to interact with the current theme - [#28647](https://github.com/owncloud/core/issues/28647) [#28926](https://github.com/owncloud/core/issues/28926)
- Added "passwordEnabled" field to hook data of link shares - [#28827](https://github.com/owncloud/core/issues/28827)
- Add new option to disable sharing in every user-mounted external storages - [#28706](https://github.com/owncloud/core/issues/28706)
- Added default user and group share permissions - [#28903](https://github.com/owncloud/core/issues/28903)
- Added occ command to list routes - [#28907](https://github.com/owncloud/core/issues/28907)
- Added mime types for m3u, m3u8, pls mappings to audio streams - [#28885](https://github.com/owncloud/core/issues/28885)

### Changed
- Transfer ownership now works with master key encryption - [#28537](https://github.com/owncloud/core/issues/28537) [#28845](https://github.com/owncloud/core/issues/28845)
- Reenable medial search by default - [#28064](https://github.com/owncloud/core/issues/28064)
- The LoginController now emits "failedLogin" hook signal after a failed login - [#28631](https://github.com/owncloud/core/issues/28631)
- All columns that use the fileid have been changed to bigint (64-bits) - [#28581](https://github.com/owncloud/core/issues/28581)
- Added search pattern for the occ app:list command - [#28653](https://github.com/owncloud/core/issues/28653)
- Allow phpredis develop branch - [#28717](https://github.com/owncloud/core/issues/28717)
- Default minimum desktop version in config.php is now 2.2.4 - [#28540](https://github.com/owncloud/core/issues/28540)
- Reallow negative mtimes by default in storage implementations - [#28697](https://github.com/owncloud/core/issues/28697)

### Deprecated
### Removed
- Removed "themes" folder - [#28617](https://github.com/owncloud/core/issues/28617) [#28999](https://github.com/owncloud/core/issues/28999)
- Removed unused Windows checks - [#28612](https://github.com/owncloud/core/issues/28612)
- Removed "appstoreenabled" from config.php - [#28714](https://github.com/owncloud/core/issues/28714)
- Slash in filename when renaming is not allowed any more in the frontend (unintended "feature") - [#28490](https://github.com/owncloud/core/issues/28490)
- Using old chunking protocol on new DAV endpoint is now disallowed - [#28637](https://github.com/owncloud/core/issues/28637)

### Fixed
#### Platform
- Fix issue with folder sizes on 32-bit systems - [#28654](https://github.com/owncloud/core/issues/28654)
- Fix null error in ActivityManager on some setups - [#28420](https://github.com/owncloud/core/issues/28420)
- Load app code before running app specific migrations - [#28391](https://github.com/owncloud/core/issues/28391)
- Prevent certificate manager to access FS too early, fixes 8.2 to 10 migration issue - [#28668](https://github.com/owncloud/core/pull/28668)
- Clustering: Better support of read only config file and apps folder - [#28594](https://github.com/owncloud/core/issues/28594) [#28601](https://github.com/owncloud/core/issues/28601)
- Only use IndexIgnore in htaccess if mod_autoindex.c is enabled/loaded - [#28591](https://github.com/owncloud/core/issues/28591)
- Fix app enable of nonexistent app - [#28317](https://github.com/owncloud/core/issues/28317)
- Keep redirect information when logging in with wrong password - [#28511](https://github.com/owncloud/core/issues/28511)
- Use SwiftMailer antiflood plugin to reconnect after multiple emails sent - [#28180](https://github.com/owncloud/core/issues/28180)
- Theme is now properly loaded when displaying full page error messages - [#28622](https://github.com/owncloud/core/pull/28622)
- Adjusted warning for PHP 5.5 EOL - [#28765](https://github.com/owncloud/core/issues/28765)
- Don't enable market app on upgrade from OC < 10 if "appstoreenabled" was false in config.php - [#28757](https://github.com/owncloud/core/issues/28757)
- Use different CSS comment style for IE11 support - [#28752](https://github.com/owncloud/core/issues/28752)
- Adjust default slogan - [#28724](https://github.com/owncloud/core/issues/28724)
- Catch filecache inconsistencies instead of logging warnings - [#28710](https://github.com/owncloud/core/issues/28710)
- Check for null when traversing app passwords table rows - [#28894](https://github.com/owncloud/core/issues/28894)
- Improve market upgrade messages + new switch - [#28871](https://github.com/owncloud/core/issues/28871)
- Make occ upgrade verbose by default - [#28876](https://github.com/owncloud/core/issues/28876)
- Add more information to updatechecker config doc - [#28867](https://github.com/owncloud/core/issues/28867)

#### Database
- All columns that use the fileid have been changed to bigint (64-bits) - [#28581](https://github.com/owncloud/core/issues/28581)
- Fix length of account search term column which broke installs on some DB setups - [#28576](https://github.com/owncloud/core/issues/28576)
- Fix column lengths on migrations table to fix index - [#28254](https://github.com/owncloud/core/issues/28254)
- Fixed some repeated duplicate key errors relate to oc_preferences table - [#28486](https://github.com/owncloud/core/issues/28486)
- Add migration step to fix birthday calendars - [#28338](https://github.com/owncloud/core/issues/28338)
- Added cache for new card uri-id mapping to fix db cluster execution - [#28308](https://github.com/owncloud/core/issues/28308)

#### Performance
- Optimize upload - don't fetch info of nonexistent file - [#28704](https://github.com/owncloud/core/issues/28704)
- Optimize upload - don't check if file exists if already known - [#28704](https://github.com/owncloud/core/issues/28704)
- Optimize upload - do not fetch metadata for part file during checksumming - [#28633](https://github.com/owncloud/core/issues/28633)
- Optimize shares retrieval logic with complex scenarios - [#28524](https://github.com/owncloud/core/issues/28524)
- Optimize query logger - [#28220](https://github.com/owncloud/core/issues/28220)
- Remove initial scanning overhead to speed up federated shares with lots of entries - [#28604](https://github.com/owncloud/core/issues/28604)
- Improve contact search performance - [#28042](https://github.com/owncloud/core/issues/28042)
- Improved search performance for federated instance users - [#28209](https://github.com/owncloud/core/issues/28209)
- Add database index on "oc_share.share_with" column - [#28856](https://github.com/owncloud/core/issues/28856)

#### Filesystem / storage
- Don't trigger hooks for every new dav chunk, only for final file - [#28817](https://github.com/owncloud/core/issues/28817)
- Prevent creating file cache inconsistencies when moving a subtree in or out of a share - [#28219](https://github.com/owncloud/core/issues/28219)
- Add check for empty result in storage memcache - [#28548](https://github.com/owncloud/core/issues/28548)
- Fix error message when accessing of nonexistent file on external storage - [#28613](https://github.com/owncloud/core/issues/28613)
- Fixed OAuth frontend logic when connecting to external storage - [#28496](https://github.com/owncloud/core/issues/28496) [#28400](https://github.com/owncloud/core/issues/28400)
- Fix quota handling on new Webdav endpoint (affects desktop client 2.2+) - [#28261](https://github.com/owncloud/core/issues/28261)
- Fix mounting Webdav as drive in Windows 10 - [#28243](https://github.com/owncloud/core/issues/28243)
- Fix rare error that happens when mounting invalid shares - [#28342](https://github.com/owncloud/core/issues/28342)
- Handle BSD case for 32 bit filemtime and install warning - [#28790](https://github.com/owncloud/core/issues/28790)
- Properly check target rename path in new dav endpoint - [#28737](https://github.com/owncloud/core/issues/28737)
- Increment required only when encryption is enabled - [#28880](https://github.com/owncloud/core/issues/28880)

#### Files app
- Make sure passed upload mtime is always an int - [#28186](https://github.com/owncloud/core/issues/28186)
- Fix directory mime type in trashbin list - [#28803](https://github.com/owncloud/core/issues/28803)
- Properly highlight files when opening private link - [#28681](https://github.com/owncloud/core/issues/28681)
- Fix overlapping selectively in default fileslist - [#28906](https://github.com/owncloud/core/issues/28906)
- Better timeout detection in web UI uploads + chunked uploads - [#28896](https://github.com/owncloud/core/issues/28896)
- Fix getting drop target when dragging from file manager  - [#28882](https://github.com/owncloud/core/issues/28882)
- Improve file upload progress bar - [#28861](https://github.com/owncloud/core/issues/28861)

#### Sharing
- Creating link shares now doesn't forget "Allow editing" permission any more - [#28065](https://github.com/owncloud/core/issues/28065)
- Fix "notify user" checkbox in share panel - [#28237](https://github.com/owncloud/core/issues/28237)
- Proper message shown when accessing unreachable private links - [#28600](https://github.com/owncloud/core/issues/28600)
- Fix exact search term match for LDAP in share autocomplete - [#28851](https://github.com/owncloud/core/issues/28851)
- Add tooltip to public shares panel - [#28781](https://github.com/owncloud/core/issues/28781)
- Validate share link password even if unchanged when updating share - [#28713](https://github.com/owncloud/core/issues/28713)
- Fix DiscoveryManager error during upgrade by untangling federated share app dependencies - [#28858](https://github.com/owncloud/core/pull/28858)

#### User management
- Don't set email if invalid in user:add command - [#28577](https://github.com/owncloud/core/issues/28577)
- Group admins can now properly edit members' email addresses - [#28366](https://github.com/owncloud/core/issues/28366)
- Fixed "settings_ajax_changegroupname" typo in route name - [#28746](https://github.com/owncloud/core/issues/28746)
- Use IProvidesEMailBackend to fix syncing with LDAP backend - [#28736](https://github.com/owncloud/core/issues/28736)

#### API related
- Make Backbone PROPPATCH work with options.wait mode - [#28791](https://github.com/owncloud/core/issues/28791) [#28837](https://github.com/owncloud/core/issues/28837)
- Detect PROPPATCH failure by parsing multistatus in Backbone Webdav adapter - [#28628](https://github.com/owncloud/core/issues/28628)
- Error messages from the server on upload are now displayed in the web UI instead of generic messages - [#28635](https://github.com/owncloud/core/issues/28635)
- Properly set the status text in OCS API v2 calls - [#28595](https://github.com/owncloud/core/issues/28595)
- Data was not properly set in case of OCS Result object - [#28198](https://github.com/owncloud/core/issues/28198)

#### Other
- Only reload file list when switching navigation sections - [#28843](https://github.com/owncloud/core/issues/28843)
- Make new text file tooltip messages update properly - [#28151](https://github.com/owncloud/core/issues/28151)
- Fix trashbin preview icons - [#28158](https://github.com/owncloud/core/issues/28158)
- Allow user "0" as in comments - [#28422](https://github.com/owncloud/core/issues/28422)
- Better description for occ files:scan command - [#28839](https://github.com/owncloud/core/issues/28839)
- Better description for occ files:cleanup command - [#28841](https://github.com/owncloud/core/issues/28841)
- Reworded upgrade message for admin with big instance - [#28828](https://github.com/owncloud/core/issues/28828)
- Make lost password errors distinguishable - [#28756](https://github.com/owncloud/core/issues/28756)
- Add height to menutoggler - [#28723](https://github.com/owncloud/core/issues/28723)
- Remove apostrophe from full page file read error text - [#28702](https://github.com/owncloud/core/issues/28702)
- Added missing "fatal" log level to occ log:manage level command - [#28683](https://github.com/owncloud/core/issues/28683)

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

[10.3.1]: https://github.com/owncloud/core/compare/v10.3.0...v10.3.1
[10.3.0]: https://github.com/owncloud/core/compare/v10.2.1...v10.3.0
[10.2.1]: https://github.com/owncloud/core/compare/v10.2.0...v10.2.1
[10.2.0]: https://github.com/owncloud/core/compare/v10.1.1...v10.2.0
[10.1.1]: https://github.com/owncloud/core/compare/v10.1.0...v10.1.1
[10.1.0]: https://github.com/owncloud/core/compare/v10.0.10...v10.1.0
[10.0.10]: https://github.com/owncloud/core/compare/v10.0.9...v10.0.10
[10.0.9]: https://github.com/owncloud/core/compare/v10.0.8...v10.0.9
[10.0.8]: https://github.com/owncloud/core/compare/v10.0.7...v10.0.8
[10.0.7]: https://github.com/owncloud/core/compare/v10.0.6...v10.0.7
[10.0.6]: https://github.com/owncloud/core/compare/v10.0.5...v10.0.6
[10.0.5]: https://github.com/owncloud/core/compare/v10.0.4...v10.0.5
[10.0.4]: https://github.com/owncloud/core/compare/v10.0.3...v10.0.4
[10.0.3]: https://github.com/owncloud/core/compare/v10.0.2...v10.0.3
[10.0.2]: https://github.com/owncloud/core/compare/v10.0.1...v10.0.2
[10.0.1]: https://github.com/owncloud/core/compare/v10.0.0...v10.0.1
