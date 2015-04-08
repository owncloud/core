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
    'endpointPrefix' => 'email',
    'serviceFullName' => 'Amazon Simple Email Service',
    'serviceAbbreviation' => 'Amazon SES',
    'serviceType' => 'query',
    'resultWrapped' => true,
    'signatureVersion' => 'v4',
    'namespace' => 'Ses',
    'regions' => array(
        'us-east-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'email.us-east-1.amazonaws.com',
        ),
        'us-west-2' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'email.us-west-2.amazonaws.com',
        ),
        'eu-west-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'email.eu-west-1.amazonaws.com',
        ),
    ),
    'operations' => array(
        'DeleteIdentity' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteIdentity',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'Identity' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DeleteVerifiedEmailAddress' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'deprecated' => true,
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteVerifiedEmailAddress',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'EmailAddress' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'GetIdentityDkimAttributes' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'GetIdentityDkimAttributesResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'GetIdentityDkimAttributes',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'Identities' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Identities.member',
                    'items' => array(
                        'name' => 'Identity',
                        'type' => 'string',
                    ),
                ),
            ),
        ),
        'GetIdentityNotificationAttributes' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'GetIdentityNotificationAttributesResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'GetIdentityNotificationAttributes',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'Identities' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Identities.member',
                    'items' => array(
                        'name' => 'Identity',
                        'type' => 'string',
                    ),
                ),
            ),
        ),
        'GetIdentityVerificationAttributes' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'GetIdentityVerificationAttributesResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'GetIdentityVerificationAttributes',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'Identities' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Identities.member',
                    'items' => array(
                        'name' => 'Identity',
                        'type' => 'string',
                    ),
                ),
            ),
        ),
        'GetSendQuota' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'GetSendQuotaResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'GetSendQuota',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
            ),
        ),
        'GetSendStatistics' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'GetSendStatisticsResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'GetSendStatistics',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
            ),
        ),
        'ListIdentities' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ListIdentitiesResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ListIdentities',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'IdentityType' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'MaxItems' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'ListVerifiedEmailAddresses' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ListVerifiedEmailAddressesResponse',
            'responseType' => 'model',
            'deprecated' => true,
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ListVerifiedEmailAddresses',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
            ),
        ),
        'SendEmail' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'SendEmailResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'SendEmail',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'Source' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Destination' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'aws.query',
                    'properties' => array(
                        'ToAddresses' => array(
                            'type' => 'array',
                            'sentAs' => 'ToAddresses.member',
                            'items' => array(
                                'name' => 'Address',
                                'type' => 'string',
                            ),
                        ),
                        'CcAddresses' => array(
                            'type' => 'array',
                            'sentAs' => 'CcAddresses.member',
                            'items' => array(
                                'name' => 'Address',
                                'type' => 'string',
                            ),
                        ),
                        'BccAddresses' => array(
                            'type' => 'array',
                            'sentAs' => 'BccAddresses.member',
                            'items' => array(
                                'name' => 'Address',
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'Message' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'aws.query',
                    'properties' => array(
                        'Subject' => array(
                            'required' => true,
                            'type' => 'object',
                            'properties' => array(
                                'Data' => array(
                                    'required' => true,
                                    'type' => 'string',
                                ),
                                'Charset' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'Body' => array(
                            'required' => true,
                            'type' => 'object',
                            'properties' => array(
                                'Text' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'Data' => array(
                                            'required' => true,
                                            'type' => 'string',
                                        ),
                                        'Charset' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                                'Html' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'Data' => array(
                                            'required' => true,
                                            'type' => 'string',
                                        ),
                                        'Charset' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'ReplyToAddresses' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'ReplyToAddresses.member',
                    'items' => array(
                        'name' => 'Address',
                        'type' => 'string',
                    ),
                ),
                'ReturnPath' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that the action failed, and the message could not be sent. Check the error stack for more information about what caused the error.',
                    'class' => 'MessageRejectedException',
                ),
            ),
        ),
        'SendRawEmail' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'SendRawEmailResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'SendRawEmail',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'Source' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Destinations' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Destinations.member',
                    'items' => array(
                        'name' => 'Address',
                        'type' => 'string',
                    ),
                ),
                'RawMessage' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'aws.query',
                    'properties' => array(
                        'Data' => array(
                            'required' => true,
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that the action failed, and the message could not be sent. Check the error stack for more information about what caused the error.',
                    'class' => 'MessageRejectedException',
                ),
            ),
        ),
        'SetIdentityDkimEnabled' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'SetIdentityDkimEnabled',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'Identity' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'DkimEnabled' => array(
                    'required' => true,
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'SetIdentityFeedbackForwardingEnabled' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'SetIdentityFeedbackForwardingEnabled',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'Identity' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'ForwardingEnabled' => array(
                    'required' => true,
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'SetIdentityNotificationTopic' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'SetIdentityNotificationTopic',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'Identity' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'NotificationType' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'SnsTopic' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'VerifyDomainDkim' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'VerifyDomainDkimResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'VerifyDomainDkim',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'Domain' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'VerifyDomainIdentity' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'VerifyDomainIdentityResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'VerifyDomainIdentity',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'Domain' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'VerifyEmailAddress' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'deprecated' => true,
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'VerifyEmailAddress',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'EmailAddress' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'VerifyEmailIdentity' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'VerifyEmailIdentity',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-12-01',
                ),
                'EmailAddress' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
    ),
    'models' => array(
        'EmptyOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
        ),
        'GetIdentityDkimAttributesResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'DkimAttributes' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'filters' => array(
                        array(
                            'method' => 'Aws\\Common\\Command\\XmlResponseLocationVisitor::xmlMap',
                            'args' => array(
                                '@value',
                                'entry',
                                'key',
                                'value',
                            ),
                        ),
                    ),
                    'items' => array(
                        'name' => 'entry',
                        'type' => 'object',
                        'sentAs' => 'entry',
                        'additionalProperties' => true,
                        'properties' => array(
                            'key' => array(
                                'type' => 'string',
                            ),
                            'value' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'DkimEnabled' => array(
                                        'type' => 'boolean',
                                    ),
                                    'DkimVerificationStatus' => array(
                                        'type' => 'string',
                                    ),
                                    'DkimTokens' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'VerificationToken',
                                            'type' => 'string',
                                            'sentAs' => 'member',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                    'additionalProperties' => false,
                ),
            ),
        ),
        'GetIdentityNotificationAttributesResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'NotificationAttributes' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'filters' => array(
                        array(
                            'method' => 'Aws\\Common\\Command\\XmlResponseLocationVisitor::xmlMap',
                            'args' => array(
                                '@value',
                                'entry',
                                'key',
                                'value',
                            ),
                        ),
                    ),
                    'items' => array(
                        'name' => 'entry',
                        'type' => 'object',
                        'sentAs' => 'entry',
                        'additionalProperties' => true,
                        'properties' => array(
                            'key' => array(
                                'type' => 'string',
                            ),
                            'value' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'BounceTopic' => array(
                                        'type' => 'string',
                                    ),
                                    'ComplaintTopic' => array(
                                        'type' => 'string',
                                    ),
                                    'DeliveryTopic' => array(
                                        'type' => 'string',
                                    ),
                                    'ForwardingEnabled' => array(
                                        'type' => 'boolean',
                                    ),
                                ),
                            ),
                        ),
                    ),
                    'additionalProperties' => false,
                ),
            ),
        ),
        'GetIdentityVerificationAttributesResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'VerificationAttributes' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'filters' => array(
                        array(
                            'method' => 'Aws\\Common\\Command\\XmlResponseLocationVisitor::xmlMap',
                            'args' => array(
                                '@value',
                                'entry',
                                'key',
                                'value',
                            ),
                        ),
                    ),
                    'items' => array(
                        'name' => 'entry',
                        'type' => 'object',
                        'sentAs' => 'entry',
                        'additionalProperties' => true,
                        'properties' => array(
                            'key' => array(
                                'type' => 'string',
                            ),
                            'value' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'VerificationStatus' => array(
                                        'type' => 'string',
                                    ),
                                    'VerificationToken' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                    ),
                    'additionalProperties' => false,
                ),
            ),
        ),
        'GetSendQuotaResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Max24HourSend' => array(
                    'type' => 'numeric',
                    'location' => 'xml',
                ),
                'MaxSendRate' => array(
                    'type' => 'numeric',
                    'location' => 'xml',
                ),
                'SentLast24Hours' => array(
                    'type' => 'numeric',
                    'location' => 'xml',
                ),
            ),
        ),
        'GetSendStatisticsResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'SendDataPoints' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'SendDataPoint',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'Timestamp' => array(
                                'type' => 'string',
                            ),
                            'DeliveryAttempts' => array(
                                'type' => 'numeric',
                            ),
                            'Bounces' => array(
                                'type' => 'numeric',
                            ),
                            'Complaints' => array(
                                'type' => 'numeric',
                            ),
                            'Rejects' => array(
                                'type' => 'numeric',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'ListIdentitiesResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Identities' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'Identity',
                        'type' => 'string',
                        'sentAs' => 'member',
                    ),
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'ListVerifiedEmailAddressesResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'VerifiedEmailAddresses' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'Address',
                        'type' => 'string',
                        'sentAs' => 'member',
                    ),
                ),
            ),
        ),
        'SendEmailResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'MessageId' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'SendRawEmailResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'MessageId' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'VerifyDomainDkimResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'DkimTokens' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'VerificationToken',
                        'type' => 'string',
                        'sentAs' => 'member',
                    ),
                ),
            ),
        ),
        'VerifyDomainIdentityResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'VerificationToken' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
    ),
    'iterators' => array(
        'ListIdentities' => array(
            'input_token' => 'NextToken',
            'output_token' => 'NextToken',
            'limit_key' => 'MaxItems',
            'result_key' => 'Identities',
        ),
        'ListVerifiedEmailAddresses' => array(
            'result_key' => 'VerifiedEmailAddresses',
        ),
    ),
    'waiters' => array(
        '__default__' => array(
            'interval' => 3,
            'max_attempts' => 20,
        ),
        'IdentityExists' => array(
            'operation' => 'GetIdentityVerificationAttributes',
            'success.type' => 'output',
            'success.path' => 'VerificationAttributes/*/VerificationStatus',
            'success.value' => true,
        ),
    ),
);
