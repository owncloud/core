# CHANGELOG

## 2.7.5 - 2014-11-13

* Added support for AWS Lambda.
* Added support for event notifications to the Amazon S3 client.
* Fixed an issue with S3 pre-signed URLs when using Signature V4.

## 2.7.4 - 2014-11-12

* Added support for the AWS Key Management Service.
* Added support for AWS CodeDeploy.
* Added support for AWS Config.
* Added support for AWS KMS encryption to the Amazon S3 client.
* Added support for AWS KMS encryption to the Amazon EC2 client.
* Added support for Amazon CloudWatch Logs delivery to the AWS CloudTrail
  client.
* Added the GetTemplateSummary operation to the AWS CloudFormation client.
* Fixed an issue with sending signature version 4 Amazon S3 requests that
  contained a 0 length body.

## 2.7.3 - 2014-11-06

* Added support for private DNS for Amazon Virtual Private Clouds, health check
  failure reasons, and reusable delegation sets to the Amazon Route 53 client.
* Updated the CloudFront model.
* Added support for configuring push synchronization to the Cognito Sync client.
* Updated docblocks in a few S3 and Glacier classes to improve IDE experience.

## 2.7.2 - 2014-10-23

* Updated AWS Identity and Access Management (IAM) to the latest version.
* Updated Amazon Cognito Identity client to the latest version.
* Added auto-renew support to the Amazon Route 53 Domains client.
* Updated Amazon EC2 to the latest version.

## 2.7.1 - 2014-10-16

* Updated the Amazon RDS client to the 2014-09-01 API version.
* Added support for advanced Japanese language processing to the Amazon
  CloudSearch client.

## 2.7.0 - 2014-10-08

* Added document model support to the Amazon DynamoDB client, including support
  for the new data types (`L`, `M`, `BOOL`, and `NULL`), nested attributes, and
  expressions.
* Deprecated the `Aws\DynamoDb\Model\Attribute`, `Aws\DynamoDb\Model\Item`,
  and `Aws\DynamoDb\Iterator\ItemIterator` classes, and the
  `Aws\DynamoDb\DynamoDbClient::formatValue` and
  `Aws\DynamoDb\DynamoDbClient::formatAttribute` methods, since they do not
  support the new types in the DynamoDB document model. These deprecated classes
  and methods still work reliably with `S`, `N`, `B`, `SS`, `NS`, and `BS`
  attributes.
* Updated the Amazon DynamoDB client to permanently disable client-side
  parameter validation. This needed to be done in order to support the new
  document model features.
* Updated the Amazon EC2 client to sign requests with Signature V4.
* Fixed an issue in the S3 service description to make the `VersionId`
  work in `S3Client::restoreObject`.

## 2.6.16 - 2014-09-11

* Added support for tagging to the Amazon Kinesis client.
* Added support for setting environment variables to the AWS OpsWorks client.
* Fixed issue #334 to allow the `before_upload` callback to work in the
  `S3Client::upload` method.
* Fixed an issue in the Signature V4 signer that was causing an issue with some
  CloudSearch Domain operations.

## 2.6.15 - 2014-08-14

* Added support for signing requests to the Amazon CloudSearch Domain client.
* Added support for creating anonymous clients.

## 2.6.14 - 2014-08-11

* Added support for tagging to the Elastic Load Balancing client.

## 2.6.13 - 2014-07-31

* Added support for configurable idle timeouts to the Elastic Load Balancing
  client.
* Added support for Lifecycle Hooks, Detach Instances, and Standby to the
  AutoScaling client.
* Added support for creating Amazon ElastiCache for Memcached clusters with
  nodes in multiple availability zones.
* Added minor fixes to the Amazon EC2 model for ImportVolume,
  DescribeNetworkInterfaceAttribute, and DeleteVpcPeeringConnection
* Added support for getGeoLocation and listGeoLocations to the
  Amazon Route 53 client.
* Added support for Amazon Route 53 Domains.
* Fixed an issue with deleting nested folders in the Amazon S3 stream wrapper.
* Fixed an issue with the Amazon S3 sync abstraction to ensure that S3->S3
  communication works correctly.
* Added stricter validation to the Amazon SNS MessageValidator.

## 2.6.12 - 2014-07-16

* Added support for adding attachments to support case communications to the
  AWS Support API client.
* Added support for credential reports and password rotation features to the
  AWS IAM client.
* Added the `ap-northeast-1`, `ap-southeast-1`, and `ap-southeast-2` regions to
  the Amazon Kinesis client.
* Added a `listFilter` stream context option that can be used when using
  `opendir()` and the Amazon S3 stream wrapper. This option is used to filter
  out specific objects from the files yielded from the stream wrapper.
* Fixed #322 so that the download sync builder ignores objects that have a
  `GLACIER` storage class.
* Fixed an issue with the S3 SSE-C logic so that HTTPS is only required when
  the SSE-C parameters are provided.
* Updated the Travis configuration to include running HHVM tests.

## 2.6.11 - 2014-07-09

* Added support for **Amazon Cognito Identity**.
* Added support for **Amazon Cognito Sync**.
* Added support for **Amazon CloudWatch Logs**.
* Added support for editing existing health checks and associating health checks
  with tags to the Amazon Route 53 client.
* Added the ModifySubnetAttribute operation to the Amazon EC2 client.

## 2.6.10 - 2014-07-02

* Added the `ap-northeast-1`, `ap-southeast-1`, and `sa-east-1` regions to the
  Amazon CloudTrail client.
* Added the `eu-west-1` and `us-west-2` regions to the Amazon Kinesis client.
* Fixed an issue with the SignatureV4 implementation when used with Amazon S3.
* Fixed an issue with a test that was causing failures when run on EC2 instances
  that have associated Instance Metadata credentials.

## 2.6.9 - 2014-06-26

* Added support for the CloudSearchDomain client, which allows you to search and
  upload documents to your CloudSearch domains.
* Added support for delivery notifications to the Amazon SES client.
* Updated the CloudFront client to support the 2014-05-31 API.
* Merged PR #316 as a better solution for issue #309.

## 2.6.8 - 2014-06-20

* Added support for closed captions to the Elastic Transcoder client.
* Added support for IAM roles to the Elastic MapReduce client.
* Updated the S3 PostObject to ease customization.
* Fixed an issue in some EC2 waiters by merging PR #306.
* Fixed an issue with the DynamoDB `WriteRequestBatch` by merging PR #310.
* Fixed issue #309, where the `url_stat()` logic in the S3 Stream Wrapper was
  affected by a change in PHP 5.5.13.

## 2.6.7 - 2014-06-12

* Added support for Amazon S3 server-side encryption using customer-provided
  encryption keys.
* Updated Amazon SNS to support message attributes.
* Updated the Amazon Redshift model to support new cluster parameters.
* Updated PHPUnit dev dependency to 4.* to work around a PHP serializing bug.

## 2.6.6 - 2014-05-29

* Added support for the [Desired Partition Count scaling
  option](http://aws.amazon.com/releasenotes/2440176739861815) to the
  CloudSearch client. Hebrew is also now a supported language.
* Updated the STS service description to the latest version.
* [Docs] Updated some of the documentation about credential profiles.
* Fixed an issue with the regular expression in the `S3Client::isValidBucketName`
  method. See #298.

## 2.6.5 - 2014-05-22

* Added cross-region support for the Amazon EC2 CopySnapshot operation.
* Added AWS Relational Database (RDS) support to the AWS OpsWorks client.
* Added support for tagging environments to the AWS Elastic Beanstalk client.
* Refactored the signature version 4 implementation to be able to pre-sign
  most operations.

## 2.6.4 - 2014-05-20

* Added support for lifecycles on versioning enabled buckets to the Amazon S3
  client.
* Fixed an Amazon S3 sync issue which resulted in unnecessary transfers when no
  `$keyPrefix` argument was utilized.
* Corrected the `CopySourceIfMatch` and `CopySourceIfNoneMatch` parameter for
  Amazon S3 to not use a timestamp shape.
* Corrected the sending of Amazon S3 PutBucketVersioning requests that utilize
  the `MFADelete` parameter.

## 2.6.3 - 2014-05-14

* Added the ability to modify Amazon SNS topic settings to the UpdateStack
  operation of the AWS CloudFormation client.
* Added support for the us-west-1, ap-southeast-2, and eu-west-1 regions to the
  AWS CloudTrail client.
* Removed no longer utilized AWS CloudTrail shapes from the model.

## 2.6.2 - 2014-05-06

* Added support for Amazon SQS message attributes.
* Fixed Amazon S3 multi-part uploads so that manually set ContentType values are not overwritten.
* No longer recalculating file sizes when an Amazon S3 socket timeout occurs because this was causing issues with
  multi-part uploads and it is very unlikely ever the culprit of a socket timeout.
* Added better environment variable detection.

## 2.6.1 - 2014-04-25

* Added support for the `~/.aws/credentials` INI file and credential profiles (via the `profile` option) as a safer
  alternative to using explicit credentials with the `key` and `secret` options.
* Added support for query filters and improved conditional expressions to the Amazon DynamoDB client.
* Added support for the `ChefConfiguration` parameter to a few operations on the AWS OpsWorks Client.
* Added support for Redis cache cluster snapshots to the Amazon ElastiCache client.
* Added support for the `PlacementTenancy` parameter to the `CreateLaunchConfiguration` operation of the Auto Scaling
  client.
* Added support for the new R3 instance types to the Amazon EC2 client.
* Added the `SpotInstanceRequestFulfilled` waiter to the Amazon EC2 client (see #241).
* Improved the S3 Stream Wrapper by adding support for deleting pseudo directories (#264), updating error handling
  (#276), and fixing `is_link()` for non-existent keys (#268).
* Fixed #252 and updated the DynamoDB `WriteRequestBatch` abstraction to handle batches that were completely rejected
  due to exceeding provisioned throughput.
* Updated the SDK to support Guzzle 3.9.x

## 2.6.0 - 2014-03-25

* [BC] Updated the Amazon CloudSearch client to use the new 2013-01-01 API version (see [their release
  notes](http://aws.amazon.com/releasenotes/6125075708216342)). This API version of CloudSearch is significantly
  different than the previous one, and is not backwards compatible. See the
  [Upgrading Guide](https://github.com/aws/aws-sdk-php/blob/master/UPGRADING.md) for more details.
* Added support for the VPC peering features to the Amazon EC2 client.
* Updated the Amazon EC2 client to use the new 2014-02-01 API version.
* Added support for [resize progress data and the Cluster Revision Number
  parameter](http://aws.amazon.com/releasenotes/0485739709714318) to the Amazon Redshift client.
* Added the `ap-northeast-1`, `ap-southeast-2`, and `sa-east-1` regions to the Amazon CloudSearch client.

## 2.5.4 - 2014-03-20

* Added support for [access logs](http://docs.aws.amazon.com/ElasticLoadBalancing/latest/DeveloperGuide/access-log-collection.html)
  to the Elastic Load Balancing client.
* Updated the Elastic Load Balancing client to the latest API version.
* Added support for the `AWS_SECRET_ACCESS_KEY` environment variables.
* Updated the Amazon CloudFront client to use the 2014-01-31 API version. See [their release
  notes](http://aws.amazon.com/releasenotes/1900016175520505).
* Updates the AWS OpsWorks client to the latest API version.
* Amazon S3 Stream Wrapper now works correctly with pseudo folder keys created by the AWS Management Console.
* Amazon S3 Stream Wrapper now implements `mkdir()` for nested folders similar to the AWS Management Console.
* Addressed an issue with Amazon S3 presigned-URLs where X-Amz-* headers were not being added to the query string.
* Addressed an issue with the Amazon S3 directory sync where paths that contained dot-segments were not properly.
  resolved. Removing the dot segments consistently helps to ensure that files are uploaded to their intended.
  destinations and that file key comparisons are accurately performed when determining which files to upload.

## 2.5.3 - 2014-02-27

* Added support for HTTP and HTTPS string-match health checks and HTTPS health checks to the Amazon Route 53 client
* Added support for the UPSERT action for the Amazon Route 53 ChangeResourceRecordSets operation
* Added support for SerialNumber and TokenCode to the AssumeRole operation of the IAM Security Token Service (STS).
* Added support for RequestInterval and FailureThreshold to the Amazon Route53 client.
* Added support for smooth streaming to the Amazon CloudFront client.
* Added the us-west-2, eu-west-1, ap-southeast-2, and ap-northeast-1 regions to the AWS Data Pipeline client.
* Added iterators to the Amazon Kinesis client
* Updated iterator configurations for all services to match our new iterator config spec (care was taken to continue
  supporting manually-specified configurations in the old format to prevent BC)
* Updated the Amazon EC2 model to include the latest updates and documentation. Removed deprecated license-related
  operations (this is not considered a BC since we have confirmed that these operations are not used by customers)
* Updated the Amazon Route 53 client to use the 2013-04-01 API version
* Fixed several iterator configurations for various services to better support existing operations and parameters
* Fixed an issue with the Amazon S3 client where an exception was thrown when trying to add a default Content-MD5
  header to a request that uses a non-rewindable stream.
* Updated the Amazon S3 PostObject class to work with CNAME style buckets.

## 2.5.2 - 2014-01-29

* Added support for dead letter queues to Amazon SQS
* Added support for the new M3 medium and large instance types to the Amazon EC2 client
* Added support for using the `eu-west-1` and `us-west-2` regions to the Amazon SES client
* Adding content-type guessing to the Amazon S3 stream wrapper (see #210)
* Added an event to the Amazon S3 multipart upload helpers to allow granular customization of multipart uploads during
  a sync (see #209)
* Updated Signature V4 logic for Amazon S3 to throw an exception if you attempt to create a presigned URL that expires
  later than a week (see #215)
* Fixed the `downloadBucket` and `uploadDirectory` methods to support relative paths and better support
  Windows (see #207)
* Fixed issue #195 in the Amazon S3 multipart upload helpers to properly support additional parameters (see #211)
* [Docs] Expanded examples in the [API reference](http://docs.aws.amazon.com/aws-sdk-php/latest/index.html) by default
  so they don't get overlooked
* [Docs] Moved the API reference links in the [service-specific user guide
  pages](http://docs.aws.amazon.com/aws-sdk-php/guide/latest/index.html#service-specific-guides) to the bottom so
  the page's content takes priority

## 2.5.1 - 2014-01-09

* Added support for attaching existing Amazon EC2 instances to an Auto Scaling group to the Auto Scaling client
* Added support for creating launch configurations from existing Amazon EC2 instances to the Auto Scaling client
* Added support for describing Auto Scaling account limits to the Auto Scaling client
* Added better support for block device mappings to the Amazon AutoScaling client when creating launch configurations
* Added support for [ranged inventory retrieval](http://docs.aws.amazon.com/amazonglacier/latest/dev/api-initiate-job-post.html#api-initiate-job-post-vault-inventory-list-filtering)
  to the Amazon Glacier client
* [Docs] Updated and added a lot of content in the [User Guide](http://docs.aws.amazon.com/aws-sdk-php/guide/latest/index.html)
* Fixed a bug where the `KinesisClient::getShardIterator()` method was not working properly
* Fixed an issue with Amazon SimpleDB where the 'Value' attribute was marked as required on DeleteAttribute and BatchDeleteAttributes
* Fixed an issue with the Amazon S3 stream wrapper where empty place holder keys were being marked as files instead of directories
* Added the ability to specify a custom signature implementation using a string identifier (e.g., 'v4', 'v2', etc)

## 2.5.0 - 2013-12-20

* Added support for the new **China (Beijing) Region** to various services. This region is currently in limited preview.
  Please see <http://www.amazonaws.cn> for more information
* Added support for different audio compression schemes to the Elastic Transcoder client (includes AAC-LC, HE-AAC,
  and HE-AACv2)
* Added support for preset and pipeline pagination to the Elastic Transcoder client. You can now view more than the
  first 50 presets and pipelines with their corresponding list operations
* Added support for [geo restriction](http://docs.aws.amazon.com/AmazonCloudFront/latest/DeveloperGuide/WorkingWithDownloadDistributions.html#georestrictions)
  to the Amazon CloudFront client
* [SDK] Added Signature V4 support to the Amazon S3 and Amazon EC2 clients for the new China (Beijing) Region
* [BC] Updated the AWS CloudTrail client to use their latest API changes due to early user feedback. Some parameters in
  the `CreateTrail`, `UpdateTrail`, and `GetTrailStatus` have been deprecated and will be completely unavailable as
  early as February 15th, 2014. Please see [this announcement on the CloudTrail
  forum](https://forums.aws.amazon.com/ann.jspa?annID=2286). We are calling this out as a breaking change now to
  encourage you to update your code at this time.
* Updated the Amazon CloudFront client to use the 2013-11-11 API version
* [BC] Updated the Amazon EC2 client to use the latest API. This resulted in a small change to a parameter in the
  `RequestSpotInstances` operation. See [this commit](https://github.com/aws/aws-sdk-php/commit/36ae0f68d2a6dcc3bc28222f60ecb318449c4092#diff-bad2f6eac12565bb684f2015364c22bd)
  for the change
* [BC] Removed Signature V3 support (no longer needed) and refactored parts of the signature-related classes

## 2.4.12 - 2013-12-12

* Added support for **Amazon Kinesis**
* Added the CloudTrail `LogRecordIterator`, `LogFileIterator`, and `LogFileReader` classes for reading log files
  generated by the CloudTrail service
* Added support for resource-level permissions to the AWS OpsWorks client
* Added support for worker environment tiers to the AWS Elastic Beanstalk client
* Added support for the new I2 instance types to the Amazon EC2 client
* Added support for resource tagging to the Amazon Elastic MapReduce client
* Added support for specifying a key encoding type to the Amazon S3 client
* Added support for global secondary indexes to the Amazon DynamoDB client
* Updated the Amazon ElastiCache client to use Signature Version 4
* Fixed an issue in the waiter factory that caused an error when getting the factory for service clients without any
  existing waiters
* Fixed issue #187, where the DynamoDB Session Handler would fail to save the session if all the data is removed

## 2.4.11 - 2013-11-26

* Added support for copying DB snapshots from one AWS region to another to the Amazon RDS client
* Added support for pagination of the `DescribeInstances` and `DescribeTags` operations to the Amazon EC2 client
* Added support for the new C3 instance types and the g2.2xlarge instance type to the Amazon EC2 client
* Added support for enabling *Single Root I/O Virtualization* (SR-IOV) support for the new C3 instance types to the
  Amazon EC2 client
* Updated the Amazon EC2 client to use the 2013-10-15 API version
* Updated the Amazon RDS client to use the 2013-09-09 API version
* Updated the Amazon CloudWatch client to use Signature Version 4

## 2.4.10 - 2013-11-14

* Added support for **AWS CloudTrail**
* Added support for identity federation using SAML 2.0 to the AWS STS client
* Added support for configuring SAML-compliant identity providers to the AWS IAM client
* Added support for event notifications to the Amazon Redshift client
* Added support for HSM storage for encryption keys to the Amazon Redshift client
* Added support for encryption key rotation to the Amazon Redshift client
* Added support for database audit logging to the Amazon Redshift client

## 2.4.9 - 2013-11-08

* Added support for [cross-zone load balancing](http://aws.amazon.com/about-aws/whats-new/2013/11/06/elastic-load-balancing-adds-cross-zone-load-balancing/)
  to the Elastic Load Balancing client.
* Added support for a [new gateway configuration](http://aws.amazon.com/about-aws/whats-new/2013/11/05/aws-storage-gateway-announces-gateway-virtual-tape-library/),
  Gateway-Virtual Tape Library, to the AWS Storage Gateway client.
* Added support for stack policies to the the AWS CloudFormation client.
* Fixed issue #176 where attempting to upload a direct to Amazon S3 using the `UploadBuilder` failed when using a custom
  iterator that needs to be rewound.

## 2.4.8 - 2013-10-31

* Updated the AWS Direct Connect client
* Updated the Amazon Elastic MapReduce client to add support for new EMR APIs, termination of specific cluster
  instances, and unlimited EMR steps.

## 2.4.7 - 2013-10-17

* Added support for audio transcoding features to the Amazon Elastic Transcoder client
* Added support for modifying Reserved Instances in a region to the Amazon EC2 client
* Added support for new resource management features to the AWS OpsWorks client
* Added support for additional HTTP methods to the Amazon CloudFront client
* Added support for custom error page configuration to the Amazon CloudFront client
* Added support for the public IP address association of instances in Auto Scaling group via the Auto Scaling client
* Added support for tags and filters to various operations in the Amazon RDS client
* Added the ability to easily specify event listeners on waiters
* Added support for using the `ap-southeast-2` region to the Amazon Glacier client
* Added support for using the `ap-southeast-1` and `ap-southeast-2` regions to the Amazon Redshift client
* Updated the Amazon EC2 client to use the 2013-09-11 API version
* Updated the Amazon CloudFront client to use the 2013-09-27 API version
* Updated the AWS OpsWorks client to use the 2013-07-15 API version
* Updated the Amazon CloudSearch client to use Signature Version 4
* Fixed an issue with the Amazon S3 Client so that the top-level XML element of the `CompleteMultipartUpload` operation
  is correctly sent as `CompleteMultipartUpload`
* Fixed an issue with the Amazon S3 Client so that you can now disable bucket logging using with the `PutBucketLogging`
  operation
* Fixed an issue with the Amazon CloudFront so that query string parameters in pre-signed URLs are correctly URL-encoded
* Fixed an issue with the Signature Version 4 implementation where headers with multiple values were sometimes sorted
  and signed incorrectly

## 2.4.6 - 2013-09-12

* Added support for modifying EC2 Reserved Instances to the Amazon EC2 client
* Added support for VPC features to the AWS OpsWorks client
* Updated the DynamoDB Session Handler to implement the SessionHandlerInterface of PHP 5.4 when available
* Updated the SNS Message Validator to throw an exception, instead of an error, when the raw post data is invalid
* Fixed an issue in the S3 signature which ensures that parameters are sorted correctly for signing
* Fixed an issue in the S3 client where the Sydney region was not allowed as a `LocationConstraint` for the
  `PutObject` operation

## 2.4.5 - 2013-09-04

* Added support for replication groups to the Amazon ElastiCache client
* Added support for using the `us-gov-west-1` region to the AWS CloudFormation client

## 2.4.4 - 2013-08-29

* Added support for assigning a public IP address to an instance at launch to the Amazon EC2 client
* Updated the Amazon EC2 client to use the 2013-07-15 API version
* Updated the Amazon SWF client to sign requests with Signature V4
* Updated the Instance Metadata client to allow for higher and more customizable connection timeouts
* Fixed an issue with the SDK where XML map structures were not being serialized correctly in some cases
* Fixed issue #136 where a few of the new Amazon SNS mobile push operations were not working properly
* Fixed an issue where the AWS STS `AssumeRoleWithWebIdentity` operation was requiring credentials and a signature
  unnecessarily
* Fixed and issue with the `S3Client::uploadDirectory` method so that true key prefixes can be used
* [Docs] Updated the API docs to include sample code for each operation that indicates the parameter structure
* [Docs] Updated the API docs to include more information in the descriptions of operations and parameters
* [Docs] Added a page about Iterators to the user guide

## 2.4.3 - 2013-08-12

* Added support for mobile push notifications to the Amazon SNS client
* Added support for progress reporting on snapshot restore operations to the the Amazon Redshift client
* Updated the Amazon Elastic MapReduce client to use JSON serialization
* Updated the Amazon Elastic MapReduce client to sign requests with Signature V4
* Updated the SDK to throw `Aws\Common\Exception\TransferException` exceptions when a network error occurs instead of a
  `Guzzle\Http\Exception\CurlException`. The TransferException class, however, extends from
  `Guzzle\Http\Exception\CurlException`. You can continue to catch the Guzzle `CurlException` or catch
  `Aws\Common\Exception\AwsExceptionInterface` to catch any exception that can be thrown by an AWS client
* Fixed an issue with the Amazon S3 stream wrapper where trailing slashes were being added when listing directories

## 2.4.2 - 2013-07-25

* Added support for cross-account snapshot access control to the Amazon Redshift client
* Added support for decoding authorization messages to the AWS STS client
* Added support for checking for required permissions via the `DryRun` parameter to the Amazon EC2 client
* Added support for custom Amazon Machine Images (AMIs) and Chef 11 to the AWS OpsWorks client
* Added an SDK compatibility test to allow users to quickly determine if their system meets the requirements of the SDK
* Updated the Amazon EC2 client to use the 2013-06-15 API version
* Fixed an unmarshalling error with the Amazon EC2 `CreateKeyPair` operation
* Fixed an unmarshalling error with the Amazon S3 `ListMultipartUploads` operation
* Fixed an issue with the Amazon S3 stream wrapper "x" fopen mode
* Fixed an issue with `Aws\S3\S3Client::downloadBucket` by removing leading slashes from the passed `$keyPrefix` argument

## 2.4.1 - 2013-06-08

* Added support for setting watermarks and max framerates to the Amazon Elastic Transcoder client
* Added the `Aws\DynamoDb\Iterator\ItemIterator` class to make it easier to get items from the results of DynamoDB
  operations in a simpler form
* Added support for the `cr1.8xlarge` EC2 instance type. Use `Aws\Ec2\Enum\InstanceType::CR1_8XLARGE`
* Added support for the suppression list SES mailbox simulator. Use `Aws\Ses\Enum\MailboxSimulator::SUPPRESSION_LIST`
* [SDK] Fixed an issue with data formats throughout the SDK due to a regression. Dates are now sent over the wire with
  the correct format. This issue affected the Amazon EC2, Amazon ElastiCache, AWS Elastic Beanstalk, Amazon EMR, and
  Amazon RDS clients
* Fixed an issue with the parameter serialization of the `ImportInstance` operation in the Amazon EC2 client
* Fixed an issue with the Amazon S3 client where the `RoutingRules.Redirect.HostName` parameter of the
  `PutBucketWebsite` operation was erroneously marked as required
* Fixed an issue with the Amazon S3 client where the `DeleteObject` operation was missing parameters
* Fixed an issue with the Amazon S3 client where the `Status` parameter of the `PutBucketVersioning` operation did not
  properly support the "Suspended" value
* Fixed an issue with the Amazon Glacier `UploadPartGenerator` class so that an exception is thrown if the provided body
  to upload is less than 1 byte
* Added MD5 validation to Amazon SQS ReceiveMessage operations

## 2.4.0 - 2013-06-18

* [BC] Updated the Amazon CloudFront client to use the new 2013-05-12 API version which includes changes in how you
  configure distributions. If you are not ready to upgrade to the new API, you can configure the SDK to use the previous
  version of the API by setting the `version` option to `2012-05-05` when you instantiate the client (See
  [`UPGRADING.md`](https://github.com/aws/aws-sdk-php/blob/master/UPGRADING.md))
* Added abstractions for uploading a local directory to an Amazon S3 bucket (`$s3->uploadDirectory()`)
* Added abstractions for downloading an Amazon S3 bucket to local directory (`$s3->downloadBucket()`)
* Added an easy to way to delete objects from an Amazon S3 bucket that match a regular expression or key prefix
* Added an easy to way to upload an object to Amazon S3 that automatically uses a multipart upload if the size of the
  object exceeds a customizable threshold (`$s3->upload()`)
* [SDK] Added facade classes for simple, static access to clients (e.g., `S3::putObject([...])`)
* Added the `Aws\S3\S3Client::getObjectUrl` convenience method for getting the URL of an Amazon S3 object. This works
  for both public and pre-signed URLs
* Added support for using the `ap-northeast-1` region to the Amazon Redshift client
* Added support for configuring custom SSL certificates to the Amazon CloudFront client via the `ViewerCertificate`
  parameter
* Added support for read replica status to the Amazon RDS client
* Added "magic" access to iterators to make using iterators more convenient (e.g., `$s3->getListBucketsIterator()`)
* Added the `waitUntilDBInstanceAvailable` and `waitUntilDBInstanceDeleted` waiters to the Amazon RDS client
* Added the `createCredentials` method to the AWS STS client to make it easier to create a credentials object from the
  results of an STS operation
* Updated the Amazon RDS client to use the 2013-05-15 API version
* Updated request retrying logic to automatically refresh expired credentials and retry with new ones
* Updated the Amazon CloudFront client to sign requests with Signature V4
* Updated the Amazon SNS client to sign requests with Signature V4, which enables larger payloads
* Updated the S3 Stream Wrapper so that you can use stream resources in any S3 operation without having to manually
  specify the `ContentLength` option
* Fixed issue #94 so that the `Aws\S3\BucketStyleListener` is invoked on `command.after_prepare` and presigned URLs
  are generated correctly from S3 commands
* Fixed an issue so that creating presigned URLs using the Amazon S3 client now works with temporary credentials
* Fixed an issue so that the `CORSRules.AllowedHeaders` parameter is now available when configuring CORS for Amazon S3
* Set the Guzzle dependency to ~3.7.0

## 2.3.4 - 2013-05-30

* Set the Guzzle dependency to ~3.6.0

## 2.3.3 - 2013-05-28

* Added support for web identity federation in the AWS Security Token Service (STS) API
* Fixed an issue with creating pre-signed Amazon CloudFront RTMP URLs
* Fixed issue #85 to correct the parameter serialization of NetworkInterfaces within the Amazon EC2 RequestSpotInstances
  operation

## 2.3.2 - 2013-05-15

* Added support for doing parallel scans to the Amazon DynamoDB client
* [OpsWorks] Added support for using Elastic Load Balancer to the AWS OpsWorks client
* Added support for using EBS-backed instances to the AWS OpsWorks client along with some other minor updates
* Added support for finer-grained error messages to the AWS Data Pipeline client and updated the service description
* Added the ability to set the `key_pair_id` and `private_key` options at the time of signing a CloudFront URL instead
  of when instantiating the client
* Added a new [Zip Download](http://pear.amazonwebservices.com/get/aws.zip) for installing the SDK
* Fixed the API version for the AWS Support client to be `2013-04-15`
* Fixed issue #78 by implementing `Aws\S3\StreamWrapper::stream_cast()` for the S3 stream wrapper
* Fixed issue #79 by updating the S3 `ClearBucket` object to work with the `ListObjects` operation
* Fixed issue #80 where the `ETag` was incorrectly labeled as a header value instead of being in the XML body for
  the S3 `CompleteMultipartUpload` operation response
* Fixed an issue where the `setCredentials()` method did not properly update the `SignatureListener`
* Updated the required version of Guzzle to `">=3.4.3,<4"` to support Guzzle 3.5 which provides the SDK with improved
  memory management

## 2.3.1 - 2013-04-30

* Added support for **AWS Support**
* Added support for using the `eu-west-1` region to the Amazon Redshift client
* Fixed an issue with the Amazon RDS client where the `DownloadDBLogFilePortion` operation was not being serialized
  properly
* Fixed an issue with the Amazon S3 client where the `PutObjectCopy` alias was interfering with the `CopyObject`
  operation
* Added the ability to manually set a Content-Length header when using the `PutObject` and `UploadPart` operations of
  the Amazon S3 client
* Fixed an issue where the Amazon S3 class was not throwing an exception for a non-followable 301 redirect response
* Fixed an issue where `fflush()` was called during the shutdown process of the stream handler for read-only streams

## 2.3.0 - 2013-04-18

* Added support for Local Secondary Indexes to the Amazon DynamoDB client
* [BC] Updated the Amazon DynamoDB client to use the new 2012-08-10 API version which includes changes in how you
  specify keys. If you are not ready to upgrade to the new API, you can configure the SDK to use the previous version of
  the API by setting the `version` option to `2011-12-05` when you instantiate the client (See
  [`UPGRADING.md`](https://github.com/aws/aws-sdk-php/blob/master/UPGRADING.md)).
* Added an Amazon S3 stream wrapper that allows PHP native file functions to be used to interact with S3 buckets and
  objects
* Added support for automatically retrying *throttled* requests with exponential backoff to all service clients
* Added a new config option (`version`) to client objects to specify the API version to use if multiple are supported
* Added a new config option (`gc_operation_delay`) to the DynamoDB Session Handler to specify a delay between requests
  to the service during garbage collection in order to help regulate the consumption of throughput
* Added support for using the `us-west-2` region to the Amazon Redshift client
* [Docs] Added a way to use marked integration test code as example code in the user guide and API docs
* Updated the Amazon RDS client to sign requests with Signature V4
* Updated the Amazon S3 client to automatically add the `Content-Type` to `PutObject` and other upload operations
* Fixed an issue where service clients with a global endpoint could have their region for signing set incorrectly if a
  region other than `us-east-1` was specified.
* Fixed an issue where reused command objects appended duplicate content to the user agent string
* [SDK] Fixed an issue in a few operations (including `SQS::receiveMessage`) where the `curl.options` could not be
  modified
* [Docs] Added key information to the DynamoDB service description to provide more accurate API docs for some operations
* [Docs] Added a page about Waiters to the user guide
* [Docs] Added a page about the DynamoDB Session Handler to the user guide
* [Docs] Added a page about response Models to the user guide
* Bumped the required version of Guzzle to ~3.4.1

## 2.2.1 - 2013-03-18

* Added support for viewing and downloading DB log files to the Amazon RDS client
* Added the ability to validate incoming Amazon SNS messages. See the `Aws\Sns\MessageValidator` namespace
* Added the ability to easily change the credentials that a client is configured to use via `$client->setCredentials()`
* Added the `client.region_changed` and `client.credentials_changed` events on the client that are triggered when the
  `setRegion()` and `setCredentials()` methods are called, respectively
* Added support for using the `ap-southeast-2` region with the Amazon ElastiCache client
* Added support for using the `us-gov-west-1` region with the Amazon SWF client
* Updated the Amazon RDS client to use the 2013-02-12 API version
* Fixed an issue in the Amazon EC2 service description that was affecting the use of the new `ModifyVpcAttribute` and
  `DescribeVpcAttribute` operations
* Added `ObjectURL` to the output of an Amazon S3 PutObject operation so that you can more easily retrieve the URL of an
  object after uploading
* Added a `createPresignedUrl()` method to any command object created by the Amazon S3 client to more easily create
  presigned URLs

## 2.2.0 - 2013-03-11

* Added support for **Amazon Elastic MapReduce (Amazon EMR)**
* Added support for **AWS Direct Connect**
* Added support for **Amazon ElastiCache**
* Added support for **AWS Storage Gateway**
* Added support for **AWS Import/Export**
* Added support for **AWS CloudFormation**
* Added support for **Amazon CloudSearch**
* Added support for [provisioned IOPS](http://docs.aws.amazon.com/AmazonRDS/latest/UserGuide/Overview.ProvisionedIOPS.html)
  to the the Amazon RDS client
* Added support for promoting [read replicas](http://docs.aws.amazon.com/AmazonRDS/latest/UserGuide/USER_ReadRepl.html)
  to the Amazon RDS client
* Added support for [event notification subscriptions](http://docs.aws.amazon.com/AmazonRDS/latest/UserGuide/USER_Events.html)
  to the Amazon RDS client
* Added support for enabling\disabling DNS Hostnames and DNS Resolution in Amazon VPC to the Amazon EC2 client
* Added support for enumerating account attributes to the Amazon EC2 client
* Added support for copying AMIs across regions to the Amazon EC2 client
* Added the ability to get a Waiter object from a client using the `getWaiter()` method
* [SDK] Added the ability to load credentials from environmental variables `AWS_ACCESS_KEY_ID` and `AWS_SECRET_KEY`.
  This is compatible with AWS Elastic Beanstalk environment configurations
* Added support for using the us-west-1, us-west-2, eu-west-1, and ap-southeast-1 regions with Amazon CloudSearch
* Updated the Amazon RDS client to use the 2013-01-10 API version
* Updated the Amazon EC2 client to use the 2013-02-01 API version
* Added support for using SecurityToken with signature version 2 services
* Added the client User-Agent header to exception messages for easier debugging
* Added an easier way to disable operation parameter validation by setting `validation` to false when creating clients
* Added the ability to disable the exponential backoff plugin
* Added the ability to easily fetch the region name that a client is configured to use via `$client->getRegion()`
* Added end-user guides available at http://docs.aws.amazon.com/aws-sdk-php/guide/latest/
* Fixed issue #48 where signing Amazon S3 requests with null or empty metadata resulted in a signature error
* Fixed issue #29 where Amazon S3 was intermittently closing a connection
* Updated the Amazon S3 client to parse the AcceptRanges header for HeadObject and GetObject output
* Updated the Amazon Glacier client to allow the `saveAs` parameter to be specified as an alias for `command.response_body`
* Various performance improvements throughout the SDK
* Removed endpoint providers and now placing service region information directly in service descriptions
* Removed client resolvers when creating clients in a client's factory method (this should not have any impact to end users)

## 2.1.2 - 2013-02-18

* Added support for **AWS OpsWorks**

## 2.1.1 - 2013-02-15

* Added support for **Amazon Redshift**
* Added support for **Amazon Simple Queue Service (Amazon SQS)**
* Added support for **Amazon Simple Notification Service (Amazon SNS)**
* Added support for **Amazon Simple Email Service (Amazon SES)**
* Added support for **Auto Scaling**
* Added support for **Amazon CloudWatch**
* Added support for **Amazon Simple Workflow Service (Amazon SWF)**
* Added support for **Amazon Relational Database Service (Amazon RDS)**
* Added support for health checks and failover in Amazon Route 53
* Updated the Amazon Route 53 client to use the 2012-12-12 API version
* Updated `AbstractWaiter` to dispatch `waiter.before_attempt` and `waiter.before_wait` events
* Updated `CallableWaiter` to allow for an array of context data to be passed to the callable
* Fixed issue #29 so that the stat cache is cleared before performing multipart uploads
* Fixed issue #38 so that Amazon CloudFront URLs are signed properly
* Fixed an issue with Amazon S3 website redirects
* Fixed a URL encoding inconsistency with Amazon S3 and pre-signed URLs
* Fixed issue #42 to eliminate cURL error 65 for JSON services
* Set Guzzle dependency to [~3.2.0](https://github.com/guzzle/guzzle/blob/master/CHANGELOG.md#320-2013-02-14)
* Minimum version of PHP is now 5.3.3

## 2.1.0 - 2013-01-28

* Waiters now require an associative array as input for the underlying operation performed by a waiter. See
  `UPGRADING.md` for details.
* Added support for **Amazon Elastic Compute Cloud (Amazon EC2)**
* Added support for **Amazon Elastic Transcoder**
* Added support for **Amazon SimpleDB**
* Added support for **Elastic Load Balancing**
* Added support for **AWS Elastic Beanstalk**
* Added support for **AWS Identity and Access Management (IAM)**
* Added support for Amazon S3 website redirection rules
* Added support for the `RetrieveByteRange` parameter of the `InitiateJob` operation in Amazon Glacier
* Added support for Signature Version 2
* Clients now gain more information from service descriptions rather than client factory methods
* Service descriptions are now versioned for clients
* Fixed an issue where Amazon S3 did not use "restore" as a signable resource
* Fixed an issue with Amazon S3 where `x-amz-meta-*` headers were not properly added with the CopyObject operation
* Fixed an issue where the Amazon Glacier client was not using the correct User-Agent header
* Fixed issue #13 in which constants defined by referencing other constants caused errors with early versions of PHP 5.3

## 2.0.3 - 2012-12-20

* Added support for **AWS Data Pipeline**
* Added support for **Amazon Route 53**
* Fixed an issue with the Amazon S3 client where object keys with slashes were causing errors
* Added a `SaveAs` parameter to the Amazon S3 `GetObject` operation to allow saving the object directly to a file
* Refactored iterators to remove code duplication and ease creation of future iterators

## 2.0.2 - 2012-12-10

* Fixed an issue with the Amazon S3 client where non-DNS compatible buckets that was previously causing a signature
  mismatch error
* Fixed an issue with the service description for the Amazon S3 `UploadPart` operation so that it works correctly
* Fixed an issue with the Amazon S3 service description dealing with `response-*` query parameters of `GetObject`
* Fixed an issue with the Amazon S3 client where object keys prefixed by the bucket name were being treated incorrectly
* Fixed an issue with `Aws\S3\Model\MultipartUpload\ParallelTransfer` class
* Added support for the `AssumeRole` operation for AWS STS
* Added a the `UploadBodyListener` which allows upload operations in Amazon S3 and Amazon Glacier to accept file handles
  in the `Body` parameter and file paths in the `SourceFile` parameter
* Added Content-Type guessing for uploads
* Added new region endpoints, including sa-east-1 and us-gov-west-1 for Amazon DynamoDB
* Added methods to `Aws\S3\Model\MultipartUpload\UploadBuilder` class to make setting ACL and Content-Type easier

## 2.0.1 - 2012-11-13

* Fixed a signature issue encountered when a request to Amazon S3 is redirected
* Added support for archiving Amazon S3 objects to Amazon Glacier
* Added CRC32 validation of Amazon DynamoDB responses
* Added ConsistentRead support to the `BatchGetItem` operation of Amazon DynamoDB
* Added new region endpoints, including Sydney

## 2.0.0 - 2012-11-02

* Initial release of the AWS SDK for PHP Version 2. See <http://aws.amazon.com/sdkforphp2/> for more information.
* Added support for **Amazon Simple Storage Service (Amazon S3)**
* Added support for **Amazon DynamoDB**
* Added support for **Amazon Glacier**
* Added support for **Amazon CloudFront**
* Added support for **AWS Security Token Service (AWS STS)**
