Bugfix: Remove errors logged when files are modified in SFTP external storage

This simple change avoids a large number of errors being logged every time a user uploads, modifies or deletes a file in the SFTP external storage.

https://github.com/owncloud/core/issues/41159
https://github.com/owncloud/core/pull/41240
