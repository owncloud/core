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
    'apiVersion' => '2013-04-01',
    'endpointPrefix' => 'route53',
    'serviceFullName' => 'Amazon Route 53',
    'serviceAbbreviation' => 'Route 53',
    'serviceType' => 'rest-xml',
    'globalEndpoint' => 'route53.amazonaws.com',
    'signatureVersion' => 'v3https',
    'namespace' => 'Route53',
    'regions' => array(
        'us-east-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'route53.amazonaws.com',
        ),
        'us-west-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'route53.amazonaws.com',
        ),
        'us-west-2' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'route53.amazonaws.com',
        ),
        'eu-west-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'route53.amazonaws.com',
        ),
        'ap-northeast-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'route53.amazonaws.com',
        ),
        'ap-southeast-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'route53.amazonaws.com',
        ),
        'ap-southeast-2' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'route53.amazonaws.com',
        ),
        'sa-east-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'route53.amazonaws.com',
        ),
    ),
    'operations' => array(
        'AssociateVPCWithHostedZone' => array(
            'httpMethod' => 'POST',
            'uri' => '/2013-04-01/hostedzone/{HostedZoneId}/associatevpc',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'AssociateVPCWithHostedZoneResponse',
            'responseType' => 'model',
            'data' => array(
                'xmlRoot' => array(
                    'name' => 'AssociateVPCWithHostedZoneRequest',
                    'namespaces' => array(
                        'https://route53.amazonaws.com/doc/2013-04-01/',
                    ),
                ),
            ),
            'parameters' => array(
                'HostedZoneId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'maxLength' => 32,
                ),
                'VPC' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'VPCRegion' => array(
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 64,
                        ),
                        'VPCId' => array(
                            'type' => 'string',
                            'maxLength' => 1024,
                        ),
                    ),
                ),
                'Comment' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'NoSuchHostedZoneException',
                ),
                array(
                    'reason' => 'The hosted zone you are trying to create for your VPC_ID does not belong to you. Route 53 returns this error when the VPC specified by VPCId does not belong to you.',
                    'class' => 'InvalidVPCIdException',
                ),
                array(
                    'reason' => 'Some value specified in the request is invalid or the XML document is malformed.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'The hosted zone you are trying to associate VPC with doesn\'t have any VPC association. Route 53 currently doesn\'t support associate a VPC with a public hosted zone.',
                    'class' => 'PublicZoneVPCAssociationException',
                ),
                array(
                    'class' => 'ConflictingDomainExistsException',
                ),
            ),
        ),
        'ChangeResourceRecordSets' => array(
            'httpMethod' => 'POST',
            'uri' => '/2013-04-01/hostedzone/{HostedZoneId}/rrset/',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'ChangeResourceRecordSetsResponse',
            'responseType' => 'model',
            'data' => array(
                'xmlRoot' => array(
                    'name' => 'ChangeResourceRecordSetsRequest',
                    'namespaces' => array(
                        'https://route53.amazonaws.com/doc/2013-04-01/',
                    ),
                ),
            ),
            'parameters' => array(
                'HostedZoneId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'maxLength' => 32,
                    'filters' => array(
                        'Aws\\Route53\\Route53Client::cleanId',
                    ),
                ),
                'ChangeBatch' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Comment' => array(
                            'type' => 'string',
                            'maxLength' => 256,
                        ),
                        'Changes' => array(
                            'required' => true,
                            'type' => 'array',
                            'minItems' => 1,
                            'items' => array(
                                'name' => 'Change',
                                'type' => 'object',
                                'properties' => array(
                                    'Action' => array(
                                        'required' => true,
                                        'type' => 'string',
                                    ),
                                    'ResourceRecordSet' => array(
                                        'required' => true,
                                        'type' => 'object',
                                        'properties' => array(
                                            'Name' => array(
                                                'required' => true,
                                                'type' => 'string',
                                                'maxLength' => 1024,
                                            ),
                                            'Type' => array(
                                                'required' => true,
                                                'type' => 'string',
                                            ),
                                            'SetIdentifier' => array(
                                                'type' => 'string',
                                                'minLength' => 1,
                                                'maxLength' => 128,
                                            ),
                                            'Weight' => array(
                                                'type' => 'numeric',
                                                'maximum' => 255,
                                            ),
                                            'Region' => array(
                                                'type' => 'string',
                                                'minLength' => 1,
                                                'maxLength' => 64,
                                            ),
                                            'GeoLocation' => array(
                                                'type' => 'object',
                                                'properties' => array(
                                                    'ContinentCode' => array(
                                                        'type' => 'string',
                                                        'minLength' => 2,
                                                        'maxLength' => 2,
                                                    ),
                                                    'CountryCode' => array(
                                                        'type' => 'string',
                                                        'minLength' => 1,
                                                        'maxLength' => 2,
                                                    ),
                                                    'SubdivisionCode' => array(
                                                        'type' => 'string',
                                                        'minLength' => 1,
                                                        'maxLength' => 3,
                                                    ),
                                                ),
                                            ),
                                            'Failover' => array(
                                                'type' => 'string',
                                            ),
                                            'TTL' => array(
                                                'type' => 'numeric',
                                                'maximum' => 2147483647,
                                            ),
                                            'ResourceRecords' => array(
                                                'type' => 'array',
                                                'minItems' => 1,
                                                'items' => array(
                                                    'name' => 'ResourceRecord',
                                                    'type' => 'object',
                                                    'properties' => array(
                                                        'Value' => array(
                                                            'required' => true,
                                                            'type' => 'string',
                                                            'maxLength' => 4000,
                                                        ),
                                                    ),
                                                ),
                                            ),
                                            'AliasTarget' => array(
                                                'type' => 'object',
                                                'properties' => array(
                                                    'HostedZoneId' => array(
                                                        'required' => true,
                                                        'type' => 'string',
                                                        'maxLength' => 32,
                                                    ),
                                                    'DNSName' => array(
                                                        'required' => true,
                                                        'type' => 'string',
                                                        'maxLength' => 1024,
                                                    ),
                                                    'EvaluateTargetHealth' => array(
                                                        'required' => true,
                                                        'type' => 'boolean',
                                                        'format' => 'boolean-string',
                                                    ),
                                                ),
                                            ),
                                            'HealthCheckId' => array(
                                                'type' => 'string',
                                                'maxLength' => 64,
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'NoSuchHostedZoneException',
                ),
                array(
                    'reason' => 'The health check you are trying to get or delete does not exist.',
                    'class' => 'NoSuchHealthCheckException',
                ),
                array(
                    'reason' => 'This error contains a list of one or more error messages. Each error message indicates one error in the change batch. For more information, see Example InvalidChangeBatch Errors.',
                    'class' => 'InvalidChangeBatchException',
                ),
                array(
                    'reason' => 'Some value specified in the request is invalid or the XML document is malformed.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'The request was rejected because Route 53 was still processing a prior request.',
                    'class' => 'PriorRequestNotCompleteException',
                ),
            ),
        ),
        'ChangeTagsForResource' => array(
            'httpMethod' => 'POST',
            'uri' => '/2013-04-01/tags/{ResourceType}/{ResourceId}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'ChangeTagsForResourceResponse',
            'responseType' => 'model',
            'data' => array(
                'xmlRoot' => array(
                    'name' => 'ChangeTagsForResourceRequest',
                    'namespaces' => array(
                        'https://route53.amazonaws.com/doc/2013-04-01/',
                    ),
                ),
            ),
            'parameters' => array(
                'ResourceType' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'ResourceId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'maxLength' => 64,
                ),
                'AddTags' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'minItems' => 1,
                    'maxItems' => 10,
                    'items' => array(
                        'name' => 'Tag',
                        'type' => 'object',
                        'properties' => array(
                            'Key' => array(
                                'type' => 'string',
                                'maxLength' => 128,
                            ),
                            'Value' => array(
                                'type' => 'string',
                                'maxLength' => 256,
                            ),
                        ),
                    ),
                ),
                'RemoveTagKeys' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'minItems' => 1,
                    'maxItems' => 10,
                    'items' => array(
                        'name' => 'Key',
                        'type' => 'string',
                        'maxLength' => 128,
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Some value specified in the request is invalid or the XML document is malformed.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'The health check you are trying to get or delete does not exist.',
                    'class' => 'NoSuchHealthCheckException',
                ),
                array(
                    'reason' => 'The request was rejected because Route 53 was still processing a prior request.',
                    'class' => 'PriorRequestNotCompleteException',
                ),
                array(
                    'class' => 'ThrottlingException',
                ),
            ),
        ),
        'CreateHealthCheck' => array(
            'httpMethod' => 'POST',
            'uri' => '/2013-04-01/healthcheck',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'CreateHealthCheckResponse',
            'responseType' => 'model',
            'data' => array(
                'xmlRoot' => array(
                    'name' => 'CreateHealthCheckRequest',
                    'namespaces' => array(
                        'https://route53.amazonaws.com/doc/2013-04-01/',
                    ),
                ),
            ),
            'parameters' => array(
                'CallerReference' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'xml',
                    'minLength' => 1,
                    'maxLength' => 64,
                ),
                'HealthCheckConfig' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'IPAddress' => array(
                            'type' => 'string',
                            'maxLength' => 15,
                        ),
                        'Port' => array(
                            'type' => 'numeric',
                            'minimum' => 1,
                            'maximum' => 65535,
                        ),
                        'Type' => array(
                            'required' => true,
                            'type' => 'string',
                        ),
                        'ResourcePath' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'FullyQualifiedDomainName' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'SearchString' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'RequestInterval' => array(
                            'type' => 'numeric',
                            'minimum' => 10,
                            'maximum' => 30,
                        ),
                        'FailureThreshold' => array(
                            'type' => 'numeric',
                            'minimum' => 1,
                            'maximum' => 10,
                        ),
                    ),
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'TooManyHealthChecksException',
                ),
                array(
                    'reason' => 'The health check you are trying to create already exists. Route 53 returns this error when a health check has already been created with the specified CallerReference.',
                    'class' => 'HealthCheckAlreadyExistsException',
                ),
                array(
                    'reason' => 'Some value specified in the request is invalid or the XML document is malformed.',
                    'class' => 'InvalidInputException',
                ),
            ),
        ),
        'CreateHostedZone' => array(
            'httpMethod' => 'POST',
            'uri' => '/2013-04-01/hostedzone',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'CreateHostedZoneResponse',
            'responseType' => 'model',
            'data' => array(
                'xmlRoot' => array(
                    'name' => 'CreateHostedZoneRequest',
                    'namespaces' => array(
                        'https://route53.amazonaws.com/doc/2013-04-01/',
                    ),
                ),
            ),
            'parameters' => array(
                'Name' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'xml',
                    'maxLength' => 1024,
                ),
                'VPC' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'VPCRegion' => array(
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 64,
                        ),
                        'VPCId' => array(
                            'type' => 'string',
                            'maxLength' => 1024,
                        ),
                    ),
                ),
                'CallerReference' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'xml',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
                'HostedZoneConfig' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Comment' => array(
                            'type' => 'string',
                            'maxLength' => 256,
                        ),
                        'PrivateZone' => array(
                            'type' => 'boolean',
                            'format' => 'boolean-string',
                        ),
                    ),
                ),
                'DelegationSetId' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'maxLength' => 32,
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'This error indicates that the specified domain name is not valid.',
                    'class' => 'InvalidDomainNameException',
                ),
                array(
                    'reason' => 'The hosted zone you are trying to create already exists. Route 53 returns this error when a hosted zone has already been created with the specified CallerReference.',
                    'class' => 'HostedZoneAlreadyExistsException',
                ),
                array(
                    'reason' => 'This error indicates that you\'ve reached the maximum number of hosted zones that can be created for the current AWS account. You can request an increase to the limit on the Contact Us page.',
                    'class' => 'TooManyHostedZonesException',
                ),
                array(
                    'reason' => 'The hosted zone you are trying to create for your VPC_ID does not belong to you. Route 53 returns this error when the VPC specified by VPCId does not belong to you.',
                    'class' => 'InvalidVPCIdException',
                ),
                array(
                    'reason' => 'Some value specified in the request is invalid or the XML document is malformed.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'Route 53 allows some duplicate domain names, but there is a maximum number of duplicate names. This error indicates that you have reached that maximum. If you want to create another hosted zone with the same name and Route 53 generates this error, you can request an increase to the limit on the Contact Us page.',
                    'class' => 'DelegationSetNotAvailableException',
                ),
                array(
                    'class' => 'ConflictingDomainExistsException',
                ),
                array(
                    'reason' => 'The specified delegation set does not exist.',
                    'class' => 'NoSuchDelegationSetException',
                ),
                array(
                    'reason' => 'The specified delegation set has not been marked as reusable.',
                    'class' => 'DelegationSetNotReusableException',
                ),
            ),
        ),
        'CreateReusableDelegationSet' => array(
            'httpMethod' => 'POST',
            'uri' => '/2013-04-01/delegationset',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'CreateReusableDelegationSetResponse',
            'responseType' => 'model',
            'data' => array(
                'xmlRoot' => array(
                    'name' => 'CreateReusableDelegationSetRequest',
                    'namespaces' => array(
                        'https://route53.amazonaws.com/doc/2013-04-01/',
                    ),
                ),
            ),
            'parameters' => array(
                'CallerReference' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'xml',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
                'HostedZoneId' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'maxLength' => 32,
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'A delegation set with the same owner and caller reference combination has already been created.',
                    'class' => 'DelegationSetAlreadyCreatedException',
                ),
                array(
                    'reason' => 'The limits specified for a resource have been exceeded.',
                    'class' => 'LimitsExceededException',
                ),
                array(
                    'reason' => 'The specified HostedZone cannot be found.',
                    'class' => 'HostedZoneNotFoundException',
                ),
                array(
                    'reason' => 'At least one of the specified arguments is invalid.',
                    'class' => 'InvalidArgumentException',
                ),
                array(
                    'reason' => 'Some value specified in the request is invalid or the XML document is malformed.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'Route 53 allows some duplicate domain names, but there is a maximum number of duplicate names. This error indicates that you have reached that maximum. If you want to create another hosted zone with the same name and Route 53 generates this error, you can request an increase to the limit on the Contact Us page.',
                    'class' => 'DelegationSetNotAvailableException',
                ),
                array(
                    'reason' => 'The specified delegation set has already been marked as reusable.',
                    'class' => 'DelegationSetAlreadyReusableException',
                ),
            ),
        ),
        'DeleteHealthCheck' => array(
            'httpMethod' => 'DELETE',
            'uri' => '/2013-04-01/healthcheck/{HealthCheckId}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'DeleteHealthCheckResponse',
            'responseType' => 'model',
            'parameters' => array(
                'HealthCheckId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'maxLength' => 64,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The health check you are trying to get or delete does not exist.',
                    'class' => 'NoSuchHealthCheckException',
                ),
                array(
                    'reason' => 'There are resource records associated with this health check. Before you can delete the health check, you must disassociate it from the resource record sets.',
                    'class' => 'HealthCheckInUseException',
                ),
                array(
                    'reason' => 'Some value specified in the request is invalid or the XML document is malformed.',
                    'class' => 'InvalidInputException',
                ),
            ),
        ),
        'DeleteHostedZone' => array(
            'httpMethod' => 'DELETE',
            'uri' => '/2013-04-01/hostedzone/{Id}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'DeleteHostedZoneResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Id' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'maxLength' => 32,
                    'filters' => array(
                        'Aws\\Route53\\Route53Client::cleanId',
                    ),
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'NoSuchHostedZoneException',
                ),
                array(
                    'reason' => 'The hosted zone contains resource record sets in addition to the default NS and SOA resource record sets. Before you can delete the hosted zone, you must delete the additional resource record sets.',
                    'class' => 'HostedZoneNotEmptyException',
                ),
                array(
                    'reason' => 'The request was rejected because Route 53 was still processing a prior request.',
                    'class' => 'PriorRequestNotCompleteException',
                ),
                array(
                    'reason' => 'Some value specified in the request is invalid or the XML document is malformed.',
                    'class' => 'InvalidInputException',
                ),
            ),
        ),
        'DeleteReusableDelegationSet' => array(
            'httpMethod' => 'DELETE',
            'uri' => '/2013-04-01/delegationset/{Id}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'DeleteReusableDelegationSetResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Id' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'maxLength' => 32,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified delegation set does not exist.',
                    'class' => 'NoSuchDelegationSetException',
                ),
                array(
                    'reason' => 'The specified delegation contains associated hosted zones which must be deleted before the reusable delegation set can be deleted.',
                    'class' => 'DelegationSetInUseException',
                ),
                array(
                    'reason' => 'The specified delegation set has not been marked as reusable.',
                    'class' => 'DelegationSetNotReusableException',
                ),
                array(
                    'reason' => 'Some value specified in the request is invalid or the XML document is malformed.',
                    'class' => 'InvalidInputException',
                ),
            ),
        ),
        'DisassociateVPCFromHostedZone' => array(
            'httpMethod' => 'POST',
            'uri' => '/2013-04-01/hostedzone/{HostedZoneId}/disassociatevpc',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'DisassociateVPCFromHostedZoneResponse',
            'responseType' => 'model',
            'data' => array(
                'xmlRoot' => array(
                    'name' => 'DisassociateVPCFromHostedZoneRequest',
                    'namespaces' => array(
                        'https://route53.amazonaws.com/doc/2013-04-01/',
                    ),
                ),
            ),
            'parameters' => array(
                'HostedZoneId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'maxLength' => 32,
                ),
                'VPC' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'VPCRegion' => array(
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 64,
                        ),
                        'VPCId' => array(
                            'type' => 'string',
                            'maxLength' => 1024,
                        ),
                    ),
                ),
                'Comment' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'NoSuchHostedZoneException',
                ),
                array(
                    'reason' => 'The hosted zone you are trying to create for your VPC_ID does not belong to you. Route 53 returns this error when the VPC specified by VPCId does not belong to you.',
                    'class' => 'InvalidVPCIdException',
                ),
                array(
                    'reason' => 'The VPC you specified is not currently associated with the hosted zone.',
                    'class' => 'VPCAssociationNotFoundException',
                ),
                array(
                    'reason' => 'The VPC you are trying to disassociate from the hosted zone is the last the VPC that is associated with the hosted zone. Route 53 currently doesn\'t support disassociate the last VPC from the hosted zone.',
                    'class' => 'LastVPCAssociationException',
                ),
                array(
                    'reason' => 'Some value specified in the request is invalid or the XML document is malformed.',
                    'class' => 'InvalidInputException',
                ),
            ),
        ),
        'GetChange' => array(
            'httpMethod' => 'GET',
            'uri' => '/2013-04-01/change/{Id}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'GetChangeResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Id' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'maxLength' => 32,
                    'filters' => array(
                        'Aws\\Route53\\Route53Client::cleanId',
                    ),
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'NoSuchChangeException',
                ),
                array(
                    'reason' => 'Some value specified in the request is invalid or the XML document is malformed.',
                    'class' => 'InvalidInputException',
                ),
            ),
        ),
        'GetCheckerIpRanges' => array(
            'httpMethod' => 'GET',
            'uri' => '/2013-04-01/checkeripranges',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'GetCheckerIpRangesResponse',
            'responseType' => 'model',
            'parameters' => array(
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
        ),
        'GetGeoLocation' => array(
            'httpMethod' => 'GET',
            'uri' => '/2013-04-01/geolocation',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'GetGeoLocationResponse',
            'responseType' => 'model',
            'parameters' => array(
                'ContinentCode' => array(
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'continentcode',
                    'minLength' => 2,
                    'maxLength' => 2,
                ),
                'CountryCode' => array(
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'countrycode',
                    'minLength' => 1,
                    'maxLength' => 2,
                ),
                'SubdivisionCode' => array(
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'subdivisioncode',
                    'minLength' => 1,
                    'maxLength' => 3,
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The geo location you are trying to get does not exist.',
                    'class' => 'NoSuchGeoLocationException',
                ),
                array(
                    'reason' => 'Some value specified in the request is invalid or the XML document is malformed.',
                    'class' => 'InvalidInputException',
                ),
            ),
        ),
        'GetHealthCheck' => array(
            'httpMethod' => 'GET',
            'uri' => '/2013-04-01/healthcheck/{HealthCheckId}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'GetHealthCheckResponse',
            'responseType' => 'model',
            'parameters' => array(
                'HealthCheckId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'maxLength' => 64,
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The health check you are trying to get or delete does not exist.',
                    'class' => 'NoSuchHealthCheckException',
                ),
                array(
                    'reason' => 'Some value specified in the request is invalid or the XML document is malformed.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'The resource you are trying to access is unsupported on this Route 53 endpoint. Please consider using a newer endpoint or a tool that does so.',
                    'class' => 'IncompatibleVersionException',
                ),
            ),
        ),
        'GetHealthCheckCount' => array(
            'httpMethod' => 'GET',
            'uri' => '/2013-04-01/healthcheckcount',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'GetHealthCheckCountResponse',
            'responseType' => 'model',
            'parameters' => array(
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
        ),
        'GetHealthCheckLastFailureReason' => array(
            'httpMethod' => 'GET',
            'uri' => '/2013-04-01/healthcheck/{HealthCheckId}/lastfailurereason',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'GetHealthCheckLastFailureReasonResponse',
            'responseType' => 'model',
            'parameters' => array(
                'HealthCheckId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'maxLength' => 64,
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The health check you are trying to get or delete does not exist.',
                    'class' => 'NoSuchHealthCheckException',
                ),
            ),
        ),
        'GetHealthCheckStatus' => array(
            'httpMethod' => 'GET',
            'uri' => '/2013-04-01/healthcheck/{HealthCheckId}/status',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'GetHealthCheckStatusResponse',
            'responseType' => 'model',
            'parameters' => array(
                'HealthCheckId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'maxLength' => 64,
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The health check you are trying to get or delete does not exist.',
                    'class' => 'NoSuchHealthCheckException',
                ),
            ),
        ),
        'GetHostedZone' => array(
            'httpMethod' => 'GET',
            'uri' => '/2013-04-01/hostedzone/{Id}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'GetHostedZoneResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Id' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'maxLength' => 32,
                    'filters' => array(
                        'Aws\\Route53\\Route53Client::cleanId',
                    ),
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'NoSuchHostedZoneException',
                ),
                array(
                    'reason' => 'Some value specified in the request is invalid or the XML document is malformed.',
                    'class' => 'InvalidInputException',
                ),
            ),
        ),
        'GetReusableDelegationSet' => array(
            'httpMethod' => 'GET',
            'uri' => '/2013-04-01/delegationset/{Id}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'GetReusableDelegationSetResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Id' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'maxLength' => 32,
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified delegation set does not exist.',
                    'class' => 'NoSuchDelegationSetException',
                ),
                array(
                    'reason' => 'The specified delegation set has not been marked as reusable.',
                    'class' => 'DelegationSetNotReusableException',
                ),
                array(
                    'reason' => 'Some value specified in the request is invalid or the XML document is malformed.',
                    'class' => 'InvalidInputException',
                ),
            ),
        ),
        'ListGeoLocations' => array(
            'httpMethod' => 'GET',
            'uri' => '/2013-04-01/geolocations',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'ListGeoLocationsResponse',
            'responseType' => 'model',
            'parameters' => array(
                'StartContinentCode' => array(
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'startcontinentcode',
                    'minLength' => 2,
                    'maxLength' => 2,
                ),
                'StartCountryCode' => array(
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'startcountrycode',
                    'minLength' => 1,
                    'maxLength' => 2,
                ),
                'StartSubdivisionCode' => array(
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'startsubdivisioncode',
                    'minLength' => 1,
                    'maxLength' => 3,
                ),
                'MaxItems' => array(
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'maxitems',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Some value specified in the request is invalid or the XML document is malformed.',
                    'class' => 'InvalidInputException',
                ),
            ),
        ),
        'ListHealthChecks' => array(
            'httpMethod' => 'GET',
            'uri' => '/2013-04-01/healthcheck',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'ListHealthChecksResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'marker',
                    'maxLength' => 64,
                ),
                'MaxItems' => array(
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'maxitems',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Some value specified in the request is invalid or the XML document is malformed.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'The resource you are trying to access is unsupported on this Route 53 endpoint. Please consider using a newer endpoint or a tool that does so.',
                    'class' => 'IncompatibleVersionException',
                ),
            ),
        ),
        'ListHostedZones' => array(
            'httpMethod' => 'GET',
            'uri' => '/2013-04-01/hostedzone',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'ListHostedZonesResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'marker',
                    'maxLength' => 64,
                ),
                'MaxItems' => array(
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'maxitems',
                ),
                'DelegationSetId' => array(
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'delegationsetid',
                    'maxLength' => 32,
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Some value specified in the request is invalid or the XML document is malformed.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'The specified delegation set does not exist.',
                    'class' => 'NoSuchDelegationSetException',
                ),
                array(
                    'reason' => 'The specified delegation set has not been marked as reusable.',
                    'class' => 'DelegationSetNotReusableException',
                ),
            ),
        ),
        'ListResourceRecordSets' => array(
            'httpMethod' => 'GET',
            'uri' => '/2013-04-01/hostedzone/{HostedZoneId}/rrset',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'ListResourceRecordSetsResponse',
            'responseType' => 'model',
            'parameters' => array(
                'HostedZoneId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'maxLength' => 32,
                    'filters' => array(
                        'Aws\\Route53\\Route53Client::cleanId',
                    ),
                ),
                'StartRecordName' => array(
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'name',
                    'maxLength' => 1024,
                ),
                'StartRecordType' => array(
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'type',
                ),
                'StartRecordIdentifier' => array(
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'identifier',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
                'MaxItems' => array(
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'maxitems',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'NoSuchHostedZoneException',
                ),
                array(
                    'reason' => 'Some value specified in the request is invalid or the XML document is malformed.',
                    'class' => 'InvalidInputException',
                ),
            ),
        ),
        'ListReusableDelegationSets' => array(
            'httpMethod' => 'GET',
            'uri' => '/2013-04-01/delegationset',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'ListReusableDelegationSetsResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'marker',
                    'maxLength' => 64,
                ),
                'MaxItems' => array(
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'maxitems',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Some value specified in the request is invalid or the XML document is malformed.',
                    'class' => 'InvalidInputException',
                ),
            ),
        ),
        'ListTagsForResource' => array(
            'httpMethod' => 'GET',
            'uri' => '/2013-04-01/tags/{ResourceType}/{ResourceId}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'ListTagsForResourceResponse',
            'responseType' => 'model',
            'parameters' => array(
                'ResourceType' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'ResourceId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'maxLength' => 64,
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Some value specified in the request is invalid or the XML document is malformed.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'The health check you are trying to get or delete does not exist.',
                    'class' => 'NoSuchHealthCheckException',
                ),
                array(
                    'reason' => 'The request was rejected because Route 53 was still processing a prior request.',
                    'class' => 'PriorRequestNotCompleteException',
                ),
                array(
                    'class' => 'ThrottlingException',
                ),
            ),
        ),
        'ListTagsForResources' => array(
            'httpMethod' => 'POST',
            'uri' => '/2013-04-01/tags/{ResourceType}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'ListTagsForResourcesResponse',
            'responseType' => 'model',
            'data' => array(
                'xmlRoot' => array(
                    'name' => 'ListTagsForResourcesRequest',
                    'namespaces' => array(
                        'https://route53.amazonaws.com/doc/2013-04-01/',
                    ),
                ),
            ),
            'parameters' => array(
                'ResourceType' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'ResourceIds' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'xml',
                    'minItems' => 1,
                    'maxItems' => 10,
                    'items' => array(
                        'name' => 'ResourceId',
                        'type' => 'string',
                        'maxLength' => 64,
                    ),
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Some value specified in the request is invalid or the XML document is malformed.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'The health check you are trying to get or delete does not exist.',
                    'class' => 'NoSuchHealthCheckException',
                ),
                array(
                    'reason' => 'The request was rejected because Route 53 was still processing a prior request.',
                    'class' => 'PriorRequestNotCompleteException',
                ),
                array(
                    'class' => 'ThrottlingException',
                ),
            ),
        ),
        'UpdateHealthCheck' => array(
            'httpMethod' => 'POST',
            'uri' => '/2013-04-01/healthcheck/{HealthCheckId}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'UpdateHealthCheckResponse',
            'responseType' => 'model',
            'data' => array(
                'xmlRoot' => array(
                    'name' => 'UpdateHealthCheckRequest',
                    'namespaces' => array(
                        'https://route53.amazonaws.com/doc/2013-04-01/',
                    ),
                ),
            ),
            'parameters' => array(
                'HealthCheckId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'maxLength' => 64,
                ),
                'HealthCheckVersion' => array(
                    'type' => 'numeric',
                    'location' => 'xml',
                    'minimum' => 1,
                ),
                'IPAddress' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'maxLength' => 15,
                ),
                'Port' => array(
                    'type' => 'numeric',
                    'location' => 'xml',
                    'minimum' => 1,
                    'maximum' => 65535,
                ),
                'ResourcePath' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'maxLength' => 255,
                ),
                'FullyQualifiedDomainName' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'maxLength' => 255,
                ),
                'SearchString' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'maxLength' => 255,
                ),
                'FailureThreshold' => array(
                    'type' => 'numeric',
                    'location' => 'xml',
                    'minimum' => 1,
                    'maximum' => 10,
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The health check you are trying to get or delete does not exist.',
                    'class' => 'NoSuchHealthCheckException',
                ),
                array(
                    'reason' => 'Some value specified in the request is invalid or the XML document is malformed.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'class' => 'HealthCheckVersionMismatchException',
                ),
            ),
        ),
    ),
    'models' => array(
        'AssociateVPCWithHostedZoneResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ChangeInfo' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Id' => array(
                            'type' => 'string',
                        ),
                        'Status' => array(
                            'type' => 'string',
                        ),
                        'SubmittedAt' => array(
                            'type' => 'string',
                        ),
                        'Comment' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'ChangeResourceRecordSetsResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ChangeInfo' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Id' => array(
                            'type' => 'string',
                        ),
                        'Status' => array(
                            'type' => 'string',
                        ),
                        'SubmittedAt' => array(
                            'type' => 'string',
                        ),
                        'Comment' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'ChangeTagsForResourceResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'CreateHealthCheckResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'HealthCheck' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Id' => array(
                            'type' => 'string',
                        ),
                        'CallerReference' => array(
                            'type' => 'string',
                        ),
                        'HealthCheckConfig' => array(
                            'type' => 'object',
                            'properties' => array(
                                'IPAddress' => array(
                                    'type' => 'string',
                                ),
                                'Port' => array(
                                    'type' => 'numeric',
                                ),
                                'Type' => array(
                                    'type' => 'string',
                                ),
                                'ResourcePath' => array(
                                    'type' => 'string',
                                ),
                                'FullyQualifiedDomainName' => array(
                                    'type' => 'string',
                                ),
                                'SearchString' => array(
                                    'type' => 'string',
                                ),
                                'RequestInterval' => array(
                                    'type' => 'numeric',
                                ),
                                'FailureThreshold' => array(
                                    'type' => 'numeric',
                                ),
                            ),
                        ),
                        'HealthCheckVersion' => array(
                            'type' => 'numeric',
                        ),
                    ),
                ),
                'Location' => array(
                    'type' => 'string',
                    'location' => 'header',
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'CreateHostedZoneResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'HostedZone' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Id' => array(
                            'type' => 'string',
                        ),
                        'Name' => array(
                            'type' => 'string',
                        ),
                        'CallerReference' => array(
                            'type' => 'string',
                        ),
                        'Config' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Comment' => array(
                                    'type' => 'string',
                                ),
                                'PrivateZone' => array(
                                    'type' => 'boolean',
                                ),
                            ),
                        ),
                        'ResourceRecordSetCount' => array(
                            'type' => 'numeric',
                        ),
                    ),
                ),
                'ChangeInfo' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Id' => array(
                            'type' => 'string',
                        ),
                        'Status' => array(
                            'type' => 'string',
                        ),
                        'SubmittedAt' => array(
                            'type' => 'string',
                        ),
                        'Comment' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'DelegationSet' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Id' => array(
                            'type' => 'string',
                        ),
                        'CallerReference' => array(
                            'type' => 'string',
                        ),
                        'NameServers' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'NameServer',
                                'type' => 'string',
                                'sentAs' => 'NameServer',
                            ),
                        ),
                    ),
                ),
                'VPC' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'VPCRegion' => array(
                            'type' => 'string',
                        ),
                        'VPCId' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'Location' => array(
                    'type' => 'string',
                    'location' => 'header',
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'CreateReusableDelegationSetResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'DelegationSet' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Id' => array(
                            'type' => 'string',
                        ),
                        'CallerReference' => array(
                            'type' => 'string',
                        ),
                        'NameServers' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'NameServer',
                                'type' => 'string',
                                'sentAs' => 'NameServer',
                            ),
                        ),
                    ),
                ),
                'Location' => array(
                    'type' => 'string',
                    'location' => 'header',
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'DeleteHealthCheckResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'DeleteHostedZoneResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ChangeInfo' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Id' => array(
                            'type' => 'string',
                        ),
                        'Status' => array(
                            'type' => 'string',
                        ),
                        'SubmittedAt' => array(
                            'type' => 'string',
                        ),
                        'Comment' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'DeleteReusableDelegationSetResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'DisassociateVPCFromHostedZoneResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ChangeInfo' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Id' => array(
                            'type' => 'string',
                        ),
                        'Status' => array(
                            'type' => 'string',
                        ),
                        'SubmittedAt' => array(
                            'type' => 'string',
                        ),
                        'Comment' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'GetChangeResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ChangeInfo' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Id' => array(
                            'type' => 'string',
                        ),
                        'Status' => array(
                            'type' => 'string',
                        ),
                        'SubmittedAt' => array(
                            'type' => 'string',
                        ),
                        'Comment' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'GetCheckerIpRangesResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'CheckerIpRanges' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'IPAddressCidr',
                        'type' => 'string',
                    ),
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'GetGeoLocationResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'GeoLocationDetails' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'ContinentCode' => array(
                            'type' => 'string',
                        ),
                        'ContinentName' => array(
                            'type' => 'string',
                        ),
                        'CountryCode' => array(
                            'type' => 'string',
                        ),
                        'CountryName' => array(
                            'type' => 'string',
                        ),
                        'SubdivisionCode' => array(
                            'type' => 'string',
                        ),
                        'SubdivisionName' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'GetHealthCheckResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'HealthCheck' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Id' => array(
                            'type' => 'string',
                        ),
                        'CallerReference' => array(
                            'type' => 'string',
                        ),
                        'HealthCheckConfig' => array(
                            'type' => 'object',
                            'properties' => array(
                                'IPAddress' => array(
                                    'type' => 'string',
                                ),
                                'Port' => array(
                                    'type' => 'numeric',
                                ),
                                'Type' => array(
                                    'type' => 'string',
                                ),
                                'ResourcePath' => array(
                                    'type' => 'string',
                                ),
                                'FullyQualifiedDomainName' => array(
                                    'type' => 'string',
                                ),
                                'SearchString' => array(
                                    'type' => 'string',
                                ),
                                'RequestInterval' => array(
                                    'type' => 'numeric',
                                ),
                                'FailureThreshold' => array(
                                    'type' => 'numeric',
                                ),
                            ),
                        ),
                        'HealthCheckVersion' => array(
                            'type' => 'numeric',
                        ),
                    ),
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'GetHealthCheckCountResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'HealthCheckCount' => array(
                    'type' => 'numeric',
                    'location' => 'xml',
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'GetHealthCheckLastFailureReasonResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'HealthCheckObservations' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'HealthCheckObservation',
                        'type' => 'object',
                        'sentAs' => 'HealthCheckObservation',
                        'properties' => array(
                            'IPAddress' => array(
                                'type' => 'string',
                            ),
                            'StatusReport' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'Status' => array(
                                        'type' => 'string',
                                    ),
                                    'CheckedTime' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'GetHealthCheckStatusResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'HealthCheckObservations' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'HealthCheckObservation',
                        'type' => 'object',
                        'sentAs' => 'HealthCheckObservation',
                        'properties' => array(
                            'IPAddress' => array(
                                'type' => 'string',
                            ),
                            'StatusReport' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'Status' => array(
                                        'type' => 'string',
                                    ),
                                    'CheckedTime' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'GetHostedZoneResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'HostedZone' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Id' => array(
                            'type' => 'string',
                        ),
                        'Name' => array(
                            'type' => 'string',
                        ),
                        'CallerReference' => array(
                            'type' => 'string',
                        ),
                        'Config' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Comment' => array(
                                    'type' => 'string',
                                ),
                                'PrivateZone' => array(
                                    'type' => 'boolean',
                                ),
                            ),
                        ),
                        'ResourceRecordSetCount' => array(
                            'type' => 'numeric',
                        ),
                    ),
                ),
                'DelegationSet' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Id' => array(
                            'type' => 'string',
                        ),
                        'CallerReference' => array(
                            'type' => 'string',
                        ),
                        'NameServers' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'NameServer',
                                'type' => 'string',
                                'sentAs' => 'NameServer',
                            ),
                        ),
                    ),
                ),
                'VPCs' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'VPC',
                        'type' => 'object',
                        'sentAs' => 'VPC',
                        'properties' => array(
                            'VPCRegion' => array(
                                'type' => 'string',
                            ),
                            'VPCId' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'GetReusableDelegationSetResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'DelegationSet' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Id' => array(
                            'type' => 'string',
                        ),
                        'CallerReference' => array(
                            'type' => 'string',
                        ),
                        'NameServers' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'NameServer',
                                'type' => 'string',
                                'sentAs' => 'NameServer',
                            ),
                        ),
                    ),
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'ListGeoLocationsResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'GeoLocationDetailsList' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'GeoLocationDetails',
                        'type' => 'object',
                        'sentAs' => 'GeoLocationDetails',
                        'properties' => array(
                            'ContinentCode' => array(
                                'type' => 'string',
                            ),
                            'ContinentName' => array(
                                'type' => 'string',
                            ),
                            'CountryCode' => array(
                                'type' => 'string',
                            ),
                            'CountryName' => array(
                                'type' => 'string',
                            ),
                            'SubdivisionCode' => array(
                                'type' => 'string',
                            ),
                            'SubdivisionName' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'IsTruncated' => array(
                    'type' => 'boolean',
                    'location' => 'xml',
                ),
                'NextContinentCode' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'NextCountryCode' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'NextSubdivisionCode' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'MaxItems' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'ListHealthChecksResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'HealthChecks' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'HealthCheck',
                        'type' => 'object',
                        'sentAs' => 'HealthCheck',
                        'properties' => array(
                            'Id' => array(
                                'type' => 'string',
                            ),
                            'CallerReference' => array(
                                'type' => 'string',
                            ),
                            'HealthCheckConfig' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'IPAddress' => array(
                                        'type' => 'string',
                                    ),
                                    'Port' => array(
                                        'type' => 'numeric',
                                    ),
                                    'Type' => array(
                                        'type' => 'string',
                                    ),
                                    'ResourcePath' => array(
                                        'type' => 'string',
                                    ),
                                    'FullyQualifiedDomainName' => array(
                                        'type' => 'string',
                                    ),
                                    'SearchString' => array(
                                        'type' => 'string',
                                    ),
                                    'RequestInterval' => array(
                                        'type' => 'numeric',
                                    ),
                                    'FailureThreshold' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'HealthCheckVersion' => array(
                                'type' => 'numeric',
                            ),
                        ),
                    ),
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'IsTruncated' => array(
                    'type' => 'boolean',
                    'location' => 'xml',
                ),
                'NextMarker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'MaxItems' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'ListHostedZonesResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'HostedZones' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'HostedZone',
                        'type' => 'object',
                        'sentAs' => 'HostedZone',
                        'properties' => array(
                            'Id' => array(
                                'type' => 'string',
                            ),
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'CallerReference' => array(
                                'type' => 'string',
                            ),
                            'Config' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'Comment' => array(
                                        'type' => 'string',
                                    ),
                                    'PrivateZone' => array(
                                        'type' => 'boolean',
                                    ),
                                ),
                            ),
                            'ResourceRecordSetCount' => array(
                                'type' => 'numeric',
                            ),
                        ),
                    ),
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'IsTruncated' => array(
                    'type' => 'boolean',
                    'location' => 'xml',
                ),
                'NextMarker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'MaxItems' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'ListResourceRecordSetsResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ResourceRecordSets' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'ResourceRecordSet',
                        'type' => 'object',
                        'sentAs' => 'ResourceRecordSet',
                        'properties' => array(
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'Type' => array(
                                'type' => 'string',
                            ),
                            'SetIdentifier' => array(
                                'type' => 'string',
                            ),
                            'Weight' => array(
                                'type' => 'numeric',
                            ),
                            'Region' => array(
                                'type' => 'string',
                            ),
                            'GeoLocation' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'ContinentCode' => array(
                                        'type' => 'string',
                                    ),
                                    'CountryCode' => array(
                                        'type' => 'string',
                                    ),
                                    'SubdivisionCode' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'Failover' => array(
                                'type' => 'string',
                            ),
                            'TTL' => array(
                                'type' => 'numeric',
                            ),
                            'ResourceRecords' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'ResourceRecord',
                                    'type' => 'object',
                                    'sentAs' => 'ResourceRecord',
                                    'properties' => array(
                                        'Value' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                            'AliasTarget' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'HostedZoneId' => array(
                                        'type' => 'string',
                                    ),
                                    'DNSName' => array(
                                        'type' => 'string',
                                    ),
                                    'EvaluateTargetHealth' => array(
                                        'type' => 'boolean',
                                    ),
                                ),
                            ),
                            'HealthCheckId' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'IsTruncated' => array(
                    'type' => 'boolean',
                    'location' => 'xml',
                ),
                'NextRecordName' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'NextRecordType' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'NextRecordIdentifier' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'MaxItems' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'ListReusableDelegationSetsResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'DelegationSets' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'DelegationSet',
                        'type' => 'object',
                        'sentAs' => 'DelegationSet',
                        'properties' => array(
                            'Id' => array(
                                'type' => 'string',
                            ),
                            'CallerReference' => array(
                                'type' => 'string',
                            ),
                            'NameServers' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'NameServer',
                                    'type' => 'string',
                                    'sentAs' => 'NameServer',
                                ),
                            ),
                        ),
                    ),
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'IsTruncated' => array(
                    'type' => 'boolean',
                    'location' => 'xml',
                ),
                'NextMarker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'MaxItems' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'ListTagsForResourceResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ResourceTagSet' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'ResourceType' => array(
                            'type' => 'string',
                        ),
                        'ResourceId' => array(
                            'type' => 'string',
                        ),
                        'Tags' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'Tag',
                                'type' => 'object',
                                'sentAs' => 'Tag',
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
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'ListTagsForResourcesResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ResourceTagSets' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'ResourceTagSet',
                        'type' => 'object',
                        'sentAs' => 'ResourceTagSet',
                        'properties' => array(
                            'ResourceType' => array(
                                'type' => 'string',
                            ),
                            'ResourceId' => array(
                                'type' => 'string',
                            ),
                            'Tags' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'Tag',
                                    'type' => 'object',
                                    'sentAs' => 'Tag',
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
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'UpdateHealthCheckResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'HealthCheck' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Id' => array(
                            'type' => 'string',
                        ),
                        'CallerReference' => array(
                            'type' => 'string',
                        ),
                        'HealthCheckConfig' => array(
                            'type' => 'object',
                            'properties' => array(
                                'IPAddress' => array(
                                    'type' => 'string',
                                ),
                                'Port' => array(
                                    'type' => 'numeric',
                                ),
                                'Type' => array(
                                    'type' => 'string',
                                ),
                                'ResourcePath' => array(
                                    'type' => 'string',
                                ),
                                'FullyQualifiedDomainName' => array(
                                    'type' => 'string',
                                ),
                                'SearchString' => array(
                                    'type' => 'string',
                                ),
                                'RequestInterval' => array(
                                    'type' => 'numeric',
                                ),
                                'FailureThreshold' => array(
                                    'type' => 'numeric',
                                ),
                            ),
                        ),
                        'HealthCheckVersion' => array(
                            'type' => 'numeric',
                        ),
                    ),
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
    ),
    'iterators' => array(
        'ListHealthChecks' => array(
            'input_token' => 'Marker',
            'output_token' => 'NextMarker',
            'more_results' => 'IsTruncated',
            'limit_key' => 'MaxItems',
            'result_key' => 'HealthChecks',
        ),
        'ListHostedZones' => array(
            'input_token' => 'Marker',
            'output_token' => 'NextMarker',
            'more_results' => 'IsTruncated',
            'limit_key' => 'MaxItems',
            'result_key' => 'HostedZones',
        ),
        'ListResourceRecordSets' => array(
            'more_results' => 'IsTruncated',
            'limit_key' => 'MaxItems',
            'result_key' => 'ResourceRecordSets',
            'input_token' => array(
                'StartRecordName',
                'StartRecordType',
                'StartRecordIdentifier',
            ),
            'output_token' => array(
                'NextRecordName',
                'NextRecordType',
                'NextRecordIdentifier',
            ),
        ),
        'ListReusableDelegationSets' => array(
            'input_token' => 'Marker',
            'output_token' => 'NextMarker',
            'more_results' => 'IsTruncated',
            'limit_key' => 'MaxItems',
            'result_key' => 'DelegationSets',
        ),
    ),
);
