# ownCloud Core

[![Build Status](https://drone.owncloud.com/api/badges/owncloud/core/status.svg?branch=master)](https://drone.owncloud.com/owncloud/core)
[![Quality Gate Status](https://sonarcloud.io/api/project_badges/measure?project=owncloud_core&metric=alert_status)](https://sonarcloud.io/dashboard?id=owncloud_core)
[![Security Rating](https://sonarcloud.io/api/project_badges/measure?project=owncloud_core&metric=security_rating)](https://sonarcloud.io/dashboard?id=owncloud_core)
[![Coverage](https://sonarcloud.io/api/project_badges/measure?project=owncloud_core&metric=coverage)](https://sonarcloud.io/dashboard?id=owncloud_core)
[![Design](https://contribute.design/api/shield/owncloud/core)](https://contribute.design/owncloud/core)

**[ownCloud](http://ownCloud.com) offers file sharing and collaboration trusted by 200+ million users worldwide regardless of device or location.**

![](https://github.com/owncloud/screenshots/blob/master/files/sidebar_1.png)

## Why Is This so Awesome?
* :file_folder: **Access your Data** You can store your files, contacts, calendars and more on a server of your choosing.
* :package: **Sync your Data** You keep your files, contacts, calendars and more synchronized amongst your devices.
* :arrows_counterclockwise: **Share your Data** You share your data with others, and give them access to your latest photo galleries, your calendar or anything else you want them to see.
* :rocket: **Expandable with dozens of Apps** ...like Calendar, Contacts, Mail or News.
* :cloud: **All Benefits of the Cloud** ...on your own Server.
* :lock: **Encryption** You can encrypt data in transit with secure https connections. You can enable the encryption app to encrypt data on storage for improved security and privacy.
* ...

## Installation Instructions
For installing ownCloud, see the official
[ownCloud 10](https://doc.owncloud.com/server/latest/admin_manual/installation/) installation manual.

## Development Build Prerequisites
Note that when doing a local development build, you need to have **Composer v2** installed. If your OS provides a lower version than v2, you can install Composer v2 manually. As an example, which may be valid for other releases/distros too, see [How to install Composer on Ubuntu 22.04 | 20.04 LTS](https://www.how2shout.com/linux/how-to-install-composer-on-ubuntu-22-04-20-04-lts/).

You also must have installed `yarn` and `node` (v14 or higher).

## Contribution Guidelines
https://owncloud.com/contribute/

## Commit Messages
To ease bringing commits into context, a CI job check that the commit message satisfies a specification for adding human and machine readable meaning to commit messages. For details see: [Conventional Commits](www.conventionalcommits.org/). Note that if conventional commits are not satisfied, CI will not be green. In this case, you need to rewrite the git commit history to meet the requirement.

You must at least provide a `type` + `description` as described in the [Examples](https://www.conventionalcommits.org/en/v1.0.0/#examples) section.

For a quickstart, the following types can be used:

`fix:`, `feat:`, `build:`, `chore:`, `ci:`, `docs:`, `style:`, `refactor:`, `perf:`, `test:`


## Support
Learn about the different ways you can get support for ownCloud: https://owncloud.com/support/

## Get in Touch
* :clipboard: [Forum](https://central.owncloud.org)
* :hash: [IRC channel](https://web.libera.chat/?channels=#owncloud)
* :busts_in_silhouette: [Facebook](https://facebook.com/ownclouders)
* :hatching_chick: [Twitter](https://twitter.com/ownCloud)

## Important Notice on Translations
Please submit translations via Transifex:
https://explore.transifex.com/owncloud-org/

See the detailed information about [translations](https://doc.owncloud.com/server/latest/developer_manual/core/translation.html) here.
