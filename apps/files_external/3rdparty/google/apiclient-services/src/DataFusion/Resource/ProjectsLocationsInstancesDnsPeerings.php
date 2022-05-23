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

namespace Google\Service\DataFusion\Resource;

use Google\Service\DataFusion\DatafusionEmpty;
use Google\Service\DataFusion\DnsPeering;
use Google\Service\DataFusion\ListDnsPeeringsResponse;

/**
 * The "dnsPeerings" collection of methods.
 * Typical usage is:
 *  <code>
 *   $datafusionService = new Google\Service\DataFusion(...);
 *   $dnsPeerings = $datafusionService->dnsPeerings;
 *  </code>
 */
class ProjectsLocationsInstancesDnsPeerings extends \Google\Service\Resource
{
  /**
   * Creates DNS peering on the given resource. (dnsPeerings.create)
   *
   * @param string $parent Required. The resource on which DNS peering will be
   * created.
   * @param DnsPeering $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string dnsPeeringId Required. The name of the peering to create.
   * @return DnsPeering
   */
  public function create($parent, DnsPeering $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], DnsPeering::class);
  }
  /**
   * Deletes DNS peering on the given resource. (dnsPeerings.delete)
   *
   * @param string $name Required. The name of the DNS peering zone to delete.
   * Format: projects/{project}/locations/{location}/instances/{instance}/dnsPeeri
   * ngs/{dns_peering}
   * @param array $optParams Optional parameters.
   * @return DatafusionEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], DatafusionEmpty::class);
  }
  /**
   * Lists DNS peerings for a given resource.
   * (dnsPeerings.listProjectsLocationsInstancesDnsPeerings)
   *
   * @param string $parent Required. The parent, which owns this collection of dns
   * peerings. Format:
   * projects/{project}/locations/{location}/instances/{instance}
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of dns peerings to return. The
   * service may return fewer than this value. If unspecified, at most 50 dns
   * peerings will be returned. The maximum value is 200; values above 200 will be
   * coerced to 200.
   * @opt_param string pageToken A page token, received from a previous
   * `ListDnsPeerings` call. Provide this to retrieve the subsequent page. When
   * paginating, all other parameters provided to `ListDnsPeerings` must match the
   * call that provided the page token.
   * @return ListDnsPeeringsResponse
   */
  public function listProjectsLocationsInstancesDnsPeerings($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListDnsPeeringsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsInstancesDnsPeerings::class, 'Google_Service_DataFusion_Resource_ProjectsLocationsInstancesDnsPeerings');
