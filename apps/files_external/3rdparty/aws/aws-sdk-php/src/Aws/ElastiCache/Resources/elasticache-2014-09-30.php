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
    'apiVersion' => '2014-09-30',
    'endpointPrefix' => 'elasticache',
    'serviceFullName' => 'Amazon ElastiCache',
    'serviceType' => 'query',
    'resultWrapped' => true,
    'signatureVersion' => 'v4',
    'namespace' => 'ElastiCache',
    'regions' => array(
        'us-east-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'elasticache.us-east-1.amazonaws.com',
        ),
        'us-west-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'elasticache.us-west-1.amazonaws.com',
        ),
        'us-west-2' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'elasticache.us-west-2.amazonaws.com',
        ),
        'eu-west-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'elasticache.eu-west-1.amazonaws.com',
        ),
        'ap-northeast-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'elasticache.ap-northeast-1.amazonaws.com',
        ),
        'ap-southeast-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'elasticache.ap-southeast-1.amazonaws.com',
        ),
        'ap-southeast-2' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'elasticache.ap-southeast-2.amazonaws.com',
        ),
        'sa-east-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'elasticache.sa-east-1.amazonaws.com',
        ),
        'cn-north-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'elasticache.cn-north-1.amazonaws.com.cn',
        ),
    ),
    'operations' => array(
        'AuthorizeCacheSecurityGroupIngress' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CacheSecurityGroupWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'AuthorizeCacheSecurityGroupIngress',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2014-09-30',
                ),
                'CacheSecurityGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'EC2SecurityGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'EC2SecurityGroupOwnerId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The requested cache security group name does not refer to an existing cache security group.',
                    'class' => 'CacheSecurityGroupNotFoundException',
                ),
                array(
                    'reason' => 'The current state of the cache security group does not allow deletion.',
                    'class' => 'InvalidCacheSecurityGroupStateException',
                ),
                array(
                    'reason' => 'The specified Amazon EC2 security group is already authorized for the specified cache security group.',
                    'class' => 'AuthorizationAlreadyExistsException',
                ),
                array(
                    'reason' => 'The value for a parameter is invalid.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'reason' => 'Two or more incompatible parameters were specified.',
                    'class' => 'InvalidParameterCombinationException',
                ),
            ),
        ),
        'CopySnapshot' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'SnapshotWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CopySnapshot',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2014-09-30',
                ),
                'SourceSnapshotName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'TargetSnapshotName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'You already have a snapshot with the given name.',
                    'class' => 'SnapshotAlreadyExistsException',
                ),
                array(
                    'reason' => 'The requested snapshot name does not refer to an existing snapshot.',
                    'class' => 'SnapshotNotFoundException',
                ),
                array(
                    'reason' => 'The request cannot be processed because it would exceed the maximum number of snapshots.',
                    'class' => 'SnapshotQuotaExceededException',
                ),
                array(
                    'reason' => 'The current state of the snapshot does not allow the requested action to occur.',
                    'class' => 'InvalidSnapshotStateException',
                ),
                array(
                    'reason' => 'The value for a parameter is invalid.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'reason' => 'Two or more incompatible parameters were specified.',
                    'class' => 'InvalidParameterCombinationException',
                ),
            ),
        ),
        'CreateCacheCluster' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CacheClusterWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateCacheCluster',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2014-09-30',
                ),
                'CacheClusterId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'ReplicationGroupId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'AZMode' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'PreferredAvailabilityZone' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'PreferredAvailabilityZones' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'PreferredAvailabilityZones.member',
                    'items' => array(
                        'name' => 'PreferredAvailabilityZone',
                        'type' => 'string',
                    ),
                ),
                'NumCacheNodes' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'CacheNodeType' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Engine' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'EngineVersion' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'CacheParameterGroupName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'CacheSubnetGroupName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'CacheSecurityGroupNames' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'CacheSecurityGroupNames.member',
                    'items' => array(
                        'name' => 'CacheSecurityGroupName',
                        'type' => 'string',
                    ),
                ),
                'SecurityGroupIds' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'SecurityGroupIds.member',
                    'items' => array(
                        'name' => 'SecurityGroupId',
                        'type' => 'string',
                    ),
                ),
                'SnapshotArns' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'SnapshotArns.member',
                    'items' => array(
                        'name' => 'SnapshotArn',
                        'type' => 'string',
                    ),
                ),
                'SnapshotName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'PreferredMaintenanceWindow' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Port' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'NotificationTopicArn' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'AutoMinorVersionUpgrade' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'SnapshotRetentionLimit' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'SnapshotWindow' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified replication group does not exist.',
                    'class' => 'ReplicationGroupNotFoundException',
                ),
                array(
                    'reason' => 'The requested replication group is not in the available state.',
                    'class' => 'InvalidReplicationGroupStateException',
                ),
                array(
                    'reason' => 'You already have a cache cluster with the given identifier.',
                    'class' => 'CacheClusterAlreadyExistsException',
                ),
                array(
                    'reason' => 'The requested cache node type is not available in the specified Availability Zone.',
                    'class' => 'InsufficientCacheClusterCapacityException',
                ),
                array(
                    'reason' => 'The requested cache security group name does not refer to an existing cache security group.',
                    'class' => 'CacheSecurityGroupNotFoundException',
                ),
                array(
                    'reason' => 'The requested cache subnet group name does not refer to an existing cache subnet group.',
                    'class' => 'CacheSubnetGroupNotFoundException',
                ),
                array(
                    'reason' => 'The request cannot be processed because it would exceed the allowed number of cache clusters per customer.',
                    'class' => 'ClusterQuotaForCustomerExceededException',
                ),
                array(
                    'reason' => 'The request cannot be processed because it would exceed the allowed number of cache nodes in a single cache cluster.',
                    'class' => 'NodeQuotaForClusterExceededException',
                ),
                array(
                    'reason' => 'The request cannot be processed because it would exceed the allowed number of cache nodes per customer.',
                    'class' => 'NodeQuotaForCustomerExceededException',
                ),
                array(
                    'reason' => 'The requested cache parameter group name does not refer to an existing cache parameter group.',
                    'class' => 'CacheParameterGroupNotFoundException',
                ),
                array(
                    'reason' => 'The VPC network is in an invalid state.',
                    'class' => 'InvalidVPCNetworkStateException',
                ),
                array(
                    'reason' => 'The value for a parameter is invalid.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'reason' => 'Two or more incompatible parameters were specified.',
                    'class' => 'InvalidParameterCombinationException',
                ),
            ),
        ),
        'CreateCacheParameterGroup' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CacheParameterGroupWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateCacheParameterGroup',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2014-09-30',
                ),
                'CacheParameterGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'CacheParameterGroupFamily' => array(
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
                    'reason' => 'The request cannot be processed because it would exceed the maximum number of cache security groups.',
                    'class' => 'CacheParameterGroupQuotaExceededException',
                ),
                array(
                    'reason' => 'A cache parameter group with the requested name already exists.',
                    'class' => 'CacheParameterGroupAlreadyExistsException',
                ),
                array(
                    'reason' => 'The current state of the cache parameter group does not allow the requested action to occur.',
                    'class' => 'InvalidCacheParameterGroupStateException',
                ),
                array(
                    'reason' => 'The value for a parameter is invalid.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'reason' => 'Two or more incompatible parameters were specified.',
                    'class' => 'InvalidParameterCombinationException',
                ),
            ),
        ),
        'CreateCacheSecurityGroup' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CacheSecurityGroupWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateCacheSecurityGroup',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2014-09-30',
                ),
                'CacheSecurityGroupName' => array(
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
                    'reason' => 'A cache security group with the specified name already exists.',
                    'class' => 'CacheSecurityGroupAlreadyExistsException',
                ),
                array(
                    'reason' => 'The request cannot be processed because it would exceed the allowed number of cache security groups.',
                    'class' => 'CacheSecurityGroupQuotaExceededException',
                ),
                array(
                    'reason' => 'The value for a parameter is invalid.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'reason' => 'Two or more incompatible parameters were specified.',
                    'class' => 'InvalidParameterCombinationException',
                ),
            ),
        ),
        'CreateCacheSubnetGroup' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CacheSubnetGroupWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateCacheSubnetGroup',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2014-09-30',
                ),
                'CacheSubnetGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'CacheSubnetGroupDescription' => array(
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
                    'reason' => 'The requested cache subnet group name is already in use by an existing cache subnet group.',
                    'class' => 'CacheSubnetGroupAlreadyExistsException',
                ),
                array(
                    'reason' => 'The request cannot be processed because it would exceed the allowed number of cache subnet groups.',
                    'class' => 'CacheSubnetGroupQuotaExceededException',
                ),
                array(
                    'reason' => 'The request cannot be processed because it would exceed the allowed number of subnets in a cache subnet group.',
                    'class' => 'CacheSubnetQuotaExceededException',
                ),
                array(
                    'reason' => 'An invalid subnet identifier was specified.',
                    'class' => 'InvalidSubnetException',
                ),
            ),
        ),
        'CreateReplicationGroup' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ReplicationGroupWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateReplicationGroup',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2014-09-30',
                ),
                'ReplicationGroupId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'ReplicationGroupDescription' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'PrimaryClusterId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'AutomaticFailoverEnabled' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'NumCacheClusters' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'PreferredCacheClusterAZs' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'PreferredCacheClusterAZs.member',
                    'items' => array(
                        'name' => 'AvailabilityZone',
                        'type' => 'string',
                    ),
                ),
                'CacheNodeType' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Engine' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'EngineVersion' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'CacheParameterGroupName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'CacheSubnetGroupName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'CacheSecurityGroupNames' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'CacheSecurityGroupNames.member',
                    'items' => array(
                        'name' => 'CacheSecurityGroupName',
                        'type' => 'string',
                    ),
                ),
                'SecurityGroupIds' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'SecurityGroupIds.member',
                    'items' => array(
                        'name' => 'SecurityGroupId',
                        'type' => 'string',
                    ),
                ),
                'SnapshotArns' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'SnapshotArns.member',
                    'items' => array(
                        'name' => 'SnapshotArn',
                        'type' => 'string',
                    ),
                ),
                'SnapshotName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'PreferredMaintenanceWindow' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Port' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'NotificationTopicArn' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'AutoMinorVersionUpgrade' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'SnapshotRetentionLimit' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'SnapshotWindow' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The requested cache cluster ID does not refer to an existing cache cluster.',
                    'class' => 'CacheClusterNotFoundException',
                ),
                array(
                    'reason' => 'The requested cache cluster is not in the available state.',
                    'class' => 'InvalidCacheClusterStateException',
                ),
                array(
                    'reason' => 'The specified replication group already exists.',
                    'class' => 'ReplicationGroupAlreadyExistsException',
                ),
                array(
                    'reason' => 'The requested cache node type is not available in the specified Availability Zone.',
                    'class' => 'InsufficientCacheClusterCapacityException',
                ),
                array(
                    'reason' => 'The requested cache security group name does not refer to an existing cache security group.',
                    'class' => 'CacheSecurityGroupNotFoundException',
                ),
                array(
                    'reason' => 'The requested cache subnet group name does not refer to an existing cache subnet group.',
                    'class' => 'CacheSubnetGroupNotFoundException',
                ),
                array(
                    'reason' => 'The request cannot be processed because it would exceed the allowed number of cache clusters per customer.',
                    'class' => 'ClusterQuotaForCustomerExceededException',
                ),
                array(
                    'reason' => 'The request cannot be processed because it would exceed the allowed number of cache nodes in a single cache cluster.',
                    'class' => 'NodeQuotaForClusterExceededException',
                ),
                array(
                    'reason' => 'The request cannot be processed because it would exceed the allowed number of cache nodes per customer.',
                    'class' => 'NodeQuotaForCustomerExceededException',
                ),
                array(
                    'reason' => 'The requested cache parameter group name does not refer to an existing cache parameter group.',
                    'class' => 'CacheParameterGroupNotFoundException',
                ),
                array(
                    'reason' => 'The VPC network is in an invalid state.',
                    'class' => 'InvalidVPCNetworkStateException',
                ),
                array(
                    'reason' => 'The value for a parameter is invalid.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'reason' => 'Two or more incompatible parameters were specified.',
                    'class' => 'InvalidParameterCombinationException',
                ),
            ),
        ),
        'CreateSnapshot' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'SnapshotWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateSnapshot',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2014-09-30',
                ),
                'CacheClusterId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'SnapshotName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'You already have a snapshot with the given name.',
                    'class' => 'SnapshotAlreadyExistsException',
                ),
                array(
                    'reason' => 'The requested cache cluster ID does not refer to an existing cache cluster.',
                    'class' => 'CacheClusterNotFoundException',
                ),
                array(
                    'reason' => 'The requested cache cluster is not in the available state.',
                    'class' => 'InvalidCacheClusterStateException',
                ),
                array(
                    'reason' => 'The request cannot be processed because it would exceed the maximum number of snapshots.',
                    'class' => 'SnapshotQuotaExceededException',
                ),
                array(
                    'reason' => 'You attempted one of the following actions:     Creating a snapshot of a Redis cache cluster running on a t1.micro cache node.     Creating a snapshot of a cache cluster that is running Memcached rather than Redis.     Neither of these are supported by ElastiCache.',
                    'class' => 'SnapshotFeatureNotSupportedException',
                ),
                array(
                    'reason' => 'Two or more incompatible parameters were specified.',
                    'class' => 'InvalidParameterCombinationException',
                ),
                array(
                    'reason' => 'The value for a parameter is invalid.',
                    'class' => 'InvalidParameterValueException',
                ),
            ),
        ),
        'DeleteCacheCluster' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CacheClusterWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteCacheCluster',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2014-09-30',
                ),
                'CacheClusterId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'FinalSnapshotIdentifier' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The requested cache cluster ID does not refer to an existing cache cluster.',
                    'class' => 'CacheClusterNotFoundException',
                ),
                array(
                    'reason' => 'The requested cache cluster is not in the available state.',
                    'class' => 'InvalidCacheClusterStateException',
                ),
                array(
                    'reason' => 'You already have a snapshot with the given name.',
                    'class' => 'SnapshotAlreadyExistsException',
                ),
                array(
                    'reason' => 'You attempted one of the following actions:     Creating a snapshot of a Redis cache cluster running on a t1.micro cache node.     Creating a snapshot of a cache cluster that is running Memcached rather than Redis.     Neither of these are supported by ElastiCache.',
                    'class' => 'SnapshotFeatureNotSupportedException',
                ),
                array(
                    'reason' => 'The request cannot be processed because it would exceed the maximum number of snapshots.',
                    'class' => 'SnapshotQuotaExceededException',
                ),
                array(
                    'reason' => 'The value for a parameter is invalid.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'reason' => 'Two or more incompatible parameters were specified.',
                    'class' => 'InvalidParameterCombinationException',
                ),
            ),
        ),
        'DeleteCacheParameterGroup' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteCacheParameterGroup',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2014-09-30',
                ),
                'CacheParameterGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The current state of the cache parameter group does not allow the requested action to occur.',
                    'class' => 'InvalidCacheParameterGroupStateException',
                ),
                array(
                    'reason' => 'The requested cache parameter group name does not refer to an existing cache parameter group.',
                    'class' => 'CacheParameterGroupNotFoundException',
                ),
                array(
                    'reason' => 'The value for a parameter is invalid.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'reason' => 'Two or more incompatible parameters were specified.',
                    'class' => 'InvalidParameterCombinationException',
                ),
            ),
        ),
        'DeleteCacheSecurityGroup' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteCacheSecurityGroup',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2014-09-30',
                ),
                'CacheSecurityGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The current state of the cache security group does not allow deletion.',
                    'class' => 'InvalidCacheSecurityGroupStateException',
                ),
                array(
                    'reason' => 'The requested cache security group name does not refer to an existing cache security group.',
                    'class' => 'CacheSecurityGroupNotFoundException',
                ),
                array(
                    'reason' => 'The value for a parameter is invalid.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'reason' => 'Two or more incompatible parameters were specified.',
                    'class' => 'InvalidParameterCombinationException',
                ),
            ),
        ),
        'DeleteCacheSubnetGroup' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteCacheSubnetGroup',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2014-09-30',
                ),
                'CacheSubnetGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The requested cache subnet group is currently in use.',
                    'class' => 'CacheSubnetGroupInUseException',
                ),
                array(
                    'reason' => 'The requested cache subnet group name does not refer to an existing cache subnet group.',
                    'class' => 'CacheSubnetGroupNotFoundException',
                ),
            ),
        ),
        'DeleteReplicationGroup' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ReplicationGroupWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteReplicationGroup',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2014-09-30',
                ),
                'ReplicationGroupId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'RetainPrimaryCluster' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'FinalSnapshotIdentifier' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified replication group does not exist.',
                    'class' => 'ReplicationGroupNotFoundException',
                ),
                array(
                    'reason' => 'The requested replication group is not in the available state.',
                    'class' => 'InvalidReplicationGroupStateException',
                ),
                array(
                    'reason' => 'You already have a snapshot with the given name.',
                    'class' => 'SnapshotAlreadyExistsException',
                ),
                array(
                    'reason' => 'You attempted one of the following actions:     Creating a snapshot of a Redis cache cluster running on a t1.micro cache node.     Creating a snapshot of a cache cluster that is running Memcached rather than Redis.     Neither of these are supported by ElastiCache.',
                    'class' => 'SnapshotFeatureNotSupportedException',
                ),
                array(
                    'reason' => 'The request cannot be processed because it would exceed the maximum number of snapshots.',
                    'class' => 'SnapshotQuotaExceededException',
                ),
                array(
                    'reason' => 'The value for a parameter is invalid.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'reason' => 'Two or more incompatible parameters were specified.',
                    'class' => 'InvalidParameterCombinationException',
                ),
            ),
        ),
        'DeleteSnapshot' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'SnapshotWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteSnapshot',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2014-09-30',
                ),
                'SnapshotName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The requested snapshot name does not refer to an existing snapshot.',
                    'class' => 'SnapshotNotFoundException',
                ),
                array(
                    'reason' => 'The current state of the snapshot does not allow the requested action to occur.',
                    'class' => 'InvalidSnapshotStateException',
                ),
                array(
                    'reason' => 'The value for a parameter is invalid.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'reason' => 'Two or more incompatible parameters were specified.',
                    'class' => 'InvalidParameterCombinationException',
                ),
            ),
        ),
        'DescribeCacheClusters' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CacheClusterMessage',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeCacheClusters',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2014-09-30',
                ),
                'CacheClusterId' => array(
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
                'ShowCacheNodeInfo' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The requested cache cluster ID does not refer to an existing cache cluster.',
                    'class' => 'CacheClusterNotFoundException',
                ),
                array(
                    'reason' => 'The value for a parameter is invalid.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'reason' => 'Two or more incompatible parameters were specified.',
                    'class' => 'InvalidParameterCombinationException',
                ),
            ),
        ),
        'DescribeCacheEngineVersions' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CacheEngineVersionMessage',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeCacheEngineVersions',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2014-09-30',
                ),
                'Engine' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'EngineVersion' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'CacheParameterGroupFamily' => array(
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
                'DefaultOnly' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DescribeCacheParameterGroups' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CacheParameterGroupsMessage',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeCacheParameterGroups',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2014-09-30',
                ),
                'CacheParameterGroupName' => array(
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
                    'reason' => 'The requested cache parameter group name does not refer to an existing cache parameter group.',
                    'class' => 'CacheParameterGroupNotFoundException',
                ),
                array(
                    'reason' => 'The value for a parameter is invalid.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'reason' => 'Two or more incompatible parameters were specified.',
                    'class' => 'InvalidParameterCombinationException',
                ),
            ),
        ),
        'DescribeCacheParameters' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CacheParameterGroupDetails',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeCacheParameters',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2014-09-30',
                ),
                'CacheParameterGroupName' => array(
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
                    'reason' => 'The requested cache parameter group name does not refer to an existing cache parameter group.',
                    'class' => 'CacheParameterGroupNotFoundException',
                ),
                array(
                    'reason' => 'The value for a parameter is invalid.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'reason' => 'Two or more incompatible parameters were specified.',
                    'class' => 'InvalidParameterCombinationException',
                ),
            ),
        ),
        'DescribeCacheSecurityGroups' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CacheSecurityGroupMessage',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeCacheSecurityGroups',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2014-09-30',
                ),
                'CacheSecurityGroupName' => array(
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
                    'reason' => 'The requested cache security group name does not refer to an existing cache security group.',
                    'class' => 'CacheSecurityGroupNotFoundException',
                ),
                array(
                    'reason' => 'The value for a parameter is invalid.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'reason' => 'Two or more incompatible parameters were specified.',
                    'class' => 'InvalidParameterCombinationException',
                ),
            ),
        ),
        'DescribeCacheSubnetGroups' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CacheSubnetGroupMessage',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeCacheSubnetGroups',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2014-09-30',
                ),
                'CacheSubnetGroupName' => array(
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
                    'reason' => 'The requested cache subnet group name does not refer to an existing cache subnet group.',
                    'class' => 'CacheSubnetGroupNotFoundException',
                ),
            ),
        ),
        'DescribeEngineDefaultParameters' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EngineDefaultsWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeEngineDefaultParameters',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2014-09-30',
                ),
                'CacheParameterGroupFamily' => array(
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
            'errorResponses' => array(
                array(
                    'reason' => 'The value for a parameter is invalid.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'reason' => 'Two or more incompatible parameters were specified.',
                    'class' => 'InvalidParameterCombinationException',
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
                    'default' => '2014-09-30',
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
            'errorResponses' => array(
                array(
                    'reason' => 'The value for a parameter is invalid.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'reason' => 'Two or more incompatible parameters were specified.',
                    'class' => 'InvalidParameterCombinationException',
                ),
            ),
        ),
        'DescribeReplicationGroups' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ReplicationGroupMessage',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeReplicationGroups',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2014-09-30',
                ),
                'ReplicationGroupId' => array(
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
                    'reason' => 'The specified replication group does not exist.',
                    'class' => 'ReplicationGroupNotFoundException',
                ),
                array(
                    'reason' => 'The value for a parameter is invalid.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'reason' => 'Two or more incompatible parameters were specified.',
                    'class' => 'InvalidParameterCombinationException',
                ),
            ),
        ),
        'DescribeReservedCacheNodes' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ReservedCacheNodeMessage',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeReservedCacheNodes',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2014-09-30',
                ),
                'ReservedCacheNodeId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'ReservedCacheNodesOfferingId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'CacheNodeType' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Duration' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'ProductDescription' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'OfferingType' => array(
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
                    'reason' => 'The requested reserved cache node was not found.',
                    'class' => 'ReservedCacheNodeNotFoundException',
                ),
                array(
                    'reason' => 'The value for a parameter is invalid.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'reason' => 'Two or more incompatible parameters were specified.',
                    'class' => 'InvalidParameterCombinationException',
                ),
            ),
        ),
        'DescribeReservedCacheNodesOfferings' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ReservedCacheNodesOfferingMessage',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeReservedCacheNodesOfferings',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2014-09-30',
                ),
                'ReservedCacheNodesOfferingId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'CacheNodeType' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Duration' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'ProductDescription' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'OfferingType' => array(
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
                    'reason' => 'The requested cache node offering does not exist.',
                    'class' => 'ReservedCacheNodesOfferingNotFoundException',
                ),
                array(
                    'reason' => 'The value for a parameter is invalid.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'reason' => 'Two or more incompatible parameters were specified.',
                    'class' => 'InvalidParameterCombinationException',
                ),
            ),
        ),
        'DescribeSnapshots' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeSnapshotsListMessage',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeSnapshots',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2014-09-30',
                ),
                'CacheClusterId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'SnapshotName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'SnapshotSource' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'MaxRecords' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The requested cache cluster ID does not refer to an existing cache cluster.',
                    'class' => 'CacheClusterNotFoundException',
                ),
                array(
                    'reason' => 'The requested snapshot name does not refer to an existing snapshot.',
                    'class' => 'SnapshotNotFoundException',
                ),
                array(
                    'reason' => 'The value for a parameter is invalid.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'reason' => 'Two or more incompatible parameters were specified.',
                    'class' => 'InvalidParameterCombinationException',
                ),
            ),
        ),
        'ModifyCacheCluster' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CacheClusterWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ModifyCacheCluster',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2014-09-30',
                ),
                'CacheClusterId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'NumCacheNodes' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'CacheNodeIdsToRemove' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'CacheNodeIdsToRemove.member',
                    'items' => array(
                        'name' => 'CacheNodeId',
                        'type' => 'string',
                    ),
                ),
                'AZMode' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'NewAvailabilityZones' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'NewAvailabilityZones.member',
                    'items' => array(
                        'name' => 'PreferredAvailabilityZone',
                        'type' => 'string',
                    ),
                ),
                'CacheSecurityGroupNames' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'CacheSecurityGroupNames.member',
                    'items' => array(
                        'name' => 'CacheSecurityGroupName',
                        'type' => 'string',
                    ),
                ),
                'SecurityGroupIds' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'SecurityGroupIds.member',
                    'items' => array(
                        'name' => 'SecurityGroupId',
                        'type' => 'string',
                    ),
                ),
                'PreferredMaintenanceWindow' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'NotificationTopicArn' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'CacheParameterGroupName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'NotificationTopicStatus' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'ApplyImmediately' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'EngineVersion' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'AutoMinorVersionUpgrade' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'SnapshotRetentionLimit' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'SnapshotWindow' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The requested cache cluster is not in the available state.',
                    'class' => 'InvalidCacheClusterStateException',
                ),
                array(
                    'reason' => 'The current state of the cache security group does not allow deletion.',
                    'class' => 'InvalidCacheSecurityGroupStateException',
                ),
                array(
                    'reason' => 'The requested cache node type is not available in the specified Availability Zone.',
                    'class' => 'InsufficientCacheClusterCapacityException',
                ),
                array(
                    'reason' => 'The requested cache cluster ID does not refer to an existing cache cluster.',
                    'class' => 'CacheClusterNotFoundException',
                ),
                array(
                    'reason' => 'The request cannot be processed because it would exceed the allowed number of cache nodes in a single cache cluster.',
                    'class' => 'NodeQuotaForClusterExceededException',
                ),
                array(
                    'reason' => 'The request cannot be processed because it would exceed the allowed number of cache nodes per customer.',
                    'class' => 'NodeQuotaForCustomerExceededException',
                ),
                array(
                    'reason' => 'The requested cache security group name does not refer to an existing cache security group.',
                    'class' => 'CacheSecurityGroupNotFoundException',
                ),
                array(
                    'reason' => 'The requested cache parameter group name does not refer to an existing cache parameter group.',
                    'class' => 'CacheParameterGroupNotFoundException',
                ),
                array(
                    'reason' => 'The VPC network is in an invalid state.',
                    'class' => 'InvalidVPCNetworkStateException',
                ),
                array(
                    'reason' => 'The value for a parameter is invalid.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'reason' => 'Two or more incompatible parameters were specified.',
                    'class' => 'InvalidParameterCombinationException',
                ),
            ),
        ),
        'ModifyCacheParameterGroup' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CacheParameterGroupNameMessage',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ModifyCacheParameterGroup',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2014-09-30',
                ),
                'CacheParameterGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'ParameterNameValues' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'ParameterNameValues.member',
                    'items' => array(
                        'name' => 'ParameterNameValue',
                        'type' => 'object',
                        'properties' => array(
                            'ParameterName' => array(
                                'type' => 'string',
                            ),
                            'ParameterValue' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The requested cache parameter group name does not refer to an existing cache parameter group.',
                    'class' => 'CacheParameterGroupNotFoundException',
                ),
                array(
                    'reason' => 'The current state of the cache parameter group does not allow the requested action to occur.',
                    'class' => 'InvalidCacheParameterGroupStateException',
                ),
                array(
                    'reason' => 'The value for a parameter is invalid.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'reason' => 'Two or more incompatible parameters were specified.',
                    'class' => 'InvalidParameterCombinationException',
                ),
            ),
        ),
        'ModifyCacheSubnetGroup' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CacheSubnetGroupWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ModifyCacheSubnetGroup',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2014-09-30',
                ),
                'CacheSubnetGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'CacheSubnetGroupDescription' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'SubnetIds' => array(
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
                    'reason' => 'The requested cache subnet group name does not refer to an existing cache subnet group.',
                    'class' => 'CacheSubnetGroupNotFoundException',
                ),
                array(
                    'reason' => 'The request cannot be processed because it would exceed the allowed number of subnets in a cache subnet group.',
                    'class' => 'CacheSubnetQuotaExceededException',
                ),
                array(
                    'reason' => 'The requested subnet is being used by another cache subnet group.',
                    'class' => 'SubnetInUseException',
                ),
                array(
                    'reason' => 'An invalid subnet identifier was specified.',
                    'class' => 'InvalidSubnetException',
                ),
            ),
        ),
        'ModifyReplicationGroup' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ReplicationGroupWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ModifyReplicationGroup',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2014-09-30',
                ),
                'ReplicationGroupId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'ReplicationGroupDescription' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'PrimaryClusterId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'SnapshottingClusterId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'AutomaticFailoverEnabled' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'CacheSecurityGroupNames' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'CacheSecurityGroupNames.member',
                    'items' => array(
                        'name' => 'CacheSecurityGroupName',
                        'type' => 'string',
                    ),
                ),
                'SecurityGroupIds' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'SecurityGroupIds.member',
                    'items' => array(
                        'name' => 'SecurityGroupId',
                        'type' => 'string',
                    ),
                ),
                'PreferredMaintenanceWindow' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'NotificationTopicArn' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'CacheParameterGroupName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'NotificationTopicStatus' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'ApplyImmediately' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'EngineVersion' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'AutoMinorVersionUpgrade' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'SnapshotRetentionLimit' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'SnapshotWindow' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified replication group does not exist.',
                    'class' => 'ReplicationGroupNotFoundException',
                ),
                array(
                    'reason' => 'The requested replication group is not in the available state.',
                    'class' => 'InvalidReplicationGroupStateException',
                ),
                array(
                    'reason' => 'The requested cache cluster is not in the available state.',
                    'class' => 'InvalidCacheClusterStateException',
                ),
                array(
                    'reason' => 'The current state of the cache security group does not allow deletion.',
                    'class' => 'InvalidCacheSecurityGroupStateException',
                ),
                array(
                    'reason' => 'The requested cache node type is not available in the specified Availability Zone.',
                    'class' => 'InsufficientCacheClusterCapacityException',
                ),
                array(
                    'reason' => 'The requested cache cluster ID does not refer to an existing cache cluster.',
                    'class' => 'CacheClusterNotFoundException',
                ),
                array(
                    'reason' => 'The request cannot be processed because it would exceed the allowed number of cache nodes in a single cache cluster.',
                    'class' => 'NodeQuotaForClusterExceededException',
                ),
                array(
                    'reason' => 'The request cannot be processed because it would exceed the allowed number of cache nodes per customer.',
                    'class' => 'NodeQuotaForCustomerExceededException',
                ),
                array(
                    'reason' => 'The requested cache security group name does not refer to an existing cache security group.',
                    'class' => 'CacheSecurityGroupNotFoundException',
                ),
                array(
                    'reason' => 'The requested cache parameter group name does not refer to an existing cache parameter group.',
                    'class' => 'CacheParameterGroupNotFoundException',
                ),
                array(
                    'reason' => 'The VPC network is in an invalid state.',
                    'class' => 'InvalidVPCNetworkStateException',
                ),
                array(
                    'reason' => 'The value for a parameter is invalid.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'reason' => 'Two or more incompatible parameters were specified.',
                    'class' => 'InvalidParameterCombinationException',
                ),
            ),
        ),
        'PurchaseReservedCacheNodesOffering' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ReservedCacheNodeWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'PurchaseReservedCacheNodesOffering',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2014-09-30',
                ),
                'ReservedCacheNodesOfferingId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'ReservedCacheNodeId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'CacheNodeCount' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The requested cache node offering does not exist.',
                    'class' => 'ReservedCacheNodesOfferingNotFoundException',
                ),
                array(
                    'reason' => 'You already have a reservation with the given identifier.',
                    'class' => 'ReservedCacheNodeAlreadyExistsException',
                ),
                array(
                    'reason' => 'The request cannot be processed because it would exceed the user\'s cache node quota.',
                    'class' => 'ReservedCacheNodeQuotaExceededException',
                ),
                array(
                    'reason' => 'The value for a parameter is invalid.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'reason' => 'Two or more incompatible parameters were specified.',
                    'class' => 'InvalidParameterCombinationException',
                ),
            ),
        ),
        'RebootCacheCluster' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CacheClusterWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'RebootCacheCluster',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2014-09-30',
                ),
                'CacheClusterId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'CacheNodeIdsToReboot' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'CacheNodeIdsToReboot.member',
                    'items' => array(
                        'name' => 'CacheNodeId',
                        'type' => 'string',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The requested cache cluster is not in the available state.',
                    'class' => 'InvalidCacheClusterStateException',
                ),
                array(
                    'reason' => 'The requested cache cluster ID does not refer to an existing cache cluster.',
                    'class' => 'CacheClusterNotFoundException',
                ),
            ),
        ),
        'ResetCacheParameterGroup' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CacheParameterGroupNameMessage',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ResetCacheParameterGroup',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2014-09-30',
                ),
                'CacheParameterGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'ResetAllParameters' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'ParameterNameValues' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'ParameterNameValues.member',
                    'items' => array(
                        'name' => 'ParameterNameValue',
                        'type' => 'object',
                        'properties' => array(
                            'ParameterName' => array(
                                'type' => 'string',
                            ),
                            'ParameterValue' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The current state of the cache parameter group does not allow the requested action to occur.',
                    'class' => 'InvalidCacheParameterGroupStateException',
                ),
                array(
                    'reason' => 'The requested cache parameter group name does not refer to an existing cache parameter group.',
                    'class' => 'CacheParameterGroupNotFoundException',
                ),
                array(
                    'reason' => 'The value for a parameter is invalid.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'reason' => 'Two or more incompatible parameters were specified.',
                    'class' => 'InvalidParameterCombinationException',
                ),
            ),
        ),
        'RevokeCacheSecurityGroupIngress' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CacheSecurityGroupWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'RevokeCacheSecurityGroupIngress',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2014-09-30',
                ),
                'CacheSecurityGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'EC2SecurityGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'EC2SecurityGroupOwnerId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The requested cache security group name does not refer to an existing cache security group.',
                    'class' => 'CacheSecurityGroupNotFoundException',
                ),
                array(
                    'reason' => 'The specified Amazon EC2 security group is not authorized for the specified cache security group.',
                    'class' => 'AuthorizationNotFoundException',
                ),
                array(
                    'reason' => 'The current state of the cache security group does not allow deletion.',
                    'class' => 'InvalidCacheSecurityGroupStateException',
                ),
                array(
                    'reason' => 'The value for a parameter is invalid.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'reason' => 'Two or more incompatible parameters were specified.',
                    'class' => 'InvalidParameterCombinationException',
                ),
            ),
        ),
    ),
    'models' => array(
        'CacheSecurityGroupWrapper' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'CacheSecurityGroup' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'data' => array(
                        'wrapper' => true,
                    ),
                    'properties' => array(
                        'OwnerId' => array(
                            'type' => 'string',
                        ),
                        'CacheSecurityGroupName' => array(
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
                        'SnapshotName' => array(
                            'type' => 'string',
                        ),
                        'CacheClusterId' => array(
                            'type' => 'string',
                        ),
                        'SnapshotStatus' => array(
                            'type' => 'string',
                        ),
                        'SnapshotSource' => array(
                            'type' => 'string',
                        ),
                        'CacheNodeType' => array(
                            'type' => 'string',
                        ),
                        'Engine' => array(
                            'type' => 'string',
                        ),
                        'EngineVersion' => array(
                            'type' => 'string',
                        ),
                        'NumCacheNodes' => array(
                            'type' => 'numeric',
                        ),
                        'PreferredAvailabilityZone' => array(
                            'type' => 'string',
                        ),
                        'CacheClusterCreateTime' => array(
                            'type' => 'string',
                        ),
                        'PreferredMaintenanceWindow' => array(
                            'type' => 'string',
                        ),
                        'TopicArn' => array(
                            'type' => 'string',
                        ),
                        'Port' => array(
                            'type' => 'numeric',
                        ),
                        'CacheParameterGroupName' => array(
                            'type' => 'string',
                        ),
                        'CacheSubnetGroupName' => array(
                            'type' => 'string',
                        ),
                        'VpcId' => array(
                            'type' => 'string',
                        ),
                        'AutoMinorVersionUpgrade' => array(
                            'type' => 'boolean',
                        ),
                        'SnapshotRetentionLimit' => array(
                            'type' => 'numeric',
                        ),
                        'SnapshotWindow' => array(
                            'type' => 'string',
                        ),
                        'NodeSnapshots' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'NodeSnapshot',
                                'type' => 'object',
                                'sentAs' => 'NodeSnapshot',
                                'properties' => array(
                                    'CacheNodeId' => array(
                                        'type' => 'string',
                                    ),
                                    'CacheSize' => array(
                                        'type' => 'string',
                                    ),
                                    'CacheNodeCreateTime' => array(
                                        'type' => 'string',
                                    ),
                                    'SnapshotCreateTime' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'CacheClusterWrapper' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'CacheCluster' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'data' => array(
                        'wrapper' => true,
                    ),
                    'properties' => array(
                        'CacheClusterId' => array(
                            'type' => 'string',
                        ),
                        'ConfigurationEndpoint' => array(
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
                        'ClientDownloadLandingPage' => array(
                            'type' => 'string',
                        ),
                        'CacheNodeType' => array(
                            'type' => 'string',
                        ),
                        'Engine' => array(
                            'type' => 'string',
                        ),
                        'EngineVersion' => array(
                            'type' => 'string',
                        ),
                        'CacheClusterStatus' => array(
                            'type' => 'string',
                        ),
                        'NumCacheNodes' => array(
                            'type' => 'numeric',
                        ),
                        'PreferredAvailabilityZone' => array(
                            'type' => 'string',
                        ),
                        'CacheClusterCreateTime' => array(
                            'type' => 'string',
                        ),
                        'PreferredMaintenanceWindow' => array(
                            'type' => 'string',
                        ),
                        'PendingModifiedValues' => array(
                            'type' => 'object',
                            'properties' => array(
                                'NumCacheNodes' => array(
                                    'type' => 'numeric',
                                ),
                                'CacheNodeIdsToRemove' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'CacheNodeId',
                                        'type' => 'string',
                                        'sentAs' => 'CacheNodeId',
                                    ),
                                ),
                                'EngineVersion' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'NotificationConfiguration' => array(
                            'type' => 'object',
                            'properties' => array(
                                'TopicArn' => array(
                                    'type' => 'string',
                                ),
                                'TopicStatus' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'CacheSecurityGroups' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'CacheSecurityGroup',
                                'type' => 'object',
                                'sentAs' => 'CacheSecurityGroup',
                                'properties' => array(
                                    'CacheSecurityGroupName' => array(
                                        'type' => 'string',
                                    ),
                                    'Status' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                        'CacheParameterGroup' => array(
                            'type' => 'object',
                            'properties' => array(
                                'CacheParameterGroupName' => array(
                                    'type' => 'string',
                                ),
                                'ParameterApplyStatus' => array(
                                    'type' => 'string',
                                ),
                                'CacheNodeIdsToReboot' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'CacheNodeId',
                                        'type' => 'string',
                                        'sentAs' => 'CacheNodeId',
                                    ),
                                ),
                            ),
                        ),
                        'CacheSubnetGroupName' => array(
                            'type' => 'string',
                        ),
                        'CacheNodes' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'CacheNode',
                                'type' => 'object',
                                'sentAs' => 'CacheNode',
                                'properties' => array(
                                    'CacheNodeId' => array(
                                        'type' => 'string',
                                    ),
                                    'CacheNodeStatus' => array(
                                        'type' => 'string',
                                    ),
                                    'CacheNodeCreateTime' => array(
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
                                    'ParameterGroupStatus' => array(
                                        'type' => 'string',
                                    ),
                                    'SourceCacheNodeId' => array(
                                        'type' => 'string',
                                    ),
                                    'CustomerAvailabilityZone' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                        'AutoMinorVersionUpgrade' => array(
                            'type' => 'boolean',
                        ),
                        'SecurityGroups' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'SecurityGroupMembership',
                                'type' => 'object',
                                'sentAs' => 'member',
                                'properties' => array(
                                    'SecurityGroupId' => array(
                                        'type' => 'string',
                                    ),
                                    'Status' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                        'ReplicationGroupId' => array(
                            'type' => 'string',
                        ),
                        'SnapshotRetentionLimit' => array(
                            'type' => 'numeric',
                        ),
                        'SnapshotWindow' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
        'CacheParameterGroupWrapper' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'CacheParameterGroup' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'data' => array(
                        'wrapper' => true,
                    ),
                    'properties' => array(
                        'CacheParameterGroupName' => array(
                            'type' => 'string',
                        ),
                        'CacheParameterGroupFamily' => array(
                            'type' => 'string',
                        ),
                        'Description' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
        'CacheSubnetGroupWrapper' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'CacheSubnetGroup' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'data' => array(
                        'wrapper' => true,
                    ),
                    'properties' => array(
                        'CacheSubnetGroupName' => array(
                            'type' => 'string',
                        ),
                        'CacheSubnetGroupDescription' => array(
                            'type' => 'string',
                        ),
                        'VpcId' => array(
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
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'ReplicationGroupWrapper' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ReplicationGroup' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'data' => array(
                        'wrapper' => true,
                    ),
                    'properties' => array(
                        'ReplicationGroupId' => array(
                            'type' => 'string',
                        ),
                        'Description' => array(
                            'type' => 'string',
                        ),
                        'Status' => array(
                            'type' => 'string',
                        ),
                        'PendingModifiedValues' => array(
                            'type' => 'object',
                            'properties' => array(
                                'PrimaryClusterId' => array(
                                    'type' => 'string',
                                ),
                                'AutomaticFailoverStatus' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'MemberClusters' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'ClusterId',
                                'type' => 'string',
                                'sentAs' => 'ClusterId',
                            ),
                        ),
                        'NodeGroups' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'NodeGroup',
                                'type' => 'object',
                                'sentAs' => 'NodeGroup',
                                'properties' => array(
                                    'NodeGroupId' => array(
                                        'type' => 'string',
                                    ),
                                    'Status' => array(
                                        'type' => 'string',
                                    ),
                                    'PrimaryEndpoint' => array(
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
                                    'NodeGroupMembers' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'NodeGroupMember',
                                            'type' => 'object',
                                            'sentAs' => 'NodeGroupMember',
                                            'properties' => array(
                                                'CacheClusterId' => array(
                                                    'type' => 'string',
                                                ),
                                                'CacheNodeId' => array(
                                                    'type' => 'string',
                                                ),
                                                'ReadEndpoint' => array(
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
                                                'PreferredAvailabilityZone' => array(
                                                    'type' => 'string',
                                                ),
                                                'CurrentRole' => array(
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'SnapshottingClusterId' => array(
                            'type' => 'string',
                        ),
                        'AutomaticFailover' => array(
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
        'CacheClusterMessage' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'CacheClusters' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'CacheCluster',
                        'type' => 'object',
                        'sentAs' => 'CacheCluster',
                        'properties' => array(
                            'CacheClusterId' => array(
                                'type' => 'string',
                            ),
                            'ConfigurationEndpoint' => array(
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
                            'ClientDownloadLandingPage' => array(
                                'type' => 'string',
                            ),
                            'CacheNodeType' => array(
                                'type' => 'string',
                            ),
                            'Engine' => array(
                                'type' => 'string',
                            ),
                            'EngineVersion' => array(
                                'type' => 'string',
                            ),
                            'CacheClusterStatus' => array(
                                'type' => 'string',
                            ),
                            'NumCacheNodes' => array(
                                'type' => 'numeric',
                            ),
                            'PreferredAvailabilityZone' => array(
                                'type' => 'string',
                            ),
                            'CacheClusterCreateTime' => array(
                                'type' => 'string',
                            ),
                            'PreferredMaintenanceWindow' => array(
                                'type' => 'string',
                            ),
                            'PendingModifiedValues' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'NumCacheNodes' => array(
                                        'type' => 'numeric',
                                    ),
                                    'CacheNodeIdsToRemove' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'CacheNodeId',
                                            'type' => 'string',
                                            'sentAs' => 'CacheNodeId',
                                        ),
                                    ),
                                    'EngineVersion' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'NotificationConfiguration' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'TopicArn' => array(
                                        'type' => 'string',
                                    ),
                                    'TopicStatus' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'CacheSecurityGroups' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'CacheSecurityGroup',
                                    'type' => 'object',
                                    'sentAs' => 'CacheSecurityGroup',
                                    'properties' => array(
                                        'CacheSecurityGroupName' => array(
                                            'type' => 'string',
                                        ),
                                        'Status' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                            'CacheParameterGroup' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'CacheParameterGroupName' => array(
                                        'type' => 'string',
                                    ),
                                    'ParameterApplyStatus' => array(
                                        'type' => 'string',
                                    ),
                                    'CacheNodeIdsToReboot' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'CacheNodeId',
                                            'type' => 'string',
                                            'sentAs' => 'CacheNodeId',
                                        ),
                                    ),
                                ),
                            ),
                            'CacheSubnetGroupName' => array(
                                'type' => 'string',
                            ),
                            'CacheNodes' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'CacheNode',
                                    'type' => 'object',
                                    'sentAs' => 'CacheNode',
                                    'properties' => array(
                                        'CacheNodeId' => array(
                                            'type' => 'string',
                                        ),
                                        'CacheNodeStatus' => array(
                                            'type' => 'string',
                                        ),
                                        'CacheNodeCreateTime' => array(
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
                                        'ParameterGroupStatus' => array(
                                            'type' => 'string',
                                        ),
                                        'SourceCacheNodeId' => array(
                                            'type' => 'string',
                                        ),
                                        'CustomerAvailabilityZone' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                            'AutoMinorVersionUpgrade' => array(
                                'type' => 'boolean',
                            ),
                            'SecurityGroups' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'SecurityGroupMembership',
                                    'type' => 'object',
                                    'sentAs' => 'member',
                                    'properties' => array(
                                        'SecurityGroupId' => array(
                                            'type' => 'string',
                                        ),
                                        'Status' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                            'ReplicationGroupId' => array(
                                'type' => 'string',
                            ),
                            'SnapshotRetentionLimit' => array(
                                'type' => 'numeric',
                            ),
                            'SnapshotWindow' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'CacheEngineVersionMessage' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'CacheEngineVersions' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'CacheEngineVersion',
                        'type' => 'object',
                        'sentAs' => 'CacheEngineVersion',
                        'properties' => array(
                            'Engine' => array(
                                'type' => 'string',
                            ),
                            'EngineVersion' => array(
                                'type' => 'string',
                            ),
                            'CacheParameterGroupFamily' => array(
                                'type' => 'string',
                            ),
                            'CacheEngineDescription' => array(
                                'type' => 'string',
                            ),
                            'CacheEngineVersionDescription' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'CacheParameterGroupsMessage' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'CacheParameterGroups' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'CacheParameterGroup',
                        'type' => 'object',
                        'sentAs' => 'CacheParameterGroup',
                        'properties' => array(
                            'CacheParameterGroupName' => array(
                                'type' => 'string',
                            ),
                            'CacheParameterGroupFamily' => array(
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
        'CacheParameterGroupDetails' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
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
                'CacheNodeTypeSpecificParameters' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'CacheNodeTypeSpecificParameter',
                        'type' => 'object',
                        'sentAs' => 'CacheNodeTypeSpecificParameter',
                        'properties' => array(
                            'ParameterName' => array(
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
                            'CacheNodeTypeSpecificValues' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'CacheNodeTypeSpecificValue',
                                    'type' => 'object',
                                    'sentAs' => 'CacheNodeTypeSpecificValue',
                                    'properties' => array(
                                        'CacheNodeType' => array(
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
        'CacheSecurityGroupMessage' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'CacheSecurityGroups' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'CacheSecurityGroup',
                        'type' => 'object',
                        'sentAs' => 'CacheSecurityGroup',
                        'properties' => array(
                            'OwnerId' => array(
                                'type' => 'string',
                            ),
                            'CacheSecurityGroupName' => array(
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
                        ),
                    ),
                ),
            ),
        ),
        'CacheSubnetGroupMessage' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'CacheSubnetGroups' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'CacheSubnetGroup',
                        'type' => 'object',
                        'sentAs' => 'CacheSubnetGroup',
                        'properties' => array(
                            'CacheSubnetGroupName' => array(
                                'type' => 'string',
                            ),
                            'CacheSubnetGroupDescription' => array(
                                'type' => 'string',
                            ),
                            'VpcId' => array(
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
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'EngineDefaultsWrapper' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'EngineDefaults' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'data' => array(
                        'wrapper' => true,
                    ),
                    'properties' => array(
                        'CacheParameterGroupFamily' => array(
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
                        'CacheNodeTypeSpecificParameters' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'CacheNodeTypeSpecificParameter',
                                'type' => 'object',
                                'sentAs' => 'CacheNodeTypeSpecificParameter',
                                'properties' => array(
                                    'ParameterName' => array(
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
                                    'CacheNodeTypeSpecificValues' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'CacheNodeTypeSpecificValue',
                                            'type' => 'object',
                                            'sentAs' => 'CacheNodeTypeSpecificValue',
                                            'properties' => array(
                                                'CacheNodeType' => array(
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
                            'Date' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'ReplicationGroupMessage' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'ReplicationGroups' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'ReplicationGroup',
                        'type' => 'object',
                        'sentAs' => 'ReplicationGroup',
                        'properties' => array(
                            'ReplicationGroupId' => array(
                                'type' => 'string',
                            ),
                            'Description' => array(
                                'type' => 'string',
                            ),
                            'Status' => array(
                                'type' => 'string',
                            ),
                            'PendingModifiedValues' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'PrimaryClusterId' => array(
                                        'type' => 'string',
                                    ),
                                    'AutomaticFailoverStatus' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'MemberClusters' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'ClusterId',
                                    'type' => 'string',
                                    'sentAs' => 'ClusterId',
                                ),
                            ),
                            'NodeGroups' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'NodeGroup',
                                    'type' => 'object',
                                    'sentAs' => 'NodeGroup',
                                    'properties' => array(
                                        'NodeGroupId' => array(
                                            'type' => 'string',
                                        ),
                                        'Status' => array(
                                            'type' => 'string',
                                        ),
                                        'PrimaryEndpoint' => array(
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
                                        'NodeGroupMembers' => array(
                                            'type' => 'array',
                                            'items' => array(
                                                'name' => 'NodeGroupMember',
                                                'type' => 'object',
                                                'sentAs' => 'NodeGroupMember',
                                                'properties' => array(
                                                    'CacheClusterId' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'CacheNodeId' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'ReadEndpoint' => array(
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
                                                    'PreferredAvailabilityZone' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'CurrentRole' => array(
                                                        'type' => 'string',
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            'SnapshottingClusterId' => array(
                                'type' => 'string',
                            ),
                            'AutomaticFailover' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'ReservedCacheNodeMessage' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'ReservedCacheNodes' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'ReservedCacheNode',
                        'type' => 'object',
                        'sentAs' => 'ReservedCacheNode',
                        'properties' => array(
                            'ReservedCacheNodeId' => array(
                                'type' => 'string',
                            ),
                            'ReservedCacheNodesOfferingId' => array(
                                'type' => 'string',
                            ),
                            'CacheNodeType' => array(
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
                            'CacheNodeCount' => array(
                                'type' => 'numeric',
                            ),
                            'ProductDescription' => array(
                                'type' => 'string',
                            ),
                            'OfferingType' => array(
                                'type' => 'string',
                            ),
                            'State' => array(
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
        'ReservedCacheNodesOfferingMessage' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'ReservedCacheNodesOfferings' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'ReservedCacheNodesOffering',
                        'type' => 'object',
                        'sentAs' => 'ReservedCacheNodesOffering',
                        'properties' => array(
                            'ReservedCacheNodesOfferingId' => array(
                                'type' => 'string',
                            ),
                            'CacheNodeType' => array(
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
                            'ProductDescription' => array(
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
        'DescribeSnapshotsListMessage' => array(
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
                            'SnapshotName' => array(
                                'type' => 'string',
                            ),
                            'CacheClusterId' => array(
                                'type' => 'string',
                            ),
                            'SnapshotStatus' => array(
                                'type' => 'string',
                            ),
                            'SnapshotSource' => array(
                                'type' => 'string',
                            ),
                            'CacheNodeType' => array(
                                'type' => 'string',
                            ),
                            'Engine' => array(
                                'type' => 'string',
                            ),
                            'EngineVersion' => array(
                                'type' => 'string',
                            ),
                            'NumCacheNodes' => array(
                                'type' => 'numeric',
                            ),
                            'PreferredAvailabilityZone' => array(
                                'type' => 'string',
                            ),
                            'CacheClusterCreateTime' => array(
                                'type' => 'string',
                            ),
                            'PreferredMaintenanceWindow' => array(
                                'type' => 'string',
                            ),
                            'TopicArn' => array(
                                'type' => 'string',
                            ),
                            'Port' => array(
                                'type' => 'numeric',
                            ),
                            'CacheParameterGroupName' => array(
                                'type' => 'string',
                            ),
                            'CacheSubnetGroupName' => array(
                                'type' => 'string',
                            ),
                            'VpcId' => array(
                                'type' => 'string',
                            ),
                            'AutoMinorVersionUpgrade' => array(
                                'type' => 'boolean',
                            ),
                            'SnapshotRetentionLimit' => array(
                                'type' => 'numeric',
                            ),
                            'SnapshotWindow' => array(
                                'type' => 'string',
                            ),
                            'NodeSnapshots' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'NodeSnapshot',
                                    'type' => 'object',
                                    'sentAs' => 'NodeSnapshot',
                                    'properties' => array(
                                        'CacheNodeId' => array(
                                            'type' => 'string',
                                        ),
                                        'CacheSize' => array(
                                            'type' => 'string',
                                        ),
                                        'CacheNodeCreateTime' => array(
                                            'type' => 'string',
                                        ),
                                        'SnapshotCreateTime' => array(
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
        'CacheParameterGroupNameMessage' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'CacheParameterGroupName' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'ReservedCacheNodeWrapper' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ReservedCacheNode' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'data' => array(
                        'wrapper' => true,
                    ),
                    'properties' => array(
                        'ReservedCacheNodeId' => array(
                            'type' => 'string',
                        ),
                        'ReservedCacheNodesOfferingId' => array(
                            'type' => 'string',
                        ),
                        'CacheNodeType' => array(
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
                        'CacheNodeCount' => array(
                            'type' => 'numeric',
                        ),
                        'ProductDescription' => array(
                            'type' => 'string',
                        ),
                        'OfferingType' => array(
                            'type' => 'string',
                        ),
                        'State' => array(
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
        'DescribeCacheClusters' => array(
            'input_token' => 'Marker',
            'output_token' => 'Marker',
            'limit_key' => 'MaxRecords',
            'result_key' => 'CacheClusters',
        ),
        'DescribeCacheEngineVersions' => array(
            'input_token' => 'Marker',
            'output_token' => 'Marker',
            'limit_key' => 'MaxRecords',
            'result_key' => 'CacheEngineVersions',
        ),
        'DescribeCacheParameterGroups' => array(
            'input_token' => 'Marker',
            'output_token' => 'Marker',
            'limit_key' => 'MaxRecords',
            'result_key' => 'CacheParameterGroups',
        ),
        'DescribeCacheParameters' => array(
            'input_token' => 'Marker',
            'output_token' => 'Marker',
            'limit_key' => 'MaxRecords',
            'result_key' => 'Parameters',
        ),
        'DescribeCacheSecurityGroups' => array(
            'input_token' => 'Marker',
            'output_token' => 'Marker',
            'limit_key' => 'MaxRecords',
            'result_key' => 'CacheSecurityGroups',
        ),
        'DescribeCacheSubnetGroups' => array(
            'input_token' => 'Marker',
            'output_token' => 'Marker',
            'limit_key' => 'MaxRecords',
            'result_key' => 'CacheSubnetGroups',
        ),
        'DescribeEngineDefaultParameters' => array(
            'input_token' => 'Marker',
            'output_token' => 'Marker',
            'limit_key' => 'MaxRecords',
            'result_key' => 'Parameters',
        ),
        'DescribeEvents' => array(
            'input_token' => 'Marker',
            'output_token' => 'Marker',
            'limit_key' => 'MaxRecords',
            'result_key' => 'Events',
        ),
        'DescribeReservedCacheNodes' => array(
            'input_token' => 'Marker',
            'output_token' => 'Marker',
            'limit_key' => 'MaxRecords',
            'result_key' => 'ReservedCacheNodes',
        ),
        'DescribeReservedCacheNodesOfferings' => array(
            'input_token' => 'Marker',
            'output_token' => 'Marker',
            'limit_key' => 'MaxRecords',
            'result_key' => 'ReservedCacheNodesOfferings',
        ),
        'DescribeReplicationGroups' => array(
            'input_token' => 'Marker',
            'output_token' => 'Marker',
            'limit_key' => 'MaxRecords',
            'result_key' => 'ReplicationGroups',
        ),
        'DescribeSnapshots' => array(
            'input_token' => 'Marker',
            'output_token' => 'Marker',
            'limit_key' => 'MaxRecords',
            'result_key' => 'Snapshots',
        ),
    ),
);
