<?php

/**
 * This configuration will be read and overlaid on top of the
 * default configuration. Command line arguments will be applied
 * after this file is read.
 */

return [

	// Supported values: '7.0', '7.1', '7.2', null.
	// If this is set to null,
	// then Phan assumes the PHP version which is closest to the minor version
	// of the php executable used to execute phan.
	'target_php_version' => null,

	// A list of directories that should be parsed for class and
	// method information. After excluding the directories
	// defined in exclude_analysis_directory_list, the remaining
	// files will be statically analyzed for errors.
	//
	// Thus, both first-party and third-party code being used by
	// your application should be included in this list.
	'directory_list' => [
		'.phan/stubs',
		'apps/comments',
		'apps/dav',
		'apps/federatedfilesharing',
		'apps/federation',
		'apps/files',
		'apps/files_external',
		'apps/files_sharing',
		'apps/files_trashbin',
		'apps/files_versions',
		'apps/provisioning_api',
		'apps/systemtags',
		'apps/updatenotification',
		'core',
		'lib',
		'ocs',
		'ocs-provider',
		'settings'
	],

	// A directory list that defines files that will be excluded
	// from static analysis, but whose class and method
	// information should be included.
	//
	// Generally, you'll want to include the directories for
	// third-party code (such as "vendor/") in this list.
	//
	// n.b.: If you'd like to parse but not analyze 3rd
	//       party code, directories containing that code
	//       should be added to both the `directory_list`
	//       and `exclude_analysis_directory_list` arrays.
	'exclude_analysis_directory_list' => [
		'lib/composer',
		'apps/files_external/3rdparty',
		'tests'
	],

	// A regular expression to match files to be excluded
	// from parsing and analysis and will not be read at all.
	//
	// This is useful for excluding groups of test or example
	// directories/files, unanalyzable files, or files that
	// can't be removed for whatever reason.
	// (e.g. '@Test\.php$@', or '@vendor/.*/(tests|Tests)/@')
	'exclude_file_regex' => '@.*/[^/]*(tests|Tests|templates)/@',

	// If true, missing properties will be created when
	// they are first seen. If false, we'll report an
	// error message.
	"allow_missing_properties" => true,

	// If enabled, allow null to be cast as any array-like type.
	// This is an incremental step in migrating away from null_casts_as_any_type.
	// If null_casts_as_any_type is true, this has no effect.
	"null_casts_as_any_type" => true,

	// Backwards Compatibility Checking. This is slow
	// and expensive, but you should consider running
	// it before upgrading your version of PHP to a
	// new version that has backward compatibility
	// breaks.
	'backward_compatibility_checks' => false,

	// The initial scan of the function's code block has no
	// type information for `$arg`. It isn't until we see
	// the call and rescan test()'s code block that we can
	// detect that it is actually returning the passed in
	// `string` instead of an `int` as declared.
	'quick_mode' => true,

	// The minimum severity level to report on. This can be
	// set to Issue::SEVERITY_LOW, Issue::SEVERITY_NORMAL or
	// Issue::SEVERITY_CRITICAL. Setting it to only
	// critical issues is a good place to start on a big
	// sloppy mature code base.
	'minimum_severity' => 10,

	// A set of fully qualified class-names for which
	// a call to parent::__construct() is required
	'parent_constructor_required' => [
	],

];