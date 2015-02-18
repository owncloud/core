<?php
/**
 * Copyright 2010-2013 Amazon.com, Inc. or its affiliates. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 * http://aws.amazon.com/apache2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

return array (
    'apiVersion' => '2010-12-01',
    'endpointPrefix' => 'elasticbeanstalk',
    'serviceFullName' => 'AWS Elastic Beanstalk',
    'serviceAbbreviation' => 'Elastic Beanstalk',
    'serviceType' => 'query',
    'resultWrapped' => true,
    'signatureVersion' => 'v4',
    'namespace' => 'ElasticBeanstalk',
    'regions' => array(
        'us-east-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'elasticbeanstalk.us-east-1.amazonaws.com',
        ),
        'us-west-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'elasticbeanstalk.us-west-1.amazonaws.com',
        ),
        'us-west-2' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'elasticbeanstalk.us-west-2.amazonaws.com',
        ),
        'eu-west-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'elasticbeanstalk.eu-west-1.amazonaws.com',
        ),
        'ap-northeast-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'elasticbeanstalk.ap-northeast-1.amazonaws.com',
        ),
        'ap-southeast-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'elasticbeanstalk.ap-southeast-1.amazonaws.com',
        ),
        'ap-southeast-2' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'elasticbeanstalk.ap-southeast-2.amazonaws.com',
        ),
        'sa-east-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'elasticbeanstalk.sa-east-1.amazonaws.com',
        ),
    ),
    'operations' => array(
        'CheckDNSAvailability' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CheckDNSAvailabilityResultMessage',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CheckDNSAvailability',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'CNAMEPrefix' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 4,
                    'maxLength' => 63,
                ),
            ),
        ),
        'CreateApplication' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ApplicationDescriptionMessage',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateApplication',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'ApplicationName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
                'Description' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'maxLength' => 200,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The caller has exceeded the limit on the number of applications associated with their account.',
                    'class' => 'TooManyApplicationsException',
                ),
            ),
        ),
        'CreateApplicationVersion' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ApplicationVersionDescriptionMessage',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateApplicationVersion',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'ApplicationName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
                'VersionLabel' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
                'Description' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'maxLength' => 200,
                ),
                'SourceBundle' => array(
                    'type' => 'object',
                    'location' => 'aws.query',
                    'properties' => array(
                        'S3Bucket' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'S3Key' => array(
                            'type' => 'string',
                            'maxLength' => 1024,
                        ),
                    ),
                ),
                'AutoCreateApplication' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The caller has exceeded the limit on the number of applications associated with their account.',
                    'class' => 'TooManyApplicationsException',
                ),
                array(
                    'reason' => 'The caller has exceeded the limit on the number of application versions associated with their account.',
                    'class' => 'TooManyApplicationVersionsException',
                ),
                array(
                    'reason' => 'Unable to perform the specified operation because the user does not have enough privileges for one of more downstream aws services',
                    'class' => 'InsufficientPrivilegesException',
                ),
                array(
                    'reason' => 'The specified S3 bucket does not belong to the S3 region in which the service is running.',
                    'class' => 'S3LocationNotInServiceRegionException',
                ),
            ),
        ),
        'CreateConfigurationTemplate' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ConfigurationSettingsDescription',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateConfigurationTemplate',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'ApplicationName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
                'TemplateName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
                'SolutionStackName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'maxLength' => 100,
                ),
                'SourceConfiguration' => array(
                    'type' => 'object',
                    'location' => 'aws.query',
                    'properties' => array(
                        'ApplicationName' => array(
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 100,
                        ),
                        'TemplateName' => array(
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 100,
                        ),
                    ),
                ),
                'EnvironmentId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Description' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'maxLength' => 200,
                ),
                'OptionSettings' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'OptionSettings.member',
                    'items' => array(
                        'name' => 'ConfigurationOptionSetting',
                        'type' => 'object',
                        'properties' => array(
                            'Namespace' => array(
                                'type' => 'string',
                            ),
                            'OptionName' => array(
                                'type' => 'string',
                            ),
                            'Value' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Unable to perform the specified operation because the user does not have enough privileges for one of more downstream aws services',
                    'class' => 'InsufficientPrivilegesException',
                ),
                array(
                    'reason' => 'The caller has exceeded the limit on the number of configuration templates associated with their account.',
                    'class' => 'TooManyConfigurationTemplatesException',
                ),
            ),
        ),
        'CreateEnvironment' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EnvironmentDescription',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateEnvironment',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'ApplicationName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
                'EnvironmentName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 4,
                    'maxLength' => 23,
                ),
                'Description' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'maxLength' => 200,
                ),
                'CNAMEPrefix' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 4,
                    'maxLength' => 63,
                ),
                'Tier' => array(
                    'type' => 'object',
                    'location' => 'aws.query',
                    'properties' => array(
                        'Name' => array(
                            'type' => 'string',
                        ),
                        'Type' => array(
                            'type' => 'string',
                        ),
                        'Version' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'Tags' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Tags.member',
                    'items' => array(
                        'name' => 'Tag',
                        'type' => 'object',
                        'properties' => array(
                            'Key' => array(
                                'type' => 'string',
                                'minLength' => 1,
                                'maxLength' => 128,
                            ),
                            'Value' => array(
                                'type' => 'string',
                                'minLength' => 1,
                                'maxLength' => 256,
                            ),
                        ),
                    ),
                ),
                'VersionLabel' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
                'TemplateName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
                'SolutionStackName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'maxLength' => 100,
                ),
                'OptionSettings' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'OptionSettings.member',
                    'items' => array(
                        'name' => 'ConfigurationOptionSetting',
                        'type' => 'object',
                        'properties' => array(
                            'Namespace' => array(
                                'type' => 'string',
                            ),
                            'OptionName' => array(
                                'type' => 'string',
                            ),
                            'Value' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'OptionsToRemove' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'OptionsToRemove.member',
                    'items' => array(
                        'name' => 'OptionSpecification',
                        'type' => 'object',
                        'properties' => array(
                            'Namespace' => array(
                                'type' => 'string',
                            ),
                            'OptionName' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The caller has exceeded the limit of allowed environments associated with the account.',
                    'class' => 'TooManyEnvironmentsException',
                ),
                array(
                    'reason' => 'Unable to perform the specified operation because the user does not have enough privileges for one of more downstream aws services',
                    'class' => 'InsufficientPrivilegesException',
                ),
            ),
        ),
        'CreateStorageLocation' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CreateStorageLocationResultMessage',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateStorageLocation',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The web service attempted to create a bucket in an Amazon S3 account that already has 100 buckets.',
                    'class' => 'TooManyBucketsException',
                ),
                array(
                    'reason' => 'The caller does not have a subscription to Amazon S3.',
                    'class' => 'S3SubscriptionRequiredException',
                ),
                array(
                    'reason' => 'Unable to perform the specified operation because the user does not have enough privileges for one of more downstream aws services',
                    'class' => 'InsufficientPrivilegesException',
                ),
            ),
        ),
        'DeleteApplication' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteApplication',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'ApplicationName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
                'TerminateEnvByForce' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Unable to perform the specified operation because another operation is already in progress affecting an an element in this activity.',
                    'class' => 'OperationInProgressException',
                ),
            ),
        ),
        'DeleteApplicationVersion' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteApplicationVersion',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'ApplicationName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
                'VersionLabel' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
                'DeleteSourceBundle' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Unable to delete the Amazon S3 source bundle associated with the application version, although the application version deleted successfully.',
                    'class' => 'SourceBundleDeletionException',
                ),
                array(
                    'reason' => 'Unable to perform the specified operation because the user does not have enough privileges for one of more downstream aws services',
                    'class' => 'InsufficientPrivilegesException',
                ),
                array(
                    'reason' => 'Unable to perform the specified operation because another operation is already in progress affecting an an element in this activity.',
                    'class' => 'OperationInProgressException',
                ),
                array(
                    'reason' => 'The specified S3 bucket does not belong to the S3 region in which the service is running.',
                    'class' => 'S3LocationNotInServiceRegionException',
                ),
            ),
        ),
        'DeleteConfigurationTemplate' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteConfigurationTemplate',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'ApplicationName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
                'TemplateName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Unable to perform the specified operation because another operation is already in progress affecting an an element in this activity.',
                    'class' => 'OperationInProgressException',
                ),
            ),
        ),
        'DeleteEnvironmentConfiguration' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteEnvironmentConfiguration',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'ApplicationName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
                'EnvironmentName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 4,
                    'maxLength' => 23,
                ),
            ),
        ),
        'DescribeApplicationVersions' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ApplicationVersionDescriptionsMessage',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeApplicationVersions',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'ApplicationName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
                'VersionLabels' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'VersionLabels.member',
                    'items' => array(
                        'name' => 'VersionLabel',
                        'type' => 'string',
                        'minLength' => 1,
                        'maxLength' => 100,
                    ),
                ),
            ),
        ),
        'DescribeApplications' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ApplicationDescriptionsMessage',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeApplications',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'ApplicationNames' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'ApplicationNames.member',
                    'items' => array(
                        'name' => 'ApplicationName',
                        'type' => 'string',
                        'minLength' => 1,
                        'maxLength' => 100,
                    ),
                ),
            ),
        ),
        'DescribeConfigurationOptions' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ConfigurationOptionsDescription',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeConfigurationOptions',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'ApplicationName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
                'TemplateName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
                'EnvironmentName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 4,
                    'maxLength' => 23,
                ),
                'SolutionStackName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'maxLength' => 100,
                ),
                'Options' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Options.member',
                    'items' => array(
                        'name' => 'OptionSpecification',
                        'type' => 'object',
                        'properties' => array(
                            'Namespace' => array(
                                'type' => 'string',
                            ),
                            'OptionName' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeConfigurationSettings' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ConfigurationSettingsDescriptions',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeConfigurationSettings',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'ApplicationName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
                'TemplateName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
                'EnvironmentName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 4,
                    'maxLength' => 23,
                ),
            ),
        ),
        'DescribeEnvironmentResources' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EnvironmentResourceDescriptionsMessage',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeEnvironmentResources',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'EnvironmentId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'EnvironmentName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 4,
                    'maxLength' => 23,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Unable to perform the specified operation because the user does not have enough privileges for one of more downstream aws services',
                    'class' => 'InsufficientPrivilegesException',
                ),
            ),
        ),
        'DescribeEnvironments' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EnvironmentDescriptionsMessage',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeEnvironments',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'ApplicationName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
                'VersionLabel' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
                'EnvironmentIds' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'EnvironmentIds.member',
                    'items' => array(
                        'name' => 'EnvironmentId',
                        'type' => 'string',
                    ),
                ),
                'EnvironmentNames' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'EnvironmentNames.member',
                    'items' => array(
                        'name' => 'EnvironmentName',
                        'type' => 'string',
                        'minLength' => 4,
                        'maxLength' => 23,
                    ),
                ),
                'IncludeDeleted' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'IncludedDeletedBackTo' => array(
                    'type' => array(
                        'object',
                        'string',
                        'integer',
                    ),
                    'format' => 'date-time',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DescribeEvents' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EventDescriptionsMessage',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeEvents',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'ApplicationName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
                'VersionLabel' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
                'TemplateName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
                'EnvironmentId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'EnvironmentName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 4,
                    'maxLength' => 23,
                ),
                'RequestId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Severity' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'StartTime' => array(
                    'type' => array(
                        'object',
                        'string',
                        'integer',
                    ),
                    'format' => 'date-time',
                    'location' => 'aws.query',
                ),
                'EndTime' => array(
                    'type' => array(
                        'object',
                        'string',
                        'integer',
                    ),
                    'format' => 'date-time',
                    'location' => 'aws.query',
                ),
                'MaxRecords' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                    'minimum' => 1,
                    'maximum' => 1000,
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'ListAvailableSolutionStacks' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ListAvailableSolutionStacksResultMessage',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ListAvailableSolutionStacks',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
            ),
        ),
        'RebuildEnvironment' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'RebuildEnvironment',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'EnvironmentId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'EnvironmentName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 4,
                    'maxLength' => 23,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Unable to perform the specified operation because the user does not have enough privileges for one of more downstream aws services',
                    'class' => 'InsufficientPrivilegesException',
                ),
            ),
        ),
        'RequestEnvironmentInfo' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'RequestEnvironmentInfo',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'EnvironmentId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'EnvironmentName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 4,
                    'maxLength' => 23,
                ),
                'InfoType' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'RestartAppServer' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'RestartAppServer',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'EnvironmentId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'EnvironmentName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 4,
                    'maxLength' => 23,
                ),
            ),
        ),
        'RetrieveEnvironmentInfo' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'RetrieveEnvironmentInfoResultMessage',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'RetrieveEnvironmentInfo',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'EnvironmentId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'EnvironmentName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 4,
                    'maxLength' => 23,
                ),
                'InfoType' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'SwapEnvironmentCNAMEs' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'SwapEnvironmentCNAMEs',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'SourceEnvironmentId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'SourceEnvironmentName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 4,
                    'maxLength' => 23,
                ),
                'DestinationEnvironmentId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'DestinationEnvironmentName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 4,
                    'maxLength' => 23,
                ),
            ),
        ),
        'TerminateEnvironment' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EnvironmentDescription',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'TerminateEnvironment',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'EnvironmentId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'EnvironmentName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 4,
                    'maxLength' => 23,
                ),
                'TerminateResources' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Unable to perform the specified operation because the user does not have enough privileges for one of more downstream aws services',
                    'class' => 'InsufficientPrivilegesException',
                ),
            ),
        ),
        'UpdateApplication' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ApplicationDescriptionMessage',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'UpdateApplication',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'ApplicationName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
                'Description' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'maxLength' => 200,
                ),
            ),
        ),
        'UpdateApplicationVersion' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ApplicationVersionDescriptionMessage',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'UpdateApplicationVersion',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'ApplicationName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
                'VersionLabel' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
                'Description' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'maxLength' => 200,
                ),
            ),
        ),
        'UpdateConfigurationTemplate' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ConfigurationSettingsDescription',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'UpdateConfigurationTemplate',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'ApplicationName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
                'TemplateName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
                'Description' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'maxLength' => 200,
                ),
                'OptionSettings' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'OptionSettings.member',
                    'items' => array(
                        'name' => 'ConfigurationOptionSetting',
                        'type' => 'object',
                        'properties' => array(
                            'Namespace' => array(
                                'type' => 'string',
                            ),
                            'OptionName' => array(
                                'type' => 'string',
                            ),
                            'Value' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'OptionsToRemove' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'OptionsToRemove.member',
                    'items' => array(
                        'name' => 'OptionSpecification',
                        'type' => 'object',
                        'properties' => array(
                            'Namespace' => array(
                                'type' => 'string',
                            ),
                            'OptionName' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Unable to perform the specified operation because the user does not have enough privileges for one of more downstream aws services',
                    'class' => 'InsufficientPrivilegesException',
                ),
            ),
        ),
        'UpdateEnvironment' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EnvironmentDescription',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'UpdateEnvironment',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'EnvironmentId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'EnvironmentName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 4,
                    'maxLength' => 23,
                ),
                'Description' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'maxLength' => 200,
                ),
                'Tier' => array(
                    'type' => 'object',
                    'location' => 'aws.query',
                    'properties' => array(
                        'Name' => array(
                            'type' => 'string',
                        ),
                        'Type' => array(
                            'type' => 'string',
                        ),
                        'Version' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'VersionLabel' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
                'TemplateName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
                'OptionSettings' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'OptionSettings.member',
                    'items' => array(
                        'name' => 'ConfigurationOptionSetting',
                        'type' => 'object',
                        'properties' => array(
                            'Namespace' => array(
                                'type' => 'string',
                            ),
                            'OptionName' => array(
                                'type' => 'string',
                            ),
                            'Value' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'OptionsToRemove' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'OptionsToRemove.member',
                    'items' => array(
                        'name' => 'OptionSpecification',
                        'type' => 'object',
                        'properties' => array(
                            'Namespace' => array(
                                'type' => 'string',
                            ),
                            'OptionName' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Unable to perform the specified operation because the user does not have enough privileges for one of more downstream aws services',
                    'class' => 'InsufficientPrivilegesException',
                ),
            ),
        ),
        'ValidateConfigurationSettings' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ConfigurationSettingsValidationMessages',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ValidateConfigurationSettings',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'ApplicationName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
                'TemplateName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
                'EnvironmentName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 4,
                    'maxLength' => 23,
                ),
                'OptionSettings' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'OptionSettings.member',
                    'items' => array(
                        'name' => 'ConfigurationOptionSetting',
                        'type' => 'object',
                        'properties' => array(
                            'Namespace' => array(
                                'type' => 'string',
                            ),
                            'OptionName' => array(
                                'type' => 'string',
                            ),
                            'Value' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Unable to perform the specified operation because the user does not have enough privileges for one of more downstream aws services',
                    'class' => 'InsufficientPrivilegesException',
                ),
            ),
        ),
    ),
    'models' => array(
        'CheckDNSAvailabilityResultMessage' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Available' => array(
                    'type' => 'boolean',
                    'location' => 'xml',
                ),
                'FullyQualifiedCNAME' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'ApplicationDescriptionMessage' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Application' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'ApplicationName' => array(
                            'type' => 'string',
                        ),
                        'Description' => array(
                            'type' => 'string',
                        ),
                        'DateCreated' => array(
                            'type' => 'string',
                        ),
                        'DateUpdated' => array(
                            'type' => 'string',
                        ),
                        'Versions' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'VersionLabel',
                                'type' => 'string',
                                'sentAs' => 'member',
                            ),
                        ),
                        'ConfigurationTemplates' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'ConfigurationTemplateName',
                                'type' => 'string',
                                'sentAs' => 'member',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'ApplicationVersionDescriptionMessage' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ApplicationVersion' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'ApplicationName' => array(
                            'type' => 'string',
                        ),
                        'Description' => array(
                            'type' => 'string',
                        ),
                        'VersionLabel' => array(
                            'type' => 'string',
                        ),
                        'SourceBundle' => array(
                            'type' => 'object',
                            'properties' => array(
                                'S3Bucket' => array(
                                    'type' => 'string',
                                ),
                                'S3Key' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'DateCreated' => array(
                            'type' => 'string',
                        ),
                        'DateUpdated' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
        'ConfigurationSettingsDescription' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'SolutionStackName' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'ApplicationName' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'TemplateName' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Description' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'EnvironmentName' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'DeploymentStatus' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'DateCreated' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'DateUpdated' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'OptionSettings' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'ConfigurationOptionSetting',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'Namespace' => array(
                                'type' => 'string',
                            ),
                            'OptionName' => array(
                                'type' => 'string',
                            ),
                            'Value' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'EnvironmentDescription' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'EnvironmentName' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'EnvironmentId' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'ApplicationName' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'VersionLabel' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'SolutionStackName' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'TemplateName' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Description' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'EndpointURL' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'CNAME' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'DateCreated' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'DateUpdated' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Status' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Health' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Resources' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'LoadBalancer' => array(
                            'type' => 'object',
                            'properties' => array(
                                'LoadBalancerName' => array(
                                    'type' => 'string',
                                ),
                                'Domain' => array(
                                    'type' => 'string',
                                ),
                                'Listeners' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'Listener',
                                        'type' => 'object',
                                        'sentAs' => 'member',
                                        'properties' => array(
                                            'Protocol' => array(
                                                'type' => 'string',
                                            ),
                                            'Port' => array(
                                                'type' => 'numeric',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'Tier' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Name' => array(
                            'type' => 'string',
                        ),
                        'Type' => array(
                            'type' => 'string',
                        ),
                        'Version' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
        'CreateStorageLocationResultMessage' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'S3Bucket' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'EmptyOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
        ),
        'ApplicationVersionDescriptionsMessage' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ApplicationVersions' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'ApplicationVersionDescription',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'ApplicationName' => array(
                                'type' => 'string',
                            ),
                            'Description' => array(
                                'type' => 'string',
                            ),
                            'VersionLabel' => array(
                                'type' => 'string',
                            ),
                            'SourceBundle' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'S3Bucket' => array(
                                        'type' => 'string',
                                    ),
                                    'S3Key' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'DateCreated' => array(
                                'type' => 'string',
                            ),
                            'DateUpdated' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'ApplicationDescriptionsMessage' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Applications' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'ApplicationDescription',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'ApplicationName' => array(
                                'type' => 'string',
                            ),
                            'Description' => array(
                                'type' => 'string',
                            ),
                            'DateCreated' => array(
                                'type' => 'string',
                            ),
                            'DateUpdated' => array(
                                'type' => 'string',
                            ),
                            'Versions' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'VersionLabel',
                                    'type' => 'string',
                                    'sentAs' => 'member',
                                ),
                            ),
                            'ConfigurationTemplates' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'ConfigurationTemplateName',
                                    'type' => 'string',
                                    'sentAs' => 'member',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'ConfigurationOptionsDescription' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'SolutionStackName' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Options' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'ConfigurationOptionDescription',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'Namespace' => array(
                                'type' => 'string',
                            ),
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'DefaultValue' => array(
                                'type' => 'string',
                            ),
                            'ChangeSeverity' => array(
                                'type' => 'string',
                            ),
                            'UserDefined' => array(
                                'type' => 'boolean',
                            ),
                            'ValueType' => array(
                                'type' => 'string',
                            ),
                            'ValueOptions' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'ConfigurationOptionPossibleValue',
                                    'type' => 'string',
                                    'sentAs' => 'member',
                                ),
                            ),
                            'MinValue' => array(
                                'type' => 'numeric',
                            ),
                            'MaxValue' => array(
                                'type' => 'numeric',
                            ),
                            'MaxLength' => array(
                                'type' => 'numeric',
                            ),
                            'Regex' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'Pattern' => array(
                                        'type' => 'string',
                                    ),
                                    'Label' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'ConfigurationSettingsDescriptions' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ConfigurationSettings' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'ConfigurationSettingsDescription',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'SolutionStackName' => array(
                                'type' => 'string',
                            ),
                            'ApplicationName' => array(
                                'type' => 'string',
                            ),
                            'TemplateName' => array(
                                'type' => 'string',
                            ),
                            'Description' => array(
                                'type' => 'string',
                            ),
                            'EnvironmentName' => array(
                                'type' => 'string',
                            ),
                            'DeploymentStatus' => array(
                                'type' => 'string',
                            ),
                            'DateCreated' => array(
                                'type' => 'string',
                            ),
                            'DateUpdated' => array(
                                'type' => 'string',
                            ),
                            'OptionSettings' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'ConfigurationOptionSetting',
                                    'type' => 'object',
                                    'sentAs' => 'member',
                                    'properties' => array(
                                        'Namespace' => array(
                                            'type' => 'string',
                                        ),
                                        'OptionName' => array(
                                            'type' => 'string',
                                        ),
                                        'Value' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'EnvironmentResourceDescriptionsMessage' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'EnvironmentResources' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'EnvironmentName' => array(
                            'type' => 'string',
                        ),
                        'AutoScalingGroups' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'AutoScalingGroup',
                                'type' => 'object',
                                'sentAs' => 'member',
                                'properties' => array(
                                    'Name' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                        'Instances' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'Instance',
                                'type' => 'object',
                                'sentAs' => 'member',
                                'properties' => array(
                                    'Id' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                        'LaunchConfigurations' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'LaunchConfiguration',
                                'type' => 'object',
                                'sentAs' => 'member',
                                'properties' => array(
                                    'Name' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                        'LoadBalancers' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'LoadBalancer',
                                'type' => 'object',
                                'sentAs' => 'member',
                                'properties' => array(
                                    'Name' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                        'Triggers' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'Trigger',
                                'type' => 'object',
                                'sentAs' => 'member',
                                'properties' => array(
                                    'Name' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                        'Queues' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'Queue',
                                'type' => 'object',
                                'sentAs' => 'member',
                                'properties' => array(
                                    'Name' => array(
                                        'type' => 'string',
                                    ),
                                    'URL' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'EnvironmentDescriptionsMessage' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Environments' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'EnvironmentDescription',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'EnvironmentName' => array(
                                'type' => 'string',
                            ),
                            'EnvironmentId' => array(
                                'type' => 'string',
                            ),
                            'ApplicationName' => array(
                                'type' => 'string',
                            ),
                            'VersionLabel' => array(
                                'type' => 'string',
                            ),
                            'SolutionStackName' => array(
                                'type' => 'string',
                            ),
                            'TemplateName' => array(
                                'type' => 'string',
                            ),
                            'Description' => array(
                                'type' => 'string',
                            ),
                            'EndpointURL' => array(
                                'type' => 'string',
                            ),
                            'CNAME' => array(
                                'type' => 'string',
                            ),
                            'DateCreated' => array(
                                'type' => 'string',
                            ),
                            'DateUpdated' => array(
                                'type' => 'string',
                            ),
                            'Status' => array(
                                'type' => 'string',
                            ),
                            'Health' => array(
                                'type' => 'string',
                            ),
                            'Resources' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'LoadBalancer' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'LoadBalancerName' => array(
                                                'type' => 'string',
                                            ),
                                            'Domain' => array(
                                                'type' => 'string',
                                            ),
                                            'Listeners' => array(
                                                'type' => 'array',
                                                'items' => array(
                                                    'name' => 'Listener',
                                                    'type' => 'object',
                                                    'sentAs' => 'member',
                                                    'properties' => array(
                                                        'Protocol' => array(
                                                            'type' => 'string',
                                                        ),
                                                        'Port' => array(
                                                            'type' => 'numeric',
                                                        ),
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            'Tier' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'Name' => array(
                                        'type' => 'string',
                                    ),
                                    'Type' => array(
                                        'type' => 'string',
                                    ),
                                    'Version' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'EventDescriptionsMessage' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Events' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'EventDescription',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'EventDate' => array(
                                'type' => 'string',
                            ),
                            'Message' => array(
                                'type' => 'string',
                            ),
                            'ApplicationName' => array(
                                'type' => 'string',
                            ),
                            'VersionLabel' => array(
                                'type' => 'string',
                            ),
                            'TemplateName' => array(
                                'type' => 'string',
                            ),
                            'EnvironmentName' => array(
                                'type' => 'string',
                            ),
                            'RequestId' => array(
                                'type' => 'string',
                            ),
                            'Severity' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'ListAvailableSolutionStacksResultMessage' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'SolutionStacks' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'SolutionStackName',
                        'type' => 'string',
                        'sentAs' => 'member',
                    ),
                ),
                'SolutionStackDetails' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'SolutionStackDescription',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'SolutionStackName' => array(
                                'type' => 'string',
                            ),
                            'PermittedFileTypes' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'FileTypeExtension',
                                    'type' => 'string',
                                    'sentAs' => 'member',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'RetrieveEnvironmentInfoResultMessage' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'EnvironmentInfo' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'EnvironmentInfoDescription',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'InfoType' => array(
                                'type' => 'string',
                            ),
                            'Ec2InstanceId' => array(
                                'type' => 'string',
                            ),
                            'SampleTimestamp' => array(
                                'type' => 'string',
                            ),
                            'Message' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'ConfigurationSettingsValidationMessages' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Messages' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'ValidationMessage',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'Message' => array(
                                'type' => 'string',
                            ),
                            'Severity' => array(
                                'type' => 'string',
                            ),
                            'Namespace' => array(
                                'type' => 'string',
                            ),
                            'OptionName' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'iterators' => array(
        'DescribeApplicationVersions' => array(
            'result_key' => 'ApplicationVersions',
        ),
        'DescribeApplications' => array(
            'result_key' => 'Applications',
        ),
        'DescribeConfigurationOptions' => array(
            'result_key' => 'Options',
        ),
        'DescribeEnvironments' => array(
            'result_key' => 'Environments',
        ),
        'DescribeEvents' => array(
            'input_token' => 'NextToken',
            'output_token' => 'NextToken',
            'limit_key' => 'MaxRecords',
            'result_key' => 'Events',
        ),
        'ListAvailableSolutionStacks' => array(
            'result_key' => 'SolutionStacks',
        ),
    ),
    'waiters' => array(
        '__default__' => array(
            'interval' => 20,
            'max_attempts' => 40,
            'acceptor.type' => 'output',
        ),
        '__EnvironmentState' => array(
            'operation' => 'DescribeEnvironments',
            'acceptor.path' => 'Environments/*/Status',
        ),
        'EnvironmentReady' => array(
            'extends' => '__EnvironmentState',
            'success.value' => 'Ready',
            'failure.value' => array(
                'Terminated',
                'Terminating',
            ),
        ),
        'EnvironmentTerminated' => array(
            'extends' => '__EnvironmentState',
            'success.value' => 'Terminated',
            'failure.value' => array(
                'Launching',
                'Updating',
            ),
        ),
    ),
);
