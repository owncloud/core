#!/usr/bin/env node

// To invoke this from the commandline you need the following to env vars to exist:
//
// S3_BUCKET_NAME
// TRAVIS_BRANCH
// TRAVIS_TAG
// TRAVIS_COMMIT
// S3_SECRET_ACCESS_KEY
// S3_ACCESS_KEY_ID
//
// Once you have those you execute with the following:
//
// ```sh
// ./bin/publish_to_s3.js
// ```
var S3Publisher = require('ember-publisher');
var configPath = require('path').join(__dirname, '../config/s3ProjectConfig.js');
publisher = new S3Publisher({ projectConfigPath: configPath });

// Always use wildcard section of project config.
// This is useful when the including library does not
// require channels (like in ember.js / ember-data).
publisher.currentBranch = function() {
  return (process.env.TRAVIS_BRANCH === 'master') ? 'wildcard' : 'no-op';
};
publisher.publish();

