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
    'apiVersion' => '2012-12-01',
    'endpointPrefix' => 'redshift',
    'serviceFullName' => 'Amazon Redshift',
    'serviceType' => 'query',
    'resultWrapped' => true,
    'signatureVersion' => 'v4',
    'namespace' => 'Redshift',
    'regions' => array(
        'us-east-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'redshift.us-east-1.amazonaws.com',
        ),
        'us-west-2' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'redshift.us-west-2.amazonaws.com',
        ),
        'eu-west-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'redshift.eu-west-1.amazonaws.com',
        ),
        'ap-southeast-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'redshift.ap-southeast-1.amazonaws.com',
        ),
        'ap-southeast-2' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'redshift.ap-southeast-2.amazonaws.com',
        ),
        'ap-northeast-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'redshift.ap-northeast-1.amazonaws.com',
        ),
    ),
    'operations' => array(
        'AuthorizeClusterSecurityGroupIngress' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ClusterSecurityGroupWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'AuthorizeClusterSecurityGroupIngress',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-12-01',
                ),
                'ClusterSecurityGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'CIDRIP' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'EC2SecurityGroupName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'EC2SecurityGroupOwnerId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The cluster security group name does not refer to an existing cluster security group.',
                    'class' => 'ClusterSecurityGroupNotFoundException',
                ),
                array(
                    'reason' => 'The state of the cluster security group is not available.',
                    'class' => 'InvalidClusterSecurityGroupStateException',
                ),
                array(
                    'reason' => 'The specified CIDR block or EC2 security group is already authorized for the specified cluster security group.',
                    'class' => 'AuthorizationAlreadyExistsException',
                ),
                array(
                    'reason' => 'The authorization quota for the cluster security group has been reached.',
                    'class' => 'AuthorizationQuotaExceededException',
                ),
            ),
        ),
        'AuthorizeSnapshotAccess' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'SnapshotWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'AuthorizeSnapshotAccess',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-12-01',
                ),
                'SnapshotIdentifier' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'SnapshotClusterIdentifier' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'AccountWithRestoreAccess' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The snapshot identifier does not refer to an existing cluster snapshot.',
                    'class' => 'ClusterSnapshotNotFoundException',
                ),
                array(
                    'reason' => 'The specified CIDR block or EC2 security group is already authorized for the specified cluster security group.',
                    'class' => 'AuthorizationAlreadyExistsException',
                ),
                array(
                    'reason' => 'The authorization quota for the cluster security group has been reached.',
                    'class' => 'AuthorizationQuotaExceededException',
                ),
            ),
        ),
        'CopyClusterSnapshot' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'SnapshotWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CopyClusterSnapshot',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-12-01',
                ),
                'SourceSnapshotIdentifier' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'SourceSnapshotClusterIdentifier' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'TargetSnapshotIdentifier' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The value specified as a snapshot identifier is already used by an existing snapshot.',
                    'class' => 'ClusterSnapshotAlreadyExistsException',
                ),
                array(
                    'reason' => 'The snapshot identifier does not refer to an existing cluster snapshot.',
                    'class' => 'ClusterSnapshotNotFoundException',
                ),
                array(
                    'reason' => 'The state of the cluster snapshot is not available, or other accounts are authorized to access the snapshot.',
                    'class' => 'InvalidClusterSnapshotStateException',
                ),
                array(
                    'reason' => 'The request would result in the user exceeding the allowed number of cluster snapshots.',
                    'class' => 'ClusterSnapshotQuotaExceededException',
                ),
            ),
        ),
        'CreateCluster' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ClusterWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateCluster',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-12-01',
                ),
                'DBName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'ClusterIdentifier' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'ClusterType' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'NodeType' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'MasterUsername' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'MasterUserPassword' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'ClusterSecurityGroups' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'ClusterSecurityGroups.member',
                    'items' => array(
                        'name' => 'ClusterSecurityGroupName',
                        'type' => 'string',
                    ),
                ),
                'VpcSecurityGroupIds' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'VpcSecurityGroupIds.member',
                    'items' => array(
                        'name' => 'VpcSecurityGroupId',
                        'type' => 'string',
                    ),
                ),
                'ClusterSubnetGroupName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'AvailabilityZone' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'PreferredMaintenanceWindow' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'ClusterParameterGroupName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'AutomatedSnapshotRetentionPeriod' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'Port' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'ClusterVersion' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'AllowVersionUpgrade' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'NumberOfNodes' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'PubliclyAccessible' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'Encrypted' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'HsmClientCertificateIdentifier' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'HsmConfigurationIdentifier' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'ElasticIp' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The account already has a cluster with the given identifier.',
                    'class' => 'ClusterAlreadyExistsException',
                ),
                array(
                    'reason' => 'The number of nodes specified exceeds the allotted capacity of the cluster.',
                    'class' => 'InsufficientClusterCapacityException',
                ),
                array(
                    'reason' => 'The parameter group name does not refer to an existing parameter group.',
                    'class' => 'ClusterParameterGroupNotFoundException',
                ),
                array(
                    'reason' => 'The cluster security group name does not refer to an existing cluster security group.',
                    'class' => 'ClusterSecurityGroupNotFoundException',
                ),
                array(
                    'reason' => 'The request would exceed the allowed number of cluster instances for this account. For information about increasing your quota, go to Limits in Amazon Redshift in the Amazon Redshift Management Guide.',
                    'class' => 'ClusterQuotaExceededException',
                ),
                array(
                    'reason' => 'The operation would exceed the number of nodes allotted to the account. For information about increasing your quota, go to Limits in Amazon Redshift in the Amazon Redshift Management Guide.',
                    'class' => 'NumberOfNodesQuotaExceededException',
                ),
                array(
                    'reason' => 'The operation would exceed the number of nodes allowed for a cluster.',
                    'class' => 'NumberOfNodesPerClusterLimitExceededException',
                ),
                array(
                    'reason' => 'The cluster subnet group name does not refer to an existing cluster subnet group.',
                    'class' => 'ClusterSubnetGroupNotFoundException',
                ),
                array(
                    'reason' => 'The cluster subnet group does not cover all Availability Zones.',
                    'class' => 'InvalidVPCNetworkStateException',
                ),
                array(
                    'reason' => 'The cluster subnet group cannot be deleted because it is in use.',
                    'class' => 'InvalidClusterSubnetGroupStateException',
                ),
                array(
                    'reason' => 'The requested subnet is not valid, or not all of the subnets are in the same VPC.',
                    'class' => 'InvalidSubnetException',
                ),
                array(
                    'reason' => 'Your account is not authorized to perform the requested operation.',
                    'class' => 'UnauthorizedOperationException',
                ),
                array(
                    'reason' => 'There is no Amazon Redshift HSM client certificate with the specified identifier.',
                    'class' => 'HsmClientCertificateNotFoundException',
                ),
                array(
                    'reason' => 'There is no Amazon Redshift HSM configuration with the specified identifier.',
                    'class' => 'HsmConfigurationNotFoundException',
                ),
                array(
                    'reason' => 'The Elastic IP (EIP) is invalid or cannot be found.',
                    'class' => 'InvalidElasticIpException',
                ),
            ),
        ),
        'CreateClusterParameterGroup' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ClusterParameterGroupWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateClusterParameterGroup',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-12-01',
                ),
                'ParameterGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'ParameterGroupFamily' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Description' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request would result in the user exceeding the allowed number of cluster parameter groups. For information about increasing your quota, go to Limits in Amazon Redshift in the Amazon Redshift Management Guide.',
                    'class' => 'ClusterParameterGroupQuotaExceededException',
                ),
                array(
                    'reason' => 'A cluster parameter group with the same name already exists.',
                    'class' => 'ClusterParameterGroupAlreadyExistsException',
                ),
            ),
        ),
        'CreateClusterSecurityGroup' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ClusterSecurityGroupWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateClusterSecurityGroup',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-12-01',
                ),
                'ClusterSecurityGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Description' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'A cluster security group with the same name already exists.',
                    'class' => 'ClusterSecurityGroupAlreadyExistsException',
                ),
                array(
                    'reason' => 'The request would result in the user exceeding the allowed number of cluster security groups. For information about increasing your quota, go to Limits in Amazon Redshift in the Amazon Redshift Management Guide.',
                    'class' => 'ClusterSecurityGroupQuotaExceededException',
                ),
            ),
        ),
        'CreateClusterSnapshot' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'SnapshotWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateClusterSnapshot',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-12-01',
                ),
                'SnapshotIdentifier' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'ClusterIdentifier' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The value specified as a snapshot identifier is already used by an existing snapshot.',
                    'class' => 'ClusterSnapshotAlreadyExistsException',
                ),
                array(
                    'reason' => 'The specified cluster is not in the available state.',
                    'class' => 'InvalidClusterStateException',
                ),
                array(
                    'reason' => 'The ClusterIdentifier parameter does not refer to an existing cluster.',
                    'class' => 'ClusterNotFoundException',
                ),
                array(
                    'reason' => 'The request would result in the user exceeding the allowed number of cluster snapshots.',
                    'class' => 'ClusterSnapshotQuotaExceededException',
                ),
            ),
        ),
        'CreateClusterSubnetGroup' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ClusterSubnetGroupWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateClusterSubnetGroup',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-12-01',
                ),
                'ClusterSubnetGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Description' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'SubnetIds' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'SubnetIds.member',
                    'items' => array(
                        'name' => 'SubnetIdentifier',
                        'type' => 'string',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'A ClusterSubnetGroupName is already used by an existing cluster subnet group.',
                    'class' => 'ClusterSubnetGroupAlreadyExistsException',
                ),
                array(
                    'reason' => 'The request would result in user exceeding the allowed number of cluster subnet groups. For information about increasing your quota, go to Limits in Amazon Redshift in the Amazon Redshift Management Guide.',
                    'class' => 'ClusterSubnetGroupQuotaExceededException',
                ),
                array(
                    'reason' => 'The request would result in user exceeding the allowed number of subnets in a cluster subnet groups. For information about increasing your quota, go to Limits in Amazon Redshift in the Amazon Redshift Management Guide.',
                    'class' => 'ClusterSubnetQuotaExceededException',
                ),
                array(
                    'reason' => 'The requested subnet is not valid, or not all of the subnets are in the same VPC.',
                    'class' => 'InvalidSubnetException',
                ),
                array(
                    'reason' => 'Your account is not authorized to perform the requested operation.',
                    'class' => 'UnauthorizedOperationException',
                ),
            ),
        ),
        'CreateEventSubscription' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EventSubscriptionWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateEventSubscription',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-12-01',
                ),
                'SubscriptionName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'SnsTopicArn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'SourceType' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'SourceIds' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'SourceIds.member',
                    'items' => array(
                        'name' => 'SourceId',
                        'type' => 'string',
                    ),
                ),
                'EventCategories' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'EventCategories.member',
                    'items' => array(
                        'name' => 'EventCategory',
                        'type' => 'string',
                    ),
                ),
                'Severity' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Enabled' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request would exceed the allowed number of event subscriptions for this account. For information about increasing your quota, go to Limits in Amazon Redshift in the Amazon Redshift Management Guide.',
                    'class' => 'EventSubscriptionQuotaExceededException',
                ),
                array(
                    'reason' => 'There is already an existing event notification subscription with the specified name.',
                    'class' => 'SubscriptionAlreadyExistException',
                ),
                array(
                    'reason' => 'Amazon SNS has responded that there is a problem with the specified Amazon SNS topic.',
                    'class' => 'SNSInvalidTopicException',
                ),
                array(
                    'reason' => 'You do not have permission to publish to the specified Amazon SNS topic.',
                    'class' => 'SNSNoAuthorizationException',
                ),
                array(
                    'reason' => 'An Amazon SNS topic with the specified Amazon Resource Name (ARN) does not exist.',
                    'class' => 'SNSTopicArnNotFoundException',
                ),
                array(
                    'reason' => 'An Amazon Redshift event with the specified event ID does not exist.',
                    'class' => 'SubscriptionEventIdNotFoundException',
                ),
                array(
                    'reason' => 'The value specified for the event category was not one of the allowed values, or it specified a category that does not apply to the specified source type. The allowed values are Configuration, Management, Monitoring, and Security.',
                    'class' => 'SubscriptionCategoryNotFoundException',
                ),
                array(
                    'reason' => 'The value specified for the event severity was not one of the allowed values, or it specified a severity that does not apply to the specified source type. The allowed values are ERROR and INFO.',
                    'class' => 'SubscriptionSeverityNotFoundException',
                ),
                array(
                    'reason' => 'The specified Amazon Redshift event source could not be found.',
                    'class' => 'SourceNotFoundException',
                ),
            ),
        ),
        'CreateHsmClientCertificate' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'HsmClientCertificateWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateHsmClientCertificate',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-12-01',
                ),
                'HsmClientCertificateIdentifier' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'There is already an existing Amazon Redshift HSM client certificate with the specified identifier.',
                    'class' => 'HsmClientCertificateAlreadyExistsException',
                ),
                array(
                    'reason' => 'The quota for HSM client certificates has been reached. For information about increasing your quota, go to Limits in Amazon Redshift in the Amazon Redshift Management Guide.',
                    'class' => 'HsmClientCertificateQuotaExceededException',
                ),
            ),
        ),
        'CreateHsmConfiguration' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'HsmConfigurationWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateHsmConfiguration',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-12-01',
                ),
                'HsmConfigurationIdentifier' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Description' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'HsmIpAddress' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'HsmPartitionName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'HsmPartitionPassword' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'HsmServerPublicCertificate' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'There is already an existing Amazon Redshift HSM configuration with the specified identifier.',
                    'class' => 'HsmConfigurationAlreadyExistsException',
                ),
                array(
                    'reason' => 'The quota for HSM configurations has been reached. For information about increasing your quota, go to Limits in Amazon Redshift in the Amazon Redshift Management Guide.',
                    'class' => 'HsmConfigurationQuotaExceededException',
                ),
            ),
        ),
        'DeleteCluster' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ClusterWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteCluster',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-12-01',
                ),
                'ClusterIdentifier' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'SkipFinalClusterSnapshot' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'FinalClusterSnapshotIdentifier' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The ClusterIdentifier parameter does not refer to an existing cluster.',
                    'class' => 'ClusterNotFoundException',
                ),
                array(
                    'reason' => 'The specified cluster is not in the available state.',
                    'class' => 'InvalidClusterStateException',
                ),
                array(
                    'reason' => 'The value specified as a snapshot identifier is already used by an existing snapshot.',
                    'class' => 'ClusterSnapshotAlreadyExistsException',
                ),
                array(
                    'reason' => 'The request would result in the user exceeding the allowed number of cluster snapshots.',
                    'class' => 'ClusterSnapshotQuotaExceededException',
                ),
            ),
        ),
        'DeleteClusterParameterGroup' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteClusterParameterGroup',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-12-01',
                ),
                'ParameterGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The cluster parameter group action can not be completed because another task is in progress that involves the parameter group. Wait a few moments and try the operation again.',
                    'class' => 'InvalidClusterParameterGroupStateException',
                ),
                array(
                    'reason' => 'The parameter group name does not refer to an existing parameter group.',
                    'class' => 'ClusterParameterGroupNotFoundException',
                ),
            ),
        ),
        'DeleteClusterSecurityGroup' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteClusterSecurityGroup',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-12-01',
                ),
                'ClusterSecurityGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The state of the cluster security group is not available.',
                    'class' => 'InvalidClusterSecurityGroupStateException',
                ),
                array(
                    'reason' => 'The cluster security group name does not refer to an existing cluster security group.',
                    'class' => 'ClusterSecurityGroupNotFoundException',
                ),
            ),
        ),
        'DeleteClusterSnapshot' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'SnapshotWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteClusterSnapshot',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-12-01',
                ),
                'SnapshotIdentifier' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'SnapshotClusterIdentifier' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The state of the cluster snapshot is not available, or other accounts are authorized to access the snapshot.',
                    'class' => 'InvalidClusterSnapshotStateException',
                ),
                array(
                    'reason' => 'The snapshot identifier does not refer to an existing cluster snapshot.',
                    'class' => 'ClusterSnapshotNotFoundException',
                ),
            ),
        ),
        'DeleteClusterSubnetGroup' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteClusterSubnetGroup',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-12-01',
                ),
                'ClusterSubnetGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The cluster subnet group cannot be deleted because it is in use.',
                    'class' => 'InvalidClusterSubnetGroupStateException',
                ),
                array(
                    'reason' => 'The state of the subnet is invalid.',
                    'class' => 'InvalidClusterSubnetStateException',
                ),
                array(
                    'reason' => 'The cluster subnet group name does not refer to an existing cluster subnet group.',
                    'class' => 'ClusterSubnetGroupNotFoundException',
                ),
            ),
        ),
        'DeleteEventSubscription' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteEventSubscription',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-12-01',
                ),
                'SubscriptionName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An Amazon Redshift event notification subscription with the specified name does not exist.',
                    'class' => 'SubscriptionNotFoundException',
                ),
                array(
                    'reason' => 'The subscription request is invalid because it is a duplicate request. This subscription request is already in progress.',
                    'class' => 'InvalidSubscriptionStateException',
                ),
            ),
        ),
        'DeleteHsmClientCertificate' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteHsmClientCertificate',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-12-01',
                ),
                'HsmClientCertificateIdentifier' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified HSM client certificate is not in the available state, or it is still in use by one or more Amazon Redshift clusters.',
                    'class' => 'InvalidHsmClientCertificateStateException',
                ),
                array(
                    'reason' => 'There is no Amazon Redshift HSM client certificate with the specified identifier.',
                    'class' => 'HsmClientCertificateNotFoundException',
                ),
            ),
        ),
        'DeleteHsmConfiguration' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteHsmConfiguration',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-12-01',
                ),
                'HsmConfigurationIdentifier' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified HSM configuration is not in the available state, or it is still in use by one or more Amazon Redshift clusters.',
                    'class' => 'InvalidHsmConfigurationStateException',
                ),
                array(
                    'reason' => 'There is no Amazon Redshift HSM configuration with the specified identifier.',
                    'class' => 'HsmConfigurationNotFoundException',
                ),
            ),
        ),
        'DescribeClusterParameterGroups' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ClusterParameterGroupsMessage',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeClusterParameterGroups',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-12-01',
                ),
                'ParameterGroupName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'MaxRecords' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The parameter group name does not refer to an existing parameter group.',
                    'class' => 'ClusterParameterGroupNotFoundException',
                ),
            ),
        ),
        'DescribeClusterParameters' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ClusterParameterGroupDetails',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeClusterParameters',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-12-01',
                ),
                'ParameterGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Source' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'MaxRecords' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The parameter group name does not refer to an existing parameter group.',
                    'class' => 'ClusterParameterGroupNotFoundException',
                ),
            ),
        ),
        'DescribeClusterSecurityGroups' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ClusterSecurityGroupMessage',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeClusterSecurityGroups',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-12-01',
                ),
                'ClusterSecurityGroupName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'MaxRecords' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The cluster security group name does not refer to an existing cluster security group.',
                    'class' => 'ClusterSecurityGroupNotFoundException',
                ),
            ),
        ),
        'DescribeClusterSnapshots' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'SnapshotMessage',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeClusterSnapshots',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-12-01',
                ),
                'ClusterIdentifier' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'SnapshotIdentifier' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'SnapshotType' => array(
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
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'OwnerAccount' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The snapshot identifier does not refer to an existing cluster snapshot.',
                    'class' => 'ClusterSnapshotNotFoundException',
                ),
            ),
        ),
        'DescribeClusterSubnetGroups' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ClusterSubnetGroupMessage',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeClusterSubnetGroups',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-12-01',
                ),
                'ClusterSubnetGroupName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'MaxRecords' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The cluster subnet group name does not refer to an existing cluster subnet group.',
                    'class' => 'ClusterSubnetGroupNotFoundException',
                ),
            ),
        ),
        'DescribeClusterVersions' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ClusterVersionsMessage',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeClusterVersions',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-12-01',
                ),
                'ClusterVersion' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'ClusterParameterGroupFamily' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'MaxRecords' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DescribeClusters' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ClustersMessage',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeClusters',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-12-01',
                ),
                'ClusterIdentifier' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'MaxRecords' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The ClusterIdentifier parameter does not refer to an existing cluster.',
                    'class' => 'ClusterNotFoundException',
                ),
            ),
        ),
        'DescribeDefaultClusterParameters' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DefaultClusterParametersWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeDefaultClusterParameters',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-12-01',
                ),
                'ParameterGroupFamily' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'MaxRecords' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DescribeEventCategories' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EventCategoriesMessage',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeEventCategories',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-12-01',
                ),
                'SourceType' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DescribeEventSubscriptions' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EventSubscriptionsMessage',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeEventSubscriptions',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-12-01',
                ),
                'SubscriptionName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'MaxRecords' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An Amazon Redshift event notification subscription with the specified name does not exist.',
                    'class' => 'SubscriptionNotFoundException',
                ),
            ),
        ),
        'DescribeEvents' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EventsMessage',
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
                    'default' => '2012-12-01',
                ),
                'SourceIdentifier' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'SourceType' => array(
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
                'Duration' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'MaxRecords' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DescribeHsmClientCertificates' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'HsmClientCertificateMessage',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeHsmClientCertificates',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-12-01',
                ),
                'HsmClientCertificateIdentifier' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'MaxRecords' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'There is no Amazon Redshift HSM client certificate with the specified identifier.',
                    'class' => 'HsmClientCertificateNotFoundException',
                ),
            ),
        ),
        'DescribeHsmConfigurations' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'HsmConfigurationMessage',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeHsmConfigurations',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-12-01',
                ),
                'HsmConfigurationIdentifier' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'MaxRecords' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'There is no Amazon Redshift HSM configuration with the specified identifier.',
                    'class' => 'HsmConfigurationNotFoundException',
                ),
            ),
        ),
        'DescribeLoggingStatus' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'LoggingStatus',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeLoggingStatus',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-12-01',
                ),
                'ClusterIdentifier' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The ClusterIdentifier parameter does not refer to an existing cluster.',
                    'class' => 'ClusterNotFoundException',
                ),
            ),
        ),
        'DescribeOrderableClusterOptions' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'OrderableClusterOptionsMessage',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeOrderableClusterOptions',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-12-01',
                ),
                'ClusterVersion' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'NodeType' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'MaxRecords' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DescribeReservedNodeOfferings' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ReservedNodeOfferingsMessage',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeReservedNodeOfferings',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-12-01',
                ),
                'ReservedNodeOfferingId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'MaxRecords' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Specified offering does not exist.',
                    'class' => 'ReservedNodeOfferingNotFoundException',
                ),
            ),
        ),
        'DescribeReservedNodes' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ReservedNodesMessage',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeReservedNodes',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-12-01',
                ),
                'ReservedNodeId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'MaxRecords' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified reserved compute node not found.',
                    'class' => 'ReservedNodeNotFoundException',
                ),
            ),
        ),
        'DescribeResize' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ResizeProgressMessage',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeResize',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-12-01',
                ),
                'ClusterIdentifier' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The ClusterIdentifier parameter does not refer to an existing cluster.',
                    'class' => 'ClusterNotFoundException',
                ),
                array(
                    'reason' => 'A resize operation for the specified cluster is not found.',
                    'class' => 'ResizeNotFoundException',
                ),
            ),
        ),
        'DisableLogging' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'LoggingStatus',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DisableLogging',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-12-01',
                ),
                'ClusterIdentifier' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The ClusterIdentifier parameter does not refer to an existing cluster.',
                    'class' => 'ClusterNotFoundException',
                ),
            ),
        ),
        'DisableSnapshotCopy' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ClusterWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DisableSnapshotCopy',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-12-01',
                ),
                'ClusterIdentifier' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The ClusterIdentifier parameter does not refer to an existing cluster.',
                    'class' => 'ClusterNotFoundException',
                ),
                array(
                    'reason' => 'The cluster already has cross-region snapshot copy disabled.',
                    'class' => 'SnapshotCopyAlreadyDisabledException',
                ),
                array(
                    'reason' => 'The specified cluster is not in the available state.',
                    'class' => 'InvalidClusterStateException',
                ),
                array(
                    'reason' => 'Your account is not authorized to perform the requested operation.',
                    'class' => 'UnauthorizedOperationException',
                ),
            ),
        ),
        'EnableLogging' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'LoggingStatus',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'EnableLogging',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-12-01',
                ),
                'ClusterIdentifier' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'BucketName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'S3KeyPrefix' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The ClusterIdentifier parameter does not refer to an existing cluster.',
                    'class' => 'ClusterNotFoundException',
                ),
                array(
                    'reason' => 'Could not find the specified S3 bucket.',
                    'class' => 'BucketNotFoundException',
                ),
                array(
                    'reason' => 'The cluster does not have read bucket or put object permissions on the S3 bucket specified when enabling logging.',
                    'class' => 'InsufficientS3BucketPolicyFaultException',
                ),
                array(
                    'reason' => 'The string specified for the logging S3 key prefix does not comply with the documented constraints.',
                    'class' => 'InvalidS3KeyPrefixFaultException',
                ),
                array(
                    'reason' => 'The S3 bucket name is invalid. For more information about naming rules, go to Bucket Restrictions and Limitations in the Amazon Simple Storage Service (S3) Developer Guide.',
                    'class' => 'InvalidS3BucketNameFaultException',
                ),
            ),
        ),
        'EnableSnapshotCopy' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ClusterWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'EnableSnapshotCopy',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-12-01',
                ),
                'ClusterIdentifier' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'DestinationRegion' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'RetentionPeriod' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified options are incompatible.',
                    'class' => 'IncompatibleOrderableOptionsException',
                ),
                array(
                    'reason' => 'The specified cluster is not in the available state.',
                    'class' => 'InvalidClusterStateException',
                ),
                array(
                    'reason' => 'The ClusterIdentifier parameter does not refer to an existing cluster.',
                    'class' => 'ClusterNotFoundException',
                ),
                array(
                    'reason' => 'Cross-region snapshot copy was temporarily disabled. Try your request again.',
                    'class' => 'CopyToRegionDisabledException',
                ),
                array(
                    'reason' => 'The cluster already has cross-region snapshot copy enabled.',
                    'class' => 'SnapshotCopyAlreadyEnabledException',
                ),
                array(
                    'reason' => 'The specified region is incorrect or does not exist.',
                    'class' => 'UnknownSnapshotCopyRegionException',
                ),
                array(
                    'reason' => 'Your account is not authorized to perform the requested operation.',
                    'class' => 'UnauthorizedOperationException',
                ),
            ),
        ),
        'ModifyCluster' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ClusterWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ModifyCluster',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-12-01',
                ),
                'ClusterIdentifier' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'ClusterType' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'NodeType' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'NumberOfNodes' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'ClusterSecurityGroups' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'ClusterSecurityGroups.member',
                    'items' => array(
                        'name' => 'ClusterSecurityGroupName',
                        'type' => 'string',
                    ),
                ),
                'VpcSecurityGroupIds' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'VpcSecurityGroupIds.member',
                    'items' => array(
                        'name' => 'VpcSecurityGroupId',
                        'type' => 'string',
                    ),
                ),
                'MasterUserPassword' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'ClusterParameterGroupName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'AutomatedSnapshotRetentionPeriod' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'PreferredMaintenanceWindow' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'ClusterVersion' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'AllowVersionUpgrade' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'HsmClientCertificateIdentifier' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'HsmConfigurationIdentifier' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'NewClusterIdentifier' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified cluster is not in the available state.',
                    'class' => 'InvalidClusterStateException',
                ),
                array(
                    'reason' => 'The state of the cluster security group is not available.',
                    'class' => 'InvalidClusterSecurityGroupStateException',
                ),
                array(
                    'reason' => 'The ClusterIdentifier parameter does not refer to an existing cluster.',
                    'class' => 'ClusterNotFoundException',
                ),
                array(
                    'reason' => 'The operation would exceed the number of nodes allotted to the account. For information about increasing your quota, go to Limits in Amazon Redshift in the Amazon Redshift Management Guide.',
                    'class' => 'NumberOfNodesQuotaExceededException',
                ),
                array(
                    'reason' => 'The cluster security group name does not refer to an existing cluster security group.',
                    'class' => 'ClusterSecurityGroupNotFoundException',
                ),
                array(
                    'reason' => 'The parameter group name does not refer to an existing parameter group.',
                    'class' => 'ClusterParameterGroupNotFoundException',
                ),
                array(
                    'reason' => 'The number of nodes specified exceeds the allotted capacity of the cluster.',
                    'class' => 'InsufficientClusterCapacityException',
                ),
                array(
                    'reason' => 'A request option was specified that is not supported.',
                    'class' => 'UnsupportedOptionException',
                ),
                array(
                    'reason' => 'Your account is not authorized to perform the requested operation.',
                    'class' => 'UnauthorizedOperationException',
                ),
                array(
                    'reason' => 'There is no Amazon Redshift HSM client certificate with the specified identifier.',
                    'class' => 'HsmClientCertificateNotFoundException',
                ),
                array(
                    'reason' => 'There is no Amazon Redshift HSM configuration with the specified identifier.',
                    'class' => 'HsmConfigurationNotFoundException',
                ),
                array(
                    'reason' => 'The account already has a cluster with the given identifier.',
                    'class' => 'ClusterAlreadyExistsException',
                ),
            ),
        ),
        'ModifyClusterParameterGroup' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ClusterParameterGroupNameMessage',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ModifyClusterParameterGroup',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-12-01',
                ),
                'ParameterGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Parameters' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Parameters.member',
                    'items' => array(
                        'name' => 'Parameter',
                        'type' => 'object',
                        'properties' => array(
                            'ParameterName' => array(
                                'type' => 'string',
                            ),
                            'ParameterValue' => array(
                                'type' => 'string',
                            ),
                            'Description' => array(
                                'type' => 'string',
                            ),
                            'Source' => array(
                                'type' => 'string',
                            ),
                            'DataType' => array(
                                'type' => 'string',
                            ),
                            'AllowedValues' => array(
                                'type' => 'string',
                            ),
                            'IsModifiable' => array(
                                'type' => 'boolean',
                                'format' => 'boolean-string',
                            ),
                            'MinimumEngineVersion' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The parameter group name does not refer to an existing parameter group.',
                    'class' => 'ClusterParameterGroupNotFoundException',
                ),
                array(
                    'reason' => 'The cluster parameter group action can not be completed because another task is in progress that involves the parameter group. Wait a few moments and try the operation again.',
                    'class' => 'InvalidClusterParameterGroupStateException',
                ),
            ),
        ),
        'ModifyClusterSubnetGroup' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ClusterSubnetGroupWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ModifyClusterSubnetGroup',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-12-01',
                ),
                'ClusterSubnetGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Description' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'SubnetIds' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'SubnetIds.member',
                    'items' => array(
                        'name' => 'SubnetIdentifier',
                        'type' => 'string',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The cluster subnet group name does not refer to an existing cluster subnet group.',
                    'class' => 'ClusterSubnetGroupNotFoundException',
                ),
                array(
                    'reason' => 'The request would result in user exceeding the allowed number of subnets in a cluster subnet groups. For information about increasing your quota, go to Limits in Amazon Redshift in the Amazon Redshift Management Guide.',
                    'class' => 'ClusterSubnetQuotaExceededException',
                ),
                array(
                    'reason' => 'A specified subnet is already in use by another cluster.',
                    'class' => 'SubnetAlreadyInUseException',
                ),
                array(
                    'reason' => 'The requested subnet is not valid, or not all of the subnets are in the same VPC.',
                    'class' => 'InvalidSubnetException',
                ),
                array(
                    'reason' => 'Your account is not authorized to perform the requested operation.',
                    'class' => 'UnauthorizedOperationException',
                ),
            ),
        ),
        'ModifyEventSubscription' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EventSubscriptionWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ModifyEventSubscription',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-12-01',
                ),
                'SubscriptionName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'SnsTopicArn' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'SourceType' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'SourceIds' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'SourceIds.member',
                    'items' => array(
                        'name' => 'SourceId',
                        'type' => 'string',
                    ),
                ),
                'EventCategories' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'EventCategories.member',
                    'items' => array(
                        'name' => 'EventCategory',
                        'type' => 'string',
                    ),
                ),
                'Severity' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Enabled' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An Amazon Redshift event notification subscription with the specified name does not exist.',
                    'class' => 'SubscriptionNotFoundException',
                ),
                array(
                    'reason' => 'Amazon SNS has responded that there is a problem with the specified Amazon SNS topic.',
                    'class' => 'SNSInvalidTopicException',
                ),
                array(
                    'reason' => 'You do not have permission to publish to the specified Amazon SNS topic.',
                    'class' => 'SNSNoAuthorizationException',
                ),
                array(
                    'reason' => 'An Amazon SNS topic with the specified Amazon Resource Name (ARN) does not exist.',
                    'class' => 'SNSTopicArnNotFoundException',
                ),
                array(
                    'reason' => 'An Amazon Redshift event with the specified event ID does not exist.',
                    'class' => 'SubscriptionEventIdNotFoundException',
                ),
                array(
                    'reason' => 'The value specified for the event category was not one of the allowed values, or it specified a category that does not apply to the specified source type. The allowed values are Configuration, Management, Monitoring, and Security.',
                    'class' => 'SubscriptionCategoryNotFoundException',
                ),
                array(
                    'reason' => 'The value specified for the event severity was not one of the allowed values, or it specified a severity that does not apply to the specified source type. The allowed values are ERROR and INFO.',
                    'class' => 'SubscriptionSeverityNotFoundException',
                ),
                array(
                    'reason' => 'The specified Amazon Redshift event source could not be found.',
                    'class' => 'SourceNotFoundException',
                ),
                array(
                    'reason' => 'The subscription request is invalid because it is a duplicate request. This subscription request is already in progress.',
                    'class' => 'InvalidSubscriptionStateException',
                ),
            ),
        ),
        'ModifySnapshotCopyRetentionPeriod' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ClusterWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ModifySnapshotCopyRetentionPeriod',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-12-01',
                ),
                'ClusterIdentifier' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'RetentionPeriod' => array(
                    'required' => true,
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The ClusterIdentifier parameter does not refer to an existing cluster.',
                    'class' => 'ClusterNotFoundException',
                ),
                array(
                    'reason' => 'Cross-region snapshot copy was temporarily disabled. Try your request again.',
                    'class' => 'SnapshotCopyDisabledException',
                ),
                array(
                    'reason' => 'Your account is not authorized to perform the requested operation.',
                    'class' => 'UnauthorizedOperationException',
                ),
                array(
                    'reason' => 'The specified cluster is not in the available state.',
                    'class' => 'InvalidClusterStateException',
                ),
            ),
        ),
        'PurchaseReservedNodeOffering' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ReservedNodeWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'PurchaseReservedNodeOffering',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-12-01',
                ),
                'ReservedNodeOfferingId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'NodeCount' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Specified offering does not exist.',
                    'class' => 'ReservedNodeOfferingNotFoundException',
                ),
                array(
                    'reason' => 'User already has a reservation with the given identifier.',
                    'class' => 'ReservedNodeAlreadyExistsException',
                ),
                array(
                    'reason' => 'Request would exceed the user\'s compute node quota. For information about increasing your quota, go to Limits in Amazon Redshift in the Amazon Redshift Management Guide.',
                    'class' => 'ReservedNodeQuotaExceededException',
                ),
            ),
        ),
        'RebootCluster' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ClusterWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'RebootCluster',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-12-01',
                ),
                'ClusterIdentifier' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified cluster is not in the available state.',
                    'class' => 'InvalidClusterStateException',
                ),
                array(
                    'reason' => 'The ClusterIdentifier parameter does not refer to an existing cluster.',
                    'class' => 'ClusterNotFoundException',
                ),
            ),
        ),
        'ResetClusterParameterGroup' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ClusterParameterGroupNameMessage',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ResetClusterParameterGroup',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-12-01',
                ),
                'ParameterGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'ResetAllParameters' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'Parameters' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Parameters.member',
                    'items' => array(
                        'name' => 'Parameter',
                        'type' => 'object',
                        'properties' => array(
                            'ParameterName' => array(
                                'type' => 'string',
                            ),
                            'ParameterValue' => array(
                                'type' => 'string',
                            ),
                            'Description' => array(
                                'type' => 'string',
                            ),
                            'Source' => array(
                                'type' => 'string',
                            ),
                            'DataType' => array(
                                'type' => 'string',
                            ),
                            'AllowedValues' => array(
                                'type' => 'string',
                            ),
                            'IsModifiable' => array(
                                'type' => 'boolean',
                                'format' => 'boolean-string',
                            ),
                            'MinimumEngineVersion' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The cluster parameter group action can not be completed because another task is in progress that involves the parameter group. Wait a few moments and try the operation again.',
                    'class' => 'InvalidClusterParameterGroupStateException',
                ),
                array(
                    'reason' => 'The parameter group name does not refer to an existing parameter group.',
                    'class' => 'ClusterParameterGroupNotFoundException',
                ),
            ),
        ),
        'RestoreFromClusterSnapshot' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ClusterWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'RestoreFromClusterSnapshot',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-12-01',
                ),
                'ClusterIdentifier' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'SnapshotIdentifier' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'SnapshotClusterIdentifier' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Port' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'AvailabilityZone' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'AllowVersionUpgrade' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'ClusterSubnetGroupName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'PubliclyAccessible' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'OwnerAccount' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'HsmClientCertificateIdentifier' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'HsmConfigurationIdentifier' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'ElasticIp' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'ClusterParameterGroupName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'ClusterSecurityGroups' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'ClusterSecurityGroups.member',
                    'items' => array(
                        'name' => 'ClusterSecurityGroupName',
                        'type' => 'string',
                    ),
                ),
                'VpcSecurityGroupIds' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'VpcSecurityGroupIds.member',
                    'items' => array(
                        'name' => 'VpcSecurityGroupId',
                        'type' => 'string',
                    ),
                ),
                'PreferredMaintenanceWindow' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'AutomatedSnapshotRetentionPeriod' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The owner of the specified snapshot has not authorized your account to access the snapshot.',
                    'class' => 'AccessToSnapshotDeniedException',
                ),
                array(
                    'reason' => 'The account already has a cluster with the given identifier.',
                    'class' => 'ClusterAlreadyExistsException',
                ),
                array(
                    'reason' => 'The snapshot identifier does not refer to an existing cluster snapshot.',
                    'class' => 'ClusterSnapshotNotFoundException',
                ),
                array(
                    'reason' => 'The request would exceed the allowed number of cluster instances for this account. For information about increasing your quota, go to Limits in Amazon Redshift in the Amazon Redshift Management Guide.',
                    'class' => 'ClusterQuotaExceededException',
                ),
                array(
                    'reason' => 'The number of nodes specified exceeds the allotted capacity of the cluster.',
                    'class' => 'InsufficientClusterCapacityException',
                ),
                array(
                    'reason' => 'The state of the cluster snapshot is not available, or other accounts are authorized to access the snapshot.',
                    'class' => 'InvalidClusterSnapshotStateException',
                ),
                array(
                    'reason' => 'The restore is invalid.',
                    'class' => 'InvalidRestoreException',
                ),
                array(
                    'reason' => 'The operation would exceed the number of nodes allotted to the account. For information about increasing your quota, go to Limits in Amazon Redshift in the Amazon Redshift Management Guide.',
                    'class' => 'NumberOfNodesQuotaExceededException',
                ),
                array(
                    'reason' => 'The operation would exceed the number of nodes allowed for a cluster.',
                    'class' => 'NumberOfNodesPerClusterLimitExceededException',
                ),
                array(
                    'reason' => 'The cluster subnet group does not cover all Availability Zones.',
                    'class' => 'InvalidVPCNetworkStateException',
                ),
                array(
                    'reason' => 'The cluster subnet group cannot be deleted because it is in use.',
                    'class' => 'InvalidClusterSubnetGroupStateException',
                ),
                array(
                    'reason' => 'The requested subnet is not valid, or not all of the subnets are in the same VPC.',
                    'class' => 'InvalidSubnetException',
                ),
                array(
                    'reason' => 'The cluster subnet group name does not refer to an existing cluster subnet group.',
                    'class' => 'ClusterSubnetGroupNotFoundException',
                ),
                array(
                    'reason' => 'Your account is not authorized to perform the requested operation.',
                    'class' => 'UnauthorizedOperationException',
                ),
                array(
                    'reason' => 'There is no Amazon Redshift HSM client certificate with the specified identifier.',
                    'class' => 'HsmClientCertificateNotFoundException',
                ),
                array(
                    'reason' => 'There is no Amazon Redshift HSM configuration with the specified identifier.',
                    'class' => 'HsmConfigurationNotFoundException',
                ),
                array(
                    'reason' => 'The Elastic IP (EIP) is invalid or cannot be found.',
                    'class' => 'InvalidElasticIpException',
                ),
                array(
                    'reason' => 'The parameter group name does not refer to an existing parameter group.',
                    'class' => 'ClusterParameterGroupNotFoundException',
                ),
                array(
                    'reason' => 'The cluster security group name does not refer to an existing cluster security group.',
                    'class' => 'ClusterSecurityGroupNotFoundException',
                ),
            ),
        ),
        'RevokeClusterSecurityGroupIngress' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ClusterSecurityGroupWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'RevokeClusterSecurityGroupIngress',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-12-01',
                ),
                'ClusterSecurityGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'CIDRIP' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'EC2SecurityGroupName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'EC2SecurityGroupOwnerId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The cluster security group name does not refer to an existing cluster security group.',
                    'class' => 'ClusterSecurityGroupNotFoundException',
                ),
                array(
                    'reason' => 'The specified CIDR IP range or EC2 security group is not authorized for the specified cluster security group.',
                    'class' => 'AuthorizationNotFoundException',
                ),
                array(
                    'reason' => 'The state of the cluster security group is not available.',
                    'class' => 'InvalidClusterSecurityGroupStateException',
                ),
            ),
        ),
        'RevokeSnapshotAccess' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'SnapshotWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'RevokeSnapshotAccess',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-12-01',
                ),
                'SnapshotIdentifier' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'SnapshotClusterIdentifier' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'AccountWithRestoreAccess' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The owner of the specified snapshot has not authorized your account to access the snapshot.',
                    'class' => 'AccessToSnapshotDeniedException',
                ),
                array(
                    'reason' => 'The specified CIDR IP range or EC2 security group is not authorized for the specified cluster security group.',
                    'class' => 'AuthorizationNotFoundException',
                ),
                array(
                    'reason' => 'The snapshot identifier does not refer to an existing cluster snapshot.',
                    'class' => 'ClusterSnapshotNotFoundException',
                ),
            ),
        ),
        'RotateEncryptionKey' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ClusterWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'RotateEncryptionKey',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-12-01',
                ),
                'ClusterIdentifier' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The ClusterIdentifier parameter does not refer to an existing cluster.',
                    'class' => 'ClusterNotFoundException',
                ),
                array(
                    'reason' => 'The specified cluster is not in the available state.',
                    'class' => 'InvalidClusterStateException',
                ),
            ),
        ),
    ),
    'models' => array(
        'ClusterSecurityGroupWrapper' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ClusterSecurityGroup' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'data' => array(
                        'wrapper' => true,
                    ),
                    'properties' => array(
                        'ClusterSecurityGroupName' => array(
                            'type' => 'string',
                        ),
                        'Description' => array(
                            'type' => 'string',
                        ),
                        'EC2SecurityGroups' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'EC2SecurityGroup',
                                'type' => 'object',
                                'sentAs' => 'EC2SecurityGroup',
                                'properties' => array(
                                    'Status' => array(
                                        'type' => 'string',
                                    ),
                                    'EC2SecurityGroupName' => array(
                                        'type' => 'string',
                                    ),
                                    'EC2SecurityGroupOwnerId' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                        'IPRanges' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'IPRange',
                                'type' => 'object',
                                'sentAs' => 'IPRange',
                                'properties' => array(
                                    'Status' => array(
                                        'type' => 'string',
                                    ),
                                    'CIDRIP' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'SnapshotWrapper' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Snapshot' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'data' => array(
                        'wrapper' => true,
                    ),
                    'properties' => array(
                        'SnapshotIdentifier' => array(
                            'type' => 'string',
                        ),
                        'ClusterIdentifier' => array(
                            'type' => 'string',
                        ),
                        'SnapshotCreateTime' => array(
                            'type' => 'string',
                        ),
                        'Status' => array(
                            'type' => 'string',
                        ),
                        'Port' => array(
                            'type' => 'numeric',
                        ),
                        'AvailabilityZone' => array(
                            'type' => 'string',
                        ),
                        'ClusterCreateTime' => array(
                            'type' => 'string',
                        ),
                        'MasterUsername' => array(
                            'type' => 'string',
                        ),
                        'ClusterVersion' => array(
                            'type' => 'string',
                        ),
                        'SnapshotType' => array(
                            'type' => 'string',
                        ),
                        'NodeType' => array(
                            'type' => 'string',
                        ),
                        'NumberOfNodes' => array(
                            'type' => 'numeric',
                        ),
                        'DBName' => array(
                            'type' => 'string',
                        ),
                        'VpcId' => array(
                            'type' => 'string',
                        ),
                        'Encrypted' => array(
                            'type' => 'boolean',
                        ),
                        'EncryptedWithHSM' => array(
                            'type' => 'boolean',
                        ),
                        'AccountsWithRestoreAccess' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'AccountWithRestoreAccess',
                                'type' => 'object',
                                'sentAs' => 'AccountWithRestoreAccess',
                                'properties' => array(
                                    'AccountId' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                        'OwnerAccount' => array(
                            'type' => 'string',
                        ),
                        'TotalBackupSizeInMegaBytes' => array(
                            'type' => 'numeric',
                        ),
                        'ActualIncrementalBackupSizeInMegaBytes' => array(
                            'type' => 'numeric',
                        ),
                        'BackupProgressInMegaBytes' => array(
                            'type' => 'numeric',
                        ),
                        'CurrentBackupRateInMegaBytesPerSecond' => array(
                            'type' => 'numeric',
                        ),
                        'EstimatedSecondsToCompletion' => array(
                            'type' => 'numeric',
                        ),
                        'ElapsedTimeInSeconds' => array(
                            'type' => 'numeric',
                        ),
                        'SourceRegion' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
        'ClusterWrapper' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Cluster' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'data' => array(
                        'wrapper' => true,
                    ),
                    'properties' => array(
                        'ClusterIdentifier' => array(
                            'type' => 'string',
                        ),
                        'NodeType' => array(
                            'type' => 'string',
                        ),
                        'ClusterStatus' => array(
                            'type' => 'string',
                        ),
                        'ModifyStatus' => array(
                            'type' => 'string',
                        ),
                        'MasterUsername' => array(
                            'type' => 'string',
                        ),
                        'DBName' => array(
                            'type' => 'string',
                        ),
                        'Endpoint' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Address' => array(
                                    'type' => 'string',
                                ),
                                'Port' => array(
                                    'type' => 'numeric',
                                ),
                            ),
                        ),
                        'ClusterCreateTime' => array(
                            'type' => 'string',
                        ),
                        'AutomatedSnapshotRetentionPeriod' => array(
                            'type' => 'numeric',
                        ),
                        'ClusterSecurityGroups' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'ClusterSecurityGroup',
                                'type' => 'object',
                                'sentAs' => 'ClusterSecurityGroup',
                                'properties' => array(
                                    'ClusterSecurityGroupName' => array(
                                        'type' => 'string',
                                    ),
                                    'Status' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                        'VpcSecurityGroups' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'VpcSecurityGroup',
                                'type' => 'object',
                                'sentAs' => 'VpcSecurityGroup',
                                'properties' => array(
                                    'VpcSecurityGroupId' => array(
                                        'type' => 'string',
                                    ),
                                    'Status' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                        'ClusterParameterGroups' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'ClusterParameterGroup',
                                'type' => 'object',
                                'sentAs' => 'ClusterParameterGroup',
                                'properties' => array(
                                    'ParameterGroupName' => array(
                                        'type' => 'string',
                                    ),
                                    'ParameterApplyStatus' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                        'ClusterSubnetGroupName' => array(
                            'type' => 'string',
                        ),
                        'VpcId' => array(
                            'type' => 'string',
                        ),
                        'AvailabilityZone' => array(
                            'type' => 'string',
                        ),
                        'PreferredMaintenanceWindow' => array(
                            'type' => 'string',
                        ),
                        'PendingModifiedValues' => array(
                            'type' => 'object',
                            'properties' => array(
                                'MasterUserPassword' => array(
                                    'type' => 'string',
                                ),
                                'NodeType' => array(
                                    'type' => 'string',
                                ),
                                'NumberOfNodes' => array(
                                    'type' => 'numeric',
                                ),
                                'ClusterType' => array(
                                    'type' => 'string',
                                ),
                                'ClusterVersion' => array(
                                    'type' => 'string',
                                ),
                                'AutomatedSnapshotRetentionPeriod' => array(
                                    'type' => 'numeric',
                                ),
                                'ClusterIdentifier' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'ClusterVersion' => array(
                            'type' => 'string',
                        ),
                        'AllowVersionUpgrade' => array(
                            'type' => 'boolean',
                        ),
                        'NumberOfNodes' => array(
                            'type' => 'numeric',
                        ),
                        'PubliclyAccessible' => array(
                            'type' => 'boolean',
                        ),
                        'Encrypted' => array(
                            'type' => 'boolean',
                        ),
                        'RestoreStatus' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Status' => array(
                                    'type' => 'string',
                                ),
                                'CurrentRestoreRateInMegaBytesPerSecond' => array(
                                    'type' => 'numeric',
                                ),
                                'SnapshotSizeInMegaBytes' => array(
                                    'type' => 'numeric',
                                ),
                                'ProgressInMegaBytes' => array(
                                    'type' => 'numeric',
                                ),
                                'ElapsedTimeInSeconds' => array(
                                    'type' => 'numeric',
                                ),
                                'EstimatedTimeToCompletionInSeconds' => array(
                                    'type' => 'numeric',
                                ),
                            ),
                        ),
                        'HsmStatus' => array(
                            'type' => 'object',
                            'properties' => array(
                                'HsmClientCertificateIdentifier' => array(
                                    'type' => 'string',
                                ),
                                'HsmConfigurationIdentifier' => array(
                                    'type' => 'string',
                                ),
                                'Status' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'ClusterSnapshotCopyStatus' => array(
                            'type' => 'object',
                            'properties' => array(
                                'DestinationRegion' => array(
                                    'type' => 'string',
                                ),
                                'RetentionPeriod' => array(
                                    'type' => 'numeric',
                                ),
                            ),
                        ),
                        'ClusterPublicKey' => array(
                            'type' => 'string',
                        ),
                        'ClusterNodes' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'ClusterNode',
                                'type' => 'object',
                                'sentAs' => 'member',
                                'properties' => array(
                                    'NodeRole' => array(
                                        'type' => 'string',
                                    ),
                                    'PrivateIPAddress' => array(
                                        'type' => 'string',
                                    ),
                                    'PublicIPAddress' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                        'ElasticIpStatus' => array(
                            'type' => 'object',
                            'properties' => array(
                                'ElasticIp' => array(
                                    'type' => 'string',
                                ),
                                'Status' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'ClusterRevisionNumber' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
        'ClusterParameterGroupWrapper' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ClusterParameterGroup' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'data' => array(
                        'wrapper' => true,
                    ),
                    'properties' => array(
                        'ParameterGroupName' => array(
                            'type' => 'string',
                        ),
                        'ParameterGroupFamily' => array(
                            'type' => 'string',
                        ),
                        'Description' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
        'ClusterSubnetGroupWrapper' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ClusterSubnetGroup' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'data' => array(
                        'wrapper' => true,
                    ),
                    'properties' => array(
                        'ClusterSubnetGroupName' => array(
                            'type' => 'string',
                        ),
                        'Description' => array(
                            'type' => 'string',
                        ),
                        'VpcId' => array(
                            'type' => 'string',
                        ),
                        'SubnetGroupStatus' => array(
                            'type' => 'string',
                        ),
                        'Subnets' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'Subnet',
                                'type' => 'object',
                                'sentAs' => 'Subnet',
                                'properties' => array(
                                    'SubnetIdentifier' => array(
                                        'type' => 'string',
                                    ),
                                    'SubnetAvailabilityZone' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'Name' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'SubnetStatus' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'EventSubscriptionWrapper' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'EventSubscription' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'data' => array(
                        'wrapper' => true,
                    ),
                    'properties' => array(
                        'CustomerAwsId' => array(
                            'type' => 'string',
                        ),
                        'CustSubscriptionId' => array(
                            'type' => 'string',
                        ),
                        'SnsTopicArn' => array(
                            'type' => 'string',
                        ),
                        'Status' => array(
                            'type' => 'string',
                        ),
                        'SubscriptionCreationTime' => array(
                            'type' => 'string',
                        ),
                        'SourceType' => array(
                            'type' => 'string',
                        ),
                        'SourceIdsList' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'SourceId',
                                'type' => 'string',
                                'sentAs' => 'SourceId',
                            ),
                        ),
                        'EventCategoriesList' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'EventCategory',
                                'type' => 'string',
                                'sentAs' => 'EventCategory',
                            ),
                        ),
                        'Severity' => array(
                            'type' => 'string',
                        ),
                        'Enabled' => array(
                            'type' => 'boolean',
                        ),
                    ),
                ),
            ),
        ),
        'HsmClientCertificateWrapper' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'HsmClientCertificate' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'data' => array(
                        'wrapper' => true,
                    ),
                    'properties' => array(
                        'HsmClientCertificateIdentifier' => array(
                            'type' => 'string',
                        ),
                        'HsmClientCertificatePublicKey' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
        'HsmConfigurationWrapper' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'HsmConfiguration' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'data' => array(
                        'wrapper' => true,
                    ),
                    'properties' => array(
                        'HsmConfigurationIdentifier' => array(
                            'type' => 'string',
                        ),
                        'Description' => array(
                            'type' => 'string',
                        ),
                        'HsmIpAddress' => array(
                            'type' => 'string',
                        ),
                        'HsmPartitionName' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
        'EmptyOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
        ),
        'ClusterParameterGroupsMessage' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'ParameterGroups' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'ClusterParameterGroup',
                        'type' => 'object',
                        'sentAs' => 'ClusterParameterGroup',
                        'properties' => array(
                            'ParameterGroupName' => array(
                                'type' => 'string',
                            ),
                            'ParameterGroupFamily' => array(
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
        'ClusterParameterGroupDetails' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Parameters' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'Parameter',
                        'type' => 'object',
                        'sentAs' => 'Parameter',
                        'properties' => array(
                            'ParameterName' => array(
                                'type' => 'string',
                            ),
                            'ParameterValue' => array(
                                'type' => 'string',
                            ),
                            'Description' => array(
                                'type' => 'string',
                            ),
                            'Source' => array(
                                'type' => 'string',
                            ),
                            'DataType' => array(
                                'type' => 'string',
                            ),
                            'AllowedValues' => array(
                                'type' => 'string',
                            ),
                            'IsModifiable' => array(
                                'type' => 'boolean',
                            ),
                            'MinimumEngineVersion' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'ClusterSecurityGroupMessage' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'ClusterSecurityGroups' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'ClusterSecurityGroup',
                        'type' => 'object',
                        'sentAs' => 'ClusterSecurityGroup',
                        'properties' => array(
                            'ClusterSecurityGroupName' => array(
                                'type' => 'string',
                            ),
                            'Description' => array(
                                'type' => 'string',
                            ),
                            'EC2SecurityGroups' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'EC2SecurityGroup',
                                    'type' => 'object',
                                    'sentAs' => 'EC2SecurityGroup',
                                    'properties' => array(
                                        'Status' => array(
                                            'type' => 'string',
                                        ),
                                        'EC2SecurityGroupName' => array(
                                            'type' => 'string',
                                        ),
                                        'EC2SecurityGroupOwnerId' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                            'IPRanges' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'IPRange',
                                    'type' => 'object',
                                    'sentAs' => 'IPRange',
                                    'properties' => array(
                                        'Status' => array(
                                            'type' => 'string',
                                        ),
                                        'CIDRIP' => array(
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
        'SnapshotMessage' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Snapshots' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'Snapshot',
                        'type' => 'object',
                        'sentAs' => 'Snapshot',
                        'properties' => array(
                            'SnapshotIdentifier' => array(
                                'type' => 'string',
                            ),
                            'ClusterIdentifier' => array(
                                'type' => 'string',
                            ),
                            'SnapshotCreateTime' => array(
                                'type' => 'string',
                            ),
                            'Status' => array(
                                'type' => 'string',
                            ),
                            'Port' => array(
                                'type' => 'numeric',
                            ),
                            'AvailabilityZone' => array(
                                'type' => 'string',
                            ),
                            'ClusterCreateTime' => array(
                                'type' => 'string',
                            ),
                            'MasterUsername' => array(
                                'type' => 'string',
                            ),
                            'ClusterVersion' => array(
                                'type' => 'string',
                            ),
                            'SnapshotType' => array(
                                'type' => 'string',
                            ),
                            'NodeType' => array(
                                'type' => 'string',
                            ),
                            'NumberOfNodes' => array(
                                'type' => 'numeric',
                            ),
                            'DBName' => array(
                                'type' => 'string',
                            ),
                            'VpcId' => array(
                                'type' => 'string',
                            ),
                            'Encrypted' => array(
                                'type' => 'boolean',
                            ),
                            'EncryptedWithHSM' => array(
                                'type' => 'boolean',
                            ),
                            'AccountsWithRestoreAccess' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'AccountWithRestoreAccess',
                                    'type' => 'object',
                                    'sentAs' => 'AccountWithRestoreAccess',
                                    'properties' => array(
                                        'AccountId' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                            'OwnerAccount' => array(
                                'type' => 'string',
                            ),
                            'TotalBackupSizeInMegaBytes' => array(
                                'type' => 'numeric',
                            ),
                            'ActualIncrementalBackupSizeInMegaBytes' => array(
                                'type' => 'numeric',
                            ),
                            'BackupProgressInMegaBytes' => array(
                                'type' => 'numeric',
                            ),
                            'CurrentBackupRateInMegaBytesPerSecond' => array(
                                'type' => 'numeric',
                            ),
                            'EstimatedSecondsToCompletion' => array(
                                'type' => 'numeric',
                            ),
                            'ElapsedTimeInSeconds' => array(
                                'type' => 'numeric',
                            ),
                            'SourceRegion' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'ClusterSubnetGroupMessage' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'ClusterSubnetGroups' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'ClusterSubnetGroup',
                        'type' => 'object',
                        'sentAs' => 'ClusterSubnetGroup',
                        'properties' => array(
                            'ClusterSubnetGroupName' => array(
                                'type' => 'string',
                            ),
                            'Description' => array(
                                'type' => 'string',
                            ),
                            'VpcId' => array(
                                'type' => 'string',
                            ),
                            'SubnetGroupStatus' => array(
                                'type' => 'string',
                            ),
                            'Subnets' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'Subnet',
                                    'type' => 'object',
                                    'sentAs' => 'Subnet',
                                    'properties' => array(
                                        'SubnetIdentifier' => array(
                                            'type' => 'string',
                                        ),
                                        'SubnetAvailabilityZone' => array(
                                            'type' => 'object',
                                            'properties' => array(
                                                'Name' => array(
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                        'SubnetStatus' => array(
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
        'ClusterVersionsMessage' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'ClusterVersions' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'ClusterVersion',
                        'type' => 'object',
                        'sentAs' => 'ClusterVersion',
                        'properties' => array(
                            'ClusterVersion' => array(
                                'type' => 'string',
                            ),
                            'ClusterParameterGroupFamily' => array(
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
        'ClustersMessage' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Clusters' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'Cluster',
                        'type' => 'object',
                        'sentAs' => 'Cluster',
                        'properties' => array(
                            'ClusterIdentifier' => array(
                                'type' => 'string',
                            ),
                            'NodeType' => array(
                                'type' => 'string',
                            ),
                            'ClusterStatus' => array(
                                'type' => 'string',
                            ),
                            'ModifyStatus' => array(
                                'type' => 'string',
                            ),
                            'MasterUsername' => array(
                                'type' => 'string',
                            ),
                            'DBName' => array(
                                'type' => 'string',
                            ),
                            'Endpoint' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'Address' => array(
                                        'type' => 'string',
                                    ),
                                    'Port' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'ClusterCreateTime' => array(
                                'type' => 'string',
                            ),
                            'AutomatedSnapshotRetentionPeriod' => array(
                                'type' => 'numeric',
                            ),
                            'ClusterSecurityGroups' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'ClusterSecurityGroup',
                                    'type' => 'object',
                                    'sentAs' => 'ClusterSecurityGroup',
                                    'properties' => array(
                                        'ClusterSecurityGroupName' => array(
                                            'type' => 'string',
                                        ),
                                        'Status' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                            'VpcSecurityGroups' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'VpcSecurityGroup',
                                    'type' => 'object',
                                    'sentAs' => 'VpcSecurityGroup',
                                    'properties' => array(
                                        'VpcSecurityGroupId' => array(
                                            'type' => 'string',
                                        ),
                                        'Status' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                            'ClusterParameterGroups' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'ClusterParameterGroup',
                                    'type' => 'object',
                                    'sentAs' => 'ClusterParameterGroup',
                                    'properties' => array(
                                        'ParameterGroupName' => array(
                                            'type' => 'string',
                                        ),
                                        'ParameterApplyStatus' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                            'ClusterSubnetGroupName' => array(
                                'type' => 'string',
                            ),
                            'VpcId' => array(
                                'type' => 'string',
                            ),
                            'AvailabilityZone' => array(
                                'type' => 'string',
                            ),
                            'PreferredMaintenanceWindow' => array(
                                'type' => 'string',
                            ),
                            'PendingModifiedValues' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'MasterUserPassword' => array(
                                        'type' => 'string',
                                    ),
                                    'NodeType' => array(
                                        'type' => 'string',
                                    ),
                                    'NumberOfNodes' => array(
                                        'type' => 'numeric',
                                    ),
                                    'ClusterType' => array(
                                        'type' => 'string',
                                    ),
                                    'ClusterVersion' => array(
                                        'type' => 'string',
                                    ),
                                    'AutomatedSnapshotRetentionPeriod' => array(
                                        'type' => 'numeric',
                                    ),
                                    'ClusterIdentifier' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'ClusterVersion' => array(
                                'type' => 'string',
                            ),
                            'AllowVersionUpgrade' => array(
                                'type' => 'boolean',
                            ),
                            'NumberOfNodes' => array(
                                'type' => 'numeric',
                            ),
                            'PubliclyAccessible' => array(
                                'type' => 'boolean',
                            ),
                            'Encrypted' => array(
                                'type' => 'boolean',
                            ),
                            'RestoreStatus' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'Status' => array(
                                        'type' => 'string',
                                    ),
                                    'CurrentRestoreRateInMegaBytesPerSecond' => array(
                                        'type' => 'numeric',
                                    ),
                                    'SnapshotSizeInMegaBytes' => array(
                                        'type' => 'numeric',
                                    ),
                                    'ProgressInMegaBytes' => array(
                                        'type' => 'numeric',
                                    ),
                                    'ElapsedTimeInSeconds' => array(
                                        'type' => 'numeric',
                                    ),
                                    'EstimatedTimeToCompletionInSeconds' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'HsmStatus' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'HsmClientCertificateIdentifier' => array(
                                        'type' => 'string',
                                    ),
                                    'HsmConfigurationIdentifier' => array(
                                        'type' => 'string',
                                    ),
                                    'Status' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'ClusterSnapshotCopyStatus' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'DestinationRegion' => array(
                                        'type' => 'string',
                                    ),
                                    'RetentionPeriod' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'ClusterPublicKey' => array(
                                'type' => 'string',
                            ),
                            'ClusterNodes' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'ClusterNode',
                                    'type' => 'object',
                                    'sentAs' => 'member',
                                    'properties' => array(
                                        'NodeRole' => array(
                                            'type' => 'string',
                                        ),
                                        'PrivateIPAddress' => array(
                                            'type' => 'string',
                                        ),
                                        'PublicIPAddress' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                            'ElasticIpStatus' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'ElasticIp' => array(
                                        'type' => 'string',
                                    ),
                                    'Status' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'ClusterRevisionNumber' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DefaultClusterParametersWrapper' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'DefaultClusterParameters' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'data' => array(
                        'wrapper' => true,
                    ),
                    'properties' => array(
                        'ParameterGroupFamily' => array(
                            'type' => 'string',
                        ),
                        'Marker' => array(
                            'type' => 'string',
                        ),
                        'Parameters' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'Parameter',
                                'type' => 'object',
                                'sentAs' => 'Parameter',
                                'properties' => array(
                                    'ParameterName' => array(
                                        'type' => 'string',
                                    ),
                                    'ParameterValue' => array(
                                        'type' => 'string',
                                    ),
                                    'Description' => array(
                                        'type' => 'string',
                                    ),
                                    'Source' => array(
                                        'type' => 'string',
                                    ),
                                    'DataType' => array(
                                        'type' => 'string',
                                    ),
                                    'AllowedValues' => array(
                                        'type' => 'string',
                                    ),
                                    'IsModifiable' => array(
                                        'type' => 'boolean',
                                    ),
                                    'MinimumEngineVersion' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'EventCategoriesMessage' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'EventCategoriesMapList' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'EventCategoriesMap',
                        'type' => 'object',
                        'sentAs' => 'EventCategoriesMap',
                        'properties' => array(
                            'SourceType' => array(
                                'type' => 'string',
                            ),
                            'Events' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'EventInfoMap',
                                    'type' => 'object',
                                    'sentAs' => 'EventInfoMap',
                                    'properties' => array(
                                        'EventId' => array(
                                            'type' => 'string',
                                        ),
                                        'EventCategories' => array(
                                            'type' => 'array',
                                            'items' => array(
                                                'name' => 'EventCategory',
                                                'type' => 'string',
                                                'sentAs' => 'EventCategory',
                                            ),
                                        ),
                                        'EventDescription' => array(
                                            'type' => 'string',
                                        ),
                                        'Severity' => array(
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
        'EventSubscriptionsMessage' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'EventSubscriptionsList' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'EventSubscription',
                        'type' => 'object',
                        'sentAs' => 'EventSubscription',
                        'properties' => array(
                            'CustomerAwsId' => array(
                                'type' => 'string',
                            ),
                            'CustSubscriptionId' => array(
                                'type' => 'string',
                            ),
                            'SnsTopicArn' => array(
                                'type' => 'string',
                            ),
                            'Status' => array(
                                'type' => 'string',
                            ),
                            'SubscriptionCreationTime' => array(
                                'type' => 'string',
                            ),
                            'SourceType' => array(
                                'type' => 'string',
                            ),
                            'SourceIdsList' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'SourceId',
                                    'type' => 'string',
                                    'sentAs' => 'SourceId',
                                ),
                            ),
                            'EventCategoriesList' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'EventCategory',
                                    'type' => 'string',
                                    'sentAs' => 'EventCategory',
                                ),
                            ),
                            'Severity' => array(
                                'type' => 'string',
                            ),
                            'Enabled' => array(
                                'type' => 'boolean',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'EventsMessage' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Events' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'Event',
                        'type' => 'object',
                        'sentAs' => 'Event',
                        'properties' => array(
                            'SourceIdentifier' => array(
                                'type' => 'string',
                            ),
                            'SourceType' => array(
                                'type' => 'string',
                            ),
                            'Message' => array(
                                'type' => 'string',
                            ),
                            'EventCategories' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'EventCategory',
                                    'type' => 'string',
                                    'sentAs' => 'EventCategory',
                                ),
                            ),
                            'Severity' => array(
                                'type' => 'string',
                            ),
                            'Date' => array(
                                'type' => 'string',
                            ),
                            'EventId' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'HsmClientCertificateMessage' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'HsmClientCertificates' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'HsmClientCertificate',
                        'type' => 'object',
                        'sentAs' => 'HsmClientCertificate',
                        'properties' => array(
                            'HsmClientCertificateIdentifier' => array(
                                'type' => 'string',
                            ),
                            'HsmClientCertificatePublicKey' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'HsmConfigurationMessage' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'HsmConfigurations' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'HsmConfiguration',
                        'type' => 'object',
                        'sentAs' => 'HsmConfiguration',
                        'properties' => array(
                            'HsmConfigurationIdentifier' => array(
                                'type' => 'string',
                            ),
                            'Description' => array(
                                'type' => 'string',
                            ),
                            'HsmIpAddress' => array(
                                'type' => 'string',
                            ),
                            'HsmPartitionName' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'LoggingStatus' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'LoggingEnabled' => array(
                    'type' => 'boolean',
                    'location' => 'xml',
                ),
                'BucketName' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'S3KeyPrefix' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'LastSuccessfulDeliveryTime' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'LastFailureTime' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'LastFailureMessage' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'OrderableClusterOptionsMessage' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'OrderableClusterOptions' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'OrderableClusterOption',
                        'type' => 'object',
                        'sentAs' => 'OrderableClusterOption',
                        'properties' => array(
                            'ClusterVersion' => array(
                                'type' => 'string',
                            ),
                            'ClusterType' => array(
                                'type' => 'string',
                            ),
                            'NodeType' => array(
                                'type' => 'string',
                            ),
                            'AvailabilityZones' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'AvailabilityZone',
                                    'type' => 'object',
                                    'sentAs' => 'AvailabilityZone',
                                    'properties' => array(
                                        'Name' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'ReservedNodeOfferingsMessage' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'ReservedNodeOfferings' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'ReservedNodeOffering',
                        'type' => 'object',
                        'sentAs' => 'ReservedNodeOffering',
                        'properties' => array(
                            'ReservedNodeOfferingId' => array(
                                'type' => 'string',
                            ),
                            'NodeType' => array(
                                'type' => 'string',
                            ),
                            'Duration' => array(
                                'type' => 'numeric',
                            ),
                            'FixedPrice' => array(
                                'type' => 'numeric',
                            ),
                            'UsagePrice' => array(
                                'type' => 'numeric',
                            ),
                            'CurrencyCode' => array(
                                'type' => 'string',
                            ),
                            'OfferingType' => array(
                                'type' => 'string',
                            ),
                            'RecurringCharges' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'RecurringCharge',
                                    'type' => 'object',
                                    'sentAs' => 'RecurringCharge',
                                    'properties' => array(
                                        'RecurringChargeAmount' => array(
                                            'type' => 'numeric',
                                        ),
                                        'RecurringChargeFrequency' => array(
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
        'ReservedNodesMessage' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'ReservedNodes' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'ReservedNode',
                        'type' => 'object',
                        'sentAs' => 'ReservedNode',
                        'properties' => array(
                            'ReservedNodeId' => array(
                                'type' => 'string',
                            ),
                            'ReservedNodeOfferingId' => array(
                                'type' => 'string',
                            ),
                            'NodeType' => array(
                                'type' => 'string',
                            ),
                            'StartTime' => array(
                                'type' => 'string',
                            ),
                            'Duration' => array(
                                'type' => 'numeric',
                            ),
                            'FixedPrice' => array(
                                'type' => 'numeric',
                            ),
                            'UsagePrice' => array(
                                'type' => 'numeric',
                            ),
                            'CurrencyCode' => array(
                                'type' => 'string',
                            ),
                            'NodeCount' => array(
                                'type' => 'numeric',
                            ),
                            'State' => array(
                                'type' => 'string',
                            ),
                            'OfferingType' => array(
                                'type' => 'string',
                            ),
                            'RecurringCharges' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'RecurringCharge',
                                    'type' => 'object',
                                    'sentAs' => 'RecurringCharge',
                                    'properties' => array(
                                        'RecurringChargeAmount' => array(
                                            'type' => 'numeric',
                                        ),
                                        'RecurringChargeFrequency' => array(
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
        'ResizeProgressMessage' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'TargetNodeType' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'TargetNumberOfNodes' => array(
                    'type' => 'numeric',
                    'location' => 'xml',
                ),
                'TargetClusterType' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Status' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'ImportTablesCompleted' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'String',
                        'type' => 'string',
                        'sentAs' => 'member',
                    ),
                ),
                'ImportTablesInProgress' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'String',
                        'type' => 'string',
                        'sentAs' => 'member',
                    ),
                ),
                'ImportTablesNotStarted' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'String',
                        'type' => 'string',
                        'sentAs' => 'member',
                    ),
                ),
                'AvgResizeRateInMegaBytesPerSecond' => array(
                    'type' => 'numeric',
                    'location' => 'xml',
                ),
                'TotalResizeDataInMegaBytes' => array(
                    'type' => 'numeric',
                    'location' => 'xml',
                ),
                'ProgressInMegaBytes' => array(
                    'type' => 'numeric',
                    'location' => 'xml',
                ),
                'ElapsedTimeInSeconds' => array(
                    'type' => 'numeric',
                    'location' => 'xml',
                ),
                'EstimatedTimeToCompletionInSeconds' => array(
                    'type' => 'numeric',
                    'location' => 'xml',
                ),
            ),
        ),
        'ClusterParameterGroupNameMessage' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ParameterGroupName' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'ParameterGroupStatus' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'ReservedNodeWrapper' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ReservedNode' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'data' => array(
                        'wrapper' => true,
                    ),
                    'properties' => array(
                        'ReservedNodeId' => array(
                            'type' => 'string',
                        ),
                        'ReservedNodeOfferingId' => array(
                            'type' => 'string',
                        ),
                        'NodeType' => array(
                            'type' => 'string',
                        ),
                        'StartTime' => array(
                            'type' => 'string',
                        ),
                        'Duration' => array(
                            'type' => 'numeric',
                        ),
                        'FixedPrice' => array(
                            'type' => 'numeric',
                        ),
                        'UsagePrice' => array(
                            'type' => 'numeric',
                        ),
                        'CurrencyCode' => array(
                            'type' => 'string',
                        ),
                        'NodeCount' => array(
                            'type' => 'numeric',
                        ),
                        'State' => array(
                            'type' => 'string',
                        ),
                        'OfferingType' => array(
                            'type' => 'string',
                        ),
                        'RecurringCharges' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'RecurringCharge',
                                'type' => 'object',
                                'sentAs' => 'RecurringCharge',
                                'properties' => array(
                                    'RecurringChargeAmount' => array(
                                        'type' => 'numeric',
                                    ),
                                    'RecurringChargeFrequency' => array(
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
    'iterators' => array(
        'DescribeClusterParameterGroups' => array(
            'input_token' => 'Marker',
            'output_token' => 'Marker',
            'limit_key' => 'MaxRecords',
            'result_key' => 'ParameterGroups',
        ),
        'DescribeClusterParameters' => array(
            'input_token' => 'Marker',
            'output_token' => 'Marker',
            'limit_key' => 'MaxRecords',
            'result_key' => 'Parameters',
        ),
        'DescribeClusterSecurityGroups' => array(
            'input_token' => 'Marker',
            'output_token' => 'Marker',
            'limit_key' => 'MaxRecords',
            'result_key' => 'ClusterSecurityGroups',
        ),
        'DescribeClusterSnapshots' => array(
            'input_token' => 'Marker',
            'output_token' => 'Marker',
            'limit_key' => 'MaxRecords',
            'result_key' => 'Snapshots',
        ),
        'DescribeClusterSubnetGroups' => array(
            'input_token' => 'Marker',
            'output_token' => 'Marker',
            'limit_key' => 'MaxRecords',
            'result_key' => 'ClusterSubnetGroups',
        ),
        'DescribeClusterVersions' => array(
            'input_token' => 'Marker',
            'output_token' => 'Marker',
            'limit_key' => 'MaxRecords',
            'result_key' => 'ClusterVersions',
        ),
        'DescribeClusters' => array(
            'input_token' => 'Marker',
            'output_token' => 'Marker',
            'limit_key' => 'MaxRecords',
            'result_key' => 'Clusters',
        ),
        'DescribeDefaultClusterParameters' => array(
            'input_token' => 'Marker',
            'output_token' => 'Marker',
            'limit_key' => 'MaxRecords',
            'result_key' => 'Parameters',
        ),
        'DescribeEventSubscriptions' => array(
            'input_token' => 'Marker',
            'output_token' => 'Marker',
            'limit_key' => 'MaxRecords',
            'result_key' => 'EventSubscriptionsList',
        ),
        'DescribeEvents' => array(
            'input_token' => 'Marker',
            'output_token' => 'Marker',
            'limit_key' => 'MaxRecords',
            'result_key' => 'Events',
        ),
        'DescribeHsmClientCertificates' => array(
            'input_token' => 'Marker',
            'output_token' => 'Marker',
            'limit_key' => 'MaxRecords',
            'result_key' => 'HsmClientCertificates',
        ),
        'DescribeHsmConfigurations' => array(
            'input_token' => 'Marker',
            'output_token' => 'Marker',
            'limit_key' => 'MaxRecords',
            'result_key' => 'HsmConfigurations',
        ),
        'DescribeOrderableClusterOptions' => array(
            'input_token' => 'Marker',
            'output_token' => 'Marker',
            'limit_key' => 'MaxRecords',
            'result_key' => 'OrderableClusterOptions',
        ),
        'DescribeReservedNodeOfferings' => array(
            'input_token' => 'Marker',
            'output_token' => 'Marker',
            'limit_key' => 'MaxRecords',
            'result_key' => 'ReservedNodeOfferings',
        ),
        'DescribeReservedNodes' => array(
            'input_token' => 'Marker',
            'output_token' => 'Marker',
            'limit_key' => 'MaxRecords',
            'result_key' => 'ReservedNodes',
        ),
    ),
    'waiters' => array(
        '__default__' => array(
            'acceptor.type' => 'output',
        ),
        '__ClusterState' => array(
            'interval' => 60,
            'max_attempts' => 30,
            'operation' => 'DescribeClusters',
            'acceptor.path' => 'Clusters/*/ClusterStatus',
        ),
        'ClusterAvailable' => array(
            'extends' => '__ClusterState',
            'success.value' => 'available',
            'failure.value' => array(
                'deleting',
            ),
            'ignore_errors' => array(
                'ClusterNotFound',
            ),
        ),
        'ClusterDeleted' => array(
            'extends' => '__ClusterState',
            'success.type' => 'error',
            'success.value' => 'ClusterNotFound',
            'failure.value' => array(
                'creating',
                'rebooting',
            ),
        ),
        'SnapshotAvailable' => array(
            'interval' => 15,
            'max_attempts' => 20,
            'operation' => 'DescribeClusterSnapshots',
            'acceptor.path' => 'Snapshots/*/Status',
            'success.value' => 'available',
            'failure.value' => array(
                'failed',
                'deleted',
            ),
        ),
    ),
);
