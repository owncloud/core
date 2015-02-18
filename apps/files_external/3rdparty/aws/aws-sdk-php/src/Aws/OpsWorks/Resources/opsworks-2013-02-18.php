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
    'apiVersion' => '2013-02-18',
    'endpointPrefix' => 'opsworks',
    'serviceFullName' => 'AWS OpsWorks',
    'serviceType' => 'json',
    'jsonVersion' => '1.1',
    'targetPrefix' => 'OpsWorks_20130218.',
    'signatureVersion' => 'v4',
    'namespace' => 'OpsWorks',
    'regions' => array(
        'us-east-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'opsworks.us-east-1.amazonaws.com',
        ),
    ),
    'operations' => array(
        'AssignVolume' => array(
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
                    'default' => 'OpsWorks_20130218.AssignVolume',
                ),
                'VolumeId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'InstanceId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a request was invalid.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'Indicates that a resource was not found.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'AssociateElasticIp' => array(
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
                    'default' => 'OpsWorks_20130218.AssociateElasticIp',
                ),
                'ElasticIp' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'InstanceId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a request was invalid.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'Indicates that a resource was not found.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'AttachElasticLoadBalancer' => array(
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
                    'default' => 'OpsWorks_20130218.AttachElasticLoadBalancer',
                ),
                'ElasticLoadBalancerName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'LayerId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a request was invalid.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'Indicates that a resource was not found.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'CloneStack' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'CloneStackResult',
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
                    'default' => 'OpsWorks_20130218.CloneStack',
                ),
                'SourceStackId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Name' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Region' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'VpcId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Attributes' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'type' => 'string',
                        'data' => array(
                            'shape_name' => 'StackAttributesKeys',
                        ),
                    ),
                ),
                'ServiceRoleArn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'DefaultInstanceProfileArn' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'DefaultOs' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'HostnameTheme' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'DefaultAvailabilityZone' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'DefaultSubnetId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'CustomJson' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'ConfigurationManager' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'Name' => array(
                            'type' => 'string',
                        ),
                        'Version' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'ChefConfiguration' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'ManageBerkshelf' => array(
                            'type' => 'boolean',
                            'format' => 'boolean-string',
                        ),
                        'BerkshelfVersion' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'UseCustomCookbooks' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
                'UseOpsworksSecurityGroups' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
                'CustomCookbooksSource' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'Type' => array(
                            'type' => 'string',
                        ),
                        'Url' => array(
                            'type' => 'string',
                        ),
                        'Username' => array(
                            'type' => 'string',
                        ),
                        'Password' => array(
                            'type' => 'string',
                        ),
                        'SshKey' => array(
                            'type' => 'string',
                        ),
                        'Revision' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'DefaultSshKeyName' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'ClonePermissions' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
                'CloneAppIds' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'String',
                        'type' => 'string',
                    ),
                ),
                'DefaultRootDeviceType' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a request was invalid.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'Indicates that a resource was not found.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'CreateApp' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'CreateAppResult',
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
                    'default' => 'OpsWorks_20130218.CreateApp',
                ),
                'StackId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Shortname' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Name' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Description' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'DataSources' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'DataSource',
                        'type' => 'object',
                        'properties' => array(
                            'Type' => array(
                                'type' => 'string',
                            ),
                            'Arn' => array(
                                'type' => 'string',
                            ),
                            'DatabaseName' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'Type' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'AppSource' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'Type' => array(
                            'type' => 'string',
                        ),
                        'Url' => array(
                            'type' => 'string',
                        ),
                        'Username' => array(
                            'type' => 'string',
                        ),
                        'Password' => array(
                            'type' => 'string',
                        ),
                        'SshKey' => array(
                            'type' => 'string',
                        ),
                        'Revision' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'Domains' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'String',
                        'type' => 'string',
                    ),
                ),
                'EnableSsl' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
                'SslConfiguration' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'Certificate' => array(
                            'required' => true,
                            'type' => 'string',
                        ),
                        'PrivateKey' => array(
                            'required' => true,
                            'type' => 'string',
                        ),
                        'Chain' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'Attributes' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'type' => 'string',
                        'data' => array(
                            'shape_name' => 'AppAttributesKeys',
                        ),
                    ),
                ),
                'Environment' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'EnvironmentVariable',
                        'type' => 'object',
                        'properties' => array(
                            'Key' => array(
                                'required' => true,
                                'type' => 'string',
                            ),
                            'Value' => array(
                                'required' => true,
                                'type' => 'string',
                            ),
                            'Secure' => array(
                                'type' => 'boolean',
                                'format' => 'boolean-string',
                            ),
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a request was invalid.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'Indicates that a resource was not found.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'CreateDeployment' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'CreateDeploymentResult',
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
                    'default' => 'OpsWorks_20130218.CreateDeployment',
                ),
                'StackId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'AppId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'InstanceIds' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'String',
                        'type' => 'string',
                    ),
                ),
                'Command' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'Name' => array(
                            'required' => true,
                            'type' => 'string',
                        ),
                        'Args' => array(
                            'type' => 'object',
                            'additionalProperties' => array(
                                'type' => 'array',
                                'data' => array(
                                    'shape_name' => 'String',
                                ),
                                'items' => array(
                                    'name' => 'String',
                                    'type' => 'string',
                                ),
                            ),
                        ),
                    ),
                ),
                'Comment' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'CustomJson' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a request was invalid.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'Indicates that a resource was not found.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'CreateInstance' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'CreateInstanceResult',
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
                    'default' => 'OpsWorks_20130218.CreateInstance',
                ),
                'StackId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'LayerIds' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'String',
                        'type' => 'string',
                    ),
                ),
                'InstanceType' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'AutoScalingType' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Hostname' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Os' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'AmiId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'SshKeyName' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'AvailabilityZone' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'VirtualizationType' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'SubnetId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Architecture' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'RootDeviceType' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'InstallUpdatesOnBoot' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
                'EbsOptimized' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a request was invalid.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'Indicates that a resource was not found.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'CreateLayer' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'CreateLayerResult',
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
                    'default' => 'OpsWorks_20130218.CreateLayer',
                ),
                'StackId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Type' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Name' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Shortname' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Attributes' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'type' => 'string',
                        'data' => array(
                            'shape_name' => 'LayerAttributesKeys',
                        ),
                    ),
                ),
                'CustomInstanceProfileArn' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'CustomSecurityGroupIds' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'String',
                        'type' => 'string',
                    ),
                ),
                'Packages' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'String',
                        'type' => 'string',
                    ),
                ),
                'VolumeConfigurations' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'VolumeConfiguration',
                        'type' => 'object',
                        'properties' => array(
                            'MountPoint' => array(
                                'required' => true,
                                'type' => 'string',
                            ),
                            'RaidLevel' => array(
                                'type' => 'numeric',
                            ),
                            'NumberOfDisks' => array(
                                'required' => true,
                                'type' => 'numeric',
                            ),
                            'Size' => array(
                                'required' => true,
                                'type' => 'numeric',
                            ),
                            'VolumeType' => array(
                                'type' => 'string',
                            ),
                            'Iops' => array(
                                'type' => 'numeric',
                            ),
                        ),
                    ),
                ),
                'EnableAutoHealing' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
                'AutoAssignElasticIps' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
                'AutoAssignPublicIps' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
                'CustomRecipes' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'Setup' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'String',
                                'type' => 'string',
                            ),
                        ),
                        'Configure' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'String',
                                'type' => 'string',
                            ),
                        ),
                        'Deploy' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'String',
                                'type' => 'string',
                            ),
                        ),
                        'Undeploy' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'String',
                                'type' => 'string',
                            ),
                        ),
                        'Shutdown' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'String',
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'InstallUpdatesOnBoot' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
                'UseEbsOptimizedInstances' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a request was invalid.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'Indicates that a resource was not found.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'CreateStack' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'CreateStackResult',
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
                    'default' => 'OpsWorks_20130218.CreateStack',
                ),
                'Name' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Region' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'VpcId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Attributes' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'type' => 'string',
                        'data' => array(
                            'shape_name' => 'StackAttributesKeys',
                        ),
                    ),
                ),
                'ServiceRoleArn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'DefaultInstanceProfileArn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'DefaultOs' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'HostnameTheme' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'DefaultAvailabilityZone' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'DefaultSubnetId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'CustomJson' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'ConfigurationManager' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'Name' => array(
                            'type' => 'string',
                        ),
                        'Version' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'ChefConfiguration' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'ManageBerkshelf' => array(
                            'type' => 'boolean',
                            'format' => 'boolean-string',
                        ),
                        'BerkshelfVersion' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'UseCustomCookbooks' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
                'UseOpsworksSecurityGroups' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
                'CustomCookbooksSource' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'Type' => array(
                            'type' => 'string',
                        ),
                        'Url' => array(
                            'type' => 'string',
                        ),
                        'Username' => array(
                            'type' => 'string',
                        ),
                        'Password' => array(
                            'type' => 'string',
                        ),
                        'SshKey' => array(
                            'type' => 'string',
                        ),
                        'Revision' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'DefaultSshKeyName' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'DefaultRootDeviceType' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a request was invalid.',
                    'class' => 'ValidationException',
                ),
            ),
        ),
        'CreateUserProfile' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'CreateUserProfileResult',
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
                    'default' => 'OpsWorks_20130218.CreateUserProfile',
                ),
                'IamUserArn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'SshUsername' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'SshPublicKey' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'AllowSelfManagement' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a request was invalid.',
                    'class' => 'ValidationException',
                ),
            ),
        ),
        'DeleteApp' => array(
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
                    'default' => 'OpsWorks_20130218.DeleteApp',
                ),
                'AppId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a request was invalid.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'Indicates that a resource was not found.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'DeleteInstance' => array(
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
                    'default' => 'OpsWorks_20130218.DeleteInstance',
                ),
                'InstanceId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'DeleteElasticIp' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
                'DeleteVolumes' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a request was invalid.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'Indicates that a resource was not found.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'DeleteLayer' => array(
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
                    'default' => 'OpsWorks_20130218.DeleteLayer',
                ),
                'LayerId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a request was invalid.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'Indicates that a resource was not found.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'DeleteStack' => array(
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
                    'default' => 'OpsWorks_20130218.DeleteStack',
                ),
                'StackId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a request was invalid.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'Indicates that a resource was not found.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'DeleteUserProfile' => array(
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
                    'default' => 'OpsWorks_20130218.DeleteUserProfile',
                ),
                'IamUserArn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a request was invalid.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'Indicates that a resource was not found.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'DeregisterElasticIp' => array(
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
                    'default' => 'OpsWorks_20130218.DeregisterElasticIp',
                ),
                'ElasticIp' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a request was invalid.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'Indicates that a resource was not found.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'DeregisterRdsDbInstance' => array(
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
                    'default' => 'OpsWorks_20130218.DeregisterRdsDbInstance',
                ),
                'RdsDbInstanceArn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a request was invalid.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'Indicates that a resource was not found.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'DeregisterVolume' => array(
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
                    'default' => 'OpsWorks_20130218.DeregisterVolume',
                ),
                'VolumeId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a request was invalid.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'Indicates that a resource was not found.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'DescribeApps' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeAppsResult',
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
                    'default' => 'OpsWorks_20130218.DescribeApps',
                ),
                'StackId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'AppIds' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'String',
                        'type' => 'string',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a request was invalid.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'Indicates that a resource was not found.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'DescribeCommands' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeCommandsResult',
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
                    'default' => 'OpsWorks_20130218.DescribeCommands',
                ),
                'DeploymentId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'InstanceId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'CommandIds' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'String',
                        'type' => 'string',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a request was invalid.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'Indicates that a resource was not found.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'DescribeDeployments' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeDeploymentsResult',
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
                    'default' => 'OpsWorks_20130218.DescribeDeployments',
                ),
                'StackId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'AppId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'DeploymentIds' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'String',
                        'type' => 'string',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a request was invalid.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'Indicates that a resource was not found.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'DescribeElasticIps' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeElasticIpsResult',
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
                    'default' => 'OpsWorks_20130218.DescribeElasticIps',
                ),
                'InstanceId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'StackId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Ips' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'String',
                        'type' => 'string',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a request was invalid.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'Indicates that a resource was not found.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'DescribeElasticLoadBalancers' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeElasticLoadBalancersResult',
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
                    'default' => 'OpsWorks_20130218.DescribeElasticLoadBalancers',
                ),
                'StackId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'LayerIds' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'String',
                        'type' => 'string',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a request was invalid.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'Indicates that a resource was not found.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'DescribeInstances' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeInstancesResult',
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
                    'default' => 'OpsWorks_20130218.DescribeInstances',
                ),
                'StackId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'LayerId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'InstanceIds' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'String',
                        'type' => 'string',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a request was invalid.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'Indicates that a resource was not found.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'DescribeLayers' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeLayersResult',
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
                    'default' => 'OpsWorks_20130218.DescribeLayers',
                ),
                'StackId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'LayerIds' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'String',
                        'type' => 'string',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a request was invalid.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'Indicates that a resource was not found.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'DescribeLoadBasedAutoScaling' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeLoadBasedAutoScalingResult',
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
                    'default' => 'OpsWorks_20130218.DescribeLoadBasedAutoScaling',
                ),
                'LayerIds' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'String',
                        'type' => 'string',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a request was invalid.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'Indicates that a resource was not found.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'DescribeMyUserProfile' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeMyUserProfileResult',
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
                    'default' => 'OpsWorks_20130218.DescribeMyUserProfile',
                ),
            ),
        ),
        'DescribePermissions' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribePermissionsResult',
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
                    'default' => 'OpsWorks_20130218.DescribePermissions',
                ),
                'IamUserArn' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'StackId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a request was invalid.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'Indicates that a resource was not found.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'DescribeRaidArrays' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeRaidArraysResult',
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
                    'default' => 'OpsWorks_20130218.DescribeRaidArrays',
                ),
                'InstanceId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'StackId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'RaidArrayIds' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'String',
                        'type' => 'string',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a request was invalid.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'Indicates that a resource was not found.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'DescribeRdsDbInstances' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeRdsDbInstancesResult',
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
                    'default' => 'OpsWorks_20130218.DescribeRdsDbInstances',
                ),
                'StackId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'RdsDbInstanceArns' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'String',
                        'type' => 'string',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a request was invalid.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'Indicates that a resource was not found.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'DescribeServiceErrors' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeServiceErrorsResult',
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
                    'default' => 'OpsWorks_20130218.DescribeServiceErrors',
                ),
                'StackId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'InstanceId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'ServiceErrorIds' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'String',
                        'type' => 'string',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a request was invalid.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'Indicates that a resource was not found.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'DescribeStackSummary' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeStackSummaryResult',
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
                    'default' => 'OpsWorks_20130218.DescribeStackSummary',
                ),
                'StackId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a request was invalid.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'Indicates that a resource was not found.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'DescribeStacks' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeStacksResult',
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
                    'default' => 'OpsWorks_20130218.DescribeStacks',
                ),
                'StackIds' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'String',
                        'type' => 'string',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a request was invalid.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'Indicates that a resource was not found.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'DescribeTimeBasedAutoScaling' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeTimeBasedAutoScalingResult',
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
                    'default' => 'OpsWorks_20130218.DescribeTimeBasedAutoScaling',
                ),
                'InstanceIds' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'String',
                        'type' => 'string',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a request was invalid.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'Indicates that a resource was not found.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'DescribeUserProfiles' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeUserProfilesResult',
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
                    'default' => 'OpsWorks_20130218.DescribeUserProfiles',
                ),
                'IamUserArns' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'String',
                        'type' => 'string',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a request was invalid.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'Indicates that a resource was not found.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'DescribeVolumes' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeVolumesResult',
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
                    'default' => 'OpsWorks_20130218.DescribeVolumes',
                ),
                'InstanceId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'StackId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'RaidArrayId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'VolumeIds' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'String',
                        'type' => 'string',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a request was invalid.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'Indicates that a resource was not found.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'DetachElasticLoadBalancer' => array(
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
                    'default' => 'OpsWorks_20130218.DetachElasticLoadBalancer',
                ),
                'ElasticLoadBalancerName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'LayerId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a resource was not found.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'DisassociateElasticIp' => array(
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
                    'default' => 'OpsWorks_20130218.DisassociateElasticIp',
                ),
                'ElasticIp' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a request was invalid.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'Indicates that a resource was not found.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'GetHostnameSuggestion' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'GetHostnameSuggestionResult',
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
                    'default' => 'OpsWorks_20130218.GetHostnameSuggestion',
                ),
                'LayerId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a request was invalid.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'Indicates that a resource was not found.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'RebootInstance' => array(
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
                    'default' => 'OpsWorks_20130218.RebootInstance',
                ),
                'InstanceId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a request was invalid.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'Indicates that a resource was not found.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'RegisterElasticIp' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'RegisterElasticIpResult',
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
                    'default' => 'OpsWorks_20130218.RegisterElasticIp',
                ),
                'ElasticIp' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'StackId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a request was invalid.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'Indicates that a resource was not found.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'RegisterRdsDbInstance' => array(
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
                    'default' => 'OpsWorks_20130218.RegisterRdsDbInstance',
                ),
                'StackId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'RdsDbInstanceArn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'DbUser' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'DbPassword' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a request was invalid.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'Indicates that a resource was not found.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'RegisterVolume' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'RegisterVolumeResult',
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
                    'default' => 'OpsWorks_20130218.RegisterVolume',
                ),
                'Ec2VolumeId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'StackId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a request was invalid.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'Indicates that a resource was not found.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'SetLoadBasedAutoScaling' => array(
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
                    'default' => 'OpsWorks_20130218.SetLoadBasedAutoScaling',
                ),
                'LayerId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Enable' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
                'UpScaling' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'InstanceCount' => array(
                            'type' => 'numeric',
                        ),
                        'ThresholdsWaitTime' => array(
                            'type' => 'numeric',
                            'minimum' => 1,
                            'maximum' => 100,
                        ),
                        'IgnoreMetricsTime' => array(
                            'type' => 'numeric',
                            'minimum' => 1,
                            'maximum' => 100,
                        ),
                        'CpuThreshold' => array(
                            'type' => 'numeric',
                        ),
                        'MemoryThreshold' => array(
                            'type' => 'numeric',
                        ),
                        'LoadThreshold' => array(
                            'type' => 'numeric',
                        ),
                    ),
                ),
                'DownScaling' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'InstanceCount' => array(
                            'type' => 'numeric',
                        ),
                        'ThresholdsWaitTime' => array(
                            'type' => 'numeric',
                            'minimum' => 1,
                            'maximum' => 100,
                        ),
                        'IgnoreMetricsTime' => array(
                            'type' => 'numeric',
                            'minimum' => 1,
                            'maximum' => 100,
                        ),
                        'CpuThreshold' => array(
                            'type' => 'numeric',
                        ),
                        'MemoryThreshold' => array(
                            'type' => 'numeric',
                        ),
                        'LoadThreshold' => array(
                            'type' => 'numeric',
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a request was invalid.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'Indicates that a resource was not found.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'SetPermission' => array(
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
                    'default' => 'OpsWorks_20130218.SetPermission',
                ),
                'StackId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'IamUserArn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'AllowSsh' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
                'AllowSudo' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
                'Level' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a request was invalid.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'Indicates that a resource was not found.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'SetTimeBasedAutoScaling' => array(
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
                    'default' => 'OpsWorks_20130218.SetTimeBasedAutoScaling',
                ),
                'InstanceId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'AutoScalingSchedule' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'Monday' => array(
                            'type' => 'object',
                            'additionalProperties' => array(
                                'type' => 'string',
                                'data' => array(
                                    'shape_name' => 'Hour',
                                ),
                            ),
                        ),
                        'Tuesday' => array(
                            'type' => 'object',
                            'additionalProperties' => array(
                                'type' => 'string',
                                'data' => array(
                                    'shape_name' => 'Hour',
                                ),
                            ),
                        ),
                        'Wednesday' => array(
                            'type' => 'object',
                            'additionalProperties' => array(
                                'type' => 'string',
                                'data' => array(
                                    'shape_name' => 'Hour',
                                ),
                            ),
                        ),
                        'Thursday' => array(
                            'type' => 'object',
                            'additionalProperties' => array(
                                'type' => 'string',
                                'data' => array(
                                    'shape_name' => 'Hour',
                                ),
                            ),
                        ),
                        'Friday' => array(
                            'type' => 'object',
                            'additionalProperties' => array(
                                'type' => 'string',
                                'data' => array(
                                    'shape_name' => 'Hour',
                                ),
                            ),
                        ),
                        'Saturday' => array(
                            'type' => 'object',
                            'additionalProperties' => array(
                                'type' => 'string',
                                'data' => array(
                                    'shape_name' => 'Hour',
                                ),
                            ),
                        ),
                        'Sunday' => array(
                            'type' => 'object',
                            'additionalProperties' => array(
                                'type' => 'string',
                                'data' => array(
                                    'shape_name' => 'Hour',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a request was invalid.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'Indicates that a resource was not found.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'StartInstance' => array(
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
                    'default' => 'OpsWorks_20130218.StartInstance',
                ),
                'InstanceId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a request was invalid.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'Indicates that a resource was not found.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'StartStack' => array(
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
                    'default' => 'OpsWorks_20130218.StartStack',
                ),
                'StackId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a request was invalid.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'Indicates that a resource was not found.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'StopInstance' => array(
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
                    'default' => 'OpsWorks_20130218.StopInstance',
                ),
                'InstanceId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a request was invalid.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'Indicates that a resource was not found.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'StopStack' => array(
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
                    'default' => 'OpsWorks_20130218.StopStack',
                ),
                'StackId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a request was invalid.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'Indicates that a resource was not found.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'UnassignVolume' => array(
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
                    'default' => 'OpsWorks_20130218.UnassignVolume',
                ),
                'VolumeId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a request was invalid.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'Indicates that a resource was not found.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'UpdateApp' => array(
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
                    'default' => 'OpsWorks_20130218.UpdateApp',
                ),
                'AppId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Name' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Description' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'DataSources' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'DataSource',
                        'type' => 'object',
                        'properties' => array(
                            'Type' => array(
                                'type' => 'string',
                            ),
                            'Arn' => array(
                                'type' => 'string',
                            ),
                            'DatabaseName' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'Type' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'AppSource' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'Type' => array(
                            'type' => 'string',
                        ),
                        'Url' => array(
                            'type' => 'string',
                        ),
                        'Username' => array(
                            'type' => 'string',
                        ),
                        'Password' => array(
                            'type' => 'string',
                        ),
                        'SshKey' => array(
                            'type' => 'string',
                        ),
                        'Revision' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'Domains' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'String',
                        'type' => 'string',
                    ),
                ),
                'EnableSsl' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
                'SslConfiguration' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'Certificate' => array(
                            'required' => true,
                            'type' => 'string',
                        ),
                        'PrivateKey' => array(
                            'required' => true,
                            'type' => 'string',
                        ),
                        'Chain' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'Attributes' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'type' => 'string',
                        'data' => array(
                            'shape_name' => 'AppAttributesKeys',
                        ),
                    ),
                ),
                'Environment' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'EnvironmentVariable',
                        'type' => 'object',
                        'properties' => array(
                            'Key' => array(
                                'required' => true,
                                'type' => 'string',
                            ),
                            'Value' => array(
                                'required' => true,
                                'type' => 'string',
                            ),
                            'Secure' => array(
                                'type' => 'boolean',
                                'format' => 'boolean-string',
                            ),
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a request was invalid.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'Indicates that a resource was not found.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'UpdateElasticIp' => array(
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
                    'default' => 'OpsWorks_20130218.UpdateElasticIp',
                ),
                'ElasticIp' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Name' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a request was invalid.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'Indicates that a resource was not found.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'UpdateInstance' => array(
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
                    'default' => 'OpsWorks_20130218.UpdateInstance',
                ),
                'InstanceId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'LayerIds' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'String',
                        'type' => 'string',
                    ),
                ),
                'InstanceType' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'AutoScalingType' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Hostname' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Os' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'AmiId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'SshKeyName' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Architecture' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'InstallUpdatesOnBoot' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
                'EbsOptimized' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a request was invalid.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'Indicates that a resource was not found.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'UpdateLayer' => array(
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
                    'default' => 'OpsWorks_20130218.UpdateLayer',
                ),
                'LayerId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Name' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Shortname' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Attributes' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'type' => 'string',
                        'data' => array(
                            'shape_name' => 'LayerAttributesKeys',
                        ),
                    ),
                ),
                'CustomInstanceProfileArn' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'CustomSecurityGroupIds' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'String',
                        'type' => 'string',
                    ),
                ),
                'Packages' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'String',
                        'type' => 'string',
                    ),
                ),
                'VolumeConfigurations' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'VolumeConfiguration',
                        'type' => 'object',
                        'properties' => array(
                            'MountPoint' => array(
                                'required' => true,
                                'type' => 'string',
                            ),
                            'RaidLevel' => array(
                                'type' => 'numeric',
                            ),
                            'NumberOfDisks' => array(
                                'required' => true,
                                'type' => 'numeric',
                            ),
                            'Size' => array(
                                'required' => true,
                                'type' => 'numeric',
                            ),
                            'VolumeType' => array(
                                'type' => 'string',
                            ),
                            'Iops' => array(
                                'type' => 'numeric',
                            ),
                        ),
                    ),
                ),
                'EnableAutoHealing' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
                'AutoAssignElasticIps' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
                'AutoAssignPublicIps' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
                'CustomRecipes' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'Setup' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'String',
                                'type' => 'string',
                            ),
                        ),
                        'Configure' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'String',
                                'type' => 'string',
                            ),
                        ),
                        'Deploy' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'String',
                                'type' => 'string',
                            ),
                        ),
                        'Undeploy' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'String',
                                'type' => 'string',
                            ),
                        ),
                        'Shutdown' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'String',
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'InstallUpdatesOnBoot' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
                'UseEbsOptimizedInstances' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a request was invalid.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'Indicates that a resource was not found.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'UpdateMyUserProfile' => array(
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
                    'default' => 'OpsWorks_20130218.UpdateMyUserProfile',
                ),
                'SshPublicKey' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a request was invalid.',
                    'class' => 'ValidationException',
                ),
            ),
        ),
        'UpdateRdsDbInstance' => array(
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
                    'default' => 'OpsWorks_20130218.UpdateRdsDbInstance',
                ),
                'RdsDbInstanceArn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'DbUser' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'DbPassword' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a request was invalid.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'Indicates that a resource was not found.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'UpdateStack' => array(
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
                    'default' => 'OpsWorks_20130218.UpdateStack',
                ),
                'StackId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Name' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Attributes' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'type' => 'string',
                        'data' => array(
                            'shape_name' => 'StackAttributesKeys',
                        ),
                    ),
                ),
                'ServiceRoleArn' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'DefaultInstanceProfileArn' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'DefaultOs' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'HostnameTheme' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'DefaultAvailabilityZone' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'DefaultSubnetId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'CustomJson' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'ConfigurationManager' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'Name' => array(
                            'type' => 'string',
                        ),
                        'Version' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'ChefConfiguration' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'ManageBerkshelf' => array(
                            'type' => 'boolean',
                            'format' => 'boolean-string',
                        ),
                        'BerkshelfVersion' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'UseCustomCookbooks' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
                'CustomCookbooksSource' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'Type' => array(
                            'type' => 'string',
                        ),
                        'Url' => array(
                            'type' => 'string',
                        ),
                        'Username' => array(
                            'type' => 'string',
                        ),
                        'Password' => array(
                            'type' => 'string',
                        ),
                        'SshKey' => array(
                            'type' => 'string',
                        ),
                        'Revision' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'DefaultSshKeyName' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'DefaultRootDeviceType' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'UseOpsworksSecurityGroups' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a request was invalid.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'Indicates that a resource was not found.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'UpdateUserProfile' => array(
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
                    'default' => 'OpsWorks_20130218.UpdateUserProfile',
                ),
                'IamUserArn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'SshUsername' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'SshPublicKey' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'AllowSelfManagement' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a request was invalid.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'Indicates that a resource was not found.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'UpdateVolume' => array(
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
                    'default' => 'OpsWorks_20130218.UpdateVolume',
                ),
                'VolumeId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Name' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'MountPoint' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that a request was invalid.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'Indicates that a resource was not found.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
    ),
    'models' => array(
        'EmptyOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
        ),
        'CloneStackResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'StackId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'CreateAppResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'AppId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'CreateDeploymentResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'DeploymentId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'CreateInstanceResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'InstanceId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'CreateLayerResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'LayerId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'CreateStackResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'StackId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'CreateUserProfileResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'IamUserArn' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'DescribeAppsResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Apps' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'App',
                        'type' => 'object',
                        'properties' => array(
                            'AppId' => array(
                                'type' => 'string',
                            ),
                            'StackId' => array(
                                'type' => 'string',
                            ),
                            'Shortname' => array(
                                'type' => 'string',
                            ),
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'Description' => array(
                                'type' => 'string',
                            ),
                            'DataSources' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'DataSource',
                                    'type' => 'object',
                                    'properties' => array(
                                        'Type' => array(
                                            'type' => 'string',
                                        ),
                                        'Arn' => array(
                                            'type' => 'string',
                                        ),
                                        'DatabaseName' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                            'Type' => array(
                                'type' => 'string',
                            ),
                            'AppSource' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'Type' => array(
                                        'type' => 'string',
                                    ),
                                    'Url' => array(
                                        'type' => 'string',
                                    ),
                                    'Username' => array(
                                        'type' => 'string',
                                    ),
                                    'Password' => array(
                                        'type' => 'string',
                                    ),
                                    'SshKey' => array(
                                        'type' => 'string',
                                    ),
                                    'Revision' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'Domains' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'String',
                                    'type' => 'string',
                                ),
                            ),
                            'EnableSsl' => array(
                                'type' => 'boolean',
                            ),
                            'SslConfiguration' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'Certificate' => array(
                                        'type' => 'string',
                                    ),
                                    'PrivateKey' => array(
                                        'type' => 'string',
                                    ),
                                    'Chain' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'Attributes' => array(
                                'type' => 'object',
                                'additionalProperties' => array(
                                    'type' => 'string',
                                ),
                            ),
                            'CreatedAt' => array(
                                'type' => 'string',
                            ),
                            'Environment' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'EnvironmentVariable',
                                    'type' => 'object',
                                    'properties' => array(
                                        'Key' => array(
                                            'type' => 'string',
                                        ),
                                        'Value' => array(
                                            'type' => 'string',
                                        ),
                                        'Secure' => array(
                                            'type' => 'boolean',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeCommandsResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Commands' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'Command',
                        'type' => 'object',
                        'properties' => array(
                            'CommandId' => array(
                                'type' => 'string',
                            ),
                            'InstanceId' => array(
                                'type' => 'string',
                            ),
                            'DeploymentId' => array(
                                'type' => 'string',
                            ),
                            'CreatedAt' => array(
                                'type' => 'string',
                            ),
                            'AcknowledgedAt' => array(
                                'type' => 'string',
                            ),
                            'CompletedAt' => array(
                                'type' => 'string',
                            ),
                            'Status' => array(
                                'type' => 'string',
                            ),
                            'ExitCode' => array(
                                'type' => 'numeric',
                            ),
                            'LogUrl' => array(
                                'type' => 'string',
                            ),
                            'Type' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeDeploymentsResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Deployments' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'Deployment',
                        'type' => 'object',
                        'properties' => array(
                            'DeploymentId' => array(
                                'type' => 'string',
                            ),
                            'StackId' => array(
                                'type' => 'string',
                            ),
                            'AppId' => array(
                                'type' => 'string',
                            ),
                            'CreatedAt' => array(
                                'type' => 'string',
                            ),
                            'CompletedAt' => array(
                                'type' => 'string',
                            ),
                            'Duration' => array(
                                'type' => 'numeric',
                            ),
                            'IamUserArn' => array(
                                'type' => 'string',
                            ),
                            'Comment' => array(
                                'type' => 'string',
                            ),
                            'Command' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'Name' => array(
                                        'type' => 'string',
                                    ),
                                    'Args' => array(
                                        'type' => 'object',
                                        'additionalProperties' => array(
                                            'type' => 'array',
                                            'items' => array(
                                                'name' => 'String',
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            'Status' => array(
                                'type' => 'string',
                            ),
                            'CustomJson' => array(
                                'type' => 'string',
                            ),
                            'InstanceIds' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'String',
                                    'type' => 'string',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeElasticIpsResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ElasticIps' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'ElasticIp',
                        'type' => 'object',
                        'properties' => array(
                            'Ip' => array(
                                'type' => 'string',
                            ),
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'Domain' => array(
                                'type' => 'string',
                            ),
                            'Region' => array(
                                'type' => 'string',
                            ),
                            'InstanceId' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeElasticLoadBalancersResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ElasticLoadBalancers' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'ElasticLoadBalancer',
                        'type' => 'object',
                        'properties' => array(
                            'ElasticLoadBalancerName' => array(
                                'type' => 'string',
                            ),
                            'Region' => array(
                                'type' => 'string',
                            ),
                            'DnsName' => array(
                                'type' => 'string',
                            ),
                            'StackId' => array(
                                'type' => 'string',
                            ),
                            'LayerId' => array(
                                'type' => 'string',
                            ),
                            'VpcId' => array(
                                'type' => 'string',
                            ),
                            'AvailabilityZones' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'String',
                                    'type' => 'string',
                                ),
                            ),
                            'SubnetIds' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'String',
                                    'type' => 'string',
                                ),
                            ),
                            'Ec2InstanceIds' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'String',
                                    'type' => 'string',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeInstancesResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Instances' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'Instance',
                        'type' => 'object',
                        'properties' => array(
                            'InstanceId' => array(
                                'type' => 'string',
                            ),
                            'Ec2InstanceId' => array(
                                'type' => 'string',
                            ),
                            'VirtualizationType' => array(
                                'type' => 'string',
                            ),
                            'Hostname' => array(
                                'type' => 'string',
                            ),
                            'StackId' => array(
                                'type' => 'string',
                            ),
                            'LayerIds' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'String',
                                    'type' => 'string',
                                ),
                            ),
                            'SecurityGroupIds' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'String',
                                    'type' => 'string',
                                ),
                            ),
                            'InstanceType' => array(
                                'type' => 'string',
                            ),
                            'InstanceProfileArn' => array(
                                'type' => 'string',
                            ),
                            'Status' => array(
                                'type' => 'string',
                            ),
                            'Os' => array(
                                'type' => 'string',
                            ),
                            'AmiId' => array(
                                'type' => 'string',
                            ),
                            'AvailabilityZone' => array(
                                'type' => 'string',
                            ),
                            'SubnetId' => array(
                                'type' => 'string',
                            ),
                            'PublicDns' => array(
                                'type' => 'string',
                            ),
                            'PrivateDns' => array(
                                'type' => 'string',
                            ),
                            'PublicIp' => array(
                                'type' => 'string',
                            ),
                            'PrivateIp' => array(
                                'type' => 'string',
                            ),
                            'ElasticIp' => array(
                                'type' => 'string',
                            ),
                            'AutoScalingType' => array(
                                'type' => 'string',
                            ),
                            'SshKeyName' => array(
                                'type' => 'string',
                            ),
                            'SshHostRsaKeyFingerprint' => array(
                                'type' => 'string',
                            ),
                            'SshHostDsaKeyFingerprint' => array(
                                'type' => 'string',
                            ),
                            'CreatedAt' => array(
                                'type' => 'string',
                            ),
                            'LastServiceErrorId' => array(
                                'type' => 'string',
                            ),
                            'Architecture' => array(
                                'type' => 'string',
                            ),
                            'RootDeviceType' => array(
                                'type' => 'string',
                            ),
                            'RootDeviceVolumeId' => array(
                                'type' => 'string',
                            ),
                            'InstallUpdatesOnBoot' => array(
                                'type' => 'boolean',
                            ),
                            'EbsOptimized' => array(
                                'type' => 'boolean',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeLayersResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Layers' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'Layer',
                        'type' => 'object',
                        'properties' => array(
                            'StackId' => array(
                                'type' => 'string',
                            ),
                            'LayerId' => array(
                                'type' => 'string',
                            ),
                            'Type' => array(
                                'type' => 'string',
                            ),
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'Shortname' => array(
                                'type' => 'string',
                            ),
                            'Attributes' => array(
                                'type' => 'object',
                                'additionalProperties' => array(
                                    'type' => 'string',
                                ),
                            ),
                            'CustomInstanceProfileArn' => array(
                                'type' => 'string',
                            ),
                            'CustomSecurityGroupIds' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'String',
                                    'type' => 'string',
                                ),
                            ),
                            'DefaultSecurityGroupNames' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'String',
                                    'type' => 'string',
                                ),
                            ),
                            'Packages' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'String',
                                    'type' => 'string',
                                ),
                            ),
                            'VolumeConfigurations' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'VolumeConfiguration',
                                    'type' => 'object',
                                    'properties' => array(
                                        'MountPoint' => array(
                                            'type' => 'string',
                                        ),
                                        'RaidLevel' => array(
                                            'type' => 'numeric',
                                        ),
                                        'NumberOfDisks' => array(
                                            'type' => 'numeric',
                                        ),
                                        'Size' => array(
                                            'type' => 'numeric',
                                        ),
                                        'VolumeType' => array(
                                            'type' => 'string',
                                        ),
                                        'Iops' => array(
                                            'type' => 'numeric',
                                        ),
                                    ),
                                ),
                            ),
                            'EnableAutoHealing' => array(
                                'type' => 'boolean',
                            ),
                            'AutoAssignElasticIps' => array(
                                'type' => 'boolean',
                            ),
                            'AutoAssignPublicIps' => array(
                                'type' => 'boolean',
                            ),
                            'DefaultRecipes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'Setup' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'String',
                                            'type' => 'string',
                                        ),
                                    ),
                                    'Configure' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'String',
                                            'type' => 'string',
                                        ),
                                    ),
                                    'Deploy' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'String',
                                            'type' => 'string',
                                        ),
                                    ),
                                    'Undeploy' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'String',
                                            'type' => 'string',
                                        ),
                                    ),
                                    'Shutdown' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'String',
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                            'CustomRecipes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'Setup' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'String',
                                            'type' => 'string',
                                        ),
                                    ),
                                    'Configure' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'String',
                                            'type' => 'string',
                                        ),
                                    ),
                                    'Deploy' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'String',
                                            'type' => 'string',
                                        ),
                                    ),
                                    'Undeploy' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'String',
                                            'type' => 'string',
                                        ),
                                    ),
                                    'Shutdown' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'String',
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                            'CreatedAt' => array(
                                'type' => 'string',
                            ),
                            'InstallUpdatesOnBoot' => array(
                                'type' => 'boolean',
                            ),
                            'UseEbsOptimizedInstances' => array(
                                'type' => 'boolean',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeLoadBasedAutoScalingResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'LoadBasedAutoScalingConfigurations' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'LoadBasedAutoScalingConfiguration',
                        'type' => 'object',
                        'properties' => array(
                            'LayerId' => array(
                                'type' => 'string',
                            ),
                            'Enable' => array(
                                'type' => 'boolean',
                            ),
                            'UpScaling' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'InstanceCount' => array(
                                        'type' => 'numeric',
                                    ),
                                    'ThresholdsWaitTime' => array(
                                        'type' => 'numeric',
                                    ),
                                    'IgnoreMetricsTime' => array(
                                        'type' => 'numeric',
                                    ),
                                    'CpuThreshold' => array(
                                        'type' => 'numeric',
                                    ),
                                    'MemoryThreshold' => array(
                                        'type' => 'numeric',
                                    ),
                                    'LoadThreshold' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'DownScaling' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'InstanceCount' => array(
                                        'type' => 'numeric',
                                    ),
                                    'ThresholdsWaitTime' => array(
                                        'type' => 'numeric',
                                    ),
                                    'IgnoreMetricsTime' => array(
                                        'type' => 'numeric',
                                    ),
                                    'CpuThreshold' => array(
                                        'type' => 'numeric',
                                    ),
                                    'MemoryThreshold' => array(
                                        'type' => 'numeric',
                                    ),
                                    'LoadThreshold' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeMyUserProfileResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'UserProfile' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'IamUserArn' => array(
                            'type' => 'string',
                        ),
                        'Name' => array(
                            'type' => 'string',
                        ),
                        'SshUsername' => array(
                            'type' => 'string',
                        ),
                        'SshPublicKey' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
        'DescribePermissionsResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Permissions' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'Permission',
                        'type' => 'object',
                        'properties' => array(
                            'StackId' => array(
                                'type' => 'string',
                            ),
                            'IamUserArn' => array(
                                'type' => 'string',
                            ),
                            'AllowSsh' => array(
                                'type' => 'boolean',
                            ),
                            'AllowSudo' => array(
                                'type' => 'boolean',
                            ),
                            'Level' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeRaidArraysResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'RaidArrays' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'RaidArray',
                        'type' => 'object',
                        'properties' => array(
                            'RaidArrayId' => array(
                                'type' => 'string',
                            ),
                            'InstanceId' => array(
                                'type' => 'string',
                            ),
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'RaidLevel' => array(
                                'type' => 'numeric',
                            ),
                            'NumberOfDisks' => array(
                                'type' => 'numeric',
                            ),
                            'Size' => array(
                                'type' => 'numeric',
                            ),
                            'Device' => array(
                                'type' => 'string',
                            ),
                            'MountPoint' => array(
                                'type' => 'string',
                            ),
                            'AvailabilityZone' => array(
                                'type' => 'string',
                            ),
                            'CreatedAt' => array(
                                'type' => 'string',
                            ),
                            'StackId' => array(
                                'type' => 'string',
                            ),
                            'VolumeType' => array(
                                'type' => 'string',
                            ),
                            'Iops' => array(
                                'type' => 'numeric',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeRdsDbInstancesResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'RdsDbInstances' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'RdsDbInstance',
                        'type' => 'object',
                        'properties' => array(
                            'RdsDbInstanceArn' => array(
                                'type' => 'string',
                            ),
                            'DbInstanceIdentifier' => array(
                                'type' => 'string',
                            ),
                            'DbUser' => array(
                                'type' => 'string',
                            ),
                            'DbPassword' => array(
                                'type' => 'string',
                            ),
                            'Region' => array(
                                'type' => 'string',
                            ),
                            'Address' => array(
                                'type' => 'string',
                            ),
                            'Engine' => array(
                                'type' => 'string',
                            ),
                            'StackId' => array(
                                'type' => 'string',
                            ),
                            'MissingOnRds' => array(
                                'type' => 'boolean',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeServiceErrorsResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ServiceErrors' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'ServiceError',
                        'type' => 'object',
                        'properties' => array(
                            'ServiceErrorId' => array(
                                'type' => 'string',
                            ),
                            'StackId' => array(
                                'type' => 'string',
                            ),
                            'InstanceId' => array(
                                'type' => 'string',
                            ),
                            'Type' => array(
                                'type' => 'string',
                            ),
                            'Message' => array(
                                'type' => 'string',
                            ),
                            'CreatedAt' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeStackSummaryResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'StackSummary' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'StackId' => array(
                            'type' => 'string',
                        ),
                        'Name' => array(
                            'type' => 'string',
                        ),
                        'Arn' => array(
                            'type' => 'string',
                        ),
                        'LayersCount' => array(
                            'type' => 'numeric',
                        ),
                        'AppsCount' => array(
                            'type' => 'numeric',
                        ),
                        'InstancesCount' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Booting' => array(
                                    'type' => 'numeric',
                                ),
                                'ConnectionLost' => array(
                                    'type' => 'numeric',
                                ),
                                'Online' => array(
                                    'type' => 'numeric',
                                ),
                                'Pending' => array(
                                    'type' => 'numeric',
                                ),
                                'Rebooting' => array(
                                    'type' => 'numeric',
                                ),
                                'Requested' => array(
                                    'type' => 'numeric',
                                ),
                                'RunningSetup' => array(
                                    'type' => 'numeric',
                                ),
                                'SetupFailed' => array(
                                    'type' => 'numeric',
                                ),
                                'ShuttingDown' => array(
                                    'type' => 'numeric',
                                ),
                                'StartFailed' => array(
                                    'type' => 'numeric',
                                ),
                                'Stopped' => array(
                                    'type' => 'numeric',
                                ),
                                'Stopping' => array(
                                    'type' => 'numeric',
                                ),
                                'Terminated' => array(
                                    'type' => 'numeric',
                                ),
                                'Terminating' => array(
                                    'type' => 'numeric',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeStacksResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Stacks' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'Stack',
                        'type' => 'object',
                        'properties' => array(
                            'StackId' => array(
                                'type' => 'string',
                            ),
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'Arn' => array(
                                'type' => 'string',
                            ),
                            'Region' => array(
                                'type' => 'string',
                            ),
                            'VpcId' => array(
                                'type' => 'string',
                            ),
                            'Attributes' => array(
                                'type' => 'object',
                                'additionalProperties' => array(
                                    'type' => 'string',
                                ),
                            ),
                            'ServiceRoleArn' => array(
                                'type' => 'string',
                            ),
                            'DefaultInstanceProfileArn' => array(
                                'type' => 'string',
                            ),
                            'DefaultOs' => array(
                                'type' => 'string',
                            ),
                            'HostnameTheme' => array(
                                'type' => 'string',
                            ),
                            'DefaultAvailabilityZone' => array(
                                'type' => 'string',
                            ),
                            'DefaultSubnetId' => array(
                                'type' => 'string',
                            ),
                            'CustomJson' => array(
                                'type' => 'string',
                            ),
                            'ConfigurationManager' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'Name' => array(
                                        'type' => 'string',
                                    ),
                                    'Version' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'ChefConfiguration' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'ManageBerkshelf' => array(
                                        'type' => 'boolean',
                                    ),
                                    'BerkshelfVersion' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'UseCustomCookbooks' => array(
                                'type' => 'boolean',
                            ),
                            'UseOpsworksSecurityGroups' => array(
                                'type' => 'boolean',
                            ),
                            'CustomCookbooksSource' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'Type' => array(
                                        'type' => 'string',
                                    ),
                                    'Url' => array(
                                        'type' => 'string',
                                    ),
                                    'Username' => array(
                                        'type' => 'string',
                                    ),
                                    'Password' => array(
                                        'type' => 'string',
                                    ),
                                    'SshKey' => array(
                                        'type' => 'string',
                                    ),
                                    'Revision' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'DefaultSshKeyName' => array(
                                'type' => 'string',
                            ),
                            'CreatedAt' => array(
                                'type' => 'string',
                            ),
                            'DefaultRootDeviceType' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeTimeBasedAutoScalingResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'TimeBasedAutoScalingConfigurations' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'TimeBasedAutoScalingConfiguration',
                        'type' => 'object',
                        'properties' => array(
                            'InstanceId' => array(
                                'type' => 'string',
                            ),
                            'AutoScalingSchedule' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'Monday' => array(
                                        'type' => 'object',
                                        'additionalProperties' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                    'Tuesday' => array(
                                        'type' => 'object',
                                        'additionalProperties' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                    'Wednesday' => array(
                                        'type' => 'object',
                                        'additionalProperties' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                    'Thursday' => array(
                                        'type' => 'object',
                                        'additionalProperties' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                    'Friday' => array(
                                        'type' => 'object',
                                        'additionalProperties' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                    'Saturday' => array(
                                        'type' => 'object',
                                        'additionalProperties' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                    'Sunday' => array(
                                        'type' => 'object',
                                        'additionalProperties' => array(
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
        'DescribeUserProfilesResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'UserProfiles' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'UserProfile',
                        'type' => 'object',
                        'properties' => array(
                            'IamUserArn' => array(
                                'type' => 'string',
                            ),
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'SshUsername' => array(
                                'type' => 'string',
                            ),
                            'SshPublicKey' => array(
                                'type' => 'string',
                            ),
                            'AllowSelfManagement' => array(
                                'type' => 'boolean',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeVolumesResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Volumes' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'Volume',
                        'type' => 'object',
                        'properties' => array(
                            'VolumeId' => array(
                                'type' => 'string',
                            ),
                            'Ec2VolumeId' => array(
                                'type' => 'string',
                            ),
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'RaidArrayId' => array(
                                'type' => 'string',
                            ),
                            'InstanceId' => array(
                                'type' => 'string',
                            ),
                            'Status' => array(
                                'type' => 'string',
                            ),
                            'Size' => array(
                                'type' => 'numeric',
                            ),
                            'Device' => array(
                                'type' => 'string',
                            ),
                            'MountPoint' => array(
                                'type' => 'string',
                            ),
                            'Region' => array(
                                'type' => 'string',
                            ),
                            'AvailabilityZone' => array(
                                'type' => 'string',
                            ),
                            'VolumeType' => array(
                                'type' => 'string',
                            ),
                            'Iops' => array(
                                'type' => 'numeric',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'GetHostnameSuggestionResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'LayerId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Hostname' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'RegisterElasticIpResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ElasticIp' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'RegisterVolumeResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'VolumeId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
    ),
    'iterators' => array(
        'DescribeApps' => array(
            'result_key' => 'Apps',
        ),
        'DescribeCommands' => array(
            'result_key' => 'Commands',
        ),
        'DescribeDeployments' => array(
            'result_key' => 'Deployments',
        ),
        'DescribeElasticIps' => array(
            'result_key' => 'ElasticIps',
        ),
        'DescribeElasticLoadBalancers' => array(
            'result_key' => 'ElasticLoadBalancers',
        ),
        'DescribeInstances' => array(
            'result_key' => 'Instances',
        ),
        'DescribeLayers' => array(
            'result_key' => 'Layers',
        ),
        'DescribeLoadBasedAutoScaling' => array(
            'result_key' => 'LoadBasedAutoScalingConfigurations',
        ),
        'DescribePermissions' => array(
            'result_key' => 'Permissions',
        ),
        'DescribeRaidArrays' => array(
            'result_key' => 'RaidArrays',
        ),
        'DescribeServiceErrors' => array(
            'result_key' => 'ServiceErrors',
        ),
        'DescribeStacks' => array(
            'result_key' => 'Stacks',
        ),
        'DescribeTimeBasedAutoScaling' => array(
            'result_key' => 'TimeBasedAutoScalingConfigurations',
        ),
        'DescribeUserProfiles' => array(
            'result_key' => 'UserProfiles',
        ),
        'DescribeVolumes' => array(
            'result_key' => 'Volumes',
        ),
    ),
);
