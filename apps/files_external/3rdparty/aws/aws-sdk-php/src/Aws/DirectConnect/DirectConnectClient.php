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

namespace Aws\DirectConnect;

use Aws\Common\Client\AbstractClient;
use Aws\Common\Client\ClientBuilder;
use Aws\Common\Enum\ClientOptions as Options;
use Aws\Common\Exception\Parser\JsonQueryExceptionParser;
use Guzzle\Common\Collection;
use Guzzle\Service\Resource\Model;
use Guzzle\Service\Resource\ResourceIteratorInterface;

/**
 * Client to interact with AWS Direct Connect
 *
 * @method Model allocateConnectionOnInterconnect(array $args = array()) {@command DirectConnect AllocateConnectionOnInterconnect}
 * @method Model allocatePrivateVirtualInterface(array $args = array()) {@command DirectConnect AllocatePrivateVirtualInterface}
 * @method Model allocatePublicVirtualInterface(array $args = array()) {@command DirectConnect AllocatePublicVirtualInterface}
 * @method Model confirmConnection(array $args = array()) {@command DirectConnect ConfirmConnection}
 * @method Model confirmPrivateVirtualInterface(array $args = array()) {@command DirectConnect ConfirmPrivateVirtualInterface}
 * @method Model confirmPublicVirtualInterface(array $args = array()) {@command DirectConnect ConfirmPublicVirtualInterface}
 * @method Model createConnection(array $args = array()) {@command DirectConnect CreateConnection}
 * @method Model createInterconnect(array $args = array()) {@command DirectConnect CreateInterconnect}
 * @method Model createPrivateVirtualInterface(array $args = array()) {@command DirectConnect CreatePrivateVirtualInterface}
 * @method Model createPublicVirtualInterface(array $args = array()) {@command DirectConnect CreatePublicVirtualInterface}
 * @method Model deleteConnection(array $args = array()) {@command DirectConnect DeleteConnection}
 * @method Model deleteInterconnect(array $args = array()) {@command DirectConnect DeleteInterconnect}
 * @method Model deleteVirtualInterface(array $args = array()) {@command DirectConnect DeleteVirtualInterface}
 * @method Model describeConnections(array $args = array()) {@command DirectConnect DescribeConnections}
 * @method Model describeConnectionsOnInterconnect(array $args = array()) {@command DirectConnect DescribeConnectionsOnInterconnect}
 * @method Model describeInterconnects(array $args = array()) {@command DirectConnect DescribeInterconnects}
 * @method Model describeLocations(array $args = array()) {@command DirectConnect DescribeLocations}
 * @method Model describeVirtualGateways(array $args = array()) {@command DirectConnect DescribeVirtualGateways}
 * @method Model describeVirtualInterfaces(array $args = array()) {@command DirectConnect DescribeVirtualInterfaces}
 * @method ResourceIteratorInterface getDescribeConnectionsIterator(array $args = array()) The input array uses the parameters of the DescribeConnections operation
 * @method ResourceIteratorInterface getDescribeConnectionsOnInterconnectIterator(array $args = array()) The input array uses the parameters of the DescribeConnectionsOnInterconnect operation
 * @method ResourceIteratorInterface getDescribeInterconnectsIterator(array $args = array()) The input array uses the parameters of the DescribeInterconnects operation
 * @method ResourceIteratorInterface getDescribeLocationsIterator(array $args = array()) The input array uses the parameters of the DescribeLocations operation
 * @method ResourceIteratorInterface getDescribeVirtualGatewaysIterator(array $args = array()) The input array uses the parameters of the DescribeVirtualGateways operation
 * @method ResourceIteratorInterface getDescribeVirtualInterfacesIterator(array $args = array()) The input array uses the parameters of the DescribeVirtualInterfaces operation
 *
 * @link http://docs.aws.amazon.com/aws-sdk-php/guide/latest/service-directconnect.html User guide
 * @link http://docs.aws.amazon.com/aws-sdk-php/latest/class-Aws.DirectConnect.DirectConnectClient.html API docs
 */
class DirectConnectClient extends AbstractClient
{
    const LATEST_API_VERSION = '2012-10-25';

    /**
     * Factory method to create a new AWS Direct Connect client using an array of configuration options.
     *
     * @param array|Collection $config Client configuration data
     *
     * @return self
     * @link http://docs.aws.amazon.com/aws-sdk-php/guide/latest/configuration.html#client-configuration-options
     */
    public static function factory($config = array())
    {
        return ClientBuilder::factory(__NAMESPACE__)
            ->setConfig($config)
            ->setConfigDefaults(array(
                Options::VERSION             => self::LATEST_API_VERSION,
                Options::SERVICE_DESCRIPTION => __DIR__ . '/Resources/directconnect-%s.php'
            ))
            ->setExceptionParser(new JsonQueryExceptionParser())
            ->build();
    }
}
