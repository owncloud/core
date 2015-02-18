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
    'apiVersion' => '2014-05-15',
    'endpointPrefix' => 'route53domains',
    'serviceFullName' => 'Amazon Route 53 Domains',
    'serviceType' => 'json',
    'jsonVersion' => '1.1',
    'targetPrefix' => 'Route53Domains_v20140515.',
    'signatureVersion' => 'v4',
    'namespace' => 'Route53Domains',
    'regions' => array(
        'us-east-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'route53domains.us-east-1.amazonaws.com',
        ),
    ),
    'operations' => array(
        'CheckDomainAvailability' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'CheckDomainAvailabilityResponse',
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
                    'default' => 'Route53Domains_v20140515.CheckDomainAvailability',
                ),
                'DomainName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 255,
                ),
                'IdnLangCode' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 3,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The requested item is not acceptable. For example, for an OperationId it may refer to the ID of an operation that is already completed. For a domain name, it may not be a valid domain name or belong to the requester account.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'Amazon Route 53 does not support this top-level domain.',
                    'class' => 'UnsupportedTLDException',
                ),
            ),
        ),
        'DisableDomainAutoRenew' => array(
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
                    'default' => 'Route53Domains_v20140515.DisableDomainAutoRenew',
                ),
                'DomainName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 255,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The requested item is not acceptable. For example, for an OperationId it may refer to the ID of an operation that is already completed. For a domain name, it may not be a valid domain name or belong to the requester account.',
                    'class' => 'InvalidInputException',
                ),
            ),
        ),
        'DisableDomainTransferLock' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DisableDomainTransferLockResponse',
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
                    'default' => 'Route53Domains_v20140515.DisableDomainTransferLock',
                ),
                'DomainName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 255,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The requested item is not acceptable. For example, for an OperationId it may refer to the ID of an operation that is already completed. For a domain name, it may not be a valid domain name or belong to the requester account.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'The request is already in progress for the domain.',
                    'class' => 'DuplicateRequestException',
                ),
                array(
                    'reason' => 'The top-level domain does not support this operation.',
                    'class' => 'TLDRulesViolationException',
                ),
                array(
                    'reason' => 'The number of operations or jobs running exceeded the allowed threshold for the account.',
                    'class' => 'OperationLimitExceededException',
                ),
            ),
        ),
        'EnableDomainAutoRenew' => array(
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
                    'default' => 'Route53Domains_v20140515.EnableDomainAutoRenew',
                ),
                'DomainName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 255,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The requested item is not acceptable. For example, for an OperationId it may refer to the ID of an operation that is already completed. For a domain name, it may not be a valid domain name or belong to the requester account.',
                    'class' => 'InvalidInputException',
                ),
            ),
        ),
        'EnableDomainTransferLock' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'EnableDomainTransferLockResponse',
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
                    'default' => 'Route53Domains_v20140515.EnableDomainTransferLock',
                ),
                'DomainName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 255,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The requested item is not acceptable. For example, for an OperationId it may refer to the ID of an operation that is already completed. For a domain name, it may not be a valid domain name or belong to the requester account.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'The request is already in progress for the domain.',
                    'class' => 'DuplicateRequestException',
                ),
                array(
                    'reason' => 'The top-level domain does not support this operation.',
                    'class' => 'TLDRulesViolationException',
                ),
                array(
                    'reason' => 'The number of operations or jobs running exceeded the allowed threshold for the account.',
                    'class' => 'OperationLimitExceededException',
                ),
            ),
        ),
        'GetDomainDetail' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'GetDomainDetailResponse',
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
                    'default' => 'Route53Domains_v20140515.GetDomainDetail',
                ),
                'DomainName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 255,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The requested item is not acceptable. For example, for an OperationId it may refer to the ID of an operation that is already completed. For a domain name, it may not be a valid domain name or belong to the requester account.',
                    'class' => 'InvalidInputException',
                ),
            ),
        ),
        'GetOperationDetail' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'GetOperationDetailResponse',
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
                    'default' => 'Route53Domains_v20140515.GetOperationDetail',
                ),
                'OperationId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 255,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The requested item is not acceptable. For example, for an OperationId it may refer to the ID of an operation that is already completed. For a domain name, it may not be a valid domain name or belong to the requester account.',
                    'class' => 'InvalidInputException',
                ),
            ),
        ),
        'ListDomains' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ListDomainsResponse',
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
                    'default' => 'Route53Domains_v20140515.ListDomains',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 4096,
                ),
                'MaxItems' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                    'maximum' => 100,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The requested item is not acceptable. For example, for an OperationId it may refer to the ID of an operation that is already completed. For a domain name, it may not be a valid domain name or belong to the requester account.',
                    'class' => 'InvalidInputException',
                ),
            ),
        ),
        'ListOperations' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ListOperationsResponse',
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
                    'default' => 'Route53Domains_v20140515.ListOperations',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 4096,
                ),
                'MaxItems' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                    'maximum' => 100,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The requested item is not acceptable. For example, for an OperationId it may refer to the ID of an operation that is already completed. For a domain name, it may not be a valid domain name or belong to the requester account.',
                    'class' => 'InvalidInputException',
                ),
            ),
        ),
        'RegisterDomain' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'RegisterDomainResponse',
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
                    'default' => 'Route53Domains_v20140515.RegisterDomain',
                ),
                'DomainName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 255,
                ),
                'IdnLangCode' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 3,
                ),
                'DurationInYears' => array(
                    'required' => true,
                    'type' => 'numeric',
                    'location' => 'json',
                    'minimum' => 1,
                    'maximum' => 10,
                ),
                'AutoRenew' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
                'AdminContact' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'FirstName' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'LastName' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'ContactType' => array(
                            'type' => 'string',
                        ),
                        'OrganizationName' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'AddressLine1' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'AddressLine2' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'City' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'State' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'CountryCode' => array(
                            'type' => 'string',
                        ),
                        'ZipCode' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'PhoneNumber' => array(
                            'type' => 'string',
                            'maxLength' => 30,
                        ),
                        'Email' => array(
                            'type' => 'string',
                            'maxLength' => 254,
                        ),
                        'Fax' => array(
                            'type' => 'string',
                            'maxLength' => 30,
                        ),
                        'ExtraParams' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'ExtraParam',
                                'type' => 'object',
                                'properties' => array(
                                    'Name' => array(
                                        'required' => true,
                                        'type' => 'string',
                                    ),
                                    'Value' => array(
                                        'required' => true,
                                        'type' => 'string',
                                        'maxLength' => 2048,
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'RegistrantContact' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'FirstName' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'LastName' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'ContactType' => array(
                            'type' => 'string',
                        ),
                        'OrganizationName' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'AddressLine1' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'AddressLine2' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'City' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'State' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'CountryCode' => array(
                            'type' => 'string',
                        ),
                        'ZipCode' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'PhoneNumber' => array(
                            'type' => 'string',
                            'maxLength' => 30,
                        ),
                        'Email' => array(
                            'type' => 'string',
                            'maxLength' => 254,
                        ),
                        'Fax' => array(
                            'type' => 'string',
                            'maxLength' => 30,
                        ),
                        'ExtraParams' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'ExtraParam',
                                'type' => 'object',
                                'properties' => array(
                                    'Name' => array(
                                        'required' => true,
                                        'type' => 'string',
                                    ),
                                    'Value' => array(
                                        'required' => true,
                                        'type' => 'string',
                                        'maxLength' => 2048,
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'TechContact' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'FirstName' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'LastName' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'ContactType' => array(
                            'type' => 'string',
                        ),
                        'OrganizationName' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'AddressLine1' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'AddressLine2' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'City' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'State' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'CountryCode' => array(
                            'type' => 'string',
                        ),
                        'ZipCode' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'PhoneNumber' => array(
                            'type' => 'string',
                            'maxLength' => 30,
                        ),
                        'Email' => array(
                            'type' => 'string',
                            'maxLength' => 254,
                        ),
                        'Fax' => array(
                            'type' => 'string',
                            'maxLength' => 30,
                        ),
                        'ExtraParams' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'ExtraParam',
                                'type' => 'object',
                                'properties' => array(
                                    'Name' => array(
                                        'required' => true,
                                        'type' => 'string',
                                    ),
                                    'Value' => array(
                                        'required' => true,
                                        'type' => 'string',
                                        'maxLength' => 2048,
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'PrivacyProtectAdminContact' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
                'PrivacyProtectRegistrantContact' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
                'PrivacyProtectTechContact' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The requested item is not acceptable. For example, for an OperationId it may refer to the ID of an operation that is already completed. For a domain name, it may not be a valid domain name or belong to the requester account.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'Amazon Route 53 does not support this top-level domain.',
                    'class' => 'UnsupportedTLDException',
                ),
                array(
                    'reason' => 'The request is already in progress for the domain.',
                    'class' => 'DuplicateRequestException',
                ),
                array(
                    'reason' => 'The top-level domain does not support this operation.',
                    'class' => 'TLDRulesViolationException',
                ),
                array(
                    'reason' => 'The number of domains has exceeded the allowed threshold for the account.',
                    'class' => 'DomainLimitExceededException',
                ),
                array(
                    'reason' => 'The number of operations or jobs running exceeded the allowed threshold for the account.',
                    'class' => 'OperationLimitExceededException',
                ),
            ),
        ),
        'RetrieveDomainAuthCode' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'RetrieveDomainAuthCodeResponse',
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
                    'default' => 'Route53Domains_v20140515.RetrieveDomainAuthCode',
                ),
                'DomainName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 255,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The requested item is not acceptable. For example, for an OperationId it may refer to the ID of an operation that is already completed. For a domain name, it may not be a valid domain name or belong to the requester account.',
                    'class' => 'InvalidInputException',
                ),
            ),
        ),
        'TransferDomain' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'TransferDomainResponse',
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
                    'default' => 'Route53Domains_v20140515.TransferDomain',
                ),
                'DomainName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 255,
                ),
                'IdnLangCode' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 3,
                ),
                'DurationInYears' => array(
                    'required' => true,
                    'type' => 'numeric',
                    'location' => 'json',
                    'minimum' => 1,
                    'maximum' => 10,
                ),
                'Nameservers' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'Nameserver',
                        'type' => 'object',
                        'properties' => array(
                            'Name' => array(
                                'required' => true,
                                'type' => 'string',
                                'maxLength' => 255,
                            ),
                            'GlueIps' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'GlueIp',
                                    'type' => 'string',
                                    'maxLength' => 45,
                                ),
                            ),
                        ),
                    ),
                ),
                'AuthCode' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 1024,
                ),
                'AutoRenew' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
                'AdminContact' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'FirstName' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'LastName' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'ContactType' => array(
                            'type' => 'string',
                        ),
                        'OrganizationName' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'AddressLine1' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'AddressLine2' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'City' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'State' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'CountryCode' => array(
                            'type' => 'string',
                        ),
                        'ZipCode' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'PhoneNumber' => array(
                            'type' => 'string',
                            'maxLength' => 30,
                        ),
                        'Email' => array(
                            'type' => 'string',
                            'maxLength' => 254,
                        ),
                        'Fax' => array(
                            'type' => 'string',
                            'maxLength' => 30,
                        ),
                        'ExtraParams' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'ExtraParam',
                                'type' => 'object',
                                'properties' => array(
                                    'Name' => array(
                                        'required' => true,
                                        'type' => 'string',
                                    ),
                                    'Value' => array(
                                        'required' => true,
                                        'type' => 'string',
                                        'maxLength' => 2048,
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'RegistrantContact' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'FirstName' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'LastName' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'ContactType' => array(
                            'type' => 'string',
                        ),
                        'OrganizationName' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'AddressLine1' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'AddressLine2' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'City' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'State' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'CountryCode' => array(
                            'type' => 'string',
                        ),
                        'ZipCode' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'PhoneNumber' => array(
                            'type' => 'string',
                            'maxLength' => 30,
                        ),
                        'Email' => array(
                            'type' => 'string',
                            'maxLength' => 254,
                        ),
                        'Fax' => array(
                            'type' => 'string',
                            'maxLength' => 30,
                        ),
                        'ExtraParams' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'ExtraParam',
                                'type' => 'object',
                                'properties' => array(
                                    'Name' => array(
                                        'required' => true,
                                        'type' => 'string',
                                    ),
                                    'Value' => array(
                                        'required' => true,
                                        'type' => 'string',
                                        'maxLength' => 2048,
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'TechContact' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'FirstName' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'LastName' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'ContactType' => array(
                            'type' => 'string',
                        ),
                        'OrganizationName' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'AddressLine1' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'AddressLine2' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'City' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'State' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'CountryCode' => array(
                            'type' => 'string',
                        ),
                        'ZipCode' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'PhoneNumber' => array(
                            'type' => 'string',
                            'maxLength' => 30,
                        ),
                        'Email' => array(
                            'type' => 'string',
                            'maxLength' => 254,
                        ),
                        'Fax' => array(
                            'type' => 'string',
                            'maxLength' => 30,
                        ),
                        'ExtraParams' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'ExtraParam',
                                'type' => 'object',
                                'properties' => array(
                                    'Name' => array(
                                        'required' => true,
                                        'type' => 'string',
                                    ),
                                    'Value' => array(
                                        'required' => true,
                                        'type' => 'string',
                                        'maxLength' => 2048,
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'PrivacyProtectAdminContact' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
                'PrivacyProtectRegistrantContact' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
                'PrivacyProtectTechContact' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The requested item is not acceptable. For example, for an OperationId it may refer to the ID of an operation that is already completed. For a domain name, it may not be a valid domain name or belong to the requester account.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'Amazon Route 53 does not support this top-level domain.',
                    'class' => 'UnsupportedTLDException',
                ),
                array(
                    'reason' => 'The request is already in progress for the domain.',
                    'class' => 'DuplicateRequestException',
                ),
                array(
                    'reason' => 'The top-level domain does not support this operation.',
                    'class' => 'TLDRulesViolationException',
                ),
                array(
                    'reason' => 'The number of domains has exceeded the allowed threshold for the account.',
                    'class' => 'DomainLimitExceededException',
                ),
                array(
                    'reason' => 'The number of operations or jobs running exceeded the allowed threshold for the account.',
                    'class' => 'OperationLimitExceededException',
                ),
            ),
        ),
        'UpdateDomainContact' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'UpdateDomainContactResponse',
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
                    'default' => 'Route53Domains_v20140515.UpdateDomainContact',
                ),
                'DomainName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 255,
                ),
                'AdminContact' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'FirstName' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'LastName' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'ContactType' => array(
                            'type' => 'string',
                        ),
                        'OrganizationName' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'AddressLine1' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'AddressLine2' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'City' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'State' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'CountryCode' => array(
                            'type' => 'string',
                        ),
                        'ZipCode' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'PhoneNumber' => array(
                            'type' => 'string',
                            'maxLength' => 30,
                        ),
                        'Email' => array(
                            'type' => 'string',
                            'maxLength' => 254,
                        ),
                        'Fax' => array(
                            'type' => 'string',
                            'maxLength' => 30,
                        ),
                        'ExtraParams' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'ExtraParam',
                                'type' => 'object',
                                'properties' => array(
                                    'Name' => array(
                                        'required' => true,
                                        'type' => 'string',
                                    ),
                                    'Value' => array(
                                        'required' => true,
                                        'type' => 'string',
                                        'maxLength' => 2048,
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'RegistrantContact' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'FirstName' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'LastName' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'ContactType' => array(
                            'type' => 'string',
                        ),
                        'OrganizationName' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'AddressLine1' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'AddressLine2' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'City' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'State' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'CountryCode' => array(
                            'type' => 'string',
                        ),
                        'ZipCode' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'PhoneNumber' => array(
                            'type' => 'string',
                            'maxLength' => 30,
                        ),
                        'Email' => array(
                            'type' => 'string',
                            'maxLength' => 254,
                        ),
                        'Fax' => array(
                            'type' => 'string',
                            'maxLength' => 30,
                        ),
                        'ExtraParams' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'ExtraParam',
                                'type' => 'object',
                                'properties' => array(
                                    'Name' => array(
                                        'required' => true,
                                        'type' => 'string',
                                    ),
                                    'Value' => array(
                                        'required' => true,
                                        'type' => 'string',
                                        'maxLength' => 2048,
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'TechContact' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'FirstName' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'LastName' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'ContactType' => array(
                            'type' => 'string',
                        ),
                        'OrganizationName' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'AddressLine1' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'AddressLine2' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'City' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'State' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'CountryCode' => array(
                            'type' => 'string',
                        ),
                        'ZipCode' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'PhoneNumber' => array(
                            'type' => 'string',
                            'maxLength' => 30,
                        ),
                        'Email' => array(
                            'type' => 'string',
                            'maxLength' => 254,
                        ),
                        'Fax' => array(
                            'type' => 'string',
                            'maxLength' => 30,
                        ),
                        'ExtraParams' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'ExtraParam',
                                'type' => 'object',
                                'properties' => array(
                                    'Name' => array(
                                        'required' => true,
                                        'type' => 'string',
                                    ),
                                    'Value' => array(
                                        'required' => true,
                                        'type' => 'string',
                                        'maxLength' => 2048,
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The requested item is not acceptable. For example, for an OperationId it may refer to the ID of an operation that is already completed. For a domain name, it may not be a valid domain name or belong to the requester account.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'The request is already in progress for the domain.',
                    'class' => 'DuplicateRequestException',
                ),
                array(
                    'reason' => 'The top-level domain does not support this operation.',
                    'class' => 'TLDRulesViolationException',
                ),
                array(
                    'reason' => 'The number of operations or jobs running exceeded the allowed threshold for the account.',
                    'class' => 'OperationLimitExceededException',
                ),
            ),
        ),
        'UpdateDomainContactPrivacy' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'UpdateDomainContactPrivacyResponse',
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
                    'default' => 'Route53Domains_v20140515.UpdateDomainContactPrivacy',
                ),
                'DomainName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 255,
                ),
                'AdminPrivacy' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
                'RegistrantPrivacy' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
                'TechPrivacy' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The requested item is not acceptable. For example, for an OperationId it may refer to the ID of an operation that is already completed. For a domain name, it may not be a valid domain name or belong to the requester account.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'The request is already in progress for the domain.',
                    'class' => 'DuplicateRequestException',
                ),
                array(
                    'reason' => 'The top-level domain does not support this operation.',
                    'class' => 'TLDRulesViolationException',
                ),
                array(
                    'reason' => 'The number of operations or jobs running exceeded the allowed threshold for the account.',
                    'class' => 'OperationLimitExceededException',
                ),
            ),
        ),
        'UpdateDomainNameservers' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'UpdateDomainNameserversResponse',
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
                    'default' => 'Route53Domains_v20140515.UpdateDomainNameservers',
                ),
                'DomainName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 255,
                ),
                'Nameservers' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'Nameserver',
                        'type' => 'object',
                        'properties' => array(
                            'Name' => array(
                                'required' => true,
                                'type' => 'string',
                                'maxLength' => 255,
                            ),
                            'GlueIps' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'GlueIp',
                                    'type' => 'string',
                                    'maxLength' => 45,
                                ),
                            ),
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The requested item is not acceptable. For example, for an OperationId it may refer to the ID of an operation that is already completed. For a domain name, it may not be a valid domain name or belong to the requester account.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'The request is already in progress for the domain.',
                    'class' => 'DuplicateRequestException',
                ),
                array(
                    'reason' => 'The top-level domain does not support this operation.',
                    'class' => 'TLDRulesViolationException',
                ),
                array(
                    'reason' => 'The number of operations or jobs running exceeded the allowed threshold for the account.',
                    'class' => 'OperationLimitExceededException',
                ),
            ),
        ),
    ),
    'models' => array(
        'CheckDomainAvailabilityResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Availability' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'EmptyOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
        ),
        'DisableDomainTransferLockResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'OperationId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'EnableDomainTransferLockResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'OperationId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'GetDomainDetailResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'DomainName' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Nameservers' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'Nameserver',
                        'type' => 'object',
                        'properties' => array(
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'GlueIps' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'GlueIp',
                                    'type' => 'string',
                                ),
                            ),
                        ),
                    ),
                ),
                'AutoRenew' => array(
                    'type' => 'boolean',
                    'location' => 'json',
                ),
                'AdminContact' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'FirstName' => array(
                            'type' => 'string',
                        ),
                        'LastName' => array(
                            'type' => 'string',
                        ),
                        'ContactType' => array(
                            'type' => 'string',
                        ),
                        'OrganizationName' => array(
                            'type' => 'string',
                        ),
                        'AddressLine1' => array(
                            'type' => 'string',
                        ),
                        'AddressLine2' => array(
                            'type' => 'string',
                        ),
                        'City' => array(
                            'type' => 'string',
                        ),
                        'State' => array(
                            'type' => 'string',
                        ),
                        'CountryCode' => array(
                            'type' => 'string',
                        ),
                        'ZipCode' => array(
                            'type' => 'string',
                        ),
                        'PhoneNumber' => array(
                            'type' => 'string',
                        ),
                        'Email' => array(
                            'type' => 'string',
                        ),
                        'Fax' => array(
                            'type' => 'string',
                        ),
                        'ExtraParams' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'ExtraParam',
                                'type' => 'object',
                                'properties' => array(
                                    'Name' => array(
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
                'RegistrantContact' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'FirstName' => array(
                            'type' => 'string',
                        ),
                        'LastName' => array(
                            'type' => 'string',
                        ),
                        'ContactType' => array(
                            'type' => 'string',
                        ),
                        'OrganizationName' => array(
                            'type' => 'string',
                        ),
                        'AddressLine1' => array(
                            'type' => 'string',
                        ),
                        'AddressLine2' => array(
                            'type' => 'string',
                        ),
                        'City' => array(
                            'type' => 'string',
                        ),
                        'State' => array(
                            'type' => 'string',
                        ),
                        'CountryCode' => array(
                            'type' => 'string',
                        ),
                        'ZipCode' => array(
                            'type' => 'string',
                        ),
                        'PhoneNumber' => array(
                            'type' => 'string',
                        ),
                        'Email' => array(
                            'type' => 'string',
                        ),
                        'Fax' => array(
                            'type' => 'string',
                        ),
                        'ExtraParams' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'ExtraParam',
                                'type' => 'object',
                                'properties' => array(
                                    'Name' => array(
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
                'TechContact' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'FirstName' => array(
                            'type' => 'string',
                        ),
                        'LastName' => array(
                            'type' => 'string',
                        ),
                        'ContactType' => array(
                            'type' => 'string',
                        ),
                        'OrganizationName' => array(
                            'type' => 'string',
                        ),
                        'AddressLine1' => array(
                            'type' => 'string',
                        ),
                        'AddressLine2' => array(
                            'type' => 'string',
                        ),
                        'City' => array(
                            'type' => 'string',
                        ),
                        'State' => array(
                            'type' => 'string',
                        ),
                        'CountryCode' => array(
                            'type' => 'string',
                        ),
                        'ZipCode' => array(
                            'type' => 'string',
                        ),
                        'PhoneNumber' => array(
                            'type' => 'string',
                        ),
                        'Email' => array(
                            'type' => 'string',
                        ),
                        'Fax' => array(
                            'type' => 'string',
                        ),
                        'ExtraParams' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'ExtraParam',
                                'type' => 'object',
                                'properties' => array(
                                    'Name' => array(
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
                'AdminPrivacy' => array(
                    'type' => 'boolean',
                    'location' => 'json',
                ),
                'RegistrantPrivacy' => array(
                    'type' => 'boolean',
                    'location' => 'json',
                ),
                'TechPrivacy' => array(
                    'type' => 'boolean',
                    'location' => 'json',
                ),
                'RegistrarName' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'WhoIsServer' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'RegistrarUrl' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'AbuseContactEmail' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'AbuseContactPhone' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'RegistryDomainId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'CreationDate' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'UpdatedDate' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'ExpirationDate' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Reseller' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'DnsSec' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'StatusList' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'DomainStatus',
                        'type' => 'string',
                    ),
                ),
            ),
        ),
        'GetOperationDetailResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'OperationId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Status' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Message' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'DomainName' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Type' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'SubmittedDate' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'ListDomainsResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Domains' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'DomainSummary',
                        'type' => 'object',
                        'properties' => array(
                            'DomainName' => array(
                                'type' => 'string',
                            ),
                            'AutoRenew' => array(
                                'type' => 'boolean',
                            ),
                            'TransferLock' => array(
                                'type' => 'boolean',
                            ),
                            'Expiry' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'NextPageMarker' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'ListOperationsResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Operations' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'OperationSummary',
                        'type' => 'object',
                        'properties' => array(
                            'OperationId' => array(
                                'type' => 'string',
                            ),
                            'Status' => array(
                                'type' => 'string',
                            ),
                            'Type' => array(
                                'type' => 'string',
                            ),
                            'SubmittedDate' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'NextPageMarker' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'RegisterDomainResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'OperationId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'RetrieveDomainAuthCodeResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'AuthCode' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'TransferDomainResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'OperationId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'UpdateDomainContactResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'OperationId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'UpdateDomainContactPrivacyResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'OperationId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'UpdateDomainNameserversResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'OperationId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
    ),
);
