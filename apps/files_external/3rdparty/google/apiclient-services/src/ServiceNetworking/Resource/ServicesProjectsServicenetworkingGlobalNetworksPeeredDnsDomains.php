<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\ServiceNetworking\Resource;

use Google\Service\ServiceNetworking\ListPeeredDnsDomainsResponse;
use Google\Service\ServiceNetworking\Operation;
use Google\Service\ServiceNetworking\PeeredDnsDomain;

/**
 * The "peeredDnsDomains" collection of methods.
 * Typical usage is:
 *  <code>
 *   $servicenetworkingService = new Google\Service\ServiceNetworking(...);
 *   $peeredDnsDomains = $servicenetworkingService->peeredDnsDomains;
 *  </code>
 */
class ServicesProjectsServicenetworkingGlobalNetworksPeeredDnsDomains extends \Google\Service\Resource
{
  /**
   * Creates a peered DNS domain which sends requests for records in given
   * namespace originating in the service producer VPC network to the consumer VPC
   * network to be resolved. (peeredDnsDomains.create)
   *
   * @param string $parent Required. Parent resource identifying the connection
   * for which the peered DNS domain will be created in the format:
   * `services/{service}/projects/{project}/global/networks/{network}` {service}
   * is the peering service that is managing connectivity for the service
   * producer's organization. For Google services that support this functionality,
   * this value is `servicenetworking.googleapis.com`. {project} is the number of
   * the project that contains the service consumer's VPC network e.g. `12345`.
   * {network} is the name of the service consumer's VPC network.
   * @param PeeredDnsDomain $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function create($parent, PeeredDnsDomain $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Deletes a peered DNS domain. (peeredDnsDomains.delete)
   *
   * @param string $name Required. The name of the peered DNS domain to delete in
   * the format: `services/{service}/projects/{project}/global/networks/{network}/
   * peeredDnsDomains/{name}`. {service} is the peering service that is managing
   * connectivity for the service producer's organization. For Google services
   * that support this functionality, this value is
   * `servicenetworking.googleapis.com`. {project} is the number of the project
   * that contains the service consumer's VPC network e.g. `12345`. {network} is
   * the name of the service consumer's VPC network. {name} is the name of the
   * peered DNS domain.
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], Operation::class);
  }
  /**
   * Lists peered DNS domains for a connection. (peeredDnsDomains.listServicesProj
   * ectsServicenetworkingGlobalNetworksPeeredDnsDomains)
   *
   * @param string $parent Required. Parent resource identifying the connection
   * which owns this collection of peered DNS domains in the format:
   * `services/{service}/projects/{project}/global/networks/{network}`. {service}
   * is the peering service that is managing connectivity for the service
   * producer's organization. For Google services that support this functionality,
   * this value is `servicenetworking.googleapis.com`. {project} is a project
   * number e.g. `12345` that contains the service consumer's VPC network.
   * {network} is the name of the service consumer's VPC network.
   * @param array $optParams Optional parameters.
   * @return ListPeeredDnsDomainsResponse
   */
  public function listServicesProjectsServicenetworkingGlobalNetworksPeeredDnsDomains($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListPeeredDnsDomainsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ServicesProjectsServicenetworkingGlobalNetworksPeeredDnsDomains::class, 'Google_Service_ServiceNetworking_Resource_ServicesProjectsServicenetworkingGlobalNetworksPeeredDnsDomains');
