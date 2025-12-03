updater
=======


## How does it work?
- creates backup directory under the ownCloud data directory.
- extracts update package content into the backup/packageVersion
- makes the copy of the current instance (except data dir) to backup/currentVersion-randomstring
- moves all folders except data, config and themes from the current instance to backup/tmp 
- moves all folders from backup/packageVersion to the current version


## Dev
```
git clone git@github.com:owncloud/updater.git
cd updater
make
```

[![Build Status](https://travis-ci.org/owncloud/updater.svg?branch=master)](https://travis-ci.org/owncloud/updater)
