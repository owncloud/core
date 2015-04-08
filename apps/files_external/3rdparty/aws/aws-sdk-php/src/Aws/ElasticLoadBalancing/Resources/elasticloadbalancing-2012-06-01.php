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
    'apiVersion' => '2012-06-01',
    'endpointPrefix' => 'elasticloadbalancing',
    'serviceFullName' => 'Elastic Load Balancing',
    'serviceType' => 'query',
    'resultWrapped' => true,
    'signatureVersion' => 'v4',
    'namespace' => 'ElasticLoadBalancing',
    'regions' => array(
        'us-east-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'elasticloadbalancing.us-east-1.amazonaws.com',
        ),
        'us-west-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'elasticloadbalancing.us-west-1.amazonaws.com',
        ),
        'us-west-2' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'elasticloadbalancing.us-west-2.amazonaws.com',
        ),
        'eu-west-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'elasticloadbalancing.eu-west-1.amazonaws.com',
        ),
        'ap-northeast-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'elasticloadbalancing.ap-northeast-1.amazonaws.com',
        ),
        'ap-southeast-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'elasticloadbalancing.ap-southeast-1.amazonaws.com',
        ),
        'ap-southeast-2' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'elasticloadbalancing.ap-southeast-2.amazonaws.com',
        ),
        'sa-east-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'elasticloadbalancing.sa-east-1.amazonaws.com',
        ),
        'cn-north-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'elasticloadbalancing.cn-north-1.amazonaws.com.cn',
        ),
        'us-gov-west-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'elasticloadbalancing.us-gov-west-1.amazonaws.com',
        ),
    ),
    'operations' => array(
        'AddTags' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'AddTags',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-06-01',
                ),
                'LoadBalancerNames' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'LoadBalancerNames.member',
                    'items' => array(
                        'name' => 'AccessPointName',
                        'type' => 'string',
                    ),
                ),
                'Tags' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Tags.member',
                    'minItems' => 1,
                    'items' => array(
                        'name' => 'Tag',
                        'type' => 'object',
                        'properties' => array(
                            'Key' => array(
                                'required' => true,
                                'type' => 'string',
                                'minLength' => 1,
                                'maxLength' => 128,
                            ),
                            'Value' => array(
                                'type' => 'string',
                                'maxLength' => 256,
                            ),
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified load balancer could not be found.',
                    'class' => 'AccessPointNotFoundException',
                ),
                array(
                    'reason' => 'The quota for the number of tags that can be assigned to a load balancer has been reached.',
                    'class' => 'TooManyTagsException',
                ),
                array(
                    'reason' => 'The same tag key specified multiple times.',
                    'class' => 'DuplicateTagKeysException',
                ),
            ),
        ),
        'ApplySecurityGroupsToLoadBalancer' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ApplySecurityGroupsToLoadBalancerOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ApplySecurityGroupsToLoadBalancer',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-06-01',
                ),
                'LoadBalancerName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'SecurityGroups' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'SecurityGroups.member',
                    'items' => array(
                        'name' => 'SecurityGroupId',
                        'type' => 'string',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified load balancer could not be found.',
                    'class' => 'AccessPointNotFoundException',
                ),
                array(
                    'reason' => 'Requested configuration change is invalid.',
                    'class' => 'InvalidConfigurationRequestException',
                ),
                array(
                    'reason' => 'One or more specified security groups do not exist.',
                    'class' => 'InvalidSecurityGroupException',
                ),
            ),
        ),
        'AttachLoadBalancerToSubnets' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'AttachLoadBalancerToSubnetsOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'AttachLoadBalancerToSubnets',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-06-01',
                ),
                'LoadBalancerName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Subnets' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Subnets.member',
                    'items' => array(
                        'name' => 'SubnetId',
                        'type' => 'string',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified load balancer could not be found.',
                    'class' => 'AccessPointNotFoundException',
                ),
                array(
                    'reason' => 'Requested configuration change is invalid.',
                    'class' => 'InvalidConfigurationRequestException',
                ),
                array(
                    'reason' => 'One or more subnets were not found.',
                    'class' => 'SubnetNotFoundException',
                ),
                array(
                    'reason' => 'The VPC has no Internet gateway.',
                    'class' => 'InvalidSubnetException',
                ),
            ),
        ),
        'ConfigureHealthCheck' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ConfigureHealthCheckOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ConfigureHealthCheck',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-06-01',
                ),
                'LoadBalancerName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'HealthCheck' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'aws.query',
                    'properties' => array(
                        'Target' => array(
                            'required' => true,
                            'type' => 'string',
                        ),
                        'Interval' => array(
                            'required' => true,
                            'type' => 'numeric',
                            'minimum' => 1,
                            'maximum' => 300,
                        ),
                        'Timeout' => array(
                            'required' => true,
                            'type' => 'numeric',
                            'minimum' => 1,
                            'maximum' => 300,
                        ),
                        'UnhealthyThreshold' => array(
                            'required' => true,
                            'type' => 'numeric',
                            'minimum' => 2,
                            'maximum' => 10,
                        ),
                        'HealthyThreshold' => array(
                            'required' => true,
                            'type' => 'numeric',
                            'minimum' => 2,
                            'maximum' => 10,
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified load balancer could not be found.',
                    'class' => 'AccessPointNotFoundException',
                ),
            ),
        ),
        'CreateAppCookieStickinessPolicy' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateAppCookieStickinessPolicy',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-06-01',
                ),
                'LoadBalancerName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'PolicyName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'CookieName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified load balancer could not be found.',
                    'class' => 'AccessPointNotFoundException',
                ),
                array(
                    'reason' => 'Policy with the same name exists for this load balancer. Please choose another name.',
                    'class' => 'DuplicatePolicyNameException',
                ),
                array(
                    'reason' => 'Quota for number of policies for this load balancer has already been reached.',
                    'class' => 'TooManyPoliciesException',
                ),
                array(
                    'reason' => 'Requested configuration change is invalid.',
                    'class' => 'InvalidConfigurationRequestException',
                ),
            ),
        ),
        'CreateLBCookieStickinessPolicy' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateLBCookieStickinessPolicy',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-06-01',
                ),
                'LoadBalancerName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'PolicyName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'CookieExpirationPeriod' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified load balancer could not be found.',
                    'class' => 'AccessPointNotFoundException',
                ),
                array(
                    'reason' => 'Policy with the same name exists for this load balancer. Please choose another name.',
                    'class' => 'DuplicatePolicyNameException',
                ),
                array(
                    'reason' => 'Quota for number of policies for this load balancer has already been reached.',
                    'class' => 'TooManyPoliciesException',
                ),
                array(
                    'reason' => 'Requested configuration change is invalid.',
                    'class' => 'InvalidConfigurationRequestException',
                ),
            ),
        ),
        'CreateLoadBalancer' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CreateAccessPointOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateLoadBalancer',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-06-01',
                ),
                'LoadBalancerName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Listeners' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Listeners.member',
                    'items' => array(
                        'name' => 'Listener',
                        'type' => 'object',
                        'properties' => array(
                            'Protocol' => array(
                                'required' => true,
                                'type' => 'string',
                            ),
                            'LoadBalancerPort' => array(
                                'required' => true,
                                'type' => 'numeric',
                            ),
                            'InstanceProtocol' => array(
                                'type' => 'string',
                            ),
                            'InstancePort' => array(
                                'required' => true,
                                'type' => 'numeric',
                                'minimum' => 1,
                                'maximum' => 65535,
                            ),
                            'SSLCertificateId' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'AvailabilityZones' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'AvailabilityZones.member',
                    'items' => array(
                        'name' => 'AvailabilityZone',
                        'type' => 'string',
                    ),
                ),
                'Subnets' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Subnets.member',
                    'items' => array(
                        'name' => 'SubnetId',
                        'type' => 'string',
                    ),
                ),
                'SecurityGroups' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'SecurityGroups.member',
                    'items' => array(
                        'name' => 'SecurityGroupId',
                        'type' => 'string',
                    ),
                ),
                'Scheme' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Tags' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Tags.member',
                    'minItems' => 1,
                    'items' => array(
                        'name' => 'Tag',
                        'type' => 'object',
                        'properties' => array(
                            'Key' => array(
                                'required' => true,
                                'type' => 'string',
                                'minLength' => 1,
                                'maxLength' => 128,
                            ),
                            'Value' => array(
                                'type' => 'string',
                                'maxLength' => 256,
                            ),
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The load balancer name already exists for this account. Please choose another name.',
                    'class' => 'DuplicateAccessPointNameException',
                ),
                array(
                    'reason' => 'The quota for the number of load balancers has already been reached.',
                    'class' => 'TooManyAccessPointsException',
                ),
                array(
                    'reason' => 'The specified SSL ID does not refer to a valid SSL certificate in the AWS Identity and Access Management Service.',
                    'class' => 'CertificateNotFoundException',
                ),
                array(
                    'reason' => 'Requested configuration change is invalid.',
                    'class' => 'InvalidConfigurationRequestException',
                ),
                array(
                    'reason' => 'One or more subnets were not found.',
                    'class' => 'SubnetNotFoundException',
                ),
                array(
                    'reason' => 'The VPC has no Internet gateway.',
                    'class' => 'InvalidSubnetException',
                ),
                array(
                    'reason' => 'One or more specified security groups do not exist.',
                    'class' => 'InvalidSecurityGroupException',
                ),
                array(
                    'reason' => 'Invalid value for scheme. Scheme can only be specified for load balancers in VPC.',
                    'class' => 'InvalidSchemeException',
                ),
                array(
                    'reason' => 'The quota for the number of tags that can be assigned to a load balancer has been reached.',
                    'class' => 'TooManyTagsException',
                ),
                array(
                    'reason' => 'The same tag key specified multiple times.',
                    'class' => 'DuplicateTagKeysException',
                ),
            ),
        ),
        'CreateLoadBalancerListeners' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateLoadBalancerListeners',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-06-01',
                ),
                'LoadBalancerName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Listeners' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Listeners.member',
                    'items' => array(
                        'name' => 'Listener',
                        'type' => 'object',
                        'properties' => array(
                            'Protocol' => array(
                                'required' => true,
                                'type' => 'string',
                            ),
                            'LoadBalancerPort' => array(
                                'required' => true,
                                'type' => 'numeric',
                            ),
                            'InstanceProtocol' => array(
                                'type' => 'string',
                            ),
                            'InstancePort' => array(
                                'required' => true,
                                'type' => 'numeric',
                                'minimum' => 1,
                                'maximum' => 65535,
                            ),
                            'SSLCertificateId' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified load balancer could not be found.',
                    'class' => 'AccessPointNotFoundException',
                ),
                array(
                    'reason' => 'A Listener already exists for the given LoadBalancerName and LoadBalancerPort, but with a different InstancePort, Protocol, or SSLCertificateId.',
                    'class' => 'DuplicateListenerException',
                ),
                array(
                    'reason' => 'The specified SSL ID does not refer to a valid SSL certificate in the AWS Identity and Access Management Service.',
                    'class' => 'CertificateNotFoundException',
                ),
                array(
                    'reason' => 'Requested configuration change is invalid.',
                    'class' => 'InvalidConfigurationRequestException',
                ),
            ),
        ),
        'CreateLoadBalancerPolicy' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateLoadBalancerPolicy',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-06-01',
                ),
                'LoadBalancerName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'PolicyName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'PolicyTypeName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'PolicyAttributes' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'PolicyAttributes.member',
                    'items' => array(
                        'name' => 'PolicyAttribute',
                        'type' => 'object',
                        'properties' => array(
                            'AttributeName' => array(
                                'type' => 'string',
                            ),
                            'AttributeValue' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified load balancer could not be found.',
                    'class' => 'AccessPointNotFoundException',
                ),
                array(
                    'reason' => 'One or more of the specified policy types do not exist.',
                    'class' => 'PolicyTypeNotFoundException',
                ),
                array(
                    'reason' => 'Policy with the same name exists for this load balancer. Please choose another name.',
                    'class' => 'DuplicatePolicyNameException',
                ),
                array(
                    'reason' => 'Quota for number of policies for this load balancer has already been reached.',
                    'class' => 'TooManyPoliciesException',
                ),
                array(
                    'reason' => 'Requested configuration change is invalid.',
                    'class' => 'InvalidConfigurationRequestException',
                ),
            ),
        ),
        'DeleteLoadBalancer' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteLoadBalancer',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-06-01',
                ),
                'LoadBalancerName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DeleteLoadBalancerListeners' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteLoadBalancerListeners',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-06-01',
                ),
                'LoadBalancerName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'LoadBalancerPorts' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'LoadBalancerPorts.member',
                    'items' => array(
                        'name' => 'AccessPointPort',
                        'type' => 'numeric',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified load balancer could not be found.',
                    'class' => 'AccessPointNotFoundException',
                ),
            ),
        ),
        'DeleteLoadBalancerPolicy' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteLoadBalancerPolicy',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-06-01',
                ),
                'LoadBalancerName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'PolicyName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified load balancer could not be found.',
                    'class' => 'AccessPointNotFoundException',
                ),
                array(
                    'reason' => 'Requested configuration change is invalid.',
                    'class' => 'InvalidConfigurationRequestException',
                ),
            ),
        ),
        'DeregisterInstancesFromLoadBalancer' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DeregisterEndPointsOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeregisterInstancesFromLoadBalancer',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-06-01',
                ),
                'LoadBalancerName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Instances' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Instances.member',
                    'items' => array(
                        'name' => 'Instance',
                        'type' => 'object',
                        'properties' => array(
                            'InstanceId' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified load balancer could not be found.',
                    'class' => 'AccessPointNotFoundException',
                ),
                array(
                    'reason' => 'The specified EndPoint is not valid.',
                    'class' => 'InvalidEndPointException',
                ),
            ),
        ),
        'DescribeInstanceHealth' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeEndPointStateOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeInstanceHealth',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-06-01',
                ),
                'LoadBalancerName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Instances' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Instances.member',
                    'items' => array(
                        'name' => 'Instance',
                        'type' => 'object',
                        'properties' => array(
                            'InstanceId' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified load balancer could not be found.',
                    'class' => 'AccessPointNotFoundException',
                ),
                array(
                    'reason' => 'The specified EndPoint is not valid.',
                    'class' => 'InvalidEndPointException',
                ),
            ),
        ),
        'DescribeLoadBalancerAttributes' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeLoadBalancerAttributesOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeLoadBalancerAttributes',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-06-01',
                ),
                'LoadBalancerName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified load balancer could not be found.',
                    'class' => 'AccessPointNotFoundException',
                ),
                array(
                    'reason' => 'The specified load balancer attribute could not be found.',
                    'class' => 'LoadBalancerAttributeNotFoundException',
                ),
            ),
        ),
        'DescribeLoadBalancerPolicies' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeLoadBalancerPoliciesOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeLoadBalancerPolicies',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-06-01',
                ),
                'LoadBalancerName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'PolicyNames' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'PolicyNames.member',
                    'items' => array(
                        'name' => 'PolicyName',
                        'type' => 'string',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified load balancer could not be found.',
                    'class' => 'AccessPointNotFoundException',
                ),
                array(
                    'reason' => 'One or more specified policies were not found.',
                    'class' => 'PolicyNotFoundException',
                ),
            ),
        ),
        'DescribeLoadBalancerPolicyTypes' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeLoadBalancerPolicyTypesOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeLoadBalancerPolicyTypes',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-06-01',
                ),
                'PolicyTypeNames' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'PolicyTypeNames.member',
                    'items' => array(
                        'name' => 'PolicyTypeName',
                        'type' => 'string',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'One or more of the specified policy types do not exist.',
                    'class' => 'PolicyTypeNotFoundException',
                ),
            ),
        ),
        'DescribeLoadBalancers' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeAccessPointsOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeLoadBalancers',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-06-01',
                ),
                'LoadBalancerNames' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'LoadBalancerNames.member',
                    'items' => array(
                        'name' => 'AccessPointName',
                        'type' => 'string',
                    ),
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'PageSize' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                    'minimum' => 1,
                    'maximum' => 400,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified load balancer could not be found.',
                    'class' => 'AccessPointNotFoundException',
                ),
            ),
        ),
        'DescribeTags' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeTagsOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeTags',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-06-01',
                ),
                'LoadBalancerNames' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'LoadBalancerNames.member',
                    'minItems' => 1,
                    'maxItems' => 20,
                    'items' => array(
                        'name' => 'AccessPointName',
                        'type' => 'string',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified load balancer could not be found.',
                    'class' => 'AccessPointNotFoundException',
                ),
            ),
        ),
        'DetachLoadBalancerFromSubnets' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DetachLoadBalancerFromSubnetsOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DetachLoadBalancerFromSubnets',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-06-01',
                ),
                'LoadBalancerName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Subnets' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Subnets.member',
                    'items' => array(
                        'name' => 'SubnetId',
                        'type' => 'string',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified load balancer could not be found.',
                    'class' => 'AccessPointNotFoundException',
                ),
                array(
                    'reason' => 'Requested configuration change is invalid.',
                    'class' => 'InvalidConfigurationRequestException',
                ),
            ),
        ),
        'DisableAvailabilityZonesForLoadBalancer' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'RemoveAvailabilityZonesOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DisableAvailabilityZonesForLoadBalancer',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-06-01',
                ),
                'LoadBalancerName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'AvailabilityZones' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'AvailabilityZones.member',
                    'items' => array(
                        'name' => 'AvailabilityZone',
                        'type' => 'string',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified load balancer could not be found.',
                    'class' => 'AccessPointNotFoundException',
                ),
                array(
                    'reason' => 'Requested configuration change is invalid.',
                    'class' => 'InvalidConfigurationRequestException',
                ),
            ),
        ),
        'EnableAvailabilityZonesForLoadBalancer' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'AddAvailabilityZonesOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'EnableAvailabilityZonesForLoadBalancer',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-06-01',
                ),
                'LoadBalancerName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'AvailabilityZones' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'AvailabilityZones.member',
                    'items' => array(
                        'name' => 'AvailabilityZone',
                        'type' => 'string',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified load balancer could not be found.',
                    'class' => 'AccessPointNotFoundException',
                ),
            ),
        ),
        'ModifyLoadBalancerAttributes' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ModifyLoadBalancerAttributesOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ModifyLoadBalancerAttributes',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-06-01',
                ),
                'LoadBalancerName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'LoadBalancerAttributes' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'aws.query',
                    'properties' => array(
                        'CrossZoneLoadBalancing' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Enabled' => array(
                                    'required' => true,
                                    'type' => 'boolean',
                                    'format' => 'boolean-string',
                                ),
                            ),
                        ),
                        'AccessLog' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Enabled' => array(
                                    'required' => true,
                                    'type' => 'boolean',
                                    'format' => 'boolean-string',
                                ),
                                'S3BucketName' => array(
                                    'type' => 'string',
                                ),
                                'EmitInterval' => array(
                                    'type' => 'numeric',
                                ),
                                'S3BucketPrefix' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'ConnectionDraining' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Enabled' => array(
                                    'required' => true,
                                    'type' => 'boolean',
                                    'format' => 'boolean-string',
                                ),
                                'Timeout' => array(
                                    'type' => 'numeric',
                                ),
                            ),
                        ),
                        'ConnectionSettings' => array(
                            'type' => 'object',
                            'properties' => array(
                                'IdleTimeout' => array(
                                    'required' => true,
                                    'type' => 'numeric',
                                    'minimum' => 1,
                                    'maximum' => 3600,
                                ),
                            ),
                        ),
                        'AdditionalAttributes' => array(
                            'type' => 'array',
                            'sentAs' => 'AdditionalAttributes.member',
                            'items' => array(
                                'name' => 'AdditionalAttribute',
                                'type' => 'object',
                                'properties' => array(
                                    'Key' => array(
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
            'errorResponses' => array(
                array(
                    'reason' => 'The specified load balancer could not be found.',
                    'class' => 'AccessPointNotFoundException',
                ),
                array(
                    'reason' => 'The specified load balancer attribute could not be found.',
                    'class' => 'LoadBalancerAttributeNotFoundException',
                ),
                array(
                    'reason' => 'Requested configuration change is invalid.',
                    'class' => 'InvalidConfigurationRequestException',
                ),
            ),
        ),
        'RegisterInstancesWithLoadBalancer' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'RegisterEndPointsOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'RegisterInstancesWithLoadBalancer',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-06-01',
                ),
                'LoadBalancerName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Instances' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Instances.member',
                    'items' => array(
                        'name' => 'Instance',
                        'type' => 'object',
                        'properties' => array(
                            'InstanceId' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified load balancer could not be found.',
                    'class' => 'AccessPointNotFoundException',
                ),
                array(
                    'reason' => 'The specified EndPoint is not valid.',
                    'class' => 'InvalidEndPointException',
                ),
            ),
        ),
        'RemoveTags' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'RemoveTags',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-06-01',
                ),
                'LoadBalancerNames' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'LoadBalancerNames.member',
                    'items' => array(
                        'name' => 'AccessPointName',
                        'type' => 'string',
                    ),
                ),
                'Tags' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Tags.member',
                    'minItems' => 1,
                    'items' => array(
                        'name' => 'TagKeyOnly',
                        'type' => 'object',
                        'properties' => array(
                            'Key' => array(
                                'type' => 'string',
                                'minLength' => 1,
                                'maxLength' => 128,
                            ),
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified load balancer could not be found.',
                    'class' => 'AccessPointNotFoundException',
                ),
            ),
        ),
        'SetLoadBalancerListenerSSLCertificate' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'SetLoadBalancerListenerSSLCertificate',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-06-01',
                ),
                'LoadBalancerName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'LoadBalancerPort' => array(
                    'required' => true,
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'SSLCertificateId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified SSL ID does not refer to a valid SSL certificate in the AWS Identity and Access Management Service.',
                    'class' => 'CertificateNotFoundException',
                ),
                array(
                    'reason' => 'The specified load balancer could not be found.',
                    'class' => 'AccessPointNotFoundException',
                ),
                array(
                    'reason' => 'Load balancer does not have a listener configured at the given port.',
                    'class' => 'ListenerNotFoundException',
                ),
                array(
                    'reason' => 'Requested configuration change is invalid.',
                    'class' => 'InvalidConfigurationRequestException',
                ),
            ),
        ),
        'SetLoadBalancerPoliciesForBackendServer' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'SetLoadBalancerPoliciesForBackendServer',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-06-01',
                ),
                'LoadBalancerName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'InstancePort' => array(
                    'required' => true,
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'PolicyNames' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'PolicyNames.member',
                    'items' => array(
                        'name' => 'PolicyName',
                        'type' => 'string',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified load balancer could not be found.',
                    'class' => 'AccessPointNotFoundException',
                ),
                array(
                    'reason' => 'One or more specified policies were not found.',
                    'class' => 'PolicyNotFoundException',
                ),
                array(
                    'reason' => 'Requested configuration change is invalid.',
                    'class' => 'InvalidConfigurationRequestException',
                ),
            ),
        ),
        'SetLoadBalancerPoliciesOfListener' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'SetLoadBalancerPoliciesOfListener',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-06-01',
                ),
                'LoadBalancerName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'LoadBalancerPort' => array(
                    'required' => true,
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'PolicyNames' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'PolicyNames.member',
                    'items' => array(
                        'name' => 'PolicyName',
                        'type' => 'string',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified load balancer could not be found.',
                    'class' => 'AccessPointNotFoundException',
                ),
                array(
                    'reason' => 'One or more specified policies were not found.',
                    'class' => 'PolicyNotFoundException',
                ),
                array(
                    'reason' => 'Load balancer does not have a listener configured at the given port.',
                    'class' => 'ListenerNotFoundException',
                ),
                array(
                    'reason' => 'Requested configuration change is invalid.',
                    'class' => 'InvalidConfigurationRequestException',
                ),
            ),
        ),
    ),
    'models' => array(
        'EmptyOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
        ),
        'ApplySecurityGroupsToLoadBalancerOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'SecurityGroups' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'SecurityGroupId',
                        'type' => 'string',
                        'sentAs' => 'member',
                    ),
                ),
            ),
        ),
        'AttachLoadBalancerToSubnetsOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Subnets' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'SubnetId',
                        'type' => 'string',
                        'sentAs' => 'member',
                    ),
                ),
            ),
        ),
        'ConfigureHealthCheckOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'HealthCheck' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Target' => array(
                            'type' => 'string',
                        ),
                        'Interval' => array(
                            'type' => 'numeric',
                        ),
                        'Timeout' => array(
                            'type' => 'numeric',
                        ),
                        'UnhealthyThreshold' => array(
                            'type' => 'numeric',
                        ),
                        'HealthyThreshold' => array(
                            'type' => 'numeric',
                        ),
                    ),
                ),
            ),
        ),
        'CreateAccessPointOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'DNSName' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'DeregisterEndPointsOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Instances' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'Instance',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'InstanceId' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeEndPointStateOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'InstanceStates' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'InstanceState',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'InstanceId' => array(
                                'type' => 'string',
                            ),
                            'State' => array(
                                'type' => 'string',
                            ),
                            'ReasonCode' => array(
                                'type' => 'string',
                            ),
                            'Description' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeLoadBalancerAttributesOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'LoadBalancerAttributes' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'CrossZoneLoadBalancing' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Enabled' => array(
                                    'type' => 'boolean',
                                ),
                            ),
                        ),
                        'AccessLog' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Enabled' => array(
                                    'type' => 'boolean',
                                ),
                                'S3BucketName' => array(
                                    'type' => 'string',
                                ),
                                'EmitInterval' => array(
                                    'type' => 'numeric',
                                ),
                                'S3BucketPrefix' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'ConnectionDraining' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Enabled' => array(
                                    'type' => 'boolean',
                                ),
                                'Timeout' => array(
                                    'type' => 'numeric',
                                ),
                            ),
                        ),
                        'ConnectionSettings' => array(
                            'type' => 'object',
                            'properties' => array(
                                'IdleTimeout' => array(
                                    'type' => 'numeric',
                                ),
                            ),
                        ),
                        'AdditionalAttributes' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'AdditionalAttribute',
                                'type' => 'object',
                                'sentAs' => 'member',
                                'properties' => array(
                                    'Key' => array(
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
        'DescribeLoadBalancerPoliciesOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'PolicyDescriptions' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'PolicyDescription',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'PolicyName' => array(
                                'type' => 'string',
                            ),
                            'PolicyTypeName' => array(
                                'type' => 'string',
                            ),
                            'PolicyAttributeDescriptions' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'PolicyAttributeDescription',
                                    'type' => 'object',
                                    'sentAs' => 'member',
                                    'properties' => array(
                                        'AttributeName' => array(
                                            'type' => 'string',
                                        ),
                                        'AttributeValue' => array(
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
        'DescribeLoadBalancerPolicyTypesOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'PolicyTypeDescriptions' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'PolicyTypeDescription',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'PolicyTypeName' => array(
                                'type' => 'string',
                            ),
                            'Description' => array(
                                'type' => 'string',
                            ),
                            'PolicyAttributeTypeDescriptions' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'PolicyAttributeTypeDescription',
                                    'type' => 'object',
                                    'sentAs' => 'member',
                                    'properties' => array(
                                        'AttributeName' => array(
                                            'type' => 'string',
                                        ),
                                        'AttributeType' => array(
                                            'type' => 'string',
                                        ),
                                        'Description' => array(
                                            'type' => 'string',
                                        ),
                                        'DefaultValue' => array(
                                            'type' => 'string',
                                        ),
                                        'Cardinality' => array(
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
        'DescribeAccessPointsOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'LoadBalancerDescriptions' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'LoadBalancerDescription',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'LoadBalancerName' => array(
                                'type' => 'string',
                            ),
                            'DNSName' => array(
                                'type' => 'string',
                            ),
                            'CanonicalHostedZoneName' => array(
                                'type' => 'string',
                            ),
                            'CanonicalHostedZoneNameID' => array(
                                'type' => 'string',
                            ),
                            'ListenerDescriptions' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'ListenerDescription',
                                    'type' => 'object',
                                    'sentAs' => 'member',
                                    'properties' => array(
                                        'Listener' => array(
                                            'type' => 'object',
                                            'properties' => array(
                                                'Protocol' => array(
                                                    'type' => 'string',
                                                ),
                                                'LoadBalancerPort' => array(
                                                    'type' => 'numeric',
                                                ),
                                                'InstanceProtocol' => array(
                                                    'type' => 'string',
                                                ),
                                                'InstancePort' => array(
                                                    'type' => 'numeric',
                                                ),
                                                'SSLCertificateId' => array(
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                        'PolicyNames' => array(
                                            'type' => 'array',
                                            'items' => array(
                                                'name' => 'PolicyName',
                                                'type' => 'string',
                                                'sentAs' => 'member',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            'Policies' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'AppCookieStickinessPolicies' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'AppCookieStickinessPolicy',
                                            'type' => 'object',
                                            'sentAs' => 'member',
                                            'properties' => array(
                                                'PolicyName' => array(
                                                    'type' => 'string',
                                                ),
                                                'CookieName' => array(
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                    ),
                                    'LBCookieStickinessPolicies' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'LBCookieStickinessPolicy',
                                            'type' => 'object',
                                            'sentAs' => 'member',
                                            'properties' => array(
                                                'PolicyName' => array(
                                                    'type' => 'string',
                                                ),
                                                'CookieExpirationPeriod' => array(
                                                    'type' => 'numeric',
                                                ),
                                            ),
                                        ),
                                    ),
                                    'OtherPolicies' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'PolicyName',
                                            'type' => 'string',
                                            'sentAs' => 'member',
                                        ),
                                    ),
                                ),
                            ),
                            'BackendServerDescriptions' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'BackendServerDescription',
                                    'type' => 'object',
                                    'sentAs' => 'member',
                                    'properties' => array(
                                        'InstancePort' => array(
                                            'type' => 'numeric',
                                        ),
                                        'PolicyNames' => array(
                                            'type' => 'array',
                                            'items' => array(
                                                'name' => 'PolicyName',
                                                'type' => 'string',
                                                'sentAs' => 'member',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            'AvailabilityZones' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'AvailabilityZone',
                                    'type' => 'string',
                                    'sentAs' => 'member',
                                ),
                            ),
                            'Subnets' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'SubnetId',
                                    'type' => 'string',
                                    'sentAs' => 'member',
                                ),
                            ),
                            'VPCId' => array(
                                'type' => 'string',
                            ),
                            'Instances' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'Instance',
                                    'type' => 'object',
                                    'sentAs' => 'member',
                                    'properties' => array(
                                        'InstanceId' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                            'HealthCheck' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'Target' => array(
                                        'type' => 'string',
                                    ),
                                    'Interval' => array(
                                        'type' => 'numeric',
                                    ),
                                    'Timeout' => array(
                                        'type' => 'numeric',
                                    ),
                                    'UnhealthyThreshold' => array(
                                        'type' => 'numeric',
                                    ),
                                    'HealthyThreshold' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'SourceSecurityGroup' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'OwnerAlias' => array(
                                        'type' => 'string',
                                    ),
                                    'GroupName' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'SecurityGroups' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'SecurityGroupId',
                                    'type' => 'string',
                                    'sentAs' => 'member',
                                ),
                            ),
                            'CreatedTime' => array(
                                'type' => 'string',
                            ),
                            'Scheme' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'NextMarker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'DescribeTagsOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'TagDescriptions' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'TagDescription',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'LoadBalancerName' => array(
                                'type' => 'string',
                            ),
                            'Tags' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'Tag',
                                    'type' => 'object',
                                    'sentAs' => 'member',
                                    'properties' => array(
                                        'Key' => array(
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
        'DetachLoadBalancerFromSubnetsOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Subnets' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'SubnetId',
                        'type' => 'string',
                        'sentAs' => 'member',
                    ),
                ),
            ),
        ),
        'RemoveAvailabilityZonesOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'AvailabilityZones' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'AvailabilityZone',
                        'type' => 'string',
                        'sentAs' => 'member',
                    ),
                ),
            ),
        ),
        'AddAvailabilityZonesOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'AvailabilityZones' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'AvailabilityZone',
                        'type' => 'string',
                        'sentAs' => 'member',
                    ),
                ),
            ),
        ),
        'ModifyLoadBalancerAttributesOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'LoadBalancerName' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'LoadBalancerAttributes' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'CrossZoneLoadBalancing' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Enabled' => array(
                                    'type' => 'boolean',
                                ),
                            ),
                        ),
                        'AccessLog' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Enabled' => array(
                                    'type' => 'boolean',
                                ),
                                'S3BucketName' => array(
                                    'type' => 'string',
                                ),
                                'EmitInterval' => array(
                                    'type' => 'numeric',
                                ),
                                'S3BucketPrefix' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'ConnectionDraining' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Enabled' => array(
                                    'type' => 'boolean',
                                ),
                                'Timeout' => array(
                                    'type' => 'numeric',
                                ),
                            ),
                        ),
                        'ConnectionSettings' => array(
                            'type' => 'object',
                            'properties' => array(
                                'IdleTimeout' => array(
                                    'type' => 'numeric',
                                ),
                            ),
                        ),
                        'AdditionalAttributes' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'AdditionalAttribute',
                                'type' => 'object',
                                'sentAs' => 'member',
                                'properties' => array(
                                    'Key' => array(
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
        'RegisterEndPointsOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Instances' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'Instance',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'InstanceId' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'iterators' => array(
        'DescribeInstanceHealth' => array(
            'result_key' => 'InstanceStates',
        ),
        'DescribeLoadBalancerPolicies' => array(
            'result_key' => 'PolicyDescriptions',
        ),
        'DescribeLoadBalancerPolicyTypes' => array(
            'result_key' => 'PolicyTypeDescriptions',
        ),
        'DescribeLoadBalancers' => array(
            'input_token' => 'Marker',
            'output_token' => 'NextMarker',
            'result_key' => 'LoadBalancerDescriptions',
        ),
        'DescribeTags' => array(
            'result_key' => 'TagDescriptions',
        ),
    ),
);
