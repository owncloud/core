<?php
/**
 * Copyright 2010-2014 Amazon.com, Inc. or its affiliates. All Rights Reserved.
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
    'apiVersion' => '2014-10-06',
    'endpointPrefix' => 'codedeploy',
    'serviceFullName' => 'AWS CodeDeploy',
    'serviceAbbreviation' => 'CodeDeploy',
    'serviceType' => 'json',
    'jsonVersion' => '1.1',
    'targetPrefix' => 'CodeDeploy_20141006.',
    'timestampFormat' => 'unixTimestamp',
    'signatureVersion' => 'v4',
    'namespace' => 'CodeDeploy',
    'operations' => array(
        'BatchGetApplications' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'BatchGetApplicationsOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'CodeDeploy_20141006.BatchGetApplications',
                ),
                'applicationNames' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'ApplicationName',
                        'type' => 'string',
                        'minLength' => 1,
                        'maxLength' => 100,
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The minimum number of required application names was not specified.',
                    'class' => 'ApplicationNameRequiredException',
                ),
                array(
                    'reason' => 'The application name was specified in an invalid format.',
                    'class' => 'InvalidApplicationNameException',
                ),
                array(
                    'reason' => 'The application does not exist within the AWS user account.',
                    'class' => 'ApplicationDoesNotExistException',
                ),
            ),
        ),
        'BatchGetDeployments' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'BatchGetDeploymentsOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'CodeDeploy_20141006.BatchGetDeployments',
                ),
                'deploymentIds' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'DeploymentId',
                        'type' => 'string',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'At least one deployment ID must be specified.',
                    'class' => 'DeploymentIdRequiredException',
                ),
                array(
                    'reason' => 'At least one of the deployment IDs was specified in an invalid format.',
                    'class' => 'InvalidDeploymentIdException',
                ),
            ),
        ),
        'CreateApplication' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'CreateApplicationOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'CodeDeploy_20141006.CreateApplication',
                ),
                'applicationName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The minimum number of required application names was not specified.',
                    'class' => 'ApplicationNameRequiredException',
                ),
                array(
                    'reason' => 'The application name was specified in an invalid format.',
                    'class' => 'InvalidApplicationNameException',
                ),
                array(
                    'reason' => 'An application with the specified name already exists within the AWS user account.',
                    'class' => 'ApplicationAlreadyExistsException',
                ),
                array(
                    'reason' => 'More applications were attempted to be created than were allowed.',
                    'class' => 'ApplicationLimitExceededException',
                ),
            ),
        ),
        'CreateDeployment' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'CreateDeploymentOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'CodeDeploy_20141006.CreateDeployment',
                ),
                'applicationName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
                'deploymentGroupName' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
                'revision' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'revisionType' => array(
                            'type' => 'string',
                        ),
                        's3Location' => array(
                            'type' => 'object',
                            'properties' => array(
                                'bucket' => array(
                                    'type' => 'string',
                                ),
                                'key' => array(
                                    'type' => 'string',
                                ),
                                'bundleType' => array(
                                    'type' => 'string',
                                ),
                                'version' => array(
                                    'type' => 'string',
                                ),
                                'eTag' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'gitHubLocation' => array(
                            'type' => 'object',
                            'properties' => array(
                                'repository' => array(
                                    'type' => 'string',
                                ),
                                'commitId' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                    ),
                ),
                'deploymentConfigName' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
                'description' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'ignoreApplicationStopFailures' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The minimum number of required application names was not specified.',
                    'class' => 'ApplicationNameRequiredException',
                ),
                array(
                    'reason' => 'The application name was specified in an invalid format.',
                    'class' => 'InvalidApplicationNameException',
                ),
                array(
                    'reason' => 'The application does not exist within the AWS user account.',
                    'class' => 'ApplicationDoesNotExistException',
                ),
                array(
                    'reason' => 'The deployment group name was not specified.',
                    'class' => 'DeploymentGroupNameRequiredException',
                ),
                array(
                    'reason' => 'The deployment group name was specified in an invalid format.',
                    'class' => 'InvalidDeploymentGroupNameException',
                ),
                array(
                    'reason' => 'The named deployment group does not exist within the AWS user account.',
                    'class' => 'DeploymentGroupDoesNotExistException',
                ),
                array(
                    'reason' => 'The revision ID was not specified.',
                    'class' => 'RevisionRequiredException',
                ),
                array(
                    'reason' => 'The revision was specified in an invalid format.',
                    'class' => 'InvalidRevisionException',
                ),
                array(
                    'reason' => 'The deployment configuration name was specified in an invalid format.',
                    'class' => 'InvalidDeploymentConfigNameException',
                ),
                array(
                    'reason' => 'The deployment configuration does not exist within the AWS user account.',
                    'class' => 'DeploymentConfigDoesNotExistException',
                ),
                array(
                    'reason' => 'The description that was provided is too long.',
                    'class' => 'DescriptionTooLongException',
                ),
                array(
                    'reason' => 'The number of allowed deployments was exceeded.',
                    'class' => 'DeploymentLimitExceededException',
                ),
            ),
        ),
        'CreateDeploymentConfig' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'CreateDeploymentConfigOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'CodeDeploy_20141006.CreateDeploymentConfig',
                ),
                'deploymentConfigName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
                'minimumHealthyHosts' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        '' => array(
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The deployment configuration name was specified in an invalid format.',
                    'class' => 'InvalidDeploymentConfigNameException',
                ),
                array(
                    'reason' => 'The deployment configuration name was not specified.',
                    'class' => 'DeploymentConfigNameRequiredException',
                ),
                array(
                    'reason' => 'A deployment configuration with the specified name already exists within the AWS user account.',
                    'class' => 'DeploymentConfigAlreadyExistsException',
                ),
                array(
                    'reason' => 'The minimum healthy instances value was specified in an invalid format.',
                    'class' => 'InvalidMinimumHealthyHostValueException',
                ),
                array(
                    'reason' => 'The deployment configurations limit was exceeded.',
                    'class' => 'DeploymentConfigLimitExceededException',
                ),
            ),
        ),
        'CreateDeploymentGroup' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'CreateDeploymentGroupOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'CodeDeploy_20141006.CreateDeploymentGroup',
                ),
                'applicationName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
                'deploymentGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
                'deploymentConfigName' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
                'ec2TagFilters' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'EC2TagFilter',
                        'type' => 'object',
                        'properties' => array(
                            'Key' => array(
                                'type' => 'string',
                            ),
                            'Value' => array(
                                'type' => 'string',
                            ),
                            'Type' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'autoScalingGroups' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'AutoScalingGroupName',
                        'type' => 'string',
                    ),
                ),
                'serviceRoleArn' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The minimum number of required application names was not specified.',
                    'class' => 'ApplicationNameRequiredException',
                ),
                array(
                    'reason' => 'The application name was specified in an invalid format.',
                    'class' => 'InvalidApplicationNameException',
                ),
                array(
                    'reason' => 'The application does not exist within the AWS user account.',
                    'class' => 'ApplicationDoesNotExistException',
                ),
                array(
                    'reason' => 'The deployment group name was not specified.',
                    'class' => 'DeploymentGroupNameRequiredException',
                ),
                array(
                    'reason' => 'The deployment group name was specified in an invalid format.',
                    'class' => 'InvalidDeploymentGroupNameException',
                ),
                array(
                    'reason' => 'A deployment group group with the specified name already exists within the AWS user account.',
                    'class' => 'DeploymentGroupAlreadyExistsException',
                ),
                array(
                    'reason' => 'The Amazon EC2 tag was specified in an invalid format.',
                    'class' => 'InvalidEC2TagException',
                ),
                array(
                    'reason' => 'The Auto Scaling group was specified in an invalid format or does not exist.',
                    'class' => 'InvalidAutoScalingGroupException',
                ),
                array(
                    'reason' => 'The deployment configuration name was specified in an invalid format.',
                    'class' => 'InvalidDeploymentConfigNameException',
                ),
                array(
                    'reason' => 'The deployment configuration does not exist within the AWS user account.',
                    'class' => 'DeploymentConfigDoesNotExistException',
                ),
                array(
                    'reason' => 'The role ID was not specified.',
                    'class' => 'RoleRequiredException',
                ),
                array(
                    'reason' => 'The service role ARN was specified in an invalid format. Or, if an Auto Scaling group was specified, the specified service role does not grant the appropriate permissions to Auto Scaling.',
                    'class' => 'InvalidRoleException',
                ),
                array(
                    'reason' => 'The deployment groups limit was exceeded.',
                    'class' => 'DeploymentGroupLimitExceededException',
                ),
            ),
        ),
        'DeleteApplication' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'CodeDeploy_20141006.DeleteApplication',
                ),
                'applicationName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The minimum number of required application names was not specified.',
                    'class' => 'ApplicationNameRequiredException',
                ),
                array(
                    'reason' => 'The application name was specified in an invalid format.',
                    'class' => 'InvalidApplicationNameException',
                ),
            ),
        ),
        'DeleteDeploymentConfig' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'CodeDeploy_20141006.DeleteDeploymentConfig',
                ),
                'deploymentConfigName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The deployment configuration name was specified in an invalid format.',
                    'class' => 'InvalidDeploymentConfigNameException',
                ),
                array(
                    'reason' => 'The deployment configuration name was not specified.',
                    'class' => 'DeploymentConfigNameRequiredException',
                ),
                array(
                    'reason' => 'The deployment configuration is still in use.',
                    'class' => 'DeploymentConfigInUseException',
                ),
                array(
                    'reason' => 'An invalid operation was detected.',
                    'class' => 'InvalidOperationException',
                ),
            ),
        ),
        'DeleteDeploymentGroup' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DeleteDeploymentGroupOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'CodeDeploy_20141006.DeleteDeploymentGroup',
                ),
                'applicationName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
                'deploymentGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The minimum number of required application names was not specified.',
                    'class' => 'ApplicationNameRequiredException',
                ),
                array(
                    'reason' => 'The application name was specified in an invalid format.',
                    'class' => 'InvalidApplicationNameException',
                ),
                array(
                    'reason' => 'The deployment group name was not specified.',
                    'class' => 'DeploymentGroupNameRequiredException',
                ),
                array(
                    'reason' => 'The deployment group name was specified in an invalid format.',
                    'class' => 'InvalidDeploymentGroupNameException',
                ),
                array(
                    'reason' => 'The service role ARN was specified in an invalid format. Or, if an Auto Scaling group was specified, the specified service role does not grant the appropriate permissions to Auto Scaling.',
                    'class' => 'InvalidRoleException',
                ),
            ),
        ),
        'GetApplication' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'GetApplicationOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'CodeDeploy_20141006.GetApplication',
                ),
                'applicationName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The minimum number of required application names was not specified.',
                    'class' => 'ApplicationNameRequiredException',
                ),
                array(
                    'reason' => 'The application name was specified in an invalid format.',
                    'class' => 'InvalidApplicationNameException',
                ),
                array(
                    'reason' => 'The application does not exist within the AWS user account.',
                    'class' => 'ApplicationDoesNotExistException',
                ),
            ),
        ),
        'GetApplicationRevision' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'GetApplicationRevisionOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'CodeDeploy_20141006.GetApplicationRevision',
                ),
                'applicationName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
                'revision' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'revisionType' => array(
                            'type' => 'string',
                        ),
                        's3Location' => array(
                            'type' => 'object',
                            'properties' => array(
                                'bucket' => array(
                                    'type' => 'string',
                                ),
                                'key' => array(
                                    'type' => 'string',
                                ),
                                'bundleType' => array(
                                    'type' => 'string',
                                ),
                                'version' => array(
                                    'type' => 'string',
                                ),
                                'eTag' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'gitHubLocation' => array(
                            'type' => 'object',
                            'properties' => array(
                                'repository' => array(
                                    'type' => 'string',
                                ),
                                'commitId' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The application does not exist within the AWS user account.',
                    'class' => 'ApplicationDoesNotExistException',
                ),
                array(
                    'reason' => 'The minimum number of required application names was not specified.',
                    'class' => 'ApplicationNameRequiredException',
                ),
                array(
                    'reason' => 'The application name was specified in an invalid format.',
                    'class' => 'InvalidApplicationNameException',
                ),
                array(
                    'reason' => 'The named revision does not exist within the AWS user account.',
                    'class' => 'RevisionDoesNotExistException',
                ),
                array(
                    'reason' => 'The revision ID was not specified.',
                    'class' => 'RevisionRequiredException',
                ),
                array(
                    'reason' => 'The revision was specified in an invalid format.',
                    'class' => 'InvalidRevisionException',
                ),
            ),
        ),
        'GetDeployment' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'GetDeploymentOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'CodeDeploy_20141006.GetDeployment',
                ),
                'deploymentId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'At least one deployment ID must be specified.',
                    'class' => 'DeploymentIdRequiredException',
                ),
                array(
                    'reason' => 'At least one of the deployment IDs was specified in an invalid format.',
                    'class' => 'InvalidDeploymentIdException',
                ),
                array(
                    'reason' => 'The deployment does not exist within the AWS user account.',
                    'class' => 'DeploymentDoesNotExistException',
                ),
            ),
        ),
        'GetDeploymentConfig' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'GetDeploymentConfigOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'CodeDeploy_20141006.GetDeploymentConfig',
                ),
                'deploymentConfigName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The deployment configuration name was specified in an invalid format.',
                    'class' => 'InvalidDeploymentConfigNameException',
                ),
                array(
                    'reason' => 'The deployment configuration name was not specified.',
                    'class' => 'DeploymentConfigNameRequiredException',
                ),
                array(
                    'reason' => 'The deployment configuration does not exist within the AWS user account.',
                    'class' => 'DeploymentConfigDoesNotExistException',
                ),
            ),
        ),
        'GetDeploymentGroup' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'GetDeploymentGroupOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'CodeDeploy_20141006.GetDeploymentGroup',
                ),
                'applicationName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
                'deploymentGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The minimum number of required application names was not specified.',
                    'class' => 'ApplicationNameRequiredException',
                ),
                array(
                    'reason' => 'The application name was specified in an invalid format.',
                    'class' => 'InvalidApplicationNameException',
                ),
                array(
                    'reason' => 'The application does not exist within the AWS user account.',
                    'class' => 'ApplicationDoesNotExistException',
                ),
                array(
                    'reason' => 'The deployment group name was not specified.',
                    'class' => 'DeploymentGroupNameRequiredException',
                ),
                array(
                    'reason' => 'The deployment group name was specified in an invalid format.',
                    'class' => 'InvalidDeploymentGroupNameException',
                ),
                array(
                    'reason' => 'The named deployment group does not exist within the AWS user account.',
                    'class' => 'DeploymentGroupDoesNotExistException',
                ),
            ),
        ),
        'GetDeploymentInstance' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'GetDeploymentInstanceOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'CodeDeploy_20141006.GetDeploymentInstance',
                ),
                'deploymentId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'instanceId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'At least one deployment ID must be specified.',
                    'class' => 'DeploymentIdRequiredException',
                ),
                array(
                    'reason' => 'The deployment does not exist within the AWS user account.',
                    'class' => 'DeploymentDoesNotExistException',
                ),
                array(
                    'reason' => 'The instance ID was not specified.',
                    'class' => 'InstanceIdRequiredException',
                ),
                array(
                    'reason' => 'At least one of the deployment IDs was specified in an invalid format.',
                    'class' => 'InvalidDeploymentIdException',
                ),
                array(
                    'reason' => 'The specified instance does not exist in the deployment group.',
                    'class' => 'InstanceDoesNotExistException',
                ),
            ),
        ),
        'ListApplicationRevisions' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ListApplicationRevisionsOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'CodeDeploy_20141006.ListApplicationRevisions',
                ),
                'applicationName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
                'sortBy' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'sortOrder' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                's3Bucket' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                's3KeyPrefix' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'deployed' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'nextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The application does not exist within the AWS user account.',
                    'class' => 'ApplicationDoesNotExistException',
                ),
                array(
                    'reason' => 'The minimum number of required application names was not specified.',
                    'class' => 'ApplicationNameRequiredException',
                ),
                array(
                    'reason' => 'The application name was specified in an invalid format.',
                    'class' => 'InvalidApplicationNameException',
                ),
                array(
                    'reason' => 'The column name to sort by is either not present or was specified in an invalid format.',
                    'class' => 'InvalidSortByException',
                ),
                array(
                    'reason' => 'The sort order was specified in an invalid format.',
                    'class' => 'InvalidSortOrderException',
                ),
                array(
                    'reason' => 'The bucket name either doesn\'t exist or was specified in an invalid format.',
                    'class' => 'InvalidBucketNameFilterException',
                ),
                array(
                    'reason' => 'The specified key prefix filter was specified in an invalid format.',
                    'class' => 'InvalidKeyPrefixFilterException',
                ),
                array(
                    'reason' => 'A bucket name is required but was not provided.',
                    'class' => 'BucketNameFilterRequiredException',
                ),
                array(
                    'reason' => 'The deployed state filter was specified in an invalid format.',
                    'class' => 'InvalidDeployedStateFilterException',
                ),
                array(
                    'reason' => 'The next token was specified in an invalid format.',
                    'class' => 'InvalidNextTokenException',
                ),
            ),
        ),
        'ListApplications' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ListApplicationsOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'CodeDeploy_20141006.ListApplications',
                ),
                'nextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The next token was specified in an invalid format.',
                    'class' => 'InvalidNextTokenException',
                ),
            ),
        ),
        'ListDeploymentConfigs' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ListDeploymentConfigsOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'CodeDeploy_20141006.ListDeploymentConfigs',
                ),
                'nextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The next token was specified in an invalid format.',
                    'class' => 'InvalidNextTokenException',
                ),
            ),
        ),
        'ListDeploymentGroups' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ListDeploymentGroupsOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'CodeDeploy_20141006.ListDeploymentGroups',
                ),
                'applicationName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
                'nextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The minimum number of required application names was not specified.',
                    'class' => 'ApplicationNameRequiredException',
                ),
                array(
                    'reason' => 'The application name was specified in an invalid format.',
                    'class' => 'InvalidApplicationNameException',
                ),
                array(
                    'reason' => 'The application does not exist within the AWS user account.',
                    'class' => 'ApplicationDoesNotExistException',
                ),
                array(
                    'reason' => 'The next token was specified in an invalid format.',
                    'class' => 'InvalidNextTokenException',
                ),
            ),
        ),
        'ListDeploymentInstances' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ListDeploymentInstancesOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'CodeDeploy_20141006.ListDeploymentInstances',
                ),
                'deploymentId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'nextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'instanceStatusFilter' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'InstanceStatus',
                        'type' => 'string',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'At least one deployment ID must be specified.',
                    'class' => 'DeploymentIdRequiredException',
                ),
                array(
                    'reason' => 'The deployment does not exist within the AWS user account.',
                    'class' => 'DeploymentDoesNotExistException',
                ),
                array(
                    'reason' => 'The specified deployment has not started.',
                    'class' => 'DeploymentNotStartedException',
                ),
                array(
                    'reason' => 'The next token was specified in an invalid format.',
                    'class' => 'InvalidNextTokenException',
                ),
                array(
                    'reason' => 'At least one of the deployment IDs was specified in an invalid format.',
                    'class' => 'InvalidDeploymentIdException',
                ),
                array(
                    'reason' => 'The specified instance status does not exist.',
                    'class' => 'InvalidInstanceStatusException',
                ),
            ),
        ),
        'ListDeployments' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ListDeploymentsOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'CodeDeploy_20141006.ListDeployments',
                ),
                'applicationName' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
                'deploymentGroupName' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
                'includeOnlyStatuses' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'DeploymentStatus',
                        'type' => 'string',
                    ),
                ),
                'createTimeRange' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'start' => array(
                            'type' => array(
                                'object',
                                'string',
                                'integer',
                            ),
                            'format' => 'timestamp',
                        ),
                        'end' => array(
                            'type' => array(
                                'object',
                                'string',
                                'integer',
                            ),
                            'format' => 'timestamp',
                        ),
                    ),
                ),
                'nextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The minimum number of required application names was not specified.',
                    'class' => 'ApplicationNameRequiredException',
                ),
                array(
                    'reason' => 'The application name was specified in an invalid format.',
                    'class' => 'InvalidApplicationNameException',
                ),
                array(
                    'reason' => 'The application does not exist within the AWS user account.',
                    'class' => 'ApplicationDoesNotExistException',
                ),
                array(
                    'reason' => 'The deployment group name was specified in an invalid format.',
                    'class' => 'InvalidDeploymentGroupNameException',
                ),
                array(
                    'reason' => 'The named deployment group does not exist within the AWS user account.',
                    'class' => 'DeploymentGroupDoesNotExistException',
                ),
                array(
                    'reason' => 'The deployment group name was not specified.',
                    'class' => 'DeploymentGroupNameRequiredException',
                ),
                array(
                    'reason' => 'The specified time range was specified in an invalid format.',
                    'class' => 'InvalidTimeRangeException',
                ),
                array(
                    'reason' => 'The specified deployment status doesn\'t exist or cannot be determined.',
                    'class' => 'InvalidDeploymentStatusException',
                ),
                array(
                    'reason' => 'The next token was specified in an invalid format.',
                    'class' => 'InvalidNextTokenException',
                ),
            ),
        ),
        'RegisterApplicationRevision' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'CodeDeploy_20141006.RegisterApplicationRevision',
                ),
                'applicationName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
                'description' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'revision' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'revisionType' => array(
                            'type' => 'string',
                        ),
                        's3Location' => array(
                            'type' => 'object',
                            'properties' => array(
                                'bucket' => array(
                                    'type' => 'string',
                                ),
                                'key' => array(
                                    'type' => 'string',
                                ),
                                'bundleType' => array(
                                    'type' => 'string',
                                ),
                                'version' => array(
                                    'type' => 'string',
                                ),
                                'eTag' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'gitHubLocation' => array(
                            'type' => 'object',
                            'properties' => array(
                                'repository' => array(
                                    'type' => 'string',
                                ),
                                'commitId' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The application does not exist within the AWS user account.',
                    'class' => 'ApplicationDoesNotExistException',
                ),
                array(
                    'reason' => 'The minimum number of required application names was not specified.',
                    'class' => 'ApplicationNameRequiredException',
                ),
                array(
                    'reason' => 'The application name was specified in an invalid format.',
                    'class' => 'InvalidApplicationNameException',
                ),
                array(
                    'reason' => 'The description that was provided is too long.',
                    'class' => 'DescriptionTooLongException',
                ),
                array(
                    'reason' => 'The revision ID was not specified.',
                    'class' => 'RevisionRequiredException',
                ),
                array(
                    'reason' => 'The revision was specified in an invalid format.',
                    'class' => 'InvalidRevisionException',
                ),
            ),
        ),
        'StopDeployment' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'StopDeploymentOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'CodeDeploy_20141006.StopDeployment',
                ),
                'deploymentId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'At least one deployment ID must be specified.',
                    'class' => 'DeploymentIdRequiredException',
                ),
                array(
                    'reason' => 'The deployment does not exist within the AWS user account.',
                    'class' => 'DeploymentDoesNotExistException',
                ),
                array(
                    'reason' => 'The deployment is already completed.',
                    'class' => 'DeploymentAlreadyCompletedException',
                ),
                array(
                    'reason' => 'At least one of the deployment IDs was specified in an invalid format.',
                    'class' => 'InvalidDeploymentIdException',
                ),
            ),
        ),
        'UpdateApplication' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'CodeDeploy_20141006.UpdateApplication',
                ),
                'applicationName' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
                'newApplicationName' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The minimum number of required application names was not specified.',
                    'class' => 'ApplicationNameRequiredException',
                ),
                array(
                    'reason' => 'The application name was specified in an invalid format.',
                    'class' => 'InvalidApplicationNameException',
                ),
                array(
                    'reason' => 'An application with the specified name already exists within the AWS user account.',
                    'class' => 'ApplicationAlreadyExistsException',
                ),
                array(
                    'reason' => 'The application does not exist within the AWS user account.',
                    'class' => 'ApplicationDoesNotExistException',
                ),
            ),
        ),
        'UpdateDeploymentGroup' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'UpdateDeploymentGroupOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'CodeDeploy_20141006.UpdateDeploymentGroup',
                ),
                'applicationName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
                'currentDeploymentGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
                'newDeploymentGroupName' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
                'deploymentConfigName' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
                'ec2TagFilters' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'EC2TagFilter',
                        'type' => 'object',
                        'properties' => array(
                            'Key' => array(
                                'type' => 'string',
                            ),
                            'Value' => array(
                                'type' => 'string',
                            ),
                            'Type' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'autoScalingGroups' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'AutoScalingGroupName',
                        'type' => 'string',
                    ),
                ),
                'serviceRoleArn' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The minimum number of required application names was not specified.',
                    'class' => 'ApplicationNameRequiredException',
                ),
                array(
                    'reason' => 'The application name was specified in an invalid format.',
                    'class' => 'InvalidApplicationNameException',
                ),
                array(
                    'reason' => 'The application does not exist within the AWS user account.',
                    'class' => 'ApplicationDoesNotExistException',
                ),
                array(
                    'reason' => 'The deployment group name was specified in an invalid format.',
                    'class' => 'InvalidDeploymentGroupNameException',
                ),
                array(
                    'reason' => 'A deployment group group with the specified name already exists within the AWS user account.',
                    'class' => 'DeploymentGroupAlreadyExistsException',
                ),
                array(
                    'reason' => 'The deployment group name was not specified.',
                    'class' => 'DeploymentGroupNameRequiredException',
                ),
                array(
                    'reason' => 'The Amazon EC2 tag was specified in an invalid format.',
                    'class' => 'InvalidEC2TagException',
                ),
                array(
                    'reason' => 'The Auto Scaling group was specified in an invalid format or does not exist.',
                    'class' => 'InvalidAutoScalingGroupException',
                ),
                array(
                    'reason' => 'The deployment configuration name was specified in an invalid format.',
                    'class' => 'InvalidDeploymentConfigNameException',
                ),
                array(
                    'reason' => 'The deployment configuration does not exist within the AWS user account.',
                    'class' => 'DeploymentConfigDoesNotExistException',
                ),
                array(
                    'reason' => 'The service role ARN was specified in an invalid format. Or, if an Auto Scaling group was specified, the specified service role does not grant the appropriate permissions to Auto Scaling.',
                    'class' => 'InvalidRoleException',
                ),
            ),
        ),
    ),
    'models' => array(
        'BatchGetApplicationsOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'applicationsInfo' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'ApplicationInfo',
                        'type' => 'object',
                        'properties' => array(
                            'applicationId' => array(
                                'type' => 'string',
                            ),
                            'applicationName' => array(
                                'type' => 'string',
                            ),
                            'createTime' => array(
                                'type' => 'string',
                            ),
                            'linkedToGitHub' => array(
                                'type' => 'boolean',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'BatchGetDeploymentsOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'deploymentsInfo' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'DeploymentInfo',
                        'type' => 'object',
                        'properties' => array(
                            'applicationName' => array(
                                'type' => 'string',
                            ),
                            'deploymentGroupName' => array(
                                'type' => 'string',
                            ),
                            'deploymentConfigName' => array(
                                'type' => 'string',
                            ),
                            'deploymentId' => array(
                                'type' => 'string',
                            ),
                            'revision' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'revisionType' => array(
                                        'type' => 'string',
                                    ),
                                    's3Location' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'bucket' => array(
                                                'type' => 'string',
                                            ),
                                            'key' => array(
                                                'type' => 'string',
                                            ),
                                            'bundleType' => array(
                                                'type' => 'string',
                                            ),
                                            'version' => array(
                                                'type' => 'string',
                                            ),
                                            'eTag' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'gitHubLocation' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'repository' => array(
                                                'type' => 'string',
                                            ),
                                            'commitId' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            'status' => array(
                                'type' => 'string',
                            ),
                            'errorInformation' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'code' => array(
                                        'type' => 'string',
                                    ),
                                    'message' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'createTime' => array(
                                'type' => 'string',
                            ),
                            'startTime' => array(
                                'type' => 'string',
                            ),
                            'completeTime' => array(
                                'type' => 'string',
                            ),
                            'deploymentOverview' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'Pending' => array(
                                        'type' => 'numeric',
                                    ),
                                    'InProgress' => array(
                                        'type' => 'numeric',
                                    ),
                                    'Succeeded' => array(
                                        'type' => 'numeric',
                                    ),
                                    'Failed' => array(
                                        'type' => 'numeric',
                                    ),
                                    'Skipped' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'description' => array(
                                'type' => 'string',
                            ),
                            'creator' => array(
                                'type' => 'string',
                            ),
                            'ignoreApplicationStopFailures' => array(
                                'type' => 'boolean',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'CreateApplicationOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'applicationId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'CreateDeploymentOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'deploymentId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'CreateDeploymentConfigOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'deploymentConfigId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'CreateDeploymentGroupOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'deploymentGroupId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'EmptyOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
        ),
        'DeleteDeploymentGroupOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'hooksNotCleanedUp' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'AutoScalingGroup',
                        'type' => 'object',
                        'properties' => array(
                            'name' => array(
                                'type' => 'string',
                            ),
                            'hook' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'GetApplicationOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'application' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'applicationId' => array(
                            'type' => 'string',
                        ),
                        'applicationName' => array(
                            'type' => 'string',
                        ),
                        'createTime' => array(
                            'type' => 'string',
                        ),
                        'linkedToGitHub' => array(
                            'type' => 'boolean',
                        ),
                    ),
                ),
            ),
        ),
        'GetApplicationRevisionOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'applicationName' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'revision' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'revisionType' => array(
                            'type' => 'string',
                        ),
                        's3Location' => array(
                            'type' => 'object',
                            'properties' => array(
                                'bucket' => array(
                                    'type' => 'string',
                                ),
                                'key' => array(
                                    'type' => 'string',
                                ),
                                'bundleType' => array(
                                    'type' => 'string',
                                ),
                                'version' => array(
                                    'type' => 'string',
                                ),
                                'eTag' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'gitHubLocation' => array(
                            'type' => 'object',
                            'properties' => array(
                                'repository' => array(
                                    'type' => 'string',
                                ),
                                'commitId' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                    ),
                ),
                'revisionInfo' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'description' => array(
                            'type' => 'string',
                        ),
                        'deploymentGroups' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'DeploymentGroupName',
                                'type' => 'string',
                            ),
                        ),
                        'firstUsedTime' => array(
                            'type' => 'string',
                        ),
                        'lastUsedTime' => array(
                            'type' => 'string',
                        ),
                        'registerTime' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
        'GetDeploymentOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'deploymentInfo' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'applicationName' => array(
                            'type' => 'string',
                        ),
                        'deploymentGroupName' => array(
                            'type' => 'string',
                        ),
                        'deploymentConfigName' => array(
                            'type' => 'string',
                        ),
                        'deploymentId' => array(
                            'type' => 'string',
                        ),
                        'revision' => array(
                            'type' => 'object',
                            'properties' => array(
                                'revisionType' => array(
                                    'type' => 'string',
                                ),
                                's3Location' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'bucket' => array(
                                            'type' => 'string',
                                        ),
                                        'key' => array(
                                            'type' => 'string',
                                        ),
                                        'bundleType' => array(
                                            'type' => 'string',
                                        ),
                                        'version' => array(
                                            'type' => 'string',
                                        ),
                                        'eTag' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                                'gitHubLocation' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'repository' => array(
                                            'type' => 'string',
                                        ),
                                        'commitId' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'status' => array(
                            'type' => 'string',
                        ),
                        'errorInformation' => array(
                            'type' => 'object',
                            'properties' => array(
                                'code' => array(
                                    'type' => 'string',
                                ),
                                'message' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'createTime' => array(
                            'type' => 'string',
                        ),
                        'startTime' => array(
                            'type' => 'string',
                        ),
                        'completeTime' => array(
                            'type' => 'string',
                        ),
                        'deploymentOverview' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Pending' => array(
                                    'type' => 'numeric',
                                ),
                                'InProgress' => array(
                                    'type' => 'numeric',
                                ),
                                'Succeeded' => array(
                                    'type' => 'numeric',
                                ),
                                'Failed' => array(
                                    'type' => 'numeric',
                                ),
                                'Skipped' => array(
                                    'type' => 'numeric',
                                ),
                            ),
                        ),
                        'description' => array(
                            'type' => 'string',
                        ),
                        'creator' => array(
                            'type' => 'string',
                        ),
                        'ignoreApplicationStopFailures' => array(
                            'type' => 'boolean',
                        ),
                    ),
                ),
            ),
        ),
        'GetDeploymentConfigOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'deploymentConfigInfo' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'deploymentConfigId' => array(
                            'type' => 'string',
                        ),
                        'deploymentConfigName' => array(
                            'type' => 'string',
                        ),
                        'minimumHealthyHosts' => array(
                            'type' => 'object',
                            'properties' => array(
                                '' => array(
                                ),
                            ),
                        ),
                        'createTime' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
        'GetDeploymentGroupOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'deploymentGroupInfo' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'applicationName' => array(
                            'type' => 'string',
                        ),
                        'deploymentGroupId' => array(
                            'type' => 'string',
                        ),
                        'deploymentGroupName' => array(
                            'type' => 'string',
                        ),
                        'deploymentConfigName' => array(
                            'type' => 'string',
                        ),
                        'ec2TagFilters' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'EC2TagFilter',
                                'type' => 'object',
                                'properties' => array(
                                    'Key' => array(
                                        'type' => 'string',
                                    ),
                                    'Value' => array(
                                        'type' => 'string',
                                    ),
                                    'Type' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                        'autoScalingGroups' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'AutoScalingGroup',
                                'type' => 'object',
                                'properties' => array(
                                    'name' => array(
                                        'type' => 'string',
                                    ),
                                    'hook' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                        'serviceRoleArn' => array(
                            'type' => 'string',
                        ),
                        'targetRevision' => array(
                            'type' => 'object',
                            'properties' => array(
                                'revisionType' => array(
                                    'type' => 'string',
                                ),
                                's3Location' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'bucket' => array(
                                            'type' => 'string',
                                        ),
                                        'key' => array(
                                            'type' => 'string',
                                        ),
                                        'bundleType' => array(
                                            'type' => 'string',
                                        ),
                                        'version' => array(
                                            'type' => 'string',
                                        ),
                                        'eTag' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                                'gitHubLocation' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'repository' => array(
                                            'type' => 'string',
                                        ),
                                        'commitId' => array(
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
        'GetDeploymentInstanceOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'instanceSummary' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'deploymentId' => array(
                            'type' => 'string',
                        ),
                        'instanceId' => array(
                            'type' => 'string',
                        ),
                        'status' => array(
                            'type' => 'string',
                        ),
                        'lastUpdatedAt' => array(
                            'type' => 'string',
                        ),
                        'lifecycleEvents' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'LifecycleEvent',
                                'type' => 'object',
                                'properties' => array(
                                    'lifecycleEventName' => array(
                                        'type' => 'string',
                                    ),
                                    'diagnostics' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'errorCode' => array(
                                                'type' => 'string',
                                            ),
                                            'scriptName' => array(
                                                'type' => 'string',
                                            ),
                                            'message' => array(
                                                'type' => 'string',
                                            ),
                                            'logTail' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'startTime' => array(
                                        'type' => 'string',
                                    ),
                                    'endTime' => array(
                                        'type' => 'string',
                                    ),
                                    'status' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'ListApplicationRevisionsOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'revisions' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'RevisionLocation',
                        'type' => 'object',
                        'properties' => array(
                            'revisionType' => array(
                                'type' => 'string',
                            ),
                            's3Location' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'bucket' => array(
                                        'type' => 'string',
                                    ),
                                    'key' => array(
                                        'type' => 'string',
                                    ),
                                    'bundleType' => array(
                                        'type' => 'string',
                                    ),
                                    'version' => array(
                                        'type' => 'string',
                                    ),
                                    'eTag' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'gitHubLocation' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'repository' => array(
                                        'type' => 'string',
                                    ),
                                    'commitId' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'nextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'ListApplicationsOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'applications' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'ApplicationName',
                        'type' => 'string',
                    ),
                ),
                'nextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'ListDeploymentConfigsOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'deploymentConfigsList' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'DeploymentConfigName',
                        'type' => 'string',
                    ),
                ),
                'nextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'ListDeploymentGroupsOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'applicationName' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'deploymentGroups' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'DeploymentGroupName',
                        'type' => 'string',
                    ),
                ),
                'nextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'ListDeploymentInstancesOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'instancesList' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'InstanceId',
                        'type' => 'string',
                    ),
                ),
                'nextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'ListDeploymentsOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'deployments' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'DeploymentId',
                        'type' => 'string',
                    ),
                ),
                'nextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'StopDeploymentOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'status' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'statusMessage' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'UpdateDeploymentGroupOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'hooksNotCleanedUp' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'AutoScalingGroup',
                        'type' => 'object',
                        'properties' => array(
                            'name' => array(
                                'type' => 'string',
                            ),
                            'hook' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
);
