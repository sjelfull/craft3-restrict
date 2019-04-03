# Restrict Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/) and this project adheres to [Semantic Versioning](http://semver.org/).

## 2.0.3 - 2019-04-03
### Changed
- When a malformed address value is present in the whitelist an ErrorException is now thrown rather than a general exception
- The default exception thrown when access is forbidden now throws a HttpException with the error code of 403

## 2.0.2 - 2019-03-12
### Added
- Support for CIDR notation in IP address whitelist
- Check for malformed IP address values in whitelist

## 2.0.1 - 2018-08-01
### Fixed
- Fixed bug that caused the frontend to be restricted

## 2.0.0 - 2017-11-01
### Added
- Initial release
