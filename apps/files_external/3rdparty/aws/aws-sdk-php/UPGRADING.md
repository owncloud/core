Upgrading Guide
===============

Upgrade from 2.6 to 2.7
-----------------------

Version 2.7 is backward-compatible with version 2.6. The version bump was
necessary in order to mark some things in the DynamoDb namespace as deprecated.
See the [CHANGELOG entry for 2.7.0](https://github.com/aws/aws-sdk-php/blob/v3/CHANGELOG.md#270-2014-10-08)
for more details.

Upgrade from 2.5 to 2.6
-----------------------

**IMPORTANT:** Version 2.6 *is* backward-compatible with version 2.5, *unless* you are using the Amazon CloudSearch
client. If you are using CloudSearch, please read the next section carefully.

### Amazon CloudSearch

Version 2.6 of the AWS SDK for PHP has been updated to use the 2013-01-01 API version of Amazon CloudSearch by default.

The 2013-01-01 API marks a significant upgrade of Amazon CloudSearch, but includes numerous breaking changes to the API.
CloudSearch now supports 33 languages, highlighting, autocomplete suggestions, geospatial search, AWS IAM integration to
control access to domain configuration actions, and user configurable scaling and availability options. These new
features are reflected in the changes to the method and parameters of the CloudSearch client.

For details about the new API and how to update your usage of CloudSearch, please consult the [Configuration API
Reference for Amazon CloudSearch](http://docs.aws.amazon.com/cloudsearch/latest/developerguide/configuration-api.html)
and the guide for [Migrating to the Amazon CloudSearch 2013-01-01 API](http://docs.aws.amazon.com/cloudsearch/latest/developerguide/migrating.html).

If you would like to continue using the older 2011-02-01 API, you can configure this when you instantiate the
`CloudSearchClient`:

```php
use Aws\CloudSearch\CloudSearchClient;

$client = CloudSearchClient::factory(array(
    'key'     => '<aws access key>',
    'secret'  => '<aws secret key>',
    'region'  => '<region name>',
    'version' => '2011-02-01',
));
```

Upgrade from 2.4 to 2.5
-----------------------

### Amazon EC2

A small, backwards-incompatible change has been made to the Amazon EC2 API. The `LaunchConfiguration.MonitoringEnabled`
parameter of the `RequestSpotInstances` operation has been change to `LaunchConfiguration.Monitoring.Enabled` See [this
commit](https://github.com/aws/aws-sdk-php/commit/36ae0f68d2a6dcc3bc28222f60ecb318449c4092#diff-bad2f6eac12565bb684f2015364c22bd)
for the exact change. You are only affected by this change if you are using this specific parameter. To fix your code to
work with the updated parameter, you will need to change the structure of your request slightly.

```php
// The OLD way
$result = $ec2->requestSpotInstances(array(
    // ...
    'LaunchSpecification' => array(
        // ...
        'MonitoringEnabled' => true,
        // ...
    ),
    // ...
));

// The NEW way
$result = $ec2->requestSpotInstances(array(
    // ...
    'LaunchSpecification' => array(
        // ...
        'Monitoring' => array(
            'Enabled' => true,
        ),
        // ...
    ),
    // ...
));
```

### AWS CloudTrail

AWS CloudTrail has made changes to their API. If you are not using the CloudTrail service, then you will not be
affected by this change.

Here is an excerpt (with minor modifications) directly from the [CloudTrail team's
announcement](https://forums.aws.amazon.com/ann.jspa?annID=2286) regarding this change:

> [...] We have made some minor improvements/fixes to the service API, based on early feedback. The impact of these
> changes to you depends on how you are currently interacting with the CloudTrail service. [...] If you have code that
> calls the APIs below, you will need to make minor changes.
>
> There are two changes:
>
> 1) `CreateTrail` / `UpdateTrail`: These APIs originally took a single parameter, a `Trail` object. [...] We have
> changed this so that you can now simply pass individual parameters directly to these APIs. The same applies to the
> responses of these APIs, namely the APIs return individual fields directly [...]
> 2) `GetTrailStatus`: The actual values of the fields returned and their data types were not all as intended. As such,
> we are deprecating a set of fields, and adding a new set of replacement fields. The following fields are now
> deprecated, and should no longer be used:
>
> * `LatestDeliveryAttemptTime` (String): Time CloudTrail most recently attempted to deliver a file to S3 configured
>   bucket.
> * `LatestNotificationAttemptTime` (String): As above, but for publishing a notification to configured SNS topic.
> * `LatestDeliveryAttemptSucceeded` (String): This one had a mismatch between implementation and documentation. As
>   documented: whether or not the latest file delivery was successful. As implemented: Time of most recent successful
>   file delivery.
> * `LatestNotificationAttemptSucceeded` (String): As above, but for SNS notifications.
> * `TimeLoggingStarted` (String): Time `StartLogging` was most recently called. [...]
> * `TimeLoggingStarted` (String): Time `StopLogging` was most recently called.
>
> The following fields are new, and replace the fields above:
>
> * `LatestDeliveryTime` (Date): Date/Time that CloudTrail most recently delivered a log file.
> * `LatestNotificationTime` (Date): As above, for SNS notifications.
> * `StartLoggingTime` (Date): Same as `TimeLoggingStarted`, but with more consistent naming, and correct data type.
> * `StopLoggingTime` (Date): Same as `TimeLoggingStopped`, but with more consistent naming, and correct data type.
>
> Note that `LatestDeliveryAttemptSucceeded` and `LatestNotificationAttemptSucceeded` have no direct replacement. To
> query whether everything is configured correctly for log file delivery, it is sufficient to query LatestDeliveryError,
> and if non-empty that means that there is a configuration problem preventing CloudTrail from being able to deliver
> logs successfully. Basically either the bucket doesn’t exist, or CloudTrail doesn’t have sufficient permissions to
> write to the configured path in the bucket. Likewise for `LatestNotificationAttemptSucceeded`.
>
> The deprecated fields will be removed in the future, no earlier than February 15. Both set of fields will coexist on
> the service during this period to give those who are using the deprecated fields time to switch over to the use the
> new fields. However new SDKs and CLIs will remove the deprecated fields sooner than that. Previous SDK and CLI
> versions will continue to work until the deprecated fields are removed from the service.
>
> We apologize for any inconvenience, and appreciate your understanding as we make these adjustments to improve the
> long-term usability of the CloudTrail APIs.

We are marking this as a breaking change now, preemptive of the February 15th cutoff, and we encourage everyone to
update their code now. The changes to how you use `createTrail()` and `updateTrail()` are easy changes:

```php
// The OLD way
$cloudTrail->createTrail(array(
    'trail' => array(
        'Name'         => 'TRAIL_NAME',
        'S3BucketName' => 'BUCKET_NAME',
    )
));

// The NEW way
$cloudTrail->createTrail(array(
    'Name'         => 'TRAIL_NAME',
    'S3BucketName' => 'BUCKET_NAME',
));
```

### China (Beijing) Region / Signatures

This release adds support for the new China (Beijing) Region. This region requires that Signature V4 be used for both
Amazon S3 and Amazon EC2 requests. We've added support for Signature V4 in both of these services for clients
configured for this region. While doing this work, we did some refactoring to the signature classes and also removed
support for Signature V3, as it is no longer needed. Unless you are explicitly referencing Signature V3 or explicitly
interacting with signature objects, these changes should not affect you.

Upgrade from 2.3 to 2.4
-----------------------

### Amazon CloudFront Client

The new 2013-05-12 API version of Amazon CloudFront includes support for custom SSL certificates via the
`ViewerCertificate` parameter, but also introduces breaking changes to the API. Version 2.4 of the SDK now ships with
two versions of the Amazon CloudFront service description, one for the new 2013-05-12 API and one for the next most
recent 2012-05-05 API. The SDK defaults to using the newest API version, so CloudFront users may experience a breaking
change to their projects when upgrading. This can be easily circumvented by switching back to the 2012-05-05 API by
using the `version` option when instantiating the CloudFront client.

### Guzzle 3.7

Version 2.4 of the AWS SDK for PHP requires at least version 3.7 of Guzzle.

Upgrade from 2.2 to 2.3
-----------------------

### Amazon DynamoDB Client

The newly released 2012-08-10 API version of the Amazon DynamoDB service includes the new Local Secondary Indexes
feature, but also introduces breaking changes to the API. The most notable change is in the way that you specify keys
when creating tables and retrieving items. Version 2.3 of the SDK now ships with 2 versions of the DynamoDB service
description, one for the new 2012-08-10 API and one for the next most recent 2011-12-05 API. The SDK defaults to using
the newest API version, so DynamoDB users may experience a breaking change to their projects when upgrading. This can be
easily fixed by switching back to the 2011-12-05 API by using the new `version` configuration setting when instantiating
the DynamoDB client.

```php
use Aws\DynamoDb\DynamoDbClient;

$client = DynamoDbClient::factory(array(
    'key'     => '<aws access key>',
    'secret'  => '<aws secret key>',
    'region'  => '<region name>',
    'version' => '2011-12-05'
));
```

If you are using a config file with `Aws\Common\Aws`, then you can modify your file like the following.

```json
{
    "includes": ["_aws"],
    "services": {
        "default_settings": {
            "params": {
                "key": "<aws access key>",
                "secret": "<aws secret key>",
                "region": "<region name>"
            }
        },
        "dynamodb": {
            "extends": "dynamodb",
            "params": {
                "version": "2011-12-05"
            }
        }
    }
}
```

The [SDK user guide](http://docs.aws.amazon.com/aws-sdk-php/guide/latest/index.html) has a guide and examples for both
versions of the API.

### Guzzle 3.4.1

Version 2.3 of the AWS SDK for PHP requires at least version 3.4.1 of Guzzle.

Upgrade from 2.1 to 2.2
-----------------------

### Full Service Coverage

The AWS SDK for PHP now supports the full set of AWS services.

### Guzzle 3.3

Version 2.2 of the AWS SDK for PHP requires at least version 3.3 of Guzzle.

Upgrade from 2.0 to 2.1
-----------------------

### General

Service descriptions are now versioned under the Resources/ directory of each client.

### Waiters

Waiters now require an associative array as input for the underlying operation performed by a waiter. The configuration
system for waiters under 2.0.x utilized strings to determine the parameters used to create an operation. For example,
when waiting for an object to exist with Amazon S3, you would pass a string containing the bucket name concatenated
with the object name using a '/' separator (e.g. 'foo/baz'). In the 2.1 release, these parameters are now more
explicitly tied to the underlying operation utilized by a waiter. For example, to use the ObjectExists waiter of
Amazon S3 pass an associative array of `array('Bucket' => 'foo', 'Key' => 'baz')`. These options match the option names
and rules associated with the HeadObject operation performed by the waiter. The API documentation of each client
describes the waiters associated with the client and what underlying operation is responsible for waiting on the
resource. Waiter specific options like the maximum number of attempts (max_attempts) or interval to wait between
retries (interval) can be specified in this same configuration array by prefixing the keys with `waiter.`.

Waiters can also be invoked using magic methods on the client. These magic methods are listed in each client's docblock
using `@method` tags.

```php
$s3Client->waitUntilObjectExists(array(
    'Bucket' => 'foo',
    'Key' => 'bar',
    'waiter.max_attempts' => 3
));
```
