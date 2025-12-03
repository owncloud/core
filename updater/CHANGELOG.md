# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/en/1.0.0/).

## [1.1.1]

### Changed

- [#730](https://github.com/owncloud/updater/pull/730) - exit with success command line status 0 for not implemented methods
- Bump libraries

## [1.1.0]

### Changed

- [#711](https://github.com/owncloud/updater/pull/711) - Always return an int from Symfony Command execute method
- Bump libraries

## [1.0.1]

### Changed

- Bump psr/log from 1.1.1 to 1.1.2 - [#528](https://github.com/owncloud/updater/issues/528)
- Bump symfony/process from 3.4.32 to 3.4.33 - [#526](https://github.com/owncloud/updater/issues/526)
- Bump symfony/console from 3.4.32 to 3.4.33 - [#527](https://github.com/owncloud/updater/issues/527)
- Bump guzzlehttp/guzzle from 5.3.3 to 5.3.4 - [#524](https://github.com/owncloud/updater/issues/524)
- Bump psr/log from 1.1.0 to 1.1.1 - [#523](https://github.com/owncloud/updater/issues/523)
- Collect known locations from old and new signature.json as well - [#522](https://github.com/owncloud/updater/issues/522)
- Update dependencies - [#521](https://github.com/owncloud/updater/issues/521)

## [1.0.0]

### Changed

- Decoupled release from core

### Fixed

- Clarification that the updater.secret to be entered must be unhashed

### Removed

- Removed support for PHP 5.6


[Unreleased]: https://github.com/owncloud/updater/compare/v1.1.1...master
[1.1.1]: https://github.com/owncloud/updater/compare/v1.1.0...v1.1.1
[1.1.0]: https://github.com/owncloud/updater/compare/v1.0.1...v1.1.0
[1.0.1]: https://github.com/owncloud/updater/compare/v1.0.0...v1.0.1
[1.0.0]: https://github.com/owncloud/updater/compare/v10.1.1...v1.0.0
