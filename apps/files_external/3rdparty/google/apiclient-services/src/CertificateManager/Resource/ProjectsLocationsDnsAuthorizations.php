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

namespace Google\Service\CertificateManager\Resource;

use Google\Service\CertificateManager\DnsAuthorization;
use Google\Service\CertificateManager\ListDnsAuthorizationsResponse;
use Google\Service\CertificateManager\Operation;

/**
 * The "dnsAuthorizations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $certificatemanagerService = new Google\Service\CertificateManager(...);
 *   $dnsAuthorizations = $certificatemanagerService->dnsAuthorizations;
 *  </code>
 */
class ProjectsLocationsDnsAuthorizations extends \Google\Service\Resource
{
  /**
   * Creates a new DnsAuthorization in a given project and location.
   * (dnsAuthorizations.create)
   *
   * @param string $parent Required. The parent resource of the dns authorization.
   * Must be in the format `projects/locations`.
   * @param DnsAuthorization $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string dnsAuthorizationId Required. A user-provided name of the
   * dns authorization.
   * @return Operation
   */
  public function create($parent, DnsAuthorization $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Deletes a single DnsAuthorization. (dnsAuthorizations.delete)
   *
   * @param string $name Required. A name of the dns authorization to delete. Must
   * be in the format `projects/locations/dnsAuthorizations`.
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
   * Gets details of a single DnsAuthorization. (dnsAuthorizations.get)
   *
   * @param string $name Required. A name of the dns authorization to describe.
   * Must be in the format `projects/locations/dnsAuthorizations`.
   * @param array $optParams Optional parameters.
   * @return DnsAuthorization
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], DnsAuthorization::class);
  }
  /**
   * Lists DnsAuthorizations in a given project and location.
   * (dnsAuthorizations.listProjectsLocationsDnsAuthorizations)
   *
   * @param string $parent Required. The project and location from which the dns
   * authorizations should be listed, specified in the format
   * `projects/locations`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Filter expression to restrict the Dns Authorizations
   * returned.
   * @opt_param string orderBy A list of Dns Authorization field names used to
   * specify the order of the returned results. The default sorting order is
   * ascending. To specify descending order for a field, add a suffix " desc".
   * @opt_param int pageSize Maximum number of dns authorizations to return per
   * call.
   * @opt_param string pageToken The value returned by the last
   * `ListDnsAuthorizationsResponse`. Indicates that this is a continuation of a
   * prior `ListDnsAuthorizations` call, and that the system should return the
   * next page of data.
   * @return ListDnsAuthorizationsResponse
   */
  public function listProjectsLocationsDnsAuthorizations($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListDnsAuthorizationsResponse::class);
  }
  /**
   * Updates a DnsAuthorization. (dnsAuthorizations.patch)
   *
   * @param string $name A user-defined name of the dns authorization.
   * DnsAuthorization names must be unique globally and match pattern
   * `projects/locations/dnsAuthorizations`.
   * @param DnsAuthorization $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. The update mask applies to the
   * resource. For the `FieldMask` definition, see https://developers.google.com
   * /protocol-buffers/docs/reference/google.protobuf#fieldmask.
   * @return Operation
   */
  public function patch($name, DnsAuthorization $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Operation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsDnsAuthorizations::class, 'Google_Service_CertificateManager_Resource_ProjectsLocationsDnsAuthorizations');
